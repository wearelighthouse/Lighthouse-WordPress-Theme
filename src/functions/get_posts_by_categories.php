<?php 

function getPostsType($query){
    // $navQuery = get_queried_object();

    $category_ids = array(2, 4);
    
    if ($query->is_home() && $query->is_main_query()) {

        $query->set('category__in', $category_ids);
    }
}
        
add_action('pre_get_posts', 'getPostsType');