<?php

function registerWorkMetaboxes()
{

    $groupInfo = [
        'object_types' => ['work']
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'work'
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerWorkMetaboxes');

// Boxes on single Word page

function registerWorkPageMetaboxes()
{

    $workPage = get_page_by_title('Our work');

    $groupInfo = [
        'object_types' => ['page'],
        'show_on'	     => ['id' => $workPage->ID]
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'case_study_list'
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerWorkPageMetaboxes');
