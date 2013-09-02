<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package skematik
 * @since skematik 1.0
 */
?>
			

			<?php while ( have_posts() ) : the_post(); /* Start the Loop */?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php skematik_page_title();?>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'jamedo-bootstrap-start-theme' ), 'after' => '</div>' ) ); ?>
					</div><!-- /.entry-content -->

					<?php edit_post_link( __( 'Edit', 'jamedo-bootstrap-start-theme' ), '<span class="edit-link">', '</span>' ); ?>

				</article><!-- /#post-<?php the_ID(); ?> -->
			<?php endwhile; // end of the loop. ?>
			
			<hr class="bs-docs-separator clear">
			
			<?php
			
			if(get_theme_mod('page_comments', 1) != 1) {
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template( '', true );
			}
			?>
