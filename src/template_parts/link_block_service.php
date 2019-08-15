<?php
  $icon = isset($service['icon']) ? $service['icon'] : false;
  $title = isset($service['title']) ? $service['title'] : '';
  $desc = isset($service['description']) ? $service['description'] : '';
  $linkText = isset($service['link_text']) ? $service['link_text'] : '';
  $linkURL = isset($service['link_url']) ? $service['link_url'] : '';
?>

<div class="c-service-block">
  <?php if ($icon) : ?>
    <img class="c-service-block__icon" src="<?= $icon ?>"/>
  <?php endif; ?>
  <?php if ($title) : ?>
    <h3 class="c-service-block__title type-title">
      <?= $title ?>
    </h3>
  <?php endif; ?>
  <?php if ($desc) : ?>
    <div class="c-service-block__desc type-p">
      <?= wpautop($desc) ?>
    </div>
  <?php endif; ?>
  <?php if ($linkText && $linkURL) : ?>
    <a class="c-service-block__link c-button c-button--underlined-dark" href="<?= $linkURL ?>">
      <?= $linkText ?>
    </a>
  <?php endif; ?>
</div>