<?php
/**
 * The template for displaying search form
 *
 */
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<div class="td-search-form">
 <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url('/') ); ?>">
        <input type="search"  value="<?php echo esc_attr( get_search_query() ); ?>" name="s" class="search-field"  placeholder="<?php echo esc_html__( 'Enter Keyword ..', TRUEDIV_TEXTDOMAIN ); ?>">
    <button class="search-form-submit" type="submit" value="Search"><i class="fa fa-search"></i></button>
 </form>
</div>