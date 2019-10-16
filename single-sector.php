<?php
  // Get <head>, WordPress stuff, opening <body>
  get_header();

  $globalCaseStudyIds = getPostMeta('sector_single_case_study_list_clients', $post->ID);
  $globalIntro = getPostMeta('sector_single_case_study_list_title', $post->ID);

  // Get the actual site header
  get_template_part('src/template_parts/header');
?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <?php if ($globalCaseStudyIds) : ?>
      <?php include(locate_template('src/template_parts/block_section_case_study_small.php')) ?>
    <?php endif; ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-margin c-content-grid">
        <?= the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
