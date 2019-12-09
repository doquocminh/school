<?php
/**
 * Theme Register Style Js.
 *
 * @package Paperio
 */
?>
<?php
	// Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

	/*
	 * Enqueue scripts and styles.
	 */
	if( ! function_exists( 'paperio_register_style_js' ) ) :
		function paperio_register_style_js() {

			do_action( 'paperio_remove_third_party_script_style' );

			/*
			 * Load Paperio theme main and other required stylesheets.
			 */
			$tz_font_list   = array();
			$tz_main_font 	= get_theme_mod( 'tz_main_font', 'Open Sans' );
			$tz_alt_font 	= get_theme_mod( 'tz_alt_font', 'Montserrat' );
			$tz_all_subsets = get_theme_mod( 'tz_main_font_subsets', array( 'cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin-ext'
				, 'vietnamese' ) );
			$tz_google_main_font_weight = get_theme_mod( 'tz_google_main_font_weight', array( '100', '200' ,'300', '400', '500', '600', '700', '800', '900' ) );
			$tz_google_alt_font_weight = get_theme_mod( 'tz_google_alt_font_weight', array( '100', '200' ,'300', '400', '500', '600', '700', '800', '900' ) );
			$tz_google_font_disable = get_theme_mod( 'tz_enable_google_font', '0' );

			/* For Main Font Weight */
			
			if( !empty( $tz_google_main_font_weight ) ) {
				$tz_google_main_font_weight = implode( ',', $tz_google_main_font_weight );
				$tz_font_list[] = $tz_main_font.':'.$tz_google_main_font_weight;
			} else {
				$tz_font_list[] = $tz_main_font;
			}

			/* For Alt Font Weight */
			if( !empty( $tz_google_alt_font_weight ) ) {
				$tz_google_alt_font_weight = implode( ',', $tz_google_alt_font_weight );
				$tz_font_list[] = $tz_alt_font.':'.$tz_google_alt_font_weight;
			} else {
				$tz_font_list[] = $tz_alt_font;
			}

			/* For Font Subset */
			if( !empty( $tz_all_subsets ) ) {
					$tz_font_subsets = implode( ',', $tz_all_subsets );
			} else {
					$tz_font_subsets = false;
			}
			$google_font = add_query_arg( array(
		            'family' => urlencode( implode( '|', $tz_font_list ) ),
		            'subset' =>  $tz_font_subsets,
		            'display' => 'swap'
		        ), '//fonts.googleapis.com/css' );

			/* Check Google Fonts Enable*/
			if( $tz_google_font_disable != '1' ) {
				wp_enqueue_style( 'paperio-google-font', $google_font, null, null );
			}
		    wp_register_style( 'owl-transitions', PAPERIO_THEME_CSS_URI . '/animate.min.css',null, '3.6.0' );
			wp_register_style( 'bootstrap', PAPERIO_THEME_CSS_URI . '/bootstrap.min.css', null, '3.3.5' );
			wp_register_style( 'font-awesome', PAPERIO_THEME_CSS_URI . '/font-awesome.min.css', null, '5.10.1' );
			wp_register_style( 'owl-carousel', PAPERIO_THEME_CSS_URI . '/owl.carousel.css', null, '2.3.4' );
			wp_register_style( 'magnific-popup', PAPERIO_THEME_CSS_URI . '/magnific-popup.css', null, PAPERIO_THEME_VERSION );
			wp_register_style( 'paperio-style', get_stylesheet_uri(), null, PAPERIO_THEME_VERSION );
			wp_register_style( 'paperio-responsive-style', PAPERIO_THEME_CSS_URI . '/responsive.css', null, PAPERIO_THEME_VERSION );

			wp_enqueue_style( 'owl-transitions' );
			wp_enqueue_style( 'bootstrap' );
			wp_enqueue_style( 'font-awesome' );
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'magnific-popup' );
			wp_enqueue_style( 'paperio-style' );
			wp_enqueue_style( 'paperio-responsive-style' );
			
			
			/*
			 * Load Paperio theme main and other required jquery files.
			 */
			
			/* To hide/show page scrolling effect */
			$tz_disable_page_scrolling_effect 	= get_theme_mod( 'tz_disable_page_scrolling_effect', 1 );

			wp_register_script( 'bootstrap', PAPERIO_THEME_JS_URI.'/bootstrap.min.js', array( 'jquery' ), '3.3.5', true);
			wp_register_script( 'owl-carousel', PAPERIO_THEME_JS_URI.'/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
			wp_register_script( 'placeholder', PAPERIO_THEME_JS_URI.'/placeholder.js', array( 'jquery' ), '1.0', true );
			wp_register_script( 'jquery-magnific-popup', PAPERIO_THEME_JS_URI.'/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
			wp_register_script( 'page-scroll', PAPERIO_THEME_JS_URI.'/page-scroll.js', array( 'jquery' ), '1.4.9', true );
			wp_register_script( 'jquery-fitvids', PAPERIO_THEME_JS_URI.'/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
			wp_register_script( 'masonry-pkgd', PAPERIO_THEME_JS_URI.'/masonry.pkgd.js', array( 'jquery' ), '4.2.1', true );
			wp_register_script( 'imagesloaded', PAPERIO_THEME_JS_URI.'/imagesloaded.pkgd.min.js', array( 'jquery' ), '4.1.4', true );
			wp_register_script( 'infinite-scroll', PAPERIO_THEME_JS_URI.'/infinite-scroll.js', array( 'jquery' ), '2.1.0', true );
			wp_register_script( 'background-srcset', PAPERIO_THEME_JS_URI.'/background-srcset.js', array( 'jquery' ), '1.0', true );
			wp_register_script( 'paperio-custom', PAPERIO_THEME_JS_URI.'/custom.js', array( 'jquery' ), '1.0', true );
			
		    wp_enqueue_script( 'bootstrap' );
		    wp_enqueue_script( 'owl-carousel' );
		    wp_enqueue_script( 'placeholder' );
		    wp_enqueue_script( 'jquery-magnific-popup' );

		    if( $tz_disable_page_scrolling_effect != 1 ) {
		    	wp_enqueue_script( 'page-scroll' );
		    }
		    wp_enqueue_script( 'jquery-fitvids' );
		    wp_enqueue_script( 'masonry-pkgd' );
		    wp_enqueue_script( 'imagesloaded' );
		    wp_enqueue_script( 'infinite-scroll' );
		    wp_enqueue_script( 'background-srcset' );
		    wp_enqueue_script( 'paperio-custom' );

			// Load the html5 shiv.
			wp_enqueue_script( 'paperio-html5', PAPERIO_THEME_JS_URI.'/html5shiv.min.js', array( 'jquery' ), '3.7.3' );
			wp_script_add_data( 'paperio-html5', 'conditional', 'lt IE 9' );
			
			/*
			 * Defind ajaxurl and wp_localize
			 */

			wp_localize_script( 'paperio-custom', 'paperioajaxurl', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'theme_url' => PAPERIO_THEME_URI, 'loading_image' => PAPERIO_THEME_IMAGES_URI.'/spin.gif','paperio_previous_text' => 'Previous', 'paperio_next_text' => 'Next' ) );

			wp_localize_script( 'paperio-custom', 'paperio_infinite_scroll_message', array( 'message' => esc_attr__( 'All Post Loaded', 'paperio' ) ) );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'paperio_register_style_js', 10 );

	/*
	 * Load paperio customizer script.
	 */

	if( ! function_exists( 'paperio_customizer_scripts_preview' ) ) :
		function paperio_customizer_scripts_preview() {
		   wp_enqueue_script( 'paperio-customizer-script', PAPERIO_THEME_ADMIN_JS_URI.'/paperio-customizer.js', array( 'jquery','customize-preview' ) );
		}
	endif;
	add_action( 'customize_preview_init','paperio_customizer_scripts_preview' );

	/*
	 * Load theme admin css and script.
	 */

	if( ! function_exists( 'paperio_admin_custom_scripts' ) ) :
		function paperio_admin_custom_scripts() {
			wp_register_script( 'paperio-admin-custom-script', PAPERIO_THEME_ADMIN_JS_URI . '/paperio-admin-custom.js', array( 'jquery' ), PAPERIO_THEME_VERSION, true);
			wp_register_style( 'paperio-admin-custom-style', PAPERIO_THEME_ADMIN_CSS_URI . '/paperio-admin-custom.css', null, PAPERIO_THEME_VERSION);
			wp_register_style( 'font-awesome', PAPERIO_THEME_CSS_URI . '/font-awesome.min.css', null, '5.10.1' );

			wp_enqueue_script( 'paperio-admin-custom-script' );
			wp_enqueue_style( 'paperio-admin-custom-style' );
			wp_enqueue_style( 'font-awesome' );
			wp_localize_script( 'paperio-admin-custom-script', 'paperioadmin', array( 'remove_button_text' => esc_attr__( 'Remove', 'paperio' )  ) );
			
			/* Add dynamic css from customizer for admin link */
			$paperio_custom_css = '';
			$tz_content_link_color = get_theme_mod( 'tz_content_link_color', '' );
			$tz_content_link_hover_color = get_theme_mod( 'tz_content_link_hover_color', '' );
			$tz_theme_custom_color = get_theme_mod( 'tz_theme_custom_color', '' );
			if( $tz_content_link_color ){
				$paperio_custom_css .= ".editor-block-list__layout a{ color: ".$tz_content_link_color." !important}";
			}
			if( $tz_content_link_hover_color ){
				$paperio_custom_css .= ".editor-block-list__layout a:hover, .wp-block-button__link:hover{ color: ".$tz_content_link_hover_color." !important}";
			}elseif( $tz_theme_custom_color ){
				$paperio_custom_css .= ".editor-block-list__layout a:hover, .wp-block-button__link:hover{ color: ".$tz_theme_custom_color." !important}";
			}

			wp_add_inline_style( 'paperio-admin-custom-style', $paperio_custom_css );
		}
	endif;
	add_action( 'admin_enqueue_scripts', 'paperio_admin_custom_scripts' );
	add_action( 'admin_print_scripts-post.php', 'paperio_admin_custom_scripts', 99 );
	add_action( 'admin_print_scripts-post-new.php', 'paperio_admin_custom_scripts', 99 );

	/* Generate custom css base on customizer settings */
    if( ! function_exists( 'paperio_generate_custom_css' ) ) {

        function paperio_generate_custom_css() {
            $output_css = '';
            ob_start();
                /* Include navigation css */
                require_once get_template_directory() . '/lib/customizer/customizer-output/custom-theme-css.php';
                require_once get_template_directory() . '/lib/customizer/customizer-output/custom-css.php';
            $output_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_css = preg_replace( '#/\*.*?\*/#s', '', $output_css );
            $output_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css );
            $output_css = preg_replace( '/\s\s+(.*)/', '$1', $output_css );

            wp_add_inline_style( 'paperio-responsive-style', $output_css );
        }

    }
    add_action( 'wp_enqueue_scripts', 'paperio_generate_custom_css', 998 );