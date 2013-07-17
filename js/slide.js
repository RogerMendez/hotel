animatedcollapse.addDiv('first', 'fade=1,speed=400,group=pets')
animatedcollapse.addDiv('second', 'fade=1,speed=400,group=pets,persist=1,hide=1')
animatedcollapse.addDiv('third', 'fade=1,speed=400,group=pets,hide=1')

animatedcollapse.ontoggle=function($, divobj, state){ //fires each time a DIV is expanded/contracted
	//$: Access to jQuery
	//divobj: DOM reference to DIV being expanded/ collapsed. Use "divobj.id" to get its ID
	//state: "block" or "none", depending on state
}

animatedcollapse.init()