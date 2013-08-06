<?php
/* COMMENTED OUT LINE 25 FOR THEME COMPATABILITY */

// Load libs
require_once 'lib/available.php';

/*
==========================================================
Setup the Shortcodes Engine
==========================================================
*/
	function su_plugin_init() {
			/*
			remove_filter( 'the_content', 'wpautop' );
			remove_filter( 'the_content', 'wptexturize' );
			
			add_filter( 'the_content', 'su_custom_formatter', 99 );
			add_filter( 'widget_text', 'su_custom_formatter', 99 );
			*/

		// Fix for large posts, http://core.trac.wordpress.org/ticket/8553
		//@ini_set( 'pcre.backtrack_limit', 500000 );

		// Register styles
		wp_register_style( 'shortcodes-ultimate', su_plugin_url() . '/css/style.css', false, su_get_version(), 'all' );
		wp_register_style( 'shortcodes-ultimate-generator', su_plugin_url() . '/css/generator.css', false, su_get_version(), 'all' );
		wp_register_style( 'chosen', su_plugin_url() . '/css/chosen.css', false, su_get_version(), 'all' );

		// Register scripts
		wp_register_script( 'shortcodes-ultimate', su_plugin_url() . '/js/init.js', array( 'jquery' ), su_get_version(), false );
		wp_register_script( 'shortcodes-ultimate-generator', su_plugin_url() . '/js/generator.js', array( 'jquery' ), su_get_version(), false );
		wp_register_script( 'chosen', su_plugin_url() . '/js/chosen.js', false, su_get_version(), false );

		// Front-end scripts and styles
		if ( !is_admin() ) {

			if ( !isset( $disabled_styles['style'] ) ) {
				wp_enqueue_style( 'shortcodes-ultimate' );
			}

			if ( !isset( $disabled_scripts['init'] ) ) {
				wp_enqueue_script( 'shortcodes-ultimate' );
			}
		}

		// Scipts and stylesheets for editing pages (shortcode generator popup)
		elseif ( is_admin() ) {

			// Get current page type
			global $pagenow;

			// Pages for including
			$su_generator_includes_pages = array( 'post.php', 'edit.php', 'post-new.php', 'index.php', 'edit-tags.php', 'widgets.php' );

			if ( in_array( $pagenow, $su_generator_includes_pages ) ) {
				// Enqueue styles
				wp_enqueue_style( 'chosen' );
				wp_enqueue_style( 'shortcodes-ultimate-generator' );

				// Enqueue scripts
				wp_enqueue_script( 'chosen' );
				wp_enqueue_script( 'shortcodes-ultimate-generator' );
			}
		}
	}

	add_action( 'init', 'su_plugin_init' );

	/**
	 * Returns current plugin version.
	 * @return string Plugin version
	 */
	function su_get_version() {return '1';}

	/**
	 * Returns current plugin url
	 * @return string Plugin url
	 */
	function su_plugin_url() {
		return get_template_directory_uri() . '/library/shortcodes';
	}

	/**
	 * Shortcode names prefix in compatibility mode
	 * @return string Special prefix
	 */
	function su_compatibility_mode_prefix() {
		$prefix = ( get_option( 'su_compatibility_mode' ) == 'on' ) ? 'gn_' : '';
		return $prefix;
	}

	/*
	 * Custom shortcode function for nested shortcodes support
	 */
	function su_do_shortcode( $content, $modifier ) {
		if ( strpos( $content, '[_' ) !== false ) {
			$content = preg_replace( '@(\[_*)_(' . $modifier . '|/)@', "$1$2", $content );
		}
		return do_shortcode( $content );
	}

	/**
	 * Disable auto-formatting for shortcodes
	 *
	 * @param string $content
	 * @return string Formatted content with clean shortcodes content
	 */
	function su_custom_formatter( $content ) {
		$new_content = '';

		// Matches the contents and the open and closing tags
		$pattern_full = '{(\[raw\].*?\[/raw\])}is';

		// Matches just the contents
		$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

		// Divide content into pieces
		$pieces = preg_split( $pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE );

		// Loop over pieces
		foreach ( $pieces as $piece ) {

			// Look for presence of the shortcode
			if ( preg_match( $pattern_contents, $piece, $matches ) ) {

				// Append to content (no formatting)
				$new_content .= $matches[1];
			} else {

				// Format and append to content
				$new_content .= wptexturize( wpautop( $piece ) );
			}
		}

		return $new_content;
	}

/*
==========================================================
Add generator button to Upload/Insert Buttons
==========================================================
*/
	function su_add_generator_button( $page = null, $target = null ) {
		echo '<a href="#TB_inline?width=640&height=600&inlineId=su-generator-wrap" class="thickbox" title="' . __( 'Insert shortcode', 'shortcodes-ultimate' ) . '" data-page="' . $page . '" data-target="' . $target . '"><img src="' . su_plugin_url() . '/images/admin/media-icon.png" alt="" /></a>';
	}

	add_action( 'media_buttons', 'su_add_generator_button', 100 );

/*
==========================================================
Generator Popup Box
==========================================================
*/
	function su_generator_popup() {
		?>
		<div id="su-generator-wrap" style="display:none">
			<div id="su-generator">
				<div id="su-generator-shell">
					<div id="su-generator-header">
						<select id="su-generator-select" data-placeholder="<?php _e( 'Select shortcode', 'shortcodes-ultimate' ); ?>" data-no-results-text="<?php _e( 'Shortcode not found', 'shortcodes-ultimate' ); ?>">
							<option value="raw"></option>
							<?php
							foreach ( su_shortcodes() as $name => $shortcode ) {

								// Open optgroup
								if ( $shortcode['type'] == 'opengroup' )
									echo '<optgroup label="' . $shortcode['name'] . '">';

								// Close optgroup
								elseif ( $shortcode['type'] == 'closegroup' )
									echo '</optgroup>';

								// Option
								else
									echo '<option value="' . $name . '">' . $shortcode['name'] . /*':&nbsp;&nbsp;' . $shortcode['desc'] .*/ '</option>';
							}
							
							/* custom shortcodes can be registered with the action hook below */
							do_action('skematik_add_shortcode_init');
	
							?>
						</select>
						<div id="su-generator-tools">
							<a href="<?php _e( 'http://skematiktheme.com', 'jamedo-bootstrap-start-theme' ); ?>" target="_blank" title="<?php _e( 'Tutorial', 'shortcodes-ultimate' ); ?>"><?php _e( 'Tutorial', 'shortcodes-ultimate' ); ?></a> /
							<a href="<?php _e( 'http://skematiktheme.com', 'jamedo-bootstrap-start-theme' ); ?>" target="_blank" title="<?php _e( 'Support', 'shortcodes-ultimate' ); ?>"><?php _e( 'Support', 'shortcodes-ultimate' ); ?></a>
						</div>
					</div>
					<div id="su-generator-settings"></div>
					<input type="hidden" name="su-generator-url" id="su-generator-url" value="<?php echo su_plugin_url(); ?>" />
					<input type="hidden" name="su-compatibility-mode-prefix" id="su-compatibility-mode-prefix" value="<?php echo su_compatibility_mode_prefix(); ?>" />
				</div>
			</div>
		</div>
		<?php
	}

	add_action( 'admin_footer', 'su_generator_popup' );