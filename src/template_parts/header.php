<?php

  $navMenuSettings = [
    'theme_location' => 'header-menu',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'container' => false
  ];

?>

<header class="o-container-section o-container-section--bordered o-container-header">
  <div class="c-header o-container-content">

      <div class="c-header__logo-container">
        <a href="/">
          <svg viewBox="0 0 150 28" style="display: inline-block; width: 150px; height: 28px;">
            <use xlink:href="<?= get_template_directory_uri() ?>/dist/svg/lighthouse-logo.svg#a"></use>
          </svg>
        </a>
      </div>

      <nav class="c-header__nav c-header__nav--desktop">
        <?php wp_nav_menu($navMenuSettings); ?>
      </nav>

  </div>
</header>
