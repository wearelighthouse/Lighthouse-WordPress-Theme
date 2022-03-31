<?php
  $query = get_queried_object();
  
  $chackQuery = $query->name === 'Article' ? 'Article, Product Stories' : $query->name;
  
  $siglePost = get_posts([
    'post-type' => 'post',
    'category_name' => $chackQuery,
    'posts_per_page' => 10,
  ]);
  
?>

<section class="o-container-content">
  <?php for ($i = 0; $i < count($siglePost); $i++) : ?>
  <?php
      $categories = get_the_category($siglePost[$i]->ID);
      $category = end($categories)->name;
    ?>
    
    <?php if ($i === 5): ?>
      <?php $newsletterFormId = RGFormsModel::get_form_id('Newsletter'); ?>
      <?= do_shortcode('[form id="' . $newsletterFormId . '"]') ?>
      <?php endif; ?>
      
    <div class="c-blog-link">
      <div class="c-blog-link__info">
        <!-- <span class="c-blog-link__info__date"><?= get_the_date(get_option('date_format')) ?></span> -->
        <?php if ($category && $category !== 'Uncategorised') : ?>
          <span class="c-blog-link__info__category"><?= $category; ?></span>
        <?php endif; ?>
      </div>

      <div class="c-blog-link__content">
        <a href="<?= the_permalink(); ?>" class="c-blog-link__content__title">
          <?= $siglePost[$i]->post_title; ?>
        </a>
        <div class="c-blog-link__content__excerpt"><?= $siglePost[$i]->post_excerpt; ?></div>
      </div>
    </div>
    
  <?php endfor; ?>
</section>

