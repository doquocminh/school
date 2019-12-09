<?php

    // Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

    if( ! function_exists( 'paperio_option' ) ) :
        function paperio_option( $option, $default_value ) {
            
            global $post;
            $option_value = '';
            $value = get_post_meta( $post->ID, $option.'_single', true);
            if( is_string( $value ) && ( strlen( $value ) > 0 || is_array( $value ) ) && ( $value != 'default' ) ) {
                $option_value = $value;
            } else {
                $option_value = get_theme_mod( $option, $default_value );
            }
            return $option_value;
        }
    endif;

    if( ! function_exists( 'paperio_post_meta' ) ) :
        function paperio_post_meta( $option ) {
            global $post;
            $value = get_post_meta( $post->ID, $option.'_single', true);
            return $value;
        }
    endif;

    /* For Image Alt Text */
    if ( ! function_exists( 'paperio_image_alt' ) ) :
        function paperio_image_alt( $attachment_id ) {
            /* Check image alt is on / off */
            $tz_image_alt = get_theme_mod( 'tz_image_alt', 0 );

            if( $attachment_id && ( $tz_image_alt != 1 ) ) {
                /* Get attachment metadata by attachment id */
                $tz_image_meta = array(
                    'alt' => get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ),
                );
                
                return $tz_image_meta;
            } else {
                return;
            }
        }
    endif;

    /* For Image Title Text */
    if ( ! function_exists( 'paperio_image_title' ) ) :
        function paperio_image_title( $attachment_id ){

            /* Check image title is on / off */
            $tz_image_title = get_theme_mod( 'tz_image_title', 1 );
            
            if( $attachment_id && ( $tz_image_title != 1 ) ) {
                /* Get attachment metadata by attachment id */
                $tz_image_meta = array(
                    'title' =>  esc_attr( get_the_title( $attachment_id ) ),
                );
 
                return $tz_image_meta;
            } else {
                return;
            }
        }
    endif;

    /* For Lightbox Image Title */
    if ( ! function_exists( 'paperio_lightbox_image_title' ) ) :
        function paperio_lightbox_image_title( $attachment_id ) {

            /* Check image title for lightbox popup */
            $tz_image_title_lightbox_popup = get_theme_mod( 'tz_image_title_lightbox_popup', 1 );

            if( $attachment_id && ( $tz_image_title_lightbox_popup != 1 ) ) {

                /* Get attachment metadata by attachment id */
                $attachment = get_post( $attachment_id );
                $tz_image_meta = array(
                    'title' =>  esc_attr( get_the_title( $attachment_id ) ),
                );

                return $tz_image_meta;
            }else{
                return;
            }
        }
    endif;

    /* For Lightbox Image Caption */
    if ( ! function_exists( 'paperio_lightbox_image_caption' ) ) :
        function paperio_lightbox_image_caption( $attachment_id ) {

            /* Check image alt is on / off */
            $tz_image_caption_lightbox_popup = get_theme_mod( 'tz_image_caption_lightbox_popup', 1 );

            if( $attachment_id && ( $tz_image_caption_lightbox_popup != 1 ) ) {
                /* Get attachment metadata by attachment id */
                $attachment = get_post( $attachment_id );
                $tz_image_meta = array(
                    'caption' =>  esc_attr( $attachment->post_excerpt ),
                );
                
                return $tz_image_meta;
                
            } else {
                return;
            }
        }
    endif;

    /* Filter For the_post_thumbnail function attributes */
    if( ! function_exists( 'paperio_filter_the_post_thumbnail_atts' ) ) :
        function paperio_filter_the_post_thumbnail_atts( $atts, $attachment ) {

            /* Check image alt is on / off */
            $tz_image_alt = get_theme_mod( 'tz_image_alt', 0 );
            $tz_image_alt_text = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
            /* Check image title is on / off */
            $tz_image_title = get_theme_mod( 'tz_image_title', 1 );

            /* For image alt attribute */
            if( $tz_image_alt != 1 ) {
                $atts['alt'] = $tz_image_alt_text;
            } else {
                $atts['alt'] = '';
            }

            /* For image title attribute */
            if( $tz_image_title != 1 && $attachment->post_title ) {
                $atts['title'] = esc_attr( $attachment->post_title );
            }

            return $atts;
        }
    endif;
    add_filter( 'wp_get_attachment_image_attributes', 'paperio_filter_the_post_thumbnail_atts', 10, 2 );

    if( ! function_exists( 'paperio_post_category' ) ) :
        function paperio_post_category( $id, $textcolor = 'text-link-light-gray', $count = '10' ) {

            if( $id == '' )
                return;

            $post_category = '';
            if( 'post' === get_post_type() ) {
                $categories = get_the_category($id);
                $category_counter = 0;
                foreach( $categories as $k => $cat ) {
                    if( $count == $category_counter )
                        break;
                    $cat_link = get_category_link( $cat->cat_ID );
                    $post_cat[]='<a rel="category tag" class="'.esc_attr( $textcolor ).'" href="'.esc_url( $cat_link ).'">'.esc_attr( $cat->name ).'</a>';
                    $category_counter++;
                }
                $post_category = implode( ', ', $post_cat );
            }
            return $post_category;
        }
    endif;

    if( ! function_exists( 'paperio_category_option' ) ) :
        function paperio_category_option( $option, $default_value ) {
            
            $option_value = '';
            $t_id = get_query_var( 'cat' );
            $term_meta = get_option( "taxonomy_$t_id" );
            
            if( strlen( $term_meta[$option] ) > 0 && ( $term_meta[$option] != 'default' ) ) {
                $option_value = $term_meta[$option];
            } else {
                $option_value = get_theme_mod( $option, $default_value );
            }
            return $option_value;
        }
    endif;

    /* Check For Category Title */
    if( ! function_exists( 'paperio_category_title_option' ) ) :
        function paperio_category_title_option( $option, $default_value ) {
            
            $option_value = '';
            $t_id = get_query_var( 'cat' );
            $term_meta = get_option( "taxonomy_$t_id" );
            
            if( strlen( $term_meta[$option] ) > 0 && ( $term_meta[$option] != '' ) ) {
                $option_value = $term_meta[$option];
            } else {
                $option_value = get_theme_mod( $option, $default_value );
            }
            return $option_value;
        }
    endif;


    /* Add specific CSS class in body by filter */
    if( ! function_exists( 'paperio_add_body_class' ) ) :
        function paperio_add_body_class( $classes ) {
            $tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
            if( $tz_theme_type ) {
                // add 'class-name' to the $classes array
                $classes[] = $tz_theme_type;
                $classes[] = 'paperio-theme-option';
            }

            /* */
            $tz_remove_font_awesome_style = get_theme_mod( 'tz_remove_font_awesome_style', 1 );
            if( $tz_remove_font_awesome_style ) {
                $classes[] = 'paperio-latest-font-awesome';
            } else {
                $classes[] = 'paperio-old-font-awesome';
            }

            // return the $classes array
            return $classes;
        }
    endif;
    add_filter( 'body_class', 'paperio_add_body_class' );

    /* Grid Layout separator */
    if( ! function_exists( 'paperio_separator' ) ) :
        function paperio_separator() {
            echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-seven-bottom sm-display-none page-separator"><div class="separator-line-wide background-color"></div></div>';
        }
    endif;


    /* List Layout separator */
    if( ! function_exists( 'paperio_line_wide_separator' ) ) :
        function paperio_line_wide_separator() {
            /* Set Theme Type */
            $tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
            $blog_separator_color_class = ( $tz_theme_type == 'theme-fast-red' ) ? ' bg-dark-gray2' : ' bg-middle-gray';
            echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-six-bottom xs-display-none"><div class="separator-line-thin'.esc_attr( $blog_separator_color_class ).'"></div></div>';
        }
    endif;

    /* For WordPress4.4 move comment textarea bottom */
    if( ! function_exists( 'paperio_move_comment_field_to_bottom' ) ) :
        function paperio_move_comment_field_to_bottom( $fields ) {
            if ( has_action( 'set_comment_cookies', 'wp_set_comment_cookies' ) && get_option( 'show_comments_cookies_opt_in' ) ) {
                $comment_field = $fields['comment'];
                $cookies = $fields['cookies'];
                unset( $fields['comment'] );
                unset( $fields['cookies'] );
                $fields['comment'] = $comment_field;
                $fields['cookies'] = $cookies;
            } else {
                $comment_field = $fields['comment'];
                unset( $fields['comment'] );
                $fields['comment'] = $comment_field;
            }
            return $fields;
        }
    endif;
    add_filter( 'comment_form_fields', 'paperio_move_comment_field_to_bottom' );

    if( ! function_exists( 'paperio_admin_login_logo' ) ) :
        /* To change admin panel logo. */
        function paperio_admin_login_logo() { 
            $tz_site_logo = get_theme_mod( 'tz_site_logo', '' );
            if( esc_url( $tz_site_logo ) ):
            ?>
            <style type="text/css">
                .login h1 a { 
                    background-image: url(<?php echo esc_url( $tz_site_logo );?>  ) !important;
                    background-size: contain !important;
                    height: 48px !important;
                    width: 100% !important;
                }
            </style>
            <?php 
            endif;
        }
    endif;
    add_action( 'login_enqueue_scripts', 'paperio_admin_login_logo' );

    // To Change Admin Panel Logo Url.
    if( ! function_exists( 'paperio_login_logo_url' ) ) :
        function paperio_login_logo_url() {
            return home_url( '/' );
        }
    endif;
    add_filter( 'login_headerurl', 'paperio_login_logo_url' );

    // To Change Admin Panel Logo Title.
    if( ! function_exists( 'paperio_login_logo_url_title' ) ) :
        function paperio_login_logo_url_title() {
            $text = get_bloginfo( 'name' ).' | '.get_bloginfo( 'description' );
            return $text;
        }
    endif;
    add_filter( 'login_headertext', 'paperio_login_logo_url_title' );

    if( class_exists( 'WP_Customize_Control' ) ) :

        /* For Animation */
        if( !class_exists( 'Paperio_Customize_Animation_Control' ) ) {
            class Paperio_Customize_Animation_Control extends WP_Customize_Control {

                public $type = 'paperio_animation_style';

                /* Render the control's content. */
                public function render_content() {

                    // Hackily add in the data link parameter.
                    $animation_style = paperio_animation_style_customizer();

                    if( !empty( $animation_style ) ) {
                        ?>
                        <label>
                            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                            <select <?php $this->link(); ?>>
                            <?php
                                foreach ( $animation_style as $value => $label ){
                                    echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
                                }
                                ?>
                            </select>
                        </label>
                        <?php
                    }
                }
            }
        }
        /* For Mutiple Category */
        if( !class_exists( 'Paperio_Customize_Multiple_Category_Control' ) ) {

            class Paperio_Customize_Multiple_Category_Control extends WP_Customize_Control {

                /**
                 * The type of customize control being rendered.
                 */
                public $type = 'multiple-select';

                /**
                 * Displays the multiple select on the customize screen.
                 */
                public function render_content() {

                    $dropdown = wp_dropdown_categories(
                        array(
                                'name'              => '_customize-dropdown-categories-' . $this->id,
                                'echo'              => 0,
                                'show_option_none'  => esc_html__( '&mdash; No Select &mdash;', 'paperio' ),
                                'option_none_value' => '',
                                'hide_empty'        => 0,
                                'value_field'       => 'slug',  
                            )
                    );
                      
                    // Hackily add in the data link parameter.
                    $dropdown = str_replace( '<select', '<select multiple ' . $this->get_link(), $dropdown );

                    printf(
                        '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                        $this->label,
                        $dropdown
                    );
                }
            }
        }
        /* For Category */
        if( !class_exists( 'Paperio_Customize_Category_Control' ) ) {
            class Paperio_Customize_Category_Control extends WP_Customize_Control {
                /* Render the control's content. */
                public function render_content() {

                    $dropdown = wp_dropdown_categories(
                        array(
                                'name'              => '_customize-dropdown-categories-' . $this->id,
                                'echo'              => 0,
                                'show_option_none'  => esc_html__( '&mdash; All Categories &mdash;', 'paperio' ),
                                'option_none_value' => '',
                                'selected'          => $this->value(),
                                'hide_empty'        => 0,
                                'value_field'	    => 'slug',
                            )
                    );
                      
                    // Hackily add in the data link parameter.
                    $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

                    printf(
                        '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                        $this->label,
                        $dropdown
                    );
                }
            }
        }
        /* For Number Control */
        if( !class_exists( 'Paperio_Customize_Number_Control' ) ) {
            class Paperio_Customize_Number_Control extends WP_Customize_Control {
            	public $type = 'number';
                public $min  = '1';
                public $max  = '12';
             
            	public function render_content() {
            		?>
            		<label>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                        <input type="number" min="<?php echo esc_attr( $this->min ) ?>" max="<?php echo esc_attr( $this->max ) ?>" name="quantity" <?php esc_html( $this->link() ); ?> value="<?php echo esc_attr( $this->value() ); ?>">
                    </label>
            		<?php
            	}
            }
        }
        /* For Preview Image */
        if( !class_exists( 'Paperio_Customize_Preview_Image_Control' ) ) {
            class Paperio_Customize_Preview_Image_Control extends WP_Customize_Control {
                public $tz_img  = array();

                public function render_content() {

                    if ( empty( $this->choices ) )
                        return;

                    $name = '_customize-radio-' . $this->id;

                    if ( ! empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo wp_kses( $this->description, wp_kses_allowed_html( 'post' ) ); ?></span>
                    <?php endif;
                    ?>
                    <ul class="paperio-image-select">
                        <?php
                        $tz_img_counter = 0;
                        foreach ( $this->choices as $value => $label ) :
                            $tz_active_class = '';
                            if( $this->value() == $value ) {
                                $tz_active_class = ' active';
                            }
                            ?>
                            <li class="tz-preview-image<?php echo esc_attr( $tz_active_class ); ?>">
                            <label>
                                <?php if ( ! empty( $this->tz_img[$tz_img_counter] ) ) : ?>
                                    <img alt="<?php echo esc_html( $label ); ?>" src="<?php echo esc_url( $this->tz_img[$tz_img_counter] ); ?>">
                                <?php else :
                                    echo esc_html( $label );
                                endif; ?>

                                <input type="radio" style="display:none" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                            </label>
                            </li>
                            <?php
                            $tz_img_counter++;
                        endforeach;
                        ?>
                    </ul>
                    <?php
                }
            }
        }
        /* For Multiple Checkbox */
        if( !class_exists( 'Paperio_Customize_Checkbox_Multiple' ) ) {

            class Paperio_Customize_Checkbox_Multiple extends WP_Customize_Control {
                
                public $type = 'paperio_checkbox_multiple';

                public function render_content() {

                    if ( empty( $this->choices ) )
                        return; ?>

                    <?php if ( !empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif; ?>

                    <?php if ( !empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo wp_kses( $this->description, wp_kses_allowed_html( 'post' ) ); ?></span>
                    <?php endif; ?>

                    <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

                    <ul>
                        <?php foreach ( $this->choices as $value => $label ) : ?>

                            <li>
                                <label>
                                    <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
                                    <?php echo esc_html( $label ); ?>
                                </label>
                            </li>

                        <?php endforeach; ?>
                    </ul>

                    <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
                <?php }
            }
        }
        /* For Switch Control */
        if( !class_exists( 'Paperio_Customize_switch_Control' ) ) {
            class Paperio_Customize_switch_Control extends WP_Customize_Control {
             
                public function render_content() {

                    if ( empty( $this->choices ) )
                        return;

                    $name = '_customize-radio-' . $this->id;

                    if ( ! empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo wp_kses( $this->description, wp_kses_allowed_html( 'post' ) ); ?></span>
                    <?php endif;
                    ?>
                    <ul class="paperio-switch-option">
                    <?php
                        $tz_switch_class = '';
                        foreach ( $this->choices as $value => $label ) :
                            $tz_switch_class = ( $value == 1 ) ? 'tz-switch-option switch-option-enable' : 'tz-switch-option switch-option-disable';

                            $tz_active_class = '';
                            if( $this->value() == $value ) {
                                $tz_active_class = ' active';
                            }
                            ?>
                            <li class="<?php echo esc_attr( $tz_switch_class ); ?><?php echo esc_attr( $tz_active_class ); ?>">
                            <label>
                                <?php echo esc_html( $label ); ?>
                                <input type="radio" style="display:none" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                            </label>
                            </li>
                    <?php
                        endforeach;
                    ?>
                    </ul>
                    <?php
                }
            }
        }
        /* For Separator Control */
        if( !class_exists( 'Paperio_Customize_Separator_Control' ) ) {
            class Paperio_Customize_Separator_Control extends WP_Customize_Control {
             
                public function render_content() {

                    if ( ! empty( $this->label ) ) :
                    ?>
                    <label>
                        <h2 style="text-align: center;"><?php echo esc_html( $this->label ); ?></h2>
                    </label>
                    <?php
                    endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <div class="description customize-section-description"><?php echo sprintf( '%s', $this->description ); ?></div>
                    <?php endif;
                }
            }
        }
        /* For Custom Sidebars */
        if( !class_exists( 'Paperio_Customize_Custom_Sidebars' ) ) {
            class Paperio_Customize_Custom_Sidebars extends WP_Customize_Control {
                public $type = 'Paperio_custom_sidebar';
                public function render_content()
                {
                    ?>
                    <?php if ( !empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif; ?>

                    <?php if ( !empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo wp_kses( $this->description, wp_kses_allowed_html( 'post' ) ); ?></span>
                    <?php endif; ?>

                    <div id="paperio_field_add_sidebar">              
                        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>">
                    </div>
                    <ul id="add_li" class="add-custom-text-box"></ul>
                    <input type="button" class="button button-primary add_more_sidebar" name="add_more_sidebar" value="<?php echo esc_html( 'Add More', 'paperio' ); ?>">
                    <?php
                }
            }
        }

    endif;

        
    if( ! function_exists( 'paperio_posts_link_attributes' ) ) :
        function paperio_posts_link_attributes() {
            return 'class="alt-font text-small"';
        }
    endif;
    add_filter( 'next_posts_link_attributes', 'paperio_posts_link_attributes' );
    add_filter( 'previous_posts_link_attributes', 'paperio_posts_link_attributes' );

    if( ! function_exists( 'paperio_categories_postcount_filter' ) ) :
        function paperio_categories_postcount_filter( $variable ) {
           $variable = str_replace( '(', '<span>(', $variable );
           $variable = str_replace( ')', ')</span>', $variable );
           return $variable;
        }
    endif;
    add_filter( 'wp_list_categories', 'paperio_categories_postcount_filter' );

    // Get the Post Tags
    if( ! function_exists( 'paperio_single_post_meta_tag' ) ) :
        function paperio_single_post_meta_tag() {
        if( 'post' == get_post_type() ) {

                $tags_list = get_the_tag_list( '', _x( '', 'Used between list items, there is a space after the comma.', 'paperio' ) );
                if( $tags_list ) {
                    printf( '<div class="col-md-8 col-sm-12 col-xs-12 no-padding sm-padding-one-bottom text-center border-right-mid-gray post-details-tags sm-no-border meta-border-right">%1$s %2$s</div>',
                        esc_html__( 'Tags:', 'paperio' ),
                        $tags_list
                    );
                }
            }
        }
    endif;

    /**
     * Returns true if comment is by author of the post.
     *
     * @see get_comment_class()
     */
    if( ! function_exists( 'paperio_is_comment_by_post_author' ) ) :
        function paperio_is_comment_by_post_author( $comment = null ) {
            if ( is_object( $comment ) && $comment->user_id > 0 ) {
                $user = get_userdata( $comment->user_id );
                $post = get_post( $comment->comment_post_ID );
                if ( ! empty( $user ) && ! empty( $post ) ) {
                    return $comment->user_id === $post->post_author;
                }
            }
            return false;
        }
    endif;

    /* Custom comment callback */
    if( ! function_exists( 'paperio_comment_callback' ) ) :
        function paperio_comment_callback( $comment, $args, $depth ) {
            if( 'div' === $args['style'] ) {
                $tag       = 'div';
                $add_below = 'comment';
            } else {
                $tag       = 'li';
                $add_below = 'div-comment';
            }
            ?>
            <<?php echo esc_attr($tag) ?> <?php comment_class( empty( $args['has_children'] ) ? 'post-comment' : 'parent post-comment' ) ?> id="comment-<?php comment_ID() ?>">
            <?php if( 'div' != $args['style'] ) : ?>
                <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <?php endif;
            $comment_author_url = get_comment_author_url( $comment );
            if ( 0 != $args['avatar_size'] ) {
                if ( empty( $comment_author_url ) ) {
                    printf( '<span class="comment-author comment-avtar">' );
                        echo get_avatar( $comment, $args['avatar_size'] );
                        if ( paperio_is_comment_by_post_author( $comment ) ) {
                            echo '<span class="post-author-badge" aria-hidden="true"><i class="fas fa-check"></i></span>';
                        }
                    echo '</span>';
                } else {
                    printf( '<a href="%s" rel="external nofollow" class="comment-author comment-avtar">', $comment_author_url );
                        echo get_avatar( $comment, $args['avatar_size'] );
                        if ( paperio_is_comment_by_post_author( $comment ) ) {
                            echo '<span class="post-author-badge" aria-hidden="true"><i class="fas fa-check"></i></span>';
                        }
                    echo '</a>';
                }
            }
            ?>
            <div class="overflow-hidden position-relative comment-text">
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                <p class="text-small text-mid-gray text-uppercase alt-font comment-author-name no-margin-bottom"><?php echo get_comment_author_link() ?></p>
                <p class="comment-meta commentmetadata letter-spacing-1 text-extra-small text-uppercase no-margin-bottom text-gray-light comment-author-date">
                    <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php
                    /* translators: 1: date, 2: time */
                    printf( esc_html__( '%1$s at %2$s', 'paperio' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)', 'paperio' ), '  ', '' );
                    ?>
                </p>
            </div>
            
            <?php if( $comment->comment_approved == '0' ) : ?>
                 <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'paperio' ); ?></em>
                  <br />
            <?php endif; ?>
            <div class="comment-text">
                <?php comment_text(); ?>
            </div>

            <?php if( 'div' != $args['style'] ) : ?>
            </div>
            <?php endif; ?>
            <?php
        }
    endif;

    // filter to replace class on reply link ( comment_reply_link ) function.
    add_filter( 'comment_reply_link', 'paperio_replace_reply_link_class' );
    
    if( ! function_exists( 'paperio_replace_reply_link_class' ) ) :
        function paperio_replace_reply_link_class( $class ) {
            $class = str_replace( "class='comment-reply-link", "class='comment-reply-link comment-reply fl-right text-uppercase alt-font", $class );
            return $class;
        }
    endif;

    /* Single Post Related Post Block */

    if( ! function_exists( 'paperio_related_posts' ) ) :

        function paperio_related_posts( $post_id ) {

            $args = '';
                   
            $tz_related_posts_title = get_theme_mod( 'tz_related_posts_title', 'You May Also Like' );
            $tz_no_of_related_posts = get_theme_mod( 'tz_no_of_related_posts', '3' );
            $tz_show_full_title_in_related_posts = get_theme_mod( 'tz_show_full_title_in_related_posts', 0 );
            $tz_hide_related_posts_post_format = get_theme_mod( 'tz_hide_related_posts_post_format', 0 );
            $tz_related_posts_date_format = get_theme_mod( 'tz_related_posts_date_format', '' );
            $tz_related_posts_hide_date = get_theme_mod( 'tz_related_posts_hide_date', 0 );

            $recent_post = new WP_Query();

            $args = array(
                'category__in'          => wp_get_post_categories( $post_id ),
                'ignore_sticky_posts'   => 1,
                'post_type'             => 'post',
                'post_status'           => 'publish',
                'posts_per_page'        => $tz_no_of_related_posts,
                'post__not_in'          => array( $post_id ),
            );

            $recent_post = new WP_Query( $args );
            if( $recent_post->have_posts() ) {
               
                echo '<div class="col-md-12 col-sm-12 col-xs-12 padding-six-top no-padding-lr related-posts sm-padding-ten-top">';
                    if( $tz_related_posts_title ) :
                        echo '<h5 class="text-uppercase text-mid-gray font-weight-600 text-center margin-six-bottom sm-margin-ten-bottom">'.esc_attr( $tz_related_posts_title ).'</h5>';
                    endif;
                    echo '<div class="row">';
                    while ( $recent_post->have_posts() ) {
                        $recent_post->the_post();
                        
                        /* Get post class and id */
                        $tz_post_classes = '';
                        ob_start();
                            post_class();
                            $tz_post_classes .= ob_get_contents();
                        ob_end_clean();
                        echo '<div id="post-'.get_the_ID().'" '.$tz_post_classes.'>';
                            echo '<div class="col-md-4 col-sm-4 col-xs-12">';
                            if ( !post_password_required() ) {
                                echo '<div class="blog-image">';         
                                    get_template_part( 'loop/related-post/content', 'image' );
                                echo '</div>';
                            }
                                echo '<div class="blog-details margin-six no-margin-lr">';
                                    echo '<h2 class="text-small text-uppercase alt-font comment-author-name margin-one no-margin-lr no-margin-bottom entry-title">';
                                        echo '<a href="'.get_permalink().'">';
                                        if( strlen( get_the_title() ) > 28 && $tz_show_full_title_in_related_posts != 1 ){
                                            echo substr( get_the_title(), 0, 28 ).' ...';
                                        } else {
                                            echo get_the_title();
                                        }
                                    echo '</a>';
                                    echo '</h2>';
                                    if( $tz_related_posts_hide_date != 1 ) :
                                        echo '<p class="letter-spacing-1 text-extra-small text-uppercase no-margin-bottom text-gray-light published">';
                                            echo get_the_date( $tz_related_posts_date_format );
                                        echo '</p>';
                                    endif;
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    wp_reset_postdata();
                    echo '</div>';
                echo '</div>';
            }
        }
    endif;

    /* To get Register Sidebar list in metabox */
    if( ! function_exists( 'paperio_register_sidebar_array' ) ) :
        function paperio_register_sidebar_array() {
            global $wp_registered_sidebars;
            if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ){ 
                $sidebar_array = array();
                $sidebar_array['default'] = esc_html__( 'Default', 'paperio' );
                foreach( $wp_registered_sidebars as $sidebar ){
                    $sidebar_array[$sidebar['id']] = $sidebar['name'];
                }
            }
            return $sidebar_array;
        }
    endif;

    /* To get Register Sidebar list in Customize */
    if( ! function_exists( 'paperio_register_sidebar_customizer_array' ) ) :
        function paperio_register_sidebar_customizer_array() {
            global $wp_registered_sidebars;
            if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ){ 
                $sidebar_array = array();
                $sidebar_array[''] = esc_html__( 'No Sidebar', 'paperio' );
                foreach( $wp_registered_sidebars as $sidebar ){
                    $sidebar_array[$sidebar['id']] = $sidebar['name'];
                }
            }
            return $sidebar_array;
        }
    endif;

    if( ! function_exists( 'paperio_get_the_excerpt_content' ) ) {
        function paperio_get_the_excerpt_content( $length ){
            return Paperio_Excerpt::paperio_get_by_length( $length );
        }
    }

    if( !function_exists( 'paperio_pagination' ) ) :
        function paperio_pagination() {
            $output  = '';
            $tz_general_pagination_style = get_theme_mod( 'tz_general_pagination_style', 'old-new-pagination' );
            ob_start();
                switch ( $tz_general_pagination_style ) {
                    case 'number-pagination':
                        paperio_number_pagination();
                        break;
                    case 'infinite-scroll-pagination':
                        paperio_infinite_scroll_pagination();
                        break;
                    default:
                        paperio_default_pagination();
                        break;
                }
            $output .= ob_get_contents();
            ob_end_clean();
            return $output;
        }
    endif;

    if( !function_exists( 'paperio_default_pagination' ) ) :
        function paperio_default_pagination() {
            /* Return Null if pagination have single page. */
            if( $GLOBALS['wp_query']->max_num_pages < 2 )
                return;
            $tz_general_blog_layout = get_theme_mod( 'tz_general_blog_layout', 'blog-layout-two' );
            $border_top_color = ( ( $tz_general_blog_layout == 'blog-layout-four' || $tz_general_blog_layout == 'blog-layout-seven' ) && is_front_page() ) ? '' : ' border-top-dark-gray';
            echo '<div class="navigation col-md-12 col-sm-12 col-xs-12 margin-four-bottom sm-margin-five-bottom xs-margin-ten-bottom no-padding-lr">';
                echo '<div class="padding-four-top xs-padding-five-top pagination-style1'.$border_top_color.'">';
                    echo '<div class="new-post fl-left text-uppercase">';
                        if( get_previous_posts_link() ) :
                            previous_posts_link( '<i class="fas fa-long-arrow-alt-left text-color"></i><span class="new-post">'.esc_html__( 'New Post', 'paperio' ).'</span>' );
                        endif;
                    echo '</div>';
                    echo '<div class="old-post fl-right text-uppercase">';
                        if( get_next_posts_link() ) :
                            next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'paperio' ).'</span><i class="fas fa-long-arrow-alt-right text-color"></i>' );
                        endif;
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    endif;

    if( !function_exists( 'paperio_number_pagination' ) ) :
        function paperio_number_pagination() {

            /* Return Null if pagination have single page. */
            if( $GLOBALS['wp_query']->max_num_pages < 2 )
                return;
            $tz_general_blog_layout = get_theme_mod( 'tz_general_blog_layout', 'blog-layout-two' );
            $border_top_color = ( ( $tz_general_blog_layout == 'blog-layout-four' || $tz_general_blog_layout == 'blog-layout-seven' ) && is_front_page() ) ? '' : ' border-top-dark-gray';
            echo '<div class="navigation col-md-12 col-sm-12 col-xs-12 margin-four-bottom sm-margin-five-bottom xs-margin-ten-bottom no-padding-lr">';
                echo '<div class="padding-four-top xs-padding-five-top pagination-style2 text-center'.$border_top_color.'">';
                    global $wp_query;

                    $big = 999999999; // need an unlikely integer

                    $page_format = paginate_links( array(
                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'    => '?paged=%#%',
                        'current'   => max( 1, get_query_var('paged') ),
                        'total'     => $wp_query->max_num_pages,
                        'show_all'  => true,
                        'prev_text' => '<i class="fas fa-angle-left text-large"></i>',
                        'next_text' => '<i class="fas fa-angle-right text-large"></i>',
                        'type'      => 'array',
                    ) );
                    if( is_array( $page_format ) )  {
                        foreach ( $page_format as $page ) {
                            $paginate_links = str_replace( 'page-numbers', "page-numbers alt-font", $page );
                            echo "$paginate_links";
                        }
                    } 
                echo '</div>';
            echo '</div>';
        }
    endif;

    if( !function_exists( 'paperio_infinite_scroll_pagination' ) ) :
        function paperio_infinite_scroll_pagination() {
            /* Return Null if pagination have single page. */
            if( $GLOBALS['wp_query']->max_num_pages < 2 )
                return;
            $tz_general_blog_layout = get_theme_mod( 'tz_general_blog_layout', 'blog-layout-two' );
            $border_top_color = ( $tz_general_blog_layout == 'blog-layout-seven' && is_front_page() ) ? '' : ' border-top-dark-gray';
            echo '<div class="navigation paperio-infinite-scroll display-none col-md-12 col-sm-12 col-xs-12 margin-four-bottom sm-margin-five-bottom xs-margin-ten-bottom no-padding-lr" data-pagination="'.$GLOBALS['wp_query']->max_num_pages.'">';
                echo '<div class="padding-four-top xs-padding-five-top pagination-style1'.$border_top_color.'">';
                    echo '<div class="old-post fl-right text-uppercase">';
                        if( get_next_posts_link() ) :
                            next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'paperio' ).'</span><i class="fas fa-long-arrow-alt-right text-color"></i>' );
                        endif;
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    endif;

    /* Paperio category extra custom fields */

    if( !function_exists( 'paperio_category_add_meta_field' ) ) :
        function paperio_category_add_meta_field() {
            // Get All Register Sidebar List.
            $sidebar_array = paperio_register_sidebar_array();

            // this will add the custom meta field to the add new term page
            ?>

            <div class="form-field">
                <label for="term_meta[tz_general_category_type]"><?php echo esc_html__( 'Category Type', 'paperio' ); ?></label>
                <select name="term_meta[tz_general_category_type]" id="tz_general_category_type" class="category-custom-field-select">
                    <option value="default"><?php echo esc_html__( 'Default', 'paperio' ); ?></option>
                    <option value="grid"><?php echo esc_html__( 'Grid', 'paperio' ); ?></option>
                    <option value="masonry"><?php echo esc_html__( 'Masonry', 'paperio' ); ?></option>
                    <option value="list"><?php echo esc_html__( 'List', 'paperio' ); ?></option>
                </select>
            </div>

            <div class="form-field">
                <label for="term_meta[tz_general_category_column_type]"><?php echo esc_html__( 'Column Type', 'paperio' ); ?></label>
                <select name="term_meta[tz_general_category_column_type]" id="tz_general_category_column_type" class="category-custom-field-select">
                    <option value="default"><?php echo esc_html__( 'Default', 'paperio' ); ?></option>
                    <option value="two-columns"><?php echo esc_html__( '2 Columns', 'paperio' ); ?></option>
                    <option value="three-columns"><?php echo esc_html__( '3 Columns', 'paperio' ); ?></option>
                    <option value="four--columns"><?php echo esc_html__( '4 Columns', 'paperio' ); ?></option>
                </select>
            </div>

            <div class="form-field">
                <label for="term_meta[tz_layout_settings_single_category]"><?php echo esc_html__( 'Sidebar Setting', 'paperio' ); ?></label>
                <select name="term_meta[tz_layout_settings_single_category]" id="tz_layout_settings_single_category" class="category-custom-field-select">
                    <option value="default"><?php echo esc_html__( 'Default', 'paperio' ); ?></option>
                    <option value="paperio_layout_full_screen_12col"><?php echo esc_html__( 'One Column', 'paperio' ); ?></option>
                    <option value="paperio_layout_left_sidebar"><?php echo esc_html__( 'Two Columns Left', 'paperio' ); ?></option>
                    <option value="paperio_layout_right_sidebar"><?php echo esc_html__( 'Two Columns Right', 'paperio' ); ?></option>
                    <option value="paperio_layout_both_sidebar"><?php echo esc_html__( 'Three Columns', 'paperio' ); ?></option>
                </select>
            </div>

            <div class="form-field">
                <label for="term_meta[tz_layout_left_sidebar_single_category]"><?php echo esc_html__( 'Left Sidebar', 'paperio' ); ?></label>
                <select name="term_meta[tz_layout_left_sidebar_single_category]" id="tz_layout_left_sidebar_single_category" class="category-custom-field-select">
                    <?php foreach( $sidebar_array as $sidebar_key => $sidebar_value ) { ?>
                        <option value="<?php echo esc_attr( $sidebar_key ); ?>"><?php echo esc_attr( $sidebar_value ); ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-field">
                <label for="term_meta[tz_layout_right_sidebar_single_category]"><?php echo esc_html__( 'Right Sidebar', 'paperio' ); ?></label>
                <select name="term_meta[tz_layout_right_sidebar_single_category]" id="tz_layout_right_sidebar_single_category" class="category-custom-field-select">
                    <?php foreach( $sidebar_array as $sidebar_key => $sidebar_value ) { ?>
                        <option value="<?php echo esc_attr( $sidebar_key ); ?>"><?php echo esc_attr( $sidebar_value ); ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-field">
                <label for="term_meta[tz_enable_container_fluid_single_category]"><?php echo esc_html__( 'Container Style', 'paperio' ); ?></label>
                <select name="term_meta[tz_enable_container_fluid_single_category]" id="tz_enable_container_fluid_single_category" class="category-custom-field-select">
                    <option value="default"><?php echo esc_html__( 'Default', 'paperio' ); ?></option>
                    <option value="no"><?php echo esc_html__( 'Fixed Container', 'paperio' ); ?></option>
                    <option value="yes"><?php echo esc_html__( 'Fluid Container', 'paperio' ); ?></option>
                </select>
            </div>

            <div class="form-field">
                <label for="term_meta[tz_category_breadcrumb_title]"><?php echo esc_html__( 'Category Breadcrumb Title', 'paperio' ); ?></label>
                <input type="text" name="term_meta[tz_category_breadcrumb_title]" id="tz_category_breadcrumb_title" value="" class="category-custom-field-input">
            </div>

        <?php
        }
    endif;
    add_action( 'category_add_form_fields', 'paperio_category_add_meta_field', 10, 2 );

    // Edit category page
    if( !function_exists( 'paperio_category_edit_meta_field' ) ) :
        function paperio_category_edit_meta_field( $term ) {
            // Get All Register Sidebar List.
            $sidebar_array = paperio_register_sidebar_customizer_array();

            // Put the term ID into a variable
            $t_id = $term->term_id;
         
            // Retrieve the existing value for this meta field. This returns an array
            $term_meta = get_option( "taxonomy_$t_id" );
            ?>
            <tr class="form-field field-select">
                <th scope="row" valign="top">
                    <label for="term_meta[tz_general_category_type]"><?php echo esc_html__( 'Category Type', 'paperio' ); ?></label>
                </th>
                <td>
                    <select name="term_meta[tz_general_category_type]" id="tz_general_category_type">
                        <option value="default"><?php echo esc_html__( 'Default', 'paperio' ); ?></option>
                        <option value="grid"<?php selected( $term_meta['tz_general_category_type'], 'grid' ); ?>><?php echo esc_html__( 'Grid', 'paperio' ); ?></option>
                        <option value="masonry"<?php selected( $term_meta['tz_general_category_type'], 'masonry' ); ?>><?php echo esc_html__( 'Masonry', 'paperio' ); ?></option>
                        <option value="list"<?php selected( $term_meta['tz_general_category_type'], 'list' ); ?>><?php echo esc_html__( 'List', 'paperio' ); ?></option>
                    </select>
                </td>
            </tr>

            <tr class="form-field field-select">
                <th scope="row" valign="top">
                    <label for="term_meta[tz_general_category_column_type]"><?php echo esc_html__( 'Column Type', 'paperio' ); ?></label>
                </th>
                <td>
                    <select name="term_meta[tz_general_category_column_type]" id="tz_general_category_column_type">
                        <option value="default"><?php echo esc_html__( 'Default', 'paperio' ); ?></option>
                        <option value="two-columns"<?php selected( $term_meta['tz_general_category_column_type'], 'two-columns' ); ?>><?php echo esc_html__( '2 Columns', 'paperio' ); ?></option>
                        <option value="three-columns"<?php selected( $term_meta['tz_general_category_column_type'], 'three-columns' ); ?>><?php echo esc_html__( '3 Columns', 'paperio' ); ?></option>
                        <option value="four-columns"<?php selected( $term_meta['tz_general_category_column_type'], 'four-columns' ); ?>><?php echo esc_html__( '4 Columns', 'paperio' ); ?></option>
                    </select>
                </td>
            </tr>

            <tr class="form-field field-select">
                <th scope="row" valign="top">
                    <label for="term_meta[tz_layout_settings_single_category]"><?php echo esc_html__( 'Sidebar Setting', 'paperio' ); ?></label>
                </th>
                <td>
                    <select name="term_meta[tz_layout_settings_single_category]" id="tz_layout_settings_single_category">
                        <option value="default"><?php echo esc_html__( 'Default', 'paperio' ); ?></option>
                        <option value="paperio_layout_full_screen_12col"<?php selected( $term_meta['tz_layout_settings_single_category'], 'paperio_layout_full_screen_12col' ); ?>><?php echo esc_html__( 'One Column', 'paperio' ); ?></option>
                        <option value="paperio_layout_left_sidebar"<?php selected( $term_meta['tz_layout_settings_single_category'], 'paperio_layout_left_sidebar' ); ?>><?php echo esc_html__( 'Two Columns Left', 'paperio' ); ?></option>
                        <option value="paperio_layout_right_sidebar"<?php selected( $term_meta['tz_layout_settings_single_category'], 'paperio_layout_right_sidebar' ); ?>><?php echo esc_html__( 'Two Columns Right', 'paperio' ); ?></option>
                        <option value="paperio_layout_both_sidebar"<?php selected( $term_meta['tz_layout_settings_single_category'], 'paperio_layout_both_sidebar' ); ?>><?php echo esc_html__( 'Three Columns', 'paperio' ); ?></option>
                    </select>
                </td>
            </tr>

            <tr class="form-field field-select">
                <th scope="row" valign="top">
                    <label for="term_meta[tz_layout_left_sidebar_single_category]"><?php echo esc_html__( 'Left Sidebar', 'paperio' ); ?></label>
                </th>
                <td>
                    <select name="term_meta[tz_layout_left_sidebar_single_category]" id="tz_layout_left_sidebar_single_category">
                        <option value="default"><?php echo esc_html__( 'Default', 'paperio' ); ?></option>
                        <?php foreach( $sidebar_array as $sidebar_key => $sidebar_value ) { ?>
                            <option value="<?php echo esc_attr( $sidebar_key ); ?>"<?php selected( $term_meta['tz_layout_left_sidebar_single_category'], $sidebar_key ); ?>><?php echo esc_attr( $sidebar_value ); ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr class="form-field field-select">
                <th scope="row" valign="top">
                    <label for="term_meta[tz_layout_right_sidebar_single_category]"><?php echo esc_html__( 'Right Sidebar', 'paperio' ); ?></label>
                </th>
                <td>
                    <select name="term_meta[tz_layout_right_sidebar_single_category]" id="tz_layout_right_sidebar_single_category">
                        <option value="default"<?php echo esc_attr( $term_meta['tz_layout_right_sidebar_single_category'] == 'default' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Default', 'paperio' ); ?></option>
                        <?php foreach( $sidebar_array as $sidebar_key => $sidebar_value ) { ?>
                            <option value="<?php echo esc_attr( $sidebar_key ); ?>"<?php selected( $term_meta['tz_layout_right_sidebar_single_category'], $sidebar_key ); ?>><?php echo esc_attr( $sidebar_value ); ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr class="form-field field-select">
                <th scope="row" valign="top">
                    <label for="term_meta[tz_enable_container_fluid_single_category]"><?php echo esc_html__( 'Container Style', 'paperio' ); ?></label>
                </th>
                <td>
                    <select name="term_meta[tz_enable_container_fluid_single_category]" id="tz_enable_container_fluid_single_category">
                        <option value="default"><?php echo esc_html__( 'Default', 'paperio' ); ?></option>
                        <option value="no"<?php selected( $term_meta['tz_enable_container_fluid_single_category'], 'no' ); ?>><?php echo esc_html__( 'Fixed Container', 'paperio' ); ?></option>
                        <option value="yes"<?php selected( $term_meta['tz_enable_container_fluid_single_category'], 'yes' ); ?>><?php echo esc_html__( 'Fluid Container', 'paperio' ); ?></option>
                    </select>
                </td>
            </tr>

            <tr class="form-field">
                <th scope="row" valign="top">
                    <label for="term_meta[tz_category_breadcrumb_title]"><?php echo esc_html__( 'Category Breadcrumb Title', 'paperio' ); ?></label>
                </th>
                <td>
                    <input type="text" name="term_meta[tz_category_breadcrumb_title]" id="term_meta[tz_category_breadcrumb_title]" value="<?php echo esc_attr( $term_meta['tz_category_breadcrumb_title'] ) ? esc_attr( $term_meta['tz_category_breadcrumb_title'] ) : ''; ?>">
                </td>
            </tr>
            
        <?php
        }
    endif;
    add_action( 'category_edit_form_fields', 'paperio_category_edit_meta_field', 10, 2 );

    // Save extra category field.
    if( !function_exists( 'paperio_save_category_meta_field' ) ) :
        function paperio_save_category_meta_field( $term_id ) {
            if( isset( $_POST['term_meta'] ) ) {
                $t_id = $term_id;
                $term_meta = get_option( "taxonomy_$t_id" );
                $cat_keys = array_keys( $_POST['term_meta'] );
                foreach ( $cat_keys as $key ) {
                    if( isset ( $_POST['term_meta'][$key] ) ) {
                        $term_meta[$key] = $_POST['term_meta'][$key];
                    }
                }
                // Save the category option array.
                update_option( "taxonomy_$t_id", $term_meta );
            }
        }
    endif;
    add_action( 'edited_category', 'paperio_save_category_meta_field', 10, 2 );
    add_action( 'create_category', 'paperio_save_category_meta_field', 10, 2 );

    /* For breadcrumb */
    if( !function_exists( 'paperio_breadcrumb_navigation' ) ) :
        function paperio_breadcrumb_navigation(){
            $output = '';
            if( class_exists( 'Paperio_Breadcrumb_Navigation' ) ) {
                $paperio_breadcrumb = new Paperio_Breadcrumb_Navigation;
                $paperio_breadcrumb->opt['static_frontpage'] = false;
                $paperio_breadcrumb->opt['url_blog'] = '';
                $paperio_breadcrumb->opt['title_blog'] = esc_html__( 'Home', 'paperio' );
                $paperio_breadcrumb->opt['title_home'] = esc_html__( 'Home', 'paperio' );
                $paperio_breadcrumb->opt['separator'] = '';
                $paperio_breadcrumb->opt['tag_page_prefix'] = '';
                $paperio_breadcrumb->opt['singleblogpost_category_display'] = true;

                $tz_blog_theme_color = '';
                $tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );

                switch( $tz_theme_type ) {
                    case 'theme-magenta':
                        $tz_blog_theme_color = ' bg-white';
                    break;
                }
                $output .= '<section class="paperio-breadcrumb-navigation'.esc_attr( $tz_blog_theme_color ).'">';
                    $output .= '<div class="container">';
                        $output .= '<div class="row">';
                            $output .= '<div class="col-md-12 col-sm-12 col-xs-12">';
                                $output .= '<ul class="text-extra-small text-uppercase alt-font paperio-breadcrumb-settings" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
                                    $output .= $paperio_breadcrumb->paperio_display_breadcrumb();
                                $output .= '</ul>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</section>';
            }
            return $output;
        }
    endif;

    /* Post sharing function */
    if( ! function_exists( 'paperio_share_button' ) ) :
        function paperio_share_button( $post_id ) {

            if( !is_single() )
                return;

            if( !$post_id )
                return false;
            
            $output = '';
            $tz_post_permalink = get_permalink( $post_id );
            $tz_post_featuredimage =  wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full');
            $tz_post_featured_image = $tz_post_featuredimage['0'];
            $tz_post_title = rawurlencode( get_the_title( $post_id ) );

            $tz_disable_social_share = get_theme_mod( 'tz_disable_social_share', '0' );
            $tz_enable_facebook = get_theme_mod( 'tz_enable_facebook', '1' );
            $tz_enable_twitter = get_theme_mod( 'tz_enable_twitter', '1' );
            $tz_enable_pinterest = get_theme_mod( 'tz_enable_pinterest', '1' );
            $tz_enable_google_plus = get_theme_mod( 'tz_enable_google_plus', '1' );
            $tz_enable_tumblr = get_theme_mod( 'tz_enable_tumblr', '1' );
            $tz_enable_linkedin = get_theme_mod( 'tz_enable_linkedin', '1' );
            $tz_enable_delicious = get_theme_mod( 'tz_enable_delicious', '0' );
            $tz_enable_reddit = get_theme_mod( 'tz_enable_reddit', '0' );
            $tz_enable_stumbleupon = get_theme_mod( 'tz_enable_stumbleupon', '0' );
            $tz_enable_digg = get_theme_mod( 'tz_enable_digg', '0' );

            if( $tz_disable_social_share == '1' ) :
                return;
            endif;

            ob_start();

            $tz_post_social_share_order = paperio_post_social_share_icon_order( 'tz_post_social_order' );

            $order = range( 1, count( $tz_post_social_share_order ) );
            array_multisort( $tz_post_social_share_order, SORT_ASC, $order, SORT_ASC );

            foreach( $tz_post_social_share_order as $key => $value ) {

                switch( $key ) {

                    case 'facebook':
                        if( $tz_enable_facebook == '1' ) :
                            echo '<a class="social-sharing-icon button" href="//www.facebook.com/sharer.php?u='.esc_url( $tz_post_permalink ).'" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\'); return false;" rel="nofollow" target="_blank" title="'.esc_attr( $tz_post_title ).'"><i class="fab fa-facebook-f"></i></a>';
                        endif;
                    break;

                    case 'twitter':
                        if( $tz_enable_twitter == '1' ) :
                            echo '<a class="social-sharing-icon button" href="//twitter.com/share?url='.esc_url( $tz_post_permalink ).'&amp;title='.esc_attr( $tz_post_title ).'" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\'); return false;" rel="nofollow" target="_blank" title="'.esc_attr( $tz_post_title ).'"><i class="fab fa-twitter"></i></a>';
                        endif;
                    break;

                    case 'google_plus':
                        if( $tz_enable_google_plus == '1' ) :
                            echo '<a class="social-sharing-icon button" href="//plus.google.com/share?url='.esc_url( $tz_post_permalink ).'" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\'); return false;" rel="nofollow" title="'.esc_attr( $tz_post_title ).'"><i class="fab fa-google-plus-g"></i></a>';
                        endif;
                    break;

                    case 'linkedin':
                        if( $tz_enable_linkedin == '1' ) :
                            echo '<a class="social-sharing-icon button" href="//linkedin.com/shareArticle?mini=true&amp;url='.esc_url( $tz_post_permalink ).'&amp;title='.esc_attr( $tz_post_title ).'" target="_blank" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\'); return false;"  rel="nofollow" title="'.esc_attr( $tz_post_title ).'"><i class="fab fa-linkedin-in"></i></a>';
                        endif;
                    break;

                    case 'pinterest':
                        if( $tz_enable_pinterest == '1' ) :
                            echo '<a class="social-sharing-icon button" href="//pinterest.com/pin/create/button/?url='.esc_url( $tz_post_permalink ).'&amp;media='.esc_url( $tz_post_featured_image ).'&amp;description='.esc_attr( $tz_post_title ).'" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\'); return false;" rel="nofollow" target="_blank" title="'.esc_attr( $tz_post_title ).'"><i class="fab fa-pinterest"></i></a>';
                        endif;
                    break;

                    case 'tumblr':
                        if( $tz_enable_tumblr == '1' ) {
                            echo '<a class="social-sharing-icon button" href="http://www.tumblr.com/share/link?url='.esc_url( $tz_post_permalink ).'&amp;title='.esc_attr( $tz_post_title ).'" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\'); return false;" data-pin-custom="true"><i class="fab fa-tumblr"></i></a>';
                        }
                    break;

                    case 'delicious':
                        if( $tz_enable_delicious == '1' ) :
                            echo '<a class="social-sharing-icon button" href="http://del.icio.us/post?url='.esc_url( $tz_post_permalink ).'&amp;title='.esc_attr( $tz_post_title ).'" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\'); return false;" data-pin-custom="true"><i class="fab fa-delicious"></i></a>';
                        endif;
                    break;

                    case 'reddit':
                        if( $tz_enable_reddit == '1' ) {
                            echo '<a class="social-sharing-icon button" href="http://reddit.com/submit?url='.esc_url( $tz_post_permalink ).'&amp;title='.esc_attr( $tz_post_title ).'" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\'); return false;" data-pin-custom="true"><i class="fab fa-reddit"></i></a>';
                        }
                    break;

                    case 'stumbleupon':
                        if( $tz_enable_stumbleupon == '1' ) {
                            echo '<a class="social-sharing-icon button" href="http://www.stumbleupon.com/submit?url='.esc_url( $tz_post_permalink ).'&amp;title='.esc_attr( $tz_post_title ).'" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\'); return false;" data-pin-custom="true"><i class="fab fa-stumbleupon"></i></a>';
                        }
                    break;

                    case 'digg':
                        if( $tz_enable_digg == '1' ) {
                            echo '<a class="social-sharing-icon button" href="http://www.digg.com/submit?url='.esc_url( $tz_post_permalink ).'&amp;title='.esc_attr( $tz_post_title ).'" onclick="window.open(this.href,this.title,\'width=500,height=500,top=300px,left=300px\'); return false;" data-pin-custom="true"><i class="fab fa-digg"></i></a>';
                        }
                    break;
                }
            }
                           
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    endif;

    /* Set max value for excerpt so our custom function */
    if( ! function_exists( 'paperio_excerpt_length' ) ) :
        function paperio_excerpt_length( $length ) {
            return 200;
        }
    endif;
    add_filter( 'excerpt_length', 'paperio_excerpt_length' );

    /* Set read more for excerpt so our custom function */
    if( ! function_exists( 'paperio_excerpt_more' ) ) :
        function paperio_excerpt_more( $more ) {
            return '...';
        }
    endif;
    add_filter( 'excerpt_more', 'paperio_excerpt_more' );

    /* Custom sanitize function for Validate the textarea field. */
    if( ! function_exists( 'paperio_sanitize_textarea' ) ) :
        function paperio_sanitize_textarea ( $value, $key ) {
            // Allow only a, div, span, ul, li, p, img, iframe, object, embed, em, strong and script tags in textarea fields.
            $allow_tags = wp_kses_allowed_html( 'post' );
            $allow_tags['a'] = array( 'href' => true, 'class' => true, 'target' => true, 'style' => true );
            $allow_tags['div'] = array( 'class' => true, 'style' => true );
            $allow_tags['span'] = array( 'class' => true, 'style' => true );
            $allow_tags['ul'] = array( 'class' => true, 'style' => true );
            $allow_tags['li'] = array( 'class' => true, 'style' => true );
            $allow_tags['p'] = array( 'class' => true, 'style' => true );
            $allow_tags['img'] = array('src'   => true, 'alt'  => true, 'width' => true, 'height' => true );
            $allow_tags['iframe'] = array('src' => true, 'width' => true, 'height' => true, 'id' => true, 'class' => true, 'name' => true );
            $allow_tags['object'] = array('src' => true, 'width' => true, 'height' => true, 'id' => true, 'class' => true, 'name' => true );
            $allow_tags['embed'] = array('src' => true, 'width' => true, 'height' => true, 'id' => true, 'class' => true, 'name' => true );
            $allow_tags['em'] = array('class' => true );
            $allow_tags['strong'] = array();
            $allow_tags['script'] = array( 'type' => true, 'src' => true );
            $allow_tags['link'] = array( 'type' => true, 'href' => true, 'rel' => true, 'id' => true, 'media' =>true );
            $allow_tags['i'] = array( 'id' => true, 'class' =>true );
            return wp_kses( $value, $allow_tags );
        }
    endif;

    /* Custom sanitize function for Validate the multiple category. */
    if( ! function_exists( 'paperio_sanitize_fields' ) ) :
        function paperio_sanitize_fields ( $value, $key ) {
            return $value;
        }
    endif;

    /* Custom sanitize function for Validate the textarea in shortcode field. */
    if( ! function_exists( 'paperio_shortcode_sanitize_textarea' ) ) :
        function paperio_shortcode_sanitize_textarea ( $value, $key ) {
            // Allow only paperio_promotional_block tags in textarea fields.
            $allow_tags = wp_kses_allowed_html( 'post' );
            $allow_tags['paperio_promotional_block'] = array( 'tz_style' => true, 'tz_col_md' => true, 'tz_col_sm' => true, 'tz_col_xs' => true, 'tz_style' => true, 'tz_bg_image_url' => true, 'tz_title' => true, 'tz_button_text' => true, 'tz_link_url' => true, 'tz_link_target' => true, 'tz_extra_class' => true, 'tz_extra_id' => true );
            return wp_kses( $value, $allow_tags );
        }
    endif;

    /* Filter for category grid layout style */
    if ( ! function_exists('paperio_category_grid_post_class') ) :
        function paperio_category_grid_post_class( $classes ) {

            /* Define null variables */
            $category_layout = $tz_post_column_class_list = '';
            /* Check category type */
            $tz_general_category_type = paperio_category_option( 'tz_general_category_type', 'grid' );
            /* Check category column type */
            $tz_general_category_column_type = paperio_category_option( 'tz_general_category_column_type', 'two-columns' );
            /* Get layout name */
            $category_layout = $tz_general_category_type.'-'.$tz_general_category_column_type;

            // Get List of post classes
            switch( $category_layout ) {
                case 'grid-two-columns':
                    $tz_post_column_class_list .= 'col-md-6 col-sm-6 col-xs-12 margin-six-bottom xs-margin-ten-bottom';
                break;
                
                case 'grid-three-columns':
                    $tz_post_column_class_list .= 'col-md-4 col-sm-6 col-xs-12 margin-six-bottom xs-margin-ten-bottom';
                break;

                case 'grid-four-columns':
                    $tz_post_column_class_list .= 'col-md-3 col-sm-6 col-xs-12 margin-six-bottom xs-margin-ten-bottom';
                break;
            }

            // Add it to the array of post classes
            $classes[] = $tz_post_column_class_list;

            // Return the array
            return $classes;
        }
    endif;

    /* Filter for category masonry layout style */
    if ( ! function_exists('paperio_category_masonry_post_class') ) :
        function paperio_category_masonry_post_class( $classes ) {

            /* Define null variables */
            $category_layout = $tz_post_column_class_list = '';
            /* Check category type */
            $tz_general_category_type = paperio_category_option( 'tz_general_category_type', 'grid' );
            /* Check category column type */
            $tz_general_category_column_type = paperio_category_option( 'tz_general_category_column_type', 'two-columns' );
            /* Get layout name */
            $category_layout = $tz_general_category_type.'-'.$tz_general_category_column_type;

            // Get List of post classes
            switch( $category_layout ) {
                case 'masonry-two-columns':
                    $tz_post_column_class_list .= 'col-md-6 col-sm-6 col-xs-12 masonry-item';
                break;
                
                case 'masonry-three-columns':
                    $tz_post_column_class_list .= 'col-md-4 col-sm-6 col-xs-12 masonry-item';
                break;

                case 'masonry-four-columns':
                    $tz_post_column_class_list .= 'col-md-3 col-sm-6 col-xs-12 masonry-item';
                break;
            }

            // Add it to the array of post classes
            $classes[] = $tz_post_column_class_list;

            // Return the array
            return $classes;
        }
    endif;

    /* Filter for archive grid layout style */
    if ( ! function_exists('paperio_archive_grid_post_class') ) :
        function paperio_archive_grid_post_class( $classes ) {

            /* Define null variables */
            $archive_layout = $tz_post_column_class_list = '';
            /* Check archive type */
            $tz_general_archive_type = get_theme_mod( 'tz_general_archive_type', 'grid' );
            /* Check archive column type */
            $tz_general_archive_column_type = get_theme_mod( 'tz_general_archive_column_type', 'two-columns' );
            /* get archive layout name */
            $archive_layout = ( $tz_general_archive_type != 'list' ) ? $tz_general_archive_type.'-'.$tz_general_archive_column_type : $tz_general_archive_type ;

            // Get List of post classes
            switch( $archive_layout ) {
                case 'grid-two-columns':
                    $tz_post_column_class_list .= 'col-md-6 col-sm-6 col-xs-12 margin-six-bottom xs-margin-ten-bottom';
                break;
                
                case 'grid-three-columns':
                    $tz_post_column_class_list .= 'col-md-4 col-sm-6 col-xs-12 margin-six-bottom xs-margin-ten-bottom';
                break;

                case 'grid-four-columns':
                    $tz_post_column_class_list .= 'col-md-3 col-sm-6 col-xs-12 margin-six-bottom xs-margin-ten-bottom';
                break;
            }

            $tz_post_column_class_list .= ' paperio-post-clear';
            // Add it to the array of post classes
            $classes[] = $tz_post_column_class_list;

            // Return the array
            return $classes;
        }
    endif;

    /* Filter for archive masonry layout style */
    if ( ! function_exists('paperio_archive_masonry_post_class') ) :
        function paperio_archive_masonry_post_class( $classes ) {

            /* Define null variables */
            $archive_layout = $tz_post_column_class_list = '';
            /* Check archive type */
            $tz_general_archive_type = get_theme_mod( 'tz_general_archive_type', 'grid' );
            /* Check archive column type */
            $tz_general_archive_column_type = get_theme_mod( 'tz_general_archive_column_type', 'two-columns' );
            /* get archive layout name */
            $archive_layout = ( $tz_general_archive_type != 'list' ) ? $tz_general_archive_type.'-'.$tz_general_archive_column_type : $tz_general_archive_type ;

            // Get List of post classes
            switch( $archive_layout ) {
                case 'masonry-two-columns':
                    $tz_post_column_class_list .= 'col-md-6 col-sm-6 col-xs-12 masonry-item';
                break;
                
                case 'masonry-three-columns':
                    $tz_post_column_class_list .= 'col-md-4 col-sm-6 col-xs-12 masonry-item';
                break;

                case 'masonry-four-columns':
                    $tz_post_column_class_list .= 'col-md-3 col-sm-6 col-xs-12 masonry-item';
                break;
            }

            // Add it to the array of post classes
            $classes[] = $tz_post_column_class_list;

            // Return the array
            return $classes;
        }
    endif;

    /* Function for header and footer social icon order */
    if ( ! function_exists('paperio_social_icon_order') ) :
        function paperio_social_icon_order( $social_order = '' ){

            if( empty( $social_order ) )
                return;

            $tz_get_social_icon_order = get_theme_mod( $social_order );

            $tz_default_social_icon_array = array( 'facebook', 'twitter', 'gplus', 'linkedin', 'instagram', 'pinterest', 'rss', 'youtube', 'bloglovin', 'tumblr', 'dribbble', 'soundcloud', 'vimeo', 'flickr' );
            $tz_set_social_icon_order = array();

            $icon_counter = 1;
            foreach( $tz_default_social_icon_array as $key => $value ) {
                if( is_array( $tz_get_social_icon_order ) && array_key_exists( $value, $tz_get_social_icon_order ) ){
                    $tz_set_social_icon_order[$value] = $tz_get_social_icon_order[$value];
                } else {
                    $tz_set_social_icon_order[$value] = get_theme_mod( 'tz_get_social_icon_order['.$value.']', $icon_counter );
                }
                $icon_counter++;
            }
            return $tz_set_social_icon_order;
        }
    endif;

    /* Function for post social share icon order */
    if ( ! function_exists('paperio_post_social_share_icon_order') ) :
        function paperio_post_social_share_icon_order( $social_order = '' ){

            if( empty( $social_order ) )
                return;

            $tz_get_social_icon_order = get_theme_mod( $social_order );

            $tz_default_social_icon_array = array( 'facebook', 'twitter', 'google_plus', 'linkedin', 'pinterest', 'tumblr', 'delicious', 'reddit', 'stumbleupon', 'digg' );

            $tz_set_social_icon_order = array();

            $icon_counter = 1;
            foreach( $tz_default_social_icon_array as $key => $value ) {
                if( is_array( $tz_get_social_icon_order ) && array_key_exists( $value, $tz_get_social_icon_order ) ){
                    $tz_set_social_icon_order[$value] = $tz_get_social_icon_order[$value];                    
                } else {
                    $tz_set_social_icon_order[$value] = get_theme_mod( 'tz_get_social_icon_order['.$value.']', $icon_counter );
                }

                $icon_counter++;
            }
            return $tz_set_social_icon_order;
        }
    endif;

    if ( ! function_exists('paperio_sidebar_style') ) :
        function paperio_sidebar_style( $sidebar = '' ){
            if( empty( $sidebar ) )
                return;

            do_action( 'paperio_sidebar_style_before' );
            dynamic_sidebar( $sidebar );
            do_action( 'paperio_sidebar_style_after' );
        }
    endif;   

    if ( ! function_exists( 'paperio_footer_sidebar_style' ) ) :
        function paperio_footer_sidebar_style( $sidebar = '' ){
            if( empty( $sidebar ) )
                return;

            do_action( 'paperio_footer_sidebar_style_before' );
            dynamic_sidebar( $sidebar );
            do_action( 'paperio_footer_sidebar_style_after' );
        }
    endif;

    if ( ! function_exists( 'paperio_hex2rgb' ) ) :
        function paperio_hex2rgb( $colour ) {
            if( empty( $colour ) )
                return;
            if ( $colour[0] == '#' ) {
                    $colour = substr( $colour, 1 );
            }
            if ( strlen( $colour ) == 6 ) {
                    list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
            } elseif ( strlen( $colour ) == 3 ) {
                    list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
            } else {
                    return false;
            }
            $r = hexdec( $r );
            $g = hexdec( $g );
            $b = hexdec( $b );
            return 'rgba('.$r.','.$g.','.$b.',0.2)';
        }
    endif;

    if ( ! function_exists( 'paperio_hex2rgb_navigation' ) ) :
        function paperio_hex2rgb_navigation( $colour ) {
            if( empty( $colour ) )
                return;
            if ( $colour[0] == '#' ) {
                    $colour = substr( $colour, 1 );
            }
            if ( strlen( $colour ) == 6 ) {
                    list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
            } elseif ( strlen( $colour ) == 3 ) {
                    list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
            } else {
                    return false;
            }
            $r = hexdec( $r );
            $g = hexdec( $g );
            $b = hexdec( $b );
            $tz_navigation_submenu_background_color_opacity = get_theme_mod( 'tz_navigation_submenu_background_color_opacity', '' );
        
            if( $tz_navigation_submenu_background_color_opacity ){
                return 'rgba('.$r.','.$g.','.$b.','.$tz_navigation_submenu_background_color_opacity.')';
            }else{
                return 'rgb('.$r.','.$g.','.$b.')';
            }
        }
    endif;

    if ( ! function_exists( 'paperio_deregister_section' ) ) :
        function paperio_deregister_section( $wp_customize ) {
            // Remove the section for body background and header text colors.
            $wp_customize -> remove_section( 'colors' );
            // Change order for site site identity.
            $wp_customize->get_section( 'title_tagline' )->priority = 1;
            // Change site icon section.
            $wp_customize->get_control( 'site_icon' )->section = 'tz_add_logo_section';
        }
        add_action( 'customize_register', 'paperio_deregister_section', 999 );
    endif;

    add_action( 'paperio_define_featured_global_hook', 'paperio_define_featured_global_hook', 10, 1 );
    if ( ! function_exists( 'paperio_define_featured_global_hook' ) ):
        function paperio_define_featured_global_hook(){
            global $tz_featured_array;
        }
    endif;

    add_action( 'paperio_define_latest_post_global_hook', 'paperio_define_latest_post_global_hook', 10, 1 );
    if ( ! function_exists( 'paperio_define_latest_post_global_hook' ) ):
        function paperio_define_latest_post_global_hook(){
            global $tz_latest_post_array;
        }
    endif;

    add_action( 'paperio_exclude_post_hook', 'paperio_exclude_post_hook', 10, 1 );
    if ( ! function_exists( 'paperio_exclude_post_hook' ) ):
            function paperio_exclude_post_hook( $postid ){
                global $tz_featured_array;
                $tz_featured_array[] = $postid;
                $option_name = 'paperio_default_post';
                if ( get_option( $option_name ) !== false ) {
                    // The option already exists, so we just update it.
                    update_option( $option_name, $tz_featured_array );
                } else {
                    // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
                    $deprecated = null;
                    $autoload = 'yes';
                    add_option( $option_name, $tz_featured_array, $deprecated, $autoload );
                }                
                return;
            }
    endif;

    add_action( 'paperio_exclude_latest_post_hook', 'paperio_exclude_latest_post_hook', 10, 1 );
    if ( ! function_exists( 'paperio_exclude_latest_post_hook' ) ):
            function paperio_exclude_latest_post_hook( $postid ){
                global $tz_latest_post_array;
                $tz_latest_post_array[] = $postid;
                $option_name = 'paperio_latest_post';
                if ( get_option( $option_name ) !== false ) {
                    // The option already exists, so we just update it.
                    update_option( $option_name, $tz_latest_post_array );
                } else {
                    // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
                    $deprecated = null;
                    $autoload = 'yes';
                    add_option( $option_name, $tz_latest_post_array, $deprecated, $autoload );
                }                
                return;
            }
    endif;

    if ( ! function_exists( 'paperio_posts_customize' ) ):
        function paperio_posts_customize($query) {
            global $tz_featured_array;
            $exclude_posts = array();
            $tz_featured_posts = array();
            $tz_latest_posts = array();
            /* Exclude posts from blog */
            $tz_exclude_feature_area_posts = get_theme_mod( 'tz_exclude_feature_area_posts', '0' );
            $tz_exclude_latest_posts = get_theme_mod( 'tz_exclude_latest_posts', '0' );
            if( $tz_exclude_feature_area_posts == 1 ){
                $tz_featured_posts = get_option( 'paperio_default_post' );
            }
            if ( $tz_exclude_latest_posts == 1 ) {
                $tz_latest_posts = get_option( 'paperio_latest_post' );
            }
             
            if( $tz_exclude_feature_area_posts == 1 || $tz_exclude_latest_posts == 1 ) {
                if( !is_admin() && $query->is_main_query() && !is_archive() && !is_single() && !is_category() && !is_search() && !is_feed() ):
                    
                    if( empty($tz_featured_posts) && !empty($tz_latest_posts) ){
                        $exclude_posts = $tz_latest_posts;
                    }
                    if( !empty($tz_featured_posts) && empty($tz_latest_posts) ){
                        $exclude_posts = $tz_featured_posts;
                    }if( !empty($tz_featured_posts) && !empty($tz_latest_posts) ){
                        $exclude_posts = array_unique (array_merge ($tz_featured_posts, $tz_latest_posts));
                    }
                    if( !empty ( $exclude_posts ) ) {
                        $query->set( 'post__not_in', $exclude_posts );
                    }
                    
                endif;
            }
        } 
    endif;
    add_action('pre_get_posts', 'paperio_posts_customize' );

    // function to display number of posts.
    if ( ! function_exists( 'paperio_get_post_views' ) ) :
        function paperio_get_post_views( $postid ) {
            $count_key = 'tz_post_views_count';
            $count = get_post_meta( $postid, $count_key, true );
            if( $count == '' ) {
                delete_post_meta( $postid, $count_key );
                add_post_meta( $postid, $count_key, '0' );
                return esc_html__( '0 View', 'paperio' );
            }

            return $count.esc_html__( ' View', 'paperio' );
        }
    endif;

    // function to count views.
    if ( ! function_exists( 'paperio_set_post_views' ) ) :
        function paperio_set_post_views( $postid ) {

            $count_key = 'tz_post_views_count';
            $count = get_post_meta( $postid, $count_key, true );
            if( $count=='' ) {
                $count = 0;
                delete_post_meta( $postid, $count_key );
                add_post_meta( $postid, $count_key, '0' );
            } else {
                $count++;
                update_post_meta( $postid, $count_key, $count );
            }
        }
    endif;

    // Remove issues with prefetching adding extra views
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

    // Add it to a column in WP-Admin
    add_filter( 'manage_posts_columns', 'paperio_post_view_column' );
    if ( ! function_exists( 'paperio_post_view_column' ) ) :
        function paperio_post_view_column( $defaults ) {
            $defaults['post_views'] = esc_html__( 'Views', 'paperio' );
            return $defaults;
        }
    endif;

    add_action( 'manage_posts_custom_column', 'paperio_post_view_column_value', 5, 2 );
    if ( ! function_exists( 'paperio_post_view_column_value' ) ) :
        function paperio_post_view_column_value( $column_name, $id ) {
            if( $column_name === 'post_views' ) {
                echo paperio_get_post_views( get_the_ID() );
            }
        }
    endif;


    // Register post view column as sortable
    add_filter( 'manage_edit-post_sortable_columns', 'paperio_post_view_column_sortable' );
    if ( ! function_exists( 'paperio_post_view_column_sortable' ) ) :
        function paperio_post_view_column_sortable( $columns ) {
            $columns['post_views'] = 'post_views';

            return $columns;
        }
    endif;

    // Filter to orderby post view column
    add_filter( 'request', 'paperio_post_view_column_orderby' );
    if ( ! function_exists( 'paperio_post_view_column_orderby' ) ) :
        function paperio_post_view_column_orderby( $vars ) {
            if ( isset( $vars['orderby'] ) && 'post_views' == $vars['orderby'] ) {
                $vars = array_merge( $vars, array(
                    'meta_key' => 'tz_post_views_count',
                    'orderby' => 'meta_value_num'
                ) );
            }
            return $vars;
        }
    endif;

    if( ! function_exists( 'paperio_get_intermediate_image_sizes' ) ) :
        function paperio_get_intermediate_image_sizes() {
            global $wp_version;
            $image_sizes = array( 'full', 'thumbnail', 'medium', 'medium_large', 'large' ); // Standard sizes
            if( $wp_version >= '4.7.0'){
                $_wp_additional_image_sizes = wp_get_additional_image_sizes();
                if ( ! empty( $_wp_additional_image_sizes ) ) {
                    $image_sizes = array_merge( $image_sizes, array_keys( $_wp_additional_image_sizes ) );
                }
                return apply_filters( 'intermediate_image_sizes', $image_sizes );
            }else{
                return $image_sizes;
            }
        }
    endif;

    if( ! function_exists( 'paperio_get_image_sizes' ) ) :
        function paperio_get_image_sizes() {
            global $_wp_additional_image_sizes;

            $sizes = array();

            foreach ( get_intermediate_image_sizes() as $_size ) {
                if ( in_array( $_size, array( 'full', 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
                    $sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
                    $sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
                    $sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
                } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
                    $sizes[ $_size ] = array(
                        'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
                        'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                        'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
                    );
                }
            }
            return $sizes;
        }
    endif;

    if( ! function_exists( 'paperio_get_image_size' ) ) :
            function paperio_get_image_size( $size ) {
                $sizes = paperio_get_image_sizes();

                if ( isset( $sizes[ $size ] ) ) {
                    return $sizes[ $size ];
                }

                return false;
            }
        endif;

    if( ! function_exists( 'paperio_feature_image_size' ) ) :
        function paperio_feature_image_size() {

            $thumbnail_image_sizes = array();

            // Hackily add in the data link parameter.
            $paperio_srcset = paperio_get_intermediate_image_sizes();

            if( !empty( $paperio_srcset ) ) {
                foreach ( $paperio_srcset as $value => $label ){
                    
                    $key = esc_attr( $label );

                    $paperio_srcset_image_data = paperio_get_image_size( $label );
                    $width = ( $paperio_srcset_image_data['width'] == 0 ) ? esc_html( 'Auto', 'paperio' ) : $paperio_srcset_image_data['width'].'px';
                    $height = ( $paperio_srcset_image_data['height'] == 0 ) ? esc_html( 'Auto', 'paperio' ) : $paperio_srcset_image_data['height'].'px';
                    if( $label == 'full' ) {
                        $data = esc_html__( 'Original Full Size', 'paperio' );
                    } else {
                        $data = ucwords( str_replace( '_', ' ', str_replace( '-', ' ', esc_attr( $label ) ) ) ).' ('.esc_attr( $width ).' X '.esc_attr( $height ).')';
                    }

                    $thumbnail_image_sizes[$key] = $data;
                }
            }

            return $thumbnail_image_sizes;
        }
    endif;

    if ( ! function_exists( 'paperio_header_style_callback' ) ) :
        function paperio_header_style_callback() {
            $header_image = get_header_image();

            if ( empty( $header_image ) ) {
                return;
            }

            ?>
            <style type="text/css" id="paperio-header-css">
                <?php
                if ( ! empty( $header_image ) ) :
                ?>
                header { background-repeat: no-repeat !important; background-position: 50% 50% !important; -webkit-background-size: cover !important; -moz-background-size: cover !important; -o-background-size: cover !important; background-size: cover !important; }
                <?php
                endif;
                ?>
            </style>
            <?php
        }
    endif;

    if( !function_exists( 'paperio_animation_style_customizer' ) ) :
      function paperio_animation_style_customizer() {
        $output = '';
        $output = array( '' => __( 'no style', 'paperio' ),
                        'bounce' => __( 'bounce', 'paperio' ),
                        'flash' => __( 'flash', 'paperio' ),
                        'pulse' => __( 'pulse', 'paperio' ),
                        'rubberBand' => __( 'rubberBand', 'paperio' ),
                        'shake' => __( 'shake', 'paperio' ),
                        'swing' => __( 'swing', 'paperio' ),
                        'tada' => __( 'tada', 'paperio' ),
                        'wobble' => __( 'wobble', 'paperio' ),
                        'jello' => __( 'jello', 'paperio' ),
                        'bounceIn' => __( 'bounceIn', 'paperio' ),
                        'bounceInDown' => __( 'bounceInDown', 'paperio' ),
                        'bounceInLeft' => __( 'bounceInLeft', 'paperio' ),
                        'bounceInRight' => __( 'bounceInRight', 'paperio' ),
                        'bounceInUp' => __( 'bounceInUp', 'paperio' ),
                        'bounceOut' => __( 'bounceOut', 'paperio' ),
                        'bounceOutDown' => __( 'bounceOutDown', 'paperio' ),
                        'bounceOutLeft' => __( 'bounceOutLeft', 'paperio' ),
                        'bounceOutRight' => __( 'bounceOutRight', 'paperio' ),
                        'bounceOutUp' => __( 'bounceOutUp', 'paperio' ),
                        'fadeIn' => __( 'fadeIn', 'paperio' ),
                        'fadeInDown' => __( 'fadeInDown', 'paperio' ),
                        'fadeInDownBig' => __( 'fadeInDownBig', 'paperio' ),
                        'fadeInLeft' => __( 'fadeInLeft', 'paperio' ),
                        'fadeInLeftBig' => __( 'fadeInLeftBig', 'paperio' ),
                        'fadeInRight' => __( 'fadeInRight', 'paperio' ),
                        'fadeInRightBig' => __( 'fadeInRightBig', 'paperio' ),
                        'fadeInUp' => __( 'fadeInUp', 'paperio' ),
                        'fadeInUpBig' => __( 'fadeInUpBig', 'paperio' ),
                        'fadeOut' => __( 'fadeOut', 'paperio' ),
                        'fadeOutDown' => __( 'fadeOutDown', 'paperio' ),
                        'fadeOutDownBig' => __( 'fadeOutDownBig', 'paperio' ),
                        'fadeOutLeft' => __( 'fadeOutLeft', 'paperio' ),
                        'fadeOutLeftBig' => __( 'fadeOutLeftBig', 'paperio' ),
                        'fadeOutRight' => __( 'fadeOutRight', 'paperio' ),
                        'fadeOutRightBig' => __( 'fadeOutRightBig', 'paperio' ),
                        'fadeOutUp' => __( 'fadeOutUp', 'paperio' ),
                        'fadeOutUpBig' => __( 'fadeOutUpBig', 'paperio' ),
                        'flipInX' => __( 'flipInX', 'paperio' ),
                        'flipInY' => __( 'flipInY', 'paperio' ),
                        'flipOutX' => __( 'flipOutX', 'paperio' ),
                        'flipOutY' => __( 'flipOutY', 'paperio' ),
                        'lightSpeedIn' => __( 'lightSpeedIn', 'paperio' ),
                        'lightSpeedOut' => __( 'lightSpeedOut', 'paperio' ),
                        'rotateIn' => __( 'rotateIn', 'paperio' ),
                        'rotateInDownLeft' => __( 'rotateInDownLeft', 'paperio' ),
                        'rotateInDownRight' => __( 'rotateInDownRight', 'paperio' ),
                        'rotateInUpLeft' => __( 'rotateInUpLeft', 'paperio' ),
                        'rotateInUpRight' => __( 'rotateInUpRight', 'paperio' ),
                        'rotateOut' => __( 'rotateOut', 'paperio' ),
                        'rotateOutDownLeft' => __( 'rotateOutDownLeft', 'paperio' ),
                        'rotateOutDownRight' => __( 'rotateOutUpLeft', 'paperio' ),
                        'rotateOutUpRight' => __( 'rotateOutUpRight', 'paperio' ),
                        'hinge' => __( 'hinge', 'paperio' ),
                        'rollIn' => __( 'rollIn', 'paperio' ),
                        'rollOut' => __( 'rollOut', 'paperio' ),
                        'zoomIn' => __( 'zoomIn', 'paperio' ),
                        'zoomInDown' => __( 'zoomInDown', 'paperio' ),
                        'zoomInLeft' => __( 'zoomInLeft', 'paperio' ),
                        'zoomInRight' => __( 'zoomInRight', 'paperio' ),
                        'zoomInUp' => __( 'zoomInUp', 'paperio' ),
                        'zoomOut' => __( 'zoomOut', 'paperio' ),
                        'zoomOutDown' => __( 'zoomOutDown', 'paperio' ),
                        'zoomOutLeft' => __( 'zoomOutLeft', 'paperio' ),
                        'zoomOutRight' => __( 'zoomOutRight', 'paperio' ),
                        'zoomOutUp' => __( 'zoomOutUp', 'paperio' ),
                        'slideInDown' => __( 'slideInDown', 'paperio' ),
                        'slideInLeft' => __( 'slideInLeft', 'paperio' ),
                        'slideInRight' => __( 'slideInRight', 'paperio' ),
                        'slideInUp' => __( 'slideInUp', 'paperio' ),
                        'slideOutDown' => __( 'slideOutDown', 'paperio' ),
                        'slideOutLeft' => __( 'slideOutLeft', 'paperio' ),
                        'slideOutRight' => __( 'slideOutRight', 'paperio' ),
                        'slideOutUp' => __( 'slideOutUp', 'paperio' ),
                        );
        return $output;
      }
    endif;

    if ( ! function_exists( 'paperio_theme_active_licence' ) ) :
        function paperio_theme_active_licence( $value ='no' ) {
            $paperio_option_name = 'paperio_theme_active' ;
            if ( get_option( $paperio_option_name ) !== false ) {
                update_option( $paperio_option_name, $value );
            } else {
                $deprecated = null;
                $autoload = 'no';
                add_option( $paperio_option_name, $value, $deprecated, $autoload );
            }
        }
    endif;

    if ( ! function_exists( 'paperio_is_theme_licence_active' ) ) :
        function paperio_is_theme_licence_active() {
            $paperio_theme_active = get_option( 'paperio_theme_active' );
            if( $paperio_theme_active == 'yes' || defined( 'ENVATO_HOSTED_SITE' ) ){
                return true;
            } else {
                return false;
            }
        }
    endif;

    if ( ! function_exists( 'paperio_theme_activate' ) ) :
        function paperio_theme_activate() {
            global $pagenow;

            if( paperio_is_theme_licence_active() ){
                return;
            }
            
            if( is_admin() && 'themes.php' == $pagenow && isset( $_GET[ 'activated' ] ) ) {
                wp_redirect( admin_url( 'themes.php?page=paperio-licence-activation' ) );
                exit;
            }

        }
    endif;
    add_action( 'after_setup_theme', 'paperio_theme_activate', 11 );

    if ( ! function_exists( 'paperio_get_host' ) ) :
        function paperio_get_host() {
            $paperio_api_host = 'http://api.themezaa.com';
            return $paperio_api_host;
        }
    endif;

    if ( ! function_exists( 'paperio_random_string' ) ) :
        function paperio_random_string( $length = 20 ) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $len = strlen( $characters );
            $str = '';
            for ( $i = 0; $i < $length; $i ++ ) {
                $str .= $characters[ rand( 0, $len - 1 ) ];
            }

            return $str;
        }
    endif;

    if ( ! function_exists( 'paperio_generate_theme_licence_activation_url' ) ) :
        function paperio_generate_theme_licence_activation_url() {
                
            $paperio_licence_api = paperio_get_host();

            $paperio_token = sha1( current_time( 'timestamp' ) . '|' . paperio_random_string(20) );
            $paperio_home_url = esc_url( home_url( '/' ) );

            $paperio_redirect = admin_url( 'themes.php?page=paperio-licence-activation' );
                        
            if ( false === ( $paperio_token == get_transient( 'paperio_licence_token' ) ) ) {
                set_transient( 'paperio_licence_token', $paperio_token, HOUR_IN_SECONDS );
            }
            $paperio_get_transient = get_transient( 'paperio_licence_token' );

            return sprintf( '%s?token=%s&url=%s&redirect=%s&itemid=%s', $paperio_licence_api.'/activate-license/', $paperio_get_transient, $paperio_home_url, $paperio_redirect, '19342188' );
        }
    endif;

    if ( ! function_exists( 'paperio_theme_licence_notice' ) ) :
        function paperio_theme_licence_notice() {
            
            if( !empty( $_COOKIE['paperio_hide_activation_message'] ) || paperio_is_theme_licence_active() ) {
                return;
            }

            if( isset( $_GET['response'] ) ) {
                if( $_GET['response'] == 'true' ) {
                    return;
                }
            }

            $class = 'notice notice-success paperio-license-activation-message is-dismissible';
            $message = esc_html__( 'Please activate your Paperio WordPress theme license to unlock Paperio premium features.', 'paperio' );

            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
        }
    endif;
    add_action( 'admin_notices', 'paperio_theme_licence_notice' );
    
    /* Custom sanitize function for Validate the multiple checkbox field. */
    if( ! function_exists( 'paperio_sanitize_multiple_checkbox' ) ) :
        function paperio_sanitize_multiple_checkbox( $values ) {
            $paperio_multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;
            return !empty( $paperio_multi_values ) ? array_map( 'sanitize_text_field', $paperio_multi_values ) : array();
        }
    endif;
    
    if ( ! function_exists( 'paperio_custom_widgets' ) ) {
        function paperio_custom_widgets() {
            $paperio_custom_sidebars = get_theme_mod( 'paperio_custom_sidebars', '' );
            $paperio_custom_sidebars = explode( ",", $paperio_custom_sidebars );
            if ( is_array( $paperio_custom_sidebars ) ) {
                foreach ( $paperio_custom_sidebars as $sidebar ) {

                    if ( empty( $sidebar ) ) {
                        continue;
                    }

                    register_sidebar ( array (
                        'name' => $sidebar,
                        'id' => sanitize_title ( $sidebar ),
                        'before_widget' => '<div id="%1$s" class="custom-widget %2$s">',
                        'after_widget' => '</div>',
                        'before_title' => '<div class="widget-title">',
                        'after_title' => '</div>',
                    ) );
                }
            }
        }
    }
    add_action( 'widgets_init', 'paperio_custom_widgets' );

    add_filter( 'post_class', 'paperio_remove_post_class_search', 20 );

    if ( ! function_exists( 'paperio_remove_post_class_search' ) ) {
        function paperio_remove_post_class_search( $classes ) {
            if( ( $key = array_search( 'post', $classes ) ) !== false && is_search() )
                unset( $classes[$key] );
            return $classes;
        }
    }

    if ( ! function_exists( 'paperio_extract_shortcode_contents' ) ) {
         // Extract text contents from all shortcodes for usage in excerpts
        function paperio_extract_shortcode_contents( $m ) {
            global $shortcode_tags;

            $shortcodes = array_keys( $shortcode_tags );
            $no_space_shortcodes = array( 'dropcap' );
            $omitted_shortcodes  = array( 'slide' );

            if ( in_array( $m[2], $shortcodes ) && ! in_array( $m[2], $omitted_shortcodes ) ) {
                $pattern = get_shortcode_regex();
                $space = ' ' ;
                if ( in_array( $m[2], $no_space_shortcodes ) ) {
                    $space = '' ;
                }
                $content = preg_replace_callback( "/$pattern/s", 'paperio_extract_shortcode_contents', rtrim( $m[5] ) . $space );
                return $content;
            }

            if ( $m[1] == '[' && $m[6] == ']' ) {
                return substr( $m[0], 1, -1 );
            }

           return $m[1] . $m[6];
        }
    }

    /**
     * Add a pingback url auto-discovery header for single posts, pages, or attachments.
     */
    if ( ! function_exists( 'paperio_pingback_header' ) ) {
        function paperio_pingback_header() {
            if ( is_singular() && pings_open() ) {
                echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
            }
        }
    }
    add_action( 'wp_head', 'paperio_pingback_header' );