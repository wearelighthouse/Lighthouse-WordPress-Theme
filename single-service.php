<?php


?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <?php $globalBlocksServiceGroup = getPostMeta('blocks_service_group') ?>
    <?php $globalBlocksServiceGrid = getPostMeta('blocks_service_grid_setting') ?>
    <?php include(locate_template('src/template_parts/block_section_service_grid.php')) ?>

    <?php $globalBlocksCaseStudyGroup = getPostMeta('service_blocks_case_study_group') ?>
    <?php $globalBlocksCaseStudyIntro = getPostMeta('service_blocks_case_study_intro') ?>
    <?php if ($globalBlocksCaseStudy) : ?>
      <div class="o-container-content">
        <h3 class="type-title">Ideas launched...</h3>
      </div>
      <?php include(locate_template('src/template_parts/block_section_case_study_small.php')) ?>
    <?php endif; ?>

    <?php include(locate_template('src/template_parts/contact_us_banner.php')) ?>

    <div class="placeholder" style="height: 100px;"></div>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>