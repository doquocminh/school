<?php
/**
 * @package Paperio
 */
?>
<?php

/*******************************************************************************/
/* Start About Me Widget */
/*******************************************************************************/

if (!class_exists('paperio_favourite_quotes_widget')) {

	class paperio_favourite_quotes_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'paperio_favourite_quotes_widget',
			esc_html__('Paperio - Favourite Quotes', 'paperio-addons'),
			array( 'description' => esc_html__( 'Your Favourite Quotes.', 'paperio-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {
			$title = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'Favourite Quotes', 'paperio-addons' );
		    $short_description = ( isset( $instance['short_description'] ) ) ? $instance['short_description'] : '';
            $author_name = ( isset( $instance['author_name'] ) ) ? $instance['author_name'] : '';

			
			// Before widget.
	        echo $args['before_widget'];

	        // Display the widget title if one was input (before and after defined by themes).
	        if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}            
           
	    	// Content
	    	echo '<div class="favorite-quotes-box">';
		       	echo '<i class="fas fa-quote-left text-color fl-left"></i>';
		       	echo '<div class="quote padding-left-twenty-2">';
					echo '<p class="comment text-gray text-large margin-six-bottom sm-margin-one-bottom font-weight-300">'.esc_html( $short_description ).'</p>';
					echo '<span class="text-uppercase text-extra-small text-mid-gray">'.esc_html( $author_name ).'</span>';
			    echo '</div>';
		    echo '</div>';
	       
	        // After widget
	        echo $args['after_widget'];

		}
			
		// Widget Backend 
		public function form( $instance ) { 
	        $defaults = array(
				          	'title'   				=> esc_html__( 'Favourite Quotes', 'paperio-addons' ),
				          	'short_description' 	=> '',
				          	'author_name' 	  		=> ''
	          				);
	        $instance = wp_parse_args( (array) $instance, $defaults );
	        
			?>

			<p>
			   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'paperio-addons' ); ?></label> 
			   <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($instance['title'] ); ?>" />
			</p>
			<p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'short_description' ) ); ?>"><?php esc_html_e('Short Description:', 'paperio-addons' ); ?></label>
	            <textarea name="<?php echo esc_attr( $this->get_field_name( 'short_description' ) ); ?>"  class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'short_description' ) ); ?>" ><?php echo esc_attr($instance['short_description']); ?></textarea>
	        </p>
	        <p>
				<label for="<?php echo $this->get_field_id( 'author_name' ); ?>"><?php esc_html_e( 'Author Name:', 'paperio-addons'); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'author_name' ); ?>" name="<?php echo $this->get_field_name( 'author_name' ); ?>" type="text" value="<?php echo esc_attr($instance['author_name']); ?>" />
			</p>
		<?php
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( !empty($new_instance['title'])) ? strip_tags( $new_instance['title'] ) : '';
			$instance['short_description'] = ( !empty( $new_instance['short_description'] ) ) ? $new_instance['short_description'] : '';
			$instance['author_name'] = (!empty( $new_instance['author_name'] ) ) ? $new_instance['author_name'] : '';
			return $instance;
		}
	}
}

// Register and load the widget
if ( ! function_exists( 'paperio_load_favourite_quotes_widget' ) ) :
	function paperio_load_favourite_quotes_widget() 
	{
		
		register_widget('paperio_favourite_quotes_widget');
	}
endif;
add_action( 'widgets_init', 'paperio_load_favourite_quotes_widget' );

/*******************************************************************************/
/* End Instagram Widget */
/*******************************************************************************/
?>