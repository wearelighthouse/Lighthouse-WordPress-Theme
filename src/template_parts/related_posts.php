<?php
  $categories = get_the_category();
  $category = end($categories)->name;
  $categorySlug = end($categories)->slug;
  $catLink = get_category_link(end($categories)->cat_ID);

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
      <?php
        $tags = get_the_tags();
      
          if ($tags) {
            $linkList = '';
        
            foreach ($tags as $tag) {
              $slug = $tag->slug;
              $name = $tag->name;
              $link = get_tag_link($tag);
            
              $linkList .= ('
                <li>
                  <a class="c-tag c-tag--blog" href="' . $link . '">
                    <img src="' . get_template_directory_uri() . '/dist/svg/' . $slug . '.svg" alt="" width="20px" height="20px">
                    <span>' . $name . '</span>
                  </a>
                </li>
              ');
            }
          }
      ?>
      <div class="c-blog-link">
        <div class="c-blog-link__info">
          <span class="c-blog-link__info__date"><?= get_the_date(get_option('date_format')) ?></span>
          <a href="<?= $catLink ?>" class="c-blog-link__info__category">
            <img src="<?= get_template_directory_uri() ?>/dist/svg/<?= $categorySlug ?>.svg" alt="" width="20px" height="20px"/>
            <span><?= $category ?></span>
          </a>
        </div>

        <div class="c-blog-link__content">
          <a href="<?= the_permalink(); ?>" class="c-blog-link__content__title">
            <?= the_title(); ?>
          </a>
          <div class="c-blog-link__content__excerpt"><?= the_excerpt(); ?></div>
        </div>

        <?php if ($tags) : ?>
          <div class="c-blog-link__tag">
            <ul class="o-tag-list o-blog-tag-list">
              <?= $linkList ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </section>
<?php endif; ?>
