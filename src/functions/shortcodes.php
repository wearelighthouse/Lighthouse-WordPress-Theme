<?php

function shortcode_screen_function($atts) 
{

	extract(shortcode_atts(array(
		'id' => '',
		'type' => '',
		'bg' => '',
		'alt' => '',
	), $atts));
	
	// screen images
	$screens = explode(',',$id);
	$screenCount = count($screens);
	$screenType = strtolower($type) == 'mobile' ? 'mobile' : 'desktop';
	
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
  	// alt text
    $alt = $post->post_title . ' ' . ucfirst($screenType) . ' Screenshot ' . $i;
  	$output .= '<div class="o-screens__screen"><div class="o-screens__chrome"><div class="o-screens__mask">' . wp_get_attachment_image($screen, 'original' , '', ["alt" => $alt]) . '</div></div></div>';
  	$i++;
	}
	
	$output .= '</div>';
	
	return $output;
	
}

function shortcode_quote_function($atts, $content = null) 
{
	global $team;
	
	// get Clutch score
	global $post;
	$clutch = getPostMeta('work_work_clutch_score', $post->ID);
	$clutchScore = '';

	// get the vars
	extract(shortcode_atts(array(
		'name' => '',
		'title' => '',
		'after' => '',
		'company' => '',
		'company_url' => '',
	), $atts));
	
	// is it one of us?
	$lighthouse = array_search($name,$team) !== false ? true : false;
	$personID = array_search ($name, $team);
	
	if ($lighthouse) {
		$image = '<div class="quote__image team-image">' . get_the_post_thumbnail( $personID, 'bio-tiny' ) . '</div>';
		$personUrl = get_permalink($personID);
		$personName = '<div class="quote__person"><a href="' . $personUrl . '" class="quote__name">' . $name . '</a>' . getPostMeta('team_team_title_short', $personID); '</div>';
		$clutchScore = '';
	} else {
		$image = '';
		$personName = '<div class="quote__person"><span class="quote__name">' . $name . '</span>';
		if ($title != '') {
			$personName .= $title;
		}
		if ($company_url != '') {
		  $company = '<a href="' . $company_url . '" target="_blank">' . $company . '</a>';	
		}
		if ($company != '') {
		  $personName .= ', ' . $company;
		}
		$personName .= '</div>';
		
		if ($clutch > 0) {
      $clutchScore = '<div class="quote__clutch"><span class="quote__clutch-score" style="width:' . (65 * (($clutch/10) * 2)) . 'px"></div>';
    }
	}
 
  $quote =  '	<blockquote class="quote">' . "\n";
	$quote .= apply_filters('the_content',$content);
	$quote .= '<footer>' . $image . $personName . $clutchScore . '</footer>';
	$quote .= '	</blockquote>' . "\n";

	wp_reset_query();
	return $quote;
}

function shortcode_image_function($atts) {
	
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
    $output .= '</section><section class="o-container-section o-container-section--bordered">';
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
    $output .= '</section><section class="o-container-section o-container-section--bordered content-grid">';
  }
	
	return $output;
	
}

function shortcode_ad_function($atts, $content = null) 
{

	// get the vars
	extract(shortcode_atts(array(
		'id' => '',
		'text' => '',
		'align' => '',
	), $atts));
	
	// Get the page
	$adPage = get_page($id);
	
	$adAlign = $align == 'center' ? 'center' : 'left';
	
	$ad = '<div class="ad ad__' . $adAlign . '">';
	
	if ($adPage->post_type == 'work') {
  	// get case study block
	} else {
  	$ad .= '<h3>' . $adPage->post_title . '</h3>';
  	$ad .= '<p>' . strip_tags($text) . '</p>';
  	$ad .= '<a href="' . get_permalink($id) . '">Read more</a>';
	}

  $ad .= '</div>';
	
	wp_reset_query();
	return $ad;
}

// register them all here
function register_shortcodes(){
  add_shortcode('screen', 'shortcode_screen_function');
  add_shortcode('quote', 'shortcode_quote_function');
  add_shortcode('image', 'shortcode_image_function');
  add_shortcode('ad', 'shortcode_ad_function');
}

add_action( 'init', 'register_shortcodes');

?>