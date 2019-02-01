<div class="td-related-posts">
        <h2><?php echo esc_html__('Related Posts', TRUEDIV_TEXTDOMAIN); ?></h2>

        <div class="row">
            <?php while ($custom_query->have_posts()): $custom_query->the_post();?>
			            <div class="col-lg-4">
			                <div class="related-meta">
			                    <?php if (has_post_thumbnail()) {?> <a href="<?php the_permalink();?>"> <?php td_thumbnail('td-large');?></a><?php }?>
			                    <?php the_title('<h3><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');?>
			                </div>
			            </div>
			            <?php endwhile;?>
        </div>
</div>