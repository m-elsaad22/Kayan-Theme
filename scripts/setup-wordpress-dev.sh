#!/usr/bin/env bash
# Idempotent local WordPress dev bootstrap for YOURCOLOR THEME 2024.
# WordPress core is not shipped in this repo; this script downloads it into wordpress-dev/.

set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
WP_DIR="$ROOT/wordpress-dev"
THEME_SRC="$ROOT/ServicesTheme(YourColor)"
THEME_LINK="$WP_DIR/wp-content/themes/ServicesTheme-YourColor"
WP_CLI="/tmp/wp-cli.phar"
DB_NAME="wordpress"
DB_USER="wpuser"
DB_PASS="wppass"
SITE_URL="http://127.0.0.1:8080"
ADMIN_USER="admin"
ADMIN_PASS="adminpass"
ADMIN_EMAIL="admin@example.com"

symlink_only=false
if [[ "${1:-}" == "--symlink-only" ]]; then
  symlink_only=true
fi

ensure_php_short_tags() {
  local ini="/etc/php/8.3/cli/php.ini"
  if [[ -f "$ini" ]] && grep -q '^short_open_tag = Off' "$ini"; then
    sudo sed -i 's/^short_open_tag = Off/short_open_tag = On/' "$ini"
  fi
}

ensure_mariadb() {
  sudo service mariadb start >/dev/null 2>&1 || true
  sudo mysql -e "CREATE DATABASE IF NOT EXISTS ${DB_NAME}; \
    CREATE USER IF NOT EXISTS '${DB_USER}'@'localhost' IDENTIFIED BY '${DB_PASS}'; \
    GRANT ALL PRIVILEGES ON ${DB_NAME}.* TO '${DB_USER}'@'localhost'; \
    FLUSH PRIVILEGES;" >/dev/null 2>&1 || true
}

ensure_wp_cli() {
  if [[ ! -f "$WP_CLI" ]]; then
    curl -fsSL https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar -o "$WP_CLI"
    chmod +x "$WP_CLI"
  fi
}

ensure_theme_symlink() {
  mkdir -p "$WP_DIR/wp-content/themes"
  ln -sfn "$THEME_SRC" "$THEME_LINK"
}

if $symlink_only; then
  ensure_theme_symlink
  exit 0
fi

ensure_php_short_tags
ensure_mariadb
ensure_wp_cli
ensure_theme_symlink

if [[ ! -f "$WP_DIR/wp-config.php" ]]; then
  mkdir -p "$WP_DIR"
  if [[ ! -f "$WP_DIR/wp-load.php" ]]; then
    curl -fsSL https://wordpress.org/latest.tar.gz -o /tmp/wordpress-latest.tar.gz
    tar -xzf /tmp/wordpress-latest.tar.gz -C /tmp
    rsync -a /tmp/wordpress/ "$WP_DIR/"
  fi

  cp "$WP_DIR/wp-config-sample.php" "$WP_DIR/wp-config.php"
  sed -i "s/database_name_here/${DB_NAME}/" "$WP_DIR/wp-config.php"
  sed -i "s/username_here/${DB_USER}/" "$WP_DIR/wp-config.php"
  sed -i "s/password_here/${DB_PASS}/" "$WP_DIR/wp-config.php"
  sed -i "s/localhost/127.0.0.1/" "$WP_DIR/wp-config.php"

  php "$WP_CLI" core install \
    --url="$SITE_URL" \
    --title="YourColor Dev Site" \
    --admin_user="$ADMIN_USER" \
    --admin_password="$ADMIN_PASS" \
    --admin_email="$ADMIN_EMAIL" \
    --skip-email \
    --path="$WP_DIR"
fi

php "$WP_CLI" theme activate ServicesTheme-YourColor --path="$WP_DIR" >/dev/null 2>&1 || true
php "$WP_CLI" rewrite structure '/%postname%/' --path="$WP_DIR" >/dev/null 2>&1 || true
php "$WP_CLI" rewrite flush --path="$WP_DIR" >/dev/null 2>&1 || true

echo "WordPress dev site ready at ${SITE_URL}"
echo "Admin: ${ADMIN_USER} / ${ADMIN_PASS}"
echo "Start server: php ${WP_CLI} server --host=0.0.0.0 --port=8080 --path=${WP_DIR}"
