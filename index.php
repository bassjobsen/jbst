<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package skematik
 * @since skematik 1.0
 */
get_header();
do_action( 'jbst_before_content_page' );
?>
<?

$pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;

$limit = 5; // number of rows in page
$offset = ( $pagenum - 1 ) * $limit;
$total = $wpdb->get_var( "SELECT COUNT(`term_id`) FROM `wp_terms`" );
$num_of_pages = ceil( $total / $limit );
$result = $wpdb->get_results( "SELECT * FROM `wp_terms` LIMIT $offset, $limit" );

$data_html = '';

foreach( $result as $results ) 

    {
    $id=$results->term_id;
    $name= $results->slug;
    //$gender= $results->gender_cust;
    //$dob= $results->dob_cust;
?>
<?php $html= "<div class=\"divContentBody\">";?>
<?php $html .= "<span class=\"clsOrderNo\">". $id."</span>";?>
<?php $html .= "<span class=\"clsName\">". $name."</span>";?>
<?php //$html .= "<span class=\"clsGender\">".$gender."</span>";?>
<?php //$html .= "<span class=\"clsDOB\">".  $dob ."</span>";?>
<?php //$html .= "</div>"?>
<?php
$data_html .=$html; 
 }
echo $data_html;


$page_links = paginate_links( array(
    'base' => add_query_arg( 'pagenum', '%#%' ),
    'format' => '',
    'prev_text' => __( '&laquo;', 'aag' ),
    'next_text' => __( '&raquo;', 'aag' ),
    'total' => $total,
    'current' => $pagenum
) );

if ( $page_links ) {
    echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
}

 ?> 



		<?php if ( have_posts() ) : ?>
				<?php 
					if ( is_page() ) { get_template_part( 'content', 'page' );}
					elseif ( is_single() ) {get_template_part( 'content', 'single' );}
					elseif ( is_search() ) {get_template_part( 'content', 'search' );}
					else {get_template_part( 'content', get_post_format() );}
				 ?>
		<?php else : ?>
		<?php get_template_part( 'no-results', 'content' ); ?>
		<?php endif; ?>

<?php 
do_action( 'jbst_after_content_page' );
get_footer(); 
?>
