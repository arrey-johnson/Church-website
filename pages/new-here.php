<?php

declare(strict_types=1);

$metaTitle = page_title($t['nav']['newHere']);
$metaDescription = $t['newHere']['lead'];

$kicker = $t['newHere']['kicker'];
$title = $t['newHere']['title'];
$lead = $t['newHere']['lead'];
$align = 'left';
require __DIR__ . '/../includes/components/page-hero.php';
?>
<section class="section">
  <div class="wrap">
    <?= reveal_open('section-head') ?>
      <h2><?= e($t['newHere']['expectTitle']) ?></h2>
    <?= reveal_close() ?>
    <div class="benefit-grid">
      <?php foreach ($t['newHere']['expect'] as $index => $item): ?>
        <?= reveal_open('soft-block', 'article', 'up', $index * 90) ?>
          <h3><?= e($item['title']) ?></h3>
          <p class="muted"><?= e($item['body']) ?></p>
        <?= reveal_close('article') ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-warm">
  <div class="wrap">
    <?= reveal_open('section-head') ?>
      <h2><?= e($t['newHere']['practicalTitle']) ?></h2>
      <p class="lead" style="margin-top: 0.85rem"><?= e($t['newHere']['practicalLead']) ?></p>
    <?= reveal_close() ?>
    <div class="detail-list">
      <?= reveal_open('soft-block', 'article') ?>
        <h3><?= e($t['newHere']['timesLabel']) ?></h3>
        <p class="muted"><?= e($t['newHere']['timesBody']) ?></p>
      <?= reveal_close('article') ?>
      <?= reveal_open('soft-block', 'article', 'up', 80) ?>
        <h3><?= e($t['newHere']['placeLabel']) ?></h3>
        <p class="muted"><?= e($t['newHere']['placeBody']) ?></p>
      <?= reveal_close('article') ?>
      <?= reveal_open('soft-block', 'article', 'up', 160) ?>
        <h3><?= e($t['newHere']['onlineLabel']) ?></h3>
        <p class="muted"><?= e($t['newHere']['onlineBody']) ?></p>
        <div class="contact-links" style="margin-top: 0.8rem">
          <a href="mailto:<?= e($t['brand']['email']) ?>"><?= e($t['brand']['email']) ?></a>
          <a href="<?= e($t['brand']['websiteUrl']) ?>" target="_blank" rel="noreferrer"><?= e($t['brand']['website']) ?></a>
        </div>
      <?= reveal_close('article') ?>
    </div>
    <div class="hero-actions" style="margin-top: 1.6rem">
      <?= button(url_path($lang, 'prayer'), $t['cta']['prayer'], 'navy') ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap split">
    <?= reveal_open('section-head') ?>
      <h2><?= e($t['newHere']['visitTitle']) ?></h2>
      <p class="lead" style="margin-top: 1rem"><?= e($t['newHere']['visitLead']) ?></p>
    <?= reveal_close() ?>
    <?= reveal_open('', 'div', 'up', 120) ?>
      <?php $kind = 'visit'; require __DIR__ . '/../includes/components/form.php'; ?>
    <?= reveal_close() ?>
  </div>
</section>
