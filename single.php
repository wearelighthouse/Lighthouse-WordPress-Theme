<?php
  $podcastEmbed = getPostMeta('post_post_podcast_embed', $post->ID);
  $transcript = getPostMeta('post_post_transcript', $post->ID);
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
        <div class="c-podcast-links">
          <?php if ($transcript) : ?>
            <a href="<?= get_permalink($transcript) ?>" class="c-podcast-links__transcript">Read transcript</a>
          <?php endif; ?>
          <div class="c-podcast-links__subscribe">
            <a href="https://itunes.apple.com/gb/podcast/lighthouse-podcast/id1029921850?mt=2" class="c-podcast-links__itunes">iTunes</a>
            <a href="http://simplecast.fm/podcasts/1302/rss" class="c-podcast-links__rss">RSS</a>
          </div>
        </div>
        <?= the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
