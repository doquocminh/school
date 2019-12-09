<?php

	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$sidebar_array = paperio_register_sidebar_customizer_array();

	/* Start Disable Footer */

    $wp_customize->add_setting( 'tz_disable_footer', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_footer', array(
		'label'       		=> esc_attr__( 'Disable Footer', 'paperio' ),
		'section'     		=> 'tz_add_footer_style',
		'settings'			=> 'tz_disable_footer',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Disable Footer */

	/* Blog Layout */

    $wp_customize->add_setting( 'tz_footer_style', array(
		'default' 			=> 'footer-style-one',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_style', array(
		'label'       		=> esc_attr__( 'Footer Layout', 'paperio' ),
		'section'     		=> 'tz_add_footer_style',
		'settings'			=> 'tz_footer_style',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_disable_footer_callback',
		'choices'           => array(
									'footer-style-one'   => esc_html__( 'Footer Style1', 'paperio' ),
								    'footer-style-two'   => esc_html__( 'Footer Style2', 'paperio' ),
							   ),
	) ) );
   
  	/* End Blog Layout */

  	/* Disable Footer Border */

    $wp_customize->add_setting( 'tz_disable_footer_border', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_footer_border', array(
		'label'       		=> esc_attr__( 'Disable Footer Border', 'paperio' ),
		'section'     		=> 'tz_add_footer_style',
		'settings'			=> 'tz_disable_footer_border',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_disable_footer_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Disable Footer Border */

  	/* Footer Container Setting */

	$wp_customize->add_setting( 'tz_footer_container_fluid', array(
		'default' 			=> 'yes',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_container_fluid', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_footer_style',
		'settings'			=> 'tz_footer_container_fluid',
		'type'              => 'select',
		'active_callback' 	=> 'paperio_disable_footer_callback',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),		
	) ) );

	/* End Footer Container Setting */

	/* Footer Sidebar 1 */

	$wp_customize->add_setting( 'tz_footer_sidebar1', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_sidebar1', array(
		'label'       		=> esc_attr__( 'Footer Sidebar1', 'paperio' ),
		'section'     		=> 'tz_add_footer_style',
		'settings'			=> 'tz_footer_sidebar1',
		'type'              => 'select',
		'active_callback' 	=> 'paperio_disable_footer_callback',
		'choices'           => $sidebar_array,
	) ) );

	/* End Footer Sidebar 1 */

	/* Footer Sidebar 2 */

	$wp_customize->add_setting( 'tz_footer_sidebar2', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_sidebar2', array(
		'label'       		=> esc_attr__( 'Footer Sidebar2', 'paperio' ),
		'section'     		=> 'tz_add_footer_style',
		'settings'			=> 'tz_footer_sidebar2',
		'type'              => 'select',
		'active_callback' 	=> 'paperio_disable_footer_callback',
		'choices'           => $sidebar_array,
	) ) );

	/* End Footer Sidebar 2 */

	/* Footer Sidebar 3 */

	$wp_customize->add_setting( 'tz_footer_sidebar3', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_sidebar3', array(
		'label'       		=> esc_attr__( 'Footer Sidebar3', 'paperio' ),
		'section'     		=> 'tz_add_footer_style',
		'settings'			=> 'tz_footer_sidebar3',
		'type'              => 'select',
		'active_callback' 	=> 'paperio_disable_footer_callback',
		'choices'           => $sidebar_array,
	) ) );

	/* End Footer Sidebar 3 */

	/* Footer Color Setting */

	$wp_customize->add_setting( 'tz_footer_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_footer_separator', array(
	    'label'      		=> esc_attr__( 'Footer Font and Color Settings', 'paperio' ),
	    'section'    		=> 'tz_add_footer_style',
	    'settings'   		=> 'tz_footer_separator',
	    'active_callback' 	=> 'paperio_disable_footer_callback',
	) ) );

	/* End Footer Color Setting */

	/* Footer Background color setting */

	$wp_customize->add_setting( 'tz_footer_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_footer_bg_color', array(
	    'label'      		=> esc_attr__( 'Footer Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_footer_style',
	    'settings'	 		=> 'tz_footer_bg_color',
	    'active_callback' 	=> 'paperio_disable_footer_callback',
	) ) );

	/* End Footer Background color setting */

	/* Footer Border color setting */

	$wp_customize->add_setting( 'tz_footer_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_footer_border_color', array(
	    'label'      		=> esc_attr__( 'Footer border Color', 'paperio' ),
	    'section'    		=> 'tz_add_footer_style',
	    'settings'	 		=> 'tz_footer_border_color',
	    'active_callback' 	=> 'paperio_disable_footer_callback',
	) ) );

	/* End Footer Border color setting */

	/* Footer Widget Title font size setting */

	$wp_customize->add_setting( 'tz_footer_widget_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_footer_widget_title_font_size', array(
	    'label'      		=> esc_attr__( 'Widget Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_footer_style',
	    'settings'	 		=> 'tz_footer_widget_title_font_size',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_footer_callback',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Footer Widget font size setting */

	/* Footer Widget Title line height setting */

	$wp_customize->add_setting( 'tz_footer_widget_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_footer_widget_title_line_height', array(
	    'label'      		=> esc_attr__( 'Widget Title Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_footer_style',
	    'settings'	 		=> 'tz_footer_widget_title_line_height',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_footer_callback',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Footer Widget line height setting */

	/* Footer Widget Title character spacing setting */

	$wp_customize->add_setting( 'tz_footer_widget_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_footer_widget_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Widget Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_footer_style',
	    'settings'	 		=> 'tz_footer_widget_title_character_spacing',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'paperio_disable_footer_callback',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Footer Widget character spacing setting */

	/* Footer Widget Title color setting */

	$wp_customize->add_setting( 'tz_footer_widget_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_footer_widget_title_color', array(
	    'label'      		=> esc_attr__( 'Widget Title Color', 'paperio' ),
	    'section'    		=> 'tz_add_footer_style',
	    'settings'	 		=> 'tz_footer_widget_title_color',
	    'active_callback' 	=> 'paperio_disable_footer_callback',
	) ) );

	/* End Footer Widget Title color setting */

  	/* Disable Footer Social Icon */

    $wp_customize->add_setting( 'tz_disable_footer_social', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_footer_social', array(
		'label'       		=> esc_attr__( 'Disable Social icon', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_disable_footer_social',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_disable_footer_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Enable Footer Social Icon */

	/* Disable Footer Social Icon Text */

    $wp_customize->add_setting( 'tz_disable_footer_social_text', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_footer_social_text', array(
		'label'       		=> esc_attr__( 'Disable All Social icon text', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_disable_footer_social_text',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Enable Footer Social Icon Text */

	/* Footer Social Icon Target */
  	
    $wp_customize->add_setting( 'tz_disable_footer_social_target', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_footer_social_target', array(
		'label'       		=> esc_attr__( 'Open links in new window?', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_disable_footer_social_target',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Footer Social Icon Target */

	/* Facebook Social Icon */

    $wp_customize->add_setting( 'tz_footer_facebook', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_facebook', array(
		'label'       		=> esc_attr__( 'Facebook', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_facebook',
		'type'              => 'url',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Facebook Social Icon */

	/* Facebook Social Icon Order */
	
    $wp_customize->add_setting( 'tz_footer_social_order[facebook]', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[facebook]', array(
		'label'       		=> esc_attr__( 'Facebook order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[facebook]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Facebook Social Icon Order */

	/* Twitter Social Icon */

	$wp_customize->add_setting( 'tz_footer_twitter', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_twitter', array(
		'label'       		=> esc_attr__( 'Twitter', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_twitter',
		'type'              => 'url',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Twitter Social Icon */

	/* Twitter Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[twitter]', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[twitter]', array(
		'label'       		=> esc_attr__( 'Twitter order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[twitter]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Twitter Social Icon Order */

	/* Google Plus Social Icon */

	$wp_customize->add_setting( 'tz_footer_gplus', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_gplus', array(
		'label'       		=> esc_attr__( 'Google Plus', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_gplus',
		'type'              => 'url',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Google Plus Social Icon */

	/* Google Plus Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[gplus]', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[gplus]', array(
		'label'       		=> esc_attr__( 'Google Plus order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[gplus]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Google Plus Social Icon Order */

	/* Linkedin Social Icon */

	$wp_customize->add_setting( 'tz_footer_linkedin', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_footer_linkedin', array(
	    'label'      		=> esc_attr__( 'Linkedin', 'paperio' ),
	    'section'    		=> 'tz_add_footer_social',
	    'settings'   		=> 'tz_footer_linkedin',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) );

	/* End Linkedin Social Icon */

	/* Linkedin Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[linkedin]', array(
		'default' 			=> '4',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[linkedin]', array(
		'label'       		=> esc_attr__( 'Linkedin order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[linkedin]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Linkedin Social Icon Order */

	/* Instagram Social Icon */

	$wp_customize->add_setting( 'tz_footer_instagram', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_instagram', array(
		'label'       		=> esc_attr__( 'Instagram', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_instagram',
		'type'              => 'url',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Instagram Social Icon */

	/* Instagram Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[instagram]', array(
		'default' 			=> '5',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[instagram]', array(
		'label'       		=> esc_attr__( 'Instagram order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[instagram]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Instagram Social Icon Order */

	/* Pinterest Social Icon */

	$wp_customize->add_setting( 'tz_footer_pinterest', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_pinterest', array(
		'label'       		=> esc_attr__( 'Pinterest', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_pinterest',
		'type'              => 'url',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Pinterest Social Icon */

	/* Pinterest Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[pinterest]', array(
		'default' 			=> '6',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[pinterest]', array(
		'label'       		=> esc_attr__( 'Pinterest order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[pinterest]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Pinterest Social Icon Order */

	/* RSS Social Icon */

	$wp_customize->add_setting( 'tz_footer_rss', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_rss', array(
		'label'       		=> esc_attr__( 'Rss', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_rss',
		'type'              => 'url',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End RSS Social Icon */

	/* RSS Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[rss]', array(
		'default' 			=> '7',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[rss]', array(
		'label'       		=> esc_attr__( 'RSS order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[rss]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End RSS Social Icon Order */

	/* Youtube Social Icon */

	$wp_customize->add_setting( 'tz_footer_youtube', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_footer_youtube', array(
	    'label'      		=> esc_attr__( 'Youtube', 'paperio' ),
	    'section'    		=> 'tz_add_footer_social',
	    'settings'   		=> 'tz_footer_youtube',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) );

	/* End  Youtube Social Icon */

	/* Youtube Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[youtube]', array(
		'default' 			=> '8',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[youtube]', array(
		'label'       		=> esc_attr__( 'Youtube order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[youtube]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Youtube Social Icon Order */

	/* Bloglovin Social Icon */

	$wp_customize->add_setting( 'tz_footer_bloglovin', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_bloglovin', array(
		'label'       		=> esc_attr__( 'Bloglovin', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_bloglovin',
		'type'              => 'url',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Bloglovin Social Icon */

	/* Bloglovin Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[bloglovin]', array(
		'default' 			=> '9',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[bloglovin]', array(
		'label'       		=> esc_attr__( 'Bloglovin order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[bloglovin]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Bloglovin Social Icon Order */

   	/* Tumblr Social Icon */

	$wp_customize->add_setting( 'tz_footer_tumblr', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_footer_tumblr', array(
	    'label'      		=> esc_attr__( 'Tumblr', 'paperio' ),
	    'section'    		=> 'tz_add_footer_social',
	    'settings'   		=> 'tz_footer_tumblr',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) );

	/* End Tumblr Social Icon */

	/* Tumblr Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[tumblr]', array(
		'default' 			=> '10',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[tumblr]', array(
		'label'       		=> esc_attr__( 'Tumblr order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[tumblr]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Tumblr Social Icon Order */	

	/* Dribbble Social Icon */

	$wp_customize->add_setting( 'tz_footer_dribbble', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_footer_dribbble', array(
	    'label'      		=> esc_attr__( 'Dribbble', 'paperio' ),
	    'section'    		=> 'tz_add_footer_social',
	    'settings'   		=> 'tz_footer_dribbble',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) );

	/* End Dribbble Social Icon */

	/* Dribbble Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[dribbble]', array(
		'default' 			=> '11',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[dribbble]', array(
		'label'       		=> esc_attr__( 'Dribbble order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[dribbble]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Dribbble Social Icon Order */

	/* Soundcloud Social Icon */

	$wp_customize->add_setting( 'tz_footer_soundcloud', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_footer_soundcloud', array(
	    'label'      		=> esc_attr__( 'Soundcloud', 'paperio' ),
	    'section'    		=> 'tz_add_footer_social',
	    'settings'   		=> 'tz_footer_soundcloud',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) );

	/* End Soundcloud Social Icon */

	/* Soundcloud Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[soundcloud]', array(
		'default' 			=> '12',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[soundcloud]', array(
		'label'       		=> esc_attr__( 'Soundcloud order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[soundcloud]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Soundcloud Social Icon Order */

	/* Vimeo Social Icon */

	$wp_customize->add_setting( 'tz_footer_vimeo', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_footer_vimeo', array(
	    'label'      		=> esc_attr__( 'Vimeo', 'paperio' ),
	    'section'    		=> 'tz_add_footer_social',
	    'settings'   		=> 'tz_footer_vimeo',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) );

	/* End Vimeo Social Icon */

	/* Vimeo Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[vimeo]', array(
		'default' 			=> '13',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[vimeo]', array(
		'label'       		=> esc_attr__( 'Vimeo order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[vimeo]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Vimeo Social Icon Order */
	
	/* Flickr Social Icon */

	$wp_customize->add_setting( 'tz_footer_flickr', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'tz_footer_flickr', array(
	    'label'      		=> esc_attr__( 'Flickr', 'paperio' ),
	    'section'    		=> 'tz_add_footer_social',
	    'settings'   		=> 'tz_footer_flickr',
	    'type'       		=> 'url',
	    'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) );

	/* End Flickr Social Icon */

	/* Flickr Social Icon Order */

    $wp_customize->add_setting( 'tz_footer_social_order[flickr]', array(
		'default' 			=> '14',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_footer_social_order[flickr]', array(
		'label'       		=> esc_attr__( 'Flickr order', 'paperio' ),
		'section'     		=> 'tz_add_footer_social',
		'settings'			=> 'tz_footer_social_order[flickr]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) ) );

	/* End Flickr Social Icon Order */

	/* Custom Social Link */

	$wp_customize->add_setting( 'tz_footer_custom_link', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'paperio_sanitize_textarea'
	) );
	 
	$wp_customize->add_control( 'tz_footer_custom_link', array(
	    'label'      		=> esc_attr__( 'Custom Link', 'paperio' ),
	    'section'    		=> 'tz_add_footer_social',
	    'settings'   		=> 'tz_footer_custom_link',
	    'type'       		=> 'textarea',
	    'active_callback' 	=> 'paperio_footer_social_icon_callback',
	) );

	/* End Custom Social Link */

  	/* End Footer Social Icon */

  	/* Footer Container Setting */

	$wp_customize->add_setting( 'tz_footer_bottom_container_style', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_bottom_container_style', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_footer_copyright',
		'settings'			=> 'tz_footer_bottom_container_style',
		'type'              => 'select',
		'active_callback' 	=> 'paperio_footer_style_callback',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),		
	) ) );

	/* End Footer Container Setting */

  	/* Footer Copyright */

    $wp_customize->add_setting( 'tz_footer_copyright', array(
		'default' 			=> '',
		'sanitize_callback' => 'paperio_sanitize_textarea'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_footer_copyright', array(
		'label'       		=> esc_attr__( 'Copyright', 'paperio' ),
		'section'     		=> 'tz_add_footer_copyright',
		'settings'			=> 'tz_footer_copyright',
		'type'              => 'textarea',
		'active_callback' 	=> 'paperio_disable_footer_callback',
	) ) );

  	/* End Footer Copyright */

  	/* ScrollToTop Button */

    $wp_customize->add_setting( 'tz_footer_scrolltotop', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_footer_scrolltotop', array(
		'label'       		=> esc_attr__( 'Disable ScrollToTop Button', 'paperio' ),
		'section'     		=> 'tz_add_footer_copyright',
		'settings'			=> 'tz_footer_scrolltotop',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_disable_footer_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

  	/* End ScrollToTop Button */

  	/* ScrollToTop left  */

    $wp_customize->add_setting( 'tz_footer_scrolltoleft', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_footer_scrolltoleft', array(
		'label'       		=> esc_attr__( 'Left Side ScrollToTop', 'paperio' ),
		'section'     		=> 'tz_add_footer_copyright',
		'settings'			=> 'tz_footer_scrolltoleft',
		'type'              => 'radio',
		'active_callback' 	=> 'paperio_footer_scrolltotop_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

  	/* End ScrollToTop left */
  	
  	/* ScrollToTop arrow color setting */

	$wp_customize->add_setting( 'tz_scrolltotop_arrow_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_scrolltotop_arrow_color', array(
	    'label'      		=> esc_attr__( 'ScrollToTop arrow color', 'paperio' ),
	    'section'    		=> 'tz_add_footer_copyright',
	    'settings'	 		=> 'tz_scrolltotop_arrow_color',
	    'active_callback' 	=> 'paperio_footer_scrolltotop_callback',
	) ) );

	/* End ScrollToTop arrow color setting */

	/* ScrollToTop arrow hover color setting */

	$wp_customize->add_setting( 'tz_scrolltotop_arrow_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_scrolltotop_arrow_hover_color', array(
	    'label'      		=> esc_attr__( 'ScrollToTop arrow hover color', 'paperio' ),
	    'section'    		=> 'tz_add_footer_copyright',
	    'settings'	 		=> 'tz_scrolltotop_arrow_hover_color',
	    'active_callback' 	=> 'paperio_footer_scrolltotop_callback',
	) ) );

	/* End ScrollToTop arrow hover color setting */

	/* ScrollToTop background color setting */

	$wp_customize->add_setting( 'tz_scrolltotop_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_scrolltotop_background_color', array(
	    'label'      		=> esc_attr__( 'ScrollToTop background color', 'paperio' ),
	    'section'    		=> 'tz_add_footer_copyright',
	    'settings'	 		=> 'tz_scrolltotop_background_color',
	    'active_callback' 	=> 'paperio_footer_scrolltotop_callback',
	) ) );

	/* End ScrollToTop background color setting */

	/* ScrollToTop background hover color setting */

	$wp_customize->add_setting( 'tz_scrolltotop_background_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_scrolltotop_background_hover_color', array(
	    'label'      		=> esc_attr__( 'ScrollToTop background hover color', 'paperio' ),
	    'section'    		=> 'tz_add_footer_copyright',
	    'settings'	 		=> 'tz_scrolltotop_background_hover_color',
	    'active_callback' 	=> 'paperio_footer_scrolltotop_callback',
	) ) );

	/* End ScrollToTop background hover color setting */

  	/* Callback Functions */

  	if ( ! function_exists( 'paperio_footer_style_callback' ) ) :
		function paperio_footer_style_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_disable_footer' )->value() != 1 ) {
		        if ( $control->manager->get_setting( 'tz_footer_style' )->value() == 'footer-style-one' ) {
			        return true;
			    } else {
			    	return false;
			    }
			} else {
				return false;
			}
		}
	endif;

  	if ( ! function_exists( 'paperio_disable_footer_callback' ) ) :
		function paperio_disable_footer_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_disable_footer' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

    if ( ! function_exists( 'paperio_footer_social_icon_callback' ) ) :
		function paperio_footer_social_icon_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_disable_footer_social' )->value() != 1 &&  $control->manager->get_setting( 'tz_disable_footer' )->value() != 1) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	if ( ! function_exists( 'paperio_footer_scrolltotop_callback' ) ) :
		function paperio_footer_scrolltotop_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_footer_scrolltotop' )->value() != 1 &&  $control->manager->get_setting( 'tz_disable_footer' )->value() != 1) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Callback Functions */