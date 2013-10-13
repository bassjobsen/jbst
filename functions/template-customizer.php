<?php

/*
==================================================================
THEME CUSTOMIZER
Defines an array of options that will be saved as 'theme_mod'
settings in your options table.
==================================================================
*/

add_action('customize_register', 'skematik_customizer');
function skematik_customizer($wp_customize) {
global $wp_customize;

/* Add a custom class for textarea */
class Example_Customize_Textarea_Control extends WP_Customize_Control {
	public $type = 'textarea';

	public function render_content() {
		?>
		<label>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		</label>
		<?php
	}
}
/* FONT OPTIONS */
global $fontchoices;
/* Websafe Fonts */ $fontchoices = array( 'Helvetica Neue' => 'Helvetica Neue', 'Arial' => 'Arial', 'Lucida Bright' => 'Lucida Bright', 'Georgia' => 'Georgia', 'Times New Roman' => 'Times New Roman', /* Google Fonts */ 'Abel' => 'Abel', 'Amaranth' => 'Amaranth', 'Amatic+SC' => 'Amatic SC', 'Anonymous+Pro' => 'Anonymous Pro', 'Anton' => 'Anton', 'Architects+Daughter' => 'Architects Daughter', 'Arimo' => 'Arimo', 'Arvo' => 'Arvo', 'Asap' => 'Asap', 'Bitter' => 'Bitter', 'Black+Ops+One' => 'Black Ops One', 'Bree+Serif' => 'Bree Serif', 'Cabin' => 'Cabin', 'Cabin+Condensed' => 'Cabin Condensed', 'Calligraffitti' => 'Calligraffitti', 'Cantarell' => 'Cantarell', 'Changa+One' => 'Changa One', 'Cherry+Cream+Soda' => 'Cherry Cream Soda', 'Chewy' => 'Chewy', 'Chivo' => 'Chivo', 'Coming Soon' => 'Coming Soon', 'Copse' => 'Copse', 'Covered+By+Your+Grace' => 'Covered By Your Grace', 'Crafty+Girls' => 'Crafty Girls', 'Crimson+Text' => 'Crimson Text', 'Crushed' => 'Crushed', 'Cuprum' => 'Cuprum', 'Dancing+Script' => 'Dancing Script', 'Dosis' => 'Dosis', 'Droid+Sans' => 'Droid Sans', 'Droid+Sans+Mono' => 'Droid Sans Mono', 'Droid+Serif' => 'Droid Serif', 'Exo' => 'Exo', 'Francois+One' => 'Francois One', 'Fredoka+One' => 'Fredoka One', 'Gloria+Hallelujah' => 'Gloria Hallelujah', 'Goudy+Bookletter+1911' => 'Goudy Bookletter 1911', 'Happy+Monkey' => 'Happy Monkey', 'Homemade+Apple' => 'Homemade Apple', 'Istok+Web' => 'Istok Web', 'Josefin+Sans' => 'Josephin Sans', 'Josefin+Slab' => 'Josefin Slab', 'Judson' => 'Judson', 'Just+Me+Again+Down+Here' => 'Just Me Again Down Here', 'Kreon' => 'Kreon', 'Lora' => 'Lora', 'Lato' => 'Lato', 'Limelight' => 'Limelight', 'Lobster' => 'Lobster', 'Luckiest+Guy' => 'Luckiest Guy', 'Marvel' => 'Marvel', 'Maven+Pro' => 'Maven Pro', 'Merriweather' => 'Merriweather', 'Metamorphous' => 'Metamorphous', 'Molengo' => 'Molengo', 'Muli' => 'Muli', 'News+Cycle' => 'News Cycle', 'Nobile' => 'Nobile', 'Nothing+You+Could+Do' => 'Nothing You Could Do', 'Nunito' => 'Nunito', 'Open+Sans' => 'Open Sans', 'Open+Sans' => 'Open Sans', 'Oswald' => 'Oswald', 'Pacifico' => 'Pacifico', 'Paytone+One' => 'Paytone One', 'Permanent+Marker' => 'Permanent Marker', 'Philosopher' => 'Philosopher', 'Play' => 'Play', 'Pontano+Sans' => 'Pontano Sans', 'PT+Sans' => 'PT Sans', 'PT+Sans+Narrow' => 'PT Sans Narrow', 'PT+Sans+Caption' => 'PT Sans Caption', 'PT+Serif' => 'PT Serif', 'Questrial' => 'Questrial', 'Quicksand' => 'Quicksand', 'Raleway' => 'Raleway', 'Reenie+Beanie' => 'Reenie Beanie', 'Righteous' => 'Righteous', 'Rock+Salt' => 'Rock Salt', 'Rokkitt' => 'Rokkitt', 'Shadows+Into+Light' => 'Shadows Into Light', 'Signika' => 'Signika', 'Source+Sans+Pro' => 'Source Sans Pro', 'Squada+One' => 'Squada One', 'Sunshiney' => 'Sunshiney', 'Syncopate' => 'Syncopate', 'Tangerine' => 'Tangerine', 'The+Girl+Next+Door' => 'The Girl Next Door', 'Ubuntu' => 'Ubuntu', 'Ubuntu+Condensed' => 'Ubuntu Condensed', 'Unkempt' => 'Unkempt', 'Vollkorn' => 'Vollkorn', 'Voltaire' => 'Voltaire', 'Walter+Turncoat' => 'Walter Turncoat', 'Yanone+Kaffeesatz' => 'Yanone Kaffeesatz', );

/* FONT SIZES */
global $fontsizes;
$fontsizes = array(
			'13' => '13px (default)',
			'11' => '11px',
			'12' => '12px',
			'14' => '14px',
			'15' => '15px',
			'16' => '16px',
			);
/* LINE HEIGHTS */
global $lineheights;
$lineheights = array('1.4' => '1.4 (default)','1.5' => '1.5','1.6' => '1.6','1.7' => '1.7','1.8' => '1.8','1.9' => '1.9','2' => '2',);

	do_action('skematik_add_to_customizer');

} //END OF skematik_customizer


