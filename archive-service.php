<?php
  $caseStudyIds = getPostMeta('service_archive_case_study_list_clients', $post->ID);
  $introText = getPostMeta('service_archive_home_intro_text');
  $blockServices = getPostMeta('service_archive_block_services_group');
  $globalBlocksServiceLayout = getPostMeta('service_archive_block_services_layout');
  $globalBlocksServiceGroup = getPostMeta('service_single_block_services_group');
?>

<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>
    
  <?php if ($blockServices) : ?>
    <?php $globalBlocksServiceGroup = $blockServices; ?>
      <?php include(locate_template('src/template_parts/service_section_category.php')) ?>
  <?php endif; ?>

  <?php include(locate_template('src/template_parts/service_collaboration.php')) ?>

  <?php include(locate_template('src/template_parts/service_client_testimonial.php')) ?>

  <?php include(locate_template('src/template_parts/service_intro.php')) ?>

  <?php if ($caseStudyIds) : ?>
    <?php $globalCaseStudyIds = $caseStudyIds ?>
      <?php include(locate_template('src/template_parts/service_section_case_study.php')) ?>
  <?php endif; ?>

  <section class="o-container-section o-container-section--h-bordered">
    <div class="c-service__form o-container-content">
      <?php $newsletterFormId = RGFormsModel::get_form_id('Newsletter'); ?>
        <?= do_shortcode('[form id="' . $newsletterFormId . '"]') ?>
    </din>
  </section>
      
</main>

<?php get_footer(); ?>
