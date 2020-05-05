<?php
/*
Template name: Landing page
*/

  $globalBlocksServiceGroup = getPostMeta('service_single_blocks_service_group');
  $globalBlocksServiceLayout = getPostMeta('service_single_blocks_service_layout');
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-margin c-content-grid">
        <?php the_content(); ?>
      </div>
    </section>

    <?php include(locate_template('src/template_parts/block_section_services.php')) ?>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