/*
==================================================================
NOW WE REGISTER ALL THE CORE THEME CUSTOMIZER OPTIONS AND ADD THEM
USING THE skematik_add_to_customizer ACTION HOOK. WE DO THIS SO
THAT THEY CAN BE EASILY REMOVED BY DEVELOPERS. ALSO, IF YOU WANT
TO REGISTER YOUR OWN, SIMPLY COPY ANY OF THE SECTIONS BELOW INTO
YOUR OWN THEME OR PLUGIN AND EDIT FOR YOUR NEEDS. 
==================================================================
*/

/*
==================================================================
Grid
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_grid_customizer_options');
function skematik_grid_customizer_options($wp_customize) {
	global $wp_customize;

	$wp_customize->add_section( 'grid_settings', array(
		'title'          => 'Default grid',
		'priority'       => 118,
	) );

	/* Navbar Width */
	$wp_customize->add_setting( 'default_grid', array(
	'default'        => 'sm',
	) );
		
	$wp_customize->add_control( 'default_grid', array(
		'label'   => 'Default Grid:',
		'section' => 'grid_settings',
		'type'    => 'radio',
		'priority'        => 10,
		'choices'    => array(
			'lg' => 'Large',
			'md' => 'Medium',
			'sm' => 'Small',
			'xs'   => 'Extra Small (never collapse, so non-responsive)' 
			),
	) );
}
add_action('skematik_add_to_customizer','skematik_customizer_mainnavigation');
function skematik_customizer_mainnavigation($wp_customize) {
global $wp_customize;	
$wp_customize->add_section( 'nav', array(
     'title'          => __( 'Navigation' ),
     'theme_supports' => 'menus',
     'priority'       => 100,
     //'description'    => sprintf( _n('Your theme supports %s menu. Select which menu you would like to use.', 'Your theme supports %s menus. Select which menu appears in each location.', $num_locations ), number_format_i18n( $num_locations ) ) . "\n\n" . __('You can edit your menu content on the Menus screen in the Appearance section.'),
     'description'    => __('Your theme supports menus. Select which menu you would like to use.') . "\n\n" . __('You can edit your menu content on the Menus screen in the Appearance section.')
) );

	
	$wp_customize->add_setting( 'menu_depth', array(
	'default'        => 0,
	) );
		
	$wp_customize->add_control( 'menu_depth', array(
		'label'   => 'Depth, levels of submenus (default 0 = no submenus)',
		'section' => 'nav',
		//'type'    => 'checkbox',
		'priority'        => 40,
	) );
	
	/* indicator clickable ? */
	$wp_customize->add_setting( 'parent_clickable', array(
	'default'        => 0,
	) );
		
	$wp_customize->add_control( 'parent_clickable', array(
		'label'   => 'Should the parent (indicator) of a submenu be clickable?',
		'section' => 'nav',
		'type'    => 'checkbox',
		'priority'        => 50,
	) );
	
	/* open on click? */
	$wp_customize->add_setting( 'open_with_click', array(
	'default'        => 0,
	) );
		
	$wp_customize->add_control( 'open_with_click', array(
		'label'   => 'Open submenus on click (for mobile usage)',
		'section' => 'nav',
		'type'    => 'checkbox',
		'priority'        => 60,
	) );

}
/*
==================================================================
Navbar
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_container_customizer_options');
function skematik_container_customizer_options($wp_customize) {
	global $wp_customize;

	$wp_customize->add_section( 'container_settings', array(
		'title'          => 'Container',
		'priority'       => 119,
	) );

	/* Navbar Width */
	$wp_customize->add_setting( 'container_width', array(
	'default'        => 1200,
	) );
		
	$wp_customize->add_control( 'container_width', array(
		'label'   => 'Max Container Width:',
		'section' => 'container_settings',
		'type'    => 'select',
		'priority'        => 10,
		'choices'    => array(
			1200 => '1200px',
			980 => '980px',
			),
	) );
}

