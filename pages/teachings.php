<?php

declare(strict_types=1);

$metaTitle = page_title($t['nav']['teachings']);
$metaDescription = $t['teachings']['lead'];

$kicker = $t['teachings']['kicker'];
$title = $t['teachings']['title'];
$lead = $t['teachings']['lead'];
$align = 'center';
require __DIR__ . '/../includes/components/page-hero.php';

$kinds = ['all', 'video', 'audio', 'article'];
?>
<section class="section">
  <div class="wrap">
    <?= reveal_open('search-row') ?>
      <input
        type="search"
        placeholder="<?= e($t['teachings']['search']) ?>"
        aria-label="<?= e($t['teachings']['search']) ?>"
        data-teach-search
      />
      <div class="chips" role="group" aria-label="<?= e($t['teachings']['search']) ?>">
        <?php foreach ($kinds as $kind): ?>
          <button type="button" class="<?= $kind === 'all' ? 'active' : '' ?>" data-teach-filter="<?= e($kind) ?>">
            <?= e($t['teachings']['filters'][$kind]) ?>
          </button>
        <?php endforeach; ?>
      </div>
    <?= reveal_close() ?>

    <p class="muted" data-teach-empty hidden><?= e($t['teachings']['empty']) ?></p>

    <div class="teach-grid">
      <?php foreach ($t['teachings']['items'] as $index => $item): ?>
        <?php
        $search = $item['title'] . ' ' . $item['theme'] . ' ' . $item['excerpt'];
        $delay = $index * 70;
        ?>
        <article
          class="reveal reveal-up card soft-card"
          style="transition-delay: <?= (int) $delay ?>ms"
          data-teach-card
          data-kind="<?= e($item['kind']) ?>"
          data-search="<?= e($search) ?>"
        >
          <span class="badge"><?= e($item['kind']) ?></span>
          <h3 style="margin-top: 0.85rem"><?= e($item['title']) ?></h3>
          <p class="muted"><?= e($item['excerpt']) ?></p>
          <p class="muted" style="margin-top: 0.9rem; font-size: 0.88rem">
            <?= e($item['theme']) ?> · <?= e($t['teachings']['speakerPending']) ?> · <?= e($t['teachings']['datePending']) ?>
          </p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
