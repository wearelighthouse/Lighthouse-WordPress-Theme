<?php

/**
 * Register metaboxes for work archive page
 */
function registerWorkArchiveMetaboxes()
{
    $page = get_page_by_title('our work') ?: get_page_by_title('work');

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
        'contact_us_banner',
        'sector_list'
    ], $groupID);
}

add_action('cmb2_admin_init', 'registerWorkArchiveMetaboxes');
