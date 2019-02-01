<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package truediv
 */
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
    </section>
    <footer id="colophon" class="td-footer">
        <div class="<?php td_theme_width(); ?>">
            <div class="row">
                
                <div class="col-lg-4">
                    <?php
                    if ( is_active_sidebar( 'footer_widget_1' ) ) {
                        dynamic_sidebar( 'footer_widget_1' );
                    } else {
                        echo '<a class="new-widget-link" href="'. admin_url('widgets.php') .'">'.esc_html__( 'Add Widget 1', TRUEDIV_TEXTDOMAIN ).'</a>' ;
                    }
                    ?>
                </div>

                <div class="col-lg-4">
                    <?php
                    if ( is_active_sidebar( 'footer_widget_2' ) ) {
                        dynamic_sidebar( 'footer_widget_2' );
                    } else {
                        echo '<a class="new-widget-link" href="'. admin_url('widgets.php') .'">'.esc_html__( 'Add Widget 2', TRUEDIV_TEXTDOMAIN ).'</a>' ;
                    }
                    ?>
                </div>

                <div class="col-lg-4">
                    <?php
                    if ( is_active_sidebar( 'footer_widget_3' ) ) {
                        dynamic_sidebar( 'footer_widget_3' );
                    } else {
                        echo '<a class="new-widget-link" href="'. admin_url('widgets.php') .'">'.esc_html__( 'Add Widget 3', TRUEDIV_TEXTDOMAIN ).'</a>' ;
                    }
                    ?>
                </div>
                
            </div><!-- .row -->
        </div><!-- .container -->
    </footer>
    <div class="td-copyright">
        <div class="<?php td_theme_width(); ?>">
            <div class="row">
                
                <div class="col-lg-6">
                    <div class="copyright-left">
                        <?php if(!empty(Cs_option()['copyright'])){ echo Cs_option()['copyright']; } ?>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="copyright-right">
                        <?php td_social_media(); ?>
                    </div>
                </div>
                
            </div><!-- .row -->
        </div><!-- .container -->
    </div>

    <a id="td-back-to-top" title="Back to top" href="#"><i class="fa fa-angle-up"></i></a>

    </div><!-- Boxed layout -->
    </div><!-- Boxed warp -->
<?php wp_footer();?>
</body>
</html>