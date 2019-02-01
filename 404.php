<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ds
 */
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
get_header();
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="<?php td_theme_width(); ?>">
                <section class="error-404 not-found">
                    <header class="page-header mb40">
                        <h1 class="page-title"><?php echo esc_html__( 'Oops! That page can&rsquo;t be found.', TRUEDIV_TEXTDOMAIN ); ?></h1>
                        <p><?php echo esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', TRUEDIV_TEXTDOMAIN ); ?></p>
                    </header>
                    <div class="page-content">
                        <?php get_search_form(); ?>
                    </div>
                </section>
            </div><!-- .container -->
        </main>
    </div>
<?php
get_footer();