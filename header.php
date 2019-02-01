<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package truediv
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?><!DOCTYPE html>
<html <?php language_attributes();?> class="no-js">
    <head>
        <?php td_before_head();
wp_head();?>
    </head>
    <body <?php body_class();?>>
        <?php
td_loader();
td_boxed_warp();
require TRUEDIV_TEMPLATE_PATH . '/inc/theme-parts/header/topbar.php';
if (!empty(Cs_option()['header_style'])) {
	require TRUEDIV_TEMPLATE_PATH . '/inc/theme-parts/header/' . Cs_option()['header_style'] . '.php';
}
?>
        <section id="content">