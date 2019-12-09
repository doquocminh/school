<?php

	/* Exit if accessed directly. */
	if ( !defined( 'ABSPATH' ) ) { exit; }
	
	/* Get All Register Sidebar List. */
	$sidebar_array = paperio_register_sidebar_customizer_array();

	/* Hide Block Button */

    $wp_customize->add_setting( 'tz_hide_blog', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog', array(
		'label'       		=> esc_attr__( 'Hide Blog List', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Block Button */

	/* Blog Layout */

    $wp_customize->add_setting( 'tz_general_blog_layout', array(
		'default' 			=> 'blog-layout-two',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_blog_layout', array(
		'label'       		=> esc_attr__( 'Blog Layout', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_general_blog_layout',
		'type'              => 'radio',
		'choices'           => array(
									'blog-layout-one'   => esc_html__( 'Blog Layout1', 'paperio' ),
								    'blog-layout-two' 	=> esc_html__( 'Blog Layout2', 'paperio' ),
								    'blog-layout-three' => esc_html__( 'Blog Layout3', 'paperio' ),
								    'blog-layout-four'  => esc_html__( 'Blog Layout4', 'paperio' ),
								    'blog-layout-five'  => esc_html__( 'Blog Layout5', 'paperio' ),
								    'blog-layout-six'	=> esc_html__( 'Blog Layout6', 'paperio' ),
								    'blog-layout-seven' => esc_html__( 'Blog Layout7', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_callback',
	) ) );
   
  	/* End Blog Layout */

  	/* Blog Layout Four Column Type */

    $wp_customize->add_setting( 'tz_general_blog_layout_column_type_four', array(
		'default' 			=> 'blog-grid-two-column',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_blog_layout_column_type_four', array(
		'label'       		=> esc_attr__( 'Column Type', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_general_blog_layout_column_type_four',
		'type'              => 'radio',
		'choices'           => array(
									'blog-grid-two-column'		=> esc_html__( '2 Columns', 'paperio' ),
								    'blog-grid-three-column' 	=> esc_html__( '3 Columns', 'paperio' ),
								    'blog-grid-four-column'		=> esc_html__( '4 Columns', 'paperio' ),
								   ),
		'active_callback'   => 'paperio_general_blog_column_type_four_callback',
	) ) );

	/* End Blog Layout Four Column Type */


  	/* Blog Layout Five Column Type */

    $wp_customize->add_setting( 'tz_general_blog_layout_column_type_five', array(
		'default' 			=> 'blog-grid-two-column',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_blog_layout_column_type_five', array(
		'label'       		=> esc_attr__( 'Column Type', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_general_blog_layout_column_type_five',
		'type'              => 'radio',
		'choices'           => array(
									'blog-grid-two-column'		=> esc_html__( '2 Columns', 'paperio' ),
								    'blog-grid-three-column' 	=> esc_html__( '3 Columns', 'paperio' ),
								    'blog-grid-four-column'		=> esc_html__( '4 Columns', 'paperio' ),
								   ),
		'active_callback'   => 'paperio_general_blog_column_type_five_callback',
	) ) );

	/* End Blog Layout Five Column Type */

	/* Hide First Big Post */

    $wp_customize->add_setting( 'tz_exclude_first_big_post', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_exclude_first_big_post', array(
		'label'       		=> esc_attr__( 'Exclude First Big Post', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_exclude_first_big_post',
		'type'              => 'radio',
		'choices'           => array(
										'1' => esc_html__( 'Yes', 'paperio' ),
									  	'0' => esc_html__( 'No', 'paperio' ),
							    	),
		'active_callback'   => 'paperio_general_blog_column_type_five_callback',
	) ) );

	/* End Hide First Big Post */

	/* Category Column Type */

    $wp_customize->add_setting( 'tz_general_blog_layout_column_type', array(
		'default' 			=> 'blog-masonry-three-column',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_blog_layout_column_type', array(
		'label'       		=> esc_attr__( 'Column Type', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_general_blog_layout_column_type',
		'type'              => 'radio',
		'choices'           => array(
									'blog-masonry-two-column'		=> esc_html__( '2 Columns', 'paperio' ),
								    'blog-masonry-three-column' 	=> esc_html__( '3 Columns', 'paperio' ),
								    'blog-masonry-four-column'		=> esc_html__( '4 Columns', 'paperio' ),
								   ),
		'active_callback'   => 'paperio_general_blog_column_type_callback',
	) ) );

	/* End Category Column Type */

	/* Featured Image Size */

    $wp_customize->add_setting( 'tz_general_blog_layout_feature_image', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_blog_layout_feature_image', array(
		'label'       		=> esc_attr__( 'Featured Image Size', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_general_blog_layout_feature_image',
		'type'              => 'select',
		'choices'           => paperio_feature_image_size(),
		'active_callback'   => 'paperio_hide_blog_callback',
	) ) );

	/* End Featured Image Size */

	/* Main Page Layout */

	$wp_customize->add_setting( 'tz_home_layout', array(
		'default' 			=> 'paperio_home_full_screen_12col',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Preview_Image_Control( $wp_customize, 'tz_home_layout', array(
		'label'       		=> esc_attr__( 'Sidebar Settings', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_home_layout',
		'type'              => 'radio',
		'choices'           => array(
									'paperio_home_full_screen_12col' => esc_html__('One Column', 'paperio'),
								  	'paperio_home_left_sidebar'      => esc_html__('Two Columns Left', 'paperio'),
								  	'paperio_home_right_sidebar'     => esc_html__('Two Columns Right', 'paperio'),
							   ),
		'tz_img'			=> array(
									PAPERIO_THEME_IMAGES_URI . '/1col.png',
								  	PAPERIO_THEME_IMAGES_URI . '/2cl.png',
								  	PAPERIO_THEME_IMAGES_URI . '/2cr.png',
							   ),
	) ) );

	/* End Main Page Layout */

	/* Page Left Sidebar */

	$wp_customize->add_setting( 'tz_home_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_home_left_sidebar', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_home_left_sidebar',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_home_left_sidebar_layout_callback',
	) ) );

	/* End Page Left Sidebar */

	/* Page Right Sidebar */
	
	$wp_customize->add_setting( 'tz_home_right_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_home_right_sidebar', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_home_right_sidebar',
		'type'              => 'select',
		'choices'           => $sidebar_array,
		'active_callback'   => 'paperio_home_right_sidebar_layout_callback',
	) ) );

	/* End Page Right Sidebar */

	/* Select Container Style */

	$wp_customize->add_setting( 'tz_home_enable_container_fluid', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_home_enable_container_fluid', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_home_enable_container_fluid',
		'type'              => 'select',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_callback',		
	) ) );

	/* End Select Container Style */

	/* Hide Featured Area Posts */

    $wp_customize->add_setting( 'tz_exclude_feature_area_posts', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_exclude_feature_area_posts', array(
		'label'       		=> esc_attr__( 'Exclude Featured Area Posts', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_exclude_feature_area_posts',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_callback',
	) ) );

	/* End Hide Featured Area Posts */

	/* Hide Latest Posts */

    $wp_customize->add_setting( 'tz_exclude_latest_posts', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_exclude_latest_posts', array(
		'label'       		=> esc_attr__( 'Exclude Latest / Popular Block Posts', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_exclude_latest_posts',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_callback',
	) ) );

	/* End Hide Latest Posts */
	
  	/* Hide Category */

    $wp_customize->add_setting( 'tz_hide_blog_category', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog_category', array(
		'label'       		=> esc_attr__( 'Hide Category', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog_category',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_callback',
	) ) );

	/* End Hide Category */

	/* Hide Author */

    $wp_customize->add_setting( 'tz_hide_blog_author', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog_author', array(
		'label'       		=> esc_attr__( 'Hide Author', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog_author',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_post_author_callback',
	) ) );

	/* End Hide Author */

	/* Hide Date */

    $wp_customize->add_setting( 'tz_hide_blog_date', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog_date', array(
		'label'       		=> esc_attr__( 'Hide Date', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog_date',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_callback',
	) ) );

	/* Hide Date */

  	/* Date Format */

	$wp_customize->add_setting('tz_general_blog_big_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_blog_big_date_format', array(
		'label'       		=> esc_attr__( 'Day Date Format', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_general_blog_big_date_format',
		'type'		        => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'paperio' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'paperio_hide_blog_date_style1',
	) ));

	/* End Date Format */

  	/* Date Format */

	$wp_customize->add_setting('tz_general_blog_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_blog_date_format', array(
		'label'       		=> esc_attr__( 'Date Format', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_general_blog_date_format',
		'type'		        => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'paperio' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'paperio_hide_blog_date',
	) ));

	/* End Date Format */

	/* Hide First Post Excerpt */

    $wp_customize->add_setting( 'tz_hide_blog_first_post_excerpt', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog_first_post_excerpt', array(
		'label'       		=> esc_attr__( 'Hide First Post Excerpt', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog_first_post_excerpt',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_first_post_excerpt_callback',
	) ) );

    /* End Hide Post Excerpt */

	/* Post Excerpt Length */

    $wp_customize->add_setting( 'tz_blog_first_post_excerpt_length', array(
		'default' 			=> '82',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_blog_first_post_excerpt_length', array(
		'label'       		=> esc_attr__( 'First Post Excerpt Length', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_blog_first_post_excerpt_length',
		'type'              => 'text',
		'active_callback'   => 'paperio_hide_blog_first_post_excerpt_length_callback',
	) ) );

	/* End Post Excerpt Length */

	/* Hide Post Excerpt */

    $wp_customize->add_setting( 'tz_hide_blog_post_excerpt', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog_post_excerpt', array(
		'label'       		=> esc_attr__( 'Hide Excerpt', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog_post_excerpt',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_excerpt_callback',
	) ) );

    /* End Hide Post Excerpt */

	/* Post Excerpt Length */

    $wp_customize->add_setting( 'tz_blog_post_excerpt_length', array(
		'default' 			=> '34',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_blog_post_excerpt_length', array(
		'label'       		=> esc_attr__( 'Excerpt Length', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_blog_post_excerpt_length',
		'type'              => 'text',
		'active_callback'   => 'paperio_hide_blog_excerpt_length_callback',
	) ) );

	/* End Post Excerpt Length */

	/* Hide Comment Link */

    $wp_customize->add_setting( 'tz_hide_blog_comment_link', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog_comment_link', array(
		'label'       		=> esc_attr__( 'Hide Comment Link', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog_comment_link',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_comment_read_more_callback',
	) ) );

	/* End Hide Comment Link */

	/* Hide Like Button */

    $wp_customize->add_setting( 'tz_hide_blog_like', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog_like', array(
		'label'       		=> esc_attr__( 'Hide Like', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog_like',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_post_like_callback',
	) ) );

	/* End Hide Like Button */

	/* Hide Read More Button */

    $wp_customize->add_setting( 'tz_hide_blog_read_more', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog_read_more', array(
		'label'       		=> esc_attr__( 'Hide Button', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog_read_more',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_comment_read_more_callback',
	) ) );

	/* End Hide Read More Button */

	/* Read More Button Text */

	$wp_customize->add_setting('tz_general_blog_button_text', array(
		'default' 			=> 'Read More',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_blog_button_text', array(
		'label'       		=> esc_attr__( 'Button Text', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_general_blog_button_text',
		'type'		        => 'text',
		'active_callback'   => 'paperio_hide_blog_read_more',
	) ));

	/* End Read More Button Text */

	/* Read More Button Hide Button Arrow */

	$wp_customize->add_setting('tz_general_blog_button_arrow', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );
	 $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_general_blog_button_arrow', array(
		'label'       		=> esc_attr__( 'Hide Button Arrow', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_general_blog_button_arrow',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_blog_read_more_arrow',
	) ) );

	/* End Read More Button Hide Button Arrow */

	/* Hide Post Format Icon */

    $wp_customize->add_setting( 'tz_hide_blog_post_format', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog_post_format', array(
		'label'       		=> esc_attr__( 'Hide Post Format Icon', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog_post_format',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_general_blog_post_format_callback',
	) ) );

	/* End Hide Post Format Icon */

	/* Hide Post Format Icon */

    $wp_customize->add_setting( 'tz_hide_blog_post_quotes_icon', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog_post_quotes_icon', array(
		'label'       		=> esc_attr__( 'Hide Post Quote Icon', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog_post_quotes_icon',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_general_blog_quote_icon_callback',
	) ) );

	/* End Hide Post Format Icon */

	/* Hide Bottom Separator Line  */

    $wp_customize->add_setting( 'tz_hide_blog_post_bottom_separator_line', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_blog_post_bottom_separator_line', array(
		'label'       		=> esc_attr__( 'Hide Post Bottom Separator Line', 'paperio' ),
		'section'     		=> 'tz_add_general_blog_section',
		'settings'			=> 'tz_hide_blog_post_bottom_separator_line',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_general_blog_bottom_separator_line_callback',
	) ) );

	/* End Hide Bottom Separator Line  */

	/* Separator setting */

	$wp_customize->add_setting( 'tz_general_blog_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_general_blog_separator', array(
	    'label'      		=> esc_attr__( 'Font & Color Settings', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'   		=> 'tz_general_blog_separator',
	    'active_callback'   => 'paperio_hide_blog_callback',
	) ) );

	/* End Separator setting */

	/* Box Background Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_box_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_box_color', array(
	    'label'      		=> esc_attr__( 'Box Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_box_color',
	    'active_callback'   => 'paperio_general_blog_box_background_callback',
	) ) );

	/* End Box Background Color Setting */

	/* Box Border Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_box_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_box_border_color', array(
	    'label'      		=> esc_attr__( 'Box Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_box_border_color',
	    'active_callback'   => 'paperio_general_blog_box_border_callback',
	) ) );

	/* End Box Border Color Setting */

	/* Box Border Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_content_color', array(
	    'label'      		=> esc_attr__( 'Content Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_content_color',
	    'active_callback'   => 'paperio_general_blog_box_border_callback',
	) ) );

	/* End Box Border Color Setting */

	/* Title font size Setting */

	$wp_customize->add_setting( 'tz_general_blog_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_title_font_size', array(
	    'label'      		=> esc_attr__( 'Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_blog_callback',
	) );

	/* End Title font size Setting */

	/* Title line height Setting */

	$wp_customize->add_setting( 'tz_general_blog_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_title_line_height', array(
	    'label'      		=> esc_attr__( 'Title Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_title_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_blog_callback',
	) );

	/* End Title line height Setting */

	/* Title character spacing Setting */

	$wp_customize->add_setting( 'tz_general_blog_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_title_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_blog_callback',
	) );

	/* End Title character spacing Setting */

	/* Title Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_title_color', array(
	    'label'      		=> esc_attr__( 'Title Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_title_color',
	    'active_callback'   => 'paperio_hide_blog_callback',
	) ) );

	/* End Title Color Setting */

	/* Title Hover Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_title_hover_color', array(
	    'label'      		=> esc_attr__( 'Title Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_title_hover_color',
	    'active_callback'   => 'paperio_hide_blog_callback',
	) ) );

	/* End Title Hover Color Setting */

	/* Meta font size Setting */

	$wp_customize->add_setting( 'tz_general_blog_meta_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_meta_font_size', array(
	    'label'      		=> esc_attr__( 'Meta Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_meta_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_blog_callback',
	) );

	/* End Meta font size Setting */

	/* Meta line height Setting */

	$wp_customize->add_setting( 'tz_general_blog_meta_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_meta_line_height', array(
	    'label'      		=> esc_attr__( 'Meta Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_meta_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_blog_callback',
	) );

	/* End Meta line height Setting */

	/* Meta character spacing Setting */

	$wp_customize->add_setting( 'tz_general_blog_meta_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_meta_character_spacing', array(
	    'label'      		=> esc_attr__( 'Meta Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_meta_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_blog_callback',
	) );

	/* End Meta character spacing Setting */

	/* Meta Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_meta_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_meta_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_meta_color',
	    'active_callback'   => 'paperio_hide_blog_callback',
	) ) );

	/* End Meta Color Setting */

	/* Meta Hover Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_meta_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_meta_hover_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_meta_hover_color',
	    'active_callback'   => 'paperio_hide_blog_callback',
	) ) );

	/* End Meta Hover Color Setting */

	/* Comment & Like font size Setting */

	$wp_customize->add_setting( 'tz_general_blog_comment_and_like_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_comment_and_like_font_size', array(
	    'label'      		=> esc_attr__( 'Comment & Like Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_comment_and_like_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_general_blog_comment_and_like_callback',
	) );

	/* End Comment & Like font size Setting */

	/* Comment & Like line height Setting */

	$wp_customize->add_setting( 'tz_general_blog_comment_and_like_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_comment_and_like_line_height', array(
	    'label'      		=> esc_attr__( 'Comment & Like Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_comment_and_like_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_general_blog_comment_and_like_callback',
	) );

	/* End Comment & Like line height Setting */

	/* Comment & Like character Spacing Setting */

	$wp_customize->add_setting( 'tz_general_blog_comment_and_like_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_comment_and_like_character_spacing', array(
	    'label'      		=> esc_attr__( 'Comment & Like Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_comment_and_like_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	    'active_callback'   => 'paperio_general_blog_comment_and_like_callback',
	) );

	/* End  Comment & Like character Spacing Setting */

	/* Comment & Like Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_comment_and_like_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_comment_and_like_color', array(
	    'label'      		=> esc_attr__( 'Comment & Like Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_comment_and_like_color',
	    'active_callback'   => 'paperio_general_blog_comment_and_like_callback',
	) ) );

	/* End Comment & Like Color Setting */

	/* Comment & Like Hover Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_comment_and_like_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_comment_and_like_hover_color', array(
	    'label'      		=> esc_attr__( 'Comment & Like Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_comment_and_like_hover_color',
	    'active_callback'   => 'paperio_general_blog_comment_and_like_callback',
	) ) );

	/* End Comment & Like Hover Color Setting */

	/* Border Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_border_color', array(
	    'label'      		=> esc_attr__( 'Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_border_color',
	    'active_callback'   => 'paperio_general_blog_border_callback',
	) ) );

	/* End Border Color Setting */

	/* Border Hover Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_border_hover_color', array(
	    'label'      		=> esc_attr__( 'Border Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_border_hover_color',
	    'active_callback'   => 'paperio_general_blog_border_callback',
	) ) );

	/* End Border Hover Color Setting */

	/* Separator Line Color Setting */

	$wp_customize->add_setting( 'tz_general_blog_separator_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_blog_separator_color', array(
	    'label'      		=> esc_attr__( 'Separator Line Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_separator_color',
	    'active_callback'   => 'paperio_general_blog_separator_color_callback',
	) ) );

	/* End Separator Line Color Setting */

	/* Read more Button font size Setting */

	$wp_customize->add_setting( 'tz_general_blog_readmore_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_readmore_button_font_size', array(
	    'label'      		=> esc_attr__( 'Button Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_readmore_button_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_blog_read_more_arrow',
	) );

	/* End Read more Button font size Setting */

	/* Read more Button line height Setting */

	$wp_customize->add_setting( 'tz_general_blog_readmore_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_readmore_button_line_height', array(
	    'label'      		=> esc_attr__( 'Button Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_readmore_button_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_blog_read_more_arrow',
	) );

	/* End Read more Button line height Setting */

	/* Read more Button character Spacing Setting */

	$wp_customize->add_setting( 'tz_general_blog_readmore_button_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_blog_readmore_button_character_spacing', array(
	    'label'      		=> esc_attr__( 'Button Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_general_blog_readmore_button_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_blog_read_more_arrow',
	) );

	/* End  Read more Button character Spacing Setting */

	/* Read more Button Color */

	$wp_customize->add_setting( 'tz_readmore_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_readmore_button_color', array(
	    'label'      		=> esc_attr__( 'Button Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_readmore_button_color',
	    'active_callback'   => 'paperio_hide_blog_read_more_arrow',
	) ) );

	/* End Read more Button Color */

	/* Read more Button Hover Color */

	$wp_customize->add_setting( 'tz_readmore_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_readmore_button_hover_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_readmore_button_hover_color',
	    'active_callback'   => 'paperio_hide_blog_read_more_arrow',
	) ) );

	/* End Read more Button Hover Color  */

	/* Read more Button Border Color */

	$wp_customize->add_setting( 'tz_readmore_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_readmore_button_border_color', array(
	    'label'      		=> esc_attr__( 'Button Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_readmore_button_border_color',
	    'active_callback'   => 'paperio_hide_blog_read_more_arrow',
	) ) );

	/* End Read more Button Border Color */

	/* Read more Button Border Hover Color */

	$wp_customize->add_setting( 'tz_readmore_button_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_readmore_button_border_hover_color', array(
	    'label'      		=> esc_attr__( 'Button Border Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_readmore_button_border_hover_color',
	    'active_callback'   => 'paperio_hide_blog_read_more_arrow',
	) ) );

	/* End Read more Button Border Hover Color  */

	/* Read more Button Background Color */

	$wp_customize->add_setting( 'tz_readmore_button_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_readmore_button_background_color', array(
	    'label'      		=> esc_attr__( 'Button Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_readmore_button_background_color',
	    'active_callback'   => 'paperio_hide_blog_read_more_arrow',
	) ) );

	/* End Read more Button Background Color */

	/* Read more Button Hover Background Color*/

	$wp_customize->add_setting( 'tz_readmore_button_hover_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_readmore_button_hover_background_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_blog_section',
	    'settings'	 		=> 'tz_readmore_button_hover_background_color',
	    'active_callback'   => 'paperio_hide_blog_read_more_arrow',
	) ) );

	/* End Read more Button Hover Background Color */

	/* Custom Callback Functions */

	if ( !function_exists('paperio_hide_blog_callback') ) :
		function paperio_hide_blog_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_general_blog_column_type_callback' ) ) :
		function paperio_general_blog_column_type_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-six' && $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	
	if ( ! function_exists( 'paperio_general_blog_column_type_four_callback' ) ) :
		function paperio_general_blog_column_type_four_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-four' && $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_general_blog_column_type_five_callback' ) ) :
		function paperio_general_blog_column_type_five_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five' && $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_hide_blog_post_author_callback' ) ) :
		function paperio_hide_blog_post_author_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-two' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-three' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-four' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five' && $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_hide_blog_post_like_callback' ) ) :
		function paperio_hide_blog_post_like_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-one' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-two' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-three' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-six') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_hide_blog_date_style1' ) ) :
		function paperio_hide_blog_date_style1( $control ) {
			if ( $control->manager->get_setting( 'tz_hide_blog_date' )->value() != 1 && $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-one' && $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_hide_blog_date' ) ) :
		function paperio_hide_blog_date( $control ) {
	        if ( $control->manager->get_setting( 'tz_hide_blog_date' )->value() != 1 && $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_home_left_sidebar_layout_callback' ) ) :
		function paperio_home_left_sidebar_layout_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_home_layout' )->value() == 'paperio_home_left_sidebar') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_home_right_sidebar_layout_callback' ) ) :
		function paperio_home_right_sidebar_layout_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_home_layout' )->value() == 'paperio_home_right_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if( ! function_exists( 'paperio_hide_blog_first_post_excerpt_callback' ) ) :
		function paperio_hide_blog_first_post_excerpt_callback( $control ){
			if( $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five' && $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 ){
				return true;
			} else {
				return false;
			}
		}
	endif;

	if( ! function_exists( 'paperio_hide_blog_first_post_excerpt_length_callback' ) ) :
		function paperio_hide_blog_first_post_excerpt_length_callback( $control ){
			if( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_hide_blog_first_post_excerpt' )->value() == 0 && $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five'){
				return true;
			} else {
				return false;
			}
		}
	endif;

	if( ! function_exists( 'paperio_hide_blog_excerpt_callback' ) ) :
		function paperio_hide_blog_excerpt_callback( $control ){
			if( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-one' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-two' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-three' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-six'){
				return true;
			} else {
				return false;
			}
		}
	endif;

	if( ! function_exists( 'paperio_hide_blog_excerpt_length_callback' ) ) :
		function paperio_hide_blog_excerpt_length_callback( $control ){
			if( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_hide_blog_post_excerpt' )->value() == 0 && ( $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-one' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-two' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-three' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-six' )){
				return true;
			} else {
				return false;
			}
		}
	endif;

	if( ! function_exists( 'paperio_hide_blog_comment_read_more_callback' ) ) :
		function paperio_hide_blog_comment_read_more_callback( $control ){
			if( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-one' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-two' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-three' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-six'){
				return true;
			} else {
				return false;
			}
		}
	endif;

	if ( ! function_exists( 'paperio_hide_blog_read_more' ) ) :
		function paperio_hide_blog_read_more( $control ){
			if ( $control->manager->get_setting( 'tz_hide_blog_read_more' )->value() != 1 && ( $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-one' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-two' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-three' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-six' ) && $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	
	if ( ! function_exists( 'paperio_hide_blog_read_more_arrow' ) ) :
		function paperio_hide_blog_read_more_arrow( $control ){
			if ( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_hide_blog_read_more' )->value() != 1 && ( $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-one' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-two' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-six' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five') ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* For Blog Post Format */
	if ( ! function_exists( 'paperio_general_blog_post_format_callback' ) ) :
		function paperio_general_blog_post_format_callback( $control ){
			if ( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-one' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-two' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-three' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-six') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* For Post Quote Icon */
	if ( ! function_exists( 'paperio_general_blog_quote_icon_callback' ) ) :
		function paperio_general_blog_quote_icon_callback( $control ){
			if ( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-two' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-four') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* For Blog Post Bottom Separator line */
	if ( ! function_exists( 'paperio_general_blog_bottom_separator_line_callback' ) ) :
		function paperio_general_blog_bottom_separator_line_callback( $control ){
			if ( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-three' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-four') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* For box background color callback */
	if ( ! function_exists( 'paperio_general_blog_box_background_callback' ) ) :
		function paperio_general_blog_box_background_callback( $control ){
			if ( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-one' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-four') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* For box border color callback */
	if ( ! function_exists( 'paperio_general_blog_box_border_callback' ) ) :
		function paperio_general_blog_box_border_callback( $control ){
			if ( $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-one' && $control->manager->get_setting( 'tz_hide_blog' )->value() != 1) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	

	/* For Blog Separator Line Color */
	if ( ! function_exists( 'paperio_general_blog_separator_color_callback' ) ) :
		function paperio_general_blog_separator_color_callback( $control ){
			if ( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-two' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-three' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-four') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* For Blog Comment And Like */
	if ( ! function_exists( 'paperio_general_blog_comment_and_like_callback' ) ) :
		function paperio_general_blog_comment_and_like_callback( $control ){
			if ( $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 && $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-one' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-two' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-three' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-five' || $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-six') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* For Border Color */
	if ( ! function_exists( 'paperio_general_blog_border_callback' ) ) :
		function paperio_general_blog_border_callback( $control ){
			if ( $control->manager->get_setting( 'tz_general_blog_layout' )->value() == 'blog-layout-seven' && $control->manager->get_setting( 'tz_hide_blog' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* Custom Callback Functions */