
<div class="c-social-links">

  <?php if ($twitterURL) : ?>
    <a href="<?php $twitterURL ?>">
      <svg viewBox="0 0 20 20" style="display: inline; height: 20px; width: 20px;">
        <use xlink:href="<?= get_template_directory_uri() ?>/dist/svg/sprite.svg#twitter"></use>
      </svg>
    </a>
  <?php endif; ?>

  <?php if ($facebookURL) : ?>
    <a href="<?php $facebookURL ?>">
      <svg viewBox="0 0 20 20" style="display: inline; height: 20px; width: 20px;">
        <use xlink:href="<?= get_template_directory_uri() ?>/dist/svg/sprite.svg#facebook"></use>
      </svg>
    </a>
  <?php endif; ?>

  <?php if ($linkedInURL) : ?>
    <a href="<?php $linkedInURL ?>">
      <svg viewBox="0 0 20 20" style="display: inline; height: 20px; width: 20px;">
        <use xlink:href="<?= get_template_directory_uri() ?>/dist/svg/sprite.svg#linkedin"></use>
      </svg>
    </a>
  <?php endif; ?>

  <?php if ($instagramURL) : ?>
    <a href="<?php $instagramURL ?>">
      <svg viewBox="0 0 20 20" style="display: inline; height: 20px; width: 20px;">
        <use xlink:href="<?= get_template_directory_uri() ?>/dist/svg/sprite.svg#instagram"></use>
      </svg>
    </a>
  <?php endif; ?>

</div>
