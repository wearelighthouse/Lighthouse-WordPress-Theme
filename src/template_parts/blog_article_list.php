<section class="o-container-content">
  <?php $i = 0; while (have_posts()) : the_post(); ?>

    <?php
      $categories = get_the_category();
      $category = end($categories)->name;
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
          <span class="c-blog-link__info__category"><?= $category; ?></span>
        <?php endif; ?>
      </div>

      <div class="c-blog-link__content">
        <a href="<?= the_permalink(); ?>" class="c-blog-link__content__title">
          <?= the_title(); ?>
        </a>
        <div class="c-blog-link__content__excerpt"><?= the_excerpt(); ?></div>
      </div>
    </div>

  <?php endwhile; ?>
</section>
