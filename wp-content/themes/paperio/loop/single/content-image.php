<?php
/**
 * displaying single posts featured image for blog
 *
 * @package Paperio
 */
?>
<?php
	/* Get blog feature image size */
    $tz_single_post_feature_image_size = get_theme_mod( 'tz_single_post_feature_image_size', 'full' );
	$tz_image = paperio_post_meta( 'tz_image' );
	$tz_img_alt = paperio_image_alt( get_post_thumbnail_id() );
    $tz_img_title = paperio_image_title( get_post_thumbnail_id() );
    $tz_image_alt = ( isset($tz_img_alt['alt']) && !empty($tz_img_alt['alt']) ) ? $tz_img_alt['alt'] : '' ; 
    $tz_image_title = ( isset($tz_img_title['title']) && !empty($tz_img_title['title']) ) ? ' title="'.$tz_img_title['title'].'"' : '';
    if( $tz_image == 1 ) :
	    if ( has_post_thumbnail() ) {
	    	echo '<div class="margin-four-bottom sm-margin-five-bottom xs-margin-five-bottom">';
	        the_post_thumbnail( $tz_single_post_feature_image_size, $tz_image_title, $tz_image_alt );
	        echo '</div>';
	    }
	endif;