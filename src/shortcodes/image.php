<?php

function imageShortcode($atts)
{

  $atts = shortcode_atts([
    'id' => '',
    'size' => 'large',
  ], $atts);

  $allowedImgSizes = ['', 'small', 'medium', 'large', 'full'];

  if (!in_array($atts['size'], $allowedImgSizes) {
    return new WP_Error('Invalid image shortcode size, must be one of: "' . implode('", "', $allowedImgSizes) . '"';
  }

	$output = '';

  $imgArray = array_map('trim', explode(',', $id));

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
    $output .= '<div class="o-images__image">' . wp_get_attachment_image($imgId, 'original', '', ['loading' => 'lazy']) . '</div>';
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
