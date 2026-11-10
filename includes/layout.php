<?php

declare(strict_types=1);

/** @var array $t */
/** @var array $site */
/** @var string $lang */
/** @var string $page */
/** @var string $content */
/** @var string $metaTitle */
/** @var string $metaDescription */
/** @var bool $hideMobileCta */
/** @var array $navPages */
/** @var array $supportedLangs */

?><!doctype html>
<html lang="<?= e($lang) ?>">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="<?= e($site['logo']) ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?= e($metaDescription) ?>" />
    <title><?= e($metaTitle) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,400..700;1,400..700&family=Source+Serif+4:ital,opsz,wght@0,8..60,400..700;1,8..60,400..700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?= e(asset('assets/css/styles.css')) ?>" />
  </head>
  <body>
    <a class="skip-link" href="#content"><?= e($t['common']['skip']) ?></a>

    <div class="site-chrome" data-header>
      <div class="topbar" aria-label="<?= e($t['common']['topbar']) ?>">
        <div class="wrap-wide topbar-inner">
          <div class="topbar-contact">
            <a class="topbar-link" href="mailto:<?= e($site['email']) ?>">
              <svg viewBox="0 0 16 16" width="14" height="14" aria-hidden="true" focusable="false">
                <path d="M2.2 3.5h11.6c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H2.2c-.6 0-1-.4-1-1v-7c0-.6.4-1 1-1zm.3 1.2 5.1 3.5c.2.2.6.2.8 0l5.1-3.5H2.5zm11 6.6V6.1L8.8 9.4c-.5.3-1.1.3-1.6 0L2.5 6.1v5.2h11z" fill="currentColor"/>
              </svg>
              <span><?= e($site['email']) ?></span>
            </a>
            <a class="topbar-link" href="<?= e($site['website']) ?>" target="_blank" rel="noreferrer">
              <svg viewBox="0 0 16 16" width="14" height="14" aria-hidden="true" focusable="false">
                <path d="M8 1.5a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zm0 1.2c.7 0 1.8 1.7 2.1 4.3H5.9C6.2 4.4 7.3 2.7 8 2.7zm-2.4.6C4.7 4.3 4 5.8 3.7 7H5.6c.2-1.6.7-3 1-3.7zM3.5 8c0-.3 0-.7.1-1h2c-.1.3-.1.7-.1 1s0 .7.1 1h-2c-.1-.3-.1-.7-.1-1zm.2 2c.3 1.2 1 2.7 1.9 3.7-.3-.7-.8-2.1-1-3.7H3.7zm2.2 0h4.2c-.3 2.6-1.4 4.3-2.1 4.3S6.2 12.6 5.9 10zm5.2 0c-.2 1.6-.7 3-1 3.7.9-1 1.6-2.5 1.9-3.7h-.9zm1.2-1h-2c.1-.3.1-.7.1-1s0-.7-.1-1h2c.1.3.1.7.1 1s0 .7-.1 1zm-.3-3H10.4c.2-1.6.7-3 1-3.7.9 1 1.6 2.5 1.9 3.7z" fill="currentColor"/>
              </svg>
              <span><?= e($site['websiteLabel']) ?></span>
            </a>
            <?php if (!empty($site['phone'])): ?>
              <a class="topbar-link topbar-phone" href="tel:<?= e(preg_replace('/\s+/', '', $site['phone'])) ?>">
                <svg viewBox="0 0 16 16" width="14" height="14" aria-hidden="true" focusable="false">
                  <path d="M4.4 2.5c.3-.3.8-.4 1.1-.1l1.5 1.1c.3.2.4.6.3 1l-.4 1.3c-.1.3 0 .6.2.8l1.7 1.7c.2.2.5.3.8.2l1.3-.4c.3-.1.7 0 1 .3l1.1 1.5c.2.3.2.8-.1 1.1l-.9.9c-.3.3-.7.4-1.1.4-1.7 0-4.2-1.1-6.3-3.2S2.1 6.1 2.1 4.4c0-.4.1-.8.4-1.1l.9-.8z" fill="currentColor"/>
                </svg>
                <span><?= e($site['phoneLabel'] !== '' ? $site['phoneLabel'] : $site['phone']) ?></span>
              </a>
            <?php else: ?>
              <span class="topbar-note"><?= e($t['common']['phonePending']) ?></span>
            <?php endif; ?>
          </div>

          <div class="topbar-social" aria-label="<?= e($t['common']['social']) ?>">
            <?php foreach ($site['social'] as $social): ?>
              <?php
              $socialUrl = trim((string) ($social['url'] ?? ''));
              if ($socialUrl === '') {
                  continue;
              }
              $id = (string) $social['id'];
              ?>
              <a
                class="topbar-social-link"
                href="<?= e($socialUrl) ?>"
                <?= $socialUrl !== '#' ? 'target="_blank" rel="noreferrer"' : '' ?>
                aria-label="<?= e($social['label']) ?>"
                title="<?= e($social['label']) ?>"
              >
                <?php include __DIR__ . '/components/social-icon.php'; ?>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <header class="header">
        <div class="wrap-wide header-inner">
          <a class="logo" href="<?= e(url_path($lang)) ?>" aria-label="<?= e($t['brand']['name']) ?>">
            <img class="logo-mark" src="<?= e($site['logo']) ?>" alt="<?= e($t['media']['altLogo']) ?>" width="44" height="44" decoding="async" />
            <span class="logo-text">
              <strong><?= e($t['brand']['short']) ?></strong>
              <span><?= e($t['brand']['line']) ?></span>
            </span>
          </a>

          <nav class="nav-desktop" aria-label="<?= e($t['brand']['name']) ?>">
            <a href="<?= e(url_path($lang)) ?>"<?= nav_is_active('home') ? ' class="active" aria-current="page"' : '' ?>><?= e($t['nav']['home']) ?></a>
            <?php foreach ($navPages as $item): ?>
              <a href="<?= e(url_path($lang, $item['slug'])) ?>"<?= nav_is_active($item['slug']) ? ' class="active" aria-current="page"' : '' ?>><?= e($t['nav'][$item['key']]) ?></a>
            <?php endforeach; ?>
          </nav>

          <div class="header-tools">
            <div class="lang-switch desktop-only" role="group" aria-label="Language">
              <?php foreach ($supportedLangs as $item): ?>
                <a class="<?= $item === $lang ? 'active' : '' ?>" href="<?= e(switch_lang_url($item)) ?>"><?= e(strtoupper($item)) ?></a>
              <?php endforeach; ?>
            </div>
            <span class="header-cta">
              <?= button(url_path($lang, 'prayer'), $t['cta']['prayerShort'], 'gold') ?>
            </span>
            <button class="icon-btn menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu" data-menu-toggle>
              <span class="visually-hidden" data-menu-label><?= e($t['common']['menu']) ?></span>
              <svg width="18" height="12" viewBox="0 0 18 12" aria-hidden="true" data-menu-icon>
                <path d="M1 1h16M1 6h16M1 11h10" stroke="currentColor" stroke-width="1.6" />
              </svg>
            </button>
          </div>
        </div>
      </header>
    </div>

    <div class="menu-overlay" id="mobile-menu" role="dialog" aria-modal="true" hidden data-menu>
      <div class="menu-top">
        <div class="menu-brand">
          <img class="menu-logo" src="<?= e($site['logo']) ?>" alt="<?= e($t['media']['altLogo']) ?>" width="48" height="48" decoding="async" />
          <div>
            <p class="menu-brand-name"><?= e($t['brand']['short']) ?></p>
            <p class="menu-brand-line"><?= e($t['brand']['line']) ?></p>
          </div>
        </div>
        <div class="menu-top-actions">
          <div class="lang-switch" role="group" aria-label="Language">
            <?php foreach ($supportedLangs as $item): ?>
              <a class="<?= $item === $lang ? 'active' : '' ?>" href="<?= e(switch_lang_url($item)) ?>"><?= e(strtoupper($item)) ?></a>
            <?php endforeach; ?>
          </div>
          <button class="icon-btn menu-close" type="button" aria-label="<?= e($t['common']['close']) ?>" data-menu-close>
            <svg width="16" height="16" viewBox="0 0 16 16" aria-hidden="true">
              <path d="M3 3l10 10M13 3L3 13" stroke="currentColor" stroke-width="1.7" />
            </svg>
          </button>
        </div>
      </div>

      <nav class="menu-overlay-nav" aria-label="<?= e($t['common']['menu']) ?>">
        <a href="<?= e(url_path($lang)) ?>"><?= e($t['nav']['home']) ?></a>
        <?php foreach ($navPages as $item): ?>
          <a href="<?= e(url_path($lang, $item['slug'])) ?>"><?= e($t['nav'][$item['key']]) ?></a>
        <?php endforeach; ?>
      </nav>

      <div class="menu-cta">
        <?= button(url_path($lang, 'prayer'), $t['cta']['prayer'], 'gold') ?>
        <?= button(url_path($lang, 'new-here'), $t['cta']['visit'], 'line') ?>
      </div>
    </div>

    <main id="content" class="page-fade">
      <?= $content ?>
    </main>

    <?php if (!$hideMobileCta): ?>
      <div class="mobile-cta-bar" data-mobile-cta>
        <?= button(url_path($lang, 'prayer'), $t['cta']['prayer'], 'gold') ?>
      </div>
    <?php endif; ?>

    <footer class="footer">
      <div class="wrap footer-grid">
        <div class="footer-brand">
          <img class="logo-mark" src="<?= e($site['logo']) ?>" alt="<?= e($t['media']['altLogo']) ?>" width="44" height="44" decoding="async" />
          <div>
            <p class="footer-brand-name"><?= e($t['brand']['short']) ?></p>
            <p class="footer-brand-line"><?= e($t['brand']['line'] . ' ' . $t['brand']['ministry']) ?></p>
            <p class="seal-note"><?= e($t['footer']['tagline']) ?></p>
          </div>
        </div>

        <div>
          <h3><?= e($t['footer']['pages']) ?></h3>
          <ul>
            <li><a href="<?= e(url_path($lang)) ?>"><?= e($t['nav']['home']) ?></a></li>
            <li><a href="<?= e(url_path($lang, 'new-here')) ?>"><?= e($t['nav']['newHere']) ?></a></li>
            <li><a href="<?= e(url_path($lang, 'vision')) ?>"><?= e($t['nav']['vision']) ?></a></li>
            <li><a href="<?= e(url_path($lang, 'ministries')) ?>"><?= e($t['nav']['ministries']) ?></a></li>
            <li><a href="<?= e(url_path($lang, 'teachings')) ?>"><?= e($t['nav']['teachings']) ?></a></li>
          </ul>
        </div>

        <div>
          <h3><?= e($t['footer']['connect']) ?></h3>
          <ul>
            <li><a href="<?= e(url_path($lang, 'prayer')) ?>"><?= e($t['nav']['prayer']) ?></a></li>
            <li><a href="<?= e(url_path($lang, 'testimonies')) ?>"><?= e($t['nav']['testimonies']) ?></a></li>
            <li><a href="<?= e(url_path($lang, 'support')) ?>"><?= e($t['nav']['support']) ?></a></li>
            <li><a href="<?= e(url_path($lang, 'privacy')) ?>"><?= e($t['common']['privacy']) ?></a></li>
          </ul>
        </div>

        <div>
          <h3><?= e($t['common']['contact']) ?></h3>
          <ul class="contact-links">
            <li><a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></li>
            <li><a href="<?= e($site['website']) ?>" target="_blank" rel="noreferrer"><?= e($site['websiteLabel']) ?></a></li>
            <li><a href="tel:<?= e($site['phone']) ?>"><?= e($site['phoneLabel']) ?></a></li>
            <?php
            $whatsapp = null;
            foreach ($site['social'] as $socialItem) {
                if (($socialItem['id'] ?? '') === 'whatsapp' && !empty($socialItem['url']) && $socialItem['url'] !== '#') {
                    $whatsapp = $socialItem;
                    break;
                }
            }
            ?>
            <?php if ($whatsapp): ?>
              <li><a href="<?= e($whatsapp['url']) ?>" target="_blank" rel="noreferrer"><?= e($whatsapp['label']) ?></a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>

      <div class="wrap footer-bottom">
        <p>© <?= date('Y') ?> <?= e($t['footer']['copyright']) ?></p>
        <p><?= e($t['footer']['verify']) ?></p>
      </div>
    </footer>

    <script src="<?= e(asset('assets/js/site.js')) ?>" defer></script>
  </body>
</html>
