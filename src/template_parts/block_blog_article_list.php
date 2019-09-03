<section class="o-container-section o-container-section--bordered o-blog">

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

<div class="o-blog__post">
  <div class="o-blog__info">
  <p><?= the_date(); ?></p>
  <p class="o-blog__category"><?= $category; ?></p>
  </div>
  <div class="o-blog__title">
  <h2><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h2>
  <p><?= the_excerpt(); ?></p>
  </div>
</div>

<?php endwhile; ?>

</section>
