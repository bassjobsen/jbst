<?php
/* This is just a reference for all of the hooks available in Skematik */


/* content nav - runs above and below all content. We recommend you further filter these, for example only making content navigation buttons on posts and not other content types */
skematik_content_nav( 'nav-above' );
skematik_content_nav( 'nav-below' );

/* This runs before the main container of the page. Originally for ads in wordpress.com themes. Carried over from the _s theme. */
do_action( 'skematik_before' );

/* Sidebar actions that run above each sidebar. Note, these are for the sidebar areas and will apply to custom sidebars as well. */
do_action( 'skematik_before_left_sidebar' );
do_action( 'skematik_before_right_sidebar' );

/* Runs before close of comment <form> */
do_action('comment_form()', $post->ID);

/* Before content of different types */
do_action( 'skematik_before_content' );
do_action( 'skematik_before_content_404' );
do_action( 'skematik_before_content_no_results' );
do_action( 'skematik_before_content_page' );
do_action( 'skematik_before_content_search' );
do_action( 'skematik_before_content_single' );

/* Runs before footer text */
do_action( 'skematik_credits' );