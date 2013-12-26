<?php
/*
Skematik functions and definitions
@package skematik
@since skematik 1.0
*/
require_once( trailingslashit( get_template_directory() ) . 'library/core.php' );
/*
==========================================================
THEME DEFAULTS
==========================================================
*/

/* Set the content width based on the theme's design and stylesheet. @since skematik 1.0 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/* Load Skematik functions on 'after_setup_theme'. */
add_action( 'after_setup_theme', 'jbst_theme_setup' );

if ( ! function_exists( 'jbst_theme_setup' ) ):
/*
Sets up theme defaults and registers support for various WordPress features. Note that this function is hooked into the after_setup_theme hook, which runs before the init hook. The init hook is too late for some features, such as indicating support post thumbnails.@since skematik 1.0
*/
function jbst_theme_setup() {
	
	/* Load custom Skematik functions. */
	require( get_template_directory() . '/functions/template-functions.php' );

	/* Load custom Skematik header functions. */
	require( get_template_directory() . '/functions/skematik-header-functions.php' );
	
	/* Load custom Skematik header functions. */
	require( get_template_directory() . '/functions/skematik-footer-functions.php' );
	
	/* Load custom Skematik Theme widgets. */
	require( get_template_directory() . '/functions/template-widgets.php' );
	
	/* Load custom Skematik Theme Customizer options. */
	require( get_template_directory() . '/functions/template-customizer.php' );

	/* Load custom Skematik Theme functions. */
	require( get_template_directory() . '/functions/template-ecommerce.php' );
	
	/* Load BuddyPress functions after checking if it's active. */
	if ( in_array( 'buddypress/bp-loader.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		require( get_template_directory() . '/functions/template-buddypress.php' );	
	}
	
	require( get_template_directory() . '/functions/template-sidebars.php' );
	
	/* Load basic styles to the editor */
	add_editor_style('style-editor.css');

	/* Make theme available for translation. Translations can be filed in the /languages/ directory */
	load_theme_textdomain( 'skematiktheme', get_template_directory() . '/languages' );

	/* Add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );

	/* Enable support for Post Thumbnails */
	add_theme_support( 'post-thumbnails' );
	
	/* Enable support for Theme Menus */
	add_theme_support( 'menus' );

	/* Identify support for WooCommerce */
	add_theme_support('woocommerce');

}
endif; // skematik_setup


/*
==========================================================
Call stylesheets and scripts from Core
==========================================================
*/
/* Put the call to this theme's css into a function */
function skematik_styles_css() {
	wp_enqueue_style( 'skematik-style', get_stylesheet_uri() );
}

/* Load stylesheets */
add_action( 'wp_enqueue_scripts', 'skematik_bootstrap_css', 99 );
add_action( 'wp_enqueue_scripts', 'skematik_bootstrap_responsive_css', 99  );
add_action( 'wp_enqueue_scripts', 'skematik_styles_css',99 );
add_action( 'wp_enqueue_scripts', 'skematik_prettify_css', 99  );
if (of_get_option('lightbox_switch', 1) == 1) {
	add_action( 'wp_enqueue_scripts', 'skematik_lightbox_css', 99  );
}

/* Load Scripts */
add_action( 'wp_enqueue_scripts', 'skematik_jquery_js' );
add_action( 'wp_enqueue_scripts', 'skematik_bootstrap_js' );
add_action( 'wp_enqueue_scripts', 'skematik_custom_js' );
add_action( 'wp_enqueue_scripts', 'skematik_prettify_js' );
if (of_get_option('lightbox_switch', 1) == 1) {
	add_action( 'wp_enqueue_scripts', 'skematik_lightbox_js' );
}
add_action( 'wp_enqueue_scripts', 'skematik_comments_js' );
add_action( 'wp_enqueue_scripts', 'skematik_keyboard_nav_js' );
add_action( 'wp_enqueue_scripts', 'skematik_js' );

/* Galleries */
// set default link attribute to "file", see: http://sumobi.com/how-to-filter-shortcodes-in-wordpress-3-6/

if (of_get_option('lightbox_switch', 1) == 1) {
function jbst_gallery_atts( $out, $pairs, $atts ) {

        $out['link'] = 'file';
        return $out;

}
add_filter( 'shortcode_atts_gallery', 'jbst_gallery_atts', 10, 3 );
}

/*
==========================================================
Loads Options
==========================================================
*/
require_once dirname( __FILE__ ) . '/options.php';

/*
==========================================================
Loads Theme Metaboxes
==========================================================
*/
require_once( get_template_directory() . '/functions/template-metaboxes.php' );

/*
==========================================================
Loads the custom styles from the Theme Customizer
==========================================================
*/
add_action( 'wp_head', 'skematik_custom_style');
function skematik_custom_style() {
		require_once( get_template_directory() . '/functions/custom-style.php' );
		}

/*
==========================================================
FEATURED IMAGE DRAG & DROP
==========================================================
*/
/* Load the Featured Image */
if ( ! function_exists( 'dgd_removeDefaultBoxes' ) ) {
	if (of_get_option('drag_and_drop_featured_image_switch', 1) == 1) {
		function skematik_drag_and_drop_featured_image() {
			require_once( get_template_directory() . '/library/plugins/dnd_featured_image.php' );
		}
		add_action( 'after_setup_theme', 'skematik_drag_and_drop_featured_image' );
	}
}

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



/*
==========================================================
LESS
==========================================================
*/
require dirname(__FILE__) . '/vendor/wp-less-to-css/wp-less-to-css.php';
remove_action( 'wp_enqueue_scripts', 'skematik_bootstrap_css', 99 );

/* add path to glyphicons */

/*add_filter( 'add_extra_less_code', 'add_glyphicons_path');

function add_glyphicons_path()
{
	return '@icon-font-path: "'.get_template_directory_uri().'/library/assets/fonts/";';
}*/


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
    return array($customless);    
}

add_filter( 'get_theme_mods','get_theme_mods_live');
function get_theme_mods_live()
{
   $return = '';
   if(get_theme_mod('container_width')=='980') $return .= '@media (min-width: 1200px) {
  .container {
    max-width: 970px;
  }
  
}';

   if(get_theme_mod('gridfloatbreakpoint')=='0')
   {
	   $return .= '@grid-float-breakpoint:0; @grid-float-breakpoint-max:0;';
   }
   elseif(get_theme_mod('gridfloatbreakpoint')=='992')
   {
	   $return .= '@grid-float-breakpoint:992px; @grid-float-breakpoint-max:991px;';
   }    
   else
   {
	   $return .= '@grid-float-breakpoint:768px; @grid-float-breakpoint-max:767px;';
   }	  
   return $return; 
}
	
add_action( 'customize_save_after', 'lesscustomize' );

function lesscustomize($setting)
{
$updatecss = WP_LESS_to_CSS::$instance;
$updatecss->wpless2csssavecss($_SESSION['creds']);
}


function kana_init_session()
{
  session_start();
}

add_action('admin_init', 'kana_init_session', 1);

function storecedits( $wp_customize ) {

            $in = true;
            $url = 'customize.php';
            if (false === ($creds = request_filesystem_credentials($url, '', false, false,null) ) ) {
                $in = false;
                exit;
            }
            if ($in && ! WP_Filesystem($creds) ) {
                // our credentials were no good, ask the user for them again
                request_filesystem_credentials($url, '', true, false,null);
                $in = false;
                exit;
            }
            $_SESSION['creds'] = $creds;
            
}
add_action('customize_controls_init', 'storecedits', 1);
