<?php
/**
 * @package skematik
 * @since skematik 1.0
 */
?>
			<?php skematik_content_nav_top(); ?>
			<?php do_action( 'skematik_before_content' );?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="article-content">
					<header class="page-header">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'jamedo-bootstrap-start-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
						<?php if ( 'post' == get_post_type() ) : ?>
						<small class="entry-meta">
							<?php skematik_posted_on(); ?>
						</small><!-- .entry-meta -->
						<?php endif; ?>
						</h2>
					</header><!-- .entry-header -->
					<?php skematik_post_thumbnail();?>
					<?php if ( is_search() ) : // Only display Excerpts for Search ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
					<?php else : ?>
					<div class="entry-content">
						<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jamedo-bootstrap-start-theme' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'jamedo-bootstrap-start-theme' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					<?php endif; ?>
					<footer class="entry-meta no-border">
						<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
							<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( __( ', ', 'jamedo-bootstrap-start-theme' ) );
								if ( $categories_list && skematik_categorized_blog() ) :
							?>
							<span class="cat-links">
								<?php printf( __( 'Posted in %1$s', 'jamedo-bootstrap-start-theme' ), $categories_list ); ?>
							</span>
							<?php endif; // End if categories ?>
				
							<?php
								/* translators: used between list items, there is a space after the comma */
								$tags_list = get_the_tag_list( '', __( ', ', 'jamedo-bootstrap-start-theme' ) );
								if ( $tags_list ) :
							?>
							<span class="sep"> | </span>
							<span class="tag-links">
								<?php printf( __( 'Tagged %1$s', 'jamedo-bootstrap-start-theme' ), $tags_list ); ?>
							</span>
							<?php endif; // End if $tags_list ?>
						<?php endif; // End if 'post' == get_post_type() ?>
				
						<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
						<span class="sep"> | </span>
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'jamedo-bootstrap-start-theme' ), __( '1 Comment', 'jamedo-bootstrap-start-theme' ), __( '% Comments', 'jamedo-bootstrap-start-theme' ) ); ?></span>
						<?php endif; ?>
				
						<?php edit_post_link( __( 'Edit', 'jamedo-bootstrap-start-theme' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
					</footer><!-- #entry-meta -->
				</div>
				<div class="clear"></div>
			</article><!-- #post-<?php the_ID(); ?> -->
			
			<?php endwhile; ?>

			<?php skematik_content_nav_bottom(); ?>