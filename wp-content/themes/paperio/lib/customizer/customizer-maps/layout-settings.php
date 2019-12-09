<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$sidebar_array = paperio_register_sidebar_customizer_array();

	/*
	 * Page layout setting panel.
	 */

	/* Page General Layout */

	$wp_customize->add_setting( 'tz_page_layout_setting', array(
		'default' 			=> 'paperio_layout_full_screen_12col',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Preview_Image_Control( $wp_customize, 'tz_page_layout_setting', array(
		'label'       		=> esc_attr__( 'Sidebar Settings', 'paperio' ),
		'section'     		=> 'tz_add_page_layout_panel',
		'settings'			=> 'tz_page_layout_setting',
		'type'              => 'radio',
		'choices'           => array(
										'paperio_layout_full_screen_12col' => esc_html__( 'One Column', 'paperio' ),
									  	'paperio_layout_left_sidebar'      => esc_html__( 'Two Columns Left', 'paperio' ),
									  	'paperio_layout_right_sidebar'     => esc_html__( 'Two Columns Right', 'paperio' ),
								    ),
		'tz_img'			=> array(
									PAPERIO_THEME_IMAGES_URI . '/1col.png',
								  	PAPERIO_THEME_IMAGES_URI . '/2cl.png',
								  	PAPERIO_THEME_IMAGES_URI . '/2cr.png',
							   ),	
	) ) );

	/* End Page General Layout */

	/* Page Left Sidebar */

	$wp_customize->add_setting( 'tz_page_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_page_left_sidebar', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_page_layout_panel',
		'settings'			=> 'tz_page_left_sidebar',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_page_left_sidebar_layout_callback',
	) ) );

	/* End Page Left Sidebar */

	/* Page Right Sidebar */
	
	$wp_customize->add_setting( 'tz_page_right_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_page_right_sidebar', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_page_layout_panel',
		'settings'			=> 'tz_page_right_sidebar',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_page_right_sidebar_layout_callback',
	) ) );

	/* End Page Right Sidebar */

	/* Page Container Setting */

	$wp_customize->add_setting( 'tz_page_container_fluid', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_page_container_fluid', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_page_layout_panel',
		'settings'			=> 'tz_page_container_fluid',
		'type'              => 'select',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),		
	) ) );

	/* End Page Container Setting */

	/* Page Breadcrumb Title */

    $wp_customize->add_setting( 'tz_page_breadcrumb_title', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_page_breadcrumb_title', array(
		'label'       		=> esc_attr__( 'Page Breadcrumb Title', 'paperio' ),
		'section'     		=> 'tz_add_page_layout_panel',
		'settings'			=> 'tz_page_breadcrumb_title',
		'type'              => 'text',
		'active_callback'   => 'paperio_hide_page_title_wrapper_callback',
	) ) );

	/* End Page Breadcrumb Title */

	/* Hide Page Title Wrapper */

    $wp_customize->add_setting( 'tz_hide_page_titlewrapper', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_page_titlewrapper', array(
		'label'       		=> esc_attr__( 'Hide Page Title Wrapper', 'paperio' ),
		'section'     		=> 'tz_add_page_layout_panel',
		'settings'			=> 'tz_hide_page_titlewrapper',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Page Title Wrapper */

	/* Hide Breadcrumb Navigation */

    $wp_customize->add_setting( 'tz_hide_page_breadcrumb_navigation', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_page_breadcrumb_navigation', array(
		'label'       		=> esc_attr__( 'Hide Breadcrumb Navigation', 'paperio' ),
		'section'     		=> 'tz_add_page_layout_panel',
		'settings'			=> 'tz_hide_page_breadcrumb_navigation',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Breadcrumb Navigation */

	/* Hide Breadcrumb Title */

    $wp_customize->add_setting( 'tz_hide_page_breadcrumb_title', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_page_breadcrumb_title', array(
		'label'       		=> esc_attr__( 'Hide Breadcrumb Page Title', 'paperio' ),
		'section'     		=> 'tz_add_page_layout_panel',
		'settings'			=> 'tz_hide_page_breadcrumb_title',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_page_breadcrumb_navigation_callback',
	) ) );

	/* End Hide Breadcrumb Title */

	/* Hide Comment */

	$wp_customize->add_setting( 'tz_hide_page_comment', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_page_comment', array(
		'label'       		=> esc_attr__( 'Hide Comment', 'paperio' ),
		'section'     		=> 'tz_add_page_layout_panel',
		'settings'			=> 'tz_hide_page_comment',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'description'       => esc_html__( '( if page comment is off in WordPress then it cannot be switched on here. )', 'paperio' ),
	) ) );

	/* End Hide Comment */

	/* Color Separator Setting */

	$wp_customize->add_setting( 'tz_page_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_page_separator', array(
	    'label'      		=> esc_attr__( 'Font & Color Setting', 'paperio' ),
	    'section'    		=> 'tz_add_page_layout_panel',
	    'settings'   		=> 'tz_page_separator',
	    'description'		=> '<p>' . sprintf( __( 'For Title wrapper color setting <a href="%s">Click here</a>.', 'paperio' ), "javascript:wp.customize.section( 'tz_add_title_color_section' ).focus();" ) . '</p><p>' . sprintf( __( 'For Breadcrumb color setting <a href="%s">Click here</a>.', 'paperio' ), "javascript:wp.customize.section( 'tz_add_breadcrumb_color_section' ).focus();" ) . '</p><p>' . sprintf( __( 'For Content Font Size and Color setting <a href="%s">Click here</a>.', 'paperio' ), "javascript:wp.customize.section( 'tz_add_content_color_section' ).focus();" ) . '</p>',
	) ) );

	/* End Color Separator Setting */

	/* Custom Callback Functions */

	if ( ! function_exists( 'paperio_page_left_sidebar_layout_callback' ) ) :
		function paperio_page_left_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_page_layout_setting' )->value() == 'paperio_layout_left_sidebar' || $control->manager->get_setting( 'tz_page_layout_setting' )->value() == 'paperio_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_page_right_sidebar_layout_callback' ) ) :
		function paperio_page_right_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_page_layout_setting' )->value() == 'paperio_layout_right_sidebar' || $control->manager->get_setting( 'tz_page_layout_setting' )->value() == 'paperio_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Custom Callback Functions */

	/*
	 * Post layout setting panel.
	 */

	/* General Layout For Post */

	$wp_customize->add_setting( 'tz_single_post_layout_setting', array(
		'default' 			=> 'paperio_layout_full_screen_12col',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Preview_Image_Control( $wp_customize, 'tz_single_post_layout_setting', array(
		'label'       		=> esc_attr__( 'Sidebar Settings', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_single_post_layout_setting',
		'type'              => 'radio',
		'choices'           => array(
									'paperio_layout_full_screen_12col' => esc_html__( 'One Column', 'paperio' ),
								  	'paperio_layout_left_sidebar'      => esc_html__( 'Two Columns Left', 'paperio' ),
								  	'paperio_layout_right_sidebar'     => esc_html__( 'Two Columns Right', 'paperio' ),
								  	'paperio_layout_both_sidebar' 	   => esc_html__( 'Three Columns', 'paperio' ),
								   ),
		'tz_img'			=> array(
									PAPERIO_THEME_IMAGES_URI . '/1col.png',
								  	PAPERIO_THEME_IMAGES_URI . '/2cl.png',
								  	PAPERIO_THEME_IMAGES_URI . '/2cr.png',
								  	PAPERIO_THEME_IMAGES_URI . '/3cm.png',
							   ),	
	) ) );

	/* End General Layout For Post */

	/* Post Left Sidebar */

	$wp_customize->add_setting( 'tz_single_post_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_single_post_left_sidebar', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_single_post_left_sidebar',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_post_left_sidebar_layout_callback',
	) ) );

	/* End Post Left Sidebar */

	/* Post Right Sidebar */
	
	$wp_customize->add_setting( 'tz_single_post_right_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_single_post_right_sidebar', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_single_post_right_sidebar',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_post_right_sidebar_layout_callback',
	) ) );

	/* End Post Right Sidebar */

	/* Post Container Setting */

	$wp_customize->add_setting( 'tz_single_post_container_fluid', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_single_post_container_fluid', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_single_post_container_fluid',
		'type'              => 'select',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),		
	) ) );

	/* End Post Container Setting */

	/* Featured Image Size */

    $wp_customize->add_setting( 'tz_single_post_feature_image_size', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_single_post_feature_image_size', array(
		'label'       		=> esc_attr__( 'Featured Image Size', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_single_post_feature_image_size',
		'type'              => 'select',
		'choices'           => paperio_feature_image_size(),
	) ) );

	/* End Featured Image Size */

	/* Hide Category */

    $wp_customize->add_setting( 'tz_hide_category', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_category', array(
		'label'       		=> esc_attr__( 'Hide Category', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_category',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Category */
   
	/* Hide Date */

    $wp_customize->add_setting( 'tz_hide_date', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_date', array(
		'label'       		=> esc_attr__( 'Hide Date', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_date',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Date */

	/* Post Date */

	$wp_customize->add_setting( 'tz_post_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_post_date_format', array(
		'label'       		=> esc_attr__( 'Date Format', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_post_date_format',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'paperio' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'paperio_post_date_callback',
	) ) );

	/* End Post Date */

	/* Hide Author */

    $wp_customize->add_setting( 'tz_hide_author', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_author', array(
		'label'       		=> esc_attr__( 'Hide Author', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_author',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Author */

	/* Hide Post Title Wrapper */

    $wp_customize->add_setting( 'tz_hide_post_titlewrapper', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_post_titlewrapper', array(
		'label'       		=> esc_attr__( 'Hide Post Title Wrapper', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_post_titlewrapper',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Post Title Wrapper */

	/* Hide Breadcrumb Navigation */

    $wp_customize->add_setting( 'tz_hide_breadcrumb_navigation', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_breadcrumb_navigation', array(
		'label'       		=> esc_attr__( 'Hide Breadcrumb Navigation', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_breadcrumb_navigation',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Breadcrumb Navigation */

	/* Hide Breadcrumb Title */

    $wp_customize->add_setting( 'tz_hide_breadcrumb_title', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_breadcrumb_title', array(
		'label'       		=> esc_attr__( 'Hide Breadcrumb Post Title', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_breadcrumb_title',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_breadcrumb_navigation_callback',
	) ) );

	/* End Hide Breadcrumb Title */

	/* Hide Tags */

    $wp_customize->add_setting( 'tz_hide_tags', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_tags', array(
		'label'       		=> esc_attr__( 'Hide Tags', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_tags',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Tags */

    /* Hide Comment Link */

	$wp_customize->add_setting( 'tz_hide_comment_link', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_comment_link', array(
		'label'       		=> esc_attr__( 'Hide Comment Link', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_comment_link',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Comment Link */

	/* Hide Like */

	$wp_customize->add_setting( 'tz_hide_like', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_like', array(
		'label'       		=> esc_attr__( 'Hide Like', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_like',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Like */

	/* Hide Share */

	$wp_customize->add_setting( 'tz_hide_share', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_share', array(
		'label'       		=> esc_attr__( 'Hide Share', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_share',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Share */

	/* Hide Post Author Box */

	$wp_customize->add_setting( 'tz_hide_post_author_box', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_post_author_box', array(
		'label'       		=> esc_attr__( 'Hide Post Author Box', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_post_author_box',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Post Author Box */

	/* Hide Related Posts */

	$wp_customize->add_setting( 'tz_hide_related_posts', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_related_posts', array(
		'label'       		=> esc_attr__( 'Hide Related Posts', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_related_posts',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Related Posts */

    /* Related Post Block Title */

    $wp_customize->add_setting( 'tz_related_posts_title', array(
		'default' 			=> 'You May Also Like',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_related_posts_title', array(
		'label'       		=> esc_attr__( 'Related Post Title', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_related_posts_title',
		'type'              => 'text',
		'active_callback'   => 'paperio_related_posts_callback',
	) ) );

	/* End Related Post Block Title */

	/* Featured Image Size */

    $wp_customize->add_setting( 'tz_related_posts_feature_image_size', array(
		'default' 			=> 'medium_large',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_related_posts_feature_image_size', array(
		'label'       		=> esc_attr__( 'Featured Image Size', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_related_posts_feature_image_size',
		'type'              => 'select',
		'choices'           => paperio_feature_image_size(),
		'active_callback'   => 'paperio_related_posts_callback',
	) ) );

	/* End Featured Image Size */

	/*  No. of Columns  */

	$wp_customize->add_setting( 'tz_no_of_related_posts', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_no_of_related_posts', array(
		'label'       		=> esc_attr__( 'No. of Related Posts', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_no_of_related_posts',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							    '5' => '5',
							    '6' => '6',
							 	),
		'active_callback'   => 'paperio_related_posts_callback',
	) ) );

	/* End No. of Columns */

	/* Full Post Title */

	$wp_customize->add_setting( 'tz_show_full_title_in_related_posts', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_show_full_title_in_related_posts', array(
		'label'       		=> esc_attr__( 'Related Post Full Title', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_show_full_title_in_related_posts',
		'type'              => 'radio',
		'active_callback'   => 'paperio_related_posts_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Full Post Title */

	/* Hide Post Format Icon */

    $wp_customize->add_setting( 'tz_hide_related_posts_post_format', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_related_posts_post_format', array(
		'label'       		=> esc_attr__( 'Hide Post Format Icon', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_related_posts_post_format',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_general_blog_post_format_callback',
	) ) );

	/* End Hide Post Format Icon */

	/* Hide Related Block Date */

    $wp_customize->add_setting( 'tz_related_posts_hide_date', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_related_posts_hide_date', array(
		'label'       		=> esc_attr__( 'Hide Related Post Date', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_related_posts_hide_date',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_related_posts_callback',
	) ) );

	/* End Hide Related Block Date */

	/* Related Post Block Date */

    $wp_customize->add_setting( 'tz_related_posts_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_related_posts_date_format', array(
		'label'       		=> esc_attr__( 'Related Post Date Format', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_related_posts_date_format',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'paperio' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'paperio_related_posts_date_callback',
	) ) );

	/* End Related Post Block Date */

	/* Hide Comment */

	$wp_customize->add_setting( 'tz_hide_comment', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_comment', array(
		'label'       		=> esc_attr__( 'Hide Comment', 'paperio' ),
		'section'     		=> 'tz_add_post_layout_panel',
		'settings'			=> 'tz_hide_comment',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Comment */

	/* Color Separator Setting */

	$wp_customize->add_setting( 'tz_post_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_post_separator', array(
	    'label'      		=> esc_attr__( 'Font & Color Setting', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'   		=> 'tz_post_separator',
	    'description'		=> '<p>' . sprintf( __( 'For Title wrapper color setting <a href="%s">Click here</a>.', 'paperio' ), "javascript:wp.customize.section( 'tz_add_title_color_section' ).focus();" ) . '</p><p>' . sprintf( __( 'For Breadcrumb color setting <a href="%s">Click here</a>.', 'paperio' ), "javascript:wp.customize.section( 'tz_add_breadcrumb_color_section' ).focus();" ) . '</p><p>' . sprintf( __( 'For Content Font Size and Color setting <a href="%s">Click here</a>.', 'paperio' ), "javascript:wp.customize.section( 'tz_add_content_color_section' ).focus();" ) . '</p>',
	) ) );

	/* End Color Separator Setting */

	/* Title font size setting */

	$wp_customize->add_setting( 'tz_post_tag_comment_like_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_post_tag_comment_like_font_size', array(
	    'label'      		=> esc_attr__( 'Tag, Comment, Like Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_tag_comment_like_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Title font size setting */

	/* Title line height setting */

	$wp_customize->add_setting( 'tz_post_tag_comment_like_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_post_tag_comment_like_line_height', array(
	    'label'      		=> esc_attr__( 'Tag, Comment, Like Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_tag_comment_like_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Title line height setting */

	/* Title character spacing setting */

	$wp_customize->add_setting( 'tz_post_tag_comment_like_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_post_tag_comment_like_character_spacing', array(
	    'label'      		=> esc_attr__( 'Tag, Comment, Like Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_tag_comment_like_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Title character spacing setting */

	/* Title Text Color Setting */

	$wp_customize->add_setting( 'tz_post_tag_comment_like_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_post_tag_comment_like_color', array(
	    'label'      		=> esc_attr__( 'Tag, Comment, Like Color', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_tag_comment_like_color',
	) ) );

	/* End Title Text Color Setting */

	/* Title Text Hover Color Setting */

	$wp_customize->add_setting( 'tz_post_tag_comment_like_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_post_tag_comment_like_hover_color', array(
	    'label'      		=> esc_attr__( 'Tag, Comment, Like Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_tag_comment_like_hover_color',
	) ) );

	/* End Title Text Hover Color Setting */

	/* Tag, Comment, Like Border Color Setting */

	$wp_customize->add_setting( 'tz_post_tag_comment_like_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_post_tag_comment_like_border_color', array(
	    'label'      		=> esc_attr__( 'Tag, Comment, Like Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_tag_comment_like_border_color',
	) ) );

	/* End Tag, Comment, Like Border Color Setting */


	/*
	 * Author Box
	 */

	/* Author Box Background Color Setting */

	$wp_customize->add_setting( 'tz_post_author_box_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_post_author_box_bg_color', array(
	    'label'      		=> esc_attr__( 'Author Box Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_author_box_bg_color',
	) ) );

	/* End Author Box Background Color Setting */

	/* Author Box Title font size setting */

	$wp_customize->add_setting( 'tz_post_author_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_post_author_title_font_size', array(
	    'label'      		=> esc_attr__( 'Author Box Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_author_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Author Box Title font size setting */

	/* Author Box Title line height setting */

	$wp_customize->add_setting( 'tz_post_author_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_post_author_title_line_height', array(
	    'label'      		=> esc_attr__( 'Author Box Title Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_author_title_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Author Box Title line height setting */

	/* Author Box Title character spacing setting */

	$wp_customize->add_setting( 'tz_post_author_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_post_author_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Author Box Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_author_title_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Author Box Title character spacing setting */

	/* Author Box Title Text Color Setting */

	$wp_customize->add_setting( 'tz_post_author_title_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_post_author_title_text_color', array(
	    'label'      		=> esc_attr__( 'Author Box Title Color', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_author_title_text_color',
	) ) );

	/* End Author Box Title Text Color Setting */

	/* Author Box Title Text Hover Color Setting */

	$wp_customize->add_setting( 'tz_post_author_title_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_post_author_title_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Author Box Title Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_author_title_text_hover_color',
	) ) );

	/* End Author Box Title Text Hover Color Setting */

	/* Author Box Social Icon size setting */

	$wp_customize->add_setting( 'tz_post_author_social_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_post_author_social_font_size', array(
	    'label'      		=> esc_attr__( 'Author Box Social Icon Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_author_social_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Author Box Social Icon size setting */

	/* Author Box Social Icon size setting */

	$wp_customize->add_setting( 'tz_post_author_social_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_post_author_social_line_height', array(
	    'label'      		=> esc_attr__( 'Author Box Social Icon Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_author_social_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Author Box Social Icon size setting */

	/* Author Box Social Icon size setting */

	$wp_customize->add_setting( 'tz_post_author_social_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_post_author_social_character_spacing', array(
	    'label'      		=> esc_attr__( 'Author Box Social Icon Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_post_layout_panel',
	    'settings'	 		=> 'tz_post_author_social_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add character spacing like 1px.', 'paperio' ),
	) );

	/* End Author Box Social Icon size setting */

	/* Custom Callback Functions */

	if ( ! function_exists( 'paperio_post_left_sidebar_layout_callback' ) ) :
		function paperio_post_left_sidebar_layout_callback( $control ) {
	      	if ( $control->manager->get_setting( 'tz_single_post_layout_setting' )->value() == 'paperio_layout_left_sidebar' || $control->manager->get_setting( 'tz_single_post_layout_setting' )->value() == 'paperio_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'paperio_post_right_sidebar_layout_callback' ) ) :
		function paperio_post_right_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_single_post_layout_setting' )->value() == 'paperio_layout_right_sidebar' || $control->manager->get_setting( 'tz_single_post_layout_setting' )->value() == 'paperio_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'paperio_post_date_callback' ) ) :
	   	function paperio_post_date_callback( $control )	{
	        if ( $control->manager->get_setting( 'tz_hide_date' )->value() == 0 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_related_posts_callback' ) ) :
	   	function paperio_related_posts_callback( $control )	{
	        if ( $control->manager->get_setting( 'tz_hide_related_posts' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_related_posts_date_callback' ) ) :
	   	function paperio_related_posts_date_callback( $control )	{
	        if( $control->manager->get_setting( 'tz_hide_related_posts' )->value() != 1 ) {
		    	return true;
		    }else {
		    	return false;
		    }
		}
	endif;

	/* End Custom Callback Functions */

	/*
	 * Category layout setting panel.
	 */

	/* Category Type */

    $wp_customize->add_setting( 'tz_general_category_type', array(
		'default' 			=> 'grid',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_category_type', array(
		'label'       		=> esc_attr__( 'Category Type', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_general_category_type',
		'type'              => 'radio',
		'choices'           => array(
									'grid'		=> esc_html__( 'Grid', 'paperio' ),
								    'masonry' 	=> esc_html__( 'Masonry', 'paperio' ),
								    'list'		=> esc_html__( 'List', 'paperio' ),
								   ),
	) ) );

	/* End Category Type */

	/* Category Column Type */

    $wp_customize->add_setting( 'tz_general_category_column_type', array(
		'default' 			=> 'two-columns',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_category_column_type', array(
		'label'       		=> esc_attr__( 'Column Type', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_general_category_column_type',
		'type'              => 'radio',
		'choices'           =>array(
									'two-columns'		=> esc_html__( '2 Columns', 'paperio' ),
								    'three-columns' 	=> esc_html__( '3 Columns', 'paperio' ),
								    'four-columns'		=> esc_html__( '4 Columns', 'paperio' ),
								   ),
		'active_callback'   => 'paperio_category_type_callback',
	) ) );

	/* End Category Column Type */

	/* Featured Image Size */

    $wp_customize->add_setting( 'tz_general_category_feature_image_size', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_category_feature_image_size', array(
		'label'       		=> esc_attr__( 'Featured Image Size', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_general_category_feature_image_size',
		'type'              => 'select',
		'choices'           => paperio_feature_image_size(),
	) ) );

	/* End Featured Image Size */

	/* Category Sidebar Setting */

	$wp_customize->add_setting( 'tz_layout_settings_single_category', array(
		'default' 			=> 'paperio_layout_full_screen_12col',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Preview_Image_Control( $wp_customize, 'tz_layout_settings_single_category', array(
		'label'       		=> esc_attr__( 'Sidebar Settings', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_layout_settings_single_category',
		'type'              => 'radio',
		'choices'           => array(
									'paperio_layout_full_screen_12col' => esc_html__( 'One Column', 'paperio' ),
								  	'paperio_layout_left_sidebar'      => esc_html__( 'Two Columns Left', 'paperio' ),
								  	'paperio_layout_right_sidebar'     => esc_html__( 'Two Columns Right', 'paperio' ),
								  	'paperio_layout_both_sidebar' 	   => esc_html__( 'Three Columns', 'paperio' ),
								   ),
		'tz_img'			=> array(
									PAPERIO_THEME_IMAGES_URI . '/1col.png',
								  	PAPERIO_THEME_IMAGES_URI . '/2cl.png',
								  	PAPERIO_THEME_IMAGES_URI . '/2cr.png',
								  	PAPERIO_THEME_IMAGES_URI . '/3cm.png',
							   ),	
	) ) );

	/* End Category Sidebar Setting */

	/* Category Left Sidebar */

	$wp_customize->add_setting( 'tz_layout_left_sidebar_single_category', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_layout_left_sidebar_single_category', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_layout_left_sidebar_single_category',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_category_left_sidebar_layout_callback',
	) ) );

	/* End Category Left Sidebar */

	/* Category Right Sidebar */
	
	$wp_customize->add_setting( 'tz_layout_right_sidebar_single_category', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_layout_right_sidebar_single_category', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_layout_right_sidebar_single_category',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_category_right_sidebar_layout_callback',
	) ) );

	/* End Category Right Sidebar */

	/* Category Container Setting */

	$wp_customize->add_setting( 'tz_enable_container_fluid_single_category', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_enable_container_fluid_single_category', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_enable_container_fluid_single_category',
		'type'              => 'select',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),
	) ) );

	/* End Category Container Setting */

	/* Category Breadcrumb Title */

    $wp_customize->add_setting( 'tz_category_breadcrumb_title', array(
		'default' 			=> 'Browsing Category',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_category_breadcrumb_title', array(
		'label'       		=> esc_attr__( 'Category Breadcrumb Title', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_category_breadcrumb_title',
		'type'              => 'text',
		'active_callback'   => 'paperio_hide_category_title_wrapper_callback',
	) ) );

    /* End Category Breadcrumb Title */

    /* Hide Category Title Wrapper */

    $wp_customize->add_setting( 'tz_hide_category_titlewrapper', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_category_titlewrapper', array(
		'label'       		=> esc_attr__( 'Hide Category Title Wrapper', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_hide_category_titlewrapper',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Category Title Wrapper */

	/* Hide Breadcrumb Navigation */

    $wp_customize->add_setting( 'tz_hide_category_breadcrumb_navigation', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_category_breadcrumb_navigation', array(
		'label'       		=> esc_attr__( 'Hide Breadcrumb Navigation', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_hide_category_breadcrumb_navigation',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Breadcrumb Navigation */

	/* Hide Category */

    $wp_customize->add_setting( 'tz_hide_post_category', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_post_category', array(
		'label'       		=> esc_attr__( 'Hide Category', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_hide_post_category',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Category */
   
	/* Hide Date */

    $wp_customize->add_setting( 'tz_hide_post_date', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_post_date', array(
		'label'       		=> esc_attr__( 'Hide Date', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_hide_post_date',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Date */

	/* Post Date */

	$wp_customize->add_setting( 'tz_category_post_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_category_post_date_format', array(
		'label'       		=> esc_attr__( 'Date Format', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_category_post_date_format',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'paperio' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'paperio_category_post_date_callback',
	) ) );

	/* End Post Date */

	/* Category Hide Post Excerpt */

    $wp_customize->add_setting( 'tz_hide_post_excerpt', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_post_excerpt', array(
		'label'       		=> esc_attr__( 'Hide Excerpt', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_hide_post_excerpt',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

    /* End Category Hide Post Excerpt */

	/* Category Post Excerpt Length */

    $wp_customize->add_setting( 'tz_post_excerpt_length', array(
		'default' 			=> '34',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_post_excerpt_length', array(
		'label'       		=> esc_attr__( 'Excerpt Length', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_post_excerpt_length',
		'type'              => 'text',
		'active_callback'   => 'paperio_hide_excerpt_callback',
	) ) );

	/* End Category Post Excerpt Length */

	/* Category Hide Read More Button */

    $wp_customize->add_setting( 'tz_hide_category_read_more_button', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_category_read_more_button', array(
		'label'       		=> esc_attr__( 'Hide Button', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_hide_category_read_more_button',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Category Hide Read More Button */

	/* Category Button Text */

    $wp_customize->add_setting( 'tz_default_button_text', array(
		'default' 			=> 'Read More',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_default_button_text', array(
		'label'       		=> esc_attr__( 'Button Text ', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_default_button_text',
		'type'              => 'text',
		'active_callback'   => 'paperio_category_hide_button_callback',
	) ) );

    /* End Category Button Text */

    /* Category Hide Read More Button Arrow */

    $wp_customize->add_setting( 'tz_hide_category_read_more_button_arrow', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_category_read_more_button_arrow', array(
		'label'       		=> esc_attr__( 'Hide Button Arrow', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_hide_category_read_more_button_arrow',
		'type'              => 'radio',
		'active_callback'   => 'paperio_category_hide_button_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Category Hide Read More Button Arrow */

	/* Category Hide Comment Link */

    $wp_customize->add_setting( 'tz_hide_post_comment_link', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_post_comment_link', array(
		'label'       		=> esc_attr__( 'Hide Comment Link', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_hide_post_comment_link',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Category Hide Comment Link */

	/* Hide Like */

	$wp_customize->add_setting( 'tz_hide_category_post_like', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_category_post_like', array(
		'label'       		=> esc_attr__( 'Hide Like', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_hide_category_post_like',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Like */

	/* Category Hide Post Format */

    $wp_customize->add_setting( 'tz_hide_category_post_format', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_category_post_format', array(
		'label'       		=> esc_attr__( 'Hide Post Format', 'paperio' ),
		'section'     		=> 'tz_add_category_layout_panel',
		'settings'			=> 'tz_hide_category_post_format',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Category Hide Post Format */

	/* Separator setting */

	$wp_customize->add_setting( 'tz_category_layout_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_category_layout_separator', array(
	    'label'      		=> esc_attr__( 'Font & Color Settings', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'   		=> 'tz_category_layout_separator',
	    'description'		=> '<p>' . sprintf( __( 'For Title wrapper color setting <a href="%s">Click here</a>.', 'paperio' ), "javascript:wp.customize.section( 'tz_add_title_color_section' ).focus();" ) . '</p><p>' . sprintf( __( 'For Breadcrumb color setting <a href="%s">Click here</a>.', 'paperio' ), "javascript:wp.customize.section( 'tz_add_breadcrumb_color_section' ).focus();" ) . '</p>',
	) ) );

	/* End Separator setting */

	/* Title font size Setting */

	$wp_customize->add_setting( 'tz_category_layout_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_category_layout_title_font_size', array(
	    'label'      		=> esc_attr__( 'Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Title font size Setting */

	/* Title line height Setting */

	$wp_customize->add_setting( 'tz_category_layout_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_category_layout_title_line_height', array(
	    'label'      		=> esc_attr__( 'Title Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_title_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Title line height Setting */

	/* Title character spacing Setting */

	$wp_customize->add_setting( 'tz_category_layout_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_category_layout_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_title_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Title character spacing Setting */

	/* Title Color Setting */

	$wp_customize->add_setting( 'tz_category_layout_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_layout_title_color', array(
	    'label'      		=> esc_attr__( 'Title Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_title_color',
	) ) );

	/* End Title Color Setting */

	/* Title Hover Color Setting */

	$wp_customize->add_setting( 'tz_category_layout_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_layout_title_hover_color', array(
	    'label'      		=> esc_attr__( 'Title Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_title_hover_color',
	) ) );

	/* End Title Hover Color Setting */

	/* Meta font size Setting */

	$wp_customize->add_setting( 'tz_category_layout_meta_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_category_layout_meta_font_size', array(
	    'label'      		=> esc_attr__( 'Meta Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_meta_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Meta font size Setting */

	/* Meta line height Setting */

	$wp_customize->add_setting( 'tz_category_layout_meta_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_category_layout_meta_line_height', array(
	    'label'      		=> esc_attr__( 'Meta Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_meta_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Meta line height Setting */

	/* Meta character spacing Setting */

	$wp_customize->add_setting( 'tz_category_layout_meta_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_category_layout_meta_character_spacing', array(
	    'label'      		=> esc_attr__( 'Meta Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_meta_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Meta character spacing Setting */

	/* Meta Color Setting */

	$wp_customize->add_setting( 'tz_category_layout_meta_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_layout_meta_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_meta_color',
	) ) );

	/* End Meta Color Setting */

	/* Meta Hover Color Setting */

	$wp_customize->add_setting( 'tz_category_layout_meta_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_layout_meta_hover_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_meta_hover_color',
	) ) );

	/* End Meta Hover Color Setting */

	/* Comment & Like font size Setting */

	$wp_customize->add_setting( 'tz_category_layout_comment_and_like_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_category_layout_comment_and_like_font_size', array(
	    'label'      		=> esc_attr__( 'Comment & Like Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_comment_and_like_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Comment & Like font size Setting */

	/* Comment & Like line height Setting */

	$wp_customize->add_setting( 'tz_category_layout_comment_and_like_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_category_layout_comment_and_like_line_height', array(
	    'label'      		=> esc_attr__( 'Comment & Like Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_comment_and_like_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Comment & Like line height Setting */

	/* Comment & Like character spacing Setting */

	$wp_customize->add_setting( 'tz_category_layout_comment_and_like_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_category_layout_comment_and_like_character_spacing', array(
	    'label'      		=> esc_attr__( 'Comment & Like Character spacing', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_comment_and_like_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Comment & Like character spacing Setting */

	/* Comment & Like Color Setting */

	$wp_customize->add_setting( 'tz_category_layout_comment_and_like_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_layout_comment_and_like_color', array(
	    'label'      		=> esc_attr__( 'Comment & Like Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_comment_and_like_color',
	) ) );

	/* End Comment & Like Color Setting */

	/* Comment & Like Hover Color Setting */

	$wp_customize->add_setting( 'tz_category_layout_comment_and_like_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_layout_comment_and_like_hover_color', array(
	    'label'      		=> esc_attr__( 'Comment & Like Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_layout_comment_and_like_hover_color',
	) ) );

	/* End Comment & Like Hover Color Setting */

	/* Read more Button font size Setting */

	$wp_customize->add_setting( 'tz_general_category_readmore_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_category_readmore_button_font_size', array(
	    'label'      		=> esc_attr__( 'Button Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_general_category_readmore_button_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_category_hide_button_callback',
	) );

	/* End Read more Button font size Setting */

	/* Read more Button line height Setting */

	$wp_customize->add_setting( 'tz_general_category_readmore_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_category_readmore_button_line_height', array(
	    'label'      		=> esc_attr__( 'Button Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_general_category_readmore_button_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_category_hide_button_callback',
	) );

	/* End Read more Button line height Setting */

	/* Read more Button character Spacing Setting */

	$wp_customize->add_setting( 'tz_general_category_readmore_button_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_category_readmore_button_character_spacing', array(
	    'label'      		=> esc_attr__( 'Button Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_general_category_readmore_button_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	    'active_callback'   => 'paperio_category_hide_button_callback',
	) );

	/* End  Read more Button character Spacing Setting */

	/* Read more Button Color */

	$wp_customize->add_setting( 'tz_category_readmore_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_readmore_button_color', array(
	    'label'      		=> esc_attr__( 'Button Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_readmore_button_color',
	    'active_callback'   => 'paperio_category_hide_button_callback',
	) ) );

	/* End Read more Button Color */

	/* Read more Button Hover Color */

	$wp_customize->add_setting( 'tz_category_readmore_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_readmore_button_hover_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_readmore_button_hover_color',
	    'active_callback'   => 'paperio_category_hide_button_callback',
	) ) );

	/* End Read more Button Hover Color  */

	/* Read more Button Border Color */

	$wp_customize->add_setting( 'tz_category_readmore_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_readmore_button_border_color', array(
	    'label'      		=> esc_attr__( 'Button Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_readmore_button_border_color',
	    'active_callback'   => 'paperio_category_hide_button_callback',
	) ) );

	/* End Read more Button Border Color */

	/* Read more Button Border Hover Color */

	$wp_customize->add_setting( 'tz_category_readmore_button_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_readmore_button_border_hover_color', array(
	    'label'      		=> esc_attr__( 'Button Border Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_readmore_button_border_hover_color',
	    'active_callback'   => 'paperio_category_hide_button_callback',
	) ) );

	/* End Read more Button Border Hover Color  */

	/* Read more Button Background Color */

	$wp_customize->add_setting( 'tz_category_readmore_button_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_readmore_button_background_color', array(
	    'label'      		=> esc_attr__( 'Button Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_readmore_button_background_color',
	    'active_callback'   => 'paperio_category_hide_button_callback',
	) ) );

	/* End Read more Button Background Color */

	/* Read more Button Hover Background Color*/

	$wp_customize->add_setting( 'tz_category_readmore_button_hover_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_category_readmore_button_hover_background_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_category_layout_panel',
	    'settings'	 		=> 'tz_category_readmore_button_hover_background_color',
	    'active_callback'   => 'paperio_category_hide_button_callback',
	) ) );

	/* End Read more Button Hover Background Color */

	/* Custom Callback Functions */

    if ( ! function_exists( 'paperio_category_type_callback' ) ) :
		function paperio_category_type_callback ( $control ) {
			if ( $control->manager->get_setting( 'tz_general_category_type' )->value() != 'list' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_category_left_sidebar_layout_callback' ) ) :
		function paperio_category_left_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_layout_settings_single_category' )->value() == 'paperio_layout_left_sidebar' || $control->manager->get_setting( 'tz_layout_settings_single_category' )->value() == 'paperio_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_category_right_sidebar_layout_callback' ) ) :
		function paperio_category_right_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_layout_settings_single_category' )->value() == 'paperio_layout_right_sidebar' || $control->manager->get_setting( 'tz_layout_settings_single_category' )->value() == 'paperio_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_category_post_date_callback' ) ) :
		function paperio_category_post_date_callback ( $control ){
			if ( $control->manager->get_setting( 'tz_hide_post_date' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_category_hide_button_callback' ) ) :
		function paperio_category_hide_button_callback ( $control ){
			if ( $control->manager->get_setting( 'tz_hide_category_read_more_button' )->value() == false ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_hide_excerpt_callback' ) ) :
		function paperio_hide_excerpt_callback ( $control ){
			if ( $control->manager->get_setting( 'tz_hide_post_excerpt' )->value() == false ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Custom Callback Functions */
	
	/*
	 * Archive layout setting panel.
	 */

	/* Archive Type */

    $wp_customize->add_setting( 'tz_general_archive_type', array(
		'default' 			=> 'grid',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_archive_type', array(
		'label'       		=> esc_attr__( 'Archive Type', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_general_archive_type',
		'type'              => 'radio',
		'choices'           => array(
									'grid'		=> esc_html__( 'Grid', 'paperio' ),
								    'masonry' 	=> esc_html__( 'Masonry', 'paperio' ),
								    'list'		=> esc_html__( 'List', 'paperio' ),
								   ),
	) ) );

	/* End Archive Type */

	/* Archive Column Type */

    $wp_customize->add_setting( 'tz_general_archive_column_type', array(
		'default' 			=> 'two-columns',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_archive_column_type', array(
		'label'       		=> esc_attr__( 'Column Type', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_general_archive_column_type',
		'type'              => 'radio',
		'choices'           => array(
									'two-columns'		=> esc_html__( '2 Columns', 'paperio' ),
								    'three-columns' 	=> esc_html__( '3 Columns', 'paperio' ),
								    'four-columns'		=> esc_html__( '4 Columns', 'paperio' ),
								   ),
		'active_callback'   => 'paperio_archive_type_callback',
	) ) );

	/* End Archive Column Type */

	/* Featured Image Size */

    $wp_customize->add_setting( 'tz_general_archive_feature_image_size', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_archive_feature_image_size', array(
		'label'       		=> esc_attr__( 'Featured Image Size', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_general_archive_feature_image_size',
		'type'              => 'select',
		'choices'           => paperio_feature_image_size(),
	) ) );

	/* End Featured Image Size */

	/* Archive Sidebar Setting */

	$wp_customize->add_setting( 'tz_layout_settings_single_archive', array(
		'default' 			=> 'paperio_layout_full_screen_12col',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Preview_Image_Control( $wp_customize, 'tz_layout_settings_single_archive', array(
		'label'       		=> esc_attr__( 'Sidebar Settings', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_layout_settings_single_archive',
		'type'              => 'radio',
		'choices'           => array(
									'paperio_layout_full_screen_12col' => esc_html__( 'One Column', 'paperio' ),
								  	'paperio_layout_left_sidebar'      => esc_html__( 'Two Columns Left', 'paperio' ),
								  	'paperio_layout_right_sidebar'     => esc_html__( 'Two Columns Right', 'paperio' ),
								  	'paperio_layout_both_sidebar' 	   => esc_html__( 'Three Columns', 'paperio' ),
								   ),		
		'tz_img'			=> array(
									PAPERIO_THEME_IMAGES_URI . '/1col.png',
								  	PAPERIO_THEME_IMAGES_URI . '/2cl.png',
								  	PAPERIO_THEME_IMAGES_URI . '/2cr.png',
								  	PAPERIO_THEME_IMAGES_URI . '/3cm.png',
							   		),
	) ) );

	/* End Archive Sidebar Setting */

	/* Archive Left Sidebar */

	$wp_customize->add_setting( 'tz_layout_left_sidebar_single_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_layout_left_sidebar_single_archive', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_layout_left_sidebar_single_archive',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_archive_left_sidebar_layout_callback',
	) ) );

	/* End Archive Left Sidebar */

	/* Archive Right Sidebar */
	
	$wp_customize->add_setting( 'tz_layout_right_sidebar_single_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_layout_right_sidebar_single_archive', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_layout_right_sidebar_single_archive',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_archive_right_sidebar_layout_callback',
	) ) );

	/* End Archive Right Sidebar */

	/* Archive Container Setting */

	$wp_customize->add_setting( 'tz_enable_container_fluid_single_archive', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_enable_container_fluid_single_archive', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_enable_container_fluid_single_archive',
		'type'              => 'select',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),		
	) ) );

	/* End Archive Container Setting */
    
    /* Tag Title */

    $wp_customize->add_setting( 'tz_tag_breadcrumb_title', array(
		'default' 			=> 'Browsing Tags',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_tag_breadcrumb_title', array(
		'label'       		=> esc_attr__( 'Tag Breadcrumb Title', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_tag_breadcrumb_title',
		'type'              => 'text',
		'active_callback'   => 'paperio_hide_archive_title_wrapper_callback',
	) ) );

	/* End Tag Title */

	/* Author Title */

    $wp_customize->add_setting( 'tz_author_breadcrumb_title', array(
		'default' 			=> 'All Posts By',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_author_breadcrumb_title', array(
		'label'       		=> esc_attr__( 'Author Breadcrumb Title', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_author_breadcrumb_title',
		'type'              => 'text',
		'active_callback'   => 'paperio_hide_archive_title_wrapper_callback',
	) ) );

    /* End Author Title */

	/* Date Title */

    $wp_customize->add_setting( 'tz_date_breadcrumb_title', array(
		'default' 			=> 'Archive For',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_date_breadcrumb_title', array(
		'label'       		=> esc_attr__( 'Date Breadcrumb Title', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_date_breadcrumb_title',
		'type'              => 'text',
		'active_callback'   => 'paperio_hide_archive_title_wrapper_callback',
	) ) );

	/* End Date Title */

	/* Search Title */

    $wp_customize->add_setting( 'tz_search_breadcrumb_title', array(
		'default' 			=> 'Search Results',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_search_breadcrumb_title', array(
		'label'       		=> esc_attr__( 'Search Breadcrumb Title', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_search_breadcrumb_title',
		'type'              => 'text',
		'active_callback'   => 'paperio_hide_archive_title_wrapper_callback',
	) ) );

    /* End Search Title */

    /* Hide Archive Title Wrapper */

    $wp_customize->add_setting( 'tz_hide_archive_titlewrapper', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_archive_titlewrapper', array(
		'label'       		=> esc_attr__( 'Hide Archive Title Wrapper', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_hide_archive_titlewrapper',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Archive Title Wrapper */

	/* Archive Hide Breadcrumb Navigation */

    $wp_customize->add_setting( 'tz_archive_hide_breadcrumb_navigation', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_archive_hide_breadcrumb_navigation', array(
		'label'       		=> esc_attr__( 'Hide Breadcrumb Navigation', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_archive_hide_breadcrumb_navigation',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

    /* End Archive Hide Breadcrumb Navigation */

    /* Archive Hide Post Category */

    $wp_customize->add_setting( 'tz_archive_hide_post_category', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_archive_hide_post_category', array(
		'label'       		=> esc_attr__( 'Hide Post Category', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_archive_hide_post_category',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

    /* End Archive Hide Post Category */

    /* Archive Hide Post Date */

    $wp_customize->add_setting( 'tz_archive_hide_post_date', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_archive_hide_post_date', array(
		'label'       		=> esc_attr__( 'Hide Date', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_archive_hide_post_date',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

    /* End Archive Hide Post Category */

    /* Archive Post Date Format */

	$wp_customize->add_setting( 'tz_archive_post_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_archive_post_date_format', array(
		'label'       		=> esc_attr__( 'Date Format', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_archive_post_date_format',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'paperio' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'paperio_archive_post_date_callback',
	) ) );

	/* End Archive Post Date Format */

	/* Archive Hide Post Excerpt */

    $wp_customize->add_setting( 'tz_archive_hide_post_excerpt', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_archive_hide_post_excerpt', array(
		'label'       		=> esc_attr__( 'Hide Excerpt', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_archive_hide_post_excerpt',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Archive Hide Post Excerpt */

	/* Archive Post Excerpt Length */

    $wp_customize->add_setting( 'tz_archive_post_excerpt_length', array(
		'default' 			=> '34',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_archive_post_excerpt_length', array(
		'label'       		=> esc_attr__( 'Excerpt Length', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_archive_post_excerpt_length',
		'type'              => 'text',
		'active_callback'   => 'paperio_archive_hide_excerpt_callback',
	) ) );

	/* End Archive Post Excerpt Length */

	/* Archive Hide Read More Button */

    $wp_customize->add_setting( 'tz_archive_hide_read_more_button', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_archive_hide_read_more_button', array(
		'label'       		=> esc_attr__( 'Hide Button', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_archive_hide_read_more_button',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Archive Hide Read More Button */

	/* Archive Button Text */

    $wp_customize->add_setting( 'tz_archive_default_button_text', array(
		'default' 			=> 'Read More',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_archive_default_button_text', array(
		'label'       		=> esc_attr__( 'Button Text', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_archive_default_button_text',
		'type'              => 'text',
		'active_callback'   => 'paperio_archive_hide_button_callback',
	) ) );

    /* End Archive Button Text */

    /* Archive Hide Read More Button Arrow */

    $wp_customize->add_setting( 'tz_hide_archive_read_more_button_arrow', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_archive_read_more_button_arrow', array(
		'label'       		=> esc_attr__( 'Hide Button Arrow', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_hide_archive_read_more_button_arrow',
		'type'              => 'radio',
		'active_callback'   => 'paperio_archive_hide_button_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Archive Hide Read More Button Arrow */

	/* Archive Hide Comment Link */

    $wp_customize->add_setting( 'tz_archive_hide_post_comment_link', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_archive_hide_post_comment_link', array(
		'label'       		=> esc_attr__( 'Hide Comment Link', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_archive_hide_post_comment_link',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Archive Hide Comment Link */

	/* Hide Like */

	$wp_customize->add_setting( 'tz_hide_archive_post_like', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_archive_post_like', array(
		'label'       		=> esc_attr__( 'Hide Like', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_hide_archive_post_like',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Like */

	/* Archive Hide Post Format */

    $wp_customize->add_setting( 'tz_hide_archive_post_format', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_archive_post_format', array(
		'label'       		=> esc_attr__( 'Hide Post Format', 'paperio' ),
		'section'     		=> 'tz_add_archive_layout_panel',
		'settings'			=> 'tz_hide_archive_post_format',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Archive Hide Post Format */

	/* Separator setting */

	$wp_customize->add_setting( 'tz_archive_layout_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_archive_layout_separator', array(
	    'label'      		=> esc_attr__( 'Font & Color Settings', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'   		=> 'tz_archive_layout_separator',
	    'description'		=> '<p>' . sprintf( __( 'For Title wrapper color setting <a href="%s">Click here</a>.', 'paperio' ), "javascript:wp.customize.section( 'tz_add_title_color_section' ).focus();" ) . '</p><p>' . sprintf( __( 'For Breadcrumb color setting <a href="%s">Click here</a>.', 'paperio' ), "javascript:wp.customize.section( 'tz_add_breadcrumb_color_section' ).focus();" ) . '</p>',
	) ) );

	/* End Separator setting */

	/* Title font size Setting */

	$wp_customize->add_setting( 'tz_archive_layout_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_archive_layout_title_font_size', array(
	    'label'      		=> esc_attr__( 'Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Title font size Setting */

	/* Title line height Setting */

	$wp_customize->add_setting( 'tz_archive_layout_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_archive_layout_title_line_height', array(
	    'label'      		=> esc_attr__( 'Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_title_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Title line height Setting */

	/* Title character spacing Setting */

	$wp_customize->add_setting( 'tz_archive_layout_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_archive_layout_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_title_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Title character spacing Setting */

	/* Title Color Setting */

	$wp_customize->add_setting( 'tz_archive_layout_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_layout_title_color', array(
	    'label'      		=> esc_attr__( 'Title Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_title_color',
	) ) );

	/* End Title Color Setting */

	/* Title Hover Color Setting */

	$wp_customize->add_setting( 'tz_archive_layout_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_layout_title_hover_color', array(
	    'label'      		=> esc_attr__( 'Title Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_title_hover_color',
	) ) );

	/* End Title Hover Color Setting */

	/* Meta font size Setting */

	$wp_customize->add_setting( 'tz_archive_layout_meta_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_archive_layout_meta_font_size', array(
	    'label'      		=> esc_attr__( 'Meta Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_meta_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Meta font size Setting */

	/* Meta line height Setting */

	$wp_customize->add_setting( 'tz_archive_layout_meta_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_archive_layout_meta_line_height', array(
	    'label'      		=> esc_attr__( 'Meta Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_meta_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Meta line height Setting */

	/* Meta character spacing Setting */

	$wp_customize->add_setting( 'tz_archive_layout_meta_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_archive_layout_meta_character_spacing', array(
	    'label'      		=> esc_attr__( 'Meta Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_meta_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Meta character spacing Setting */

	/* Meta Color Setting */

	$wp_customize->add_setting( 'tz_archive_layout_meta_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_layout_meta_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_meta_color',
	) ) );

	/* End Meta Color Setting */

	/* Meta Hover Color Setting */

	$wp_customize->add_setting( 'tz_archive_layout_meta_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_layout_meta_hover_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_meta_hover_color',
	) ) );

	/* End Meta Hover Color Setting */

	/* Comment & Like font size Setting */

	$wp_customize->add_setting( 'tz_archive_layout_comment_and_like_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_archive_layout_comment_and_like_font_size', array(
	    'label'      		=> esc_attr__( 'Comment & Like Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_comment_and_like_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Comment & Like font size Setting */

	/* Comment & Like line height Setting */

	$wp_customize->add_setting( 'tz_archive_layout_comment_and_like_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_archive_layout_comment_and_like_line_height', array(
	    'label'      		=> esc_attr__( 'Comment & Like Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_comment_and_like_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Comment & Like line height Setting */

	/* Comment & Like character spacing Setting */

	$wp_customize->add_setting( 'tz_archive_layout_comment_and_like_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_archive_layout_comment_and_like_character_spacing', array(
	    'label'      		=> esc_attr__( 'Comment & Like Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_comment_and_like_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Comment & Like character spacing Setting */

	/* Comment & Like Color Setting */

	$wp_customize->add_setting( 'tz_archive_layout_comment_and_like_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_layout_comment_and_like_color', array(
	    'label'      		=> esc_attr__( 'Comment & Like Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_comment_and_like_color',
	) ) );

	/* End Comment & Like Color Setting */

	/* Comment & Like Hover Color Setting */

	$wp_customize->add_setting( 'tz_archive_layout_comment_and_like_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_layout_comment_and_like_hover_color', array(
	    'label'      		=> esc_attr__( 'Comment & Like Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_layout_comment_and_like_hover_color',
	) ) );

	/* End Comment & Like Hover Color Setting */

	/* Read more Button font size Setting */

	$wp_customize->add_setting( 'tz_general_archive_readmore_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_archive_readmore_button_font_size', array(
	    'label'      		=> esc_attr__( 'Button Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_general_archive_readmore_button_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_archive_hide_button_callback',
	) );

	/* End Read more Button font size Setting */

	/* Read more Button line height Setting */

	$wp_customize->add_setting( 'tz_general_archive_readmore_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_archive_readmore_button_line_height', array(
	    'label'      		=> esc_attr__( 'Button Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_general_archive_readmore_button_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_archive_hide_button_callback',
	) );

	/* End Read more Button line height Setting */

	/* Read more Button character Spacing Setting */

	$wp_customize->add_setting( 'tz_general_archive_readmore_button_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_archive_readmore_button_character_spacing', array(
	    'label'      		=> esc_attr__( 'Button Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_general_archive_readmore_button_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	    'active_callback'   => 'paperio_archive_hide_button_callback',
	) );

	/* End  Read more Button character Spacing Setting */

	/* Read more Button Color */

	$wp_customize->add_setting( 'tz_archive_readmore_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_readmore_button_color', array(
	    'label'      		=> esc_attr__( 'Button Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_readmore_button_color',
	    'active_callback'   => 'paperio_archive_hide_button_callback',
	) ) );

	/* End Read more Button Color */

	/* Read more Button Hover Color */

	$wp_customize->add_setting( 'tz_archive_readmore_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_readmore_button_hover_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_readmore_button_hover_color',
	    'active_callback'   => 'paperio_archive_hide_button_callback',
	) ) );

	/* End Read more Button Hover Color  */
	
	/* Read more Button Border Color */

	$wp_customize->add_setting( 'tz_archive_readmore_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_readmore_button_border_color', array(
	    'label'      		=> esc_attr__( 'Button Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_readmore_button_border_color',
	    'active_callback'   => 'paperio_archive_hide_button_callback',
	) ) );

	/* End Read more Button Border Color */

	/* Read more Button Border Hover Color */

	$wp_customize->add_setting( 'tz_archive_readmore_button_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_readmore_button_border_hover_color', array(
	    'label'      		=> esc_attr__( 'Button Border Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_readmore_button_border_hover_color',
	    'active_callback'   => 'paperio_archive_hide_button_callback',
	) ) );

	/* End Read more Button Border Hover Color  */

	/* Read more Button Background Color */

	$wp_customize->add_setting( 'tz_archive_readmore_button_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_readmore_button_background_color', array(
	    'label'      		=> esc_attr__( 'Button Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_readmore_button_background_color',
	    'active_callback'   => 'paperio_archive_hide_button_callback',
	) ) );

	/* End Read more Button Background Color */

	/* Read more Button Hover Background Color*/

	$wp_customize->add_setting( 'tz_archive_readmore_button_hover_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_archive_readmore_button_hover_background_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_archive_layout_panel',
	    'settings'	 		=> 'tz_archive_readmore_button_hover_background_color',
	    'active_callback'   => 'paperio_archive_hide_button_callback',
	) ) );

	/* End Read more Button Hover Background Color */

	/* Custom Callback Functions */

    if ( ! function_exists( 'paperio_archive_type_callback' ) ) :
		function paperio_archive_type_callback ( $control ) {
			if ( $control->manager->get_setting( 'tz_general_archive_type' )->value() != 'list' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_archive_left_sidebar_layout_callback' ) ) :
		function paperio_archive_left_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_layout_settings_single_archive' )->value() == 'paperio_layout_left_sidebar' || $control->manager->get_setting( 'tz_layout_settings_single_archive' )->value() == 'paperio_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_archive_right_sidebar_layout_callback' ) ) :
		function paperio_archive_right_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_layout_settings_single_archive' )->value() == 'paperio_layout_right_sidebar' || $control->manager->get_setting( 'tz_layout_settings_single_archive' )->value() == 'paperio_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_archive_post_date_callback' ) ) :
		function paperio_archive_post_date_callback ( $control ){
			if ( $control->manager->get_setting( 'tz_archive_hide_post_date' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_archive_hide_button_callback' ) ) :
		function paperio_archive_hide_button_callback ( $control ){
			if ( $control->manager->get_setting( 'tz_archive_hide_read_more_button' )->value() == false ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_archive_hide_excerpt_callback' ) ) :
		function paperio_archive_hide_excerpt_callback ( $control ){
			if ( $control->manager->get_setting( 'tz_archive_hide_post_excerpt' )->value() == false ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_hide_page_title_wrapper_callback' ) ) :
		function paperio_hide_page_title_wrapper_callback ( $control ){
			if ( $control->manager->get_setting( 'tz_hide_page_titlewrapper' )->value() == false ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_hide_category_title_wrapper_callback' ) ) :
		function paperio_hide_category_title_wrapper_callback ( $control ){
			if ( $control->manager->get_setting( 'tz_hide_category_titlewrapper' )->value() == false ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_hide_archive_title_wrapper_callback' ) ) :
		function paperio_hide_archive_title_wrapper_callback ( $control ){
			if ( $control->manager->get_setting( 'tz_hide_archive_titlewrapper' )->value() == false ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	if ( ! function_exists( 'paperio_hide_breadcrumb_navigation_callback' ) ) :
		function paperio_hide_breadcrumb_navigation_callback ( $control ){
			if ( $control->manager->get_setting( 'tz_hide_breadcrumb_navigation' )->value() == false ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	if ( ! function_exists( 'paperio_hide_page_breadcrumb_navigation_callback' ) ) :
		function paperio_hide_page_breadcrumb_navigation_callback ( $control ){
			if ( $control->manager->get_setting( 'tz_hide_page_breadcrumb_navigation' )->value() == false ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* Custom Callback Functions */