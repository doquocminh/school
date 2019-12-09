!function($) {
    "use strict";
    $( document ).ready(function() {
        var tz_customize = wp.customize;
        var $tz_default_navigation_text_color = '';
        var $tz_default_navigation_submenu_text_color = '';
        var $tz_default_featured_area_title_text_color = '';
        var $tz_default_featured_area_meta_text_color = '';
        var $tz_default_latest_popular_title_color = '';
        var $tz_default_latest_popular_date_color = '';
        var $tz_default_general_blog_title_color = '';
        var $tz_default_general_blog_meta_color = '';
        var $tz_default_blog_comment_and_like_color = '';
        var $tz_default_general_sticky_posts_title_color = '';
        var $tz_default_general_sticky_posts_meta_color = '';
        var $tz_default_sticky_posts_comment_and_like_color = '';
        var $tz_default_general_blog_border_color = '';
        var $tz_default_sidebar_link_hover_color = '';
        var $tz_default_meta_text_color = '';
        var $tz_default_breadcrumb_text_color = '';
        var $tz_default_content_text_color = '';
        var $tz_default_tag_comment_like_text_color = '';
        var $tz_default_author_box_text_color = '';
        var $tz_default_category_layout_title_color = '';
        var $tz_default_category_layout_meta_color = '';
        var $tz_default_category_comment_and_like_color = '';
        var $tz_default_archive_layout_title_color = '';
        var $tz_default_archive_layout_meta_color = '';
        var $tz_default_archive_comment_and_like_color = '';
        var $tz_default_link_color = '';
        var $tz_navigation_submenu_background_color_opacity = '';
        var $tz_default_scrolltotop_arrow_color = '';
        var $tz_default_scrolltotop_background_color = '';
        var $tz_default_blog_readmore_button_color = '';
        var $tz_default_blog_readmore_button_arrow_color = '';
        var $tz_default_blog_readmore_button_background_color = '';
        var $tz_default_blog_readmore_button_border_color = '';
        var $tz_default_featured_readmore_button_color = '';
        var $tz_default_featured_readmore_button_background_color = '';
        var $tz_default_featured_readmore_button_border_color = '';
        var $tz_default_category_readmore_button_color = '';
        var $tz_default_category_readmore_button_background_color = '';
        var $tz_default_category_readmore_button_border_color = '';
        var $tz_default_archive_readmore_button_color = '';
        var $tz_default_archive_readmore_button_background_color = '';
        var $tz_default_archive_readmore_button_border_color = '';


        /* Get value of hover */
        var $tz_default_category_layout_title_hover_color = '';
        var $tz_default_category_layout_meta_hover_color = '';
        var $tz_default_category_layout_comment_and_like_hover_color = '';
        var $tz_default_archive_layout_title_hover_color = '';
        var $tz_default_archive_layout_meta_hover_color = '';
        var $tz_default_archive_layout_comment_and_like_hover_color = '';
        var $tz_default_navigation_text_hover_color = '';
        var $tz_default_navigation_submenu_text_hover_color = '';
        var $tz_default_featured_area_title_text_hover_color = '';
        var $tz_default_featured_area_meta_text_hover_color = '';
        var $tz_default_latest_popular_title_hover_color = '';
        var $tz_default_general_blog_title_hover_color = '';
        var $tz_default_general_blog_meta_hover_color = '';
        var $tz_default_general_sticky_posts_title_hover_color = '';
        var $tz_default_general_sticky_posts_meta_hover_color = '';
        var $tz_default_sticky_posts_comment_and_like_hover_color = '';
        var $tz_default_blog_comment_and_like_hover_color = '';
        var $tz_default_general_blog_border_hover_color = '';
        var $tz_default_sidebar_link_color = '';
        var $tz_default_link_hover_color = '';
        var $tz_default_meta_text_hover_color = '';
        var $tz_default_breadcrumb_text_hover_color = '';
        var $tz_default_content_text_hover_color = '';
        var $tz_default_tag_comment_like_text_hover_color = '';
        var $tz_default_author_box_text_hover_color = '';
        var $tz_default_scrolltotop_arrow_hover_color = '';
        var $tz_default_scrolltotop_hover_background_color = '';
        var $tz_default_blog_readmore_hover_color = '';
        var $tz_default_blog_readmore_button_hover_background_color = '';
        var $tz_default_blog_readmore_button_border_hover_color = '';
        var $tz_default_featured_readmore_hover_color = '';
        var $tz_default_featured_readmore_button_hover_background_color = '';
        var $tz_default_featured_readmore_button_border_hover_color = '';
        var $tz_default_category_readmore_hover_color = '';
        var $tz_default_category_readmore_button_hover_background_color = '';
        var $tz_default_category_readmore_button_border_hover_color = '';
        var $tz_default_archive_readmore_hover_color = '';
        var $tz_default_archive_readmore_button_hover_background_color = '';
        var $tz_default_archive_readmore_button_border_hover_color = '';

        function paperio_hexToRgbA(hex,opa){
            var c;
            if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
                c= hex.substring(1).split('');
                if(c.length== 3){
                    c= [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c= '0x'+c.join('');
                if( opa ){
                    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+','+opa+')';
                }else{
                    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',1)';
                }
            }
        }

        /* Header Social Icon Color */
        tz_customize( 'tz_header_back_color', function( value ) { 
            value.bind( function( to ) {
               $( 'header.header-img' ).css( 'background-color', to );
            });
        });

        /* Header Social Icon Color */
        tz_customize( 'tz_header_border_color', function( value ) { 
            value.bind( function( to ) {
               $( 'header.header-main .header-border' ).css( 'border-color', to );
            });
        });

        /* Mobile Submenu Background Color */
        tz_customize( 'tz_header_mobile_submenu_background_color', function( value ) { 
            value.bind( function( to ) {
                $( '.mobile-tablet-submenu-bg' ).css( 'background-color', to );
                $( '.navbar-collapse' ).attr( 'data-menu-bg-color', to );
            });
        });

        /* Mobile Menu Toggle Background Color */
        tz_customize( 'tz_header_toggle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.navbar-toggle' ).css( 'background-color', to );
            });
        });

        /* Mobile Menu Toggle Background Color */
        tz_customize( 'tz_header_toggle_background_color', function( value ) { 
            value.bind( function( to ) {
               $( '.navbar-default .navbar-toggle .icon-bar' ).css( 'background-color', to );
            });
        });

        /* Header Social Icon Color */
        tz_customize( 'tz_social_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.social-icon i' ).css( 'color', to );
            });
        });

        /* Header Search Icon Color */
        tz_customize( 'tz_search_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.search-form .fa-search' ).css( 'color', to );
            });
        });

        /* Header Navigation Background Color */
        tz_customize( 'tz_add_navigation_bg_color_header', function( value ) { 
            value.bind( function( to ) {
               $( '.paperio-theme-option nav.navbar' ).css( 'background-color', to );
            });
        });

        /* Header Navigation Text Transform */
        tz_customize( 'tz_add_navigation_text_transform', function( value ) { 
         	value.bind( function( to ) {
            	$( '.navbar-default .navbar-nav li a' ).css( 'text-transform', to );
            });
        });

        /* Header Navigation Text Color */
        tz_customize( 'tz_navigation_text_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_navigation_text_color = to;
                $( '.navbar-default .navbar-nav > li > a' ).css( 'color', to );
                if( !$tz_default_navigation_text_hover_color ){
                    tz_customize( 'tz_navigation_text_hover_color', function( value ) { 
                        $( '.navbar-default .navbar-nav > li > a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_navigation_text_color );
                        });
                    });
                }
            });
        });

        /* Header Navigation Text Hover Color */
        tz_customize( 'tz_navigation_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_navigation_text_hover_color = to;
                $( '.navbar-default .navbar-nav > li > a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_navigation_text_color );
                });
            });
        });

        /* Submenu settings */

        /* Submenu Background Color */
        tz_customize( 'tz_navigation_submenu_background_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_navigation_submenu_text_color = to;
                $( '.sub-menu, .children' ).css( 'background-color', paperio_hexToRgbA(to,$tz_navigation_submenu_background_color_opacity) );
            });
        });

         /* Submenu Background Opacity */
        tz_customize( 'tz_navigation_submenu_background_color_opacity', function( value ) { 
            value.bind( function( to ) {
                $tz_navigation_submenu_background_color_opacity = to;
                $( '.sub-menu, .children' ).css( 'background-color', paperio_hexToRgbA($tz_default_navigation_submenu_text_color,$tz_navigation_submenu_background_color_opacity) );
                tz_customize( 'tz_navigation_submenu_background_color', function( value ) { 
                    value.bind( function( to ) {
                        $tz_default_navigation_submenu_text_color = to;
                        $( '.sub-menu, .children' ).css( 'background-color', paperio_hexToRgbA(to,$tz_navigation_submenu_background_color_opacity) );
                    });
                });
            });
        });
        
        /* Megamenu Title Border Color */
        tz_customize( 'tz_navigation_megamenu_title_border_color', function( value ) { 
            value.bind( function( to ) {
                $( '.dropdown .megamenu .dropdown-header' ).css( 'border-color', to );
            });
        });

        /* Submenu Text Color */
        tz_customize( 'tz_navigation_submenu_text_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_navigation_submenu_text_color = to;
                $( '.sub-menu > li > a,.dropdown .megamenu li a,.children > li > a' ).css( 'color', to );
                if( !$tz_default_navigation_submenu_text_hover_color ){
                    tz_customize( 'tz_navigation_submenu_text_hover_color', function( value ) { 
                        $( '.sub-menu > li > a,.dropdown .megamenu li a,.children > li > a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_navigation_submenu_text_color );
                        });
                    });
                }
            });
        });

        /* Submenu Text Hover Color */
        tz_customize( 'tz_navigation_submenu_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_navigation_submenu_text_hover_color = to;
                $( '.sub-menu > li > a,.dropdown .megamenu li a,.children > li > a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_navigation_submenu_text_color );
                });
            });
        });

        /* Feature Area Slider Box Background Color */
        tz_customize( 'tz_featured_area_box_bgcolor', function( value ) { 
            value.bind( function( to ) {
                $( '.banner-background' ).css( 'background-color', to );
            });
        });

        /* Feature Area Slider Overlay Background Color */
        tz_customize( 'tz_featured_area_overlay_bgcolor', function( value ) { 
            value.bind( function( to ) {
                $( '.overlay-layer' ).css( 'background-color', to );
            });
        });

        /* Feature Area Slider Overlay Opacity */
        tz_customize( 'tz_featured_area_overlay_opacity', function( value ) { 
            value.bind( function( to ) {
                $( '.overlay-layer' ).css( 'opacity', to );
            });
        });

        /* Feature Area Title Color */
        tz_customize( 'tz_featured_area_title_text_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_featured_area_title_text_color = to;
                $( '.featured-style-title a' ).css( 'color', to );
                if( !$tz_default_featured_area_title_text_hover_color ){
                    tz_customize( 'tz_featured_area_title_text_hover_color', function( value ) { 
                        $( '.featured-style-title a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_featured_area_title_text_color );
                        });
                    });
                }
            });
        });

        /* Feature Area Title Hover Color */
        tz_customize( 'tz_featured_area_title_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_featured_area_title_text_hover_color = to;
                $( '.featured-style-title a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_featured_area_title_text_color );
                });
            });
        });

        /* Feature Area Meta Color */
        tz_customize( 'tz_featured_area_meta_text_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_featured_area_meta_text_color = to;
                $( '.featured-style-meta a,.featured-style-meta' ).css( 'color', to );
                if( $tz_default_featured_area_meta_text_hover_color ){
                    tz_customize( 'tz_featured_area_meta_text_hover_color', function( value ) { 
                        $( '.featured-style-meta a.featured-style-meta-link' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_featured_area_meta_text_color );
                        });
                    });
                }
            });
        });

        /* Feature Area Meta Hover Color */
        tz_customize( 'tz_featured_area_meta_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_featured_area_meta_text_hover_color = to;
                $( '.featured-style-meta a.featured-style-meta-link' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_featured_area_meta_text_color );
                });
            });
        });

        /* Latest / Popular Block Title Settings */

        /* Latest Posts Title Color */
        tz_customize( 'tz_latest_popular_title_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_latest_popular_title_color = to;
                $( '.latest-post-title span,.latest-post-title a' ).css( 'color', to );
                if( !$tz_default_latest_popular_title_hover_color ){
                    tz_customize( 'tz_latest_popular_title_hover_color', function( value ) { 
                        $( '.latest-post-title a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_latest_popular_title_color );
                        });
                    });
                }
            });
        });

        /* Latest Posts Title Hover Color */
        tz_customize( 'tz_latest_popular_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_latest_popular_title_hover_color = to;
                $( '.latest-post-title a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_latest_popular_title_color );
                });
            });
        });

        /* Latest Posts Date Color */
        tz_customize( 'tz_latest_popular_date_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_latest_popular_date_color = to;
                $( '.paperio-theme-option .latest-post-date, .paperio-theme-option .paperio-popular-slider .latest-post-date, .paperio-theme-option  .latest-post-category-link, .paperio-theme-option .paperio-popular-slider .latest-post-category-link' ).css( 'color', to );
            });
        });


        /* Promotional Block Border Color */
        tz_customize( 'tz_promotional_block_border_color', function( value ) { 
            value.bind( function( to ) {
                $( '.promo-border' ).css( 'border-color', to );
            });
        });

        /* Promotional Block Hover Color */
        tz_customize( 'tz_promotional_block_hover_color', function( value ) { 
            value.bind( function( to ) {
                $( '.promo-item' ).hover(function(){
                    $(this).find('.promo-border' ).css( 'background-color', to );
                }, function(){
                    $(this).find('.promo-border' ).css( 'background-color', '' );
                });
            });
        });

        /* Promotional Block Hover Color Opacity */
        tz_customize( 'tz_promotional_block_hover_color_opacity', function( value ) { 
            value.bind( function( to ) {
                $( '.promo-item' ).hover(function(){
                    $(this).find('.promo-border' ).css( 'opacity', to );
                }, function(){
                    $(this).find('.promo-border' ).css( 'opacity', '' );
                });
            });
        });

        /* Promotional Block Title Color */
        tz_customize( 'tz_promotional_block_title_color', function( value ) { 
            value.bind( function( to ) {
                $( '.promo-title' ).css( 'color', to );
            });
        });

        /* Blog Layout Title Color */
        tz_customize( 'tz_general_blog_title_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_general_blog_title_color = to;
                $( '.blog-layout-title a' ).css( 'color', to );
                if( !$tz_default_general_blog_title_hover_color ){
                    tz_customize( 'tz_general_blog_title_hover_color', function( value ) { 
                        $( '.blog-layout-title a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_general_blog_title_color );
                        });
                    });
                }
            });
        });

        /* Blog Layout Title Hover Color */
        tz_customize( 'tz_general_blog_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_general_blog_title_hover_color = to;
                $( '.blog-layout-title a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_general_blog_title_color );
                });
            });
        });

        /* Blog Layout Meta Color */
        tz_customize( 'tz_general_blog_meta_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_general_blog_meta_color = to;
                $( '.blog-layout-meta, a.blog-layout-meta-link' ).css( 'color', to );
                if( !$tz_default_general_blog_meta_hover_color ){
                    tz_customize( 'tz_general_blog_meta_hover_color', function( value ) { 
                        $( '.paperio-theme-option a.blog-layout-meta-link' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_general_blog_meta_color );
                        });
                    });
                }
            });
        });

        /* Blog Layout Meta Hover Color */
        tz_customize( 'tz_general_blog_meta_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_general_blog_meta_hover_color = to;
                $( '.paperio-theme-option a.blog-layout-meta-link' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_general_blog_meta_color );
                });
            });
        });

        /* Comment and Like Color */
        tz_customize( 'tz_general_blog_comment_and_like_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_blog_comment_and_like_color = to;
                $( '.blog-listing-comment  .blog-layout-comment-link' ).css( 'color', to );
                if( !$tz_default_blog_comment_and_like_hover_color ){
                    tz_customize( 'tz_general_blog_comment_and_like_hover_color', function( value ) { 
                        $( '.blog-listing-comment  .blog-layout-comment-link' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_blog_comment_and_like_color );
                        });
                    });
                }
            });
        });

        /* Comment and Like Hover Color */
        tz_customize( 'tz_general_blog_comment_and_like_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_blog_comment_and_like_hover_color = to;
                $( '.blog-listing-comment  .blog-layout-comment-link' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_blog_comment_and_like_color );
                });
            });
        });

        /* Post Box Background Color */
        tz_customize( 'tz_general_blog_box_color', function( value ) { 
            value.bind( function( to ) {
                $( '.blog-layout-content' ).css( 'background-color', to );
            });
        });

        /* Post Box Boder Color */
        tz_customize( 'tz_general_blog_box_border_color', function( value ) { 
            value.bind( function( to ) {
                $( '.post-content' ).css( 'border-color', to );
            });
        });

        /* Post Content Color */
        tz_customize( 'tz_general_blog_content_color', function( value ) { 
            value.bind( function( to ) {
                $( '.post-content p' ).css( 'color', to );
            });
        });

        /* Blog Post Separator Color */
        tz_customize( 'tz_general_blog_separator_color', function( value ) { 
            value.bind( function( to ) {
                $( '.blog-layout-separator' ).css( 'background-color', to );
            });
        });

        /* Blog Post Border Color */
        tz_customize( 'tz_general_blog_border_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_general_blog_border_color = to;
                $( '.blog-listing-style7 .blog-layout-content' ).css( 'border-color', to );
                if( $tz_default_general_blog_border_hover_color ){
                    tz_customize( 'tz_general_blog_border_hover_color', function( value ) { 
                        $( '.paperio-theme-option .blog-listing-style7' ).hover(function(){
                            $(this).find(".blog-layout-content").css( 'border-color', '' );
                        }, function(){
                            $(this).find(".blog-layout-content").css( 'border-color', $tz_default_general_blog_border_color );
                        });
                    });
                }
            });
        });

        /* Blog Post Border Hover Color */
        tz_customize( 'tz_general_blog_border_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_general_blog_border_hover_color = to;
                $( '.paperio-theme-option .blog-listing-style7' ).hover(function(){
                    $(this).find(".blog-layout-content").css( 'border-color', to );
                }, function(){
                    $(this).find(".blog-layout-content").css( 'border-color', $tz_default_general_blog_border_color );
                });
            });
        });

        /* Sticky Post Title Color */
        tz_customize( 'tz_general_sticky_posts_title_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_general_sticky_posts_title_color = to;
                $( '.sticky-post-layout-title a' ).css( 'color', to );
                if( !$tz_default_general_sticky_posts_title_hover_color ){
                    tz_customize( 'tz_general_sticky_posts_title_hover_color', function( value ) { 
                        $( '.sticky-post-layout-title a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_general_sticky_posts_title_color );
                        });
                    });
                }
            });
        });

        /* Sticky Post Title Hover Color */
        tz_customize( 'tz_general_sticky_posts_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_general_sticky_posts_title_hover_color = to;
                $( '.sticky-post-layout-title a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_general_sticky_posts_title_color );
                });
            });
        });

        /* Sticky Post Meta Color */
        tz_customize( 'tz_general_sticky_posts_meta_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_general_sticky_posts_meta_color = to;
                $( '.sticky-post-layout-meta, a.sticky-post-layout-meta-link' ).css( 'color', to );
                if( !$tz_default_general_sticky_posts_meta_hover_color ){
                    tz_customize( 'tz_general_sticky_posts_meta_hover_color', function( value ) { 
                        $( '.paperio-theme-option a.sticky-post-layout-meta-link' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_general_sticky_posts_meta_color );
                        });
                    });
                }
            });
        });

        /* Sticky Post Meta Hover Color */
        tz_customize( 'tz_general_sticky_posts_meta_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_general_sticky_posts_meta_hover_color = to;
                $( '.paperio-theme-option a.sticky-post-layout-meta-link' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_general_sticky_posts_meta_color );
                });
            });
        });

        /* Comment and Like Color */
        tz_customize( 'tz_general_sticky_posts_comment_and_like_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_sticky_posts_comment_and_like_color = to;
                $( '.sticky-post-layout-meta-data,.sticky-post-layout-meta-data .sticky-post-layout-comment-link' ).css( 'color', to );
                if( !$tz_default_sticky_posts_comment_and_like_hover_color ){
                    tz_customize( 'tz_general_sticky_posts_comment_and_like_hover_color', function( value ) { 
                        $( '.sticky-post-layout-meta-data .sticky-post-layout-comment-link' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_sticky_posts_comment_and_like_color );
                        });
                    });
                }
            });
        });

        /* Comment and Like Hover Color */
        tz_customize( 'tz_general_sticky_posts_comment_and_like_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_sticky_posts_comment_and_like_hover_color = to;
                $( '.sticky-post-layout-meta-data .sticky-post-layout-comment-link' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_sticky_posts_comment_and_like_color );
                });
            });
        });

        /* Sticky Post Box Background Color */
        tz_customize( 'tz_general_sticky_posts_box_color', function( value ) { 
            value.bind( function( to ) {
                $( '.sticky-post-layout-content' ).css( 'background-color', to );
            });
        });

        /* Sticky Post Box Boder Color */
        tz_customize( 'tz_general_sticky_posts_box_border_color', function( value ) { 
            value.bind( function( to ) {
                $( '.sticky-post-layout-content' ).css( 'border-color', to );
            });
        });

        /* Sidebar Title Color */
        tz_customize( 'tz_sidebar_title_color', function( value ) { 
            value.bind( function( to ) {
                $( '.paperio-theme-option .widget-title' ).css( 'color', to );
            });
        });

        /* Sidebar Link Color */
        tz_customize( 'tz_sidebar_link_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_sidebar_link_hover_color = to;
                $( '.sidebar a,.paperio-theme-option .follow-box li a' ).css( 'color', to );
                if( !$tz_default_sidebar_link_color ){
                    tz_customize( 'tz_sidebar_link_hover_color', function( value ) { 
                        $( '.sidebar a,.paperio-theme-option .follow-box li a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_sidebar_link_hover_color );
                        });
                    });
                }
            });
        });

        /* Sidebar Link Hover Color */
        tz_customize( 'tz_sidebar_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_sidebar_link_color = to;
                $( '.sidebar a,.paperio-theme-option .follow-box li a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_sidebar_link_hover_color );
                });
            });
        });

        /* Sidebar Border Color */
        tz_customize( 'tz_sidebar_border_color', function( value ) { 
            value.bind( function( to ) {
                $( '.sidebar-style2 .widget,.sidebar-style4 .widget' ).css( 'border-color', to );
            });
        });

        /* Sidebar Background Color */
        tz_customize( 'tz_sidebar_background_color', function( value ) { 
            value.bind( function( to ) {
                $( '.paperio-theme-option .sidebar .widget' ).css( 'background-color', to );
            });
        });

        /* Page Title Text Transform */
        tz_customize( 'tz_title_text_transform', function( value ) { 
            value.bind( function( to ) {
                $( '.blog-single-page-title' ).css( 'text-transform', to );
            });
        });

        /* Page Title Color */
        tz_customize( 'tz_title_text_color', function( value ) { 
            value.bind( function( to ) {
                $( '.blog-single-page-title' ).css( 'color', to );
            });
        });

        /* Page Title Meta Color */
        tz_customize( 'tz_meta_text_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_meta_text_color = to;
                $( '.paperio-theme-option a.blog-single-page-meta-link,.blog-single-page-meta' ).css( 'color', to );
                if( !$tz_default_meta_text_hover_color ){
                    tz_customize( 'tz_meta_text_hover_color', function( value ) { 
                        $( '.paperio-theme-option a.blog-single-page-meta-link' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_meta_text_color );
                        });
                    });
                }
            });
        });

        /* Page Title Meta Hover Color */
        tz_customize( 'tz_meta_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_meta_text_hover_color = to;
                $( '.paperio-theme-option a.blog-single-page-meta-link' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_meta_text_color );
                });
            });
        });

        /* Page Title Background Color */
        tz_customize( 'tz_title_background_color', function( value ) { 
            value.bind( function( to ) {
                $( '.blog-single-page-background' ).css( 'background-color', to );
            });
        });

        /* Page Title Border Color */
        tz_customize( 'tz_title_border_color', function( value ) { 
            value.bind( function( to ) {
                $( '.blog-single-page-background' ).css( 'border-color', to );
            });
        });

        /* Breadcrumb Text Color */
        tz_customize( 'tz_breadcrumb_text_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_breadcrumb_text_color = to;
                $( '.paperio-breadcrumb-settings,.paperio-breadcrumb-settings a' ).css( 'color', to );
                if( !$tz_default_breadcrumb_text_hover_color ){
                    tz_customize( 'tz_breadcrumb_text_hover_color', function( value ) { 
                        $( '.paperio-theme-option .paperio-breadcrumb-settings a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_breadcrumb_text_color );
                        });
                    });
                }
            });
        });

        /* Page Title Text Transform */
        tz_customize( 'tz_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_breadcrumb_text_hover_color = to;
                $( '.paperio-theme-option .paperio-breadcrumb-settings a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_breadcrumb_text_color );
                });
            });
        });

        /* Page Title Text Transform */
        tz_customize( 'tz_breadcrumb_background_color', function( value ) { 
            value.bind( function( to ) {
                $( '.paperio-breadcrumb-navigation' ).css( 'background-color', to );
            });
        });

        /* Page Title Text Transform */
        tz_customize( 'tz_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
                $( '.paperio-breadcrumb-navigation' ).css( 'border-color', to );
            });
        });

        /* For Content Text Color */
        tz_customize( 'tz_content_link_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_content_text_color = to;
                $( '.entry-content p a' ).css( 'color', to );
                if( !$tz_default_content_text_hover_color ){
                    tz_customize( 'tz_content_link_hover_color', function( value ) { 
                        $( '.entry-content p a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_content_text_color );
                        });
                    });
                }
            });
        });

        /* For Content Text Hover Color */
        tz_customize( 'tz_content_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_content_text_hover_color = to;
                $( '.entry-content p a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_content_text_color );
                });
            });
        });

        /* For Post Detail Tag, Comment, Like Color */
        tz_customize( 'tz_post_tag_comment_like_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_tag_comment_like_text_color = to;
                $( '.post-details-tags-main, .post-details-tags-main a, .blog-listing-comment a i' ).css( 'color', to );
                if( !$tz_default_tag_comment_like_text_hover_color ){
                    tz_customize( 'tz_post_tag_comment_like_hover_color', function( value ) { 
                        $( '.post-details-tags-main a, .blog-listing-comment a i' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_tag_comment_like_text_color );
                        });
                    });
                }
            });
        });

        /* For Post Detail Tag, Comment, Like Hover Color */
        tz_customize( 'tz_post_tag_comment_like_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_tag_comment_like_text_hover_color = to;
                $( '.post-details-tags-main a, .blog-listing-comment a i' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_tag_comment_like_text_color );
                });
            });
        });

        /* For Post Detail Tag, Comment, Like Border Color */
        tz_customize( 'tz_post_tag_comment_like_border_color', function( value ) { 
            value.bind( function( to ) {
                $( '.paperio-meta-border-color' ).css( 'border-color', to );
            });
        });

        /* For Post Detail Author Box Background Color */
        tz_customize( 'tz_post_author_box_bg_color', function( value ) { 
            value.bind( function( to ) {
                $( '.about-author' ).css( 'background-color', to );
            });
        });

        /* For Post Detail Author Box Color */
        tz_customize( 'tz_post_author_title_text_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_author_box_text_color = to;
                $( 'a.author-name' ).css( 'color', to );
                if( !$tz_default_author_box_text_hover_color ){
                    tz_customize( 'tz_post_author_title_text_hover_color', function( value ) { 
                        $( 'a.author-name' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_author_box_text_color );
                        });
                    });
                }
            });
        });

        /* For Post Detail Author Box Hover Color */
        tz_customize( 'tz_post_author_title_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_author_box_text_hover_color = to;
                $( 'a.author-name' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_author_box_text_color );
                });
            });
        });

        /* Category Layout Title Color */
        tz_customize( 'tz_category_layout_title_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_category_layout_title_color = to;
                $( '.category-layout-title a' ).css( 'color', to );
                if( !$tz_default_category_layout_title_hover_color ){
                    tz_customize( 'tz_category_layout_title_hover_color', function( value ) { 
                        $( '.category-layout-title a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_category_layout_title_color );
                        });
                    });
                }
            });
        });

        /* Category Layout Title Hover Color */
        tz_customize( 'tz_category_layout_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_category_layout_title_hover_color = to;
                $( '.category-layout-title a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_category_layout_title_color );
                });
            });
        });

        /* Category Layout Meta Color */
        tz_customize( 'tz_category_layout_meta_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_category_layout_meta_color = to;
                $( '.category-layout-meta, a.category-layout-meta-link' ).css( 'color', to );
                if( !$tz_default_category_layout_meta_hover_color ){
                    tz_customize( 'tz_category_layout_meta_hover_color', function( value ) { 
                        $( '.paperio-theme-option a.category-layout-meta-link' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_category_layout_meta_color );
                        });
                    });
                }
            });
        });

        /* Category Layout Meta Hover Color */
        tz_customize( 'tz_category_layout_meta_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_category_layout_meta_hover_color = to;
                $( '.paperio-theme-option a.category-layout-meta-link' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_category_layout_meta_color );
                });
            });
        });

        /* Comment and Like Color */
        tz_customize( 'tz_category_layout_comment_and_like_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_category_comment_and_like_color = to;
                $( '.blog-listing-comment  .category-layout-comment-link' ).css( 'color', to );
                if( !$tz_default_category_layout_comment_and_like_hover_color ){
                    tz_customize( 'tz_category_layout_comment_and_like_hover_color', function( value ) { 
                        $( '.blog-listing-comment  .category-layout-comment-link' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_category_comment_and_like_color );
                        });
                    });
                }
            });
        });

        /* Comment and Like Hover Color */
        tz_customize( 'tz_category_layout_comment_and_like_hover_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_category_layout_comment_and_like_hover_color = to;          
                $( '.blog-listing-comment  .category-layout-comment-link' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_category_comment_and_like_color );
                });
            });
        });

        /* Archive Layout Title Color */
        tz_customize( 'tz_archive_layout_title_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_archive_layout_title_color = to;
                $( '.archive-layout-title a' ).css( 'color', to );
                if( !$tz_default_archive_layout_title_hover_color ){
                    tz_customize( 'tz_archive_layout_title_hover_color', function( value ) { 
                        $( '.archive-layout-title a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_archive_layout_title_color );
                        });
                    });
                }
            });
        });

        /* Archive Layout Title Hover Color */
        tz_customize( 'tz_archive_layout_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_archive_layout_title_hover_color = to;
                $( '.archive-layout-title a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_archive_layout_title_color );
                });
            });
        });

        /* Archive Layout Meta Color */
        tz_customize( 'tz_archive_layout_meta_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_archive_layout_meta_color = to;
                $( '.archive-layout-meta, a.archive-layout-meta-link' ).css( 'color', to );
                if( !$tz_default_archive_layout_meta_hover_color ){
                    tz_customize( 'tz_archive_layout_meta_hover_color', function( value ) { 
                        $( '.paperio-theme-option a.archive-layout-meta-link' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_archive_layout_meta_color );
                        });
                    });
                }
            });
        });

        /* Archive Layout Meta Hover Color */
        tz_customize( 'tz_archive_layout_meta_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_archive_layout_meta_hover_color = to;
                $( '.paperio-theme-option a.archive-layout-meta-link' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_archive_layout_meta_color );
                });
            });
        });

        /* Comment and Like Color */
        tz_customize( 'tz_archive_layout_comment_and_like_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_archive_comment_and_like_color = to;
                $( '.blog-listing-comment  .archive-layout-comment-link' ).css( 'color', to );
                if( !$tz_default_archive_layout_comment_and_like_hover_color ){
                    tz_customize( 'tz_archive_layout_comment_and_like_hover_color', function( value ) { 
                        $( '.blog-listing-comment .archive-layout-comment-link' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_archive_comment_and_like_color );
                        });
                    });
                }
            });
        });

        /* Comment and Like Hover Color */
        tz_customize( 'tz_archive_layout_comment_and_like_hover_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_archive_layout_comment_and_like_hover_color = to;          
                $( '.blog-listing-comment .archive-layout-comment-link' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_archive_comment_and_like_color );
                });
            });
        });

        /* For Body Background Color */
        tz_customize( 'tz_body_background_color', function( value ) { 
            value.bind( function( to ) {
               $( 'body.paperio-theme-option' ).css( 'background-color', to );
            });
        });

        /* For Body Text Color */
        tz_customize( 'tz_body_text_color', function( value ) { 
            value.bind( function( to ) {
               $( 'body.paperio-theme-option' ).css( 'color', to );
            });
        });

        /* For Body image */
        tz_customize( 'tz_body_background_banner_image', function( value ) { 
            value.bind( function( to ) {
                if( to ) {
                    $( 'body' ).addClass( 'paperio-theme-body-image' );
                    $( 'body.paperio-theme-body-image' ).css( 'background-image', 'url('+to+')' );
                } else {
                    if( $( 'body' ).hasClass( 'paperio-theme-body-image' ) ) {
                        $( 'body.paperio-theme-body-image' ).css( 'background-image', '' );
                        $( 'body' ).removeClass( 'paperio-theme-body-image' );
                    }
                }
            });
        });

        /* For Body image */
        tz_customize( 'tz_body_background_banner_image_repeat', function( value ) { 
            value.bind( function( to ) {
                if( to ) {
                    $( 'body.paperio-theme-body-image' ).css( 'background-repeat', to );
                } else {
                    $( 'body.paperio-theme-body-image' ).css( 'background-repeat', '' );
                }
            });
        });
        
        /* For Footer BG Color */
        tz_customize( 'tz_footer_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.footer-bg' ).css( 'background-color', to );
            });
        });

        /* For Footer Border Color */
        tz_customize( 'tz_footer_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.footer-border' ).css( 'border-color', to );
            });
        });

        /* For Footer Widget Title Color */
        tz_customize( 'tz_footer_widget_title_color', function( value ) { 
            value.bind( function( to ) {
                $( '.site-footer .widget-title' ).css( 'color', to );
            });
        });

        /* For Social Icon Color */
        tz_customize( 'tz_post_social_icon_color', function( value ) { 
            value.bind( function( to ) {
                $( '.social-sharing-icon i' ).css( 'color', to );
            });
        });

        /* For ScrollToTop arrow Color */
        tz_customize( 'tz_scrolltotop_arrow_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_scrolltotop_arrow_hover_color = to;
                $( '.back-to-top i' ).css( 'color', to );
                if( !$tz_default_scrolltotop_arrow_color ){
                    tz_customize( 'tz_scrolltotop_arrow_hover_color', function( value ) { 
                        $( '.back-to-top' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_scrolltotop_arrow_hover_color );
                        });
                    });
                }
            });
        });

        /* For ScrollToTop arrow hover Color */
        tz_customize( 'tz_scrolltotop_arrow_hover_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_scrolltotop_arrow_color = to;          
                $( '.back-to-top i' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_scrolltotop_arrow_hover_color );
                });
            });
        });
        
        /* For ScrollToTop arrow background Color */
        tz_customize( 'tz_scrolltotop_background_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_scrolltotop_hover_background_color = to;
                $( '.back-to-top' ).css( 'background-color', to );
                if( !$tz_default_scrolltotop_background_color ){
                    tz_customize( 'tz_scrolltotop_background_hover_color', function( value ) { 
                        $( '.back-to-top' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $tz_default_scrolltotop_hover_background_color );
                        });
                    });
                }
            });
        });

        /* For ScrollToTop arrow background hover Color */
        tz_customize( 'tz_scrolltotop_background_hover_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_scrolltotop_background_color = to;          
                $( '.back-to-top' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $tz_default_scrolltotop_hover_background_color );
                });
            });
        });

        /* For Blog Read more Button Color */
        tz_customize( 'tz_readmore_button_color', function( value ) { 
             value.bind( function( to ) {
                $tz_default_blog_readmore_button_color = to;
                $( '.blog .blog-meta a.btn,.blog .blog-meta a.btn i' ).css( 'color', to );
                if( !$tz_default_blog_readmore_hover_color ){
                    tz_customize( 'tz_readmore_button_hover_color', function( value ) { 
                        $( '.blog .blog-meta a.btn' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_blog_readmore_button_color );
                        });
                    });
                }
            });
        });

        /* For Blog Read more Button hover Color */
        tz_customize( 'tz_readmore_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_blog_readmore_hover_color = to;
                $( '.blog .blog-meta a.btn' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_blog_readmore_button_color );
                });
            });
        });

        /* For Blog Read more Button Border Color  */
        tz_customize( 'tz_readmore_button_border_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_blog_readmore_button_border_color = to;
                $( '.blog .blog-meta a.btn' ).css( 'border-color', to );
                if( !$tz_default_blog_readmore_button_border_hover_color ){
                    tz_customize( 'tz_readmore_button_border_hover_color', function( value ) { 
                        $( '.blog .blog-meta a.btn' ).hover(function(){
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $tz_default_blog_readmore_button_border_color );
                        });
                    });
                }
            });
        });

        /* For Blog Read more Button Border hover Color */
        tz_customize( 'tz_readmore_button_border_hover_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_blog_readmore_button_border_hover_color = to;          
                $( '.blog .blog-meta a.btn' ).hover(function(){
                    $(this).css( 'border-color', to );
                }, function(){
                     $(this).css( 'border-color', $tz_default_blog_readmore_button_border_color );
                });
            });
        });

        /* For Blog Read more Button Background Color */
        tz_customize( 'tz_readmore_button_background_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_blog_readmore_button_background_color = to;
                $( '.blog .blog-meta a.btn' ).css( 'background-color', to );
                if( !$tz_default_blog_readmore_button_hover_background_color ){
                    tz_customize( 'tz_readmore_button_hover_background_color', function( value ) { 
                        $( '.blog .blog-meta a.btn' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                             $(this).css( 'background-color', $tz_default_blog_readmore_button_background_color );
                        });
                    });
                }
            });
        });

        /* For Blog Read more Button Background Hover Color */
        tz_customize( 'tz_readmore_button_hover_background_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_blog_readmore_button_hover_background_color = to;          
                $( '.blog .blog-meta a.btn' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $tz_default_blog_readmore_button_background_color );
                });
            });
        });

        /* For Featured Read more Button Color */
        tz_customize( 'tz_featured_readmore_button_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_featured_readmore_button_color = to;
                $( '.blog .owl-slider .item a.btn' ).css( 'color', to );
                if( !$tz_default_featured_readmore_hover_color ){
                    tz_customize( 'tz_featured_readmore_button_hover_color', function( value ) { 
                        $( '.blog .owl-slider .item a.btn' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_featured_readmore_button_color );
                        });
                    });
                }
            });
        });

        /* For Featured Read more Button hover Color */
        tz_customize( 'tz_featured_readmore_button_hover_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_featured_readmore_hover_color = to;          
                $( '.blog .owl-slider .item a.btn' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_featured_readmore_button_color );
                });
            });
        });

        /* For Featured Read more Button Border Color  */
        tz_customize( 'tz_featured_readmore_button_border_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_featured_readmore_button_border_color = to;
                $( '.blog .owl-slider .item a.btn' ).css( 'border-color', to );
                if( !$tz_default_featured_readmore_button_border_hover_color ){
                    tz_customize( 'tz_featured_readmore_button_border_hover_color', function( value ) { 
                        $( '.blog .owl-slider .item a.btn' ).hover(function(){
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $tz_default_featured_readmore_button_border_color );
                        });
                    });
                }
            });
        });

        /* For Featured Read more Button Border hover Color */
        tz_customize( 'tz_featured_readmore_button_border_hover_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_featured_readmore_button_border_hover_color = to;          
                $( '.blog .owl-slider .item a.btn' ).hover(function(){
                    $(this).css( 'border-color', to );
                }, function(){
                     $(this).css( 'border-color', $tz_default_featured_readmore_button_border_color );
                });
            });
        });

        /* For Featured Read more Button Background Color */
        tz_customize( 'tz_featured_readmore_button_background_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_featured_readmore_button_background_color = to;
                $( '.blog .owl-slider .item a.btn' ).css( 'background-color', to );
                if( !$tz_default_featured_readmore_button_hover_background_color ){
                    tz_customize( 'tz_featured_readmore_button_hover_background_color', function( value ) { 
                        $( '.blog .owl-slider .item a.btn' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $tz_default_featured_readmore_button_background_color );
                        });
                    });
                }
            });
        });

        /* For Featured Read more Button Background Hover Color */
        tz_customize( 'tz_featured_readmore_button_hover_background_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_featured_readmore_button_hover_background_color = to;          
                $( '.blog .owl-slider .item a.btn' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                     $(this).css( 'background-color', $tz_default_featured_readmore_button_background_color );
                });
            });
        });

        /* For Category Read more Button Color */
        tz_customize( 'tz_category_readmore_button_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_category_readmore_button_color = to;
                $( '.category .blog-meta a.btn' ).css( 'color', to );
                if( !$tz_default_category_readmore_hover_color ){
                    tz_customize( 'tz_category_readmore_button_hover_color', function( value ) { 
                        $( '.category .blog-meta a.btn' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_category_readmore_button_color );
                        });
                    });
                }
            });
        });

        /* For Category Read more Button hover Color */
        tz_customize( 'tz_category_readmore_button_hover_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_category_readmore_hover_color = to;          
                $( '.category .blog-meta a.btn' ).hover(function(){
                     $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_category_readmore_button_color );
                });
            });
        });

        /* For Category Read more Button Border Color  */
        tz_customize( 'tz_category_readmore_button_border_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_category_readmore_button_border_color = to;
                $( '.category .blog-meta a.btn' ).css( 'border-color', to );
                if( !$tz_default_category_readmore_button_border_hover_color ){
                    tz_customize( 'tz_category_readmore_button_border_hover_color', function( value ) { 
                        $( '.category .blog-meta a.btn' ).hover(function(){
                            $(this).css( 'border-color', '' );
                        }, function(){
                             $(this).css( 'border-color', $tz_default_category_readmore_button_border_color );
                        });
                    });
                }
            });
        });

        /* For Category Read more Button Border hover Color */
        tz_customize( 'tz_category_readmore_button_border_hover_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_category_readmore_button_border_hover_color = to;          
                $( '.category .blog-meta a.btn' ).hover(function(){
                     $(this).css( 'border-color', to );
                }, function(){
                     $(this).css( 'border-color', $tz_default_category_readmore_button_border_color );
                });
            });
        });

        /* For Category Read more Button Background Color */
        tz_customize( 'tz_category_readmore_button_background_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_category_readmore_button_background_color = to;
                $( '.category .blog-meta a.btn' ).css( 'background-color', to );
                if( !$tz_default_category_readmore_button_hover_background_color ){
                    tz_customize( 'tz_category_readmore_button_hover_background_color', function( value ) { 
                        $( '.category .blog-meta a.btn' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $tz_default_category_readmore_button_background_color );
                        });
                    });
                }
            });
        });

        /* For Category Read more Button Background Hover Color */
        tz_customize( 'tz_category_readmore_button_hover_background_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_category_readmore_button_hover_background_color = to;          
                $( '.category .blog-meta a.btn' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                     $(this).css( 'background-color', $tz_default_category_readmore_button_background_color );
                });
            });
        });

        /* For Archive Read more Button Color */
        tz_customize( 'tz_archive_readmore_button_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_archive_readmore_button_color = to;
                $( '.blog-meta a.archive-button' ).css( 'color', to );
                if( !$tz_default_archive_readmore_hover_color ){
                    tz_customize( 'tz_archive_readmore_button_hover_color', function( value ) { 
                        $( '.blog-meta a.archive-button' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $tz_default_archive_readmore_button_color );
                        });
                    });
                }
            });
        });

        /* For Archive Read more Button hover Color */
        tz_customize( 'tz_archive_readmore_button_hover_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_archive_readmore_hover_color = to;          
                $( '.blog-meta a.archive-button' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $tz_default_archive_readmore_button_color );
                });
            });
        });

        /* For Archive Read more Button Border Color  */
        tz_customize( 'tz_archive_readmore_button_border_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_archive_readmore_button_border_color = to;
                $( '.blog-meta a.archive-button' ).css( 'border-color', to );
                if( !$tz_default_archive_readmore_button_border_hover_color ){
                    tz_customize( 'tz_archive_readmore_button_border_hover_color', function( value ) { 
                        $( '.blog-meta a.archive-button' ).hover(function(){
                            $(this).css( 'border-color', '' );
                        }, function(){
                            $(this).css( 'border-color', $tz_default_archive_readmore_button_border_color );
                        });
                    });
                }
            });
        });

        /* For Archive Read more Button Border hover Color */
        tz_customize( 'tz_archive_readmore_button_border_hover_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_archive_readmore_button_border_hover_color = to;          
                $( '.blog-meta a.archive-button' ).hover(function(){
                    $(this).css( 'border-color', to );
                }, function(){
                     $(this).css( 'border-color', $tz_default_archive_readmore_button_border_color );
                });
            });
        });

        /* For Archive Read more Button Background Color */
        tz_customize( 'tz_archive_readmore_button_background_color', function( value ) { 
            value.bind( function( to ) {
                $tz_default_archive_readmore_button_background_color = to;
                $( '.blog-meta a.archive-button' ).css( 'background-color', to );
                if( !$tz_default_archive_readmore_button_hover_background_color ){
                    tz_customize( 'tz_archive_readmore_button_hover_background_color', function( value ) { 
                        $( '.blog-meta a.archive-button' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $tz_default_archive_readmore_button_background_color );
                        });
                    });
                }
            });
        });

        /* For Archive Read more Button Background Hover Color */
        tz_customize( 'tz_archive_readmore_button_hover_background_color', function( value ) { 
            value.bind( function( to ) {      
                $tz_default_archive_readmore_button_hover_background_color = to;          
                $( '.blog-meta a.archive-button' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $tz_default_archive_readmore_button_background_color );
                });
            });
        });


    });

}(window.jQuery);