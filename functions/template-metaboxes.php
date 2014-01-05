<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category JBST
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */


add_filter( 'cmb_meta_boxes', 'jbst_default_metaboxes' );
function jbst_default_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	$meta_boxes[] = array(
		'id'         => 'jbst-page-layout',
		'title'      => 'Template Options',
		'pages'      => array( 'page','post','product' ), // Post type
		'context'    => 'side',
		'priority'   => 'default',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			
			array(
				'name'    => 'Page Layout',
				'desc'    => 'You can choose to show this entry in a specific layout that will override the default layout settings in your theme options. This option will not apply if using a different page template in the Page Attributes section.',
				'id'      => $prefix . 'page_layout',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Default', 'value' => 'default', ),
					array( 'name' => 'Left Sidebar', 'value' => 'left-sidebar', ),
					array( 'name' => 'Right Sidebar', 'value' => 'right-sidebar', ),
					array( 'name' => 'Full Width', 'value' => 'full-width', ),
					array( 'name' => 'Three Column', 'value' => 'three-column', ),
				),
			),
			
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

/*
==========================================================
ADD A NEW METABOX OPTION FOR TAXONOMY SELECT
==========================================================
*/
add_filter( 'cmb_render_jbst_taxonomy_select', 'jbst_taxonomy_select', 10, 2 );
function jbst_taxonomy_select( $field, $meta ) {

    wp_dropdown_categories(array(
            'show_option_none' => 'Default',
            'hierarchical' => 1,
            'taxonomy' => $field['taxonomy'],
            'orderby' => 'name',
            'hide_empty' => 0,
            'name' => $field['id'],
            'selected' => $meta 

        ));
    if ( !empty( $field['desc'] ) ) echo '<p class="cmb_metabox_description">' . $field['desc'] . '</p>';
}
