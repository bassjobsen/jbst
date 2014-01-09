<?php
/**
 * @package JBST
 */

/**
 * Theme options require the "Options Framework" plugin to be installed in order to display.
 * If it's not installed, default settings will be used.
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {

	$optionsframework_settings = get_option('optionsframework');

	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];

	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}

	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}

if ( !function_exists( 'optionsframework_init' ) && current_user_can('edit_theme_options') ) {
	function jbst_options_default() {
		add_theme_page(__('Theme Options','jamedo-bootstrap-start-theme'), __('Theme Options','jamedo-bootstrap-start-theme'), 'edit_theme_options', 'options-framework','optionsframework_page_notice');
	}
	//add_action( 'optionsframework_after_validate', 'jbst_of_doless');
	add_action('admin_menu', 'jbst_options_default');
}
if ( !function_exists( 'jbst_of_doless' ) ) {
  function jbst_of_doless($options)
  {
                var_dump($options); exit;
                $updatecss = WP_LESS_to_CSS::$instance;
                update_option('customlesscode',$options['customlesscode']);
                $updatecss->wpless2csssavecss(unserialize(get_theme_mod('customizercredits')));
  }
}	
/**
 * Displays a notice on the theme options page if the Options Framework plugin is not installed
 */

if ( !function_exists( 'optionsframework_page_notice' ) ) {
	function optionsframework_page_notice() { ?>

		<div class="wrap">
		<?php screen_icon( 'themes' ); ?>
		<h2><?php _e('Theme Options','jamedo-bootstrap-start-theme'); ?></h2>
        <p><b><?php printf( __( 'If you would like to use the Portfolio Press theme options, please install the %s plugin.', 'jamedo-bootstrap-start-theme' ), '<a href="http://wordpress.org/extend/plugins/options-framework/">Options Framework</a>' ); ?></b></p>
        <p><?php _e('Once the plugin is activated you will have option to:','jamedo-bootstrap-start-theme'); ?></p>
        <ul class="ul-disc">
        <li><?php _e('Set default layout for each page type','jamedo-bootstrap-start-theme'); ?></li>
        <li><?php _e('Enable Right-To-Left (RTL)','jamedo-bootstrap-start-theme'); ?></li>
        <li><?php _e('Advanced settings','jamedo-bootstrap-start-theme'); ?></li>
        </ul>

        <p><?php _e('If you don\'t need these options, the plugin is not required and default settings will be used.','jamedo-bootstrap-start-theme'); ?></p>
		</div>
	<?php
	}
}
