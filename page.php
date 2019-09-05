<?php
  $heroContent = '<h1>' . $post->post_title . '</h1>';
  $bgcolor = getPostMeta('hero_hero_background-color', $post->ID);
  $heroClass = $bgcolor ? ' u-bg-gradient--' . $bgcolor : '' ;
  $heroStyle = '';
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>
    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content c-content-grid">
        <?php the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
