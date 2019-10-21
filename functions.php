<?php

add_theme_support( 'post-thumbnails' );

// Autoloading for plugins etc.
require_once __DIR__ . '/vendor/autoload.php';

// Functions
require_once __DIR__ . '/src/functions/attach_template.php';
require_once __DIR__ . '/src/functions/autoa.php';
require_once __DIR__ . '/src/functions/get_option.php';
require_once __DIR__ . '/src/functions/gforms.php';
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

function removeGutenbergCSS()
{
  wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'removeGutenbergCSS');

function disableWPEmbeds() {
  wp_dequeue_script('wp-embed');
}
add_Action('wp_footer', 'disableWPEmbeds');

/**
 * Highlight 'Blog' nav menu item on all blog pages, 'Services' on service pages etc.
 */
function addCustomNavClasses($classes = [], $menu_item = false)
{
  // This menu item is already the current one, do nothin'
  if (in_array('current-menu-item', $classes)) {
    return $classes;
  }

  if ($menu_item->title === 'Blog' && (is_singular('post') || is_category()) ||
      $menu_item->title === 'Services' && (is_singular('service') || is_post_type_archive('service')) ||
      $menu_item->title === 'Work' && (is_singular('work') || is_post_type_archive('work')) ||
      $menu_item->title === 'Team' && (is_singular('team') || is_post_type_archive('team'))) {
    $classes[] = 'current-menu-item';
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'addCustomNavClasses', 100, 2);

// Changing wrapping oembeds from <p> to <div> with a specific classname, and...
// add "nocookie" To WordPress oEmbeded Youtube Videos
// from: https://wordpress.org/support/topic/video-shortcode-youtube-nocookie-not-working/
function ev_youtube_nocookie_oembed($html) {
  $html = str_replace('youtube.com', 'youtube-nocookie.com', $html);
  $html = '<div class="c-video-embed">' . $html . '</div>';
	return $html;
}
add_filter( 'embed_oembed_html', 'ev_youtube_nocookie_oembed' ); // WordPress

// Add "pseduo archive pages" for services, team, and work post types.
// Note that 'has_archive' => false when declaring the post types.
attachTemplateToPage('services', 'archive-service.php');
attachTemplateToPage('team', 'archive-team.php');
attachTemplateToPage(['work', 'our work'], 'archive-work.php');

function wpImageLinkDefault()
{
  if (get_option('image_default_link_type') !== 'none') {
    update_option('image_default_link_type', 'none');
  }
}
add_action('admin_init', 'wpImageLinkDefault', 10);
