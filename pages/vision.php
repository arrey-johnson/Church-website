<?php

declare(strict_types=1);

$metaTitle = page_title($t['nav']['vision']);
$metaDescription = $t['vision']['lead'];

$kicker = $t['vision']['kicker'];
$title = $t['vision']['title'];
$lead = $t['vision']['lead'];
$align = 'center';
require __DIR__ . '/../includes/components/page-hero.php';
?>
<section class="section section-navy">
  <div class="wrap">
    <?= reveal_open() ?>
      <p class="kicker"><?= e($t['vision']['missionKicker']) ?></p>
      <h2><?= e($t['vision']['missionTitle']) ?></h2>
      <p class="lead" style="margin-top: 1rem; max-width: 46rem"><?= e($t['vision']['mission']) ?></p>
    <?= reveal_close() ?>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <?= reveal_open('section-head') ?>
      <p class="kicker"><?= e($t['vision']['beliefsKicker']) ?></p>
      <h2><?= e($t['vision']['beliefsTitle']) ?></h2>
    <?= reveal_close() ?>
    <div class="benefit-grid">
      <?php foreach ($t['vision']['beliefs'] as $index => $item): ?>
        <?= reveal_open('soft-block', 'article', 'up', $index * 70) ?>
          <div class="num"><?= e(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)) ?></div>
          <h3><?= e($item['title']) ?></h3>
          <p class="muted"><?= e($item['body']) ?></p>
        <?= reveal_close('article') ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-warm">
  <div class="wrap split">
    <?= reveal_open() ?>
      <p class="kicker"><?= e($t['vision']['leadKicker']) ?></p>
      <h2><?= e($t['vision']['leadTitle']) ?></h2>
      <p class="lead" style="margin-top: 1rem"><?= e($t['vision']['leadBody']) ?></p>
    <?= reveal_close() ?>
    <?= reveal_open('info-card', 'article', 'up', 120) ?>
      <h3><?= e($t['vision']['govTitle']) ?></h3>
      <p><?= e($t['vision']['govBody']) ?></p>
      <div class="contact-links" style="margin-top: 0.9rem">
        <a href="mailto:<?= e($t['brand']['email']) ?>"><?= e($t['brand']['email']) ?></a>
        <a href="<?= e($t['brand']['websiteUrl']) ?>" target="_blank" rel="noreferrer"><?= e($t['brand']['website']) ?></a>
      </div>
      <div class="hero-actions">
        <?= button(url_path($lang, 'prayer'), $t['cta']['prayer'], 'navy') ?>
      </div>
    <?= reveal_close('article') ?>
  </div>
</section>