/*
==================================================================
Grid Float Breakpoint
==================================================================
*/
add_action('skematik_add_to_customizer','jbst_gridfloatbreakpoint_customizer_options');
function jbst_gridfloatbreakpoint_customizer_options($wp_customize) {
	global $wp_customize;

	$wp_customize->add_section( 'gridfloatbreakpoint_settings', array(
		'title'          => 'Grid Float Breakpoint',
		'priority'       => 120,
	) );

	/* Navbar Width */
	$wp_customize->add_setting( 'gridfloatbreakpoint', array(
	'default'        => '768',
	) );
		
	$wp_customize->add_control( 'gridfloatbreakpoint', array(
		'label'   => 'Grid Float Breakpoint:',
		'section' => 'gridfloatbreakpoint_settings',
		'type'    => 'radio',
		'priority'        => 10,
		'choices'    => array(
			'768' => '768 px',
			'992' => '992 px',
			'0' => '0 (always horizontal, never collapse)'
			),
	) );
}



/*
==================================================================
Logo
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_logo_customizer_options');
function skematik_logo_customizer_options($wp_customize) {
	global $wp_customize;
	global $fontchoices;
	
	$wp_customize->add_section( 'site_logo_settings', array(
		'title'          => 'Logo',
		'priority'       => 125,
	) );

	/* Logo Image Upload */
	$wp_customize->add_setting( 'logo_image', array(
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_image', array(
		'label'    => __( 'Logo Image', 'jamedo-bootstrap-start-theme'),
		'section'  => 'site_logo_settings',
		'settings' => 'logo_image',
	) ) );
	
	/* Logo Position */
	$wp_customize->add_setting( 'logo_image_position', array(
	'default'        => 'in-nav',
	) );
	
	$wp_customize->add_control( 'logo_image_position', array(
	'label'   => 'Logo Image Position:',
	'section' => 'site_logo_settings',
	'type'    => 'select',
	'priority'        => 20,
	'choices'    => array(
		'in-nav' => 'In Navigation Bar',
		'outside-nav' => 'Outside Navigation Bar',
		),
	) );

	/* Logo font */
	$wp_customize->add_setting( 'logo_font_family', array(
	'default'        => 'Helvetica Neue',
	) );

	$wp_customize->add_control( 'logo_font_family', array(
	'label'   => 'Logo Font Family:',
	'section' => 'site_logo_settings',
	'type'    => 'select',
	'priority'        => 25,
	'choices'    => $fontchoices,
	) );
	
	/* Logo Link  Color */
	$wp_customize->add_setting( 'logo_link_color', array(
		'default'        => '',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logo_link_color', array(
		'label'   => 'Navbar Item  Color (hyperlink text)',
		'section' => 'site_logo_settings',
		'settings'   => 'logo_link_color',
		'priority'        => 26
	) ) );
	
	/* Logo Link hover Color */
	$wp_customize->add_setting( 'logo_linkhover_color', array(
		'default'        => '',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logo_linkhover_color', array(
		'label'   => 'Navbar Item Hover Color (hyperlink text)',
		'section' => 'site_logo_settings',
		'settings'   => 'logo_linkhover_color',
		'priority'        => 27
	) ) );
	
}
/*
==================================================================
Navbar
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_navbar_customizer_options');
function skematik_navbar_customizer_options($wp_customize) {
	global $wp_customize;
	global $fontchoices;
	global $skematikecommerce;

	$wp_customize->add_section( 'navbar_settings', array(
		'title'          => 'Navbar',
		'priority'       => 127,
	) );

	/* Navbar Width */
	$wp_customize->add_setting( 'navbar_style', array(
	''        => 'Default',
	) );
		
	$wp_customize->add_control( 'navbar_style', array(
		'label'   => 'Navbar Style:',
		'section' => 'navbar_settings',
		'type'    => 'select',
		'priority'        => 10,
		'choices'    => array(
			''=> 'Default',
			'navbar-static-top' => 'Static top navbar',
			'navbar-fixed-top' => 'Fixed to top',
			'navbar-fixed-bottom' => 'Fixed to bottom',
			
			
			//'navbar-static-cont-width' => 'Static, Container-Width',
			),
	) );
	
	/* Navbar Background Color */
	$wp_customize->add_setting( 'navbar_background_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navbar_background_color', array(
		'label'   => 'Navbar Background Color',
		'section' => 'navbar_settings',
		'settings'   => 'navbar_background_color',
		'priority'        => 20
	) ) );
	
	/* Navbar Border Color */
	$wp_customize->add_setting( 'navbar_border_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navbar_border_color', array(
		'label'   => 'Navbar Border Color',
		'section' => 'navbar_settings',
		'settings'   => 'navbar_border_color',
		'priority'        => 21
	) ) );
	
	/* Navbar Link Color */
	$wp_customize->add_setting( 'navbar_link_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navbar_link_color', array(
		'label'   => 'Navbar Item Color (hyperlink text)',
		'section' => 'navbar_settings',
		'settings'   => 'navbar_link_color',
		'priority'        => 22
	) ) );
	
	/* Navbar Link hover Color */
	$wp_customize->add_setting( 'navbar_linkhover_color', array(
		'default'        => '',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navbar_linkhover_color', array(
		'label'   => 'Navbar Item Hover Color (hyperlink text)',
		'section' => 'navbar_settings',
		'settings'   => 'navbar_linkhover_color',
		'priority'        => 23
	) ) );
	
	/* Navbar Active item Color */
	$wp_customize->add_setting( 'navbar_activelink_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navbar_activelink_color', array(
		'label'   => 'Navbar Active Item',
		'section' => 'navbar_settings',
		'settings'   => 'navbar_activelink_color',
		'priority'        => 24
	) ) );
	
		/* Navbar Active item Background Color */
	$wp_customize->add_setting( 'navbar_activebackground_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navbar_activebackground_color', array(
		'label'   => 'Navbar Active Background Color',
		'section' => 'navbar_settings',
		'settings'   => 'navbar_activebackground_color',
		'priority'        => 25
	) ) );
	
	
	
	

	/* Navbar Color */
