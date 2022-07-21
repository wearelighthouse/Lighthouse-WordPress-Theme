<!-- <?php
  $featuredLogo = getPostMeta('post_post_logo', $post->ID);
  $featuredUrl = getPostMeta('post_post_url', $post->ID);
  $featuredText = getPostMeta('post_post_text', $post->ID);
?> -->

<?php if (have_posts()) : ?>
    <?php $i = 0; while (have_posts()) : the_post(); ?>

    <?php
      $categories = get_the_category();
      $category = end($categories)->name;
      $categorySlug = end($categories)->slug;
      $catLink = get_category_link(end($categories)->cat_ID);

      $tags = get_the_tags();

      $featuredLogo = getPostMeta('post_post_logo', $post->ID);
      $featuredUrl = getPostMeta('post_post_url', $post->ID);
      $featuredText = getPostMeta('post_post_text', $post->ID);

      if ($tags) {
        $linkList = '';
    
        foreach ($tags as $tag) {
          $slug = $tag->slug;
          $name = $tag->name;
          $link = get_tag_link($tag);
          $tagClass = 'c-tag c-tag--blog';

          if ($category && $category === "Featured") {
            $tagClass = 'c-tag c-tag--blog c-tag--blog-featured';
          }
        
          $linkList .= ('
            <li>
              <a class="' . $tagClass .'" href="' . $link . '">
                <img src="' . get_template_directory_uri() . '/dist/svg/' . $slug . '.svg" alt="" width="20px" height="20px">
                <span>' . $name . '</span>
              </a>
            </li>
          ');
        }
      }

      $i++;
    ?>
    
    <?php if ($i === 5): ?>
      <?php $newsletterFormId = RGFormsModel::get_form_id('Newsletter'); ?>
      <?= do_shortcode('[form id="' . $newsletterFormId . '"]') ?>
      <?php endif; ?>
    
    <?php if ($category && $category === 'Featured') : ?>
      <div class="c-blog-link--feature">
        <div class="o-container-content">
          <div class="c-blog-link">
    <?php else : ?>
      <section class="o-container-content">
        <div class="c-blog-link">
    <?php endif; ?>

      <div class="c-blog-link__info">
        <span class="c-blog-link__info__date"><?= get_the_date(get_option('date_format')) ?></span>
        <?php if ($category && $category !== 'Uncategorised') : ?>
          <a href="<?= $catLink ?>" class="c-blog-link__info__category">
            <img src="<?= get_template_directory_uri() ?>/dist/svg/<?= $categorySlug ?>.svg" alt="" width="20px" height="20px"/>
            <span><?= $category ?></span>
          </a>
        <?php endif; ?>
      </div>

      <div class="c-blog-link__content">
        <?php if ($category && $category === 'Featured') : ?>
            <a class="c-blog-link__content__feature-logo" href="<?= $featuredUrl ?>">
              <img src="<?= $featuredLogo ?>" width="33" height="33" alt="">
              <p><?= $featuredText ?></p>
            </a>
        <?php endif; ?>
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

    <?php if ($category && $category === 'Featured') : ?>
          </div>
        </div>
      </div>
    <?php else : ?>
      </div>
    </section>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>
