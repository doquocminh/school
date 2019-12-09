<?php
	
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Disable Latest/Popular Post Block */

    $wp_customize->add_setting( 'tz_disable_latest_popular_post', array(
		'default' 			=> 1,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_latest_popular_post', array(
		'label'       		=> esc_attr__( 'Disable Latest / Popular Post Block', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_disable_latest_popular_post',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Disable Latest/Popular Post Block */

	/* Featured Image Size */

    $wp_customize->add_setting( 'tz_latest_popular_post_feature_image_size', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_post_feature_image_size', array(
		'label'       		=> esc_attr__( 'Featured Image Size', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_latest_popular_post_feature_image_size',
		'type'              => 'select',
		'choices'           => paperio_feature_image_size(),
	) ) );

	/* End Featured Image Size */

	/* Latest / Popular Block Title */

    $wp_customize->add_setting( 'tz_latest_popular_block_title', array(
		'default' 			=> 'Latest Post',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_block_title', array(
		'label'       		=> esc_attr__( 'Latest / Popular Block Title', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_latest_popular_block_title',
		'type'              => 'text',
	) ) );
   
  	/* End Latest / Popular Block Title */

  	/* Hide Title Border */

    $wp_customize->add_setting( 'tz_latest_popular_block_title_border', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_latest_popular_block_title_border', array(
		'label'       		=> esc_attr__( 'Hide Block Title Border', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_latest_popular_block_title_border',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Title Border */

  	/* Latest/Popular Block Style */

    $wp_customize->add_setting( 'tz_latest_popular_post_style', array(
		'default' 			=> 'latest-popular-style1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_post_style', array(
		'label'       		=> esc_attr__( 'Latest/Popular Post Style', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_latest_popular_post_style',
		'type'              => 'radio',
		'choices'			=> array(
                                       'latest-popular-style1' => esc_html__( 'Latest/Popular Block Style1', 'paperio' ),
                                       'latest-popular-style2' => esc_html__( 'Latest/Popular Block Style2', 'paperio' ),
                                    ),
	) ) );
   
	/* End Latest/Popular Block Style */

	/* Latest/Popular Block Container Type */

	$wp_customize->add_setting( 'tz_latest_popular_post_container_style', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_post_container_style', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_latest_popular_post_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),
	) ) );

	/* End Latest/Popular Block Container Type */
  
    /* Latest/Popular Block Display Style */

    $wp_customize->add_setting( 'tz_latest_popular_post_block_display_style', array(
		'default' 			=> 'grid',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_post_block_display_style', array(
		'label'       		=> esc_attr__( 'Latest/Popular Block Display Style', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_latest_popular_post_block_display_style',
		'type'              => 'radio',
		'choices'           => array(
	                                   'grid'   => esc_html__( 'Grid', 'paperio' ),
	                                   'slider' => esc_html__( 'Slider', 'paperio' ),
                                    ),
	) ) );

	/* End Latest/Popular Block Display Style */

	/* Select Block Category */

    $wp_customize->add_setting( 'tz_latest_popular_post_category', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Category_Control( $wp_customize, 'tz_latest_popular_post_category', array(
		'label'      		=> esc_attr__( 'Select Category', 'paperio' ),
		'section'    		=> 'tz_add_latest_popular_post_section',
		'settings'	 		=> 'tz_latest_popular_post_category',
		'type'       		=> 'select',
	) ) );
   
	/* End Select Block Category */

	/* Latest/Popular Block Order By */

	$wp_customize->add_setting( 'tz_latest_popular_post_category_orderby', array(
		'default' 			=> 'date',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_post_category_orderby', array(
	    'label'      		=> esc_attr__( 'Select Order by', 'paperio' ),
		'section'    		=> 'tz_add_latest_popular_post_section',
		'settings'   		=> 'tz_latest_popular_post_category_orderby',
		'type'       		=> 'select',
		'choices'    		=> array(
									    'date' 			=> esc_html__( 'Date', 'paperio' ),
										'ID' 			=> esc_html__( 'ID', 'paperio' ),
										'author' 		=> esc_html__( 'Author', 'paperio' ),
										'title' 		=> esc_html__( 'Title', 'paperio' ),
										'modified' 		=> esc_html__( 'Modified Date', 'paperio' ),
										'rand' 			=> esc_html__( 'Random', 'paperio' ),
										'comment_count' => esc_html__( 'Comment count', 'paperio' ),
										'menu_order' 	=> esc_html__( 'Menu order', 'paperio' ),
						    		),
	)) );

	/* End Latest/Popular Block Order By */

	/* Latest/Popular Block Sort By */

	$wp_customize->add_setting( 'tz_latest_popular_post_category_sortby', array(
		'default' 			=> 'DESC',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_post_category_sortby', array(
	    'label'      		=> esc_attr__( 'Select Sort Option', 'paperio' ),
		'section'    		=> 'tz_add_latest_popular_post_section',
		'settings'   		=> 'tz_latest_popular_post_category_sortby',
		'type'       		=> 'select',
		'choices'    		=> array(
									    'DESC' 	=> esc_html__( 'Descending', 'paperio' ),
										'ASC' 	=> esc_html__( 'Ascending', 'paperio' ),
						    		),
	)) );

	/* End Latest/Popular Block Sort By */

	/* Hide Category */

    $wp_customize->add_setting( 'tz_latest_popular_hide_category', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_latest_popular_hide_category', array(
		'label'       		=> esc_attr__( 'Hide Category', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_latest_popular_hide_category',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback' 	=> 'paperio_latest_popular_category_callback',
	) ) );

	/* End Hide Category */

	/* Hide Date */

    $wp_customize->add_setting( 'tz_latest_popular_hide_date', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_latest_popular_hide_date', array(
		'label'       		=> esc_attr__( 'Hide Date', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_latest_popular_hide_date',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Date */

	/* Date Format */

	$wp_customize->add_setting( 'tz_latest_popular_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_date_format', array(
		'label'       		=> esc_attr__( 'Date Format', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_latest_popular_date_format',
		'type'		        => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'paperio' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback' 	=> 'paperio_latest_popular_date_callback',
	) ));

	/* End Date Format */

   	/* No. of items per row */

	$wp_customize->add_setting( 'tz_grid_no_of_items_row', array(
	    'default' 			=> '3',
	    'sanitize_callback' => 'esc_attr'
	) );
	 
	$wp_customize->add_control( 'tz_grid_no_of_items_row', array(
	    'label'      		=> esc_attr__( 'No. of items per row','paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'   		=> 'tz_grid_no_of_items_row',
	    'type'       		=> 'select',
	    'choices'    		=> array(
		                            	'1' => '1',
		                              	'2' => '2',
		                              	'3' => '3',
		                              	'4' => '4',
		                            ),
	    'active_callback' 	=> 'paperio_grid_style_callback',
	) );

    /* End No. of items per row */

    /* No. of items per slide Desktop */

	$wp_customize->add_setting( 'tz_slide_no_of_items_desktop', array(
	    'default' 			=> '3',
	    'sanitize_callback' => 'esc_attr'
	) );
	 
	$wp_customize->add_control( 'tz_slide_no_of_items_desktop', array(
	    'label'      		=> esc_attr__( 'No. of items per slide &ndash; Desktop View','paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'   		=> 'tz_slide_no_of_items_desktop',
	    'type'       		=> 'select',
	    'choices'    		=> array(
		                            	'1' => '1',
		                              	'2' => '2',
		                              	'3' => '3',
		                              	'4' => '4',
		                            ),
	    'active_callback' 	=> 'paperio_latest_popular_slider_callback',
	) );

	/* No. of items per slide Desktop */

	/* No. of items per slide Desktop Small*/

	$wp_customize->add_setting( 'tz_slide_no_of_items_desktop_mini', array(
	    'default' 			=> '3',
	    'sanitize_callback' => 'esc_attr'
	) );
	 
	$wp_customize->add_control( 'tz_slide_no_of_items_desktop_mini', array(
	    'label'      		=> esc_attr__( 'No. of items per slide &ndash; Mini Desktop View','paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'   		=> 'tz_slide_no_of_items_desktop_mini',
	    'type'       		=> 'select',
	    'choices'    		=> array(
		                            	'1' => '1',
		                              	'2' => '2',
		                              	'3' => '3',
		                              	'4' => '4',
		                            ),
	    'active_callback' 	=> 'paperio_latest_popular_slider_callback',
	) );

	/* No. of items per slide Desktop */

	/* No. of items per slide Ipad */

	$wp_customize->add_setting( 'tz_slide_no_of_items_ipad', array(
	    'default' 			=> '2',
	    'sanitize_callback' => 'esc_attr'
	) );
	 
	$wp_customize->add_control( 'tz_slide_no_of_items_ipad', array(
	    'label'      		=> esc_attr__( 'No. of items per slide &ndash; iPad/Tablet View','paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'   		=> 'tz_slide_no_of_items_ipad',
	    'type'       		=> 'select',
	    'choices'    		=> array(
		                            	'1' => '1',
		                              	'2' => '2',
		                              	'3' => '3',
		                            ),
	    'active_callback' 	=> 'paperio_latest_popular_slider_callback',
	) );

	/* End No. of items per slide Ipad */

	/* No. of items per slide Mobile */

    $wp_customize->add_setting( 'tz_slide_no_of_items_mobile', array(
	    'default' 			=> '1',
	    'sanitize_callback' => 'esc_attr'
	) );
	 
	$wp_customize->add_control( 'tz_slide_no_of_items_mobile', array(
	    'label'      		=> esc_attr__( 'No. of items per slide &ndash; Mobile View','paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'   		=> 'tz_slide_no_of_items_mobile',
	    'type'       		=> 'select',
	    'choices'    		=> array(
		                            	'1' => '1',
		                            ),
	    'active_callback' 	=> 'paperio_latest_popular_slider_callback',
	) );

	/* End No. of items per slide Mobile */

	/* Show Navigation */

   	$wp_customize->add_setting( 'tz_latest_popular_show_navigation', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
   	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_show_navigation', array(
	    'label'      		=> esc_attr__( 'Show Navigation', 'paperio' ),
		'section'    		=> 'tz_add_latest_popular_post_section',
		'settings'   		=> 'tz_latest_popular_show_navigation',
		'type'       		=> 'select',
		'choices'    		=> array(
									    'yes' => esc_html__( 'Yes', 'paperio' ),
									    'no'  => esc_html__( 'No', 'paperio' ),
									),
		'active_callback'   => 'paperio_latest_popular_slider_callback',
	)) ); 
   
	/* End Show Navigation */

	/* Cursor Color Style */

	$wp_customize->add_setting( 'tz_latest_popular_cursor_style', array(
		'default' 			=> 'owl-cursor-default',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_cursor_style', array(
	    'label'      		=> esc_attr__( 'Cursor Color Style', 'paperio' ),
		'section'    		=> 'tz_add_latest_popular_post_section',
		'settings'   		=> 'tz_latest_popular_cursor_style',
		'type'       		=> 'select',
		'choices'    		=> array(
									    'grid-cursor-default' => esc_html__( 'Default Cursor', 'paperio' ),
									    'grid-cursor-dark'    => esc_html__( 'Dark Cursor', 'paperio' ),
									    'grid-cursor-light'   => esc_html__( 'Light Cursor', 'paperio' ),
							 		),
		'active_callback' => 'paperio_grid_style_callback',
	) ) );

	/* End Cursor Color Style */

	/* Loop */

    $wp_customize->add_setting( 'tz_latest_popular_loop', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_loop', array(
	    'label'      		=> esc_attr__( 'Loop', 'paperio' ),
		'section'    		=> 'tz_add_latest_popular_post_section',
		'settings'   		=> 'tz_latest_popular_loop',
		'type'       		=> 'select',
		'active_callback' 	=> 'paperio_latest_popular_slider_callback',
		'choices'    		=> array(
									    'yes' => esc_html__( 'Yes', 'paperio' ),
							    		'no' =>  esc_html__( 'No',  'paperio' ),
							 		),
	)) );

	/* End Loop */

	/* AutoPlay */

    $wp_customize->add_setting( 'tz_latest_popular_autoplay', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_autoplay', array(
	    'label'      		=> esc_attr__( 'AutoPlay', 'paperio' ),
		'section'    		=> 'tz_add_latest_popular_post_section',
		'settings'   		=> 'tz_latest_popular_autoplay',
		'type'       		=> 'select',
		'choices'    		=> array(
									    'yes' => esc_html__( 'Yes', 'paperio' ),
									    'no' =>  esc_html__( 'No', 'paperio' ),
									),
		'active_callback' 	=> 'paperio_latest_popular_slider_callback',
	)) );

	/* End AutoPlay */

	/* AutoPlay Speed */

    $wp_customize->add_setting( 'tz_latest_popular_autoplay_speed', array(
		'default' 			=> '3000',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_autoplay_speed', array(
	    'label'      		=> esc_attr__( 'Speed', 'paperio' ),
		'section'    		=> 'tz_add_latest_popular_post_section',
		'settings'   		=> 'tz_latest_popular_autoplay_speed',
		'type'       		=> 'select',
		'choices'    		=> array(
									    '1000' => '1000',
							    		'2000' => '2000',
							    		'3000' => '3000',
							    		'4000' => '4000',
							    		'5000' => '5000',
							    		'6000' => '6000',
							    		'7000' => '7000',
							    		'8000' => '8000',
							    		'9000' => '9000',
							    		'10000' => '10000',
							 		),
		'active_callback' 	=> 'paperio_latest_popular_slider_speed_callback',
	)) );

	/* End AutoPlay Speed */

	/* AutoPlay Delay */

    $wp_customize->add_setting( 'tz_latest_popular_autoplay_delay', array(
		'default' 			=> '700',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_autoplay_delay', array(
	    'label'      		=> esc_attr__( 'Delay', 'paperio' ),
		'section'    		=> 'tz_add_latest_popular_post_section',
		'settings'   		=> 'tz_latest_popular_autoplay_delay',
		'type'       		=> 'select',
		'choices'    		=> array(
										'500' => '500',
										'600' => '600',
										'700' => '700',
										'800' => '800',
										'900' => '900',
									    '1000' => '1000',
							    		'2000' => '2000',
							    		'3000' => '3000',
							    		'4000' => '4000',
							    		'5000' => '5000',
							    		'6000' => '6000',
							    		'7000' => '7000',
							    		'8000' => '8000',
							    		'9000' => '9000',
							    		'10000' => '10000',
							 		),
		'active_callback' 	=> 'paperio_latest_popular_slider_speed_callback',
	)) );

	/* End AutoPlay Delay */

    /* Stop On Hover */

	$wp_customize->add_setting( 'tz_latest_popular_stop_on_hover', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_latest_popular_stop_on_hover', array(
	    'label'      		=> esc_attr__( 'Stop On Hover', 'paperio' ),
		'section'    		=> 'tz_add_latest_popular_post_section',
		'settings'   		=> 'tz_latest_popular_stop_on_hover',
		'type'       		=> 'select',
		'choices'    		=> array(
									    'yes' => esc_html__('Yes', 'paperio' ),
							    		'no' =>  esc_html__('No',  'paperio' ),
							 		),
		'active_callback' 	=> 'paperio_latest_popular_slider_speed_callback',
	)) );

	/* End Stop On Hover */

    /* Display number of maximum post in slider / Grid  */

    $wp_customize->add_setting( 'tz_display_max_post_grid', array(
		'default' 			=> '6',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_display_max_post_grid', array(
		'label'       		=> esc_attr__( 'Display number of maximum post in slider / Grid', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_display_max_post_grid',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '12'
	) ) );

  	/* End Display number of maximum post in slider / Grid  */

  	/* Show Full Title */

    $wp_customize->add_setting( 'tz_show_full_title', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_show_full_title', array(
		'label'       		=> esc_attr__( 'Full Post Title', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_show_full_title',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Show Full Title */

	/* Hide Arrow */

    $wp_customize->add_setting( 'tz_hide_arrow', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_arrow', array(
		'label'       		=> esc_attr__( 'Hide Arrow', 'paperio' ),
		'section'     		=> 'tz_add_latest_popular_post_section',
		'settings'			=> 'tz_hide_arrow',
		'type'              => 'radio',
		'active_callback'   => 'paperio_hide_popular_post_arrow_callback',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Show Full Title */

  	/* Separator setting */

	$wp_customize->add_setting( 'tz_latest_popular_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_latest_popular_separator', array(
	    'label'      		=> esc_attr__( 'Font & Color Settings', 'paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'   		=> 'tz_latest_popular_separator',
	) ) );

	/* End Separator setting */

	/* Title font size Setting */

	$wp_customize->add_setting( 'tz_latest_popular_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_latest_popular_title_font_size', array(
	    'label'      		=> esc_attr__( 'Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'	 		=> 'tz_latest_popular_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Title font size Setting */

	/* Title line height Setting */

	$wp_customize->add_setting( 'tz_latest_popular_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_latest_popular_title_line_height', array(
	    'label'      		=> esc_attr__( 'Title Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'	 		=> 'tz_latest_popular_title_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Title line height Setting */

	/* Title character spacing Setting */

	$wp_customize->add_setting( 'tz_latest_popular_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_latest_popular_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'	 		=> 'tz_latest_popular_title_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Title character spacing Setting */

	/* Title Color Setting */

	$wp_customize->add_setting( 'tz_latest_popular_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_latest_popular_title_color', array(
	    'label'      		=> esc_attr__( 'Title Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'	 		=> 'tz_latest_popular_title_color',
	) ) );

	/* End Title Color Setting */

	/* Title Hover Color Setting */

	$wp_customize->add_setting( 'tz_latest_popular_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_latest_popular_title_hover_color', array(
	    'label'      		=> esc_attr__( 'Title Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'	 		=> 'tz_latest_popular_title_hover_color',
	    'active_callback' 	=> 'paperio_latest_popular_title_hover_callback',
	) ) );

	/* End Title Hover Color Setting */

	/* Date font size Setting */

	$wp_customize->add_setting( 'tz_latest_popular_date_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_latest_popular_date_font_size', array(
	    'label'      		=> esc_attr__( 'Date Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'	 		=> 'tz_latest_popular_date_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Date font size Setting */

	/* Date line height Setting */

	$wp_customize->add_setting( 'tz_latest_popular_date_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_latest_popular_date_line_height', array(
	    'label'      		=> esc_attr__( 'Date Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'	 		=> 'tz_latest_popular_date_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Date line height Setting */

	/* Date character spacing Setting */

	$wp_customize->add_setting( 'tz_latest_popular_date_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_latest_popular_date_character_spacing', array(
	    'label'      		=> esc_attr__( 'Date Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'	 		=> 'tz_latest_popular_date_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Date character spacing Setting */

	/* Date Color Setting */

	$wp_customize->add_setting( 'tz_latest_popular_date_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_latest_popular_date_color', array(
	    'label'      		=> esc_attr__( 'Date Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_latest_popular_post_section',
	    'settings'	 		=> 'tz_latest_popular_date_color',
	) ) );

	/* End Date Color Setting */

	
	/* Callback Fanctions */

	if ( ! function_exists( 'paperio_latest_popular_slider_callback' ) ) :
		function paperio_latest_popular_slider_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_latest_popular_post_block_display_style' )->value() == 'slider' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_latest_popular_title_hover_callback' ) ) :
		function paperio_latest_popular_title_hover_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_latest_popular_post_style' )->value() == 'latest-popular-style2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_grid_style_callback' ) ) :
		function paperio_grid_style_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_latest_popular_post_block_display_style' )->value() == 'grid' ) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	if ( ! function_exists( 'paperio_latest_popular_category_callback' ) ) :
		function paperio_latest_popular_category_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_latest_popular_post_style' )->value() == 'latest-popular-style2' ) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	if ( ! function_exists( 'paperio_hide_popular_post_arrow_callback' ) ) :
		function paperio_hide_popular_post_arrow_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_latest_popular_post_style' )->value() == 'latest-popular-style1' ) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	if ( ! function_exists( 'paperio_latest_popular_date_callback' ) ) :
		function paperio_latest_popular_date_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_latest_popular_hide_date' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	if ( ! function_exists( 'paperio_latest_popular_slider_speed_callback' ) ) :
		function paperio_latest_popular_slider_speed_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_latest_popular_post_block_display_style' )->value() == 'slider' &&  $control->manager->get_setting( 'tz_latest_popular_autoplay' )->value() == 'yes' ) {
		        return true;
		    } else {
		    	return false;
		    } 
		}
	endif;

	/* End Callback Fanctions */