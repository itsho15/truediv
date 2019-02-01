<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package truediv
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
// ************************************************************************//
// ! Custom Views templates
// ************************************************************************//
if (!function_exists('td_view')) {
	function td_view($viewDir, $data = []) {

		if (\strpos($viewDir, '.') !== false) {
			$viewDir = str_replace('.', '/', $viewDir);
		}

		$viewPath = get_template_directory() . '/views/' . $viewDir . '.temp.php';

		if (file_exists($viewPath)) {
			extract($data);

			include get_template_directory() . '/views/' . $viewDir . '.temp.php';
		} else {
			echo "The file $viewDir does not exist in views Folder";
		}

	}
}
// Navigation.
if (!function_exists('td_nav')) {
	function td_nav($navigation, $id, $class) {
		if (has_nav_menu($navigation)) {
			wp_nav_menu(array(
				'theme_location'  => $navigation,
				'container'       => '',
				'container_class' => '',
				'menu_id'         => $id,
				'menu_class'      => $class,
			));
		} else {
			echo '<a class="new-menu-link" href="' . admin_url('nav-menus.php') . '" target="_blank">' . esc_html__('Make New Menu', TRUEDIV_TEXTDOMAIN) . '</a>';
		}
	}
}

// Logo.
if (!function_exists('td_header_logo')) {
	function td_header_logo() {

		$homeLink = home_url();
		$logo     = (!empty(Cs_option()['logo_main']['url'])) ? Cs_option()['logo_main']['url'] : '';
		$sticky   = (!empty(Cs_option()['logo_sticky']['url'])) ? Cs_option()['logo_sticky']['url'] : '';

		if ($logo) {
			$output = '';
			$output .= '<div class="td-logo logo-warp d-flex align-items-center">';
			$output .= '<a href="' . $homeLink . '">';
			$output .= '<img class="logo-main" src="' . esc_url($logo) . '" alt="Main Logo"/>';
			$output .= '<img class="logo-sticky" src="' . esc_url($sticky) . '" alt="Sticky Logo"/>';
			$output .= '</a>';
			$output .= '</div>';

		} else {
			$output = '<a class="new-logo-link" href="' . admin_url('?page=true-div#tab=3') . '" target="_blank">' . esc_html__('Add Your Logo', TRUEDIV_TEXTDOMAIN) . '</a>';
		}

		return $output;
	}
}

// Thumbnail.
if (!function_exists('td_thumbnail')) {
	function td_thumbnail($size) {
		if (has_post_thumbnail()) {?>
    <a href="<?php the_permalink();?>"><?php the_post_thumbnail($size, array('class' => 'img-fluid'));?></a>
    <?php } else {
			echo '<img class="img-fluid" src="' . get_template_directory_uri() . '/assets/images/thumbnail-default.jpg" alt="default thumbnail" />';
		}
	}
}

// Navbar
if (!function_exists('td_nav_menu_right_items')) {
	function td_nav_menu_right_items($items, $args) {

		if ($args->theme_location == 'primary') {

			$output = '';
			// Disable or enable Search button
			if (Cs_option()['search_button'] == 1) {
				$output .= '<li class="td-header-search nomega-menu-item"><a href="#"><i class="fa fa-search"></i></a>';
				$output .= '<ul class="td-search-box sub-menu">';
				$output .= '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">';
				$output .= '<input type="search"  value="' . esc_attr(get_search_query()) . '" name="s" class="search-field"  placeholder="' . esc_html__('Enter Keyword ..', TRUEDIV_TEXTDOMAIN) . '">';
				$output .= '<button class="search-form-submit" type="submit" value="Search"><i class="fa fa-search"></i></button>';
				$output .= '</form>';
				$output .= '</ul>';
				$output .= '</li>';
			}

			if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
				$count = WC()->cart->cart_contents_count;
				$output .= "<li class='td-header-cart nomega-menu-item'>";
				$output .= "<a href='" . wc_get_cart_url() . "' title='View your shopping cart'>";
				$output .= "<i class='fa fa-shopping-bag'></i>";
				if ($count > 0) {
					$output .= "<span class='cart-count'>" . esc_html($count) . "</span>";
				}
				$output .= "</a></li>";
			}

			$items = $items . $output;
		}
		return $items;
	}
}
add_filter('wp_nav_menu_items', 'td_nav_menu_right_items', 10, 2);

// Related Posts
if (!function_exists('td_related_posts')) {
	function td_related_posts() {
		if (Cs_option()['show_related_posts'] == 1) {
			$custom_query_args = array(
				'posts_per_page'      => 3, // Number of related posts to display
				'post__not_in'        => array(get_the_ID()), // Ensure that the current post is not displayed
				'orderby'             => 'rand', // Randomize the results
				'ignore_sticky_posts' => 1,
			);

			// Initiate the custom query
			$custom_query = new WP_Query($custom_query_args);

			// Run the loop and output data for the results
			if ($custom_query->have_posts()):
				return td_view('related_post', compact('custom_query'));

			else: ?>
    <p><?php echo esc_html__('Sorry, no related articles to display', TRUEDIV_TEXTDOMAIN); ?></p>
    <?php endif;
			// Reset postdata
			wp_reset_postdata();
		}
	}
}

