<?php
/**
 * Shortcode For Separator
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Separator */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'paperio_separator_shortcode' ) ) :
	function paperio_separator_shortcode( $atts, $content = ''  ) {
			
		extract( shortcode_atts( array(
			'tz_background_color' => '',
			'tz_height'	=> '',
			'tz_extra_class' => '',
			'tz_extra_id' => '',
		), $atts ) );

		$output = $style_attr = $separator_style = '';
		$style = array();
		
		$bgcolor_attr = ( $tz_background_color ) ? $style[] = 'background:'.$tz_background_color.';' : '';
		$height_attr = ( $tz_height ) ? $style[] = 'height:'.$tz_height.';' : '';
		$tz_extra_class = ( $tz_extra_class ) ? ' '.$tz_extra_class : '';
		$tz_extra_id = ( $tz_extra_id ) ? ' id="'.$tz_extra_id .'"' : '';

		$style_attr = implode( ' ', $style );
		$separator_style = ( $style_attr ) ? $separator_style = ' style="'. $style_attr .'"': '';
		
		$output .= '<div class="separator-line-thin bg-middle-gray'.$tz_extra_class.'"'.$separator_style.'></div>';

		return $output;
	}
endif;
add_shortcode( 'paperio_separator', 'paperio_separator_shortcode' );