<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package truediv
 */
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
// **********************************************************************// 
// ! Include CSS
// **********************************************************************// 
if ( ! function_exists( 'truediv_style' ) ) {
    function truediv_style() {

        if(is_singular()) wp_enqueue_script( 'comment-reply' );
        
        wp_enqueue_style( 'font-awesome-free', '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'truediv_style' );


// **********************************************************************// 
// ! Include JS
// **********************************************************************// 
if ( ! function_exists( 'truediv_script' ) ) {
    function truediv_script() {   

        wp_enqueue_script('truediv-script', TRUEDIV_TEMPLATE_URL . '/assets/js/theme.js', array('jquery'), '1.0.0', true);

    }
}
add_action('wp_enqueue_scripts', 'truediv_script');


// **********************************************************************// 
// ! Admin CSS
// **********************************************************************// 
if ( ! function_exists( 'truediv_admin_style' ) ) {
    function truediv_admin_style() {
        wp_enqueue_style ('style', TRUEDIV_TEMPLATE_URL .'/assets/css/admin.css');
    }
}
add_action( 'admin_enqueue_scripts', 'truediv_admin_style' );
