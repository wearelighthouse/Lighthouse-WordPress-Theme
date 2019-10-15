<?php

  $svgSpriteSheet = get_template_directory_uri() . '/dist/svg/sprites.svg';

?>

<?php if (isset($socials) && !empty($socials) && isset($socials[0]['link'])) : ?>
  <div class="o-social-links">

    <?php foreach($socials as $social) : ?>
      <?php if (isset($social['type']) && isset($social['link'])) : ?>
        <?php $label = ($socialLinksLabel ?: '') . ' ' . ucfirst($social['type']); ?>
        <a href="<?= $social['link'] ?>"
           class="c-social-link c-social-link--<?= $socialLinksStyle ?>"
           aria-label="<?= $label ?>">
          <svg viewBox="0 0 40 40" style="display: block; height: 40px; width: 40px;">
            <use xlink:href="<?= $svgSpriteSheet ?>#icon--<?= strToLower($social['type']) ?>"></use>
          </svg>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>

  </div>
<?php endif; ?>
