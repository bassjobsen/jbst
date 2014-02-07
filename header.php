<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="contentwrap">
 *
 * @package WordPress
 * @subpackage JBST
 * @since 2.0.6
 */


/**
 * Displays the header.
 *
 * Displays all of the <head> section and everything up till <div id="contentwrap">
 * Includes de <header> section with logo and navbar
 * 
 * @hooked jbst_doc_type - 9 
 * @hooked jbst_doc_title - 20 
 * @hooked jbst_head_after - 30 
 * @hooked jbst_body_open - 40 
 * @hooked jbst_main_navbar - 50 
 * @hooked jbst_top_content_wrapper - 60 
 * @since 2.0.6
 */
do_action( 'jbst_header' ); ?>
