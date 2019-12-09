<?php
/**
 * @package Paperio
 */
?>
<?php

/*******************************************************************************/
/* Start About Me Widget */
/*******************************************************************************/

if( ! class_exists( 'paperio_follow_us_widget' ) ) {
	class paperio_follow_us_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'paperio_follow_us_widget',
			esc_html__('Paperio - Follow Us', 'paperio-addons'),
			array( 'description' => esc_html__( 'Your site Followers.', 'paperio-addons' ), )
			);
		}

		public function widget( $args, $instance ) {
		    
		    $title = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'Follow Us', 'paperio-addons' );
		    $follow_facebook = ( isset( $instance['follow_facebook'] ) ) ? $instance['follow_facebook'] : '';
		    $follow_twitter = ( isset( $instance['follow_twitter'] ) ) ? $instance['follow_twitter'] : '';
		    $follow_gplus = ( isset( $instance['follow_gplus'] ) ) ? $instance['follow_gplus'] : '';
		    $follow_bloglovin = ( isset( $instance['follow_bloglovin'] ) ) ? $instance['follow_bloglovin'] : '';
		    $follow_pinterest = ( isset( $instance['follow_pinterest'] ) ) ? $instance['follow_pinterest'] : '';
		    $follow_instagram = ( isset( $instance['follow_instagram'] ) ) ? $instance['follow_instagram'] : '';
		    $follow_tumblr = ( isset( $instance['follow_tumblr'] ) ) ? $instance['follow_tumblr'] : '';
		    $follow_youtube = ( isset( $instance['follow_youtube'] ) ) ? $instance['follow_youtube'] : '';
		    $follow_dribbble = ( isset( $instance['follow_dribbble'] ) ) ? $instance['follow_dribbble'] : '';
		    $follow_soundcloud = ( isset( $instance['follow_soundcloud'] ) ) ? $instance['follow_soundcloud'] : '';
		    $follow_vimeo = ( isset( $instance['follow_vimeo'] ) ) ? $instance['follow_vimeo'] : '';
		    $follow_linkedin = ( isset( $instance['follow_linkedin'] ) ) ? $instance['follow_linkedin'] : '';
		    $follow_rss = ( isset( $instance['follow_rss'] ) ) ? $instance['follow_rss'] : '';

			echo $args['before_widget'];

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			if( $follow_facebook || $follow_twitter || $follow_gplus || $follow_bloglovin || $follow_pinterest || $follow_instagram || $follow_tumblr || $follow_youtube || $follow_dribbble || $follow_soundcloud || $follow_vimeo || $follow_linkedin || $follow_rss ) :
				echo '<ul class="follow-box inline-block">';
				    /* Check Faceboox */
				    if( $follow_facebook ) {
				        echo '<li><a href="'.esc_url( $follow_facebook ).'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
					}
					/* Check Twitter */
					if( $follow_twitter ) {
				        echo '<li><a href="'.esc_url( $follow_twitter ).'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
					}
					/* Check Google Plus */
			   		if( $follow_gplus ) {
				        echo '<li><a href="'.esc_url( $follow_gplus ).'" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>';
				    }
				    /* Check Bloglovin */
				    if( $follow_bloglovin ) {
				        echo '<li><a href="'.esc_url( $follow_bloglovin ).'" target="_blank"><i class="fas fa-heart"></i></a></li>';
				    }
				    /* Check Pinterest */
					if( $follow_pinterest ) {
				        echo '<li><a href="'.esc_url( $follow_pinterest ).'" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>';
				    }
				    /* Check Instagram */
					if( $follow_instagram ) {
						echo '<li><a href="'.esc_url( $follow_instagram ).'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
				    }
				    /* Check Tumblr */
					if( $follow_tumblr ) {
						echo '<li><a href="'.esc_url( $follow_tumblr ).'" target="_blank"><i class="fab fa-tumblr"></i></a></li>';
					}
					/* Check Faceboox */
					if( $follow_youtube ) {
				    	echo '<li><a href="'.esc_url( $follow_youtube ).'" target="_blank"><i class="fab fa-youtube"></i></a></li>';
				    }
				    /* Check Dribbble */
					if( $follow_dribbble ) {
				        echo '<li><a href="'.esc_url( $follow_dribbble ).'" target="_blank"><i class="fab fa-dribbble"></i></a></li>';
				    }
				    /* Check SoundCloud */
					if( $follow_soundcloud ) {
				        echo '<li><a href="'.esc_url( $follow_soundcloud ).'" target="_blank"><i class="fab fa-soundcloud"></i></a></li>';
				    }
				    /* Check Vimeo */
					if( $follow_vimeo ) {
				        echo '<li><a href="'.esc_url( $follow_vimeo ).'" target="_blank"><i class="fab fa-vimeo-v"></i></a></li>';
				    }
				    /* Check Linkedin */
					if( $follow_linkedin ) {
						echo '<li><a href="'.esc_url( $follow_linkedin ).'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
				    }
				    /* Check Rss */
					if( $follow_rss ) {
						echo '<li><a href="'.esc_url( $follow_rss ).'" target="_blank"><i class="fas fa-rss"></i></a></li>';
				    }
        		echo '</ul>';
        	endif;

        	echo $args['after_widget'];	        
		}
			
		// Widget Backend 
		public function form( $instance ) {
			$title 				= ( isset( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Follow Us', 'paperio-addons' );
			$follow_facebook 	= ( isset( $instance['follow_facebook'] ) ) ? $instance['follow_facebook'] : '';
			$follow_twitter 	= ( isset( $instance['follow_twitter'] ) ) ? $instance['follow_twitter'] : '';
			$follow_gplus 		= ( isset( $instance['follow_gplus'] ) ) ? $instance['follow_gplus'] : '';
			$follow_bloglovin 	= ( isset( $instance['follow_bloglovin'] ) ) ? $instance['follow_bloglovin'] : '';
			$follow_pinterest 	= ( isset( $instance['follow_pinterest'] ) ) ? $instance['follow_pinterest'] : '';
			$follow_instagram 	= ( isset( $instance['follow_instagram'] ) ) ? $instance['follow_instagram'] : '';
			$follow_tumblr 		= ( isset( $instance['follow_tumblr'] ) ) ? $instance['follow_tumblr'] : '';
			$follow_youtube 	= ( isset( $instance['follow_youtube'] ) ) ? $instance['follow_youtube'] : '';
			$follow_dribbble 	= ( isset( $instance['follow_dribbble'] ) ) ? $instance['follow_dribbble'] : '';
			$follow_soundcloud 	= ( isset( $instance['follow_soundcloud'] ) ) ? $instance['follow_soundcloud'] : '';
			$follow_vimeo 		= ( isset( $instance['follow_vimeo'] ) ) ? $instance['follow_vimeo'] : '';
			$follow_linkedin 	= ( isset( $instance['follow_linkedin'] ) ) ? $instance['follow_linkedin'] : '';
			$follow_rss 		= ( isset( $instance['follow_rss'] ) ) ? $instance['follow_rss'] : '';

		    // Widget admin form
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'follow_facebook' ); ?>"><?php esc_html_e( 'Facebook:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_facebook' ); ?>" name="<?php echo $this->get_field_name( 'follow_facebook' ); ?>" type="text" value="<?php echo esc_attr( $follow_facebook ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'follow_twitter' ); ?>"><?php esc_html_e( 'Twitter:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_twitter' ); ?>" name="<?php echo $this->get_field_name( 'follow_twitter' ); ?>" type="text" value="<?php echo esc_attr( $follow_twitter ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'follow_gplus' ); ?>"><?php esc_html_e( 'Google Plus:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_gplus' ); ?>" name="<?php echo $this->get_field_name( 'follow_gplus' ); ?>" type="text" value="<?php echo esc_attr( $follow_gplus ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'follow_bloglovin' ); ?>"><?php esc_html_e( 'Bloglovin:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_bloglovin' ); ?>" name="<?php echo $this->get_field_name( 'follow_bloglovin' ); ?>" type="text" value="<?php echo esc_attr( $follow_bloglovin ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'follow_pinterest' ); ?>"><?php esc_html_e( 'Pinterest:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_pinterest' ); ?>" name="<?php echo $this->get_field_name( 'follow_pinterest' ); ?>" type="text" value="<?php echo esc_attr( $follow_pinterest ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'follow_instagram' ); ?>"><?php esc_html_e( 'Instagram:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_instagram' ); ?>" name="<?php echo $this->get_field_name( 'follow_instagram' ); ?>" type="text" value="<?php echo esc_attr( $follow_instagram ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'follow_tumblr' ); ?>"><?php esc_html_e( 'Tumblr:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_tumblr' ); ?>" name="<?php echo $this->get_field_name( 'follow_tumblr' ); ?>" type="text" value="<?php echo esc_attr( $follow_tumblr ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'follow_youtube' ); ?>"><?php esc_html_e( 'Youtube:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_youtube' ); ?>" name="<?php echo $this->get_field_name( 'follow_youtube' ); ?>" type="text" value="<?php echo esc_attr( $follow_youtube ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'follow_dribbble' ); ?>"><?php esc_html_e( 'Dribbble:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_dribbble' ); ?>" name="<?php echo $this->get_field_name( 'follow_dribbble' ); ?>" type="text" value="<?php echo esc_attr( $follow_dribbble ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'follow_soundcloud' ); ?>"><?php esc_html_e( 'Soundcloud:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_soundcloud' ); ?>" name="<?php echo $this->get_field_name( 'follow_soundcloud' ); ?>" type="text" value="<?php echo esc_attr( $follow_soundcloud ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'follow_vimeo' ); ?>"><?php esc_html_e( 'Vimeo:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_vimeo' ); ?>" name="<?php echo $this->get_field_name( 'follow_vimeo' ); ?>" type="text" value="<?php echo esc_attr( $follow_vimeo ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'follow_linkedin' ); ?>"><?php esc_html_e( 'Linkedin:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_linkedin' ); ?>" name="<?php echo $this->get_field_name( 'follow_linkedin' ); ?>" type="text" value="<?php echo esc_attr( $follow_linkedin ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'follow_rss' ); ?>"><?php esc_html_e( 'RSS Link:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'follow_rss' ); ?>" name="<?php echo $this->get_field_name( 'follow_rss' ); ?>" type="text" value="<?php echo esc_attr( $follow_rss ); ?>" />
			</p>

		<?php 
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['title'] 				= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['follow_facebook'] 	= ( ! empty( $new_instance['follow_facebook'] ) ) ? strip_tags( $new_instance['follow_facebook'] ) : '';
			$instance['follow_twitter'] 	= ( ! empty( $new_instance['follow_twitter'] ) ) ? strip_tags( $new_instance['follow_twitter'] ) : '';
			$instance['follow_gplus'] 		= ( ! empty( $new_instance['follow_gplus'] ) ) ? strip_tags( $new_instance['follow_gplus'] ) : '';
			$instance['follow_bloglovin'] 	= ( ! empty( $new_instance['follow_bloglovin'] ) ) ? strip_tags( $new_instance['follow_bloglovin'] ) : '';
			$instance['follow_pinterest'] 	= ( ! empty( $new_instance['follow_pinterest'] ) ) ? strip_tags( $new_instance['follow_pinterest'] ) : '';
			$instance['follow_instagram'] 	= ( ! empty( $new_instance['follow_instagram'] ) ) ? strip_tags( $new_instance['follow_instagram'] ) : '';
			$instance['follow_tumblr'] 		= ( ! empty( $new_instance['follow_tumblr'] ) ) ? strip_tags( $new_instance['follow_tumblr'] ) : '';
			$instance['follow_youtube'] 	= ( ! empty( $new_instance['follow_youtube'] ) ) ? strip_tags( $new_instance['follow_youtube'] ) : '';
			$instance['follow_dribbble'] 	= ( ! empty( $new_instance['follow_dribbble'] ) ) ? strip_tags( $new_instance['follow_dribbble'] ) : '';
			$instance['follow_soundcloud'] 	= ( ! empty( $new_instance['follow_soundcloud'] ) ) ? strip_tags( $new_instance['follow_soundcloud'] ) : '';
			$instance['follow_vimeo'] 		= ( ! empty( $new_instance['follow_vimeo'] ) ) ? strip_tags( $new_instance['follow_vimeo'] ) : '';
			$instance['follow_linkedin'] 	= ( ! empty( $new_instance['follow_linkedin'] ) ) ? strip_tags( $new_instance['follow_linkedin'] ) : '';
			$instance['follow_rss'] 		= ( ! empty( $new_instance['follow_rss'] ) ) ? strip_tags( $new_instance['follow_rss'] ) : '';

			return $instance;
		}
	}
}

// Register and load Paperio custom widget
if ( ! function_exists( 'paperio_load_follow_us_widget' ) ) :
	function paperio_load_follow_us_widget() {
		register_widget( 'paperio_follow_us_widget' );
	}
	add_action( 'widgets_init', 'paperio_load_follow_us_widget' );
endif;

/*******************************************************************************/
/* End Instagram Widget */
/*******************************************************************************/