=== WP LESS to CSS ===
Contributors: bassjobsen
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SNYGRL7YNVYQW
Tags: responsive, LESS, css
Requires at least: 3.6
Tested up to: 3.7.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin helps you to build and maintain your website with LESS.


== Description ==

This plugin helps you to build and maintain your website with LESS. LESS is a dynamic stylesheet language.
LESS extends CSS with dynamic behavior such as variables, mixins, operations and functions. 
This plugin is build with: [LESS.php](https://github.com/oyejorge/less.php)

Profits
-------
* No extra checks (server time) to load your lastest CSS
* LESS editor for small changes or child themes

Examples and usages
-------------------

`wpless2css/wpless2css.less` will be your master LESS file. Add your LESS code here or import other LESS files.
All LESS files should be place in `wpless2css/` for now.

`wpless2css/wpless2css.less` could contain simple or more complex LESS code like:
 
	p{color:red;}
	
Or more complex intergrate Twitter's Bootstrap's CSS:

* Download the latest version from: 
* Copy all *.less to  `wpless2css/`
* edit `wpless2css/wpless2css.less`

	@import "bootstrap.less";

Load Glypchicons:

* Copy all `/fonts/` to  your web server 
* edit `wpless2css/wpless2css.less`

	@import "bootstrap.less";
	@icon-font-path: /fonts/;

**Note:*: Go to the settings and save settings after changing you LESS code to create a new CSS file.	
	
If you website or theme is primary Bootstrap based condsider to use [Custom Bootstrap Editor](https://github.com/bassjobsen/custom-bootstrap-editor/).	

Theme developers
----------------
Call `wp-less-to-css.php` from your functions.php to bundle the plugin:

	require dirname(__FILE__) . '/vendor/wp-less-to-css/wp-less-to-css.php';
	
Save the CSS (conditional) automatic by adding to your function.php:

$updatecss = WP_LESS_to_CSS::$instance;
$updatecss->wpless2csssavecss();

Only save the CSS on changes. Compile a new CSS every time your page loads will make your site slow, but you can use it for testing.

Use the save action after changes via the customizer for example:

	add_action( 'customize_save_after', 'lesscustomize' );

	function lesscustomize($setting)
	{
	//$setting is no used here, see also: http://stackoverflow.com/questions/14802251/hook-into-the-wordpress-theme-customizer-save-action
	$updatecss = WP_LESS_to_CSS::$instance;
	add_filter( 'add_extra_less_code', 'add_extra_less_now_live');
	function add_extra_less_now_live($parser)
	{
		return 'a{color:'.get_theme_mod( 'heading_color').'} p{color:orange;}';          
	}
	$updatecss->wpless2csssavecss();
	}	

Depending on your needs `wpless2css/wpless2css.less` can be moved from root to the theme or child theme directory (`wp-content/themes/{yourtheme}/wpless2css/wpless2css.less`).      


Contribute!
-----------
If you have suggestions for a new feature or improvement, feel free to contact us on [Twitter](http://twitter.com/JamedoWebsites). Alternatively, you can fork the plugin from [Github](https://github.com/bassjobsen/custom-bootstrap-editor).

== Installation ==

1. You can download and install WP LESS to CSS using the built in WordPress plugin installer. If you download WP LESS to CSS manually, make sure it is uploaded to "/wp-content/plugins/custom-bootstrap-editor/".

2. Activate WP LESS to CSS in the "Plugins" admin panel using the "Activate" link. 

3. After installing create a new directory in the root of your WordPress installation. The name of this direcory should be `wpless2css`. This directory should contain at least one file named `wpless2css.less`.

4. CSS files are saves in `wp-contents/uploads` make sure the directory is writable.

5. Save settings once, even without any code, to create your CSS.



== Frequently Asked Questions ==


== Screenshots ==

1. WP LESS to CSS

== Changelog ==

= 1.0 =
* First version

== Requirements ==

* [Wordpress](http://wordpress.org/download/) tested with >= 3.6

== Support ==

We are always happy to help you. If you have any question regarding this code. [Send us a message](http://www.jamedowebsites.nl/contact/) or contact us on twitter [@JamedoWebsites](http://twitter.com/JamedoWebsites).
