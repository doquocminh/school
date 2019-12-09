<?php
/**
 * @package Paperio
 */
?>
<?php

/*******************************************************************************/
/* Start Instagram Widget */
/*******************************************************************************/

if (!class_exists('paperio_instagram_widget')) {

	class paperio_instagram_widget extends WP_Widget {

		public $tz_instagram_feed_style;
		public $tz_instagram_feed_loop;
		public $tz_instagram_feed_autoplay;
		public $tz_instagram_feed_autoplay_speed;
		public $tz_instagram_feed_stop_on_hover;
		public $tz_disable_instagram_like;
		public $tz_no_of_instagram_feed_desktop_view;
		public $tz_no_of_instagram_feed_desktop_mini_view;
		public $tz_no_of_instagram_feed_tablet_view;
		public $tz_no_of_instagram_feed_mobile_view;
		public $tz_show_instagram_pagination;
		public $tz_no_of_columns_instagram_feed;
		public $tz_instagram_feed_script;
		public $tz_instagram_id;
		public $tz_instagram_feed_userid;
		public $tz_instagram_feed_accesstoken;
		public $tz_instagram_feed_userid_value;
		public $tz_instagram_feed_accesstoken_value;

		function __construct() {
			parent::__construct(
				'paperio_instagram_widget',
				esc_html__( 'Paperio - Instagram', 'paperio-addons' ),
				array( 'description' => esc_html__( 'Add a custom instagram widget.', 'paperio-addons' ), )
			);
			add_action( 'wp_enqueue_scripts', array( $this, 'paperio_instafeed_script' ), 10 );
		}
		
		public function paperio_instafeed_script() {
						
			/*
			 * Load Paperio theme main and other required jquery files.
			 */

			wp_register_script( 'instafeed', PAPERIO_ADDONS_ROOT .'js/instafeed.min.js', array( 'jquery' ), '1.9.3', false );
		    wp_enqueue_script( 'instafeed' );
		}
		

		public function widget( $args, $instance ) {
			
			
			extract( $args );
			
			// Before widget.
	        echo $before_widget;

	        /* Define empty variables */
	        $this->tz_instagram_feed_script = '';
	        /* Define empty array */
	        $instagram_feed_nav_page_cursor = array();
	        /* Get current widget id */
	        $this->tz_instagram_id = $this->id;
	        /* Get widget small text */
	        $tz_small_title_text = ( isset( $instance['tz_small_title_text'] ) ) ? $instance['tz_small_title_text'] : '';
	        /* Get widget title text */
	        $tz_title_text = ( isset( $instance['tz_title_text'] ) ) ? $instance['tz_title_text'] : '';
			/* Get instagram userId */
			$this->tz_instagram_feed_userid = ( isset( $instance['instagram_id'] ) ) ? $this->tz_instagram_feed_script .= "userId: ".$instance['instagram_id']."," : '';
			/* Get instagram userID value */
			$this->tz_instagram_feed_userid_value  = ( isset( $instance['instagram_id'] ) ) ? $instance['instagram_id'] : '';
			/* Get instagram accessToken value */
			$this->tz_instagram_feed_accesstoken_value = ( isset( $instance['instagram_access_token'] ) ) ? $instance['instagram_access_token'] : '';
			/* Get instagram accessToken */
			$this->tz_instagram_feed_accesstoken = ( isset( $instance['instagram_access_token'] ) ) ? $this->tz_instagram_feed_script .= "accessToken: '".$instance['instagram_access_token']."'," : '';
			/* Get instagram style */
			$this->tz_instagram_feed_style = ( isset( $instance['instagram_style'] ) ) ? $instance['instagram_style'] : 'grid-style';
			/* Check feed loop */
			$this->tz_instagram_feed_loop = ( isset( $instance['instagram_feed_loop'] ) ) ? $instance['instagram_feed_loop'] : 'yes';
			/* Check feed autoplay */
			$this->tz_instagram_feed_autoplay = ( isset( $instance['instagram_feed_autoplay'] ) ) ? $instance['instagram_feed_autoplay'] : 'no';
			/* Check slider speed */
			$this->tz_instagram_feed_autoplay_speed = ( isset( $instance['instagram_feed_speed'] ) ) ? $instance['instagram_feed_speed'] : '3000';
			/* Check slider stop on hover */
			$this->tz_instagram_feed_stop_on_hover = ( isset( $instance['instagram_feed_stop_on_hover'] ) ) ? $instance['instagram_feed_stop_on_hover'] : 'no';
			/* Check slider pagination */
			$this->tz_show_instagram_pagination = ( isset( $instance['show_instagram_pagination'] ) ) ? $instance['show_instagram_pagination'] : 'false';
			/* Check slider pagination style */
			$tz_instagram_pagination_style = ( isset( $instance['instagram_pagination_style'] ) ) ? $instance['instagram_pagination_style'] : 'owl-dot-pagination';
			/* Check slider pagination color style */
			$tz_instagram_pagination_color = ( isset( $instance['instagram_pagination_color'] ) ) ? $instance['instagram_pagination_color'] : 'pagination-dark-style';
			/* Check cursor color */
			$tz_instagram_cursor_style_color = ( isset( $instance['instagram_cursor_style_color'] ) ) ? $instance['instagram_cursor_style_color'] : 'owl-cursor-default';
			/* Check no of feed in desktop */
			$this->tz_no_of_instagram_feed_desktop_view = ( isset( $instance['no_instagram_feed_desktop'] ) ) ? $instance['no_instagram_feed_desktop'] : '8';
			/* Check no of feed in desktop */
			$this->tz_no_of_instagram_feed_desktop_mini_view = ( isset( $instance['no_instagram_feed_desktop_mini'] ) ) ? $instance['no_instagram_feed_desktop_mini'] : '8';	
	      	/* Check no of feed in tablet */
	        $this->tz_no_of_instagram_feed_tablet_view = ( isset( $instance['no_instagram_feed_ipad'] ) ) ? $instance['no_instagram_feed_ipad'] : '3';	
	        /* Check no of feed in mobile */
	        $this->tz_no_of_instagram_feed_mobile_view = ( isset( $instance['no_instagram_feed_mobile'] ) ) ? $instance['no_instagram_feed_mobile'] : '2';       
	        /* Check no of column in grid type  */
			$this->tz_no_of_columns_instagram_feed = ( isset( $instance['no_of_columns_instagram_feed'] ) ) ? $instance['no_of_columns_instagram_feed'] : '4';
			/* Check no of feed to show */
			$tz_no_of_instagram_feed = ( isset( $instance['no_instagram_feed'] ) ) ? $this->tz_instagram_feed_script .= "limit: '".$instance['no_instagram_feed']."'," : '8';
			/* Check sort order */
			$tz_sort_instagram_feed = ( isset( $instance['sort_instagram_feed'] ) ) ? $this->tz_instagram_feed_script .= "sortBy: '".$instance['sort_instagram_feed']."'," : 'none';
			/* Check if like disable or not */
			if( isset( $instance['sort_instagram_feed'] ) ) {
				$this->tz_disable_instagram_like = ( $instance['disable_instagram_like'] ) ?  '' : '<div class="likes"><i class="fas fa-heart"></i> {{likes}}</div>';
			}else{
				$this->tz_disable_instagram_like = '';
			}
			/* Check image resolution */
			$this->tz_instagram_feed_script .= "resolution: 'low_resolution',";
		  	/* Set widget id for append data */
		  	$this->tz_instagram_feed_script .= " target: 'paperio-".$this->id."',";
		
			if( $this->tz_instagram_feed_style == 'slider-style' ) {
				if( $this->tz_show_instagram_pagination == 'true' ) {
					$instagram_feed_nav_page_cursor[] = $tz_instagram_pagination_style;
					$instagram_feed_nav_page_cursor[] = $tz_instagram_pagination_color;
					$instagram_feed_nav_page_cursor[] = $tz_instagram_cursor_style_color;
				}
			} else {
       			$instagram_feed_nav_page_cursor[] = 'width-100';
        		$instagram_feed_nav_page_cursor[] = 'display-inline-block';
    		}
    		$tz_class_list = implode( " ", sanitize_html_class( $instagram_feed_nav_page_cursor ) );
            $tz_instagram_feed_class = ( $tz_class_list ) ? ' '.$tz_class_list : '';
          
            $title = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'Follow Us @ Instagram', 'paperio-addons' );

            if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

            echo '<div class="text-center instagram-widget-wrapper">';

	            if( $tz_small_title_text ) {
	            	echo '<div class="margin-bottom-half xs-margin-three-top text-mid-gray">'.$tz_small_title_text.'</div>';
		        }
		        if( $tz_title_text ) {
		            echo '<h5 class="h5 text-mid-gray font-weight-600 text-uppercase margin-bottom-30 widget-title">
		            	<span>'.$tz_title_text.'</span>
		            </h5>';
		        }
		        echo '<div class="owl-carousels instagram-'.$this->tz_instagram_feed_style.'">';
		            echo '<div id="paperio-'.$this->id.'" class="paperio-instagram-feed owl-carousel'.$tz_instagram_feed_class.'"></div>';
		        echo '</div>';
	    		$this->paperio_instagram_feed_settings();

    		echo '</div>';

    		// After widget
	     	echo $after_widget;  
    	}

    	public function paperio_instagram_feed_settings(){
	
			$output = $tz_instagram_template = $tz_slider_config = $slider_config = '';

			ob_start();

	    	switch( $this->tz_instagram_feed_style ) {
	            case 'slider-style':
	            	/* check slider loop */
	                $this->tz_instagram_feed_loop = ( $this->tz_instagram_feed_loop == 'yes' ) ? $slider_config .= 'loop:true, ' : $slider_config .= 'loop: false, ';
	                /* check slider autoplay */
	                $this->tz_instagram_feed_autoplay = ( $this->tz_instagram_feed_autoplay == 'yes' ) ? 'autoplay:true, autoplayTimeout: '.$this->tz_instagram_feed_autoplay_speed.', ' : 'autoPlay: false, ';
	                /* check slider stop on hover */              
	               	$this->tz_instagram_feed_stop_on_hover = ( $this->tz_instagram_feed_stop_on_hover == 'yes'  ) ? 'autoplayHoverPause: true, ' : 'autoplayHoverPause: false, ';
	               	
	               	( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
	               	( $this->tz_no_of_instagram_feed_desktop_view || $this->tz_no_of_instagram_feed_desktop_mini_view || $this->tz_no_of_instagram_feed_tablet_view || $this->tz_no_of_instagram_feed_mobile_view ) ? $slider_config .= "responsive:{" : '';
		            ( $this->tz_no_of_instagram_feed_mobile_view ) ? $slider_config .= '0:{ items: '.$this->tz_no_of_instagram_feed_mobile_view.' },' : $slider_config .= '0:{ items: 1 },';
		            ( $this->tz_no_of_instagram_feed_tablet_view ) ? $slider_config .= '600:{ items: '.$this->tz_no_of_instagram_feed_tablet_view.'},' : $slider_config .= '600:{ items: 2 },';
		            ( $this->tz_no_of_instagram_feed_desktop_mini_view ) ? $slider_config .= '979:{ items: '.$this->tz_no_of_instagram_feed_desktop_mini_view.' },' : $slider_config .= '979:{ items: 4 },';
		            ( $this->tz_no_of_instagram_feed_desktop_view ) ? $slider_config .= '1199:{ items: '.$this->tz_no_of_instagram_feed_desktop_view.' },' : $slider_config .= '1199:{ items: 4 },';
		            ( $this->tz_no_of_instagram_feed_desktop_view || $this->tz_no_of_instagram_feed_desktop_mini_view || $this->tz_no_of_instagram_feed_tablet_view || $this->tz_no_of_instagram_feed_mobile_view ) ? $slider_config .= "}," : '';

	                /* Set template for instagram feed slider view */
	                $tz_instagram_template = '<div class="item"><a href="{{link}}" target="_blank"><img src="{{image}}" />'.$this->tz_disable_instagram_like.'</a></div>';

	                /* Set jquery for instagram feed slider view */
	                $tz_slider_config = "var owl = $('#".$this->tz_instagram_id."').find('.paperio-instagram-feed'); owl.owlCarousel({ ".$slider_config." nav: false, dots: ".$this->tz_show_instagram_pagination.",".$this->tz_instagram_feed_autoplay.$this->tz_instagram_feed_stop_on_hover." navText: ['<i class=\"fas fa-chevron-left\"></i>', '<i class=\"fas fa-chevron-right\"></i>'],});";
	            break;

	            default:
	                $column_classes = '';
	                switch( $this->tz_no_of_columns_instagram_feed ) {
	                    case '6':
	                        $column_classes .= ' class="col-md-2 col-sm-3 col-xs-6 no-padding"';
	                    break;
	                    case '3':
	                        $column_classes .= ' class="col-md-4 col-sm-3 col-xs-6 no-padding"';
	                    break;
	                    case '2':
	                        $column_classes .= ' class="col-md-6 col-sm-3 col-xs-6 no-padding"';
	                    break;
	                    case '1':
	                        $column_classes .= ' class="col-md-12 col-sm-12 col-xs-12 no-padding"';
	                    break;
	                    case '4':
	                    default:
	                        $column_classes .= ' class="col-md-3 col-sm-3 col-xs-6 no-padding"';
	                    break;
	                }
	                $tz_instagram_template = '<div'.$column_classes.'><a href="{{link}}" target="_blank"><img src="{{image}}" />'.$this->tz_disable_instagram_like.'</a></div>';
	            break;
	       	}
	       	?>
<script type="text/javascript">
var <?php echo str_ireplace( '-', '_', $this->tz_instagram_id ); ?> = new Instafeed({ get: 'user', <?php echo sprintf( '%s', $this->tz_instagram_feed_script ); ?> after: function () { <?php echo sprintf( '%s', $tz_slider_config );?> var images = $('#<?php echo sprintf( '%s', $this->tz_instagram_id ); ?>').find('a');
	$.each(images, function (index, image) { var delay = (index * 75) + 'ms'; $(image).css('-webkit-animation-delay', delay); $(image).css('-moz-animation-delay', delay); $(image).css('-ms-animation-delay', delay); $(image).css('-o-animation-delay', delay); $(image).css('animation-delay', delay); $(image).addClass('animated flipInX'); }); }, template: <?php echo "'".sprintf( '%s', $tz_instagram_template )."'"; ?>});

</script>
	        <?php
	        $output = ob_get_contents();
	        ob_end_clean();

	        if( $this->tz_instagram_feed_userid_value != '' && $this->tz_instagram_feed_accesstoken_value != '' ):
	            echo $output;
	        endif;
		}
		
		// Widget Backend 
		public function form( $instance ) {
			
			/* Set up some default widget settings. */
	        $defaults = array(
	            'title' => esc_html__( 'Follow Us @ Instagram', 'paperio-addons' ),
	            'tz_small_title_text' => '',
	            'tz_title_text' => '',
	            'instagram_access_token' => '',
	            'instagram_id' => '',
	            'instagram_style' => 'grid-style',
	            'no_of_columns_instagram_feed' => '4',
	            'instagram_feed_loop' => 'yes',
	            'instagram_feed_autoplay' => 'no',
	            'instagram_feed_speed' => '3000',
	            'instagram_feed_stop_on_hover' => 'no',
	            'show_instagram_pagination' => 'false',
	            'instagram_pagination_style' => 'owl-dot-pagination',
	            'instagram_pagination_color' => 'pagination-dark-style',
	            'instagram_cursor_style_color' => 'owl-cursor-default',
	            'no_instagram_feed_desktop' => 4,
	            'no_instagram_feed_desktop_mini' => 4,
	            'no_instagram_feed_ipad' => 2,
	            'no_instagram_feed_mobile' => 1,
	            'sort_instagram_feed' => 'none',
	            'no_instagram_feed' => 10,
	            'disable_instagram_like' => false,
	        );

	        $instance = wp_parse_args( (array) $instance, $defaults );
	        $slider_style_instagram = $grid_style_instagram = '';
	        $slider_style_instagram = ( $instance['instagram_style'] == 'slider-style' ) ? ' hidden' : '' ;
			$grid_style_instagram = ( $instance['instagram_style'] == 'grid-style' ) ? ' hidden' : '' ;

			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_small_title_text' ); ?>"><?php esc_html_e( 'Small Title:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_small_title_text' ); ?>" name="<?php echo $this->get_field_name( 'tz_small_title_text' ); ?>" type="text" value="<?php echo esc_attr( $instance['tz_small_title_text'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tz_title_text' ); ?>"><?php esc_html_e( 'Title Text:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'tz_title_text' ); ?>" name="<?php echo $this->get_field_name( 'tz_title_text' ); ?>" type="text" value="<?php echo esc_attr( $instance['tz_title_text'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'instagram_id' ); ?>"><?php esc_html_e( 'Instagram User ID:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_id' ); ?>" name="<?php echo $this->get_field_name( 'instagram_id' ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram_id'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( '
					' ); ?>"><?php esc_html_e( 'Instagram Access Token:', 'paperio-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_access_token' ); ?>" name="<?php echo $this->get_field_name( 'instagram_access_token' ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram_access_token'] ); ?>" />
			</p>
			<p class="instagram-style-type">
	            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram_style' ) ); ?>"><?php esc_html_e( 'Instagram Feed Style', 'paperio-addons' ); ?></label>
	            <select id="<?php echo esc_attr( $this->get_field_id( 'instagram_style' ) ); ?>" class="widefat instagram-feed-style-hide-show" name="<?php echo esc_attr( $this->get_field_name( 'instagram_style' ) ); ?>">
	                <?php $options = array(
	                        'slider-style' => esc_html__( 'Slider Style', 'paperio-addons' ),
	                        'grid-style' => esc_html__( 'Grid Style', 'paperio-addons' )
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['instagram_style'] == $option ? selected( $instance['instagram_style'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>
				</select>
	        </p>

	        <div class="instagram-slider-style-option instagram-select-option<?php echo esc_attr( $grid_style_instagram );?>">	
		        <p class="instagram-feed-loop">
		            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram_feed_loop' ) ); ?>"><?php esc_html_e( 'Loop', 'paperio-addons' ); ?></label>
		            <select id="<?php echo esc_attr( $this->get_field_id( 'instagram_feed_loop' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'instagram_feed_loop' ) ); ?>">
		                <?php $options = array(
		                        'yes' => esc_html__( 'Yes', 'paperio-addons' ),
								'no' =>  esc_html__( 'No',  'paperio-addons' )
		                      ); ?>
		                <?php foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['instagram_feed_loop'] == $option ? selected( $instance['instagram_feed_loop'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>
		        <p class="instagram-feed-autoplay">
		            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram_feed_autoplay' ) ); ?>"><?php esc_html_e( 'AutoPlay', 'paperio-addons' ); ?></label>
		            <select id="<?php echo esc_attr( $this->get_field_id( 'instagram_feed_autoplay' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'instagram_feed_autoplay' ) ); ?>">
		                <?php $options = array(
		                        'yes' => esc_html__( 'Yes', 'paperio-addons' ),
								'no' =>  esc_html__( 'No',  'paperio-addons' )
		                      ); ?>
		                <?php foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['instagram_feed_autoplay'] == $option ? selected( $instance['instagram_feed_autoplay'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>
		        <p class="instagram-feed-speed">
		            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram_feed_speed' ) ); ?>"><?php esc_html_e( 'Speed', 'paperio-addons' ); ?></label>
		            <select id="<?php echo esc_attr( $this->get_field_id( 'instagram_feed_speed' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'instagram_feed_speed' ) ); ?>">
		                <?php $options = array(	                        
								'1000' => '1000',
					    		'2000' => '2000',
					    		'3000' => '3000',
					    		'4000' => '4000',
					    		'5000' => '5000',
					    		'6000' => '6000',
					    		'7000' => '7000',
					    		'8000' => '8000',
					    		'9000' => '9000',
					    		'10000' => '10000'

		                      ); ?>
		                <?php foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['instagram_feed_speed'] == $option ? selected( $instance['instagram_feed_speed'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>

		        <p class="instagram-feed-stop-on-hover">
		            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram_feed_stop_on_hover' ) ); ?>"><?php esc_html_e( 'Stop On Hover', 'paperio-addons' ); ?></label>
		            <select id="<?php echo esc_attr( $this->get_field_id( 'instagram_feed_stop_on_hover' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'instagram_feed_stop_on_hover' ) ); ?>">
		                <?php $options = array(
		                        'yes' => esc_html__( 'Yes', 'paperio-addons' ),
								'no' =>  esc_html__( 'No',  'paperio-addons' )
		                      ); ?>
		                <?php foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['instagram_feed_stop_on_hover'] == $option ? selected( $instance['instagram_feed_stop_on_hover'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>
		        <p class="instagram-feed-show-pagination">
		            <label for="<?php echo esc_attr( $this->get_field_id( 'show_instagram_pagination' ) ); ?>"><?php esc_html_e( 'Show Pagination', 'paperio-addons' ); ?></label>
		            <select id="<?php echo esc_attr( $this->get_field_id( 'show_instagram_pagination' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'show_instagram_pagination' ) ); ?>">
		                <?php $options = array(
		                        'true' => esc_html__( 'Yes', 'paperio-addons' ),
								'false' =>  esc_html__( 'No',  'paperio-addons' )
		                      ); ?>
		                <?php foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['show_instagram_pagination'] == $option ? selected( $instance['show_instagram_pagination'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>	
		        <p class="instagram-feed-pagination-style">
		            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram_pagination_style' ) ); ?>"><?php esc_html_e( 'Pagination Style', 'paperio-addons' ); ?></label>
		            <select id="<?php echo esc_attr( $this->get_field_id( 'instagram_pagination_style' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'instagram_pagination_style' ) ); ?>">
		                <?php
		                	$options = array(	                        
								'owl-dot-pagination' => esc_html__( 'Dot Style', 'paperio-addons' ),
		            			'owl-square-pagination' => esc_html__( 'Line Style', 'paperio-addons' ),
		            			'owl-round-pagination' => esc_html__( 'Round Style', 'paperio-addons' )
	              			);
		                	foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['instagram_pagination_style'] == $option ? selected( $instance['instagram_pagination_style'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>
		        <p class="instagram-feed-pagination-color">
		            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram_pagination_color' ) ); ?>"><?php esc_html_e( 'Pagination Color Style', 'paperio-addons' ); ?></label>
		            <select id="<?php echo esc_attr( $this->get_field_id( 'instagram_pagination_color' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'instagram_pagination_color' ) ); ?>">
		                <?php $options = array(	                        
								'pagination-dark-style'  => esc_html__( 'Dark Style', 'paperio-addons' ),
						        'pagination-light-style' => esc_html__( 'Light Style', 'paperio-addons' )
		                      ); ?>
		                <?php foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['instagram_pagination_color'] == $option ? selected( $instance['instagram_pagination_color'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>

		        <p class="instagram-feed-cursor-color-style">
		            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram_cursor_style_color' ) ); ?>"><?php esc_html_e( 'Cursor Style', 'paperio-addons' ); ?></label>
		            <select id="<?php echo esc_attr( $this->get_field_id( 'instagram_cursor_style_color' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'instagram_cursor_style_color' ) ); ?>">
		                <?php $options = array( 
						        'owl-cursor-default' => esc_html__( 'Default Cursor', 'paperio-addons' ),
								'owl-cursor-dark'    => esc_html__( 'Dark Cursor',   'paperio-addons' ),
								'owl-cursor-light'   => esc_html__( 'Light Cursor',   'paperio-addons' )
		                      ); ?>
		                <?php foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['instagram_cursor_style_color'] == $option ? selected( $instance['instagram_cursor_style_color'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>

		        <p>
		            <label for="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed_desktop' ) ); ?>"><?php esc_html_e( 'No. of items per slide &ndash; Desktop View', 'paperio-addons' ); ?></label>
		            <select id="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed_desktop' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'no_instagram_feed_desktop' ) ); ?>">
		                <?php $options = array(	                        
								'1' => '1',
					    		'2' => '2',
					    		'3' => '3',
					    		'4' => '4',
					    		'5' => '5',
					    		'6' => '6',
					    		'7' => '7',
					    		'8' => '8',
					    		'9' => '9',					    		
					    		'10' => '10',
		                      ); ?>
		                <?php foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['no_instagram_feed_desktop'] == $option ? selected( $instance['no_instagram_feed_desktop'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>

		        <p>
		            <label for="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed_desktop_mini' ) ); ?>"><?php esc_html_e( 'No. of items per slide &ndash; Desktop Mini View', 'paperio-addons' ); ?></label>
		            <select id="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed_desktop_mini' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'no_instagram_feed_desktop_mini' ) ); ?>">
		                <?php $options = array(	                        
								'1' => '1',
					    		'2' => '2',
					    		'3' => '3',
					    		'4' => '4',
					    		'5' => '5',
					    		'6' => '6',
					    		'7' => '7',
					    		'8' => '8',
					    		'9' => '9',					    		
					    		'10' => '10',
		                      ); ?>
		                <?php foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['no_instagram_feed_desktop_mini'] == $option ? selected( $instance['no_instagram_feed_desktop_mini'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>

		        <p>
		            <label for="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed_ipad' ) ); ?>"><?php esc_html_e( 'No. of items per slide &ndash; iPad/Tablet View', 'paperio-addons' ); ?></label>     
		            <select id="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed_ipad' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'no_instagram_feed_ipad' ) ); ?>">
		                <?php $options = array(	                        
								'1' => '1',
					    		'2' => '2',
					    		'3' => '3',					    		
		                      ); ?>
		                <?php foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['no_instagram_feed_ipad'] == $option ? selected( $instance['no_instagram_feed_ipad'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>
		        <p>
		            <label for="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed_mobile' ) ); ?>"><?php esc_html_e( 'No. of items per slide &ndash; Mobile View', 'paperio-addons' ); ?></label>		            
		            <select id="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed_mobile' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'no_instagram_feed_mobile' ) ); ?>">
		                <?php $options = array(	                        
								'1' => '1',
					    		'2' => '2',
					    					    		
		                      ); ?>
		                <?php foreach ( $options as $option => $key ) : ?>
		                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['no_instagram_feed_mobile'] == $option ? selected( $instance['no_instagram_feed_mobile'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
		                <?php endforeach; ?>
					</select>
		        </p>
	        </div>

	        <p class="instagram-sort-instagram-feed">
	            <label for="<?php echo esc_attr( $this->get_field_id( 'sort_instagram_feed' ) ); ?>"><?php esc_html_e( 'Sort Instagram Feed', 'paperio-addons' ); ?></label>
	            <select id="<?php echo esc_attr( $this->get_field_id( 'sort_instagram_feed' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'sort_instagram_feed' ) ); ?>">
	                <?php $options = array(	                        
	                       			'none'   => esc_html__('None','paperio-addons'),
                                    'most-recent' => esc_html__('Most Recent','paperio-addons'),
                                    'least-recent' => esc_html__('Least Recent','paperio-addons'),
                                    'most-liked' => esc_html__('Most Liked','paperio-addons'),
                                    'least-liked' => esc_html__('Least Liked','paperio-addons'),
                                    'most-commented' => esc_html__('Most Commented','paperio-addons'),
                                    'least-commented' => esc_html__('Least Commented','paperio-addons'),
                                    'random' => esc_html__('Random','paperio-addons')
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['sort_instagram_feed'] == $option ? selected( $instance['sort_instagram_feed'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>
				</select>
	        </p>


	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'no_of_columns_instagram_feed' ) ); ?>"><?php esc_html_e( 'No. of column ( It work only for grid style )', 'paperio-addons' ); ?></label>
	            <select id="<?php echo esc_attr( $this->get_field_id( 'no_of_columns_instagram_feed' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'no_of_columns_instagram_feed' ) ); ?>">
	                <?php $options = array(	                        
							'1' => '1',
				    		'2' => '2',
				    		'3' => '3',
				    		'4' => '4',
				    		'6' => '6',
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['no_of_columns_instagram_feed'] == $option ? selected( $instance['no_of_columns_instagram_feed'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>
				</select>
	        </p>


	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed' ) ); ?>"><?php esc_html_e( 'No. of instagram feed', 'paperio-addons' ); ?></label>
	            <input type="number" min="1" max="20" name="<?php echo esc_attr( $this->get_field_name( 'no_instagram_feed' ) ); ?>" value="<?php echo esc_attr( $instance['no_instagram_feed'] ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed' ) ); ?>" />
	        </p>

	        <p>
    		  <input class="checkbox" type="checkbox" <?php checked( $instance[ 'disable_instagram_like' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'disable_instagram_like' ); ?>" name="<?php echo $this->get_field_name( 'disable_instagram_like' ); ?>" />   
    		  <label for="<?php echo esc_attr( $this->get_field_id( 'disable_instagram_like' ) ); ?>"><?php esc_html_e( 'Disable Like', 'paperio-addons' ); ?></label>          
			</p>

		<?php
		}
		
		// Updating widget replacing old instances with new

		public function update( $new_instance, $old_instance ) 
		{
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['tz_small_title_text'] = ( ! empty( $new_instance['tz_small_title_text'] ) ) ? strip_tags( $new_instance['tz_small_title_text'] ) : '';
			$instance['tz_title_text'] = ( ! empty( $new_instance['tz_title_text'] ) ) ? strip_tags( $new_instance['tz_title_text'] ) : '';
			$instance['instagram_access_token'] = ( ! empty( $new_instance['instagram_access_token'] ) ) ? $new_instance['instagram_access_token'] : '';
			$instance['instagram_id'] = ( ! empty( $new_instance['instagram_id'] ) ) ? $new_instance['instagram_id'] : '';
			$instance['instagram_style'] = ( ! empty( $new_instance['instagram_style'] ) ) ? $new_instance['instagram_style'] : '';
			$instance['instagram_feed_loop'] = ( ! empty( $new_instance['instagram_feed_loop'] ) ) ? $new_instance['instagram_feed_loop'] : '';
			$instance['instagram_feed_autoplay'] = ( ! empty( $new_instance['instagram_feed_autoplay'] ) ) ? $new_instance['instagram_feed_autoplay'] : '';
			$instance['instagram_feed_speed'] = ( ! empty( $new_instance['instagram_feed_speed'] ) ) ? $new_instance['instagram_feed_speed'] : '';
			$instance['instagram_feed_stop_on_hover'] = ( ! empty( $new_instance['instagram_feed_stop_on_hover'] ) ) ? $new_instance['instagram_feed_stop_on_hover'] : '';
			$instance['show_instagram_pagination'] = ( ! empty( $new_instance['show_instagram_pagination'] ) ) ? $new_instance['show_instagram_pagination'] : '';	
			$instance['instagram_pagination_style'] = ( ! empty( $new_instance['instagram_pagination_style'] ) ) ? $new_instance['instagram_pagination_style'] : '';
			$instance['instagram_pagination_color'] = ( ! empty( $new_instance['instagram_pagination_color'] ) ) ? $new_instance['instagram_pagination_color'] : '';	
			$instance['instagram_cursor_style_color'] = ( ! empty( $new_instance['instagram_cursor_style_color'] ) ) ? $new_instance['instagram_cursor_style_color'] : '';
			$instance['no_of_columns_instagram_feed'] = ( ! empty( $new_instance['no_of_columns_instagram_feed'] ) ) ? $new_instance['no_of_columns_instagram_feed'] : '';
			$instance['no_instagram_feed_desktop'] = ( ! empty( $new_instance['no_instagram_feed_desktop'] ) ) ? $new_instance['no_instagram_feed_desktop'] : '';
			$instance['no_instagram_feed_desktop_mini'] = ( ! empty( $new_instance['no_instagram_feed_desktop_mini'] ) ) ? $new_instance['no_instagram_feed_desktop_mini'] : '';
			$instance['no_instagram_feed_ipad'] = ( ! empty( $new_instance['no_instagram_feed_ipad'] ) ) ? $new_instance['no_instagram_feed_ipad'] : '';
			$instance['no_instagram_feed_mobile'] = ( ! empty( $new_instance['no_instagram_feed_mobile'] ) ) ? $new_instance['no_instagram_feed_mobile'] : '';	
			$instance['sort_instagram_feed'] = ( ! empty( $new_instance['sort_instagram_feed'] ) ) ? $new_instance['sort_instagram_feed'] : '';		
			$instance['no_instagram_feed'] = ( ! empty( $new_instance['no_instagram_feed'] ) ) ? $new_instance['no_instagram_feed'] : '';
			$instance['disable_instagram_like'] = ( ! empty( $new_instance['disable_instagram_like'] ) ) ? $new_instance['disable_instagram_like'] : '';
			return $instance;
		}
	}
}

// Register and load the widget
if ( ! function_exists( 'paperio_load_instagram_widget' ) ) :
	function paperio_load_instagram_widget() {
		register_widget( 'paperio_instagram_widget' );
	}
endif;
add_action( 'widgets_init', 'paperio_load_instagram_widget' );

/*******************************************************************************/
/* End Instagram Widget */
/*******************************************************************************/