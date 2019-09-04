<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <?php $globalBlocksServiceGroup = getPostMeta('blocks_service_group') ?>
    <?php $globalBlocksServiceGrid = getPostMeta('blocks_service_grid_setting') ?>
    <?php include(locate_template('src/template_parts/block_section_service_grid.php')) ?>

    <?php include(locate_template('src/template_parts/contact_us_banner.php')) ?>

    <?php
      $caseStudies = getPostMeta('front_page_case_study_list_client', $post->ID);
      foreach ($caseStudies as $caseStudyId) {
      $caseStudySize = 'large';
      include(locate_template('src/template_parts/block_case_study.php'));
    }
    ?>

    <div class="placeholder" style="height: 200px;"></div>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
