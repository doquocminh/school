<?php
/**
 * @package Paperio
 */
?>
<?php

/*******************************************************************************/
/* Start Twitter Widget */
/*******************************************************************************/

if( ! class_exists( 'Paperio_Twitter_Widget' ) ) {

	class Paperio_Twitter_Widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'Paperio_Twitter_Widget',
			esc_html__( 'Paperio - Twitter Feed', 'paperio-addons' ),
			array( 'description' => esc_html__( 'A widget to display Twitter feed.', 'paperio-addons' ), )
			);
		}

		public function widget( $args, $instance ) {

			$title = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'Recent Tweets', 'paperio-addons' );
			$tz_twitter_user_name = ( isset( $instance['tz_twitter_user_name'] ) ) ? $instance['tz_twitter_user_name'] : '';
			$tz_twitter_consumer_key = ( isset( $instance['tz_twitter_consumer_key'] ) ) ? $instance['tz_twitter_consumer_key'] : '';
			$tz_twitter_consumer_secret = ( isset( $instance['tz_twitter_consumer_secret'] ) ) ? $instance['tz_twitter_consumer_secret'] : '';
			$tz_twitter_access_token = ( isset( $instance['tz_twitter_access_token'] ) ) ? $instance['tz_twitter_access_token'] : '';
			$tz_twitter_access_token_secret = ( isset( $instance['tz_twitter_access_token_secret'] ) ) ? $instance['tz_twitter_access_token_secret'] : '';
			$tz_twitter_tweet_limit = ( isset( $instance['tz_twitter_tweet_limit'] ) ) ? $instance['tz_twitter_tweet_limit'] : '3';

			$twitter_link = 'https://apps.twitter.com/';

			// Before widget.
			echo $args['before_widget'];

		  	if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			
			if( empty( $tz_twitter_user_name ) || empty( $tz_twitter_consumer_key ) || empty( $tz_twitter_consumer_secret ) || empty( $tz_twitter_access_token ) || empty( $tz_twitter_access_token_secret ) ) {
				echo '<strong>'.__( 'Please fill all widget settings!', 'paperio-addons' ).'</strong>';
				echo $args['after_widget'];
				return;
			}

			if( ! file_exists( PAPERIO_ADDONS_DIR_ROOT.'/widgets/twitteroauth/twitteroauth.php' ) ) {
				echo '<strong>'.__( 'Couldn\'t find twitteroauth.php!', 'paperio-addons').'</strong>';
				echo $args['after_widget'];
				return;
			}

			require_once( PAPERIO_ADDONS_DIR_ROOT.'/widgets/twitteroauth/twitteroauth.php' );

			$tz_twitter_feed_connection = $this->paperio_get_connection_with_access_token( $tz_twitter_consumer_key, $tz_twitter_consumer_secret, $tz_twitter_access_token, $tz_twitter_access_token_secret );
			
			$tweets = $tz_twitter_feed_connection->get( "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$tz_twitter_user_name."&count=".$tz_twitter_tweet_limit ) or 
				die( 'Couldn\'t retrieve tweets! Wrong username?' );

			if( ! empty( $tweets->errors ) ) {
				if( $tweets->errors[0]->message == 'Invalid or expired token' ) {
					echo '<strong>'.$tweets->errors[0]->message.'!</strong><br />' . __( 'You\'ll need to regenerate it ', 'paperio-addons' ).'<a href="'.esc_url( $twitter_link ).'" target="_blank">'.__( 'here', 'paperio-addons' ).'</a>!';
					echo $args['after_widget'];
				} else {
					echo '<strong>'.$tweets->errors[0]->message.'</strong>';
					echo $args['after_widget'];
				}
				return;
			}

			$tweets_array = array();
			for( $i = 0; $i <= count( $tweets ); $i++ ){
				if( ! empty( $tweets[$i] ) ) {
					$tweets_array[$i]['created_at'] = $tweets[$i]->created_at;
					
					//clean tweet text
					$tweets_array[$i]['text'] = preg_replace( '/[\x{10000}-\x{10FFFF}]/u', '', $tweets[$i]->text );
					
					if( ! empty( $tweets[$i]->id_str ) ) {
						$tweets_array[$i]['status_id'] = $tweets[$i]->id_str;			
					}
				}	
			}
			update_option( 'tp_twitter_plugin_tweets', serialize( $tweets_array ) );

			$tp_twitter_plugin_tweets = maybe_unserialize( get_option( 'tp_twitter_plugin_tweets' ) );
			if( ! empty( $tp_twitter_plugin_tweets ) && is_array( $tp_twitter_plugin_tweets ) ) {
				echo '<div class="paperio-twitter-wrapper">';
					echo '<ul>';
					$tz_tweet_counter = '1';
					foreach( $tp_twitter_plugin_tweets as $tweet ) {					
						if( ! empty( $tweet['text'] ) ) {
							if( empty( $tweet['status_id'] ) ) { $tweet['status_id'] = ''; }
							if( empty( $tweet['created_at'] ) ) { $tweet['created_at'] = ''; }
						
							echo '<li><span>'.$this->paperio_convert_links( $tweet['text'] ).'</span><a class="twitter_time" target="_blank" href="http://twitter.com/'.$tz_twitter_user_name.'/statuses/'.$tweet['status_id'].'">'.$this->paperio_relative_time( $tweet['created_at'] ).'</a></li>';
							if( $tz_tweet_counter == $tz_twitter_tweet_limit ){ break; }
							$tz_tweet_counter++;
						}
					}
				
				echo '</ul>';

				echo '</div>';
			} else {
				echo '<div class="paperio-twitter-wrapper">';
					echo __( '<b>Error!</b> Couldn\'t retrieve tweets for some reason!', 'paperio-addons' );
				echo '</div>';
			}

			// After widget
			echo $args['after_widget'];

		}
		
		public function paperio_get_connection_with_access_token( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret ) {
			$tz_twitter_feed_connection = new TwitterOAuth( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret );
			return $tz_twitter_feed_connection;
		}

		//convert links to clickable format
		public function paperio_convert_links( $status, $targetBlank=true, $linkMaxLen=250 ) {
			 
			// the target
				$target=$targetBlank ? " target=\"_blank\" " : "";
			 
			// convert link to url								
				$status = preg_replace('/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[A-Z0-9+&@#\/%=~_|]/i', '<a href="\0" target="_blank">\0</a>', $status);
			 
			// convert @ to follow
				$status = preg_replace("/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" $target >$1</a>",$status);
			 
			// convert # to search
				$status = preg_replace("/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" $target >$1</a>",$status);
			 
			// return the status
				return $status;
		}
		
		//convert dates to readable format	
		public function paperio_relative_time( $a ) {
			//get current timestampt
			$b = strtotime('now'); 
			//get timestamp when tweet created
			$c = strtotime($a);
			//get difference
			$d = $b - $c;
			//calculate different time values
			$minute = 60;
			$hour = $minute * 60;
			$day = $hour * 24;
			$week = $day * 7;
				
			if(is_numeric($d) && $d > 0) {
				//if less then 3 seconds
				if($d < 3) return __( 'right now', 'paperio-addons' );
				//if less then minute
				if($d < $minute) return floor($d) . __( ' seconds ago', 'paperio-addons' );
				//if less then 2 minutes
				if($d < $minute * 2) return __( 'about 1 minute ago', 'paperio-addons' );
				//if less then hour
				if($d < $hour) return floor($d / $minute) . __( ' minutes ago', 'paperio-addons' );
				//if less then 2 hours
				if($d < $hour * 2) return __( 'about 1 hour ago', 'paperio-addons' );
				//if less then day
				if($d < $day) return floor($d / $hour) . __( ' hours ago', 'paperio-addons' );
				//if more then day, but less then 2 days
				if($d > $day && $d < $day * 2) return __( 'yesterday', 'paperio-addons' );
				//if less then year
				if($d < $day * 365) return floor($d / $day) . __( ' days ago', 'paperio-addons' );
				//else return more than a year
				return __( 'over a year ago', 'paperio-addons' );
			}
		}	

		// Widget Backend 
		public function form( $instance ) { 

			$title = ( isset( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Tweets', 'paperio-addons' );
			$tz_twitter_user_name = ( isset( $instance['tz_twitter_user_name'] ) ) ? $instance['tz_twitter_user_name'] : '';
			$tz_twitter_consumer_key = ( isset( $instance['tz_twitter_consumer_key'] ) ) ? $instance['tz_twitter_consumer_key'] : '';
			$tz_twitter_consumer_secret = ( isset( $instance['tz_twitter_consumer_secret'] ) ) ? $instance['tz_twitter_consumer_secret'] : '';
			$tz_twitter_access_token = ( isset( $instance['tz_twitter_access_token'] ) ) ? $instance['tz_twitter_access_token'] : '';
			$tz_twitter_access_token_secret = ( isset( $instance['tz_twitter_access_token_secret'] ) ) ? $instance['tz_twitter_access_token_secret'] : '';
			$tz_twitter_tweet_limit = ( isset( $instance['tz_twitter_tweet_limit'] ) ) ? $instance['tz_twitter_tweet_limit'] : '3';

			$twitter_link = 'https://apps.twitter.com/';

			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'paperio-addons' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>

			<p><?php echo __( 'Get your API keys &amp; tokens at:', 'paperio-addons' ); ?><a href="<?php echo esc_url( $twitter_link );?>" target="_blank"><?php echo esc_url( $twitter_link );?></a></p>

			<p>
				<label for="<?php echo $this->get_field_id( 'tz_twitter_user_name' ); ?>"><?php _e( 'Twitter Username:', 'paperio-addons' ); ?></label>
	            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tz_twitter_user_name' ); ?>" name="<?php echo $this->get_field_name( 'tz_twitter_user_name' ); ?>" value="<?php echo esc_attr( $tz_twitter_user_name ); ?>" />
			</p>										

			<p>
				<label for="<?php echo $this->get_field_id( 'tz_twitter_consumer_key' ); ?>"><?php _e( 'Consumer Key:', 'paperio-addons' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tz_twitter_consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'tz_twitter_consumer_key' ); ?>" value="<?php echo esc_attr( $tz_twitter_consumer_key ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_twitter_consumer_secret' ); ?>"><?php _e( 'Consumer Secret:', 'paperio-addons' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tz_twitter_consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'tz_twitter_consumer_secret' ); ?>" value="<?php echo esc_attr( $tz_twitter_consumer_secret ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_twitter_access_token' ); ?>"><?php _e( 'Access Token:', 'paperio-addons' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tz_twitter_access_token' ); ?>" name="<?php echo $this->get_field_name( 'tz_twitter_access_token' ); ?>" value="<?php echo esc_attr( $tz_twitter_access_token ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_twitter_access_token_secret' ); ?>"><?php _e( 'Access Token Secret:', 'paperio-addons' ); ?></label>
	            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tz_twitter_access_token_secret' ); ?>" name="<?php echo $this->get_field_name( 'tz_twitter_access_token_secret' ); ?>" value="<?php echo esc_attr( $tz_twitter_access_token_secret ); ?>" />
			</p>			
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_twitter_tweet_limit' ); ?>"><?php _e( 'Tweet Limit:', 'paperio-addons' ); ?></label>
	            <select name="<?php echo $this->get_field_name( 'tz_twitter_tweet_limit' ); ?>" id="tz-popular-post" class="widefat">
	            	<?php
		            	$i = 1;
						for($i; $i <= 20; $i++ ){
							echo '<option value="'.$i.'"'; if( $tz_twitter_tweet_limit == $i ){ echo ' selected="selected"'; } echo '>'.$i.'</option>';						
						}
					?>
				</select>
			</p>

		<?php
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['tz_twitter_user_name'] = ( ! empty( $new_instance['tz_twitter_user_name'] ) ) ? strip_tags( $new_instance['tz_twitter_user_name'] ) : '';
			$instance['tz_twitter_consumer_key'] = ( ! empty( $new_instance['tz_twitter_consumer_key'] ) ) ? strip_tags( $new_instance['tz_twitter_consumer_key'] ) : '';
			$instance['tz_twitter_consumer_secret'] = ( ! empty( $new_instance['tz_twitter_consumer_secret'] ) ) ? strip_tags( $new_instance['tz_twitter_consumer_secret'] ) : '';
			$instance['tz_twitter_access_token'] = ( ! empty( $new_instance['tz_twitter_access_token'] ) ) ? strip_tags( $new_instance['tz_twitter_access_token'] ) : '';
			$instance['tz_twitter_access_token_secret'] = ( ! empty( $new_instance['tz_twitter_access_token_secret'] ) ) ? strip_tags( $new_instance['tz_twitter_access_token_secret'] ) : '';
			$instance['tz_twitter_tweet_limit'] = ( ! empty( $new_instance['tz_twitter_tweet_limit'] ) ) ? strip_tags( $new_instance['tz_twitter_tweet_limit'] ) : '';

			return $instance;
		}
	}
}

// Register and load the widget
if ( ! function_exists( 'paperio_load_twitter_widget' ) ) :
	function paperio_load_twitter_widget() {
		register_widget( 'Paperio_Twitter_Widget' );
	}
endif;
add_action( 'widgets_init', 'paperio_load_twitter_widget' );

/*******************************************************************************/
/* End Twitter Widget */
/*******************************************************************************/