/*	$wp_customize->add_setting( 'navbar_color', array(
	'default'        => 'default',
	) );
		
	$wp_customize->add_control( 'navbar_color', array(
		'label'   => 'Navbar Color:',
		'section' => 'navbar_settings',
		'type'    => 'select',
		'priority'        => 20,
		'choices'    => array(
			'navbar-default' => 'Default(light)',
			'navbar-inverse' => 'Inverse(black)',
			'navbar-black' => 'Black Gradient',
			'navbar-silver' => 'Silver Gradient',
			'navbar-green' => 'Green Gradient',
			'navbar-blue' => 'Blue Gradient',
			'navbar-orange' => 'Orange Gradient',
			'navbar-red' => 'Red Gradient',
			'navbar-teal' => 'Teal Gradient',
			),
	) );*/

	/* Navbar Font Family */
/*	$wp_customize->add_setting( 'navbar_font_family', array(
		'default'        => 'Helvetica Neue',
	) );
	
	$wp_customize->add_control( 'navbar_font_family', array(
		'label'   => 'Navbar Font Family:',
		'section' => 'navbar_settings',
		'type'    => 'select',
		'choices'    => $fontchoices,
		'priority'       => 30,
	) );*/

	/* Navbar Search */
	$wp_customize->add_setting( 'navbar_search', array(
	'default'        => 1,
	) );
		
	$wp_customize->add_control( 'navbar_search', array(
		'label'   => 'Show search in navbar?',
		'section' => 'navbar_settings',
		'type'    => 'checkbox',
		'priority'        => 40,
	) );

	/* Navbar Account */
	$wp_customize->add_setting( 'navbar_account', array(
	'default'        => 1,
	) );
		
	$wp_customize->add_control( 'navbar_account', array(
		'label'   => 'Show account/login in navbar?',
		'section' => 'navbar_settings',
		'type'    => 'checkbox',
		'priority'        => 50,
	) );
		/* Account Nav Button */
	$wp_customize->add_setting( 'nav_account_button_style', array(
		'default'        => 'btn-warning',
	) );	
	
	$wp_customize->add_control( 'nav_account_button_style', array(
		'label'   => 'Account/Login Button Style:',
		'section' => 'navbar_settings',
		'type'    => 'select',
		'priority'        => 60,
		'choices'    => array(
			'btn-default' => 'Grey (default)',
			'btn-primary' => 'Blue (primary)',
			'btn-info' => 'Teal (info)',
			'btn-success' => 'Green (success)',
			'btn-warning' => 'Orange (warning)',
			'btn-danger' => 'Red (danger)',
			'btn-inverse' => 'Black (inverse)',
			),
	) );

	if ($skematikecommerce == true) {
		/* Navbar Cart */
		$wp_customize->add_setting( 'navbar_cart', array(
		'default'        => 1,
		) );
			
		$wp_customize->add_control( 'navbar_cart', array(
			'label'   => 'Show shopping cart in navbar?',
			'section' => 'navbar_settings',
			'type'    => 'checkbox',
			'default'        => 1,
			'priority'        => 70,
		) );
		/* Shop Nav Button */
		$wp_customize->add_setting( 'nav_shop_button_style', array(
			'default'        => 'btn-success',
		) );	
		
		$wp_customize->add_control( 'nav_shop_button_style', array(
			'label'   => 'Shopping Cart Button Style:',
			'section' => 'navbar_settings',
			'type'    => 'select',
			'priority'        => 80,
			'choices'    => array(
				'btn-default' => 'Grey (default)',
				'btn-primary' => 'Blue (primary)',
				'btn-info' => 'Teal (info)',
				'btn-success' => 'Green (success)',
				'btn-warning' => 'Orange (warning)',
				'btn-danger' => 'Red (danger)',
				'btn-inverse' => 'Black (inverse)',
				),
		) );
	}
}// END NAVBAR SETTINGS


