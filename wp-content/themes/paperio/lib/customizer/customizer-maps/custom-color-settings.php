<?php
	
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/*
	 * For General Settings
	 */

	/* Body font size setting */

	$wp_customize->add_setting( 'tz_h1_logo_font_page', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_h1_logo_font_page', array(
	    'label'      		=> esc_attr__( 'H1 in logo in front / home page?', 'paperio' ),
	    'section'    		=> 'tz_add_general_color_section',
	    'settings'	 		=> 'tz_h1_logo_font_page',
	    'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Body font size setting */

	/* Body font size setting */

	$wp_customize->add_setting( 'tz_body_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_body_font_size', array(
	    'label'      		=> esc_attr__( 'Body Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_general_color_section',
	    'settings'	 		=> 'tz_body_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Body font size setting */

	/* Body line height setting */

	$wp_customize->add_setting( 'tz_body_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_body_line_height', array(
	    'label'      		=> esc_attr__( 'Body Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_general_color_section',
	    'settings'	 		=> 'tz_body_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Body line height setting */

	/* Body character spacing setting */

	$wp_customize->add_setting( 'tz_body_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_body_character_spacing', array(
	    'label'      		=> esc_attr__( 'Body Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_general_color_section',
	    'settings'	 		=> 'tz_body_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Body character spacing setting */

	/* Body Background Color Setting */

	$wp_customize->add_setting( 'tz_body_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_body_background_color', array(
	    'label'      		=> esc_attr__( 'Body Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_color_section',
	    'settings'	 		=> 'tz_body_background_color',
	) ) );

	/* End Body Background Color Setting */

	/* Body Text Color Setting */

	$wp_customize->add_setting( 'tz_body_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_body_text_color', array(
	    'label'      		=> esc_attr__( 'Body Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_color_section',
	    'settings'	 		=> 'tz_body_text_color',
	) ) );

	/* End Title Text Color Setting */

	/*
	 * For Title Wrapper Settings
	 */

	/* Title Text Transform */

	$wp_customize->add_setting( 'tz_title_text_transform', array(
		'default' 			=> 'uppercase',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_title_text_transform', array(
		'label'       		=> esc_attr__( 'Text Transform', 'paperio' ),
		'section'     		=> 'tz_add_title_color_section',
		'settings'			=> 'tz_title_text_transform',
		'type'              => 'select',
		'choices'           => array(
			                            'capitalize'=> esc_html__( 'Capitalize', 'paperio' ),
				                        'uppercase' => esc_html__( 'Uppercase', 'paperio' ),
				                        'lowercase' => esc_html__( 'Lowercase', 'paperio' ),
			                        )
	) ) );

    /* End Title Text Transform */

	/* Title font size setting */

	$wp_customize->add_setting( 'tz_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_title_font_size', array(
	    'label'      		=> esc_attr__( 'Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Title font size setting */

	/* Title line height setting */

	$wp_customize->add_setting( 'tz_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_title_line_height', array(
	    'label'      		=> esc_attr__( 'Title Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_title_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Title line height setting */

	/* Title character spacing setting */

	$wp_customize->add_setting( 'tz_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_title_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Title character spacing setting */

	/* Title Text Color Setting */

	$wp_customize->add_setting( 'tz_title_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_title_text_color', array(
	    'label'      		=> esc_attr__( 'Title Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_title_text_color',
	) ) );

	/* End Title Text Color Setting */

	/* Meta font size setting */

	$wp_customize->add_setting( 'tz_meta_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_meta_font_size', array(
	    'label'      		=> esc_attr__( 'Meta Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_meta_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Meta font size setting */

	/* Meta line height setting */

	$wp_customize->add_setting( 'tz_meta_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_meta_line_height', array(
	    'label'      		=> esc_attr__( 'Meta Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_meta_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Meta line height setting */

	/* Meta character spacing setting */

	$wp_customize->add_setting( 'tz_meta_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_meta_character_spacing', array(
	    'label'      		=> esc_attr__( 'Meta Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_meta_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Meta character spacing setting */

	/* Meta Text Color Setting */

	$wp_customize->add_setting( 'tz_meta_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_meta_text_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_meta_text_color',
	) ) );

	/* End Title Text Color Setting */

	/* Meta Text Hover Color Setting */

	$wp_customize->add_setting( 'tz_meta_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_meta_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_meta_text_hover_color',
	) ) );

	/* End Meta Text Hover Color Setting */

	/* Title Background Color Setting */

	$wp_customize->add_setting( 'tz_title_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_title_background_color', array(
	    'label'      		=> esc_attr__( 'Title Wrapper Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_title_background_color',
	) ) );

	/* End Title Background Color Setting */

	/* Title Background Image Setting */

	$wp_customize->add_setting( 'tz_title_background_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tz_title_background_image', array(
	    'label'      		=> esc_attr__( 'Title Wrapper Background Image', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_title_background_image',
	) ) );

	/* End Title Background Image Setting */

	/* Title Border Color Setting */

	$wp_customize->add_setting( 'tz_title_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_title_border_color', array(
	    'label'      		=> esc_attr__( 'Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_title_color_section',
	    'settings'	 		=> 'tz_title_border_color',
	) ) );

	/* End Border Color Setting */


	/*
	 * For Breadcrumb Settings
	 */

	/* Breadcrumb Title font size setting */

	$wp_customize->add_setting( 'tz_breadcrumb_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_breadcrumb_font_size', array(
	    'label'      		=> esc_attr__( 'Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_breadcrumb_color_section',
	    'settings'	 		=> 'tz_breadcrumb_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Breadcrumb Title font size setting */

	/* Breadcrumb Title line height setting */

	$wp_customize->add_setting( 'tz_breadcrumb_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_breadcrumb_line_height', array(
	    'label'      		=> esc_attr__( 'Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_breadcrumb_color_section',
	    'settings'	 		=> 'tz_breadcrumb_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Breadcrumb Title line height setting */

	/* Breadcrumb Title character spacing setting */

	$wp_customize->add_setting( 'tz_breadcrumb_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_breadcrumb_character_spacing', array(
	    'label'      		=> esc_attr__( 'Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_breadcrumb_color_section',
	    'settings'	 		=> 'tz_breadcrumb_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Breadcrumb Title character spacing setting */

	/* Breadcrumb Title Text Color Setting */

	$wp_customize->add_setting( 'tz_breadcrumb_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_breadcrumb_text_color', array(
	    'label'      		=> esc_attr__( 'Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_breadcrumb_color_section',
	    'settings'	 		=> 'tz_breadcrumb_text_color',
	) ) );

	/* End Breadcrumb Title Text Color Setting */

	/* Breadcrumb Text Hover Color Setting */

	$wp_customize->add_setting( 'tz_breadcrumb_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_breadcrumb_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_breadcrumb_color_section',
	    'settings'	 		=> 'tz_breadcrumb_text_hover_color',
	) ) );

	/* End Breadcrumb Text Hover Color Setting */

	/* Breadcrumb Background Color Setting */

	$wp_customize->add_setting( 'tz_breadcrumb_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_breadcrumb_background_color', array(
	    'label'      		=> esc_attr__( 'Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_breadcrumb_color_section',
	    'settings'	 		=> 'tz_breadcrumb_background_color',
	) ) );

	/* End Breadcrumb Background Color Setting */

	/* Breadcrumb Border Color Setting */

	$wp_customize->add_setting( 'tz_breadcrumb_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_breadcrumb_border_color', array(
	    'label'      		=> esc_attr__( 'Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_breadcrumb_color_section',
	    'settings'	 		=> 'tz_breadcrumb_border_color',
	) ) );

	/* End Breadcrumb Border Color Setting */


	/*
	 * For Content Settings
	 */

	/* Content font size setting */

	$wp_customize->add_setting( 'tz_content_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_content_font_size', array(
	    'label'      		=> esc_attr__( 'Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_content_color_section',
	    'settings'	 		=> 'tz_content_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Content font size setting */

	/* Content line height setting */

	$wp_customize->add_setting( 'tz_content_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_content_line_height', array(
	    'label'      		=> esc_attr__( 'Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_content_color_section',
	    'settings'	 		=> 'tz_content_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Content line height setting */

	/* Content character spacing setting */

	$wp_customize->add_setting( 'tz_content_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_content_character_spacing', array(
	    'label'      		=> esc_attr__( 'Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_content_color_section',
	    'settings'	 		=> 'tz_content_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Content character spacing setting */

	/* Content Link Color Setting */

	$wp_customize->add_setting( 'tz_content_link_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_content_link_color', array(
	    'label'      		=> esc_attr__( 'Link Color', 'paperio' ),
	    'section'    		=> 'tz_add_content_color_section',
	    'settings'	 		=> 'tz_content_link_color',
	) ) );

	/* End Content Link Color Setting */

	/* Content Link Hover Color Setting */

	$wp_customize->add_setting( 'tz_content_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_content_link_hover_color', array(
	    'label'      		=> esc_attr__( 'Link Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_content_color_section',
	    'settings'	 		=> 'tz_content_link_hover_color',
	) ) );

	/* End Content Link Hover Color Setting */