<?php
/**
 * The header template which contain other template for menu and logo.
 *
 * @package Paperio
 */
?>
<?php

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) { exit; }

$tz_header_class = $tz_header_special_class = $tz_nav_height = $non_sticky_class = '';
$tz_disable_header = get_theme_mod( 'tz_disable_header', 0 );
$tz_non_sticky_header = get_theme_mod( 'tz_non_sticky_header', 0 );
$tz_header_type = get_theme_mod( 'tz_header_type', 'header-style1' );
$tz_navigation_position_header = get_theme_mod( 'tz_navigation_position_header', 'below-logo' );
$tz_header_container_fluid = get_theme_mod( 'tz_header_container_fluid', 'no' );
$tz_header_navigation_container_fluid = get_theme_mod( 'tz_header_navigation_container_fluid', 'no' );
$tz_header_class = ( $tz_navigation_position_header == 'below-logo' ) ? ' navbar-bottom' : ' navbar-top';

$nav_menus = wp_get_nav_menus();
$menu_count = count( $nav_menus );
$add_new_screen = ( isset( $_GET['menu'] ) && 0 == $_GET['menu'] ) ? true : false;
$locations_screen = ( isset( $_GET['action'] ) && 'locations' == $_GET['action'] ) ? true : false;
$page_count = wp_count_posts( 'page' );
$one_theme_location_no_menus = ( 1 == count( get_registered_nav_menus() ) && ! $add_new_screen && empty( $nav_menus ) && ! empty( $page_count->publish ) ) ? true : false;
$tz_nav_height = ( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) ? '' : ' nav-without-height';