/*
==================================================================
BACKGROUND
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_background_customizer_options');
function skematik_background_customizer_options($wp_customize) {
	global $wp_customize;
	$wp_customize->add_section( 'site_background_settings', array(
		'title'          => 'Background',
		'priority'       => 130,
	) );

	/* Background Color */
	$wp_customize->add_setting( 'site_background_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_background_color', array(
		'label'   => 'Background Color',
		'section' => 'site_background_settings',
		'settings'   => 'site_background_color',
	) ) );

	/* Background Image Upload */
	$wp_customize->add_setting( 'site_background_image', array(
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_background_image', array(
		'label'    => __( 'Background Image' , 'jamedo-bootstrap-start-theme'),
		'section'  => 'site_background_settings',
		'settings' => 'site_background_image',
	) ) );

	/* Background Image Repeat */
	$wp_customize->add_setting( 'site_background_repeat', array(
		'default'        => 'repeat',
	) );
	
	$wp_customize->add_control( 'site_background_repeat', array(
		'label'   => 'Background Image Repeat:',
		'section' => 'site_background_settings',
		'type'    => 'select',
		'choices'    => array(
			'repeat' => 'Repeat',
			'repeat-x' => 'Repeat Horizontally',
			'repeat-y' => 'Repeat Vertically',
			'no-repeat' => 'No Repeat',
			),
	) );
	
	/* Background Image Position */
	$wp_customize->add_setting( 'site_background_position', array(
		'default'        => 'top center',
	) );
	
	$wp_customize->add_control( 'site_background_position', array(
		'label'   => 'Background Image Position:',
		'section' => 'site_background_settings',
		'type'    => 'select',
		'choices'    => array(
			'top center' => 'Top Center',
			'top left' => 'Top Left',
			'top right' => 'Top Right',
			'bottom center' => 'Bottom Center',
			'bottom left' => 'Bottom Left',
			'bottom right' => 'Bottom Right',
			),
	) );
	
	/* Background Image Attachment */
	$wp_customize->add_setting( 'site_background_attachment', array(
		'default'        => 'scroll',
	) );
	
	$wp_customize->add_control( 'site_background_attachment', array(
		'label'   => 'Background Image Attachment:',
		'section' => 'site_background_settings',
		'type'    => 'select',
		'choices'    => array(
			'scroll' => 'Scroll (moves with the content)',
			'fixed' => 'Fixed (remains static behind content)',
			),
	) );
}// END BACKGROUND SETTINGS

