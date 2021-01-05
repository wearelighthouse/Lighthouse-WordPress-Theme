<?php

function newsletterShortcode($atts, $content = null)
{
	$newsletter = '<div class="c-newsletter-signup">';
	$newsletter .= '<div class="c-newsletter-signup__inner">';
	$newsletter .= '<h3 class="c-newsletter-signup__heading">Newsletter</h3>';
	$newsletter .= '<div class="c-newsletter-signup__text s-content">' . wpautop($content) . '</div>';
	$newsletter .= '<form class="c-newsletter-signup__form">';
	$newsletter .= '<input type="text" class="c-newsletter-signup__text-input c-text-input" placeholder="you@example.com" aria-label="email"/>';
	$newsletter .= '<button class="c-newsletter-signup__button c-solid-button">Sign me up</button>';
	$newsletter .= '</form>';
	$newsletter .= '</div>';
	$newsletter .= '</div>';

	$newsletter = '</div>' . $newsletter . '<div class="o-container-content o-container-content--v-margin">';

	return $newsletter;
}
