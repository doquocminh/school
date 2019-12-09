<?php
/**
 * The template for displaying Author bios
 *
 * @package Paperio
 */
?>
<?php
    /* Check theme type */
    $tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
    $tz_blog_author_bio_class = ( $tz_theme_type == 'theme-fast-red' ) ? ' bg-dark-gray2' : ' bg-gray';
    $tz_author_extra_class = ( is_author() ) ? ' margin-eight-bottom border-light': '';
    /* Start Author Info. */
    echo '<div class="col-md-12 col-sm-12 col-xs-12 about-author padding-four xs-padding-five vcard author'.$tz_blog_author_bio_class.$tz_author_extra_class.'">';
        echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" class="about-author-img">'.get_avatar( get_the_author_meta( 'user_email' ), 300 ).'</a>';
        echo '<div class="about-author-text position-reletive overflow-hidden">';
            echo '<p><a class="author-name text-small alt-font text-uppercase fn" href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'.get_the_author().'</a></p>';
            if( get_the_author_meta( 'description' ) ) :
                echo '<p class="about-author-text note">'.get_the_author_meta( 'description' ).'</p>';
            endif;
            
            $tz_facebook = ( get_the_author_meta( 'tz_facebook' ) ) ? get_the_author_meta( 'tz_facebook' ) : '';
            $tz_twitter = ( get_the_author_meta( 'tz_twitter' ) ) ? get_the_author_meta( 'tz_twitter' ) : '';
            $tz_googleplus = ( get_the_author_meta( 'tz_googleplus' ) ) ? get_the_author_meta( 'tz_googleplus' ) : '';
            $tz_linkedin = ( get_the_author_meta( 'tz_linkedin' ) ) ? get_the_author_meta( 'tz_linkedin' ) : '';
            $tz_instagram = ( get_the_author_meta( 'tz_instagram' ) ) ? get_the_author_meta( 'tz_instagram' ) : '';
            $tz_pinterest = ( get_the_author_meta( 'tz_pinterest' ) ) ? get_the_author_meta( 'tz_pinterest' ) : '';
            $tz_rss = ( get_the_author_meta( 'tz_rss' ) ) ? get_the_author_meta( 'tz_rss' ) : '';
            $tz_youtube = ( get_the_author_meta( 'tz_youtube' ) ) ? get_the_author_meta( 'tz_youtube' ) : '';
            $tz_bloglovin = ( get_the_author_meta( 'tz_bloglovin' ) ) ? get_the_author_meta( 'tz_bloglovin' ) : '';
            $tz_tumblr = ( get_the_author_meta( 'tz_tumblr' ) ) ? get_the_author_meta( 'tz_tumblr' ) : '';
            $tz_dribbble = ( get_the_author_meta( 'tz_dribbble' ) ) ? get_the_author_meta( 'tz_dribbble' ) : '';
            $tz_soundcloud = ( get_the_author_meta( 'tz_soundcloud' ) ) ? get_the_author_meta( 'tz_soundcloud' ) : '';
            $tz_vimeo = ( get_the_author_meta( 'tz_vimeo' ) ) ? get_the_author_meta( 'tz_vimeo' ) : '';
            $tz_flickr = ( get_the_author_meta( 'tz_flickr' ) ) ? get_the_author_meta( 'tz_flickr' ) : '';
            
            if( $tz_facebook || $tz_twitter || $tz_googleplus || $tz_linkedin || $tz_instagram || $tz_pinterest || $tz_rss || $tz_youtube || $tz_bloglovin || $tz_tumblr || $tz_dribbble || $tz_soundcloud || $tz_vimeo || $tz_flickr ) :
                echo '<div class="author-sharing">';

                    /* Check Faceboox */
                    if( $tz_facebook ) {
                        echo '<a href="'.esc_url( $tz_facebook ).'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
                    }
                    /* Check Twitter */
                    if( $tz_twitter ) {
                        echo '<a href="'.esc_url( $tz_twitter ).'" target="_blank"><i class="fab fa-twitter"></i></a>';
                    }
                    /* Check Google Plus */
                    if( $tz_googleplus ) {
                        echo '<a href="'.esc_url( $tz_googleplus ).'" target="_blank"><i class="fab fa-google-plus-g"></i></a>';
                    }
                    /* Check Linkedin */
                    if( $tz_linkedin ) {
                        echo '<a href="'.esc_url( $tz_linkedin ).'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
                    }
                    /* Check Instagram */
                    if( $tz_instagram ) {
                        echo '<a href="'.esc_url( $tz_instagram ).'" target="_blank"><i class="fab fa-instagram"></i></a>';
                    }
                    /* Check Pinterest */
                    if( $tz_pinterest ) {
                        echo '<a href="'.esc_url( $tz_pinterest ).'" target="_blank"><i class="fab fa-pinterest-p"></i></a>';
                    }
                    /* Check Rss */
                    if( $tz_rss ) {
                        echo '<a href="'.esc_url( $tz_rss ).'" target="_blank"><i class="fas fa-rss"></i></a>';
                    }
                    /* Check Youtube */
                    if( $tz_youtube ) {
                        echo '<a href="'.esc_url( $tz_youtube ).'" target="_blank"><i class="fab fa-youtube"></i></a>';
                    }
                    /* Check Bloglovin */
                    if( $tz_bloglovin ) {
                        echo '<a href="'.esc_url( $tz_bloglovin ).'" target="_blank"><i class="fas fa-heart"></i></a>';
                    }
                    /* Check Tumblr */
                    if( $tz_tumblr ) {
                        echo '<a href="'.esc_url( $tz_tumblr ).'" target="_blank"><i class="fab fa-tumblr"></i></a>';
                    }
                    /* Check Dribbble */
                    if( $tz_dribbble ) {
                        echo '<a href="'.esc_url( $tz_dribbble ).'" target="_blank"><i class="fab fa-dribbble"></i></a>';
                    }
                    /* Check SoundCloud */
                    if( $tz_soundcloud ) {
                        echo '<a href="'.esc_url( $tz_soundcloud ).'" target="_blank"><i class="fab fa-soundcloud"></i></a>';
                    }
                    /* Check Vimeo */
                    if( $tz_vimeo ) {
                        echo '<a href="'.esc_url( $tz_vimeo ).'" target="_blank"><i class="fab fa-vimeo-v"></i></a>';
                    }
                    /* Check Flickr */
                    if( $tz_flickr ) {
                        echo '<a href="'.esc_url( $tz_flickr ).'" target="_blank"><i class="fab fa-flickr"></i></a>';
                    }
                echo '</div>';
            endif;
        echo '</div>';
    echo '</div>';
    /* End Author Info. */