/*
==================================================================
TYPOGRAPHY
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_typography_customizer_options');
function skematik_typography_customizer_options($wp_customize) {
	global $wp_customize;
	global $fontchoices;
	global $fontsizes;
	global $lineheights;
	$wp_customize->add_section( 'text_settings', array(
		'title'          => 'Typography',
		'priority'       => 135,
		'description'    => __( 'Some basic font choices for your theme.' , 'jamedo-bootstrap-start-theme'),

	) );

	/* Heading Font Family */
	$wp_customize->add_setting( 'heading_font_family', array(
		'default'        => 'Helvetica Neue',
	) );
	
	$wp_customize->add_control( 'heading_font_family', array(
		'label'   => 'Headings Font Family:',
		'section' => 'text_settings',
		'type'    => 'select',
		'choices'    => $fontchoices,
		'priority'       => 10,
	) );
	
	/* Body Font Family */
	$wp_customize->add_setting( 'body_font_family', array(
		'default'        => 'Helvetica Neue',
	) );
	
	$wp_customize->add_control( 'body_font_family', array(
		'label'   => 'Body Font Family:',
		'section' => 'text_settings',
		'type'    => 'select',
		'choices'    => $fontchoices,
		'priority'       => 20,
	) );
	
	/* Main Text Font Size */
	$wp_customize->add_setting( 'body_size', array(
		'default'        => '13',
	) );
	
	$wp_customize->add_control( 'body_size', array(
		'label'   => 'Main Text Font Size:',
		'section' => 'text_settings',
		'type'    => 'select',
		'choices'    => $fontsizes,
		'priority'       => 30,
	) );
	
	/* Main Text Line Height */
	$wp_customize->add_setting( 'body_line_height', array(
		'default'        => '1.4',
	) );
	
	$wp_customize->add_control( 'body_line_height', array(
		'label'   => 'Main Text Line Height:',
		'section' => 'text_settings',
		'type'    => 'select',
		'choices'    => $lineheights,
		'priority'       => 40,
	) );
}// END TYPOGRAPHY SETTINGS

/*
==================================================================
SITE COLORS
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_colors_customizer_options');
function skematik_colors_customizer_options($wp_customize) {
	global $wp_customize;
	$wp_customize->add_section( 'color_settings', array(
		'title'          => 'Color Scheme',
		'priority'       => 140,
		'description'    => __( 'Your theme supports a static front page.', 'jamedo-bootstrap-start-theme' ),
	) );
	
	/* Headings Color */
	$wp_customize->add_setting( 'heading_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_color', array(
		'label'   => 'Headings Color',
		'section' => 'color_settings',
		'settings'   => 'heading_color',
		'priority'       => 10,
	) ) );
	
	/* Main Text Color */
	$wp_customize->add_setting( 'body_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_color', array(
		'label'   => 'Main Text Color',
		'section' => 'color_settings',
		'settings'   => 'body_color',
		'priority'       => 20,
	) ) );

	/* Small/Meta Text Color */
	$wp_customize->add_setting( 'small_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'small_color', array(
		'label'   => 'Small/Meta Text Color',
		'section' => 'color_settings',
		'settings'   => 'small_color',
		'priority'       => 30,
	) ) );
	
	/* Link Color */
	$wp_customize->add_setting( 'link_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'   => 'Link Color',
		'section' => 'color_settings',
		'settings'   => 'link_color',
		'priority'       => 40,
	) ) );
	
	/* Border Color */
	$wp_customize->add_setting( 'border_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'border_color', array(
		'label'   => 'Border Color',
		'section' => 'color_settings',
		'settings'   => 'border_color',
		'priority'       => 50,
	) ) );
	
	/* Border Accent Color */
	$wp_customize->add_setting( 'border_accent_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'border_accent_color', array(
		'label'   => 'Border Accent Color',
		'section' => 'color_settings',
		'settings'   => 'border_accent_color',
		'priority'       => 60,
	) ) );
	
	/* Well Color */
	$wp_customize->add_setting( 'well_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'well_color', array(
		'label'   => 'Breadcrumb/Well Color',
		'section' => 'color_settings',
		'settings'   => 'well_color',
		'priority'       => 70,
	) ) );
}// END COLOR SETTINGS

/*
==================================================================
BUTTONS
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_buttons_customizer_options');
function skematik_buttons_customizer_options($wp_customize) {
	global $wp_customize;
	$wp_customize->add_section( 'button_settings', array(
		'title'          => 'Buttons',
		'priority'       => 140,
		'description'    => __( 'Customize the look of your buttons.' , 'jamedo-bootstrap-start-theme'),
	) );	
	
	/* Default Button */
	$wp_customize->add_setting( 'default_button_style', array(
		'default'        => 'btn-primary',
	) );
	
	$wp_customize->add_control( 'default_button_style', array(
		'label'   => 'Default Button Style:',
		'section' => 'button_settings',
		'type'    => 'select',
		'choices'    => array(
			'btn-default' => 'Grey (default)',
			'btn-primary' => 'Blue (primary)',
			'btn-info' => 'Teal (info)',
			'btn-success' => 'Green (success)',
			'btn-warning' => 'Orange (warning)',
			'btn-danger' => 'Red (danger)',
			'btn-inverse' => 'Black (inverse)',
			),
	) );
}// END BUTTON SETTINGS

