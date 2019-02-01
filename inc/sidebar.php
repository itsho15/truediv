<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package truediv
 */
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

if ( ! function_exists( 'td_sidebar' ) ) {
    function td_sidebar() {

        register_sidebar( array(
            'name' => __( 'Sidebar Right', TRUEDIV_TEXTDOMAIN ),
            'id' => 'td-sidebar-right',
            'before_widget' => '<aside id="%1$s" class="td-widget widget %2$s"><div class="td-widget-inner">',
            'after_widget' => "</div></aside>",
            'before_title' => '<div class="td-widget-title"><h4>',
            'after_title' => '</h4></div>'
        ) );
        
        register_sidebar( array(
            'name' => __( 'Footer 1', TRUEDIV_TEXTDOMAIN ),
            'id' => 'footer_widget_1',
            'before_widget' => '<aside id="%1$s" class="td-footer-widget widget %2$s"><div class="td-widget-inner">',
            'after_widget' => "</div></aside>",
            'before_title' => '<div class="td-widget-title"><h4>',
            'after_title' => '</h4></div>'
        ) );
        
        register_sidebar( array(
            'name' => __( 'Footer 2', TRUEDIV_TEXTDOMAIN ),
            'id' => 'footer_widget_2',
            'before_widget' => '<aside id="%1$s" class="td-footer-widget widget %2$s"><div class="td-widget-inner">',
            'after_widget' => "</div></aside>",
            'before_title' => '<div class="td-widget-title"><h4>',
            'after_title' => '</h4></div>'
        ) );
        
        register_sidebar( array(
            'name' => __( 'Footer 3', TRUEDIV_TEXTDOMAIN ),
            'id' => 'footer_widget_3',
            'before_widget' => '<aside id="%1$s" class="td-footer-widget widget %2$s"><div class="td-widget-inner">',
            'after_widget' => "</div></aside>",
            'before_title' => '<div class="td-widget-title"><h4>',
            'after_title' => '</h4></div>'
        ) );
        
        register_sidebar( array(
            'name' => __( 'Mega Menu', TRUEDIV_TEXTDOMAIN ),
            'id' => 'td-mega-menu',
            'before_widget' => '<aside id="%1$s" class="td-footer-widget widget %2$s"><div class="td-widget-inner">',
            'after_widget' => "</div></aside>",
            'before_title' => '<div class="td-widget-title"><h4>',
            'after_title' => '</h4></div>'
        ) );
    }
}
add_action( 'widgets_init', 'td_sidebar' );