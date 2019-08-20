<?

add_theme_support( 'post-thumbnails' ); 

// Autoloading for plugins etc.
require_once __DIR__ . '/vendor/autoload.php';

// Functions
require_once __DIR__ . '/src/functions/autoa.php';
require_once __DIR__ . '/src/functions/get_option.php';
require_once __DIR__ . '/src/functions/image_sizes.php';
require_once __DIR__ . '/src/functions/menus.php';
require_once __DIR__ . '/src/functions/metaboxes.php';
require_once __DIR__ . '/src/functions/plugins.php';
require_once __DIR__ . '/src/functions/pr.php';

// Metabox Groups
require_once __DIR__ . '/src/metabox_groups/front_page.php';
require_once __DIR__ . '/src/metabox_groups/hero.php';
require_once __DIR__ . '/src/metabox_groups/page.php';
require_once __DIR__ . '/src/metabox_groups/service.php';
require_once __DIR__ . '/src/metabox_groups/team.php';

// Options Pages
require_once __DIR__ . '/src/options/contact.php';
require_once __DIR__ . '/src/options/footer.php';
require_once __DIR__ . '/src/options/social.php';

// Post Types
require_once __DIR__ . '/src/post_types/service.php';
require_once __DIR__ . '/src/post_types/team.php';
require_once __DIR__ . '/src/post_types/work.php';

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
