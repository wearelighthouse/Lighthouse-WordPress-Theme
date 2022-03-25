<?php
  $postsPerPage = 1;

  $categories = get_categories();
  
?>

<?php foreach($categories as $cat) : ?>

  <?php 
    $catName;
  
    if($cat->cat_name !== 'Uncategorized') {
      $catName = $cat->cat_name === 'Article' ? 'Article, Product Story' : $cat->cat_name;
    }

    $relatedPostsQuery = new WP_Query([
      'post_type' => 'post',
      'category_name' => $catName,
      'posts_per_page' => $postsPerPage
    ]);
    
    ?>

<?php if ($relatedPostsQuery->have_posts()) : ?>
  <section class="o-container-content c-related-articles">
    
    <?php while ($relatedPostsQuery->have_posts()) : $relatedPostsQuery->the_post(); ?>
        <?php $catname = get_the_category()[0]->name;?>
          <div class="c-blog-link">
            <div class="c-blog-link__info">
              <span class="c-blog-link__info__date"><?= get_the_date(get_option('date_format')) ?></span>
              <span class="c-blog-link__info__category"><?= $catname ?></span>
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
<?php endforeach; ?>