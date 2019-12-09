<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Paperio
 */
get_header();

	if ( ( is_home() ) ) :
		$tz_home_content_container_fluid = '';
		$tz_home_enable_container_fluid = get_theme_mod( 'tz_home_enable_container_fluid', 'no' );
		if( isset( $tz_home_enable_container_fluid ) && $tz_home_enable_container_fluid == 'yes' ){
	        $tz_home_content_container_fluid .= 'container-fluid';
	    } else {
	        $tz_home_content_container_fluid .= 'container';
	    }
		
		echo '<section>';
			echo '<div class="'.esc_attr( $tz_home_content_container_fluid ).'">';
				echo '<div class="row">';
					get_template_part( 'templates/blog-layout/blog', 'layout' );
				echo '</div>';
			echo '</div>';
		echo '</section>';

	endif;

get_footer();