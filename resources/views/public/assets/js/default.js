$(document).ready(function(){
	$('#menu').click(function(e){
		e.preventDefault();
		$('.menu-navigation').toggleClass('menu-navigation-open');
	});

	$('#close-menu').click(function(e){
		e.preventDefault();
		$('.menu-navigation').removeClass('menu-navigation-open');
	});

	$('#right-content').on('click', function(){
		$('.menu-navigation').removeClass('menu-navigation-open');
	});

	$('.menu-navigation').mouseleave(function(){
		$('.menu-navigation').removeClass('menu-navigation-open');
	});


	// Tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Arrow
	$('.toggle-arrow').click(function(){
		$('.ion-ios-arrow-down').toggleClass('display');
		$('.ion-ios-arrow-up').toggleClass('display');
	});



	$("#owl-example").owlCarousel({
		// Most important owl features
	    items : 1,
	    itemsCustom : false,
	    itemsDesktop : [1199,1],
	    itemsDesktopSmall : [980,1],
	    itemsTablet: [768,1],
	    itemsTabletSmall: false,
	    itemsMobile : [479,1],
	    singleItem : false,
	    itemsScaleUp : false,

		//Basic Speeds
	    slideSpeed : 200,
	    paginationSpeed : 800,
	    rewindSpeed : 1000,
	 
	    //Autoplay
	    autoPlay : true,
	    stopOnHover : true,
	 
	    // Navigation
	    rewindNav : true,
	    scrollPerPage : false,
	 
	    //Pagination
	    pagination : true,

	    // Responsive 
	    responsive: true,
	    responsiveRefreshRate : 200,
	    responsiveBaseWidth: window,
	 
	    // CSS Styles
	    baseClass : "owl-carousel",
	    theme : "owl-theme",
	 
	    //Lazy load
	    lazyLoad : false,
	    lazyFollow : true,
	    lazyEffect : "fade",
	 
	    //Auto height
	    autoHeight : true,
	 
	    //JSON 
	    jsonPath : false, 
	    jsonSuccess : false,
	 
	    //Mouse Events
	    dragBeforeAnimFinish : true,
	    mouseDrag : true,
	    touchDrag : true,
	 
	    //Transitions
	    transitionStyle : false,
	});

	getWindowHeight();

	$(window).resize(function(){
		getWindowHeight();
	});
});

function getWindowHeight()
{
	var height = $(window).height();

	$('.image img').css({
		'height' : height,
		'background-size' : cover

	});
}

