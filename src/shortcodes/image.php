<?php

function imageShortcode($atts) {

	// get the vars
	extract(shortcode_atts(array(
		'id' => '',
		'alt' => '',
		'caption' => '',
		'size' => '',
		'bg' => '',
		'size' => '',
	), $atts));

	$output = '';

	switch ($size) {
  	case 'full':
    	$size = 'full';
    	break;

    case 'small':
    	$size = 'small';
    	break;

    case 'medium':
    	$size = 'medium';
    	break;

  	default:
    	$size = 'large';
	}

  $imgArray = explode(',', $id);
  $count = count($imgArray);

  if ($bg) {
    if (strpos($bg, '#') === false) {
      $bg = '#' . $bg;
    }
    $bgColor = ' style="background-color: ' . $bg . '"';
  } else {
    $bgColor = '';
  }

  if ($size == 'full') {
    $output .= '</div><div>';
  }

	$output .= '<div class="o-images count-' . $count . ' size-' . $size . '"' . $bgColor . '>';

  foreach ($imgArray as $imgId) {
    $output .= '<div class="o-images__image">' . wp_get_attachment_image($imgId, 'original', '', ['alt' => 'Alt']) . '</div>';
  }

  if ( $alt == '' ) {
  	$alt == 'caption';
	}

	$output .= '</div>';

	if ($size == 'full') {
    $output .= '</div><div class="o-container-content o-container-content--v-margin c-content-grid">';
  }

	return $output;
}
