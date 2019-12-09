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
    /* Check if blog post bottom separator line hide / show */
    $tz_hide_blog_post_bottom_separator_line = get_theme_mod( 'tz_hide_blog_post_bottom_separator_line', 0 );

    /* Get general pagination style */
    $tz_general_pagination_style = get_theme_mod( 'tz_general_pagination_style', 'old-new-pagination' );

    if( have_posts() ) :

        while( have_posts() ) : the_post();

            // Get List of post classes
            $tz_post_classes = '';
            $tz_post_class_list = array();

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
                post_class( $tz_post_class_list );
                $tz_post_classes .= ob_get_contents();
            ob_end_clean();

            if ( is_sticky() ) {
                get_template_part( 'templates/blog-layout/blog-sticky', 'post' );
            }else{
                echo '<div id="post-'.get_the_ID().'" '.$tz_post_classes . '>';
                    echo '<div class="blog-post bg-white margin-six-bottom sm-margin-ten-bottom">';
                        if ( !post_password_required() ) {
                            if( has_post_thumbnail() ) {
                                echo '<div class="blog-image">';
                                    get_template_part( 'loop/blog-layout/content', 'image' );
                                echo '</div>';
                            }
                        }
                        echo '<div class="blog-details padding-seven sm-padding-five position-reletive fl-left">';
                            if( $tz_hide_blog_category != 1 || $tz_hide_blog_author != 1 || $tz_hide_blog_date != 1 ) {
                                echo '<div class="text-extra-small text-uppercase letter-spacing-1 blog-layout-meta">';
                                    echo '<ul class="post-meta-box">';
                                        if( $tz_hide_blog_category != 1 ) {
                                            echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-light-gray blog-layout-meta-link', '3' ).'</li>';
                                        }
                                        if ( $tz_hide_blog_author != 1 ) {
                                            echo '<li class="vcard author">'.esc_html__('By ', 'paperio'). '<a class="text-link-light-gray blog-layout-meta-link fn" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></li>';
                                        }
                                        if( $tz_hide_blog_date != 1 ) {
                                            echo '<li class="published">'.get_the_date( $tz_general_blog_date_format ).'</li>';
                                        }
                                    echo '</ul>';
                                echo '</div>';
                                if( $tz_hide_blog_date != 1 ) {
                                    echo '<time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $tz_general_blog_date_format ).'</time>';
                                }
                            }
                            echo '<h2 class="alt-font title-medium font-weight-600 margin-four-bottom margin-one-top no-margin-lr entry-title blog-layout-title">';
                                echo '<a rel="bookmark" href="'.get_permalink().'">'.get_the_title().'</a>';
                            echo '</h2>';
                            /* Check post excerpt */
                            if( $tz_hide_blog_post_excerpt != 1 ) {
                                if( $tz_blog_post_excerpt_length ) {
                                    $show_excerpt = paperio_get_the_excerpt_content( $tz_blog_post_excerpt_length );
                                    $show_excerpt = ( $show_excerpt ) ? $show_excerpt : '';
                                    if( $show_excerpt ){
                                        echo '<p class="width-90 xs-width-100 text-medium entry-summary">'.esc_html( $show_excerpt ).'</p>';
                                    }
                                }
                            }

                            if( ( ( $tz_hide_blog_read_more != 1 ) && ( $tz_general_blog_button_text != '' ) ) || $tz_hide_blog_comment_link != 1 || $tz_hide_blog_like != 1 ) {
                            echo '<div class="separator-line-thin bg-middle-gray margin-six no-margin-lr blog-layout-separator"></div>';
                            }

                            if( ( $tz_hide_blog_read_more != 1 ) && ( $tz_general_blog_button_text != '' ) ) {
                                echo '<div class="col-md-6 col-sm-6 col-xs-12 no-padding"><a class="text-uppercase font-weight-400 text-small alt-font" href="'.get_permalink().'">'.esc_html( $tz_general_blog_button_text ).'</a></div>';
                            }
                            if ( $tz_hide_blog_comment_link != 1 || $tz_hide_blog_like != 1 ) {
                                echo '<div class="col-md-6 col-sm-6 col-xs-12 no-padding text-uppercase xs-margin-bottom-20 pull-right">';
                                    echo '<ul class="blog-listing-comment no-margin-top letter-spacing-1 fl-right xs-fl-none general-blog-listing-comment">';
                                        if ( $tz_hide_blog_comment_link != 1 ) {
                                            echo '<li>';
                                                comments_popup_link( __( '<i class="far fa-comment"></i><span>0 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>1 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>% Comments</span>', 'paperio' ), 'comment text-link-light-gray blog-layout-comment-link' );
                                            echo '</li>';
                                        }
                                        if( $tz_hide_blog_like != 1 && function_exists( 'paperio_get_simple_likes_button' ) ) {
                                            echo '<li>'.paperio_get_simple_likes_button( get_the_ID(), '', 'text-link-light-gray blog-layout-comment-link' ).'</li>';
                                        }
                                    echo '</ul>';
                                echo '</div>';
                            }
                            if( $tz_hide_blog_post_bottom_separator_line != 1 ) {
                                echo '<div class="separator-line-large background-color position-absolute position-bottom"></div>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        endwhile;

        /* Paperio Pagination */
        echo paperio_pagination();
        
    else :
        get_template_part( 'templates/blog-layout/content', 'none' );

    endif;