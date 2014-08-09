<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage JBST
 * @since 2.0.6
 */
get_header(); 
jbst_content_nav_top(); 
do_action( 'jbst_before_content');
?>

	<?php if ( have_posts() ) : ?>
				<?php 
					if ( is_page() || (function_exists('is_bbpress') && is_bbpress() )) 
					{ 
						do_action( 'jbst_before_content_page');
						get_template_part( 'content', 'page' );
						do_action( 'jbst_after_content_page');
					}
					elseif ( wp_attachment_is_image() ) 
					{ 
						do_action( 'jbst_before_content_image');
						get_template_part( 'content', 'image' );
						do_action( 'jbst_after_content_image');
					}
					elseif ( is_single() ) 
					{
						do_action( 'jbst_before_content_single');
						get_template_part( 'content', 'single' );
						do_action( 'jbst_after_content_single');
					}
					elseif ( is_search() ) 
					{
						do_action( 'jbst_before_content_search');
						get_template_part( 'content', 'search' );
						do_action( 'jbst_after_content_search');
					}
					elseif ( is_archive() ) 
					{
						do_action( 'jbst_before_content_archive');
						get_template_part( 'content', 'archive' );
						do_action( 'jbst_after_content_archive');
					}
					else 
					{
						do_action( 'jbst_before_content_' . get_post_format() );
						get_template_part( 'content', get_post_format() );
						do_action( 'jbst_after_content_' . get_post_format() );
					}
				 ?>
		<?php elseif ( is_404() ) : ?>
                <?php 
                do_action( 'jbst_before_content_404');
                get_template_part( 'content', '404' ); 
                do_action( 'jbst_after_content_404');
                ?>
		<?php else : ?>
		<?php 
				do_action( 'jbst_before_content_noresults');
				get_template_part( 'content','no-results' ); ?>
				do_action( 'jbst_after_content_noresults');
		<?php endif; ?>

<?php 
is_single()?jbst_content_nav_bottom_single():((is_home() || is_category() || is_tag() || is_search())?jbst_content_nav_bottom():'');
do_action( 'jbst_after_content' );
get_footer();
