# AGENTS.md

Guidance for cloud agents working in this repository.

## Repository overview

This repo contains **YOURCOLOR THEME 2024** (`ServicesTheme(YourColor)/`), a WordPress theme for Arabic service-business sites. WordPress core is **not** included. There is no npm, Composer, Docker, or automated test/lint pipeline in the repo.

## Cursor Cloud specific instructions

### System dependencies (one-time on a fresh VM)

Install PHP 8.x with extensions and MariaDB:

```bash
sudo apt-get update
sudo apt-get install -y php-cli php-mysql php-curl php-gd php-mbstring php-xml php-tidy php-zip mariadb-server
```

Enable PHP short open tags (the theme uses `<?` instead of `<?php`):

```bash
sudo sed -i 's/^short_open_tag = Off/short_open_tag = On/' /etc/php/8.3/cli/php.ini
```

### Bootstrap WordPress + theme

Run the idempotent setup script from the repo root:

```bash
chmod +x scripts/setup-wordpress-dev.sh
./scripts/setup-wordpress-dev.sh
```

This creates `wordpress-dev/` (downloaded WordPress), symlinks the theme from the repo, creates DB `wordpress` / user `wpuser` / password `wppass`, and activates **YOURCOLOR THEME 2024**.

Default admin credentials: `admin` / `adminpass`.

### Start services (each session)

1. Start MariaDB: `sudo service mariadb start`
2. Start the dev server (tmux recommended):

```bash
php /tmp/wp-cli.phar server --host=0.0.0.0 --port=8080 --path=/workspace/wordpress-dev
```

Site URL: http://127.0.0.1:8080

After first install, flush permalinks once in WP Admin (**Settings → Permalinks → Save**) so `/AjaxCenter/` rewrite routes work.

### Lint / tests

There is no project test suite or linter config. Optional sanity check:

```bash
find "ServicesTheme(YourColor)" -name '*.php' -print0 | xargs -0 -n1 php -l
```

### WP-CLI caveat

Some WP-CLI commands may fatal-error because several theme packs expect `global $ThemeTree` during `init` hooks. The web app works; prefer HTTP/REST for verification when CLI fails.

### Theme admin

Theme settings: **WP Admin → Theme settings** (`admin.php?page=YTS`).

Import/export: `admin.php?page=get_YourColorTheme__XML`.
