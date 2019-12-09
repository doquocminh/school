<?php
/**
 * This file use for define custom function
 * Also include required files.
 *
 * @package Paperio
 */

/*
 *	Paperio Theme namespace.
 */

define( 'PAPERIO_THEME_VERSION', '1.7' );
define( 'PAPERIO_ADDONS_VERSION', '1.7' );

/*
 *	Paperio Theme Folders
 */

define( 'PAPERIO_THEME_DIR',         				get_template_directory() );
define( 'PAPERIO_THEME_TEMPLATE',         			PAPERIO_THEME_DIR . '/templates' );	
define( 'PAPERIO_THEME_LANGUAGES',   				PAPERIO_THEME_DIR . '/languages' );
define( 'PAPERIO_THEME_ASSETS',      				PAPERIO_THEME_DIR . '/assets' );
define( 'PAPERIO_THEME_JS',         				PAPERIO_THEME_ASSETS . '/js' );
define( 'PAPERIO_THEME_CSS',        				PAPERIO_THEME_ASSETS . '/css' );
define( 'PAPERIO_THEME_IMAGES',      				PAPERIO_THEME_ASSETS . '/images' );
define( 'PAPERIO_THEME_ADMIN_JS',    				PAPERIO_THEME_JS . '/admin' );
define( 'PAPERIO_THEME_ADMIN_CSS',    				PAPERIO_THEME_CSS . '/admin' );
define( 'PAPERIO_THEME_LIB',         				PAPERIO_THEME_DIR . '/lib' );
define( 'PAPERIO_THEME_CUSTOMIZER',     			PAPERIO_THEME_LIB . '/customizer' );
define( 'PAPERIO_THEME_CUSTOMIZER_MAPS',     		PAPERIO_THEME_CUSTOMIZER . '/customizer-maps' );
define( 'PAPERIO_THEME_MEGA_MENU',      			PAPERIO_THEME_LIB . '/mega-menu' );
define( 'PAPERIO_THEME_TGM',         				PAPERIO_THEME_LIB . '/tgm' );

/*
 *  Paperio Theme Folder URI
 */
define( 'PAPERIO_THEME_URI',             			get_template_directory_uri() );
define( 'PAPERIO_THEME_TEMPLATE_URI',         		PAPERIO_THEME_URI . '/templates' );
define( 'PAPERIO_THEME_LANGUAGES_URI',   			PAPERIO_THEME_URI . '/languages' );
define( 'PAPERIO_THEME_ASSETS_URI',      			PAPERIO_THEME_URI     . '/assets' );
define( 'PAPERIO_THEME_JS_URI',          			PAPERIO_THEME_ASSETS_URI . '/js' );
define( 'PAPERIO_THEME_CSS_URI',         			PAPERIO_THEME_ASSETS_URI . '/css' );
define( 'PAPERIO_THEME_IMAGES_URI',      			PAPERIO_THEME_ASSETS_URI . '/images' );
define( 'PAPERIO_THEME_ADMIN_JS_URI',    			PAPERIO_THEME_JS_URI . '/admin' );
define( 'PAPERIO_THEME_ADMIN_CSS_URI',    			PAPERIO_THEME_CSS_URI . '/admin' );
define( 'PAPERIO_THEME_LIB_URI',         			PAPERIO_THEME_URI . '/lib' );
define( 'PAPERIO_THEME_CUSTOMIZER_URI',     		PAPERIO_THEME_LIB_URI . '/customizer' );
define( 'PAPERIO_THEME_CUSTOMIZER_MAPS_URI',    	PAPERIO_THEME_CUSTOMIZER_URI . '/customizer-maps' );
define( 'PAPERIO_THEME_MEGA_MENU_URI',  			PAPERIO_THEME_LIB_URI . '/mega-menu' );
define( 'PAPERIO_THEME_TGM_URI',        			PAPERIO_THEME_LIB_URI . '/tgm' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'paperio_theme_setup' ) ) :
	function paperio_theme_setup() {
		
		/*
		 *   Text Domain
		 */

		load_theme_textdomain( 'paperio', get_template_directory() . '/languages' );

		/*
		 * To add default posts and comments RSS feed links to theme head.
		 */

		add_theme_support( 'automatic-feed-links' );
	    
	    /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */

		add_theme_support( 'title-tag' );


		/**
		 * Custom image sizes for posts, pages, gallery, slider.
		 */

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 771 );
		add_image_size( 'paperio-medium-thumb', 420, '', true );
		add_image_size( 'paperio-popular-posts-thumb', 81, '', true );

		add_theme_support( 'custom-header', apply_filters( 'paperio_custom_header_args', array(
	        'width'                  => 1920,
	        'height'                 => 170,
	        'wp-head-callback'       => 'paperio_header_style_callback',
    	) ) );

		// Set Custom Body Background
		add_theme_support( 'custom-background' );
		/*
		 * Register menu for Paperio theme.
		 */

		register_nav_menus( array(
			'paperiomegamenu' => esc_html__( 'Paperio Mega Menu', 'paperio' ),
		) );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		 
		add_theme_support( 'post-formats', array(
			'image', 'gallery', 'video', 'audio', 'quote',
		) );

		/*
		 * Add custom stylesheet file to the TinyMCE editor within the Post/Page edit screen.
		 */
		add_editor_style( PAPERIO_THEME_CSS_URI.'/editor-style.css' );

		/******************* gutenberg support *************************/

		// Default block styles
		add_theme_support( 'wp-block-styles' );

		//Wide Alignment
		add_theme_support( 'align-wide' );

		// default editor style
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		$tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
		$theme_colors = array();

		if ( $tz_theme_type == 'theme-orange' ) {
			$theme_colors = array(
				'name' => __( 'Orange', 'paperio' ),
	            'slug' => 'orange',
	            'color' => '#f77a52',
			);
		} elseif ( $tz_theme_type == 'theme-magenta' ) {
			$theme_colors = array(
				'name' => __( 'Blue', 'paperio' ),
	            'slug' => 'magenta',
	            'color' => '#0b55be',
			);
		} elseif ( $tz_theme_type == 'theme-deep-green' ) {
			$theme_colors = array(
				'name' => __( 'Deep green', 'paperio' ),
	            'slug' => 'deep-green',
	            'color' => '#92ab82',
			);
		} elseif ( $tz_theme_type == 'theme-turquoise-blue' ) {
			$theme_colors = array(
				'name' => __( 'Turquoise blue', 'paperio' ),
	            'slug' => 'turquoise-blue',
	            'color' => '#79ceb9',
			);
		} elseif ( $tz_theme_type == 'theme-fast-red' ) {
			$theme_colors = array(
				'name' => __( 'Fast red', 'paperio' ),
	            'slug' => 'fast-red',
	            'color' => '#fb4055',
			);
		} else {
			$theme_colors = array(
				'name' => __( 'Yellow', 'paperio' ),
	            'slug' => 'yellow',
	            'color' => '#edbd27',
			);
		}
		
		// Editor color palette.
		add_theme_support( 'editor-color-palette', array(
	        $theme_colors,
	        array(
	            'name' => __( 'Dark gray', 'paperio' ),
	            'slug' => 'dark-gray',
	            'color' => '#232323',
	        ),
	        array(
	            'name' => __( 'Light gray', 'paperio' ),
	            'slug' => 'light-gray',
	            'color' => '#f7f7f7',
	        ),
	        array(
	            'name' => __( 'Black', 'paperio' ),
	            'slug' => 'black',
	            'color' => '#000000',
	        ),
	    ) );

	    // Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'paperio' ),
					'shortName' => __( 'S', 'paperio' ),
					'size'      => 12,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'paperio' ),
					'shortName' => __( 'M', 'paperio' ),
					'size'      => 13,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'paperio' ),
					'shortName' => __( 'L', 'paperio' ),
					'size'      => 16,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'paperio' ),
					'shortName' => __( 'XL', 'paperio' ),
					'size'      => 23,
					'slug'      => 'huge',
				),
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'paperio_theme_setup' );

