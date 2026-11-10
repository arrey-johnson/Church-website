<?php

declare(strict_types=1);

/**
 * @var string $kicker
 * @var string $title
 * @var string|null $lead
 * @var string $align
 */

$align = $align ?? 'left';
$lead = $lead ?? null;
?>
<section class="page-hero<?= $align === 'center' ? ' is-centered' : '' ?>">
  <div class="wrap">
    <p class="kicker hero-enter" style="--enter-delay: 0ms"><?= e($kicker) ?></p>
    <h1 class="hero-enter" style="--enter-delay: 80ms"><?= e($title) ?></h1>
    <?php if ($lead): ?>
      <p class="lead hero-enter" style="--enter-delay: 160ms; margin-top: 1rem"><?= e($lead) ?></p>
    <?php endif; ?>
  </div>
</section>
