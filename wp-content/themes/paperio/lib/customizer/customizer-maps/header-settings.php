<?php
	
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

 	/* Disable Header */

    $wp_customize->add_setting( 'tz_disable_header', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_header', array(
		'label'       		=> esc_attr__( 'Disable Header', 'paperio' ),
		'section'     		=> 'tz_add_header_section',
		'settings'			=> 'tz_disable_header',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Disable Header */

	/* Disable Sticky Header */

    $wp_customize->add_setting( 'tz_non_sticky_header', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_non_sticky_header', array(
		'label'       		=> esc_attr__( 'Non Sticky Header', 'paperio' ),
		'section'     		=> 'tz_add_header_section',
		'settings'			=> 'tz_non_sticky_header',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_disable_header_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Disable Sticky Header */	

	/* Select Header Type */

    $wp_customize->add_setting( 'tz_header_type', array(
		'default' 			=> 'header-style1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_header_type', array(
		'label'       		=> esc_attr__( 'Header Style', 'paperio' ),
		'section'     		=> 'tz_add_header_section',
		'settings'			=> 'tz_header_type',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_disable_header_callback',
		'choices'           => array(
								    'header-style1'	=> esc_html__( 'Header Style1', 'paperio' ),
								    'header-style2' => esc_html__( 'Header Style2', 'paperio' ),
								    'header-style3' => esc_html__( 'Header Style3', 'paperio' ),
								    'header-style4' => esc_html__( 'Header Style4', 'paperio' ),
								    'header-style5' => esc_html__( 'Header Style5', 'paperio' ),
							       ),
	) ) );

	/* End Theme Type */

	/* Header Container Setting */

	$wp_customize->add_setting( 'tz_header_container_fluid', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_header_container_fluid', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_header_section',
		'settings'			=> 'tz_header_container_fluid',
		'type'              => 'select',
		'active_callback' 	=> 'paperio_disable_header_callback',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),		
	) ) );

	/* End Header Container Setting */
	
	/* Navigation Position */

    $wp_customize->add_setting( 'tz_navigation_position_header', array(
		'default' 			=> 'below-logo',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_navigation_position_header', array(
		'label'       		=> esc_attr__( 'Navigation Position', 'paperio' ),
		'section'     		=> 'tz_add_header_section',
		'settings'			=> 'tz_navigation_position_header',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_disable_header_callback',
		'choices'           =>  array(
				                        'above-logo' => esc_html__( 'Above Logo', 'paperio' ),
				                        'below-logo' => esc_html__( 'Below Logo', 'paperio' ),
			                        )
	) ) );

	/* End Navigation Position */

	/* Separator setting */

	$wp_customize->add_setting( 'tz_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_header_separator', array(
	    'label'      		=> esc_attr__( 'Color Settings', 'paperio' ),
	    'section'    		=> 'tz_add_header_section',
	    'settings'   		=> 'tz_header_separator',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Separator setting */

	/* Header Background Color Setting */

	$wp_customize->add_setting( 'tz_header_back_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_header_back_color', array(
	    'label'      		=> esc_attr__( 'Header Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_header_section',
	    'settings'	 		=> 'tz_header_back_color',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Header Background Color Setting */

	/* Header Background Color Setting */

	$wp_customize->add_setting( 'tz_header_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_header_border_color', array(
	    'label'      		=> esc_attr__( 'Header Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_header_section',
	    'settings'	 		=> 'tz_header_border_color',
	    'active_callback' 	=> 'paperio_header_border_color_callback',
	) ) );

	/* End Header Background Color Setting */

	/* Mobile Sub Menu Background Color */

	$wp_customize->add_setting( 'tz_header_mobile_submenu_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_header_mobile_submenu_background_color', array(
	    'label'      		=> esc_attr__( 'Mobile Sub Menu Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_header_section',
	    'settings'	 		=> 'tz_header_mobile_submenu_background_color',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Mobile Sub Menu Background Color */

	/* Mobile Menu Toggle Color */

	$wp_customize->add_setting( 'tz_header_toggle_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_header_toggle_color', array(
	    'label'      		=> esc_attr__( 'Mobile Menu Toggle Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_header_section',
	    'settings'	 		=> 'tz_header_toggle_color',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Mobile Menu Toggle Color */

	/* Mobile Menu Toggle Background Color */

	$wp_customize->add_setting( 'tz_header_toggle_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_header_toggle_background_color', array(
	    'label'      		=> esc_attr__( 'Mobile Menu Toggle Color', 'paperio' ),
	    'section'    		=> 'tz_add_header_section',
	    'settings'	 		=> 'tz_header_toggle_background_color',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* Mobile Menu Toggle Background Color */

	/* Logo */

    $wp_customize->add_setting( 'tz_site_logo', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tz_site_logo', array(
		'label'       		=> esc_attr__( 'Logo', 'paperio' ),
		'description'       => esc_attr__( 'Upload the logo that will be displayed in the header.', 'paperio' ),
		'section'     		=> 'tz_add_logo_section',
		'settings'			=> 'tz_site_logo',
		'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Logo */

	/* Logo (Light)*/

    $wp_customize->add_setting( 'tz_site_logo_light', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tz_site_logo_light', array(
		'label'       		=> esc_attr__( 'Logo (Light)', 'paperio' ),
		'description'       => esc_attr__( 'Upload the logo light image which will be displayed in the website header in scrolled version header.', 'paperio' ),
		'section'     		=> 'tz_add_logo_section',
		'settings'			=> 'tz_site_logo_light',
		'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Logo (Light)*/

    /* Logo Retina */

    $wp_customize->add_setting( 'tz_site_logo_ratina', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tz_site_logo_ratina', array(
		'label'       		=> esc_attr__( 'Logo Retina', 'paperio' ),
		'description'       => esc_attr__( 'Optional retina version displayed in devices with retina display (high resolution display).', 'paperio' ),
		'section'     		=> 'tz_add_logo_section',
		'settings'			=> 'tz_site_logo_ratina',
		'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Logo Ratina */

	/* Logo Retina (Light)*/

    $wp_customize->add_setting( 'tz_site_logo_ratina_light', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tz_site_logo_ratina_light', array(
		'label'       		=> esc_attr__( 'Logo Retina (Light)', 'paperio' ),
		'description'       => esc_attr__( 'Optional retina version displayed in devices with retina display (high resolution display).', 'paperio' ),
		'section'     		=> 'tz_add_logo_section',
		'settings'			=> 'tz_site_logo_ratina_light',
		'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Logo Ratina (Light)*/

	/* Social Icons */

    $wp_customize->add_setting( 'tz_social_icon', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_social_icon', array(
		'label'       		=> esc_attr__( 'Disable Social icons', 'paperio' ),
		'description'       => esc_attr__( 'If No, Social icons will be displayed in header.', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_icon',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_disable_header_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Social Icon */

	/* Social Icon Target */
  	
    $wp_customize->add_setting( 'tz_social_icon_target', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_social_icon_target', array(
		'label'       		=> esc_attr__( 'Open links in new window?', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_icon_target',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Social Icon Target */

	/* Facebook */

	$wp_customize->add_setting( 'tz_social_facebook', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_facebook', array(
	    'label'      		=> esc_attr__( 'Facebook', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_facebook',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Facebook */

	/* Facebook Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[facebook]', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[facebook]', array(
		'label'       		=> esc_attr__( 'Facebook order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[facebook]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Facebook Social Icon Order */

	/* Twitter */

	$wp_customize->add_setting( 'tz_social_twitter', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_twitter', array(
	    'label'      		=> esc_attr__( 'Twitter', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_twitter',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Twitter */

	/* Twitter Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[twitter]', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[twitter]', array(
		'label'       		=> esc_attr__( 'Twitter order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[twitter]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Twitter Social Icon Order */

	/* Google Plus */

	$wp_customize->add_setting( 'tz_social_gplus', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_gplus', array(
	    'label'      		=> esc_attr__( 'Google Plus', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_gplus',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Google Plus */

	/* Google Plus Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[gplus]', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[gplus]', array(
		'label'       		=> esc_attr__( 'Google Plus order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[gplus]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Google Plus Social Icon Order */

	/* Linkedin */

	$wp_customize->add_setting( 'tz_social_linkedin', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_linkedin', array(
	    'label'      		=> esc_attr__( 'Linkedin', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_linkedin',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Linkedin */

	/* Linkedin Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[linkedin]', array(
		'default' 			=> '4',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[linkedin]', array(
		'label'       		=> esc_attr__( 'Linkedin order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[linkedin]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Linkedin Social Icon Order */

	/* Instagram */

	$wp_customize->add_setting( 'tz_social_instagram', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_instagram', array(
	    'label'      		=> esc_attr__( 'Instagram', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_instagram',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Instagram */

	/* Instagram Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[instagram]', array(
		'default' 			=> '5',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[instagram]', array(
		'label'       		=> esc_attr__( 'Instagram order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[instagram]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Instagram Social Icon Order */

	/* Pinterest */

	$wp_customize->add_setting( 'tz_social_pinterest', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_pinterest', array(
	    'label'      		=> esc_attr__( 'Pinterest', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_pinterest',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Pinterest */

	/* Pinterest Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[pinterest]', array(
		'default' 			=> '6',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[pinterest]', array(
		'label'       		=> esc_attr__( 'Pinterest order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[pinterest]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Pinterest Social Icon Order */

	/* RSS Link */

	$wp_customize->add_setting( 'tz_social_rss', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_rss', array(
	    'label'      		=> esc_attr__( 'RSS', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_rss',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End RSS Link */

	/* RSS Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[rss]', array(
		'default' 			=> '7',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[rss]', array(
		'label'       		=> esc_attr__( 'RSS order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[rss]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End RSS Social Icon Order */

	/* Youtube */

	$wp_customize->add_setting( 'tz_social_youtube', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_youtube', array(
	    'label'      		=> esc_attr__( 'Youtube', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_youtube',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End  Youtube */

	/* Youtube Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[youtube]', array(
		'default' 			=> '8',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[youtube]', array(
		'label'       		=> esc_attr__( 'Youtube order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[youtube]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Youtube Social Icon Order */

	/* Bloglovin */

	$wp_customize->add_setting( 'tz_social_bloglovin', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_bloglovin', array(
	    'label'      		=> esc_attr__( 'Bloglovin', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_bloglovin',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Bloglovin */

	/* Bloglovin Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[bloglovin]', array(
		'default' 			=> '9',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[bloglovin]', array(
		'label'       		=> esc_attr__( 'Bloglovin order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[bloglovin]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Bloglovin Social Icon Order */

    /* Tumblr */

	$wp_customize->add_setting( 'tz_social_tumblr', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_tumblr', array(
	    'label'      		=> esc_attr__( 'Tumblr', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_tumblr',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Tumblr */

	/* Tumblr Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[tumblr]', array(
		'default' 			=> '10',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[tumblr]', array(
		'label'       		=> esc_attr__( 'Tumblr order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[tumblr]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Tumblr Social Icon Order */

	/* Dribbble */

	$wp_customize->add_setting( 'tz_social_dribbble', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_dribbble', array(
	    'label'      		=> esc_attr__( 'Dribbble', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_dribbble',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Dribbble */

	/* Dribbble Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[dribbble]', array(
		'default' 			=> '11',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[dribbble]', array(
		'label'       		=> esc_attr__( 'Dribbble order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[dribbble]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Dribbble Social Icon Order */

	/* Soundcloud */

	$wp_customize->add_setting( 'tz_social_soundcloud', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_soundcloud', array(
	    'label'      		=> esc_attr__( 'Soundcloud', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_soundcloud',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Soundcloud */

	/* Soundcloud Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[soundcloud]', array(
		'default' 			=> '12',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[soundcloud]', array(
		'label'       		=> esc_attr__( 'Soundcloud order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[soundcloud]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Soundcloud Social Icon Order */

	/* Vimeo */

	$wp_customize->add_setting( 'tz_social_vimeo', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_vimeo', array(
	    'label'      		=> esc_attr__( 'Vimeo', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_vimeo',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Vimeo */

	/* Vimeo Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[vimeo]', array(
		'default' 			=> '13',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[vimeo]', array(
		'label'       		=> esc_attr__( 'Vimeo order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[vimeo]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Vimeo Social Icon Order */

	/* Flickr */

	$wp_customize->add_setting( 'tz_social_flickr', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_social_flickr', array(
	    'label'      		=> esc_attr__( 'Flickr', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_flickr',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Flickr */

	/* Flickr Social Icon Order */
	
    $wp_customize->add_setting( 'tz_social_order[flickr]', array(
		'default' 			=> '14',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_social_order[flickr]', array(
		'label'       		=> esc_attr__( 'Flickr order', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_social_order[flickr]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Flickr Social Icon Order */

	/* Custom Link */

	$wp_customize->add_setting( 'tz_social_custom_link', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'paperio_sanitize_textarea'
	) );

	$wp_customize->add_control( 'tz_social_custom_link', array(
	    'label'      		=> esc_attr__( 'Custom Link', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_custom_link',
	    'type'       		=> 'textarea',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	    'description'       => esc_attr__( 'Add HTML content below to add other social media icons and links.', 'paperio' ),
	) );

	/* End Custom Link */

	/* Social icon color setting */

	$wp_customize->add_setting( 'tz_social_icon_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_social_icon_separator', array(
	    'label'      		=> esc_attr__( 'Font & Color Settings', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'   		=> 'tz_social_icon_separator',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Social icon color setting */

	/* Social icon font size setting */

	$wp_customize->add_setting( 'tz_social_icon_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_social_icon_font_size', array(
	    'label'      		=> esc_attr__( 'Social Icons Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'	 		=> 'tz_social_icon_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Social icons font size setting */

	/* Social icon line height setting */

	$wp_customize->add_setting( 'tz_social_icon_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_social_icon_line_height', array(
	    'label'      		=> esc_attr__( 'Social Icons Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'	 		=> 'tz_social_icon_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Social icons line height setting */

	/* Social icon character spacing setting */

	$wp_customize->add_setting( 'tz_social_icon_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_social_icon_character_spacing', array(
	    'label'      		=> esc_attr__( 'Social Icons Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'	 		=> 'tz_social_icon_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 12px.', 'paperio' ),
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) );

	/* End Social icons character spacing setting */

	/* Social icons color setting */

	$wp_customize->add_setting( 'tz_social_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_social_icon_color', array(
	    'label'      		=> esc_attr__( 'Social Icons Color', 'paperio' ),
	    'section'    		=> 'tz_add_social_icon_section',
	    'settings'	 		=> 'tz_social_icon_color',
	    'active_callback' 	=> 'paperio_social_icon_callback',
	) ) );

	/* End Social icons color setting */

	/* Header Left Sidebar Enable*/

	$wp_customize->add_setting( 'tz_disable_header_left_sidebar', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_header_left_sidebar', array(
		'label'       		=> esc_attr__( 'Enable Header Left Sidebar', 'paperio' ),
		'description'       => esc_attr__( 'If you want header Left sidebar enable this setting.', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_disable_header_left_sidebar',
		'type'              => 'radio',
		'active_callback'   => 'paperio_header_left_sidebar_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
    ) ) );

    /* End Header Left Sidebar Enable*/

	/* Header Left Sidebar */

    $wp_customize->add_setting( 'tz_header_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_header_left_sidebar', array(
		'label'       		=> esc_attr__( 'Header Left Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_social_icon_section',
		'settings'			=> 'tz_header_left_sidebar',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_header_left_sidebar_enable_callback',
	) ) );

    /* End Header Left Sidebar */

  	/* Search */

    $wp_customize->add_setting( 'tz_disable_search_header', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_search_header', array(
		'label'       		=> esc_attr__( 'Disable Search', 'paperio' ),
		'description'       => esc_attr__( 'If No, search module will be displayed in header section.', 'paperio' ),
		'section'     		=> 'tz_add_search_section',
		'settings'			=> 'tz_disable_search_header',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_disable_header_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
    ) ) );

    /* End Search */

    /* Search Placeholder */

	$wp_customize->add_setting( 'tz_header_seach_placeholder', array(
		'default' 			=> 'Search Here....',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_header_seach_placeholder', array(
	    'label'      		=> esc_attr__( 'Search Placeholder Text', 'paperio' ),
	    'section'    		=> 'tz_add_search_section',
	    'settings'	 		=> 'tz_header_seach_placeholder',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_enable_search_callback',
	) );

	/* End Search Placeholder */

	/* Search color setting */

	$wp_customize->add_setting( 'tz_search_icon_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_search_icon_separator', array(
	    'label'      		=> esc_attr__( 'Color Setting', 'paperio' ),
	    'section'    		=> 'tz_add_search_section',
	    'settings'   		=> 'tz_search_icon_separator',
	    'active_callback' 	=> 'paperio_enable_search_callback',
	) ) );

	/* End Search color setting */

	/* Search icon color setting */

	$wp_customize->add_setting( 'tz_search_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_search_icon_color', array(
	    'label'      		=> esc_attr__( 'Search Icon Color', 'paperio' ),
	    'section'    		=> 'tz_add_search_section',
	    'settings'	 		=> 'tz_search_icon_color',
	    'active_callback' 	=> 'paperio_enable_search_callback',
	) ) );

	/* End Search icon color setting */

	/*Header Right Sidebar Enable*/

	$wp_customize->add_setting( 'tz_disable_header_right_sidebar', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_header_right_sidebar', array(
		'label'       		=> esc_attr__( 'Enable Header Right Sidebar', 'paperio' ),
		'description'       => esc_attr__( 'If you want header right sidebar enable this setting.', 'paperio' ),
		'section'     		=> 'tz_add_search_section',
		'settings'			=> 'tz_disable_header_right_sidebar',
		'type'              => 'radio',
		'active_callback'   => 'paperio_header_right_sidebar_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
    ) ) );

    /*End Header Right Sidebar Enable*/

    /* Header Right Sidebar */

    $wp_customize->add_setting( 'tz_header_right_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_header_right_sidebar', array(
		'label'       		=> esc_attr__( 'Header Right Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_search_section',
		'settings'			=> 'tz_header_right_sidebar',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_header_right_sidebar_enable_callback',
	) ) );

    /* End Header Right Sidebar */
    

	/* Header navigation Container Setting */

	$wp_customize->add_setting( 'tz_header_navigation_container_fluid', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_header_navigation_container_fluid', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_navigation_section',
		'settings'			=> 'tz_header_navigation_container_fluid',
		'type'              => 'select',
		'active_callback' 	=> 'paperio_disable_header_callback',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),		
	) ) );

	/* End Header navigation Container Setting */

	/* Navigation Text Transform */

	$wp_customize->add_setting( 'tz_add_navigation_text_transform', array(
		'default' 			=> 'uppercase',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_add_navigation_text_transform', array(
		'label'       		=> esc_attr__( 'Navbar Text Transform', 'paperio' ),
		'section'     		=> 'tz_add_navigation_section',
		'settings'			=> 'tz_add_navigation_text_transform',
		'type'              => 'select',
		'active_callback' 	=> 'paperio_disable_header_callback',
		'description'       => esc_attr__( 'Insert the text transform you want. e.g. "Uppercase".', 'paperio' ),
		'choices'           => array(
			                            'capitalize'=> esc_html__( 'Capitalize', 'paperio' ),
				                        'uppercase' => esc_html__( 'Uppercase', 'paperio' ),
				                        'lowercase' => esc_html__( 'Lowercase', 'paperio' ),
			                        )
	) ) );

    /* End Navigation Text Transform */

    /* Navigation Background Color */

	$wp_customize->add_setting( 'tz_add_navigation_bg_color_header', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_add_navigation_bg_color_header', array(
		'label'       		=> esc_attr__( 'Navigation Background Color', 'paperio' ),
		'section'     		=> 'tz_add_navigation_section',
		'settings'			=> 'tz_add_navigation_bg_color_header',
		'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Navigation Background Color */

	/* Navigation Font Size setting */

	$wp_customize->add_setting( 'tz_navigation_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_navigation_font_size', array(
	    'label'      		=> esc_attr__( 'Navigation Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_font_size',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Navigation Font Size setting */

	/* Navigation Line Height setting */

	$wp_customize->add_setting( 'tz_navigation_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_navigation_line_height', array(
	    'label'      		=> esc_attr__( 'Navigation Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_line_height',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	    'description'       => esc_attr__( 'Add line height like 20px.', 'paperio' ),
	) );

	/* End Navigation Line Height setting */

	/* Navigation Character Spacing setting */

	$wp_customize->add_setting( 'tz_navigation_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_navigation_character_spacing', array(
	    'label'      		=> esc_attr__( 'Navigation Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_character_spacing',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Navigation Character Spacing setting */

	/* Navigation Text Color Setting */

	$wp_customize->add_setting( 'tz_navigation_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_navigation_text_color', array(
	    'label'      		=> esc_attr__( 'Navigation Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_text_color',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Navigation Text Color Setting */

	/* Navigation Text Hover Color Setting */

	$wp_customize->add_setting( 'tz_navigation_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_navigation_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Navigation Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_text_hover_color',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Navigation Text Hover Color Setting */

	/* Navigation Submenu Background Color Setting */

	$wp_customize->add_setting( 'tz_navigation_submenu_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_navigation_submenu_background_color', array(
	    'label'      		=> esc_attr__( 'Navigation Submenu Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_submenu_background_color',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Navigation Submenu Background Color Setting */

	/* Navigation Submenu Background Color  Opacity Setting */

	$wp_customize->add_setting( 'tz_navigation_submenu_background_color_opacity', array(
		'default'    		=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_navigation_submenu_background_color_opacity', array(
	    'label'      		=> esc_attr__( 'Submenu Background Opacity', 'paperio' ),
		'section'    		=> 'tz_add_navigation_section',
		'settings'   		=> 'tz_navigation_submenu_background_color_opacity',
		'type'       		=> 'select',
		'active_callback' 	=> 'paperio_disable_header_callback',
		'choices'    		=> array(
								'' => esc_html__( 'No Opacity', 'paperio' ),
							    '0.1' => '0.1',
							    '0.2' => '0.2',
							    '0.3' => '0.3',
							    '0.4' => '0.4',
							    '0.5' => '0.5',
							    '0.6' => '0.6',
							    '0.7' => '0.7',
							    '0.8' => '0.8',
							    '0.9' => '0.9',
							    '1.0' => '1.0',
				   			 ),
	)) );

	/* End Navigation Submenu Background Color  Opacity Setting */

	/* Navigation Submenu Font Size setting */

	$wp_customize->add_setting( 'tz_navigation_submenu_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_navigation_submenu_font_size', array(
	    'label'      		=> esc_attr__( 'Submenu Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_submenu_font_size',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Navigation Submenu Font Size setting */

	/* Navigation Submenu Line Height setting */

	$wp_customize->add_setting( 'tz_navigation_submenu_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_navigation_submenu_line_height', array(
	    'label'      		=> esc_attr__( 'Submenu Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_submenu_line_height',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	    'description'       => esc_attr__( 'Add line height like 20px.', 'paperio' ),
	) );

	/* End Navigation Submenu Line Height setting */

	/* Navigation Submenu Character Spacing setting */

	$wp_customize->add_setting( 'tz_navigation_submenu_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_navigation_submenu_character_spacing', array(
	    'label'      		=> esc_attr__( 'Submenu Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_submenu_character_spacing',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Navigation Submenu Character Spacing setting */

	/* Megamenu Title Font Size setting */

	$wp_customize->add_setting( 'tz_navigation_megamenu_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_navigation_megamenu_title_font_size', array(
	    'label'      		=> esc_attr__( 'Megamenu Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_megamenu_title_font_size',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Megamenu Title Size setting */

	/* Megamenu Title Line height setting */

	$wp_customize->add_setting( 'tz_navigation_megamenu_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_navigation_megamenu_title_line_height', array(
	    'label'      		=> esc_attr__( 'Megamenu Title Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_megamenu_title_line_height',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Megamenu Title Line height setting */

	/* Megamenu Title Character Spacing setting */

	$wp_customize->add_setting( 'tz_navigation_megamenu_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_navigation_megamenu_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Megamenu Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_megamenu_title_character_spacing',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	    'description'       => esc_attr__( 'Add letter spacing like 12px.', 'paperio' ),
	) );

	/* End Megamenu Title Character Spacing setting */

	/* Megamenu Title Bottom Border Color Setting */

	$wp_customize->add_setting( 'tz_navigation_megamenu_title_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_navigation_megamenu_title_border_color', array(
	    'label'      		=> esc_attr__( 'Megamenu Title Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_megamenu_title_border_color',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Megamenu Title Bottom Border Color Setting */

	/* Navigation Submenu Text Color Setting */

	$wp_customize->add_setting( 'tz_navigation_submenu_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_navigation_submenu_text_color', array(
	    'label'      		=> esc_attr__( 'Navigation Submenu Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_submenu_text_color',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Navigation Submenu Text Color Setting */

	/* Navigation Submenu Text Hover Color Setting */

	$wp_customize->add_setting( 'tz_navigation_submenu_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_navigation_submenu_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Navigation Submenu Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_navigation_section',
	    'settings'	 		=> 'tz_navigation_submenu_text_hover_color',
	    'active_callback' 	=> 'paperio_disable_header_callback',
	) ) );

	/* End Navigation Submenu Text Hover Color Setting */


    /* Callback Functions */

    if ( ! function_exists( 'paperio_disable_header_callback' ) ) :
		function paperio_disable_header_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_disable_header' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

    if ( ! function_exists( 'paperio_social_icon_callback' ) ) :
		function paperio_social_icon_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_social_icon' )->value() != 1 && $control->manager->get_setting( 'tz_disable_header' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_enable_search_callback	' ) ) :
		function paperio_enable_search_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_disable_search_header' )->value() != 1 && $control->manager->get_setting( 'tz_disable_header' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	if ( ! function_exists( 'paperio_header_border_color_callback	' ) ) :
		function paperio_header_border_color_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_header_type' )->value() == 'header-style1' && $control->manager->get_setting( 'tz_disable_header' )->value() != 1) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	if ( ! function_exists( 'paperio_header_left_sidebar_callback' ) ) :
		function paperio_header_left_sidebar_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_social_icon' )->value() == 1 && $control->manager->get_setting( 'tz_disable_header' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	if ( ! function_exists( 'paperio_header_right_sidebar_callback' ) ) :
		function paperio_header_right_sidebar_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_disable_search_header' )->value() == 1 && $control->manager->get_setting( 'tz_disable_header' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	if ( ! function_exists( 'paperio_header_right_sidebar_enable_callback' ) ) :
		function paperio_header_right_sidebar_enable_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_disable_header_right_sidebar' )->value() == 1 && $control->manager->get_setting( 'tz_disable_search_header' )->value() == 1 && $control->manager->get_setting( 'tz_disable_header' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	if ( ! function_exists( 'paperio_header_left_sidebar_enable_callback' ) ) :
		function paperio_header_left_sidebar_enable_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_disable_header_left_sidebar' )->value() == 1 && $control->manager->get_setting( 'tz_social_icon' )->value() == 1 && $control->manager->get_setting( 'tz_disable_header' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	/* End Callback Functions */