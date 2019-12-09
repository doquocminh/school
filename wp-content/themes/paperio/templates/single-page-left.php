<?php
/**
 * Displaying left template for single page
 *
 * @package Paperio
 */
?>
<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	$tz_page_layout_setting = paperio_option( 'tz_page_layout_setting', 'paperio_layout_full_screen_12col' );
	$tz_page_left_sidebar = paperio_option( 'tz_page_left_sidebar', '' );
	$tz_sidebar_style = get_theme_mod( 'tz_sidebar_style', 'sidebar-style1' );

	switch( $tz_page_layout_setting ) {
		case 'paperio_layout_full_screen_12col':
			echo '<div class="col-md-12 col-sm-12 col-xs-12">';
		break;

		case 'paperio_layout_left_sidebar':
			echo '<div class="col-md-9 col-sm-8 col-xs-12 padding-left-35 sm-padding-left-15 sm-margin-six-bottom xs-margin-ten-bottom pull-right">';
		break;

		case 'paperio_layout_right_sidebar':
			echo '<div class="col-md-9 col-sm-8 col-xs-12 padding-right-35 sm-padding-right-15 sm-margin-six-bottom xs-margin-ten-bottom">';
		break;
	}