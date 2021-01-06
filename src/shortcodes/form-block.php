<?php

function formBlockShortcode($atts, $content = null)
{
	$atts = shortcode_atts([
		'id' => 1,
	], $atts);

	$formBlock = '<div class="c-form-block">';
	$formBlock .= do_shortcode('[gravityform id="' . $atts['id'] . '" title="true" description="true"]');
	$formBlock .= '</div>';

	$formBlock = '</div>' . $formBlock . '<div class="o-container-content o-container-content--v-margin">';

	return $formBlock;
}
