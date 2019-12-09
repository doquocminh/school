<?php

	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Disable Featured Area */

    $wp_customize->add_setting( 'tz_disable_featured_area', array(
		'default'  			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_disable_featured_area', array(
		'label'       		=> esc_attr__( 'Disable Featured Area', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_disable_featured_area',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Disable Featured Area */

	/* Featured Slider Style */

	$wp_customize->add_setting( 'tz_featured_area_style', array(
		'default'    		=> 'feature-style2',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_featured_area_style', array(
	    'label'      		=> esc_attr__( 'Featured Area Style', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_featured_area_style',
		'type'       		=> 'radio',
		'choices'    		=> array(
							    'feature-style1' => esc_html__( 'Featured Style1', 'paperio' ),
							    'feature-style2' => esc_html__( 'Featured Style2', 'paperio' ),
							    'feature-style3' => esc_html__( 'Featured Style3', 'paperio' ),
							    'feature-style4' => esc_html__( 'Featured Style4', 'paperio' ),
							    'feature-style5' => esc_html__( 'Featured Style5', 'paperio' ),
				   			 ),
	)) );

	/* End Featured Slider Style */

	/* Featured Image Size */

    $wp_customize->add_setting( 'tz_featured_area_feature_image_size', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_featured_area_feature_image_size', array(
		'label'       		=> esc_attr__( 'Featured Image Size', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_featured_area_feature_image_size',
		'type'              => 'select',
		'choices'           => paperio_feature_image_size(),
	) ) );

	/* End Featured Image Size */

	/* Featured Category */

    $wp_customize->add_setting( 'tz_select_featured_category', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Category_Control( $wp_customize, 'tz_select_featured_category', array(
		'label'       		=> esc_attr__( 'Select Featured Category', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_select_featured_category',
		'type'             	=> 'select',
	) ));

	/* End Featured Category */

	/* Featured Slider Order By */

	$wp_customize->add_setting( 'tz_select_featured_category_orderby', array(
		'default' 			=> 'date',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_select_featured_category_orderby', array(
	    'label'      		=> esc_attr__( 'Select Order by', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_select_featured_category_orderby',
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

	/* End Featured Slider Order By */

	/* Featured Slider Sort By */

	$wp_customize->add_setting( 'tz_select_featured_category_sortby', array(
		'default' 			=> 'DESC',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_select_featured_category_sortby', array(
	    'label'      		=> esc_attr__( 'Select Sort Option', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_select_featured_category_sortby',
		'type'       		=> 'select',
		'choices'    		=> array(
							    'DESC' => esc_html__( 'Descending', 'paperio' ),
								'ASC' =>  esc_html__( 'Ascending', 'paperio' ),
				    		 ),
	)) );

	/* End Featured Slider Sort By */

	/* Featured Slider Container Type */

	$wp_customize->add_setting( 'tz_container_style', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_container_style', array(
		'label'       		=> esc_attr__( 'Container Style', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'yes' => esc_html__( 'Fluid Container', 'paperio' ),
								    'no'  => esc_html__( 'Fixed Container', 'paperio' ),
							   ),
	) ) );

	/* End Featured Slider Container Type */

	/* Hide Category */

    $wp_customize->add_setting( 'tz_hide_featured_area_category', array(
		'default'  			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_featured_area_category', array(
		'label'       		=> esc_attr__( 'Hide Category', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_hide_featured_area_category',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Category */

	/* Hide date */

    $wp_customize->add_setting( 'tz_hide_featured_area_date', array(
		'default'  			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_featured_area_date', array(
		'label'       		=> esc_attr__( 'Hide Date', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_hide_featured_area_date',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_show_date_callback',
	) ) );

	/* End Hide date */

	/* Hide Arrow */

    $wp_customize->add_setting( 'tz_hide_featured_area_arrow', array(
		'default'  			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_featured_area_arrow', array(
		'label'       		=> esc_attr__( 'Hide Arrow', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_hide_featured_area_arrow',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_arrow_callback',
	) ) );

	/* End Hide date */

	/* Date Format */

	$wp_customize->add_setting( 'tz_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_date_format', array(
		'label'       		=> esc_attr__( 'Date Format', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_date_format',
		'type'		        => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'paperio' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'paperio_date_format_callback',
	) ));

	/* End Date Format */

	/* Hide Read More Button */

    $wp_customize->add_setting( 'tz_hide_read_more_button', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_read_more_button', array(
		'label'       		=> esc_attr__( 'Hide Button', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_hide_read_more_button',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_read_more_callback',
	) ) );

	/* End Hide Read More Button */

	/* Button Text */

	$wp_customize->add_setting( 'tz_read_more_text', array(
		'default' 			=> 'Read More',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_read_more_text', array(
		'label'       		=> esc_attr__( 'Button Text', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_read_more_text',
		'type'		        => 'text',
		'description' 		=> esc_html__( 'To hide button, remove the title text.', 'paperio' ),
		'active_callback'   => 'paperio_hide_featured_read_more_callback',
	) ));

	/* End Button Text */

	/* Read More Button Hide Button Arrow */

	$wp_customize->add_setting('tz_general_featured_button_arrow', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );
	 $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_general_featured_button_arrow', array(
		'label'       		=> esc_attr__( 'Hide Button Arrow', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_general_featured_button_arrow',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
		'active_callback'   => 'paperio_hide_featured_read_more_callback',
	) ) );

	/* End Read More Button Hide Button Arrow */

	/* No. of items per slide – Desktop View */

	$wp_customize->add_setting( 'tz_featured_desktop_view', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_featured_desktop_view', array(
	    'label'      => esc_attr__( 'No. of items per slide &ndash; Desktop View', 'paperio' ),
		'section'    => 'tz_add_featured_area_section',
		'settings'   => 'tz_featured_desktop_view',
		'type'       => 'select',
		'choices'    => array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
				    		 ),
	)) );

	/* End No. of items per slide – Desktop View */

	/* No. of items per slide – Desktop Small View */

	$wp_customize->add_setting( 'tz_featured_desktop_mini_view', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_featured_desktop_mini_view', array(
	    'label'      => esc_attr__( 'No. of items per slide &ndash; Mini Desktop View', 'paperio' ),
		'section'    => 'tz_add_featured_area_section',
		'settings'   => 'tz_featured_desktop_mini_view',
		'type'       => 'select',
		'choices'    => array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
				    		 ),
	)) );

	/* End No. of items per slide – Desktop View */

	/* No. of items per slide – iPad/Tablet View */

	$wp_customize->add_setting( 'tz_featured_tablet_view', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_featured_tablet_view', array(
	    'label'      => esc_attr__( 'No. of items per slide &ndash; iPad/Tablet View', 'paperio' ),
		'section'    => 'tz_add_featured_area_section',
		'settings'   => 'tz_featured_tablet_view',
		'type'       => 'select',
		'choices'    => array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
				    		 ),
	)) );

	/* End No. of items per slide – iPad/Tablet View */

	/* No. of items per slide – Mobile View */

	$wp_customize->add_setting( 'tz_featured_mobile_view', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_featured_mobile_view', array(
	    'label'      => esc_attr__( 'No. of items per slide &ndash; Mobile View', 'paperio' ),
		'section'    => 'tz_add_featured_area_section',
		'settings'   => 'tz_featured_mobile_view',
		'type'       => 'select',
		'choices'    => array(
							    '1' => '1',
				    		 ),
	)) ); 

	/* End No. of items per slide – Mobile View */

	/* Display No of Maximum Post in Featured Slider */

	$wp_customize->add_setting( 'tz_featured_no_of_post', array(
		'default' 			=> '6',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_Number_Control( $wp_customize, 'tz_featured_no_of_post', array(
		'label'       		=> esc_attr__( 'Display number of maximum post in slider', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_featured_no_of_post',
		'type'              => 'number',
		'min'				=> '1',
		'max'				=> '12'
	) ));

	/* End Display No of Maximum Post in Featured Slider */

	/* Show Pagination */

	$wp_customize->add_setting( 'tz_show_pagination', array(
		'default' 			=> 'yes',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_show_pagination', array(
	    'label'      		=> esc_attr__( 'Show Pagination', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_show_pagination',
		'type'       		=> 'radio',
		'choices'    		=> array(
									    'yes' => esc_html__( 'Yes', 'paperio' ),
									    'no' =>  esc_html__( 'No',   'paperio' ),
									),
		'active_callback' 	=> 'paperio_show_pagination_callback',
	)) ); 

	/* End Show Pagination */

	/* Pagination Style */

	$wp_customize->add_setting( 'tz_pagination_style', array(
	    'default' 			=> 'owl-square-pagination',
	    'sanitize_callback' => 'esc_attr'
	) );
				 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_pagination_style', array(
		'label'      		=> esc_attr__( 'Pagination Style', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_pagination_style',
		'type'       		=> 'radio',
		'choices'    		=> array(
					        	    'owl-dot-pagination'   => esc_html__( 'Dot Style', 'paperio' ),
					            	'owl-square-pagination'  => esc_html__( 'Line Style', 'paperio' ),
					            	'owl-round-pagination' => esc_html__( 'Round Style', 'paperio' ),
					         	),
		'active_callback' 	=> 'paperio_pagination_callback',
	)) );

	/* End Pagination Style */

	/* Pagination Style Color */

 	$wp_customize->add_setting( 'tz_pagination_color', array(
		'default' 			=> 'pagination-light-style',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_pagination_color', array(
		'label'      		=> esc_attr__( 'Pagination Color Style', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_pagination_color',
		'type'       		=> 'radio',
		'choices'    		=> array(
					        	    	'pagination-dark-style'  => esc_html__( 'Dark Style', 'paperio' ),
					            		'pagination-light-style' => esc_html__( 'Light Style', 'paperio' ),
					         		),
		'active_callback' 	=> 'paperio_pagination_color_callback',
	)));

	/* End Pagination Style Color */

   	/* Show Navigation */

    $wp_customize->add_setting( 'tz_show_navigation', array(
		'default' 			=> 'yes',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_show_navigation', array(
	    'label'      		=> esc_attr__( 'Show Navigation', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_show_navigation',
		'type'       		=> 'radio',
		'choices'    		=> array(
								    	'yes' => esc_html__( 'Yes', 'paperio' ),
							    		'no'  => esc_html__( 'No',  'paperio' ),
							 		),
	)) );

	/* End Show Navigation */
   
    /* Navigation Style */

   	$wp_customize->add_setting( 'tz_navigation_style', array(
		'default' 			=> 'owl-next-prev-arrow-style2',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_navigation_style', array(
		'label'      		=> esc_attr__( 'Navigation Style', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_navigation_style',
		'type'       		=> 'radio',
		'choices'    		=> array(
					        	    	'owl-next-prev-arrow-style1' => esc_html__( 'Next/Prev Style1', 'paperio' ),
					            		'owl-next-prev-arrow-style2' => esc_html__( 'Next/Prev Style2', 'paperio' ),
					            		'owl-next-prev-arrow-style4' => esc_html__( 'Next/Prev Style3', 'paperio' ),
					         		),
		'active_callback' 	=> 'paperio_navigation_callback',
		 
	)) );

	/* End Navigation Style */

	/* Cursor Style */

	$wp_customize->add_setting ('tz_cursor_style', array(
		'default' 			=> 'owl-cursor-default',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_cursor_style', array(
	    'label'      		=> esc_attr__( 'Cursor Color Style', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_cursor_style',
		'type'       		=> 'radio',
		'choices'    		=> array(
									    'owl-cursor-default' => esc_html__( 'Default Cursor', 'paperio' ),
									    'owl-cursor-dark'    => esc_html__( 'Dark Cursor',   'paperio' ),
									    'owl-cursor-light'   => esc_html__( 'Light Cursor',   'paperio' ),
							 		),
	) ) ); 

	/* End Cursor Style */

	/* Display Single item */

    $wp_customize->add_setting( 'tz_display_single_item', array(
		'default' 			=> 'yes',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_display_single_item', array(
	    'label'      		=> esc_attr__( 'Display Single item', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_display_single_item',
		'type'       		=> 'select',
		'choices'    		=> array(
									    'yes' => esc_html__( 'Yes', 'paperio' ),
							    		'no' =>  esc_html__( 'No',  'paperio' ),
							 		),
	)) );

	/* End Display Single item */

	/* Loop */

    $wp_customize->add_setting( 'tz_loop', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_loop', array(
	    'label'      		=> esc_attr__( 'Loop', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_loop',
		'type'       		=> 'select',
		'choices'    		=> array(
									    'yes' => esc_html__( 'Yes', 'paperio' ),
							    		'no' =>  esc_html__( 'No',  'paperio' ),
							 		),
	)) );

	/* End Loop */
	
	/* Transition Style */

    $wp_customize->add_setting( 'tz_transition_style', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Animation_Control( $wp_customize, 'tz_transition_style', array(
		'label'       		=> esc_attr__( 'Animation In', 'paperio' ),
		'type'              => 'paperio_animation_style',
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_transition_style',
		'active_callback' 	=> 'paperio_single_slide_callback',
	) ) );

	/* End Transition Style */

	/* Transition Out Style */

    $wp_customize->add_setting( 'tz_transition_animation_out', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Customize_Animation_Control( $wp_customize, 'tz_transition_animation_out', array(
		'label'       		=> esc_attr__( 'Animation Out', 'paperio' ),
		'type'              => 'paperio_animation_style',
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_transition_animation_out',
		'active_callback' 	=> 'paperio_single_slide_callback',
	) ) );

	/* End Transition Out Style */

    /* AutoPlay */

    $wp_customize->add_setting( 'tz_autoplay', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_autoplay', array(
	    'label'      		=> esc_attr__( 'AutoPlay', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_autoplay',
		'type'       		=> 'select',
		'choices'    		=> array(
									    'yes' => esc_html__( 'Yes', 'paperio' ),
							    		'no' =>  esc_html__( 'No',  'paperio' ),
							 		),
	)) );

	/* End AutoPlay */

	/* AutoPlay Speed */

    $wp_customize->add_setting( 'tz_autoplay_speed', array(
		'default' 			=> '3000',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_autoplay_speed', array(
	    'label'      		=> esc_attr__( 'Speed', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_autoplay_speed',
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
		'active_callback' 	=> 'paperio_hover_speed_callback',
	)) );

	/* End AutoPlay Speed */

	/* AutoPlay Delay */

    $wp_customize->add_setting( 'tz_autoplay_delay', array(
		'default' 			=> '700',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_autoplay_delay', array(
	    'label'      		=> esc_attr__( 'Delay', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_autoplay_delay',
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
		'active_callback' 	=> 'paperio_hover_speed_callback',
	)) );

	/* End AutoPlay Delay */

    /* Stop On Hover */

	$wp_customize->add_setting( 'tz_stop_on_hover', array(
		'default' 			=> 'no',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_stop_on_hover', array(
	    'label'      		=> esc_attr__( 'Stop On Hover', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_stop_on_hover',
		'type'       		=> 'select',
		'choices'    		=> array(
									    'yes' => esc_html__( 'Yes', 'paperio' ),
							    		'no' =>  esc_html__( 'No',  'paperio' ),
							 		),
		'active_callback' 	=> 'paperio_hover_speed_callback',
	)) );

	/* End Stop On Hover */

	/* Separator setting */

	$wp_customize->add_setting( 'tz_featured_area_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_featured_area_separator', array(
	    'label'      		=> esc_attr__( 'Font & Color Setting', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'   		=> 'tz_featured_area_separator',
	) ) );

	/* End Separator setting */

	/* Feature Box Background Color */

	$wp_customize->add_setting( 'tz_featured_area_box_bgcolor', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_area_box_bgcolor', array(
		'label'       		=> esc_attr__( 'Box background color', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_featured_area_box_bgcolor',
		'active_callback'   => 'paperio_box_bgcolor_callback',
	) ) );

	/* End Feature Box Background Color */

	/* Feature Overlay Background Color */

	$wp_customize->add_setting( 'tz_featured_area_overlay_bgcolor', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_area_overlay_bgcolor', array(
		'label'       		=> esc_attr__( 'Overlay Color', 'paperio' ),
		'section'     		=> 'tz_add_featured_area_section',
		'settings'			=> 'tz_featured_area_overlay_bgcolor',
	) ) );

	/* End Feature Overlay Background Color */

	/* Feature Overlay Opacity */

	$wp_customize->add_setting( 'tz_featured_area_overlay_opacity', array(
		'default'    		=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_featured_area_overlay_opacity', array(
	    'label'      		=> esc_attr__( 'Overlay Opacity', 'paperio' ),
		'section'    		=> 'tz_add_featured_area_section',
		'settings'   		=> 'tz_featured_area_overlay_opacity',
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

	/* End Feature Overlay Opacity */

	/* Title font size setting */

	$wp_customize->add_setting( 'tz_featured_area_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_featured_area_title_font_size', array(
	    'label'      		=> esc_attr__( 'Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_area_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Title font size setting */

	/* Title line height setting */

	$wp_customize->add_setting( 'tz_featured_area_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_featured_area_title_line_height', array(
	    'label'      		=> esc_attr__( 'Title Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_area_title_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Title line height setting */

	/* Title character spacing setting */

	$wp_customize->add_setting( 'tz_featured_area_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_featured_area_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_area_title_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Title character spacing setting */

	/* Title Text Color Setting */

	$wp_customize->add_setting( 'tz_featured_area_title_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_area_title_text_color', array(
	    'label'      		=> esc_attr__( 'Title Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_area_title_text_color',
	) ) );

	/* End Title Text Color Setting */

	/* Title Text Hover Color Setting */

	$wp_customize->add_setting( 'tz_featured_area_title_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_area_title_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Title Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_area_title_text_hover_color',
	) ) );

	/* End Title Text Hover Color Setting */

	/* Meta font size setting */

	$wp_customize->add_setting( 'tz_featured_area_meta_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_featured_area_meta_font_size', array(
	    'label'      		=> esc_attr__( 'Meta Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_area_meta_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Meta font size setting */

	/* Meta line height setting */

	$wp_customize->add_setting( 'tz_featured_area_meta_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_featured_area_meta_line_height', array(
	    'label'      		=> esc_attr__( 'Meta Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_area_meta_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Meta line height setting */

	/* Meta character spacing setting */

	$wp_customize->add_setting( 'tz_featured_area_meta_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_featured_area_meta_character_spacing', array(
	    'label'      		=> esc_attr__( 'Meta Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_area_meta_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Meta character spacing setting */

	/* Meta Text Color Setting */

	$wp_customize->add_setting( 'tz_featured_area_meta_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_area_meta_text_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_area_meta_text_color',
	) ) );

	/* End Title Text Color Setting */

	/* Meta Text Hover Color Setting */

	$wp_customize->add_setting( 'tz_featured_area_meta_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_area_meta_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_area_meta_text_hover_color',
	) ) );

	/* End Meta Text Hover Color Setting */

	/* Read more Button font size Setting */

	$wp_customize->add_setting( 'tz_general_featured_readmore_button_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_featured_readmore_button_font_size', array(
	    'label'      		=> esc_attr__( 'Button Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_general_featured_readmore_button_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_featured_read_more_callback',
	) );

	/* End Read more Button font size Setting */

	/* Read more Button line height Setting */

	$wp_customize->add_setting( 'tz_general_featured_readmore_button_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_featured_readmore_button_line_height', array(
	    'label'      		=> esc_attr__( 'Button Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_general_featured_readmore_button_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_featured_read_more_callback',
	) );

	/* End Read more Button line height Setting */

	/* Read more Button character Spacing Setting */

	$wp_customize->add_setting( 'tz_general_featured_readmore_button_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_featured_readmore_button_character_spacing', array(
	    'label'      		=> esc_attr__( 'Button Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_general_featured_readmore_button_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	    'active_callback'   => 'paperio_hide_featured_read_more_callback',
	) );

	/* End  Read more Button character Spacing Setting */

	/* Read more Button Color */

	$wp_customize->add_setting( 'tz_featured_readmore_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_readmore_button_color', array(
	    'label'      		=> esc_attr__( 'Button Color', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_readmore_button_color',
	    'active_callback'   => 'paperio_hide_featured_read_more_callback',
	) ) );

	/* End Read more Button Color */

	/* Read more Button Hover Color */

	$wp_customize->add_setting( 'tz_featured_readmore_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_readmore_button_hover_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_readmore_button_hover_color',
	    'active_callback'   => 'paperio_hide_featured_read_more_callback',
	) ) );

	/* End Read more Button Hover Color  */

	/* Read more Button Border Color */

	$wp_customize->add_setting( 'tz_featured_readmore_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_readmore_button_border_color', array(
	    'label'      		=> esc_attr__( 'Button Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_readmore_button_border_color',
	    'active_callback'   => 'paperio_hide_featured_read_more_callback',
	) ) );

	/* End Read more Button Border Color */

	/* Read more Button Border Hover Color */

	$wp_customize->add_setting( 'tz_featured_readmore_button_border_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_readmore_button_border_hover_color', array(
	    'label'      		=> esc_attr__( 'Button Border Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_readmore_button_border_hover_color',
	    'active_callback'   => 'paperio_hide_featured_read_more_callback',
	) ) );

	/* End Read more Button Border Hover Color  */

	/* Read more Button Background Color */

	$wp_customize->add_setting( 'tz_featured_readmore_button_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_readmore_button_background_color', array(
	    'label'      		=> esc_attr__( 'Button Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_readmore_button_background_color',
	    'active_callback'   => 'paperio_hide_featured_read_more_callback',
	) ) );

	/* End Read more Button Background Color */

	/* Read more Button Hover Background Color*/

	$wp_customize->add_setting( 'tz_featured_readmore_button_hover_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_featured_readmore_button_hover_background_color', array(
	    'label'      		=> esc_attr__( 'Button Hover Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_featured_area_section',
	    'settings'	 		=> 'tz_featured_readmore_button_hover_background_color',
	    'active_callback'   => 'paperio_hide_featured_read_more_callback',
	) ) );

	/* End Read more Button Hover Background Color */


  	/* Callback Functions */

  	if ( ! function_exists( 'paperio_box_bgcolor_callback' ) ) :
	  	function paperio_box_bgcolor_callback( $control ) {
			if ( $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style2') {
				return true;
			} else {
				return false;
			}
	  	}
  	endif;

  	if ( ! function_exists( 'paperio_show_pagination_callback' ) ) :
	  	function paperio_show_pagination_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_navigation_style' )->value() != 'owl-next-prev-arrow-style1' ) {
				return true;
			} else {
				return false;
		  	}
	   	}
	endif;

  	if ( ! function_exists( 'paperio_pagination_callback' ) ) :
	  	function paperio_pagination_callback( $control ) {
			if ( $control->manager->get_setting('tz_show_pagination')->value() == 'yes' && $control->manager->get_setting( 'tz_navigation_style' )->value() != 'owl-next-prev-arrow-style1' ) {
				return true;
			} else {
				return false;
		  	}
	   	}
	endif;

	if ( ! function_exists( 'paperio_pagination_color_callback' ) ) :
	  	function paperio_pagination_color_callback( $control ) {
			if ( $control->manager->get_setting('tz_show_pagination')->value() == 'yes' && $control->manager->get_setting( 'tz_navigation_style' )->value() != 'owl-next-prev-arrow-style1' ) {
				return true;
			} else {
				return false;
			}
	  	}
	endif;

	if ( ! function_exists( 'paperio_navigation_callback' ) ) :
	  	function paperio_navigation_callback( $control ) {
			if ( $control->manager->get_setting('tz_show_navigation')->value() == 'yes' ) {
		  		return true;
			} else {
		  		return false;
			}
	  	}
	endif;

  	if ( ! function_exists( 'paperio_single_slide_callback' ) ) :
		function paperio_single_slide_callback( $control ) {
			if ( $control->manager->get_setting('tz_display_single_item')->value() == 'yes' ) {
				return true;
			} else {
				return false;
			}
	  	}
  	endif;
  	
  	if ( ! function_exists( 'paperio_hover_speed_callback' ) ) :
	  	function paperio_hover_speed_callback( $control ) {
			if ( $control->manager->get_setting('tz_autoplay')->value() == 'yes' ) {
				return true;
			} else {
				return false;
			}
	  	}
  	endif;

  	if ( ! function_exists( 'paperio_show_date_callback' ) ) :
	  	function paperio_show_date_callback( $control ) {
			if ( $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style3' || $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style5' ) {
				return true;
			} else {
				return false;
			}
	  	}
  	endif;
  	
  	if ( ! function_exists( 'paperio_date_format_callback' ) ) :
	  	function paperio_date_format_callback( $control ) {
			if ( $control->manager->get_setting('tz_hide_featured_area_date')->value() != 1 && ( $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style3' || $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style5' ) ) {
				return true;
			} else {
				return false;
			}
	  	}
  	endif;

  	if ( ! function_exists( 'paperio_hide_featured_read_more_callback' ) ) :
	  	function paperio_hide_featured_read_more_callback( $control ) {
			if ( $control->manager->get_setting('tz_hide_read_more_button')->value() != 1 && $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style1' || $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style2' || $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style4' ) {
				return true;
			} else {
				return false;
			}
	  	}
  	endif;

  	if ( ! function_exists( 'paperio_read_more_callback' ) ) :
	  	function paperio_read_more_callback( $control ) {
			if ( $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style1' || $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style2' || $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style4' ) {
				return true;
			} else {
				return false;
			}
	  	}
  	endif;

  	if ( ! function_exists( 'paperio_hide_arrow_callback' ) ) :
	  	function paperio_hide_arrow_callback( $control ) {
			if ( $control->manager->get_setting('tz_featured_area_style')->value() == 'feature-style3' ) {
				return true;
			} else {
				return false;
			}
	  	}
  	endif;

  	/* End Callback Fanctions */