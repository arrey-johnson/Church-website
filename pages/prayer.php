<?php

declare(strict_types=1);

$metaTitle = page_title($t['nav']['prayer']);
$metaDescription = $t['prayer']['lead'];

$kicker = $t['prayer']['kicker'];
$title = $t['prayer']['title'];
$lead = $t['prayer']['lead'];
$align = 'left';
require __DIR__ . '/../includes/components/page-hero.php';
?>
<section class="section">
  <div class="wrap split">
    <div style="display: grid; gap: 1rem">
      <?= reveal_open('info-card', 'article') ?>
        <h3><?= e($t['common']['confidential']) ?></h3>
        <p class="muted"><?= e($t['prayer']['timeframe']) ?></p>
        <div class="contact-links" style="margin-top: 0.9rem">
          <a href="mailto:<?= e($t['brand']['email']) ?>"><?= e($t['brand']['email']) ?></a>
          <a href="<?= e($t['brand']['websiteUrl']) ?>" target="_blank" rel="noreferrer"><?= e($t['brand']['website']) ?></a>
        </div>
      <?= reveal_close('article') ?>
      <?= reveal_open('soft-block', 'article', 'up', 100) ?>
        <h3><?= e($t['common']['contact']) ?></h3>
        <p class="muted"><?= e($t['prayer']['emergency']) ?></p>
      <?= reveal_close('article') ?>
    </div>
    <?= reveal_open('', 'div', 'up', 140) ?>
      <?php $kind = 'prayer'; require __DIR__ . '/../includes/components/form.php'; ?>
    <?= reveal_close() ?>
  </div>
</section>
