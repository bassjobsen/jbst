<?php
/*
Template Name: Example
Description: Simple template
*/
get_header();
do_action( 'jbst_before_content_page' );

// default settings - Kv_front_editor.php
$content = 'This content gets loaded first.';
$editor_id = 'kv_frontend_editor';
$settings =   array(
    'wpautop' => true, // use wpautop?
    'media_buttons' => true, // show insert/upload button(s)
    'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
    'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
    'tabindex' => '',
    'editor_css' => '', //  extra styles for both visual and HTML editors buttons, 
    'editor_class' => '', // add extra class(es) to the editor textarea
    'teeny' => false, // output the minimal editor config used in Press This
    'dfw' => false, // replace the default fullscreen with DFW (supported on the front-end in WordPress 3.4)
    'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
    'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
);
wp_editor( $content, $editor_id, $settings);
do_action( 'jbst_after_content_page' );
get_footer();
