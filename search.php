<?php
/**
 * The main template file
 *
 */
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
get_header(); ?>
    <section class="td-search-page">
        <div class="<?php td_theme_width(); ?>">
            <div class="row">
                <div class="<?php td_sidebar_opt(); ?>">
                    <?php if ( have_posts() ) : ?>
                    <header class="page-header">
                        <h1 class="page-title">
                            <?php printf( esc_html__( 'Search Results for: %s', TRUEDIV_TEXTDOMAIN ), '<span>' . get_search_query() . '</span>' ); ?>
                        </h1>
                    </header>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( array('td-article clearfix') ); ?>>
                        <div class="td-article-inner">
                            <div class="td-thumbnail">
                                <?php td_thumbnail('td-small'); ?>
                            </div>
                            <div class="td-meta">
                                <span class="td-date"><?php echo get_the_date(); ?></span>
                                <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article><!-- #post-<?php the_ID(); ?> -->
                    <?php endwhile;
                    // Display numeric navigation to next/previous set of posts
                    td_numeric_posts_nav();
                    else :
                    // If no content, include the "No posts found" template.
                    get_template_part( 'inc/template-parts/content', 'none' );
                    endif;
                    ?>
                </div><!-- .col-lg-* -->
                <?php get_sidebar(); ?>
            </div><!-- .row -->
        </div><!-- .container -->
    </section>
<?php
get_footer();