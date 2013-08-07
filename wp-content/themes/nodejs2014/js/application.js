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

require(['jquery','vendor/processing-1.4.1.min', 'vendor/jquery.carouFredSel-6.2.1-packed'], function ($) {

	// load processing animation
	var $canvas = $('canvas'),
		mostri = Processing.loadSketchFromSources(
			$canvas.get(0), 
			[ $canvas.attr("data-processing-sources") ]
		);

	// load dinamically page tokens
    $('*[data-load]').each(function(n,e){
      $(e).load($(e).attr("data-load"));
    });

    // handle navigation
    $('#navigation').on('click','a',function(){
    	var url_token = $(this).attr('href').split("/");
    	console.log(url_token);
    	window.location.hash = url_token[url_token.length - 1];
    	return false;
    });

    $("#slides").carouFredSel({
		responsive: true,
		pagination: '#slides-pagination',
		width: "100%",
		items: {
			width: 200,
			visible: 3
		}
	});

	setTimeout(function(){$(".thanks-title").show()},2000);
	
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