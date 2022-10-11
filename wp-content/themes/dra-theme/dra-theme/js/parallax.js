(function (){

	var controller = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "onEnter", duration: "200%"}});
	
	var tween = new TimelineMax ()
		.add([
			TweenMax.to("#scroller-block_61a655b6fbd6c", 1, {backgroundPositionY: "50%", ease: Linear.easeNone}),
			TweenMax.fromTo("#scroller-content-block_61a655b6fbd6c", 1, {y: "100%"},{y: "-50%"}),
		]);
	
	// build scenes
	new ScrollMagic.Scene({triggerElement: "#scroller-block_61a655b6fbd6c"})
		.setTween(tween)
		//.addIndicators()
		.addTo(controller);
	
	jQuery('.slick-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: true,
		fade: true,			
		adaptiveHeight: true	
	});
	jQuery('.slick-arrow').click(function(){
		setTimeout(function(){
			jQuery('.slick-current').focus();
		},150);
		
	});
})();
	