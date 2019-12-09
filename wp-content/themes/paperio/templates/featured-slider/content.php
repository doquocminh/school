<?php
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Get blog feature image size */
    $tz_featured_area_feature_image_size = get_theme_mod( 'tz_featured_area_feature_image_size', 'full' );
	/* Check if feature area slider on / off */
    $tz_disable_featured_area = get_theme_mod( 'tz_disable_featured_area', 0 );
    /* Get feature area slider slected style */
    $tz_featured_area_style = get_theme_mod( 'tz_featured_area_style', 'feature-style2' );
    /* Get feature area slider overlay background color */
    $tz_featured_area_overlay_bgcolor = get_theme_mod( 'tz_featured_area_overlay_bgcolor', '' );
    /* Get feature area slider overlay opacity */
    $tz_featured_area_overlay_opacity = get_theme_mod( 'tz_featured_area_overlay_opacity', '' );
    /* Get feature area slider selected category if none select it shows all post */
    $tz_select_featured_category = get_theme_mod( 'tz_select_featured_category', '' );
    /* Get feature area slider list order by */
    $tz_select_featured_category_orderby = get_theme_mod( 'tz_select_featured_category_orderby', 'date' );
    /* Get feature area slider list sort by ASC / Desc */
    $tz_select_featured_category_sortby = get_theme_mod( 'tz_select_featured_category_sortby', 'DESC' );
    /* Set feature area container style to container / container-fluid */
    $tz_container_style = get_theme_mod( 'tz_container_style', 'no' );
    /* Check if catagory hide / show */
    $tz_hide_featured_area_category = get_theme_mod( 'tz_hide_featured_area_category', 0 );
    /* Check if date hide / show */
    $tz_hide_featured_area_date = get_theme_mod( 'tz_hide_featured_area_date', 0 );
    /* Get date format for feature area slide items */
    $tz_date_format = get_theme_mod( 'tz_date_format', '' );
    /* Get read more button text */
    $tz_read_more_text = get_theme_mod( 'tz_read_more_text', 'Read More' );
    /* Get No. of items per slide – Desktop View */
    $tz_featured_desktop_view = get_theme_mod( 'tz_featured_desktop_view', '2' );
    /* Get No. of items per slide – Desktop Mini View */
    $tz_featured_desktop_mini_view = get_theme_mod( 'tz_featured_desktop_mini_view', '2' );
    /* Get No. of items per slide – iPad/Tablet View */
    $tz_featured_tablet_view = get_theme_mod( 'tz_featured_tablet_view', '2' );
    /* Get No. of items per slide – Mobile View */
    $tz_featured_mobile_view = get_theme_mod( 'tz_featured_mobile_view', '1' );
    /* Get no of maximum post in slider */
    $tz_featured_no_of_post = get_theme_mod( 'tz_featured_no_of_post', '6' );
    /* Check if pagination of slider is hide / show */
    $tz_show_pagination = get_theme_mod( 'tz_show_pagination', 'yes' );
    /* Get pagination style for feature area slider */
    $tz_pagination_style = ( get_theme_mod( 'tz_pagination_style', 'owl-square-pagination' ) ) ? ' '.get_theme_mod( 'tz_pagination_style', 'owl-square-pagination' ) : '';
    /* Get pagination style color for feature area slider */
    $tz_pagination_color = ( get_theme_mod( 'tz_pagination_color', 'pagination-light-style' ) ) ? ' '.get_theme_mod( 'tz_pagination_color', 'pagination-light-style' ) : '';
    /* Check if navigation of slider is hide / show */
    $tz_show_navigation = get_theme_mod( 'tz_show_navigation', 'yes' );
    /* Get navigation style for feature area slider */
    $tz_navigation_style = ( get_theme_mod( 'tz_navigation_style', 'owl-next-prev-arrow-style2' ) ) ? ' '.get_theme_mod( 'tz_navigation_style', 'owl-next-prev-arrow-style2' ) : '';
    /* Get cursor style for feature area slider */
    $tz_cursor_style = ( get_theme_mod( 'tz_cursor_style', 'owl-cursor-default' ) ) ? ' '.get_theme_mod( 'tz_cursor_style', 'owl-cursor-default' ) : '';
    /* Check if slider show single item or not */
    $tz_display_single_item = get_theme_mod( 'tz_display_single_item', 'yes' );
    /* Get slider transition style */
    $tz_transition_style = get_theme_mod( 'tz_transition_style', '' );
    /* Get slider transition style */
    $tz_transition_animation_out = get_theme_mod( 'tz_transition_animation_out', '' );
    /* Check if slider loop is on / off */
    $tz_loop = get_theme_mod( 'tz_loop', 'no' );
    /* Check if slider autoplay is on / off */
    $tz_autoplay = get_theme_mod( 'tz_autoplay', 'no' );
    /* Check slider speed */
    $tz_autoplay_speed = get_theme_mod( 'tz_autoplay_speed', '3000' );
    /* Check slider delay */
    $tz_autoplay_delay = get_theme_mod( 'tz_autoplay_delay', '700' );
    /* Check if slider stop on hover is on / off */
    $tz_stop_on_hover = get_theme_mod( 'tz_stop_on_hover', 'no' );
    /* Check featured read more button hide / show */
    $tz_hide_read_more_button = get_theme_mod( 'tz_hide_read_more_button', 0 );
    /* Get featured button Hide Arrow */
    $tz_general_featured_button_arrow = ( get_theme_mod( 'tz_general_featured_button_arrow', 0 ) != 1 ) ? '<i class="fas fa-arrow-right"></i>' : '';
    /* Get hide arrow for style 3*/
    $tz_hide_featured_area_arrow = get_theme_mod( 'tz_hide_featured_area_arrow', 0 );

    /* Check if feature area slider show or hide */
    if( $tz_disable_featured_area != 1 ) {
    	/* Define all null variable */
    	$slider_config = $script = $slide_item_class = $tz_featured_area_categoey = $tz_extra_class_for_container = $bg_image = '';

        /* Check sticky post */
        $tz_sticky_posts = get_option( 'sticky_posts' );

    	/* Args base on config set in admin */
    	$args = array(
					'category_name' 	=> $tz_select_featured_category,
					'posts_per_page'	=> $tz_featured_no_of_post,
                    'post__not_in'      => $tz_sticky_posts,
					'orderby' 			=> $tz_select_featured_category_orderby,
					'order'   			=> $tz_select_featured_category_sortby,
                );
	    $feature_slider_query = new WP_Query( $args );

	    /* Custom Script Start*/

        if( $tz_transition_style == 'fade' ){
            $tz_transition_style = 'fadeIn';
            $tz_transition_animation_out = 'fadeOut';
        }
        if( $tz_transition_style == 'slide' ){
            $tz_transition_style = '';
            $tz_transition_animation_out = '';
        }
        if( $tz_transition_style == 'goDown' ){
            $tz_transition_style = 'slideInDown';
            $tz_transition_animation_out = 'fadeOut';
        }
        if( $tz_transition_style == 'backSlide' ){
            $tz_transition_style = 'fadeOutLeft';
            $tz_transition_animation_out = 'fadeInRight';
        }
        if( $tz_transition_style == 'fadeUp' ){
            $tz_transition_style = 'zoomIn';
            $tz_transition_animation_out = 'fadeOut';
        }
        
      	( $tz_show_navigation == 'yes' ) ? $slider_config .= 'nav: true, navText: ["<span class=\'screen-reader-text\'>'.esc_html__( 'Prevoius', 'paperio' ).'</span><i class=\'fas fa-chevron-left\'></i>", "<span class=\'screen-reader-text\'>'.esc_html__( 'Next', 'paperio' ).'</span><i class=\'fas fa-chevron-right\'></i>"],' : $slider_config .= 'nav: false,';
    	( $tz_show_pagination == 'yes' && ( get_theme_mod( 'tz_navigation_style', 'owl-next-prev-arrow-style2' ) == 'owl-next-prev-arrow-style2' || get_theme_mod( 'tz_navigation_style', 'owl-next-prev-arrow-style2' ) == 'owl-next-prev-arrow-style4' ) ) ? $slider_config .= 'dots: true,' : $slider_config .= 'dots: false,';
    	( $tz_transition_style && $tz_display_single_item == 'yes') ? $slider_config .= 'animateIn: "'.esc_attr( $tz_transition_style ).'",' : '';
        ( $tz_transition_animation_out && $tz_display_single_item == 'yes') ? $slider_config .= 'animateOut: "'.esc_attr( $tz_transition_animation_out ).'",' : '';
    	( $tz_autoplay == 'yes' ) ? $slider_config .= 'autoplay:true, autoplayTimeout: '.$tz_autoplay_speed.',autoplaySpeed: '.$tz_autoplay_delay.',' : $slider_config .= 'autoPlay: false,';
    	( $tz_stop_on_hover == 'yes' ) ? $slider_config .= 'autoplayHoverPause: true, ' : $slider_config .= 'autoplayHoverPause: false, ';
    	( $tz_display_single_item == 'yes' ) ? $slider_config .= 'items: 1,' : '';
        ( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
        ( $tz_loop == 'yes' ) ? $slider_config .= 'loop: true,' : $slider_config .= 'loop: false,';
      	if( $tz_display_single_item != 'yes' ){
            ( $tz_featured_desktop_view || $tz_featured_desktop_mini_view || $tz_featured_tablet_view || $tz_featured_mobile_view ) ? $slider_config .= "responsive:{" : '';
            ( $tz_featured_mobile_view ) ? $slider_config .= '0:{ items: '.$tz_featured_mobile_view.' },' : $slider_config .= '0:{ items: 1 },';
            ( $tz_featured_tablet_view ) ? $slider_config .= '767:{ items: '.$tz_featured_tablet_view.'},' : $slider_config .= '767:{ items: 2 },';
            ( $tz_featured_desktop_mini_view ) ? $slider_config .= '979:{ items: '.$tz_featured_desktop_mini_view.' },' : $slider_config .= '979:{ items: 2 },';
            ( $tz_featured_desktop_view ) ? $slider_config .= '1199:{ items: '.$tz_featured_desktop_view.' },' : $slider_config .= '1199:{ items: 2 },';
            ( $tz_featured_desktop_view || $tz_featured_desktop_mini_view || $tz_featured_tablet_view || $tz_featured_mobile_view ) ? $slider_config .= "}," : '';
	        $slide_item_class = ' slide-item-'.esc_attr( $tz_featured_desktop_view );

	        /* Set no of category to sow in slider base on slide item */
	      	switch( $tz_featured_desktop_view ) {
	      		case '4':
	      		case '3':
	      			$tz_featured_area_categoey = '1';
	      		break;

	      		case '2':
	      			$tz_featured_area_categoey = '2';
	      		break;
	      		
	      		default:
	      			$tz_featured_area_categoey = '3';
	      		break;
	      	}
      	} else {
      		/* If set display single item then set category */
	        $tz_featured_area_categoey = '3';
	    }

      	/* if set container add column class for alignment */
      	$tz_featured_area_content_container_fluid = '';
		if( isset( $tz_container_style ) && $tz_container_style == 'yes' ){
	        $tz_featured_area_content_container_fluid .= 'container-fluid';
	    } else {
	        $tz_featured_area_content_container_fluid .= 'container';
	        $tz_extra_class_for_container .= ' col-md-12 col-sm-12 col-xs-12';
	    }

      	ob_start();?>
<script type="text/javascript">jQuery(document).ready(function () { jQuery(".paperio-<?php echo esc_attr( $tz_featured_area_style ); ?>").owlCarousel({ <?php echo paperio_sanitize_textarea( $slider_config, '' );?> }); });</script>
      	<?php 
      	$script = ob_get_contents();
      	ob_end_clean();
      	/* End Custom Script Start*/
        do_action( 'paperio_define_featured_global_hook' );
	    switch( $tz_featured_area_style ){
	    	case 'feature-style1':
			    if ( $feature_slider_query->have_posts() ) {
                    echo '<section class="main-slider margin-two-bottom xs-margin-ten-bottom">';
                        echo '<div class="'.esc_attr( $tz_featured_area_content_container_fluid ).'">';
                            echo '<div class="row">';
                                echo '<div class="owl-slider'.esc_attr( $tz_extra_class_for_container ).'">';
                                    echo '<div id="paperio-'.esc_attr( $tz_featured_area_style ).'" class="owl-slider-style1 owl-carousel paperio-'.esc_attr( $tz_featured_area_style ).esc_attr( $tz_pagination_style ).esc_attr( $tz_pagination_color ).esc_attr( $tz_navigation_style ).esc_attr( $tz_cursor_style ).esc_attr( $slide_item_class ).'">';
                                        while ( $feature_slider_query->have_posts() ) {
                                        $feature_slider_query->the_post();
                                            /* Exclude posts from blog */
                                            do_action( 'paperio_exclude_post_hook', get_the_ID() );
                                            /* Set post featured image as a background image */
                                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $tz_featured_area_feature_image_size );
                                            $bg_image = '';
                                            if( $thumb[0] ){
                                                $bg_image = ' style="background: url('.esc_url( $thumb[0] ).');"';
                                            }
                                            $srcset = $srcset_data = '';
                                            $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id( get_the_ID() ), $tz_featured_area_feature_image_size );
                                            if( $srcset ){
                                                $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                                            }

                                            echo '<div class="item cover-background position-reletive bg-image-srcset"'.$bg_image.$srcset_data.'>';
                                                echo '<div class="opacity-medium-light bg-dark-gray overlay-layer"></div>';
                                                echo '<div class="outer">';
                                                    echo '<div class="middle">';
                                                        echo '<div class="inner">';
                                                            echo '<div class="banner-content-one">';
                                                                if( $tz_hide_featured_area_category != 1 ) {
                                                                    echo '<p class="banner-date no-background margin-two-bottom">';
                                                                        echo '<span class="text-extra-small text-uppercase letter-spacing-2 text-white featured-style-meta">';
                                                                            echo paperio_post_category( get_the_ID(), 'text-link-white featured-style-meta-link', $tz_featured_area_categoey );
                                                                        echo '</span>';
                                                                    echo '</p>';
                                                                }
                                                                echo '<p class="title-extra-large text-uppercase font-weight-600 margin-four-bottom xs-margin-seven-bottom alt-font featured-style-title">';
                                                                    echo '<a href="'.get_permalink().'" class="text-link-white featured-style-title-link">'.get_the_title().'</a>';
                                                                echo '</p>';
                                                                if( $tz_read_more_text && $tz_hide_read_more_button != 1 ) {
                                                                    echo '<a href="'.get_permalink().'" class="btn btn-small btn-white text-uppercase alt-font">'.esc_attr( $tz_read_more_text ).''.$tz_general_featured_button_arrow.'</a>';
                                                                }
                                                            echo '</div>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                                echo paperio_sanitize_textarea( $script, '' );
                            echo '</div>';
                        echo '</div>';
                    echo '</section>';
                }
			break;

			case 'feature-style2':
			    if ( $feature_slider_query->have_posts() ) {
			        echo '<section class="margin-two-bottom sm-margin-six-bottom xs-margin-twelve-bottom">';
			            echo '<div class="'.esc_attr( $tz_featured_area_content_container_fluid ).'">';
			                echo '<div class="row">';
			                    echo '<div class="owl-slider'.esc_attr( $tz_extra_class_for_container ).'">';
			                        echo '<div id="owl-slider-style-2" class="owl-slider-style-2 owl-carousel overflow-hidden paperio-'.esc_attr( $tz_featured_area_style ).esc_attr( $tz_pagination_style ).esc_attr( $tz_pagination_color ).esc_attr( $tz_navigation_style ).esc_attr( $tz_cursor_style ).esc_attr( $slide_item_class ).'">';
			                        	while ( $feature_slider_query->have_posts() ) {
			                        	$feature_slider_query->the_post();
                                            /* Exclude posts from blog */
                                            do_action( 'paperio_exclude_post_hook', get_the_ID() );
			                        		/* Set post featured image as a background image */
				                          	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $tz_featured_area_feature_image_size );
                                            $bg_image = '';
		                          			if( $thumb[0] ){
		                          				$bg_image = ' style="background: url('.esc_url( $thumb[0] ).');"';
		                          			}
		                          			$srcset = $srcset_data = '';
		                          			$srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id( get_the_ID() ), $tz_featured_area_feature_image_size );
		                          			if( $srcset ){
		                          				$srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
		                          			}
                        					echo '<div class="item text-center cover-background bg-image-srcset"'.$bg_image.$srcset_data.'>';
                            					echo '<div class="opacity-light bg-black overlay-layer"></div>';
                        						echo '<div class="outer">';
                            						echo '<div class="middle">';
                                						echo '<div class="inner">';
                                    						echo '<div class="banner-content-two banner-background">';
                                    							if( $tz_hide_featured_area_category != 1 ) {
	                                        						echo '<p class="banner-date2 banner-date2-line margin-five-bottom xs-margin-two-bottom letter-spacing-3 text-extra-small text-uppercase featured-style-meta">';
	                                        							echo '<span>';
	                                        								echo paperio_post_category( get_the_ID(), 'text-link-light-gray featured-style-meta-link', $tz_featured_area_categoey );
	                                        							echo '</span>';
	                                        						echo '</p>';
	                                        					}
                                        						echo '<p class="title-medium font-weight-600 text-mid-gray alt-font margin-eight-bottom xs-margin-three-bottom featured-style-title">';
                                        							echo '<a href="'.get_permalink().'" class="featured-style-title-link">'.get_the_title().'</a>';
                                        						echo '</p>';
                                        						if( $tz_read_more_text && $tz_hide_read_more_button != 1 ) {
                                        							echo '<a href="'.get_permalink().'" class="btn btn-color btn-small text-uppercase alt-font">'.esc_attr( $tz_read_more_text ).''.$tz_general_featured_button_arrow.'</a>';
                                                                }
                                    						echo '</div>';
                                						echo '</div>';
                            						echo '</div>';
                        						echo '</div>';
                        					echo '</div>';
										}
			    					echo '</div>';
			                    echo '</div>';
			                    echo paperio_sanitize_textarea( $script, '' );
			                echo '</div>';
			            echo '</div>';
			        echo '</section>';
			    }
			break;

			case 'feature-style3':
			    if ( $feature_slider_query->have_posts() ) {
			    	/* Get header style */
					$tz_header_type = get_theme_mod( 'tz_header_type', 'header-style1' );
					$tz_navigation_position_header = get_theme_mod( 'tz_navigation_position_header', 'below-logo' );
					/* To add top space for header type 2 and feature slider style 3 */
					$tz_slider_special_class = ( $tz_header_type == 'header-style2' && $tz_navigation_position_header == 'below-logo' ) ? ' special-slider-style' : '';

			        echo '<section class="margin-two-bottom xs-margin-ten-bottom main-slider'.esc_attr( $tz_slider_special_class ).'">';
			            echo '<div class="'.esc_attr( $tz_featured_area_content_container_fluid ).'">';
			                echo '<div class="row">';
			                    echo '<div class="owl-slider'.esc_attr( $tz_extra_class_for_container ).'">';
			                        echo '<div id="owl-slider-style-4" class="owl-slider-style-4 owl-carousel paperio-'.esc_attr( $tz_featured_area_style ).esc_attr( $tz_pagination_style ).esc_attr( $tz_pagination_color ).esc_attr( $tz_navigation_style ).esc_attr( $tz_cursor_style ).esc_attr( $slide_item_class ).'">';
			                        	while ( $feature_slider_query->have_posts() ) {
			                        	$feature_slider_query->the_post();
                                            /* Exclude posts from blog */
                                            do_action( 'paperio_exclude_post_hook', get_the_ID() );
			                        		/* Set post featured image as a background image */
				                          	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $tz_featured_area_feature_image_size );
                                            $bg_image = '';
		                          			if( $thumb[0] ){
		                          				$bg_image = ' style="background: url('.esc_url( $thumb[0] ).');"';
		                          			}
		                          			$srcset = $srcset_data = '';
		                          			$srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id( get_the_ID() ), $tz_featured_area_feature_image_size );
		                          			if( $srcset ){
		                          				$srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
		                          			}
			                        		echo '<div class="item banner-content-one cover-background bg-image-srcset"'.$bg_image.$srcset_data.'>';
                            					echo '<div class="opacity-light bg-dark-gray overlay-layer"></div>';
                        						echo '<div class="banner-content padding-eight-bottom">';
                            						echo '<p class="title-extra-small text-uppercase font-weight-600 fl-left margin-bottom-5 text-left alt-font featured-style-title">';
                            							echo '<a href="'.get_permalink().'" class="text-link-white featured-style-title-link">'.get_the_title().'</a>';
                            						echo '</p>';
                            						if( $tz_hide_featured_area_category != 1 || $tz_hide_featured_area_date != 1 ) {
	                            						echo '<div class="text-white fl-left clear-both font-weight-600 text-uppercase letter-spacing-2 text-extra-small text-left featured-style-meta">';
		                            						echo '<ul class="post-meta-box">';
		                            							if( $tz_hide_featured_area_category != 1 ) {
		                            								echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-white featured-style-meta-link', $tz_featured_area_categoey ).'</li>';
                                                                }
		                            							if( $tz_hide_featured_area_date != 1 ) {
		                            								echo '<li>'.get_the_date( $tz_date_format ).'</li>';
                                                                }
		                            						echo '</ul>';
	                            						echo '</div>';
	                            					}
                            						if( $tz_hide_featured_area_arrow != 1 ) {
                                                        echo '<a href="'.get_permalink().'" class="btn-more text-uppercase fl-right"><i class="fas fa-arrow-right"></i></a>';
                                                    }
                        						echo '</div>';
                        					echo '</div>';
				    					}
				    				echo '</div>';
			                    echo '</div>';
			                    echo paperio_sanitize_textarea( $script, '' );
			                echo '</div>';
			            echo '</div>';
			        echo '</section>';
			    }
			break;

			case 'feature-style4':
                if ( $feature_slider_query->have_posts() ) {
                    echo '<section class="main-slider padding-bottom-8">';
                        echo '<div class="'.esc_attr( $tz_featured_area_content_container_fluid ).'">';
                            echo '<div class="row">';
                                echo '<div class="owl-slider'.esc_attr( $tz_extra_class_for_container ).'">';
                                    echo '<div id="owl-slider-style-5" class="owl-slider-style-5 owl-carousel xs-owl-pagination paperio-'.esc_attr( $tz_featured_area_style ).esc_attr( $tz_pagination_style ).esc_attr( $tz_pagination_color ).esc_attr( $tz_navigation_style ).esc_attr( $tz_cursor_style ).esc_attr( $slide_item_class ).'">';
                                        while ( $feature_slider_query->have_posts() ) {
                                        $feature_slider_query->the_post();
                                            /* Exclude posts from blog */
                                            do_action( 'paperio_exclude_post_hook', get_the_ID() );
                                            /* Set post featured image as a background image */
                                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $tz_featured_area_feature_image_size );
                                            $bg_image = '';
                                            if( $thumb[0] ){
                                                $bg_image = ' style="background: url('.esc_url( $thumb[0] ).');"';
                                            }
                                            $srcset = $srcset_data = '';
                                            $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id( get_the_ID() ), $tz_featured_area_feature_image_size );
                                            if( $srcset ){
                                                $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                                            }
                                            echo '<div class="item banner-content-one bg-image-srcset"'.$bg_image.$srcset_data.'>';
                                                echo '<div class="opacity-medium-light bg-dark-gray overlay-layer"></div>';
                                                echo '<div class="outer">';
                                                    echo '<div class="middle">';
                                                        echo '<div class="inner">';
                                                            echo '<div class="banner-content">';
                                                                if( $tz_hide_featured_area_category != 1 ) {
                                                                    echo '<p class="banner-date no-background margin-one-bottom">';
                                                                        echo '<span class="letter-spacing-1 text-white text-uppercase featured-style-meta">';
                                                                            echo paperio_post_category( get_the_ID(), 'text-link-white featured-style-meta-link', $tz_featured_area_categoey );
                                                                        echo '</span>';
                                                                    echo '</p>';
                                                                }
                                                                echo '<p class="title-extra-large alt-font text-uppercase font-weight-600 margin-two-bottom sm-margin-three-bottom featured-style-title">';
                                                                    echo '<a href="'.get_permalink().'" class="text-link-white featured-style-title-link">'.get_the_title().'</a>';
                                                                echo '</p>';
                                                                if( $tz_read_more_text && $tz_hide_read_more_button != 1 ) {
                                                                    echo '<a href="'.get_permalink().'" class="btn btn-small btn-white text-uppercase alt-font">'.esc_attr( $tz_read_more_text ).''.$tz_general_featured_button_arrow.'</a>';
                                                                }
                                                            echo '</div>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                                echo paperio_sanitize_textarea( $script, '' );
                            echo '</div>';
                        echo '</div>';
                    echo '</section>';
                }
			break;

			case 'feature-style5':
			    if ( $feature_slider_query->have_posts() ) {
		            echo '<section class="margin-two-bottom xs-margin-ten-bottom sm-margin-six-bottom">';
		                echo '<div class="'.esc_attr( $tz_featured_area_content_container_fluid ).'">';
		                    echo '<div class="row">';
		                        echo '<div class="owl-slider'.esc_attr( $tz_extra_class_for_container ).'">';
		                            echo '<div id="owl-slider-style-2" class="owl-slider-style-2 owl-carousel overflow-hidden paperio-'.esc_attr( $tz_featured_area_style ).esc_attr( $tz_pagination_style ).esc_attr( $tz_pagination_color ).esc_attr( $tz_navigation_style ).esc_attr( $tz_cursor_style ).esc_attr( $slide_item_class ).'">';
		                            	while ( $feature_slider_query->have_posts() ) {
		                            	$feature_slider_query->the_post();
                                            /* Exclude posts from blog */
                                            do_action( 'paperio_exclude_post_hook', get_the_ID() );
		                            		/* Set post featured image as a background image */
				                          	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $tz_featured_area_feature_image_size );
                                            $bg_image = '';
		                          			if( $thumb[0] ){
		                          				$bg_image = ' style="background: url('.esc_url( $thumb[0] ).');"';
		                          			}
		                          			$srcset = $srcset_data = '';
		                          			$srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id( get_the_ID() ), $tz_featured_area_feature_image_size );
		                          			if( $srcset ){
		                          				$srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
		                          			}
				    						
			                                echo '<div class="item"'.$bg_image.$srcset_data.'>';
			                                    echo '<div class="opacity-light bg-dark-gray overlay-layer"></div>';
			                                    echo '<div class="outer">';
			                                        echo '<div class="middle">';
			                                            echo '<div class="inner-bottom">';
			                                                echo '<div class="banner-content-one text-left margin-eight xs-margin-fifteen xs-no-margin-lr xs-text-center">';
			                                                    echo '<div class="separator-line-large background-color margin-three-bottom xs-display-none"></div>';
			                                                    echo '<p class="title-large text-uppercase margin-two-bottom width-30 md-width-40 sm-width-50 xs-width-100 alt-font featured-style-title">';
			                                                    	echo '<a href="'.get_permalink().'" class="text-link-white featured-style-title-link">'.get_the_title().'</a>';
			                                                    echo '</p>';
			                                                    if( $tz_hide_featured_area_category != 1 || $tz_hide_featured_area_date != 1 ) {
				                                                    echo '<div class="no-margin-bottom text-uppercase text-extra-small letter-spacing-3 featured-style-meta">';
				                                                    	echo '<ul class="post-meta-box">';
					                            							if( $tz_hide_featured_area_category != 1 ) {
					                            								echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-light-gray featured-style-meta-link', $tz_featured_area_categoey ).'</li>';
                                                                            }
					                            							if( $tz_hide_featured_area_date != 1 ) {
					                            								echo '<li>'.get_the_date( $tz_date_format ).'</li>';
                                                                            }
					                            						echo '</ul>';
				                                                    echo '</div>';
				                                                }
			                                                echo '</div>';
			                                            echo '</div>';
			                                        echo '</div>';
			                                    echo '</div>';
			                                echo '</div>';
				    					}
				    				echo '</div>';
		                        echo '</div>';
		                        echo paperio_sanitize_textarea( $script, '' );
		                    echo '</div>';
		                echo '</div>';
		            echo '</section>';
			    }
			break;
		}

      	/* Restore original Post Data */
	    wp_reset_postdata();
	}