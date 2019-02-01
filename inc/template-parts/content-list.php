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
<article id="post-<?php the_ID(); ?>" <?php post_class( array('td-article td-list clearfix') ); ?>>
    
    <div class="td-thumbnail">
        <?php td_thumbnail('td-list'); ?>
        <?php td_post_format(); ?>
    </div>
    
    <div class="td-article-inner">
        
        <div class="td-title">
            <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
        </div>
        
        <div class="td-meta">
            <?php
            if (Cs_option()['post_meta']):
            foreach (Cs_option()['post_meta'] as $key => $value) {
                if ($value == 'Author'): ?>
            <span class="td-author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>"><?php the_author()?></a></span>
            <?php endif;?>

            <?php if ($value == 'Categories'): ?>
            <span class="td-category"><?php the_category(' - ');?></span>
            <?php endif;?>

            <?php if ($value == 'Date'): ?>
            <span class="td-date"><?php echo get_the_date(); ?></span>
            <?php endif;
            }
            endif; ?>
        </div>
        
        <div class="td-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
        <div class="td-article-bottom d-flex justify-content-between">
            <a class="td-more-link d-flex align-items-center" href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More', TRUEDIV_TEXTDOMAIN); ?></a>
            <span class="td-comment-number d-flex align-items-center"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>
        </div>
        
    </div>
    
</article><!-- #post-<?php the_ID(); ?> -->