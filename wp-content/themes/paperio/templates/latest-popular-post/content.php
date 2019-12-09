<?php
    
    // Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }
    /* Get blog feature image size */
    $tz_latest_popular_post_feature_image_size = get_theme_mod( 'tz_latest_popular_post_feature_image_size', 'full' );
    /* Check if latest / popular post block show / hide */
    $tz_disable_latest_popular_post = get_theme_mod( 'tz_disable_latest_popular_post', 1 );
    /* Get latest / popular post block title */
    $tz_latest_popular_block_title = get_theme_mod( 'tz_latest_popular_block_title', 'Latest Post' );
    /* Check if title border is on / off */
    $tz_latest_popular_block_title_border = get_theme_mod( 'tz_latest_popular_block_title_border', 0 );
    /* Get latest / popular post block style */
    $tz_latest_popular_post_style = get_theme_mod( 'tz_latest_popular_post_style', 'latest-popular-style1' );
    /* Get latest / popular post block container style */
    $tz_latest_popular_post_container_style = get_theme_mod( 'tz_latest_popular_post_container_style', 'no' );  
    /* Get latest / popular post block display style */  
    $tz_latest_popular_post_block_display_style = get_theme_mod( 'tz_latest_popular_post_block_display_style', 'grid' );
    /* Get latest / popular post block selected category */
    $tz_latest_popular_post_category = get_theme_mod( 'tz_latest_popular_post_category', '' );
    /* Get latest / popular post block category display order by */
    $tz_latest_popular_post_category_orderby = get_theme_mod( 'tz_latest_popular_post_category_orderby', 'date' );
    /* Get latest / popular post block category display sort by */
    $tz_latest_popular_post_category_sortby = get_theme_mod( 'tz_latest_popular_post_category_sortby', 'DESC' );
    /* Check if latest / popular post block post category show / hide */
    $tz_latest_popular_hide_category = get_theme_mod( 'tz_latest_popular_hide_category', 0 );
    /* Check if latest / popular post block post date show / hide */
    $tz_latest_popular_hide_date = get_theme_mod( 'tz_latest_popular_hide_date', 0 );
    /* Get latest / popular post block post date format */
    $tz_latest_popular_date_format = get_theme_mod( 'tz_latest_popular_date_format', '' );
    /* Get No. of items per row in grid type */
    $tz_grid_no_of_items_row = get_theme_mod( 'tz_grid_no_of_items_row', '3' );
    /* Get No. of items per slide – Desktop View */
    $tz_slide_no_of_items_desktop = get_theme_mod( 'tz_slide_no_of_items_desktop', '3' );
    /* Get No. of items per slide – Mini Desktop View */
    $tz_slide_no_of_items_desktop_mini = get_theme_mod( 'tz_slide_no_of_items_desktop_mini', '3' );
    /* Get No. of items per slide – iPad/Tablet View */
    $tz_slide_no_of_items_ipad = get_theme_mod( 'tz_slide_no_of_items_ipad', '2' );
    /* Get No. of items per slide – Mobile View */
    $tz_slide_no_of_items_mobile = get_theme_mod( 'tz_slide_no_of_items_mobile', '1' );
    /* Check if slider loop is on / off */
    $tz_loop = get_theme_mod( 'tz_loop', 'no' );
    /* Check if slider autoplay on / off */
    $tz_latest_popular_autoplay = get_theme_mod( 'tz_latest_popular_autoplay', 'no' );
    /* Check slider speed */
    $tz_latest_popular_autoplay_speed = get_theme_mod( 'tz_latest_popular_autoplay_speed', '3000' );
    /* Check if slider stop on hover is on / off */
    $tz_latest_popular_stop_on_hover = get_theme_mod( 'tz_latest_popular_stop_on_hover', 'no' );
    /* Check if slider navigation on / off */
    $tz_latest_popular_show_navigation = get_theme_mod( 'tz_latest_popular_show_navigation', 'no' );
    /* Check cursor for slider type */
    $tz_latest_popular_cursor_style = ( get_theme_mod( 'tz_latest_popular_cursor_style', 'owl-cursor-default' ) ) ? ' '.get_theme_mod( 'tz_latest_popular_cursor_style', 'owl-cursor-default' ) : '';
    /* Get no of maximum post in latest / popular post block */
    $tz_display_max_post_grid = get_theme_mod( 'tz_display_max_post_grid', '6' );
    /* Get Show Full Title  */
    $tz_show_full_title = get_theme_mod( 'tz_show_full_title', 0 );
    /* Get Show Arrow  */
    $tz_hide_arrow = get_theme_mod( 'tz_hide_arrow', 0 );

    /* Check for container */
    $tz_latest_popular_content_container_fluid = '';
    if( isset( $tz_latest_popular_post_container_style ) && $tz_latest_popular_post_container_style == 'yes' ){
        $tz_latest_popular_content_container_fluid .= 'container-fluid';
    } else {
        $tz_latest_popular_content_container_fluid .= 'container';
    }

    /* Check If latest / popular post block Disable */
    if( $tz_disable_latest_popular_post != 1 ) {
        /* Define null variables */
        $slider_config = $script = $block_class = '';

        /* Check sticky post */
        $tz_sticky_posts = get_option( 'sticky_posts' );

        $args = array(
                    'category_name'  => $tz_latest_popular_post_category,
                    'posts_per_page' => $tz_display_max_post_grid,
                    'post__not_in'      => $tz_sticky_posts,
                    'orderby'        => $tz_latest_popular_post_category_orderby,
                    'order'          => $tz_latest_popular_post_category_sortby,
                );
        $latest_slider_query = new WP_Query( $args );

        do_action( 'paperio_define_latest_post_global_hook' );
        switch( $tz_latest_popular_post_style ) {
            case 'latest-popular-style1':
                if ( $latest_slider_query->have_posts() ) {
                    /* check latest popular display style */
                    switch( $tz_latest_popular_post_block_display_style ){
                        case 'grid':
                            switch( $tz_grid_no_of_items_row ) {
                                case '1':
                                    $block_class = 'col-md-12 col-sm-12 col-xs-12';
                                break;
                                case '2':
                                    $block_class = 'col-md-6 col-sm-6 col-xs-12 post-grid-2';
                                break;
                                case '3':
                                    $block_class = 'col-md-4 col-sm-4 col-xs-12 post-grid-3';
                                break;
                                case '4':
                                    $block_class = 'col-md-3 col-sm-4 col-xs-12 post-grid-4';
                                break;
                            }
                            echo '<section class="margin-four-bottom sm-margin-six-bottom xs-margin-twelve-bottom'.esc_attr( $tz_latest_popular_cursor_style ).'">';
                                echo '<div class="'.esc_attr( $tz_latest_popular_content_container_fluid ).'">';
                                    echo '<div class="row text-center">';
                                        echo '<h5 class="title-border-center text-mid-gray font-weight-600 text-uppercase margin-two-top margin-four-bottom sm-margin-five-bottom xs-margin-fifteen-bottom">';
                                            if( $tz_latest_popular_block_title ) {
                                                if( $tz_latest_popular_block_title_border ) {
                                                    echo '<span class="title-without-border">';
                                                } else {
                                                    echo '<span>';
                                                }
                                                echo esc_attr( $tz_latest_popular_block_title );
                                                echo '</span>';
                                            }
                                        echo '</h5>';
                                        while ( $latest_slider_query->have_posts() ) {
                                        $latest_slider_query->the_post();
                                        /* Exclude posts from blog */
                                        do_action( 'paperio_exclude_latest_post_hook', get_the_ID() );

                                        $tz_img_alt = paperio_image_alt( get_post_thumbnail_id() );
                                        $tz_img_title = paperio_image_title( get_post_thumbnail_id() );
                                        $tz_image_alt = ( isset($tz_img_alt['alt']) && !empty($tz_img_alt['alt']) ) ? $tz_img_alt['alt'] : '' ; 
                                        $tz_image_title = ( isset($tz_img_title['title']) && !empty($tz_img_title['title']) ) ? ' title="'.$tz_img_title['title'].'"' : '';
                                            echo '<div class="'.esc_attr( $block_class ).' margin-bottom-30 xs-margin-bottom-15">';
                                                echo '<div class="latest-post blog-post-hover-style1 bg-black overflow-hidden">';
                                                    if ( has_post_thumbnail() && !post_password_required() ) {
                                                        echo '<a href="'.get_permalink().'" class="gallery-img-hover">';
                                                            echo get_the_post_thumbnail( get_the_ID(), $tz_latest_popular_post_feature_image_size , $tz_image_title ,$tz_image_alt );
                                                        echo '</a>';
                                                    } else {
                                                        echo '<a href="'.get_permalink().'" class="gallery-img-hover">';
                                                            echo '<img src="'.PAPERIO_THEME_IMAGES_URI.'/no-image.jpg" alt="no-image" />';
                                                        echo '</a>';
                                                    }
                                                    if( $tz_latest_popular_hide_date != 1 ) {
                                                        echo '<div class="post-date text-mid-gray text-small text-uppercase alt-font latest-post-date">';
                                                            echo '<span>'.get_the_date( $tz_latest_popular_date_format ).'</span>';
                                                        echo '</div>';
                                                    }
                                                    echo '<a href="'.get_permalink().'" class="post-title background-color latest-post-title">';
                                                        echo '<span class="font-weight-700 text-white fl-left">';
                                                            if( strlen( get_the_title() ) > 28 && $tz_show_full_title != 1 ) {
                                                                echo substr( get_the_title(), 0, 28 ).' ...';
                                                            } else {
                                                                echo get_the_title();
                                                            }
                                                        echo '</span>';
                                                        if( $tz_hide_arrow != 1 ) {
                                                            echo '<i class="fas fa-arrow-right text-white fl-right"></i>';
                                                        }
                                                    echo '</a>';
                                                echo '</div>';
                                            echo '</div>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</section>';
                        break;
                        
                        case 'slider':
                            /* Custom Script Start*/
                            $slide_item_class = '';
                            $slider_config .= 'dots: false,';
                            ( $tz_latest_popular_show_navigation == 'yes' ) ? $slider_config .= 'nav: true, navText: ["<span class=\'screen-reader-text\'>'.esc_html__( 'Prevoius', 'paperio' ).'</span><i class=\'fas fa-long-arrow-alt-left\'></i>", "<span class=\'screen-reader-text\'>'.esc_html__( 'Next', 'paperio' ).'</span><i class=\'fas fa-long-arrow-alt-right\'></i>"],' : $slider_config .= 'nav: false,';
                            ( $tz_latest_popular_autoplay == 'yes' ) ? $slider_config .= 'autoplay:true, autoplayTimeout: '.$tz_latest_popular_autoplay_speed.',autoplaySpeed: '.$tz_latest_popular_autoplay_speed.',' : $slider_config .= 'autoPlay: false,';
                            ( $tz_latest_popular_stop_on_hover == 'yes' ) ? $slider_config .= 'autoplayHoverPause: true, ' : $slider_config .= 'autoplayHoverPause: false, ';
                            ( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
                            ( $tz_loop == 'yes' ) ? $slider_config .= 'loop: true,' : $slider_config .= 'loop: false,';
                            ( $tz_slide_no_of_items_desktop || $tz_slide_no_of_items_desktop_mini || $tz_slide_no_of_items_ipad || $tz_slide_no_of_items_mobile ) ? $slider_config .= "responsive:{" : '';
                            ( $tz_slide_no_of_items_mobile ) ? $slider_config .= '0:{ items: '.$tz_slide_no_of_items_mobile.' },' : $slider_config .= '0:{ items: 1 },';
                            ( $tz_slide_no_of_items_ipad ) ? $slider_config .= '767:{ items: '.$tz_slide_no_of_items_ipad.'},' : $slider_config .= '767:{ items: 2 },';
                            ( $tz_slide_no_of_items_desktop_mini ) ? $slider_config .= '979:{ items: '.$tz_slide_no_of_items_desktop_mini.' },' : $slider_config .= '979:{ items: 2 },';
                            ( $tz_slide_no_of_items_desktop ) ? $slider_config .= '1199:{ items: '.$tz_slide_no_of_items_desktop.' },' : $slider_config .= '1199:{ items: 2 },';
                            ( $tz_slide_no_of_items_desktop || $tz_slide_no_of_items_desktop_mini || $tz_slide_no_of_items_ipad || $tz_slide_no_of_items_mobile ) ? $slider_config .= "}," : '';
                            $slide_item_class = ' post-grid-'.esc_attr( $tz_slide_no_of_items_desktop );
                            /* Custom Script Start*/
                            ob_start();?>
                                <script type="text/javascript">jQuery(document).ready(function () { jQuery(".paperio-latest-post-slider").owlCarousel({ <?php echo paperio_sanitize_textarea( $slider_config, '' ); ?> }); });</script>
                            <?php 
                            $script = ob_get_contents();
                            ob_end_clean();
                            /* End Custom Script Start*/
                            echo '<section class="margin-four-bottom sm-margin-six-bottom xs-margin-twelve-bottom">';
                                echo '<div class="'.esc_attr( $tz_latest_popular_content_container_fluid ).'">';
                                    echo '<div class="row text-center">';
                                        
                                        echo '<h5 class="title-border-center text-mid-gray font-weight-600 text-uppercase margin-two-top margin-four-bottom sm-margin-five-bottom xs-margin-fifteen-bottom">';
                                            if( $tz_latest_popular_block_title ) {
                                                if( $tz_latest_popular_block_title_border ) {
                                                    echo '<span class="title-without-border">';
                                                } else {
                                                    echo '<span>';
                                                }
                                                echo esc_attr( $tz_latest_popular_block_title );
                                                echo '</span>';
                                            }
                                        echo '</h5>';
                                        echo'<div class="col-md-12 col-sm-12 col-xs-12 arrow-pagination no-padding">';
                                            echo'<div id="paperio-latest-post-slider" class="paperio-latest-post-slider owl-carousel owl-theme owl-next-prev-arrow-style3 owl-slider-style'.esc_attr( $tz_latest_popular_cursor_style ).esc_attr( $slide_item_class ).'">';
                                                while ( $latest_slider_query->have_posts() ) {
                                                $latest_slider_query->the_post();
                                                /* Exclude posts from blog */
                                                do_action( 'paperio_exclude_latest_post_hook', get_the_ID() );

                                                $tz_img_alt = paperio_image_alt( get_post_thumbnail_id() );
                                                $tz_img_title = paperio_image_title( get_post_thumbnail_id() );
                                                $tz_image_alt = ( isset($tz_img_alt['alt']) && !empty($tz_img_alt['alt']) ) ? $tz_img_alt['alt'] : '' ; 
                                                $tz_image_title = ( isset($tz_img_title['title']) && !empty($tz_img_title['title']) ) ? ' title="'.$tz_img_title['title'].'"' : '';
                                                    echo '<div class="xs-margin-bottom-30">';
                                                        echo '<div class="latest-post blog-post-hover-style1 bg-black overflow-hidden">';
                                                            if ( has_post_thumbnail() && !post_password_required() ) {
                                                                echo '<a href="'.get_permalink().'" class="gallery-img-hover">';
                                                                    echo get_the_post_thumbnail( get_the_ID(), $tz_latest_popular_post_feature_image_size , $tz_image_title ,$tz_image_alt );
                                                                echo '</a>';
                                                            } else {
                                                                echo '<a href="'.get_permalink().'" class="gallery-img-hover">';
                                                                    echo '<img src="'.PAPERIO_THEME_IMAGES_URI.'/no-image.jpg" alt="no-image" />';
                                                                echo '</a>';
                                                            }
                                                            if( $tz_latest_popular_hide_date != 1 ) {
                                                                echo '<div class="post-date text-mid-gray text-small text-uppercase alt-font latest-post-date">';
                                                                    echo '<span>'.get_the_date( $tz_latest_popular_date_format ).'</span>';
                                                                echo '</div>';
                                                            }
                                                            echo '<a href="'.get_permalink().'" class="post-title background-color latest-post-title">';
                                                                echo '<span class="font-weight-700 text-white fl-left">';
                                                                    if( strlen( get_the_title() ) > 28 && $tz_show_full_title != 1 ){
                                                                        echo substr( get_the_title(), 0, 28 ).' ...';
                                                                    } else {
                                                                        echo get_the_title();
                                                                    }
                                                                echo '</span>';
                                                                if( $tz_hide_arrow != 1 ) {
                                                                    echo '<i class="fas fa-arrow-right text-white fl-right"></i>';
                                                                }
                                                            echo '</a>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                        echo paperio_sanitize_textarea( $script, '' );
                                    echo '</div>';
                                echo '</div>';
                            echo '</section>';
                        break;
                    }
                }
            break;

            case 'latest-popular-style2':
                if ( $latest_slider_query->have_posts() ) {
                    /* check latest popular display style */
                    switch( $tz_latest_popular_post_block_display_style ){
                        case 'grid':
                            switch ($tz_grid_no_of_items_row) {
                                case '1':
                                    $block_class = 'col-md-12 col-sm-12 col-xs-12';
                                break;
                                case '2':
                                    $block_class = 'col-md-6 col-sm-6 col-xs-12 post-grid-2';
                                break;
                                case '3':
                                    $block_class = 'col-md-4 col-sm-4 col-xs-12 post-grid-3';
                                break;
                                case '4':
                                    $block_class = 'col-md-3 col-sm-4 col-xs-12 post-grid-4';
                                break;
                            }
                            echo '<section class="margin-four-bottom sm-margin-six-bottom xs-margin-twelve-bottom'.esc_attr( $tz_latest_popular_cursor_style ).'">';
                                echo '<div class="'.esc_attr( $tz_latest_popular_content_container_fluid ).'">';
                                    echo '<div class="row">';
                                        echo '<h1 class="text-center margin-two-top margin-four-bottom sm-margin-five-bottom xs-margin-twelve-bottom text-mid-gray alt-font font-weight-600 text-uppercase title-small display-table margin-lr-auto">';
                                            if( $tz_latest_popular_block_title ) {
                                                echo '<span class="position-reletive">';
                                                    echo esc_attr( $tz_latest_popular_block_title );
                                                    if( $tz_latest_popular_block_title_border ) {
                                                        echo '<span class="rotate background-color title-without-border"></span>';
                                                    } else {
                                                        echo '<span class="rotate background-color"></span>';
                                                    }
                                                echo '</span>';
                                            }
                                        echo '</h1>';
                                        while ( $latest_slider_query->have_posts() ) {
                                        $latest_slider_query->the_post();
                                        /* Exclude posts from blog */
                                        do_action( 'paperio_exclude_latest_post_hook', get_the_ID() );

                                        $tz_img_alt = paperio_image_alt( get_post_thumbnail_id() );
                                        $tz_img_title = paperio_image_title( get_post_thumbnail_id() );
                                        $tz_image_alt = ( isset($tz_img_alt['alt']) && !empty($tz_img_alt['alt']) ) ? $tz_img_alt['alt'] : '' ; 
                                        $tz_image_title = ( isset($tz_img_title['title']) && !empty($tz_img_title['title']) ) ? ' title="'.$tz_img_title['title'].'"' : '';
                                            echo '<figure class="item text-center margin-bottom-30 xs-margin-bottom-15 '.esc_attr( $block_class ).'">';
                                                if ( has_post_thumbnail() && !post_password_required() ) {
                                                    echo '<a href="'.get_permalink().'">';
                                                        echo get_the_post_thumbnail( get_the_ID(), $tz_latest_popular_post_feature_image_size ,$tz_image_title ,$tz_image_alt );
                                                    echo '</a>';
                                                }
                                                echo '<figcaption class="bg-gray width-92">';
                                                    echo '<p class="text-small text-mid-gray text-uppercase alt-font font-weight-400 latest-post-title"><a href="'.get_permalink().'">';
                                                        if( strlen( get_the_title() ) > 28 && $tz_show_full_title != 1 ){
                                                            echo substr( get_the_title(), 0, 28 ).' ...';
                                                        } else{
                                                            echo get_the_title();
                                                        }
                                                    echo '</a></p>';
                                                    if( $tz_latest_popular_hide_category != 1 || $tz_latest_popular_hide_date != 1 ) {
                                                        echo '<div class="text-white background-color text-uppercase">';
                                                            echo '<ul class="post-meta-box meta-box-style2">';
                                                                if( $tz_latest_popular_hide_category != 1 ) {
                                                                    echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-white latest-post-category-link', '1' ).'</li>';
                                                                }
                                                                if( $tz_latest_popular_hide_date != 1 ) {
                                                                    echo '<li class="latest-post-date">'.get_the_date( $tz_latest_popular_date_format ).'</li>';
                                                                }
                                                            echo '</ul>';
                                                        echo '</div>';
                                                    }
                                                echo '</figcaption>';
                                            echo '</figure>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</section>';
                        break;
                        case 'slider':
                            /* Custom Script Start*/
                            $slide_item_class = '';
                            $slider_config .= 'dots: false,';
                            ( $tz_latest_popular_show_navigation == 'yes' ) ? $slider_config .= 'nav: true, navText: ["<span class=\'screen-reader-text\'>'.esc_html__( 'Prevoius', 'paperio' ).'</span><i class=\'fas fa-long-arrow-alt-left\'></i>", "<span class=\'screen-reader-text\'>'.esc_html__( 'Next', 'paperio' ).'</span><i class=\'fas fa-long-arrow-alt-right\'></i>"],' : $slider_config .= 'nav: false,';
                            ( $tz_latest_popular_autoplay == 'yes' ) ? $slider_config .= 'autoplay:true, autoplayTimeout: '.$tz_latest_popular_autoplay_speed.',autoplaySpeed: '.$tz_latest_popular_autoplay_speed.',' : $slider_config .= 'autoPlay: false,';
                            ( $tz_latest_popular_stop_on_hover == 'yes' ) ? $slider_config .= 'autoplayHoverPause: true, ' : $slider_config .= 'autoplayHoverPause: false, ';
                            ( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
                            ( $tz_loop == 'yes' ) ? $slider_config .= 'loop: true,' : $slider_config .= 'loop: false,';
                            ( $tz_slide_no_of_items_desktop || $tz_slide_no_of_items_desktop_mini || $tz_slide_no_of_items_ipad || $tz_slide_no_of_items_mobile ) ? $slider_config .= "responsive:{" : '';
                            ( $tz_slide_no_of_items_mobile ) ? $slider_config .= '0:{ items: '.$tz_slide_no_of_items_mobile.' },' : $slider_config .= '0:{ items: 1 },';
                            ( $tz_slide_no_of_items_ipad ) ? $slider_config .= '767:{ items: '.$tz_slide_no_of_items_ipad.'},' : $slider_config .= '767:{ items: 2 },';
                            ( $tz_slide_no_of_items_desktop_mini ) ? $slider_config .= '979:{ items: '.$tz_slide_no_of_items_desktop_mini.' },' : $slider_config .= '979:{ items: 2 },';
                            ( $tz_slide_no_of_items_desktop ) ? $slider_config .= '1199:{ items: '.$tz_slide_no_of_items_desktop.' },' : $slider_config .= '1199:{ items: 2 },';
                            ( $tz_slide_no_of_items_desktop || $tz_slide_no_of_items_desktop_mini || $tz_slide_no_of_items_ipad || $tz_slide_no_of_items_mobile ) ? $slider_config .= "}," : '';
                            $slide_item_class = ' post-grid-'.esc_attr( $tz_slide_no_of_items_desktop );
                            /* Custom Script Start*/
                            ob_start();?>
                                <script type="text/javascript">jQuery(document).ready(function () { jQuery(".paperio-popular-slider").owlCarousel({ <?php echo paperio_sanitize_textarea( $slider_config, '' );?> }); });</script>
                            <?php 
                            $script = ob_get_contents();
                            ob_end_clean();
                            /* End Custom Script Start*/
                            echo '<section class="margin-four-bottom sm-margin-six-bottom xs-margin-twelve-bottom">';
                                echo '<div class="'.esc_attr( $tz_latest_popular_content_container_fluid ).'">';
                                    echo '<div class="row">';
                                        echo '<h1 class="text-center margin-two-top margin-four-bottom sm-margin-five-bottom xs-margin-twelve-bottom text-mid-gray alt-font font-weight-600 text-uppercase title-small display-table margin-lr-auto">';
                                            if( $tz_latest_popular_block_title ) {
                                                echo '<span class="position-reletive">';
                                                    echo esc_attr( $tz_latest_popular_block_title );
                                                    if( $tz_latest_popular_block_title_border ) {
                                                        echo '<span class="rotate background-color title-without-border"></span>';
                                                    } else {
                                                        echo '<span class="rotate background-color"></span>';
                                                    }
                                                echo '</span>';
                                            }
                                        echo '</h1>';
                                        echo '<div class="col-md-12 col-sm-12 col-xs-12 arrow-pagination no-padding">';
                                            echo '<div id="owl-slider-style-3" class="paperio-popular-slider owl-slider-style-3 owl-next-prev-arrow-style3 owl-carousel owl-theme'.esc_attr( $tz_latest_popular_cursor_style ).esc_attr( $slide_item_class ).'">';
                                                while ( $latest_slider_query->have_posts() ) {
                                                $latest_slider_query->the_post();
                                                /* Exclude posts from blog */
                                                do_action( 'paperio_exclude_latest_post_hook', get_the_ID() );

                                                $tz_img_alt = paperio_image_alt( get_post_thumbnail_id() );
                                                $tz_img_title = paperio_image_title( get_post_thumbnail_id() );
                                                $tz_image_alt = ( isset($tz_img_alt['alt']) && !empty($tz_img_alt['alt']) ) ? $tz_img_alt['alt'] : '' ; 
                                                $tz_image_title = ( isset($tz_img_title['title']) && !empty($tz_img_title['title']) ) ? ' title="'.$tz_img_title['title'].'"' : '';
                                                    echo '<figure class="item text-center">';
                                                        if ( has_post_thumbnail() && !post_password_required() ) {
                                                            echo '<a href="'.get_permalink().'">';
                                                                echo get_the_post_thumbnail( get_the_ID(), $tz_latest_popular_post_feature_image_size, $tz_image_title ,$tz_image_alt );
                                                            echo '</a>';
                                                        }
                                                        echo '<figcaption class="bg-gray width-92">';
                                                            echo '<p class="text-small text-mid-gray text-uppercase alt-font font-weight-400 latest-post-title"><a href="'.get_permalink().'">';
                                                                if( strlen( get_the_title() ) > 28 && $tz_show_full_title != 1 ){
                                                                    echo substr( get_the_title(), 0, 28 ).' ...';
                                                                } else {
                                                                    echo get_the_title();
                                                                }
                                                            echo '</a></p>';
                                                            if( $tz_latest_popular_hide_category != 1 || $tz_latest_popular_hide_date != 1 ) {
                                                                echo '<div class="text-white background-color text-uppercase">';
                                                                    echo '<ul class="post-meta-box meta-box-style2">';
                                                                        if( $tz_latest_popular_hide_category != 1 ) {
                                                                            echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-white latest-post-category-link', '1' ).'</li>';
                                                                        }
                                                                        if( $tz_latest_popular_hide_date != 1 ) {
                                                                            echo '<li class="latest-post-date">'.get_the_date( $tz_latest_popular_date_format ).'</li>';
                                                                        }
                                                                    echo '</ul>';
                                                                echo '</div>';
                                                            }
                                                        echo '</figcaption>';
                                                    echo '</figure>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                        echo paperio_sanitize_textarea( $script, '' );
                                    echo '</div>';
                                echo '</div>';
                            echo '</section>';
                        break;
                    }
                }            
            break;
        }

        /* Restore original Post Data */
        wp_reset_postdata();
    }