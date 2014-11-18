jQuery(document).ready(function(){
	// Target your .container, .wrapper, .post, etc.
	jQuery(".entry-content").fitVids();


	jQuery("#fb-sh-btn").click(function(e) {
		e.preventDefault();
		$href = jQuery(this).attr("data-permalink");
		if($href!="#" && $href!="") {
			window.open('http://facebook.com/sharer.php?u=' + $href,'','width=500,height=500')
		}
	});

	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scroll-up').fadeIn();
		} else {
			jQuery('.scroll-up').fadeOut();
		}
	});
	jQuery('.scroll-up').click(function() {
		jQuery("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});

});
