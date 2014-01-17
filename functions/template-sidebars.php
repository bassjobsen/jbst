<?php

/* Call function to register sidebars */
add_action( 'widgets_init', 'jbst_widgets_init' );

/* Create function to register sidebars. @since jbst 1.0 */
function jbst_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Left Content Sidebar', 'jamedo-bootstrap-start-theme' ),
		'id' => 'left-content-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Right Content Sidebar', 'jamedo-bootstrap-start-theme' ),
		'id' => 'right-content-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

/* Call function to register footer sidebars / widget areas */
add_action( 'widgets_init', 'jbst_footer_widgets_init' );

function jbst_footer_widgets_init() {
    $ftr_widgets = get_theme_mod( 'footer_widgets_number', 4 );

    $footer_widgets_array = array(
        __('One','jamedo-bootstrap-start-theme'),
        __('Two','jamedo-bootstrap-start-theme'),
        __('Three','jamedo-bootstrap-start-theme'),
        __('Four','jamedo-bootstrap-start-theme')
    );

    for ( $i=0; $i < $ftr_widgets; $i++ ) {
        register_sidebar( array(
            'name' => __('Footer Widget', 'jamedo-bootstrap-start-theme').' '.$footer_widgets_array[$i],
            'id' => 'footer-widget-'.($i+1),
            'before_widget' => '<p>',
            'after_widget' => '</p>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ) );

    }
}

