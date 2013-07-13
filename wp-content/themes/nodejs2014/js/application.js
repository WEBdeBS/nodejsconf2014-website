/* --- config --- */
require.config({
  paths: {
    vendor: '../vendor'
  }
});

/* -- launchrock jquery wrap -- */
define('jquery', function(){
	return jQuery;
})

require(['jquery','vendor/processing-1.4.1.min'], function ($) {

	// load processing animation
	var $canvas = $('canvas'),
		mostri = Processing.loadSketchFromSources(
			$canvas.get(0), 
			[ $canvas.attr("data-processing-sources") ]
		);

	$("#slides").slidesjs({
		width: 1271,
        height: 300,
        navigation: false
	});

	var $window = $(window);
	var headerTop = $("#header").position().top;
	var intro = $("#intro");
	var introHeight = intro.height();
	var monsterHeight = 56;

	$window
		.scroll(function() {

			var scrollTop = $window.scrollTop();

			if (scrollTop >= headerTop) {

				var position = introHeight - (scrollTop - headerTop);
				
				if (position >= (introHeight - monsterHeight)) {
					setPosition(position);
				} else {
					setPosition(introHeight - monsterHeight);
				}

			} else {

				setPosition(introHeight);

			}

		})
		.scroll();

	function setPosition(position) {
		intro.css({
			"background-position": "center " +  position + "px" 
		});
	}

});