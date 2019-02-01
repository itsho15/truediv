<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fds
 */
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
get_header(); ?>

    <div class="td-single-head" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
        <div class="<?php td_theme_width(); ?>">
            
            <div class="td-single-head-meta">
                <?php td_breadcrumbs(); ?>
                <h1 class="page-title"><?php single_post_title(); ?></h1>
                <div class="td-date"><?php echo get_the_date(); ?></div>
            </div>
            
        </div><!-- .container -->
    </div>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="<?php td_theme_width(); ?>">
                
                <?php while ( have_posts() ) :the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( array('td-single clearfix') ); ?>>
                    <div class="td-content">
                        <?php the_content(); ?>
                        <div class="td-tags"><?php the_tags('Tags: ', ''); ?></div>
                        <?php td_social_share(); ?>
                    </div>
                </article><!-- #post-<?php the_ID(); ?> -->
                
                <?php
                // Display Author box information.
                if(Cs_option()['author_box'] == 1):
                if (get_the_author_meta('display_name')) :?>
                <div class="td-author-box">
                    <div class="box-left">
                        <div class="author-img"><?php echo get_avatar(get_the_author_meta('user_email'), '100');?></div>
                    </div>
                    <div class="box-right">
                        <h3 class="author-name">
                            <span><?php echo esc_html__( 'About', TRUEDIV_TEXTDOMAIN ); ?></span>
                            <?php esc_html(the_author_meta('display_name'));?></h3>
                        <p class="author-description"><?php esc_textarea(the_author_meta('description'));?></p>
                    </div>
                </div>
                
                <?php endif;
                endif;
                // Display navigation to next/previous set of posts
                the_post_navigation();
                // Display Related posts
                td_related_posts();
                // If comments are open or we have at least one comment, load up the comment template.
                if(Cs_option()['show_comments'] == 1){
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                }
                endwhile;
                ?>
                
            </div><!-- .container -->
        </main>
    </div>
<?php
get_footer();