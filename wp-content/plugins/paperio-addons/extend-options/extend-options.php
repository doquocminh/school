<?php
/**
 * Extend Theme Option
 */

 /* Force All Page To Under Construction If "enable-under-construction" is enable */

if ( ! function_exists( 'paperio_get_address' ) ) {
    function paperio_get_address() {
        // return the full address
        return paperio_get_protocol().'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    } // end function paperio_get_address
}

if ( ! function_exists( 'paperio_get_protocol' ) ) {
    function paperio_get_protocol() {
        // Set the base protocol to http
        $paperio_protocol = 'http';
        // check for https
        if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
            $paperio_protocol .= "s";
        }
        
        return $paperio_protocol;
    } // end function paperio_get_protocol
}

add_action( 'template_redirect', 'paperio_force_under_construction' );
if ( ! function_exists( 'paperio_force_under_construction' ) ) {
    function paperio_force_under_construction() {

        $paperio_userrequest = str_ireplace(home_url('/'),'',paperio_get_address());
        $paperio_userrequest = rtrim($paperio_userrequest,'');

        $paperio_enable_under_maintenance = get_theme_mod('tz_enable_under_maintenance', 0 );
        if ( $paperio_enable_under_maintenance == 1 && !current_user_can('level_10') && get_theme_mod('tz_enable_under_maintenance_pages') != '0' ) { 
            $paperio_do_redirect = '';

            if( strpos($paperio_userrequest, '/contact-form-7/v1') !== false ) { 
                return;
            }
            
            if ( strpos($paperio_userrequest, 'wp-login') !== 0 && strpos($paperio_userrequest, 'wp-admin') !== 0 ) {

                if( get_option('permalink_structure') ){
                    $tz_get_page = get_page_uri(get_theme_mod('tz_enable_under_maintenance_pages'));

                    $paperio_do_redirect = '/'.$tz_get_page;
                    // Make sure it gets all the proper decoding and rtrim action
                    $paperio_userrequest = str_replace('*','(.*)',$paperio_userrequest);
                    $paperio_pattern = '/^' . str_replace( '/', '\/', rtrim( $paperio_userrequest, '/' ) ) . '/';
                    $paperio_do_redirect = str_replace('*','$1',$paperio_do_redirect);
                    $output = preg_replace($paperio_pattern, $paperio_do_redirect, $paperio_userrequest);
                    if ($output !== $paperio_userrequest) {
                        // pattern matched, perform redirect
                        $paperio_do_redirect = $output;
                    }
                }else{
                    $paperio_do_redirect = '/?page_id='.get_theme_mod('tz_enable_under_maintenance_pages');
                }
            } else {
                // simple comparison redirect
                $paperio_do_redirect = $paperio_userrequest;
            }
            
            if ($paperio_do_redirect !== '' && trim($paperio_do_redirect,'/') !== trim($paperio_userrequest,'/')) {
                // check if destination needs the domain prepended

                if (strpos($paperio_do_redirect,'/') === 0){
                    $paperio_do_redirect = home_url().$paperio_do_redirect;
                }

                header ('Location: ' . $paperio_do_redirect);
                exit();
                
            }
        }
    }
}


 /* To Add Under Construction Notice To Adminbar For All Logged User */
if ( ! function_exists( 'paperio_admin_bar_under_construction_notice' ) ) {
    function paperio_admin_bar_under_construction_notice() {
        global $wp_admin_bar;
        $paperio_enable_under_maintenance = get_theme_mod('tz_enable_under_maintenance', 0 );
        if ( $paperio_enable_under_maintenance == 1 ) {
            $wp_admin_bar->add_menu( array(
                'id' => 'admin-bar-under-construction-notice',
                'parent' => 'top-secondary',
                'href' => esc_url(home_url('/')).'wp-admin/customize.php?autofocus%5Bsection%5D=tz_add_under_maintenance_section',
                'title' => '<span style="color: #FF0000;">'.esc_html__( 'Under Construction', 'paperio-addons' ).'</span>'
            ) );
        }
    }
}
add_action( 'admin_bar_menu', 'paperio_admin_bar_under_construction_notice' );

