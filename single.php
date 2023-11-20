<?php
  $podcastEmbed = getPostMeta('post_post_podcast_embed', $post->ID);
  $transcript = getPostMeta('post_post_podcast_transcript', $post->ID);

  if ($podcastEmbed) {
    $transcriptID = get_page_by_path('podcast-' . $post->post_name, OBJECT, 'transcript');
    // If transcript not found, try without 'podcast-' at the front?
    if ($transcriptID === null) {
      $transcriptID = get_page_by_path($post->post_name, OBJECT, 'transcript');
    }
  }

  $postDate = '<time datetime="' . get_the_date('Y-m-d', $post->ID)  . '" class="c-post-date">';
  $postDate .= get_the_date('jS F Y', $post->ID);
  $postDate .= '</time>';
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <div class="o-container-section o-container-section--bordered">
      <section>
        <?php if ($podcastEmbed): ?>
          <div class="o-container-content o-container-content--v-margin">
            <?= $podcastEmbed; ?>
          </div>
        <?php endif; ?>

        <div class="o-container-content o-container-content--v-margin c-content-grid">
          <?php if ($podcastEmbed) : ?>
            <div class="c-podcast-links">
              <?= $postDate ?>
              <?php if ($transcriptID) : ?>
                <a href="<?= get_permalink($transcriptID) ?>" class="c-podcast-links__transcript">Read transcript</a>
              <?php endif; ?>
              <div class="c-podcast-links__subscribe">
                <a href="https://itunes.apple.com/gb/podcast/lighthouse-podcast/id1029921850?mt=2" class="c-podcast-links__itunes">iTunes</a>
                <a href="http://simplecast.fm/podcasts/1302/rss" class="c-podcast-links__rss">RSS</a>
              </div>
            </div>
          <?php else : ?>
            <div class="o-post-date-container">
              <?= $postDate ?>
            </div>
          <?php endif; ?>

          <?= the_content(); ?>

        </div>
      </section>

      <?php include(locate_template('src/template_parts/related_posts.php')) ?>

      <?php if ($transcript): ?>
      <section class="o-container-section o-container-section--bordered u-bg-color-gray-gradient">
        <div class="c-blog-nav">
          <h2 class="type-subtitle u-mb-8">Transcript</h2>
        </div>
        <div class="o-container-content o-container-content--v-margin c-content-grid c-content-grid--transcript">
          <?php echo apply_filters('the_content', $transcript); ?>
        </div>
      </section>
      <?php endif; ?>

    </div>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
