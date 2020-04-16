<?php

/**
 * Adds an alt tag text column into the WP media library. Based off:
 * https://wordpress.stackexchange.com/a/137083
 */

function mediaAltCol($cols)
{
    $cols["alt"] = "Alt text";
    return $cols;
}

function mediaAltColValue($colName, $id)
{
    if ($colName === 'alt') {
        $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
        if ($alt) {
          echo $alt;
        } else {
          echo '<span style="color: #d00;">Missing alt text</span>';
        }
    }
}

function mediaAltColSortable($cols)
{
    $cols["alt"] = "alt_text";
    return $cols;
}

function mediaOrderby($query)
{
    if (!is_admin() || !($query->is_main_query())) {
        return;
    }

    if ($query->get('orderby') === 'alt_text') {
        $query->set('orderby', 'meta_value');
        $query->set('meta_query', [
            'relation' => 'OR',
            [
                'key' => '_wp_attachment_image_alt',
                'compare' => 'NOT EXISTS',
            ],
            [
                'key' => '_wp_attachment_image_alt'
            ]
        ]);
    }
}

function mediaAltColWidth()
{
    echo '<style type="text/css">.column-alt { width: 15% }</style>';
}

add_filter('manage_upload_columns', 'mediaAltCol');
add_action('manage_media_custom_column', 'mediaAltColValue', 10, 2);
add_action('manage_upload_sortable_columns', 'mediaAltColSortable');
add_action('pre_get_posts', 'mediaOrderby');
add_action('admin_head', 'mediaAltColWidth');
