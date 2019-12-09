<?php
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Define null variable */
	$tz_logo_bg_class = $tz_class = '';
	$tz_h1_logo_font_page = get_theme_mod( 'tz_h1_logo_font_page', '0' );
	$tz_site_logo = get_theme_mod( 'tz_site_logo', '' );
	$tz_site_logo_light = get_theme_mod( 'tz_site_logo_light', '' );
	$tz_site_logo_ratina = get_theme_mod( 'tz_site_logo_ratina', '' );
	$tz_site_logo_ratina_light = get_theme_mod( 'tz_site_logo_ratina_light', '' );
	$tz_header_type = get_theme_mod( 'tz_header_type', 'header-style1' );
	/* For "header-style1" add bg color class */
	switch( $tz_header_type ) {
		case 'header-style1':
			$tz_logo_bg_class .= 'bg-white';
		break;
	}
	$tz_site_logo_class = ( !$tz_site_logo && !$tz_site_logo_light ) ? ' logo-blog-title' : '';	
	$tz_logo_class = ( ( $tz_site_logo && !$tz_site_logo_light ) || ( !$tz_site_logo && $tz_site_logo_light ) ) ? ' logo-single' : '';	
	if( $tz_site_logo_class || $tz_logo_bg_class ){
		$tz_class = ' class="'.esc_attr( $tz_logo_bg_class ).esc_attr( $tz_site_logo_class ).'"';
	}	

	echo '<div class="col-md-4 text-center no-padding">';
	    echo '<div class="logo'.$tz_logo_class.'">';
	    	if( ( is_front_page() || is_home() ) && $tz_h1_logo_font_page == '1' ) {
                echo '<h1 class="logo-title">';
            }
	        echo '<a href="'.esc_url( home_url("/") ).'" rel="home" itemprop="url"'.$tz_class.'>';
	        	if( $tz_site_logo || $tz_site_logo_light ) {

                    /** Logo Dark */
                    if( $tz_site_logo ) {                            
                        echo '<img class="logo-light" src="'.esc_url( $tz_site_logo ).'" alt="'.get_bloginfo( "name" ).'" data-no-lazy="1">';
                    }                   

                    if( !empty( $tz_site_logo_ratina ) ) {                       
                        echo '<img class="retina-logo-light" src="'.esc_url( $tz_site_logo_ratina ).'" alt="'.get_bloginfo( "name" ).'" data-no-lazy="1">';                            
                    }else{
                    	if( $tz_site_logo ) {                     		
                    		echo '<img class="retina-logo-light" src="'.esc_url( $tz_site_logo ).'" alt="'.get_bloginfo( "name" ).'" data-no-lazy="1">';
                    	}
                    }

                    /** Logo Light */
                    if( $tz_site_logo_light ) {                           
                        echo '<img class="logo-dark" src="'.esc_url( $tz_site_logo_light ).'" alt="'.get_bloginfo( "name" ).'" data-no-lazy="1">'; 
                    }
               
                    if( !empty( $tz_site_logo_ratina_light ) ) {                           
                        echo '<img class="retina-logo-dark" src="'.esc_url( $tz_site_logo_ratina_light ).'" alt="'.get_bloginfo( "name" ).'" data-no-lazy="1">';
                    }else{
                    	if( $tz_site_logo_light ) { 
                    		echo '<img class="retina-logo-dark" src="'.esc_url( $tz_site_logo_light ).'" alt="'.get_bloginfo( "name" ).'" data-no-lazy="1">';
                    	}
                    }
                                       
                }else{
                  echo '<span class="site-title">'.get_bloginfo( "name" ).'</span>';
                }
	        echo '</a>';
	        if( ( is_front_page() || is_home() ) && $tz_h1_logo_font_page == '1' ) {
                echo '</h1>';
            }
	    echo '</div>';
	echo '</div>';