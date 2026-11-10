<?php

declare(strict_types=1);

$metaTitle = '404 | ' . $t['brand']['name'];
$metaDescription = $t['notFound']['body'];
?>
<div class="not-found">
  <div class="wrap">
    <p class="kicker">404</p>
    <h1><?= e($t['notFound']['title']) ?></h1>
    <p class="lead" style="margin-top: 1rem"><?= e($t['notFound']['body']) ?></p>
    <p style="margin-top: 1.4rem">
      <a href="<?= e(url_path($lang)) ?>"><?= e($t['common']['backHome']) ?></a>
    </p>
  </div>
</div>
