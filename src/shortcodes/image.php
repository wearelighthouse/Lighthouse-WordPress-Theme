<?php

function imageShortcode($atts)
{

  $atts = shortcode_atts([
    'id' => '',
    'size' => 'large',
    'bg-color' => ''
  ], $atts);

  $allowedImgSizes = ['', 'small', 'medium', 'large', 'full'];

  if (!in_array($atts['size'], $allowedImgSizes) {
    return new WP_Error('Invalid image shortcode size, must be one of: "' . implode('", "', $allowedImgSizes) . '"';
  }

  $imgIdArray = array_map('trim', explode(',', $attrs['id']));

  $className = 'c-images';
  $output = 'div class="c-images"' . ($attrs['bg-color'] ? ' style="background:' . $attrs['bg-color'] . '"');

  foreach ($imgIdArray as $imgId) {
    $output .= '<div class="o-images__image">' . wp_get_attachment_image($imgId, 'original', '', ['loading' => 'lazy']) . '</div>';
  }

  $output .= '</div>';

  if ($atts['size'] === 'full') {
	   $output = '</div>' . $output . '<div class="o-container-content o-container-content--v-margin c-content-grid">';
  }

	return $output;
}
