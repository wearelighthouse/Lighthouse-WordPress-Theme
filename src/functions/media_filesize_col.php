<?php

/**
 * Adds a filesize column into the WP media library. Based off:
 */

function filesizeCol($cols)
{
    $cols['filesize'] = 'File Size';
    return $cols;
}

function filesizeColValue($colName, $id)
{
    if ($colName === 'filesize' && (wp_attachment_is('image', $id) || wp_attachment_is('video', $id))) {
        $filesize = filesize(get_attached_file($id));
        if (wp_attachment_is('image', $id) && $filesize > 1024 * 1024) {
            echo '<span style="color: #d00;">' . size_format($filesize, 2) . '</span>';
        } else {
            echo size_format($filesize, 2);
        }
    }
}

function filesizeColSortable($cols)
{
    $cols['filesize'] = 'file_size';
    return $cols;
}

function mediafilesizes_run_metadata() {
    $attachments = get_posts(['post_type' => 'attachment', 'numberposts' => -1]);

    if ($attachments) {
        foreach ($attachments as $post) {
            setup_postdata($post);
            update_post_meta($post->ID, 'file_size', wp_filesize(get_attached_file($post->ID)));
        }
    }
}

function filesizeOrderby($query)
{
    if (!is_admin() || !($query->is_main_query())) {
        return;
    }

    if ($query->get('orderby') === 'file_size') {
        $query->set('orderby', 'meta_value_num');
        $query->set('meta_key', 'file_size');
    }
}

function filesizeColWidth()
{
    echo '<style type="text/css">.column-filesize { width: 10% }</style>';
}

add_filter('manage_upload_columns', 'filesizeCol');
add_action('manage_media_custom_column', 'filesizeColValue', 10, 2);
add_action('manage_upload_sortable_columns', 'filesizeColSortable');
add_action('pre_get_posts', 'filesizeOrderby');
add_action('admin_head', 'filesizeColWidth');

mediafilesizes_run_metadata();
