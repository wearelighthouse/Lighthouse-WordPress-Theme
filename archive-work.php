<?php
  $post = get_page_by_title('our work');
  $caseStudies = getPostMeta('work_case_study_list_client', $post->ID);
?>

<?php get_header(); ?>

<main>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <?php foreach ($caseStudies as $i => $caseStudyId) : ?>
      <?php $caseStudySize = $i < 3 ? 'large' : 'small' ?>
      <?php include(locate_template('src/template_parts/block_case_study.php')) ?>
    <?php endforeach; ?>

</main>

<?php get_footer(); ?>
