<?php
/**
 * Paperio Mega Menu Class.
 *
 * @package Paperio
 */
?>
<?php
/**
 * Defind Paperio Mega Menu Class.
 *
 */
  
if( !class_exists( 'Paperio_Mega_Menu' ) ) {
  /**
   * Main Paperio_Mega_Menu class.
   *
   */
  class Paperio_Mega_Menu {
  /**
   * Construct
   *
   */
    public function __construct() {
      add_action( 'init', array( $this, 'paperio_mega_menu_init' ) );
    }

    public function paperio_mega_menu_init() {
      get_template_part( 'lib/mega-menu/admin-mega-menu-addon' );
      get_template_part( 'lib/mega-menu/front-mega-menu-addon' );
    }
} // end of class

$Paperio_Mega_Menu = new Paperio_Mega_Menu();
} // end of class_exists