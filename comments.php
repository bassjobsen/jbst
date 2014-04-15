<?php jbst_comment_button_classes();
// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="alert alert-primary"><?php _e("This post is password protected. Enter the password to view comments.",'jamedo-bootstrap-start-theme'); ?></div>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->
<div id="comment-container">
<?php if ( have_comments() ) : ?>
	
	<h3 id="comments">
	
	<?php 
	if (function_exists('is_product')) {
		if (is_product()) {
		comments_number('<span>' . __("No",'jamedo-bootstrap-start-theme') . '</span> ' . __("Reviews",'jamedo-bootstrap-start-theme') . '', '<span>' . __("One",'jamedo-bootstrap-start-theme') . '</span> ' . __("Review",'jamedo-bootstrap-start-theme') . '', '<span>%</span> ' . __("Reviews",'jamedo-bootstrap-start-theme') );?> <?php _e("for",'jamedo-bootstrap-start-theme'); ?> &#8220;<?php the_title(); ?>&#8221;
		<?php }
		else {
		comments_number('<span>' . __("No",'jamedo-bootstrap-start-theme') . '</span> ' . __("Responses",'jamedo-bootstrap-start-theme') . '', '<span>' . __("One",'jamedo-bootstrap-start-theme') . '</span> ' . __("Response",'jamedo-bootstrap-start-theme') . '', '<span>%</span> ' . __("Responses",'jamedo-bootstrap-start-theme') );?> <?php _e("to",'jamedo-bootstrap-start-theme'); ?> &#8220;<?php the_title(); ?>&#8221;
	<?php }
		} else {
		comments_number('<span>' . __("No",'jamedo-bootstrap-start-theme') . '</span> ' . __("Responses",'jamedo-bootstrap-start-theme') . '', '<span>' . __("One",'jamedo-bootstrap-start-theme') . '</span> ' . __("Response",'jamedo-bootstrap-start-theme') . '', '<span>%</span> ' . __("Responses",'jamedo-bootstrap-start-theme') );?> <?php _e("to",'jamedo-bootstrap-start-theme'); ?> &#8220;<?php the_title(); ?>&#8221;
	<?php } ?>
	
	</h3>

	<nav class="comment-nav" id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h3 class="sr-only"><?php _e( 'Comment navigation', 'jamedo-bootstrap-start-theme' ); ?></h3>
		<ul>
	  		<li><?php previous_comments_link( __("Older comments",'jamedo-bootstrap-start-theme') ) ?></li>
	  		<li><?php next_comments_link( __("Newer comments",'jamedo-bootstrap-start-theme') ) ?></li>
	 	</ul>
	</nav>
	
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=bones_comments&format=html5'); ?>
	</ol>
	
	<nav class="comment-nav" id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h3 class="sr-only"><?php _e( 'Comment navigation', 'jamedo-bootstrap-start-theme' ); ?></h3>
		<ul>
	  		<li><?php previous_comments_link( __("Older comments",'jamedo-bootstrap-start-theme') ) ?></li>
	  		<li><?php next_comments_link( __("Newer comments",'jamedo-bootstrap-start-theme') ) ?></li>
		</ul>
	</nav>
  
	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
    	<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed 
	?>
	
	<?php
		$suppress_comments_message = of_get_option('suppress_comments_message');

		if (is_page() && $suppress_comments_message) :
	?>
			
		<?php else : ?>
		
			<!-- If comments are closed. -->
			<p class="alert alert-primary"><?php _e("Comments are closed",'jamedo-bootstrap-start-theme'); ?>.</p>
			
		<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>


<section id="respond" class="respond-form">

	<?php
	
	$title_reply = (function_exists('is_product') && is_product()) ? __("Review this product",'jamedo-bootstrap-start-theme') : __("Leave a Reply",'jamedo-bootstrap-start-theme');
	$comment_field = '	<div class="form-group">
			<label for="comment" class="sr-only">' .
			((function_exists('is_product') && is_product()) ? __("Review",'jamedo-bootstrap-start-theme'): __("Reply",'jamedo-bootstrap-start-theme')) 
			. '</label>'
			. ' <textarea class="form-control" role="textbox" aria-multiline="true" name="comment" id="comment" rows="8" placeholder="'
			. __("Your Comment Here...",'jamedo-bootstrap-start-theme')
			. '"></textarea></textarea>

	</div>'; 
	comment_form(
	
			apply_filters ('jbst_comments_form_arguments', array('comment_notes_before' => '',
			'comment_field' => $comment_field,
			'title_reply' => $title_reply))
	);
	?>
	
	
</section>

</div>
