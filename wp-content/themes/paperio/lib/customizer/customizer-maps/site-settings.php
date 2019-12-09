<?php

  if ( !defined( 'ABSPATH' ) ) { exit; }

  /* Site Identity */

	/* Favicon */

	$wp_customize->add_setting( 'tz_favicon', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tz_favicon', array(
		'label'       		=> esc_attr__( ' Favicon ', 'paperio' ),
		'description'       => esc_attr__( 'Favicon for your website (32px x 32px).', 'paperio' ),
		'section'     		=> 'tz_add_site_identity_customize_section',
		'settings'			=> 'tz_favicon',
		
	) ) );

	/* End Favicon */

	/* Apple Iphone Icon */

	$wp_customize->add_setting( 'tz_iphone_favicon', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tz_iphone_favicon', array(
		'label'       		=> esc_attr__( ' Apple iPhone Icon ', 'paperio' ),
		'description'       => esc_attr__( 'Favicon for apple iPhone (57px x 57px).', 'paperio' ),
		'section'     		=> 'tz_add_site_identity_customize_section',
		'settings'			=> 'tz_iphone_favicon',
		
	) ) );

	/* End Apple Iphone Icon */

	/* Apple Iphone Retina Icon */

	$wp_customize->add_setting( 'tz_iphone_ratina_favicon', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tz_iphone_ratina_favicon', array(
		'label'       		=> esc_attr__( ' Apple iPhone Retina Icon ', 'paperio' ),
		'description'       => esc_attr__( 'Favicon for apple iPhone retina version (149px x 149px).', 'paperio' ),
		'section'     		=> 'tz_add_site_identity_customize_section',
		'settings'			=> 'tz_iphone_ratina_favicon',
		
	) ) );

	/* End Apple Iphone Retina Icon */

	/* Apple Ipad  Icon */

	$wp_customize->add_setting( 'tz_ipad_favicon', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tz_ipad_favicon', array(
		'label'       		=> esc_attr__( ' Apple iPad Icon ', 'paperio' ),
		'description'       => esc_attr__( 'Favicon for apple iPad (72px x 72px).', 'paperio' ),
		'section'     		=> 'tz_add_site_identity_customize_section',
		'settings'			=> 'tz_ipad_favicon',
		
	) ) );

	/* End Apple Ipad Icon */

	/* Apple Ipad Retina Icon */

	$wp_customize->add_setting( 'tz_ipad_ratina_favicon', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tz_ipad_ratina_favicon', array(
		'label'       		=> esc_attr__( ' Apple iPad Retina Icon ', 'paperio' ),
		'description'       => esc_attr__( 'Favicon for apple iPad retina version (149px x 149px).', 'paperio' ),
		'section'     		=> 'tz_add_site_identity_customize_section',
		'settings'			=> 'tz_ipad_ratina_favicon',
		
	) ) );

	/* End Apple Ipad Retina Icon */

	/* End Site Identity */
?>