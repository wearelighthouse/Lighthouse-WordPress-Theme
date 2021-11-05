<?php

// Don't load gravity forms styles
function removeGravityFormsCSS()
{
  wp_deregister_style('gforms_formsmain_css');
  wp_deregister_style('gforms_reset_css');
  wp_deregister_style('gforms_ready_class_css');
  wp_deregister_style('gforms_browsers_css');
}
add_action('gform_enqueue_scripts', 'removeGravityFormsCSS');

// Turn the Gravity Forms <input> submit into a much more sensible <button>
// From: https://gist.github.com/mannieschumpert/8334811#gistcomment-1400231
function gf_make_submit_input_into_a_button_element($button_input, $form)
{
  // Save attribute string to $button_match[1]
  preg_match("/<input([^\/>]*)(\s\/)*>/", $button_input, $button_match);

  // Remove value attribute
  $button_atts = str_replace("value='".$form['button']['text']."' ", "", $button_match[1]);

  return '<button '.$button_atts.'>'.$form['button']['text'].'<i class="fa fa-refresh"></i></button>';
}
add_filter('gform_submit_button', 'gf_make_submit_input_into_a_button_element', 10, 2);

function gform_form_input_autocomplete($input, $field, $value, $lead_id, $form_id) {
  return preg_replace('/<(input|textarea)/', '<${1} autocomplete="disabled" ', $input);
}
add_filter('gform_field_content', 'gform_form_input_autocomplete', 11, 5);

function gform_form_input_rows($input, $field, $value, $lead_id, $form_id) {
  // Note that gforms uses single quotes internally for it's HTMLs...
  return str_replace("rows='10'", "rows='6'", $input);
}
add_filter('gform_field_content', 'gform_form_input_rows', 12, 5);
