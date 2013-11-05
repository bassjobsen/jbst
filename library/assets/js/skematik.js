jQuery(document).ready(function($) {
    /* comment buttons */
	$(".comment-reply-link").addClass("btn btn-success btn-mini");
	$('.comment-reply-link').prepend('<i class="glyphicon glyphicon-share-alt"></i> ');
	$("#cancel-comment-reply-link").addClass("btn btn-danger btn-mini");
	$('#cancel-comment-reply-link').prepend('<i class="glyphicon glyphicon-remove"></i> ');

});

/* make clickable */
jQuery('.nav a.dropdown-toggle').on('click', function (e) { if(jQuery(this).attr('href') !== "#" ) { location.href = jQuery(this).attr('href');} return true; })
