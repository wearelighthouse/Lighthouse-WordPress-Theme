<?php

  $svgSpriteSheet = get_template_directory_uri() . '/dist/svg/sprites.svg';

?>


<div class="c-social-links">

  <?php if ($twitterURL) : ?>
    <a href="<?php $twitterURL ?>" class="c-social-links__link">
      <svg viewBox="0 0 40 40" style="display: inline-block; height: 40px; width: 40px;">
        <use xlink:href="<?= $svgSpriteSheet ?>#social--twitter"></use>
      </svg>
    </a>
  <?php endif; ?>

  <?php if ($facebookURL) : ?>
    <a href="<?php $facebookURL ?>" class="c-social-links__link">
      <svg viewBox="0 0 40 40" style="display: inline-block; height: 40px; width: 40px;">
        <use xlink:href="<?= $svgSpriteSheet ?>#social--facebook"></use>
      </svg>
    </a>
  <?php endif; ?>

  <?php if ($linkedInURL) : ?>
    <a href="<?php $linkedInURL ?>" class="c-social-links__link">
      <svg viewBox="0 0 40 40" style="display: inline-block; height: 40px; width: 40px;">
        <use xlink:href="<?= $svgSpriteSheet ?>#social--linkedin"></use>
      </svg>
    </a>
  <?php endif; ?>

  <?php if ($instagramURL) : ?>
    <a href="<?php $instagramURL ?>" class="c-social-links__link">
      <svg viewBox="0 0 40 40" style="display: inline-block; height: 40px; width: 40px;">
        <use xlink:href="<?= $svgSpriteSheet ?>#social--instagram"></use>
      </svg>
    </a>
  <?php endif; ?>

</div>
