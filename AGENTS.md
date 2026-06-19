# AGENTS.md

## Cursor Cloud specific instructions

### Repository layout

- Theme source: `ServicesTheme(YourColor)/`
- Release ZIP: `bash scripts/build-theme-zip.sh` → `dist/kayan-theme-2027.zip`
- Post-deploy activation (on server): `scripts/kayan-release-activate.sh` from WordPress root

### Production validation (no server access required)

```bash
curl -sL -H 'Cache-Control: no-cache' "https://www.rukn-eltatawer.com/" -o /tmp/prod.html
curl -sL "https://www.rukn-eltatawer.com/wp-content/themes/kayan-theme/style.css" | rg '^Version:'
php ServicesTheme\(YourColor\)/docs/validation-scripts/analyze-head-seo.php /tmp/prod.html
php ServicesTheme\(YourColor\)/docs/validation-scripts/audit-production-lockdown.php /tmp/prod.html
npx lighthouse https://www.rukn-eltatawer.com/ --chrome-flags="--headless=new --no-sandbox --disable-gpu --disable-dev-shm-usage" --only-categories=performance
```

### Rank Math

- Keep plugin **active** for `rank_math_title` / `rank_math_description` meta storage.
- Disable **frontend only** via KAYAN SEO (`kayan-seo/compatibility.php`). Do not deactivate the plugin while per-post SEO lives in Rank Math meta keys.

### Release checklist (manual on server)

1. Upload `dist/kayan-theme-2027.zip` or git pull theme to `wp-content/themes/kayan-theme/`
2. Delete snippets: `rukn_track_*`, `kayan-tracking-js`, `_rsa_sid`, Organization JSON-LD
3. LiteSpeed → Purge All
4. Re-run validation scripts above
