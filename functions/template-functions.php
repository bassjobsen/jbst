<?php
/*
==========================================================
TEMPLATING ENGINE
==========================================================
*/

/* A function to determine the page layout and sidebar configuration used in the 3 functions following */
function jbst_layout(){
	global $jbst_layout;
	global $jbstecommerce;
	global $post;
	if($jbst_layout)return;

	/* get the page layout */
	$jbst_layout = 'right-sidebar';
	if (
			is_singular(array( 'page', 'post' )) 
	   ) {
		   if(!$jbst_layout = get_post_meta( $post->ID, '_cmb_page_layout', true ))
		   {
			   $jbst_layout = of_get_option('default_page_layout', 'right-sidebar');
	       }	   
		 }
	else {
		if (is_page() || is_home()) {$jbst_layout = of_get_option('default_page_layout', 'right-sidebar');}
		elseif (is_search()) {$jbst_layout = of_get_option('default_search_layout', 'right-sidebar');}
		elseif (is_archive()) {$jbst_layout = of_get_option('default_archive_layout', 'right-sidebar');}
		else {$jbst_layout = of_get_option('default_blog_layout', 'right-sidebar');}
		if ($jbstecommerce == true) {
			if (is_shop()) {$jbst_layout = of_get_option('default_shop_layout', 'right-sidebar');}
			if (is_product()) {$jbst_layout = of_get_option('default_product_layout', 'right-sidebar');}
		}
	}
}
function jbst_posttype_set_classes() {
	if(wp_attachment_is_image()) return 'image-attachment';
	return 'site-content';
}
// Define the WooCommerce content wrappers
function jbst_open_content_wrappers() {?>
			<div id="content" role="main" class="<?php echo apply_filters('jbst_posttype_classes',jbst_posttype_set_classes()) ?> <?php echo apply_filters('jbstmaingridclass',jbst_content_span()) ?>">
				
	<?php
}
	
function jbst_close_content_wrappers() {?>
				
			</div><!-- #primary .site-content -->
	<?php
}


// Content Span
function jbst_content_span() {
	jbst_layout();
	global $jbst_layout;
	global $post;
	if($jbst_layout == 'left-sidebar' || $jbst_layout == 'right-sidebar')
	{
	    $contentcolumnxs = get_theme_mod('content_span_xs',9);
		$contentcolumnsm = get_theme_mod('content_span_sm',9);
		$contentcolumnmd = get_theme_mod('content_span_md',9);
		$contentcolumnlg = get_theme_mod('content_span_lg',9);
		$default_grid = get_theme_mod( 'default_grid',  default_grid);
		if($default_grid=='xs') $grids = array('xs','sm','md','lg');
		elseif($default_grid=='sm') $grids = array('sm','md','lg');
		elseif($default_grid=='md') $grids = array('md','lg');
		elseif($default_grid=='lg') $grids = array('lg');
		$gridclasses = 'col-'.$default_grid.'-'.${'contentcolumn'.$default_grid};
		foreach($grids as $grid)
		{
			if($grid != $default_grid && ${'contentcolumn'.$grid} != ${'contentcolumn'.$default_grid})
			{
				$gridclasses .= ' col-'.$grid.'-'.${'contentcolumn'.$grid};
			}	
	    }
	}
	
	if ($jbst_layout == 'left-sidebar') {$contentspan = $gridclasses;}
	elseif ($jbst_layout == 'right-sidebar') {$contentspan = $gridclasses;}
	elseif ($jbst_layout == 'three-column') {$contentspan = JBST_GRIDPREFIX . '6';}
	elseif ($jbst_layout == 'full-width') {$contentspan = JBST_GRIDPREFIX . '12';}
	else {$contentspan = JBST_GRIDPREFIX . '9';}
	echo $contentspan;
}

//Left Sidebar
function jbst_left_sidebar() {
	jbst_layout();
	global $jbst_layout;
	global $post;
	if(($jbst_layout == 'left-sidebar') || ($jbst_layout == 'three-column')) {
	if($jbst_layout == 'three-column')
	{
		$gridclasses = JBST_GRIDPREFIX.'3';
    }
    else
    {
		$sidebarcolumnxs = get_theme_mod('left_sidebar_xs',3);
		$sidebarcolumnsm = get_theme_mod('left_sidebar_sm',3);
		$sidebarcolumnmd = get_theme_mod('left_sidebar_md',3);
		$sidebarcolumnlg = get_theme_mod('left_sidebar_lg',3);
		$default_grid = get_theme_mod( 'default_grid',  default_grid);
		if($default_grid=='xs') $grids = array('xs','sm','md','lg');
		elseif($default_grid=='sm') $grids = array('sm','md','lg');
		elseif($default_grid=='md') $grids = array('md','lg');
		elseif($default_grid=='lg') $grids = array('lg');
		$gridclasses = 'col-'.$default_grid.'-'.${'sidebarcolumn'.$default_grid};
		foreach($grids as $grid)
		{
			if($grid != $default_grid && ${'sidebarcolumn'.$grid} != ${'sidebarcolumn'.$default_grid})
			{
				$gridclasses .= ' col-'.$grid.'-'.${'sidebarcolumn'.$grid};
			}	
	    }	
	}		
	
	
			echo '<aside id="left-sidebar" class="widget-area ' .$gridclasses. ' sidebar" role="complementary">';
			do_action( 'jbst_before_left_sidebar' );
			
			if ( ! dynamic_sidebar( 'left-content-sidebar' ) ) :
				jbst_sidebar_default_content();
			endif;
			
			echo '</aside><!-- #secondary .widget-area -->';
	}
}

//Right Sidebar
function jbst_right_sidebar() {
	global $jbst_layout;
	global $post;
	if(($jbst_layout == 'right-sidebar') || ($jbst_layout == 'three-column')) {
		
	if($jbst_layout == 'three-column')
	{
		$gridclasses = JBST_GRIDPREFIX.'3';
    }
    else
    {
		$sidebarcolumnxs = get_theme_mod('right_sidebar_xs',3);
		$sidebarcolumnsm = get_theme_mod('right_sidebar_sm',3);
		$sidebarcolumnmd = get_theme_mod('right_sidebar_md',3);
		$sidebarcolumnlg = get_theme_mod('right_sidebar_lg',3);
		$default_grid = get_theme_mod( 'default_grid',  default_grid);
		if($default_grid=='xs') $grids = array('xs','sm','md','lg');
		elseif($default_grid=='sm') $grids = array('sm','md','lg');
		elseif($default_grid=='md') $grids = array('md','lg');
		elseif($default_grid=='lg') $grids = array('lg');
		
		$gridclasses = 'col-'.$default_grid.'-'.${'sidebarcolumn'.$default_grid};

		foreach($grids as $grid)
		{
			if($grid != $default_grid && ${'sidebarcolumn'.$grid} != ${'sidebarcolumn'.$default_grid})
			{
				$gridclasses .= ' col-'.$grid.'-'.${'sidebarcolumn'.$grid};
			}	
	    }	
	}	
		
			echo '<aside id="right-sidebar" class="widget-area ' .$gridclasses. ' sidebar" role="complementary">';
			do_action( 'jbst_before_right_sidebar' );
			
			if ( ! dynamic_sidebar( 'right-content-sidebar' ) ) :
				jbst_sidebar_default_content();
			endif;
			
			echo '</aside><!-- #secondary .widget-area -->';
	}
}

//Default Sidebar Content
function jbst_sidebar_default_content() {?>
				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'jamedo-bootstrap-start-theme' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e( 'Meta', 'jamedo-bootstrap-start-theme' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>
<?php } //End of default sidebar content function
