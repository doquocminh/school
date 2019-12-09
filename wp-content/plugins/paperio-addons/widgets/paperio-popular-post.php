<?php
/**
 * @package Paperio
 */
?>
<?php

/*******************************************************************************/
/* Start Paperio Popular Post Widget */
/*******************************************************************************/

if( ! class_exists( 'paperio_popular_post_widget' ) ) {

	class paperio_popular_post_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'paperio_popular_post_widget',
			esc_html__('Paperio - Popular Post', 'paperio-addons'),
			array( 'description' => esc_html__( 'Your site most Popular Posts.', 'paperio-addons' ), )
			);
		}

		public function widget( $args, $instance ) {
		    
		    $title = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'Popular Post', 'paperio-addons' );
		    $tz_popular_post_date_format = ( isset( $instance['tz_popular_post_date_format'] ) ) ? $instance['tz_popular_post_date_format'] : 'F j, Y';
			$tz_popular_post_orderby = ( isset( $instance['tz_popular_post_orderby'] ) ) ? $instance['tz_popular_post_orderby'] : 'date';
			$tz_popular_post_sortby = ( isset( $instance['tz_popular_post_sortby'] ) ) ? $instance['tz_popular_post_sortby'] : 'DESC';
			$tz_popular_post_postperpage = ( isset( $instance['tz_popular_post_postperpage'] ) ) ? $instance['tz_popular_post_postperpage'] : '4';
			$tz_popular_post_thumbnail = ( isset( $instance['tz_popular_post_thumbnail'] ) ) ? $instance['tz_popular_post_thumbnail'] : '';

			echo $args['before_widget'];

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			
			/* Check sticky post */
        	$tz_sticky_posts = get_option( 'sticky_posts' );

			$post_display_order_args = array(
												'orderby' => $tz_popular_post_orderby,
												'order' => $tz_popular_post_sortby,
											);
			

			
			$recent_post = array(
									'post_type' => 'post',
									'post__not_in' => $tz_sticky_posts,
									'posts_per_page' => $tz_popular_post_postperpage,
								);

			$recent_post_args = array_merge($recent_post, $post_display_order_args);
			
			$the_query = new WP_Query( $recent_post_args );

			if ( $the_query->have_posts() ) {
				echo '<div class="popular-post-wrapper">';
				while ( $the_query->have_posts() ) { 
					$the_query->the_post();

					$tz_widget_post_class_list =  $tz_widget_post_margin_class = '';
					if ( 0 === $the_query->current_post ) {
			            $tz_widget_post_class_list .= ' first-post';
			            $tz_widget_post_margin_class .= ' margin-bottom-15 sm-margin-three-bottom xs-margin-three-bottom';
			        } elseif ( ( $the_query->current_post + 1 ) === $the_query->post_count ) {
			            $tz_widget_post_class_list .= ' last-post';
			        }else{
			        	$tz_widget_post_margin_class .= ' margin-bottom-15 sm-margin-three-bottom xs-margin-three-bottom';
			        }

					echo '<div class="col-sm-12 col-xs-12 text-extra-small no-padding-lr blog-list'.$tz_widget_post_margin_class.$tz_widget_post_class_list.'">';
						
						if( $tz_popular_post_thumbnail == 'on' ) {
							if ( has_post_thumbnail() ) {
								echo '<div class="blog-thumbnail fl-left">';
									echo '<a href="'.get_permalink().'">';
						                the_post_thumbnail( 'paperio-popular-posts-thumb' );
						            echo '</a>';
						        echo '</div>';
						    }							
						}
						echo '<div class="blog-con">';
							echo '<p class="text-uppercase margin-three-bottom"><a href="'.get_permalink().'">'.get_the_title().'</a></p>';
							if( $tz_popular_post_date_format ):
								echo '<span>'.get_the_date( $tz_popular_post_date_format ).'</span>';
							endif;
						echo '</div>';
					echo '</div>';
				}
				echo '</div>';
			}
			wp_reset_postdata();
	        echo $args['after_widget'];
		}
			
		// Widget Backend 
		public function form( $instance ) {
			$title 							= ( isset( $instance['title'] ) ) ? $instance['title'] : esc_html__('Popular Post', 'paperio-addons');
			$tz_popular_post_date_format    = ( isset( $instance['tz_popular_post_date_format'] ) ) ? $instance['tz_popular_post_date_format'] : 'F j, Y';
			$tz_popular_post_orderby  		= ( isset( $instance['tz_popular_post_orderby'] ) ) ? $instance['tz_popular_post_orderby'] : 'date';
			$tz_popular_post_sortby  		= ( isset( $instance['tz_popular_post_sortby'] ) ) ? $instance['tz_popular_post_sortby'] : 'DESC';
			$tz_popular_post_postperpage	= ( isset( $instance['tz_popular_post_postperpage'] ) ) ? $instance['tz_popular_post_postperpage'] : '4';

			$tz_popular_post_thumbnail = ( isset( $instance['tz_popular_post_thumbnail'] ) && $instance['tz_popular_post_thumbnail'] == 'on' ) ? 'checked="checked"' : '';

			// Widget admin form
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">
					<?php esc_html_e( 'Title:', 'paperio-addons' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_popular_post_date_format' ); ?>">
					<?php esc_html_e( 'Date Format:', 'paperio-addons' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_popular_post_date_format' ); ?>" name="<?php echo $this->get_field_name( 'tz_popular_post_date_format' ); ?>" type="text" value="<?php echo esc_attr( $tz_popular_post_date_format ); ?>" />
			</p>
			<p>
	        	<label for="<?php echo $this->get_field_id( 'tz_popular_post_orderby' ); ?>">
					<?php esc_html_e( 'Order by:', 'paperio-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'tz_popular_post_orderby' ); ?>" id="tz-popular-post" class="widefat">
	                <option value="date"<?php echo esc_attr( $tz_popular_post_orderby == 'date' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Date', 'paperio-addons' ); ?></option>
	                <option value="ID"<?php echo esc_attr( $tz_popular_post_orderby == 'ID' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'ID', 'paperio-addons' ); ?></option>
	                <option value="author"<?php echo esc_attr( $tz_popular_post_orderby == 'author' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Author', 'paperio-addons' ); ?></option>
	                <option value="title"<?php echo esc_attr( $tz_popular_post_orderby == 'title' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Title', 'paperio-addons' ); ?></option>
	                <option value="modified"<?php echo esc_attr( $tz_popular_post_orderby == 'modified' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Modified Date', 'paperio-addons' ); ?></option>
	                <option value="rand"<?php echo esc_attr( $tz_popular_post_orderby == 'rand' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Random', 'paperio-addons' ); ?></option>
	                <option value="comment_count"<?php echo esc_attr( $tz_popular_post_orderby == 'comment_count' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Comment count', 'paperio-addons' ); ?></option>
	                <option value="menu_order"<?php echo esc_attr( $tz_popular_post_orderby == 'menu_order' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Menu order', 'paperio-addons' ); ?></option>
				</select>
	        </p>
	        <p>
	        	<label for="<?php echo $this->get_field_id( 'tz_popular_post_sortby' ); ?>">
					<?php esc_html_e( 'Sort order:', 'paperio-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'tz_popular_post_sortby' ); ?>" id="tz-recent-category" class="widefat">
	                <option value="DESC"<?php echo esc_attr( $tz_popular_post_sortby == 'DESC' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Descending', 'paperio-addons' ); ?></option>
	                <option value="ASC"<?php echo esc_attr( $tz_popular_post_sortby == 'ASC' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Ascending', 'paperio-addons' ); ?></option>
				</select>
	        </p>
	        <p>
				<label for="<?php echo $this->get_field_id( 'tz_popular_post_postperpage' ); ?>">
					<?php esc_html_e( 'Number of posts to show:', 'paperio-addons' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_popular_post_postperpage' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'tz_popular_post_postperpage' ); ?>" type="text" value="<?php echo esc_attr( $tz_popular_post_postperpage ); ?>" />
			</p>
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_popular_post_thumbnail' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'tz_popular_post_thumbnail' ); ?>" type="checkbox" <?php echo $tz_popular_post_thumbnail; ?> />
				<label for="<?php echo $this->get_field_id( 'tz_popular_post_thumbnail' ); ?>">
					<?php esc_html_e( 'Display Thumbnail?', 'paperio-addons' ); ?>
				</label>
			</p>
		<?php 
		}

		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['tz_popular_post_date_format'] = ( ! empty( $new_instance['tz_popular_post_date_format'] ) ) ? strip_tags( $new_instance['tz_popular_post_date_format'] ) : '';
			$instance['tz_popular_post_orderby'] = ( ! empty( $new_instance['tz_popular_post_orderby'] ) ) ? strip_tags( $new_instance['tz_popular_post_orderby'] ) : '';
			$instance['tz_popular_post_sortby'] = ( ! empty( $new_instance['tz_popular_post_sortby'] ) ) ? strip_tags( $new_instance['tz_popular_post_sortby'] ) : '';
			$instance['tz_popular_post_postperpage'] = ( ! empty( $new_instance['tz_popular_post_postperpage'] ) ) ? strip_tags( $new_instance['tz_popular_post_postperpage'] ) : '';
			$instance['tz_popular_post_thumbnail'] = ( ! empty( $new_instance['tz_popular_post_thumbnail'] ) ) ? strip_tags( $new_instance['tz_popular_post_thumbnail'] ) : '';

			return $instance;
		}
	}
}

// Register and load Paperio custom widget
if ( ! function_exists( 'paperio_load_popular_post_widget' ) ) :
	function paperio_load_popular_post_widget() {
		register_widget( 'paperio_popular_post_widget' );
	}
	add_action( 'widgets_init', 'paperio_load_popular_post_widget' );
endif;

/*******************************************************************************/
/* End Paperio Popular Post Widget */
/*******************************************************************************/