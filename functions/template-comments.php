<?php
function jbst_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
	global $wpcommentspopupfile, $wpcommentsjavascript;

	$id = get_the_ID();

	if ( false === $zero ) $zero = __( 'No Comments','jamedo-bootstrap-start-theme' );
	if ( false === $one ) $one = __( '1 Comment','jamedo-bootstrap-start-theme' );
	if ( false === $more ) $more = __( '% Comments' ,'jamedo-bootstrap-start-theme');
	if ( false === $none ) $none = __( 'Comments Off','jamedo-bootstrap-start-theme' );

	$number = get_comments_number( $id );

	if ( 0 == $number && !comments_open() && !pings_open() ) {
		echo '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
		return;
	}

	if ( post_password_required() ) {
		echo __('Enter your password to view comments.','jamedo-bootstrap-start-theme');
		return;
	}

	echo '<a href="';
	if ( $wpcommentsjavascript ) {
		if ( empty( $wpcommentspopupfile ) )
			$home = home_url();
		else
			$home = get_option('siteurl');
		echo $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
		echo '" onclick="wpopen(this.href); return false"';
	} else { // if comments_popup_script() is not in the template, display simple comment link
		if ( 0 == $number )
			echo get_permalink() . '#respond';
		else
			comments_link();
		echo '"';
	}

	if ( !empty( $css_class ) ) {
		echo ' class="'.$css_class.'" ';
	}
	//$title = the_title_attribute( array('echo' => 0 ) );

	$attributes = '';
	/**
	 * Filter the comments popup link attributes for display.
	 *
	 * @since 2.5.0
	 *
	 * @param string $attributes The comments popup link attributes. Default empty.
	 */
	echo apply_filters( 'comments_popup_link_attributes', $attributes );

	//echo ' title="' . esc_attr( sprintf( __('Comment on %s'), $title ) ) . '">';
	echo '>';
	comments_number( $zero, $one, $more );
	echo '</a>';
}
