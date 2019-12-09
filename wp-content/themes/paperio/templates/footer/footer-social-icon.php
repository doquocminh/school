<?php

	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Check if footer social icon show / hide */
	$tz_disable_footer_social = get_theme_mod( 'tz_disable_footer_social', 0 );
	/* Check if footer social icon text show / hide */
	$tz_disable_footer_social_text = get_theme_mod( 'tz_disable_footer_social_text', 0 );
	/* Check social icon target */
	$tz_disable_footer_social_target = get_theme_mod( 'tz_disable_footer_social_target', 0 );
	/* Get facebook link */
	$tz_footer_facebook = get_theme_mod( 'tz_footer_facebook', '' );
	/* Get twitter link */
	$tz_footer_twitter = get_theme_mod( 'tz_footer_twitter', '' );
	/* Get google plus link */
	$tz_footer_gplus = get_theme_mod( 'tz_footer_gplus', '' );
	/* Get linkedin profile link */
	$tz_footer_linkedin = get_theme_mod( 'tz_footer_linkedin', '' );
	/* Get instagram link */
	$tz_footer_instagram = get_theme_mod( 'tz_footer_instagram', '' );
	/* Get pinterest link */
	$tz_footer_pinterest = get_theme_mod( 'tz_footer_pinterest', '' );	
	/* Get rss link */
	$tz_footer_rss = get_theme_mod( 'tz_footer_rss', '' );
	/* Get youtube link */
	$tz_footer_youtube = get_theme_mod( 'tz_footer_youtube', '' );
	/* Get bloglovin link */
	$tz_footer_bloglovin = get_theme_mod( 'tz_footer_bloglovin', '' );
	/* Get tumblr link */
	$tz_footer_tumblr = get_theme_mod( 'tz_footer_tumblr', '' );	
	/* Get dribbble link */
	$tz_footer_dribbble = get_theme_mod( 'tz_footer_dribbble', '' );
	/* Get soundcloud link */
	$tz_footer_soundcloud = get_theme_mod( 'tz_footer_soundcloud', '' );
	/* Get vimeo link */
	$tz_footer_vimeo = get_theme_mod( 'tz_footer_vimeo', '' );
	/* Get flickr link */
	$tz_footer_flickr = get_theme_mod( 'tz_footer_flickr', '' );
	/* Get Custom link */
	$tz_footer_custom_link = get_theme_mod( 'tz_footer_custom_link', '' );
	/* Check footer style */
	$tz_footer_style = get_theme_mod( 'tz_footer_style', 'footer-style-one' );

	if( $tz_disable_footer_social == 1 ) :
		return;
	endif;

   	if( $tz_footer_facebook || $tz_footer_twitter || $tz_footer_gplus || $tz_footer_linkedin || $tz_footer_instagram || $tz_footer_pinterest || $tz_footer_rss  || $tz_footer_youtube || $tz_footer_bloglovin || $tz_footer_tumblr || $tz_footer_dribbble || $tz_footer_soundcloud || $tz_footer_vimeo || $tz_footer_flickr || $tz_footer_custom_link ) {

   		$tz_show_social_text = true;
   		$tz_show_social_text_class = '';
	   	if( $tz_disable_footer_social_text == 1 ){
	   		$tz_show_social_text = false;
	   		$tz_show_social_text_class = ' class="social-icon-no-text"';
	   	}

	   	$tz_footer_social_order = paperio_social_icon_order( 'tz_footer_social_order' );
	   	
   		//Sorting Social Icon in Asscending Order
   		$order = range( 1, count( $tz_footer_social_order ) );
        array_multisort( $tz_footer_social_order, SORT_ASC, $order, SORT_ASC );
	   
	   	
	$tz_disable_footer_social_target = ( $tz_disable_footer_social_target == 1 ) ? '_blank' : '_self';

	$tz_footer_style_class = ( $tz_footer_style == 'footer-style-two' ) ? ' social-link-style' : ' col-md-12 col-sm-12 col-xs-12 margin-three-bottom xs-margin-ten-bottom';
    echo '<div class="social-link'.esc_attr( $tz_footer_style_class ).'">';
		echo '<ul'.$tz_show_social_text_class.'>';

			foreach( $tz_footer_social_order as $key => $value ) {
				switch( $key ) {

					case 'facebook':
						/* Check facebook link show / hide */
					    if( $tz_footer_facebook ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_facebook ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fab fa-facebook-f social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Facebook', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
						}
					break;
					case 'twitter':
						/* Check twitter link show / hide */
						if( $tz_footer_twitter ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_twitter ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
							    	echo '<i class="fab fa-twitter social-icon-fa"></i>';
							    	if( $tz_show_social_text == true ) {
							    		echo '<span class="alt-font text-uppercase">'.esc_html__( 'Twitter', 'paperio' ).'</span>';
							    	}
						    	echo '</a>';
						    echo '</li>';
						}
					break;

					case 'gplus':
					    /* Check google plus link show / hide */
				        if( $tz_footer_gplus ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_gplus ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fab fa-google-plus-g social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Google plus', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					    }
					break;

					case 'linkedin':
						/* Check if linkedin profile link show / hide */
						if( $tz_footer_linkedin ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_linkedin ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fab fa-linkedin-in social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Linkedin', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					  	}
					break;

					case 'instagram':
						/* Check instagram link show / hide */
					    if( $tz_footer_instagram ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_instagram ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fab fa-instagram social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Instagram', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					    }
					break;

					case 'pinterest':
						/* Check pinterest link show / hide */
				        if( $tz_footer_pinterest ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_pinterest ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fab fa-pinterest-p social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Pinterest', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					    }
					break;					

					case 'rss':
					    /* Check rss link show / hide */
				        if( $tz_footer_rss ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_rss ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fas fa-rss social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Rss', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					  	}
					break;

					case 'youtube':
						/* Check youtube link show / hide */
						if( $tz_footer_youtube ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_youtube ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fab fa-youtube social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Youtube', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					  	}
					break;

					case 'bloglovin':
					  	/* Check bloglovin link show / hide */
				        if( $tz_footer_bloglovin ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_bloglovin ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fas fa-heart social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Bloglovin', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					  	}
					break;

					case 'tumblr':
						/* Check tumblr link show / hide */
						if( $tz_footer_tumblr ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_tumblr ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fab fa-tumblr social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Tumblr', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					  	}
					break;					

					case 'dribbble':
						/* Check dribbble link show / hide */
						if( $tz_footer_dribbble ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_dribbble ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fab fa-dribbble social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Dribbble', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					  	}
					break;

					case 'soundcloud':
						/* Check soundcloud link show / hide */
						if( $tz_footer_soundcloud ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_soundcloud ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fab fa-soundcloud social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Soundcloud', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					  	}
					break;

					case 'vimeo':
						/* Check if vimeo link show / hide */
						if( $tz_footer_vimeo ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_vimeo ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fab fa-vimeo-v social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Vimeo', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					  	}
					break;

					case 'flickr':
						/* Check if flickr link show / hide */
						if( $tz_footer_flickr ) {
						    echo '<li>';
						    	echo '<a href="'.esc_url( $tz_footer_flickr ).'" target="'.esc_attr( $tz_disable_footer_social_target ).'">';
						    		echo '<i class="fab fa-flickr social-icon-fa"></i>';
						    		if( $tz_show_social_text == true ) {
						    			echo '<span class="alt-font text-uppercase">'.esc_html__( 'Flickr', 'paperio' ).'</span>';
						    		}
						    	echo '</a>';
						    echo '</li>';
					  	}
					break;
					
				}
			}

		  	/* Check if Custom link show / hide */
			if( $tz_footer_custom_link ) {
				echo paperio_sanitize_textarea( $tz_footer_custom_link, '' );
			}

		echo '</ul>';
	echo '</div>';
}