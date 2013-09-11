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



			<?php do_action( 'skematik_before_content_page' );?>

			<?php while ( have_posts() ) : the_post(); /* Start the Loop */?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="page-header">
    					<h1 class="entry-title"><?php the_title(); ?></h1>
				    </div>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'jamedo-bootstrap-start-theme' ), 'after' => '</div>' ) ); ?>
					</div><!-- /.entry-content -->

					<?php edit_post_link( __( 'Edit', 'jamedo-bootstrap-start-theme' ), '<span class="edit-link">', '</span>' ); ?>

				</article><!-- /#post-<?php the_ID(); ?> -->
			<?php endwhile; // end of the loop. ?>
			
			<hr class="bs-docs-separator clear">



		<?php else : ?>
		<?php get_template_part( 'no-results', 'content' ); ?>
		<?php endif; ?>
		</div><!-- #content -->
	</div><!-- #primary .site-content -->
<?php get_footer(); ?>
