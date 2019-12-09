<?php
	
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Disable Promotional Block */

    $wp_customize->add_setting( 'tz_disable_promotional_block', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_promotional_block', array(
		'label'       		=> esc_attr__( 'Disable Promotional Block', 'paperio' ),
		'section'     		=> 'tz_add_promotional_block_section',
		'settings'			=> 'tz_disable_promotional_block',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Disable Promotional Block */

	/* Enable Container Fluid */

	$wp_customize->add_setting( 'tz_promotional_enable_container_fluid', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_promotional_enable_container_fluid', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_promotional_block_section',
		'settings'			=> 'tz_promotional_enable_container_fluid',
		'type'              => 'select',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),
	) ) );

	/* End Enable Container Fluid */

	/* Promotional Block Shortcode */

    $wp_customize->add_setting( 'tz_promotional_block_shortcode', array(
		'default' 			=> '',
		'sanitize_callback' => 'paperio_shortcode_sanitize_textarea'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_promotional_block_shortcode', array(
		'label'       		=> esc_attr__( 'Promotional Block Shortcode', 'paperio' ),
		'description'		=> sprintf( __( 'Please <a href="%s" target="_blank">click here</a> to know how to generate promotional blocks using our shortcode.', 'paperio' ), 'http://wpdemos.themezaa.com/paperio/documentation/shortcodes/' ),
		'section'     		=> 'tz_add_promotional_block_section',
		'settings'			=> 'tz_promotional_block_shortcode',
		'type'              => 'textarea',
	) ) );

	/* End Promotional Block Shortcode */

	/* Separator setting */

	$wp_customize->add_setting( 'tz_promotional_block_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_promotional_block_separator', array(
	    'label'      		=> esc_attr__( 'Font & Color Settings', 'paperio' ),
	    'section'    		=> 'tz_add_promotional_block_section',
	    'settings'   		=> 'tz_promotional_block_separator',
	) ) );

	/* End Separator setting */

	/* Border Color Setting */

	$wp_customize->add_setting( 'tz_promotional_block_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_promotional_block_border_color', array(
	    'label'      		=> esc_attr__( 'Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_promotional_block_section',
	    'settings'	 		=> 'tz_promotional_block_border_color',
	) ) );

	/* End Border Color Setting */

	/* Box Hover Color Setting */

	$wp_customize->add_setting( 'tz_promotional_block_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_promotional_block_hover_color', array(
	    'label'      		=> esc_attr__( 'Box Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_promotional_block_section',
	    'settings'	 		=> 'tz_promotional_block_hover_color',
	) ) );

	/* End Box Hover Color Setting */

	/* Box Hover Color Opacity */

	$wp_customize->add_setting( 'tz_promotional_block_hover_color_opacity', array(
		'default'    		=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_promotional_block_hover_color_opacity', array(
	    'label'      		=> esc_attr__( 'Box Hover Color Opacity', 'paperio' ),
		'section'    		=> 'tz_add_promotional_block_section',
		'settings'   		=> 'tz_promotional_block_hover_color_opacity',
		'type'       		=> 'select',
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

	/* End Box Hover Color Opacity */

	/* Title font size Setting */

	$wp_customize->add_setting( 'tz_promotional_block_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_promotional_block_title_font_size', array(
	    'label'      		=> esc_attr__( 'Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_promotional_block_section',
	    'settings'	 		=> 'tz_promotional_block_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Title font size Setting */

	/* Title line height Setting */

	$wp_customize->add_setting( 'tz_promotional_block_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_promotional_block_title_line_height', array(
	    'label'      		=> esc_attr__( 'Title Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_promotional_block_section',
	    'settings'	 		=> 'tz_promotional_block_title_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Title line height Setting */

	/* Title letter spacing Setting */

	$wp_customize->add_setting( 'tz_promotional_block_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_promotional_block_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_promotional_block_section',
	    'settings'	 		=> 'tz_promotional_block_title_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Title character spacing Setting */

	/* Title Color Setting */

	$wp_customize->add_setting( 'tz_promotional_block_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_promotional_block_title_color', array(
	    'label'      		=> esc_attr__( 'Title Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_promotional_block_section',
	    'settings'	 		=> 'tz_promotional_block_title_color',
	) ) );

	/* End Title Color Setting */