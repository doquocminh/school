<?php

	/* Exit if accessed directly. */
	if ( !defined( 'ABSPATH' ) ) { exit; }
	

  	/* Hide Sticky Post */

    $wp_customize->add_setting( 'tz_hide_sticky_post', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_sticky_post', array(
		'label'       		=> esc_attr__( 'Hide Sticky Post', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_hide_sticky_post',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Sticky Post */

	/* Featured Image Size */

    $wp_customize->add_setting( 'tz_sticky_blog_layout_feature_image', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_sticky_blog_layout_feature_image', array(
		'label'       		=> esc_attr__( 'Featured Image Size', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_sticky_blog_layout_feature_image',
		'type'              => 'select',
		'choices'           => paperio_feature_image_size(),
	) ) );

	/* End Featured Image Size */

  	/* Hide Category */

    $wp_customize->add_setting( 'tz_hide_sticky_blog_category', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_sticky_blog_category', array(
		'label'       		=> esc_attr__( 'Hide Category', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_hide_sticky_blog_category',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Category */

	/* Hide Date */

    $wp_customize->add_setting( 'tz_hide_sticky_blog_date', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_sticky_blog_date', array(
		'label'       		=> esc_attr__( 'Hide Date', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_hide_sticky_blog_date',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* Hide Date */

  	/* Date Format */

	$wp_customize->add_setting('tz_sticky_blog_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_sticky_blog_date_format', array(
		'label'       		=> esc_attr__( 'Date Format', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_sticky_blog_date_format',
		'type'		        => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'paperio' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'paperio_hide_sticky_post_date_callback',
	) ));

	/* End Date Format */

	/* Hide First Post Excerpt */

    $wp_customize->add_setting( 'tz_hide_sticky_blog_post_excerpt', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_sticky_blog_post_excerpt', array(
		'label'       		=> esc_attr__( 'Hide Post Excerpt', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_hide_sticky_blog_post_excerpt',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

    /* End Hide Post Excerpt */

	/* Post Excerpt Length */

    $wp_customize->add_setting( 'tz_sticky_blog_post_excerpt_length', array(
		'default' 			=> '78',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_sticky_blog_post_excerpt_length', array(
		'label'       		=> esc_attr__( 'Post Excerpt Length', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_sticky_blog_post_excerpt_length',
		'type'              => 'text',
		'active_callback'   => 'paperio_hide_sticky_post_excerpt_length_callback',
	) ) );

	/* End Post Excerpt Length */

	/* Hide Author */

    $wp_customize->add_setting( 'tz_hide_sticky_blog_author', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_sticky_blog_author', array(
		'label'       		=> esc_attr__( 'Hide Author', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_hide_sticky_blog_author',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Author */

	/* Hide Read More Button */

    $wp_customize->add_setting( 'tz_hide_sticky_blog_read_more', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_sticky_blog_read_more', array(
		'label'       		=> esc_attr__( 'Hide Read More Button', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_hide_sticky_blog_read_more',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Read More Button */

	/* Read More Button Text */

	$wp_customize->add_setting('tz_general_sticky_blog_button_text', array(
		'default' 			=> 'Read More',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_general_sticky_blog_button_text', array(
		'label'       		=> esc_attr__( 'Button Text', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_general_sticky_blog_button_text',
		'type'		        => 'text',
		'active_callback'   => 'paperio_sticky_post_read_more_callback',
	) ));

	/* End Read More Button Text */

	/* Hide Comment Link */

    $wp_customize->add_setting( 'tz_hide_sticky_blog_comment_link', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_sticky_blog_comment_link', array(
		'label'       		=> esc_attr__( 'Hide Comment Link', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_hide_sticky_blog_comment_link',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Comment Link */

	/* Hide Like Button */

    $wp_customize->add_setting( 'tz_hide_sticky_blog_like', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_sticky_blog_like', array(
		'label'       		=> esc_attr__( 'Hide Like', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_hide_sticky_blog_like',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Like Button */

	/* Hide Post Format Icon */

    $wp_customize->add_setting( 'tz_hide_sticky_blog_post_format', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_hide_sticky_blog_post_format', array(
		'label'       		=> esc_attr__( 'Hide Post Format Icon', 'paperio' ),
		'section'     		=> 'tz_add_general_sticky_posts_section',
		'settings'			=> 'tz_hide_sticky_blog_post_format',
		'type'              => 'radio',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'paperio' ),
								  	'0' => esc_html__( 'No', 'paperio' ),
							   ),
	) ) );

	/* End Hide Post Format Icon */

	/* Separator setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Paperio_Customize_Separator_Control( $wp_customize, 'tz_general_sticky_posts_separator', array(
	    'label'      		=> esc_attr__( 'Font & Color Settings', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'   		=> 'tz_general_sticky_posts_separator',
	) ) );

	/* End Separator setting */

	/* Box Background Color Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_box_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_sticky_posts_box_color', array(
	    'label'      		=> esc_attr__( 'Box Background Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_box_color',
	) ) );

	/* End Box Background Color Setting */

	/* Box Border Color Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_box_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_sticky_posts_box_border_color', array(
	    'label'      		=> esc_attr__( 'Box Border Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_box_border_color',
	) ) );

	/* End Box Border Color Setting */

	/* Title font size Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_sticky_posts_title_font_size', array(
	    'label'      		=> esc_attr__( 'Title Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Title font size Setting */

	/* Title line height Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_sticky_posts_title_line_height', array(
	    'label'      		=> esc_attr__( 'Title line height', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_title_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Title line height Setting */

	/* Title character spacing Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_title_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_sticky_posts_title_character_spacing', array(
	    'label'      		=> esc_attr__( 'Title Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_title_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Title character spacing Setting */

	/* Title Color Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_sticky_posts_title_color', array(
	    'label'      		=> esc_attr__( 'Title Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_title_color',
	) ) );

	/* End Title Color Setting */

	/* Title Hover Color Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_sticky_posts_title_hover_color', array(
	    'label'      		=> esc_attr__( 'Title Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_title_hover_color',
	) ) );

	/* End Title Hover Color Setting */

	/* Meta font size Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_meta_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_sticky_posts_meta_font_size', array(
	    'label'      		=> esc_attr__( 'Meta Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_meta_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Meta font size Setting */

	/* Meta line height Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_meta_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_sticky_posts_meta_line_height', array(
	    'label'      		=> esc_attr__( 'Meta Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_meta_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Meta line height Setting */

	/* Meta character spacing Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_meta_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_sticky_posts_meta_character_spacing', array(
	    'label'      		=> esc_attr__( 'Meta Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_meta_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Meta character spacing Setting */

	/* Meta Color Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_meta_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_sticky_posts_meta_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_meta_color',
	) ) );

	/* End Meta Color Setting */

	/* Meta Hover Color Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_meta_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_sticky_posts_meta_hover_color', array(
	    'label'      		=> esc_attr__( 'Meta Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_meta_hover_color',
	) ) );

	/* End Meta Hover Color Setting */

	/* Comment & Like font size Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_comment_and_like_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_sticky_posts_comment_and_like_font_size', array(
	    'label'      		=> esc_attr__( 'Author, Read More, Comment & Like Font Size', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_comment_and_like_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'paperio' ),
	) );

	/* End Comment & Like font size Setting */

	/* Comment & Like line height Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_comment_and_like_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_sticky_posts_comment_and_like_line_height', array(
	    'label'      		=> esc_attr__( 'Author, Read More, Comment & Like Line Height', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_comment_and_like_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'paperio' ),
	) );

	/* End Comment & Like line height Setting */

	/* Comment & Like character spacing Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_comment_and_like_character_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'tz_general_sticky_posts_comment_and_like_character_spacing', array(
	    'label'      		=> esc_attr__( 'Author, Read More, Comment & Like Character Spacing', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_comment_and_like_character_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'paperio' ),
	) );

	/* End Comment & Like character spacing Setting */

	/* Comment & Like Color Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_comment_and_like_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_sticky_posts_comment_and_like_color', array(
	    'label'      		=> esc_attr__( 'Author, Read More, Comment & Like Text Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_comment_and_like_color'
	) ) );

	/* End Comment & Like Color Setting */

	/* Comment & Like Hover Color Setting */

	$wp_customize->add_setting( 'tz_general_sticky_posts_comment_and_like_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tz_general_sticky_posts_comment_and_like_hover_color', array(
	    'label'      		=> esc_attr__( 'Author, Read More, Comment & Like Text Hover Color', 'paperio' ),
	    'section'    		=> 'tz_add_general_sticky_posts_section',
	    'settings'	 		=> 'tz_general_sticky_posts_comment_and_like_hover_color'
	) ) );

	/* End Comment & Like Hover Color Setting */


	/* Custom Callback Functions */

	if ( ! function_exists( 'paperio_hide_sticky_post_date_callback' ) ) :
		function paperio_hide_sticky_post_date_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_hide_sticky_blog_date' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_hide_sticky_post_excerpt_length_callback' ) ) :
		function paperio_hide_sticky_post_excerpt_length_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_hide_sticky_blog_post_excerpt' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'paperio_sticky_post_read_more_callback' ) ) :
		function paperio_sticky_post_read_more_callback( $control ) {
	        if ( $control->manager->get_setting( 'tz_hide_sticky_blog_read_more' )->value() != 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	
	/* End Custom Callback Functions */
