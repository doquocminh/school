<?php
/**
 * @package Paperio
 */
?>
<?php

/*******************************************************************************/
/* Start About Me Widget */
/*******************************************************************************/

if( !class_exists( 'paperio_recent_menu_post_widget' ) ) {

	class paperio_recent_menu_post_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'paperio_recent_menu_post_widget',
			esc_html__('Paperio - Menu Recent Post', 'paperio-addons'),
			array( 'description' => esc_html__( 'Your site most Recent Posts.', 'paperio-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {

			$title = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'Recent Post', 'paperio-addons' );
			$tz_column_type = ( isset( $instance['tz_column_type'] ) ) ? $instance['tz_column_type'] : 'four-column';
			$tz_recent_category = ( isset( $instance['tz_recent_category'] ) ) ? $instance['tz_recent_category'] : '';
			$tz_recent_category_orderby = ( isset( $instance['tz_recent_category_orderby'] ) ) ? $instance['tz_recent_category_orderby'] : 'date';

			$tz_recent_category_sortby = ( isset( $instance['tz_recent_category_sortby'] ) ) ? $instance['tz_recent_category_sortby'] : 'DESC';
			$postperpage = ( isset( $instance['postperpage'] ) ) ? $instance['postperpage'] : '4';
			$thumbnail = ( isset( $instance['thumbnail'] ) ) ? $instance['thumbnail'] : '';
			$tz_show_full_post_title = ( isset( $instance['tz_show_full_post_title'] ) ) ? $instance['tz_show_full_post_title'] : '';

			
			echo $args['before_widget'];

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			/* Check sticky post */
        	$tz_sticky_posts = get_option( 'sticky_posts' );

			$tz_recent_category = ( $tz_recent_category != 'all' ) ? $tz_recent_category : '';
			
			$recent_post = array(
									'post_type' => 'post',
									'category_name'  => $tz_recent_category,
									'post__not_in' => $tz_sticky_posts,
									'orderby' => $tz_recent_category_orderby,
									'order' => $tz_recent_category_sortby,
									'posts_per_page' => $postperpage,
								);

			$recent_menu_post_query = new WP_Query( $recent_post );

			$tz_post_classes = '';
			switch( $tz_column_type ) {
		        case 'one-column':
		            $tz_post_classes = ' class="col-md-12 col-sm-12 col-xs-12"';
		        break;

		        case 'two-column':
		            $tz_post_classes = ' class="col-md-6 col-sm-6 col-xs-12"';
		        break;
		        
		        case 'three-column':
		            $tz_post_classes = ' class="col-md-4 col-sm-6 col-xs-12"';
		        break;

		        case 'four-column':
		            $tz_post_classes = ' class="col-md-3 col-sm-3 col-xs-12"';
		        break;

		        case 'six-column':
		            $tz_post_classes = ' class="col-md-2 col-sm-6 col-xs-12"';
		        break;
		    }

			if ( $recent_menu_post_query->have_posts() ) :
				echo '<ul class="blog-recent-posts no-padding">';
				while ( $recent_menu_post_query->have_posts() ) : $recent_menu_post_query->the_post();
				echo '<li'.$tz_post_classes.'>';
					$menu_title = get_the_title();
					if ($tz_show_full_post_title != 'on' ) {
						if( strlen( $menu_title ) > 28 ){
				            $menu_title = substr( $menu_title, 0, 28 ).' ...';
				        } else {
				            $menu_title = $menu_title;
				        }
					}
					echo '<a href="'.get_permalink().'" class="dropdown-header menu-post-title">'.$menu_title.'</a>';
					if( $thumbnail == 'on' ) {
						echo '<a href="'.get_permalink().'">';
							if ( has_post_thumbnail() ) {
				                the_post_thumbnail( 'medium' );
				            }
						echo '</a>';
					}
				echo '</li>';
				endwhile;
				echo '</ul>';
			?>

			<?php wp_reset_postdata(); ?>

			<?php else : ?>
			<p><?php echo __( 'Sorry, no posts matched your criteria.', 'paperio-addons' ); ?></p>
			<?php endif;

	        echo $args['after_widget'];
		}

		// Widget Backend 
		public function form( $instance ) {
			// Get All Category List.
			$args = array(
		  	  'hide_empty' => 0,
		  	  'orderby' => 'name',
		  	  'order' => 'ASC'
		    );
		    $categories = get_categories( $args );

			$title = ( isset( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : esc_html__( 'Recent Post', 'paperio-addons' );
			$tz_column_type = ( isset( $instance[ 'tz_column_type' ] ) ) ? $instance[ 'tz_column_type' ] : 'four-column';
			$tz_recent_category  = ( isset( $instance[ 'tz_recent_category' ] ) ) ? $instance[ 'tz_recent_category' ] : 'all';
			$tz_recent_category_orderby  = ( isset( $instance[ 'tz_recent_category_orderby' ] ) ) ? $instance[ 'tz_recent_category_orderby' ] : 'date';
			$tz_recent_category_sortby  = ( isset( $instance[ 'tz_recent_category_sortby' ] ) ) ? $instance[ 'tz_recent_category_sortby' ] : 'DESC';
			$postperpage = ( isset($instance[ 'postperpage' ] ) ) ? $instance[ 'postperpage' ] : '4';
			if( isset($instance['thumbnail'])){
				$thumbnail = ($instance['thumbnail'] == 'on') ? 'checked="checked"' : '';
			} else{
				$thumbnail = '';
			}
			if( isset($instance['tz_show_full_post_title'])){
				$tz_show_full_post_title = ($instance['tz_show_full_post_title'] == 'on') ? 'checked="checked"' : '';
			} else{
				$tz_show_full_post_title = '';
			}

			// Widget admin form
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">
					<?php esc_html_e( 'Title:', 'paperio-addons' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
	        	<label for="<?php echo $this->get_field_id( 'tz_column_type' ); ?>">
					<?php esc_html_e( 'Column Type:', 'paperio-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'tz_column_type' ); ?>" id="tz-column-type" class="widefat">
	                <option value="one-column"<?php echo esc_attr( $tz_column_type == 'one-column' ) ? ' selected="selected"' : ''; ?>><?php echo __( '1 Column', 'paperio-addons' ); ?></option>
	                <option value="two-column"<?php echo esc_attr( $tz_column_type == 'two-column' ) ? ' selected="selected"' : ''; ?>><?php echo __( '2 Columns', 'paperio-addons' ); ?></option>
	                <option value="three-column"<?php echo esc_attr( $tz_column_type == 'three-column' ) ? ' selected="selected"' : ''; ?>><?php echo __( '3 Columns', 'paperio-addons' ); ?></option>
	                <option value="four-column"<?php echo esc_attr( $tz_column_type == 'four-column' ) ? ' selected="selected"' : ''; ?>><?php echo __( '4 Columns', 'paperio-addons' ); ?></option>
	                <option value="six-column"<?php echo esc_attr( $tz_column_type == 'six-column' ) ? ' selected="selected"' : ''; ?>><?php echo __( '6 Columns', 'paperio-addons' ); ?></option>
				</select>
				<small><?php echo __( "It's only work in Menu", "paperio-addons" ); ?></small>
	        </p>

			<p>
				<label for="<?php echo $this->get_field_id( 'tz_recent_category' ); ?>">
					<?php esc_html_e( 'Select Category:', 'paperio-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'tz_recent_category' ); ?>" id="tz-recent-category" class="widefat">
	                <option value="all"<?php echo esc_attr( $tz_recent_category == 'all' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'All Categories', 'paperio-addons' ); ?></option>
	                <?php
	                	foreach ( $categories as $key => $data ) { ?>
	                	<?php echo $this->get_field_id( 'tz_recent_category' ).' -> '. $data->slug; ?>
				      	<option value="<?php echo $data->slug ?>"<?php echo esc_attr( $tz_recent_category == $data->slug ) ? ' selected="selected"' : ''; ?>><?php echo $data->name; ?></option>
				    	<?php }
	                ?>
	            </select>
	        </p>
	        <p>
	        	<label for="<?php echo $this->get_field_id( 'tz_recent_category_orderby' ); ?>">
					<?php esc_html_e( 'Order by:', 'paperio-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'tz_recent_category_orderby' ); ?>" id="tz-recent-category" class="widefat">
	                <option value="date"<?php echo esc_attr( $tz_recent_category_orderby == 'date' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Date', 'paperio-addons' ); ?></option>
	                <option value="ID"<?php echo esc_attr( $tz_recent_category_orderby == 'ID' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'ID', 'paperio-addons' ); ?></option>
	                <option value="author"<?php echo esc_attr( $tz_recent_category_orderby == 'author' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Author', 'paperio-addons' ); ?></option>
	                <option value="title"<?php echo esc_attr( $tz_recent_category_orderby == 'title' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Title', 'paperio-addons' ); ?></option>
	                <option value="modified"<?php echo esc_attr( $tz_recent_category_orderby == 'modified' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Modified Date', 'paperio-addons' ); ?></option>
	                <option value="rand"<?php echo esc_attr( $tz_recent_category_orderby == 'rand' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Random', 'paperio-addons' ); ?></option>
	                <option value="comment_count"<?php echo esc_attr( $tz_recent_category_orderby == 'comment_count' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Comment count', 'paperio-addons' ); ?></option>
	                <option value="menu_order"<?php echo esc_attr( $tz_recent_category_orderby == 'menu_order' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Menu order', 'paperio-addons' ); ?></option>
				</select>
	        </p>
	        <p>
	        	<label for="<?php echo $this->get_field_id( 'tz_recent_category_sortby' ); ?>">
					<?php esc_html_e( 'Sort order:', 'paperio-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'tz_recent_category_sortby' ); ?>" id="tz-recent-category" class="widefat">
	                <option value="DESC"<?php echo esc_attr( $tz_recent_category_sortby == 'DESC' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Descending', 'paperio-addons' ); ?></option>
	                <option value="ASC"<?php echo esc_attr( $tz_recent_category_sortby == 'ASC' ) ? ' selected="selected"' : ''; ?>><?php echo __( 'Ascending', 'paperio-addons' ); ?></option>
				</select>
	        </p>
			<p>
				<label for="<?php echo $this->get_field_id( 'postperpage' ); ?>">
					<?php esc_html_e( 'Number of posts to show:', 'paperio-addons' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'postperpage' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'postperpage' ); ?>" type="text" value="<?php echo esc_attr( $postperpage ); ?>" />
			</p>
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'thumbnail' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" type="checkbox" <?php echo $thumbnail; ?> />
				<label for="<?php echo $this->get_field_id( 'thumbnail' ); ?>">
					<?php esc_html_e( 'Display Thumbnail?', 'paperio-addons' ); ?>
				</label>
			</p>
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_show_full_post_title' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'tz_show_full_post_title' ); ?>" type="checkbox" <?php echo $tz_show_full_post_title; ?> />
				<label for="<?php echo $this->get_field_id( 'tz_show_full_post_title' ); ?>">
					<?php esc_html_e( 'Show Full Post Title?', 'paperio-addons' ); ?>
				</label>
			</p>
		<?php 
		}

		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['tz_column_type'] = ( ! empty( $new_instance['tz_column_type'] ) ) ? strip_tags( $new_instance['tz_column_type'] ) : 'four-column';
			$instance['tz_recent_category'] = ( ! empty( $new_instance['tz_recent_category'] ) ) ? strip_tags( $new_instance['tz_recent_category'] ) : '';
			$instance['tz_recent_category_orderby'] = ( ! empty( $new_instance['tz_recent_category_orderby'] ) ) ? strip_tags( $new_instance['tz_recent_category_orderby'] ) : '';
			$instance['tz_recent_category_sortby'] = ( ! empty( $new_instance['tz_recent_category_sortby'] ) ) ? strip_tags( $new_instance['tz_recent_category_sortby'] ) : '';
			$instance['postperpage'] = ( ! empty( $new_instance['postperpage'] ) ) ? strip_tags( $new_instance['postperpage'] ) : '';
			$instance['thumbnail'] = ( ! empty( $new_instance['thumbnail'] ) ) ? strip_tags( $new_instance['thumbnail'] ) : '';
			$instance['tz_show_full_post_title'] = ( ! empty( $new_instance['tz_show_full_post_title'] ) ) ? strip_tags( $new_instance['tz_show_full_post_title'] ) : '';

		   return $instance;
		}
	}
}

// Register and load Paperio custom widget
if ( ! function_exists( 'paperio_load_recent_menu_post_widget' ) ) :
	function paperio_load_recent_menu_post_widget() {
		register_widget( 'paperio_recent_menu_post_widget' );
	}
endif;
add_action( 'widgets_init', 'paperio_load_recent_menu_post_widget' );

/*******************************************************************************/
/* End Instagram Widget */
/*******************************************************************************/
?>