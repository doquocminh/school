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

	/* Check if footer social icon show / hide */
	$tz_disable_footer_social = get_theme_mod( 'tz_disable_footer_social', 0 );
	$tz_disable_footer_border = get_theme_mod( 'tz_disable_footer_border', 0 );
	$tz_footer_style = get_theme_mod( 'tz_footer_style', 'footer-style-one' );
	$tz_footer_container_fluid = get_theme_mod( 'tz_footer_container_fluid', 'yes' );
	$tz_footer_sidebar1 = get_theme_mod( 'tz_footer_sidebar1', '' );
	$tz_footer_sidebar2 = get_theme_mod( 'tz_footer_sidebar2', '' );
	$tz_footer_sidebar3 = get_theme_mod( 'tz_footer_sidebar3', '' );
	$tz_footer_bottom_container_style = get_theme_mod( 'tz_footer_bottom_container_style', 'no' );
	$tz_footer_copyright = get_theme_mod( 'tz_footer_copyright', '' );
	$tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
	$footer_bg_color = ( $tz_theme_type == 'theme-fast-red' ) ? ' bg-black' : ' bg-white';
	$tz_disable_footer_border_top = ( $tz_disable_footer_border != 1 ) ? ' border-top-mid-gray margin-two-top' : '';

	$tz_set_footer_container_fluid = '';
	if( isset( $tz_footer_container_fluid ) && $tz_footer_container_fluid == 'yes' ){
	    $tz_set_footer_container_fluid .= 'container-fluid';
	} else {
	    $tz_set_footer_container_fluid .= 'container';
	}
	$tz_set_footer_bottom_container_style = '';
	if( isset( $tz_footer_bottom_container_style ) && $tz_footer_bottom_container_style == 'yes' ){
	    $tz_set_footer_bottom_container_style .= 'container-fluid';
	} else {
	    $tz_set_footer_bottom_container_style .= 'container';
	}
	$tz_set_policy_page = false;
	$tz_policy_page_id = (int) get_option( 'wp_page_for_privacy_policy' );
	if ( ! empty( $tz_policy_page_id ) && get_post_status( $tz_policy_page_id ) === 'publish' ) {							
		$tz_set_policy_page = true;
	}

	switch( $tz_footer_style ) {
		case 'footer-style-two':
			echo '<div class="container-fluid footer-bg">';
			echo '<div class="row">';
	        	echo '<div class="'.esc_attr( $tz_set_footer_container_fluid ).' no-padding padding-four-top margin-three-bottom sm-margin-two-bottom">';

	        		$sidebar_counter = 0;
	        		if ( is_active_sidebar( $tz_footer_sidebar1 ) ) {
	        			$sidebar_counter++;	        			
	        		}
	        		if ( is_active_sidebar( $tz_footer_sidebar2 ) ) {
	        			$sidebar_counter++;
	        		}
	        		if ( is_active_sidebar( $tz_footer_sidebar3 ) ) {
	        			$sidebar_counter++;
	        		}


	        		switch( $sidebar_counter ) {
	        			case '3':
	        				if ( is_active_sidebar( $tz_footer_sidebar1 ) ) {
			        			echo '<div class="col-md-4 col-sm-12 col-xs-12 sm-margin-top-30 footer-three-sidebar xs-no-margin-top">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar1 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar2 ) ) {
			        			echo '<div class="col-md-4 col-sm-12 col-xs-12 sm-margin-top-30 footer-three-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar2 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar3 ) ) {
			        			echo '<div class="col-md-4 col-sm-12 col-xs-12 sm-margin-top-30 footer-three-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar3 );
		        				echo '</div>';
			        		}
	        			break;

	        			case '2':
	        				if ( is_active_sidebar( $tz_footer_sidebar1 ) ) {
			        			echo '<div class="col-md-6 col-sm-12 col-xs-12 sm-margin-top-30 footer-two-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar1 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar2 ) ) {
			        			echo '<div class="col-md-6 col-sm-12 col-xs-12 sm-margin-top-30 footer-two-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar2 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar3 ) ) {
			        			echo '<div class="col-md-6 col-sm-12 col-xs-12 sm-margin-top-30 footer-two-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar3 );
		        				echo '</div>';
			        		}
	        			break;
	        			
	        			default:
	        				if ( is_active_sidebar( $tz_footer_sidebar1 ) ) {
			        			echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding footer-one-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar1 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar2 ) ) {
			        			echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding footer-one-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar2 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar3 ) ) {
			        			echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding footer-one-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar3 );
		        				echo '</div>';
			        		}
	        			break;
	        		}
				echo '</div>';
			echo '</div>';
			echo '<div class="row footer-border'.$tz_disable_footer_border_top.'">';
	        	echo '<div class="'.esc_attr( $tz_set_footer_container_fluid ).' padding-two-top padding-two-bottom no-padding-lr">';
	        		if( $tz_footer_copyright || $tz_set_policy_page ) {
	        			if( $tz_disable_footer_social == 1 ){
	        				echo '<div class="no-padding text-center clear-both">';
	        			}else{
		        			echo '<div class="col-md-6 col-sm-12 col-xs-12 sm-text-center sm-no-padding-top sm-margin-two-bottom">';
		        		}
				        	echo '<div class="text-uppercase text-extra-small letter-spacing-1">';
				        		if( $tz_set_policy_page ) {
				        			echo '<div class="widget widget_text"><div class="textwidget">';
				        			echo wp_kses_post( $tz_footer_copyright );
			        				if ( function_exists( 'the_privacy_policy_link' ) ) {
			        					if( $tz_footer_copyright ){
											the_privacy_policy_link( ' | ', '' );
										} else {
											the_privacy_policy_link( '', '' );
										}
									}
									echo '</div></div>';
				        		} else {
				        			echo the_widget( 'WP_Widget_Text', array( 'text' => $tz_footer_copyright ) );
				        		} 

				        	echo '</div>';
			        	echo '</div>';
			        }
				    if( $tz_disable_footer_social != 1 ) {
				    	if( $tz_footer_copyright || $tz_set_policy_page ) {
	        				echo '<div class="col-md-6 col-sm-12 col-xs-12">';
	        			}else{
		        			echo '<div class="no-padding text-center clear-both">';
		        		}
		    				get_template_part( 'templates/footer/footer-social', 'icon' );
		    			echo '</div>';
	    			}
	    		echo '</div>';
			echo '</div>';
			echo '</div>';
		break;
		
		default:
			if( isset( $tz_footer_container_fluid ) && $tz_footer_container_fluid == 'yes' ){
				echo '<div class="container-fluid padding-three-top xs-padding-ten-top">';
			} else {
				echo '<div class="container-fluid padding-two-top xs-padding-ten-top">';
			}
			echo '<div class="row">';
	        	echo '<div class="'.esc_attr( $tz_set_footer_container_fluid ).'">';
	    			get_template_part( 'templates/footer/footer-social', 'icon' );
	    		echo '</div>';
			echo '</div>';
			$padding_setting = '';
			if( is_active_sidebar( $tz_footer_sidebar1 ) || is_active_sidebar( $tz_footer_sidebar2 ) || is_active_sidebar( $tz_footer_sidebar3 ) ) {
				$padding_setting .= ' padding-two-top';
			}else{
				$padding_setting .= '';
			}
	        echo '<div class="row footer-bg'.esc_attr( $footer_bg_color ).'">';
	        	echo '<div class="'.esc_attr( $tz_set_footer_container_fluid ).' no-padding'.esc_attr( $padding_setting ).'">';

	        		$sidebar_counter = 0;
	        		if ( is_active_sidebar( $tz_footer_sidebar1 ) ) {
	        			$sidebar_counter++;	        			
	        		}
	        		if ( is_active_sidebar( $tz_footer_sidebar2 ) ) {
	        			$sidebar_counter++;
	        		}
	        		if ( is_active_sidebar( $tz_footer_sidebar3 ) ) {
	        			$sidebar_counter++;
	        		}

	        		$tz_footer_sidebar_class = '';
	        		$tz_footer_sidebar_class = ( $tz_footer_container_fluid == 'yes' ) ? ' no-padding' : '';

	        		switch( $sidebar_counter ) {
	        			case '3':
	        				if ( is_active_sidebar( $tz_footer_sidebar1 ) ) {
			        			echo '<div class="col-md-4 col-sm-12 col-xs-12 sm-margin-top-30 footer-three-sidebar xs-no-margin-top">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar1 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar2 ) ) {
			        			echo '<div class="col-md-4 col-sm-12 col-xs-12 sm-margin-top-30 footer-three-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar2 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar3 ) ) {
			        			echo '<div class="col-md-4 col-sm-12 col-xs-12 sm-margin-top-30 footer-three-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar3 );
		        				echo '</div>';
			        		}
	        			break;

	        			case '2':
	        				if ( is_active_sidebar( $tz_footer_sidebar1 ) ) {
			        			echo '<div class="col-md-6 col-sm-12 col-xs-12 sm-margin-top-30 footer-two-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar1 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar2 ) ) {
			        			echo '<div class="col-md-6 col-sm-12 col-xs-12 sm-margin-top-30 footer-two-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar2 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar3 ) ) {
			        			echo '<div class="col-md-6 col-sm-12 col-xs-12 sm-margin-top-30 footer-two-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar3 );
		        				echo '</div>';
			        		}
	        			break;
	        			
	        			default:
	        				if ( is_active_sidebar( $tz_footer_sidebar1 ) ) {
			        			echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding footer-one-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar1 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar2 ) ) {
			        			echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding footer-one-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar2 );
		        				echo '</div>';
			        		}
			        		if ( is_active_sidebar( $tz_footer_sidebar3 ) ) {
			        			echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding footer-one-sidebar">';
		        					paperio_footer_sidebar_style( $tz_footer_sidebar3 );
		        				echo '</div>';
			        		}
	        			break;
	        		}
				echo '</div>';
				echo '<div class="footer-border'.$tz_disable_footer_border_top.'">';
		        	echo '<div class="'.$tz_set_footer_bottom_container_style.'">';
		        		if( $tz_set_policy_page ) {
		        			echo '<div class="row clear-both">';
		        				if( $tz_footer_copyright ) {
						        	echo '<div class="col-sm-6 text-uppercase padding-two-top padding-two-bottom text-extra-small letter-spacing-1 xs-text-center">';
						        	echo the_widget( 'WP_Widget_Text', array( 'text' => $tz_footer_copyright ) );
						        	echo '</div>';
						        }
		        				if ( function_exists( 'the_privacy_policy_link' ) ) {
		        					if( $tz_footer_copyright ) {
										the_privacy_policy_link( '<div class="col-sm-6 text-uppercase text-right padding-two-top padding-two-bottom text-extra-small letter-spacing-1 xs-text-center">', '</div>' );
									} else {
										the_privacy_policy_link( '<div class="col-sm-12 text-uppercase padding-two-top padding-two-bottom text-extra-small letter-spacing-1 xs-no-padding-bottom text-center">', '</div>' );
									}
								}
						    echo '</div>';
		        		} else {
						    echo '<div class="no-padding text-center clear-both">';
						        if( $tz_footer_copyright ) {
						        	echo '<div class="text-uppercase padding-two-top padding-two-bottom text-extra-small letter-spacing-1">';
						        	echo the_widget( 'WP_Widget_Text', array( 'text' => $tz_footer_copyright ) );
						        	echo '</div>';
						        }
						    echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		break;
	}
	echo '<a itemprop="url" rel="home" class="footer-logo display-none" href="'.esc_url( home_url( '/' ) ).'"></a>';