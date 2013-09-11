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
?>

	<div id="primary" class="site-content <?php do_action('jbstmaingridclass'); ?>">
		<div id="content" role="main">
		<?php if ( have_posts() ) : ?>
				<?php get_template_part( 'content', 'archive' );?>
		<?php else : ?>
		<?php get_template_part( 'no-results', 'content' ); ?>
		<?php endif; ?>
		</div><!-- #content -->
	</div><!-- #primary .site-content -->
<?php get_footer(); ?>
