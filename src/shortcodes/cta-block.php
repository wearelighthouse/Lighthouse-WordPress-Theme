<?php

function ctaBlockShortcode($atts, $content = null)
{
	$atts = shortcode_atts([
		'link_text' => "Let's talk",
		'link_url' => '/',
	], $atts);

	$opening = '<div class="c-cta-block"><div class="o-container-content u-flex u-fd-column">';

	$content = '<div>' . wpautop($content) . '</div>';

	$svg = '<svg width="25" height="24" viewBox="0 0 25 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M14.5 18L13.1 16.55L16.65 13H4.5V11H16.65L13.1 7.45L14.5 6L20.5 12L14.5 18Z" fill="white"/>
  </svg>';

	$button = '<a href="/" class="button">' . $atts['link_text'] . $svg . '</a>';

	$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="768" height="480" aria-hidden="true" viewBox="0 0 768 480" class="c-cta-block__bg">
		<g filter="url(#a)">
			<circle cx="638" cy="492.5" r="265.5" fill="#FF268B" fill-opacity=".9"/>
		</g>
		<g filter="url(#b)">
			<circle cx="802" cy="628.5" r="265.5" fill="#F9DC53" fill-opacity=".9"/>
		</g>
		<g filter="url(#c)">
			<circle cx="565" cy="732.5" r="265.5" fill="#FC895B" fill-opacity=".9"/>
		</g>
		<defs>
			<filter id="a" width="1131" height="1131" x="73" y="-73" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
				<feFlood flood-opacity="0" result="BackgroundImageFix"/>
				<feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
				<feGaussianBlur result="effect1_foregroundBlur_3694_4167" stdDeviation="150"/>
			</filter>
			<filter id="b" width="1131" height="1131" x="237" y="63" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
				<feFlood flood-opacity="0" result="BackgroundImageFix"/>
				<feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
				<feGaussianBlur result="effect1_foregroundBlur_3694_4167" stdDeviation="150"/>
			</filter>
			<filter id="c" width="1131" height="1131" x="0" y="167" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse">
				<feFlood flood-opacity="0" result="BackgroundImageFix"/>
				<feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
				<feGaussianBlur result="effect1_foregroundBlur_3694_4167" stdDeviation="150"/>
			</filter>
		</defs>
	</svg>';

	$closing = '</div></div>';

	$output = $opening . $content . $button . $svg . $closing;

	// Always close previous c-content-grid container, output screens, start new c-content grid:
	$output = '</div>' . $output;
	$output .= '<div class="o-container-content o-container-content--v-margin c-content-grid u-hide-if-empty">';

	return $output;
}