/*
==================================================================
BLOG SETTINGS
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_blog_customizer_options');
function skematik_blog_customizer_options($wp_customize) {
	global $wp_customize;
	$wp_customize->add_section( 'blog_settings', array(
		'title'          => 'Blog Settings',
		'priority'       => 145,
		'description'    => __( 'Customize the look of your buttons.' , 'jamedo-bootstrap-start-theme'),

	) );

	/* Blog Navigation Buttons */
	$wp_customize->add_setting( 'blog_navigation_buttons', array(
		'default'        => 'bottom',
	) );	
	
	$wp_customize->add_control( 'blog_navigation_buttons', array(
		'label'   => 'Blog Navigation Buttons:',
		'section' => 'blog_settings',
		'type'    => 'select',
		'choices'    => array(
			'none' => 'None',
			'top' => 'Show on top',
			'bottom' => 'Show on bottom',
			'both' => 'Show on both top and bottom',
			),
	) );

	/* Post Navigation Buttons */
	$wp_customize->add_setting( 'post_navigation_buttons', array(
		'default'        => 'bottom',
	) );	
	
	$wp_customize->add_control( 'post_navigation_buttons', array(
		'label'   => 'Single Post Navigation Buttons:',
		'section' => 'blog_settings',
		'type'    => 'select',
		'choices'    => array(
			'none' => 'None',
			'top' => 'Show on top',
			'bottom' => 'Show on bottom',
			'both' => 'Show on both top and bottom',
			),
	) );

	/* Post Thumbnail Width */
	$wp_customize->add_setting( 'post_thumbnail_width', array(
		'default'        => 200,
	) );

	$wp_customize->add_control( 'post_thumbnail_width', array(
		'label'   => 'Post Thumbnail Width:',
		'section' => 'blog_settings',
		'type'    => 'text',
	) );

	/* Post Thumbnail Height */
	$wp_customize->add_setting( 'post_thumbnail_height', array(
		'default'        => 200,
	) );

	$wp_customize->add_control( 'post_thumbnail_height', array(
		'label'   => 'Post Thumbnail Height:',
		'section' => 'blog_settings',
		'type'    => 'text',
	) );

	/* Featured Image Width */
	$wp_customize->add_setting( 'featured_image_width', array(
		'default'        => 900,
	) );

	$wp_customize->add_control( 'featured_image_width', array(
		'label'   => 'Featured Image Width:',
		'section' => 'blog_settings',
		'type'    => 'text',
	) );

	/* Featured Image Height */
	$wp_customize->add_setting( 'featured_image_height', array(
		'default'        => 350,
	) );

	$wp_customize->add_control( 'featured_image_height', array(
		'label'   => 'Featured Image Height:',
		'section' => 'blog_settings',
		'type'    => 'text',
	) );

	/* Featured Image Float */
	$wp_customize->add_setting( 'featured_image_float', array(
		'default'        => 'none',
	) );	
	
	$wp_customize->add_control( 'featured_image_float', array(
		'label'   => 'Featured Image Float:',
		'section' => 'blog_settings',
		'type'    => 'select',
		'choices'    => array(
			'none' => 'none',
			'left' => 'left',
			'right' => 'right',
			),
	) );
}// END BLOG SETTINGS

/*
==================================================================
DISCUSSION SETTINGS
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_discussion_customizer_options');
function skematik_discussion_customizer_options($wp_customize) {
	global $wp_customize;
	$wp_customize->add_section( 'discussion_settings', array(
		'title'          => 'Discussion Settings',
		'priority'       => 155,
		'description'    => __( 'Customize the look of your buttons.' , 'jamedo-bootstrap-start-theme'),

	) );
	
	/* Page Comments */
	$wp_customize->add_setting( 'page_comments', array(
	'default'        => 1,
	) );
		
	$wp_customize->add_control( 'page_comments', array(
		'label'   => 'Globally remove comments from pages?',
		'section' => 'discussion_settings',
		'type'    => 'checkbox',
		'priority'        => 40,
	) );
	
}// END BLOG SETTINGS

