<?php

	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

  	/* Disable Social Share */

    $wp_customize->add_setting( 'tz_disable_social_share', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_social_share', array(
		'label'       		=> esc_attr__( 'Disable Social Share', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_disable_social_share',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Disable Social Share */

	/* Facebook Social Share Icon */

    $wp_customize->add_setting( 'tz_enable_facebook', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_enable_facebook', array(
		'label'       		=> esc_attr__( 'Facebook', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_enable_facebook',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Facebook Social Share Icon */

	/* Facebook Social Share Icon Order */
	
    $wp_customize->add_setting( 'tz_post_social_order[facebook]', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_post_social_order[facebook]', array(
		'label'       		=> esc_attr__( 'Facebook order', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_post_social_order[facebook]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Facebook Social Share Icon Order */

	/* Twitter Social Share Icon */

	$wp_customize->add_setting( 'tz_enable_twitter', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_enable_twitter', array(
		'label'       		=> esc_attr__( 'Twitter', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_enable_twitter',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Twitter Social Share Icon */

	/* Twitter Social Share Icon Order */
	
    $wp_customize->add_setting( 'tz_post_social_order[twitter]', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_post_social_order[twitter]', array(
		'label'       		=> esc_attr__( 'Twitter order', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_post_social_order[twitter]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Twitter Social Share Icon Order */

	/* Google Plus Social Share Icon */

	$wp_customize->add_setting( 'tz_enable_google_plus', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_enable_google_plus', array(
		'label'       		=> esc_attr__( 'Google Plus', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_enable_google_plus',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Google Plus Social Share Icon */

	/* Google Plus Social Share Icon Order */
	
    $wp_customize->add_setting( 'tz_post_social_order[google_plus]', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_post_social_order[google_plus]', array(
		'label'       		=> esc_attr__( 'Google Plus order', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_post_social_order[google_plus]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Google Plus Social Share Icon Order */

	/* Linkedin Social Share Icon */

	$wp_customize->add_setting( 'tz_enable_linkedin', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_enable_linkedin', array(
		'label'       		=> esc_attr__( 'Linkedin', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_enable_linkedin',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Linkedin Social Share Icon */

	/* Linkedin Social Share Icon Order */
	
    $wp_customize->add_setting( 'tz_post_social_order[linkedin]', array(
		'default' 			=> '4',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_post_social_order[linkedin]', array(
		'label'       		=> esc_attr__( 'Linkedin order', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_post_social_order[linkedin]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Linkedin Social Share Icon Order */

	/* Pinterest Social Share Icon */

	$wp_customize->add_setting( 'tz_enable_pinterest', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_enable_pinterest', array(
		'label'       		=> esc_attr__( 'Pinterest', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_enable_pinterest',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Pinterest Social Share Icon */

	/* Pinterest Social Share Icon Order */
	
    $wp_customize->add_setting( 'tz_post_social_order[pinterest]', array(
		'default' 			=> '5',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_post_social_order[pinterest]', array(
		'label'       		=> esc_attr__( 'Pinterest order', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_post_social_order[pinterest]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Pinterest Social Share Icon Order */

	/* Tumblr Social Share Icon */

	$wp_customize->add_setting( 'tz_enable_tumblr', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_enable_tumblr', array(
		'label'       		=> esc_attr__( 'Tumblr', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_enable_tumblr',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Tumblr Social Share Icon */

	/* Tumblr Social Share Icon Order */
	
    $wp_customize->add_setting( 'tz_post_social_order[tumblr]', array(
		'default' 			=> '6',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_post_social_order[tumblr]', array(
		'label'       		=> esc_attr__( 'Tumblr order', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_post_social_order[tumblr]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Tumblr Social Share Icon Order */

	/* Delicious Social Share Icon */

	$wp_customize->add_setting( 'tz_enable_delicious', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_enable_delicious', array(
		'label'       		=> esc_attr__( 'Delicious', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_enable_delicious',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Delicious Social Share Icon */

	/* Delicious Social Share Icon Order */
	
    $wp_customize->add_setting( 'tz_post_social_order[delicious]', array(
		'default' 			=> '7',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_post_social_order[delicious]', array(
		'label'       		=> esc_attr__( 'Delicious order', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_post_social_order[delicious]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Delicious Social Share Icon Order */

	/* Reddit Social Share Icon */

	$wp_customize->add_setting( 'tz_enable_reddit', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_enable_reddit', array(
		'label'       		=> esc_attr__( 'Reddit', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_enable_reddit',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Reddit Social Share Icon */

	/* Reddit Social Share Icon Order */
	
    $wp_customize->add_setting( 'tz_post_social_order[reddit]', array(
		'default' 			=> '8',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_post_social_order[reddit]', array(
		'label'       		=> esc_attr__( 'Reddit order', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_post_social_order[reddit]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Reddit Social Share Icon Order */

	/* StumbleUpon Social Share Icon */

	$wp_customize->add_setting( 'tz_enable_stumbleupon', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_enable_stumbleupon', array(
		'label'       		=> esc_attr__( 'StumbleUpon', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_enable_stumbleupon',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End StumbleUpon Social Share Icon */

	/* StumbleUpon Social Share Icon Order */
	
    $wp_customize->add_setting( 'tz_post_social_order[stumbleupon]', array(
		'default' 			=> '9',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_post_social_order[stumbleupon]', array(
		'label'       		=> esc_attr__( 'StumbleUpon order', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_post_social_order[stumbleupon]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End StumbleUpon Social Share Icon Order */

	/* Digg Social Share Icon */

	$wp_customize->add_setting( 'tz_enable_digg', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_enable_digg', array(
		'label'       		=> esc_attr__( 'Digg', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_enable_digg',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Digg Social Share Icon */

	/* Digg Social Share Icon Order */
	
    $wp_customize->add_setting( 'tz_post_social_order[digg]', array(
		'default' 			=> '10',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_post_social_order[digg]', array(
		'label'       		=> esc_attr__( 'Digg order', 'paperio' ),
		'section'     		=> 'tz_add_social_share_section',
		'settings'			=> 'tz_post_social_order[digg]',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '100',
		'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Digg Social Share Icon Order */

	/* Color Separator Setting */

	$wp_customize->add_setting( 'tz_post_social_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_post_social_separator', array(
	    'label'      		=> esc_attr__( 'Font & Color Setting', 'paperio' ),
	    'section'    		=> 'tz_add_social_share_section',
	    'settings'   		=> 'tz_post_social_separator',
	    'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Color Separator Setting */

	/* Title font size setting */

	$wp_customize->add_setting( 'tz_post_social_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_post_social_font_size', array(
	    'label'      		=> esc_attr__( 'Icon Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_social_share_section',
	    'settings'	 		=> 'tz_post_social_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	    'active_callback' 	=> 'paperio_social_share_callback',
	) );

	/* End Title font size setting */

	/* Title line height setting */

	$wp_customize->add_setting( 'tz_post_social_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_post_social_line_height', array(
	    'label'      		=> esc_attr__( 'Icon Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_social_share_section',
	    'settings'	 		=> 'tz_post_social_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	    'active_callback' 	=> 'paperio_social_share_callback',
	) );

	/* End Title line height setting */

	/* Title Text Color Setting */

	$wp_customize->add_setting( 'tz_post_social_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_post_social_icon_color', array(
	    'label'      		=> esc_attr__( 'Icon Color', 'paperio' ),
	    'section'    		=> 'tz_add_social_share_section',
	    'settings'	 		=> 'tz_post_social_icon_color',
	    'active_callback' 	=> 'paperio_social_share_callback',
	) ) );

	/* End Title Text Color Setting */

  	/* Callback Functions */

    if ( ! function_exists( 'paperio_social_share_callback' ) ) :
		function paperio_social_share_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_disable_social_share' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Callback Functions */