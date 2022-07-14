<?php if (have_posts()) : ?>
  <section class="o-container-content">
    <?php $i = 0; while (have_posts()) : the_post(); ?>

    <?php
      $categories = get_the_category();
      $category = end($categories)->name;
      $categorySlug = end($categories)->slug;

      $tags = get_the_tags();

      if ($tags) {
        $linkList = '';
    
        foreach ($tags as $tag) {
          $slug = $tag->slug;
          $name = $tag->name;
        
          $linkList .= ('
            <li>
              <a class="c-tag c-blog-tag" href="' . get_permalink($tag) . '">
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
      
    <div class="c-blog-link">
      <div class="c-blog-link__info">
        <span class="c-blog-link__info__date"><?= get_the_date(get_option('date_format')) ?></span>
        <?php if ($category && $category !== 'Uncategorised') : ?>
          <div class="c-blog-link__info__category-icon">
            <img src="<?= get_template_directory_uri() ?>/dist/svg/<?= $categorySlug ?>.svg" alt="" width="20px" height="20px"/>
            <span><?= $category ?></span>
          </div>
        <?php endif; ?>
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
  </section>
<?php endif; ?>
