<?php

function screenShortcode($atts)
{

	extract(shortcode_atts(array(
		'id' => '',
		'type' => '',
		'bg' => '',
		'alt' => '',
		'caption' => '',
	), $atts));

	// screen images
	$screens = explode(',',$id);
	$screenCount = count($screens);
	$screenType = strtolower($type) == 'mobile' ? 'mobile' : 'desktop';

	if ($caption) {
  	$captionText = '<div class="o-screens__caption">' . $caption . '</div>';
	} else {
  	$captionText = '';
	}

  global $post;

	// background image
	if ($bg) {

  	$bgUrl = ' style="background-image:url(' . wp_get_attachment_image_url($bg, 'original') . ')"';
  	$bgUrl = '';
  	$bgImage = wp_get_attachment_image($bg, 'original', '', ['class' => 'o-screens__bg']);
	} else {
  	$bgUrl = '';
  	$bgImage = '';
	}

	$output = '<div class="o-screens ' . $screenType . ' count-' . $screenCount . '"' . $bgUrl . '>' . $bgImage;

	$i = 1;
	foreach ($screens as $screen) {
		$mediaType = get_post_mime_type($screen);

		if (strpos($mediaType, 'video') === false) {
			$alt = $post->post_title . ' ' . ucfirst($screenType) . ' Screenshot ' . $i;
	  	$output .= '<div class="o-screens__screen"><div class="o-screens__chrome"><div class="o-screens__mask">' . wp_get_attachment_image($screen, 'original' , '', ["alt" => $alt]) . '</div></div></div>';
		} else {
			$videoUrl = wp_get_attachment_url($screen);
			echo $videoUrl;
			$output .= '<div class="o-screens__screen"><div class="o-screens__chrome"><div class="o-screens__mask"><video width="320" height="240" autoplay>
			  <source src="http:' . $videoUrl . '" type="video/mp4">
			Your browser does not support the video tag.
			</video></div></div></div>';
		}
  	// alt text

  	$i++;
	}

	$output .= '</div>';

	return $output;

}
