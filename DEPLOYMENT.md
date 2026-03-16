# Gamer Minds — InfinityFree Deployment Guide

**Live URL:** https://gamerminds.kesug.com
**Credentials:** See `.env` (never committed)

---

## Overview

The Git repository IS the full WordPress install. You upload the entire repo
to InfinityFree's `htdocs` folder, with a production `wp-config.php`.

---

## STEP 1 — Prepare files locally

### 1a. Rename the production config
```
wp-config-production.php  →  wp-config.php
```
Do this **on your machine** before uploading. Keep the original local
`wp-config.php` safe — you'll need it for local development.

> Tip: After upload, rename it back locally so git doesn't lose track.

### 1b. Files to SKIP when uploading
Do not upload these — they are dev-only or too large:

| Skip | Reason |
|------|--------|
| `node_modules/` | Build dependencies |
| `src/` | React source (not needed on server) |
| `.git/` | Git metadata |
| `.env` | Contains secrets |
| `wp-config-production.php` | Already renamed to wp-config.php |
| `wp-content/themes/Create Illustrated Designs/` | React source theme |
| `wp-content/themes/intervaults/`, `gm/`, `gm2/` | Unused themes |
| `netlify.toml`, `package.json`, `webpack.config.js` | Build tools |

---

## STEP 2 — Upload via FTP (Recommended for full install)

InfinityFree FTP details are in your **InfinityFree control panel → FTP Accounts**.

### Using FileZilla (or any FTP client):
1. Open FileZilla → **File → Site Manager → New Site**
2. Enter:
   - Host: `ftpupload.net`
   - Port: `21`
   - Protocol: `FTP`
   - Encryption: `Only use plain FTP`
   - Logon Type: `Normal`
   - User/Password: from InfinityFree control panel
3. Connect
4. Navigate to `/htdocs/` on the remote side
5. Upload everything from your local project root EXCEPT the items in Step 1b

> **File Manager alternative:** InfinityFree's built-in File Manager works for
> small edits but is slow for bulk uploads. Use FTP for the initial upload.

---

## STEP 3 — Upload WordPress core files

WordPress core is already in this repo (`wp-admin/`, `wp-includes/`, etc.).
You uploaded it in Step 2. Nothing extra needed.

If you ever need a fresh WordPress download: https://wordpress.org/download/

---

## STEP 4 — Configure wp-config.php on the server

The `wp-config-production.php` (renamed to `wp-config.php`) already contains:

```
DB_NAME     = if0_41402162_gamerminds
DB_USER     = if0_41402162
DB_PASSWORD = de3sv6M5v171
DB_HOST     = sql105.infinityfree.com
WP_HOME     = https://gamerminds.kesug.com
WP_SITEURL  = https://gamerminds.kesug.com
FS_METHOD   = direct
```

Verify it uploaded correctly via File Manager → open `wp-config.php`.

---

## STEP 5 — Run the WordPress Installer

1. Visit: **https://gamerminds.kesug.com/wp-admin/install.php**
2. Choose language → Continue
3. Fill in:
   - **Site Title:** Gamer Minds
   - **Username:** (choose a strong admin username — not "admin")
   - **Password:** (choose a strong password — save it!)
   - **Your Email:** your email address
   - **Search Engine Visibility:** check "Discourage" until site is ready
4. Click **Install WordPress**
5. Log in at: **https://gamerminds.kesug.com/wp-admin**

---

## STEP 6 — Activate the Theme

1. In WordPress admin → **Appearance → Themes**
2. Find **Gamer Minds Theme** → click **Activate**
3. Visit the site: https://gamerminds.kesug.com

---

## STEP 7 — Verify the Site

Check these pages work:
- [ ] https://gamerminds.kesug.com (home/landing page)
- [ ] https://gamerminds.kesug.com/developers/
- [ ] https://gamerminds.kesug.com/players/
- [ ] https://gamerminds.kesug.com/wp-admin (admin panel)

If pages return 404:
- Go to **Settings → Permalinks** → select **Post name** → Save
  (this regenerates `.htaccess` for pretty URLs)

---

## STEP 8 — Configure Quote Form Email

1. In WordPress admin, open the **Developers** page
2. Click the **Quote Request Form** block
3. In the right sidebar → **Email Recipient** panel
4. Enter: your receiving email address
5. Save the page

---

## Updating the Theme Later (when Git repo changes)

### Option A — FTP (simple)
1. Pull latest changes locally: `git pull`
2. FTP connect to InfinityFree
3. Navigate to `/htdocs/wp-content/themes/gamer-minds-theme/`
4. Re-upload only the changed files (FileZilla highlights newer files)

### Option B — Upload just the theme folder
1. Zip the theme folder locally:
   ```bash
   cd wp-content/themes
   zip -r gamer-minds-theme.zip gamer-minds-theme/
   ```
2. In WordPress admin → **Appearance → Themes → Add New → Upload Theme**
3. Upload the zip → click **Replace current with uploaded**

### Option C — GitHub Actions (automated, advanced)
Set up a GitHub Action that FTP-deploys on push to `main`.
Requires adding FTP credentials as GitHub Secrets.

---

## Troubleshooting

| Problem | Fix |
|---------|-----|
| White screen / 500 error | Enable debug: set `WP_DEBUG` to `true` in wp-config.php temporarily |
| Database connection error | Double-check credentials in wp-config.php match `.env` |
| 404 on all pages | Settings → Permalinks → Save Changes (regenerates .htaccess) |
| Images not loading | Check `wp-content/uploads/` exists and is writable (chmod 755) |
| Theme not showing | Confirm theme folder name on server matches exactly: `gamer-minds-theme` |
| Slow File Manager upload | Use FTP instead — File Manager has upload size limits |
| wp_mail not sending | Install **WP Mail SMTP** plugin, configure with Gmail/SendGrid SMTP |
