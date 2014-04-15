<?php
add_filter( 'add_extra_less_code', function($lesscode){
$customless = '#commentform {
code{ white-space: pre-wrap; 
}
input[type="submit"] {
&:extend(.btn all, .'.get_theme_mod( 'default_button_style', 'btn-primary' ).' all);
}
.form-group,.form-submit,.form-allowed-tags {padding: 0 30px;}
}';
	
return $lesscode.$customless;});
add_filter( 'comment_form_default_fields', function(){ 
	
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	
	
	
	return array(

    'author' =>
      '<div class="form-group">
			  <label for="author">' . __("Name",'jamedo-bootstrap-start-theme')
			 . ($req ? " (". __("required",'jamedo-bootstrap-start-theme') .")" : '')
			 . ' </label>
			  <div class="input-group">
			  	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			  	<input class="form-control" type="text" name="author" id="author" value="'
			  	. esc_attr($commenter['comment_author']). '" placeholder="'
			  	. __("Your Name",'jamedo-bootstrap-start-theme'). '"'
			  	. ($req ? ' required aria-required="true"' : ''). '/>'
			  . '</div>'
		  	. '</div>',

    'email' =>
      '<div class="form-group">
			  <label for="email">' . __("Email",'jamedo-bootstrap-start-theme')
			 . ($req ? " (". __("required",'jamedo-bootstrap-start-theme') .")" : '')
			 . ' </label>
			  <div class="input-group">
			  	<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			  	<input class="form-control" type="email" name="email" id="email" value="'
			  	. esc_attr($commenter['comment_author_email']). '" placeholder="'
			  	. __("Your Email",'jamedo-bootstrap-start-theme'). '"'
			  	. ($req ? ' required aria-required="true"' : ''). '/>'
			  . '</div>'
			  . '<span class="help-block">'. __("will not be published",'jamedo-bootstrap-start-theme'). '</span>'
		  	. '</div>',

    'url' => '<div class="form-group">
			  <label for="author">' . __("Website",'jamedo-bootstrap-start-theme')
			 . ' </label>
			  <div class="input-group">
			  	<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
			  	<input class="form-control" type="url" name="url" id="url" value="'
			  	. esc_attr($commenter['comment_author_url']). '" placeholder="'
			  	. __("Your Website",'jamedo-bootstrap-start-theme'). '"'
			  	. '/>'
			  . '</div>'
		  	. '</div>'
    );}
  );
