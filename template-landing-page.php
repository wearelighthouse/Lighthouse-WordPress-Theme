<?php
/*
Template name: Landing ldap_control_paged_result
*/

  $globalBlocksServiceGroup = getPostMeta('service_single_blocks_service_group');
  $globalBlocksServiceLayout = getPostMeta('service_single_blocks_service_layout');
  $globalCaseStudyIds = getPostMeta('service_single_case_study_list_clients');
  $globalIntro = getPostMeta('service_single_case_study_list_title');
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>
    <?php include(locate_template('src/template_parts/block_section_services.php')) ?>

    <?php if ($globalCaseStudyIds) : ?>
      <?php include(locate_template('src/template_parts/block_section_case_study_small.php')) ?>
    <?php endif; ?>

    <?php include(locate_template('src/template_parts/contact_us_banner.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-margin c-content-grid">
        <?php the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
