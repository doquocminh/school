<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Check if blog category hide / show */
    $tz_hide_blog_category = get_theme_mod( 'tz_hide_blog_category', 0 );
    /* Check if blog post excerpt hide / show */
    $tz_hide_blog_post_excerpt = get_theme_mod( 'tz_hide_blog_post_excerpt', 0 );
    /* Get blog post excerpt length */
    $tz_blog_post_excerpt_length = get_theme_mod( 'tz_blog_post_excerpt_length', '34' );
    /* Check if blog comment link hide / show */
    $tz_hide_blog_comment_link = get_theme_mod( 'tz_hide_blog_comment_link', 0 );
    /* Check if blog like hide / show */
    $tz_hide_blog_like = get_theme_mod( 'tz_hide_blog_like', 0 );
    /* Check if blog date hide / show */
    $tz_hide_blog_date = get_theme_mod( 'tz_hide_blog_date', 0 );
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
    /* Get blog layout type for "blog-layout-six" */
    $tz_general_blog_layout_column_type = get_theme_mod( 'tz_general_blog_layout_column_type', 'blog-masonry-three-column' );

if ( have_posts() ) :
    
    echo '<div class="row">';
    while ( have_posts() ) : the_post();
        if ( is_sticky() ) {
            get_template_part( 'templates/blog-layout/blog-sticky', 'post' );
        }
    endwhile;
    echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding grid masonry-listing '.esc_attr( $tz_general_pagination_style ).'">';

    while ( have_posts() ) : the_post();

        if ( is_sticky() ) {
        } else {
            // Get List of post classes
            $tz_post_classes = '';
            $post_class_list = array();

            if( $tz_general_pagination_style == 'infinite-scroll-pagination' ) {
                $post_class_list[] = 'blog-single-post';
            } else {
                if ( 0 === $wp_query->current_post ) {
                    $post_class_list[] = 'first-post';
                } elseif ( ( $wp_query->current_post + 1 ) === $wp_query->post_count ) {
                    $post_class_list[] = 'last-post';
                }
            }

            ob_start();

                switch( $tz_general_blog_layout_column_type ) {
                    case 'blog-masonry-three-column':
                        $post_class_list[] = 'col-md-4 col-sm-6 col-xs-12 masonry-item';
                    break;

                    case 'blog-masonry-four-column':
                        $post_class_list[] = 'col-md-3 col-sm-6 col-xs-12 masonry-item';
                    break;
                    
                    default:
                        $post_class_list[] = 'col-md-6 col-sm-6 col-xs-12 masonry-item';
                    break;
                }
                post_class( $post_class_list );
                
                $tz_post_classes .= ob_get_contents();
            ob_end_clean();

            echo '<div id="post-'.get_the_ID().'" '.$tz_post_classes.'>';
                if ( !post_password_required() ) {
                    if( has_post_thumbnail() ) {
                        echo '<div class="blog-image">';
                            get_template_part( 'loop/blog-layout/content', 'image' );
                        echo '</div>';
                    }
                }
                echo '<div class="blog-details">';
                    echo '<h2 class="alt-font font-weight-600 title-small text-mid-gray margin-six-top no-margin-lr xs-no-margin-bottom entry-title blog-layout-title no-margin-bottom">';
                        echo '<a rel="bookmark" href="'.get_permalink().'">'.get_the_title().'</a>';
                    echo '</h2>';
                    if( $tz_hide_blog_category != 1 || $tz_hide_blog_date != 1 ) {
                        echo '<div class="letter-spacing-1 text-extra-small text-uppercase margin-five-bottom display-inline-block blog-layout-meta">';
                            echo '<ul class="post-meta-box meta-box-style2">';
                            if( $tz_hide_blog_category != 1 ) {
                                echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-light-gray blog-layout-meta-link', '1' ).'</li>';
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
                                echo '<p class="margin-six-bottom xs-margin-eight-bottom">'.esc_html( $show_excerpt ).'</p>';
                            }
                        }
                    }
                    if( $tz_hide_blog_read_more != 1 || $tz_hide_blog_comment_link != 1 ) {
                        echo '<div class="blog-meta text-uppercase">';
                            if( $tz_hide_blog_read_more != 1 ) {
                                if( $tz_general_blog_button_text ) {
                                    echo '<a class="btn-border btn btn-very-small text-uppercase alt-font no-letter-spacing" href="'.get_permalink().'">'.esc_html( $tz_general_blog_button_text ).' '.$tz_general_blog_button_arrow.'</a>';
                                }
                            }
                            if ( $tz_hide_blog_comment_link != 1 || $tz_hide_blog_like != 1 ) {
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
        }
    endwhile;
    
    echo '</div>';
    
    /* Paperio Pagination */
    echo paperio_pagination();

    echo '</div>';
    
else :
    get_template_part( 'templates/blog-layout/content', 'none' );

endif;
