<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Check if Sticky Post hide / show */
    $tz_hide_sticky_post = get_theme_mod( 'tz_hide_sticky_post', 0 );
    if( $tz_hide_sticky_post ) {
        return;
    }

    /* Get blog layout type */
    $tz_general_blog_layout = get_theme_mod( 'tz_general_blog_layout', 'blog-layout-two' );
    /* Get general pagination style */
    $tz_general_pagination_style = get_theme_mod( 'tz_general_pagination_style', 'old-new-pagination' );
    /* Check if Sticky Post category hide / show */
    $tz_hide_sticky_blog_category = get_theme_mod( 'tz_hide_sticky_blog_category', 0 );
    /* Check if Sticky Post author hide / show */
    $tz_hide_sticky_blog_author = get_theme_mod( 'tz_hide_sticky_blog_author', 0 );
    /* Check if Sticky Post date hide / show */
    $tz_hide_sticky_blog_date = get_theme_mod( 'tz_hide_sticky_blog_date', 0 );
    /* Get Sticky Post date format */
    $tz_sticky_blog_date_format = get_theme_mod( 'tz_sticky_blog_date_format', '' );
    /* Check if Sticky Post excerpt hide / show */
    $tz_hide_sticky_blog_post_excerpt = get_theme_mod( 'tz_hide_sticky_blog_post_excerpt', 0 );
    /* Get Sticky Post excerpt length */
    $tz_sticky_blog_post_excerpt_length = get_theme_mod( 'tz_sticky_blog_post_excerpt_length', '78' );
    /* Check if Sticky Post comment link hide / show */
    $tz_hide_sticky_blog_comment_link = get_theme_mod( 'tz_hide_sticky_blog_comment_link', 0 );
    /* Check if Sticky Post like hide / show */
    $tz_hide_sticky_blog_like = get_theme_mod( 'tz_hide_sticky_blog_like', 0 );
    /* Check if Sticky Post read more button hide / show */
    $tz_hide_sticky_blog_read_more = get_theme_mod( 'tz_hide_sticky_blog_read_more', 0 );
    /* Get Sticky Post read more button text */
    $tz_general_sticky_blog_button_text = get_theme_mod( 'tz_general_sticky_blog_button_text', 'Read More' );

    // Get List of post classes
    $tz_post_classes = '';
    ob_start();
        post_class();
        $tz_post_classes .= ob_get_contents();
    ob_end_clean();

    echo '<div id="post-'.get_the_ID().'" '.$tz_post_classes.'>';
        if( $tz_general_blog_layout == 'blog-layout-one' ) {
            echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-six-bottom xs-margin-ten-bottom no-padding-lr">';
        } elseif( $tz_general_blog_layout == 'blog-layout-two' ) {
            echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-six-bottom xs-margin-ten-bottom no-padding-lr">';
        } elseif( $tz_general_blog_layout == 'blog-layout-three' ) {
            echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-six-bottom xs-margin-ten-bottom no-padding-lr">';
        } elseif( $tz_general_blog_layout == 'blog-layout-four' ) {
            echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-six-bottom xs-margin-ten-bottom padding-lr-8">';
        } elseif( $tz_general_blog_layout == 'blog-layout-five' ) {
            echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-six-bottom xs-margin-ten-bottom">';
        } elseif( $tz_general_blog_layout == 'blog-layout-six' ) {
            echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-six-bottom xs-margin-ten-bottom">';
        } elseif( $tz_general_blog_layout == 'blog-layout-seven' ) {
            echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-six-bottom xs-margin-ten-bottom no-padding">';
        }
        
            echo '<div class="padding-five fl-left bg-gray width-100 border-gray sticky-post-layout-content">';
                if ( !post_password_required() ) {
                    if( has_post_thumbnail() ) {
                        echo '<div class="blog-image margin-bottom-30">';
                            get_template_part( 'loop/sticky-layout/content', 'image' );
                        echo '</div>';
                    }
                }
                echo '<div class="blog-details text-center">';
                    echo '<h2 class="alt-font font-weight-600 title-small text-mid-gray margin-six no-margin-bottom no-margin-top text-uppercase entry-title sticky-post-layout-title">';
                        echo '<a rel="bookmark" href="'.get_permalink().'">'.get_the_title().'</a>';
                    echo '</h2>';

                    if( $tz_hide_sticky_blog_category != 1 || $tz_hide_sticky_blog_date != 1 ) {
                        echo '<div class="margin-two-bottom no-margin-lr letter-spacing-2 text-extra-small text-uppercase border-bottom-mid-gray padding-one-bottom xs-margin-six display-inline-block">';
                            echo '<ul class="post-meta-box meta-box-style2 sticky-post-layout-meta">';
                                if( $tz_hide_sticky_blog_category != 1 ) {
                                    echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-light-gray sticky-post-layout-meta-link', '1' ).'</li>';
                                }
                                if( $tz_hide_sticky_blog_date != 1 ) {
                                    echo '<li class="published">'.get_the_date( $tz_sticky_blog_date_format ).'</li>';
                                }
                            echo '</ul>';
                        echo '</div>';
                        if( $tz_hide_sticky_blog_date != 1 ) {
                            echo '<time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $tz_sticky_blog_date_format ).'</time>';
                        }
                    }
                    /* Check post excerpt */
                    if( $tz_hide_sticky_blog_post_excerpt != 1 ) {
                        if( $tz_sticky_blog_post_excerpt_length ) {
                            $show_excerpt = paperio_get_the_excerpt_content( $tz_sticky_blog_post_excerpt_length );
                            $show_excerpt = ( $show_excerpt ) ? $show_excerpt : '';
                            if( $show_excerpt ) {
                                echo '<p class="margin-four-bottom xs-margin-eight-bottom sm-margin-five-bottom width-80 sm-width-100 margin-lr-auto entry-summary">'.esc_html( $show_excerpt ).'</p>';
                            }
                        }
                    }
                    if ( $tz_hide_sticky_blog_author != 1 || $tz_hide_sticky_blog_read_more != 1 || $tz_hide_sticky_blog_comment_link != 1 || $tz_hide_sticky_blog_like != 1 ) {
                        echo '<ul class="col-md-12 col-sm-12 col-xs-12 blog-post-meta-style3 blog-meta text-uppercase padding-top-25 border-top-mid-gray alt-font no-padding-lr sticky-post-layout-meta-data">';
                            if ( $tz_hide_sticky_blog_author != 1 ) {
                                echo '<li class="col-md-4 col-sm-4 col-xs-12 no-padding text-center vcard author">';
                                    echo esc_html__( 'By', 'paperio' ).' <a class="text-small fn sticky-post-layout-comment-link" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a>';
                                echo '</li>';
                            }
                            if( $tz_hide_sticky_blog_read_more != 1 ) {
                                if( $tz_general_sticky_blog_button_text ) {
                                    echo '<li class="col-md-4 col-sm-4 col-xs-12 no-padding text-center xs-margin-top-10">';
                                        echo '<a href="'.get_permalink().'" class="text-uppercase font-weight-400 text-small alt-font sticky-post-layout-comment-link">'.esc_html( $tz_general_sticky_blog_button_text ).'</a>';
                                    echo '</li>';
                                }
                            }
                            if ( $tz_hide_sticky_blog_comment_link != 1 || $tz_hide_sticky_blog_like != 1 ) {
                                echo '<li class="col-md-4 col-sm-4 col-xs-12 no-padding text-center">';
                                    echo '<ul class="sticky-post-listing-comment sticky-post-layout-meta-data">';
                                        if ( $tz_hide_sticky_blog_comment_link != 1 ) {
                                            echo '<li>';
                                                comments_popup_link( __( '<i class="far fa-comment"></i><span>0 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>1 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>% Comments</span>', 'paperio' ), 'comment text-small sticky-post-layout-comment-link' );
                                            echo '</li>';
                                        }
                                        if( $tz_hide_sticky_blog_like != 1 && function_exists( 'paperio_get_simple_likes_button' ) ) {
                                            echo '<li>'.paperio_get_simple_likes_button( get_the_ID(), '', 'text-small sticky-post-layout-comment-link' ).'</li>';
                                        }
                                    echo '</ul>';
                                echo '</li>';
                            }
                        echo '</ul>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '</div>';