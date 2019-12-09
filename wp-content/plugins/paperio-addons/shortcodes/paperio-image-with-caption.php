<?php
/**
 * Shortcode For Image With Caption
 *
 * 
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Image With Caption */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'paperio_image_with_caption_shortcode' ) ) :
	function paperio_image_with_caption_shortcode( $atts, $content = ""  ) {
			
		extract( shortcode_atts( array(
			'tz_image_url' => '',
			'tz_image_alt_text' => '',
			'tz_caption_text'	=> '',
			'tz_caption_position' => '',
			'tz_caption_align' => '',
			'tz_extra_class' => '',
			'tz_extra_id' => '',
		), $atts ) );
		
		$output = '';
		$classes = array();

		$tz_image_url = ( $tz_image_url ) ? esc_url( $tz_image_url ) : '';
		$tz_image_alt_text = ( $tz_image_alt_text ) ? $tz_image_alt_text : '';
		$tz_caption_text = ( $tz_caption_text ) ? $tz_caption_text : '';
		$tz_caption_position = ( $tz_caption_position ) ? $tz_caption_position : '';
		$tz_caption_align = ( $tz_caption_align ) ? ' class="'.$tz_caption_align.'"' : '';
		$tz_extra_class = ( $tz_extra_class ) ? ' class="'.$tz_extra_class.'"' : '';
		$tz_extra_id = ( $tz_extra_id ) ? ' id="'.$tz_extra_id.'"' : '';

		$output .= '<figure'.$tz_extra_id.$tz_extra_class.'>';

		switch( $tz_caption_position ) {
			case 'top':
				if( $tz_caption_text ) :
					$output .= '<figcaption'.$tz_caption_align.'>' . $tz_caption_text . '</figcaption>';
				endif;
				if( $tz_image_url ) :
					$output .= '<img alt="'.$tz_image_alt_text.'" src="'.$tz_image_url.'" />';
				endif;
			break;

			case 'bottom':
				if( $tz_image_url ) :
					$output .= '<img alt="'.$tz_image_alt_text.'" src="'.$tz_image_url.'" />';
				endif;
				if( $tz_caption_text ) :
					$output .= '<figcaption'.$tz_caption_align.'>' . $tz_caption_text . '</figcaption>';
				endif;
			break;
		}

		$output .= '</figure>';
		return $output;
	}
endif;
add_shortcode( 'paperio_image_with_caption', 'paperio_image_with_caption_shortcode' );