<?php
/*
==========================================================
LESS
==========================================================
*/

if ( ! class_exists( 'WP_LESS_to_CSS' ) ) {
require get_template_directory() . '/vendor/wp-less-to-css/wp-less-to-css.php';
}

/* add path for custom fonts  */

add_filter( 'add_extra_less_code', 'add_custom_fonts_path');

if ( ! function_exists( 'add_custom_fonts_path' ) ) :
function add_custom_fonts_path($less)
{
	return $less."\n".'@custom-font-dir: "'.get_stylesheet_directory_uri().'/assets/fonts/";';
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

   if(get_theme_mod('container_width',container_width)=='980') $return .= '@media (min-width: 1200px) {
  .container {
    max-width: 970px;
  }
  
}';

   if(get_theme_mod('gridfloatbreakpoint',gridfloatbreakpoint)=='0')
   {
	   $return .= '@grid-float-breakpoint:0; @grid-float-breakpoint-max:0;';
   }
   elseif(get_theme_mod('gridfloatbreakpoint',gridfloatbreakpoint)=='992')
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
