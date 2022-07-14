<?php
  $postsPerPage = 1;
  $categories = get_categories(); 
?>

<section class="o-container-content c-latest-post">

  <?php $i = 0; ?>
  <?php foreach($categories as $cat) : ?>

    <?php 
      $catLink = get_category_link($cat);
  
      $relatedPostsQuery = new WP_Query([
        'post_type' => 'post',
        'category_name' => $cat->cat_name,
        'posts_per_page' => $postsPerPage
      ]);
    
    ?>
    <?php if ($relatedPostsQuery->have_posts()) : ?>

      <?php while ($relatedPostsQuery->have_posts()) : $relatedPostsQuery->the_post(); ?>

          <?php if($i > 0) : ?>
            <hr>
          <?php endif; ?>

          <div class="c-blog-link c-blog-link--latest">
            <div class="c-blog-link__info">
              <a href="<?= $catLink ?>" class="c-blog-link__info__category">
                <?= $cat->cat_name ?>
              </a>
            </div>

            <div class="c-blog-link__content">
              <div>
                <a href="<?= the_permalink(); ?>" class="c-blog-link__content__title">
                  <?= the_title(); ?>
                </a>
              </div>
              <div class="c-blog-link__content__excerpt"><?= the_excerpt(); ?></div>
            </div>
          </div>

        <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <?php $i++; ?>
  <?php endforeach; ?>
</section>
