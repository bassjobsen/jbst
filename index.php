<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package skematik
 * @since skematik 1.0
 */
get_header();
do_action( 'jbst_before_content_page' );
?>

		<?php if ( have_posts() ) : ?>
				<?php 
					if ( is_page() || (function_exists('is_bbpress') && is_bbpress() )) { get_template_part( 'content', 'page' );}
					elseif ( is_single() ) {get_template_part( 'content', 'single' );}
					elseif ( is_search() ) {get_template_part( 'content', 'search' );}
					else {get_template_part( 'content', get_post_format() );}
				 ?>
		<?php else : ?>
		<?php get_template_part( 'no-results', 'content' ); ?>
		<?php endif; ?>

<?php 
do_action( 'jbst_after_content_page' );
get_footer();
