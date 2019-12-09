<?php
/**
 * Shortcode For Text Block
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Text Block */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'paperio_text_block_shortcode' ) ) :
	function paperio_text_block_shortcode( $atts, $content = ""  ) {

		extract( shortcode_atts( array(
			'tz_col_md'	=> '',
			'tz_col_sm' => '',
			'tz_col_xs' => '',
			'tz_extra_class' => '',
			'tz_extra_id' => '',
		), $atts ) );
	
		$output = '';
		/* Column MD width */
		$tz_col_md = ( $tz_col_md ) ? ' '.$tz_col_md : ' col-md-12';
		/* Column SM width */
		$tz_col_sm = ( $tz_col_sm ) ? ' '.$tz_col_sm : ' col-sm-12';
		/* Column XS width */
		$tz_col_xs = ( $tz_col_xs ) ? ' '.$tz_col_xs : ' col-xs-12';
		$tz_extra_class = ( $tz_extra_class ) ? ' '.$tz_extra_class : '';
		$tz_extra_id = ($tz_extra_id) ? ' id="'.$tz_extra_id.'"' : '';

		$output .= '<div class="paperio-text-block'.$tz_col_md.$tz_col_sm.$tz_col_xs.$tz_extra_class.'"'.$tz_extra_id.'>';
			$output .= do_shortcode( $content );
		$output .= '</div>';
				
		return $output;
	}
endif;
add_shortcode( 'paperio_text_block','paperio_text_block_shortcode' );