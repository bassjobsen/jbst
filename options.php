<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/assets/img/';


	// Add extra options through function(used by core)
	if ( function_exists("jbst_options_add_before") )
	$options = jbst_options_add_before();
	else $options = array();

/*
==================================================================
SETUP
==================================================================
*/
	$options[] = array( "name" => "Setup",
		"type" => "heading" );

	$options[] = array(
		"name" => "Core Features",
		'desc' => __('This theme is equipped with specific core features that we have made optional for you. By default, most are turned on, but you can deactivate any that you choose.', 'jamedo-bootstrap-start-theme'),
		'type' => 'info' );

	    
	$options[] = array(
	    'name' => __('Automatic Page Titles', 'jamedo-bootstrap-start-theme'),
	    'desc' => __('By default, pages will automatically display their titles in a page header div with an <h1> tag wrapper. You can elect to turn this off and manually enter your titles in the page content.', 'jamedo-bootstrap-start-theme'),
	    'id' => 'display_page_title',
	    'std' => '1',
	    'class' => 'switch',
	    'type' => 'checkbox');
	    
	$options[] = array(
	    'name' => __('Automatic Thumbnails', 'jamedo-bootstrap-start-theme'),
	    'desc' => __('By default, if you have not specified a thumbnail, the theme will grab the first image from that post (if one exists) to use as a thumbnail on blog pages.', 'jamedo-bootstrap-start-theme'),
	    'id' => 'automatic_thumbnails',
	    'std' => '0',
	    'class' => 'switch',
	    'type' => 'checkbox');


	$options[] = array(
	    'name' => __('Login Redirect to Homepage', 'jamedo-bootstrap-start-theme'),
	    'desc' => __('By default, users are redirected to the homepage of the site after login. You can turn this option off to enable default WordPress login behavior of redirecting to the WordPress dashboard. <em><strong>NOTE: This feature will be turned off if you do not have an account button in your navbar. This is to avoid locking you out of your site.</strong></em>', 'jamedo-bootstrap-start-theme'),
	    'id' => 'login_redirect_switch',
	    'std' => '0',
	    'class' => 'switch',
	    'type' => 'checkbox');


/*
==================================================================
LAYOUT
==================================================================
*/
	$options[] = array( "name" => "Layout",
		"type" => "heading" );

	$options[] = array(
		"name" => "How to use the site layout options...",
		'desc' => __('The layout of your site is controlled by a combination of the options set on both this page and on individual post and page edit screens. You can specify unique layouts for the different blog areas of your site using the options on this page. The options, represented by images, are for right sidebar, full-width, left sidebar, and 3 column. Individual page layouts can be selected on the page edit screen below the editor. The site layout engine will then layout the page by first checking to see if the post or page has a unique layout chosen for it. If not, it will then check for the options below depending on the type of page that is being viewed. If no options are chosen for the site sections, the site layout engine will then use the default blog layout and default page layout. The sidebars can be configured under "Appearance > Widgets".'),
		'type' => 'info' );

