<?php

function registerFrontPageMetaboxes()
{

    $groupInfo = [
        'object_types' => ['page'],
        'show_on'	     => ['id' => get_option('page_on_front')]
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'link_blocks',
        'contact_us_banner',
        // Add another link_blocks here (if/when we can do more than 1 link_blocks.
        // Otherwise different metaboxes for the big case study links?)
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerFrontPageMetaboxes');

/**
 * Remove the WordPress content editor from the homepage
 */
function remove_content_editor()
{
    if (get_the_ID() === (int) get_option('page_on_front')) {
        remove_post_type_support('page', 'editor');
    }
}
add_action('admin_head', 'remove_content_editor');
