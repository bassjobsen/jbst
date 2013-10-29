<style>
/* BODY */
<?php
/* Set Variables */
$bg_color = get_theme_mod( 'site_background_color');
$bg_image = get_theme_mod( 'site_background_image');
$bg_repeat = get_theme_mod( 'site_background_repeat');
$bg_position = get_theme_mod( 'site_background_position');
$bg_attachment = get_theme_mod( 'site_background_attachment');
$body_size = get_theme_mod( 'body_size');
$body_font = get_theme_mod( 'body_font');
$body_color = get_theme_mod( 'body_color');
$body_line = get_theme_mod( 'body_line_height');
$heading_font = get_theme_mod( 'heading_font');
$heading_color = get_theme_mod( 'heading_color');
$small_color = get_theme_mod( 'small_color');
$link_color = get_theme_mod( 'link_color');
$border_color = get_theme_mod( 'border_color');
$border_accent_color = get_theme_mod( 'accent_color');
$well_color = get_theme_mod( 'well_color');
$form_border_color = get_theme_mod( 'form_border_color');
$heading_color = get_theme_mod( 'heading_color');
$ftr_bg_color = get_theme_mod( 'footer_bg_color');
$ftr_bg_image = get_theme_mod( 'footer_background_image');
$ftr_text_color = get_theme_mod( 'footer_text_color');
$ftr_bottom_border_color = get_theme_mod( 'footer_bottom_border_color');
$ftr_top_border_color = get_theme_mod( 'footer_top_border_color');
$ftr_widget_border_color = get_theme_mod( 'footer_widget_border_color');
$ftr_link_color = get_theme_mod( 'footer_link_color');
$container = get_theme_mod( 'container_width', 1200);

/* Site Background */
echo 'body,html {';
if($bg_color) {echo 'background-color:' .$bg_color.';';}
if($bg_image) {echo 'background-image:url("' .$bg_image.'");';}
if($bg_repeat) {echo 'background-repeat:' .$bg_repeat.';';}
if($bg_position) {echo 'background-position:' .$bg_position.';';}
if($bg_attachment) {echo 'background-attachment:' .$bg_attachment.';';}
echo '}';

/* Main Text Typography */
echo 'body {';
if($body_font){echo 'font-family:"' .$body_font.'",helvetica,arial,sans-serif;';}
if($body_color){echo 'color:' .$body_color.';';}
if($body_size){echo 'font-size:'.$body_size.'px;';}
if($body_line){echo 'line-height:' .$body_line.';';}
echo '}';
if($body_line){echo 'h4, h5, h6 {line-height:' .$body_line.';}';}

/* Headings Typography */
echo 'h1,h2,h3 {';
if($heading_font){echo 'font-family:"' .$heading_font.'",helvetica,arial,sans-serif;';}
if($heading_color){echo 'color:' .$heading_color.';';}
echo'}';

/* Jigo Prices */
if($heading_color){echo 'div.product p.price,.products li strong,.products li .price,.stock {color:' .$heading_color.';}';}

/* Legend */
if($body_color){echo 'legend {color:' .$body_color.';}';}

/* Random Body colors */
if($body_color){echo '.search-label a {color:' .$body_color.';}';}

/* Small Color */
if($small_color){echo 'h1 small, h2 small, h3 small, h4 small, h5 small, h6 small, blockquote small, .entry-meta {color:' .$small_color.';}';}

/* Link Color */
if($link_color){echo 'a, a:hover {color:'.$link_color.';} .nav-tabs > .active > a, .nav-tabs > .active > a:hover,.nav-pills > .active > a, .nav-pills > .active > a:hover {background:'.$link_color.'} a.thumbnail:hover {border-color:'.$link_color.';}';}

/* Border Color */
if($border_color){echo '.page-header,footer,.thumbnail,.default_product_display,ol.commentlist li article,.nav-tabs,.nav-tabs > .active > a, .nav-tabs > .active > a:hover,.nav-tabs li a:hover,.pager a,table.checkout_cart td, table.checkout_cart th,form.wpsc_checkout_forms table.table-4,.table th, .table td,#fancy_notification,table.shop_table,table.shop_table td,.cart-collaterals .cart_totals tr td, .cart-collaterals .cart_totals tr th,#payment div.form-row,.nav-tabs.nav-stacked > li > a,blockquote {border-color:' .$border_color.';}';}

echo '.nav-list .divider {';
if($border_accent_color){echo 'background-color:' .$border_accent_color.';';}
if($border_color){echo 'border-color:' .$border_color.';';}
echo '}';

if($border_accent_color){echo '#payment ul.payment_methods {border-color:' .$border_accent_color.';}';}

echo 'hr {';
if($border_color){echo 'border-top-color:' .$border_color.';';}
if($bg_color){echo 'border-bottom-color:' .$bg_color.';';}
echo '}';

