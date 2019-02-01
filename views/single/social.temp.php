<h3 class="td-social-share-title"><?php echo esc_html__('Share this post', TRUEDIV_TEXTDOMAIN); ?></h3>
<div class="td-social-share d-flex bd-highlight">
    <a title="<?php echo esc_html__('Share this post on Facebook', TRUEDIV_TEXTDOMAIN); ?>" class="facebook p-2 flex-fill bd-highlight" href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink());?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=380,width=660');return false;">
        <i class="fa fa-facebook"></i>
        <?php echo esc_html__('Facebook', TRUEDIV_TEXTDOMAIN); ?>
    </a>
    <a title="<?php echo esc_html__('Share this post on Twitter', TRUEDIV_TEXTDOMAIN); ?>" class="twitter p-2 flex-fill bd-highlight" href="https://twitter.com/share?url=<?php esc_url(the_permalink());?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=380,width=660');return false;">
        <i class="fa fa-twitter"></i>
        <?php echo esc_html__('Twitter', TRUEDIV_TEXTDOMAIN); ?>
    </a>
    <a title="<?php echo esc_html__('Share this post on Google Plus', TRUEDIV_TEXTDOMAIN); ?>" class="google-plus p-2 flex-fill bd-highlight" href="https://plus.google.com/share?url=<?php esc_url(the_permalink());?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=380,width=660');return false;">
        <i class="fa fa-google-plus"></i>
        <?php echo esc_html__('Google Plus', TRUEDIV_TEXTDOMAIN); ?>
    </a>
    <?php
if (get_the_post_thumbnail_url(get_the_ID(), 'full')): ?>

    	<a title="<?php echo esc_html__('Share this post on Pinterest', TRUEDIV_TEXTDOMAIN); ?>" class="pinterest p-2 flex-fill bd-highlight" href="//pinterest.com/pin/create/button/?url=<?php esc_url(the_permalink());?>&media=<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>&description=<?php the_title();?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <i class="fa fa-pinterest"></i>
            <?php echo esc_html__('Pinterest', TRUEDIV_TEXTDOMAIN); ?>
        </a>

        <a title="<?php echo esc_html__('Share this post on Tumbr', TRUEDIV_TEXTDOMAIN); ?>" class="tumblr p-2 flex-fill bd-highlight" data-content="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" href="//tumblr.com/widgets/share/tool?canonicalUrl=<?php esc_url(the_permalink());?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=540');return false;">
        <i class="fa fa-tumblr"></i>
        <?php echo esc_html__('Tumblr', TRUEDIV_TEXTDOMAIN); ?>
       </a>

    <?php endif;?>

</div>