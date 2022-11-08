<?php

function ctaBlockShortcode($atts, $content = null)
{
	$atts = shortcode_atts([
		'link_text' => "Let's talk",
		'link_url' => '/',
	], $atts);

	$output = '<div class="c-cta-block"><div class="o-container-content"><div>' . wpautop($content) . '</div><div class="u-flex"><a href="/" class="button">' . $atts['link_text'] . '<svg width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M14.5 18L13.1 16.55L16.65 13H4.5V11H16.65L13.1 7.45L14.5 6L20.5 12L14.5 18Z" fill="white"/>
</svg>
</a></div></div></div>';

	// Always close previous c-content-grid container, output screens, start new c-content grid:
	$output = '</div>' . $output;
	$output .= '<div class="o-container-content o-container-content--v-margin c-content-grid u-hide-if-empty">';

	return $output;
}
