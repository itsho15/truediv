<?php
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class( array('td-page') ); ?>>
                <?php the_content( ); ?>
            </div><!-- #post-<?php the_ID(); ?> -->
            <?php // If comments are open or we have at least one comment, load up the comment template.
            if(Cs_option()['show_comments_pages'] == 1){
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            }
            endwhile; // End of the loop.
            ?>
        </main>
    </div>
<?php
get_footer();