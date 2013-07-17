$(document).ready(function() { 

	/* for top navigation */
	// ------------------------------------------------------------
	$(" .main-menu ul li ul ").css({display: "none"}); // Opera Fix
	$(" .main-menu ul li").hover(function(){
	$(this).find('ul:first').css({visibility: "visible",display: "none"}).fadeIn(300);
	},function(){
	$(this).find('ul:first').css({visibility: "visible"}).fadeOut(70);
	});

	/* for navigation sliding */
	// ------------------------------------------------------------
	$('.testimonial ul').cycle({
        fx: "scrollDown",
        easing: "easeOutCubic",
        speed: 600,
        timeout: 5000
    	});
	
	// Tipsy Init
	// ------------------------------------------------------------	
	$(function() {
		$('ul.socialNav li a').tipsy({fade: true, gravity: 'n'});
		$('div#contactInformation a').tipsy({fade: true, gravity: 'n'});
		$('.texture li').tipsy({fade: true, gravity: 'n'});
		
	});
	
	// To Top Plugin
	// ------------------------------------------------------------	
	$(function() {
		$().UItoTop({ easingType: 'easeOutQuart' });
	});
	
	// Slide Down Slider
	// ------------------------------------------------------------	
	$(".slide-down-slider").css('opacity', '0'); 
	$(".slide-down-slider").animate({opacity:'1'},{duration:100}); 
	$(".slide-down-slider").hover ( 
	function() { 
		$(this).children(".text_slider").animate({
			top:(375-$(this).children(".text_slider").height())+"px"},{queue:false,duration:200}); } ,
		function() { 
		$(this).children(".text_slider").animate({top:"330px"},{queue:false,duration:350})			
		; } );
	
	
	// Elastic Image Slideshow
	// ------------------------------------------------------------
	$(function(){
		$('#ei-slider').eislideshow({
				animation			: 'center',
				autoplay			: true,
				slideshow_interval	: 3000,
				titlesFactor		: 0
		});
	});
	
	
	// Preloader
	// ------------------------------------------------------------
	$(".imageWrap").preloader();
	$(".image_slider").preloader();
	
	// Hovers
	// ------------------------------------------------------------	
	jQuery('.imageWrap a').hover(function(){jQuery(this).find('span').stop(false,true).fadeIn(300);},
	function(){jQuery(this).find('span').stop(false,true).fadeOut(300);});
	
	
	// Random Portofolio Widget
	// ------------------------------------------------------------
	$('#rPortofolio').slides({
				preload: true,
				play: 4000,
				pause: 2500,
				hoverPause: true,
				generateNextPrev: false,
				generatePagination: false
	});
	
	// Zebra Table
	// ------------------------------------------------------------
	$(function() {
		$(".basicTable table tbody tr:even").addClass("even");
		$(".basicTable table tbody tr:odd").addClass("odd");
	});
	
	// Lightbox Prettyphoto
	// ------------------------------------------------------------
	$("area[rel^='prettyPhoto']").prettyPhoto();
			
	$(".gallery:first a[data-rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'default',slideshow:3000, autoplay_slideshow: true});
	$(".gallery:gt(0) a[data-rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});

	$(".imageWrap:first a[data-rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',slideshow:10000, hideflash: true});
	$(".imageWrap:gt(0) a[data-rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',slideshow:10000, hideflash: true});
	$('a[data-rel]').each(function() {
    $(this).attr('rel', $(this).data('rel'));
	});
	
	// Piecemaker Slider
	// ------------------------------------------------------------	
	$(function() {
		var flashvars = {};
		flashvars.cssSource = "./css/piecemaker.css";
		flashvars.xmlSource = "./css/piecemaker.xml";
		
		var params = {};
		params.play = "true";
		params.menu = "false";
		params.scale = "showall";
		params.wmode = "transparent";
		params.allowfullscreen = "true";
		params.allowscriptaccess = "always";
		params.allownetworking = "all";
		
		swfobject.embedSWF('piecemaker.swf', 'piecemaker', '1000', '600', '10', null, flashvars,    
		params, null);
	});
	
})(jQuery);
