<?php
/**
 * displaying single posts in gallery for blog
 *
 * @package Paperio
 */
?>
<?php
	/* Get blog feature image size */
    $tz_single_post_feature_image_size = get_theme_mod( 'tz_single_post_feature_image_size', 'full' );
	$tz_lightbox_image = paperio_post_meta( 'tz_lightbox_image' );
	$tz_lightbox_image_column = paperio_post_meta( 'tz_lightbox_image_column' );
	$tz_lightbox_image_column = ( $tz_lightbox_image_column ) ? $tz_lightbox_image_column : 'three';
	$tz_gallery = paperio_post_meta( 'tz_gallery' );

	$gallery = array();
	if( $tz_gallery ) {
		$gallery = explode( ',', $tz_gallery );
	}

	if( $tz_lightbox_image == 1 ) {
		if( !empty( $gallery ) ):
			echo '<div class="gallery-'.$tz_lightbox_image_column.'-column gutter post-popup-gallery grid-cursor-light margin-four-bottom sm-margin-five-bottom xs-margin-five-bottom">';
				echo '<ul class="grid-gallery">';
				foreach ( $gallery as $key => $value ) {
					$thumb = wp_get_attachment_image_src( $value, $tz_single_post_feature_image_size );

					$tz_img_lightbox_caption = paperio_lightbox_image_caption( $value );
					$tz_img_lightbox_title = paperio_lightbox_image_title( $value );
					$tz_lightbox_image_caption = ( isset( $tz_img_lightbox_caption['caption'] ) && !empty( $tz_img_lightbox_caption['caption'] ) ) ? ' lightbox_caption="'.$tz_img_lightbox_caption['caption'].'"' : '' ;
					$tz_lightbox_image_title = ( isset( $tz_img_lightbox_title['title'] ) && !empty( $tz_img_lightbox_title['title'] ) ) ? ' title="'.$tz_img_lightbox_title['title'].'"' : '' ;
	
					if( $value ){
		                echo '<li>';
		                    echo '<a class="gallery-img-hover" href="'.esc_url( $thumb[0] ).'"'.$tz_lightbox_image_title.$tz_lightbox_image_caption.'>';
		                    	echo wp_get_attachment_image( $value, $tz_single_post_feature_image_size );
		                    echo '</a>';
		                echo '</li>';
		            }
				}
				echo '</ul>';
			echo '</div>';
		endif;
	    
	} else {
		if( !empty( $gallery ) ):
			echo '<div class="post-owl-slider-simple owl-carousel owl-cursor-light owl-next-prev-fix-arrow owl-next-prev-arrow-style2 owl-round-pagination overflow-hidden margin-four-bottom sm-margin-five-bottom xs-margin-five-bottom owl-theme">';
			foreach ( $gallery as $key => $value ) {
				if( $value ):
		            echo '<div class="item">';
		            	echo wp_get_attachment_image( $value, $tz_single_post_feature_image_size );
		            echo '</div>';
		        endif;
			}
			echo '</div>';
		endif;
	}

	$tz_image = paperio_post_meta( 'tz_image' );
	$tz_img_alt = paperio_image_alt( get_post_thumbnail_id() );
    $tz_img_title = paperio_image_title( get_post_thumbnail_id() );
    $tz_image_alt = ( isset($tz_img_alt['alt']) && !empty($tz_img_alt['alt']) ) ? $tz_img_alt['alt'] : '' ; 
    $tz_image_title = ( isset($tz_img_title['title']) && !empty($tz_img_title['title']) ) ? ' title="'.$tz_img_title['title'].'"' : '';
    if( $tz_image == 1 ) :
	    if ( has_post_thumbnail() ) {
	    	echo '<div class="margin-four-bottom sm-margin-five-bottom xs-margin-five-bottom">';
	        the_post_thumbnail( $tz_single_post_feature_image_size , $tz_image_title ,$tz_image_alt );
	        echo '</div>';
	    }
	endif;