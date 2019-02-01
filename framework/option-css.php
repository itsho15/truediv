<?php
defined( 'ABSPATH' ) || exit; // Exit if accessed directly
function td_styles() {
// Main Style Css    
wp_enqueue_style ('style', TRUEDIV_TEMPLATE_URL .'/style.css');
    
$main_color                 = Cs_option()['main_color'];
$sec_color                  = Cs_option()['sec_color'];
$sub_menu_border_color      = Cs_option()['sub_menu_border_color'];
$mega_menu_border_color     = Cs_option()['mega_menu_border_color'];
$search_box                 = Cs_option()['search_box'];
$search_box_color           = Cs_option()['search_box_color'];
$h4                         = Cs_option()['h4_opt']['font-family'];
    
$header_button_icon = isset(Cs_option()['header_button_icon']['url']) && Cs_option()['header_button_icon']['url'] ? Cs_option()['header_button_icon']['url'] : TRUEDIV_TEMPLATE_URL . '/assets/icons/support.svg';
    
if( $main_color !== '' && $sec_color !== '' && $sub_menu_border_color !== '' && $mega_menu_border_color !== '' && $search_box !== '' && $search_box_color !== '' && $h4 !== '' ){
        
$css = '
.sticky-posts .first .meta .td-category a,
.sticky-posts .second .meta .td-category a,
.posts-navigation a,
#comments .reply a,
input[type=submit],
#comments .comments-title:before,
.td-widget .td-widget-inner .td-widget-title h4:before,
.td-footer-widget .td-widget-inner .td-widget-title h4:before,
.comment-respond .comment-reply-title:before,
.td-related-posts h2:before,
.single-post .post-navigation,
.wp-block-button__link,
blockquote:before {
    background-color: '. esc_attr($main_color) .' !important;
}

#comments .comment-metadata a:hover,
.comment-respond .logged-in-as a:hover,
.new-post-link:hover,
.new-logo-link:hover,
.new-menu-link:hover,
#td-nav .td-primary-menu .current-menu-item > a,
.td-article .td-meta a:hover,
.td-footer-widget .td-widget-inner ul li a:hover,
.td-related-posts .related-meta h3 a:hover,
.td-article .td-meta .td-author a:hover,
.td-widget .td-widget-inner ul li a:hover,
.td-article .td-title h3 a:hover,
#td_header .td-contact:hover p,
#td_header .td-contact:hover {
    color: '. esc_attr($main_color) .' !important;
}

.td-article .td-article-bottom .td-more-link {
    border-color: '. esc_attr($main_color) .' !important;
    color: '. esc_attr($main_color) .' !important;
}

#comments .comments-title:after,
.td-related-posts h2:after,
.td-footer-widget .td-widget-inner .td-widget-title h4:after,
.td-widget .td-widget-inner .td-widget-title h4:after,
.comment-respond .comment-reply-title:after {
    border-top: 5px solid '. esc_attr($main_color) .' !important;
}

#td-back-to-top,
.posts-navigation a:hover,
#comments .reply a:hover,
.td-header-cart a .cart-count,
input[type="submit"]:hover,
.wp-block-button__link:hover {
    background-color: '. esc_attr($sec_color) .' !important;
}

.td-article .td-article-bottom .td-more-link:hover {
    border-color: '. esc_attr($sec_color) .' !important;
    color: '. esc_attr($sec_color) .' !important;
}

#td-nav .td-primary-menu > .nomega-menu-item .sub-menu .menu-item a {
    border-bottom: 1px dashed '. esc_attr($sub_menu_border_color) .' !important;
}

#td-nav .td-primary-menu .mega-menu-item .depth0 .depth1 li a {
    border-bottom: 1px dashed '. esc_attr($mega_menu_border_color) .' !important;
}

.td-search-box {
    background-color: '. esc_attr($search_box) .' !important;
}

.td-search-box input::placeholder,
.td-search-box input {
    color: '. esc_attr($search_box_color) .' !important;
}

.td-search-page .td-article .td-article-inner h3 {
    font-family: '. esc_attr($h4) .' !important;
}

#td_header .td-contact:before {
    background-image: url('.$header_button_icon.') !important;
}

#loader {
    border-top-color: '. esc_attr($main_color) .' !important;
}

#loader:before {
    border-top-color: '. esc_attr($sec_color) .' !important;
}

#loader:after {
    border-top-color: '. esc_attr($main_color) .' !important;
}
';
    
    }
    wp_add_inline_style( 'style', $css );
}
add_action( 'wp_enqueue_scripts', 'td_styles' );
