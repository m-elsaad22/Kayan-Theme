#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "$0")/.." && pwd)"
SOURCE_DIR="$ROOT_DIR/ServicesTheme(YourColor)"
BUILD_DIR="$ROOT_DIR/.build/kayan-theme"
DIST_DIR="$ROOT_DIR/dist"
ZIP_NAME="kayan-theme-2027.zip"
VERSION="$(grep -m1 '^Version:' "$SOURCE_DIR/style.css" | sed 's/Version:[[:space:]]*//' | tr -d '\r')"

if [[ ! -f "$SOURCE_DIR/style.css" ]]; then
	echo "Theme source not found: $SOURCE_DIR" >&2
	exit 1
fi

rm -rf "$BUILD_DIR"
mkdir -p "$BUILD_DIR" "$DIST_DIR"
rm -f "$DIST_DIR/$ZIP_NAME"

rsync -a \
	--exclude '.git' \
	--exclude '.gitignore' \
	--exclude 'node_modules' \
	--exclude '.DS_Store' \
	--exclude 'wordpress-dev' \
	"$SOURCE_DIR/" "$BUILD_DIR/kayan-theme/"

(
	cd "$BUILD_DIR"
	zip -rq "$DIST_DIR/$ZIP_NAME" kayan-theme
)

if [[ -f "$ROOT_DIR/dist/README-INSTALL-ar.md" ]]; then
	cp "$ROOT_DIR/dist/README-INSTALL-ar.md" "$DIST_DIR/README-INSTALL-ar.md"
fi

echo "Built: $DIST_DIR/$ZIP_NAME (v$VERSION)"
echo "Upload via WordPress: المظهر → قوالب → أضف جديد → رفع قالب"
