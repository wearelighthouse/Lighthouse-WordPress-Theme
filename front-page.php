<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <?php $globalLinkBlocksService = getPostMeta('link_blocks_service_group') ?>
    <?php include(locate_template('src/template_parts/link_blocks_service_grid.php')) ?>

    <?php include(locate_template('src/template_parts/contact_us_banner.php')) ?>

    <?php $globalLinkBlocksCaseStudy = getPostMeta('link_blocks_case_study_group') ?>
    <?php includeTemplate('src/templates_parts/link_blocks_case_studies') ?>

    <div class="placeholder" style="height: 200px;"></div>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>