<?php
  $post = get_page_by_title('services');
  $caseStudyIds = getPostMeta('service_archive_case_study_list', $post->ID);
  $blockServices = getPostMeta('service_archive_blocks_service_group');
  $globalBlocksServiceLayout = getPostMeta('service_archive_blocks_service_layout');
?>

<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>

  <?php for ($section = 0; ((is_array($blockServices) && $section < count($blockServices)) || (is_array($caseStudyIds) && $section < count($caseStudyIds))) && $section < 60; $section++) : ?>

    <?php if ($blockServices && count($blockServices) > $section) : ?>
      <?php $globalBlocksServiceGroup = [$blockServices[$section]]; ?>
      <?php include(locate_template('src/template_parts/block_section_services.php')) ?>
    <?php endif; ?>

    <?php if ($caseStudyIds) : ?>
      <?php $globalCaseStudyIds = array_slice($caseStudyIds, $section * 2, ($section + 1) * 2); // Pairs of case studies ?>
      <?php include(locate_template('src/template_parts/block_section_case_study_small.php')) ?>
    <?php endif; ?>

  <?php endfor; ?>

</main>

<?php get_footer(); ?>
