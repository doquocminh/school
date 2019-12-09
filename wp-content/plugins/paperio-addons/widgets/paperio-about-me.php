<?php
/**
 * @package Paperio
 */
?>
<?php

/*******************************************************************************/
/* Start About Me Widget */
/*******************************************************************************/

if( ! class_exists( 'paperio_about_widget' ) ) {

	class paperio_about_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'paperio_about_widget',
			esc_html__( 'Paperio - About Me', 'paperio-addons' ),
			array( 'description' => esc_html__( 'Your site Author.', 'paperio-addons' ), )
			);
		}

		public function widget( $args, $instance ) {
			$title = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'About Me', 'paperio-addons' );
			$tz_author_image_url 		 = ( isset( $instance['tz_author_image_url'] ) ) ? $instance['tz_author_image_url'] : '';
			$tz_image_link_url			 = ( isset( $instance['tz_image_link_url'] ) ) ? $instance['tz_image_link_url'] : '';
			$tz_author_image_alt 		 = ( isset( $instance['tz_author_image_alt'] ) ) ? $instance['tz_author_image_alt'] : '';
			$tz_author_name 			 = ( isset( $instance['tz_author_name'] ) ) ? $instance['tz_author_name'] : '';
			$tz_author_short_description = ( isset( $instance['tz_author_short_description'] ) ) ? $instance['tz_author_short_description'] : '';

			// Before widget.
			echo $args['before_widget'];

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			// Content
			echo '<div class="about-me-wrapper">';
				if( $tz_author_image_url ) :
					echo '<div class="margin-eight-bottom sm-margin-three-bottom">';
						if( $tz_image_link_url ) {
							echo '<a href="'.esc_url( $tz_image_link_url ).'">';
						}
						echo '<img src="' . esc_url( $tz_author_image_url ) . '" alt="'.esc_attr( $tz_author_image_alt ).'" />';
						if( $tz_image_link_url ) {
							echo '</a>';
						}
					echo '</div>';
				endif;
				if( $tz_author_name ) :
					echo '<span class="text-extra-small text-uppercase text-mid-gray text-uppercase font-weight-600">';
						if( $tz_image_link_url ) {
							echo '<a href="'.esc_url( $tz_image_link_url ).'">';
						}
							echo esc_attr( $tz_author_name );
						if( $tz_image_link_url ) {
							echo '</a>';
						}
					echo '</span>';
				endif;
			 	if( $tz_author_short_description ) :
					echo '<div class="about-small-text">'.do_shortcode( $tz_author_short_description ).'</div>';
				endif;
			echo '</div>';
			// After widget
			echo $args['after_widget'];

		}
			
		// Widget Backend 
		public function form( $instance ) { 

			$title 							= ( isset( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'About Me', 'paperio-addons' );
			$tz_author_image_url			= ( isset( $instance['tz_author_image_url'] ) ) ? $instance['tz_author_image_url'] : '';
			$tz_image_link_url				= ( isset( $instance['tz_image_link_url'] ) ) ? $instance['tz_image_link_url'] : '';
			$tz_author_image_alt			= ( isset( $instance['tz_author_image_alt'] ) ) ? $instance['tz_author_image_alt'] : '';
			$tz_author_name		 			= ( isset( $instance['tz_author_name'] ) ) ? $instance['tz_author_name'] : '';
			$tz_author_short_description	= ( isset( $instance['tz_author_short_description'] ) ) ? $instance['tz_author_short_description'] : '';

			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_author_image_url' ); ?>"><?php esc_html_e( 'Author Image URL:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_author_image_url' ); ?>" name="<?php echo $this->get_field_name( 'tz_author_image_url' ); ?>" type="text" value="<?php echo esc_url( $tz_author_image_url ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_image_link_url' ); ?>"><?php esc_html_e( 'Link URL:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_image_link_url' ); ?>" name="<?php echo $this->get_field_name( 'tz_image_link_url' ); ?>" type="text" value="<?php echo esc_url( $tz_image_link_url ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_author_image_alt' ); ?>"><?php esc_html_e( 'Image Alt Text:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_author_image_alt' ); ?>" name="<?php echo $this->get_field_name( 'tz_author_image_alt' ); ?>" type="text" value="<?php echo esc_attr( $tz_author_image_alt ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_author_name' ); ?>"><?php esc_html_e( 'Author Name:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_author_name' ); ?>" name="<?php echo $this->get_field_name( 'tz_author_name' ); ?>" type="text" value="<?php echo esc_attr( $tz_author_name ); ?>" />
			</p>			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'tz_author_short_description' ) ); ?>"><?php esc_html_e( 'Short Description:', 'paperio-addons' ); ?></label>
				<textarea name="<?php echo esc_attr( $this->get_field_name( 'tz_author_short_description' ) ); ?>" rows="5" cols="5" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tz_author_short_description' ) ); ?>" ><?php echo esc_textarea( $tz_author_short_description ); ?></textarea>
			</p>

		<?php
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['tz_author_image_url'] = ( ! empty( $new_instance['tz_author_image_url'] ) ) ? strip_tags( $new_instance['tz_author_image_url'] ) : '';
			$instance['tz_image_link_url'] = ( ! empty( $new_instance['tz_image_link_url'] ) ) ? strip_tags( $new_instance['tz_image_link_url'] ) : '';
			$instance['tz_author_image_alt'] = ( ! empty( $new_instance['tz_author_image_alt'] ) ) ? strip_tags( $new_instance['tz_author_image_alt'] ) : '';
			$instance['tz_author_name'] = ( ! empty( $new_instance['tz_author_name'] ) ) ? $new_instance['tz_author_name'] : '';
			$instance['tz_author_short_description'] = ( ! empty( $new_instance['tz_author_short_description'] ) ) ? wp_kses_post ( $new_instance['tz_author_short_description'] ) : '';
			
			return $instance;
		}
	}
}

// Register and load the widget
if ( ! function_exists( 'paperio_load_about_widget' ) ) :
	function paperio_load_about_widget() {
		
		register_widget( 'paperio_about_widget' );
	}
endif;
add_action( 'widgets_init', 'paperio_load_about_widget' );

/*******************************************************************************/
/* End Instagram Widget */
/*******************************************************************************/
?>