<?php

add_theme_support( 'post-thumbnails' );

// Get all the people's names for the quote shortcodes
$args = [
    'post_type' => 'team',
    'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash'),
    'posts_per_page' => -1,
];

$teamArray = new WP_Query( $args );
$team = array();

foreach ($teamArray->posts as $person) {
	$team[$person->ID] = $person->post_title;
}

// Autoloading for plugins etc.
require_once __DIR__ . '/vendor/autoload.php';

// Functions
require_once __DIR__ . '/src/functions/autoa.php';
require_once __DIR__ . '/src/functions/get_option.php';
require_once __DIR__ . '/src/functions/image_sizes.php';
require_once __DIR__ . '/src/functions/lazy_load.php';
require_once __DIR__ . '/src/functions/menus.php';
require_once __DIR__ . '/src/functions/metaboxes.php';
require_once __DIR__ . '/src/functions/plugins.php';
require_once __DIR__ . '/src/functions/pr.php';

// Metabox Groups
require_once __DIR__ . '/src/metabox_groups/contact_template.php';
require_once __DIR__ . '/src/metabox_groups/front_page.php';
require_once __DIR__ . '/src/metabox_groups/hero.php';
require_once __DIR__ . '/src/metabox_groups/page.php';
require_once __DIR__ . '/src/metabox_groups/post.php';
require_once __DIR__ . '/src/metabox_groups/sector_single.php';
require_once __DIR__ . '/src/metabox_groups/service_archive.php';
require_once __DIR__ . '/src/metabox_groups/service_single.php';
require_once __DIR__ . '/src/metabox_groups/team.php';
require_once __DIR__ . '/src/metabox_groups/work_archive.php';
require_once __DIR__ . '/src/metabox_groups/work_single.php';

// Options Pages
require_once __DIR__ . '/src/options/contact.php';
require_once __DIR__ . '/src/options/footer.php';
require_once __DIR__ . '/src/options/social.php';

// Post Types
require_once __DIR__ . '/src/post_types/sector.php';
require_once __DIR__ . '/src/post_types/service.php';
require_once __DIR__ . '/src/post_types/team.php';
require_once __DIR__ . '/src/post_types/work.php';

// Shortcodes
require_once __DIR__ . '/src/shortcodes/ad.php';
require_once __DIR__ . '/src/shortcodes/image.php';
require_once __DIR__ . '/src/shortcodes/quote.php';
require_once __DIR__ . '/src/shortcodes/screen.php';

function registerShortcodes()
{
  add_shortcode('screen', 'screenShortcode');
  add_shortcode('quote', 'quoteShortcode');
  add_shortcode('image', 'imageShortcode');
  add_shortcode('ad', 'adShortcode');
}
add_action( 'init', 'registerShortcodes');

// Update CSS within in Admin
function admin_style()
{
  wp_enqueue_style('admin-styles', get_template_directory_uri() . '/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

// Do some funky JS on the admin pages
function admin_script()
{
  wp_enqueue_script('admin-script', get_template_directory_uri() . '/admin.js');
}
add_action('admin_enqueue_scripts', 'admin_script');

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

function removeGutenbergCSS()
{
  wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'removeGutenbergCSS');

function disableWPEmbeds() {
  wp_dequeue_script('wp-embed');
}
add_Action('wp_footer', 'disableWPEmbeds');

// Defer all the enqueued (not in head) JavaScript

function deferScripts($tag, $handle)
{
  return str_replace(' src', ' defer src', $tag);
}

if (!is_admin()) {
  add_filter('script_loader_tag', 'deferScripts', 10, 2);
}

// Move Gforms scripts to the footer
add_filter( 'gform_init_scripts_footer', '__return_true' );

// Wrap the inline scripts in DOMContentLoaded event listeners
// to ensure they aren't triggered before jQuery loads.
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open' );
function wrap_gform_cdata_open( $content = '' )
{
  $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
  return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close' );

function wrap_gform_cdata_close( $content = '' )
{
  $content = ' }, false );';
  return $content;
}

/**
 * Highlight 'Blog' nav menu item on all blog pages, 'Services' on service pages etc.
 */
function addCustomNavClasses($classes = [], $menu_item = false)
{
  // This menu item is already the current one, do nothin'
  if (in_array('current-menu-item', $classes)) {
    return $classes;
  }

  if ($menu_item->title === 'Blog' && (is_singular('post') || get_the_title() === 'Blog') ||
      $menu_item->title === 'Services' && (is_singular('service') || is_post_type_archive('service')) ||
      $menu_item->title === 'Work' && (is_singular('work') || is_post_type_archive('work')) ||
      $menu_item->title === 'Team' && (is_singular('team') || is_post_type_archive('team'))) {
    $classes[] = 'current-menu-item';
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'addCustomNavClasses', 100, 2);
