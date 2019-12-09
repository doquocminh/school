<?php
/**
 * Displaying left sidebar for Home pages
 *
 * @package Paperio
 */
?>
<?php

	/* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Define null variables */
	$output = $extra_class = $enable_container_fluid_no_padding = '';
	/* Get blog layout type */
	$tz_general_blog_layout = get_theme_mod( 'tz_general_blog_layout', 'blog-layout-two' );
	/* Get blog sidebar type */
	$tz_sidebar_style = get_theme_mod( 'tz_sidebar_style', 'sidebar-style1' );
	/* Get blog column type */
	$tz_home_layout = get_theme_mod( 'tz_home_layout', 'paperio_home_full_screen_12col' );
	/* Get blog left sidebar */
	$tz_home_left_sidebar = get_theme_mod( 'tz_home_left_sidebar', '' );
	/* Get blog pagination style */
	$tz_general_pagination_style = get_theme_mod( 'tz_general_pagination_style', 'old-new-pagination' );
	/* check if blog layout six and pagination style infinite-scroll then add class */

	$tz_general_blog_layout_array = array( 'blog-layout-one', 'blog-layout-two', 'blog-layout-three', 'blog-layout-four', 'blog-layout-seven' );
	$tz_general_pagination_style = ( $tz_general_pagination_style == 'infinite-scroll-pagination' && in_array( $tz_general_blog_layout, $tz_general_blog_layout_array ) ) ? ' '.$tz_general_pagination_style : '';


	/* Get container style for blog */
	$tz_home_enable_container_fluid = get_theme_mod( 'tz_home_enable_container_fluid', 'no' );
	/* check if blog layout seven and container style fluid then add no-padding class */
	$enable_container_fluid_no_padding = ( ( $tz_home_enable_container_fluid == 'yes' ) && ( $tz_general_blog_layout == 'blog-layout-seven' ) ) ? ' no-padding' : '';

	/* Add extra class base on blog layout */
	switch( $tz_general_blog_layout ) {
        
        case 'blog-layout-one':
            $extra_class .= ' blog-listing-style1';
        break;

        case 'blog-layout-two':
            $extra_class .= ' blog-listing-style2';
        break;

        case 'blog-layout-three':
           $extra_class .= ' blog-listing-style3';
        break;

        case 'blog-layout-four':
            $extra_class .= ' blog-listing-style4 padding-lr-8';
        break;

        case 'blog-layout-five':
            $extra_class .= ' blog-listing-style5';
        break;

        case 'blog-layout-six':
        	/* Get blog layout type for "blog-layout-six" */
    		$tz_general_blog_layout_column_type = get_theme_mod( 'tz_general_blog_layout_column_type', 'blog-masonry-three-column' );

        	$extra_class .= ' blog-listing-style6 '.esc_attr( $tz_general_blog_layout_column_type );
        break;

        case 'blog-layout-seven':
            $extra_class .= ' special-blog-listing-style7';
        break;

        default:
        break;
        
    }

	switch( $tz_home_layout ) {
		case 'paperio_home_full_screen_12col':
			echo '<div class="col-md-12 col-sm-12 col-xs-12'.esc_attr( $tz_general_pagination_style ).esc_attr( $extra_class ).esc_attr( $enable_container_fluid_no_padding ).'">';
		break;

		case 'paperio_home_left_sidebar':
			echo '<div class="col-md-9 col-sm-8 col-xs-12 padding-left-35 sm-padding-right-15 pull-right xs-padding-lr-15 '.esc_attr( $tz_general_pagination_style ).esc_attr( $extra_class ).'">';
		break;

		case 'paperio_home_right_sidebar':
			echo '<div class="col-md-9 col-sm-8 col-xs-12 padding-right-35 sm-padding-right-15'.esc_attr( $tz_general_pagination_style ).esc_attr( $extra_class ).'">';
		break;
	}