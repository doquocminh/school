<?php
/**
 * Shortcode For Title Style
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Title Style */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'paperio_title_style_shortcode' ) ) :
	function paperio_title_style_shortcode( $atts, $content = ""  ) {
			
		extract( shortcode_atts( array(
			'tz_title_style'	=> '',
			'tz_title_text'	=> '',	
			'tz_title_color'	=> '',
			'tz_extra_class' => '',
			'tz_extra_id' => '',
		), $atts ) );
	
		$output = '';
		$classes = array();
		
		$tz_title_style = ( $tz_title_style ) ? $tz_title_style : 'style-one';
		$tz_title_text = ( $tz_title_text ) ? $tz_title_text : '';
		$tz_title_color = ( $tz_title_color ) ? ' style="color:'.$tz_title_color.'"' : '';	
		$tz_extra_class = ( $tz_extra_class ) ? ' '.$tz_extra_class : '';
		$tz_extra_id = ( $tz_extra_id ) ? ' id="'.$tz_extra_id .'"' : '';
			
		/* Check title style */
		switch( $tz_title_style ) {
			case 'style-one':
				if( $tz_title_text ) :
					$output .= '<h5 class="text-mid-gray alt-font'.$tz_extra_class.'"'.$tz_extra_id.$tz_title_color.'><span class="position-reletive z-index-2">'.$tz_title_text.'<span class="rotate background-color"></span></span></h5>';
				endif;
			break;

			case 'style-two':
				if( $tz_title_text ) :
					$output .= '<h5 class="title-border-center text-mid-gray'.$tz_extra_class.'"'.$tz_extra_id.$tz_title_color.'><span>'.$tz_title_text.'</span></h5>';
				endif;
			break;
				
			case 'style-three':
				if( $tz_title_text ) :
					$output .= '<h5 class="text-left title-border-right text-mid-gray'.$tz_extra_class.'"'.$tz_extra_id.$tz_title_color.'><span>'. $tz_title_text.'</span></h5>';
				endif;
			break;
		}
		return $output;
	}
endif;

add_shortcode( 'paperio_title_style', 'paperio_title_style_shortcode' );