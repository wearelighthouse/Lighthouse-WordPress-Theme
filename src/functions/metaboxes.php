<?php

function addField($prefix, $cmb, $field)
{
  $field['id'] = isset($field['id']) ? $field['id'] : '';
  $field['id'] = $prefix . '_' . $field['id'];

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
