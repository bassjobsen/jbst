<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage JBST
 * @since jbst 2.0
 */
?>
<?php jbst_content_nav_top(); ?>
<?php do_action( 'jbst_before_content' );?>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<header class="entry-header">

	<?php 					$ontitle = the_title_attribute( array('echo' => 0 ) );
							$ontitlestr = '<span class="sr-only">%s'.esc_attr(  str_replace('%','',$ontitle )).'</span>';
						

			echo '<h1 class="entry-title">';
			if ( is_single() ) :
				the_title();
			else :
				the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
			endif;
			echo '</h1>';
		?>
<?php
if (!is_search())
{
	?>
		<div class="entry-meta"><p>
			<?php
				if ( 'post' == get_post_type() )
					jbst_posted_on();

			?>
		</p></div><!-- .entry-meta -->
<?php		
}
?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); 
		?>
		<?php
		echo '<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'. get_permalink( get_the_ID() ) . '</a>';
		?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				  the_post_thumbnail('thumbnail',array('class'=>'img-responsive img-content-class'));
				} 
		?>
		<?php
			if(is_single())
			{
				the_content();
			}
			else
			{
				the_excerpt();
			}	
			wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'jamedo-bootstrap-start-theme' ), 'after' => '</div>' ) ); 
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>
<?php
if(!is_search())
{
	$sep = '';
?>	
	<footer class="entry-meta no-border">
						<?php 
						
						if ( 'post' == get_post_type() ) 
						{
							
							$ispost = true;
								$categories_list = get_the_category_list(', ');
							if ( $categories_list && jbst_categorized_blog() ) :
							?>
							<span class="cat-links">
								<?php printf( __( 'Posted in %1$s', 'jamedo-bootstrap-start-theme' ), $categories_list ); ?>
							</span>
							<?php endif; // End if categories ?>
				
							<?php

							$tags_list = get_the_tag_list( '', ', ' );
							if ( $tags_list ) :
							
							if($categories_list){
								?><span class="sep"> | </span><?php
							}
							
							?>
							
							<span class="tag-links">
									<?php printf( __( 'Tagged %1$s', 'jamedo-bootstrap-start-theme' ), $tags_list ); ?>
							</span>
							<?php endif; // End if $tags_list ?>
							
							<?php if($categories_list || $tags_list){
								$sep = '<span class="sep"> | </span>';
								}
							
						}//End if 'post' == get_post_type()
			            else
			            {
								$sep = '<span class="sep"> | </span>';
								$ispost = false;
						}?>		
				         
				
						<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
						
						<?php
						
						if(!get_theme_mod('page_comments', 0))
						{
						
						if($ispost)echo $sep;
						
						?>
						<span class="comments-link"><?php 
						jbst_comments_popup_link( 
						sprintf(__( 'Leave a comment %s', 'jamedo-bootstrap-start-theme' ),sprintf($ontitlestr,' on ')), 
						sprintf(__( '1 Comment %s', 'jamedo-bootstrap-start-theme' ),sprintf($ontitlestr,' on ')), 
						'% '.sprintf(__( 'Comments %s', 'jamedo-bootstrap-start-theme' ),sprintf($ontitlestr,' on ')) ); ?>
						</span>
						<?php
						
						}
						?>
						
						<?php endif; ?>
				
						<?php edit_post_link( __( 'Edit', 'jamedo-bootstrap-start-theme' ) . sprintf($ontitlestr,': ') , $sep.'<span class="edit-link">', '</span>' ); ?>
					</footer><!-- #entry-meta -->
<?php
}
?>					
</article><!-- #post-## -->
<?php endwhile; ?>

			<?php
			if(is_single() && !get_theme_mod('page_comments', 0)) {
				// If comments are open or we have at least one comment, load up the comment template
				
				if ( comments_open() || '0' != get_comments_number() )
				{
					comments_template();
				}	
			}
			?>


<?php is_single()?jbst_content_nav_bottom_single():jbst_content_nav_bottom(); ?>
