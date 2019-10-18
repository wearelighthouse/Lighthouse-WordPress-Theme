<?php
  $caseStudyIds = getPostMeta('work_archive_case_study_list_clients', $post->ID);
?>

<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>

  <?php if ($caseStudyIds) : ?>
    <?php $globalCaseStudyIds = array_slice($caseStudyIds, 0, 2); // 1st 3 case studies ?>
    <?php include(locate_template('src/template_parts/block_section_case_study_large.php')) ?>
  <?php endif; ?>

  <?php include(locate_template('src/template_parts/contact_us_banner.php')) ?>

  <?php if ($caseStudyIds && count($caseStudyIds) > 2) : ?>
    <?php $globalCaseStudyIds = array_slice($caseStudyIds, 2); // the remaining ?>
    <?php include(locate_template('src/template_parts/block_section_case_study_small.php')) ?>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