/* To get Register Sidebar list in metabox */
if( ! function_exists( 'paperio_register_sidebar_array' ) ) :
    function paperio_register_sidebar_array() {
        global $wp_registered_sidebars;
        if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ){ 
            $sidebar_array = array();
            $sidebar_array['default'] = esc_html__( 'Default', 'paperio-addons' );
            foreach( $wp_registered_sidebars as $sidebar ){
                $sidebar_array[$sidebar['id']] = $sidebar['name'];
            }
        }
        return $sidebar_array;
    }
endif;

if( ! function_exists( 'paperio_modify_user_contact_methods' ) ) :
    function paperio_modify_user_contact_methods( $user_contact ) {

        // Add user contact methods
        $user_contact['tz_facebook'] = esc_attr__( 'Facebook', 'paperio-addons' );
        $user_contact['tz_twitter'] = esc_attr__( 'Twitter', 'paperio-addons' );
        $user_contact['tz_googleplus'] = esc_attr__( 'Google Plus', 'paperio-addons' );
        $user_contact['tz_linkedin'] = esc_attr__( 'Linkedin', 'paperio-addons' );
        $user_contact['tz_instagram'] = esc_attr__( 'Instagram', 'paperio-addons' );
        $user_contact['tz_pinterest'] = esc_attr__( 'Pinterest', 'paperio-addons' );
        $user_contact['tz_rss'] = esc_attr__( 'RSS', 'paperio-addons' );
        $user_contact['tz_youtube'] = esc_attr__( 'Youtube', 'paperio-addons' );
        $user_contact['tz_bloglovin'] = esc_attr__( 'Bloglovin', 'paperio-addons' );
        $user_contact['tz_tumblr'] = esc_attr__( 'Tumblr', 'paperio-addons' );
        $user_contact['tz_dribbble'] = esc_attr__( 'dribbble', 'paperio-addons' );
        $user_contact['tz_soundcloud'] = esc_attr__( 'Soundcloud', 'paperio-addons' );
        $user_contact['tz_vimeo'] = esc_attr__( 'Vimeo', 'paperio-addons' );
        $user_contact['tz_flickr'] = esc_attr__( 'Flickr', 'paperio-addons' );

        return $user_contact;
    }
endif;
add_filter( 'user_contactmethods', 'paperio_modify_user_contact_methods' );

if ( ! function_exists( 'paperio_admin_panel_url' ) ) :
    function paperio_admin_panel_url( $panel, $id ) {
        if( $panel && $id ){
            $url = esc_url( add_query_arg(
                array(
                    array( 'autofocus' => array( $panel => $id ) ),
                    'url' => urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) )
                ),
                admin_url( 'customize.php' )
                ));
            return $url;
        } else {
            return;
        }
    }
endif;

