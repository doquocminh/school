<?php
/**
 * Generate css.
 *
 * @package Paperio
 */
?>
<?php

	if ( !defined( 'ABSPATH' ) ) { exit; }

    $tz_main_font   = get_theme_mod( 'tz_main_font', 'Open Sans' );
    $tz_alt_font    = get_theme_mod( 'tz_alt_font', 'Montserrat' );

	/* For header social icon font size */
	$tz_social_icon_font_size = get_theme_mod( 'tz_social_icon_font_size', '' );
    $tz_social_icon_line_height = get_theme_mod( 'tz_social_icon_line_height', '' );
    $tz_social_icon_character_spacing = get_theme_mod( 'tz_social_icon_character_spacing', '' );
	/* For header social icon color */
	$tz_social_icon_color = get_theme_mod( 'tz_social_icon_color', '' );
	/* For header search icon color */
	$tz_search_icon_color = get_theme_mod( 'tz_search_icon_color', '' );
    $tz_add_navigation_bg_color_header = get_theme_mod( 'tz_add_navigation_bg_color_header', '' );
    $tz_add_navigation_text_transform = get_theme_mod( 'tz_add_navigation_text_transform', 'uppercase' );

    $tz_navigation_font_size = get_theme_mod( 'tz_navigation_font_size', '' );
    $tz_navigation_line_height = get_theme_mod ( 'tz_navigation_line_height', '' );
    $tz_navigation_character_spacing = get_theme_mod( 'tz_navigation_character_spacing', '' );
    $tz_navigation_text_color = get_theme_mod( 'tz_navigation_text_color', '' );
    $tz_navigation_text_hover_color = get_theme_mod( 'tz_navigation_text_hover_color', '' );

    $tz_navigation_submenu_background_color = get_theme_mod( 'tz_navigation_submenu_background_color', '' );
    $tz_navigation_submenu_background_color_opacity = get_theme_mod( 'tz_navigation_submenu_background_color_opacity', '' );
    $tz_navigation_submenu_font_size = get_theme_mod( 'tz_navigation_submenu_font_size', '' );
    $tz_navigation_submenu_line_height = get_theme_mod( 'tz_navigation_submenu_line_height', '' );
    $tz_navigation_submenu_character_spacing = get_theme_mod( 'tz_navigation_submenu_character_spacing', '' );
    $tz_navigation_megamenu_title_font_size = get_theme_mod( 'tz_navigation_megamenu_title_font_size', '' );
    $tz_navigation_megamenu_title_line_height = get_theme_mod( 'tz_navigation_megamenu_title_line_height', '' );
    $tz_navigation_megamenu_title_character_spacing = get_theme_mod( 'tz_navigation_megamenu_title_character_spacing', '' );
    $tz_navigation_megamenu_title_border_color = get_theme_mod( 'tz_navigation_megamenu_title_border_color', '' );
    $tz_navigation_submenu_text_color = get_theme_mod( 'tz_navigation_submenu_text_color', '' );
    $tz_navigation_submenu_text_hover_color = get_theme_mod( 'tz_navigation_submenu_text_hover_color', '' );
    $tz_header_back_color = get_theme_mod( 'tz_header_back_color', '' );
    $tz_header_border_color = get_theme_mod( 'tz_header_border_color', '' );

    /* Mobile menu toggle*/
    $tz_header_mobile_submenu_background_color = get_theme_mod( 'tz_header_mobile_submenu_background_color', '' );
    $tz_header_toggle_color = get_theme_mod( 'tz_header_toggle_color', '' );
    $tz_header_toggle_background_color = get_theme_mod( 'tz_header_toggle_background_color', '' );

    /* Feature area section */
    $tz_featured_area_box_bgcolor = get_theme_mod( 'tz_featured_area_box_bgcolor', '' );
    $tz_featured_area_overlay_bgcolor = get_theme_mod( 'tz_featured_area_overlay_bgcolor', '' );
    $tz_featured_area_overlay_opacity = get_theme_mod( 'tz_featured_area_overlay_opacity', '' );
    $tz_featured_area_title_font_size = get_theme_mod( 'tz_featured_area_title_font_size', '' );
    $tz_featured_area_title_line_height = get_theme_mod( 'tz_featured_area_title_line_height', '' );
    $tz_featured_area_title_character_spacing = get_theme_mod( 'tz_featured_area_title_character_spacing', '' );
    $tz_featured_area_title_text_color = get_theme_mod( 'tz_featured_area_title_text_color', '' );
    $tz_featured_area_title_text_hover_color = get_theme_mod( 'tz_featured_area_title_text_hover_color', '' );
    $tz_featured_area_meta_font_size = get_theme_mod( 'tz_featured_area_meta_font_size', '' );
    $tz_featured_area_meta_line_height = get_theme_mod( 'tz_featured_area_meta_line_height', '' );
    $tz_featured_area_meta_character_spacing = get_theme_mod( 'tz_featured_area_meta_character_spacing', '' );
    $tz_featured_area_meta_text_color = get_theme_mod( 'tz_featured_area_meta_text_color', '' );
    $tz_featured_area_meta_text_hover_color = get_theme_mod( 'tz_featured_area_meta_text_hover_color', '' );

    /* Latest / Popular Block Title Settings */
    $tz_latest_popular_title_font_size = get_theme_mod( 'tz_latest_popular_title_font_size', '' );
    $tz_latest_popular_title_line_height = get_theme_mod( 'tz_latest_popular_title_line_height', '' );
    $tz_latest_popular_title_character_spacing = get_theme_mod( 'tz_latest_popular_title_character_spacing', '' );
    $tz_latest_popular_title_color = get_theme_mod( 'tz_latest_popular_title_color', '' );
    $tz_latest_popular_title_hover_color = get_theme_mod( 'tz_latest_popular_title_hover_color', '' );
    $tz_latest_popular_date_font_size = get_theme_mod( 'tz_latest_popular_date_font_size', '' );
    $tz_latest_popular_date_line_height = get_theme_mod( 'tz_latest_popular_date_line_height', '' );
    $tz_latest_popular_date_character_spacing = get_theme_mod( 'tz_latest_popular_date_character_spacing', '' );
    $tz_latest_popular_date_color = get_theme_mod( 'tz_latest_popular_date_color', '' );
    $tz_latest_popular_date_hover_color = get_theme_mod( 'tz_latest_popular_date_hover_color', '' );

    /* Promotional Block Settings */
    $tz_promotional_block_border_color = get_theme_mod( 'tz_promotional_block_border_color', '' );
    $tz_promotional_block_hover_color = get_theme_mod( 'tz_promotional_block_hover_color', '' );
    $tz_promotional_block_hover_color_opacity = get_theme_mod( 'tz_promotional_block_hover_color_opacity', '' );
    $tz_promotional_block_title_font_size = get_theme_mod( 'tz_promotional_block_title_font_size', '' );
    $tz_promotional_block_title_line_height = get_theme_mod( 'tz_promotional_block_title_line_height', '' );
    $tz_promotional_block_title_character_spacing = get_theme_mod( 'tz_promotional_block_title_character_spacing', '' );
    $tz_promotional_block_title_color = get_theme_mod( 'tz_promotional_block_title_color', '' );
    $tz_promotional_block_title_hover_color = get_theme_mod( 'tz_promotional_block_title_hover_color', '' );

    /* Blog Layout Settings */
    $tz_general_blog_box_color = get_theme_mod( 'tz_general_blog_box_color', '' );
    $tz_general_blog_box_border_color = get_theme_mod( 'tz_general_blog_box_border_color', '' );
    $tz_general_blog_content_color = get_theme_mod( 'tz_general_blog_content_color', '' );
    $tz_general_blog_title_font_size = get_theme_mod( 'tz_general_blog_title_font_size', '' );
    $tz_general_blog_title_line_height = get_theme_mod( 'tz_general_blog_title_line_height', '' );
    $tz_general_blog_title_character_spacing = get_theme_mod( 'tz_general_blog_title_character_spacing', '' );
    $tz_general_blog_title_color = get_theme_mod( 'tz_general_blog_title_color', '' );
    $tz_general_blog_title_hover_color = get_theme_mod( 'tz_general_blog_title_hover_color', '' );
    $tz_general_blog_meta_font_size = get_theme_mod( 'tz_general_blog_meta_font_size', '' );
    $tz_general_blog_meta_line_height = get_theme_mod( 'tz_general_blog_meta_line_height', '' );
    $tz_general_blog_meta_character_spacing = get_theme_mod( 'tz_general_blog_meta_character_spacing', '' );
    $tz_general_blog_meta_color = get_theme_mod( 'tz_general_blog_meta_color', '' );
    $tz_general_blog_meta_hover_color = get_theme_mod( 'tz_general_blog_meta_hover_color', '' );
    $tz_general_blog_comment_and_like_font_size = get_theme_mod( 'tz_general_blog_comment_and_like_font_size', '' );
    $tz_general_blog_comment_and_like_line_height = get_theme_mod( 'tz_general_blog_comment_and_like_line_height', '' );
    $tz_general_blog_comment_and_like_character_spacing = get_theme_mod( 'tz_general_blog_comment_and_like_character_spacing', '' );
    $tz_general_blog_comment_and_like_color = get_theme_mod( 'tz_general_blog_comment_and_like_color', '' );
    $tz_general_blog_comment_and_like_hover_color = get_theme_mod( 'tz_general_blog_comment_and_like_hover_color', '' );
    $tz_general_blog_border_color = get_theme_mod( 'tz_general_blog_border_color', '' );
    $tz_general_blog_border_hover_color = get_theme_mod( 'tz_general_blog_border_hover_color', '' );
    $tz_general_blog_separator_color = get_theme_mod( 'tz_general_blog_separator_color', '' );

    /* Sticky Post Settings */
    $tz_general_sticky_posts_box_color = get_theme_mod( 'tz_general_sticky_posts_box_color', '' );
    $tz_general_sticky_posts_box_border_color = get_theme_mod( 'tz_general_sticky_posts_box_border_color', '' );
    $tz_general_sticky_posts_title_font_size = get_theme_mod( 'tz_general_sticky_posts_title_font_size', '' );
    $tz_general_sticky_posts_title_line_height = get_theme_mod( 'tz_general_sticky_posts_title_line_height', '' );
    $tz_general_sticky_posts_title_character_spacing = get_theme_mod( 'tz_general_sticky_posts_title_character_spacing', '' );
    $tz_general_sticky_posts_title_color = get_theme_mod( 'tz_general_sticky_posts_title_color', '' );
    $tz_general_sticky_posts_title_hover_color = get_theme_mod( 'tz_general_sticky_posts_title_hover_color', '' );
    $tz_general_sticky_posts_meta_font_size = get_theme_mod( 'tz_general_sticky_posts_meta_font_size', '' );
    $tz_general_sticky_posts_meta_line_height = get_theme_mod( 'tz_general_sticky_posts_meta_line_height', '' );
    $tz_general_sticky_posts_meta_character_spacing = get_theme_mod( 'tz_general_sticky_posts_meta_character_spacing', '' );
    $tz_general_sticky_posts_meta_color = get_theme_mod( 'tz_general_sticky_posts_meta_color', '' );
    $tz_general_sticky_posts_meta_hover_color = get_theme_mod( 'tz_general_sticky_posts_meta_hover_color', '' );
    $tz_general_sticky_posts_comment_and_like_font_size = get_theme_mod( 'tz_general_sticky_posts_comment_and_like_font_size', '' );
    $tz_general_sticky_posts_comment_and_like_line_height = get_theme_mod( 'tz_general_sticky_posts_comment_and_like_line_height', '' );
    $tz_general_sticky_posts_comment_and_like_character_spacing = get_theme_mod( 'tz_general_sticky_posts_comment_and_like_character_spacing', '' );
    $tz_general_sticky_posts_comment_and_like_color = get_theme_mod( 'tz_general_sticky_posts_comment_and_like_color', '' );
    $tz_general_sticky_posts_comment_and_like_hover_color = get_theme_mod( 'tz_general_sticky_posts_comment_and_like_hover_color', '' );

    /* Sidebar Settings */
    $tz_sidebar_style = get_theme_mod( 'tz_sidebar_style', '' );
    $tz_sidebar_title_font_size = get_theme_mod( 'tz_sidebar_title_font_size', '' );
    $tz_sidebar_title_line_height = get_theme_mod( 'tz_sidebar_title_line_height', '' );
    $tz_sidebar_title_character_spacing = get_theme_mod( 'tz_sidebar_title_character_spacing', '' );
    $tz_sidebar_title_color = get_theme_mod( 'tz_sidebar_title_color', '' );
    $tz_sidebar_link_font_size = get_theme_mod( 'tz_sidebar_link_font_size', '' );
    $tz_sidebar_link_line_height = get_theme_mod( 'tz_sidebar_link_line_height', '' );
    $tz_sidebar_link_character_spacing = get_theme_mod( 'tz_sidebar_link_character_spacing', '' );
    $tz_sidebar_link_color = get_theme_mod( 'tz_sidebar_link_color', '' );
    $tz_sidebar_link_hover_color = get_theme_mod( 'tz_sidebar_link_hover_color', '' );
    $tz_sidebar_border_color = get_theme_mod( 'tz_sidebar_border_color', '' );
    $tz_sidebar_background_color = get_theme_mod( 'tz_sidebar_background_color', '' );

    /* Page Title Wrapper Settings */
    $tz_title_text_transform = get_theme_mod( 'tz_title_text_transform', '' );
    $tz_title_font_size = get_theme_mod( 'tz_title_font_size', '' );
    $tz_title_line_height = get_theme_mod( 'tz_title_line_height', '' );
    $tz_title_character_spacing = get_theme_mod( 'tz_title_character_spacing', '' );
    $tz_title_text_color = get_theme_mod( 'tz_title_text_color', '' );
    $tz_meta_font_size = get_theme_mod( 'tz_meta_font_size', '' );
    $tz_meta_line_height = get_theme_mod( 'tz_meta_line_height', '' );
    $tz_meta_character_spacing = get_theme_mod( 'tz_meta_character_spacing', '' );
    $tz_meta_text_color = get_theme_mod( 'tz_meta_text_color', '' );
    $tz_meta_text_hover_color = get_theme_mod( 'tz_meta_text_hover_color', '' );
    $tz_title_background_color = get_theme_mod( 'tz_title_background_color', '' );
    $tz_title_border_color = get_theme_mod( 'tz_title_border_color', '' );

    /* Breadcrumb Setting */
    $tz_breadcrumb_font_size = get_theme_mod( 'tz_breadcrumb_font_size', '' );
    $tz_breadcrumb_line_height = get_theme_mod( 'tz_breadcrumb_line_height', '' );
    $tz_breadcrumb_character_spacing = get_theme_mod( 'tz_breadcrumb_character_spacing', '' );
    $tz_breadcrumb_text_color = get_theme_mod( 'tz_breadcrumb_text_color', '' );
    $tz_breadcrumb_text_hover_color = get_theme_mod( 'tz_breadcrumb_text_hover_color', '' );
    $tz_breadcrumb_background_color = get_theme_mod( 'tz_breadcrumb_background_color', '' );
    $tz_breadcrumb_border_color = get_theme_mod( 'tz_breadcrumb_border_color', '' );

    /* Content */
    $tz_content_font_size = get_theme_mod( 'tz_content_font_size', '' );
    $tz_content_line_height = get_theme_mod( 'tz_content_line_height', '' );
    $tz_content_character_spacing = get_theme_mod( 'tz_content_character_spacing', '' );
    $tz_content_link_color = get_theme_mod( 'tz_content_link_color', '' );
    $tz_content_link_hover_color = get_theme_mod( 'tz_content_link_hover_color', '' );

    /* Post Social Share Setting */
    $tz_post_social_font_size = get_theme_mod( 'tz_post_social_font_size', '' );
    $tz_post_social_line_height = get_theme_mod( 'tz_post_social_line_height', '' );
    $tz_post_social_icon_color = get_theme_mod( 'tz_post_social_icon_color', '' );

    /* For Post Tag, Comment, Like Font Size */
    $tz_post_tag_comment_like_font_size = get_theme_mod( 'tz_post_tag_comment_like_font_size', '' );
    $tz_post_tag_comment_like_line_height = get_theme_mod( 'tz_post_tag_comment_like_line_height', '' );
    $tz_post_tag_comment_like_character_spacing = get_theme_mod( 'tz_post_tag_comment_like_character_spacing', '' );
    $tz_post_tag_comment_like_color = get_theme_mod( 'tz_post_tag_comment_like_color', '' );
    $tz_post_tag_comment_like_hover_color = get_theme_mod( 'tz_post_tag_comment_like_hover_color', '' );
    $tz_post_tag_comment_like_border_color = get_theme_mod( 'tz_post_tag_comment_like_border_color', '' );

    /* For Post Author Box */
    $tz_post_author_box_bg_color = get_theme_mod( 'tz_post_author_box_bg_color', '' );
    $tz_post_author_title_font_size = get_theme_mod( 'tz_post_author_title_font_size', '' );
    $tz_post_author_title_line_height = get_theme_mod( 'tz_post_author_title_line_height', '' );
    $tz_post_author_title_character_spacing = get_theme_mod( 'tz_post_author_title_character_spacing', '' );
    $tz_post_author_title_text_color = get_theme_mod( 'tz_post_author_title_text_color', '' );
    $tz_post_author_title_text_hover_color = get_theme_mod( 'tz_post_author_title_text_hover_color', '' );
    $tz_post_author_social_font_size = get_theme_mod( 'tz_post_author_social_font_size', '' );
    $tz_post_author_social_line_height = get_theme_mod( 'tz_post_author_social_line_height', '' );
    $tz_post_author_social_character_spacing = get_theme_mod( 'tz_post_author_social_character_spacing', '' );

    /* Category Layout Settings */
    $tz_category_layout_title_font_size = get_theme_mod( 'tz_category_layout_title_font_size', '' );
    $tz_category_layout_title_line_height = get_theme_mod( 'tz_category_layout_title_line_height', '' );
    $tz_category_layout_title_character_spacing = get_theme_mod( 'tz_category_layout_title_character_spacing', '' );
    $tz_category_layout_title_color = get_theme_mod( 'tz_category_layout_title_color', '' );
    $tz_category_layout_title_hover_color = get_theme_mod( 'tz_category_layout_title_hover_color', '' );
    $tz_category_layout_meta_font_size = get_theme_mod( 'tz_category_layout_meta_font_size', '' );
    $tz_category_layout_meta_line_height = get_theme_mod( 'tz_category_layout_meta_line_height', '' );
    $tz_category_layout_meta_character_spacing = get_theme_mod( 'tz_category_layout_meta_character_spacing', '' );
    $tz_category_layout_meta_color = get_theme_mod( 'tz_category_layout_meta_color', '' );
    $tz_category_layout_meta_hover_color = get_theme_mod( 'tz_category_layout_meta_hover_color', '' );
    $tz_category_layout_comment_and_like_font_size = get_theme_mod( 'tz_category_layout_comment_and_like_font_size', '' );
    $tz_category_layout_comment_and_like_line_height = get_theme_mod( 'tz_category_layout_comment_and_like_line_height', '' );
    $tz_category_layout_comment_and_like_character_spacing = get_theme_mod( 'tz_category_layout_comment_and_like_character_spacing', '' );
    $tz_category_layout_comment_and_like_color = get_theme_mod( 'tz_category_layout_comment_and_like_color', '' );
    $tz_category_layout_comment_and_like_hover_color = get_theme_mod( 'tz_category_layout_comment_and_like_hover_color', '' );

    /* Archive Layout Settings */
    $tz_archive_layout_title_font_size = get_theme_mod( 'tz_archive_layout_title_font_size', '' );
    $tz_archive_layout_title_line_height = get_theme_mod( 'tz_archive_layout_title_line_height', '' );
    $tz_archive_layout_title_character_spacing = get_theme_mod( 'tz_archive_layout_title_character_spacing', '' );
    $tz_archive_layout_title_color = get_theme_mod( 'tz_archive_layout_title_color', '' );
    $tz_archive_layout_title_hover_color = get_theme_mod( 'tz_archive_layout_title_hover_color', '' );
    $tz_archive_layout_meta_font_size = get_theme_mod( 'tz_archive_layout_meta_font_size', '' );
    $tz_archive_layout_meta_line_height = get_theme_mod( 'tz_archive_layout_meta_line_height', '' );
    $tz_archive_layout_meta_character_spacing = get_theme_mod( 'tz_archive_layout_meta_character_spacing', '' );
    $tz_archive_layout_meta_color = get_theme_mod( 'tz_archive_layout_meta_color', '' );
    $tz_archive_layout_meta_hover_color = get_theme_mod( 'tz_archive_layout_meta_hover_color', '' );
    $tz_archive_layout_comment_and_like_font_size = get_theme_mod( 'tz_archive_layout_comment_and_like_font_size', '' );
    $tz_archive_layout_comment_and_like_line_height = get_theme_mod( 'tz_archive_layout_comment_and_like_line_height', '' );
    $tz_archive_layout_comment_and_like_character_spacing = get_theme_mod( 'tz_archive_layout_comment_and_like_character_spacing', '' );
    $tz_archive_layout_comment_and_like_color = get_theme_mod( 'tz_archive_layout_comment_and_like_color', '' );
    $tz_archive_layout_comment_and_like_hover_color = get_theme_mod( 'tz_archive_layout_comment_and_like_hover_color', '' );

    /* Body Settings */
    $tz_body_font_size = get_theme_mod( 'tz_body_font_size', '' );
    $tz_body_line_height = get_theme_mod( 'tz_body_line_height', '' );
    $tz_body_character_spacing = get_theme_mod( 'tz_body_character_spacing', '' );
    $tz_body_background_color = get_theme_mod( 'tz_body_background_color', '' );
    $tz_body_text_color = get_theme_mod( 'tz_body_text_color', '' );

    /* Footer Settings */
    $tz_footer_bg_color = get_theme_mod( 'tz_footer_bg_color', '' );
    $tz_footer_border_color = get_theme_mod( 'tz_footer_border_color', '' );
    $tz_footer_widget_title_font_size = get_theme_mod( 'tz_footer_widget_title_font_size', '' );
    $tz_footer_widget_title_line_height = get_theme_mod( 'tz_footer_widget_title_line_height', '' );
    $tz_footer_widget_title_character_spacing = get_theme_mod( 'tz_footer_widget_title_character_spacing', '' );
    $tz_footer_widget_title_color = get_theme_mod( 'tz_footer_widget_title_color', '' );

    /* ScrollToTop settings */
    $tz_scrolltotop_arrow_color = get_theme_mod( 'tz_scrolltotop_arrow_color', '' );
    $tz_scrolltotop_arrow_hover_color = get_theme_mod( 'tz_scrolltotop_arrow_hover_color', '' );
    $tz_scrolltotop_background_color = get_theme_mod( 'tz_scrolltotop_background_color', '' );
    $tz_scrolltotop_background_hover_color = get_theme_mod( 'tz_scrolltotop_background_hover_color', '' );

    /* Blog Readmore Button Settings */
    $tz_general_blog_readmore_button_font_size = get_theme_mod( 'tz_general_blog_readmore_button_font_size', '' );
    $tz_general_blog_readmore_button_line_height = get_theme_mod( 'tz_general_blog_readmore_button_line_height', '' );
    $tz_general_blog_readmore_button_character_spacing = get_theme_mod( 'tz_general_blog_readmore_button_character_spacing', '' );
    $tz_readmore_button_color = get_theme_mod( 'tz_readmore_button_color', '' );
    $tz_readmore_button_hover_color = get_theme_mod( 'tz_readmore_button_hover_color', '' );
    $tz_readmore_button_background_color = get_theme_mod( 'tz_readmore_button_background_color', '' );
    $tz_readmore_button_hover_background_color = get_theme_mod( 'tz_readmore_button_hover_background_color', '' );
    $tz_readmore_button_border_color = get_theme_mod( 'tz_readmore_button_border_color', '' );
    $tz_readmore_button_border_hover_color = get_theme_mod( 'tz_readmore_button_border_hover_color', '' );

    /* Featured Readmore Button Settings*/
    $tz_general_featured_readmore_button_font_size = get_theme_mod( 'tz_general_featured_readmore_button_font_size', '' );
    $tz_general_featured_readmore_button_line_height = get_theme_mod( 'tz_general_featured_readmore_button_line_height', '' );
    $tz_general_featured_readmore_button_character_spacing = get_theme_mod( 'tz_general_featured_readmore_button_character_spacing', '' );
    $tz_featured_readmore_button_color = get_theme_mod( 'tz_featured_readmore_button_color', '' );
    $tz_featured_readmore_button_hover_color = get_theme_mod( 'tz_featured_readmore_button_hover_color', '' );
    $tz_featured_readmore_button_background_color = get_theme_mod( 'tz_featured_readmore_button_background_color', '' );
    $tz_featured_readmore_button_hover_background_color = get_theme_mod( 'tz_featured_readmore_button_hover_background_color', '' );
    $tz_featured_readmore_button_border_color = get_theme_mod( 'tz_featured_readmore_button_border_color', '' );
    $tz_featured_readmore_button_border_hover_color = get_theme_mod( 'tz_featured_readmore_button_border_hover_color', '' );

    /* Category Readmore Button Settings*/
    $tz_general_category_readmore_button_font_size = get_theme_mod( 'tz_general_category_readmore_button_font_size', '' );
    $tz_general_category_readmore_button_line_height = get_theme_mod( 'tz_general_category_readmore_button_line_height', '' );
    $tz_general_category_readmore_button_character_spacing = get_theme_mod( 'tz_general_category_readmore_button_character_spacing', '' );
    $tz_category_readmore_button_color = get_theme_mod( 'tz_category_readmore_button_color', '' );
    $tz_category_readmore_button_hover_color = get_theme_mod( 'tz_category_readmore_button_hover_color', '' );
    $tz_category_readmore_button_background_color = get_theme_mod( 'tz_category_readmore_button_background_color', '' );
    $tz_category_readmore_button_hover_background_color = get_theme_mod( 'tz_category_readmore_button_hover_background_color', '' );
    $tz_category_readmore_button_border_color = get_theme_mod( 'tz_category_readmore_button_border_color', '' );
    $tz_category_readmore_button_border_hover_color = get_theme_mod( 'tz_category_readmore_button_border_hover_color', '' );

    /* Archive Readmore Button Settings*/
    $tz_general_archive_readmore_button_font_size = get_theme_mod( 'tz_general_archive_readmore_button_font_size', '' );
    $tz_general_archive_readmore_button_line_height = get_theme_mod( 'tz_general_archive_readmore_button_line_height', '' );
    $tz_general_archive_readmore_button_character_spacing = get_theme_mod( 'tz_general_archive_readmore_button_character_spacing', '' );
    $tz_archive_readmore_button_color = get_theme_mod( 'tz_archive_readmore_button_color', '' );
    $tz_archive_readmore_button_hover_color = get_theme_mod( 'tz_archive_readmore_button_hover_color', '' );
    $tz_archive_readmore_button_background_color = get_theme_mod( 'tz_archive_readmore_button_background_color', '' );
    $tz_archive_readmore_button_hover_background_color = get_theme_mod( 'tz_archive_readmore_button_hover_background_color', '' );
    $tz_archive_readmore_button_border_color = get_theme_mod( 'tz_archive_readmore_button_border_color', '' );
    $tz_archive_readmore_button_border_hover_color = get_theme_mod( 'tz_archive_readmore_button_border_hover_color', '' );
    
