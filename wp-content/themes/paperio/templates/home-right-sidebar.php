<?php
/**
 * Displaying right sidebar for Home pages
 *
 * @package Paperio
 */
?>
<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	/* Define null variables */
	$output = '';
	/* Get blog layout type */
	$tz_general_blog_layout = get_theme_mod( 'tz_general_blog_layout', 'blog-layout-two' );
	/* Get blog sidebar type */
	$tz_sidebar_style = get_theme_mod( 'tz_sidebar_style', 'sidebar-style1' );
	/* Get blog column type */
	$tz_home_layout = get_theme_mod( 'tz_home_layout', 'paperio_home_full_screen_12col' );
	/* Get blog right sidebar */
	$tz_home_right_sidebar = get_theme_mod( 'tz_home_right_sidebar' );
	/* Get blog left sidebar */
	$tz_home_left_sidebar = get_theme_mod( 'tz_home_left_sidebar', '' );

	switch ($tz_home_layout) {
		case 'paperio_home_full_screen_12col':
			echo '</div>';
		break;

		case 'paperio_home_left_sidebar':
			echo '</div>';
			echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar pull-left '.esc_attr( $tz_sidebar_style ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				paperio_sidebar_style( $tz_home_left_sidebar );
			echo '</div>';
		break;

		case 'paperio_home_right_sidebar':
			echo '</div>';
			echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar '.esc_attr( $tz_sidebar_style ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				paperio_sidebar_style( $tz_home_right_sidebar );
			echo '</div>';
		break;
	}