<?php
/**
 * Template for displaying search forms in Paperio
 *
 * @package Paperio
 */
?>
<?php $tz_header_seach_placeholder = get_theme_mod( 'tz_header_seach_placeholder', 'Search Here....' );?>
<form role="search" method="get" class="search-form navbar-form no-padding" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group add-on">
		<input type="search" aria-label="<?php _e( 'Search', 'paperio' ); ?>" class="search-field form-control" placeholder="<?php echo esc_attr( $tz_header_seach_placeholder ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<div class="input-group-btn">
        	<button class="btn btn-default" type="submit">
        		<span class="screen-reader-text"><?php esc_html_e( 'Search', 'paperio' ); ?></span>
        		<i class="fas fa-search"></i>
        	</button>
        </div>
	</div>
</form>