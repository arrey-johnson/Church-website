# cPanel deployment — God Voice Ministry

## What to upload

Upload the **contents** of this project into your domain’s web root (usually `public_html`):

- `index.php`
- `.htaccess`
- `.user.ini`
- `assets/`
- `includes/`
- `lang/`
- `pages/`
- `storage/`

Do **not** upload:

- `.git/`
- `router.php` (local development only; blocked by `.htaccess` if present)
- this guide is optional

## cPanel checklist

1. **PHP version**  
   In cPanel → Select PHP Version / MultiPHP Manager, choose **PHP 8.1 or newer**.

2. **Apache rewrite**  
   `mod_rewrite` is normally enabled on cPanel. Pretty URLs (`/fr`, `/en/prayer`) depend on `.htaccess`.

3. **Permissions**  
   - Folders: `755`  
   - Files: `644`  
   - Make sure `storage/submissions/` is writable by PHP (`755` or `775` if forms cannot save).

4. **Document root**  
   - Main domain: upload into `public_html/`  
   - Addon / subdomain: upload into that domain’s document root folder

5. **Subdirectory install (optional)**  
   If the site is at `https://example.com/ministry/`:
   - Set `base_path` in `includes/config.php` to `/ministry`
   - In `.htaccess`, uncomment and set: `RewriteBase /ministry/`

6. **Email forms**  
   Prayer / visit / testimony forms:
   - save a JSON copy under `storage/submissions/`
   - attempt `mail()` to `info@gvcwministry.net`  
   In cPanel, confirm the mailbox exists or that outbound mail is allowed. You can change the From address in `includes/config.php` (`mail_from`).

7. **Contact details**  
   Edit `includes/site.php` for email, phone, WhatsApp, and social URLs.

## Quick smoke test after upload

Open:

- `https://your-domain/` → should redirect to `/fr`
- `https://your-domain/fr`
- `https://your-domain/en/prayer`
- `https://your-domain/assets/css/styles.css`
- Submit a test prayer request and confirm a file appears in `storage/submissions/`

## Local preview (optional)

```bash
php -S localhost:8080 router.php
```

Then open `http://localhost:8080`.
