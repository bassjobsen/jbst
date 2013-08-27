<?php
/*
==========================================================
THE FUNCTIONS IN THIS FILE ALL TIE INTO THE
'skematik_footer' ACTION HOOK WHICH IS CALLED IN footer.php
FILE. DEVELOPERS CAN REMOVE ANYTHING HERE WITH A SIMPLE
'remove_action' CALL.
==========================================================
*/



/*
==========================================================
Skematik Right Sidebar
==========================================================
*/
// Call the right sidebar function
add_action( 'skematik_footer', 'skematik_right_sidebar', 9 );



/*
==========================================================
Skematik Bottom Content Wrapper
==========================================================
*/
// Close the content wrapper html
add_action( 'skematik_footer', 'skematik_bottom_content_wrapper', 20 );
function skematik_bottom_content_wrapper() {
	echo '
				</div><!-- .row -->
			</div><!-- #main -->
		</div><!-- #page .hfeed .site -->
	</div> <!-- #contentwrap -->';
}



/*
==========================================================
SKEMATIK FOOTER AREA
==========================================================
*/
// Call the footer area function (widget areas)
add_action( 'skematik_footer', 'skematik_footer_area', 30 );

function skematik_footer_area() {?>
	<footer id="colophon" class="site-footer<?php if(get_theme_mod( 'footer_width', 'full-width' ) == 'cont-width') {echo ' container';}?>" role="contentinfo">
		<div class="container">
		<?php skematik_footer_widgets();?>
			<div class="row">
				<div class="site-info <?php echo JBST_GRIDPREFIX;?>12">
					<?php do_action( 'skematik_credits' ); ?>
				</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- .site-footer .site-footer -->
<?php }



/*
==========================================================
FOOTER WIDGETS
==========================================================
*/
function skematik_footer_widgets() {
$ftr_widgets = get_theme_mod( 'footer_widgets_number', 4 );

if($ftr_widgets > 0) 
{
	$span = 12 / $ftr_widgets;	
	
	
	$footer_widgets_array = array(
        __('One','jamedo-bootstrap-start-theme'),
        __('Two','jamedo-bootstrap-start-theme'),
        __('Three','jamedo-bootstrap-start-theme'),
        __('Four','jamedo-bootstrap-start-theme')
    );
	
	echo '<div class="row">';
		
	for ( $i=0; $i < $ftr_widgets; $i++ ) 
	{
		echo '<div class="'. JBST_GRIDPREFIX . $span.'">';
			if ( ! dynamic_sidebar( 'footer-widget-'.($i+1) ) ) :
				echo '<h4>';
				echo __( 'Footer Widget', 'jamedo-bootstrap-start-theme' ).' '.$footer_widgets_array[$i];
				echo '</h4>';
				echo '<p>';
				_e( 'You have activated a Footer Widget! You can deactivate this in the Theme Customizer or put content in it under "Appearance > Widgets".', 'jamedo-bootstrap-start-theme' );
				echo '</p>';
			endif;
		echo '</div>';
	}	
		
	echo '</div>';
}
}



/*
==========================================================
FOOTER CREDITS
==========================================================
*/
function skematik_custom_credits() {
	if(get_theme_mod('footer_credits') <> "") {echo get_theme_mod('footer_credits');}
	else {?>
		<?php printf( __( '&copy;', 'jamedo-bootstrap-start-theme' )); ?> <?php echo date('Y');?> <?php echo bloginfo('name');?><span class="sep"> | </span><a target="_blank" href="<?php esc_attr_e( 'https://github.com/bassjobsen/jamedo-bootstrap-start-theme', 'jamedo-bootstrap-start-theme' ); ?>" title="<?php esc_attr_e( 'Powered by Jamedo\'s Bootstrap Start Theme', 'jamedo-bootstrap-start-theme' ); ?>" rel="generator"><?php printf( __( 'Powered by Jamedo\'s Bootstrap Start Theme', 'jamedo-bootstrap-start-theme' ), 'jamedo-bootstrap-start-theme' ); ?></a>
	<?php }
}

add_action('skematik_credits', 'skematik_custom_credits');



/*
==========================================================
Skematik Body Close
==========================================================
*/
// Create the doc type and initial meta tags
add_action( 'skematik_footer', 'skematik_body_close', 40 );
function skematik_body_close() {
?>
</div><!-- END skematik-site-wrap -->
<?php do_action( 'skematik_after' ); ?>
<?php wp_footer(); ?>
</body>
</html>
<?php
}



/*
==========================================================
Skematik BuddyPress Bottom Content Wrapper
==========================================================
*/
// 
add_action( 'skematik_after_buddypress', 'skematik_buddypress_bottom_content_wrapper', 9 );
function skematik_buddypress_bottom_content_wrapper() {
?>
		</div><!-- #content -->
	</div><!-- #primary .site-content -->
<?php
}
