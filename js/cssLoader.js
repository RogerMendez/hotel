$(function() {
	
		jQuery('#switcher_btn').click(showPanel);
		jQuery('.close_btn').click(hidePanel);
		
		function showPanel(){
		jQuery('#styleSwitcher').delay(300).slideDown('medium');
		jQuery('#switcher_btn').fadeOut('fast');}
		
		function hidePanel(){
		jQuery('#styleSwitcher').fadeOut('medium');
		jQuery('#switcher_btn').delay(700).fadeIn('slow');}
		
		jQuery(".p1").mousedown(function(){jQuery("body").css("background-image","url('images/pattern/1.png')")})
		jQuery(".p2").mousedown(function(){jQuery("body").css("background-image","url('images/pattern/2.png')")})
		jQuery(".p3").mousedown(function(){jQuery("body").css("background-image","url('images/pattern/3.png')")})
		jQuery(".p4").mousedown(function(){jQuery("body").css("background-image","url('images/pattern/4.png')")})
		jQuery(".p5").mousedown(function(){jQuery("body").css("background-image","url('images/pattern/5.png')")})
		jQuery(".p6").mousedown(function(){jQuery("body").css("background-image","url('images/pattern/6.png')")})
		jQuery(".p7").mousedown(function(){jQuery("body").css("background-image","url('images/pattern/7.png')")})
		jQuery(".p8").mousedown(function(){jQuery("body").css("background-image","url('images/pattern/8.png')")})
		jQuery(".p9").mousedown(function(){jQuery("body").css("background-image","url('images/pattern/9.png')")})
		
});

		

