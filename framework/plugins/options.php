<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'truediv_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function truediv_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
	$root = TRUEDIV_TEMPLATE_PATH . 'framework/plugins/plugins/';
    $plugins = array(
        
		array(
            'name'               => 'New Waves Core',
            'slug'               => 'newwaves-core',
            'source'             => $root .'',
            'required'           => true,
			'external_url' 	 => '',
        ),

		array(
            'name'               => 'Wp User Avatar',
            'slug'               => 'wp-user-avatar',
            'source'             => $root .'//downloads.wordpress.org/plugin/wp-user-avatar.zip',
            'required'           => false,
            'external_url'           => '',
        ),
        
		array(
            'name'               => 'Go Live Update Urls',
            'slug'               => 'go-live-update-urls',
            'source'             => $root .'//downloads.wordpress.org/plugin/go-live-update-urls.5.2.3.zip',
            'required'           => false,
            'external_url'           => '',
        ),   
        
		array(
            'name'               => 'Ninja Forms',
            'slug'               => 'ninja-forms',
            'source'             => $root .'//downloads.wordpress.org/plugin/ninja-forms.zip',
            'required'           => false,
            'external_url'           => '',
        ),  
        
		array(
            'name'               => 'Duplicate Post',
            'slug'               => 'duplicate-post',
            'source'             => $root .'//downloads.wordpress.org/plugin/duplicate-post.3.2.2.zip',
            'required'           => false,
            'external_url'           => '',
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain' => TRUEDIV_TEXTDOMAIN, // Text domain - likely want to be the same as your theme.
        'default_path' => '',
        //'parent_menu_slug' => 'themes.php', // Default parent menu slug
        //'parent_url_slug' => 'themes.php', // Default parent URL slug
        'menu' => 'install-required-plugins', // Menu slug
        'has_notices' => true, // Show admin notices or not
        'is_automatic' => false, // Automatically activate plugins after installation or not
        'message' => '', // Message to output right before the plugins table
        'strings' => array(
            'page_title' => esc_html__('Install Required Plugins', TRUEDIV_TEXTDOMAIN),
            'menu_title' => esc_html__('Install Plugins', TRUEDIV_TEXTDOMAIN),
            'installing' => esc_html__('Installing Plugin: %s', TRUEDIV_TEXTDOMAIN), // %1$s = plugin name
            'oops' => esc_html__('Something went wrong with the plugin API.', TRUEDIV_TEXTDOMAIN),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', TRUEDIV_TEXTDOMAIN), // %1$s = plugin name(s)
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', TRUEDIV_TEXTDOMAIN), // %1$s = plugin name(s)
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', TRUEDIV_TEXTDOMAIN), // %1$s = plugin name(s)
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', TRUEDIV_TEXTDOMAIN), // %1$s = plugin name(s)
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', TRUEDIV_TEXTDOMAIN), // %1$s = plugin name(s)
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', TRUEDIV_TEXTDOMAIN), // %1$s = plugin name(s)
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', TRUEDIV_TEXTDOMAIN), // %1$s = plugin name(s)
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', TRUEDIV_TEXTDOMAIN), // %1$s = plugin name(s)
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', TRUEDIV_TEXTDOMAIN),
            'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins', TRUEDIV_TEXTDOMAIN),
            'return' => esc_html__('Return to Required Plugins Installer', TRUEDIV_TEXTDOMAIN),
            'plugin_activated' => esc_html__('Plugin activated successfully.', TRUEDIV_TEXTDOMAIN),
            'complete' => esc_html__('All plugins installed and activated successfully. %s', TRUEDIV_TEXTDOMAIN), // %1$s = dashboard link
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );
    tgmpa($plugins, $config);
}