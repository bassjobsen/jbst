<?php
function new_excerpt_more( $more ) {
	
	if(is_search())return;
	$ontitle = the_title_attribute( array('echo' => 0 ) );
	$ontitlestr = '<span class="sr-only">: '.esc_attr( $ontitle ).'</span>';
	
	return '<br><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'.__( 'Continue reading', 'jamedo-bootstrap-start-theme' ) .  $ontitlestr .'<span class="meta-nav">&rarr;</span></a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

if ( ! function_exists( 'jbst_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since JBST 2.0
 *
 * @return void
 */
function jbst_posted_on() {
	/*if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'jamedo-bootstrap-start-theme' ) . '</span>';
	}*/

	// Set up and print post meta information.
	printf( '<span class="entry-date">'.__( 'Posted on','jamedo-bootstrap-start-theme').': <a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"> '.__('by','jamedo-bootstrap-start-theme').' <span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
}
endif;
