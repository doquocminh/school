<?php
/**
 * Generate css for theme color.
 *
 * @package Paperio
 */
?>
<?php

	if ( !defined( 'ABSPATH' ) ) { exit; }

	$tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
	if( $tz_theme_type == 'theme-custom-color' ) {
		$tz_theme_custom_rgba_color = '';
		$tz_theme_custom_color = get_theme_mod( 'tz_theme_custom_color', '' );
		$tz_theme_custom_rgba_color = paperio_hex2rgb( $tz_theme_custom_color );
?>

/* text color */
.theme-custom-color blockquote.blog-image:before, .theme-custom-color .owl-slider-style-4 .banner-content::before, .theme-custom-color .content-area p a, .theme-custom-color .social-icon-fa, .theme-custom-color .arrow-pagination .owl-prev:hover, .theme-custom-color .arrow-pagination .owl-next:hover, .theme-custom-color .sidebar-style3 h5 span::before, .theme-custom-color .breadcrumb-style-1 .breadcrumb > li > a:focus, .theme-custom-color .pagination-style-1 .pagination > li > a:hover, .theme-custom-color .pagination-style-1 .pagination > li > span:focus, .theme-custom-color .pagination-style-1 .pagination > li > span:hover, .theme-custom-color .breadcrumb-style-1 .breadcrumb li a:hover, .theme-custom-color .separator:after, .theme-custom-color .separator:before, .theme-custom-color .breadcrumb-style-1 .breadcrumb > li > a:focus, .theme-custom-color .pagination-style-1 .pagination > li > a:hover, .theme-custom-color .pagination-style-1 .pagination > li > span:focus, .theme-custom-color .pagination-style-1 .pagination > li > span:hover, .theme-custom-color .owl-next-prev-arrow-style3 .owl-nav button.owl-prev:hover, .theme-custom-color .owl-next-prev-arrow-style3 .owl-nav button.owl-next:hover, .theme-custom-color .header-main .navbar-nav > li a.dropdown-toggle:after, .theme-custom-color .header-main .paperio-default-menu > li a:after, .theme-custom-color .text-color, .theme-custom-color .sidebar-style1 .follow-box li a, .theme-custom-color .about-three-box i, .theme-custom-color .about-content-box span {color:<?php echo esc_html( $tz_theme_custom_color ); ?>}
/* background color */
.theme-custom-color .sidebar-style3 .follow-box li a:hover, .theme-custom-color .page-title-small h2::before, .theme-custom-color .sidebar-style2 .follow-box li a:hover, .theme-custom-color .owl-next-prev-arrow-style4 .owl-buttons div:hover, .theme-custom-color .background-color, .theme-custom-color .owl-next-prev-arrow-style1 .owl-nav button:hover, .theme-custom-color .btn-color, .theme-custom-color .right-separator::before, .theme-custom-color .sidebar-style4 .follow-box li a:hover, .bypostauthor.post-comment .comment-avtar span  { background: <?php echo esc_html( $tz_theme_custom_color ); ?>;}
/* border color */
.theme-custom-color .blog-listing-style7:hover .banner-content, .theme-custom-color .promo-area-style2 .promo-border p:before, .theme-custom-color .sidebar-style3 .follow-box li a:hover, .theme-custom-color .owl-next-prev-arrow-style1 .owl-nav button, .theme-custom-color .owl-next-prev-arrow-style4 .owl-buttons div:hover{ border-color: <?php echo esc_html( $tz_theme_custom_color ); ?>;}
/* light border color */
.theme-custom-color .header-border, .theme-custom-color .title-border-right::after, .theme-custom-color .title-border-center span:before, .theme-custom-color .title-border-center span:after, .theme-custom-color .border-footer{ border-color:<?php echo esc_html( $tz_theme_custom_rgba_color ); ?>;}
/* link hover color */
.theme-custom-color a:hover, .theme-custom-color a:focus, .theme-custom-color .header-main .nav > li:hover > a, .theme-custom-color .header-main .nav > li > a:focus, .theme-custom-color .nav > li > a:hover, .theme-custom-color .header-style-2 .navbar-nav > li a.dropdown-toggle:after, .theme-custom-color .breadcrumb-style-1 .breadcrumb li a:hover, .theme-custom-color .text-link-light-gray:hover, .theme-custom-color .text-link-white:hover, .theme-custom-color .widget_categories li ul.children li a:hover, .theme-custom-color .widget_categories li ul.children li a:focus { color: <?php echo esc_html( $tz_theme_custom_color ); ?>;}

<?php
	}