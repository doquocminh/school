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

/*
 * Saves new field to postmeta for navigation.
 *
 */
add_action( 'wp_update_nav_menu_item', 'paperio_nav_option_update', 10, 3 );
if ( ! function_exists( 'paperio_nav_option_update' ) ) :
    function paperio_nav_option_update( $menu_id, $menu_item_db_id, $args ) {
        
        if( !isset( $_REQUEST['menu-item-paperio-mega-menu-item-status'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-paperio-mega-menu-item-status'][$menu_item_db_id] = '';
        }
        $paperio_mega_menu_item_status = $_REQUEST['menu-item-paperio-mega-menu-item-status'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_paperio_mega_menu_item_status', $paperio_mega_menu_item_status );

        if( !isset( $_REQUEST['menu-item-paperio-mega-menu-item-title-status'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-paperio-mega-menu-item-title-status'][$menu_item_db_id] = '';
        }
        $paperio_mega_menu_item_title_status = $_REQUEST['menu-item-paperio-mega-menu-item-title-status'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_paperio_mega_menu_item_title_status', $paperio_mega_menu_item_title_status );
        
        if( !isset( $_REQUEST['menu-item-paperio-mega-menu-columns'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-paperio-mega-menu-columns'][$menu_item_db_id] = '';
        }
        $paperio_mega_menu_columns = $_REQUEST['menu-item-paperio-mega-menu-columns'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_paperio_mega_menu_columns', $paperio_mega_menu_columns );

        if( !isset( $_REQUEST['menu-item-paperio-mega-menu-item-sidebar'][$menu_item_db_id] )) { 
            $_REQUEST['menu-item-paperio-mega-menu-item-sidebar'][$menu_item_db_id] = '';
        }
        $paperio_mega_menu_item_sidebar = $_REQUEST['menu-item-paperio-mega-menu-item-sidebar'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_paperio_mega_menu_item_sidebar', $paperio_mega_menu_item_sidebar );
    }
endif;

/*
 * Adds value of new field to $item object that will be passed to Walker_Nav_Menu_Edit_Custom.
 *
 */
add_filter( 'wp_setup_nav_menu_item','paperio_get_nav_custom_post_meta' );
if ( ! function_exists( 'paperio_get_nav_custom_post_meta' ) ) :
    function paperio_get_nav_custom_post_meta( $menu_item ) {
        $menu_item->paperio_mega_menu_item_status = get_post_meta( $menu_item->ID, '_paperio_mega_menu_item_status', true );
        $menu_item->paperio_mega_menu_item_title_status = get_post_meta( $menu_item->ID, '_paperio_mega_menu_item_title_status', true );
        $menu_item->paperio_mega_menu_columns = get_post_meta( $menu_item->ID, '_paperio_mega_menu_columns', true );
        $menu_item->paperio_mega_menu_item_sidebar = get_post_meta( $menu_item->ID, '_paperio_mega_menu_item_sidebar', true );
        return $menu_item;
    }
endif;
/*
 * Filter For Edit Walker_Nav_Menu_Edit_Custom Walker.
 *
 */
add_filter( 'wp_edit_nav_menu_walker', 'paperio_custom_nav_edit_walker', 10, 2 );
if ( ! function_exists( 'paperio_custom_nav_edit_walker' ) ) :
    function paperio_custom_nav_edit_walker( $walker, $menu_id ) {
        return 'Paperio_Walker_Nav_Menu_Edit_Custom';
    }
endif;

/**
 * Navigation Menu API: Walker_Nav_Menu_Edit class
 *
 */

/**
 * Create HTML list of nav menu input items.
 *
 */

if( !class_exists( 'Paperio_Walker_Nav_Menu_Edit_Custom' ) ) {
    class Paperio_Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
        /**
         * Starts the list before the elements are added.
         *
         * @see Walker_Nav_Menu::start_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {}

        /**
         * Ends the list of after the elements are added.
         *
         * @see Walker_Nav_Menu::end_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {}

        /**
         * Start the element output.
         *
         * @see Walker_Nav_Menu::start_el()
         * @since 3.0.0
         *
         * @global int $_wp_nav_menu_max_depth
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Menu item data object.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   Not used.
         * @param int    $id     Not used.
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            global $_wp_nav_menu_max_depth;
            $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

            ob_start();
            $item_id = esc_attr( $item->ID );
            $removed_args = array(
                'action',
                'customlink-tab',
                'edit-menu-item',
                'menu-item',
                'page-tab',
                '_wpnonce',
            );

            $original_title = '';
            if ( 'taxonomy' == $item->type ) {
                $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
                if ( is_wp_error( $original_title ) )
                    $original_title = false;
            } elseif ( 'post_type' == $item->type ) {
                $original_object = get_post( $item->object_id );
                $original_title = get_the_title( $original_object->ID );
            } elseif ( 'post_type_archive' == $item->type ) {
                $original_object = get_post_type_object( $item->object );
                $original_title = $original_object->labels->archives;
            }

            $classes = array(
                'menu-item menu-item-depth-' . $depth,
                'menu-item-' . esc_attr( $item->object ),
                'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
            );

            $title = $item->title;

            if ( ! empty( $item->_invalid ) ) {
                $classes[] = 'menu-item-invalid';
                /* translators: %s: title of menu item which is invalid */
                $title = sprintf( esc_html__( '%s (Invalid)', 'paperio' ), $item->title );
            } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
                $classes[] = 'pending';
                /* translators: %s: title of menu item in draft status */
                $title = sprintf( esc_html__('%s (Pending)', 'paperio'), $item->title );
            }

            $title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

            $submenu_text = '';
            if ( 0 == $depth )
                $submenu_text = 'style="display: none;"';

            ?>
            <li id="menu-item-<?php echo esc_attr( $item_id ); ?>" class="<?php echo implode(' ', $classes ); ?>">
                <div class="menu-item-bar">
                    <div class="menu-item-handle">
                        <span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo wp_kses( $submenu_text, wp_kses_allowed_html( 'post' ) );?>><?php _e( 'sub item', 'paperio' ); ?></span></span>
                        <span class="item-controls">
                            <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                            <span class="item-order hide-if-js">
                                <a href="<?php
                                    echo wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action' => 'move-up-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) )
                                        ),
                                        'move-menu_item'
                                    );
                                ?>" class="item-move-up"><abbr title="<?php esc_attr_e( 'Move up', 'paperio' ); ?>">&#8593;</abbr></a>
                                |
                                <a href="<?php
                                    echo wp_nonce_url(
                                        add_query_arg(
                                            array(
                                                'action' => 'move-down-menu-item',
                                                'menu-item' => $item_id,
                                            ),
                                            remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) )
                                        ),
                                        'move-menu_item'
                                    );
                                ?>" class="item-move-down"><abbr title="<?php esc_attr_e( 'Move down', 'paperio' ); ?>">&#8595;</abbr></a>
                            </span>
                            <a class="item-edit" id="edit-<?php echo esc_attr( $item_id ); ?>" title="<?php esc_attr_e( 'Edit Menu Item', 'paperio' ); ?>" href="<?php
                                echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                            ?>"><span class="screen-reader-text"><?php _e( 'Edit', 'paperio' ); ?></span></a>
                        </span>
                    </div>
                </div>

                <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr( $item_id ); ?>">
                    <?php if ( 'custom' == $item->type ) : ?>
                        <p class="field-url description description-wide">
                            <label for="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>">
                                <?php _e( 'URL', 'paperio' ); ?><br />
                                <input type="text" id="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                            </label>
                        </p>
                    <?php endif; ?>
                    <p class="description description-wide">
                        <label for="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>">
                            <?php _e( 'Navigation Label', 'paperio' ); ?><br />
                            <input type="text" id="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                        </label>
                    </p>
                    <p class="field-title-attribute description description-wide">
                        <label for="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>">
                            <?php _e( 'Title Attribute', 'paperio' ); ?><br />
                            <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                        </label>
                    </p>
                    <p class="field-link-target description">
                        <label for="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>">
                            <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $item->target, '_blank' ); ?> />
                            <?php _e( 'Open link in a new tab', 'paperio' ); ?>
                        </label>
                    </p>
                    <p class="field-css-classes description description-thin">
                        <label for="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>">
                            <?php _e( 'CSS Classes (optional)', 'paperio' ); ?><br />
                            <input type="text" id="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                        </label>
                    </p>
                    <p class="field-xfn description description-thin">
                        <label for="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>">
                            <?php _e( 'Link Relationship (XFN)', 'paperio' ); ?><br />
                            <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                        </label>
                    </p>
                    <p class="field-description description description-wide">
                        <label for="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>">
                            <?php _e( 'Description', 'paperio' ); ?><br />
                            <textarea id="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
                            <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'paperio'); ?></span>
                        </label>
                    </p>

                    <?php 
                        /* Mega Menu Custom Field Start */ 
                        $item->paperio_mega_menu_item_status = get_post_meta( $item_id, '_paperio_mega_menu_item_status', true );
                        $item->paperio_mega_menu_item_title_status = get_post_meta( $item_id, '_paperio_mega_menu_item_title_status', true );
                        $item->paperio_mega_menu_columns = get_post_meta( $item_id, '_paperio_mega_menu_columns', true );
                        $item->paperio_mega_menu_item_sidebar = get_post_meta( $item_id, '_paperio_mega_menu_item_sidebar', true );
                    ?>
                    <?php /* Enable Mega Menu Start */ ?>
                    <div class="paperio-admin-mega-menu-init" id="paperio-admin-mega-menu-init">
                        <?php $status_checked = $single_status_checked = $title_status_checked = ''; ?>
                        <p class="field-paperio-mega-menu-item-status description description-wide">
                            <label for="edit-menu-item-paperio-mega-menu-item-status-<?php echo esc_attr( $item_id ); ?>">
                                <?php $status_checked = ( $item->paperio_mega_menu_item_status == 'enabled' ) ? 'checked="checked"' : '' ; ?>
                                <input type="checkbox" id="edit-menu-item-paperio-mega-menu-item-status-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-paperio-mega-menu-item-status" name="menu-item-paperio-mega-menu-item-status[<?php echo esc_attr( $item_id ); ?>]" value="enabled" <?php echo esc_attr( $status_checked ); ?> />
                                <strong><?php _e( 'Enable Paperio Mega Menu For This Item (only for main parent)', 'paperio' ); ?></strong>
                            </label>
                        </p>
                        <p class="field-paperio-mega-menu-item-columns description description-wide">
                            <label for="edit-menu-item-paperio-mega-menu-columns-<?php echo esc_attr( $item_id ); ?>">
                                <strong class="mega-menu-title"><?php _e( 'Select Mega Menu Number of Columns', 'paperio' ); ?></strong>
                                <select id="edit-menu-item-paperio-mega-menu-columns-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-paperio-mega-menu-columns" name="menu-item-paperio-mega-menu-columns[<?php echo esc_attr( $item_id ); ?>]">
                                    <option <?php if( $item->paperio_mega_menu_columns == '1' ) { echo 'selected="selected" '; }?> value="1">1</option>
                                    <option <?php if( $item->paperio_mega_menu_columns == '2' ) { echo 'selected="selected" '; }?> value="2">2</option>
                                    <option <?php if( $item->paperio_mega_menu_columns == '3' ) { echo 'selected="selected" '; }?> value="3">3</option>
                                    <option <?php if( $item->paperio_mega_menu_columns == '4' ) { echo 'selected="selected" '; }?> value="4">4</option>
                                </select>
                            </label>
                        </p>
                        <p class="field-paperio-mega-menu-item-title-status description description-wide">
                            <label for="edit-menu-item-paperio-mega-menu-item-title-status-<?php echo esc_attr( $item_id ); ?>">
                                <?php $title_status_checked = ( $item->paperio_mega_menu_item_title_status == 'enabled' ) ? 'checked="checked"' : '' ; ?>
                                <input type="checkbox" id="edit-menu-item-paperio-mega-menu-item-title-status-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-paperio-mega-menu-item-title-status" name="menu-item-paperio-mega-menu-item-title-status[<?php echo esc_attr( $item_id ); ?>]" value="enabled" <?php echo esc_attr( $title_status_checked ); ?> />
                                <strong><?php _e( 'Enable Paperio Mega Menu Title For This Item.', 'paperio' ); ?></strong>
                            </label>
                        </p>
                        <?php /* Set Mega Menu Item As Sidebar Start */ ?>
                        <p class="field-paperio-mega-menu-item-sidebar description description-wide">
                            <label for="edit-paperio-mega-menu-item-sidebar-<?php echo esc_attr( $item_id ); ?>">
                                <strong class="mega-menu-title"><?php _e( 'Select Mega Menu Item Sidebar( If sidebar selected then menu title will remove only shows sidebar on menu).', 'paperio' ); ?></strong>
                                <?php 
                                    echo '<select id="edit-menu-item-paperio-mega-menu-item-sidebar-'.$item_id.'" class="widefat code edit-menu-item-paperio-mega-menu-item-sidebar" name="menu-item-paperio-mega-menu-item-sidebar['.$item_id.']">';
                                        global $wp_registered_sidebars;
                                        if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ){ 
                                            echo '<option value="0">'.esc_html__( 'Select Widget Area', 'paperio' ).'</option>';
                                            foreach( $wp_registered_sidebars as $sidebar ){
                                                $sidebar_value = $item->paperio_mega_menu_item_sidebar;
                                                $selected = ( ( $sidebar_value == $sidebar['id'] ) ) ? ' selected="selected"' : '';
                                                echo '<option '.$selected.' sidebar-id="'. $sidebar['id'] .'" value="'. $sidebar['id'] .'">'.htmlspecialchars( $sidebar['name'] ).'</option>';
                                            }
                                        }
                                    echo '</select>';
                                ?>
                            </label>
                        </p>
                        <?php /* Set Mega Menu Item As Sidebar End */ ?>

                    </div>
                    <?php /* Enable Mega Menu End */ ?>

                    <p class="field-move hide-if-no-js description description-wide">
                        <label>
                            <span><?php _e( 'Move', 'paperio' ); ?></span>
                            <a href="#" class="menus-move menus-move-up" data-dir="up"><?php _e( 'Up one', 'paperio' ); ?></a>
                            <a href="#" class="menus-move menus-move-down" data-dir="down"><?php _e( 'Down one', 'paperio' ); ?></a>
                            <a href="#" class="menus-move menus-move-left" data-dir="left"></a>
                            <a href="#" class="menus-move menus-move-right" data-dir="right"></a>
                            <a href="#" class="menus-move menus-move-top" data-dir="top"><?php _e( 'To the top', 'paperio' ); ?></a>
                        </label>
                    </p>

                    <div class="menu-item-actions description-wide submitbox">
                        <?php if ( 'custom' != $item->type && $original_title !== false ) : ?>
                            <p class="link-to-original">
                                <?php printf( esc_html__( 'Original: %s', 'paperio' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                            </p>
                        <?php endif; ?>
                        <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr( $item_id ); ?>" href="<?php
                        echo wp_nonce_url(
                            add_query_arg(
                                array(
                                    'action' => 'delete-menu-item',
                                    'menu-item' => $item_id,
                                ),
                                admin_url( 'nav-menus.php' )
                            ),
                            'delete-menu_item_' . $item_id
                        ); ?>"><?php _e( 'Remove', 'paperio' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr( $item_id ); ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
                            ?>#menu-item-settings-<?php echo esc_attr( $item_id ); ?>"><?php _e( 'Cancel', 'paperio' ); ?></a>
                    </div>
                    <div class="clear"></div>
                    <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item_id ); ?>" />
                    <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
                    <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
                    <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
                    <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                    <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
                </div>
                <ul class="menu-item-transport"></ul>
            <?php
            $output .= ob_get_clean();
        }

    } // Walker_Nav_Menu_Edit
}