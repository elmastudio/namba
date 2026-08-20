/*--------------------------------------------------------------------------------------------
  Add Masonry
----------------------------------------------------------------------------------------------*/

jQuery(document).ready(function() {

    jQuery('#primary').imagesLoaded(function(){
      jQuery('#primary').masonry({
          itemSelector: '.post',
          isResizable: false,
          // set columnWidth a fraction of the container width
          columnWidth: jQuery('#primary').width() / 2
     });
    });

    // update columnWidth on window resize
    jQuery(window).smartresize(function(){
	    jQuery('#primary').masonry({
	    // update columnWidth to a percentage of container width
	    columnWidth: jQuery('#primary').width() / 2
	   });
	});

  });

/*--------------------------------------------------------------------------------------------
  Mobile Menu
----------------------------------------------------------------------------------------------*/

jQuery(document).ready(function(){
    	jQuery('#site-nav').hide();
		jQuery('a#mobile-menu-btn').click(function () {
		jQuery('#site-nav').slideToggle('fast');
		jQuery('a#mobile-menu-btn').toggleClass('menu-btn-open');
    });
});

jQuery(document).ready(function(){
    	jQuery('#secondary').hide();
		jQuery('a#mobile-info-btn').click(function () {
		jQuery('#secondary').slideToggle('fast');
		jQuery('a#mobile-info-btn').toggleClass('info-btn-open');
    });
});

/*--------------------------------------------------------------------------------------------
  Show/Hide for Share Buttons
----------------------------------------------------------------------------------------------*/

jQuery(document).ready(function(){
    	jQuery('.share-links-wrap').hide();
		jQuery('.share-btn').click(function () {
		jQuery(this).next('.share-links-wrap').fadeToggle('fast');
    });
});
