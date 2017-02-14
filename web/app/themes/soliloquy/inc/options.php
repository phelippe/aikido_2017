<?php
  
// #################################################
// Reg. js / css
// #################################################

function soliloquy_customizer_styles() { ?>
	<style type="text/css">
	    .button-soliloquy-secondary{width: 80%!important;margin: 5px auto 5px auto!important; display: block!important; text-align: center!important;margin-top:15px!important;margin-bottom:15px!important;}
        .button-nimbus{background: #e92c6a!important; border-color:#e92c6a!important; -webkit-box-shadow: 0 1px 0 #e92c6a!important; box-shadow: 0 1px 0 #e92c6a!important; color: #fff!important; text-decoration: none!important; text-shadow: 0 -1px 1px #e92c6a,1px 0 1px #e92c6a,0 1px 1px #e92c6a,-1px 0 1px #e92c6a!important;width: 80%!important; margin: 5px auto 5px auto!important; display: block!important; text-align: center!important;margin-top:15px!important;margin-bottom:15px!important;}
        .soliloquy-hide{display:none!important;}
        #accordion-section-pro_features>h3.accordion-section-title:before,#accordion-section-slideshow-options>h3.accordion-section-title:before { content: "Pro"!important; position: relative!important; top: -1px!important; margin-left: 0px!important; padding: 3px 6px !important; line-height: 1.5 !important; font-size: 9px !important; color: #ffffff !important; background-color: #e92c6a!important; letter-spacing: 1px!important; text-transform: uppercase!important; -webkit-font-smoothing: subpixel-antialiased !important; }
	</style>
<?php }
add_action( 'customize_controls_print_styles', 'soliloquy_customizer_styles', 20 );

// #################################################
// Kirki
// #################################################

Kirki::add_config( 'soliloquy-config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

// User Guide


Kirki::add_section( 'setup', array(
    'title'          => __( 'Theme Userguide', 'soliloquy' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'settings' => 'userguide-info',
	'label'    => __( 'Userguide', 'soliloquy' ),
	'section'  => 'setup',
	'type'     => 'custom',
	'priority' => 1,
	'description'   => __( 'This theme was designed to be very easy to set up but just in case we\'ve created a userguide to assist: ', 'soliloquy' ) . '<a href="https://docs.google.com/document/d/1vZAp4IAwl9cX2jrtt6bRFC6uKT0EmJGGMqQVMawSvro" target="_blank" class="button button-soliloquy-secondary">View User Guide</a>',
) );

// General

Kirki::add_section( 'general', array(
    'title'          => __( 'General Theme Settings', 'soliloquy' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'example-toggle',
	'label'       => __( 'Turn on/off all example content', 'soliloquy' ),
	'section'     => 'general',
	'default'     => 'on',
	'priority'    => 1,
	'choices'     => array(
		'on'   => __( 'Show Demo', 'soliloquy' ),
		'off'   => __( 'Hide Demo', 'soliloquy' ),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'settings' => 'copyright',
	'label'    => __( 'Copyright Text', 'soliloquy' ),
	'section'  => 'general',
	'type'     => 'text',
	'priority' => 10,
	'default'  => get_bloginfo( 'name' )
) );

// Frontpage

Kirki::add_panel( 'frontpage', array(
    'priority'    => 10,
    'title'       => __( 'Frontpage Options', 'soliloquy' ),
    'description' => __( '', 'soliloquy' ),
) );

Kirki::add_section( 'banner', array(
    'title'          => __( 'Frontpage Banner', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'frontpage', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'soliloquy_banner_option',
	'label'       => __( 'Turn on/off all example content', 'soliloquy' ),
	'section'     => 'banner',
	'default'     => 'on',
	'priority'    => 1,
	'choices'     => array(
		'image_content_width'   => __( 'Banner Image', 'soliloquy' ),
		'none'   => __( 'No Banner', 'soliloquy' ),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'image',
	'settings'    => 'soliloquy_content_width_banner',
	'label'       => __( 'Banner Image', 'soliloquy' ),
	'description' => __( 'Create and upload a banner image at 1170x385px.', 'soliloquy' ),
	'section'     => 'banner',
	'default'     => '',
	'priority'    => 10,
) );

Kirki::add_section( 'featured', array(
    'title'          => __( 'Featured Boxes', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'frontpage', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'soliloquy_toggle_featured',
	'label'       => __( 'Check here to display four featured pages under the banner on the frontpage.', 'soliloquy' ),
	'section'     => 'featured',
	'default'     => '1',
	'priority'    => 1,
	'choices'     => array(
		'1'   => __( 'Show', 'soliloquy' ),
		'2'   => __( 'Hide', 'soliloquy' ),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'select',
	'settings'    => 'soliloquy_left_featured',
	'label'       => __( 'Set the page to display in the left feature column on the frontpage. Remember to set a featured image for this page if you want one to appear. (from latest 50)', 'soliloquy' ),
	'section'     => 'featured',
	'default'     => '',
	'priority'    => 5,
	'multiple'    => 1,
	'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 50, 'post_type' => 'page' ) ),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'select',
	'settings'    => 'soliloquy_center_featured',
	'label'       => __( 'Set the page to display in the center feature column on the frontpage. Remember to set a featured image for this page if you want one to appear. (from latest 50)', 'soliloquy' ),
	'section'     => 'featured',
	'default'     => '',
	'priority'    => 5,
	'multiple'    => 1,
	'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 50, 'post_type' => 'page' ) ),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'select',
	'settings'    => 'soliloquy_right_featured',
	'label'       => __( 'Set the page to display in the right feature column on the frontpage. Remember to set a featured image for this page if you want one to appear. (from latest 50)', 'soliloquy' ),
	'section'     => 'featured',
	'default'     => '',
	'priority'    => 5,
	'multiple'    => 1,
	'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 50, 'post_type' => 'page' ) ),
) );

// Blog

Kirki::add_section( 'blog', array(
    'title'          => __( 'Blog Settings', 'soliloquy' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'checkbox',
	'settings'    => 'display_bio',
	'label'       => __( 'Select to display the author\'s bio at the bottom of the post.', 'soliloquy' ),
	'section'     => 'blog',
	'default'     => '1',
	'priority'    => 10,
) );

// Design

Kirki::add_panel( 'design', array(
    'priority'    => 10,
    'title'       => __( 'Design Settings', 'soliloquy' ),
    'description' => __( '', 'soliloquy' ),
) );

Kirki::add_section( 'body', array(
    'title'          => __( 'General Design Settings', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'design', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'soliloquy_content_bg_color',
	'label'       => __( 'Set the background color for the content areas.', 'soliloquy' ),
	'section'     => 'body',
	'default'     => '#ffffff',
	'priority'    => 10,
	'alpha'       => false,
	'output'    => array(
    	array(
			'element'       => "body > .container, body > .container.frontpage_featured .featured > div, .navbar-default, .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus, .dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus, .dropdown-menu>.active>a, .dropdown-menu>.active>a:hover, .dropdown-menu>.active>a:focus, header .fallback_cb > ul > li > a",
		    'property'      => 'background-color',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'soliloquy_content_box_color',
	'label'       => __( 'Content Areas. Box Shadow Color', 'soliloquy' ),
	'section'     => 'body',
	'default'     => '#333333',
	'priority'    => 10,
	'alpha'       => false,
	'output'    => array(
    	array(
			'element'       => 'body > .container, body > .container.frontpage_featured .featured > div',
		    'property'      => 'box-shadow',
    		'value_pattern' => '0px 0px 5px 0px $',
		),
	),
) );

Kirki::add_section( 'menu', array(
    'title'          => __( 'Menu Design Settings', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'design', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'soliloquy_dd_box_color',
	'label'       => __( 'Dropdown Menu Box Shadow Color', 'soliloquy' ),
	'section'     => 'menu',
	'default'     => '#555555',
	'priority'    => 10,
	'alpha'       => false,
	'output'    => array(
    	array(
			'element'       => '#menu_row .dropdown-menu, .children',
		    'property'      => 'border',
    		'value_pattern' => '1px solid $',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'soliloquy_mobile_dd_toggle_color',
	'label'       => __( 'Mobile Button Color', 'soliloquy' ),
	'section'     => 'menu',
	'default'     => '#ffffff',
	'priority'    => 10,
	'alpha'       => false,
	'output'    => array(
    	array(
			'element'       => '.navbar-default .navbar-toggle, .navbar-default .navbar-toggle',
		    'property'      => 'background-color',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'soliloquy_mobile_dd_toggle_hover_color',
	'label'       => __( 'Mobile Button Hover Color', 'soliloquy' ),
	'section'     => 'menu',
	'default'     => '#e0e0e0',
	'priority'    => 10,
	'alpha'       => false,
	'output'    => array(
    	array(
			'element'       => '.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus',
		    'property'      => 'background-color',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'soliloquy_mobile_dd_toggle_border_color',
	'label'       => __( 'Mobile Button Border Color', 'soliloquy' ),
	'section'     => 'menu',
	'default'     => '#000000',
	'priority'    => 10,
	'alpha'       => false,
	'output'    => array(
    	array(
			'element'       => '.navbar-default .navbar-toggle',
		    'property'      => 'border-color',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'soliloquy_mobile_dd_toggle_detail_color',
	'label'       => __( 'Mobile Button Detail Color', 'soliloquy' ),
	'section'     => 'menu',
	'default'     => '#000000',
	'priority'    => 10,
	'alpha'       => false,
	'output'    => array(
    	array(
			'element'       => '.navbar-default .navbar-toggle .icon-bar',
		    'property'      => 'background-color',
		),
	),
) );

Kirki::add_section( 'boders', array(
    'title'          => __( 'Borders Design Settings', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'design', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'soliloquy_universal_border_color',
	'label'       => __( 'Universal Border Color', 'soliloquy' ),
	'section'     => 'boders',
	'default'     => '#c0c0c0',
	'priority'    => 10,
	'alpha'       => false,
	'output'    => array(
	    array(
	    	'element'       => 'div.content div.featured_image_caption, .blog_pagination, .single_post_nav',
	    	'property'      => 'border-bottom',
	    	'value_pattern' => '1px solid $',
	    ),
	    array(
	    	'element'       => 'div.content .tax_tags, header #menu_row',
	    	'property'      => 'border-top',
	    	'value_pattern' => '1px solid $',
	    ),
	    array(
	    	'element'       => '.bio_wrap > div',
	    	'property'      => 'border',
	    	'value_pattern' => '1px solid $',
	    ),
	),
) );

Kirki::add_section( 'blockquote', array(
    'title'          => __( 'Blockquote Design Settings', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'design', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'soliloquy_blockquote_border_color',
	'label'       => __( 'Blockquote Left Border Color', 'soliloquy' ),
	'section'     => 'blockquote',
	'default'     => '#000000',
	'priority'    => 10,
	'alpha'       => false,
	'output'    => array(
    	array(
			'element'       => "div.content blockquote",
		    'property'      => 'border-left',
	    	'value_pattern' => '4px solid $',
		),
	),
) );

Kirki::add_section( 'buttons', array(
    'title'          => __( 'Buttons Design Settings', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'design', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'select',
	'settings'    => 'soliloquy_button_color',
	'label'       => __( 'Button Colors', 'soliloquy' ),
	'section'     => 'buttons',
	'default'     => 'btn-default',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'btn-default'	=>  __('White', 'soliloquy'),
        'btn-primary'	=>  __('Dark Blue', 'soliloquy'),
        'btn-success'	=>  __('Green', 'soliloquy'),
        'btn-info'		=>  __('Light Blue', 'soliloquy'),
        'btn-warning'	=>  __('Orange', 'soliloquy'),
        'btn-danger'	=>  __('Red', 'soliloquy')
	),
) );

// Typography

Kirki::add_panel( 'typo', array(
    'priority'    => 10,
    'title'       => __( 'Typography Settings', 'soliloquy' ),
    'description' => __( '', 'soliloquy' ),
) );

Kirki::add_section( 'body_typo', array(
    'title'          => __( 'General Body Typography Settings', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'body_style',
	'label'       => esc_attr__( 'Body Settings', 'soliloquy' ),
	'section'     => 'body_typo',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#2b2b2b',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
) );

Kirki::add_section( 'link_typo', array(
    'title'          => __( 'Link Typography Options', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'link_color',
	'label'       => __( 'Link Color', 'soliloquy' ),
	'section'     => 'link_typo',
	'default'     => '#059ac5',
	'priority'    => 10,
	'alpha'       => false,
	'output'    => array(
    	array(
    		'element'       => "a, #wp-calendar a",
    		'property'      => 'color',
    	),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'link_hover_color',
	'label'       => __( 'Link Hover Color', 'soliloquy' ),
	'section'     => 'link_typo',
	'default'     => '#008ab2',
	'priority'    => 10,
	'alpha'       => false,
	'output'    => array(
    	array(
    		'element'       => "a:hover, a:focus",
    		'property'      => 'color',
    	),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_more_style',
	'label'       => esc_attr__( 'More Tag Link Style', 'soliloquy' ),
	'section'     => 'link_typo',
	'default'     => array(
		'font-family'    => 'Fjalla One',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.3',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'uppercase',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'div.content a.more-link',
		),
	),
) );

Kirki::add_section( 'logo_typo', array(
    'title'          => __( 'Logo Typography Options', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_logo_style',
	'label'       => esc_attr__( 'Default Logo Typography', 'soliloquy' ),
	'section'     => 'logo_typo',
	'default'     => array(
		'font-family'    => 'Fjalla One',
		'variant'        => 'regular',
		'font-size'      => '36px',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'uppercase',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '.text_logo, .text_logo a',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_mobile_logo_style',
	'label'       => esc_attr__( 'Mobile Logo Typography', 'soliloquy' ),
	'section'     => 'logo_typo',
	'default'     => array(
		'font-family'    => 'Fjalla One',
		'variant'        => 'regular',
		'font-size'      => '18px',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'uppercase',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '.navbar-default .navbar-brand, .navbar-default a, .navbar-brand a, .navbar-default:hover .navbar-brand:hover, .navbar-default a:hover, .navbar-brand a:hover',
		),
	),
) );

Kirki::add_section( 'menu_typo', array(
    'title'          => __( 'Navigation Typography Options', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_menu_style',
	'label'       => esc_attr__( 'Navigation Font', 'soliloquy' ),
	'section'     => 'menu_typo',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
		'variant'        => 'regular',
		'font-size'      => '21px',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'uppercase',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '.navbar-default .navbar-nav > li > a, .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus, .nav>li>a:hover, .nav>li>a:focus, .fallback_cb > ul > li > a, .fallback_cb > ul > li > a:hover',
		),
		array(
			'element'		=> '.nav .caret, .navbar-default .navbar-nav>.dropdown>a .caret,.navbar-default .navbar-nav>.dropdown>a .caret, .navbar-default .navbar-nav>.dropdown.active>a .caret, .navbar-default .navbar-nav>.open>a .caret, .navbar-default .navbar-nav>.open>a:hover .caret, .navbar-default .navbar-nav>.open>a:focus .caret, .nav a:hover .caret',
    		'property'      => 'border-top-color',
		),
		array(
			'element'		=> '.nav .caret, .navbar-default .navbar-nav>.dropdown>a .caret,.navbar-default .navbar-nav>.dropdown>a .caret, .navbar-default .navbar-nav>.dropdown.active>a .caret, .navbar-default .navbar-nav>.open>a .caret, .navbar-default .navbar-nav>.open>a:hover .caret, .navbar-default .navbar-nav>.open>a:focus .caret, .nav a:hover .caret',
    		'property'      => 'border-bottom-color',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_sub_menu_style',
	'label'       => esc_attr__( 'Sub Navigation Font', 'soliloquy' ),
	'section'     => 'menu_typo',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#2b2b2b',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '.navbar-default .navbar-nav > li li a',
		),
		array(
			'element'		=> '.dropdown-menu>.active>a, .dropdown-menu>.active>a:hover, .dropdown-menu>.active>a:focus, .children li a, .children li a:hover, .children li a:focus',
    		'property'      => 'color',
		),
	),
) );

Kirki::add_section( 'title_typo', array(
    'title'          => __( 'Title Typography Options', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'h1_style',
	'label'       => esc_attr__( 'H1 Settings', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => array(
		'font-family'    => 'Fjalla One',
		'variant'        => '700',
		'font-size'      => '42px',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'uppercase',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h1, h1 a',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'h1_hover_color',
	'label'       => __( 'H1 Hover Color', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => '#535353',
	'priority'    => 10,
	'alpha'       => true,
	'output'      => array(
		array(
			'element' => 'h1 a:hover',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'h2_style',
	'label'       => esc_attr__( 'H2 Settings', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
		'variant'        => '500',
		'font-size'      => '50px',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h2, h2 a',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'h2_hover_color',
	'label'       => __( 'H2 Hover Color', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => '#535353',
	'priority'    => 10,
	'alpha'       => true,
	'output'      => array(
		array(
			'element' => 'h2 a:hover',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'h3_style',
	'label'       => esc_attr__( 'H3 Settings', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
		'variant'        => 'regular',
		'font-size'      => '28px',
		'line-height'    => '1.3',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h3, h3 a',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'h3_hover_color',
	'label'       => __( 'H3 Hover Color', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => '#535353',
	'priority'    => 10,
	'alpha'       => true,
	'output'      => array(
		array(
			'element' => 'h3 a:hover',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'h4_style',
	'label'       => esc_attr__( 'H4 Settings', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => array(
		'font-family'    => 'Fjalla One',
		'variant'        => 'regular',
		'font-size'      => '21px',
		'line-height'    => '1.3',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'uppercase',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h4, h4 a',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'h4_hover_color',
	'label'       => __( 'H4 Hover Color', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => '#535353',
	'priority'    => 10,
	'alpha'       => true,
	'output'      => array(
		array(
			'element' => 'h4 a:hover',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'h5_style',
	'label'       => esc_attr__( 'H5 Settings', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => array(
		'font-family'    => 'Fjalla One',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.3',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h5, h5 a',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'h5_hover_color',
	'label'       => __( 'H5 Hover Color', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => '#535353',
	'priority'    => 10,
	'alpha'       => true,
	'output'      => array(
		array(
			'element' => 'h5 a:hover',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'h6_style',
	'label'       => esc_attr__( 'H6 Settings', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => array(
		'font-family'    => 'Fjalla One',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.3',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h6, h6 a',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'color',
	'settings'    => 'h6_hover_color',
	'label'       => __( 'H6 Hover Color', 'soliloquy' ),
	'section'     => 'title_typo',
	'default'     => '#535353',
	'priority'    => 10,
	'alpha'       => true,
	'output'      => array(
		array(
			'element' => 'h6 a:hover',
			'property' => 'color',
		),
	),
) );

Kirki::add_section( 'blog_typo', array(
    'title'          => __( 'Blog Elements Typography', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_article_date',
	'label'       => esc_attr__( 'Article Date Style', 'soliloquy' ),
	'section'     => 'blog_typo',
	'default'     => array(
		'font-family'    => 'PT Sans',
		'variant'        => '600 italic',
		'font-size'      => '14px',
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#b3b3b3',
		'text-transform' => 'uppercase',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'div.content div.date',
		),
	),
) );
    
Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_article_author',
	'label'       => esc_attr__( 'Article Author Style', 'soliloquy' ),
	'section'     => 'blog_typo',
	'default'     => array(
		'font-family'    => 'Georgia',
		'variant'        => '400 italic',
		'font-size'      => '14px',
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#8d8d8d',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'div.content div.author, div.content div.author a',
		),
	),
) );
    
Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_article_excerpt',
	'label'       => esc_attr__( 'Article Excerpt Style', 'soliloquy' ),
	'section'     => 'blog_typo',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
		'variant'        => '400',
		'font-size'      => '24px',
		'line-height'    => '1.3',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'div.content div.excerpt',
		),
	),
) );   

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_article_featured_img_caption',
	'label'       => esc_attr__( 'Features Image Caption Style', 'soliloquy' ),
	'section'     => 'blog_typo',
	'default'     => array(
		'font-family'    => 'Georgia',
		'variant'        => '400 italic',
		'font-size'      => '14px',
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#8d8d8d',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'div.content div.featured_image_caption span',
		),
	),
) ); 

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_post_nav_style',
	'label'       => esc_attr__( 'Page-Post Navigation Style', 'soliloquy' ),
	'section'     => 'blog_typo',
	'default'     => array(
		'font-family'    => 'Fjalla One',
		'variant'        => '400',
		'font-size'      => '21px',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#000000',
		'text-transform' => 'uppercase',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '.blog_pagination a, .single_post_nav a',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_tax_style',
	'label'       => esc_attr__( 'Blog and Category Meta Style', 'soliloquy' ),
	'section'     => 'blog_typo',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '400',
		'font-size'      => '12px',
		'line-height'    => '1.4',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#8d8d8d',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'div.content .tax_tags',
		),
	),
) );

Kirki::add_section( 'blockquote_typo', array(
    'title'          => __( 'Blockquote Elements Typography', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'blockquote_style',
	'label'       => esc_attr__( 'Blockquote Settings', 'soliloquy' ),
	'section'     => 'blockquote_typo',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '400',
		'font-size'      => '18px',
		'line-height'    => '1.8',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#121212',
		'text-transform' => 'uppercase',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => ' blockquote, div.quote p, div.quote a, blockquote p',
		),
	),
) );

Kirki::add_section( 'code_typo', array(
    'title'          => __( 'Code Elements Typography', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'code_style',
	'label'       => esc_attr__( 'Code/Pre Settings', 'soliloquy' ),
	'section'     => 'code_typo',
	'default'     => array(
		'font-family'    => 'Courier New',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#121212',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'code, pre, var',
		),
	),
) );

Kirki::add_section( 'table_typo', array(
    'title'          => __( 'Table Elements Typography', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'th_style',
	'label'       => esc_attr__( 'TH Settings', 'soliloquy' ),
	'section'     => 'table_typo',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '600',
		'font-size'      => '18px',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#121212',
		'text-transform' => 'uppercase',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'th, ul.css-tabs a, div.accordion h2, h2.hide_show_title span',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'td_style',
	'label'       => esc_attr__( 'TD Settings', 'soliloquy' ),
	'section'     => 'table_typo',
	'default'     => array(
		'font-family'    => 'Arial',
		'variant'        => '400',
		'font-size'      => '13px',
		'line-height'    => '1.4',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#121212',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'td, td a, td a:hover',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'tc_style',
	'label'       => esc_attr__( 'Table Caption Settings', 'soliloquy' ),
	'section'     => 'table_typo',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '600 italic',
		'font-size'      => '13px',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#121212',
		'text-transform' => 'uppercase',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'caption',
		),
	),
) );

Kirki::add_section( 'side_typo', array(
    'title'          => __( 'Widget Typography', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );    

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_header_widget_style',
	'label'       => esc_attr__( 'Header Widget Font', 'soliloquy' ),
	'section'     => 'side_typo',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '400 italic',
		'font-size'      => '11px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#8d8d8d',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'header .header_widget_right, header .header_widget_left',
		),
	),
) );

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_widget_style',
	'label'       => esc_attr__( 'Widget Font', 'soliloquy' ),
	'section'     => 'side_typo',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '400',
		'font-size'      => '11px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#8d8d8d',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '.sidebar_editable p, .sidebar_editable li, .sidebar_editable a',
		),
	),
) );

Kirki::add_section( 'foot_typo', array(
    'title'          => __( 'Footer Typography', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) ); 

Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'soliloquy_copyright_style',
	'label'       => esc_attr__( 'Copyright Text', 'soliloquy' ),
	'section'     => 'foot_typo',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '400',
		'font-size'      => '11px',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#666666',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '#credit, #credit a, #copyright, #copyright a',
		),
	),
) );

Kirki::add_section( 'odds_typo', array(
    'title'          => __( 'Odds and Ends Typography', 'soliloquy' ),
    'description'    => '',
    'panel'          => 'typo', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) ); 
    
Kirki::add_field( 'soliloquy-config', array(
	'type'        => 'typography',
	'settings'    => 'default_button_style',
	'label'       => esc_attr__( 'Default Button Font', 'soliloquy' ),
	'section'     => 'odds_typo',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'subsets'        => array( 'latin-ext' ),
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'a.soliloquy_button',
		),
	),
) );

// #################################################
// Some Custom Sanitize Functions
// #################################################

function soliloquy_sanitize_url( $value ) {
    $value=esc_url( $value );
    return $value;
}

function soliloquy_sanitize_email( $value ) {
    $value=sanitize_email( $value );
    return $value;
}

// #################################################
// Get a Random Page ID
// #################################################

function soliloquy_random_page(){
    $get_pages = get_pages();
    if(!empty($get_pages)) {
        shuffle($get_pages);
        $page = $get_pages[0]->ID;
    } else {
        $page = "";
    }
    return $page;
}