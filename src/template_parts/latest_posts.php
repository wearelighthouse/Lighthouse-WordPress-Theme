<?php
  $postsPerPage = 1;

  $latestPostsQuery = new WP_Query([
    'post_type' => 'post',
    'post__not_in' => [$post->ID],
    'posts_per_page' => 1
  ]);
?>

<?php if ($latestPostsQuery->have_posts()) : ?>
  <section class="o-container-content c-related-articles">
    <div class="c-blog-nav">
      <h3 class="type-subtitle u-mb-8">Latest Post<?= $postsPerPage > 1 ? 's' : ''?></h3>
    </div>

    <?php while ($latestPostsQuery->have_posts()) : $latestPostsQuery->the_post(); ?>
      <div class="c-blog-link">
        <div class="c-blog-link__info">
          <span class="c-blog-link__info__date"><?= get_the_date(get_option('date_format')) ?></span>
          <span class="c-blog-link__info__category"><?= get_the_category()[0]->name ?></span>
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
