<?php

function imageShortcode($atts)
{

  $atts = shortcode_atts([
    'id' => '',
    'size' => 'large',
    'background' => ''
  ], $atts);

  $allowedImgSizes = ['', 'small', 'medium', 'large', 'full'];

  if (!in_array($atts['size'], $allowedImgSizes)) {
    echo 'Invalid image shortcode size, must be one of: "' . implode('", "', $allowedImgSizes) . '"';
    return;
  }

  $imgIdArray = array_map('trim', explode(',', $atts['id']));
  $bgColorArray = array_map('trim', explode(',', $atts['background']));
  $singleBgColorAttr = (count($bgColorArray) === 1 && $bgColorArray[0] ? ' style="background:' . $bgColorArray[0] . '"' : '');
  echo $atts['background'];

  $className = 'c-images';
  $className .= ' c-images--' . $atts['size'];
  $className .= ' c-images--' . ($singleBgColorAttr ? 'single-color' : 'multi-color');
  $output = '<div class="' . $className . '"' . $singleBgColorAttr . '>';

  foreach ($imgIdArray as $i => $imgId) {
    $img = wp_get_attachment_image($imgId, 'original', '', ['loading' => 'lazy']);
    if (!$img) {
      echo 'Invalid image id in shortcode: "' . $imgId . '"';
      return;
    }
    $bgColor = count($bgColorArray) > 1 ? ' style="background: ' . $bgColorArray[$i] . '"' : '';
    $output .= '<div class="c-images__image"' . $bgColor . '>' . $img . '</div>';
  }

  $output .= '</div>';

  if ($atts['size'] === 'full' || $bgColorArray[0]) {
	   $output = '</div><div class="o-container-content--v-margin">' . $output . '</div><div class="o-container-content o-container-content--v-margin c-content-grid">';
  }

	return $output;
}
