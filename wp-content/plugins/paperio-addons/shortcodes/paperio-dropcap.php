<?php
/**
 * Shortcode For Dropcap
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Dropcap */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'paperio_dropcap_shortcode' ) ) :
	function paperio_dropcap_shortcode( $atts, $content = '' ) {

		extract( shortcode_atts( array(
			'tz_col_md'	=> '',
			'tz_col_sm' => '',
			'tz_col_xs' => '',
			'tz_extra_class' => '',
			'tz_extra_id' => '',
		), $atts ) );

		$output = '';
		$tz_col_md = ( $tz_col_md ) ? ' '.$tz_col_md : ' col-md-12';
		$tz_col_sm = ( $tz_col_sm ) ? ' '.$tz_col_sm : ' col-sm-12';
		$tz_col_xs = ( $tz_col_xs ) ? ' '.$tz_col_xs : ' col-xs-12';
		$tz_extra_class = ( $tz_extra_class ) ? ' '.$tz_extra_class : '';
		$tz_extra_id = ( $tz_extra_id ) ? ' id="'.$tz_extra_id.'"' : '';

		if( $content ) :
			$output .='<div class="paperio-dropcap'.$tz_col_md.$tz_col_sm.$tz_col_xs.$tz_extra_class.'"'.$tz_extra_id.'>';
				$output .='<p class="dropcap text-medium">'. do_shortcode( $content ) .'</p>';
			$output .= '</div>';
		endif;

		return $output;
	}
endif;

add_shortcode( 'paperio_dropcap','paperio_dropcap_shortcode' );