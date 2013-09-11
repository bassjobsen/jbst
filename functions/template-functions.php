<?php
/*
==========================================================
TEMPLATING ENGINE
==========================================================
*/

/* A function to determine the page layout and sidebar configuration used in the 3 functions following */
function skematik_layout(){
	global $skematik_layout;
	global $skematikecommerce;
	global $post;
	
	/* get the page layout */
	$custom_page_layout= 'default';
	if(is_singular(array( 'page', 'post' ))) {$custom_page_layout = get_post_meta( $post->ID, '_cmb_page_layout', true );}
	if (($custom_page_layout == 'left-sidebar') || ($custom_page_layout == 'right-sidebar') || ($custom_page_layout == 'full-width') || ($custom_page_layout == 'three-column')) {
		$skematik_layout = get_post_meta( $post->ID, '_cmb_page_layout', true );
	} else {
		if (is_page()) {$skematik_layout = of_get_option('default_page_layout', 'right-sidebar');}
		elseif (is_search()) {$skematik_layout = of_get_option('default_search_layout', 'right-sidebar');}
		elseif (is_archive()) {$skematik_layout = of_get_option('default_archive_layout', 'right-sidebar');}
		else {$skematik_layout = of_get_option('default_blog_layout', 'right-sidebar');}
		if ($skematikecommerce == true) {
			if (is_shop()) {$skematik_layout = of_get_option('default_shop_layout', 'right-sidebar');}
			if (is_product()) {$skematik_layout = of_get_option('default_product_layout', 'right-sidebar');}
		}
	}

}

// Define the WooCommerce content wrappers
function jbst_open_content_wrappers() {?>
			<div id="primary" class="site-content <?php do_action('jbstmaingridclass'); ?>">
				<div id="content" role="main">
	<?php
}
	
function jbst_close_content_wrappers() {?>
				</div><!-- #content -->
			</div><!-- #primary .site-content -->
	<?php
}

add_action('jbstmaingridclass','skematik_content_span',1);

// Content Span
function skematik_content_span() {
	skematik_layout();
	global $skematik_layout;
	global $post;
	if ($skematik_layout == 'left-sidebar') {$contentspan = JBST_GRIDPREFIX . '9';}
	elseif ($skematik_layout == 'right-sidebar') {$contentspan = JBST_GRIDPREFIX . '9';}
	elseif ($skematik_layout == 'three-column') {$contentspan = JBST_GRIDPREFIX . '6';}
	elseif ($skematik_layout == 'full-width') {$contentspan = JBST_GRIDPREFIX . '12';}
	else {$contentspan = JBST_GRIDPREFIX . '9';}
	echo $contentspan;
}

//Left Sidebar
function skematik_left_sidebar() {
	skematik_layout();
	global $skematik_layout;
	global $post;
	if(($skematik_layout == 'left-sidebar') || ($skematik_layout == 'three-column')) {
			echo '<div id="left-sidebar" class="widget-area ' .JBST_GRIDPREFIX. '3 sidebar" role="complementary">';
			do_action( 'skematik_before_left_sidebar' );
			
			if ( ! dynamic_sidebar( 'left-content-sidebar' ) ) :
				skematik_sidebar_default_content();
			endif;
			
			echo '</div><!-- #secondary .widget-area -->';
	}
}

//Right Sidebar
function skematik_right_sidebar() {
	global $skematik_layout;
	global $post;
	if(($skematik_layout == 'right-sidebar') || ($skematik_layout == 'three-column')) {
			echo '<div id="right-sidebar" class="widget-area ' .JBST_GRIDPREFIX. '3 sidebar" role="complementary">';
			do_action( 'skematik_before_right_sidebar' );
			
			if ( ! dynamic_sidebar( 'right-content-sidebar' ) ) :
				skematik_sidebar_default_content();
			endif;
			
			echo '</div><!-- #secondary .widget-area -->';
	}
}

//Default Sidebar Content
function skematik_sidebar_default_content() {?>
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
