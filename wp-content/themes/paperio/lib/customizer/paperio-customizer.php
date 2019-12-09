<?php
/* Defind Class */
 
if( !class_exists( 'Paperio_Customizer' ) ) {
   /* Main plugin class */
  class Paperio_Customizer {

    /* Construct */
    public function __construct() {
		add_action( 'customize_register', array( $this, 'paperio_add_customizer_sections' ), 10 );
		add_action( 'customize_register', array( $this, 'paperio_register_options_settings_and_controls' ), 20 );
    }

    public function paperio_add_customizer_sections( $wp_customize ) {
		/* Add General layout Section */
	    $wp_customize->add_section( 'tz_add_general_section', array(
			'title' 	 	=> esc_attr__( 'General Settings', 'paperio' ),
			'capability' 	=> 'manage_options',
			'priority'	 	=> 1
		) );

	    /* Add Blog Home Settings Panels */
		$wp_customize->add_panel( 'tz_add_general_blog_panel', array(
			'title' 	 	=> esc_attr__( 'Blog Home Settings', 'paperio' ),
			'capability' 	=> 'manage_options',
			'priority'	 	=> 2
		) );

		/* Add Blog Settings Section */
	    $wp_customize->add_section( 'tz_add_general_blog_section', array(
			'title' 	 	=> esc_attr__( 'Blog Settings', 'paperio' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'tz_add_general_blog_panel',
		) );

		/* Add Sticky Post Section */
	    $wp_customize->add_section( 'tz_add_general_sticky_posts_section', array(
			'title' 	 	=> esc_attr__( 'Sticky Posts Settings', 'paperio' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'tz_add_general_blog_panel',
		) );

	    /* Add Header Panels */
		$wp_customize->add_panel( 'tz_add_header_panel', array(
			'title' 	 	=> esc_attr__( 'Header', 'paperio' ),
			'capability' 	=> 'manage_options',
			'priority'	 	=> 2
		) );

		/* Add Disable Header Sections */
	    $wp_customize->add_section( 'tz_add_header_section', array(
			'title' 	 	=> esc_attr__( 'Header', 'paperio' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'tz_add_header_panel',
		) );

		/* Add Logo Sections */
	    $wp_customize->add_section( 'tz_add_logo_section', array(
			'title' 	 	=> esc_attr__( 'Logo & Favicon', 'paperio' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'tz_add_header_panel',
		) );


		/* Add Social Icons Sections */
	    $wp_customize->add_section( 'tz_add_social_icon_section', array(
			'title' 	 	=> esc_attr__( 'Social Icons', 'paperio' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'tz_add_header_panel',
		) );


		/* Add Search Sections */
	    $wp_customize->add_section( 'tz_add_search_section', array(
			'title' 	 	=> esc_attr__( 'Search', 'paperio' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'tz_add_header_panel',
		) );


		/* Add Navigations */
	    $wp_customize->add_section( 'tz_add_navigation_section', array(
			'title' 	 	=> esc_attr__( 'Navigations', 'paperio' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'tz_add_header_panel',
		) );

		/* Add General layout Section */
	    $wp_customize->add_panel( 'tz_add_layout_section', array(
			'title' 	 	=> esc_attr__( 'Page Layout Settings', 'paperio' ),
			'capability' 	=> 'manage_options',
			'priority'	 	=> 3
		) );

		/* Add Page Layout Panel */
		$wp_customize->add_section( 'tz_add_page_layout_panel', array(
			'title' 	 	=> esc_attr__( 'Page Layout Settings', 'paperio' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'tz_add_layout_section',
		) );

		/* Add Post Layout Panel */
		$wp_customize->add_section( 'tz_add_post_layout_panel', array(
			'title' 	 	=> esc_attr__( 'Post Layout Settings', 'paperio' ),
			'capability' 	=> 'manage_options',
			'panel'			=> 'tz_add_layout_section',
		) );

		/* Add Category Layout Panel */
		$wp_customize->add_section( 'tz_add_category_layout_panel', array(
			'title' 	 	=> esc_attr__( 'Category Layout Settings', 'paperio' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'tz_add_layout_section',
		) );

		/* Add Archive Layout Panel */
		$wp_customize->add_section( 'tz_add_archive_layout_panel', array(
			'title' 	 	=> esc_attr__( 'Archive Layout Settings', 'paperio' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'tz_add_layout_section',
		) );


		/* Add Post Featured Area */
	    $wp_customize->add_section( 'tz_add_featured_area_section', array(
			'title' 	 	=> esc_attr__( 'Featured Area', 'paperio' ),
			'capability' 	=> 'manage_options',
			'priority'	 	=> 12
		) );


		/* Add Post Featured Area */
	    $wp_customize->add_section( 'tz_add_latest_popular_post_section', array(
		 	'title' 	 	=> esc_attr__( 'Latest/Popular Post Block', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'priority'	 	=> 13
		) );

		/* Add Promotional Block */
	    $wp_customize->add_section( 'tz_add_promotional_block_section', array(
		 	'title' 	 	=> esc_attr__( 'Promotional Block', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'priority'	 	=> 13
		) );

		/* Add Footer Area */
	    $wp_customize->add_panel( 'tz_add_footer_panel', array(
		 	'title' 	 	=> esc_attr__( 'Footer', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'priority'	 	=> 14
		) );

		/* Add Footer Settings */
	    $wp_customize->add_section( 'tz_add_footer_style', array(
		 	'title' 	 	=> esc_attr__( 'Footer', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'tz_add_footer_panel'
		) );

		/* Add Footer Social Area */
	    $wp_customize->add_section( 'tz_add_footer_social', array(
		 	'title' 	 	=> esc_attr__( 'Footer Social Icon', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'tz_add_footer_panel'
		) );

		/* Add Footer Copyright Area */
	    $wp_customize->add_section( 'tz_add_footer_copyright', array(
		 	'title' 	 	=> esc_attr__( 'Footer Copyright', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'tz_add_footer_panel'
		) );

		/* Add 404 page (Page not found) */
	    $wp_customize->add_section( 'tz_add_page_not_found', array(
		 	'title' 	 	=> esc_attr__( '404 Page Setting', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'priority'	 	=> 20
		) );

		/* Add Image Meta Data Settings */
	    $wp_customize->add_section( 'tz_add_image_meta_data_section', array(
		 	'title' 	 	=> esc_attr__( 'Image Meta Data Settings', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'priority'	 	=> 25
		) );

		/* Add Image Meta Data Settings */
	    $wp_customize->add_section( 'tz_add_social_share_section', array(
		 	'title' 	 	=> esc_attr__( 'Post Social Share Settings', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'priority'	 	=> 30
		) );

		/* Add Color Area */
	    $wp_customize->add_panel( 'tz_add_color_panel', array(
		 	'title' 	 	=> esc_attr__( 'Font and Color Setting', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		) );

	    /* Add Custom Font Setting */
	    $wp_customize->add_section( 'tz_add_general_font_family_section', array(
		 	'title' 	 	=> esc_attr__( 'Font Family', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'priority'	 	=> 140,
		 	'panel'		 	=> 'tz_add_color_panel',
		) );

		/* Add General Color Settings */
	    $wp_customize->add_section( 'tz_add_general_color_section', array(
		 	'title' 	 	=> esc_attr__( 'General', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'tz_add_color_panel'
		) );

		/* Add Title Wrapper Color Settings */
	    $wp_customize->add_section( 'tz_add_title_color_section', array(
		 	'title' 	 	=> esc_attr__( 'Title Wrapper', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'tz_add_color_panel'
		) );

		/* Add Breadcrumb Color Settings */
	    $wp_customize->add_section( 'tz_add_breadcrumb_color_section', array(
		 	'title' 	 	=> esc_attr__( 'Breadcrumb', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'tz_add_color_panel'
		) );

		/* Add Content Color Settings */
	    $wp_customize->add_section( 'tz_add_content_color_section', array(
		 	'title' 	 	=> esc_attr__( 'Content', 'paperio' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'tz_add_color_panel'
		) );

    }

    /* Register option settings To Customizer */ 
	 
    public function paperio_register_options_settings_and_controls( $wp_customize ) {
    	global $wp_version;
    	/* Register General Settings */
		require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/general-layout-settings.php';

		/* Register Blog Settings */
		require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/blog-layout-settings.php';

		/* Register Sticky Post Settings */
		require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/blog-sticky-post-layout-settings.php';

		/* Register Layout Settings */
		require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/layout-settings.php';

		/* Register Header Settings */
		require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/header-settings.php';

		/* Register Featured Post Setting */
        require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/featured-area-settings.php';

        /* Register Featured Post Setting */
        require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/latest-popular-post-settings.php';

        /* Register Promotional Block Setting */
        require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/promotional-block-settings.php';

        /* Register Instagram Feed Setting */
        require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/page-not-found-settings.php';

        /* Register Footer Setting */
        require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/footer-settings.php';

        /* Register Image Meta Data Settings */
        require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/image-meta-data-settings.php';

        /* Register Post Social Share Settings */
		require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/post-social-share-settings.php';

        /* Register Custom Font Settings */
        require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/custom-font-settings.php';

        /* Register Custom Color Settings */
        require_once PAPERIO_THEME_CUSTOMIZER_MAPS .'/custom-color-settings.php';

    }

} // end of class

$Paperio_Customizer = new Paperio_Customizer();

} // end of class_exists