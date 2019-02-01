<?php
/**
* Template Name: Full Width
*
* @package NewWaves
* @subpackage NewWaves
* @since NewWavesn 1.0
*/
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

    <?php the_content( ); ?>

    <?php // If comments are open or we have at least one comment, load up the comment template.
    if(Cs_option()['show_comments_pages'] == 1){
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    }
    endwhile; // End of the loop.
    ?>

<?php
get_footer();