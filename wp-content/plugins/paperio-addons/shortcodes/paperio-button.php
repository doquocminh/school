<?php
/**
 * Shortcode For Button Style
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Button Style */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'paperio_button_shortcode' ) ) :
	function paperio_button_shortcode( $atts, $content = ''  ) {
			
			extract( shortcode_atts( array(
				'tz_button_style' => '',
				'tz_button_size' => '',
				'tz_button_text' => '',
				'tz_button_url'	=> '',
				'tz_button_link_target'	=> '',
				'tz_extra_class' => '',
				'tz_extra_id' => '',
				'tz_button_rel_nofollow' => '',
			), $atts ) );
	
			$output = '';
			
			$tz_button_style = ( $tz_button_style ) ? $tz_button_style : 'button-style1';
			$tz_button_size = ( $tz_button_size ) ? ' '.$tz_button_size : '';
			$tz_button_text = ( $tz_button_text ) ? $tz_button_text : '';
			$tz_button_url = ( $tz_button_url ) ? $tz_button_url : '#';
			$tz_button_link_target = ( $tz_button_link_target ) ? $tz_button_link_target : '_self';
			$tz_extra_class = ( $tz_extra_class ) ? ' '.$tz_extra_class : '';
			$tz_extra_id = ( $tz_extra_id ) ? ' id="' . $tz_extra_id .'"' : '';
			$tz_button_rel_nofollow = ( $tz_button_rel_nofollow ) ? ' rel="'.$tz_button_rel_nofollow.'"' : '';
			
			 // For Button Style
			switch ($tz_button_style) {
				case 'button-style1':
					if( $tz_button_text ) :
						$output .= '<a '.$tz_button_rel_nofollow.' href="'.$tz_button_url.'" target="'.$tz_button_link_target.'" class="btn btn-border text-uppercase'.$tz_button_size.$tz_extra_class.'"'.$tz_extra_id.'>'.$tz_button_text.'</a>';
					endif;
				break;
				case 'button-style2':
					if( $tz_button_text ) :
						$output .= '<a '.$tz_button_rel_nofollow.' href="'.$tz_button_url.'" target="'.$tz_button_link_target.'" class="btn btn-black text-uppercase'.$tz_button_size.$tz_extra_class.'"'.$tz_extra_id.'>'.$tz_button_text.'</a>';
					endif;
				break;
				case 'button-style3':
					if( $tz_button_text ) :
						$output .= '<a '.$tz_button_rel_nofollow.' href="'.$tz_button_url.'" target="'.$tz_button_link_target.'" class="btn btn-white text-uppercase'.$tz_button_size.$tz_extra_class.'"'.$tz_extra_id.'>'.$tz_button_text.'</a>';
					endif;
				break;
				case 'button-style4':
					if( $tz_button_text ) :
						$output .= '<a '.$tz_button_rel_nofollow.' href="'.$tz_button_url.'" target="'.$tz_button_link_target.'" class="btn btn-black text-uppercase'.$tz_button_size.$tz_extra_class.'"'.$tz_extra_id.'>'.$tz_button_text.'<i class="fas fa-arrow-right"></i></a>';
					endif;
				break;
				case 'button-style5':
					if( $tz_button_text ) :
						$output .= '<a '.$tz_button_rel_nofollow.' href="'.$tz_button_url.'" target="'.$tz_button_link_target.'" class="btn btn-border text-uppercase'.$tz_button_size.$tz_extra_class.'"'.$tz_extra_id.'>'.$tz_button_text.'<i class="fas fa-long-arrow-alt-right"></i></a>';
					endif;
				break;
				case 'button-style6':
					if( $tz_button_text ) :
						$output .= '<a '.$tz_button_rel_nofollow.' href="'.$tz_button_url.'" target="'.$tz_button_link_target.'" class="btn btn-black text-uppercase'.$tz_button_size.$tz_extra_class.'"'.$tz_extra_id.'>'.$tz_button_text.'<i class="fas fa-long-arrow-alt-right"></i></a>';
					endif;
				break;
				case 'button-style7':
					if( $tz_button_text ) :
						$output .= '<a '.$tz_button_rel_nofollow.' href="'.$tz_button_url.'" class="btn btn-dark-gray text-uppercase'.$tz_button_size.$tz_extra_class.'"'.$tz_extra_id.'>'.$tz_button_text.'<i class="fas fa-long-arrow-alt-right"></i></a>';
					endif;
				break;
				case 'button-style8':
					if( $tz_button_text ) :
						$output .= '<a '.$tz_button_rel_nofollow.' href="'.$tz_button_url.'" target="'.$tz_button_link_target.'" class="btn btn-border-white text-uppercase'.$tz_button_size.$tz_extra_class.'"'.$tz_extra_id.'>'.$tz_button_text.'</a>';
					endif;
				break;
				case 'button-style9':
					if( $tz_button_text ) :
						$output .= '<a '.$tz_button_rel_nofollow.' href="'.$tz_button_url.'" target="'.$tz_button_link_target.'" class="btn btn-white text-uppercase'.$tz_button_size.$tz_extra_class.'"'.$tz_extra_id.'>'.$tz_button_text.'<i class="fas fa-arrow-right"></i></a>';
					endif;
				break;
				case 'button-style10':
					if( $tz_button_text ) :
						$output .= '<a '.$tz_button_rel_nofollow.' href="'.$tz_button_url.'" target="'.$tz_button_link_target.'" class="btn btn-border-white text-uppercase'.$tz_button_size.$tz_extra_class.'"'.$tz_extra_id.'>'.$tz_button_text.'<i class="fas fa-long-arrow-alt-right"></i></a>';
					endif;
				break;
				case 'button-style11':
					if( $tz_button_text ) :
						$output .= '<a '.$tz_button_rel_nofollow.' href="'.$tz_button_url.'" target="'.$tz_button_link_target.'" class="btn btn-white text-uppercase'.$tz_button_size.$tz_extra_class.'"'.$tz_extra_id.'>'.$tz_button_text.'<i class="fas fa-long-arrow-alt-right"></i></a>';
					endif;
				break;
			}
		return $output;
	}
endif;

add_shortcode( 'paperio_button', 'paperio_button_shortcode' );