<?php

function attachTemplateToPage($pageName, $templateFileName)
{
  $pageID = null;

  if (is_array($pageName)) {
    foreach($pageName as $p) {
      $page = get_page_by_title($p);

      if ($page) {
        $pageID = $page->ID;
      }
    }
  } else {
    $page = get_page_by_title($pageName);
    if ($page) {
      $pageID = $page->ID;
    }
  }

  // Only attach the template if the page exists
  if ($pageID !== null) {
    update_post_meta($pageID, '_wp_page_template', $templateFileName);
  }

  return $pageID;
}