/*
==================================================================
FOOTER
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_footer_customizer_options');
function skematik_footer_customizer_options($wp_customize) {
	global $wp_customize;
	/* Add footer section and color styles to customizer */
	$wp_customize->add_section( 'footer_settings', array(
		'title'          => 'Footer',
		'priority'       => 165,
	) );
	
	/* Footer Width */
	$wp_customize->add_setting( 'footer_width', array(
	'default'        => 'full-width',
	) );

	$wp_customize->add_control( 'footer_width', array(
		'label'   => 'Footer Width:',
		'section' => 'footer_settings',
		'type'    => 'select',
		'priority'        => 5,
		'choices'    => array(
			'full-width' => 'Full Width',
			'cont-width' => 'Container Width',
			),
	) );
	
	/* Footer Widgets */
	$wp_customize->add_setting( 'footer_widgets_number', array(
		'default'        => 4,
	) );	
	
	$wp_customize->add_control( 'footer_widgets_number', array(
		'label'   => 'Number of Footer Widgets:',
		'section' => 'footer_settings',
		'type'    => 'select',
		'choices'    => array(
			0 => '0',
			1 => '1',
			2 => '2',
			3 => '3',
			4 => '4',
			),
	'priority'       => 6,
	) );

	/* Background Image Upload */
	$wp_customize->add_setting( 'footer_background_image', array(
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_background_image', array(
		'label'    => __( 'Footer Background Image (full width only)' , 'jamedo-bootstrap-start-theme'),
		'section'  => 'footer_settings',
		'settings' => 'footer_background_image',
		'priority'       => 10,
	) ) );

	/* Footer Background Color */
	$wp_customize->add_setting( 'footer_bg_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
		'label'   => 'Footer Background Color (full width only)',
		'section' => 'footer_settings',
		'settings'   => 'footer_bg_color',
		'priority'       => 15,
	) ) );
	
	/* Footer Text Color */
	$wp_customize->add_setting( 'footer_text_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
		'label'   => 'Footer Text Color',
		'section' => 'footer_settings',
		'settings'   => 'footer_text_color',
		'priority'       => 20,
	) ) );
	
	/* Footer Link Color */
	$wp_customize->add_setting( 'footer_link_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color', array(
		'label'   => 'Footer Link Color',
		'section' => 'footer_settings',
		'settings'   => 'footer_link_color',
		'priority'       => 25,
	) ) );

	/* Footer Top Border Color */
	$wp_customize->add_setting( 'footer_top_border_color', array(
		'default'        => '',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_top_border_color', array(
		'label'   => 'Footer Top Border Color (full width only)',
		'section' => 'footer_settings',
		'settings'   => 'footer_top_border_color',
		'priority'       => 30,
	) ) );
	
	/* Footer Widget Border Color */
	$wp_customize->add_setting( 'footer_widget_border_color', array(
		'default'        => '',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_border_color', array(
		'label'   => 'Footer Widget Border Color',
		'section' => 'footer_settings',
		'settings'   => 'footer_widget_border_color',
		'priority'       => 35,
	) ) );
	
	/* Footer Bottom Border Color */
	$wp_customize->add_setting( 'footer_bottom_border_color', array(
		'default'        => '',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bottom_border_color', array(
		'label'   => 'Footer Bottom Border Color (full width only)',
		'section' => 'footer_settings',
		'settings'   => 'footer_bottom_border_color',
		'priority'       => 40,
	) ) );
	
	$wp_customize->add_setting( 'footer_credits', array(
		'default'        => '',
	) );
	
	$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'footer_credits', array(
		'label'   => 'Footer Credits',
		'section' => 'footer_settings',
		'settings'   => 'footer_credits',
		'priority'       => 45,
	) ) );
}// END FOOTER SETTINGS

/*
==================================================================
WP E-COMMERCE
==================================================================
*/
if ( in_array( 'wp-e-commerce/wp-shopping-cart.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
{			
add_action('skematik_add_to_customizer','skematik_wpec_customizer_options');
function skematik_wpec_customizer_options($wp_customize) {
	global $wp_customize;
	global $skematikecommerce;
	/* Add footer section and color styles to customizer */
	$wp_customize->add_section( 'wpec_settings', array(
		'title'          => 'WP e-Commerce',
		'priority'       => 175,
	) );

	/* Shop Layout */
	$wp_customize->add_setting( 'wpec_layout', array(
	'default'        => 'list-view',
	) );

	$wp_customize->add_control( 'wpec_layout', array(
		'label'   => 'Default shop layout:',
		'section' => 'wpec_settings',
		'type'    => 'select',
		'priority'        => 5,
		'choices'    => array(
			'list-view' => 'List view',
			'grid-view' => 'Grid view',
			),
	) );

	/* Gridview Columns */
	$wp_customize->add_setting( 'wpec_columns', array(
	'default'        => 4,
	) );

	$wp_customize->add_control( 'wpec_columns', array(
		'label'   => 'Gridview columns:',
		'section' => 'wpec_settings',
		'type'    => 'select',
		'priority'        => 5,
		'choices'    => array(
			'two-column' => 2,
			'three-column' => 3,
			'four-column' => 4,
			'five-column' => 5,
			),
	) );
}// END WP e-Commerce SETTINGS	
}
/*
==================================================================
DEMO
==================================================================
*/
add_action('skematik_add_to_customizer','skematik_demo_customizer_options');
function skematik_demo_customizer_options($wp_customize) {
	global $wp_customize;
	global $fontchoices;
	global $skematikecommerce;
}// END DEMO SETTINGS
