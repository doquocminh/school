<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Get blog feature image size */
    $tz_general_blog_layout_feature_image = get_theme_mod( 'tz_general_blog_layout_feature_image', 'full' );
    /* Check if blog category hide / show */
    $tz_hide_blog_category = get_theme_mod( 'tz_hide_blog_category', 0 );
    /* Check if blog date hide / show */
    $tz_hide_blog_date = get_theme_mod( 'tz_hide_blog_date', 0 );
    /* Get blog date format */
    $tz_general_blog_date_format = get_theme_mod( 'tz_general_blog_date_format', '' );
    /* Get general pagination style */
    $tz_general_pagination_style = get_theme_mod( 'tz_general_pagination_style', 'old-new-pagination' );

    if ( have_posts() ) :

        while ( have_posts() ) : the_post();

            // Get List of post classes
            $tz_post_classes = $bg_image = '';
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
            
            $post_class_list[] = 'bg-image-srcset';

            $post_class_list[] = 'col-md-12 blog-listing-style7';
            ob_start();
                post_class( $post_class_list );
                $tz_post_classes .= ob_get_contents();
            ob_end_clean();

            
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $tz_general_blog_layout_feature_image );
            if( $thumb[0] ){
                $bg_image = ' style="background-image: url('.esc_url( $thumb[0] ).');"';
            }
            $srcset = $srcset_data = '';
            $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id( get_the_ID() ), $tz_general_blog_layout_feature_image );
            if( $srcset ){
                $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
            }
            if ( is_sticky() ) {
                get_template_part( 'templates/blog-layout/blog-sticky', 'post' );
            }else{
                echo '<div id="post-'.get_the_ID().'" '.$tz_post_classes.$bg_image.$srcset_data.'>';
                    echo '<div class="opacity-medium bg-black"></div>';
                    echo '<div class="banner-content blog-layout-content">';
                        echo '<div class="outer">';
                            echo '<div class="middle">';
                                echo '<div class="inner text-center">';
                                    echo '<h2 class="text-uppercase margin-three-bottom alt-font entry-title blog-layout-title">';
                                        echo '<a rel="bookmark" href="'.get_permalink().'" class="text-link-white">'.get_the_title().'</a>';
                                    echo '</h2>';
                                    if( $tz_hide_blog_category != 1 || $tz_hide_blog_date != 1 ) {
                                        echo '<div class="no-margin-bottom text-uppercase text-extra-small letter-spacing-3 text-white blog-layout-meta">';
                                            echo '<ul class="post-meta-box">';
                                                if( $tz_hide_blog_category != 1 ) {
                                                    echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-white blog-layout-meta-link', '2' ).'</li>';
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
                                echo '</div>';
                            echo '</div>';
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