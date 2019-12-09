<?php
/**
 * Shortcode For Blockquote
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Blockquote */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'paperio_blockquote_shortcode' ) ) :
	function paperio_blockquote_shortcode( $atts, $content = ''  ) {
		
		extract( shortcode_atts( array(
			'tz_blockquote_title' => '',
			'tz_blockquote_bg_color'	=> '',
			'tz_blockquote_color' => '',
			'tz_extra_class' => '',
			'tz_extra_id' => '',
		), $atts ) );

		$output = '';

		$tz_blockquote_title = ( $tz_blockquote_title ) ? $tz_blockquote_title : '';
		$tz_blockquote_bg_color = ( $tz_blockquote_bg_color ) ? ' style="background:'.$tz_blockquote_bg_color.'"' : '';
		$tz_blockquote_color = ( $tz_blockquote_color ) ? ' style="color:' . $tz_blockquote_color.'"' : '';
		$tz_extra_class = ( $tz_extra_class ) ? ' '.$tz_extra_class : '';
		$tz_extra_id = ($tz_extra_id) ? ' id="'.$tz_extra_id.'"' : '';
		$tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
		$tz_bg_color = ( $tz_theme_type == 'theme-fast-red' ) ? 'bg-dark-gray2' : 'bg-gray';
					
		$output .= '<blockquote class="'.$tz_bg_color.' blog-image'.$tz_extra_class.'"'.$tz_extra_id.$tz_blockquote_bg_color.'>';
			if( $content ) :
				$output .= '<p class="margin-three-bottom">'.do_shortcode( $content ).'</p>';
			endif;
			if( $tz_blockquote_title ) :
				$output .= '<footer class="text-uppercase text-mid-gray text-medium"'.$tz_blockquote_color.'>'.$tz_blockquote_title.'</footer>';
			endif;
		$output .= '</blockquote>';

		return $output;
	}
endif;

add_shortcode( 'paperio_blockquote','paperio_blockquote_shortcode' );