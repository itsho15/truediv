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
// ! Set Content Width
// **********************************************************************// 
if (!isset( $content_width )) $content_width = 1170;

if ( ! function_exists( 'truediv_setup' ) ) {
    function truediv_setup(){
        
        if ( is_singular() ) wp_enqueue_script( "comment-reply" );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Load text domain
        load_theme_textdomain('newwaves', get_template_directory() . '/framework/languages');

        // Add Custom Header
        add_theme_support('custom-header');

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        // Add custom-background
        $BodyColor = array( 'default-color' => 'F9F9F9' );
        add_theme_support( 'custom-background', $BodyColor );

        // Add custom-logo
        add_theme_support( 'custom-logo' );

        // Load regular editor styles into the new block-based editor.
        add_theme_support( 'editor-style' );
        
        // Add support for responsive embeds.
        add_theme_support( 'responsive-embeds' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        add_image_size( 'td-small'  , 220, 150, true );
        add_image_size( 'td-large', 390 , 220, true );
        add_image_size( 'td-post' , 780 , 405, true );
        add_image_size( 'td-test' , 285 , 296, true );
        add_image_size( 'td-list' , 360 , 340, true );
        add_image_size( 'td-grid' , 780 , 500, true );
        add_image_size( 'td-full' , 1170 , 610, true );
        add_image_size( 'td-recent-thumbnails' , 290 , 160, true );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array( 
            'primary' => __('Primary Navigation', TRUEDIV_TEXTDOMAIN),
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array( 'quote', 'audio', 'status','image', 'video', 'link', 'sticky' ) );
        add_post_type_support( 'post', 'post-formats' );
    }
}
add_action('after_setup_theme', 'truediv_setup');