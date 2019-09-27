<?php

/**
 * Register metaboxes service archive page
 */
function registerServiceArchiveMetaboxes()
{
    $page = get_page_by_title('services');

    if (!$page) {
      return;
    }

    $groupInfo = [
        'object_types' => ['page'],
        'show_on'	     => ['id' => $page->ID]
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'case_study_list',
        'contact_us_banner'
    ], $groupID);
}

add_action('cmb2_admin_init', 'registerServiceArchiveMetaboxes');
