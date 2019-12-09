<?php

	/* Exit if accessed directly. */
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Theme Color Style */

    $wp_customize->add_setting( 'tz_theme_type', array(
		'default' 			=> 'theme-yellow',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_theme_type', array(
		'label'       		=> esc_attr__( 'Theme Type', 'paperio' ),
		'section'     		=> 'tz_add_general_section',
		'settings'			=> 'tz_theme_type',
		'type'              => 'radio',
		'choices'           => array(
									    'theme-yellow' 			=> esc_html__( 'Theme Yellow', 'paperio' ),
									    'theme-orange' 			=> esc_html__( 'Theme Orange', 'paperio' ),
									    'theme-magenta' 		=> esc_html__( 'Theme Blue', 'paperio' ),
									    'theme-deep-green' 		=> esc_html__( 'Theme Deep Green', 'paperio' ),
									    'theme-turquoise-blue' 	=> esc_html__( 'Theme Turquoise Blue', 'paperio' ),
									    'theme-fast-red' 		=> esc_html__( 'Theme Fast Red', 'paperio' ),
									    'theme-custom-color'	=> esc_html__( 'Theme Custom Color', 'paperio' ),
								   	),
	) ) );

	/* End Theme Color Style */

	/* Theme Custom Color setting */

	$wp_customize->add_setting( 'tz_theme_custom_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_theme_custom_color', array(
	    'label'      		=> esc_attr__( 'Theme Custom Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_theme_custom_color',
	    'active_callback'   => 'paperio_custom_theme_color_callback',
	) ) );

	/* End Theme Custom Color setting */
	
	/* Custom Sidebars Settings */
	
	$wp_customize->add_setting( 'paperio_custom_sidebars', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Custom_Sidebars( $wp_customize, 'paperio_custom_sidebars', array(
	    'label'      		=> esc_attr__( 'Manage Sidebars', 'paperio' ),
	    'type'              => 'paperio_custom_sidebar',
	    'description'		=> esc_attr__( 'You can add widgets in these sidebars at Appearance > Widgets and these sidebars can be assigned in header, footer, pages and posts.', 'paperio' ), 
	    'section'    		=> 'tz_add_general_section',
	    'settings'   		=> 'paperio_custom_sidebars',	
	) ) );

	/* End Custom Sidebars Settings */

	//Page scrolling effect

	/* Disable Page Scrolling Effect */

    $wp_customize->add_setting( 'tz_disable_page_scrolling_effect', array(
		'default' 			=> 1,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_page_scrolling_effect', array(
		'label'       		=> esc_attr__( 'Disable Page Smooth Scroll', 'paperio' ),
		'section'     		=> 'tz_add_general_section',
		'settings'			=> 'tz_disable_page_scrolling_effect',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Disable Page Scrolling Effect */

	/* Remove Font Awesome Style */

    $wp_customize->add_setting( 'tz_remove_font_awesome_style', array(
		'default' 			=> 1,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_remove_font_awesome_style', array(
		'label'       		=> esc_attr__( 'Remove Third Party Font Awesome Style', 'paperio' ),
		'section'     		=> 'tz_add_general_section',
		'settings'			=> 'tz_remove_font_awesome_style',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Remove Font Awesome Style */

  	/* Pagination Type */

    $wp_customize->add_setting( 'tz_general_pagination_style', array(
		'default' 			=> 'old-new-pagination',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_pagination_style', array(
		'label'       		=> esc_attr__( 'Pagination Types', 'paperio' ),
		'section'     		=> 'tz_add_general_section',
		'settings'			=> 'tz_general_pagination_style',
		'type'              => 'select',
		'choices'           => array(
								    'old-new-pagination' 			=> esc_html__( 'Old And New', 'paperio' ),
								    'number-pagination' 			=> esc_html__( 'Number Pagination', 'paperio' ),
								    'infinite-scroll-pagination'	=> esc_html__( 'Infinite Scroll', 'paperio' ),
							   ),
	) ) );
   
  	/* End Pagination Type */

	/* Theme Sidebar Style */

    $wp_customize->add_setting( 'tz_sidebar_style', array(
		'default' 			=> 'sidebar-style1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_sidebar_style', array(
		'label'       		=> esc_attr__( 'Sidebar Style', 'paperio' ),
		'section'     		=> 'tz_add_general_section',
		'settings'			=> 'tz_sidebar_style',
		'type'              => 'radio',
		'choices'           => array(
									    'sidebar-style1' 	=> esc_html__( 'Sidebar Style1', 'paperio' ),
									    'sidebar-style2' 	=> esc_html__( 'Sidebar Style2', 'paperio' ),
									    'sidebar-style3'	=> esc_html__( 'Sidebar Style3', 'paperio' ),
									    'sidebar-style4'	=> esc_html__( 'Sidebar Style4', 'paperio' ),
								    ),
	) ) );

	/* End Theme Sidebar Style */

	/* Sidebar color setting */

	$wp_customize->add_setting( 'tz_sidebar_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_sidebar_separator', array(
	    'label'      		=> esc_attr__( 'Sidebar Color Setting', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'   		=> 'tz_sidebar_separator',
	) ) );

	/* End Sidebar color setting */

	/* Title font size setting */

	$wp_customize->add_setting( 'tz_sidebar_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_sidebar_title_font_size', array(
	    'label'      		=> esc_attr__( 'Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_sidebar_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Title font size setting */

	/* Title line height setting */

	$wp_customize->add_setting( 'tz_sidebar_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_sidebar_title_line_height', array(
	    'label'      		=> esc_attr__( 'Title Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_sidebar_title_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Title line height setting */

	/* Title character spacing setting */

	$wp_customize->add_setting( 'tz_sidebar_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_sidebar_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_sidebar_title_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Title character spacing setting */

	/* Title color setting */

	$wp_customize->add_setting( 'tz_sidebar_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_sidebar_title_color', array(
	    'label'      		=> esc_attr__( 'Title Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_sidebar_title_color',
	) ) );

	/* End Title color setting */

	/* Link font size setting */

	$wp_customize->add_setting( 'tz_sidebar_link_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_sidebar_link_font_size', array(
	    'label'      		=> esc_attr__( 'Link Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_sidebar_link_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Link font size setting */

	/* Link line height setting */

	$wp_customize->add_setting( 'tz_sidebar_link_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_sidebar_link_line_height', array(
	    'label'      		=> esc_attr__( 'Link Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_sidebar_link_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Link line height setting */

	/* Link character spacing setting */

	$wp_customize->add_setting( 'tz_sidebar_link_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_sidebar_link_character_spacing', array(
	    'label'      		=> esc_attr__( 'Link Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_sidebar_link_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Link font size setting */

	/* Link color setting */

	$wp_customize->add_setting( 'tz_sidebar_link_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_sidebar_link_color', array(
	    'label'      		=> esc_attr__( 'Link Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_sidebar_link_color',
	) ) );

	/* End Link color setting */

	/* Link Hover color setting */

	$wp_customize->add_setting( 'tz_sidebar_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_sidebar_link_hover_color', array(
	    'label'      		=> esc_attr__( 'Link Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_sidebar_link_hover_color',
	) ) );

	/* End Link Hover color setting */

	/* Border color setting */

	$wp_customize->add_setting( 'tz_sidebar_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_sidebar_border_color', array(
	    'label'      		=> esc_attr__( 'Border color', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_sidebar_border_color',
	    'active_callback' 	=> 'paperio_sidebar_border_color_callback',
	) ) );

	/* End Border color setting */

	/* Background color setting */

	$wp_customize->add_setting( 'tz_sidebar_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_sidebar_background_color', array(
	    'label'      		=> esc_attr__( 'Background color', 'paperio' ),
	    'section'    		=> 'tz_add_general_section',
	    'settings'	 		=> 'tz_sidebar_background_color',
	    'active_callback' 	=> 'paperio_sidebar_background_color_callback',
	) ) );

	/* End Background color setting */

	/* Custom Callback Functions */


	if ( ! function_exists( 'paperio_custom_theme_color_callback' ) ) :
		function paperio_custom_theme_color_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_theme_type' )->value() == 'theme-custom-color' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

    if ( ! function_exists( 'paperio_sidebar_border_color_callback' ) ) :
		function paperio_sidebar_border_color_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_sidebar_style' )->value() == 'sidebar-style2' || $control->manager->get_setting( 'tz_sidebar_style' )->value() == 'sidebar-style4' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_sidebar_background_color_callback	' ) ) :
		function paperio_sidebar_background_color_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_sidebar_style' )->value() == 'sidebar-style3' ) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	/* End Callback Functions */