<?php

  $navMenuSettings = [
    'theme_location' => 'header-menu',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'container' => false
  ];

  $heroStyle = getPostMeta('hero_hero_style');
  $headerStyle = (strpos($heroStyle, 'gray') !== false || is_singular('post') || is_singular('transcript')) ? ' u-color-blackcurrant' : ' u-color-white';

?>

<header class="c-header js-header">
  <div class="c-header__mobile-bg" style="display: none"></div>

  <div class="c-header__inner o-container-content <?= $headerStyle ?> ">

    <a href="/" class="c-header__home-link" aria-label="Home">
      <svg viewBox="0 0 150 38" style="display: block; width: 150px; height: 38px;">
        <use xlink:href="<?= get_template_directory_uri() ?>/dist/svg/lighthouse-logo.svg#a"></use>
      </svg>
    </a>

    <nav class="c-header__nav c-header__nav--desktop">
      <?php wp_nav_menu($navMenuSettings); ?>
    </nav>

    <button role="switch"
            class="c-menu-button c-menu-button--lines js-menu-button"
            aria-checked="false"
            aria-label="Open Menu">
    </button>

  </div>
</header>
