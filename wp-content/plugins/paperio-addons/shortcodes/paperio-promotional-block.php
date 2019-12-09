<?php
/**
 * Shortcode For Promotional Block 
 *
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Promotional Block */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'paperio_promotional_block_shortcode' ) ) :
	function paperio_promotional_block_shortcode( $atts, $content = ""  ) {
			
		extract( shortcode_atts( array(
			'tz_style' => '',
			'tz_col_md'	=> '',
			'tz_col_sm' => '',
			'tz_col_xs' => '',
			'tz_bg_image_url' => '',
			'tz_title' => '',
			'tz_button_text' => '',
			'tz_link_url' => '',
			'tz_link_target' => '',
			'tz_extra_class' => '',
			'tz_extra_id' => '',										
		), $atts ) );

		$output = '';
		$tz_style			= ( $tz_style ) ? $tz_style : 'promotional-style1';
		$tz_col_md 			= ( $tz_col_md ) ? ' '.$tz_col_md : ' col-md-12';
		$tz_col_sm 			= ( $tz_col_sm ) ? ' '.$tz_col_sm : ' col-sm-12';
		$tz_col_xs 			= ( $tz_col_xs ) ? ' '.$tz_col_xs : ' col-xs-12';
		$tz_bg_image_url 	= ( $tz_bg_image_url ) ? ' style ="background:url('.esc_url( $tz_bg_image_url ).')"' : '';
		$tz_title 			= ( $tz_title ) ? $tz_title : '';
		$tz_button_text 	= ( $tz_button_text ) ? $tz_button_text : '';
		$tz_link_url 		= ( $tz_link_url ) ? esc_url( $tz_link_url ) : '#';
		$tz_link_target 	= ( $tz_link_target ) ? $tz_link_target : '_self';
		$tz_extra_class 	= ( $tz_extra_class ) ? ' '.$tz_extra_class : '';
		$tz_extra_id 		= ( $tz_extra_id ) ? ' id="'.$tz_extra_id.'"' : '';
		
		switch( $tz_style ) {
			case 'promotional-style1':				
				$output .= '<div class="promo-area'.$tz_col_md.$tz_col_sm.$tz_col_xs.$tz_extra_class.'"'.$tz_extra_id.'>';
					$output .= '<div class="text-center promo-item cover-background"'.$tz_bg_image_url.'>';				
						if( $tz_link_url ) :
							$output .= '<a class="promo-linking" href="'.$tz_link_url.'" target="'.$tz_link_target.'"></a>';
						endif;						
						$tz_padding_three_bottom = ($tz_button_text) ? ' padding-three-bottom': '';
						if( $tz_title || $tz_button_text ) :
							$output .= '<div class="promo-border">';
							if( $tz_title ) {
								$output .= '<p class="text-uppercase text-extra-small letter-spacing-3 text-white promo-title'.$tz_padding_three_bottom.'">'.$tz_title.'</p>';
							}

							if( $tz_button_text ) {
								$output .= '<span class="text-uppercase text-black text-small alt-font">'.$tz_button_text.'</span>';
							}
							$output .= '</div>';
						endif;
					$output .= '</div>';
				$output .= '</div>';
			break;
			
			case 'promotional-style2':				
				$output .= '<div class="promo-area-style2'.$tz_col_md.$tz_col_sm.$tz_col_xs.$tz_extra_class.'"'.$tz_extra_id.'>';
					$output .= '<div class="text-center promo-item cover-background"'.$tz_bg_image_url.'>';				
						$output .= '<div class="opacity-light bg-dark-gray"></div>';
						if( $tz_link_url ) :
							$output .= '<a class="promo-linking" href="'.$tz_link_url.'" target="'.$tz_link_target.'"></a>';
						endif;
						$tz_padding_three_bottom = ($tz_button_text) ? ' padding-three-bottom': '';
						
						if( $tz_title || $tz_button_text ) :
							$output .= '<div class="promo-border">';
							if( $tz_title ) {
								$output .= '<p class="text-uppercase text-extra-small letter-spacing-3 text-white promo-title'.$tz_padding_three_bottom.'">'.$tz_title.'</p>';
							}
							if( $tz_button_text ) {
								$output .= '<span class="text-uppercase text-black text-small alt-font">'.$tz_button_text.'</span>';
							}
							$output .= '</div>';
						endif;
					$output .= '</div>';
				$output .= '</div>';
			break;
			}	

		return $output;
	}
endif;
add_shortcode( 'paperio_promotional_block','paperio_promotional_block_shortcode' );