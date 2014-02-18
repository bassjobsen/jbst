<?php
/**
 * JBST functions and definitions
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
add_action( 'after_setup_theme', 'jbst_theme_setup');

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
	if(jbst_customizer)require( get_template_directory() . '/functions/template-customizer.php' );
	
	/* Load custom jbst Theme functions. */
	require( get_template_directory() . '/functions/template-ecommerce.php' );
	
	/* Load BuddyPress functions after checking if it's active. */
	if ( in_array( 'buddypress/bp-loader.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		require( get_template_directory() . '/functions/template-buddypress.php' );	
	}
	
	require( get_template_directory() . '/functions/template-sidebars.php' );
	
    /* Load basic styles to the editor */
    //add_editor_style('library/assets/wptoless/wp2less.css');
    /* Load basic styles to the editor */
    add_editor_style('library/assets/css/wpless2css.css');

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


	if(jbst_less)require( get_template_directory() . '/functions/jbst-less-functions.php' );
	
	/*
	==========================================================
	Loads Options
	==========================================================
	*/
	if(jbst_options)require_once dirname( __FILE__ ) . '/options.php';
	
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

/* Load Scripts */
add_action( 'wp_enqueue_scripts', 'jbst_jquery_js' );
add_action( 'wp_enqueue_scripts', 'jbst_bootstrap_js' );

add_action( 'wp_enqueue_scripts', 'jbst_comments_js' );
add_action( 'wp_enqueue_scripts', 'jbst_js' );

/*
==========================================================
TEMPLATES
==========================================================
*/

add_action( 'jbst_header','jbst_open_content_wrappers',100);
add_action( 'jbst_footer','jbst_close_content_wrappers',1);

/*
==========================================================
CUSTOMIZER PREVIEW
==========================================================
*/

add_action( 'customize_preview_init', 'jbst_custom_style',99);

function my_styles_method() {
   ob_start();
   //require_once( get_template_directory() . '/functions/custom-style.php' );
   //do_action('jbst_add_to_custom_style');
   require_once( get_template_directory() . '/functions/custom-style-css.php' );
   
   $return = ob_get_contents ();
  
   ob_clean();
   
   wp_add_inline_style( 'wpless2css', $return );
}

function jbst_custom_style() {
add_action( 'wp_enqueue_scripts', 'my_styles_method' );
} 
