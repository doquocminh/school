<?php
/**
 * Defind Class 
 */
    
if( !class_exists( 'Paperio_Licence_Activation' ) ) {

  	class Paperio_Licence_Activation {

		// Construct
		public function __construct() {
		  	add_action( 'admin_menu', array( $this, 'paperio_licence_activation_page' ), 5 );
		  	add_action( 'wp_ajax_paperio_active_theme_licence', array( $this, 'paperio_active_theme_licence' ) );
		}

		public function paperio_licence_activation_page() {
		    add_theme_page(
		        esc_html__( 'Theme Licence', 'paperio' ),
		        esc_html__( 'Theme Licence', 'paperio' ),
		        'manage_options',
		        'paperio-licence-activation',
		        array( $this, 'paperio_licence_activation_callback' )
		    );
		}

		// Add new submenu for demo data install in Admin panel > Appereance
		public function paperio_licence_activation_callback() {
			
		    global $title;

		    /* Check current user permission */
		    if( !current_user_can( 'manage_options' ) ) {
		        wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'paperio' ) );
		    }
		    /* Gets a WP_Theme object for a theme. */
		    $paperio_theme = wp_get_theme();

		    echo '<div class="wrap">';
		        echo '<h1>'.esc_attr( $title ).'</h1>';
		        echo '<div class="paperio-header-licence">';
		            echo '<div class="display_header">';
		                if( $paperio_theme->get( 'Name' ) ) {
		                    echo '<h2>'.$paperio_theme->get( 'Name' ).'</h2>';
		                }
		                if( $paperio_theme->get( 'Version' ) ) {
		                    echo '<span>'.$paperio_theme->get( 'Version' ).'</span>';
		                }
		            echo '</div>';
		            echo '<div class="paperio-head-right">';
		                echo '<a target="_blank" href="'.$paperio_theme->get( 'ThemeURI' ).'/documentation/">'.esc_html__( 'Online Documentation', 'paperio' ).'</a><span class="link_sep">|</span><a target="_blank" href="'.$paperio_theme->get( 'AuthorURI' ).'/support">'.esc_html__( 'Support Center', 'paperio' ).'</a></div>';
		            echo '<div class="clear"></div>';
		        echo '</div>';
		        echo '<div class="licence-content">';
			        echo '<div class="licence-content-top">';
                        echo '<div class="header-licence-top">';
                            echo '<div class="header-licence-top-left">';
                                echo '<a target="_blank" href="'.$paperio_theme->get( 'ThemeURI' ).'"><img src="'.PAPERIO_THEME_IMAGES_URI.'/licence-logo.png" alt="'.esc_html__( 'Paperio logo', 'paperio' ).'" ></a>';
                            echo '</div>';
                            echo '<div class="header-licence-top-right">';
                                echo '<h4>'.esc_html__( 'Welcome to Paperio - Responsive and Multipurpose WordPress Blog Theme', 'paperio' ).'</h4>';
                            echo '</div>';
                        echo '</div>';
                        $class = '';
                        echo '<div class="licence-content-bottom">';    
                            echo '<div class="licence-thankyou-message licence-added-success">';
                                echo esc_html__( 'Welcome to Paperio WordPress theme. Please activate your Paperio theme license copy and enjoy premium features.', 'paperio' );
                            echo '</div>';
                            $paperio_is_theme_licence_active = paperio_is_theme_licence_active();

                            if( $paperio_is_theme_licence_active ) {
                                echo '<div class="licence-activated-success"><i class="fas fa-check-circle"></i><span>'.esc_html__( 'Awesome! Your Paperio WordPress theme license is activated already. Enjoy premium features of Paperio.', 'paperio' ).'</span></div>';
                                $class = ' hide-licence-button';
                            } else {
                                if( isset( $_GET['token'] ) && isset( $_GET['response'] ) ) {
                                    $paperio_get_transient = get_transient( 'paperio_licence_token' );
                                   	if( $_GET['token'] == $paperio_get_transient ) {
                                        if( $_GET['response'] == 'true' && isset( $_GET['msg']) ) {
                                           	echo '<div class="licence-activated-success"><i class="fas fa-check-circle"></i><span>'.esc_attr( $_GET['msg'] ).'</span></div>';
                                                $class = ' hide-licence-button';
                                                paperio_theme_active_licence( 'yes' );
                                        }
                                        if( $_GET['response'] == 'false' && isset( $_GET['msg']) ) {
                                          	echo '<div class="licence-activated-failed"><i class="fas fa-times-circle"></i><span>'.esc_attr( $_GET['msg'] ).'</span></div>';
                                        }
                                        if( $_GET['response'] == 'access_denied' && isset( $_GET['msg']) ) {
                                          	echo '<div class="licence-activated-access-denied"><i class="fas fa-info-circle"></i><span>'.esc_attr( $_GET['msg'] ).'</span></div>';
                                        }
                                    }
                                }
                            }

                            echo '<a class="paperio-licence'.$class.'" href="javascript:void(0);">'.esc_html__( 'Activate Paperio WordPress Theme License', 'paperio' ).'</a>';
                            echo '<img src="'.PAPERIO_THEME_IMAGES_URI.'/spin.gif" class="paperio-licence-spinner" alt="'.esc_html__( 'Spinner', 'paperio' ).'" width="25" height="25">';
                            echo '<div class="licence-description">'.esc_html__( 'Activate your Paperio theme license using above button to unlock Paperio premium features like demo data import. Please note that you will need to login to your ThemeForest account from which you have purchased Paperio theme and allow the access to verify your theme purchase.', 'paperio' );
                                echo '<a target="_blank" href="'.$paperio_theme->get( 'ThemeURI' ).'/documentation/how-to-activate-paperio-theme-license/">'.esc_html__( 'For more details please check this article.', 'paperio' ).'</a>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="licence-support-content-bottom">';
                        	echo '<div class="license-documentation">';
                        		echo '<a href="'.$paperio_theme->get( 'ThemeURI' ).'/documentation/" target="_blank"><img src="'.PAPERIO_THEME_IMAGES_URI.'/online-documentation.png" alt="'.esc_html__( 'Online Documentation', 'paperio' ).'" /><span>'.esc_html__( 'Online Documentation', 'paperio' ).'</span></a>';
                        	echo '</div>';
                        	echo '<div class="license-support">';
                        		echo '<a href="'.$paperio_theme->get( 'AuthorURI' ).'/support" target="_blank"><img src="'.PAPERIO_THEME_IMAGES_URI.'/support-center.png" alt="'.esc_html__( 'Support Center', 'paperio' ).'" /><span>'.esc_html__( 'Support Center', 'paperio' ).'</span></a>';
                        	echo '</div>';
                        	echo '<div class="license-video">';
                        		echo '<a href="'.$paperio_theme->get( 'ThemeURI' ).'/documentation/general-information/video-tutorials/" target="_blank"><img src="'.PAPERIO_THEME_IMAGES_URI.'/video-tutorials.png" alt="'.esc_html__( 'Video Tutorials', 'paperio' ).'" /><span>'.esc_html__( 'Video Tutorials', 'paperio' ).'</span></a>';
                        	echo '</div>';
                        echo '</div>';    
			        echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
		    
		public function paperio_active_theme_licence() {
		    $PaperioResponse = array(
		        'status' => true,
		        'url' => paperio_generate_theme_licence_activation_url(),
		    );
		    die( json_encode( $PaperioResponse ) );
		}

	} // end of class
	$Paperio_Licence_Activation = new Paperio_Licence_Activation();
  
} // end of class_exists