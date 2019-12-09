<?php

    // Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Check if 404 page image set ot not */
    $tz_page_not_found_image = get_theme_mod( 'tz_page_not_found_image', '' );
    /* Get 404 page title */
    $tz_page_not_found_title = get_theme_mod( 'tz_page_not_found_title', '' );
    /* Get 404 page subtitle */
    $tz_page_not_found_subtitle = get_theme_mod( 'tz_page_not_found_subtitle', '' );
    /* Check if button hide / show */
    $tz_page_not_found_button = get_theme_mod( 'tz_page_not_found_button', '' ); 
    /* Get button text */
    $tz_page_not_found_button_text = get_theme_mod( 'tz_page_not_found_button_text', 'Go to home page' );
    /* Get button url */
    $tz_page_not_found_button_url = get_theme_mod( 'tz_page_not_found_button_url', '' );
    /* Check if search hide / show */
    $tz_page_not_found_search = get_theme_mod( 'tz_page_not_found_search', 0 );
    /* Check if search placeholder text */
    $tz_page_not_found_search_placeholder = get_theme_mod( 'tz_page_not_found_search_placeholder', 'Search Here...' );

    $tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
    $theme_button_color = ( $tz_theme_type == 'theme-fast-red' ) ? ' btn-double-border' : '';
    $theme_title_color = ( $tz_theme_type == 'theme-fast-red' ) ? ' text-gray' : ' text-black';
    
    $background_color = ( ! $tz_page_not_found_image ) ? ' without-bg-404' : '';
    
    echo '<section class="below-navigation'.$background_color.'">';
        echo '<div class="container">';
            if( $tz_theme_type == 'theme-magenta' ){
                echo '<div class="margin-eight padding-one-bottom no-margin-lr sm-margin-eight xs-margin-twelve bg-white">';
            }
                if( $tz_page_not_found_image || $tz_page_not_found_title || $tz_page_not_found_subtitle ) {
                    echo '<div class="row margin-five-bottom">';
                        echo '<div class="col-md-12 col-sm-12 text-center margin-eight-top">';
                            if( $tz_page_not_found_image ) {
                                $tz_page_not_found_image_id = attachment_url_to_postid( $tz_page_not_found_image );
                                echo wp_get_attachment_image( $tz_page_not_found_image_id, 'full' );
                            }
                            echo '<span class="title-extra-larger alt-font text-uppercase font-weight-600 display-block margin-five-top'.$theme_title_color.'">'.esc_attr( $tz_page_not_found_title ).'</span>';
                            echo '<span class="text-large text-uppercase alt-font">';
                                echo paperio_sanitize_textarea( $tz_page_not_found_subtitle, '' );
                            echo '</span>';
                        echo '</div>';
                    echo '</div>';
                }
                if( $tz_page_not_found_button != 1 || $tz_page_not_found_search != 1 ) {
                echo '<div class="row margin-ten-bottom margin-five-top">';
                    echo '<div class="col-md-12 col-sm-12 text-center margin-lr-auto float-none">';
                        if( $tz_page_not_found_button != 1 ) {
                            echo '<a href="'.esc_url( $tz_page_not_found_button_url ).'" class="btn btn-border text-uppercase btn-large'.$theme_button_color.'">'.esc_attr( $tz_page_not_found_button_text ).'</a>';
                        }
                        if( $tz_page_not_found_button != 1 && $tz_page_not_found_search != 1 ) {
                            echo '<div class="not-found-or-text">'.esc_html__( 'or', 'paperio' ).'</div>';
                        }
                        if( $tz_page_not_found_search != 1 ) {
                            echo '<form role="search" method="get" class="search-form" action="'.esc_url( home_url( '/' ) ).'">';
                                echo '<input type="text" id="search" placeholder="'.esc_attr( $tz_page_not_found_search_placeholder ).'" value="'.get_search_query().'" name="s" class="form-control-404 big-input">';
                                echo '<button type="submit" class="btn btn-default btn-404"><i class="fas fa-search"></i></button>';
                            echo '</form>';
                        }
                    echo '</div>';
                echo '</div>';
                }
            if( $tz_theme_type == 'theme-magenta' ){
                echo '</div>';
            }
        echo '</div>';
    echo '</section>';