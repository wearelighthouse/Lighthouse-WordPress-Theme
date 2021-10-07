<?php
  /* Template Name: All case studies */
   // $caseStudyIds = getPostMeta('all_case_studies_template_all_case_study_list_clients', $post->ID);

   $caseStudyIds = get_posts([
     'fields' => 'ids',
     'posts_per_page' => -1,
     'post_type' => 'work',
   ]);
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>
      <?php if ($caseStudyIds) : ?>
        <?php $globalCaseStudyIds = $caseStudyIds ?>;
        <?php include(locate_template('src/template_parts/block_section_case_study_large.php')) ?>
      <?php endif; ?>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
