<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "header" tag.
 *
 * @package Paperio
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php
	wp_body_open();
	
	if( is_home() ) {
		get_template_part( 'templates/header/header' );
		get_template_part( 'templates/featured-slider/content' );
		get_template_part( 'templates/latest-popular-post/content' );
		get_template_part( 'templates/promotional-block/content' );
	} else {
		get_template_part( 'templates/header/header' );
	}