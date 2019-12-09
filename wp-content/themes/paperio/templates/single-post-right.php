<?php
/**
 * Displaying right sidebar for single posts
 *
 * @package Paperio
 */
?>
<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	$tz_single_post_layout_setting = paperio_option( 'tz_single_post_layout_setting', 'paperio_layout_full_screen_12col' );
	$tz_single_post_left_sidebar = paperio_option( 'tz_single_post_left_sidebar', '' );
	$tz_single_post_right_sidebar = paperio_option( 'tz_single_post_right_sidebar', '' );
	$tz_sidebar_style = get_theme_mod( 'tz_sidebar_style', 'sidebar-style1' );

	switch( $tz_single_post_layout_setting ) {
		case 'paperio_layout_full_screen_12col':
			echo '</div>';
		break;

		case 'paperio_layout_left_sidebar':
			echo '</div>';
			echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar pull-left '.esc_attr( $tz_sidebar_style ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				paperio_sidebar_style( $tz_single_post_left_sidebar );
			echo '</div>';
		break;

		case 'paperio_layout_right_sidebar':
			echo '</div>';
			echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar '.esc_attr( $tz_sidebar_style ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				paperio_sidebar_style( $tz_single_post_right_sidebar );
			echo '</div>';
		break;

		case 'paperio_layout_both_sidebar':
			echo '</div>';
		break;
	}