<?php
/*
 * navbar postion
*/

	if(get_theme_mod( 'navbar_style', navbar_style) == 'default') { //default
	echo '
	body { padding-top: 30px; }
        .navbar { margin-bottom: 30px; margin-left: -15px;
    margin-right: -15px;}
	';
	}
	elseif(get_theme_mod( 'navbar_style', navbar_style) == 'navbar-static-top') {
	echo '
	.navbar-static-top {  margin-bottom: 19px; }
	';
	}
	elseif(get_theme_mod( 'navbar_style', navbar_style) == 'navbar-fixed-top') {
	echo '
	body {  padding-top: 70px; }
	';
	}
	elseif(get_theme_mod( 'navbar_style', navbar_style) == 'navbar-fixed-bottom') {
	echo '
	body {  padding-padding-bottom: 70px; }
	';
	}
/*
 * navbar colors
*/

	$navbar_background_color = get_theme_mod( 'navbar_background_color');
	if(!empty($navbar_background_color))
	{
		echo '.navbar {background-color: '.$navbar_background_color.';}';
	}	
    
    $navbar_border_color = get_theme_mod( 'navbar_border_color');
	if(!empty($navbar_border_color))
	{
		echo '.navbar {border-color: '.$navbar_border_color.';}';
    }
    
    $navbar_link_color = get_theme_mod( 'navbar_link_color');
	if(!empty($navbar_link_color))
	{
		echo '.navbar .navbar-nav > li > a {
    color: '.$navbar_link_color.';
}';
    }
    
    $navbar_linkhover_color = get_theme_mod( 'navbar_linkhover_color');
	if(!empty($navbar_linkhover_color))
	{
		echo '.navbar .navbar-nav > li > a:hover {
    color: '.$navbar_linkhover_color.';
}';
    }	
    
    $navbar_activelink_color = get_theme_mod( 'navbar_activelink_color');
	if(!empty($navbar_activelink_color))
	{
		echo '.navbar .navbar-nav > .active > a, .nav .navbar-nav > .active > a:hover {
    color: '.$navbar_activelink_color.';
}';
    }	
    
    $navbar_activebackground_color = get_theme_mod( 'navbar_activebackground_color');
	if(!empty($navbar_activebackground_color))
	{
		echo '.navbar .navbar-nav > .active > a, .nav .navbar-nav > .active > a:hover {
    background-color: '.$navbar_activebackground_color.';
}';
    }
    
/* Link Color */

if($link_color=get_theme_mod( 'link-color')) {
	echo 'a, a:hover {color:'.$link_color.';}'; 
	echo '.nav-tabs > .active > a, .nav-tabs > .active > a:hover,.nav-pills > .active > a, .nav-pills > .active > a:hover {background:'.$link_color.'}';
    echo 'a.thumbnail:hover {border-color:'.$link_color.';}';
    }

/* Footer Background */
if($footer_bg_color=get_theme_mod( 'footer_bg_color')) {
if(get_theme_mod( 'footer_width', footer_width ) == 'cont-width'){echo 'footer#colophon {background:transparent;}';}	
echo 'footer#colophon '.((get_theme_mod( 'footer_width', footer_width ) == 'cont-width')?' .container':',footer#colophon .container').' {';

if($ftr_top_border_color=get_theme_mod( 'ftr_top_border_color')){echo 'border-top:1px solid ' .$ftr_top_border_color.';';}
echo 'background-color:'.$footer_bg_color.';';
if($ftr_bg_image=get_theme_mod( 'ftr_bg_image')){echo 'background-image:url("' .$ftr_bg_image.'");';}
echo'}';    
}     
   
if($footer_text_color=get_theme_mod( 'footer_text_color')) {
	echo 'footer#colophon {color:'.$footer_text_color.';}';
	}    
if($footer_link_color=get_theme_mod( 'footer_link_color')) {
	echo 'footer#colophon a {color:'.$footer_link_color.';}';
	} 
