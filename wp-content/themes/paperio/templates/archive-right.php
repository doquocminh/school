<?php
/**
 * Displaying right template for archives
 *
 * @package Paperio
 */
?>
<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$tz_layout_settings_single_archive = get_theme_mod( 'tz_layout_settings_single_archive', 'paperio_layout_full_screen_12col' );
$tz_layout_left_sidebar_single_archive = get_theme_mod( 'tz_layout_left_sidebar_single_archive', '' );
$tz_layout_right_sidebar_single_archive = get_theme_mod( 'tz_layout_right_sidebar_single_archive', '' );
$tz_sidebar_style = get_theme_mod( 'tz_sidebar_style', 'sidebar-style1' );

switch( $tz_layout_settings_single_archive ) {

	case 'paperio_layout_full_screen_12col':
		echo '</div>';
	break;

	case 'paperio_layout_left_sidebar':
		echo '</div>';
		echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar pull-left '.esc_attr( $tz_sidebar_style ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
			paperio_sidebar_style( $tz_layout_left_sidebar_single_archive );
		echo '</div>';
	break;

	case 'paperio_layout_right_sidebar':
		echo '</div>';
		echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar '.esc_attr( $tz_sidebar_style ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
			paperio_sidebar_style( $tz_layout_right_sidebar_single_archive );
		echo '</div>';
	break;

	case 'paperio_layout_both_sidebar':
		echo '</div>';
	break;
}