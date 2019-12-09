<?php
/**
 * The main template file
 *
 * This is the most generic template file in a Paperio theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Paperio
 */

get_header(); ?>
<?php
   $tz_title = $breadcrumb_title = '';
   
   /* Check title wrapper enable/disable*/
   $tz_hide_archive_titlewrapper = get_theme_mod( 'tz_hide_archive_titlewrapper', 0 );

   if ( is_tag() ) {
        $tz_title = sprintf( '%s', single_tag_title( '', false ) );
        $breadcrumb_title = get_theme_mod( 'tz_tag_breadcrumb_title', 'Browsing Tags' );
    } elseif ( is_author() ) {
        $tz_title = sprintf( '%s', get_the_author() );
        $breadcrumb_title = get_theme_mod( 'tz_author_breadcrumb_title', 'All Posts By' );
    } elseif ( is_year() ) {
        $tz_title = sprintf( '%s', get_the_date( _x( 'Y', 'yearly archives date format', 'paperio' ) ) );
        $breadcrumb_title = get_theme_mod( 'tz_date_breadcrumb_title', 'Archive For' );
    } elseif ( is_month() ) {
        $tz_title = sprintf( '%s', get_the_date( _x( 'F Y', 'monthly archives date format', 'paperio' ) ) );
        $breadcrumb_title = get_theme_mod( 'tz_date_breadcrumb_title', 'Archive For' );
    } elseif ( is_day() ) {
        $tz_title = sprintf( '%s', get_the_date( _x( '', 'daily archives date format', 'paperio' ) ) );
        $breadcrumb_title = get_theme_mod( 'tz_date_breadcrumb_title', 'Archive For' );
    } elseif ( is_search() ) {
        $tz_title = get_search_query();
        $breadcrumb_title = get_theme_mod( 'tz_search_breadcrumb_title', 'Search Results' );
    } else {
        $tz_title = esc_html__( 'Archives', 'paperio' );
        $breadcrumb_title = esc_html__( 'All Posts', 'paperio' );
    }

    /* check section with container or container-fluid */
    $tz_archive_content_container_fluid = '';
    $tz_enable_container_fluid_single_archive = get_theme_mod( 'tz_enable_container_fluid_single_archive', 'no' );

    if( isset( $tz_enable_container_fluid_single_archive ) && $tz_enable_container_fluid_single_archive == 'yes' ){
        $tz_archive_content_container_fluid .= 'container-fluid';
    } else {
        $tz_archive_content_container_fluid .= 'container';
    }

    $tz_archive_hide_breadcrumb_navigation = get_theme_mod( 'tz_archive_hide_breadcrumb_navigation', 0 );

    /* For Title Background Image*/ 
    $tz_title_background_image = get_theme_mod( 'tz_title_background_image', '' );
    $tz_title_background_image_style = ( $tz_title_background_image ) ? ' style="background: url('. esc_url( $tz_title_background_image ).') repeat-x left top;"' : '';

    $tz_blog_archive_class = '';
    /* Check theme type */
    $tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
    switch( $tz_theme_type ) {
        case 'theme-magenta':
            $tz_blog_archive_class = ' bg-white';
        break;
        
        case 'theme-fast-red':
            $tz_blog_archive_class = ' bg-dark-gray2';
        break;

        default:
            $tz_blog_archive_class = ' bg-gray';
        break;
    }

    /* Check archive title and breadcrumb title */
    if ($tz_hide_archive_titlewrapper != 1 ) {
        if( $breadcrumb_title || $tz_title ) {
        echo '<section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background'.esc_attr( $tz_blog_archive_class ).'"'.$tz_title_background_image_style.'>';
            echo '<div class="container-fluid">';
                echo '<div class="row">';
                    echo '<div class="col-md-12 col-sm-12 col-xs-12 text-center">';
                        if( $breadcrumb_title ) {
                            echo '<span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">'.esc_attr( $breadcrumb_title ).'</span>';
                        }
                        if( $tz_title ) {
                            echo '<h1 class="title-small position-reletive font-weight-600 text-uppercase text-mid-gray blog-headline right-separator blog-single-page-title no-margin-bottom">'.esc_attr( $tz_title ).'</h1>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</section>';
        }
    }

    /* For Archive Breadcrumb */
    if( $tz_archive_hide_breadcrumb_navigation != 1 ) {
        echo paperio_breadcrumb_navigation();
    }
    echo '<div class="post-content-area">';
        echo '<section id="content" class="margin-five-top margin-five-bottom sm-margin-eight-top sm-margin-eight-bottom xs-margin-twelve-top xs-margin-twelve-bottom">';
            echo '<div class="'.esc_attr( $tz_archive_content_container_fluid ).'">';
                echo '<div class="row">';
                    /* For archive left sidebar */
                    get_template_part('templates/archive','left');

                    if( $tz_theme_type == 'theme-magenta' ) {
                        echo '<div class="col-md-12 col-sm-12 col-xs-12 padding-four xs-padding-five bg-white">';
                    }
                        if( is_author() ){
                            /* For archive author */
                            get_template_part( 'author-bio' );
                        }
                    
                        $archive_layout = '';
                        $post_counter = 1;
                        $tz_general_archive_type = get_theme_mod( 'tz_general_archive_type', 'grid' );
                        $tz_general_archive_column_type = get_theme_mod( 'tz_general_archive_column_type', 'two-columns' );
                        $archive_layout = ( $tz_general_archive_type != 'list' ) ? $tz_general_archive_type.'-'.$tz_general_archive_column_type : $tz_general_archive_type ;

                        // For pagination
                        $tz_general_pagination_style = get_theme_mod( 'tz_general_pagination_style', 'old-new-pagination' );

                        if ( have_posts() ) :
                            // Start the Loop.

                            $tz_get_archive_layout_column = '';
                            
                            switch( $archive_layout ) {
                                case 'grid-two-columns':
                                    /* For grid two column */
                                    $tz_get_archive_layout_column = '2';
                                    echo '<div class="row '.esc_attr( $tz_general_pagination_style ).' post-'.esc_attr( $archive_layout ).'" data-column='.esc_attr( $tz_get_archive_layout_column ).'>';
                                break;
                                case 'grid-three-columns':
                                    /* For grid three column */
                                    $tz_get_archive_layout_column = '3';
                                    echo '<div class="row '.esc_attr( $tz_general_pagination_style ).' post-'.esc_attr( $archive_layout ).'" data-column='.esc_attr( $tz_get_archive_layout_column ).'>';
                                break;
                                case 'grid-four-columns':
                                    /* For grid four column */
                                    $tz_get_archive_layout_column = '4';
                                    echo '<div class="row '.esc_attr( $tz_general_pagination_style ).' post-'.esc_attr( $archive_layout ).'" data-column='.esc_attr( $tz_get_archive_layout_column ).'>';
                                break;

                                case 'masonry-two-columns':
                                case 'masonry-three-columns':
                                case 'masonry-four-columns':
                                    /* For archive masonry type */
                                    echo '<div class="row"><div class="col-md-12 col-sm-12 col-xs-12 no-padding blog-listing-style6 grid masonry-listing '.esc_attr( $tz_general_pagination_style ).'">';
                                break;
                                
                                case 'list':
                                    /* For archive list type */
                                    echo '<div class="row '.esc_attr( $tz_general_pagination_style ).'">';
                                break;
                            }
                            
                            while ( have_posts() ) : the_post();
                                
                                switch( $archive_layout ) {
                                    case 'grid-two-columns':
                                    case 'grid-three-columns':
                                    case 'grid-four-columns':

                                        get_template_part( 'templates/archive/grid', 'layout' );

                                        if( $post_counter % $tz_get_archive_layout_column == 0 ){
                                            if ( ( $wp_query->current_post + 1 ) !== $wp_query->post_count && $tz_general_pagination_style != 'infinite-scroll-pagination' ) {
                                                paperio_separator();
                                            }
                                        }
                                        $post_counter++;
                                    break;

                                    case 'masonry-two-columns':
                                    case 'masonry-three-columns':
                                    case 'masonry-four-columns':
                                        /* For archive masonry type */
                                        get_template_part( 'templates/archive/masonry', 'layout' );
                                    break;
                                    
                                    case 'list':
                                        /* For archive list type */
                                        get_template_part( 'templates/archive/list', 'layout' );
                                    break;
                                }

                            endwhile;

                            switch( $archive_layout ) {
                                case 'grid-two-columns':
                                case 'grid-three-columns':
                                case 'grid-four-columns':
                                    /* For archive grid layouts */
                                    echo '</div>';
                                    echo '<div class="page-separator-parent display-none">';
                                        paperio_separator();
                                    echo '</div>';
                                break;

                                case 'masonry-two-columns':
                                case 'masonry-three-columns':
                                case 'masonry-four-columns':
                                    /* For archive masonry type */
                                    echo '</div></div>';
                                break;
                                
                                case 'list':
                                    /* For archive list type */
                                    echo '</div>';
                                break;
                            }

                            if( $wp_query->max_num_pages > 1 ) :
                                echo paperio_pagination( $tz_general_pagination_style, $wp_query );
                            endif;

                        else :
                            get_template_part('templates/content','none');
                        endif;
                    
                    if( $tz_theme_type == 'theme-magenta' ) {
                        echo '</div>';
                    }

                    /* For archive right sidebar */
                    get_template_part( 'templates/archive', 'right' );

                echo '</div>';
            echo '</div>';
        echo '</section>';
    echo '</div>';

get_footer();