<?php
/**
 * @package skematik
 * @since skematik 1.0
 */
?>
			<?php skematik_content_nav( 'nav-above' ); ?>

			<?php do_action( 'skematik_before_content_404' );?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
				<article id="post-0" class="post error404 not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'jamedo-bootstrap-start-theme' ); ?></h1>
					</header>
	
					<div class="entry-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'jamedo-bootstrap-start-theme' ); ?></p>
	
						<?php get_search_form(); ?>
	
						<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
	
						<div class="widget">
							<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'jamedo-bootstrap-start-theme' ); ?></h2>
							<ul>
							<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
							</ul>
						</div>
	
						<?php
						/* translators: %1$s: smilie */
						$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'jamedo-bootstrap-start-theme' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
						?>
	
						<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
	
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
			<?php endwhile; ?>

			<?php skematik_content_nav( 'nav-below' ); ?>