?>

<?php if( $tz_main_font ) : ?>
/* For main font */
body { font-family: <?php echo esc_html( $tz_main_font ); ?>, sans-serif; }
<?php endif; ?>

<?php if( $tz_alt_font ) : ?>
/* For main alt font */
.alt-font, .mfp-title, h1, h2, h3, h4, h5, h6, .breadcrumb-style-1 .breadcrumb li, .site-footer .tagcloud a, #success, .paperio-default-menu li { font-family: <?php echo esc_html( $tz_alt_font ); ?>, sans-serif; }
<?php endif; ?>

<?php if( $tz_header_back_color ) : ?>
/* Header BG Color */
header.header-img { background-color: <?php echo esc_html( $tz_header_back_color ); ?>; }
<?php endif; ?>

<?php if( $tz_header_border_color ) : ?>
/* For header social icon font size */
header.header-main .header-border { border-color: <?php echo esc_html( $tz_header_border_color ); ?>; }
<?php endif; ?>


<?php if( $tz_header_mobile_submenu_background_color ) : ?>
/* Mobile Submenu Background Color*/
.navbar .mobile-tablet-submenu-bg { background-color: <?php echo esc_html( $tz_header_mobile_submenu_background_color ); ?>; }
<?php endif; ?>

<?php if( $tz_header_toggle_color ) : ?>
/* For mobile menu toggle color */
.navbar-toggle { background-color: <?php echo esc_html( $tz_header_toggle_color ); ?>; }
<?php endif; ?>

