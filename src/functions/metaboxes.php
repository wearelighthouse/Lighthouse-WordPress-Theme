<?php

function addField($prefix, $cmb, $field)
{
  $field['id'] = isset($field['id']) ? '_' . $field['id'] : '';
  $field['id'] = $prefix . $field['id'];

  if ($field['type'] === 'group' && $field['sub_fields']) {
      $groupField = $cmb->add_field($field);
      foreach ($field['sub_fields'] as $subField) {
          $cmb->add_group_field($groupField, $subField);
      }
  } else {
      $cmb->add_field($field);
  }
}

function addMetaboxes($groupInfo, $metaboxIDs, $groupID = false)
{
    if (!$metaboxIDs) {
        return false;
    }

    foreach ($metaboxIDs as $i => $metaboxID) {
        $prefix = $groupID ? $groupID . '_' . $metaboxID : $metaboxID;
        $metabox = require __DIR__ . '/../metaboxes/' . $metaboxID . '.php';
        $cmb = new_cmb2_box(array_merge($groupInfo, [
            'id' => $prefix,
            'title' => $metabox['title'],
            'classes' => 'cmb2-' . str_replace(' ', '-', $metaboxID),
            'show_names' => isset($metabox['show_names']) ? $metabox['show_names'] : true
        ]));

        if ($metabox['fields']) {
            foreach ($metabox['fields'] as $field) {
                addField($prefix, $cmb, $field);
            }
        }
    }
}

function getPageFileName()
{
    if (is_front_page()) return 'front_page';
    if (get_page_template_slug()) return get_page_template_slug();
    if (is_archive() && get_queried_object()) return (get_queried_object()->name);
    return '';
}

function getPagePrefix()
{
    $fileName = getPageFileName() ? getPageFileName() . '_' : '';
    $fileName = str_replace('template-', '', $fileName);
    $fileName = str_replace('.php', '', $fileName);
    $fileName = str_replace('-', '_', $fileName);
    return $fileName;
}

function getPostMeta($metaName, $postID = null)
{
    $postID = $postID ? $postID : get_the_ID();

    if (!is_numeric($postID)) {
        pr('Error looking up postMeta: ' . $metaName . ' - $postID must be numeric');
        return false;
    }

    $postMeta = get_post_meta($postID, getPagePrefix() . $metaName, true);

    // Looking up variable WITH page prefix failed, try without
    if (!$postMeta) {
      $postMeta = get_post_meta($postID, $metaName, true);
    }

    if (is_wp_error($postMeta)) {
        pr('Error looking up postMeta: ' . $metaName);
        return false;
    }

    return $postMeta;
}

/**
 * Exclude metabox on specific IDs. From:
 * https://github.com/CMB2/CMB2-Snippet-Library/blob/master/conditional-display/exclude-for-ids.php
 * @param  object $cmb CMB2 object
 * @return bool        True/false whether to show the metabox
 */
function cmb2_exclude_for_ids( $cmb ) {
	$ids_to_exclude = $cmb->prop( 'exclude_ids', array() );
	$excluded = in_array( $cmb->object_id(), $ids_to_exclude, true );
	return ! $excluded;
}
