<?php
  /* Template Name: Beacon Landing */
  $email = get_query_var( 'email' );
  $company = get_query_var( 'company' );
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>
    <?php include(locate_template('src/template_parts/hero_beacon_landing.php')) ?>

    <?php if (get_the_content()): ?>
      <section class="o-container-section o-container-section--bordered">
        <div class="o-container-content o-container-content--v-margin c-content-grid">
          <?php the_content(); ?>
        </div>
      </section>
    <?php endif; ?>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
