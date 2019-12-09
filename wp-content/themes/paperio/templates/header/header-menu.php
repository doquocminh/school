<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="navbar-header">
        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'paperio' ); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>                       
    </div>
    <?php
        
        if( ! has_nav_menu( 'paperiomegamenu' ) ) {
            echo '<div class="menu-main-menu-container navbar-collapse collapse alt-font">';
        }
        if( has_nav_menu( 'paperiomegamenu' ) ) {
            $defaults = array(
                'theme_location'  => 'paperiomegamenu',
                'container'       => 'div',
                'container_class' => 'menu-main-menu-container navbar-collapse collapse alt-font',
                'menu_class'      => 'nav navbar-nav navbar-white paperio-default-menu',
                'walker'          => new Paperio_Mega_Menu_Walker
            );
        } else {
            $defaults = array(
                'container'       => 'ul',
                'menu_class'      => 'nav navbar-nav navbar-white paperio-default-menu',
            );
        }
        
        wp_nav_menu( $defaults );

        if( ! has_nav_menu( 'paperiomegamenu' ) ) {
            echo '</div>';
        }
    ?>
</div>