<?php
  $post = get_page_by_title('Blog');
?>

<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>

  <?php include(locate_template('src/template_parts/block_blog_category_nav.php')) ?>

  <?php include(locate_template('src/template_parts/block_blog_article_list.php')) ?>

  <?php include(locate_template('src/template_parts/block_blog_pagination.php')) ?>

</main>

<?php get_footer(); ?>
