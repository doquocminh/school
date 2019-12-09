<?php

	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

  	/* Hide Image Alt */

    $wp_customize->add_setting( 'tz_image_alt', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_image_alt', array(
		'label'       		=> esc_attr__( 'Hide Image Alt', 'paperio' ),
		'section'     		=> 'tz_add_image_meta_data_section',
		'settings'			=> 'tz_image_alt',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Image Alt */

	/* Hide Image Title */

    $wp_customize->add_setting( 'tz_image_title', array(
		'default' 			=> 1,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_image_title', array(
		'label'       		=> esc_attr__( 'Hide Image Title', 'paperio' ),
		'section'     		=> 'tz_add_image_meta_data_section',
		'settings'			=> 'tz_image_title',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Image Title */

	/* Hide Image Image Title in Lightbox Popup */

    $wp_customize->add_setting( 'tz_image_title_lightbox_popup', array(
		'default' 			=> 1,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_image_title_lightbox_popup', array(
		'label'       		=> esc_attr__( 'Hide Image Title in Lightbox Popup', 'paperio' ),
		'section'     		=> 'tz_add_image_meta_data_section',
		'settings'			=> 'tz_image_title_lightbox_popup',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Image Image Title in Lightbox Popup */

	/* Hide Image Image Caption in Lightbox Popup */

    $wp_customize->add_setting( 'tz_image_caption_lightbox_popup', array(
		'default' 			=> 1,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_image_caption_lightbox_popup', array(
		'label'       		=> esc_attr__( 'Hide Image Caption in Lightbox Popup', 'paperio' ),
		'section'     		=> 'tz_add_image_meta_data_section',
		'settings'			=> 'tz_image_caption_lightbox_popup',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Image Image Caption in Lightbox Popup */