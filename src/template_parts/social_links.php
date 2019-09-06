<?php

  $svgSpriteSheet = get_template_directory_uri() . '/dist/svg/sprites.svg';
  $class = $socialLinksStyle ? 'c-social-links--' . $socialLinksStyle : '';

?>


<div class="c-social-links <?= $class ?>">

  <?php if ($twitterURL) : ?>
    <a href="<?= $twitterURL ?>" class="c-social-links__link">
      <svg viewBox="0 0 40 40" style="display: inline-block; height: 40px; width: 40px;">
        <use xlink:href="<?= $svgSpriteSheet ?>#social--twitter"></use>
      </svg>
    </a>
  <?php endif; ?>

  <?php if ($facebookURL) : ?>
    <a href="<?= $facebookURL ?>" class="c-social-links__link c-social-links__link--facebook">
      <svg viewBox="0 0 40 40" style="display: inline-block; height: 40px; width: 40px;">
        <use xlink:href="<?= $svgSpriteSheet ?>#social--facebook"></use>
      </svg>
    </a>
  <?php endif; ?>

  <?php if ($linkedInURL) : ?>
    <a href="<?= $linkedInURL ?>" class="c-social-links__link">
      <svg viewBox="0 0 40 40" style="display: inline-block; height: 40px; width: 40px;">
        <use xlink:href="<?= $svgSpriteSheet ?>#social--linkedin"></use>
      </svg>
    </a>
  <?php endif; ?>

  <?php if ($instagramURL) : ?>
    <a href="<?= $instagramURL ?>" class="c-social-links__link">
      <svg viewBox="0 0 40 40" style="display: inline-block; height: 40px; width: 40px;">
        <use xlink:href="<?= $svgSpriteSheet ?>#social--instagram"></use>
      </svg>
    </a>
  <?php endif; ?>

</div>
