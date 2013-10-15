<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package skematik
 * @since skematik 1.0
 */
?>
			<?php skematik_content_nav( 'nav-above' ); ?>

			<?php do_action( 'skematik_before_content_no_results' );?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'jamedo-bootstrap-start-theme' ); ?></h1>
					</header><!-- .entry-header -->
				
					<div class="entry-content">
						<?php if ( is_home() ) { ?>
				
							<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'jamedo-bootstrap-start-theme' ), admin_url( 'post-new.php' ) ); ?></p>
				
						<?php } elseif ( is_search() ) { ?>
				
							<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'jamedo-bootstrap-start-theme' ); ?></p>
							<?php get_search_form(); ?>
				
						<?php } else { ?>
				
							<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'jamedo-bootstrap-start-theme' ); ?></p>
							<?php get_search_form(); ?>
				
						<?php } ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
			<?php endwhile; ?>

			<?php skematik_content_nav( 'nav-below' ); ?>
