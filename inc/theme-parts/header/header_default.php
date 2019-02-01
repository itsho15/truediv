<?php
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
} ?>
<header id="td_header" class="<?php if(Cs_option()['sticky_opt'] == 1){ echo "sticky-opt"; } ?>">
    <div class="header-warp">
        <div class="<?php td_theme_width(); ?>">
            
            <div class="d-flex justify-content-between">
                
                <?php echo td_header_logo(); ?>
                
                <div class="nav-warp d-flex align-items-center">
                    <nav id="td-nav" aria-label="Primary Navigation">
                        <?php td_nav('primary', 'td-primary-menu', 'td-primary-menu'); ?>
                    </nav>
                </div>
                
                <?php td_contact_btn(); ?>
                
                <a class="td-bars d-flex align-items-center" href="#"><i class="fa fa-bars"></i></a>
            </div>
            
        </div><!-- .container -->
    </div>
</header>