<?php
	
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Check if promotional block is show / hide */
	$tz_disable_promotional_block = get_theme_mod( 'tz_disable_promotional_block', 0 );
	/* Get promotional blockcontainer style */
	$tz_promotional_enable_container_fluid = get_theme_mod( 'tz_promotional_enable_container_fluid', 'no' );
	/* Get promotional block shortcode */
	$tz_promotional_block_shortcode = get_theme_mod( 'tz_promotional_block_shortcode', '' );

	/* Check if promotional block hide / show */
	if( $tz_disable_promotional_block == 1 ) {
		return;
	}

	/* Check for container */
    $tz_promotional_block_content_container_fluid = '';
    if( isset( $tz_promotional_enable_container_fluid ) && $tz_promotional_enable_container_fluid == 'yes' ) {
        $tz_promotional_block_content_container_fluid .= 'container-fluid';
    } else {
        $tz_promotional_block_content_container_fluid .= 'container';
    }
    if( $tz_promotional_block_shortcode ) {
		echo '<section class="margin-four-bottom xs-margin-ten-bottom">';
		    echo '<div class="'.esc_attr( $tz_promotional_block_content_container_fluid ).'">';
		        echo '<div class="row">';
		        	/* Run promotional block shortcode */
					echo do_shortcode( $tz_promotional_block_shortcode );
		        echo '</div>';
		    echo '</div>';
		echo '</section>';
	}