if( $tz_disable_header != 1 ) {
    // Switch Case For Header Styles.
    $header_image = '';
    if ( get_header_image() ) {
        $custom_header_sizes = apply_filters( 'paperio_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
        ob_start();
        header_image();
        $header_image = ob_get_contents();
        ob_end_clean();
    }

    // Check sticky header
    if( $tz_non_sticky_header == 1 ) {
        $non_sticky_class = ' non-sticky-header';
    }
    // Check header container style
    $tz_set_header_container_fluid = $tz_set_header_navigation_container_fluid = '';
    if( isset( $tz_header_container_fluid ) && $tz_header_container_fluid == 'yes' ) {
        $tz_set_header_container_fluid = 'container-fluid';
    } else {
        $tz_set_header_container_fluid = 'container';
    }
    // Check header navigation container style
    if( isset( $tz_header_navigation_container_fluid ) && $tz_header_navigation_container_fluid == 'yes' ) {
        $tz_set_header_navigation_container_fluid = 'container-fluid';
    } else {
        $tz_set_header_navigation_container_fluid = 'container';
    }
    switch( $tz_header_type ) {

        case 'header-style2':
            echo '<header id="masthead" class="site-header bg-white header-style-2 navbar-fixed-top header-img'.$tz_header_class.$non_sticky_class.'" itemscope="itemscope" itemtype="http://schema.org/WPHeader">';
                if ( get_header_image() ) {
                    echo '<img src="'.esc_url( $header_image ).'" srcset="'.esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ).'" sizes="'.esc_attr( $custom_header_sizes ).'" width="'.esc_attr( get_custom_header()->width ).'" height="'.esc_attr( get_custom_header()->height ).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" class="header-background-img">';
                }
                if( $tz_navigation_position_header == 'below-logo' ) {
                    echo '<div class="header-logo">';
                        echo '<div class="'.esc_attr( $tz_set_header_container_fluid ).'">';
                            echo '<div class="row">';
                                echo get_template_part( 'templates/header/header', 'block' );
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    if( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) {
                        echo '<nav id="site-navigation" class="navbar navbar-default navbar-static-top background-color white-link-nav no-margin-top sm-bg-transparent" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                            echo '<div class="'.esc_attr( $tz_set_header_navigation_container_fluid ).'">'; 
                                echo '<div class="row">';
                                    echo get_template_part( 'templates/header/header', 'menu' );
                                echo '</div>';
                            echo '</div>';
                        echo '</nav>';
                    }
                } else {
                    if( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) {
                        echo '<nav id="site-navigation" class="navbar navbar-default navbar-static-top background-color white-link-nav no-margin-top sm-bg-transparent" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                            echo '<div class="'.esc_attr( $tz_set_header_navigation_container_fluid ).'">'; 
                                echo '<div class="row">';
                                    echo get_template_part( 'templates/header/header', 'menu' );
                                echo '</div>';
                            echo '</div>';
                        echo '</nav>';
                    }
                    echo '<div class="header-logo">';
                        echo '<div class="'.esc_attr( $tz_set_header_container_fluid ).'">';
                            echo '<div class="row">';
                                echo get_template_part( 'templates/header/header', 'block' );
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</header>';
        break;

        case 'header-style3':
            echo '<header id="masthead" class="bg-white header-style-2 navbar-fixed-top header-img'.$tz_header_class.$non_sticky_class.'" itemscope="itemscope" itemtype="http://schema.org/WPHeader">';
                if ( get_header_image() ) {
                    echo '<img src="'.esc_url( $header_image ).'" srcset="'.esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ).'" sizes="'.esc_attr( $custom_header_sizes ).'" width="'.esc_attr( get_custom_header()->width ).'" height="'.esc_attr( get_custom_header()->height ).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" class="header-background-img">';
                }
                if( $tz_navigation_position_header == 'below-logo' ) {
                    echo '<div class="header-logo">';
                        echo '<div class="'.esc_attr( $tz_set_header_container_fluid ).'">';
                            echo '<div class="row">';
                                echo get_template_part( 'templates/header/header', 'block' );
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    if( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) {
                        echo '<nav class="navbar navbar-default navbar-static-top bg-white navbar-border-top xs-no-border black-link-nav no-margin-top" id="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                            echo '<div class="'.esc_attr( $tz_set_header_navigation_container_fluid ).'">';
                                echo '<div class="row">';
                                    echo get_template_part( 'templates/header/header', 'menu' );
                                echo '</div>';
                            echo '</div>';
                        echo '</nav>';
                    }
                } else {
                    if( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) {
                        echo '<nav class="navbar navbar-default navbar-static-top bg-white navbar-border-bottom xs-no-border black-link-nav no-margin-top" id="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                            echo '<div class="'.esc_attr( $tz_set_header_navigation_container_fluid ).'">';
                                echo '<div class="row">';
                                    echo get_template_part( 'templates/header/header', 'menu' );
                                echo '</div>';
                            echo '</div>';
                        echo '</nav>';
                    }
                    echo '<div class="header-logo">';
                        echo '<div class="'.esc_attr( $tz_set_header_container_fluid ).'">';
                            echo '<div class="row">';
                                echo get_template_part( 'templates/header/header', 'block' );
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</header>';
        break;

        case 'header-style4':
            echo '<header id="masthead" class="header-style-2 header-style-pattern navbar-fixed-top header-img'.$tz_header_class.$non_sticky_class.'" itemscope="itemscope" itemtype="http://schema.org/WPHeader">';
                if ( get_header_image() ) {
                    echo '<img src="'.esc_url( $header_image ).'" srcset="'.esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ).'" sizes="'.esc_attr( $custom_header_sizes ).'" width="'.esc_attr( get_custom_header()->width ).'" height="'.esc_attr( get_custom_header()->height ).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" class="header-background-img">';
                }
                if( $tz_navigation_position_header == 'below-logo' ) {
                    echo '<div class="header-logo">';
                        echo '<div class="'.esc_attr( $tz_set_header_container_fluid ).'">';
                            echo '<div class="row">';
                                echo get_template_part( 'templates/header/header', 'block' );
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    if( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) {
                        echo '<nav id="site-navigation" class="navbar navbar-default navbar-static-top bg-black white-link-nav no-margin-top sm-bg-transparent" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                            echo '<div class="'.esc_attr( $tz_set_header_navigation_container_fluid ).'">';
                                echo '<div class="row">';
                                    echo get_template_part( 'templates/header/header', 'menu' );
                                echo '</div>';
                            echo '</div>';
                        echo '</nav>';
                    }
                } else {
                    if( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) {
                        echo '<nav id="site-navigation" class="navbar navbar-default navbar-static-top bg-black white-link-nav no-margin-top sm-bg-transparent" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                            echo '<div class="'.esc_attr( $tz_set_header_navigation_container_fluid ).'">';
                                echo '<div class="row">';
                                    echo get_template_part( 'templates/header/header', 'menu' );
                                echo '</div>';
                            echo '</div>';
                        echo '</nav>';
                    }
                    echo '<div class="header-logo">';
                        echo '<div class="'.esc_attr( $tz_set_header_container_fluid ).'">';
                            echo '<div class="row">';
                                echo get_template_part( 'templates/header/header', 'block' );
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</header>';
        break;

        case 'header-style5':
            echo '<header id="masthead" class="bg-black header-style-2 dark-header navbar-fixed-top header-img'.$tz_header_class.$non_sticky_class.'" itemscope="itemscope" itemtype="http://schema.org/WPHeader">';
                if ( get_header_image() ) {
                    echo '<img src="'.esc_url( $header_image ).'" srcset="'.esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ).'" sizes="'.esc_attr( $custom_header_sizes ).'" width="'.esc_attr( get_custom_header()->width ).'" height="'.esc_attr( get_custom_header()->height ).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" class="header-background-img">';
                }
                if( $tz_navigation_position_header == 'below-logo' ) {
                    echo '<div class="header-logo">';
                        echo '<div class="'.esc_attr( $tz_set_header_container_fluid ).'">';
                            echo '<div class="row">';
                                echo get_template_part( 'templates/header/header', 'block' );
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    if( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) {
                        echo '<nav id="site-navigation" class="navbar navbar-default navbar-static-top navbar-border-top gray-link-nav bg-black no-margin-top sm-bg-transparent" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                            echo '<div class="'.esc_attr( $tz_set_header_navigation_container_fluid ).'">';
                                echo '<div class="row">';
                                    echo get_template_part( 'templates/header/header', 'menu' );
                                echo '</div>';
                            echo '</div>';
                        echo '</nav>';
                    }
                } else {
                    if( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) {
                        echo '<nav id="site-navigation" class="navbar navbar-default navbar-static-top navbar-border-bottom gray-link-nav bg-black no-margin-top sm-bg-transparent" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                            echo '<div class="'.esc_attr( $tz_set_header_navigation_container_fluid ).'">';
                                echo '<div class="row">';
                                    echo get_template_part( 'templates/header/header', 'menu' );
                                echo '</div>';
                            echo '</div>';
                        echo '</nav>';
                    }
                    echo '<div class="header-logo">';
                        echo '<div class="'.esc_attr( $tz_set_header_container_fluid ).'">';
                            echo '<div class="row">';
                                echo get_template_part( 'templates/header/header', 'block' );
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</header>';
        break;

        default:
            echo '<header id="masthead" class="header-main bg-white navbar-fixed-top header-img'.$tz_header_class.$tz_nav_height.$non_sticky_class.'" itemscope="itemscope" itemtype="http://schema.org/WPHeader">';
                if ( get_header_image() ) {
                    echo '<img src="'.esc_url( $header_image ).'" srcset="'.esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ).'" sizes="'.esc_attr( $custom_header_sizes ).'" width="'.esc_attr( get_custom_header()->width ).'" height="'.esc_attr( get_custom_header()->height ).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" class="header-background-img">';
                }
                if( $tz_navigation_position_header == 'below-logo' ) {
                    echo '<div class="header-border header-logo">';
                        echo '<div class="'.esc_attr( $tz_set_header_container_fluid ).'">';
                            echo '<div class="row">';
                                echo get_template_part( 'templates/header/header', 'block' );
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    if( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) {
                        echo '<nav id="site-navigation" class="navbar navbar-default" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                            echo '<div class="'.esc_attr( $tz_set_header_navigation_container_fluid ).'">';
                                echo '<div class="row">';
                                    echo get_template_part( 'templates/header/header', 'menu' );
                                echo '</div>';
                            echo '</div>';
                        echo '</nav>';
                    }
                } else {
                    if( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) {
                        echo '<nav id="site-navigation" class="navbar navbar-default" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                            echo '<div class="'.esc_attr( $tz_set_header_navigation_container_fluid ).'">';
                                echo '<div class="row">';
                                    echo get_template_part( 'templates/header/header', 'menu' );
                                echo '</div>';
                            echo '</div>';
                        echo '</nav>';
                    }
                    echo '<div class="header-border header-logo">';
                        echo '<div class="'.esc_attr( $tz_set_header_container_fluid ).'">';
                            echo '<div class="row">';
                                echo get_template_part( 'templates/header/header', 'block' );
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</header>';
        break;

    }
    /* Add specing for top */
    if( has_nav_menu( 'paperiomegamenu' ) || ( $one_theme_location_no_menus = 1 || $one_theme_location_no_menus = 0 ) ) {
        echo '<div class="below-navigation clear-both"></div>';
    } else {
        echo '<div class="below-navigation nav-without-menu clear-both"></div>';
    }
}