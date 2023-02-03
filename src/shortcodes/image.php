<?php

function imageShortcode($atts)
{

  $atts = shortcode_atts([
    'id' => '',
    'size' => 'large',
    'background' => '',
    'caption' => '',
    'loop' => 'on',
    'autoplay' => 'on',
    'controls' => 'off',
    'muted' => 'on'
  ], $atts);

  $allowedImgSizes = ['', 'small', 'medium', 'large', 'full'];

  if (!in_array($atts['size'], $allowedImgSizes)) {
    echo 'Invalid image shortcode size, must be one of: "' . implode('", "', $allowedImgSizes) . '"';
    return;
  }

  $mediaIdArray = array_map('trim', explode(',', $atts['id']));
  $bgColorArray = array_map('trim', explode(',', $atts['background']));
  $singleBgColorAttr = (count($bgColorArray) === 1 && $bgColorArray[0] ? ' style="background:' . $bgColorArray[0] . '"' : '');

  $className = 'c-images';
  $className .= ' c-images--' . $atts['size'];
  if (count($bgColorArray) > 1) {
    $className .= ' c-images--multi-bg-color';
  } else {
    if ($bgColorArray[0] === '') {
      $className .= ' c-images--no-bg-color';
    } else {
      $className .= ' c-images--single-bg-color';
    }
  }
  $output = '<div class="' . $className . '"' . $singleBgColorAttr . '>';

  foreach ($mediaIdArray as $i => $mediaId) {
    $mediaType = get_post_mime_type($mediaId);
    // Convert from WordPress video type to proper HTML video type string
    if ($mediaType === 'video/mpeg') {
      $mediaType = 'video/mp4';
    }

    // If its a video, wrap in <video> tags
    if (strpos($mediaType, 'video') !== false) {

      $controls = $atts['controls'] == 'on' ? ' controls' : '';	
      $loop = $atts['loop'] == 'on' ? ' loop' : '';		
      $autoplay = $atts['autoplay'] == 'on' ? ' autoplay' : '';
      $muted = $atts['muted'] == 'on' ? ' muted' : '';

      $video = '<video width="100%" height="auto" '.$autoplay.$muted.$loop.$controls.'>';
      $video .= '<source src="' . wp_get_attachment_url($mediaId) . '" type="' . $mediaType . '">';
      $video .= '</video>';
      $media = $video;

    // If it's an image, get the <img>
    } elseif (strpos($mediaType, 'image') !== false) {
      $media = wp_get_attachment_image($mediaId, 'original' , '');
    } else {
      echo 'Invalid image or video ID in shortcode: "' . $mediaId . '"';
      return;
    }

    $bgColor = count($bgColorArray) > 1 ? ' style="background: ' . $bgColorArray[$i] . '"' : '';
    $output .= '<div class="c-images__image"' . $bgColor . '>';
    $output .= $media;

    if ($atts['caption']) {
      $output .= '<p>' . $atts['caption'] . '</p>';
    }

    $output .= '</div>';
  }

  $output .= '</div>';

  // If it's fullsize image/s, close previous c-content-grid container, output images, start new c-content grid:
  if ($atts['size'] === 'full' || $bgColorArray[0]) {
	  $output = '</div>' . $output;
    $output .= '<div class="o-container-content o-container-content--v-margin c-content-grid u-hide-if-empty">';
  }

	return $output;
}
