<?php
  $currentCatId = get_query_var('cat');

  // A bunch or menu item <a>s
  $menuItems = '';

  // Get categories except the 'uncategorised' category
  $categories = get_categories();

  $classAttr = 'class="c-blog-nav__item';
  $classAttr .= (!$currentCatId) ? ' c-blog-nav__item--current' : '';
  $classAttr .= '"';
  $menuItems .= '<a href="/blog/" ' . $classAttr . '>All</a>';

  foreach($categories as $cat) {
    $link = get_category_link($cat);
    $name = $cat->description ?: ucwords($cat->category_nicename);
    $classAttr = 'class="c-blog-nav__item';
    $classAttr .= ($currentCatId === $cat->cat_ID) ? ' c-blog-nav__item--current' : '';
    $classAttr .= '"';
    $menuItems .= '<a href="' . $link . '" ' . $classAttr . '>' . $name . '</a>';
  }
?>

<nav class="c-blog-nav">
  <?= $menuItems; ?>
</nav>
