(function (){

var scaleDown = {
	scale:1.1,
	opacity:null
};
var fadeUp = {
	distance: '50px',
	opacity:0,
	origin: 'bottom',
	interval:300,
};
var slideUp = {
	distance: '30px',
	opacity:null,
	origin: 'bottom',
	interval:100,
};
var fadeRight = {
	distance: '50px',
	opacity:0,
	origin: 'left',
};
var fadeLeft = {
	distance: '50px',
	opacity:0,
	origin: 'right',
};

	ScrollReveal({ duration: 1000, reset:false, mobile:false, viewFactor: 0  });
setTimeout(function(){
	ScrollReveal().reveal('.scale-down',scaleDown);
	ScrollReveal().reveal('.fade-up',fadeUp);
	ScrollReveal().reveal('.fade-right',fadeRight);
	ScrollReveal().reveal('.fade-left',fadeLeft);
	ScrollReveal().reveal('.slide-up',slideUp);


	ScrollReveal().reveal('.slider-fade-up',fadeUp);
},250)

	// var lastScrollTop = 0;
	// jQuery(window).scroll(function(event){
	// 	var st = jQuery(this).scrollTop();
	// 	console.log(st);
	// 	if(st > 0){
	// 		if (st > lastScrollTop && st > 250){
	// 			jQuery('#main_navbar').removeClass('fixed-nav');
	// 		} else {
	// 			jQuery('#main_navbar').addClass('fixed-nav');
	// 		}
	// 	}else{
	// 		jQuery('#main_navbar').addClass('fixed-nav');
	// 	}
	// 	lastScrollTop = st;
	// });
})();
