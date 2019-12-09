<?php
/**
 * Excerpt Class.
 *
 * @package Paperio
 */
?>
<?php
// Exerpt length
if( ! class_exists( 'Paperio_Excerpt' ) ){
    class Paperio_Excerpt {

      public static $length = 34;

      public static function paperio_get_by_length( $new_length = 34 ) {
        return Paperio_Excerpt::paperio_get( $new_length );
      }

      public static function paperio_get( $new_length ) {
        $tz_output_data = '';
        $content = get_the_content();
        $pattern = get_shortcode_regex();
        if( get_the_excerpt() ) {
          $tz_output_data = get_the_excerpt();
        } else {
          $tz_output_data = preg_replace_callback( "/$pattern/s", 'paperio_extract_shortcode_contents', $content );
        }
        
        if( $new_length > 0 ) {
          $tz_output_data = wp_trim_words( $tz_output_data, $new_length, '...' );
        } else {
          $tz_output_data = wp_trim_words( $tz_output_data, $new_length, '' );
        }
        return $tz_output_data;
      }

    }
}