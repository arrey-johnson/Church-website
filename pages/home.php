<?php

declare(strict_types=1);

$metaTitle = $t['meta']['title'];
$metaDescription = $t['meta']['description'];

$churchSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Church',
    'name' => $t['brand']['name'],
    'description' => $t['meta']['description'],
    'url' => $site['website'],
    'email' => $site['email'],
    'image' => $site['logo'],
    'inLanguage' => $lang === 'fr' ? 'fr' : 'en',
];

$faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(static function (array $item): array {
        return [
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $item['a'],
            ],
        ];
    }, $t['home']['faqs']),
];

$benefitImages = [
    ['src' => $site['images']['teaching'], 'alt' => $t['media']['altTeaching']],
    ['src' => $site['images']['prayer'], 'alt' => $t['media']['altPrayer']],
    ['src' => $site['images']['worship'], 'alt' => $t['media']['altWorship']],
    ['src' => $site['images']['message'], 'alt' => $t['media']['altMessage']],
];

$momentImages = [
    ['src' => $site['images']['teaching'], 'alt' => $t['media']['altTeaching'], 'wide' => false],
    ['src' => $site['images']['prayer'], 'alt' => $t['media']['altPrayer'], 'wide' => false],
    ['src' => $site['images']['leader'], 'alt' => $t['media']['altLeader'], 'wide' => true],
    ['src' => $site['images']['worship'], 'alt' => $t['media']['altWorship'], 'wide' => false],
    ['src' => $site['images']['message'], 'alt' => $t['media']['altMessage'], 'wide' => false],
];
?>
<script type="application/ld+json"><?= json_encode($churchSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
<script type="application/ld+json"><?= json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>

<section class="hero hero-slider" data-hero-slider aria-roledescription="carousel" aria-label="<?= e($t['home']['sliderLabel']) ?>">
  <div class="hero-slides" aria-hidden="true">
    <?php foreach ($site['heroSlides'] as $index => $slide): ?>
      <figure class="hero-slide<?= $index === 0 ? ' is-active' : '' ?>" data-hero-slide>
        <img
          src="<?= e($slide['src']) ?>"
          alt="<?= e($t['media'][$slide['altKey']]) ?>"
          width="1920"
          height="1080"
          decoding="<?= $index === 0 ? 'sync' : 'async' ?>"
          <?= $index === 0 ? 'fetchpriority="high"' : 'loading="lazy"' ?>
        />
      </figure>
    <?php endforeach; ?>
  </div>
  <div class="hero-veil" aria-hidden="true"></div>

  <div class="wrap hero-content">
    <div class="hero-copy">
      <h1 class="hero-enter" style="--enter-delay: 0ms"><?= e($t['brand']['name']) ?></h1>
      <p class="hero-quote hero-enter" style="--enter-delay: 100ms"><?= e($t['home']['quote']) ?></p>
      <div class="hero-actions hero-enter" style="--enter-delay: 180ms">
        <?= button(url_path($lang, 'prayer'), $t['cta']['prayer']) ?>
        <?= button(url_path($lang, 'new-here'), $t['cta']['visit'], 'line') ?>
      </div>
    </div>

    <div class="hero-controls hero-enter" style="--enter-delay: 260ms">
      <div class="hero-dots" role="tablist" aria-label="<?= e($t['home']['sliderLabel']) ?>">
        <?php foreach ($site['heroSlides'] as $index => $slide): ?>
          <button
            type="button"
            class="hero-dot<?= $index === 0 ? ' is-active' : '' ?>"
            role="tab"
            aria-selected="<?= $index === 0 ? 'true' : 'false' ?>"
            aria-label="<?= e($t['home']['slideLabel'] . ' ' . ($index + 1)) ?>"
            data-hero-dot="<?= $index ?>"
          ></button>
        <?php endforeach; ?>
      </div>
      <div class="hero-progress" aria-hidden="true"><span data-hero-progress></span></div>
    </div>
  </div>
</section>

<section class="section home-welcome">
  <div class="wrap home-welcome-grid">
    <?= reveal_open('home-welcome-copy', 'div', 'left') ?>
      <p class="kicker"><?= e($t['home']['problemKicker']) ?></p>
      <h2><?= e($t['home']['problemTitle']) ?></h2>
      <p class="lead"><?= e($t['home']['problemBody']) ?></p>
      <div class="home-inline-actions">
        <?= button(url_path($lang, 'prayer'), $t['cta']['prayer'], 'navy') ?>
        <?= button(url_path($lang, 'new-here'), $t['cta']['visit'], 'line') ?>
      </div>
    <?= reveal_close() ?>
    <?= reveal_open('home-welcome-media', 'figure', 'fade', 120) ?>
      <img
        src="<?= e($site['images']['leader']) ?>"
        alt="<?= e($t['media']['altLeader']) ?>"
        width="900"
        height="1100"
        loading="lazy"
        decoding="async"
      />
    <?= reveal_close('figure') ?>
  </div>
</section>

<section class="home-banner">
  <img
    class="home-banner-media"
    src="<?= e($site['images']['worship']) ?>"
    alt="<?= e($t['media']['altWorship']) ?>"
    width="1600"
    height="900"
    loading="lazy"
    decoding="async"
  />
  <div class="home-banner-veil" aria-hidden="true"></div>
  <div class="wrap home-banner-copy">
    <?= reveal_open('', 'div', 'up') ?>
      <p class="kicker"><?= e($t['home']['solutionKicker']) ?></p>
      <h2><?= e($t['home']['solutionTitle']) ?></h2>
      <p class="lead"><?= e($t['home']['solutionBody']) ?></p>
    <?= reveal_close() ?>
  </div>
</section>

<section class="section home-benefits">
  <div class="wrap">
    <?= reveal_open('section-head section-head-center') ?>
      <p class="kicker"><?= e($t['home']['benefitsKicker']) ?></p>
      <h2><?= e($t['home']['benefitsTitle']) ?></h2>
    <?= reveal_close() ?>

    <div class="home-benefit-list">
      <?php foreach ($t['home']['benefits'] as $index => $item): ?>
        <?php $image = $benefitImages[$index] ?? $benefitImages[0]; ?>
        <?= reveal_open('home-benefit' . ($index % 2 === 1 ? ' is-reversed' : ''), 'article', $index % 2 === 1 ? 'left' : 'up', $index * 70) ?>
          <figure class="home-benefit-media">
            <img
              src="<?= e($image['src']) ?>"
              alt="<?= e($image['alt']) ?>"
              width="720"
              height="540"
              loading="lazy"
              decoding="async"
            />
          </figure>
          <div class="home-benefit-copy">
            <div class="num"><?= e($item['n']) ?></div>
            <h3><?= e($item['title']) ?></h3>
            <p><?= e($item['body']) ?></p>
          </div>
        <?= reveal_close('article') ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-warm home-path">
  <div class="wrap">
    <?= reveal_open('section-head section-head-center') ?>
      <p class="kicker"><?= e($t['home']['processKicker']) ?></p>
      <h2><?= e($t['home']['processTitle']) ?></h2>
    <?= reveal_close() ?>
    <ol class="home-path-list">
      <?php foreach ($t['home']['process'] as $index => $item): ?>
        <?= reveal_open('home-path-step', 'li', 'scale', $index * 100) ?>
          <span class="home-path-index"><?= e($item['n']) ?></span>
          <h3><?= e($item['title']) ?></h3>
          <p><?= e($item['body']) ?></p>
        <?= reveal_close('li') ?>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<section class="section home-moments">
  <div class="wrap">
    <?= reveal_open('home-moments-intro') ?>
      <p class="kicker"><?= e($t['media']['momentsKicker']) ?></p>
      <h2><?= e($t['media']['momentsTitle']) ?></h2>
      <p class="lead"><?= e($t['media']['momentsBody']) ?></p>
    <?= reveal_close() ?>

    <div class="home-moments-grid">
      <?php foreach ($momentImages as $index => $moment): ?>
        <?= reveal_open('home-moment' . (!empty($moment['wide']) ? ' is-wide' : ''), 'figure', 'fade', $index * 60) ?>
          <img
            src="<?= e($moment['src']) ?>"
            alt="<?= e($moment['alt']) ?>"
            width="<?= !empty($moment['wide']) ? '1200' : '700' ?>"
            height="<?= !empty($moment['wide']) ? '700' : '850' ?>"
            loading="lazy"
            decoding="async"
          />
        <?= reveal_close('figure') ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section home-proof">
  <div class="wrap home-proof-grid">
    <?= reveal_open('home-proof-media', 'figure') ?>
      <img
        src="<?= e($site['images']['prayer']) ?>"
        alt="<?= e($t['media']['altPrayer']) ?>"
        width="900"
        height="1100"
        loading="lazy"
        decoding="async"
      />
    <?= reveal_close('figure') ?>
    <?= reveal_open('home-proof-copy', 'div', 'fade', 100) ?>
      <p class="kicker"><?= e($t['home']['proofKicker']) ?></p>
      <h2><?= e($t['home']['proofTitle']) ?></h2>
      <p class="lead"><?= e($t['home']['proofBody']) ?></p>
      <div class="home-inline-actions">
        <?= button(url_path($lang, 'testimonies'), $t['cta']['story'], 'navy') ?>
      </div>
    <?= reveal_close() ?>
  </div>
</section>

<section class="section section-warm home-faq">
  <div class="wrap home-faq-grid">
    <?= reveal_open('section-head') ?>
      <p class="kicker"><?= e($t['home']['faqKicker']) ?></p>
      <h2><?= e($t['home']['faqTitle']) ?></h2>
    <?= reveal_close() ?>
    <?= reveal_open('', 'div', 'up', 100) ?>
      <div class="faq-list">
        <?php foreach ($t['home']['faqs'] as $index => $item): ?>
          <div class="faq-item<?= $index === 0 ? ' is-open' : '' ?>" data-faq-item>
            <button type="button" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" data-faq-toggle>
              <strong><?= e($item['q']) ?></strong>
              <span class="sign" aria-hidden="true"><?= $index === 0 ? '–' : '+' ?></span>
            </button>
            <div class="answer-wrap" aria-hidden="<?= $index === 0 ? 'false' : 'true' ?>">
              <p class="answer"><?= e($item['a']) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?= reveal_close() ?>
  </div>
</section>

<section class="home-close">
  <img
    class="home-close-media"
    src="<?= e($site['images']['message']) ?>"
    alt="<?= e($t['media']['altMessage']) ?>"
    width="1600"
    height="900"
    loading="lazy"
    decoding="async"
  />
  <div class="home-close-veil" aria-hidden="true"></div>
  <div class="wrap home-close-copy">
    <?= reveal_open('', 'div', 'scale') ?>
      <p class="kicker"><?= e($t['home']['closeKicker']) ?></p>
      <h2><?= e($t['home']['closeTitle']) ?></h2>
      <p class="lead"><?= e($t['home']['closeBody']) ?></p>
      <div class="home-inline-actions">
        <?= button(url_path($lang, 'prayer'), $t['cta']['prayer']) ?>
        <?= button(url_path($lang, 'new-here'), $t['cta']['visit'], 'line') ?>
        <?= button(url_path($lang, 'teachings'), $t['common']['readTeachings'], 'ghost') ?>
      </div>
    <?= reveal_close() ?>
  </div>
</section>
