<?php skematik_comment_button_classes();
// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="alert alert-primary"><?php _e("This post is password protected. Enter the password to view comments.","skematik"); ?></div>
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
		comments_number('<span>' . __("No","skematik") . '</span> ' . __("Reviews","skematik") . '', '<span>' . __("One","skematik") . '</span> ' . __("Review","skematik") . '', '<span>%</span> ' . __("Reviews","skematik") );?> <?php _e("for","skematik"); ?> &#8220;<?php the_title(); ?>&#8221;
		<?php }
		else {
		comments_number('<span>' . __("No","skematik") . '</span> ' . __("Responses","skematik") . '', '<span>' . __("One","skematik") . '</span> ' . __("Response","skematik") . '', '<span>%</span> ' . __("Responses","skematik") );?> <?php _e("to","skematik"); ?> &#8220;<?php the_title(); ?>&#8221;
	<?php }
		} else {
		comments_number('<span>' . __("No","skematik") . '</span> ' . __("Responses","skematik") . '', '<span>' . __("One","skematik") . '</span> ' . __("Response","skematik") . '', '<span>%</span> ' . __("Responses","skematik") );?> <?php _e("to","skematik"); ?> &#8220;<?php the_title(); ?>&#8221;
	<?php } ?>
	
	</h3>

	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link( __("Older comments","skematik") ) ?></li>
	  		<li><?php next_comments_link( __("Newer comments","skematik") ) ?></li>
	 	</ul>
	</nav>
	
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=bones_comments'); ?>
	</ol>
	
	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link( __("Older comments","skematik") ) ?></li>
	  		<li><?php next_comments_link( __("Newer comments","skematik") ) ?></li>
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
			<p class="alert alert-primary"><?php _e("Comments are closed","skematik"); ?>.</p>
			
		<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<section id="respond" class="respond-form">

	<h3 id="comment-form-title">
	<?php
	if (function_exists('is_product')) {
		if (is_product()) {
		comment_form_title( __("Review this product","skematik"), __("Leave a Reply to","skematik") . ' %s' );
		} else {comment_form_title( __("Leave a Reply","skematik"), __("Leave a Reply to","skematik") . ' %s' );}
	
	} else {comment_form_title( __("Leave a Reply","skematik"), __("Leave a Reply to","skematik") . ' %s' );} ?>
	</h3>

	<div id="cancel-comment-reply">
		<p class="small"><?php cancel_comment_reply_link( __("Cancel","skematik") ); ?></p>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
  	<div class="help">
  		<p><?php _e("You must be","skematik"); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e("logged in","skematik"); ?></a> <?php _e("to post a comment","skematik"); ?>.</p>
  	</div>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="form-vertical" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>

	<p class="comments-logged-in-as"><?php _e("Logged in as","skematik"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e("Log out of this account","skematik"); ?>"><?php _e("Log out","skematik"); ?> &raquo;</a></p>

	<?php else : ?>
	
	<ul id="comment-form-elements" class="clearfix">
		
		<li>
			<div class="control-group">
			  <label for="author"><?php _e("Name","skematik"); ?> <?php if ($req) echo "(required)"; ?></label>
			  <div class="input-prepend">
			  	<span class="add-on"><i class="glyphicon glyphicon-user"></i></span>
			  	<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php _e("Your Name","skematik"); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			  </div>
		  	</div>
		</li>
		
		<li>
			<div class="control-group">
			  <label for="email"><?php _e("Mail","skematik"); ?> <?php if ($req) echo "(required)"; ?></label>
			  <div class="input-prepend">
			  	<span class="add-on"><i class="glyphicon glyphicon-envelope"></i></span>
			  	<input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="<?php _e("Your Email","skematik"); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			  	<span class="help-inline">(<?php _e("will not be published","skematik"); ?>)</span>
			  </div>
		  	</div>
		</li>
		
		<li>
			<div class="control-group">
			  <label for="url"><?php _e("Website","skematik"); ?></label>
			  <div class="input-prepend">
			  <span class="add-on"><i class="glyphicon glyphicon-home"></i></span>
			  	<input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="<?php _e("Your Website","skematik"); ?>" tabindex="3" />
			  </div>
		  	</div>
		</li>
		
	</ul>

	<?php endif; ?>
	
	<div class="clearfix">
		<div class="input">
			<textarea name="comment" id="comment" rows="8" placeholder="<?php _e("Your Comment Here...","skematik"); ?>" tabindex="4"></textarea>
		</div>
	</div>
	
	<input class="btn <?php skematik_button_class();?>" name="submit" type="submit" id="submitform" tabindex="5" value="<?php _e("Submit Comment","skematik"); ?>" />
	<?php comment_id_fields(); ?>
	
	<?php 
		//comment_form();
		do_action('comment_form()', $post->ID); 
	
	?>
	<div class="clearfix"></div>
	</form>
	
	<?php endif; // If registration required and not logged in ?>
</section>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
