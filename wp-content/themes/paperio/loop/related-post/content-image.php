<?php
    $tz_related_posts_feature_image_size = get_theme_mod( 'tz_related_posts_feature_image_size', 'medium_large' );
    $tz_img_alt = paperio_image_alt( get_post_thumbnail_id() );
    $tz_img_title = paperio_image_title( get_post_thumbnail_id() );
    $tz_image_alt = ( isset($tz_img_alt['alt']) && !empty($tz_img_alt['alt']) ) ? $tz_img_alt['alt'] : '' ; 
    $tz_image_title = ( isset($tz_img_title['title']) && !empty($tz_img_title['title']) ) ? ' title="'.$tz_img_title['title'].'"' : '';
    if ( has_post_thumbnail() ) {
        echo '<a href="'.get_permalink().'">';
    	    if ( has_post_thumbnail() ) {
    	        the_post_thumbnail( $tz_related_posts_feature_image_size, $tz_image_title, $tz_image_alt );
    	    }

            $tz_hide_related_posts_post_format = get_theme_mod( 'tz_hide_related_posts_post_format', 0 );
            if( $tz_hide_related_posts_post_format != '1' ) {

                $tz_lightbox_image = paperio_post_meta( 'tz_lightbox_image' );
                $tz_video_type = paperio_post_meta( 'tz_video_type' );
                
            	if( get_post_format() == 'gallery' && $tz_lightbox_image == '1' ){
            		echo '<span class="post-icon post-type-'.get_post_format().'"></span>';
            	} elseif( get_post_format() == 'gallery' ){
            		echo '<span class="post-icon post-type-'.get_post_format().'-slider"></span>';
            	} elseif( get_post_format() == 'video' && $tz_video_type == 'self' ){
            		echo '<span class="post-icon post-type-'.get_post_format().'-html5"></span>';
            	} elseif( get_post_format() == 'video' ){
            		echo '<span class="post-icon post-type-'.get_post_format().'"></span>';
            	} elseif( get_post_format() == 'audio' ){
            		echo '<span class="post-icon post-type-'.get_post_format().'"></span>';
            	} elseif( get_post_format() == 'quote' ){
            		echo '<span class="post-icon post-type-'.get_post_format().'"></span>';
            	}
            }
        echo '</a>';
    }