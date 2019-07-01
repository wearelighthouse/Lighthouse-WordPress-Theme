<?php

  $navMenuSettings = [
    'theme_location' => 'header-menu',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'container' => false
  ];

?>

<header class="c-header">
  <div class="c-header__inner">
    <div class="c-header__logo-container">
      <a href="/">
        <img src="<?= get_template_directory_uri() ?>/dist/svg/lighthouse-logo.svg"/>
      </a>
    </div>
    <nav class="c-header__nav c-header__nav--desktop">
      <?php wp_nav_menu($navMenuSettings); ?>
    </nav>
  </div>
</header>
