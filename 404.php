<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package jbst
 * @since jbst 1.0
 */

get_header();
?>
        <div id="primary" class="site-content <?php do_action('jbstmaingridclass'); ?>">
                <div id="content" role="main">

                <?php get_template_part( 'content-404', 'content' ); ?>

                </div><!-- #content -->
        </div><!-- #primary .site-content -->
<?php get_footer(); ?>
