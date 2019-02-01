<?php
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
// Display Topbar
if(Cs_option()['topbar_opt'] == 1): ?>
<div class="td-topbar">
    <div class="<?php td_theme_width(); ?>">
        
        <div class="d-flex justify-content-between">
            
            <div class="td-topbar-left">
                <ul class="top-contact-info">
                    <?php if(!empty(Cs_option()['company_name'])): ?>
                    <li class="company-name"><?php echo Cs_option()['company_name']; ?></li>
                    <?php endif; ?>
                    <?php if(!empty(Cs_option()['address'])): ?>
                    <li class="address"><?php echo Cs_option()['address']; ?></li>
                    <?php endif; ?>
                    <?php if(!empty(Cs_option()['phone_number'])): ?>
                    <li class="phone-number"><a href="tel:<?php echo Cs_option()['phone_number']; ?>"><?php echo Cs_option()['phone_number']; ?></a></li>
                    <?php endif; ?>
                    <?php if(!empty(Cs_option()['mobile_number'])): ?>
                    <li class="mobile-number"><a href="tel:<?php echo Cs_option()['mobile_number']; ?>"><?php echo Cs_option()['mobile_number']; ?></a></li>
                    <?php endif; ?>
                    <?php if(!empty(Cs_option()['fax_number'])): ?>
                    <li class="fax-number"><?php echo Cs_option()['fax_number']; ?></li>
                    <?php endif; ?>
                    <?php if(!empty(Cs_option()['email_address'])): ?>
                    <li class="email-address"><a href="mailto:<?php echo Cs_option()['email_address']; ?>"><?php echo Cs_option()['email_address']; ?></a></li>
                    <?php endif; ?>
                    <?php if(!empty(Cs_option()['working_hours'])): ?>
                    <li class="working-hours"><?php echo Cs_option()['working_hours']; ?></li>
                    <?php endif; ?>
                </ul>
            </div>
            
            <div class="td-topbar-right">
                <?php td_social_media(); ?>
            </div>
            
        </div>
        
    </div><!-- .container -->
</div>
<?php endif; ?>