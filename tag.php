<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>

  <?php include(locate_template('src/template_parts/blog_article_list.php')) ?>
  <?php include(locate_template('src/template_parts/blog_pagination.php')) ?>

</main>

<?php get_footer(); ?>