// Post Format
if (!function_exists('td_post_format')) {
	function td_post_format() {
		if (Cs_option()['post_format'] == 1) {
			// Post format to disable on post
			if (has_post_format('quote')): ?><span class="td-format td-quote-icon"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
            <?php elseif (has_post_format('audio')): ?><span class="td-format td-audio-icon"><i class="fa fa-volume-up" aria-hidden="true"></i></span>
            <?php elseif (has_post_format('status')): ?><span class="td-format td-status-icon"><i class="fa fa-commenting-o" aria-hidden="true"></i></span>
            <?php elseif (has_post_format('image')): ?><span class="td-format td-image-icon"><i class="fa fa-image" aria-hidden="true"></i></span>
            <?php elseif (has_post_format('video')): ?><span class="td-format td-video-icon"><i class="fa fa-video-camera" aria-hidden="true"></i></span>
            <?php elseif (has_post_format('link')): ?><span class="td-format td-link-icon"><i class="fa fa-link" aria-hidden="true"></i></span>
            <?php else: ?><span class="td-format td-standard-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
            <?php endif;
		}
	}
}

//  Codestar Freamwork
if (!function_exists('Cs_option')) {
	function Cs_option($prefix = null) {
		return ($prefix != null) ? get_option($prefix) : get_option('truediv');
	}
}

//  Codestar Freamwork Group
if (!function_exists('Cs_option_group')) {
	function Cs_option_group($fieldname, $prefix = null) {
		$prefix = ($prefix != null) ? get_option($prefix) : get_option('truediv');
		if ($prefix[$fieldname]) {
			foreach ($prefix[$fieldname] as $key => $value) {
				$data[] = $value;
			}
			return $data;
		} else {
			return array();
		}
	}
}

// Sidebar
if (!function_exists('td_sidebar_opt')) {
	function td_sidebar_opt() {
		// for sidebar option - col-lg-8 or col-lg-12
		if (Cs_option()['blog_sidebar'] == 1) {
			echo "col-lg-8";
		} else {
			echo "col-lg-12";}
	}
}

// Theme Width
if (!function_exists('td_theme_width')) {
	function td_theme_width() {
		// container or container-fluid
		if (!empty(Cs_option()['theme_width'])) {
			echo Cs_option()['theme_width'];
		}
	}
}

// Before <Head>
if (!function_exists('td_before_head')) {
	function td_before_head() {
		?>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php if (!empty(Cs_option()['favicon']['url'])) {echo Cs_option()['favicon']['url'];}?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php if (!empty(Cs_option()['apple_touch_favicon']['url'])) {echo Cs_option()['apple_touch_favicon']['url'];}?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())): ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
    <?php endif;
	}
}

// Boxed Layout
if (!function_exists('td_boxed_warp')) {
	function td_boxed_warp() {?>
    <div class="boxed-warp<?php if (Cs_option()['theme_boxed'] == 1) {echo " td-boxed-warp";}?>">
        <div class="boxed<?php if (Cs_option()['theme_boxed'] == 1) {echo " td-boxed";}?>">
            <?php }
}

// Social Share
if (!function_exists('td_social_share')) {
	function td_social_share() {
		if (Cs_option()['share_buttons'] == 1):
			return td_view('single.social');
		endif;
	}
}

// Social Media Links
if (!function_exists('td_social_media')) {
	function td_social_media() {
		if (Cs_option_group('social_media')): ?>

            <ul class="td-social">
                <?php foreach (Cs_option_group('social_media') as $value) {?>
                <li><a href="<?php echo $value['social_media_link']; ?>" target="_blank"><i class="<?php echo $value['social_media_icon']; ?>"></i></a></li>
                <?php }
		;?>
            </ul>

            <?php else:echo '<a class="new-social-link" href="' . admin_url('?page=true-div#tab=9') . '" target="_blank">' . esc_html__('Add Social Media Links', TRUEDIV_TEXTDOMAIN) . '</a>';
		endif;
	}
}

// Footer
if (!function_exists('td_contact_btn')) {
	function td_contact_btn() {
		if (Cs_option()['header_button_opt'] == 1) {

			$header_button_name     = (!empty(Cs_option()['header_button_name'])) ? Cs_option()['header_button_name'] : '';
			$header_button_name_rtl = (!empty(Cs_option()['header_button_name_rtl'])) ? Cs_option()['header_button_name_rtl'] : '';
			$header_button_desc     = (!empty(Cs_option()['header_button_desc'])) ? Cs_option()['header_button_desc'] : '';
			$header_button_desc_rtl = (!empty(Cs_option()['header_button_desc_rtl'])) ? Cs_option()['header_button_desc_rtl'] : '';
			$header_button_link     = (!empty(Cs_option()['header_button_link'])) ? Cs_option()['header_button_link'] : '';
			$header_button_link_rtl = (!empty(Cs_option()['header_button_link'])) ? Cs_option()['header_button_link'] : '';

			if (is_rtl()) {
				echo '<div class="contact-warp d-flex align-items-center">';
				echo '<a class="td-contact" href="' . $header_button_link_rtl . '"><span>' . $header_button_name_rtl . '</span><p>' . $header_button_desc_rtl . '</p></a>';
				echo '<div>';
			} else {
				echo '<div class="contact-warp d-flex align-items-center">';
				echo '<a class="td-contact" href="' . $header_button_link . '"><span>' . $header_button_name . '</span><p>' . $header_button_desc . '</p></a>';
				echo '<div>';
			}
		}
	}
}

// Placeholder
if (!function_exists('td_loader')) {
	function td_loader() {
		if (!empty(Cs_option()['page_loader']) && !empty(Cs_option()['page_loader']) == 1) {
			echo '<div id="loader-wrapper">';
			echo '<div id="loader"></div>';
			echo '<div class="loader-section section-left"></div>';
			echo '<div class="loader-section section-right"></div>';
			echo '</div>';
		}
	}
}