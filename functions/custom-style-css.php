<?
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
if($footer_bg_color=get_theme_mod( 'footer_bg_color')) {
	echo 'footer#colophon {background-color:'.$footer_bg_color.';}';
	}    
if($footer_text_color=get_theme_mod( 'footer_text_color')) {
	echo 'footer#colophon {color:'.$footer_text_color.';}';
	}    
if($footer_link_color=get_theme_mod( 'footer_link_color')) {
	echo 'footer#colophon {color:'.$footer_link_color.';}';
	} 
