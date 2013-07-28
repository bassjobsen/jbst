<?php
$return = "";
$attr_info = "";
	// Start WordPress
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
	// Capability check
	if ( !current_user_can( 'author' ) && !current_user_can( 'editor' ) && !current_user_can( 'administrator' ) )
		die( 'Access denied' );

	// Param check
	if ( empty( $_GET['shortcode'] ) )
		die( 'Shortcode not specified' );
	$shortcode = su_shortcodes( $_GET['shortcode'] );
	do_action('skematik_add_shortcode_generator');
	

	// Shortcode has atts
	if ( count( $shortcode['atts'] ) && $shortcode['atts'] ) {
		foreach ( $shortcode['atts'] as $attr_name => $attr_info ) {
			$return .= '<p>';
			$return .= '<label for="su-generator-attr-' . $attr_name . '">' . $attr_info['desc'] . '</label>';

			// Select
			if ( count( $attr_info['values'] ) && $attr_info['values'] ) {
				$return .= '<select name="' . $attr_name . '" id="su-generator-attr-' . $attr_name . '" class="su-generator-attr">';
				foreach ( $attr_info['values'] as $attr_value ) {
					$attr_value_selected = ( $attr_info['default'] == $attr_value ) ? ' selected="selected"' : '';
					$return .= '<option' . $attr_value_selected . '>' . $attr_value . '</option>';
				}
				$return .= '</select>';
			}

			// Text & color input
			else {

				// Color picker
				if ( $attr_info['type'] == 'color' ) {
					$return .= '<span class="su-generator-select-color"><span class="su-generator-select-color-wheel"></span><input type="text" name="' . $attr_name . '" value="' . $attr_info['default'] . '" id="su-generator-attr-' . $attr_name . '" class="su-generator-attr su-generator-select-color-value" /></span>';
				}

				// Text input
				else {
					$return .= '<input type="text" name="' . $attr_name . '" value="' . $attr_info['default'] . '" id="su-generator-attr-' . $attr_name . '" class="su-generator-attr" />';
				}
			}
			$return .= '</p>';
		}
	}

	// Single shortcode (not closed)
	if ( $shortcode['type'] == 'single' ) {
		$return .= '<input type="hidden" name="su-generator-content" id="su-generator-content" value="false" />';
	}

	// Wrapping shortcode
	else {
		$return .= '<p><label>' . __( 'Content', 'shortcodes-ultimate' ) . '</label><input type="text" name="su-generator-content" id="su-generator-content" value="' . $shortcode['content'] . '" /></p>';
	}

	$return .= '<p><a href="#" class="button-primary" id="su-generator-insert">' . __( 'Insert', 'shortcodes-ultimate' ) . '</a> ';
	$return .= '<a href="' . su_plugin_url() . '/images/demo/' . $_GET['shortcode'] . '.png" target="_blank" class="button alignright">' . __( 'Demo', 'shortcodes-ultimate' ) . '</a></p>';

	$return .= '<input type="hidden" name="su-generator-result" id="su-generator-result" value="" />';

	echo $return;
?>