<?php
  // Get <head>, WordPress stuff, opening <body>
  get_header();

  // Get the actual site header
  get_template_part('src/template_parts/header');
?>

<main>
  <?php // 1px padding-bottom gets rid of the "double" borders between header & footer, w/tiny extra space. ?>
  <section class="o-container-section o-container-section--bordered" style="padding-bottom: unset">
    <div class="c-hero c-hero--orange-pink">
      <div class="c-hero__background"></div>
      <div class="o-container-content o-container-content--v-pad c-hero__content">
        <div class="c-hero__text s-banner">
          <h1>404</h1>
          <h5>This page cannot be found :(</h5>
          <p>Return to our <a href="/" class="u-underlined">homepage👉</a></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
