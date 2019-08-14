<?php
  $classes = $type ? 'c-link-block--' . $type : '';
  $icon = isset($linkBlock['icon']) ? $linkBlock['icon'] : false;
  $title = isset($linkBlock['title']) ? $linkBlock['title'] : '';
  $desc = isset($linkBlock['description']) ? $linkBlock['description'] : '';
  $linkText = isset($linkBlock['link_text']) ? $linkBlock['link_text'] : '';
  $linkURL = isset($linkBlock['link_url']) ? $linkBlock['link_url'] : '';
  $size = isset($linkBlock['size']) ? $linkBlock['size'] : '';
?>

<div class="c-link-block <?= $classes ?>">
  <?php if ($icon) : ?>
    <img class="c-link-block__service-logo" src="<?= $icon ?>"/>
  <?php endif; ?>
  <?php if ($title) : ?>
    <h3 class="c-link-block__title type-title">
      <?= $title ?>
    </h3>
  <?php endif; ?>
  <?php if ($desc) : ?>
    <div class="c-link-block__desc type-p">
      <?= wpautop($desc) ?>
    </div>
  <?php endif; ?>
  <?php if ($linkText && $linkURL) : ?>
    <a class="c-link-block__link c-button c-button--underlined-dark" href="<?= $linkURL ?>">
      <?= $linkText ?>
    </a>
  <?php endif; ?>
</div>