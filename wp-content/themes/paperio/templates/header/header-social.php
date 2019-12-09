<?php
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	$tz_social_icon  		 = get_theme_mod( 'tz_social_icon', 0 );
	$tz_social_icon_target   = get_theme_mod( 'tz_social_icon_target', 0 );
	$tz_social_facebook 	 = get_theme_mod( 'tz_social_facebook', '' );
	$tz_social_twitter 		 = get_theme_mod( 'tz_social_twitter', '' );
	$tz_social_gplus 		 = get_theme_mod( 'tz_social_gplus', '' );
	$tz_social_linkedin 	 = get_theme_mod( 'tz_social_linkedin', '' );
	$tz_social_instagram 	 = get_theme_mod( 'tz_social_instagram', '' );
	$tz_social_pinterest 	 = get_theme_mod( 'tz_social_pinterest', '' );
	$tz_social_rss 			 = get_theme_mod( 'tz_social_rss', '' );
	$tz_social_youtube 		 = get_theme_mod( 'tz_social_youtube', '' );
	$tz_social_bloglovin	 = get_theme_mod( 'tz_social_bloglovin', '' );	
	$tz_social_tumblr 		 = get_theme_mod( 'tz_social_tumblr', '' );	
	$tz_social_dribbble 	 = get_theme_mod( 'tz_social_dribbble', '' );
	$tz_social_soundcloud 	 = get_theme_mod( 'tz_social_soundcloud', '' );
	$tz_social_vimeo 		 = get_theme_mod( 'tz_social_vimeo', '' );
	$tz_social_flickr 		 = get_theme_mod( 'tz_social_flickr', '' );	
	$tz_social_custom_link	 = get_theme_mod( 'tz_social_custom_link', '' );
	$tz_header_left_sidebar  = get_theme_mod( 'tz_header_left_sidebar', '' );
	$tz_disable_header_left_sidebar = get_theme_mod( 'tz_disable_header_left_sidebar', 0 ); 
	$tz_header_left_sidebar_class = ($tz_disable_header_left_sidebar == 1 && $tz_social_icon == 1 ) ? 'header-left-sidebar' : 'social-icon';
	
	
		echo '<div class="col-md-4 col-sm-4 col-xs-6 '.$tz_header_left_sidebar_class.'">';

		if( $tz_social_icon != 1 ) {
			$tz_social_icon_target = ( $tz_social_icon_target == 1 ) ? '_blank' : '_self';
		
			/* Check social icon order */
			$tz_social_order = paperio_social_icon_order( 'tz_social_order' );

		   	/* Sort social icon order */
		   	$order = range( 1, count( $tz_social_order ) );
	        array_multisort( $tz_social_order, SORT_ASC, $order, SORT_ASC );

		   	foreach( $tz_social_order as $key => $value ) {
				switch( $key ) {
					case 'facebook':
						/* Check Faceboox */
					    if( $tz_social_facebook ) {
					        echo '<a href="'.esc_url( $tz_social_facebook ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-facebook-f"></i></a>';
						}
					break;
					case 'twitter':
						/* Check Twitter */
						if( $tz_social_twitter ) {
					        echo '<a href="'.esc_url( $tz_social_twitter ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-twitter"></i></a>';
						}
					break;
					case 'gplus':
						/* Check Google Plus */
				   		if( $tz_social_gplus ) {
					        echo '<a href="'.esc_url( $tz_social_gplus ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-google-plus-g"></i></a>';
					    }
					break;
					case 'linkedin':
					   	/* Check Linkedin */
						if( $tz_social_linkedin ) {
							echo '<a href="'.esc_url( $tz_social_linkedin ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-linkedin-in"></i></a>';
					    }
					break;
					case 'instagram':
					    /* Check Instagram */
						if( $tz_social_instagram ) {
							echo '<a href="'.esc_url( $tz_social_instagram ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-instagram"></i></a>';
					    }
					break;
					case 'pinterest':
					    /* Check Pinterest */
						if( $tz_social_pinterest ) {
					        echo '<a href="'.esc_url( $tz_social_pinterest ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-pinterest-p"></i></a>';
					    }
					break;
					case 'rss':
					    /* Check Rss */
						if( $tz_social_rss ) {
							echo '<a href="'.esc_url( $tz_social_rss ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fas fa-rss"></i></a>';
					    }
					break;
					case 'youtube':
						/* Check Youtube */
						if( $tz_social_youtube ) {
					    	echo '<a href="'.esc_url( $tz_social_youtube ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-youtube"></i></a>';
					    }
					break;
					case 'bloglovin':
					    /* Check Bloglovin */
					    if( $tz_social_bloglovin ) {
					        echo '<a href="'.esc_url( $tz_social_bloglovin ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fas fa-heart"></i></a>';
					    }
					break;			
					case 'tumblr':
					    /* Check Tumblr */
						if( $tz_social_tumblr ) {
							echo '<a href="'.esc_url( $tz_social_tumblr ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-tumblr"></i></a>';
						}
					break;		
					case 'dribbble':
					    /* Check Dribbble */
						if( $tz_social_dribbble ) {
					        echo '<a href="'.esc_url( $tz_social_dribbble ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-dribbble"></i></a>';
					    }
					break;
					case 'soundcloud':
					    /* Check SoundCloud */
						if( $tz_social_soundcloud ) {
					        echo '<a href="'.esc_url( $tz_social_soundcloud ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-soundcloud"></i></a>';
					    }
					break;
					case 'vimeo':
					    /* Check Vimeo */
						if( $tz_social_vimeo ) {
					        echo '<a href="'.esc_url( $tz_social_vimeo ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-vimeo-v"></i></a>';
					    }
					break;
					case 'flickr':
					    /* Check Flickr */
						if( $tz_social_flickr ) {
					        echo '<a href="'.esc_url( $tz_social_flickr ).'" target="'.esc_attr( $tz_social_icon_target ).'"><i class="fab fa-flickr"></i></a>';
					    }
					break;
				}
			}
		    if( $tz_social_custom_link ) {
		    	echo paperio_sanitize_textarea( $tz_social_custom_link, '' );
		    }
		} else {
			if( !empty( $tz_header_left_sidebar ) && $tz_disable_header_left_sidebar == 1 ) {
				dynamic_sidebar( $tz_header_left_sidebar );
			}
		}

		echo '</div>';
	