<?php

function mergeProductStoriesIntoArticleQuery($query)
{
    if (!$query->is_main_query()) {
        return;
    }

    if (!$query->is_category('article')) {
        return;
    }

    $articleCategory = get_category_by_slug('article');
    $productStoriesCategory = get_category_by_slug('product-stories');

    if ($articleCategory && $productStoriesCategory) {
      $query->set('tax_query', [
        'relation' => 'OR',
        [
          'taxonomy' => 'category',
          'field' => 'term_id',
          'terms' => $articleCategory->term_id,
          'operator' => 'IN'
        ],
        [
          'taxonomy' => 'category',
          'field' => 'term_id',
          'terms' => $productStoriesCategory->term_id,
          'operator' => 'IN'
        ],
      ]);
    }
}

add_action('pre_get_posts', 'mergeProductStoriesIntoArticleQuery');