if($form_border_color){echo 'textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input,select {border-color:' .$form_border_color.';}';}

/* Breadcrumb,Well,etc */
if($well_color){echo '.breadcrumb,section#respond,#fancy_notification,.nav-tabs li a:hover,.table-striped tbody tr:nth-child(odd) td, .table-striped tbody tr:nth-child(odd) th,.pager a,.shoppingcart table th,#payment,div.product #tabs ul.tabs {background:' .$well_color.';background-color:' .$well_color.';}';
echo 'div.product #tabs .panel {border-color:' .$well_color.';}';
echo '.progress {background-color:' .$well_color.';background-image:none;}';
}
if($border_color){echo '.pager a:hover {background-color:' .$border_color.';}';}

/* Footer Background */
if(get_theme_mod( 'footer_width', 'full-width' ) == 'cont-width') {
	echo 'html {background:#fff;}';
	if($bg_color) {echo 'html{background-color:' .$bg_color.';}';}
	echo 'footer.site-footer {background:none!important;}';
        //if($ftr_bg_color) echo 'footer.site-footer > .container {background-color:' .$ftr_bg_color.';}';
        //else echo 'footer.site-footer > .container {background-color: #ddd;}';
} else {echo 'html {background:#ddd;}';}


echo 'footer.site-footer '.((get_theme_mod( 'footer_width', 'full-width' ) == 'cont-width')?' .container':'').' {';
if($ftr_bg_color){echo 'background:' .$ftr_bg_color.';';}
if($ftr_text_color){echo 'color:' .$ftr_text_color.';';}
if($ftr_top_border_color){echo 'border-top:1px solid ' .$ftr_top_border_color.';';}
if($ftr_bg_image){echo 'background-image:url("' .$ftr_bg_image.'");';}
echo'}';

/* Footer Borders */
if($ftr_bottom_border_color){echo '.site-info {border-color:' .$ftr_bottom_border_color.';}';}
if($ftr_link_color){echo 'footer.site-footer a, footer.site-footer a:hover {color:' .$ftr_link_color.';}';}
if($ftr_widget_border_color){echo 'footer .widget li, footer .shoppingcart table td, footer .shoppingcart table th,.site-footer .widget .nav-tabs.nav-stacked > li > a {border-color:' .$ftr_widget_border_color.';}.site-footer .widget .nav-tabs.nav-stacked > li > a:hover {background:' .$ftr_widget_border_color.';}';}

if(get_theme_mod( 'footer_width', 'full-width' ) == 'cont-width') {
	//echo 'footer.site-footer {padding:15px 0;}';
	//see: https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/6
        if($border_color){echo 'html, footer.site-footer {background:none;border-top:1px solid ' .$border_color.';}';}
	if($border_color){echo '.site-info {border-color:' .$border_color.';}';}
	if($border_color){echo 'footer .widget li, footer .shoppingcart table td, footer .shoppingcart table th {border-color:' .$border_color.';}';}	
}

if(get_theme_mod( 'footer_widgets_number', 4) == 0) {
	echo 'footer.site-footer .site-info {border-top:0px;padding-top: 0px;margin-bottom:10px;}';
}

/* Post Thumbnails */
if(get_theme_mod( 'featured_image_float', 'none' ) == 'left') {echo '.single-post-thumbnail {float: left;margin-right: 15px;}';}
if(get_theme_mod( 'featured_image_float', 'none' ) == 'right') {echo '.single-post-thumbnail {float: right;margin-left: 15px;}';}

$navbar_color = get_theme_mod( 'navbar_color', 'navbar-default' );
if(($navbar_color == 'navbar-red') || ($navbar_color == 'navbar-orange') || ($navbar_color == 'navbar-teal') || ($navbar_color == 'navbar-blue') || ($navbar_color == 'navbar-green') || ($navbar_color == 'navbar-black')) {
	echo '.navbar .nav li.dropdown > .dropdown-toggle:hover .caret {border-top-color: #000;border-bottom-color: #000;}';
	echo'.navbar .nav li.dropdown.open > .dropdown-toggle .caret, .navbar .nav li.dropdown.active > .dropdown-toggle .caret, .navbar .nav li.dropdown.open.active > .dropdown-toggle .caret,.navbar .nav li.dropdown > .dropdown-toggle .caret,.navbar .nav li.dropdown.active.open > .dropdown-toggle:hover .caret {
	border-top-color: #fff;
	border-bottom-color: #fff;
	}';
}

/* Extra styles for container widths */
if($container == 980) {
	echo '
	@media (min-width: 1200px) {
		.navbar-static-cont-width {width:940px;}
	}';
}

do_action('skematik_add_to_custom_style');

/* Add custom css styles */
echo of_get_option('newcontent');
?>
</style>
