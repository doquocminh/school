<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Paperio
 */

get_header(); ?>
<?php
// Start the loop.
while ( have_posts() ) : the_post();

	// Set post view counter
	paperio_set_post_views( get_the_ID() );

	$tz_single_post_content_container_fluid = $tz_blog_theme_color = '';
	$tz_single_post_container_fluid = paperio_option( 'tz_single_post_container_fluid', 'no' );

	if( isset( $tz_single_post_container_fluid ) && $tz_single_post_container_fluid == 'yes' ){
	    $tz_single_post_content_container_fluid .= 'container-fluid';
	} else {
	    $tz_single_post_content_container_fluid .= 'container';
	}

	$tz_hide_category = get_theme_mod( 'tz_hide_category', 0 );
	$tz_hide_date = get_theme_mod( 'tz_hide_date', 0 );
	$tz_post_date_format = get_theme_mod( 'tz_post_date_format', '' );
	$tz_hide_author = get_theme_mod( 'tz_hide_author', 0 );
	$tz_hide_breadcrumb_navigation = get_theme_mod( 'tz_hide_breadcrumb_navigation', 0 );
	$tz_hide_tags = get_theme_mod( 'tz_hide_tags', 0 );
	$tz_hide_comment_link = get_theme_mod( 'tz_hide_comment_link', 0 );
	$tz_hide_like = get_theme_mod( 'tz_hide_like', 0 );
	$tz_hide_share = get_theme_mod( 'tz_hide_share', 0 );
	$tz_hide_post_author_box = get_theme_mod( 'tz_hide_post_author_box', 0 );
	$tz_hide_related_posts = get_theme_mod( 'tz_hide_related_posts', 0 );
	$tz_related_posts_title = get_theme_mod( 'tz_related_posts_title', 0 );
	$tz_no_of_related_posts = get_theme_mod( 'tz_no_of_related_posts', 0 );
	$tz_related_posts_date_format = get_theme_mod( 'tz_related_posts_date_format', 0 );
	$tz_hide_comment = get_theme_mod( 'tz_hide_comment', 0 );
	$tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
	$tz_hide_post_titlewrapper = paperio_option( 'tz_hide_post_titlewrapper', 0 );
	switch( $tz_theme_type ) {
		case 'theme-magenta':
			$tz_blog_theme_color = ' bg-white';
		break;
		
		case 'theme-fast-red':
			$tz_blog_theme_color = ' bg-dark-gray2';
		break;

		default:
			$tz_blog_theme_color = ' bg-gray';
		break;
	}

	/* For Title Background Image*/ 
	$tz_title_background_image_single = '';
	$tz_title_background_image_single = get_post_meta( get_the_ID(), 'tz_post_title_bg_image', true );
	if ( !empty( $tz_title_background_image_single ) ) {
		$tz_title_background_image = $tz_title_background_image_single;
	} else{
		$tz_title_background_image = get_theme_mod( 'tz_title_background_image', '' );
	}

	$tz_title_background_image_style = ( $tz_title_background_image ) ? ' style="background: url('.esc_url( $tz_title_background_image ).') repeat-x left top;"' : '';

	/* Get post class and id */
	$tz_post_classes = '';
	ob_start();
        post_class();
        $tz_post_classes .= ob_get_contents();
    ob_end_clean();
	echo '<div id="post-'.get_the_ID().'" '.$tz_post_classes.'>';

		/* For post top part title and post meta */
		if ( $tz_hide_post_titlewrapper != 1 ) {
			echo '<section class="page-title border-bottom-mid-gray border-top-mid-gray blog-single-page-background'.esc_attr( $tz_blog_theme_color ).'"'.$tz_title_background_image_style.'>';
			    echo '<div class="container-fluid">';
			        echo '<div class="row">';
			            echo '<div class="col-md-12 col-sm-12 col-xs-12 text-center">';
			                echo '<h1 class="title-small font-weight-600 text-uppercase text-mid-gray blog-headline entry-title blog-single-page-title no-margin-bottom">'.get_the_title().'</h1>';
			                if( $tz_hide_category != 1 || $tz_hide_date != 1 || $tz_hide_author != 1 ) :
				                echo '<ul class="text-extra-small text-uppercase alt-font blog-single-page-meta">';
				                	if( $tz_hide_category != 1 && !is_attachment() ) :
				                		echo '<li>'.paperio_post_category( get_the_ID(), 'text-link-light-gray blog-single-page-meta-link', '1' ).'</li>';
				                	endif;
				                	if( $tz_hide_date != 1 ) :
				                		echo '<li class="published">'.get_the_date( $tz_post_date_format ).'</li>';
				                	endif;
				                	if( $tz_hide_author != 1 ) :
				                		echo '<li>'.esc_html__( 'By ', 'paperio' ). '<a class="text-link-light-gray blog-single-page-meta-link" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></li>';
				                	endif;
				                echo '</ul>';
				            endif;
			            echo '</div>';
			        echo '</div>';
			    echo '</div>';
			echo '</section>';
		}
		/* For post single breadcrumb */
		if( $tz_hide_breadcrumb_navigation != 1 ) :
			echo paperio_breadcrumb_navigation();
		endif;

		/* For page sidebar and content */
		echo '<div class="post-content-area">';
			echo '<section class="margin-five no-margin-lr sm-margin-eight-top xs-margin-twelve-top">';
				echo '<div class="'.esc_attr( $tz_single_post_content_container_fluid ).'">';
					echo '<div class="row">';

						/* Get post left sidebar */
						get_template_part( 'templates/single-post', 'left' );

						if( $tz_theme_type == 'theme-magenta' ) {
							echo '<div class="col-md-12 col-sm-12 col-xs-12 padding-four xs-padding-five bg-white">';
						}
						
							// Include Post Format Data
							if ( !post_password_required() ) {
								get_template_part( 'loop/single/content', get_post_format() );
							}

							// Show Post Content
							echo '<div class="entry-content">';
							    the_content();
							echo '</div>';

							/* Displays page-links for paginated posts. */
	                        wp_link_pages( 
	                            array(
	                                'before'      => '<div class="page-links"><span class="pagination-title">' . esc_html__( 'Pages:', 'paperio' ).'</span>',
	                                'after'       => '</div>',
	                                'link_before' => '<span class="page-number">',
	                                'link_after'  => '</span>',
	                            )
	                        );

							/* Check post tags, comment link and like */
							if( $tz_hide_tags != 1 || $tz_hide_comment_link != 1 || $tz_hide_like != 1 ) :
								echo '<div class="col-md-12 col-sm-12 col-xs-12 blog-meta text-uppercase margin-top-20 padding-top-25 padding-bottom-25 border-top-mid-gray alt-font post-details-tags-main no-padding-lr paperio-meta-border-color">';
					                
					                if( $tz_hide_tags != 1 ) {
								    	paperio_single_post_meta_tag();
					                }
								    
								    if( $tz_hide_comment_link != 1 || $tz_hide_like != 1 ) {
									    echo '<div class="col-md-4 col-sm-12 col-xs-12 no-padding text-center pull-right meta-border-right">';
									        echo '<ul class="blog-listing-comment">';
								        	if( comments_open() && $tz_hide_comment_link != 1 ) {
									            echo '<li>';
													comments_popup_link( __( '<i class="far fa-comment"></i><span>Leave a comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>1 Comment</span>', 'paperio' ), __( '<i class="far fa-comment"></i><span>% comments</span>', 'paperio' ), 'comment comments-link inner-link' );
									            echo '</li>';
								            }
					            			if( $tz_hide_like != 1 && function_exists( 'paperio_get_simple_likes_button' ) && ( get_post_type( get_the_ID() ) == 'post' ) ) {
								            	echo '<li>'.paperio_get_simple_likes_button( get_the_ID() ).'</li>';
					            			}
									        echo '</ul>';
									    echo '</div>';
									}
								echo '</div>';
							endif;

							/* Check if share button hide / show */
							if( $tz_hide_share != 1 ) :
								echo '<div class="col-md-12 col-sm-12 col-xs-12 text-center padding-top-40 padding-bottom-40 no-padding-lr border-top-mid-gray paperio-meta-border-color">';
									echo paperio_share_button( get_the_ID() );
								echo '</div>';
							endif;

							/* Check if author box hide / show */
							if( $tz_hide_post_author_box != 1 && get_the_author_meta( 'description' ) ) :
								get_template_part( 'author-bio' );
							endif;

							/* Check if related post hide or show */
							if( $tz_hide_related_posts != 1 ) :
						    	paperio_related_posts( get_the_ID() );
						    endif;
						
							// If comments are open or we have at least one comment, load up the comment template.
							if( $tz_hide_comment != 1 ) {
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
							}

						if( $tz_theme_type == 'theme-magenta' ) {
							echo '</div>';
						}
							
						/* Get post right sidebar */
						get_template_part( 'templates/single-post', 'right' );
						
					echo '</div>';
				echo '</div>';
			echo '</section>';
		echo '</div>';	

	echo '</div>';

// End of the loop.
endwhile;

get_footer();