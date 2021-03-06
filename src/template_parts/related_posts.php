<?php
  $categories = get_the_category();

  $relatedPostsQuery = new WP_Query([
    'post_type' => 'post',
    'post__not_in' => [$post->ID],
    'cat' => end($categories)->cat_ID,
    'posts_per_page' => 2
  ]);
?>

<?php if ($relatedPostsQuery->have_posts()) : ?>
  <section class="o-container-content c-related-articles">
    <div class="c-blog-nav">
      <h3 class="type-subtitle u-mb-8">Related Posts</h3>
    </div>

    <?php while ($relatedPostsQuery->have_posts()) : $relatedPostsQuery->the_post(); ?>
      <div class="c-blog-link">
        <div class="c-blog-link__info">
          <span class="c-blog-link__info__date"><?= get_the_date(get_option('date_format')) ?></span>
          <span class="c-blog-link__info__category"><?= end($categories)->name ?></span>
        </div>

        <div class="c-blog-link__content">
          <a href="<?= the_permalink(); ?>" class="c-blog-link__content__title">
            <?= the_title(); ?>
          </a>
          <div class="c-blog-link__content__excerpt"><?= the_excerpt(); ?></div>
        </div>
      </div>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </section>
<?php endif; ?>
