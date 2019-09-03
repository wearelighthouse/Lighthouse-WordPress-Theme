<?php

$currentCatId = get_query_var('cat');

// build menu
$menu = '';
if ($currentCatId) {
  $menu .= '<a href="/blog/">All</a>';
} else {
  $menu .= '<span class="current">All</span>';
}

$categories = ['Article','Podcast'];
foreach ($categories as $v) {
  $categoryId = get_cat_ID( $v );
  $categoryLink = get_category_link( $categoryId );
  if ($currentCatId == $categoryId) {
    $menu .= '<span class="current">' . $v . '</span>';
  } else {
    $menu .= '<a href="' . $categoryLink . '">' . $v . '</a>';
  }
}

?><section class="o-container-section o-container-section--bordered o-blog">
  <nav class="o-blog-nav">
    <?= $menu; ?>
  </nav>
</section>
