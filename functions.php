<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage JBST
 * @since 2.0.6
 */



/* Load custom jbst functions. */
require( get_template_directory() . '/functions/options-functions.php' );
require_once( trailingslashit( get_template_directory() ) . 'library/core.php' );
/*
==========================================================
THEME DEFAULTS
==========================================================
*/

/**
 * Set up the content width value based on the theme's design.
 *
 * @see jbst_content_width()
 *
 * @since JBST 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/* Load jbst functions on 'after_setup_theme'. */
add_action( 'after_setup_theme', 'jbst_default_settings' );
add_action( 'after_setup_theme', 'jbst_theme_setup' );

if ( ! function_exists( 'jbst_theme_setup' ) ):
/*
Sets up theme defaults and registers support for various WordPress features. Note that this function is hooked into the after_setup_theme hook, which runs before the init hook. The init hook is too late for some features, such as indicating support post thumbnails.@since jbst 1.0
*/
function jbst_theme_setup() {

	/* Load custom jbst functions. */
	require( get_template_directory() . '/functions/template-functions.php' );

	/* Load custom jbst header functions. */
	require( get_template_directory() . '/functions/jbst-header-functions.php' );
	
	/* Load custom jbst header functions. */
	require( get_template_directory() . '/functions/jbst-footer-functions.php' );
	
	/* Load custom jbst Theme widgets. */
	require( get_template_directory() . '/functions/template-widgets.php' );
	
	/* Load custom jbst Comment functions. */
	require( get_template_directory() . '/functions/template-comments.php' );
	
	/* Load custom jbst Tag functions. */
	require( get_template_directory() . '/functions/template-tags.php' );
	
	/* Load custom jbst Theme Customizer options. */
	require( get_template_directory() . '/functions/template-customizer.php' );

	/* Load custom jbst Theme functions. */
	require( get_template_directory() . '/functions/template-ecommerce.php' );
	
	/* Load BuddyPress functions after checking if it's active. */
	if ( in_array( 'buddypress/bp-loader.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		require( get_template_directory() . '/functions/template-buddypress.php' );	
	}
	
	require( get_template_directory() . '/functions/template-sidebars.php' );
	
	/* Load basic styles to the editor */
	add_editor_style('style-editor.css');

	/* Add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );

	/* Enable support for Post Thumbnails */
	add_theme_support( 'post-thumbnails' );
	
	/* Enable support for Theme Menus */
	add_theme_support( 'menus' );

	/* Identify support for WooCommerce */
	add_theme_support('woocommerce');
	
	// Add theme support for Semantic Markup
	$markup = array( 'search-form', 'comment-form', 'comment-list', );
	add_theme_support( 'html5', $markup );
	
/*
==========================================================
Internationalizing And Localizing 
==========================================================
*/

	/* Make theme available for translation. Translations can be filed in the /languages/ directory. You can load a theme text domain in the theme's functions file. */
	load_theme_textdomain( 'jamedo-bootstrap-start-theme', get_template_directory() . '/languages' );	

}
endif; // jbst_setup


/*
==========================================================
Call stylesheets and scripts from Core
==========================================================
*/
/* Put the call to this theme's css into a function */
function jbst_styles_css() {
	wp_enqueue_style( 'jbst-style', get_stylesheet_uri() );
}

/* Load stylesheets */
add_action( 'wp_enqueue_scripts', 'jbst_styles_css',99 );
add_action( 'wp_enqueue_scripts', 'jbst_prettify_css', 99  );
add_action( 'wp_enqueue_scripts', 'jbst_dropdown_submenu', 99  );

/* Load Scripts */
add_action( 'wp_enqueue_scripts', 'jbst_jquery_js' );
add_action( 'wp_enqueue_scripts', 'jbst_bootstrap_js' );
add_action( 'wp_enqueue_scripts', 'jbst_custom_js' );
add_action( 'wp_enqueue_scripts', 'jbst_prettify_js' );

add_action( 'wp_enqueue_scripts', 'jbst_comments_js' );
add_action( 'wp_enqueue_scripts', 'jbst_keyboard_nav_js' );
add_action( 'wp_enqueue_scripts', 'jbst_js' );


/*
==========================================================
Loads Options
==========================================================
*/
require_once dirname( __FILE__ ) . '/options.php';


/*
==========================================================
TEMPLATES
==========================================================
*/
function jbst_prepare_wrappers()
{
add_action( 'jbst_before_content_page','jbst_open_content_wrappers',10);
add_action( 'jbst_after_content_page','jbst_close_content_wrappers',10);
}

add_action( 'wp_head', 'jbst_prepare_wrappers',10);

add_action( 'customize_preview_init', 'jbst_custom_style',99);

function my_styles_method() {
   ob_start();
   require_once( get_template_directory() . '/functions/custom-style.php' );
   do_action('jbst_add_to_custom_style');
   $return = ob_get_contents ();
  
   ob_clean();
   
   wp_add_inline_style( 'wpless2css', $return );
}

function jbst_custom_style() {
add_action( 'wp_enqueue_scripts', 'my_styles_method' );
}

/*
==========================================================
LESS
==========================================================
*/

if ( ! class_exists( 'WP_LESS_to_CSS' ) ) {
require dirname(__FILE__) . '/vendor/wp-less-to-css/wp-less-to-css.php';
}

/* add path for custom fonts  */

add_filter( 'add_extra_less_code', 'add_custom_fonts_path');

if ( ! function_exists( 'add_custom_fonts_path' ) ) :
function add_custom_fonts_path()
{
	return '@custom-font-dir: "'.get_stylesheet_directory_uri().'/assets/fonts/";';
}
endif;

add_filter( 'add_extra_less_files', 'add_extra_less_files_live');
function add_extra_less_files_live()
{
	if(!file_exists($customless=get_stylesheet_directory().'/less/custom.less'))
	{
		if(!file_exists($customless=get_template_directory().'/library/assets/less/custom.less'))
		{
		  
		  wp_die('<strong>/library/assets/less/custom.less</strong> is missing');
				
		}
    }  
    return array(str_replace(ABSPATH,'',$customless));    
}

add_filter( 'get_theme_mods','get_theme_mods_live');

function get_theme_mods_live()
{
   ob_start();
   require_once( get_template_directory() . '/functions/custom-style.php' );
   do_action('jbst_add_to_custom_style');
   $return = ob_get_contents ();
  
   ob_clean();

   if(get_theme_mod('container_width')=='980') $return .= '@media (min-width: 1200px) {
  .container {
    max-width: 970px;
  }
  
}';

   if(get_theme_mod('gridfloatbreakpoint','768')=='0')
   {
	   $return .= '@grid-float-breakpoint:0; @grid-float-breakpoint-max:0;';
   }
   elseif(get_theme_mod('gridfloatbreakpoint','768')=='992')
   {
	   $return .= '@grid-float-breakpoint:992px; @grid-float-breakpoint-max:991px;';
   }    
   else
   {
	   $return .= '@grid-float-breakpoint:768px; @grid-float-breakpoint-max:767px;';
   }
   
   return $return; 
}

