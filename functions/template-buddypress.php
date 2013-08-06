<?php
/* Add custom BuddyPress styling
----------------------------------------------- */
function skematik_buddypress_css() {    
	wp_register_style( 'skematik-bp-css', get_template_directory_uri() . '/assets/css/bp.css', array(), '20121008', 'all' );
    wp_enqueue_style( 'skematik-bp-css' );
	wp_register_style( 'skematik-buddypress-css', get_template_directory_uri() . '/assets/css/buddypress.css', array(), '20121008', 'all' );
    wp_enqueue_style( 'skematik-buddypress-css' );
}
add_action( 'wp_enqueue_scripts', 'skematik_buddypress_css', 99 );

/* Add to custom style from Theme Customizer
----------------------------------------------- */
function skematik_buddypress_custom_style() {    
	echo 'div.item-list-tabs#subnav {background-color:' .get_theme_mod( 'site_background_color', '#ffffff' ).';border-bottom:0;}';
	echo 'div.item-list-tabs,div.item-list-tabs#subnav ul li.selected a, div.item-list-tabs#subnav ul li.current a {background-color:' .get_theme_mod( 'well_color', 'whiteSmoke' ).';color:' .get_theme_mod( 'body_color', '#333' ).';}';
	echo 'div.item-list-tabs ul li.selected a, div.item-list-tabs ul li.current a {background-color:' .get_theme_mod( 'border_color', '#eee' ).';color:' .get_theme_mod( 'body_color', '#333' ).';}';
	echo '.profile-fields .label {color:' .get_theme_mod( 'body_color', '#333' ).';}';
}
add_action( 'skematik_add_to_custom_style', 'skematik_buddypress_custom_style', 99 );

/* Use jQuery to add bootstrap classes to stuff
----------------------------------------------- */
function skematik_buddypress_add_classes() {?>
<script>
jQuery(document).ready(function($) {
  /* Add to cart buttons */
  $("form#settings-form table, table.profile-fields").addClass("table table-striped");  
  $("input[type='submit']").addClass("btn btn-success");  
  $("#item-header-avatar img,.activity-avatar img").addClass("thumbnail");
  $(".bp-primary-action,.bp-secondary-action").addClass("btn btn-mini");
  $(".item-button.delete-activity").addClass("btn-danger"); 
});
</script>
<?php
}
add_action('wp_head','skematik_buddypress_add_classes', 30);

/* Account Profile Button
----------------------------------------------- */
remove_action( 'skematik_nav_profile_dropdown', 'skematik_account_profile_link', 10);
function skematik_bp_account_profile_link() {
	echo '<li><a href="';
	echo home_url().'/wp-admin/profile.php';
	echo '">';
	echo _e( 'My Profile', 'jamedo-bootstrap-start-theme' );
	echo '</a></li>';
}
add_action( 'skematik_nav_profile_dropdown', 'skematik_bp_account_profile_link', 10);

/* Padding to Nav Bar
----------------------------------------------- */
function skematik_bp_navbar_padding() {
	echo '<style>body.logged-in .navbar-fixed-top {margin-top:28px;}';
	echo 'form #s {height: 29px;}';
	echo '</style>';
}
add_action( 'skematik_before_buddypress', 'skematik_bp_navbar_padding', 10);
