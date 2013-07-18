(function($) {
    $(window).load(function() {
        $('.flexslider').flexslider({
	            animation: 'slide',
		    controlsContainer: '.flex-container',
			// Primary Controls
controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
prevText: "Previous",           //String: Set the text for the "previous" directionNav item
nextText: "Next",               //String: Set the text for the "next" directionNav item
touch: true, 
// Secondary Navigation
keyboard: true,                 //Boolean: Allow slider navigating via keyboard left/right keys
multipleKeyboard: false,        //{NEW} Boolean: Allow keyboard navigation to affect multiple sliders. Default behavior cuts out keyboard navigation with more than one slider present.
mousewheel: false,              //{UPDATED} Boolean: Requires jquery.mousewheel.js (https://github.com/brandonaaron/jquery-mousewheel) - Allows slider navigating via mousewheel
pausePlay: false,               //Boolean: Create pause/play dynamic element
pauseText: 'Pause',             //String: Set the text for the "pause" pausePlay item
playText: 'Play',
	    });
    });
})(jQuery)