function lesscustomize($setting)
{
$updatecss = WP_LESS_to_CSS::$instance;
$updatecss->wpless2csssavecss(unserialize(get_theme_mod('customizercredits')));
}

function deletestoredcredits()
{
		remove_theme_mod( 'customizercredits' );
}	
add_action('wp_login','deletestoredcredits' );

add_action( 'customize_save_after', 'lesscustomize' );

function jbst_tmpadminheader()
{
				/**
				 * Dashboard Administration Screen
				 *
				 * @package WordPress
				 * @subpackage Administration
				 */

				/** Load WordPress Bootstrap */
				require_once(ABSPATH . 'wp-admin/admin.php' );

				/** Load WordPress dashboard API */
				require_once(ABSPATH . 'wp-admin/includes/dashboard.php');

				wp_dashboard_setup();

				wp_enqueue_script( 'dashboard' );
				if ( current_user_can( 'edit_theme_options' ) )
					wp_enqueue_script( 'customize-loader' );
				if ( current_user_can( 'install_plugins' ) )
					wp_enqueue_script( 'plugin-install' );
				if ( current_user_can( 'upload_files' ) )
					wp_enqueue_script( 'media-upload' );
				add_thickbox();

				if ( wp_is_mobile() )
					wp_enqueue_script( 'jquery-touch-punch' );

				$title = __('Customizer credentials','jamedo-bootstrap-start-theme');
				$parent_file = 'index.php';
				include( ABSPATH . 'wp-admin/admin-header.php' );
}	

function storecedits( $wp_customize ) {

           
            if(! WP_Filesystem(unserialize(get_theme_mod('customizercredits'))))
            {
				
				
			ob_start();	
            $in = true;
            $url = 'customize.php';
            if (false === ($creds = request_filesystem_credentials($url, '', false, false,null) ) ) {
                $in = false;
                
                $form = ob_get_contents();
                ob_end_clean();
                jbst_tmpadminheader();
				echo $form;
                require( ABSPATH . 'wp-admin/admin-footer.php' );
                exit;
            }
			ob_end_clean();
            if ($in && ! WP_Filesystem($creds) ) {
                // our credentials were no good, ask the user for theme again
                jbst_tmpadminheader();
                request_filesystem_credentials($url, '', true, false,null);
                require( ABSPATH . 'wp-admin/admin-footer.php' );
                $in = false;
                exit;
            }
            
            
            
            set_theme_mod('customizercredits', serialize($creds));
			}
            
}
add_action('customize_controls_init', 'storecedits', 1);
