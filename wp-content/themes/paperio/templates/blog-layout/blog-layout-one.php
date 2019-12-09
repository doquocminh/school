<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Check if blog category hide / show */
    $tz_hide_blog_category = get_theme_mod( 'tz_hide_blog_category', 0 );
    /* Check if blog post excerpt hide / show */
    $tz_hide_blog_post_excerpt = get_theme_mod( 'tz_hide_blog_post_excerpt', 0 );
    /* Get blog post excerpt length */
    $tz_blog_post_excerpt_length = get_theme_mod( 'tz_blog_post_excerpt_length', '34' );
    /* Check if blog author hide / show */
    $tz_hide_blog_author = get_theme_mod( 'tz_hide_blog_author', 0 );
    /* Check if blog like hide / show */
    $tz_hide_blog_like = get_theme_mod( 'tz_hide_blog_like', 0 );
    /* Check if blog comment link hide / show */
    $tz_hide_blog_comment_link = get_theme_mod( 'tz_hide_blog_comment_link', 0 );
    /* Check if blog date hide / show */
    $tz_hide_blog_date = get_theme_mod( 'tz_hide_blog_date', 0 );
    /* Get first blog layout big date format */
    $tz_general_blog_big_date_format = get_theme_mod( 'tz_general_blog_big_date_format', '' );
    /* Get blog date format */
    $tz_general_blog_date_format = get_theme_mod( 'tz_general_blog_date_format', '' );
    /* Check if blog post read more button hide / show */
    $tz_hide_blog_read_more = get_theme_mod( 'tz_hide_blog_read_more', 0 );
    /* Get blog post read more button text */
    $tz_general_blog_button_text = get_theme_mod( 'tz_general_blog_button_text', 'Read More' );
    /* Get blog post button Hide Arrow */
    $tz_general_blog_button_arrow = ( get_theme_mod( 'tz_general_blog_button_arrow', 0 ) != 1 ) ? '<i class="fas fa-long-arrow-alt-right"></i>' : '';

    /* Get general pagination style */
    $tz_general_pagination_style = get_theme_mod( 'tz_general_pagination_style', 'old-new-pagination' );
    if ( have_posts() ) :

        while ( have_posts() ) : the_post();

            // Get List of post classes
            $tz_post_classes = '';
            $post_class_list = array();
            $show_separator_flag = true;

            if( $tz_general_pagination_style == 'infinite-scroll-pagination' ) {
                $post_class_list[] = 'blog-single-post';

                if ( $wp_query->max_num_pages == get_query_var('paged') && ( $wp_query->current_post + 1 ) === $wp_query->post_count ) {
                    $show_separator_flag = false;
                }
            } else {

                if ( 0 === $wp_query->current_post ) {
                    $post_class_list[] = 'first-post';
                    if( $wp_query->post_count == 1 ){
                        $show_separator_flag = false;
                    }
                } elseif ( ( $wp_query->current_post + 1 ) === $wp_query->post_count ) {
                    $post_class_list[] = 'last-post';
                    if( $tz_general_pagination_style != 'infinite-scroll-pagination' ) {
                        $show_separator_flag = false;
                    }
                }
            }

            ob_start();
                post_class( $post_class_list );
                $tz_post_classes .= ob_get_contents();
            ob_end_clean();

            if ( is_sticky() ) {
                get_template_part( 'templates/blog-layout/blog-sticky', 'post' );
            }else{
                echo '<div id="post-'.get_the_ID().'" '.$tz_post_classes.'>';
                    echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding blog-post margin-six-bottom sm-margin-six-bottom xs-margin-eight-bottom">';
                        echo '<div class="col-md-6 col-sm-12 col-xs-12 no-padding">';
                            if ( !post_password_required() ) {
                                if ( has_post_thumbnail() ) {
                                    echo '<div class="blog-image">';
                                }else{
                                    echo '<div class="blog-image blog-no-img">';
                                }
                                
                                if( has_post_thumbnail() ) {
                                    get_template_part( 'loop/blog-layout/content', 'image' );
                                }
                                
                                echo '</div>';
                            }
                            if( $tz_hide_blog_date != 1 ) {
                                echo '<div class="post-date text-mid-gray text-small text-uppercase alt-font">';
                                    echo '<div class="post-date-style1">';
                                        if( $tz_general_blog_big_date_format ) {
                                            echo '<b class="title-large">';
                                            echo get_the_date( $tz_general_blog_big_date_format );
                                            echo '</b>';
                                        }
                                        
                                        echo '<span class="published">'.get_the_date( $tz_general_blog_date_format ).'</span>';
                                        echo '<time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $tz_general_blog_date_format ).'</time>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        echo '</div>';
                        echo '<div class="post-content blog-layout-content col-md-6 col-sm-12 col-xs-12">';
                            if( $tz_hide_blog_category != 1 ) {
                                echo '<h4 class="text-color text-uppercase text-extra-small blog-layout-meta no-margin-bottom">';
                                    echo paperio_post_category( get_the_ID(), 'text-link-light-gray blog-layout-meta-link', '2' );
                                echo '</h4>';
                            }
                            echo '<h2 class="alt-font font-weight-600 text-mid-gray title-small margin-three-bottom xs-margin-two-bottom entry-title blog-layout-title">';
                                echo '<a rel="bookmark" href="'.get_permalink().'">'.get_the_title().'</a>';
                            echo '</h2>';
                            
                            if( $tz_hide_blog_post_excerpt != 1 ) {
                                if( $tz_blog_post_excerpt_length ) {
                                    $show_excerpt = paperio_get_the_excerpt_content( $tz_blog_post_excerpt_length );
                                    $show_excerpt = ( $show_excerpt ) ? $show_excerpt : '';
                                    if( $show_excerpt ){
                                        echo '<p class="margin-eight-bottom entry-summary">'.esc_html( $show_excerpt ).'</p>';
                                    }
                                }
                            }

                            echo '<div class="blog-meta text-uppercase">';
                                if( ( $tz_hide_blog_read_more != 1 ) && ( $tz_general_blog_button_text != '' ) ) {
                                    echo '<a class="btn-border btn btn-very-small text-uppercase alt-font no-letter-spacing" href="'.get_permalink().'">'.$tz_general_blog_button_text.' '.$tz_general_blog_button_arrow.'</a>';
                                }
                                if ( $tz_hide_blog_comment_link != 1 || $tz_hide_blog_like != 1 ) {
                                    echo '<ul class="fl-right blog-listing-comment general-blog-listing-comment">';
                                        if ( $tz_hide_blog_comment_link != 1 ) {
                                            echo '<li>';
                                                comments_popup_link( __( '<i class="far fa-comment"></i><span>0 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>1 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>% Comments</span>', 'paperio' ), 'comment text-link-light-gray blog-layout-comment-link' );
                                            echo '</li>';
                                        }
                                        if( $tz_hide_blog_like != 1 && function_exists( 'paperio_get_simple_likes_button' ) ) {
                                            echo '<li>'.paperio_get_simple_likes_button( get_the_ID(), '', 'text-link-light-gray blog-layout-comment-link' ).'</li>';
                                        }
                                    echo '</ul>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    if( $show_separator_flag == true ) {
                        echo '<div class="col-md-6 col-sm-12 col-xs-12 separator-line-medium background-color margin-six-bottom xs-margin-nine-bottom"></div>';
                    }
                echo '</div>';
            }
                    
        endwhile;

        /* Paperio Pagination */
        echo paperio_pagination();

    else :
        get_template_part( 'templates/blog-layout/content', 'none' );
    endif;