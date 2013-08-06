<?php
/*
==========================================================
THE FUNCTIONS IN THIS FILE ALL TIE INTO THE
'skematik_header' ACTION HOOK WHICH IS CALLED IN header.php
FILE. DEVELOPERS CAN REMOVE ANYTHING HERE WITH A SIMPLE
'remove_action' CALL.
==========================================================
*/



/*
==========================================================
Skematik Doc Type
==========================================================
*/
// Create the doc type and initial meta tags
add_action( 'skematik_header', 'skematik_doc_type', 9 );
function skematik_doc_type() {
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php
}



/*
==========================================================
Skematik Title
==========================================================
*/
// Create the title attribute for each page
add_action( 'skematik_header', 'skematik_doc_title', 20 );
function skematik_doc_title() {
?>
<title>
	<?php
	/* Print the <title> tag based on what is being viewed.*/
	global $page, $paged;
	
	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'jamedo-bootstrap-start-theme' ), max( $paged, $page ) );
	?>
</title>
<?php
}



/*
==========================================================
Skematik Head
==========================================================
*/
// 
add_action( 'skematik_header', 'skematik_head_after', 30 );
function skematik_head_after() {
?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<?php
do_action('skematik_head');
wp_head();
global $woocommerce;?>
</head>
<?php
}



/*
==========================================================
Skematik BODY
==========================================================
*/
// 
add_action( 'skematik_header', 'skematik_body_open', 40 );
function skematik_body_open() {
?>
<body <?php body_class(); ?>>
<?php do_action( 'skematik_before' ); ?>
<div class="skematik-site-wrap">
<?php
}



/*
==========================================================
Skematik Main Nav
==========================================================
*/
// 
add_action( 'skematik_header', 'skematik_main_navbar', 50 );
function skematik_main_navbar() {
	if(get_theme_mod('logo_image_position', 'in-nav') == 'outside-nav') {
	echo '<div class="logo-outside-nav">';
	echo skematik_logo();
	echo '</div>';	
	} ?>

	<div class="navbar <?php echo get_theme_mod( 'navbar_style', 'navbar-fixed-top' );?> <?php echo get_theme_mod( 'navbar_color', 'navbar-default' );?>" id="skematik-top-nav">
      <div class="navbar-inner">
        <div class="container">
		<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
          
          <?php if(get_theme_mod('logo_image_position', 'in-nav') == 'in-nav') {skematik_logo();} ?>
          <div class="right-buttons">          
		  <?php if(get_theme_mod( 'navbar_account', 1 ) == 1) {skematik_account_dropdown();} ?>

		  <?php if(get_theme_mod( 'navbar_cart', 1 ) == 1) {skematik_cart_dropdown();} ?>
		  <?php if(get_theme_mod( 'navbar_search', 1 ) == 1) {skematik_nav_search();} ?>
		  </div>
		  
          <div class="nav-collapse collapse navbar-responsive-collapse">
		  <?php skematik_main_nav(); // Adjust using Menus in Wordpress Admin ?>
          </div>
        </div>
      </div>
    </div>
	<?php
} // END skematik_main_navbar

function skematik_nav_styles() {
	if(get_theme_mod( 'navbar_style', 'navbar-fixed-top' ) == 'navbar-static-top') {
	echo '
	body {padding-top:0px;}
	body.admin-bar {padding-top:0px;}
	#skematik-top-nav {margin-top:-1px;}
	';
	}
	if(get_theme_mod( 'navbar_style', 'navbar-fixed-top' ) == 'navbar-static-cont-width') {
	echo '
	body {padding-top:15px;}
	body.admin-bar {padding-top:15px;}
	#main {margin-top:10px;margin-bottom:10px;}
	.hero-unit.masthead {margin-bottom: 25px;}
	';
	}
}
add_action('skematik_add_to_custom_style','skematik_nav_styles');

/*
==========================================================
Skematik Content Wrappers
==========================================================
*/
// Create content wrapper HTML
add_action( 'skematik_header', 'skematik_top_content_wrapper', 60 );
function skematik_top_content_wrapper() {
	echo '
	<div id="contentwrap">
		<div id="page" class="hfeed site container">
			<div id="main">
				<div class="row">';
}



/*
==========================================================
Skematik Left Sidebar
==========================================================
*/
// Call the left sidebar if this template has one.
add_action( 'skematik_header', 'skematik_left_sidebar', 80 );



/*
==========================================================
Skematik BuddyPress Top Content Wrapper
==========================================================
*/
// 
add_action( 'skematik_before_buddypress', 'skematik_buddypress_top_content_wrapper', 10 );
function skematik_buddypress_top_content_wrapper() {
?>
	<div id="primary" class="site-content <?php skematik_content_span(); ?>">
		<div id="content" role="main">
<?php
}