<?php if( $tz_header_toggle_background_color ) : ?>
/* For mobile menu toggle background color */
.navbar-default .navbar-toggle .icon-bar { background-color: <?php echo esc_html( $tz_header_toggle_background_color ); ?>; }
<?php endif; ?>

<?php if( $tz_social_icon_font_size ) : ?>
/* For header social icon font size */
.social-icon i { font-size: <?php echo esc_html( $tz_social_icon_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_social_icon_line_height ) : ?>
/* For header social icon line height */
.social-icon i { line-height: <?php echo esc_html( $tz_social_icon_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_social_icon_character_spacing ) : ?>
/* For header social icon character spacing */
.social-icon i { letter-spacing: <?php echo esc_html( $tz_social_icon_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_social_icon_color ) : ?>
/* For header social icon color */
.social-icon i { color: <?php echo esc_html( $tz_social_icon_color ); ?>; }
<?php endif; ?>

<?php if( $tz_search_icon_color ) : ?>
/* For header search icon color */
.input-group-btn .fa-search { color: <?php echo esc_html( $tz_search_icon_color ); ?>; }
<?php endif; ?>

<?php if( $tz_add_navigation_text_transform ) : ?>
.navbar-default .navbar-nav li a { text-transform: <?php echo esc_html( $tz_add_navigation_text_transform ); ?>; }
<?php endif; ?>

<?php if( $tz_add_navigation_bg_color_header ) : ?>
/* Navigation Color */
.paperio-theme-option nav.navbar { background-color: <?php echo esc_html( $tz_add_navigation_bg_color_header ); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_font_size ) : ?>
/* Navigation Font Size */
.navbar-default .navbar-nav > li > a { font-size: <?php echo esc_html( $tz_navigation_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_line_height ) : ?>
/* Navigation Line Height */
.paperio-theme-option .navbar-default .navbar-nav > li > a { line-height: <?php echo esc_html( $tz_navigation_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_character_spacing ) : ?>
/* Navigation Character Spacing */
.paperio-theme-option .navbar-default .navbar-nav > li > a { letter-spacing: <?php echo esc_html( $tz_navigation_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_text_color ) : ?>
/* Navigation Color */
.navbar-default .navbar-nav > li > a, .paperio-theme-option .header-main .navbar-nav li a.dropdown-toggle { color: <?php echo esc_html( $tz_navigation_text_color ); ?> !important; }
<?php endif; ?>

<?php if( $tz_navigation_text_hover_color ) : ?>
/* Navigation Color */
body header#masthead .navbar-default .navbar-nav > li:hover > a, .paperio-theme-option .nav > li > a:hover, .theme-yellow .nav > li.current_page_item > a, .paperio-theme-option .header-main .nav > li.current_page_item > a, body header#masthead .navbar-default .navbar-nav > li.current-menu-ancestor > a { color: <?php echo esc_html( $tz_navigation_text_hover_color ); ?> !important; }
<?php endif; ?>

/* Submenu settings */

<?php if( $tz_navigation_submenu_background_color ) : ?>
/* Submenu Background Color */
.paperio-theme-option .sub-menu, .paperio-theme-option .children, .paperio-theme-option .dark-header .dropdown-menu, .paperio-theme-option .dropdown-menu, .paperio-theme-option .children, .paperio-theme-option .menu-item-has-children .sub-menu { background-color: <?php echo esc_html( paperio_hex2rgb_navigation( $tz_navigation_submenu_background_color )); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_submenu_font_size ) : ?>
/* Navigation Submenu Font Size */
.dropdown-menu > li > a, .children > li a, .menu-item-has-children .sub-menu li a { font-size: <?php echo esc_html( $tz_navigation_submenu_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_submenu_line_height ) : ?>
/* Navigation Submenu Font Size */
.dropdown-menu > li > a, .children > li a, .menu-item-has-children .sub-menu li a { line-height: <?php echo esc_html( $tz_navigation_submenu_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_submenu_character_spacing ) : ?>
/* Navigation Submenu Font Size */
.dropdown-menu > li > a, .children > li a, .menu-item-has-children .sub-menu li a { letter-spacing: <?php echo esc_html( $tz_navigation_submenu_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_megamenu_title_font_size ) : ?>
/* Navigation Megamenu Title Font Size */
.dropdown .megamenu .dropdown-header { font-size: <?php echo esc_html( $tz_navigation_megamenu_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_megamenu_title_line_height ) : ?>
/* Navigation Megamenu Title Line Height */
.dropdown .megamenu .dropdown-header { line-height: <?php echo esc_html( $tz_navigation_megamenu_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_megamenu_title_character_spacing ) : ?>
/* Navigation Megamenu Title Character Spacing */
.dropdown .megamenu .dropdown-header { letter-spacing: <?php echo esc_html( $tz_navigation_megamenu_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_megamenu_title_border_color ) : ?>
/* Megamenu Title Border Color */
.dropdown .megamenu .dropdown-header { border-color: <?php echo esc_html( $tz_navigation_megamenu_title_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_navigation_submenu_text_color ) : ?>
/* Submenu Text Color */
.paperio-theme-option .sub-menu > li > a, .paperio-theme-option .dropdown .megamenu li a, .paperio-theme-option .children > li > a { color: <?php echo esc_html( $tz_navigation_submenu_text_color ); ?> !important; }
<?php endif; ?>

<?php if( $tz_navigation_submenu_text_hover_color ) : ?>
/* Submenu Text Hover Color */
.paperio-theme-option .sub-menu > li > a:hover, .paperio-theme-option .dropdown .megamenu li a:hover, .paperio-theme-option .children > li > a:hover, .dropdown-menu > li.current-menu-ancestor > a, .menu-item-has-children .sub-menu li.current-menu-ancestor > a, .menu-item-has-children .sub-menu li.current-menu-item > a { color: <?php echo esc_html( $tz_navigation_submenu_text_hover_color ); ?> !important; }
<?php endif; ?>

/* Feature Area Slider Setting */
<?php if( $tz_featured_area_box_bgcolor ) : ?>
/* Feature Area Slider Box BG Color */
.banner-background { background-color: <?php echo esc_html( $tz_featured_area_box_bgcolor ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_area_overlay_bgcolor ) : ?>
/* Feature Area Slider Overlay Color And Opacity */
.overlay-layer { background-color: <?php echo esc_html( $tz_featured_area_overlay_bgcolor ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_area_overlay_opacity ) : ?>
/* Feature Area Slider Overlay Color And Opacity */
.overlay-layer { opacity: <?php echo esc_html( $tz_featured_area_overlay_opacity ); ?>; }
<?php endif; ?>


/* Featured Style */
<?php if( $tz_featured_area_title_font_size ) : ?>
/* Title Font Size */
.featured-style-title a { font-size: <?php echo esc_html( $tz_featured_area_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_area_title_line_height ) : ?>
/* Title Line Height */
.featured-style-title a { line-height: <?php echo esc_html( $tz_featured_area_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_area_title_character_spacing ) : ?>
/* Title Character Spacing */
.featured-style-title a { letter-spacing: <?php echo esc_html( $tz_featured_area_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_area_title_text_color ) : ?>
/* Title Color */
.featured-style-title a { color: <?php echo esc_html( $tz_featured_area_title_text_color ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_area_title_text_hover_color ) : ?>
/* Title Hover Color */
.featured-style-title a.featured-style-title-link:hover { color: <?php echo esc_html( $tz_featured_area_title_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_area_meta_font_size ) : ?>
/* Meta Font Size */
.featured-style-meta { font-size: <?php echo esc_html( $tz_featured_area_meta_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_area_meta_line_height ) : ?>
/* Meta Line Height */
.featured-style-meta { line-height: <?php echo esc_html( $tz_featured_area_meta_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_area_meta_character_spacing ) : ?>
/* Meta Character Spacing */
.featured-style-meta { letter-spacing: <?php echo esc_html( $tz_featured_area_meta_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_area_meta_text_color ) : ?>
/* Meta Font Color */
.featured-style-meta a,.featured-style-meta { color: <?php echo esc_html( $tz_featured_area_meta_text_color ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_area_meta_text_hover_color ) : ?>
/* Meta Font Hover Color */
.featured-style-meta a.featured-style-meta-link:hover { color: <?php echo esc_html( $tz_featured_area_meta_text_hover_color ); ?>; }
<?php endif; ?>

 /* Featured Readmore Button Settings*/

<?php if( $tz_general_featured_readmore_button_font_size ) : ?>
/* Featured Read More Button Font Size */
.blog .owl-slider .item a.btn ,.blog .owl-slider .item a.btn i { font-size: <?php echo esc_html( $tz_general_featured_readmore_button_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_general_featured_readmore_button_line_height ) : ?>
/* Featured Read More Button Line Height */
.blog .owl-slider .item a.btn { line-height: <?php echo esc_html( $tz_general_featured_readmore_button_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_general_featured_readmore_button_character_spacing ) : ?>
/* Featured Read More Button Letter Spacing */
.blog .owl-slider .item a.btn { letter-spacing: <?php echo esc_html( $tz_general_featured_readmore_button_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_readmore_button_color ) : ?>
/* Featured Read More Button Color */
.blog .owl-slider .item a.btn { color: <?php echo esc_html( $tz_featured_readmore_button_color ); ?>!important; }
<?php endif; ?>

<?php if( $tz_featured_readmore_button_hover_color ) : ?>
/* Featured Read More Button Hover Color */
.blog .owl-slider .item a.btn:hover{ color: <?php echo esc_html( $tz_featured_readmore_button_hover_color ); ?>!important; }
<?php endif; ?>

<?php if( $tz_featured_readmore_button_background_color ) : ?>
/* Featured Read More Button Background Color */
.blog .owl-slider .item a.btn { background-color: <?php echo esc_html( $tz_featured_readmore_button_background_color ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_readmore_button_hover_background_color ) : ?>
/* Featured Read More Button Background Hover Color */
.blog .owl-slider .item a.btn:hover{ background-color: <?php echo esc_html( $tz_featured_readmore_button_hover_background_color ); ?>;}
<?php endif; ?>

<?php if( $tz_featured_readmore_button_border_color ) : ?>
/* Featured Read More Button Border Color */
.blog .owl-slider .item a.btn { border-color: <?php echo esc_html( $tz_featured_readmore_button_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_featured_readmore_button_border_hover_color ) : ?>
/* Featured Read More Button Border Hover Color */
.blog .owl-slider .item a.btn:hover{ border-color: <?php echo esc_html( $tz_featured_readmore_button_border_hover_color ); ?>;}
<?php endif; ?>

/* Latest / Popular Block Title Settings */
<?php if( $tz_latest_popular_title_font_size ) : ?>
/* Title Font Size */
.latest-post-title { font-size: <?php echo esc_html( $tz_latest_popular_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_latest_popular_title_line_height ) : ?>
/* Title Line Height */
.latest-post-title { line-height: <?php echo esc_html( $tz_latest_popular_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_latest_popular_title_character_spacing ) : ?>
/* Title Character Spacing */
.latest-post-title { letter-spacing: <?php echo esc_html( $tz_latest_popular_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_latest_popular_title_color ) : ?>
/* Title Color */
.latest-post-title span,.latest-post-title a { color: <?php echo esc_html( $tz_latest_popular_title_color ); ?>; }
<?php endif; ?>

<?php if( $tz_latest_popular_title_hover_color ) : ?>
/* Title Hover Color */
.latest-post-title a:hover { color: <?php echo esc_html( $tz_latest_popular_title_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_latest_popular_date_font_size ) : ?>
/* Date Font Size */
.paperio-theme-option .latest-post-date, .paperio-theme-option .paperio-popular-slider .latest-post-date, .paperio-theme-option .latest-post-category-link, .paperio-theme-option .paperio-popular-slider .latest-post-category-link { font-size: <?php echo esc_html( $tz_latest_popular_date_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_latest_popular_date_line_height ) : ?>
/* Date Line Height */
.paperio-theme-option .latest-post-date, .paperio-theme-option .paperio-popular-slider .latest-post-date, .paperio-theme-option .latest-post-category-link, .paperio-theme-option .paperio-popular-slider .latest-post-category-link { line-height: <?php echo esc_html( $tz_latest_popular_date_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_latest_popular_date_character_spacing ) : ?>
/* Date Character Spacing */
.paperio-theme-option .latest-post-date, .paperio-theme-option .paperio-popular-slider .latest-post-date, .paperio-theme-option  .latest-post-category-link, .paperio-theme-option .paperio-popular-slider .latest-post-category-link { letter-spacing: <?php echo esc_html( $tz_latest_popular_date_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_latest_popular_date_color ) : ?>
/* Date Color */
.paperio-theme-option .latest-post-date, .paperio-theme-option .paperio-popular-slider .latest-post-date, .paperio-theme-option  .latest-post-category-link, .paperio-theme-option .paperio-popular-slider .latest-post-category-link, .paperio-theme-option .meta-box-style2 li:before { color: <?php echo esc_html( $tz_latest_popular_date_color ); ?> !important; }
<?php endif; ?>

/* Promotional Block Settings */

<?php if( $tz_promotional_block_border_color ) : ?>
/* Boder Color */
.promo-border { border-color: <?php echo esc_html( $tz_promotional_block_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_promotional_block_hover_color ) : ?>
/* Block Hover Color */
.promo-item:hover .promo-border { background-color: <?php echo esc_html( $tz_promotional_block_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_promotional_block_hover_color_opacity ) : ?>
/* Block Hover Color Opacity */
.promo-item:hover .promo-border { opacity: <?php echo esc_html( $tz_promotional_block_hover_color_opacity ); ?>; }
<?php endif; ?>

<?php if( $tz_promotional_block_title_font_size ) : ?>
/* Title Font Size */
.promo-title { font-size: <?php echo esc_html( $tz_promotional_block_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_promotional_block_title_line_height ) : ?>
/* Title Line Height */
.promo-title { line-height: <?php echo esc_html( $tz_promotional_block_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_promotional_block_title_character_spacing ) : ?>
/* Title Character Spacing */
.promo-title { letter-spacing: <?php echo esc_html( $tz_promotional_block_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_promotional_block_title_color ) : ?>
/* Title Color */
.promo-title { color: <?php echo esc_html( $tz_promotional_block_title_color ); ?>; }
<?php endif; ?>

/* Blog Layout Settings */
<?php if( $tz_general_blog_title_font_size ) : ?>
/* Title Font Size */
.blog-layout-title { font-size: <?php echo esc_html( $tz_general_blog_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_title_line_height ) : ?>
/* Title Line Height */
.blog-layout-title { line-height: <?php echo esc_html( $tz_general_blog_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_title_character_spacing ) : ?>
/* Title Character Spacing */
.blog-layout-title { letter-spacing: <?php echo esc_html( $tz_general_blog_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_title_color ) : ?>
/* Title Color */
.blog-layout-title a { color: <?php echo esc_html( $tz_general_blog_title_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_title_hover_color ) : ?>
/* Title Hover Color */
.blog-layout-title a:hover, .blog-layout-content .blog-layout-title a:hover { color: <?php echo esc_html( $tz_general_blog_title_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_meta_font_size ) : ?>
/* Meta Font Size */
.blog-layout-meta,.blog-layout-meta a.blog-layout-meta-link { font-size: <?php echo esc_html( $tz_general_blog_meta_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_meta_line_height ) : ?>
/* Meta Line Height */
.blog-layout-meta,.blog-layout-meta a.blog-layout-meta-link { line-height: <?php echo esc_html( $tz_general_blog_meta_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_meta_character_spacing ) : ?>
/* Meta character Spacing */
.blog-layout-meta,.blog-layout-meta a.blog-layout-meta-link { letter-spacing: <?php echo esc_html( $tz_general_blog_meta_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_meta_color ) : ?>
/* Meta Color */
.blog-layout-meta, .blog-layout-meta a { color: <?php echo esc_html( $tz_general_blog_meta_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_meta_hover_color ) : ?>
/* Meta Hover Color */
.paperio-theme-option a.blog-layout-meta-link:hover { color: <?php echo esc_html( $tz_general_blog_meta_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_comment_and_like_font_size ) : ?>
/* Comment and Like Font Size */
.blog-listing-comment .blog-layout-comment-link,.blog-listing-comment a.blog-layout-comment-link i, ul.general-blog-listing-comment li:after { font-size: <?php echo esc_html( $tz_general_blog_comment_and_like_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_comment_and_like_line_height ) : ?>
/* Comment and Like Line Height */
.blog-listing-comment .blog-layout-comment-link,.blog-listing-comment a.blog-layout-comment-link i, ul.general-blog-listing-comment li:after { line-height: <?php echo esc_html( $tz_general_blog_comment_and_like_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_comment_and_like_character_spacing ) : ?>
/* Comment and Like Character Spacing */
.blog-listing-comment .blog-layout-comment-link,.blog-listing-comment a.blog-layout-comment-link i, ul.general-blog-listing-comment li:after { letter-spacing: <?php echo esc_html( $tz_general_blog_comment_and_like_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_comment_and_like_color ) : ?>
/* Comment and Like Color */
.general-blog-listing-comment .blog-layout-comment-link, .general-blog-listing-comment .blog-layout-comment-link i, ul.general-blog-listing-comment li:after { color: <?php echo esc_html( $tz_general_blog_comment_and_like_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_comment_and_like_hover_color ) : ?>
/* Comment and Like Hover Color */
.general-blog-listing-comment .blog-layout-comment-link:hover, .general-blog-listing-comment .blog-layout-comment-link:hover i { color: <?php echo esc_html( $tz_general_blog_comment_and_like_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_box_color ) : ?>
/* Box Background Color */
.blog-layout-content { background-color: <?php echo esc_html( $tz_general_blog_box_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_box_border_color ) : ?>
/* Box Border Color */
.post-content { border-color: <?php echo esc_html( $tz_general_blog_box_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_content_color ) : ?>
/* Content Color */
.post-content p { color: <?php echo esc_html( $tz_general_blog_content_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_separator_color ) : ?>
/* Box Background Color */
.blog-layout-separator, .blog-listing-image .blog-layout-separator { background-color: <?php echo esc_html( $tz_general_blog_separator_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_border_color ) : ?>
/* Blog Border Color */
.blog-listing-style7 .blog-layout-content { border-color: <?php echo esc_html( $tz_general_blog_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_border_hover_color ) : ?>
/* Blog Border Hover Color */
.paperio-theme-option .blog-listing-style7:hover .blog-layout-content { border-color: <?php echo esc_html( $tz_general_blog_border_hover_color ); ?>; }
<?php endif; ?>

/* Sticky Post Layout Settings */
<?php if( $tz_general_sticky_posts_title_font_size ) : ?>
/* Title Font Size */
.sticky-post-layout-title { font-size: <?php echo esc_html( $tz_general_sticky_posts_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_title_line_height ) : ?>
/* Title Line Height */
.sticky-post-layout-title { line-height: <?php echo esc_html( $tz_general_sticky_posts_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_title_character_spacing ) : ?>
/* Title Character Spacing */
.sticky-post-layout-title { letter-spacing: <?php echo esc_html( $tz_general_sticky_posts_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_title_color ) : ?>
/* Title Color */
.sticky-post-layout-title a { color: <?php echo esc_html( $tz_general_sticky_posts_title_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_title_hover_color ) : ?>
/* Title Hover Color */
.sticky-post-layout-title a:hover, .sticky-post-layout-content .sticky-post-layout-title a:hover { color: <?php echo esc_html( $tz_general_sticky_posts_title_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_meta_font_size ) : ?>
/* Meta Font Size */
.sticky-post-layout-meta,.sticky-post-layout-meta a.sticky-post-layout-meta-link { font-size: <?php echo esc_html( $tz_general_sticky_posts_meta_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_meta_line_height ) : ?>
/* Meta Line Height */
.sticky-post-layout-meta,.sticky-post-layout-meta a.sticky-post-layout-meta-link { line-height: <?php echo esc_html( $tz_general_sticky_posts_meta_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_meta_character_spacing ) : ?>
/* Meta Character Spacing */
.sticky-post-layout-meta,.sticky-post-layout-meta a.sticky-post-layout-meta-link { letter-spacing: <?php echo esc_html( $tz_general_sticky_posts_meta_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_meta_color ) : ?>
/* Meta Color */
.sticky-post-layout-meta, .sticky-post-layout-meta a { color: <?php echo esc_html( $tz_general_sticky_posts_meta_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_meta_hover_color ) : ?>
/* Meta Hover Color */
.paperio-theme-option a.sticky-post-layout-meta-link:hover { color: <?php echo esc_html( $tz_general_sticky_posts_meta_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_comment_and_like_font_size ) : ?>
/* Comment and Like Font Size */
.sticky-post-layout-meta-data,.sticky-post-layout-meta-data .sticky-post-layout-comment-link,.sticky-post-layout-meta-data a.sticky-post-layout-comment-link i { font-size: <?php echo esc_html( $tz_general_sticky_posts_comment_and_like_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_comment_and_like_line_height ) : ?>
/* Comment and Like Line Height */
.sticky-post-layout-meta-data,.sticky-post-layout-meta-data .sticky-post-layout-comment-link,.sticky-post-layout-meta-data a.sticky-post-layout-comment-link i { line-height: <?php echo esc_html( $tz_general_sticky_posts_comment_and_like_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_comment_and_like_character_spacing ) : ?>
/* Comment and Like Character Spacing */
.sticky-post-layout-meta-data,.sticky-post-layout-meta-data .sticky-post-layout-comment-link,.sticky-post-layout-meta-data a.sticky-post-layout-comment-link i { letter-spacing: <?php echo esc_html( $tz_general_sticky_posts_comment_and_like_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_comment_and_like_color ) : ?>
/* Comment and Like Color */
.sticky-post-layout-meta-data,.sticky-post-layout-meta-data .sticky-post-layout-comment-link { color: <?php echo esc_html( $tz_general_sticky_posts_comment_and_like_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_comment_and_like_hover_color ) : ?>
/* Comment and Like Hover Color */
.sticky-post-layout-meta-data .sticky-post-layout-comment-link:hover { color: <?php echo esc_html( $tz_general_sticky_posts_comment_and_like_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_box_color ) : ?>
/* Box Background Color */
.sticky-post-layout-content { background-color: <?php echo esc_html( $tz_general_sticky_posts_box_color ); ?>; }
<?php endif; ?>

<?php if( $tz_general_sticky_posts_box_border_color ) : ?>
/* Box Border Color */
.sticky-post-layout-content { border-color: <?php echo esc_html( $tz_general_sticky_posts_box_border_color ); ?>; }
<?php endif; ?>

/* Blog Readmore Button Settings */
<?php if( $tz_general_blog_readmore_button_font_size ) : ?>
/* Blog Read More Button Font Size */
.blog .blog-meta a.btn ,.blog .blog-meta a.btn i { font-size: <?php echo esc_html( $tz_general_blog_readmore_button_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_readmore_button_line_height ) : ?>
/* Blog Read More Button Line Height */
.blog .blog-meta a.btn { line-height: <?php echo esc_html( $tz_general_blog_readmore_button_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_general_blog_readmore_button_character_spacing ) : ?>
/* Blog Read More Button Letter Spacing */
.blog .blog-meta a.btn { letter-spacing: <?php echo esc_html( $tz_general_blog_readmore_button_character_spacing ); ?>!important; }
<?php endif; ?>

<?php if( $tz_readmore_button_color ) : ?>
/* Blog Read More Button Color */
.blog .blog-meta a.btn ,.blog .blog-meta a.btn i { color: <?php echo esc_html( $tz_readmore_button_color ); ?>; }
<?php endif; ?>

<?php if( $tz_readmore_button_hover_color ) : ?>
/* Blog Read More Button Hover Color */
.blog .blog-meta a.btn:hover,.blog .blog-meta a.btn:hover i , .blog-listing-style1 .blog-post:hover a.btn, .blog-listing-style1 .blog-post:hover a.btn i{ color: <?php echo esc_html( $tz_readmore_button_hover_color ); ?>!important; }
<?php endif; ?>

<?php if( $tz_readmore_button_background_color ) : ?>
/* Blog Read More Button Background Color */
.blog .blog-meta a.btn { background-color: <?php echo esc_html( $tz_readmore_button_background_color ); ?>; }
<?php endif; ?>

<?php if( $tz_readmore_button_hover_background_color ) : ?>
/* Blog Read More Button Background Hover Color */
.blog .blog-meta a.btn:hover ,.blog-listing-style1 .blog-post:hover a.btn{ background-color: <?php echo esc_html( $tz_readmore_button_hover_background_color ); ?> !important;}
<?php endif; ?>

<?php if( $tz_readmore_button_border_color ) : ?>
/* Blog Read More Button Border Color */
.blog .blog-meta a.btn { border-color: <?php echo esc_html( $tz_readmore_button_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_readmore_button_border_hover_color ) : ?>
/* Blog Read More Button Border Hover Color */
.blog .blog-meta a.btn:hover,.blog-listing-style1 .blog-post:hover a.btn{ border-color: <?php echo esc_html( $tz_readmore_button_border_hover_color ); ?>;}
<?php endif; ?>

/* Sidebar Settings */

<?php if( $tz_sidebar_title_font_size ) : ?>
/* Sidebar Title Font Size */
.paperio-theme-option .widget-title { font-size: <?php echo esc_html( $tz_sidebar_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_sidebar_title_line_height ) : ?>
/* Sidebar Title Line Height */
.paperio-theme-option .widget-title { line-height: <?php echo esc_html( $tz_sidebar_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_sidebar_title_character_spacing ) : ?>
/* Sidebar Title Character Spacing */
.paperio-theme-option .widget-title { letter-spacing: <?php echo esc_html( $tz_sidebar_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_sidebar_title_color ) : ?>
/* Sidebar Title Color */
.paperio-theme-option .widget-title { color: <?php echo esc_html( $tz_sidebar_title_color ); ?>; }
<?php endif; ?>

<?php if( $tz_sidebar_link_font_size ) : ?>
/* Sidebar Link Font Size */
.paperio-theme-option .sidebar a { font-size: <?php echo esc_html( $tz_sidebar_link_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_sidebar_link_line_height ) : ?>
/* Sidebar Link Line Height */
.paperio-theme-option .sidebar a { line-height: <?php echo esc_html( $tz_sidebar_link_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_sidebar_link_character_spacing ) : ?>
/* Sidebar Link Character Spacing */
.paperio-theme-option .sidebar a { letter-spacing: <?php echo esc_html( $tz_sidebar_link_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_sidebar_link_color ) : ?>
/* Sidebar Link Color */
.sidebar a, .paperio-theme-option .sidebar-style1 .follow-box li a, .paperio-theme-option .sidebar-style2 .follow-box li a, .paperio-theme-option .sidebar-style3 .follow-box li a, .paperio-theme-option .sidebar-style4 .follow-box li a { color: <?php echo esc_html( $tz_sidebar_link_color ); ?>; }
<?php endif; ?>

<?php if( $tz_sidebar_link_hover_color ) : ?>
/* Sidebar Link Hover Color */
.sidebar a:hover,.paperio-theme-option .sidebar-style1 .follow-box li a:hover,.paperio-theme-option .sidebar-style2 .follow-box li a:hover,.paperio-theme-option .sidebar-style3 .follow-box li a:hover,.paperio-theme-option .sidebar-style4 .follow-box li a:hover { color: <?php echo esc_html( $tz_sidebar_link_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_sidebar_border_color ) : ?>
/* Sidebar Border Color */
.paperio-theme-option .sidebar-style2 .widget, .paperio-theme-option .sidebar-style4 .widget { border-color: <?php echo esc_html( $tz_sidebar_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_sidebar_background_color && $tz_sidebar_style == 'sidebar-style3' ) : ?>
/* Title Color */
.paperio-theme-option .sidebar .widget { background-color: <?php echo esc_html( $tz_sidebar_background_color ); ?>; }
<?php endif; ?>

/* Page Title Wrapper */

<?php if( $tz_title_text_transform ) : ?>
/* Page Title Text Transform Color */
.blog-single-page-title, .paperio-theme-option .blog-single-page-title { text-transform: <?php echo esc_html( $tz_title_text_transform ); ?>; }
<?php endif; ?>

<?php if( $tz_title_font_size ) : ?>
/* Page Title Font Size */
.blog-single-page-title, .paperio-theme-option .blog-single-page-title { font-size: <?php echo esc_html( $tz_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_title_line_height ) : ?>
/* Page Title Line Height */
.blog-single-page-title, .paperio-theme-option .blog-single-page-title { line-height: <?php echo esc_html( $tz_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_title_character_spacing ) : ?>
/* Page Title Character Spacing */
.blog-single-page-title, .paperio-theme-option .blog-single-page-title { letter-spacing: <?php echo esc_html( $tz_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_title_text_color ) : ?>
/* Page Title Text Color */
.blog-single-page-title, .paperio-theme-option .blog-single-page-title { color: <?php echo esc_html( $tz_title_text_color ); ?>; }
<?php endif; ?>

<?php if( $tz_meta_font_size ) : ?>
/* Page Title Meta Font Size */
.blog-single-page-meta, .paperio-theme-option .blog-single-page-meta { font-size: <?php echo esc_html( $tz_meta_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_meta_line_height ) : ?>
/* Page Title Meta Line Height */
.blog-single-page-meta, .paperio-theme-option .blog-single-page-meta { line-height: <?php echo esc_html( $tz_meta_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_meta_character_spacing ) : ?>
/* Page Title Meta Character Spacing */
.blog-single-page-meta, .paperio-theme-option .blog-single-page-meta { letter-spacing: <?php echo esc_html( $tz_meta_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_meta_text_color ) : ?>
/* Page Title Meta Text Color */
.paperio-theme-option a.blog-single-page-meta-link,.blog-single-page-meta { color: <?php echo esc_html( $tz_meta_text_color ); ?>; }
<?php endif; ?>

<?php if( $tz_meta_text_hover_color ) : ?>
/* Page Title Meta Text Hover Color */
.paperio-theme-option a.blog-single-page-meta-link:hover { color: <?php echo esc_html( $tz_meta_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_title_background_color ) : ?>
/* Page Title Background Color */
.blog-single-page-background { background-color: <?php echo esc_html( $tz_title_background_color ); ?>; }
<?php endif; ?>

<?php if( $tz_title_border_color ) : ?>
/* Page Title Border Color */
.blog-single-page-background { border-color: <?php echo esc_html( $tz_title_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_breadcrumb_font_size ) : ?>
/* Breadcrumb Font Size */
.paperio-breadcrumb-settings, .paperio-theme-option .paperio-breadcrumb-settings li a:before { font-size: <?php echo esc_html( $tz_breadcrumb_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_breadcrumb_line_height ) : ?>
/* Breadcrumb Line Height */
.paperio-breadcrumb-settings, .paperio-theme-option .paperio-breadcrumb-settings li a:before { line-height: <?php echo esc_html( $tz_breadcrumb_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_breadcrumb_character_spacing ) : ?>
/* Breadcrumb Character Spacing */
.paperio-breadcrumb-settings, .paperio-theme-option .paperio-breadcrumb-settings li a:before { letter-spacing: <?php echo esc_html( $tz_breadcrumb_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_breadcrumb_text_color ) : ?>
/* Breadcrumb Text Color */
.paperio-breadcrumb-settings,.paperio-breadcrumb-settings a { color: <?php echo esc_html( $tz_breadcrumb_text_color ); ?>; }
<?php endif; ?>

<?php if( $tz_breadcrumb_text_hover_color ) : ?>
/* Breadcrumb Text Hover Color */
.paperio-theme-option .paperio-breadcrumb-settings a:hover { color: <?php echo esc_html( $tz_breadcrumb_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_breadcrumb_background_color ) : ?>
/* Breadcrumb Background Color */
.paperio-breadcrumb-navigation { background-color: <?php echo esc_html( $tz_breadcrumb_background_color ); ?>; }
<?php endif; ?>

<?php if( $tz_breadcrumb_border_color ) : ?>
/* Breadcrumb Border Color */
.paperio-breadcrumb-navigation { border-color: <?php echo esc_html( $tz_breadcrumb_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_content_font_size ) : ?>
/* Content Font Size */
.entry-content, .entry-content p { font-size: <?php echo esc_html( $tz_content_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_content_line_height ) : ?>
/* Content Line Height */
.entry-content, .entry-content p { line-height: <?php echo esc_html( $tz_content_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_content_character_spacing ) : ?>
/* Content Character Spacing */
.entry-content, .entry-content p { letter-spacing: <?php echo esc_html( $tz_content_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_content_link_color ) : ?>
/* Content Text Color */
.entry-content p a, .entry-content a { color: <?php echo esc_html( $tz_content_link_color ); ?>; }
<?php endif; ?>

<?php if( $tz_content_link_hover_color ) : ?>
/* Content Text Hover Color */
.entry-content p a:hover, .entry-content a:hover { color: <?php echo esc_html( $tz_content_link_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_post_tag_comment_like_font_size ) : ?>
/* Tag, Comment, Like Font Size */
.post-details-tags-main, .post-details-tags-main a, .blog-listing-comment a i, .blog-listing-comment .comment { font-size: <?php echo esc_html( $tz_post_tag_comment_like_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_post_tag_comment_like_line_height ) : ?>
/* Tag, Comment, Like Line Height */
.post-details-tags-main, .post-details-tags-main a, .blog-listing-comment a i, .blog-listing-comment .comment { line-height: <?php echo esc_html( $tz_post_tag_comment_like_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_post_tag_comment_like_character_spacing ) : ?>
/* Tag, Comment, Like Character Spacing */
.post-details-tags-main, .post-details-tags-main a, .blog-listing-comment a i, .blog-listing-comment .comment { letter-spacing: <?php echo esc_html( $tz_post_tag_comment_like_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_post_tag_comment_like_color ) : ?>
/* Tag, Comment, Like Color */
.post-details-tags-main, .post-details-tags-main a, .single-post .blog-listing-comment a i, .single-post ul.blog-listing-comment li:after { color: <?php echo esc_html( $tz_post_tag_comment_like_color ); ?>; }
<?php endif; ?>

<?php if( $tz_post_tag_comment_like_hover_color ) : ?>
/* Tag, Comment, Like Hover Color */
.post-details-tags-main, .post-details-tags-main a:hover, .single-post .blog-listing-comment a:hover i { color: <?php echo esc_html( $tz_post_tag_comment_like_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_post_tag_comment_like_border_color ) : ?>
/* Tag, Comment, Like Hover Color */
.paperio-meta-border-color { border-color: <?php echo esc_html( $tz_post_tag_comment_like_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_post_author_box_bg_color ) : ?>
/* For Author Box Background */
.about-author { background-color: <?php echo esc_html( $tz_post_author_box_bg_color ); ?>; }
<?php endif; ?>

<?php if( $tz_post_author_title_font_size ) : ?>
/* For Author Box Name Font Size */
.author-name { font-size: <?php echo esc_html( $tz_post_author_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_post_author_title_line_height ) : ?>
/* For Author Box Name Line Height */
.author-name { line-height: <?php echo esc_html( $tz_post_author_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_post_author_title_character_spacing ) : ?>
/* For Author Box Name Character Spacing */
.author-name { letter-spacing: <?php echo esc_html( $tz_post_author_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_post_author_title_text_color ) : ?>
/* For Author Box Color */
a.author-name { color: <?php echo esc_html( $tz_post_author_title_text_color ); ?>; }
<?php endif; ?>

<?php if( $tz_post_author_title_text_hover_color ) : ?>
/* For Author Box Hover Color */
a.author-name:hover { color: <?php echo esc_html( $tz_post_author_title_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_post_author_social_font_size ) : ?>
/* For Author Box Social icon Font Size */
.author-sharing { font-size: <?php echo esc_html( $tz_post_author_social_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_post_author_social_line_height ) : ?>
/* For Author Box Social icon Line Height */
.author-sharing { line-height: <?php echo esc_html( $tz_post_author_social_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_post_author_social_character_spacing ) : ?>
/* For Author Box Social icon Character Spacing */
.author-sharing { letter-spacing: <?php echo esc_html( $tz_post_author_social_character_spacing ); ?>; }
<?php endif; ?>

/* Category Layout Settings */
<?php if( $tz_category_layout_title_font_size ) : ?>
/* Title Font Size */
.category-layout-title { font-size: <?php echo esc_html( $tz_category_layout_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_title_line_height ) : ?>
/* Title Line Height */
.category-layout-title { line-height: <?php echo esc_html( $tz_category_layout_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_title_character_spacing ) : ?>
/* Title Character Spacing */
.category-layout-title { letter-spacing: <?php echo esc_html( $tz_category_layout_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_title_color ) : ?>
/* Title Color */
.category-layout-title a { color: <?php echo esc_html( $tz_category_layout_title_color ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_title_hover_color ) : ?>
/* Title Hover Color */
.category-layout-title a:hover, .category-layout-content .category-layout-title a:hover { color: <?php echo esc_html( $tz_category_layout_title_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_meta_font_size ) : ?>
/* Meta Font Size */
.category-layout-meta,.category-layout-meta a.category-layout-meta-link { font-size: <?php echo esc_html( $tz_category_layout_meta_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_meta_line_height ) : ?>
/* Meta Line Height */
.category-layout-meta,.category-layout-meta a.category-layout-meta-link { line-height: <?php echo esc_html( $tz_category_layout_meta_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_meta_character_spacing ) : ?>
/* Meta Character Spacing */
.category-layout-meta,.category-layout-meta a.category-layout-meta-link { letter-spacing: <?php echo esc_html( $tz_category_layout_meta_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_meta_color ) : ?>
/* Meta Color */
.category-layout-meta, .category-layout-meta a { color: <?php echo esc_html( $tz_category_layout_meta_color ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_meta_hover_color ) : ?>
/* Meta Hover Color */
.paperio-theme-option a.category-layout-meta-link:hover { color: <?php echo esc_html( $tz_category_layout_meta_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_comment_and_like_font_size ) : ?>
/* Comment and Like Font Size */
.category-blog-listing-comment .category-layout-comment-link,.category-blog-listing-comment a.category-layout-comment-link i, ul.category-blog-listing-comment li:after { font-size: <?php echo esc_html( $tz_category_layout_comment_and_like_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_comment_and_like_line_height ) : ?>
/* Comment and Like Line Height */
.category-blog-listing-comment .category-layout-comment-link,.category-blog-listing-comment a.category-layout-comment-link i, ul.category-blog-listing-comment li:after { line-height: <?php echo esc_html( $tz_category_layout_comment_and_like_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_comment_and_like_character_spacing ) : ?>
/* Comment and Like Character Spacing */
.category-blog-listing-comment .category-layout-comment-link,.category-blog-listing-comment a.category-layout-comment-link i, ul.category-blog-listing-comment li:after { letter-spacing: <?php echo esc_html( $tz_category_layout_comment_and_like_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_comment_and_like_color ) : ?>
/* Comment and Like Color */
.category-blog-listing-comment .category-layout-comment-link, ul.category-blog-listing-comment li:after { color: <?php echo esc_html( $tz_category_layout_comment_and_like_color ); ?>; }
<?php endif; ?>

<?php if( $tz_category_layout_comment_and_like_hover_color ) : ?>
/* Comment and Like Hover Color */
.category-blog-listing-comment .category-layout-comment-link:hover { color: <?php echo esc_html( $tz_category_layout_comment_and_like_hover_color ); ?>; }
<?php endif; ?>

/* Category Readmore Button Settings*/

<?php if( $tz_general_category_readmore_button_font_size ) : ?>
/* Category Read More Button Font Size */
.category .blog-meta a.btn ,.category .blog-meta a.btn i { font-size: <?php echo esc_html( $tz_general_category_readmore_button_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_general_category_readmore_button_line_height ) : ?>
/* Category Read More Button Line Height */
.category .blog-meta a.btn { line-height: <?php echo esc_html( $tz_general_category_readmore_button_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_general_category_readmore_button_character_spacing ) : ?>
/* Category Read More Button Letter Spacing */
.category .blog-meta a.btn { letter-spacing: <?php echo esc_html( $tz_general_category_readmore_button_character_spacing ); ?>!important; }
<?php endif; ?>

<?php if( $tz_category_readmore_button_color ) : ?>
/* Category Read More Button Color */
.category .blog-meta a.btn { color: <?php echo esc_html( $tz_category_readmore_button_color ); ?>; }
<?php endif; ?>

<?php if( $tz_category_readmore_button_hover_color ) : ?>
/* Category Read More Button Hover Color */
.category .blog-meta a.btn:hover, .category .blog-meta a.btn:hover i{ color: <?php echo esc_html( $tz_category_readmore_button_hover_color ); ?>!important; }
<?php endif; ?>

<?php if( $tz_category_readmore_button_background_color ) : ?>
/* Category Read More Button Background Color */
.category .blog-meta a.btn { background-color: <?php echo esc_html( $tz_category_readmore_button_background_color ); ?>; }
<?php endif; ?>

<?php if( $tz_category_readmore_button_hover_background_color ) : ?>
/* Category Read More Button Background Hover Color */
.category .blog-meta a.btn:hover{ background-color: <?php echo esc_html( $tz_category_readmore_button_hover_background_color ); ?> !important;}
<?php endif; ?>

<?php if( $tz_category_readmore_button_border_color ) : ?>
/* Category Read More Button Border Color */
.category .blog-meta a.btn { border-color: <?php echo esc_html( $tz_category_readmore_button_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_category_readmore_button_border_hover_color ) : ?>
/* Category Read More Button Border Hover Color */
.category .blog-meta a.btn:hover{ border-color: <?php echo esc_html( $tz_category_readmore_button_border_hover_color ); ?>;}
<?php endif; ?>

/* Archive Layout Settings */
<?php if( $tz_archive_layout_title_font_size ) : ?>
/* Title Font Size */
.archive-layout-title { font-size: <?php echo esc_html( $tz_archive_layout_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_title_line_height ) : ?>
/* Title Line Height */
.archive-layout-title { line-height: <?php echo esc_html( $tz_archive_layout_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_title_character_spacing ) : ?>
/* Title Character Spacing */
.archive-layout-title { letter-spacing: <?php echo esc_html( $tz_archive_layout_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_title_color ) : ?>
/* Title Color */
.archive-layout-title a { color: <?php echo esc_html( $tz_archive_layout_title_color ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_title_hover_color ) : ?>
/* Title Hover Color */
.archive-layout-title a:hover, .archive-layout-content .archive-layout-title a:hover { color: <?php echo esc_html( $tz_archive_layout_title_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_meta_font_size ) : ?>
/* Meta Font Size */
.archive-layout-meta,.archive-layout-meta a.archive-layout-meta-link { font-size: <?php echo esc_html( $tz_archive_layout_meta_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_meta_line_height ) : ?>
/* Meta Line Height */
.archive-layout-meta,.archive-layout-meta a.archive-layout-meta-link { line-height: <?php echo esc_html( $tz_archive_layout_meta_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_meta_character_spacing ) : ?>
/* Meta Character Spacing */
.archive-layout-meta,.archive-layout-meta a.archive-layout-meta-link { letter-spacing: <?php echo esc_html( $tz_archive_layout_meta_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_meta_color ) : ?>
/* Meta Color */
.archive-layout-meta, .archive-layout-meta a { color: <?php echo esc_html( $tz_archive_layout_meta_color ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_meta_hover_color ) : ?>
/* Meta Hover Color */
.paperio-theme-option a.archive-layout-meta-link:hover { color: <?php echo esc_html( $tz_archive_layout_meta_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_comment_and_like_font_size ) : ?>
/* Comment and Like Font Size */
.archive-blog-listing-comment .archive-layout-comment-link,.archive-blog-listing-comment a.archive-layout-comment-link i, ul.archive-blog-listing-comment li:after { font-size: <?php echo esc_html( $tz_archive_layout_comment_and_like_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_comment_and_like_line_height ) : ?>
/* Comment and Like Line Height */
.archive-blog-listing-comment .archive-layout-comment-link,.archive-blog-listing-comment a.archive-layout-comment-link i, ul.archive-blog-listing-comment li:after { line-height: <?php echo esc_html( $tz_archive_layout_comment_and_like_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_comment_and_like_character_spacing ) : ?>
/* Comment and Like Character Spacing */
.archive-blog-listing-comment .archive-layout-comment-link,.archive-blog-listing-comment a.archive-layout-comment-link i, ul.archive-blog-listing-comment li:after { letter-spacing: <?php echo esc_html( $tz_archive_layout_comment_and_like_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_comment_and_like_color ) : ?>
/* Comment and Like Color */
.archive-blog-listing-comment .archive-layout-comment-link, ul.archive-blog-listing-comment li:after { color: <?php echo esc_html( $tz_archive_layout_comment_and_like_color ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_layout_comment_and_like_hover_color ) : ?>
/* Comment and Like Hover Color */
.archive-blog-listing-comment .archive-layout-comment-link:hover { color: <?php echo esc_html( $tz_archive_layout_comment_and_like_hover_color ); ?>; }
<?php endif; ?>

/* Archive Readmore Button Settings*/
<?php if( $tz_general_archive_readmore_button_font_size ) : ?>
/* Archive Read More Button Font Size */
.blog-meta a.archive-button ,.blog-meta a.archive-button i { font-size: <?php echo esc_html( $tz_general_archive_readmore_button_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_general_archive_readmore_button_line_height ) : ?>
/* Archive Read More Button Line Height */
.blog-meta a.archive-button { line-height: <?php echo esc_html( $tz_general_archive_readmore_button_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_general_archive_readmore_button_character_spacing ) : ?>
/* Archive Read More Button Letter Spacing */
.blog-meta a.archive-button { letter-spacing: <?php echo esc_html( $tz_general_archive_readmore_button_character_spacing ); ?>!important; }
<?php endif; ?>

<?php if( $tz_archive_readmore_button_color ) : ?>
/* Archive Read More Button Color */
.blog-meta a.archive-button { color: <?php echo esc_html( $tz_archive_readmore_button_color ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_readmore_button_hover_color ) : ?>
/* Archive Read More Button Hover Color */
.blog-meta a.archive-button:hover,.blog-meta a.archive-button:hover i{ color: <?php echo esc_html( $tz_archive_readmore_button_hover_color ); ?>!important; }
<?php endif; ?>

<?php if( $tz_archive_readmore_button_background_color ) : ?>
/* Archive Read More Button Background Color */
.blog-meta a.archive-button { background-color: <?php echo esc_html( $tz_archive_readmore_button_background_color ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_readmore_button_hover_background_color ) : ?>
/* Archive Read More Button Background Hover Color */
.blog-meta a.archive-button:hover{ background-color: <?php echo esc_html( $tz_archive_readmore_button_hover_background_color ); ?> !important;}
<?php endif; ?>

<?php if( $tz_archive_readmore_button_border_color ) : ?>
/* Archive Read More Button Border Color */
.blog-meta a.archive-button { border-color: <?php echo esc_html( $tz_archive_readmore_button_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_archive_readmore_button_border_hover_color ) : ?>
/* Archive Read More Button Border Hover Color */
.blog-meta a.archive-button:hover{ border-color: <?php echo esc_html( $tz_archive_readmore_button_border_hover_color ); ?>;}
<?php endif; ?>

<?php if( $tz_body_font_size ) : ?>
/* Body Font Size */
body.paperio-theme-option { font-size: <?php echo esc_html( $tz_body_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_body_line_height ) : ?>
/* Body Line Height */
body.paperio-theme-option { line-height: <?php echo esc_html( $tz_body_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_body_character_spacing ) : ?>
/* Body Character Spacing */
body.paperio-theme-option { letter-spacing: <?php echo esc_html( $tz_body_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_body_background_color ) : ?>
/* Body Background Color */
body.paperio-theme-option { background-color: <?php echo esc_html( $tz_body_background_color ); ?>; }
<?php endif; ?>

<?php if( $tz_body_text_color ) : ?>
/* Body Color */
body.paperio-theme-option { color: <?php echo esc_html( $tz_body_text_color ); ?>; }
<?php endif; ?>

<?php if( $tz_footer_bg_color ) : ?>
/* For Footer Background Color*/
.footer-bg { background-color: <?php echo esc_html( $tz_footer_bg_color ); ?>; }
<?php endif; ?>

/* ScrollToTop settings */
<?php if( $tz_scrolltotop_arrow_color ) : ?>
/* For ScrollToTop arrow Color*/
.back-to-top i { color: <?php echo esc_html( $tz_scrolltotop_arrow_color ); ?>; }
<?php endif; ?>

<?php if( $tz_scrolltotop_arrow_hover_color ) : ?>
/* For ScrollToTop arrow hover Color*/
.back-to-top:hover i, .back-to-top:hover:focus i, .back-to-top:focus i{ color: <?php echo esc_html( $tz_scrolltotop_arrow_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_scrolltotop_background_color ) : ?>
/* For ScrollToTop Background Color*/
.paperio-theme-option .back-to-top { background-color: <?php echo esc_html( $tz_scrolltotop_background_color ); ?>; }
<?php endif; ?>

<?php if( $tz_scrolltotop_background_hover_color ) : ?>
/* For ScrollToTop Background hover Color*/
.back-to-top:hover, .back-to-top:hover:focus, .back-to-top:focus { background-color: <?php echo esc_html( $tz_scrolltotop_background_hover_color ); ?>; }
<?php endif; ?>

<?php if( $tz_footer_border_color ) : ?>
/* For Footer Border Color*/
.footer-border { border-color: <?php echo esc_html( $tz_footer_border_color ); ?>; }
<?php endif; ?>

<?php if( $tz_footer_widget_title_font_size ) : ?>
/* Footer Widget Title Font Size */
.site-footer .widget-title { font-size: <?php echo esc_html( $tz_footer_widget_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_footer_widget_title_line_height ) : ?>
/* Footer Widget Title Line Height */
.site-footer .widget-title { line-height: <?php echo esc_html( $tz_footer_widget_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_footer_widget_title_character_spacing ) : ?>
/* Footer Widget Title Character Spacing */
.site-footer .widget-title { letter-spacing: <?php echo esc_html( $tz_footer_widget_title_character_spacing ); ?>; }
<?php endif; ?>

<?php if( $tz_footer_widget_title_color ) : ?>
/* Footer Widget Title Color */
.site-footer .widget-title { color: <?php echo esc_html( $tz_footer_widget_title_color ); ?>; }
<?php endif; ?>

<?php if( $tz_post_social_font_size ) : ?>
/* Social Font Size */
.social-sharing-icon i, .paperio-theme-option .social-sharing-icon i { font-size: <?php echo esc_html( $tz_post_social_font_size ); ?>; }
<?php endif; ?>

<?php if( $tz_post_social_line_height ) : ?>
/* Social Line Height */
.social-sharing-icon i, .paperio-theme-option .social-sharing-icon i { line-height: <?php echo esc_html( $tz_post_social_line_height ); ?>; }
<?php endif; ?>

<?php if( $tz_post_social_icon_color ) : ?>
/* Social Icon Color */
.social-sharing-icon i, .paperio-theme-option .social-sharing-icon i { color: <?php echo esc_html( $tz_post_social_icon_color ); ?>; }
<?php endif; ?>
