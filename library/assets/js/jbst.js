jQuery(document).ready(function($) {
    /* comment buttons */
	$(".comment-reply-link").addClass("btn btn-success btn-mini");
	$('.comment-reply-link').prepend('<i class="glyphicon glyphicon-share-alt"></i> ');




$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
    // Avoid following the href location when clicking
    event.preventDefault(); 
    // Avoid having the menu to close when clicking
    event.stopPropagation(); 
    // If a menu is already open we close it
    //$('ul.dropdown-menu [data-toggle=dropdown]').parent().removeClass('open');
    // opening the one you clicked on
    $(this).parent().addClass('open');

    var menu = $(this).parent().find("ul");
    var menupos = menu.offset();
  
    if ((menupos.left + menu.width()) + 30 > $(window).width()) {
        var newpos = - menu.width();      
    } else {
        var newpos = $(this).parent().width();
    }
    menu.css({ left:newpos });

});
});
/* make clickable */
jQuery('.nav a.dropdown-toggle').on('click', function (e) { if(jQuery(this).attr('href') !== "#" ) { location.href = jQuery(this).attr('href');} return true; })

/* navbar login form */

jQuery(function(){
  // Fix input element click problem
  jQuery('#navloginform').click(function(e) {
    e.stopPropagation();
    
  });
});

