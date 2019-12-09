<?php
/**
 * The template for displaying the footer
 *
 * @package Paperio
 */
?>
<?php

	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }
	
	$tz_footer_scrolltoleft = get_theme_mod( 'tz_footer_scrolltoleft', 0 ); 
	$tz_footer_left_scrolltotop_class = ( $tz_footer_scrolltoleft == 1 ) ? ' scrolltop-left' : '';

	$tz_footer_scrolltotop = get_theme_mod( 'tz_footer_scrolltotop', 0 );
	// Enable / Disable Footer
	$tz_disable_footer = get_theme_mod( 'tz_disable_footer', 0 );
	$tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
	$footer_bg_color = ( $tz_theme_type != 'theme-fast-red' ) ? ' bg-white' : '';
	if( $tz_disable_footer != 1 ) {
		echo'<section id="colophon" class="border-footer site-footer'.esc_attr( $footer_bg_color ).'" itemscope="itemscope" itemtype="http://schema.org/WPFooter">';
		    get_template_part( 'templates/footer/content' );
		echo '</section>';
	}
	if( $tz_footer_scrolltotop != 1 ) {
		echo '<a href="#" class="btn back-to-top btn-dark btn-fixed-bottom'.$tz_footer_left_scrolltotop_class.'">';
			echo '<i class="fas fa-angle-up"></i>';
		echo '</a>';
	}

	wp_footer();
?>
</body>
</html>