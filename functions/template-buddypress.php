<?php
/* Add custom BuddyPress styling
----------------------------------------------- */
function jbst_buddypress_css() {    
	wp_register_style( 'jbst-buddypress-css', get_stylesheet_directory_uri() . '/assets/css/buddypress.css', array(), '20121008', 'all' );
    wp_enqueue_style( 'jbst-buddypress-css' );
}
add_action( 'wp_enqueue_scripts', 'jbst_buddypress_css', 99 );

/* Add to custom style from Theme Customizer
----------------------------------------------- */
function jbst_buddypress_custom_style() {    
	echo 'div.item-list-tabs#subnav {background-color:' .get_theme_mod( 'site_background_color', '#ffffff' ).';border-bottom:0;}';
	echo 'div.item-list-tabs,div.item-list-tabs#subnav ul li.selected a, div.item-list-tabs#subnav ul li.current a {background-color:' .get_theme_mod( 'well_color', 'whiteSmoke' ).';color:' .get_theme_mod( 'body_color', '#333' ).';}';
	echo 'div.item-list-tabs ul li.selected a, div.item-list-tabs ul li.current a {background-color:' .get_theme_mod( 'border_color', '#eee' ).';color:' .get_theme_mod( 'body_color', '#333' ).';}';
	echo '.profile-fields .label {color:' .get_theme_mod( 'body_color', '#333' ).';}';
}
add_action( 'jbst_add_to_custom_style', 'jbst_buddypress_custom_style', 99 );

/* Use jQuery to add bootstrap classes to stuff
----------------------------------------------- */
function jbst_buddypress_add_classes() {
	wp_register_script( 'buddypress_js', get_template_directory_uri() . '/library/assets/js/buddypress.js', array( 'jquery' ), '20120921', true );
	wp_enqueue_script( 'buddypress_js' );
}

add_action('wp_enqueue_scripts','jbst_buddypress_add_classes', 30);

/* Account Profile Button
----------------------------------------------- */
remove_action( 'jbst_nav_profile_dropdown', 'jbst_account_profile_link', 10);
function jbst_bp_account_profile_link() {
	echo '<li><a href="';
	echo home_url().'/wp-admin/profile.php';
	echo '">';
	echo _e( 'My Profile', 'jamedo-bootstrap-start-theme' );
	echo '</a></li>';
}
add_action( 'jbst_nav_profile_dropdown', 'jbst_bp_account_profile_link', 10);

/* Padding to Nav Bar
----------------------------------------------- */
function jbst_bp_navbar_padding() {
	echo '<style>body.logged-in .navbar-fixed-top {margin-top:28px;}';
	echo 'form #s {height: 29px;}';
	echo '</style>';
}
add_action( 'jbst_before_buddypress', 'jbst_bp_navbar_padding', 10);
