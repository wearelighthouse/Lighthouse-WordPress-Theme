<?php
  $icon = isset($service['icon']) ? $service['icon'] : false;
  $title = isset($service['title']) ? $service['title'] : '';
  $desc = isset($service['description']) ? $service['description'] : '';
  $linkText = isset($service['link_text']) ? $service['link_text'] : '';
  $linkURL = isset($service['link_url']) ? $service['link_url'] : '';
?>

<div class="c-link-block c-link-block--service">
  <?php if ($icon) : ?>
    <img class="c-link-block__icon" src="<?= $icon ?>"/>
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