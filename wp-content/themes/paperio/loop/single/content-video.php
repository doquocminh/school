<?php
/**
 * displaying single posts video for blog
 *
 * @package Paperio
 */
?>
<?php
    /* Get blog feature image size */
    $tz_single_post_feature_image_size = get_theme_mod( 'tz_single_post_feature_image_size', 'full' );
    $video_type = paperio_post_meta( 'tz_video_type' );

    if( $video_type == 'self' ){
    	$video_mp4 = paperio_post_meta( 'tz_video_mp4' );
    	$video_ogg = paperio_post_meta( 'tz_video_ogg' );
    	$video_webm = paperio_post_meta( 'tz_video_webm' );
        $mute = paperio_post_meta( 'tz_enable_mute' );

        $enable_mute = ( $mute == 1 ) ? ' muted' : '';
        if( $video_mp4 || $video_ogg || $video_webm ):
            echo '<div class="margin-four-bottom sm-margin-five-bottom xs-margin-five-bottom">';
                echo '<video autoplay loop controls'.esc_attr( $enable_mute ).'>';
                    if( $video_mp4 ){
                        echo '<source src="'.esc_url( $video_mp4 ).'" type="video/mp4">';
                    }
                    if( $video_ogg ){
                        echo '<source src="'.esc_url( $video_ogg ).'" type="video/ogg">';
                    }
                    if( $video_webm ){
                        echo '<source src="'.esc_url( $video_webm ).'" type="video/webm">';
                    }
                echo '</video>';
            echo '</div>';
        endif;
    	
    } else {
    	$tz_video = paperio_post_meta( 'tz_video' );
        if( $tz_video ):
            echo '<div class="margin-four-bottom sm-margin-five-bottom xs-margin-five-bottom fit-videos">';
            if( $tz_video ) {
                $video_attributes = '';
                if (strpos( $tz_video, 'autoplay=1' ) !== false) {
                    $video_attributes = ' allow="autoplay"';
                }
                echo '<iframe src="'.esc_url( $tz_video ).'" allowfullscreen width="640" height="360"'.$video_attributes.'></iframe>';
            } else {
                printf( $tz_video );
            }
            echo '</div>';

        endif;
    }

    $tz_image = paperio_post_meta( 'tz_image' );
    $tz_img_alt = paperio_image_alt( get_post_thumbnail_id() );
    $tz_img_title = paperio_image_title( get_post_thumbnail_id() );
    $tz_image_alt = ( isset($tz_img_alt['alt']) && !empty($tz_img_alt['alt']) ) ? $tz_img_alt['alt'] : '' ; 
    $tz_image_title = ( isset($tz_img_title['title']) && !empty($tz_img_title['title']) ) ? ' title="'.$tz_img_title['title'].'"' : '';
    if( $tz_image == 1 ) {
        if ( has_post_thumbnail() ) {
            echo '<div class="margin-four-bottom sm-margin-five-bottom xs-margin-five-bottom">';
            the_post_thumbnail( $tz_single_post_feature_image_size , $tz_image_title ,$tz_image_alt );
            echo '</div>';
        }
    }