<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

  	/* Page Not Found Image */

    $wp_customize->add_setting( 'tz_page_not_found_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tz_page_not_found_image', array(
		'label'       		=> esc_attr__( 'Image ', 'paperio' ),
		'section'     		=> 'tz_add_page_not_found',
		'settings'			=> 'tz_page_not_found_image',
	) ) );

	/* End Page Not Found Image */

	/* Page Not Found Title */

	$wp_customize->add_setting( 'tz_page_not_found_title', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_page_not_found_title', array(
		'label'       		=> esc_attr__( 'Title', 'paperio' ),
		'section'     		=> 'tz_add_page_not_found',
		'settings'			=> 'tz_page_not_found_title',
		'type'              => 'text',
		
	) ) );

	/* End Page Not Found Title */

	/* Page Not Found Subtitle */

	$wp_customize->add_setting( 'tz_page_not_found_subtitle', array(
		'default' 			=> '',
		'sanitize_callback' => 'paperio_sanitize_textarea'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_page_not_found_subtitle', array(
		'label'       		=> esc_attr__( 'Subtitle', 'paperio' ),
		'section'     		=> 'tz_add_page_not_found',
		'settings'			=> 'tz_page_not_found_subtitle',
		'type'              => 'textarea',
		
	) ) );

	/* End Page Not Found Subtitle */

	/* Page Not Found Hide Button */

    $wp_customize->add_setting( 'tz_page_not_found_button', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_page_not_found_button', array(
		'label'       		=> esc_attr__( 'Hide Button', 'paperio' ),
		'section'     		=> 'tz_add_page_not_found',
		'settings'			=> 'tz_page_not_found_button',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Page Not Found Hide Button */

	/* Page Not Found Button Text */

	$wp_customize->add_setting( 'tz_page_not_found_button_text', array(
		'default' 			=> 'Go to home page',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_page_not_found_button_text', array(
		'label'       		=> esc_attr__( 'Button Text', 'paperio' ),
		'section'     		=> 'tz_add_page_not_found',
		'settings'			=> 'tz_page_not_found_button_text',
		'type'              => 'text',
		'active_callback'   => 'paperio_page_not_found_hide_button',
	) ) );

	/* End Page Not Found Button Text */

	/* Page Not Found Button URL */

	$wp_customize->add_setting( 'tz_page_not_found_button_url', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_page_not_found_button_url', array(
		'label'       		=> esc_attr__( 'Button Url', 'paperio' ),
		'section'     		=> 'tz_add_page_not_found',
		'settings'			=> 'tz_page_not_found_button_url',
		'type'              => 'text',
		'active_callback'   => 'paperio_page_not_found_hide_button',
	) ) );

	/* End Page Not Found Button URL */

	/* Page Not Found Hide Search */

    $wp_customize->add_setting( 'tz_page_not_found_search', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_page_not_found_search', array(
		'label'       		=> esc_attr__( 'Hide Search', 'paperio' ),
		'section'     		=> 'tz_add_page_not_found',
		'settings'			=> 'tz_page_not_found_search',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Page Not Found Hide Search */

	/* Page Not Found Search Placeholder */

	$wp_customize->add_setting( 'tz_page_not_found_search_placeholder', array(
		'default' 			=> 'Search Here...',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_page_not_found_search_placeholder', array(
		'label'       		=> esc_attr__( 'Search Placeholder text', 'paperio' ),
		'section'     		=> 'tz_add_page_not_found',
		'settings'			=> 'tz_page_not_found_search_placeholder',
		'type'              => 'text',
		'active_callback'   => 'paperio_page_not_found_hide_search',
		
	) ) );

	/* End Page Not Found Search Placeholder */

   	/* Custom Callback Functions */

   	if( ! function_exists( 'paperio_page_not_found_hide_button' ) ) :
	   	function paperio_page_not_found_hide_button( $control )	{
	        if ( $control->manager->get_setting( 'tz_page_not_found_button' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if( ! function_exists( 'paperio_page_not_found_hide_search' ) ) :
	   	function paperio_page_not_found_hide_search( $control )	{
	        if ( $control->manager->get_setting( 'tz_page_not_found_search' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Custom Callback Functions */