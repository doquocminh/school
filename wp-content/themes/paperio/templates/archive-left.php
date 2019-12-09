<?php
/**
 * Displaying left template for archives
 *
 * @package Paperio
 */
?>
<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$output = '';
$tz_layout_settings_single_archive = get_theme_mod( 'tz_layout_settings_single_archive', 'paperio_layout_full_screen_12col' );
$tz_layout_left_sidebar_single_archive = get_theme_mod( 'tz_layout_left_sidebar_single_archive', '' );
$tz_layout_right_sidebar_single_archive = get_theme_mod( 'tz_layout_right_sidebar_single_archive', '' );
$tz_sidebar_style = get_theme_mod( 'tz_sidebar_style', 'sidebar-style1' );


switch( $tz_layout_settings_single_archive ) {

	case 'paperio_layout_full_screen_12col':
		echo '<div class="col-md-12 col-sm-12 col-xs-12">';
	break;

	case 'paperio_layout_left_sidebar':
		echo '<div class="col-md-9 col-sm-8 col-xs-12 padding-left-35 sm-padding-left-15 sm-margin-six-bottom xs-margin-five-bottom pull-right">';
	break;

	case 'paperio_layout_right_sidebar':
		echo '<div class="col-md-9 col-sm-8 col-xs-12 padding-right-35 sm-padding-right-15 sm-margin-six-bottom xs-margin-five-bottom">';
	break;

	case 'paperio_layout_both_sidebar':
		echo '<div id="secondary-left" class="col-md-3 col-sm-6 col-xs-12 sidebar pull-left '.esc_attr( $tz_sidebar_style ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
			paperio_sidebar_style( $tz_layout_left_sidebar_single_archive );
		echo '</div>';
        echo '<div id="secondary-right" class="col-md-3 col-sm-6 col-xs-12 sidebar pull-right '.esc_attr( $tz_sidebar_style ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
			paperio_sidebar_style( $tz_layout_right_sidebar_single_archive );
		echo '</div>';
		echo '<div class="col-md-6 col-sm-12 col-xs-12">';
	break;
}

if ( is_tag() ) {
	the_archive_description( '<div class="archive-description">', '</div>' );
}