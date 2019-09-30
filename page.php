<?php
  // Get <head>, WordPress stuff, opening <body>
  get_header();

  // Get the actual site header
  get_template_part('src/template_parts/header');
?>

<main>
  <?php while (have_posts()) : the_post(); ?>
    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content c-content-grid">
        <?php the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
