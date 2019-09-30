<?php
  $blog = get_page_by_title('Blog');
  $heroContent = getPostMeta('hero_hero_content', $blog->ID);
  $bgcolor = getPostMeta('hero_hero_background-color', $blog->ID);
  $heroClass = $bgcolor ? ' u-bg-gradient--' . $bgcolor : '' ;
  $heroStyle = '';
?>

<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>
  <?php include(locate_template('src/template_parts/blog_category_nav.php')) ?>
  <?php include(locate_template('src/template_parts/blog_article_list.php')) ?>
  <?php include(locate_template('src/template_parts/blog_pagination.php')) ?>

</main>

<?php get_footer(); ?>
