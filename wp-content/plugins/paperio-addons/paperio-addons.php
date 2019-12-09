<?php
/*
Plugin Name: Paperio Addons
Plugin URI: http://www.themezaa.com
Description: A part of Paperio theme
Version: 1.7
Author: Themezaa Team
Author URI: http://www.themezaa.com
Text Domain: paperio-addons
*/

?>
<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Define constant */
	defined( 'PAPERIO_ADDONS_DIR_ROOT' ) or define( 'PAPERIO_ADDONS_DIR_ROOT', plugin_dir_path( __FILE__ ) );
	defined( 'PAPERIO_ADDONS_IMPORT' ) or define( 'PAPERIO_ADDONS_IMPORT', plugin_dir_path( __FILE__ ).'importer');
	defined( 'PAPERIO_ADDONS_ROOT' ) or define( 'PAPERIO_ADDONS_ROOT', plugin_dir_url( __FILE__ ) );


	if( !class_exists( 'Paperio_Addons' ) ) {
		class Paperio_Addons {
	    	
	    	// Construct
	    	public function __construct() {
	    		add_action( 'plugins_loaded', array( $this, 'paperio_addons_load_plugin_textdomain' ) );
				add_action( 'admin_init', array( $this, 'paperio_addon_init' ) );
				add_action( 'admin_menu', array( $this, 'paperio_demo_import_page' ) );
				add_action( 'admin_init', array( $this, 'paperio_addons_import' ) );

				/* For Customizer */
				add_action( 'setup_theme', array( $this, 'paperio_addons_add_customizer_sections_init' ) );
				

				/* Meta box */
				require_once( PAPERIO_ADDONS_DIR_ROOT.'/meta-box/meta-box.php' );
				/* Widget */
				require_once( PAPERIO_ADDONS_DIR_ROOT.'/widgets/paperio-about-me.php' );
		      	require_once( PAPERIO_ADDONS_DIR_ROOT.'/widgets/paperio-ads.php' );
		      	require_once( PAPERIO_ADDONS_DIR_ROOT.'/widgets/paperio-favourite-quotes.php' );
		      	require_once( PAPERIO_ADDONS_DIR_ROOT.'/widgets/paperio-follow-us.php' );
		      	require_once( PAPERIO_ADDONS_DIR_ROOT.'/widgets/paperio-instagram.php' );
		      	require_once( PAPERIO_ADDONS_DIR_ROOT.'/widgets/paperio-popular-post.php' );
		      	require_once( PAPERIO_ADDONS_DIR_ROOT.'/widgets/paperio-recent-menu-post.php' );
		      	require_once( PAPERIO_ADDONS_DIR_ROOT.'/widgets/paperio-twitter.php' );
		      	require_once( PAPERIO_ADDONS_DIR_ROOT.'/extend-options/extend-options.php' );
		      	require_once( PAPERIO_ADDONS_DIR_ROOT.'/extend-options/paperio-post-like.php' );

				// Load All Shortcodes For Paperio Theme.
				$this->theme_required_shortcodes_files_load();
			}

			/* Load plugin textdomain. */
		    public function paperio_addons_load_plugin_textdomain() {
		      load_plugin_textdomain( 'paperio-addons', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
		    }

			public function paperio_addon_init() {

				/* Check current user has capability or role. */
	    		if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
					return;
				}

				/* Check if Rich Editor mode is true / false */
				if ( 'true' == get_user_option( 'rich_editing' ) ) {
					add_filter( 'mce_external_plugins', array( $this, 'paperio_mce_custom_elements' ) );
					add_filter( 'mce_buttons', array( $this, 'paperio_register_mce_button' ) );
				}
			}
			public function paperio_mce_custom_elements( $plugin_array ) {
				/* Custom JS For all Custom Elements .*/
				$plugin_array['paperio_elements'] = PAPERIO_ADDONS_ROOT .'js/paperio-custom.js';	
				return $plugin_array;
			}

			public function paperio_register_mce_button( $buttons ) {
				/* This is required array element. don't change it */
				$elements = array( 'elements' );
				if( !empty( $elements ) ) {
					foreach( $elements as $key => $element_item ) {
						$string = 'paperio_'.$element_item;
						array_push( $buttons, $string );
					}
				}
				return $buttons;
			}
			public function theme_required_shortcodes_files_load() {
      		    $fileName = array( 'promotional-block', 'image-with-caption', 'text-block', 'blockquote', 'button', 'dropcap', 'heading', 'separator', 'title-style' );
	      		if( is_array( $fileName ) ) {
	    		   	foreach( $fileName as $file ) {
	    		   		$tz_file_path = PAPERIO_ADDONS_DIR_ROOT . 'shortcodes/paperio-'. $file .'.php';
	    		   		if( file_exists( $tz_file_path ) ) {
						    require_once( $tz_file_path );
						} else {
						    echo sprintf( __( 'The file %s does not exist', 'paperio-addons' ) , $file );
						}
	    		   	}
			   	} else {
		            throw new Exception( __( 'File is not found in folder as you given', 'paperio-addons' ) );
		        }
	    	}
	    	public function paperio_addons_import() {
		      require_once( PAPERIO_ADDONS_IMPORT .'/importer.php'); 
		    }
		    public function paperio_demo_import_page() {
		        add_theme_page(
		                __( 'Demo Import', 'paperio-addons' ), // page title
		                __( 'Demo Import', 'paperio-addons' ), // menu title
		                'manage_options',               	   // capability
		                'paperio-demo-import',                 // menu slug
		                'paperio_demo_import_callback'         // callback function
		        );
		    }

		    public function paperio_addons_add_customizer_sections_init() {
				add_action( 'customize_register', array( $this, 'paperio_addons_add_customizer_sections' ) );
		    }
		    public function paperio_addons_add_customizer_sections( $wp_customize ) {

				/* Add General layout Section */

			    $wp_customize->add_section( 'tz_add_under_maintenance_section', array(
					'title' 	 => esc_attr__( 'Under Maintenance Setting', 'paperio-addons' ),
					'capability' => 'manage_options',
					'priority'	 => 200
				) );

			    require_once( PAPERIO_ADDONS_DIR_ROOT.'/customizer/under-maintenance-settings.php' );
		    }
		} // end of class

		$Paperio_Addons = new Paperio_Addons();	

	} // end of class_exists