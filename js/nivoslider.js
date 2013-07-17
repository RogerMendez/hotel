// Nivo slider

$(window).load(function() {
        $('#sliderv').nivoSlider({ pauseTime: parseInt(5000), pauseOnHover: true, effect: 'random', controlNav: true, captionOpacity: .7, directionNavHide: true, controlNavThumbs:false, controlNavThumbsFromRel:false, boxCols:8, boxRows:4, afterLoad: function(){ 
		$('#slider_loading').css('display', 'none');
		$('#slider_wrapper').css('visibility', 'visible');
	} });
});