/*
 *  Content Width (Set the content width based on the theme's design and stylesheet.)
 */
if ( ! function_exists( 'paperio_content_width' ) ) :
	function paperio_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'paperio_content_width', 1200 );
	}
endif;
add_action( 'after_setup_theme', 'paperio_content_width', 0 );

/**
 * Register Paperio theme required widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 *
 */
if ( ! function_exists( 'paperio_widgets_init' ) ) :
	function paperio_widgets_init() {

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'paperio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'paperio' ),
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Menu Banner 1', 'paperio' ),
			'id'            => 'menu-banner1',
			'description'   => esc_html__( 'Appear in menu.', 'paperio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Menu Banner 2', 'paperio' ),
			'id'            => 'menu-banner2',
			'description'   => esc_html__( 'Appear in menu.', 'paperio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Content Bottom 1', 'paperio' ),
			'id'            => 'left-sidebar',
			'description'   => esc_html__( 'Appears at the bottom of the content on posts and pages.', 'paperio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Content Bottom 2', 'paperio' ),
			'id'            => 'right-sidebar',
			'description'   => esc_html__( 'Appears at the bottom of the content on posts and pages.', 'paperio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 1', 'paperio' ),
			'id'            => 'footer-sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'paperio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 2', 'paperio' ),
			'id'            => 'footer-sidebar-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'paperio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 3', 'paperio' ),
			'id'            => 'footer-sidebar-3',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'paperio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Custom Sidebar 1', 'paperio' ),
			'id'            => 'custom-sidebar-1',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Custom Sidebar 2', 'paperio' ),
			'id'            => 'custom-sidebar-2',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Custom Sidebar 3', 'paperio' ),
			'id'            => 'custom-sidebar-3',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Custom Sidebar 4', 'paperio' ),
			'id'            => 'custom-sidebar-4',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Custom Sidebar 5', 'paperio' ),
			'id'            => 'custom-sidebar-5',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );
	}
endif;
add_action( 'widgets_init', 'paperio_widgets_init' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 */
if ( ! function_exists( 'paperio_javascript_detection' ) ) :
	function paperio_javascript_detection() {
		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
	}
endif;
add_action( 'wp_head', 'paperio_javascript_detection', 0 );

if( file_exists( PAPERIO_THEME_LIB . '/paperio-require-files.php' ) ) :
	require_once( PAPERIO_THEME_LIB . '/paperio-require-files.php');
endif;