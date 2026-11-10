<?php

declare(strict_types=1);

$metaTitle = page_title($t['common']['privacy']);
$metaDescription = $t['privacy']['lead'];

$kicker = $t['privacy']['kicker'];
$title = $t['privacy']['title'];
$lead = $t['privacy']['lead'];
$align = 'left';
require __DIR__ . '/../includes/components/page-hero.php';
?>
<section class="section">
  <div class="wrap" style="display: grid; gap: 1rem">
    <?php foreach ($t['privacy']['sections'] as $index => $item): ?>
      <?= reveal_open('soft-block', 'article', 'up', $index * 70) ?>
        <h3><?= e($item['title']) ?></h3>
        <p class="muted"><?= e($item['body']) ?></p>
      <?= reveal_close('article') ?>
    <?php endforeach; ?>
  </div>
</section>
