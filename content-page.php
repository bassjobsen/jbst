<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package jbst
 * @since jbst 1.0
 */
?>
			 
			<?php while ( have_posts() ) : the_post(); /* Start the Loop */?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php jbst_page_title();?>
					<div class="entry-content">
					<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									  the_post_thumbnail('large',array('class'=>'img-responsive img-page-class'));
									} 
							?>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'jamedo-bootstrap-start-theme' ), 'after' => '</div>' ) ); ?>
					</div><!-- /.entry-content -->

					<?php edit_post_link( __( 'Edit', 'jamedo-bootstrap-start-theme' ) .'<span class="sr-only">: ' .__('page','jamedo-bootstrap-start-theme') . '</span>' , '<span class="edit-link">', '</span>' ); ?>

				</article><!-- /#post-<?php the_ID(); ?> -->
			<?php endwhile; // end of the loop. ?>
			
			<hr class="clear" />
			
			<?php
			if(!get_theme_mod('page_comments', 0)) {
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			}
			?>
