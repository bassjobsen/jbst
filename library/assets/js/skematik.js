/* Make dropdowns only close on button click */
jQuery('.dropdown-menu').click(function(event){
    event.stopPropagation();
 });
/* Add lightbox to galleries */
jQuery(document).ready(function($) {
	$('.gallery .gallery-icon a').attr('rel', 'lightbox[gallery]');
});
