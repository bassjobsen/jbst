<?php
/**
 * @package skematik
 * @since skematik 1.0
 */
?>

			<?php do_action( 'skematik_before_content_archive' );?>
				    
				<header class="page-header">
					<h1 class="page-title">
						<?php
						
							if ( is_category() ) {
								printf( __( 'Category Archives: %s', 'jamedo-bootstrap-start-theme' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							} elseif ( is_tag() ) {
								printf( __( 'Tag Archives: %s', 'jamedo-bootstrap-start-theme' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							} elseif ( is_author() ) {
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( 'Author Archives: %s', 'jamedo-bootstrap-start-theme' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
								/* Since we called the_post() above, we need to
								 * rewind the loop back to the beginning that way
								 * we can run the loop properly, in full.
								 */
								rewind_posts();

							} elseif ( is_day() ) {
								printf( __( 'Daily Archives: %s', 'jamedo-bootstrap-start-theme' ), '<span>' . get_the_date() . '</span>' );

							} elseif ( is_month() ) {
								printf( __( 'Monthly Archives: %s', 'jamedo-bootstrap-start-theme' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							} elseif ( is_year() ) {
								printf( __( 'Yearly Archives: %s', 'jamedo-bootstrap-start-theme' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
							
							} elseif (taxonomy_exists('wpsc_product_category')){
								_e( 'Products in the', 'jamedo-bootstrap-start-theme' );
							
							} else {
								_e( 'Archives', 'jamedo-bootstrap-start-theme' );

							}
						?>
					</h1>
					<?php
						if ( is_category() ) {
							// show an optional category description
							$category_description = category_description();
							if ( ! empty( $category_description ) )
								echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

						} elseif ( is_tag() ) {
							// show an optional tag description
							$tag_description = tag_description();
							if ( ! empty( $tag_description ) )
								echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
						}
					?>
				</header><!-- .page-header -->

				<?php /* Leave the rest up to the content loop */ ?>
					<?php get_template_part( 'content', get_post_format() );?>
