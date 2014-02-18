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
do_action( 'jbst_before_content_'.get_post_format());
?>

	<?php if ( have_posts() ) : ?>
				<?php 
					if ( is_page() || (function_exists('is_bbpress') && is_bbpress() )) { get_template_part( 'content', 'page' );}
					elseif ( wp_attachment_is_image() ) { get_template_part( 'content', 'image' );}
					elseif ( is_single() ) {get_template_part( 'content', 'single' );}
					elseif ( is_search() ) {get_template_part( 'content', 'search' );}
					elseif ( is_archive() ) {get_template_part( 'content', 'archive' );}
					else {get_template_part( 'content', get_post_format() );}
				 ?>
		<?php elseif ( is_404() ) : ?>
                <?php get_template_part( 'content', '404' ); ?>
		<?php else : ?>
		<?php get_template_part( 'content','no-results' ); ?>
		<?php endif; ?>

<?php 
do_action( 'jbst_after_content_'.get_post_format() );
get_footer();