if ( ! function_exists( 'paperio_admin_bar_custom_menu' ) ) :
    function paperio_admin_bar_custom_menu() {
        global $wp_admin_bar;

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-top-link',
            'title' => esc_html__( 'Paperio Settings', 'paperio-addons' ),
            'href'  => admin_url( 'customize.php' )
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-general-section',
            'title' => esc_html__( 'General Settings', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_general_section' ),
            'parent'=>'paperio-top-link'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-general-blog-panel',
            'title' => esc_html__( 'Blog Home Settings', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'panel', 'tz_add_general_blog_panel' ),
            'parent'=>'paperio-top-link'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-general-blog-section',
            'title' => esc_html__( 'Blog Settings', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_general_blog_section' ),
            'parent'=>'paperio-add-general-blog-panel'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-general-sticky-posts-section',
            'title' => esc_html__( 'Sticky Posts Settings', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_general_sticky_posts_section' ),
            'parent'=>'paperio-add-general-blog-panel'
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-header-panel',
            'title' => esc_html__( 'Header', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'panel', 'tz_add_header_panel' ),
            'parent'=>'paperio-top-link'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-header-section',
            'title' => esc_html__( 'Header', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_header_section' ),
            'parent'=>'paperio-add-header-panel'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-logo-section',
            'title' => esc_html__( 'Logo & Favicon', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_logo_section' ),
            'parent'=>'paperio-add-header-panel'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-social-icon-section',
            'title' => esc_html__( 'Social Icons', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_social_icon_section' ),
            'parent'=>'paperio-add-header-panel'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-search-section',
            'title' => esc_html__( 'Search', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_search_section' ),
            'parent'=>'paperio-add-header-panel'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-navigation-section',
            'title' => esc_html__( 'Navigations', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_navigation_section' ),
            'parent'=>'paperio-add-header-panel'
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-layout-section',
            'title' => esc_html__( 'Page Layout Settings', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'panel', 'tz_add_layout_section' ),
            'parent'=>'paperio-top-link'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-page-layout-panel',
            'title' => esc_html__( 'Page Layout Settings', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_page_layout_panel' ),
            'parent'=>'paperio-add-layout-section'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-post-layout-panel',
            'title' => esc_html__( 'Post Layout Settings', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_post_layout_panel' ),
            'parent'=>'paperio-add-layout-section'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-category-layout-panel',
            'title' => esc_html__( 'Category Layout Settings', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_category_layout_panel' ),
            'parent'=>'paperio-add-layout-section'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-archive-layout-panel',
            'title' => esc_html__( 'Archive Layout Settings', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_archive_layout_panel' ),
            'parent'=>'paperio-add-layout-section'
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-featured-area-section',
            'title' => esc_html__( 'Featured Area', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_featured_area_section' ),
            'parent'=>'paperio-top-link'
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-latest-popular-post-section',
            'title' => esc_html__( 'Latest/Popular Post Block', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_latest_popular_post_section' ),
            'parent'=>'paperio-top-link'
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-promotional-block-section',
            'title' => esc_html__( 'Promotional Block', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_promotional_block_section' ),
            'parent'=>'paperio-top-link'
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-footer-panel',
            'title' => esc_html__( 'Footer', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'panel', 'tz_add_footer_panel' ),
            'parent'=>'paperio-top-link'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-footer-style',
            'title' => esc_html__( 'Footer', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_footer_style' ),
            'parent'=>'paperio-add-footer-panel'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-footer-social',
            'title' => esc_html__( 'Footer Social Icon', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_footer_social' ),
            'parent'=>'paperio-add-footer-panel'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-footer-copyright',
            'title' => esc_html__( 'Footer Copyright', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_footer_copyright' ),
            'parent'=>'paperio-add-footer-panel'
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-page-not-found',
            'title' => esc_html__( '404 Page Setting', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_page_not_found' ),
            'parent'=>'paperio-top-link'
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-image-meta-data-section',
            'title' => esc_html__( 'Image Meta Data Settings', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_image_meta_data_section' ),
            'parent'=>'paperio-top-link'
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-social-share-section',
            'title' => esc_html__( 'Post Social Share Settings', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_social_share_section' ),
            'parent'=>'paperio-top-link'
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-color-panel',
            'title' => esc_html__( 'Font and Color Setting', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'panel', 'tz_add_color_panel' ),
            'parent'=>'paperio-top-link'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-general-font-family-section',
            'title' => esc_html__( 'Font Family', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_general_font_family_section' ),
            'parent'=>'paperio-add-color-panel'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-general-color-section',
            'title' => esc_html__( 'General', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_general_color_section' ),
            'parent'=>'paperio-add-color-panel'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-title-color-section',
            'title' => esc_html__( 'Title Wrapper', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_title_color_section' ),
            'parent'=>'paperio-add-color-panel'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-breadcrumb-color-section',
            'title' => esc_html__( 'Breadcrumb', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_breadcrumb_color_section' ),
            'parent'=>'paperio-add-color-panel'
        ));
        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-content-color-section',
            'title' => esc_html__( 'Content', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_content_color_section' ),
            'parent'=>'paperio-add-color-panel'
        ));

        $wp_admin_bar->add_menu( array(
            'id'    => 'paperio-add-under-maintenance-section',
            'title' => esc_html__( 'Under Maintenance Setting', 'paperio-addons' ),
            'href'  => paperio_admin_panel_url( 'section', 'tz_add_under_maintenance_section' ),
            'parent'=>'paperio-top-link'
        ));
    }
endif;
add_action( 'wp_before_admin_bar_render', 'paperio_admin_bar_custom_menu' );

if ( ! function_exists('paperio_sidebar_style_classes') ) {
    function paperio_sidebar_style_classes( $params ) {

        $tz_sidebar_style = get_theme_mod( 'tz_sidebar_style', 'sidebar-style1' );               
        $tz_widget_style_class = 'col-md-12 col-sm-12 col-xs-12 margin-sixteen-bottom xs-margin-ten-bottom';   
        $tz_widget_title_style_class = 'title-border-right no-background margin-ten-bottom';           
        
        switch( $tz_sidebar_style ) {
            
            case 'sidebar-style1':
                 $tz_widget_style_class .= ' no-padding-lr';
            break;

            case 'sidebar-style3':
                 $tz_widget_style_class .= ' bg-white';
            break;
        }

        $class = 'class="widget '.$tz_widget_style_class.' ';
        $class_title = 'class="widget-title font-weight-600 text-mid-gray text-uppercase '.$tz_widget_title_style_class;

        $params[0]['before_title'] = str_replace( '">', '"><span>', $params[0]['before_title'] );
        $params[0]['after_title'] = str_replace( '</', '</span></', $params[0]['after_title'] );
        
        $params[0]['before_widget'] = str_replace( 'class="widget ', $class, $params[0]['before_widget'] );
        $params[0]['before_title'] = str_replace( 'class="widget-title', $class_title, $params[0]['before_title'] );
        
        return $params;
    }
}

if( !function_exists( 'paperio_addon_sidebar_style_before' ) ) {
    function paperio_addon_sidebar_style_before() {

        add_filter( 'dynamic_sidebar_params', 'paperio_sidebar_style_classes' );
    }
}
add_action( 'paperio_sidebar_style_before', 'paperio_addon_sidebar_style_before' );

if( !function_exists( 'paperio_addon_sidebar_style_after' ) ) {
    function paperio_addon_sidebar_style_after() {

        remove_filter( 'dynamic_sidebar_params', 'paperio_sidebar_style_classes' );
    }
}
add_action( 'paperio_sidebar_style_after', 'paperio_addon_sidebar_style_after' );

if ( ! function_exists('paperio_footer_sidebar_style_classes') ) {
    function paperio_footer_sidebar_style_classes( $params ) {

        /* Check Footer Style */
        $tz_footer_style = get_theme_mod( 'tz_footer_style', 'footer-style-one' );
        if( $tz_footer_style == 'footer-style-one' ) {
            $params[0]['before_title'] = str_replace( '<h5 class="widget-title', '<h6 class="widget-title text-mid-gray text-uppercase font-weight-600 margin-bottom-25', $params[0]['before_title'] );
        } else {
            $params[0]['before_title'] = str_replace( '<h5 class="widget-title', '<h6 class="widget-title text-mid-gray text-uppercase font-weight-600 margin-bottom-25', $params[0]['before_title'] );
            $params[0]['after_title'] = str_replace( 'h5>', 'h6><div class="separator-line-two background-color width-50px margin-bottom-25"></div>', $params[0]['after_title'] );
        }
        
        return $params;
    }
}

if( !function_exists( 'paperio_addon_footer_sidebar_style_before' ) ) {
    function paperio_addon_footer_sidebar_style_before() {

        add_filter( 'dynamic_sidebar_params', 'paperio_footer_sidebar_style_classes' );
    }
}
add_action( 'paperio_footer_sidebar_style_before', 'paperio_addon_footer_sidebar_style_before' );

if( !function_exists( 'paperio_addon_footer_sidebar_style_after' ) ) {
    function paperio_addon_footer_sidebar_style_after() {

        remove_filter( 'dynamic_sidebar_params', 'paperio_footer_sidebar_style_classes' );
    }
}
add_action( 'paperio_footer_sidebar_style_after', 'paperio_addon_footer_sidebar_style_after' );

if( ! function_exists( 'paperio_remove_third_party_script_style_callback' ) ) {
    function paperio_remove_third_party_script_style_callback(){
        $tz_remove_font_awesome_style = get_theme_mod( 'tz_remove_font_awesome_style', 1 );
        if( $tz_remove_font_awesome_style ) {
            // Dequeue Font Awesome Style
            wp_deregister_style( 'font-awesome' );
            wp_dequeue_style( 'font-awesome' );
        }
    }
}
add_action( 'paperio_remove_third_party_script_style', 'paperio_remove_third_party_script_style_callback' );