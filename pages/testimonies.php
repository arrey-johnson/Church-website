<?php

declare(strict_types=1);

$metaTitle = page_title($t['nav']['testimonies']);
$metaDescription = $t['testimonies']['lead'];

$kicker = $t['testimonies']['kicker'];
$title = $t['testimonies']['title'];
$lead = $t['testimonies']['lead'];
$align = 'center';
require __DIR__ . '/../includes/components/page-hero.php';
?>
<section class="section">
  <div class="wrap">
    <?= reveal_open('section-head') ?>
      <h2><?= e($t['testimonies']['policyTitle']) ?></h2>
    <?= reveal_close() ?>
    <ul class="list-plain policy-list">
      <?php foreach ($t['testimonies']['policy'] as $item): ?>
        <li><?= e($item) ?></li>
      <?php endforeach; ?>
    </ul>
    <p class="quiet-note"><?= e($t['testimonies']['awaitBody']) ?></p>
  </div>
</section>

<section class="section section-warm">
  <div class="wrap split">
    <?= reveal_open('section-head') ?>
      <h2><?= e($t['testimonies']['formTitle']) ?></h2>
      <p class="lead" style="margin-top: 1rem"><?= e($t['testimonies']['formLead']) ?></p>
    <?= reveal_close() ?>
    <?= reveal_open('', 'div', 'up', 120) ?>
      <?php $kind = 'story'; require __DIR__ . '/../includes/components/form.php'; ?>
    <?= reveal_close() ?>
  </div>
</section>
