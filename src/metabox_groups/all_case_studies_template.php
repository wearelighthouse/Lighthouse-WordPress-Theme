<?php

function registerAllCaseStudiesMetaboxes()
{

    $groupInfo = [
        'object_types' => ['page'],
        'show_on' => [
          'key' => 'page-template',
          'value' => 'template-all-case-studies.php'
        ]
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'all_case_study_list',
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerAllCaseStudiesMetaboxes');