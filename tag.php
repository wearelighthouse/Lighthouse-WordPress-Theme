<?php get_header(); ?>

<?php 
    $post = get_page_by_title('Tags'); 
    $content = get_the_content();
?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>

    <?php if ($content) : ?>
        <section class="o-container-section o-container-section--h-bordered">
          <div class="o-container-content o-container-content--v-pad-margin">
              <?= the_content(); ?>
          </din>
        </section>
    <?php endif; ?>

  <?php include(locate_template('src/template_parts/blog_article_list.php')) ?>
  <?php include(locate_template('src/template_parts/blog_pagination.php')) ?>

</main>

<?php get_footer(); ?>
