<?php

  $svgSpriteSheet = get_template_directory_uri() . '/dist/svg/sprites.svg';
  $class = $socialLinksStyle ? 'c-social-links--' . $socialLinksStyle : '';

?>

<?php if (isset($socials) && !empty($socials)) : ?>
  <div class="c-social-links <?= $class ?>">

    <?php foreach($socials as $social) : ?>
      <?php if ($social['type'] && $social['link']) : ?>
        <a href="<?= $social['link'] ?>" class="c-social-links__link">
          <svg viewBox="0 0 40 40" style="display: inline-block; height: 40px; width: 40px;">
            <use xlink:href="<?= $svgSpriteSheet ?>#social--<?= strToLower($social['type']) ?>"></use>
          </svg>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>

  </div>
<?php endif; ?>
