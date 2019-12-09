<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Paperio
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}
?>

	<?php if ( have_comments() ) : ?>
		<div id="comments" class="col-md-12 col-sm-12 col-xs-12 post-comment-main padding-six-top no-padding-lr margin-six-top border-top-mid-gray sm-padding-ten-top comments-area">
			<h5 class="text-uppercase text-mid-gray font-weight-600 text-center margin-six-bottom sm-margin-ten-bottom comments-title">
				<?php echo esc_html__( 'Blog Comments', 'paperio' ); ?>
			</h5>

			<?php the_comments_navigation(); ?>

			<?php
				wp_list_comments( array(
					'style'       => 'div',
					'short_ping'  => true,
					'avatar_size' => 60,
					'callback' 	  => 'paperio_comment_callback',
				) );
			?>

			<?php the_comments_navigation(); ?>
		</div>
	<?php endif; // Check for have_comments(). ?>

	
	<div class="col-md-12 col-sm-12 col-xs-12 padding-six margin-six-top no-padding-lr no-padding-bottom sm-padding-ten-top sm-padding-ten-top border-top-mid-gray">
	<?php
		$theme_button_color = '';
		$tz_theme_type = get_theme_mod( 'tz_theme_type', 'theme-yellow' );
		$theme_button_color = ( $tz_theme_type == 'theme-fast-red' ) ? 'btn-double-border' : 'btn-black';
		
		$commenter = wp_get_current_commenter();
		$user = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';
		$args = array();
		$args = wp_parse_args( $args );
		if ( ! isset( $args['format'] ) )
			$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
		$req      = get_option( 'require_name_email' );
		$aria_req = '';
		$html_req = '';
		$html5    = 'html5' === $args['format'];
		$consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
		$fields   =  array(
			'author' => '<div class="col-md-6"><input id="author" aria-label="'.esc_html__( 'Name *', 'paperio' ).'" placeholder="'.esc_html__( 'Name *', 'paperio' ).'" class="input-field medium-input paperio-input-focus-remove" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . $html_req . ' />',
			'email'  => '<input id="email" maxlength="100" aria-label="'.esc_html__( 'Email *', 'paperio' ).'" placeholder="'.esc_html__( 'Email *', 'paperio' ).'" class="input-field medium-input paperio-input-focus-remove" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . $html_req  . ' />',
			'url'    => '<input id="url" aria-label="'.esc_html__( 'Website', 'paperio' ).'" placeholder="'.esc_html__( 'Website', 'paperio' ).'" class="input-field medium-input" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',
		);

		if ( has_action( 'set_comment_cookies', 'wp_set_comment_cookies' ) && get_option( 'show_comments_cookies_opt_in' ) ) {
			$consent           = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
			$fields['cookies'] = '<div class="col-md-12 comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
								 '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'paperio' ) . '</label></div>';

			// Ensure that the passed fields include cookies consent.
			if ( isset( $args['fields'] ) && ! isset( $args['fields']['cookies'] ) ) {
				$args['fields']['cookies'] = $fields['cookies'];
			}
		}
		$fields = apply_filters( 'comment_form_default_fields', $fields );
		comment_form( array(
			'fields'               => $fields,
			'comment_field'        => '<div class="col-md-6"><textarea id="comment" aria-label="'.esc_html__( 'Your Comment *', 'paperio' ).'" placeholder="'.esc_html__( 'Your Comment *', 'paperio' ).'" class="input-field medium-input paperio-input-focus-remove" name="comment" required="required"></textarea></div>',
			'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title text-uppercase text-mid-gray font-weight-600 text-center margin-six-bottom sm-margin-ten-bottom">',
			'title_reply_after'    => '</h5>',
			'class_form'           => 'comment-form blog-comment-form row',
			'title_reply'          => esc_html__( 'Leave a Comment', 'paperio' ),
		  	'title_reply_to'       => esc_html__( 'Leave a Comment to %s', 'paperio' ),
		  	'cancel_reply_link'    => esc_html__( 'Cancel Comment', 'paperio' ),
		  	'label_submit'         => esc_html__( 'Post Comment', 'paperio' ),
		  	'comment_notes_before' => '',
		  	'comment_notes_after'  => '',
		  	'class_submit'         => $theme_button_color.' btn btn-small alt-font text-uppercase submit paperio-comment-button',
		  	'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
			'submit_field'         => '<div class="col-md-12 text-center padding-three-top form-submit">%1$s %2$s</div>',
			'logged_in_as'         => '<p class="logged-in-as col-md-12">'.
									  sprintf('<a href="%1$s" aria-label="%2$s">%3$s</a>. <a href="%4$s">%5$s</a>',
		                              get_edit_user_link(),
		                              esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.', 'paperio' ), $user_identity ) ),
		                              esc_attr( sprintf( __( 'Logged in as %s', 'paperio' ), $user_identity ) ) ,
		                              wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ),
		                              sprintf( esc_html__( 'Log Out?', 'paperio' ) )
		                          ) . '</p>',
		) );
	?>
</div>