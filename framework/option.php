<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

// Check core class for avoid errors
if( class_exists( 'CSF' ) ) {

  // Set a unique slug-like ID
  $prefix = 'truediv';

  // Create options
  CSF::createOptions( $prefix, array(
      'menu_title' => esc_html__( 'Theme Options', TRUEDIV_TEXTDOMAIN ),
      'menu_slug'  => 'true-div',
      'show_reset_all' => true,
      'ajax_save'      => true
  ) );
    
  // Header
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'General Option', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-cogs',
    'fields' => array(
        
        array(
            'id'        => 'theme_width',
            'type'      => 'image_select',
            'title'     => esc_html__( 'Select Theme Width', TRUEDIV_TEXTDOMAIN ),
            'options'   => array(
                'container' => TRUEDIV_TEMPLATE_URL . '/assets/images/container.png',
                'container-fluid' => TRUEDIV_TEMPLATE_URL . '/assets/images/container-fluid.png',
            ),
            'default'   => 'container'
        ),
        
        array(
            'id'    => 'theme_boxed',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Boxed Layout', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Disable/Enable Boxed Layout.', TRUEDIV_TEXTDOMAIN ),
            'default' => 0
        ),
        
        array(
            'id'                              => 'body_bg_opt',
            'type'                            => 'background',
            'title'                           => esc_html__( 'Body Background', TRUEDIV_TEXTDOMAIN ),
            'background_gradient'             => false,
            'background_color'                => false,
            'background_origin'               => true,
            'background_clip'                 => true,
            'background_blend-mode'           => true,
            'output' => ('.td-boxed-warp'),
            'desc' => esc_html__( 'Background image appear only if Gradient transparent.', TRUEDIV_TEXTDOMAIN ),
            'dependency' => array( 'theme_boxed', '==', 'true' ),
        ),
        
        
        array(
            'id'        => 'box_bg',
            'type'      => 'color',
            'title'     => esc_html__( 'Box Background Color', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'background-color' => '.td-boxed'),
            'dependency' => array( 'theme_boxed', '==', 'true' ),
            'default' => '#ecf0f1'
        ),
        
        array(
            'id'       => 'box_width',
            'type'     => 'dimensions',
            'height'     => false,
            'title'    => esc_html__( 'Box Width', TRUEDIV_TEXTDOMAIN ),
            'dependency' => array( 'theme_boxed', '==', 'true' ),
            'output' => '.td-boxed',
            'default'  => array(
                'width'  => '1180',
                'unit'   => 'px',
            ),
        ),
        
        array(
            'id'    => 'page_loader',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Page Loader', TRUEDIV_TEXTDOMAIN ),
            'subtitle' => esc_html__( 'Enable/Disable Pager Loader.', TRUEDIV_TEXTDOMAIN ),
            'default' => 0
        ),
        
    )
  ) );

  // Header
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Header', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-window-maximize',
    'fields' => array(
        
        array(
            'id'        => 'header_style',
            'type'      => 'image_select',
            'title'     => esc_html__( 'Select Header Style', TRUEDIV_TEXTDOMAIN ),
            'options'   => array(
                'header_default' => TRUEDIV_TEMPLATE_URL . '/assets/images/header-default.png',
            ),
            'default'   => 'header_default'
        ),
        
        array(
            'id'          => 'header_spacing',
            'type'        => 'spacing',
            'title'       => esc_html__( 'Header Links Padding', TRUEDIV_TEXTDOMAIN ),
            'desc'       => esc_html__( 'Dont worry since you set links padding logo etc will be at middle. (Just make sure links height is more than logo height)', TRUEDIV_TEXTDOMAIN ),
            'output'      => '#td-nav .td-primary-menu > li > a',
            'output_mode' => 'padding',
            'default'     => array(
                'top'       => '30',
                'right'     => '12',
                'bottom'    => '30',
                'left'      => '12',
                'unit'      => 'px',
            ),
        ),
        
        array(
            'id'    => 'search_button',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Search Button', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Show Search button on menu.', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),
        
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'Header Button', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'    => 'header_button_opt',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Header Button', TRUEDIV_TEXTDOMAIN ),
            'subtitle' => esc_html__( 'Enable/Disable header Button.', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),
        
        array(
            'id'      => 'header_button_name',
            'type'    => 'text',
            'title'   => esc_html__( 'Header Button Title', TRUEDIV_TEXTDOMAIN ),
            'default' => esc_html__( 'Contact us', TRUEDIV_TEXTDOMAIN ),
            'dependency' => array( 'header_button_opt', '==', true ),
        ),
        
        array(
            'id'      => 'header_button_name_rtl',
            'type'    => 'text',
            'title'   => esc_html__( 'Header Button Title RTL', TRUEDIV_TEXTDOMAIN ),
            'default' => esc_html__( 'تواصل معنا', TRUEDIV_TEXTDOMAIN ),
            'dependency' => array( 'header_button_opt', '==', true ),
        ),
        
        array(
            'id'      => 'header_button_desc',
            'type'    => 'text',
            'title'   => esc_html__( 'Header Button Desc', TRUEDIV_TEXTDOMAIN ),
            'default' => esc_html__( 'You are welcome.', TRUEDIV_TEXTDOMAIN ),
            'dependency' => array( 'header_button_opt', '==', true ),
        ),
        
        array(
            'id'      => 'header_button_desc_rtl',
            'type'    => 'text',
            'title'   => esc_html__( 'Header Button Desc RTL', TRUEDIV_TEXTDOMAIN ),
            'default' => esc_html__( 'مرحبا بك.', TRUEDIV_TEXTDOMAIN ),
            'dependency' => array( 'header_button_opt', '==', true ),
        ),
        
        array(
            'id'    => 'header_button_icon',
            'type'  => 'media',
            'title' => esc_html__( 'Header Button icon', TRUEDIV_TEXTDOMAIN ),
            'desc' => esc_html__( 'SVG Allowed.', TRUEDIV_TEXTDOMAIN ),
            'dependency' => array( 'header_button_opt', '==', true ),
        ),
        
        array(
            'id'          => 'header_button_link',
            'type'    => 'text',
            'title'   => esc_html__( 'Header Button Link', TRUEDIV_TEXTDOMAIN ),
            'dependency' => array( 'header_button_opt', '==', true ),
            'default' => '#',
        ),
        
        array(
            'id'          => 'header_button_link_rtl',
            'type'    => 'text',
            'title'   => esc_html__( 'Header Button Link RTL', TRUEDIV_TEXTDOMAIN ),
            'dependency' => array( 'header_button_opt', '==', true ),
            'default' => '#',
        ),

        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'Topbar Option', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'    => 'topbar_opt',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Topbar', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Disable/Enable Topbar.', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),
        
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'Sticky Header', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'    => 'sticky_opt',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Sticky Header', TRUEDIV_TEXTDOMAIN ),
            'subtitle' => esc_html__( 'Enable/Disable sticky header.', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),
        
    )
  ) );
    
  // Logo & Favicon
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Logo & Favicon', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-eercast',
    'fields' => array(

        array(
          'type'    => 'heading',
          'content' => esc_html__( 'LOGO', TRUEDIV_TEXTDOMAIN ),
        ),
        
		array(
			'id'        => 'logo_main',
			'type'      => 'media',
            'library'      => 'image',
			'title'     => esc_html__( 'Logo', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Add logo for header.', TRUEDIV_TEXTDOMAIN ),
		),
        
        array(
            'id'     => 'logo_main_width',
            'type'   => 'dimensions',
            'height'   => false,
            'title'  => esc_html__( 'Logo Main Width', TRUEDIV_TEXTDOMAIN ),
            'output' => '.td-logo',
            'default'  => array(
                'width'  => '230',
                'unit'   => 'px',
            ),
        ),
        
		array(
			'id'        => 'logo_main_retina',
			'type'      => 'media',
            'library'      => 'image',
			'title'     => esc_html__( 'Retina Logo', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'optional', TRUEDIV_TEXTDOMAIN ),
			'desc' => esc_html__( 'Retina Logo should be 2x larger than Custom Logo', TRUEDIV_TEXTDOMAIN ),
		),
        
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'STICKY HEADER LOGO', TRUEDIV_TEXTDOMAIN ),
        ),
        
		array(
			'id'        => 'logo_sticky',
			'type'      => 'media',
            'library'      => 'image',
			'title'     => esc_html__( 'Sticky Logo', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Add logo for sticky header.', TRUEDIV_TEXTDOMAIN ),
		),
        
		array(
			'id'        => 'logo_sticky_retina',
			'type'      => 'media',
            'library'      => 'image',
			'title'     => esc_html__( 'Retina Sticky Logo', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'optional', TRUEDIV_TEXTDOMAIN ),
			'desc' => esc_html__( 'Retina Logo should be 2x larger than Sticky Header Logo', TRUEDIV_TEXTDOMAIN ),
		),
        
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'FAVICON', TRUEDIV_TEXTDOMAIN ),
        ),
        
		array(
			'id'        => 'favicon',
			'type'      => 'media',
            'library'      => 'image',
			'title'     => esc_html__( 'Favicon Standard', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Add Favicon Standard.', TRUEDIV_TEXTDOMAIN ),
		),
        
		array(
			'id'        => 'apple_touch_favicon',
			'type'      => 'media',
            'library'      => 'image',
			'title'     => esc_html__( 'Apple Touch Icon', TRUEDIV_TEXTDOMAIN ),
			'desc' => esc_html__( 'apple-touch-icon.png 180x180 pixels.', TRUEDIV_TEXTDOMAIN ),
		),
        
    )
  ) );

  // Typography
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Typography', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-font',
    'fields' => array(

        array(
            'id'      => 'body_opt',
            'type'    => 'typography',
            'title'   =>  esc_html__( 'Body Font Settings', TRUEDIV_TEXTDOMAIN ),
            'output'  => 'body',
            'line_height'    => false,
            'letter_spacing'    => false,
            'text_align'    => false,
            'text_transform'    => false,
            'backup_font_family'    => true,
            'subset'    => false,
            'color'    => false,
            
            'default' => array(
                'font-family'           => 'Roboto',
                'backup-font-family'    => 'Arial, Helvetica, sans-serif',
                'font-size'             => '14',
                'type'                  => 'google',
                'font-weight'           => '400',
                'unit'                  => 'px',
          ),
        ),
        
        array(
            'id'      => 'menu_opt',
            'type'    => 'typography',
            'title'   =>  esc_html__( 'Menu Font Settings', TRUEDIV_TEXTDOMAIN ),
            'output'  => '.td-primary-menu',
            'line_height'    => false,
            'text_align'    => false,
            'backup_font_family'    => true,
            'subset'    => false,
            'color'    => false,
            
            'default' => array(
                'font-family'           => 'Roboto',
                'backup-font-family'    => 'Arial, Helvetica, sans-serif',
                'font-size'             => '14',
                'type'                  => 'google',
                'font-weight'           => '700',
                'unit'                  => 'px',
          ),
        ),
        
        array(
            'id'      => 'h1_opt',
            'type'    => 'typography',
            'title'   =>  esc_html__( 'H1 Font', TRUEDIV_TEXTDOMAIN ),
            'output'  => 'h1',
            'line_height'    => false,
            'text_align'    => false,
            'backup_font_family'    => true,
            'subset'    => false,
            
            'default' => array(
                'font-family'           => 'Merriweather',
                'backup-font-family'    => 'Georgia, serif',
                'font-size'             => '36',
                'letter-spacing'        => '0',
                'text-transform'        => '',
                'color'                 => '#333',
                'type'                  => 'google',
                'font-weight'           => '700',
                'unit'                  => 'px',
          ),
        ),
        
        array(
            'id'      => 'h2_opt',
            'type'    => 'typography',
            'title'   =>  esc_html__( 'H2 Font', TRUEDIV_TEXTDOMAIN ),
            'output'  => 'h2',
            'line_height'    => false,
            'text_align'    => false,
            'backup_font_family'    => true,
            'subset'    => false,
            
            'default' => array(
                'font-family'           => 'Merriweather',
                'backup-font-family'    => 'Georgia, serif',
                'font-size'             => '32',
                'letter-spacing'        => '0',
                'text-transform'        => '',
                'color'                 => '#333',
                'type'                  => 'google',
                'font-weight'           => '700',
                'unit'                  => 'px',
          ),
        ),
        
        array(
            'id'      => 'h3_opt',
            'type'    => 'typography',
            'title'   =>  esc_html__( 'H3 Font', TRUEDIV_TEXTDOMAIN ),
            'output'  => 'h3',
            'line_height'    => false,
            'text_align'    => false,
            'backup_font_family'    => true,
            'subset'    => false,
            
            'default' => array(
                'font-family'           => 'Merriweather',
                'backup-font-family'    => 'Georgia, serif',
                'font-size'             => '28',
                'letter-spacing'        => '0',
                'text-transform'        => '',
                'color'                 => '#333',
                'type'                  => 'google',
                'font-weight'           => '700',
                'unit'                  => 'px',
          ),
        ),
        
        array(
            'id'      => 'h4_opt',
            'type'    => 'typography',
            'title'   =>  esc_html__( 'H4 Font', TRUEDIV_TEXTDOMAIN ),
            'output'  => 'h4',
            'line_height'    => false,
            'text_align'    => false,
            'backup_font_family'    => true,
            'subset'    => false,
            
            'default' => array(
                'font-family'           => 'Roboto',
                'backup-font-family'    => 'Arial, Tahoma, sans-serif',
                'font-size'             => '24',
                'letter-spacing'        => '0',
                'text-transform'        => '',
                'color'                 => '#333',
                'type'                  => 'google',
                'font-weight'           => '700',
                'unit'                  => 'px',
          ),
        ),
        
        array(
            'id'      => 'h5_opt',
            'type'    => 'typography',
            'title'   =>  esc_html__( 'H5 Font', TRUEDIV_TEXTDOMAIN ),
            'output'  => 'h5, .wp-block-cover-text',
            'line_height'    => false,
            'text_align'    => false,
            'backup_font_family'    => true,
            'subset'    => false,
            
            'default' => array(
                'font-family'           => 'Merriweather',
                'backup-font-family'    => 'Georgia, serif',
                'font-size'             => '20',
                'letter-spacing'        => '0',
                'text-transform'        => '',
                'color'                 => '#333',
                'type'                  => 'google',
                'font-weight'           => '700',
                'unit'                  => 'px',
          ),
        ),
        
        array(
            'id'      => 'h6_opt',
            'type'    => 'typography',
            'title'   =>  esc_html__( 'H6 Font', TRUEDIV_TEXTDOMAIN ),
            'output'  => 'h6',
            'line_height'    => false,
            'text_align'    => false,
            'backup_font_family'    => true,
            'subset'    => false,
            
            'default' => array(
                'font-family'           => 'Merriweather',
                'backup-font-family'    => 'Georgia, serif',
                'font-size'             => '16',
                'letter-spacing'        => '0',
                'text-transform'        => '',
                'color'                 => '#333',
                'type'                  => 'google',
                'font-weight'           => '700',
                'unit'                  => 'px',
          ),
        ),
        
        array(
            'id'      => 'single_p',
            'type'    => 'typography',
            'title'   =>  esc_html__( 'Single P Font Settings', TRUEDIV_TEXTDOMAIN ),
            'output'  => '.td-single .td-content p',
            'line_height'    => false,
            'letter_spacing'    => false,
            'text_align'    => false,
            'text_transform'    => false,
            'backup_font_family'    => true,
            'subset'    => false,
            'color'    => false,
            
            'default' => array(
                'font-family'           => 'Roboto',
                'backup-font-family'    => 'Arial, Helvetica, sans-serif',
                'font-size'             => '14',
                'type'                  => 'google',
                'font-weight'           => '400',
                'unit'                  => 'px',
          ),
        ),

    )
  ) );
    
  // Pages
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Pages', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-file-o',
    'fields' => array(

        array(
            'id'    => 'show_comments_pages',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Page Comments', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Show Comments for pages.', TRUEDIV_TEXTDOMAIN ),
            'default' => 0
        ),

    )
  ) );
    
  // Blog
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Blog', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-newspaper-o',
    'fields' => array(

        array(
          'type'    => 'heading',
          'content' => esc_html__( 'OPTIONS', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'        => 'blog_style',
            'type'      => 'image_select',
            'title'     => esc_html__( 'Select Blog Posts Style', TRUEDIV_TEXTDOMAIN ),
            'options'   => array(
                'content' => TRUEDIV_TEMPLATE_URL . '/assets/images/default.png',
                'content-list' => TRUEDIV_TEMPLATE_URL . '/assets/images/content-list.png',
                'content-grid' => TRUEDIV_TEMPLATE_URL . '/assets/images/content-grid.png',
            ),
            'default'   => 'content-list'
        ),
        
        array(
            'id'          => 'grid_col_number',
            'type'        => 'select',
            'title'       => esc_html__( 'Select Grid Column Number', TRUEDIV_TEXTDOMAIN ),
            'desc'       => esc_html__( '3 Column prefer sidebar off.', TRUEDIV_TEXTDOMAIN ),
            'placeholder' => esc_html__( 'Select an option', TRUEDIV_TEXTDOMAIN ),
            'dependency' => array( 'blog_style', '==', 'content-grid' ),
            'options'     => array(
                'col-lg-12'  => '1 Column',
                'col-lg-6'   => '2 Column',
                'col-lg-4'   => '3 Column',
            ),
            'default'     => 'col-lg-6'
        ),
        
        array(
            'id'    => 'blog_sidebar',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Sidebar', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Disable/Enable sidebar.', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),
        
        
        array(
            'id'    => 'sticky_posts',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Sticky Posts', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Disable/Enable Sticky Posts under header.', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),
        
        array(
            'id'      => 'post_number',
            'type'    => 'text',
			'title'     => esc_html__( 'Posts Per Page', TRUEDIV_TEXTDOMAIN ),
			'desc' => esc_html__( 'Number of posts.', TRUEDIV_TEXTDOMAIN ),
            'default' => '4'
        ),
        
        array(
            'id'      => 'excerpt_length',
            'type'    => 'text',
			'title'     => esc_html__( 'Excerpt Length', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Number of words.', TRUEDIV_TEXTDOMAIN ),
            'default' => '20'
        ),
        
        array(
            'id'      => 'post_meta',
            'type'    => 'checkbox',
			'title'     => esc_html__( 'Post Meta', TRUEDIV_TEXTDOMAIN ),
            'subtitle' => esc_html__( 'Select your post meta.', TRUEDIV_TEXTDOMAIN ),
            'options'    => array(
                'Author' => 'Author',
                'Categories' => 'Categories',
                'Date' => 'Date',
            ),
            'default'    => array( 'Author', 'Date', 'Categories' )
        ),
        
        array(
            'id'    => 'post_format',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Post Format', TRUEDIV_TEXTDOMAIN ),
            'subtitle' => esc_html__( 'Enable/Disable post format.', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),
        
        array(
          'type'    => 'heading',
          'content' => esc_html__( 'SINGLE POST', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'    => 'show_comments',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Single Comments', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Show Comments for single.', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),
        
        array(
            'id'    => 'author_box',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Author Box', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Show Author Box.', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),
        
        array(
            'id'    => 'show_related_posts',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Related Posts', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Show Related Posts.', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),
        
        array(
            'id'    => 'share_buttons',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Share Buttons', TRUEDIV_TEXTDOMAIN ),
            'subtitle' => esc_html__( 'Enable/Disable Share Buttons.', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),
    )
  ) );


  // Style
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Colors', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-paint-brush',
    'fields' => array(
        
        array(
          'type'    => 'heading',
          'content' => esc_html__( 'MAIN COLORS', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'        => 'main_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Main Color', TRUEDIV_TEXTDOMAIN ),
            'default' => '#3498db'
        ),
        
        array(
            'id'        => 'sec_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Secondary Color', TRUEDIV_TEXTDOMAIN ),
            'default' => '#2ecc71'
        ),
        
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'BODY COLORS', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'        => 'body_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Body Background', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'background-color' => 'body'),
            'default' => '#ecf0f1'
        ),
        
        array(
            'id'        => 'content_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Content Background', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'background-color' => '#content'),
            'default' => 'transparent'
        ),
        
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'TOPBAR COLORS', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'        => 'topbar_bg',
            'type'      => 'color',
            'title'     => esc_html__( 'Topbar Background', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'background-color' => '.td-topbar'),
            'default' => '#3498db'
        ),
        
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'HEADER COLORS', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'        => 'header_bg',
            'type'      => 'color',
            'title'     => esc_html__( 'Header Background', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'background-color' => '#td_header'),
            'default' => '#fff'
        ),
        
        array(
            'id'        => 'search_box',
            'type'      => 'color',
            'title'     => esc_html__( 'Search Box', TRUEDIV_TEXTDOMAIN ),
            'default' => '#2ecc71'
        ),
        
        array(
            'id'        => 'search_box_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Search Box Text Color, PlaceHolder', TRUEDIV_TEXTDOMAIN ),
            'default' => '#fff'
        ),
  
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'MAIN MENU LV1', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'      => 'menu_link',
            'type'    => 'link_color',
            'title'     => esc_html__( 'Link Color', TRUEDIV_TEXTDOMAIN ),
            'output'  => '#td-nav .td-primary-menu > li > a',
            'default' => array(
                'color' => '#292b33',
                'hover' => '#3498db',
            ),
        ),
        
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'SUB MENU LV2', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'        => 'sub_menu_bg',
            'type'      => 'color',
            'title'     => esc_html__( 'Background Color', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'background-color' => '#td-nav .td-primary-menu > .nomega-menu-item .sub-menu'),
            'default' => '#2c3e50'
        ),
        
        array(
            'id'      => 'sub_menu_link',
            'type'    => 'link_color',
            'title'     => esc_html__( 'Link Color', TRUEDIV_TEXTDOMAIN ),
            'output'  => '#td-nav .td-primary-menu > .nomega-menu-item .sub-menu .menu-item a',
            'default' => array(
                'color' => '#fff',
                'hover' => '#bdc3c7',
            ),
        ),
        
        array(
            'id'        => 'sub_menu_border_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Border Color', TRUEDIV_TEXTDOMAIN ),
            'default' => 'rgba(255, 255, 255, 0.1)'
        ),
        
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'MEGA MENU', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'        => 'mega_menu_bg',
            'type'      => 'color',
            'title'     => esc_html__( 'Background Color', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'background-color' => '#td-nav .td-primary-menu .mega-menu-item .depth0'),
            'default' => '#2c3e50'
        ),
        
        array(
            'id'      => 'mega_menu_link',
            'type'    => 'link_color',
            'title'     => esc_html__( 'Link Color lv1', TRUEDIV_TEXTDOMAIN ),
            'output'  => '#td-nav .td-primary-menu .mega-menu-item .depth0 .menu-item-has-children > a',
            'default' => array(
                'color' => '#ecf0f1',
                'hover' => '#bdc3c7',
            ),
        ),
        
        array(
            'id'      => 'mega_menu_link_2',
            'type'    => 'link_color',
            'title'     => esc_html__( 'Link Color lv2', TRUEDIV_TEXTDOMAIN ),
            'output'  => '#td-nav .td-primary-menu .mega-menu-item .depth0 > li a',
            'default' => array(
                'color' => '#fff',
                'hover' => '#bdc3c7',
            ),
        ),
        
        array(
            'id'        => 'mega_menu_border_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Border Color', TRUEDIV_TEXTDOMAIN ),
            'default' => 'rgba(255, 255, 255, 0.1)'
        ),
        
        array(
            'id'        => 'mega_menu_desc',
            'type'      => 'color',
            'title'     => esc_html__( 'Description Color', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'color' => '#td-nav .td-primary-menu .mega-menu-item .menu-item-description'),
            'default' => '#bdc3c7'
        ),
        
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'BLOG', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'        => 'post_number_pagantion',
            'type'      => 'color',
            'title'     => esc_html__( 'Pagination Numeric', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'background-color' => '.navigation li a, .navigation li a:hover, .navigation li.active a, .navigation li.disabled'),
            'default' => '#2c3e50'
        ),
        
        array(
            'id'        => 'post_number_pagantion_hover',
            'type'      => 'color',
            'title'     => esc_html__( 'Pagination Numeric Hover', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'background-color' => '.navigation li a:hover, .navigation li.active a'),
            'default' => '#3498db'
        ),
        
        array(
          'type'    => 'subheading',
          'content' => esc_html__( 'FOOTER', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'        => 'footer_bg',
            'type'      => 'color',
            'title'     => esc_html__( 'Footer Background', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'background-color' => '.td-footer'),
            'default' => '#2c3e50'
        ),
        
        array(
            'id'        => 'footer_bottom_bg',
            'type'      => 'color',
            'title'     => esc_html__( 'Footer Bottom Background', TRUEDIV_TEXTDOMAIN ),
            'output' => array( 'background-color' => '.td-copyright'),
            'default' => '#34495e'
        ),
        
    )
  ) );
    
  // Seo
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'SEO', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-search-plus',
    'fields' => array(
        
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'GOOGLE', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'      => 'analytics',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Google | Analytics', TRUEDIV_TEXTDOMAIN ),
            'subtitle'   => esc_html__( 'Paste your Google Analytics code here', TRUEDIV_TEXTDOMAIN ),
            'desc'   => esc_html__( 'Code will be included before the closing </head> tag', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'      => 'remarketing',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Google | Remarketing', TRUEDIV_TEXTDOMAIN ),
            'subtitle'   => esc_html__( 'Paste your Google Remarketing code here', TRUEDIV_TEXTDOMAIN ),
            'desc'   => esc_html__( 'Code will be included before the closing </head> tag', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'SEO FIELDS', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'      => 'description',
            'type'    => 'text',
            'title'   => esc_html__( 'Meta | Description', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'      => 'keywords',
            'type'    => 'text',
            'title'   => esc_html__( 'Meta | Keywords', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'ADVANCED', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'    => 'schema_type',
            'type'  => 'switcher',
			'title'     => esc_html__( 'Schema Type', TRUEDIV_TEXTDOMAIN ),
			'desc' => esc_html__( 'Add Schema Type to <html> tag', TRUEDIV_TEXTDOMAIN ),
            'default' => 1
        ),

    )
  ) );
    
  // Contact Info
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Contact Info', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-globe',
    'fields' => array(
        
        array(
          'type'    => 'heading',
          'content' => esc_html__( 'YOUR CONTACT INFORMATION', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'      => 'company_name',
            'type'    => 'text',
			'title'     => esc_html__( 'Company Name', TRUEDIV_TEXTDOMAIN ),
            'default' => get_bloginfo(),
        ),
        
        array(
            'id'      => 'address',
            'type'    => 'text',
			'title'     => esc_html__( 'Address', TRUEDIV_TEXTDOMAIN ),
            'default' => ''
        ),
        
        array(
            'id'      => 'phone_number',
            'type'    => 'text',
			'title'     => esc_html__( 'Phone Number', TRUEDIV_TEXTDOMAIN ),
            'default' => '+974-5557-4988'
        ),
        
        array(
            'id'      => 'mobile_number',
            'type'    => 'text',
			'title'     => esc_html__( 'Mobile Number', TRUEDIV_TEXTDOMAIN ),
            'default' => ''
        ),
        
        array(
            'id'      => 'fax_number',
            'type'    => 'text',
			'title'     => esc_html__( 'Fax Number', TRUEDIV_TEXTDOMAIN ),
            'default' => ''
        ),
        
        array(
            'id'      => 'email_address',
            'type'    => 'text',
			'title'     => esc_html__( 'E-mail Address', TRUEDIV_TEXTDOMAIN ),
            'default' => 'info@new-waves.net'
        ),
        
        array(
            'id'      => 'working_hours',
            'type'    => 'text',
			'title'     => esc_html__( 'Working Hours', TRUEDIV_TEXTDOMAIN ),
            'default' => ''
        ),
    )
  ) );
    
  // Social Media
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Social Media', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-share',
    'fields' => array(
        
        array(
            'id'        => 'social_media',
            'type'      => 'repeater',
            'title'     => esc_html__( 'Social Media', TRUEDIV_TEXTDOMAIN ),
            'fields'    => array(
                
                array(
                    'id'    => 'social_media_name',
                    'type'  => 'text',
                    'title' => esc_html__( 'Social Media Name', TRUEDIV_TEXTDOMAIN ),
                ),
                
                array(
                  'id'    => 'social_media_icon',
                  'type'  => 'icon',
                  'title' => esc_html__( 'Select Icon', TRUEDIV_TEXTDOMAIN ),
                ),
                
                array(
                    'id'    => 'social_media_link',
                    'type'  => 'text',
                    'title' => esc_html__( 'Link', TRUEDIV_TEXTDOMAIN ),
                ),

            ),
        ),
      
    )
  ) );
    
  // Footer
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Footer', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-window-minimize',
    'fields' => array(
        
        array(
          'id'                              => 'footer_bg_opt',
          'type'                            => 'background',
          'title'                           => esc_html__( 'Footer Background', TRUEDIV_TEXTDOMAIN ),
          'background_gradient'             => false,
          'background_color'                => false,
          'background_origin'               => true,
          'background_clip'                 => true,
          'background_blend-mode'           => true,
            'output' => ('.td-footer'),
        ),
        
        array(
            'id'      => 'copyright',
            'type'    => 'textarea',
			'title'     => esc_html__( 'Copyright', TRUEDIV_TEXTDOMAIN ),
			'subtitle' => esc_html__( 'Leave this field blank to show a default copyright.', TRUEDIV_TEXTDOMAIN ),
            'default' => esc_html__( '2019 All Rights Reserved. By New Waves', TRUEDIV_TEXTDOMAIN ),
        ),
    )
  ) );
    
  // Custom CSS & JS
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Custom CSS & JS', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-code',
    'fields' => array(
        
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'CSS Editor', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'       => 'CSS_editor',
            'type'     => 'code_editor',
            'settings' => array(
                'theme'  => 'mbo',
                'mode'   => 'css',
            ),
            'default'  => '',
        ),
        
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'Javascript Editor', TRUEDIV_TEXTDOMAIN ),
        ),
        
        array(
            'id'       => 'JS_editor',
            'type'     => 'code_editor',
            'desc'     => 'To use jQuery code wrap it into jQuery(function($){ ... });',
            'settings' => array(
                'theme'  => 'dracula',
                'mode'   => 'javascript',
            ),
            'default'  => '',
        ),
    )
  ) );
    
  // Backup & Reset
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Backup & Reset', TRUEDIV_TEXTDOMAIN ),
    'icon'      => 'fa fa-gear',
    'fields' => array(
        
    array(
        'type' => 'backup',
    ),
        
    )
  ) );
    
}
