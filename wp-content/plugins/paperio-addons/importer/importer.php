<?php
/**
 * Paperio import data.
 *
 * @package Paperio
 */
?>
<?php
    if( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    // Add new submenu for demo data install in Admin panel > Appereance

    function paperio_demo_import_callback() {

        global $title;

        $message = '';
        if( isset($_GET['show-message'])){
             $message = 'class="demo-show-message"';
            }else{
            $message = 'class="demo-hide-message"';
        }
        /* Check current user permission */
        if( !current_user_can( 'manage_options' ) ) {
            wp_die( __( 'You do not have sufficient permissions to access this page.', 'paperio-addons' ) );
        }
        /* Gets a WP_Theme object for a theme. */
        $tz_theme = wp_get_theme();

        $tz_theme_demos = array(
                            array(
                                'tz_theme_id'          => 'default',
                                'tz_theme_name'        => __( 'Default', 'paperio-addons' ),
                                'tz_theme_screenshot'  => PAPERIO_ADDONS_ROOT.'images/default.jpg',
                                'tz_theme_preview_url' => 'http://wpdemos.themezaa.com/paperio/default/',
                            ),
                            array(
                                'tz_theme_id'          => 'ameera',
                                'tz_theme_name'        => __( 'Ameera', 'paperio-addons' ),
                                'tz_theme_screenshot'  => PAPERIO_ADDONS_ROOT.'images/ameera.jpg',
                                'tz_theme_preview_url' => 'http://wpdemos.themezaa.com/paperio/ameera/',
                            ),
                            array(
                                'tz_theme_id'          => 'angela',
                                'tz_theme_name'        => __( 'Angela', 'paperio-addons' ),
                                'tz_theme_screenshot'  => PAPERIO_ADDONS_ROOT.'images/angela.jpg',
                                'tz_theme_preview_url' => 'http://wpdemos.themezaa.com/paperio/angela/',
                            ),
                            array(
                                'tz_theme_id'          => 'adelta',
                                'tz_theme_name'        => __( 'Adelta', 'paperio-addons' ),
                                'tz_theme_screenshot'  => PAPERIO_ADDONS_ROOT.'images/adelta.jpg',
                                'tz_theme_preview_url' => 'http://wpdemos.themezaa.com/paperio/adelta/',
                            ),
                            array(
                                'tz_theme_id'          => 'anchali',
                                'tz_theme_name'        => __( 'anchali', 'paperio-addons' ),
                                'tz_theme_screenshot'  => PAPERIO_ADDONS_ROOT.'images/anchali.jpg',
                                'tz_theme_preview_url' => 'http://wpdemos.themezaa.com/paperio/anchali/',
                            ),
                            array(
                                'tz_theme_id'          => 'aquilina',
                                'tz_theme_name'        => __( 'Aquilina', 'paperio-addons' ),
                                'tz_theme_screenshot'  => PAPERIO_ADDONS_ROOT.'images/aquilina.jpg',
                                'tz_theme_preview_url' => 'http://wpdemos.themezaa.com/paperio/aquilina/',
                            ),
                            array(
                                'tz_theme_id'          => 'amelie',
                                'tz_theme_name'        => __( 'Amelie', 'paperio-addons' ),
                                'tz_theme_screenshot'  => PAPERIO_ADDONS_ROOT.'images/amelie.jpg',
                                'tz_theme_preview_url' => 'http://wpdemos.themezaa.com/paperio/amelie/',
                            ),
                        );

        $tz_themezaa_demo_url = 'http://wpdemos.themezaa.com';
        echo '<div class="wrap">';
            echo '<h1>'.$title.'</h1>';
            echo '<div class="paperio-header">';
                echo '<div class="display_header">';
                    if( $tz_theme->get( 'Name' ) ) :
                        echo '<h2>'.$tz_theme->get( 'Name' ).'</h2>';
                    endif;
                    if( $tz_theme->get( 'Version' ) ) :
                        echo '<span>'.$tz_theme->get( 'Version' ).'</span>';
                    endif;
                echo '</div>';
                echo '<div class="paperio-head-right">';
                    echo '<a target="_blank" href="'.$tz_themezaa_demo_url.'/paperio/documentation/">'.__( 'Online Documentation', 'paperio-addons' ).'</a><span class="link_sep">|</span><a target="_blank" href="http://www.themezaa.com/support.php">'.__( 'Support Center', 'paperio-addons' ).'</a></div>';
                echo '<div class="clear"></div>';
            echo '</div>';
            echo '<div id="run-regenerate-thumbnails" '.$message.'>';
                echo '<div class="paperio-importer-notice">';
                    echo '<p><strong>'.__( 'Demo data successfully imported. Now, please install and run', 'paperio-addons').' <a title="' . __( 'Regenerate Thumbnails', 'paperio-addons' ) . '" class="thickbox" href="'.admin_url( 'plugin-install.php?tab=plugin-information&amp;plugin=regenerate-thumbnails&amp;TB_iframe=true&amp;width=830&amp;height=472' ).'">'. __( 'Regenerate Thumbnails', 'paperio-addons' ).'</a> '. __( 'plugin once.', 'paperio-addons' ).'</strong>';
                    echo '</p>';
                echo '</div>';
            echo '</div>';
            echo '<div class="import-content">';
                echo '<h2>'.__( 'Import Demo Content', 'paperio-addons' ).'</h2>';
                echo '<p>'.__( 'Import demo content data including posts, pages, theme customizer, widgets, images, sliders etc... It may take several minutes, so please have some patience.', 'paperio-addons' ).'</p>';
                echo '<h2>'.__( 'Demo Import Requirements', 'paperio-addons' ).'</h2>';
                echo '<ul class="import-export-desc">';
                    echo '<li><i class="fas fa-check"></i>'.__( 'Memory Limit of 256 MB and max execution time (php time limit) of 300 seconds.', 'paperio-addons' ).'</li>';
                    echo '<li><i class="fas fa-check"></i>'.__( 'Paperio Addon must be activated for Shortcodes to work.', 'paperio-addons' ).'</li>';
                echo '</ul>';
            echo '</div>';

            if( paperio_is_theme_licence_active() ) {
            echo '<ul class="import-export-theme">';
                foreach ( $tz_theme_demos as $demo_key => $demo_value ) {
                    echo '<li>';
                        echo '<div class="theme-wrapper">';
                            echo '<div class="theme-screenshot"><img src="'.$demo_value['tz_theme_screenshot'].'"></div>';
                            echo '<h3 class="theme-name">'.$demo_value['tz_theme_name'].'</h3>';
                            echo '<div class="theme-actions">';
                                echo '<div class="import-loader-img hidden"><i class="dashicons dashicons-admin-generic fa-spin"></i></div>';
                                echo '<a id="paperio-import-'. $demo_value['tz_theme_id'] .'" href="javascript:void(0)" data-demo-import="'.$demo_value['tz_theme_id'].'" class="paperio-import button button-primary">'.__( 'Install', 'paperio-addons' ).'</a>';
                                echo '<a href="'.$demo_value['tz_theme_preview_url'].'" target="_blank" class="button button-primary">'.__( 'Preview', 'paperio-addons' ).'</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</li>';
                }
            echo '</ul>';
            } else {
            echo '<div class="demo-licence-not-activated import-content">';
                echo '<div class="licence-not-activated"><i class="fas fa-info-circle"></i><span>'.__( 'Please activate your Paperio theme license copy to enjoy premium feature of demo data import.', 'paperio-addons' ).'</span></div><br>';
                echo '<a class="paperio-demo-import-licence" href="'.admin_url( 'themes.php?page=paperio-licence-activation' ).'">'.__( 'Activate Paperio WordPress Theme License', 'paperio-addons' ).'</a>';
            echo '</div>';
            
            }
        echo '</div>';
        echo '<div class="import-ajax-message"></div>';

        $default_checked = '';
        $default_checked = get_option( 'paperio_theme_import_option' );
        $default_checked = empty( $default_checked ) ? ' checked="checked "' : '';
        
        echo '<div class="paperio-popup hidden paperio-import-data-popup" data-popup="paperio-popup">';
                echo '<div class="paperio-popup-inner">';
                    echo '<form id="export-filters" method="get">';
                        echo '<fieldset>';
                            echo '<legend class="screen-reader-text">' . __( 'Content to export', 'paperio-addons' ) . '</legend>';
                            echo '<h3>Import <span class="paperio-demo-option-name"></span>Demo Content</h3>';
                            echo '<ul class="paperio-import-choice-all">';
                                echo '<li>';
                                    echo '<label><input type="checkbox" '. $default_checked .' class="paperio-checkbox-all" value="all" >' . __( 'All Content', 'paperio-addons' ) . '</label>';
                                    echo '<span class="description">' . __( 'This will contain all of your posts, pages & media.', 'paperio-addons' ) . '</span>';
                                echo '</li>';
                            echo '</ul>';
                            echo '<ul class="paperio-import-choice">';
                                echo '<li>';
                                    echo '<label><input type="checkbox" '. $default_checked .' class="paperio-checkbox" value="nav_menu_item" >' . __( 'Navigation Menu', 'paperio-addons' ) . '</label>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<label><input type="checkbox" '. $default_checked .' class="paperio-checkbox" value="posts" >' . __( 'Posts', 'paperio-addons' ) . '</label>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<label><input type="checkbox" '. $default_checked .' class="paperio-checkbox" value="pages" >' . __( 'Pages', 'paperio-addons' ) . '</label>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<label><input type="checkbox" '. $default_checked .' class="paperio-checkbox" value="attachment" >' . __( 'Media', 'paperio-addons' ) . '</label>';
                                echo '</li>';
                                 echo '<li>';
                                    echo '<label><input type="checkbox" '. $default_checked .' class="paperio-checkbox" value="customize" >' . __( 'Customizer', 'paperio-addons' ) . '</label>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<label><input type="checkbox" '. $default_checked .' class="paperio-checkbox" value="contact_form" >' . __( 'Contact Form', 'paperio-addons' ) . '</label>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<label><input type="checkbox" '. $default_checked .' class="paperio-checkbox" value="widgets" >' . __( 'Widgets', 'paperio-addons' ) . '</label>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<label><input type="checkbox" '. $default_checked .' class="paperio-checkbox" value="mail_chimp" >' . __( 'Mailchimp Form', 'paperio-addons' ) . '</label>';
                                echo '</li>';
                            echo '</ul>';
                            echo '<p class="submit">';
                                echo '<input type="hidden" name="paperio_demo_setup_key" id="paperio_demo_setup_key"/>';
                                echo '<input type="button" value="' . __( 'Import', 'paperio-addons' ) . '" class="button button-primary" id="paperio_demo_setup_submit" name="submit">';
                            echo '</p>';
                        echo '</fieldset>';
                    echo '</form>';
                    echo '<a class="paperio-popup-close" data-popup-close="paperio-popup" href="#">x</a>';
                echo '</div>';
            echo '</div>';
    }

    // Don't resize images for import
    if ( ! function_exists( 'paperio_no_image_resize' ) ) :
        function paperio_no_image_resize( $sizes ) {
            return array();
        }
    endif;

    // Hook For Import Sample Data And Log Messages.
    add_action( 'wp_ajax_paperio_import_sample_data', 'paperio_import_sample_data' );
    add_action( 'wp_ajax_paperio_refresh_import_log', 'paperio_refresh_import_log' );

    if ( ! function_exists( 'paperio_import_sample_data' ) ) :
        function paperio_import_sample_data() {
            global $wpdb;
            if ( current_user_can( 'manage_options' ) ) {

                /* Load WP Importer */
                if ( !defined( 'WP_LOAD_IMPORTERS' ) ) define( 'WP_LOAD_IMPORTERS', true );

                /* Check if main importer class doesn't exist */
                if ( ! class_exists( 'WP_Importer' ) ) {
                    $wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
                    include $wp_importer;
                }

                // if WP importer doesn't exist
                if ( ! class_exists('WP_Import') ) {
                    $wp_import = PAPERIO_ADDONS_IMPORT . '/wordpress-importer.php';
                    include $wp_import;
                }

                if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) { // check for main import class and wp import class.

                    paperio_import_log('', false);

                    if( !empty( $_POST['import_options'] ) && !empty( $_POST['setup_key'] ) ) {

                        $import_options = $_POST['import_options'];                        
                        $setup_key      = $_POST['setup_key'];
                      
                        add_filter( 'intermediate_image_sizes_advanced', 'paperio_no_image_resize' );
                        
                        foreach($import_options as $import_option) {

                            if( $import_option == 'widgets' ) {

                                // Sidebar Widgets Json File.
                                $widgets_file = dirname( __FILE__ ) . '/sample-data/' . $setup_key . '/widget_data.json';
                               
                                if( isset( $widgets_file ) && $widgets_file ) {

                                    // Add data to widgets
                                    paperio_import_log('MESSAGE - Before Import Widget Clear All Widgetarea Start.');
                                    $sidebars = wp_get_sidebars_widgets();

                                    unset($sidebars['wp_inactive_widgets']);

                                    foreach ( $sidebars as $sidebar => $widgets ) {
                                        
                                        $sidebars[$sidebar] = array();
                                    }

                                    $sidebars['wp_inactive_widgets'] = array();
                                    wp_set_sidebars_widgets( $sidebars );
                                    paperio_import_log('MESSAGE - Before Import Widget Clear All Widgetarea End.');

                                    $widgets_json = $widgets_file; // widgets data file
                                    $widgets_json = file_get_contents( $widgets_json );
                                    $widget_data = $widgets_json;
                                    paperio_import_log('MESSAGE - Import Widget Setting Start.');
                                    $import_widgets = paperio_import_widget_sample_data( $widget_data );
                                }

                            } 
                            else if( $import_option == 'customize' ) {

                                 // Import Theme Customize file.
                                $theme_options_file = dirname( __FILE__ ) . '/sample-data/' . $setup_key . '/customizer_export.json';

                                $remove_options = json_decode(get_theme_mods());
                                    
                                paperio_import_log('MESSAGE - Before Import Customize Clear All Customize Clear Start.');
                                foreach ( $remove_options as $key => $value ) {                                           
                                    remove_theme_mod( $key );
                                }
                                paperio_import_log('MESSAGE - Before Import Customize Clear All Customize Clear End.');
                                /* Save new settings */
                                paperio_import_log('MESSAGE - Import Customize Setting Start.');
                                $encode_options = file_get_contents( $theme_options_file );
                                $options = json_decode( $encode_options, true );
                                foreach ( $options as $key => $value ) {                                     
                                    set_theme_mod( $key, $value );
                                }
                                paperio_import_log('MESSAGE - Import Customize Setting End.');

                                /* when customizer import, menu id can't change */
                                $locations = get_theme_mod( 'nav_menu_locations' );
                                // registered menus
                                $menus = wp_get_nav_menus();
                                // assign menus to theme locations
                                if($menus) {
                                    foreach($menus as $menu) {
                                        if( $menu->name == 'Main menu' ) {
                                            $locations['paperiomegamenu'] = $menu->term_id;
                                        }
                                    }
                                }
                                // set menus to locations
                                set_theme_mod( 'nav_menu_locations', $locations );

                           } else {

                                // Sample Data Zip.
                                $sample_data_xml = dirname( __FILE__ ) . '/sample-data/' . $setup_key . '/' . $import_option . '.xml';
                                // Import Sample Data XML.
                                $importer = new WP_Import();
                                // Import Posts, Pages, media & Navigation Menu
                                $importer->fetch_attachments = true;
                                ob_start();
                                paperio_import_log('MESSAGE - ' . ucfirst($import_option) . '.xml Import Start.');
                                $importer->import($sample_data_xml);
                                ob_end_clean();
                                paperio_import_log('MESSAGE - ' . ucfirst($import_option) . '.xml Import End');

                                if( $import_option == 'posts' ) {
                                    // Add Custom Color in pa_colors taxonomy
                                    paperio_import_log('MESSAGE - Set Post Category Attribute Start.');
                                    $post_cat_exist = taxonomy_exists( 'category');
                                    if ( $post_cat_exist ) {
                                        $attribute_cat_term = get_terms( 'category');
                                        
                                        $attribute_cat = paperio_csv_to_array(dirname( __FILE__ ) . '/sample-data/' . $setup_key . '/attribute_posts.csv');
                                        foreach ($attribute_cat as $attribute => $category) {

                                            $term_cat = get_term_by( 'slug', $category['postslug'], 'category' );
                                            $empty_array = array();
                                            $empty_array['tz_general_category_type'] = $category['cat_type'];
                                            $empty_array['tz_general_category_column_type'] = $category['col_type'];
                                            $empty_array['tz_layout_settings_single_category'] = $category['sidebar_set'];
                                            $empty_array['tz_layout_left_sidebar_single_category'] = $category['left_sidebar'];
                                            $empty_array['tz_layout_right_sidebar_single_category'] = $category['right_sidebar'];
                                            $empty_array['tz_enable_container_fluid_single_category'] = $category['container_fluid'];
                                            $empty_array['tz_category_breadcrumb_title'] = $category['breadcrumb_title'];
                                      
                                            update_option( 'taxonomy_'.$term_cat->term_id, $empty_array );
                                        }                                        
                                    }
                                    paperio_import_log('MESSAGE - Set Post Category Attribute End.');
                                }
                                if( $import_option == 'nav_menu_item' ){
                                    // registered menu locations in theme
                                    $locations = get_theme_mod( 'nav_menu_locations' );
                                    // registered menus
                                    $menus = wp_get_nav_menus();
                                    paperio_import_log('MESSAGE - Import Menu Location Start.');
                                    // assign menus to theme locations
                                    if($menus) {
                                        foreach($menus as $menu) {
                                            if( $menu->name == 'Main menu' ) {
                                                $locations['paperiomegamenu'] = $menu->term_id;
                                            }
                                        }
                                    }
                                    // set menus to locations
                                    set_theme_mod( 'nav_menu_locations', $locations );
                                    paperio_import_log('MESSAGE - Import Menu Location End.');
                                }
                            }
                        }
                        update_option( 'paperio_theme_import_option', 1 );

                    }

                    exit;
                }else{
                    paperio_import_log('ERROR - Importer can\'t load WP_Importer or WP_Import class not exists');
                    return false;
                }

            }
        }
    endif;

    // For More Info Check Widget Import Plugin ( http://wordpress.org/plugins/widget-settings-importexport/ )
    if( ! ( function_exists( 'paperio_import_widget_sample_data' ) ) ):
        function paperio_import_widget_sample_data( $widget_data ) {
            $json_data = $widget_data;
            $json_data = json_decode( $json_data, true );

            $sidebar_data = $json_data[0];
            $widget_data = $json_data[1];

            foreach ( $widget_data as $widget_title => $widget_value ) {
                foreach ( $widget_value as $widget_key => $widget_value ) {
                    $widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
                }
            }
            
            $sidebar_data = array( array_filter( $sidebar_data ), $widgets );

            paperio_parse_import_widget_sample_data( $sidebar_data );

        }
    endif;

    if( ! ( function_exists( 'paperio_parse_import_widget_sample_data' ) ) ):
        function paperio_parse_import_widget_sample_data( $import_array ) {
            global $wp_registered_sidebars;
            $sidebars_data = $import_array[0];
            $widget_data = $import_array[1];
            $current_sidebars = get_option( 'sidebars_widgets' );
            $new_widgets = array( );

            foreach ( $sidebars_data as $import_sidebar => $import_widgets ) :

                foreach ( $import_widgets as $import_widget ) :
                    //if the sidebar exists
                    if ( isset( $wp_registered_sidebars[$import_sidebar] ) ) :
                        $title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
                        $index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
                        $current_widget_data = get_option( 'widget_' . $title );
                        $new_widget_name = paperio_get_new_widget_name( $title, $index );
                        $new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

                        if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
                            while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
                                $new_index++;
                            }
                        }
                        $current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
                        if ( array_key_exists( $title, $new_widgets ) ) {
                            $new_widgets[$title][$new_index] = $widget_data[$title][$index];
                            $multiwidget = $new_widgets[$title]['_multiwidget'];
                            unset( $new_widgets[$title]['_multiwidget'] );
                            $new_widgets[$title]['_multiwidget'] = $multiwidget;
                        } else {
                            $current_widget_data[$new_index] = $widget_data[$title][$index];
                            $current_multiwidget = isset($current_widget_data['_multiwidget']) ? $current_widget_data['_multiwidget'] : false;
                            $new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
                            $multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
                            unset( $current_widget_data['_multiwidget'] );
                            $current_widget_data['_multiwidget'] = $multiwidget;
                            $new_widgets[$title] = $current_widget_data;
                        }

                    endif;
                endforeach;
            endforeach;

            if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
                update_option( 'sidebars_widgets', $current_sidebars );

                foreach ( $new_widgets as $title => $content ){
                    update_option( 'widget_' . $title, $content );
                }
                paperio_import_log('MESSAGE - Import Widget Setting End.');
                return true;
            }
            paperio_import_log('NOTICE - Import Widget Setting Not Completed.');
            return false;
        }
    endif;

    if( ! ( function_exists( 'paperio_get_new_widget_name' ) ) ):
        function paperio_get_new_widget_name( $widget_name, $widget_index ) {
            $current_sidebars = get_option( 'sidebars_widgets' );
            $all_widget_array = array( );
            foreach ( $current_sidebars as $sidebar => $widgets ) {
                if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
                    foreach ( $widgets as $widget ) {
                        $all_widget_array[] = $widget;
                    }
                }
            }
            while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
                $widget_index++;
            }
            $new_widget_name = $widget_name . '-' . $widget_index;
            return $new_widget_name;
        }
    endif;

    // Function To Add Paperio Import Log.
    if( ! ( function_exists( 'paperio_import_log' ) ) ):
        function paperio_import_log($message, $append = true) {
            $upload_dir = wp_upload_dir();            
            if (isset($upload_dir['baseurl'])) {
                
                $data = '';
                if (!empty($message)) {
                    $data = "<p>".date("Y-m-d H:i:s").' - '.$message."</p>";
                }
                
                if ($append === true) {
                    file_put_contents($upload_dir['basedir'].'/importer.log', $data, FILE_APPEND);
                    file_put_contents($upload_dir['basedir'].'/importer-full.log', $data, FILE_APPEND);
                } else {
                    file_put_contents($upload_dir['basedir'].'/importer.log', $data);
                    
                }
            }
        }
    endif;

    // Function To Get Paperio Import Log.
    if( ! ( function_exists( 'get_paperio_import_log' ) ) ):
        function get_paperio_import_log() {            
            $upload_dir = wp_upload_dir();           
            if (isset($upload_dir['baseurl'])) {
                
                if (file_exists($upload_dir['basedir'].'/importer.log')) {
                    return file_get_contents($upload_dir['basedir'].'/importer.log');
                }
            }
            return '';
        }
    endif;

    // Ajax Function To Check Refresh Import Logs.
    if( ! ( function_exists( 'paperio_refresh_import_log' ) ) ):
        function paperio_refresh_import_log() {
          
            $check_paperio_log = get_paperio_import_log();
            //don't add message if ERROR was found, JS script is going to stop refreshing
            if( strpos( $check_paperio_log, 'ERROR' ) === false ) { 
                paperio_import_log('MESSAGE - Import in progress...');
            }
            $printlog = get_paperio_import_log();
            echo $printlog;
            die();
        }
    endif;


    /* To Read Posts Category Attributes */
if( ! ( function_exists( 'paperio_csv_to_array' ) ) ):
    function paperio_csv_to_array( $filename='', $delimiter=',' ) {
        if( !file_exists( $filename ) || !is_readable( $filename ) )
            return FALSE;
        
        $header = NULL;
        $data = array();
        if( ( $handle = fopen( $filename, 'r' ) ) !== FALSE ) {
            while( ( $row = fgetcsv( $handle, 1000, $delimiter ) ) !== FALSE ) {
                if(!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine( $header, $row );
                }
            }
            fclose( $handle );
        }
        return $data;
    }
endif;