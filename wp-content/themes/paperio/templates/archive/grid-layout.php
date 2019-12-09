<?php

    // Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }
    
    /* Define null variables */    
    $archive_layout = $show_no_of_category = '';
    /* Check archive type */
    $tz_general_archive_type = get_theme_mod( 'tz_general_archive_type', 'grid' );
    /* Check archive column type */
    $tz_general_archive_column_type = get_theme_mod( 'tz_general_archive_column_type', 'two-columns' );
    $archive_layout = ( $tz_general_archive_type != 'list' ) ? $tz_general_archive_type.'-'.$tz_general_archive_column_type : $tz_general_archive_type ;
    /* Check general pagination style */
    $tz_general_pagination_style = get_theme_mod( 'tz_general_pagination_style', 'old-new-pagination' );
    /* Check if archive post category hide or show */
    $tz_archive_hide_post_category = get_theme_mod( 'tz_archive_hide_post_category', 0 );
    /* Check if archive post date hide or show */
    $tz_archive_hide_post_date = get_theme_mod( 'tz_archive_hide_post_date', 0);
    /* Get archive date format */
    $tz_archive_post_date_format = get_theme_mod( 'tz_archive_post_date_format', '' );
    /* Check if archive post excerpt hide or show */
    $tz_archive_hide_post_excerpt = get_theme_mod( 'tz_archive_hide_post_excerpt', 0 );
    /* Set archive post excerpt length */
    $tz_archive_post_excerpt_length = get_theme_mod( 'tz_archive_post_excerpt_length', '34' );
    /* Check if archive post read more button hide or show */
    $tz_archive_hide_read_more_button = get_theme_mod( 'tz_archive_hide_read_more_button', 0 );
    /* Set archive post read more button text */
    $tz_archive_default_button_text = get_theme_mod( 'tz_archive_default_button_text', 'Read More' );
    /* Check read more button Arrow hide or show */
    $tz_archive_read_more_button_arrow = (get_theme_mod( 'tz_hide_archive_read_more_button_arrow', 0 ) != 1 ) ? '<i class="fas fa-long-arrow-alt-right"></i>' : '' ;
    /* Check if archive post comment link hide or show */
    $tz_archive_hide_post_comment_link = get_theme_mod( 'tz_archive_hide_post_comment_link', 0 );
    /* Check if post like hide or show */
    $tz_hide_archive_post_like = get_theme_mod( 'tz_hide_archive_post_like', 0 );
    /* Check theme type */
    $tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
    $tz_blog_archive_class = ( $tz_theme_type == 'theme-fast-red' ) ? ' btn-double-border' : ' btn-border';

    // Get List of post classes
    $tz_post_classes = '';
    $tz_post_class_list = array();
    $tz_post_class_list[] = ( $tz_general_archive_column_type == 'four-columns' ) ? 'grid-four-columns-button': '';

    /* Add class base on layout and set no of category to show in layout */
    switch( $archive_layout ) {
        case 'grid-two-columns':
            $show_no_of_category = '2';
        break;
        
        case 'grid-three-columns':
            $show_no_of_category = '2';
        break;

        case 'grid-four-columns':
            $show_no_of_category = '1';
        break;
    }

    if( $tz_general_pagination_style == 'infinite-scroll-pagination' ) {
        $tz_post_class_list[] = 'blog-single-post';
    } else {
        if ( 0 === $wp_query->current_post ) {
            $tz_post_class_list[] = 'first-post';
        } elseif ( ( $wp_query->current_post + 1 ) === $wp_query->post_count ) {
            $tz_post_class_list[] = 'last-post';
        }
    }

    ob_start();
        add_action( 'post_class', 'paperio_archive_grid_post_class' );
        post_class( $tz_post_class_list );
        remove_action( 'post_class', 'paperio_archive_grid_post_class' );
        $tz_post_classes .= ob_get_contents();
    ob_end_clean();
    
    echo '<div id="post-'.get_the_ID().'" '.$tz_post_classes.'>';
    if ( !post_password_required() ) {
        if( has_post_thumbnail() ) {
            echo '<div class="blog-image">';
                echo get_template_part( 'loop/archive/content', 'image' );
            echo '</div>';
        }
    }
        echo '<div class="blog-details">';
            echo '<h2 class="alt-font font-weight-600 title-small text-mid-gray margin-six-top no-margin-lr xs-no-margin-bottom entry-title archive-layout-title no-margin-bottom">';
                echo '<a rel="bookmark" href="'.get_permalink().'">'.get_the_title().'</a>';
            echo '</h2>';

            if( $tz_archive_hide_post_category != 1 || $tz_archive_hide_post_date != 1 ) {
                echo '<div class="letter-spacing-1 text-extra-small text-uppercase margin-five-bottom display-inline-block archive-layout-meta">';
                    echo '<ul class="post-meta-box meta-box-style2">';
                        if( $tz_archive_hide_post_category != 1 ) {
                            if( get_post_type( get_the_ID() ) == 'post' ) {
                                echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-light-gray archive-layout-meta-link', $show_no_of_category ).'</li>';
                            }
                        }
                        if( $tz_archive_hide_post_date != 1 ) {
                            echo '<li class="published">'.get_the_date( $tz_archive_post_date_format ).'</li>';
                        }
                    echo '</ul>';
                echo '</div>';
                if( $tz_archive_hide_post_date != 1 ) {
                    echo '<time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $tz_archive_post_date_format ).'</time>';
                }
            }
            
            if( $tz_archive_hide_post_excerpt != 1 ) {
                $show_excerpt = paperio_get_the_excerpt_content( $tz_archive_post_excerpt_length );
                if( $show_excerpt ){
                    echo '<div class="margin-six-bottom xs-margin-eight-bottom entry-summary">'.esc_html( $show_excerpt ).'</div>';
                }
            }

            echo '<div class="blog-meta text-uppercase">';
                if( $tz_archive_hide_read_more_button != 1 ) {
                    if( $tz_archive_default_button_text ) {
                        echo '<a href="'.get_permalink().'" class="btn btn-very-small text-uppercase alt-font archive-button no-letter-spacing'.esc_attr( $tz_blog_archive_class ).'">'.esc_attr( $tz_archive_default_button_text ).' '.$tz_archive_read_more_button_arrow.'</a>';
                    }
                }
                if( ( comments_open() && ( $tz_archive_hide_post_comment_link != 1 ) ) || $tz_hide_archive_post_like != 1 ) {
                    echo '<ul class="fl-right blog-listing-comment archive-blog-listing-comment">';
                        if( comments_open() && ( $tz_archive_hide_post_comment_link != 1 ) ) {
                            echo '<li>';
                                comments_popup_link( __( '<i class="far fa-comment"></i><span>No Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>1 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>% comments</span>', 'paperio' ), 'comment archive-layout-comment-link' );
                            echo '</li>';
                        }
                        if( $tz_hide_archive_post_like != 1 && function_exists( 'paperio_get_simple_likes_button' ) && ( get_post_type( get_the_ID() ) == 'post' ) ) {
                            echo '<li>'.paperio_get_simple_likes_button( get_the_ID(), '', 'text-link-black archive-layout-comment-link' ).'</li>';
                        }
                    echo '</ul>';
                }
            echo '</div>';
        echo '</div>';
    echo '</div>';