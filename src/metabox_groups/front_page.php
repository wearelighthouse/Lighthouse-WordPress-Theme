<?php

function registerFrontPageMetaboxes()
{

    $groupInfo = [
        'object_types' => ['page'],
        'show_on'	     => ['id' => get_option('page_on_front')]
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        //'link_blocks', // Renamed to "services"
        'blocks_service',
        'contact_us_banner',
        'blocks_case_study'
        //
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
