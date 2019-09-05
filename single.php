<?php
  $heroContent = '<h1>' . $post->post_title . '</h1>';
  $heroContent .= '<p>' . get_the_date('jS F Y', $post->ID) . '</p>';
  $blog = get_page_by_title('Blog');
  $bgcolor = getPostMeta('hero_hero_background-color', $blog->ID);
  $heroClass = $bgcolor ? ' u-bg-gradient--' . $bgcolor : '' ;
  $heroStyle = '';

  $podcastEmbed = getPostMeta('post_post_podcast_embed', $post->ID);
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <?php if ($podcastEmbed): ?>
      <section class="o-container-section o-container-section--bordered content-grid">
        <?= $podcastEmbed; ?>
      </section>
    <?php endif; ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content content-grid">
        <?= the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