/* Recommend Custom Sidebars if not already there */
if ( !in_array( 'custom-sidebars/customsidebars.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {	
	$options[] = array(
		"name" => "Custom Sidebars Plugin",
		'desc' => __('For the ultimate in flexibility, we recommend that you install and activate the <a target="_blank" href="http://wordpress.org/extend/plugins/custom-sidebars/">Custom Sidebars</a> plugin. This plugin will allow you to create new widget areas and assign them to any sidebar/widget location based on the criteria you set. For example, you may create widgets that only show up on a specific page or post, or create a widget for a specific blog category or just for your product pages. This message will disappear when the Custom Sidebars plugin is activated.'),
		'type' => 'info' );
}
		
	$options[] = array(
		'name' => "Default Blog Layout",
		'desc' => "The default blog layout will be used if no other option has been selected for each section of your site. This is also the layout for your main blog page. ",
		'id' => "default_blog_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => array(
			'right-sidebar' => $imagepath . '2cl.png',
			'full-width' => $imagepath . '1c.png',
			'left-sidebar' => $imagepath . '2cr.png',
			'three-column' => $imagepath . '3cm.png')
	);
	
	$options[] = array(
		'name' => "Default Page Layout",
		'desc' => "The default page layout will be used if no other option has been selected on the individual page's edit screen. ",
		'id' => "default_page_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => array(
			'right-sidebar' => $imagepath . '2cl.png',
			'full-width' => $imagepath . '1c.png',
			'left-sidebar' => $imagepath . '2cr.png',
			'three-column' => $imagepath . '3cm.png')
	);
	
	$options[] = array(
		'name' => "Archive Layout",
		'desc' => "Choose a layout for your archive pages. If none is selected, the default layout you specified at the top of this page will be used.",
		'id' => "default_archive_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => array(
			'right-sidebar' => $imagepath . '2cl.png',
			'full-width' => $imagepath . '1c.png',
			'left-sidebar' => $imagepath . '2cr.png',
			'three-column' => $imagepath . '3cm.png',)
	);
	
	$options[] = array(
		'name' => "Category Layout",
		'desc' => "Choose a layout for your category pages. If none is selected, the default layout you specified at the top of this page will be used.",
		'id' => "default_category_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => array(
			'right-sidebar' => $imagepath . '2cl.png',
			'full-width' => $imagepath . '1c.png',
			'left-sidebar' => $imagepath . '2cr.png',
			'three-column' => $imagepath . '3cm.png')
	);
	
	$options[] = array(
		'name' => "Search Layout",
		'desc' => "Choose a layout for your search return pages. If none is selected, the default layout you specified at the top of this page will be used.",
		'id' => "default_search_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => array(
			'right-sidebar' => $imagepath . '2cl.png',
			'full-width' => $imagepath . '1c.png',
			'left-sidebar' => $imagepath . '2cr.png',
			'three-column' => $imagepath . '3cm.png')
	);

	$options[] = array(
		'name' => "404 / Not Found Layout",
		'desc' => "Choose a layout for your 404/Not Found pages. If none is selected, the default layout you specified at the top of this page will be used.",
		'id' => "default_404_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => array(
			'right-sidebar' => $imagepath . '2cl.png',
			'full-width' => $imagepath . '1c.png',
			'left-sidebar' => $imagepath . '2cr.png',
			'three-column' => $imagepath . '3cm.png')
	);
	    
/*
==================================================================
SHOP
==================================================================
*/
	global $jbstecommerce;
	if ($jbstecommerce == true) {
	
			$options[] = array( "name" => "Shop",
				"type" => "heading" );
	
			$options[] = array(
			"name" => "eCommerce Options",
			'desc' => __("The ecommerce options only appear if you have activated one of the compatible ecommerce platforms, which are WooCommerce, JigoShop and WP eCommerce. You may only activate one of these platforms at a time, and the theme will automatically detect which platform is installed and update any applicable code for you. This will affect CSS styles, the cart and account dropdown functions, etc.", 'jamedo-bootstrap-start-theme'),
			'type' => 'info' );	
			
			$options[] = array(
				'name' => "Shop Layout",
				'desc' => "Choose a layout for your shop page. If none is selected, the default layout you specified at the top of this page will be used.",
				'id' => "default_shop_layout",
				'std' => "right-sidebar",
				'type' => "images",
				'options' => array(
					'right-sidebar' => $imagepath . '2cl.png',
					'full-width' => $imagepath . '1c.png',
					'left-sidebar' => $imagepath . '2cr.png',
					'three-column' => $imagepath . '3cm.png')
			);
		
			$options[] = array(
				'name' => "Product Layout",
				'desc' => "Choose a layout for your single products. If none is selected, the default layout you specified at the top of this page will be used.",
				'id' => "default_product_layout",
				'std' => "right-sidebar",
				'type' => "images",
				'options' => array(
					'right-sidebar' => $imagepath . '2cl.png',
					'full-width' => $imagepath . '1c.png',
					'left-sidebar' => $imagepath . '2cr.png',
					'three-column' => $imagepath . '3cm.png')
			);
			
	} //END OF CHECK FOR ECOMMERCE
	
/*
==================================================================
CUSTOM CSS
==================================================================
*/
	/*$options[] = array( "name" => "Custom LESS",
		"type" => "heading" );
		
	$options[] = array(
		"name" => "Custom LESS Editor",
		'desc' => __("Use the LESS editor below to add custom styles to your site. Any styles added here won't be affected by upgrading your theme."),
		'type' => 'info' );
		
	$options[] = array(
		'desc' => "",
		'id' => "customlesscode",
		'std' => " Add custom LESS below ",
		'type' => "textarea"
	);*/

	return $options;
}
