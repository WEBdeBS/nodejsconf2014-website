/* --- config --- */
require.config({
  paths: {
    vendor: '../vendor'
  }
});

require(['jquery', 'vendor/processing-1.4.1.min'], function ($) {

	// load processing animation
	var $canvas = $('canvas'),
			mostri = Processing.loadSketchFromSources(
				$canvas.get(0), 
				[ $canvas.attr("data-processing-sources") ]
			);

});