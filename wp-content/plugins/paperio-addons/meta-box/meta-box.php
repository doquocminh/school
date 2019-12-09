<?php
/**
 * Metabox Class Fill.
 *
 * @package Paperio
 */
?>
<?php

if( is_admin() ) {
    add_action( 'load-post.php', 'Paperio_Meta_Boxes' );
    add_action( 'load-post-new.php', 'Paperio_Meta_Boxes' );
}

if( ! function_exists( 'Paperio_Meta_Boxes' ) ) :
	function Paperio_Meta_Boxes() {
	    new Paperio_Meta_Box_Class();
	}
endif;

/**
 * The Paperio_Meta_Box_Class Class.
 */

if( ! class_exists( 'Paperio_Meta_Box_Class' ) ) {
	class Paperio_Meta_Box_Class {

		/**
		 * Hook into the appropriate actions when the class is constructed.
		 */
		public function __construct() {
			$this->paperio_metabox_maps();
			add_action( 'add_meta_boxes', array( $this, 'paperio_add_meta_box_for_post' ) );
			add_action( 'add_meta_boxes', array( $this, 'paperio_add_meta_box_for_post_page' ) );
			add_action( 'save_post', array( $this, 'paperio_save_meta_box' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'paperio_meta_box_script' ) );
		}

		/**
		 * Adds the meta box functions container.
		 */
		public function paperio_metabox_maps() {
			require_once( PAPERIO_ADDONS_DIR_ROOT .'/meta-box/meta-box-maps.php' );
		}

		public function paperio_add_meta_box( $id, $label_name, $post_type ) {
			add_meta_box(
				$id
				,$label_name
				,array( $this, $id )
				,$post_type
				,'normal'
				,'high'
			);
		}
		/**
		 * Adds the meta box for Post.
		 */
		public function paperio_add_meta_box_for_post( $post_type ) {
			$post_types = array( 'post' );     //limit meta box to certain post types
			$flag = false;
			$meta_box_title = '';
	        if ( in_array( $post_type, $post_types ) ) {
	           	$flag = true;
	        }
	        if( $flag == true ) {
	        	$meta_box_title .= __( 'Paperio Post Format Settings', 'paperio-addons' );
		        $this->paperio_add_meta_box( 'paperio_post_single_meta_box', $meta_box_title, $post_type );
		    }
		}

		/**
		 * Adds the meta box for Post and Page.
		 */
		public function paperio_add_meta_box_for_post_page( $post_type ) {
			$post_types = array( 'post', 'page' );     //limit meta box to certain post types
			$flag = false;
			$meta_box_title = '';
	        if ( in_array( $post_type, $post_types ) ) {
	           	$flag = true;
	        }
	        if( $flag == true ) {
	        	if( $post_type == 'page' ) {
	        		$meta_box_title .= __( 'Paperio Page Settings', 'paperio-addons' );
	        	} else {
	        		$meta_box_title .= __( 'Paperio Post Settings', 'paperio-addons' );
	        	}
		        $this->paperio_add_meta_box( 'paperio_single_meta_box', $meta_box_title, $post_type );
		    }
		}

		public function paperio_post_single_meta_box() {
	        global $post;
			echo '<div class="paperio_meta_box_tab_content_single">';
			echo '<div class="paperio_meta_box_tab" id="paperio_tab_single"></div>';
                if( $post->post_type == 'post' ):
                	require_once( PAPERIO_ADDONS_DIR_ROOT .'/meta-box/metabox-tabs/metabox_post_setting.php' );
                endif;
			echo '</div>';
			echo '<div class="clear"></div>';
		}

		public function paperio_single_meta_box() {
	        global $post;
			echo '<div class="paperio_meta_box_tab_content_single">';
			echo '<div class="paperio_meta_box_tab" id="paperio_tab_single"></div>';
				if( $post->post_type == 'post' ):
					require_once( PAPERIO_ADDONS_DIR_ROOT .'/meta-box/metabox-tabs/metabox_post_single_setting.php' );
				else:
					require_once( PAPERIO_ADDONS_DIR_ROOT .'/meta-box/metabox-tabs/metabox_page_single_setting.php' );
				endif;
			echo '</div>';
			echo '<div class="clear"></div>';
		}

		/**
		 * Save the meta when the post is saved.
		 *
		 * @param int $post_id The ID of the post being saved.
		 */
		public function paperio_save_meta_box( $post_id ) {
		
			// If this is an autosave, our form has not been submitted,
	        // so we don't want to do anything.
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
				return $post_id;

			/* OK, its safe for us to save the data now. */
			$data = array();
			foreach ( $_POST as $key => $value ) {
				if ( strstr( $key, 'tz_') ) {
					// Sanitize the user input.
					$data = sanitize_text_field( $_POST[$key] );
					// Update the meta field.
					update_post_meta( $post_id, $key, $data );
				}
			}
		}

		public function paperio_meta_box_script() {
			global $pagenow;
			if( is_admin() && ( $pagenow=='post-new.php' || $pagenow=='post.php' ) ) {
				wp_enqueue_script( 'media-upload' );
				wp_enqueue_script( 'thickbox' );
		   		wp_enqueue_style( 'thickbox' );
		   		wp_register_script( 'paperio-meta_box-js', PAPERIO_ADDONS_ROOT.'meta-box/js/meta-box.js', array('jquery'), '1.0');
				wp_enqueue_script( 'paperio-meta_box-js' );
		   		wp_register_style( 'paperio-meta_box-css', PAPERIO_ADDONS_ROOT . 'meta-box/css/meta-box.css',null, '1.0');
		   		wp_enqueue_style( 'paperio-meta_box-css' );
			}
		}
	}
}