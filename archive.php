<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
*
* @package jbst
* @since jbst 1.0
*/
get_header();
?>
        <div id="primary" class="site-content <?php do_action('jbstmaingridclass'); ?>">
                <div id="content" role="main">
                <?php if ( have_posts() ) : ?>
                <?php get_template_part( 'content', 'archive' );?>
                <?php else : ?>
                <?php echo get_template_part( 'no-results', 'content' ); ?>
                <?php endif; ?>
                </div><!-- #content -->
        </div><!-- #primary .site-content -->
<?php get_footer(); ?>
