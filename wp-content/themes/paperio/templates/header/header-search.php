<?php
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	$tz_disable_search_header = get_theme_mod( 'tz_disable_search_header', 0 ); 
	$tz_header_right_sidebar = get_theme_mod( 'tz_header_right_sidebar', '' );
	$tz_disable_header_right_sidebar = get_theme_mod( 'tz_disable_header_right_sidebar', 0 ); 
	$tz_header_right_sidebar_class = ($tz_disable_header_right_sidebar == 1 && $tz_disable_search_header == 1 ) ? 'header-right-sidebar' : 'search-box';
	
	echo '<div class="col-md-4 col-sm-4 col-xs-6 fl-right '.$tz_header_right_sidebar_class.'">';
		if( $tz_disable_search_header != 1 ) {
			get_search_form();
		} else {
			if ( !empty( $tz_header_right_sidebar ) && $tz_disable_header_right_sidebar == 1 ) {
				dynamic_sidebar( $tz_header_right_sidebar );
			}
		}
	echo '</div>';
	