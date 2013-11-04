jQuery(document).ready(function($) {
	
	/* Add lightbox to galleries */
	
	$('.gallery .gallery-icon a').attr('data-lightbox', 'gallery');
	//$('.gallery .gallery-icon a').attr('href', $('.gallery .gallery-icon a img').attr('src'));
	$('.gallery .gallery-icon a').each(
		function( index ) { $(this).attr('href',$(this).find('img').attr('src'));}
	);
	
	
	  /* comment buttons */
	  $(".comment-reply-link").addClass("btn btn-success btn-mini");
	  $('.comment-reply-link').prepend('<i class="glyphicon glyphicon-share-alt"></i> ');
	  $("#cancel-comment-reply-link").addClass("btn btn-danger btn-mini");
	  $('#cancel-comment-reply-link').prepend('<i class="glyphicon glyphicon-remove"></i> ');

});

/* make clickable */
jQuery('.nav a.dropdown-toggle').on('click', function (e) { if(jQuery(this).attr('href') !== "#" ) { location.href = jQuery(this).attr('href');} return true; })
