<?php
  // Get <head>, WordPress stuff, opening <body>
  get_header();

  $globalBlocksServiceGroup = getPostMeta('service_single_blocks_service_group');
  $globalBlocksServiceLayout = getPostMeta('service_single_blocks_service_layout');
  $globalCaseStudyIds = getPostMeta('service_single_case_study_list');
  $globalIntro = 'Ideas launched...';

  // Get the actual site header
  get_template_part('src/template_parts/header');
?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>
    <?php include(locate_template('src/template_parts/block_section_services.php')) ?>

    <?php if ($globalCaseStudyIds) : ?>
      <div class="o-container-content">
        <h3 class="type-title">Ideas launched...</h3>
      </div>
      <?php include(locate_template('src/template_parts/block_section_case_study_small.php')) ?>
    <?php endif; ?>

    <?php include(locate_template('src/template_parts/contact_us_banner.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content c-content-grid">
        <?php the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>