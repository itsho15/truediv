<?php
/**
 * Content None
 *
 * This template can be overridden by copying it to your-child-theme/template-parts/content-none.php.
 *
 * @author 		TrueDiv
 * @version   0.0.1
 */
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<div class="no-results">
	<div class="text-center">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) :
        echo '<h5><a class="new-post-link" href="'. admin_url('post-new.php') .'">'.esc_html__( 'Ready to publish your first post?', TRUEDIV_TEXTDOMAIN ).'</a></h5>';
        elseif ( is_search() ) : ?>
        <h3><?php echo esc_html__( 'Nothing Found', TRUEDIV_TEXTDOMAIN ); ?></h3>
        <p><?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', TRUEDIV_TEXTDOMAIN ); ?></p>
        <?php get_search_form(); 
        else : ?>
        <h3><?php echo esc_html__( 'Nothing Found', TRUEDIV_TEXTDOMAIN ); ?></h3>
        <p><?php echo esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', TRUEDIV_TEXTDOMAIN ); ?></p>
        <?php get_search_form(); 
        endif; ?>
    </div>
</div>