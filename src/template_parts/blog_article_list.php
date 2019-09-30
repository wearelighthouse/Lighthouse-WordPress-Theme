<section class="o-container-content">

  <?php while (have_posts()) : the_post(); ?>

  <?php
    $categories = get_the_category();
    // pr($categories);
    if ( count($categories) > 1) {
      $category = $categories[1]->name;
    } else {
      $category = $categories[0]->name;
    }
  ?>

  <div class="c-blog-link">
    <div class="c-blog-link__info">
      <span class="c-blog-link__info__date"><?= get_the_date(get_option('date_format')) ?></span>
      <?php if ($category && $category !== 'Uncategorised') : ?>
        <span class="c-blog-link__info__category"><?= $category; ?></span>
      <?php endif; ?>
    </div>
    <div class="c-blog-link__content">
      <h2 class="c-blog-link__content__title type-subtitle">
        <a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>
      </h2>
      <div class="c-blog-link__content__excerpt"><?= the_excerpt(); ?></div>
    </div>
  </div>

  <?php endwhile; ?>

</section>
