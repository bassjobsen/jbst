/* Add lightbox to galleries */
jQuery(document).ready(function($) {
	$('.gallery .gallery-icon a').attr('data-lightbox', 'gallery');
	//$('.gallery .gallery-icon a').attr('href', $('.gallery .gallery-icon a img').attr('src'));
	$('.gallery .gallery-icon a').each(
		function( index ) { $(this).attr('href',$(this).find('img').attr('src'));}
	);
});

/* make clickable */
jQuery('.nav a.dropdown-toggle').on('click', function (e) { if(jQuery(this).attr('href') !== "#" ) { location.href = jQuery(this).attr('href');} return true; })
