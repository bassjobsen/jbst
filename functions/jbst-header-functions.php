<?php
/**
 * Header hooks
 *
 * THE FUNCTIONS IN THIS FILE ALL TIE INTO THE
 * 'jbst_header' ACTION HOOK WHICH IS CALLED IN header.php
 * FILE. DEVELOPERS CAN REMOVE ANYTHING HERE WITH A SIMPLE
 * 'remove_action' CALL.
 *
 * @package WordPress
 * @subpackage JBST
 * @since 2.0.6
 * @category hooks
 */


add_action( 'jbst_header', 'jbst_doc_type', 9 );
/**
 * jbst Doc Type.
 * 
 * Create the doc type and initial meta tags.
 *
 * @since 2.0.6
 *
 * @return void
 */
function jbst_doc_type() {
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php
}

add_action( 'jbst_header', 'jbst_doc_title', 20 );
/**
 * jbst Title.
 * 
 * Create the title attribute for each page.
 *
 * @since 2.0.6
 *
 * @return void
 */
function jbst_doc_title() {
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


add_action( 'jbst_header', 'jbst_head_after', 30 );
/**
 * jbst HEAD.
 * 
 * Adds addtion reference to <head>.
 *
 * @since 2.0.6
 *
 * @return void
 */
function jbst_head_after() {
?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/library/assets/js/html5shiv.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/library/assets/js/respond.min.js"></script>
    <![endif]-->
<?php
do_action('jbst_head');
wp_head();
global $woocommerce;?>
</head>
<?php
}

add_action( 'jbst_header', 'jbst_body_open', 40 );
/**
 * jbst BODY.
 * 
 * Adds addtion reference to <head>.
 *
 * @since 2.0.6
 *
 * @return void
 */
function jbst_body_open() {
?>
<body <?php body_class(); ?>>
<?php do_action( 'jbst_before' ); ?>
<div class="jbst-site-wrap">

<?php
}



/*
==========================================================
jbst Main Nav
==========================================================
*/
// 


add_action( 'jbst_header', 'jbst_main_navbar', 50 );
function jbst_main_navbar() { 
	?><header role="banner"><?php
/**
 * Optional HTML5 inside the <header> before content.
 *
 * Optional HTML5 inside the <header> add before the main content (logo and navbar).
 * 
 *  Example:
 * 
 * function test_beforeheader($content)
 * {
 * return get_template_part( 'content', 'beforeheader');
 * }	
 * add_filter('jbst_before_headercontent','test_beforeheader');
 * 
 *
 * @since 2.0.6
 *
 * @param string $content empty HTML5 string.
 */
	echo apply_filters('jbst_before_headercontent','');
	$fixed = preg_match('/fixed/',get_theme_mod( 'navbar_style', navbar_style ));

	if(	get_theme_mod('logo_image_position', logo_image_position) == 'outside-nav' && !$fixed ) 
	{
	echo apply_filters('jbst_logooustside',jbst_logooustside());
	}  
	
	if(get_theme_mod( 'navbar_style',navbar_style ) == 'default') {?><div class="container"><?php } ?>
	
	<nav role="navigation" class="navbar navbar-default <?php echo get_theme_mod(  'navbar_style',navbar_style );?> <?php //echo get_theme_mod( 'navbar_color', 'navbar-default' );?>" id="jbst-top-nav">
      <?php if(get_theme_mod(  'navbar_style',navbar_style ) != 'default') {?><div class="container"><?php } ?>
       <a class="sr-only" href="#content"><?php _e( 'Skip to content', 'jamedo-bootstrap-start-theme' ); ?></a>

       <div class="navbar-header">
		<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		  <span class="sr-only"><?php echo __( 'Toggle navigation', 'jamedo-bootstrap-start-theme' ); ?></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
			<?php if(get_theme_mod('logo_image_position', logo_image_position) == 'in-nav') {echo apply_filters('jbst_logo',jbst_logo());} ?>
       </div>
         
		  
         <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
		  <?php jbst_main_nav(); // Adjust using Menus in Wordpress Admin ?>
		  <?php if(get_theme_mod( 'navbar_search', navbar_search ) == 1) {jbst_nav_search();} ?> 
		  <!--ul class="nav navbar-nav navbar-right"-->
		  <?php if(get_theme_mod( 'navbar_cart', navbar_cart ) == 1) {jbst_cart_dropdown();} ?>
		  <?php if(get_theme_mod( 'navbar_account', navbar_account ) == 1) {jbst_account_dropdown();} ?>
          <!--/ul-->
          </div>
        
       <?php if(get_theme_mod(  'navbar_style',navbar_style ) != 'default') {?></div><?php } ?>
    </nav>
    <?php if(get_theme_mod(  'navbar_style',navbar_style ) == 'default') {?></div><?php } ?>
	<?php
	
	if(	get_theme_mod('logo_image_position', 'in-nav') == 'outside-nav' && 	$fixed)
	{
		echo apply_filters('jbst_logooustside',jbst_logooustside());
	} 
/**
 * Optional HTML5 inside the <header> after content.
 *
 * Optional HTML5 inside the <header> add after the main content (logo and navbar).
 * 
 *  Example:
 * 
 * function test_afterheader($content)
 * {
 * return get_template_part( 'content', 'beforeheader');
 * }	
 * add_filter('jbst_after_headercontent','test_afterheader');
 * 
 *
 * @since 2.0.6
 *
 * @param string $content empty HTML5 string.
 */	 
echo apply_filters('jbst_after_headercontent','');
?></header><?php
} // END jbst_main_navbar

function jbst_nav_styles() { 
	if(get_theme_mod( 'navbar_style', navbar_style) == 'default') { //default
	echo '
	body { padding-top: 30px; }
        .navbar { margin-bottom: 30px; margin-left: -15px;
    margin-right: -15px;}
	';
	}
	elseif(get_theme_mod( 'navbar_style', navbar_style) == 'navbar-static-top') {
	echo '
	.navbar-static-top {  margin-bottom: 19px; }
	';
	}
	elseif(get_theme_mod( 'navbar_style', navbar_style) == 'navbar-fixed-top') {
	echo '
	body {  padding-top: 70px; }
	';
	}
	elseif(get_theme_mod( 'navbar_style', navbar_style) == 'navbar-fixed-bottom') {
	echo '
	body {  padding-padding-bottom: 70px; }
	';
	}

	$navbar_background_color = get_theme_mod( 'navbar_background_color',navbar_background_color);
	if(!empty($navbar_background_color))
	{
		echo '@navbar-default-bg:               '.$navbar_background_color.';';
	}	
  
    
    $navbar_border_color = get_theme_mod( 'navbar_border_color',navbar_border_color);
	if(!empty($navbar_border_color))
	{
		echo '@navbar-default-border: '.$navbar_border_color.';';
    }
    
    $navbar_link_color = get_theme_mod( 'navbar_link_color',navbar_link_color);
	if(!empty($navbar_link_color))
	{
		echo '@navbar-default-link-color: '.$navbar_link_color.';';
    }
    
    $navbar_linkhover_color = get_theme_mod( 'navbar_linkhover_color',navbar_linkhover_color);
	if(!empty($navbar_linkhover_color))
	{
		echo '@navbar-default-link-hover-color: '.$navbar_linkhover_color.';';
    }	
    
    $navbar_linkhoverbackground_color = get_theme_mod( 'navbar_linkhoverbackground_color',navbar_linkhoverbackground_color);
	if(!empty($navbar_linkhoverbackground_color))
	{
		echo '@navbar-default-link-hover-bg: '.$navbar_linkhoverbackground_color.';';
    }	
    
    $navbar_activelink_color = get_theme_mod( 'navbar_activelink_color',navbar_activelink_color);
	if(!empty($navbar_activelink_color))
	{
		echo '@navbar-default-link-active-color: '.$navbar_activelink_color.';';
    }	
    
    $navbar_activebackground_color = get_theme_mod( 'navbar_activebackground_color',navbar_activebackground_color);
	if(!empty($navbar_activebackground_color))
	{
		echo '@navbar-default-link-active-bg: '.$navbar_activebackground_color.';';
    }
    
     echo '@logo-outside-nav-text-align: '.logo_outside_nav_text_align.';';
    
    
    /* LOGO */
	if(!$logo_link_color=get_theme_mod( 'logo_link_color',logo_link_color)) {
		$logo_link_color=get_theme_mod( 'navbar_link_color',navbar_link_color);
    }	
	if($logo_link_color) {
		echo '@navbar-default-brand-color: '. $logo_link_color.';';
    }

	if(!$logo_linkhover_color=get_theme_mod( 'logo_linkhover_color',logo_linkhover_color)) {
		$logo_linkhover_color=get_theme_mod( 'navbar_linkhover_color',navbar_linkhover_color);
    }	
	if($logo_linkhover_color) {
		echo '@navbar-default-brand-hover-color: '. $logo_linkhover_color.';';
    }
    
    
}
add_action('jbst_add_to_custom_style','jbst_nav_styles');

/*
==========================================================
jbst Content Wrappers
==========================================================
*/
// Create content wrapper HTML
add_action( 'jbst_header', 'jbst_top_content_wrapper', 60 );
function jbst_top_content_wrapper() {
	echo '<div id="contentwrap">
			<div id="page" class="hfeed site '.((get_theme_mod( 'container_width',container_width)=='full')?'container-fluid':'container').'">
				<div class="row">';
}

/*
==========================================================
CUSTOM LOGO
==========================================================
*/

function jbst_logo() { 
	$custom_logo = get_theme_mod( 'logo_image', logo_image);
	if ($custom_logo) 
	{
	return "<a id='logo-link-container' href='".home_url()."' title='".esc_attr( get_bloginfo( 'name', 'display' ) )."'><img class='site-logo' src='$custom_logo' alt='".esc_attr( get_bloginfo( 'name', 'display' ) )."' /></a>"; 
	} 
	return '<a class="navbar-brand" href="'. home_url() . '">' . get_bloginfo('name') . '</a>';
}

/*
==========================================================
Logo out side navar
==========================================================
*/
//       


function jbst_logooustside()
{
	$extraclasses = apply_filters('jbst_logooustside_classes',array());
	$string  = '<div class="container"><div class="row"><div class="col-xs-12"><div class="logo-outside-nav container'.(($extraclasses)?' '.implode('',$extraclasses):'').'">';
	$string .=  apply_filters('jbst_logo',jbst_logo());
	$string .=  '</div></div></div></div>';	
	return $string;
}


/*
==========================================================
jbst Left Sidebar
==========================================================
*/
// Call the left sidebar if this template has one.
add_action( 'jbst_header', 'jbst_left_sidebar', 80 );



/*
==========================================================
jbst BuddyPress Top Content Wrapper
==========================================================
*/
// 
add_action( 'jbst_before_buddypress', 'jbst_buddypress_top_content_wrapper', 10 );
function jbst_buddypress_top_content_wrapper() {
?>
	<div id="content" role="main" class="site-content <?php echo apply_filters('jbstmaingridclass',jbst_content_span()) ?>">
<?php
}
