<?php
/**
 * Shortcode For Heading Tag
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Heading Tag */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'paperio_heading_shortcode' ) ) :
	function paperio_heading_shortcode( $atts, $content = '' ) {
			
		extract( shortcode_atts( array(
			'tz_heading_tag' => '',
			'tz_heading_text' => '',
			'tz_extra_class' => '',
			'tz_extra_id' => '',
		), $atts ) );

		$output = '';
		
		$tz_heading_tag = ( $tz_heading_tag ) ? $tz_heading_tag : 'h1';
		$tz_heading_text = ( $tz_heading_text ) ? $tz_heading_text : '';
		$tz_extra_class = ( $tz_extra_class ) ? ' '.$tz_extra_class : '';
		$tz_extra_id = ( $tz_extra_id ) ? ' id="'.$tz_extra_id.'"' : '';
		if($tz_heading_text != ''):
		$output .= '<'.$tz_heading_tag.' class="paperio-heading'.$tz_extra_class.'"'.$tz_extra_id.'>';
			$output .= do_shortcode( $tz_heading_text );
		$output .= '</'.$tz_heading_tag.'>';
		endif;
		return $output;
	}
endif;
add_shortcode( 'paperio_heading', 'paperio_heading_shortcode' );