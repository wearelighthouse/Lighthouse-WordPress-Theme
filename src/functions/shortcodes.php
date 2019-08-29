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
		 $personName .= '</div></div>';
		
	}
   
    $quote =  '	<blockquote class="quote">' . "\n";
	$quote .= apply_filters('the_content',$content);
	$quote .= '<footer>' . $image . $personName . '</footer>';
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
		'max_width' => '',
		'responsive' => 'true',
		'border' => '',
		'page' => '',
		'url' => '',
	), $atts));
	
	$img = '';
	$breaks = array('400w', '800w', '1200w');
	
	if ( $alt == '' ):
		$alt == 'caption';
	endif;
	
	if ( $responsive != 'true' ):
		$image_pre = wp_get_attachment_image_src( $id, $size );
	else: 
		$image_pre = wp_get_attachment_image_src( $id, 'pre-load' );
	endif;
	
	if ( $url != '' ):
		$img = '<a href="' . $url . '" target="_blank">';
	endif;
	
	if ( $page == 'Home' ):
	
		$img .= '<img src="' . $image_pre[0] . '" data-src="' . $image_pre[0] . '" data-sizes="auto" class="image__image lazyload" alt="' . $alt . '"';
		
		$size_class = ' image--full';
		$img_medium = image_downsize($id, 'medium');
		$img_large = image_downsize($id, 'large');
		$img_huge = image_downsize($id, 'huge');
		$breakpoints = ' data-srcset="' . $img_medium[0] . ' ' . $breaks[0] . ', ' . $img_large[0] . ' ' . $breaks[1] . ', ' . $img_huge[0] .  ' ' . $breaks[2] . '"';
		
		$img .= $breakpoints . '>';
		
		if ( $url != '' ):
  		$img .= '</a>';
  	endif;
		
		$output .= '	<figure class="section image limit' . $size_class . $caption_class . $border_class . '"' . $max . '>
		
			' . $img . '
	' . $caption_text . '
		
		</figure>';
	
	else:
		
		$max = $max_width == '' ? '' : ' style="max-width:' . $max_width . 'px; width:100%;"';
		
		$img .= '<img src="' . $image_pre[0] . '" data-src="' . $image_pre[0] . '" data-sizes="auto" class="image__image lazyload" alt="' . $alt . '"';
		
		$border_class = $border == '' ? '' : ' image--border';
		
		switch ( $size ):
			case 'small':
				$image = wp_get_attachment_image_src( $id, 'small' );
				$size_class = ' image--small';
				$breakpoints = '';
				break;
				
			case 'medium':
				$size_class = ' image--medium';
				$img_medium = image_downsize($id, 'medium');
				$breakpoints = ' data-srcset="' . $img_medium[0] . ' ' . $breaks[0] . '"';
				break;
				
			case 'huge':
				$size_class = ' image--full';
				$img_medium = image_downsize($id, 'medium');
				$img_large = image_downsize($id, 'large');
				$img_huge = image_downsize($id, 'huge');
				$breakpoints = ' data-srcset="' . $img_medium[0] . ' ' . $breaks[0] . ', ' . $img_large[0] . ' ' . $breaks[1] . ', ' . $img_huge[0] .  ' ' . $breaks[2] . '"';
				break;
		
			default:
				$size_class = ' image--full';
				$img_medium = image_downsize($id, 'medium');
				$img_large = image_downsize($id, 'large');
				$breakpoints = ' data-srcset="' . $img_medium[0] . ' ' . $breaks[0] . ', ' . $img_large[0] . ' ' . $breaks[1] . '"';
			
		endswitch;
		
		if ( $responsive != 'true' ):
			$breakpoints = '';
		endif;
		
		$caption_class = $caption == '' ? '' : ' image--captioned';
		$caption_text = $caption == '' ? '' : '		<figcaption class="image__caption">' . $caption . '</figcaption>';
		
		$img .= $breakpoints . '>';
		
		if ( $url != '' ):
  		$img .= '</a>';
  	endif;
		
		$output = '';
		
		if ( $size == 'huge' ):
			
		$output .= '	</section>
		<figure class="section image' . $size_class . $caption_class . $border_class . '"' . $max . '>
		
			' . $img . '
	' . $caption_text . '
		
		</figure>
		<section class="section content limit container">';
			
		else:
		
		$output .= '	<figure class="section image limit' . $size_class . $caption_class . $border_class . '"' . $max . '>
		
			' . $img . '
	' . $caption_text . '
		
		</figure>';
		
		endif;
	
	endif; //  if home
	
	return $output;
	
}

// register them all here
function register_shortcodes(){
  add_shortcode('screen', 'shortcode_screen_function');
  add_shortcode('quote', 'shortcode_quote_function');
  add_shortcode('image', 'shortcode_image_function');
}

add_action( 'init', 'register_shortcodes');

?>