/* Add lightbox to galleries */
jQuery(document).ready(function($) {
	$('.gallery .gallery-icon a').attr('rel', 'lightbox[gallery]');
});

/* make clickable */
jQuery('.nav a.dropdown-toggle').on('click', function (e) { if(jQuery(this).attr('href') !== "#" ) { location.href = jQuery(this).attr('href');} return true; })
