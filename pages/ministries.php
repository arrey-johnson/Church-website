<?php

declare(strict_types=1);

$metaTitle = page_title($t['nav']['ministries']);
$metaDescription = $t['ministries']['lead'];

$kicker = $t['ministries']['kicker'];
$title = $t['ministries']['title'];
$lead = $t['ministries']['lead'];
$align = 'left';
require __DIR__ . '/../includes/components/page-hero.php';
?>
<section class="section">
  <div class="wrap" style="display: grid; gap: 1rem">
    <?php foreach ($t['ministries']['items'] as $index => $item): ?>
      <?= reveal_open('ministry-row', 'article', 'left', $index * 80) ?>
        <div class="num"><?= e(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)) ?></div>
        <div>
          <h3><?= e($item['title']) ?></h3>
          <p><?= e($item['body']) ?></p>
        </div>
        <?= button(url_path($lang, $item['to']), $item['cta'], $index % 2 === 0 ? 'gold' : 'navy') ?>
      <?= reveal_close('article') ?>
    <?php endforeach; ?>
  </div>
</section>
