<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Check post column */
    $tz_general_blog_layout_column_type_five = get_theme_mod( 'tz_general_blog_layout_column_type_five', 'blog-grid-two-column' );
    /* Hide / Show First Big Post*/
    $tz_exclude_first_big_post = get_theme_mod( 'tz_exclude_first_big_post', 0 );
    /* Check if blog category hide / show */
    $tz_hide_blog_category = get_theme_mod( 'tz_hide_blog_category', 0 );
    /* Check if blog first post excerpt hide / show */
    $tz_hide_blog_first_post_excerpt = get_theme_mod( 'tz_hide_blog_first_post_excerpt', 0 );
    /* Get blog first post excerpt length */
    $tz_blog_first_post_excerpt_length = get_theme_mod( 'tz_blog_first_post_excerpt_length', '82' );
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

    /* Define counter variables */
    $counter = $post_counter = 1;

    $tz_post_column_class_list = $tz_post_column_number = '';
    switch( $tz_general_blog_layout_column_type_five ) {

        case 'blog-grid-three-column':
            $tz_post_column_class_list .= 'col-md-4 col-sm-6 col-xs-12 masonry-item';
            $tz_post_column_number = 3;
        break;

        case 'blog-grid-four-column':
            $tz_post_column_class_list .= 'col-md-3 col-sm-6 col-xs-12 masonry-item';
            $tz_post_column_number = 4;
        break;
        
        default:
            $tz_post_column_class_list .= 'col-md-6 col-sm-6 col-xs-12 masonry-item';
            $tz_post_column_number = 2;
        break;

    }

    if( have_posts() ) :
        
        echo '<div class="row '.esc_attr( $tz_general_pagination_style ).'" data-column="'.esc_attr( $tz_post_column_number ).'">';

        while( have_posts() ) : the_post();

            // Get List of post classes
            $tz_post_classes = '';
            $tz_post_class_list = array();

            if( $tz_general_pagination_style == 'infinite-scroll-pagination' ) {
                if ( 0 !== $wp_query->current_post ) {                
                    $tz_post_class_list[] = 'blog-single-post';
                }
            } else {

                if ( 0 === $wp_query->current_post ) {
                    $tz_post_class_list[] = 'first-post';
                } elseif ( ( $wp_query->current_post + 1 ) === $wp_query->post_count ) {
                    $tz_post_class_list[] = 'last-post';
                }
            }

            /* To add clear-both in post */
            if( $wp_query->current_post != 0 && !is_paged() ) {
                $tz_post_class_list[] = 'post-style-grid';
            }

            ob_start();
                post_class( $tz_post_class_list );
                $tz_post_classes .= ob_get_contents();
            ob_end_clean();
            
            if ( is_sticky() ) {
                get_template_part( 'templates/blog-layout/blog-sticky', 'post' );
            } else {
                
                if( $wp_query->current_post == 0 && !is_paged() && ( $tz_exclude_first_big_post != 1 ) ) {
                    echo '<div id="post-'.get_the_ID().'" '.$tz_post_classes.'>';
                    echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-six-bottom xs-margin-ten-bottom">';
                        echo '<div class="padding-five fl-left bg-gray width-100">';
                            if ( !post_password_required() ) {
                                if( has_post_thumbnail() ) {
                                    echo '<div class="blog-image">';
                                        get_template_part( 'loop/blog-layout/content', 'image' );
                                    echo '</div>';
                                }
                            }
                            echo '<div class="blog-details text-center">';
                                echo '<h2 class="alt-font font-weight-600 title-small text-mid-gray margin-six no-margin-bottom text-uppercase entry-title blog-layout-title">';
                                    echo '<a rel="bookmark" href="'.get_permalink().'">'.get_the_title().'</a>';
                                echo '</h2>';

                                if( $tz_hide_blog_category != 1 || $tz_hide_blog_date != 1 ) {
                                    echo '<div class="margin-two-bottom no-margin-lr letter-spacing-2 text-extra-small text-uppercase border-bottom-mid-gray padding-one-bottom xs-margin-six display-inline-block">';
                                        echo '<ul class="post-meta-box meta-box-style2 blog-layout-meta">';
                                            if( $tz_hide_blog_category != 1 ) {
                                                echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-light-gray blog-layout-meta-link', '3' ).'</li>';
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
                                /* Check post excerpt */
                                if( $tz_hide_blog_first_post_excerpt != 1 ) {
                                    if( $tz_blog_first_post_excerpt_length ) {
                                        $show_excerpt = paperio_get_the_excerpt_content( $tz_blog_first_post_excerpt_length );
                                        $show_excerpt = ( $show_excerpt ) ? $show_excerpt : '';
                                        if( $show_excerpt ){
                                            echo '<p class="margin-four-bottom xs-margin-eight-bottom sm-margin-five-bottom width-80 sm-width-100 margin-lr-auto entry-summary">'.esc_html( $show_excerpt ).'</p>';
                                        }
                                    }
                                }
                                if ( $tz_hide_blog_author != 1 || $tz_hide_blog_read_more != 1 || $tz_hide_blog_comment_link != 1 || $tz_hide_blog_like != 1 ) {
                                    echo '<ul class="col-md-12 col-sm-12 col-xs-12 blog-post-meta-style3 blog-meta text-uppercase padding-top-25 border-top-mid-gray alt-font no-padding-lr blog-layout-meta">';
                                        if ( $tz_hide_blog_author != 1 ) {
                                            echo '<li class="col-md-4 col-sm-4 col-xs-12 no-padding text-center vcard author">';
                                                echo esc_html__( 'By', 'paperio' ).' <a class="text-small fn blog-layout-meta-link" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a>';
                                            echo '</li>';
                                        }
                                        if( $tz_hide_blog_read_more != 1 ) {
                                            if( $tz_general_blog_button_text ) {
                                                echo '<li class="col-md-4 col-sm-4 col-xs-12 no-padding text-center xs-margin-top-10">';
                                                    echo '<a href="'.get_permalink().'" class="text-uppercase font-weight-400 text-small alt-font blog-layout-meta-link">'.esc_html( $tz_general_blog_button_text ).'</a>';
                                                echo '</li>';
                                            }
                                        }
                                        if ( $tz_hide_blog_comment_link != 1 || $tz_hide_blog_like != 1 ) {
                                            echo '<li class="col-md-4 col-sm-4 col-xs-12 no-padding text-center">';
                                                echo '<ul class="blog-listing-comment blog-layout-meta general-blog-listing-comment">';
                                                    if ( $tz_hide_blog_comment_link != 1 ) {
                                                        echo '<li>';
                                                            comments_popup_link( __( '<i class="far fa-comment"></i><span>0 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>1 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>% Comments</span>', 'paperio' ), 'comment text-small blog-layout-comment-link' );
                                                        echo '</li>';
                                                    }
                                                    if( $tz_hide_blog_like != 1 && function_exists( 'paperio_get_simple_likes_button' ) ) {
                                                        echo '<li>'.paperio_get_simple_likes_button( get_the_ID(), '', 'text-small blog-layout-comment-link' ).'</li>';
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
                } else {
                    echo '<div id="post-'.get_the_ID().'" '.$tz_post_classes.'>';
                        echo '<div class="'.$tz_post_column_class_list.' margin-six-bottom xs-margin-ten-bottom">';
                            echo '<div class="blog-image">';
                                get_template_part( 'loop/blog-layout/content', 'image' );
                            echo '</div>';
                            echo '<div class="blog-details">';
                                echo '<h2 class="alt-font font-weight-600 title-small text-mid-gray margin-six-top no-margin-lr xs-no-margin-bottom entry-title blog-layout-title no-margin-bottom">';
                                    echo '<a rel="bookmark" href="'.get_permalink().'">'.get_the_title().'</a>';
                                echo '</h2>';
                                if( $tz_hide_blog_category != 1 || $tz_hide_blog_author != 1 || $tz_hide_blog_date != 1 ) {
                                    echo '<div class="letter-spacing-1 text-extra-small text-uppercase margin-five-bottom display-inline-block blog-layout-meta">';
                                        echo '<ul class="post-meta-box meta-box-style2">';
                                            if( $tz_hide_blog_category != 1 ) {
                                                echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-light-gray blog-layout-meta-link', '1' ).'</li>';
                                            }
                                            if ( $tz_hide_blog_author != 1 ) {
                                                echo '<li class="vcard author">'.esc_html__('By ', 'paperio'). '<a class="text-link-light-gray fn blog-layout-meta-link" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></li>';
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
                                /* Check post excerpt */
                                if( $tz_hide_blog_post_excerpt != 1 ) {
                                    if( $tz_blog_post_excerpt_length ) {
                                        $show_excerpt = paperio_get_the_excerpt_content( $tz_blog_post_excerpt_length );
                                        $show_excerpt = ( $show_excerpt ) ? $show_excerpt : '';
                                        if( $show_excerpt ){
                                            echo '<p class="margin-six-bottom xs-margin-eight-bottom entry-summary">'.esc_html( $show_excerpt ).'</p>';
                                        }
                                    }
                                }
                                if( ( $tz_hide_blog_read_more != 1 ) && ( $tz_general_blog_button_text != '' ) || $tz_hide_blog_comment_link != 1 ) {
                                    echo '<div class="blog-meta text-uppercase">';
                                        if( ( $tz_hide_blog_read_more != 1 ) && ( $tz_general_blog_button_text != '' ) ) {
                                            echo '<a href="'.get_permalink().'" class="btn-border btn btn-very-small text-uppercase alt-font no-letter-spacing">'.$tz_general_blog_button_text.' '.$tz_general_blog_button_arrow.'</a>';
                                        }
                                        if ( $tz_hide_blog_comment_link != 1 || $tz_hide_blog_like != 1  ) {
                                            echo '<ul class="fl-right blog-listing-comment blog-layout-meta general-blog-listing-comment">';
                                                if ( $tz_hide_blog_comment_link != 1 ) {
                                                    echo '<li>';
                                                        comments_popup_link( __( '<i class="far fa-comment"></i><span>0 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>1 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>% Comments</span>', 'paperio' ), 'comment text-link-light-gray blog-layout-comment-link' );
                                                    echo '</li>';
                                                }
                                                if( $tz_hide_blog_like != 1 && function_exists( 'paperio_get_simple_likes_button' ) ) {
                                                    echo '<li>'.paperio_get_simple_likes_button( get_the_ID(), '', 'text-small text-link-light-gray blog-layout-comment-link' ).'</li>';
                                                }
                                            echo '</ul>';
                                        }
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    if( ( $post_counter % $tz_post_column_number == 0 ) && ( $counter != $posts_per_page ) ) {
                        paperio_separator();
                    }
                    $post_counter++;
                }
            }
            /* Remove sticky post from count */
            if ( is_sticky() ) {
                $counter--;
            }
            
            $counter++;
        endwhile;
        
        /* Paperio Pagination */
        echo paperio_pagination();

        echo '</div>';

        /* Add separator for infinite-scroll-pagination */

        echo '<div class="page-separator-parent display-none">';
            paperio_separator();
        echo '</div>';

    else :
        get_template_part( 'templates/blog-layout/content', 'none' );

    endif;