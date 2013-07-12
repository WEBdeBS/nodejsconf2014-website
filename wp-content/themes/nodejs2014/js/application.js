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

});