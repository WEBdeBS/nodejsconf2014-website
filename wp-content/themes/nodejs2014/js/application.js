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

	var page = "https://www.facebook.com/nodejsconf";
	$.get("https://graph.facebook.com/?ids=" + page + "&fields=likes", function(json) {
		$("body").data("likes", parseInt(json[page].likes / 6));
		// load processing animation
		var $canvas = $('canvas'),
			mostri = Processing.loadSketchFromSources(
				$canvas.get(0), 
				[ $canvas.attr("data-processing-sources") ]
			);
	});

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
	var call4paper = $("#call4paper");
	var call4paperHeight = call4paper.height();
	var monsterHeight = 105;

	$window
		.scroll(function() {
			var scrollTop = $window.scrollTop();
			if (scrollTop >= headerTop) {
				var position = call4paperHeight - (scrollTop - headerTop);
				if (position >= (call4paperHeight - monsterHeight)) {
					setPosition(position);
				} else {
					setPosition(call4paperHeight - monsterHeight);
				}
			} else {
				setPosition(call4paperHeight);
			}
		})
		.scroll();

	function setPosition(position) {
		call4paper.css({
			"background-position": "right " +  position + "px" 
		});
	}

});