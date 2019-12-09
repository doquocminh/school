<?php
/**
 * displaying single posts quote for blog
 *
 * @package Paperio
 */
?>
<?php
    /* Get blog feature image size */
    $tz_single_post_feature_image_size = get_theme_mod( 'tz_single_post_feature_image_size', 'full' );
    /* Check theme type */
    $tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
    $tz_blog_quote_class = ( $tz_theme_type == 'theme-fast-red' ) ? ' bg-dark-gray2' : ' bg-gray';
    $blog_quote = paperio_post_meta( 'tz_quote' );
    if( $blog_quote ):
        echo '<blockquote class="blog-image blog-post-blockquote'.esc_attr( $tz_blog_quote_class ).'">';
            echo '<p>'.esc_html( $blog_quote ).'</p>';
        echo '</blockquote>';
    endif;

    $tz_image = paperio_post_meta("tz_image");
    $tz_img_alt = paperio_image_alt( get_post_thumbnail_id() );
    $tz_img_title = paperio_image_title( get_post_thumbnail_id() );
    $tz_image_alt = ( isset($tz_img_alt['alt']) && !empty($tz_img_alt['alt']) ) ? $tz_img_alt['alt'] : '' ; 
    $tz_image_title = ( isset($tz_img_title['title']) && !empty($tz_img_title['title']) ) ? ' title="'.$tz_img_title['title'].'"' : '';
    if( $tz_image == 1 ){
        echo '<div class="margin-four-bottom sm-margin-five-bottom xs-margin-five-bottom">';
            if ( has_post_thumbnail() ) {
                the_post_thumbnail( $tz_single_post_feature_image_size , $tz_image_title ,$tz_image_alt);
            }
        echo '</div>';
    }