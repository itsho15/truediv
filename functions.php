<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package truediv
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

if (!defined('TRUEDIV_TEMPLATE_PATH')) {
	define('TRUEDIV_TEMPLATE_PATH', get_template_directory() . '/');
}

if (!defined('TRUEDIV_TEMPLATE_URL')) {
	define('TRUEDIV_TEMPLATE_URL', get_template_directory_uri());
}

if (!defined('TRUEDIV_ADMIN')) {
	define('TRUEDIV_ADMIN', admin_url());
}

if (!defined('TRUEDIV_TEXTDOMAIN')) {
	define('TRUEDIV_TEXTDOMAIN', 'newwaves');
}

// ************************************************************************//
// !  Wp Helpers
// ************************************************************************//
require_once TRUEDIV_TEMPLATE_PATH . '/app/autoloadClasses.php';
// ************************************************************************//
// !  custom routes
// ************************************************************************//
require_once TRUEDIV_TEMPLATE_PATH . '/routes/web.php';
// ************************************************************************//
// ! After theme setup
// ************************************************************************//
require_once TRUEDIV_TEMPLATE_PATH . 'inc/theme-setup.php';

// ************************************************************************//
// ! Theme Functions
// ************************************************************************//
require_once TRUEDIV_TEMPLATE_PATH . 'inc/theme-functions.php';

// ************************************************************************//
// ! Wordpress edit functions
// ************************************************************************//
require_once TRUEDIV_TEMPLATE_PATH . 'inc/wp-int.php';

// ************************************************************************//
// ! Enqueue CSS and JS
// ************************************************************************//
require_once TRUEDIV_TEMPLATE_PATH . 'inc/enqueue.php';

// ************************************************************************//
// ! Sidebars
// ************************************************************************//
require_once TRUEDIV_TEMPLATE_PATH . 'inc/sidebar.php';

// ************************************************************************//
// ! Plugins activation
// ************************************************************************//
require_once TRUEDIV_TEMPLATE_PATH . 'framework/plugins/options.php';

// ************************************************************************//
// ! Mega Menu
// ************************************************************************//
require_once TRUEDIV_TEMPLATE_PATH . 'framework/megamenu/mega-menu.php';

// ************************************************************************//
// ! Admin
// ************************************************************************//
require_once TRUEDIV_TEMPLATE_PATH . 'framework/option.php';

// ************************************************************************//
// ! Option CSS
// ************************************************************************//
require_once TRUEDIV_TEMPLATE_PATH . 'framework/option-css.php';