<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Check post column */
    $tz_general_blog_layout_column_type_four = get_theme_mod( 'tz_general_blog_layout_column_type_four', 'blog-grid-two-column' );
    /* Get blog feature image size */
    $tz_general_blog_layout_feature_image = get_theme_mod( 'tz_general_blog_layout_feature_image', 'full' );
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
    /* Check if blog quotes icon hide / show */
    $tz_hide_blog_post_quotes_icon = get_theme_mod( 'tz_hide_blog_post_quotes_icon', 1 );
    /* Check if blog bottom separator line hide / show */
    $tz_hide_blog_post_bottom_separator_line = get_theme_mod( 'tz_hide_blog_post_bottom_separator_line', 0 );

    /* Get general pagination style */
    $tz_general_pagination_style = get_theme_mod( 'tz_general_pagination_style', 'old-new-pagination' );
    $tz_home_layout = get_theme_mod( 'tz_home_layout', 'paperio_home_full_screen_12col' );

    $tz_post_column_class_list = $tz_column_type_class = '';
    switch( $tz_general_blog_layout_column_type_four ) {
        case 'blog-grid-three-column':        
            $tz_post_column_class_list .= 'col-lg-4 col-md-6 col-sm-12 col-xs-12';                      
            $tz_column_type_class .= 'blog-listing-col-3';
        break;
        case 'blog-grid-four-column':
            if( ( $tz_home_layout == 'paperio_home_left_sidebar' ) || ( $tz_home_layout == 'paperio_home_right_sidebar' ) ) {
                $tz_post_column_class_list .= 'col-lg-3 col-md-6 col-sm-12 col-xs-12'; 
            } else {
                $tz_post_column_class_list .= 'col-lg-3 col-md-4 col-sm-6 col-xs-12';
            }           
            $tz_column_type_class .= 'blog-listing-col-4';            
        break;        
        default:
            $tz_post_column_class_list .= 'col-lg-6 col-md-12 col-sm-12 col-xs-12';       
            $tz_column_type_class .= 'blog-listing-col-2';    
        break;
    }


    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            // Get List of post classes
            $tz_post_classes = $bg_image = '';
            $tz_post_class_list = array();
            $tz_post_class_list[] = $tz_column_type_class;
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
                    echo '<div class="'.$tz_post_column_class_list.' padding-all-8 gallery-grid">';
                        /* Set post featured image as a background image */
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $tz_general_blog_layout_feature_image );
                        if( $thumb[0] ){
                            $bg_image = ' style="background: url('.esc_url( $thumb[0] ).');"';
                        }
                        $srcset = $srcset_data = '';
                        $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id( get_the_ID() ), $tz_general_blog_layout_feature_image );
                        if( $srcset ){
                            $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                        }
                        echo '<div class="blog-listing-image bg-image-srcset cover-background"'.$bg_image.$srcset_data.'>';
                            echo '<div class="outer">';
                                echo '<div class="middle">';
                                    echo '<div class="inner">';
                                        echo '<div class="gallery-content blog-layout-content bg-white">';
                                            if( $tz_hide_blog_post_quotes_icon != 1 ) {
                                                echo '<p class="text-color"><i class="fas fa-quote-left title-extra-large"></i></p>';
                                            }
                                            echo '<p class="title-extra-small alt-font text-uppercase font-weight-600 margin-four-bottom text-mid-gray entry-title blog-layout-title">';
                                                echo '<a rel="bookmark" href="'.get_permalink().'">'.get_the_title().'</a>';
                                            echo '</p>';
                                            if( $tz_hide_blog_category != 1 || $tz_hide_blog_author != 1 || $tz_hide_blog_date != 1 ) {
                                                echo '<div class="text-extra-small alt-font text-uppercase text-mid-gray blog-layout-meta">';
                                                    echo '<ul class="post-meta-box meta-box-style2">';
                                                        if( $tz_hide_blog_category != 1 ) {
                                                            echo '<li>'.paperio_post_category( get_the_ID(), 'text-gray blog-layout-meta-link', '1' ).'</li>';
                                                        }
                                                        if( $tz_hide_blog_date != 1 ) {
                                                            echo '<li class="published">'.get_the_date( $tz_general_blog_date_format ).'</li>';
                                                        }
                                                        if ( $tz_hide_blog_author != 1 ) {
                                                            echo '<li class="vcard author">'.esc_html__('By ', 'paperio'). '<a class="text-gray fn blog-layout-meta-link" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></li>';
                                                        }
                                                    echo '</ul>';
                                                echo '</div>';
                                                if( $tz_hide_blog_date != 1 ) {
                                                    echo '<time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $tz_general_blog_date_format ).'</time>';
                                                }
                                            }
                                            if( $tz_hide_blog_post_bottom_separator_line != 1 ) {
                                                echo '<div class="separator-line-medium2 background-color margin-lr-auto float-none margin-top-15 blog-layout-separator"></div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
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