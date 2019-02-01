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
if ( ! is_active_sidebar( 'td-sidebar-right' ) ) {
	return;
}
?>
<?php if(Cs_option()['blog_sidebar'] == 1): ?>
<div class="col-lg-4">
<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar( 'td-sidebar-right' );?>
</aside><!-- #secondary -->
</div>
<?php
endif;