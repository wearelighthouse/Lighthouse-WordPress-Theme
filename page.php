<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>
    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <div>
      Placeholder
      <?php the_content(); ?>
    </div>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>