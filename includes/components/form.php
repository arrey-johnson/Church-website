<?php

declare(strict_types=1);

/**
 * @var string $kind prayer|visit|story
 * @var array $t
 * @var string $lang
 */

$status = handle_form_post($kind);
$copy = $t['prayer'];
$success = $kind === 'visit' ? $copy['successVisit'] : ($kind === 'story' ? $copy['successStory'] : $copy['successPrayer']);
$submit = $kind === 'visit' ? $copy['submitVisit'] : ($kind === 'story' ? $copy['submitStory'] : $copy['submitPrayer']);
?>
<form class="form-card" method="post" action="" novalidate data-ministry-form data-kind="<?= e($kind) ?>">
  <input type="hidden" name="form_kind" value="<?= e($kind) ?>" />
  <p class="kicker"><?= e($t['common']['confidential']) ?></p>
  <?php if ($status === 'success'): ?>
    <p class="form-success"><?= e($success) ?></p>
  <?php endif; ?>
  <?php if ($status === 'error'): ?>
    <p class="form-error"><?= e($t['common']['error']) ?></p>
  <?php endif; ?>
  <p class="form-success" data-form-success hidden><?= e($success) ?></p>
  <p class="form-error" data-form-error hidden><?= e($t['common']['error']) ?></p>

  <div class="form-grid" style="margin-top: 1rem">
    <label>
      <span><?= e($copy['fields']['name']) ?> (<?= e($t['common']['required']) ?>)</span>
      <input name="name" autocomplete="name" placeholder="<?= e($copy['placeholders']['name']) ?>" required />
    </label>
    <label>
      <span><?= e($copy['fields']['contact']) ?> (<?= e($t['common']['required']) ?>)</span>
      <input name="contact" autocomplete="email" placeholder="<?= e($copy['placeholders']['contact']) ?>" required />
    </label>

    <?php if ($kind === 'visit'): ?>
      <label>
        <span><?= e($copy['fields']['visitMode']) ?></span>
        <select name="mode">
          <option value="in-person"><?= e($copy['fields']['inPerson']) ?></option>
          <option value="online"><?= e($copy['fields']['online']) ?></option>
          <option value="either" selected><?= e($copy['fields']['either']) ?></option>
        </select>
      </label>
      <label>
        <span><?= e($copy['fields']['date']) ?> (<?= e($t['common']['optional']) ?>)</span>
        <input name="date" placeholder="<?= e($copy['placeholders']['date']) ?>" />
      </label>
      <label>
        <span><?= e($copy['fields']['message']) ?> (<?= e($t['common']['required']) ?>)</span>
        <textarea name="message" placeholder="<?= e($copy['placeholders']['message']) ?>" required></textarea>
      </label>
    <?php endif; ?>

    <?php if ($kind === 'prayer'): ?>
      <label>
        <span><?= e($copy['fields']['request']) ?> (<?= e($t['common']['required']) ?>)</span>
        <textarea name="request" placeholder="<?= e($copy['placeholders']['request']) ?>" required></textarea>
      </label>
    <?php endif; ?>

    <?php if ($kind === 'story'): ?>
      <label>
        <span><?= e($copy['fields']['story']) ?> (<?= e($t['common']['required']) ?>)</span>
        <textarea name="story" placeholder="<?= e($copy['placeholders']['story']) ?>" required></textarea>
      </label>
      <label>
        <span><?= e($copy['fields']['display']) ?> (<?= e($t['common']['optional']) ?>)</span>
        <input name="display" placeholder="<?= e($copy['placeholders']['display']) ?>" />
      </label>
    <?php endif; ?>

    <label class="check">
      <input name="consent" type="checkbox" required />
      <span>
        <?= e($copy['fields']['consent']) ?>
        <a href="<?= e(url_path($lang, 'privacy')) ?>"><?= e($t['common']['privacy']) ?></a>
      </span>
    </label>

    <?= button('#', $submit, 'gold', 'button') ?>
  </div>
</form>
