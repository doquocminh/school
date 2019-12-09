<?php
/**
 * The template file for category layouts
 *
 *
 * @package Paperio
 */

get_header(); ?>

<?php

    $tz_title = '';

    if ( is_category() ) {
        $tz_title = sprintf( '%s', single_cat_title( '', false ) );
    }

    /* Check if category breadcrumb navigation show / hide */
    $tz_hide_category_breadcrumb_navigation = get_theme_mod( 'tz_hide_category_breadcrumb_navigation', 0 );

    /* Check title wrapper enable/disable*/
    $tz_hide_category_titlewrapper = get_theme_mod( 'tz_hide_category_titlewrapper', 0 );

    /* Get category breadcrumb title */
    $tz_category_breadcrumb_title = paperio_category_title_option( 'tz_category_breadcrumb_title', 'Browsing Category' );

    /* check section with container or container-fluid */
    $tz_category_content_container_fluid = '';
    $tz_enable_container_fluid_single_category = paperio_category_option( 'tz_enable_container_fluid_single_category', 'no' );

    if( isset( $tz_enable_container_fluid_single_category ) && $tz_enable_container_fluid_single_category == 'yes' ) {
        $tz_category_content_container_fluid .= 'container-fluid';
    } else {
        $tz_category_content_container_fluid .= 'container';
    }

    $tz_blog_category_class = '';
    /* Check theme type */
    $tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
    switch( $tz_theme_type ) {
        case 'theme-magenta':
            $tz_blog_category_class = ' bg-white';
        break;
        
        case 'theme-fast-red':
            $tz_blog_category_class = ' bg-dark-gray2';
        break;

        default:
            $tz_blog_category_class = ' bg-gray';
        break;
    }

    /* For Title Background Image*/ 
    $tz_title_background_image = get_theme_mod( 'tz_title_background_image', '' );
    $tz_title_background_image_style = ( $tz_title_background_image ) ? ' style="background: url('.esc_url( $tz_title_background_image ).') repeat-x left top;"' : '';
    if ($tz_hide_category_titlewrapper != 1 ) {
        if( $tz_category_breadcrumb_title || $tz_title ) {
            echo '<section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background'.esc_attr( $tz_blog_category_class ).'"'.$tz_title_background_image_style.'>';
                echo '<div class="container-fluid">';
                    echo '<div class="row">';
                        echo '<div class="col-md-12 col-sm-12 col-xs-12 text-center">';
                            if( $tz_category_breadcrumb_title ) {
                                echo '<span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">'.esc_attr( $tz_category_breadcrumb_title ).'</span>';
                            }
                            if( $tz_title ) {
                                echo '<h1 class="title-small position-reletive font-weight-600 text-uppercase text-mid-gray blog-headline right-separator blog-single-page-title no-margin-bottom">'.esc_attr( $tz_title ).'</h1>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    /* For category breadcrumb */
    if( $tz_hide_category_breadcrumb_navigation != 1 ) {
        echo paperio_breadcrumb_navigation();
    }
    echo '<div class="post-content-area">';
        echo '<section class="margin-five-top margin-five-bottom sm-margin-eight-top sm-margin-eight-bottom xs-margin-twelve-top xs-margin-twelve-bottom">';
            echo '<div class="'.esc_attr( $tz_category_content_container_fluid ).'">';
                echo '<div class="row">';
                    /* For category left sidebar */
                    get_template_part('templates/category','left');

                    if( $tz_theme_type == 'theme-magenta' ) {
                        echo '<div class="col-md-12 col-sm-12 col-xs-12 padding-four xs-padding-five bg-white">';
                    }
                    
                        $category_layout = '';
                        $post_counter = 1;
                        $tz_general_category_type = paperio_category_option( 'tz_general_category_type', 'grid' );
                        $tz_general_category_column_type = paperio_category_option('tz_general_category_column_type','two-columns');
                        $category_layout = ( $tz_general_category_type != 'list' ) ? $tz_general_category_type.'-'.$tz_general_category_column_type : $tz_general_category_type ;

                        // For pagination
                        $tz_general_pagination_style = get_theme_mod( 'tz_general_pagination_style', 'old-new-pagination' );

                        if ( have_posts() ) :
                            // Start the Loop.

                            $tz_get_category_layout_column = '';
                            
                            switch( $category_layout ) {
                                case 'grid-two-columns':
                                    /* For grid two column */
                                    $tz_get_category_layout_column = '2';
                                    echo '<div class="row '.esc_attr( $tz_general_pagination_style ).' post-'.esc_attr( $category_layout ).'" data-column='.esc_attr( $tz_get_category_layout_column ).'>';
                                break;
                                case 'grid-three-columns':
                                    /* For grid three column */
                                    $tz_get_category_layout_column = '3';
                                    echo '<div class="row '.esc_attr( $tz_general_pagination_style ).' post-'.esc_attr( $category_layout ).'" data-column='.esc_attr( $tz_get_category_layout_column ).'>';
                                break;
                                case 'grid-four-columns':
                                    /* For grid four column */
                                    $tz_get_category_layout_column = '4';
                                    echo '<div class="row '.esc_attr( $tz_general_pagination_style ).' post-'.esc_attr( $category_layout ).'" data-column='.esc_attr( $tz_get_category_layout_column ).'>';
                                break;

                                case 'masonry-two-columns':
                                case 'masonry-three-columns':
                                case 'masonry-four-columns':
                                    //For masonry type
                                    echo '<div class="row"><div class="col-md-12 col-sm-12 col-xs-12 no-padding blog-listing-style6 grid masonry-listing '.esc_attr( $tz_general_pagination_style ).'">';
                                break;
                                
                                case 'list':
                                    // For list type
                                    echo '<div class="row '.esc_attr( $tz_general_pagination_style ).'">';
                                break;
                            }

                            while ( have_posts() ) : the_post();
                                
                                switch( $category_layout ) {
                                    case 'grid-two-columns':
                                    case 'grid-three-columns':
                                    case 'grid-four-columns':

                                        get_template_part( 'templates/category/grid', 'layout' );

                                        if( $post_counter % $tz_get_category_layout_column == 0 ){
                                            if ( ( $wp_query->current_post + 1 ) !== $wp_query->post_count && $tz_general_pagination_style != 'infinite-scroll-pagination' ) {
                                                paperio_separator();
                                            }
                                        }
                                        $post_counter++;
                                    break;

                                    case 'masonry-two-columns':
                                    case 'masonry-three-columns':
                                    case 'masonry-four-columns':
                                        //For masonry type
                                        get_template_part( 'templates/category/masonry', 'layout' );
                                    break;
                                    
                                    case 'list':
                                        // For list type
                                        get_template_part( 'templates/category/list', 'layout' );
                                    break;
                                }

                            endwhile;

                            switch( $category_layout ) {
                                case 'grid-two-columns':
                                case 'grid-three-columns':
                                case 'grid-four-columns':
                                    /* For grid layouts */
                                    echo '</div>';
                                    echo '<div class="page-separator-parent display-none">';
                                        paperio_separator();
                                    echo '</div>';
                                break;

                                case 'masonry-two-columns':
                                case 'masonry-three-columns':
                                case 'masonry-four-columns':

                                    //For masonry type
                                    echo '</div></div>';

                                break;
                                
                                case 'list':
                                    // For list type
                                    echo '</div>';

                                break;
                            }

                            if( $wp_query->max_num_pages > 1 ) :
                                $pagination_type = get_theme_mod( 'tz_general_pagi_style', 'old-new' );
                                echo paperio_pagination( $pagination_type, $wp_query );
                            endif;

                        else :
                            get_template_part('templates/content','none');
                        endif;
                    if( $tz_theme_type == 'theme-magenta' ) {
                        echo '</div>';
                    }


                    /* For category left sidebar */
                    get_template_part( 'templates/category', 'right' );

                echo '</div>';
            echo '</div>';
        echo '</section>';
    echo '</div>';

get_footer();