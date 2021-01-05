<?php
  $podcastEmbed = getPostMeta('post_post_podcast_embed', $post->ID);
  $podcastID = get_page_by_path(str_replace('podcast-', '', $post->post_name), OBJECT, 'post');
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-margin c-content-grid c-content-grid--transcript">
        <div class="c-podcast-links">
          <?php if ($podcastID) : ?>
            <a href="<?= get_permalink($podcastID) ?>" class="c-podcast-links__transcript">Listen to the podcast</a>
          <?php endif; ?>
        </div>
        <?= the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
