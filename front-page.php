
<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>
    <?php include(locate_template('src/template_parts/home_intro.php')) ?>

    <?php $globalCaseStudyIds = getPostMeta('case_study_list_clients') ?>
    <?php include(locate_template('src/template_parts/block_section_case_study_large.php')) ?>

    <?php include(locate_template('src/template_parts/latest_posts.php')) ?>
    <?php include(locate_template('src/template_parts/home_links.php')) ?>
    <?php include(locate_template('src/template_parts/social_proof.php')) ?>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
