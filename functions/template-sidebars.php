<?php

/* Call function to register sidebars */
add_action( 'widgets_init', 'skematik_widgets_init' );

/* Create function to register sidebars. @since skematik 1.0 */
function skematik_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Left Content Sidebar', 'jamedo-bootstrap-start-theme' ),
		'id' => 'left-content-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Right Content Sidebar', 'jamedo-bootstrap-start-theme' ),
		'id' => 'right-content-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
