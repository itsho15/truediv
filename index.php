<?php
/**
 * The main template file
 *
 */
// Do not allow directly accessing this file.
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
get_header();
$blog_style  = (!empty(Cs_option()['blog_style'])) ? Cs_option()['blog_style'] : '';
$post_number  = (!empty(Cs_option()['post_number'])) ? Cs_option()['post_number'] : '';
$grid_col_number  = (!empty(Cs_option()['grid_col_number'])) ? Cs_option()['grid_col_number'] : '';
?>
<div class="<?php td_theme_width(); ?>">
    
    <?php
    // Latest Post under header
    get_template_part('inc/theme-parts/sticky-posts'); ?>
    
    <div class="row">
        <div class="<?php td_sidebar_opt(); ?>">
            
            <div class="content">
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                
                $args=array(
                    'post_type'=>'post',
                    'post__not_in' => get_option( 'sticky_posts' ),
                    'posts_per_page' => $post_number,
                    'paged'=>$paged
                );
                
                $temp = $wp_query;
                $wp_query= null;
                $wp_query = new WP_Query($args);

                // Grid Blog Style
                if($blog_style == 'content-grid'):
                
                    echo "<div class='row'>";

                    if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();   

                    echo "<div class='".$grid_col_number."'>";
                    get_template_part( 'inc/template-parts/content-grid');
                    echo "</div>";

                    endwhile; 

                    echo "</div>";

                    td_numeric_posts_nav();
                
                    else :

                    // If no content, include the "No posts found" template.
                    get_template_part( 'inc/template-parts/content', 'none' );

                    endif;
                
                else :
                
                    // Other Blog Style
                    if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();   

                    get_template_part( 'inc/template-parts/'. $blog_style);

                    endwhile; 

                    td_numeric_posts_nav();

                    else :

                    // If no content, include the "No posts found" template.
                    get_template_part( 'inc/template-parts/content', 'none' );

                    endif;
                
                endif;
                
                $wp_query = null;
                $wp_query = $temp;
                wp_reset_query(); ?>
                
            </div>
            
        </div><!-- .col-lg-* -->
        <?php get_sidebar(); ?>
        
    </div><!-- .row -->
</div><!-- .container -->
<?php
get_footer();