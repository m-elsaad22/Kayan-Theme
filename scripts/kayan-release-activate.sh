#!/usr/bin/env bash
# Release v2027.3.9 — run on production server (WP root).
# Usage: cd /path/to/wordpress && bash kayan-release-activate.sh

set -euo pipefail

WP="${WP_CLI:-wp}"
THEME_SLUG="kayan-theme"
ZIP_PATH="${1:-kayan-theme-2027.zip}"

echo "== KAYAN Release v2027.3.9 =="

if ! command -v wp &>/dev/null; then
	echo "wp-cli required" >&2
	exit 1
fi

if [[ -f "$ZIP_PATH" ]]; then
	echo "Installing theme from $ZIP_PATH ..."
	$WP theme install "$ZIP_PATH" --force --activate
else
	echo "Activating existing theme (no zip path) ..."
	$WP theme activate "$THEME_SLUG"
fi

echo "Enabling core systems ..."
$WP option delete kayan_seo_disable 2>/dev/null || true
$WP option delete kayan_track_disable 2>/dev/null || true
$WP option delete kayan_homepage_v3_disable 2>/dev/null || true
$WP option delete kayan_seo_legacy_schema 2>/dev/null || true
$WP option update header___codes ''
$WP option update kayan_stabilization_disable_legacy_tracking 1
$WP option delete kayan_lockdown_disable 2>/dev/null || true

echo "Flushing caches ..."
$WP cache flush 2>/dev/null || true
$WP transient delete --all 2>/dev/null || true
$WP litespeed-purge all 2>/dev/null || true

VER=$($WP theme get "$THEME_SLUG" --field=version 2>/dev/null || echo "unknown")
echo "Active theme version: $VER"
echo "Done. Purge LiteSpeed from admin if CLI purge unavailable."
echo "Manual: delete Code Snippets (rukn_track, kayan-tracking-js, _rsa_sid, Organization JSON-LD)."
