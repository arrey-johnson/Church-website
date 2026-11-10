<?php

declare(strict_types=1);

$metaTitle = page_title($t['nav']['support']);
$metaDescription = $t['support']['lead'];

$kicker = $t['support']['kicker'];
$title = $t['support']['title'];
$lead = $t['support']['lead'];
$align = 'center';
require __DIR__ . '/../includes/components/page-hero.php';
?>
<section class="section">
  <div class="wrap">
    <?= reveal_open('section-head') ?>
      <h2><?= e($t['support']['useTitle']) ?></h2>
    <?= reveal_close() ?>
    <div class="benefit-grid">
      <?php foreach ($t['support']['uses'] as $index => $item): ?>
        <?= reveal_open('soft-block', 'article', 'up', $index * 90) ?>
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
      <h2><?= e($t['support']['giveTitle']) ?></h2>
      <p class="lead" style="margin-top: 1rem"><?= e($t['support']['giveBody']) ?></p>
      <p class="quiet-note"><?= e($t['support']['giveNote']) ?></p>
    <?= reveal_close() ?>
    <?= reveal_open('info-card', 'article', 'up', 120) ?>
      <h3><?= e($t['support']['applyTitle']) ?></h3>
      <p class="muted"><?= e($t['support']['applyBody']) ?></p>
      <div class="hero-actions">
        <?= button(url_path($lang, 'prayer'), $t['cta']['prayer'], 'navy') ?>
      </div>
    <?= reveal_close('article') ?>
  </div>
</section>
