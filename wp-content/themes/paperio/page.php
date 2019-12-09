<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Paperio
 */

get_header(); 
$tz_hide_page_titlewrapper = paperio_option( 'tz_hide_page_titlewrapper', 0 );

// Start the loop.
while ( have_posts() ) : the_post();

    $tz_page_content_container_fluid = $tz_blog_page_class = '';
    /* Check if page breadcrumb title is set or not */
    $tz_page_breadcrumb_title = paperio_option( 'tz_page_breadcrumb_title', '' );
    /* Check if page breadcrumb navigation is show / hide */
    $tz_hide_page_breadcrumb_navigation = get_theme_mod( 'tz_hide_page_breadcrumb_navigation', 0 );
    /* Check if page comment is show / hide */
    $tz_hide_page_comment = get_theme_mod( 'tz_hide_page_comment', 0 );
    /* Check if page container style */
    $tz_page_container_fluid = paperio_option( 'tz_page_container_fluid', 'no' );

    if( isset( $tz_page_container_fluid ) && $tz_page_container_fluid == 'yes' ){
        $tz_page_content_container_fluid .= 'container-fluid';
    } else {
        $tz_page_content_container_fluid .= 'container';
    }

    /* Get page class and id */
    $tz_page_classes = '';
    ob_start();
        post_class();
        $tz_page_classes .= ob_get_contents();
    ob_end_clean();
    echo '<div class="post-content-area">';
        echo '<div id="post-'.get_the_ID().'" '.$tz_page_classes.'>';
            /* For Title Background Image*/ 
            $tz_title_background_image_single = '';
            $tz_title_background_image_single = get_post_meta( get_the_ID(), 'tz_page_title_bg_image', true );
            if ( !empty( $tz_title_background_image_single ) ) {
                $tz_title_background_image = $tz_title_background_image_single;
            } else{
                $tz_title_background_image = get_theme_mod( 'tz_title_background_image', '' );
            }
            
            $tz_title_background_image_style = ( $tz_title_background_image ) ? ' style="background: url('.esc_url( $tz_title_background_image ).') repeat-x left top;"' : '';

            /* Check theme type */
            $tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
            switch( $tz_theme_type ) {
                case 'theme-magenta':
                    $tz_blog_page_class = ' bg-white';
                break;
                
                case 'theme-fast-red':
                    $tz_blog_page_class = ' bg-dark-gray2';
                break;

                default:
                    $tz_blog_page_class = ' bg-gray';
                break;
            }

            /* Check page title and breadcrumb title */
            if ($tz_hide_page_titlewrapper != 1 ) {
                if( $tz_page_breadcrumb_title || get_the_title() ) :
                    echo '<section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background'.esc_attr( $tz_blog_page_class ).'"'.$tz_title_background_image_style.'>';
                        echo '<div class="container-fluid">';
                            echo '<div class="row">';
                                echo '<div class="col-md-12 col-sm-12 col-xs-12 text-center">';
                                if( $tz_page_breadcrumb_title ) :
                                    echo '<span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">'.esc_attr( $tz_page_breadcrumb_title ).'</span>';
                                endif;
                                if( get_the_title() ) {
                                    echo '<h1 class="title-small position-reletive font-weight-600 text-uppercase text-mid-gray blog-headline right-separator entry-title blog-single-page-title no-margin-bottom">'.get_the_title().'</h1>';
                                }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</section>';
                endif;
            }
            
            /* For post single breadcrumb */
            if( $tz_hide_page_breadcrumb_navigation != 1 ) {
                echo paperio_breadcrumb_navigation();
            }
            /* For page content, sidebar, comment  */
            echo '<section class="margin-five sm-margin-eight-top xs-margin-twelve-top no-margin-lr">';
                echo '<div class="'.esc_attr( $tz_page_content_container_fluid ).'">';
                    echo '<div class="row">';
                        /* Get page left part template */
                        get_template_part( 'templates/single-page','left' );

                        if( $tz_theme_type == 'theme-magenta' ) {
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 padding-four xs-padding-five bg-white">';
                        }
                        
                            /* Get page content area */
                            echo '<div class="entry-content">';
                                echo '<div class="post-details-content">';
                                    the_content();
                                echo '</div>';        
                            echo '</div>';
                            
                            /* Displays page-links for paginated posts. */
                            wp_link_pages( 
                                array(
                                    'before'      => '<div class="page-links"><span class="pagination-title">'.esc_html__( 'Pages:', 'paperio' ).'</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span class="page-number">',
                                    'link_after'  => '</span>',
                                )
                            );

                            /* If comments are open or we have at least one comment, load up the comment template. */
                            if ( comments_open() && $tz_hide_page_comment != 1 ) {
                                comments_template();
                            }

                        if( $tz_theme_type == 'theme-magenta' ) {
                            echo '</div>';
                        }

                        /* Get page right part template */
                        get_template_part( 'templates/single-page','right' );
                    
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        echo '</div>';
    echo '</div>';
    
    // End the loop.
    endwhile;
    
    get_footer();