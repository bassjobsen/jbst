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


<?php if ( comments_open() ) : ?>

<section id="respond" class="respond-form">

	<h3 id="comment-form-title">
	<?php
	if (function_exists('is_product')) {
		if (is_product()) {
		comment_form_title( __("Review this product",'jamedo-bootstrap-start-theme'), __("Leave a Reply to",'jamedo-bootstrap-start-theme') . ' %s' );
		} else {comment_form_title( __("Leave a Reply",'jamedo-bootstrap-start-theme'), __("Leave a Reply to",'jamedo-bootstrap-start-theme') . ' %s' );}
	
	} else {comment_form_title( __("Leave a Reply",'jamedo-bootstrap-start-theme'), __("Leave a Reply to",'jamedo-bootstrap-start-theme') . ' %s' );} ?>
	</h3>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
  	<div class="help">
  		<p><?php _e("You must be",'jamedo-bootstrap-start-theme'); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e("logged in",'jamedo-bootstrap-start-theme'); ?></a> <?php _e("to post a comment",'jamedo-bootstrap-start-theme'); ?>.</p>
  	</div>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" role="form" class="" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>

	<p class="comments-logged-in-as"><?php _e("Logged in as",'jamedo-bootstrap-start-theme'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e("Log out of this account",'jamedo-bootstrap-start-theme'); ?>"><?php _e("Log out",'jamedo-bootstrap-start-theme'); ?> &raquo;</a></p>

	<?php else : ?>

		
		
			<div class="form-group">
			  <label for="author"><?php _e("Name",'jamedo-bootstrap-start-theme'); ?> <?php if ($req) echo "(". __("required",'jamedo-bootstrap-start-theme') .")"; ?></label>
			  <div class="input-group">
			  	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			  	<input class="form-control" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php _e("Your Name",'jamedo-bootstrap-start-theme'); ?>" <?php if ($req) echo ' required aria-required="true"'; ?> />
			  </div>
		  	</div>

		
	
			<div class="form-group">
			  <label for="email"><?php _e("Mail",'jamedo-bootstrap-start-theme'); ?> <?php if ($req) echo "(". __("required",'jamedo-bootstrap-start-theme') .")"; ?></label>
			  <div class="input-group">
			  	<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			  	<input class="form-control" type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="<?php _e("Your Email",'jamedo-bootstrap-start-theme'); ?>" <?php if ($req) echo ' required aria-required="true"'; ?>  />
			  	
			  </div>
			  <span class="help-block">(<?php _e("will not be published",'jamedo-bootstrap-start-theme'); ?>)</span>
		  	</div>
	

			<div class="form-group">
			  <label for="url"><?php _e("Website",'jamedo-bootstrap-start-theme'); ?></label>
			  <div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
			  	<input class="form-control" type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="<?php _e("Your Website",'jamedo-bootstrap-start-theme'); ?>" <?php if ($req) echo ' required aria-required="true"'; ?> />
			  </div>
		  	</div>



	<?php endif; ?>
	
	<div class="form-group">
			<label for="comment" class="sr-only"><?php (function_exists('is_product') && is_product())?_e("Review",'jamedo-bootstrap-start-theme'):_e("Reply",'jamedo-bootstrap-start-theme'); ?></label>
			<textarea class="form-control" role="textbox" aria-multiline="true" name="comment" id="comment" rows="8" placeholder="<?php _e("Your Comment Here...",'jamedo-bootstrap-start-theme'); ?>"></textarea>

	</div>
	<div class="form-group">
	<button class="btn <?php jbst_button_class();?>" name="submit" id="submitform"><?php _e("Submit Comment",'jamedo-bootstrap-start-theme'); ?></button>
	<?php comment_id_fields(); ?>
	</div>
	<?php 
		//comment_form();
		do_action('comment_form()', $post->ID); 
	
	?>

	</form>
	
	<?php endif; // If registration required and not logged in ?>
</section>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>
