<?php
/**
 * Content
 *
 * This template can be overridden by copying it to your-child-theme/template-parts/content.php.
 *
 * @author 		TrueDiv
 * @version   0.0.1
 */
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( array('td-article td-grid clearfix') ); ?>>
    
    <div class="td-thumbnail">
        <?php td_thumbnail('td-grid'); ?>
        <?php td_post_format(); ?>
    </div>
    
    <div class="td-article-inner">

        <div class="td-meta">
            <?php
            if (Cs_option()['post_meta']):
            foreach (Cs_option()['post_meta'] as $key => $value) {


            if ($value == 'Categories'): ?>
            <span class="td-category"><?php the_category(' - ');?></span>
            <?php endif;?>

            <?php if ($value == 'Date'): ?>
            <span class="td-date"><?php echo get_the_date(); ?></span>
            <?php endif;
            }
            endif; ?>
        </div>
        
        <div class="td-title">
            <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
        </div>
        
    </div>
    
</article><!-- #post-<?php the_ID(); ?> -->