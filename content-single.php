<?php
/**
 * @package skematik
 * @since skematik 1.0
 */
?>

			<?php skematik_content_nav_top_single() ?>

			<?php do_action( 'skematik_before_content_single' );?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="page-header">
    					<h1 class="entry-title"><?php the_title(); ?><small class="entry-meta"><?php skematik_posted_on(); ?></small></h1>
				    </div>
				
					<div class="entry-content">
						<?php skematik_single_thumbnail(800);?>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'jamedo-bootstrap-start-theme' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
				
					<footer class="entry-meta">
						<?php
							/* translators: used between list items, there is a space after the comma */
							$category_list = get_the_category_list( __( ', ', 'jamedo-bootstrap-start-theme' ) );
				
							/* translators: used between list items, there is a space after the comma */
							$tag_list = get_the_tag_list( '', ', ' );
				
							if ( ! skematik_categorized_blog() ) {
								// This blog only has 1 category so we just need to worry about tags in the meta text
								if ( '' != $tag_list ) {
									$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'jamedo-bootstrap-start-theme' );
								} else {
									$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'jamedo-bootstrap-start-theme' );
								}
				
							} else {
								// But this blog has loads of categories so we should probably display them here
								if ( '' != $tag_list ) {
									$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'jamedo-bootstrap-start-theme' );
								} else {
									$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'jamedo-bootstrap-start-theme' );
								}
				
							} // end check for categories on this blog
				
							printf(
								$meta_text,
								$category_list,
								$tag_list,
								get_permalink(),
								the_title_attribute( 'echo=0' )
							);
						?>
				
						<?php edit_post_link( __( 'Edit', 'jamedo-bootstrap-start-theme' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				
			<?php endwhile; ?>

			<?php skematik_content_nav_bottom_single() ?>
			
			<hr class="bs-docs-separator clear">
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template( '', true );
			?>
                              </article><!-- #post-<?php the_ID(); ?> -->  
