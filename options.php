<?php
/*
==================================================================
THEME OPTIONS PANEL
Defines an array of options that will be used to generate the
settings page and be saved in the database. When creating the
"id" fields, make sure to use all lowercase and no spaces.
==================================================================
*/
/*
==================================================================
Helper function to return the theme option value. If no value has
been saved, it returns $default. Needed because options are saved
as serialized strings.
==================================================================
*/

//Delete theme_mods from Theme Customizer if asked to
if ( isset( $_POST['resetmods'] ) ) {
	remove_theme_mods();
}

//Redirect to welcome screen on activating the theme
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
		header( 'Location: '.admin_url().'themes.php?page=options-framework');
	}

add_action('init', 'optionsframework_rolescheck' );

function skematikframework_rolescheck () {
	if ( current_user_can( 'edit_theme_options' ) ) {
		// If the user can edit theme options, let the fun begin!
		add_action( 'admin_menu', 'skematik_options_add_page');
		add_action( 'admin_init', 'optionsframework_init' );
		add_action( 'admin_init', 'optionsframework_mlu_init' );
		add_action( 'wp_before_admin_bar_render', 'skematikframework_adminbar' );
	}
}

if ( !function_exists( 'skematik_options_add_page' ) ) {

	function skematik_options_add_page() {
		$of_page = add_theme_page(__('Skematik Options', 'options_framework_theme'), __('Skematik Options', 'options_framework_theme'), 'edit_theme_options', 'options-framework','optionsframework_page');
		
		// Load the required CSS and javscript
		add_action('admin_enqueue_scripts', 'optionsframework_load_scripts');
		add_action( 'admin_print_styles-' . $of_page, 'optionsframework_load_styles' );
	}
	
}

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

/*
==================================================================
The theme option name is set as 'options-theme-customizer' here.
In your own project, you should use a different option name.
I'd recommend using the name of your theme.

This option name will be used later when we set up the options
for the front end theme customizer.
==================================================================
*/

function optionsframework_option_name() {

	$optionsframework_settings = get_option('optionsframework');
	
	// Edit 'options-theme-customizer' and set your own theme name instead
	$optionsframework_settings['id'] = 'options_theme_customizer';
	update_option('optionsframework', $optionsframework_settings);
}

