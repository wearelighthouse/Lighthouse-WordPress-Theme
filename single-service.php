<?php

  $globalBlocksServiceGroup = getPostMeta('service_single_blocks_service_group');
  $globalBlocksServiceLayout = getPostMeta('service_single_blocks_service_layout');
  $globalCaseStudyIds = getPostMeta('service_single_case_study_list');
  $globalIntro = 'Ideas launched...';

?>

<?php get_header(); ?>

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

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>