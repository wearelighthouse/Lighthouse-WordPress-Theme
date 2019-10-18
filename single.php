<?php
  $podcastEmbed = getPostMeta('post_post_podcast_embed', $post->ID);

  // Get the actual site header
  get_template_part('src/template_parts/header');
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <?php if ($podcastEmbed): ?>
        <div class="o-container-content o-container-content--v-margin">
          <?= $podcastEmbed; ?>
        </div>
      <?php endif; ?>
      <div class="o-container-content o-container-content--v-margin c-content-grid">
        <?= the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