function optionsframework_options() {

/*
==================================================================
DEFAULT VALUES AND SETUPS
==================================================================
*/
	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20','24','30' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial','Georgia' => 'Georgia' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => true
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
	if ( function_exists("skematik_options_add_before") )
		$options = skematik_options_add_before();

/*
==================================================================
SETUP
==================================================================
*/
	$options[] = array( "name" => "Setup",
		"type" => "heading" );

	$options[] = array(
		"name" => "Core Features",
		'desc' => __('This theme is equipped with specific core features that we have made optional for you. By default, most are turned on, but you can deactivate any that you choose.', 'options_check'),
		'type' => 'info' );

	    
	$options[] = array(
	    'name' => __('Automatic Page Titles', 'options_check'),
	    'desc' => __('By default, pages will automatically display their titles in a page header div with an <h1> tag wrapper. You can elect to turn this off and manually enter your titles in the page content.', 'options_check'),
	    'id' => 'display_page_title',
	    'std' => '1',
	    'class' => 'switch',
	    'type' => 'checkbox');
	    
	$options[] = array(
	    'name' => __('Automatic Thumbnails', 'options_check'),
	    'desc' => __('By default, if you have not specified a thumbnail, the theme will grab the first image from that post (if one exists) to use as a thumbnail on blog pages.', 'options_check'),
	    'id' => 'automatic_thumbnails',
	    'std' => '0',
	    'class' => 'switch',
	    'type' => 'checkbox');

	$options[] = array(
	    'name' => __('Lightbox Images & Galleries', 'options_check'),
	    'desc' => __('By default, all images that are wrapped in a link to the larger image will be have the Lightbox2 popup script added to them for nicer viewing. This includes navigation of image galleries. You may want to turn this off if you are using a different plugin for this feature.', 'options_check'),
	    'id' => 'lightbox_switch',
	    'std' => '1',
	    'class' => 'switch',
	    'type' => 'checkbox');

	$options[] = array(
	    'name' => __('Drag & Drop Featured Image', 'options_check'),
	    'desc' => __('This turns the featured image area into a drag and drop interface on the edit screen for posts, pages and products.', 'options_check'),
	    'id' => 'drag_and_drop_featured_image_switch',
	    'std' => '1',
	    'class' => 'switch',
	    'type' => 'checkbox');
	    
	$options[] = array(
	    'name' => __('Code Mirror Syntax Highlighting', 'options_check'),
	    'desc' => __('This turns on syntax highlighting on the Custom CSS tab as well as the standard WordPress file editor to make editing much easier.', 'options_check'),
	    'id' => 'code_mirror_switch',
	    'std' => '1',
	    'class' => 'switch',
	    'type' => 'checkbox');

	$options[] = array(
	    'name' => __('Login Redirect to Homepage', 'options_check'),
	    'desc' => __('By default, users are redirected to the homepage of the site after login. You can turn this option off to enable default WordPress login behavior of redirecting to the WordPress dashboard. <em><strong>NOTE: This feature will be turned off if you do not have an account button in your navbar. This is to avoid locking you out of your site.</strong></em>', 'options_check'),
	    'id' => 'login_redirect_switch',
	    'std' => '0',
	    'class' => 'switch',
	    'type' => 'checkbox');

	$options[] = array(
	    'name' => __('Retina Display Support (BETA)', 'options_check'),
	    'desc' => __('By activating this feature, images will be displayed at 2X resolution for devices with a pixel ratio equal to 2 or greater (iPhones & the new Retina Macbook Pro). This feature is considered BETA(experimental) in that currently it works only for thumbnails and featured images on the blog. It is stable however and you shouldn\'t have to worry about activating it.', 'options_check'),
	    'id' => 'retina_display_switch',
	    'std' => '0',
	    'class' => 'switch',
	    'type' => 'checkbox');
	    
	$options[] = array(
	    'name' => __('Press Trends', 'options_check'),
	    'desc' => __('PressTrends is a service that allows our customers to send ANONYMOUS data to a theme analytics service so that we can get an idea of how well the theme is performing. No user info is shared and it will not affect the performance of your site. We hope you appreciate this effort to make the theme better. Of course, you are not required to opt-in and may choose to turn this feature off.', 'options_check'),
	    'id' => 'press_trends',
	    'std' => '1',
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
	global $skematikecommerce;
	if ($skematikecommerce == true) {
	
			$options[] = array( "name" => "Shop",
				"type" => "heading" );
	
			$options[] = array(
			"name" => "eCommerce Options",
			'desc' => __("The ecommerce options only appear if you have activated one of the compatible ecommerce platforms, which are WooCommerce, JigoShop and WP eCommerce. You may only activate one of these platforms at a time, and the theme will automatically detect which platform is installed and update any applicable code for you. This will affect CSS styles, the cart and account dropdown functions, etc.", 'options_check'),
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
	$options[] = array( "name" => "Custom CSS",
		"type" => "heading" );
		
	$options[] = array(
		"name" => "Custom CSS Editor",
		'desc' => __("Use the CSS editor below to add custom styles to your site. Any styles added here won't be affected by upgrading your theme."),
		'type' => 'info' );
		
	$options[] = array(
		'desc' => "",
		'id' => "newcontent",
		'std' => "/* Add custom CSS below */",
		'type' => "textarea"
	);
	    
// Add extra options through function
if ( function_exists("skematik_options_add_after") )
	$options = skematik_options_add_after($options);
	return $options;
}



function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}
	
		editAreaLoader.init({
			id: "custom_css_style"	// id of the text area to transform	
			,start_highlight: true	
			,font_size: "10"
			,font_family: "verdana, monospace"
			,allow_resize: "y"
			,allow_toggle: false
			,language: "en"
			,allow_toggle: true
			,syntax: "css"	
			,toolbar: "char map, |, search, go_to_line, |, undo, redo, |, select_font, |, change_smooth_selection, highlight, reset_highlight"
			,load_callback: "my_load"
			,save_callback: "my_save"
			,plugins: "charmap"
			,charmap_default: "arrows"
				
		});

});
</script>

<?php
}