<?php
/**
 * @package Paperio
 */
?>
<?php

/*******************************************************************************/
/* Start Ads Widget */
/*******************************************************************************/

if( ! class_exists( 'Paperio_Ads_Widget' ) ) {
	class Paperio_Ads_Widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'Paperio_Ads_Widget',
			esc_html__('Paperio - Ads Widget', 'paperio-addons'),
			array( 'description' => esc_html__( 'Your site Ads widget.', 'paperio-addons' ), )
			);
		}

		public function widget( $args, $instance ) {
			$title = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'Ad Banner', 'paperio-addons' );
			$tz_ads_image_url 		= ( isset( $instance['tz_ads_image_url'] ) ) ? $instance['tz_ads_image_url'] : '';
			$tz_ads_image_link_url	= ( isset( $instance['tz_ads_image_link_url'] ) ) ? $instance['tz_ads_image_link_url'] : '';
			$tz_ads_image_alt 		= ( isset( $instance['tz_ads_image_alt'] ) ) ? $instance['tz_ads_image_alt'] : '';
			$tz_ads_shortcode 		= ( isset( $instance['tz_ads_shortcode'] ) ) ? $instance['tz_ads_shortcode'] : '';

			// Before widget.
			echo $args['before_widget'];

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			// Content
			echo '<div class="ads-wrapper">';
				if( $tz_ads_shortcode ) :
					echo do_shortcode( $tz_ads_shortcode );
				else :
					if( $tz_ads_image_url || $tz_ads_image_link_url ) {
						if( $tz_ads_image_link_url ) {
							echo '<a href="'.esc_url( $tz_ads_image_link_url ).'">';
						}
						if( $tz_ads_image_url ) {
							echo '<img src="' . esc_url( $tz_ads_image_url ) . '" alt="'.esc_attr( $tz_ads_image_alt ).'" />';
						}
						if( $tz_ads_image_link_url ) {
							echo '</a>';
						}
					}
				endif;
			echo '</div>';
			// After widget
			echo $args['after_widget'];

		}
			
		// Widget Backend 
		public function form( $instance ) { 

			$title 					= ( isset( $instance['title'] ) ) ? $instance['title'] : '';
			$tz_ads_image_url		= ( isset( $instance['tz_ads_image_url'] ) ) ? $instance['tz_ads_image_url'] : esc_html__( 'Ad Banner', 'paperio-addons' );
			$tz_ads_image_link_url	= ( isset( $instance['tz_ads_image_link_url'] ) ) ? $instance['tz_ads_image_link_url'] : '';
			$tz_ads_image_alt		= ( isset( $instance['tz_ads_image_alt'] ) ) ? $instance['tz_ads_image_alt'] : '';
			$tz_ads_shortcode		= ( isset( $instance['tz_ads_shortcode'] ) ) ? $instance['tz_ads_shortcode'] : '';

			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'tz_ads_shortcode' ) ); ?>"><?php esc_html_e( 'Ads ShortCode:', 'paperio-addons' ); ?></label>
				<textarea name="<?php echo esc_attr( $this->get_field_name( 'tz_ads_shortcode' ) ); ?>" rows="5" cols="5" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tz_ads_shortcode' ) ); ?>" ><?php echo esc_textarea( $tz_ads_shortcode ); ?></textarea>
			</p>
			<p><strong><?php echo __( 'OR', 'paperio-addons' ); ?></strong></p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_ads_image_url' ); ?>"><?php esc_html_e( 'Author Image URL:', 'paperio-addons' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_ads_image_url' ); ?>" name="<?php echo $this->get_field_name( 'tz_ads_image_url' ); ?>" type="url" value="<?php echo esc_url( $tz_ads_image_url ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_ads_image_link_url' ); ?>"><?php esc_html_e( 'Link URL:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_ads_image_link_url' ); ?>" name="<?php echo $this->get_field_name( 'tz_ads_image_link_url' ); ?>" type="url" value="<?php echo esc_url( $tz_ads_image_link_url ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_ads_image_alt' ); ?>"><?php esc_html_e( 'Image Alt Text:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_ads_image_alt' ); ?>" name="<?php echo $this->get_field_name( 'tz_ads_image_alt' ); ?>" type="text" value="<?php echo esc_attr( $tz_ads_image_alt ); ?>" />
			</p>

		<?php
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['tz_ads_image_url'] = ( ! empty( $new_instance['tz_ads_image_url'] ) ) ? strip_tags( $new_instance['tz_ads_image_url'] ) : '';
			$instance['tz_ads_image_link_url'] = ( ! empty( $new_instance['tz_ads_image_link_url'] ) ) ? strip_tags( $new_instance['tz_ads_image_link_url'] ) : '';
			$instance['tz_ads_image_alt'] = ( ! empty( $new_instance['tz_ads_image_alt'] ) ) ? strip_tags( $new_instance['tz_ads_image_alt'] ) : '';
			$instance['tz_ads_shortcode'] = ( ! empty( $new_instance['tz_ads_shortcode'] ) ) ? wp_kses_post ( $new_instance['tz_ads_shortcode'] ) : '';
			
			return $instance;
		}
	}
}

// Register and load Paperio custom widget
if ( ! function_exists( 'paperio_load_ads_widget' ) ) :
	function paperio_load_ads_widget() {
		register_widget( 'Paperio_Ads_Widget' );
	}
	add_action( 'widgets_init', 'paperio_load_ads_widget' );
endif;

/*******************************************************************************/
/* End Ads Widget */
/*******************************************************************************/
?>