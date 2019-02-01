<?php
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
// Display Sticky Posts
if(Cs_option()['sticky_posts'] == 1):
    if(is_sticky()):
?>
    <div class="sticky-posts">
        <div class="row">
            
            <?php 
            $sticky = get_option('sticky_posts');
            rsort($sticky);
            $sticky = array_slice($sticky, 0, 3);
            $queryObject = new  Wp_Query( array( 
                'showposts' => 3,
                'ignore_sticky_posts' => 1,
                'post_type' => array('post'),
                'post__in' => $sticky,                
            )); ?>
            
            <?php if ( $queryObject->have_posts() ) : $i = 0; while ( $queryObject->have_posts() ) : $queryObject->the_post(); ?>
            
            <?php if ( $i == 0 ) : ?>
            <div class="col-lg-6">
                <div class="first">
                    <div class="thumb">
                        <?php td_thumbnail('td-post'); ?>
                    </div>
                    <div class="meta">
                        <span class="td-category"><?php the_category(' ');?></span>
                        <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                        <span class="date"><?php echo get_the_date(); ?></span>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ( $i != 0 ) : ?>
            <div class="col-lg-3 col-6">
                <div class="second">
                    <div class="thumb">
                        <?php td_thumbnail('td-test'); ?>
                    </div>
                    <div class="meta">
                        <span class="td-category"><?php the_category(' ');?></span>
                        <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                        <span class="date"><?php echo get_the_date(); ?></span>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <?php $i++; ?>
            
            <?php endwhile;  ?>
            <?php endif; ?>
            
        </div><!-- .row -->
    </div>
<?php endif;
endif; ?>