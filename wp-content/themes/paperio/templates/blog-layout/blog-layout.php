<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }
    
    /* Hide blog list in front page */
    $tz_hide_blog = get_theme_mod( 'tz_hide_blog', 0 );
    /* Get blog layout type */
    $tz_general_blog_layout = get_theme_mod( 'tz_general_blog_layout', 'blog-layout-two' );
    /* Check if blog category hide / show */
    $tz_hide_blog_category = get_theme_mod( 'tz_hide_blog_category', 0 );
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

    /* To get blog left sidebar if selected */
    get_template_part( 'templates/home-left', 'sidebar' );

    if ($tz_hide_blog != 1):
        switch( $tz_general_blog_layout ) {
            
            case 'blog-layout-one':
                get_template_part( 'templates/blog-layout/blog-layout', 'one' );
            break;

            case 'blog-layout-two':
                get_template_part( 'templates/blog-layout/blog-layout', 'two' );
            break;

            case 'blog-layout-three':
               get_template_part( 'templates/blog-layout/blog-layout', 'three' );
            break;

            case 'blog-layout-four':
                get_template_part( 'templates/blog-layout/blog-layout', 'four' );
            break;

            case 'blog-layout-five':
                get_template_part( 'templates/blog-layout/blog-layout', 'five' );
            break;

            case 'blog-layout-six':
               get_template_part( 'templates/blog-layout/blog-layout', 'six' );
            break;

            case 'blog-layout-seven':
                get_template_part( 'templates/blog-layout/blog-layout', 'seven' );
            break;
            
        }
    endif;
    /* To get blog right sidebar if selected */
    get_template_part( 'templates/home-right', 'sidebar' );