<?php
/**
 * Paperio Mega Menu Options For Admin And Front.
 *
 * @package Paperio
 */
?>
<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Navigation Menu API: Paperio_Mega_Menu_Walker class
 *
 */

/**
 * Paperio Front Menu Walker Class.
 *
 */

if( !class_exists( 'Paperio_Mega_Menu_Walker' ) ) {
    class Paperio_Mega_Menu_Walker extends Walker_Nav_Menu {

    	public $get_first_level_menu_id = '';
        /**
         * Starts the list before the elements are added.
         *
         * @see Walker::start_lvl()
         *
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            
            //Get parent data third level
            $paperio_get_first_level_status = get_post_meta( $this->get_first_level_menu_id, '_paperio_mega_menu_item_status', true );

            if( $depth == 0 && $paperio_get_first_level_status == 'enabled' ):
    	        $output .= "\n$indent<ul class=\"sub-menu dropdown-menu megamenu\">\n";
    	    elseif( $depth == 1 && $paperio_get_first_level_status == 'enabled' ):
                $output .= "\n$indent<ul class=\"sub-menu\">\n";
            else:
    	    	$output .= "\n$indent<ul class=\"sub-menu dropdown-menu\">\n";
    	    endif;
            
        }

        /**
         * Ends the list of after the elements are added.
         *
         * @see Walker::end_lvl()
         *
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
        	if( $depth == 0 ) {
                $this->get_first_level_menu_id = '';
            }

            $indent = str_repeat( "\t", $depth );
            $output .= "$indent</ul>\n";
        }

        /**
         * Start the element output.
         *
         * @see Walker::start_el()
         *
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            /**
             *  Get All Postmeta Of Current Item.
             *
             */

            //$attribute_class = $mega_menu_attribute = $col_setting = '';
            $paperio_mega_menu_item_status       = get_post_meta( $item->ID, '_paperio_mega_menu_item_status', true );
            $paperio_mega_menu_item_title_status = get_post_meta( $item->ID, '_paperio_mega_menu_item_title_status', true );
            $paperio_mega_menu_columns           = get_post_meta( $item->ID, '_paperio_mega_menu_columns', true );
            $paperio_mega_menu_item_sidebar      = get_post_meta( $item->ID, '_paperio_mega_menu_item_sidebar', true );

            // Get Parent Item Status.
            $paperio_mega_menu_parent_item_status = get_post_meta( $item->menu_item_parent, '_paperio_mega_menu_item_status', true );
            $paperio_mega_menu_parent_columns = get_post_meta( $item->menu_item_parent, '_paperio_mega_menu_columns', true );

            //Get parent data third level
            $paperio_get_first_level_status = get_post_meta( $this->get_first_level_menu_id, '_paperio_mega_menu_item_status', true );

            /**
             * Add Custom Class For Paperio Theme.
             *
             */
            if( $item -> hasChildren && $depth == 0 ) {
                $classes[] = 'dropdown';
            }

            if( $item -> hasChildren && $depth == 1 && $paperio_mega_menu_parent_item_status != 'enabled' ) {
                $classes[] = 'dropdown-submenu';
            }

            if( $item -> hasChildren && $depth == 2 ) {
                $classes[] = 'dropdown-submenu';
            }

            switch ($depth) {
            	case '0':
            		if( $paperio_mega_menu_item_status == 'enabled' ) {
            			$this->get_first_level_menu_id = $item->ID;
                    }
            	break;
            	case '1':
            		if( $paperio_mega_menu_parent_item_status == 'enabled' ) :
    	        		switch( $paperio_mega_menu_parent_columns ) {
    	                    case '1':
    	                        $classes[] = "col-sm-12";
    	                        break;

    	                    case '2':
    	                        $classes[] = "col-sm-6";
    	                        break;

    	                    case '3':
    	                        $classes[] = "col-sm-4";
    	                        break;

    	                    case '4':
    	                        $classes[] = "col-sm-3";
    	                        break;

    	                    default:
    	                        $classes[] = "col-sm-3";
    	                        break;
    	                }
    	            endif;

            	break;
    		}
    		if( $paperio_mega_menu_item_sidebar != '0' ){
            	$classes[] = 'paperio-menu-sidebar';
            }
            /**
             * Filter the arguments for a single nav menu item.
             *
             */
            $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

            /**
             * Filter the CSS class(es) applied to a menu item's list item element.
             *
             */
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
            /**
             * Filter the ID applied to a menu item's list item element.
             *
             */
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $class_names .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

            /**
             * Filter the HTML attributes applied to a menu item's anchor element.
             *
             */
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            /* Add "dropdown-toggle" class in first level menu */
            $menu_classes = '';
            if( $depth == 0 && $item -> hasChildren ) {
                $menu_classes .= ' class="dropdown-toggle"';
            }

            if( $paperio_mega_menu_item_title_status == 'enabled' && $depth == 1 ) {
                $menu_classes .= ' class="dropdown-header"';
            }

            /** This filter is documented in wp-includes/post-template.php */
            $title = apply_filters( 'the_title', $item->title, $item->ID );

            /**
             * Filter a menu item's title.
             *
             */
            $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
            
            $item_output = $args->before;

            if( $paperio_mega_menu_item_sidebar != '0' && $paperio_get_first_level_status == 'enabled' ) {
                ob_start();
                dynamic_sidebar( $paperio_mega_menu_item_sidebar );
                $item_output .= ob_get_contents();
                ob_end_clean();
            } else {
                if( $item -> hasChildren && $depth == 0 ) {
                    $item_output .= '<a class="dropdown-caret-icon" data-toggle="dropdown"><i class="fas fa-caret-down"></i></a>';
                }

    	        $item_output .= '<a' .$attributes.$menu_classes. ' itemprop="url">';
                    $item_output .= $args->link_before . $title . $args->link_after;
    	        $item_output .= '</a>';
    	    }
            $item_output .= $args->after;

            /**
             * Filter a menu item's starting output.
             *
             */
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

        /**
         * Ends the element output, if needed.
         *
         * @see Walker::end_el()
         *
         */
        public function end_el( &$output, $item, $depth = 0, $args = array() ) {

            if( $depth == 0 ) {
                $this->get_first_level_menu_id = '';
            }
            
            $output .= "</li>\n";
        }

        function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
            // check, whether there are children for the given ID and append it to the element with a (new) ID
            $element->hasChildren = isset( $children_elements[$element->ID] ) && !empty( $children_elements[$element->ID] );
            return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }
    }
}