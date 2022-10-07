$(document).ready(function(){	
    
		
	 $('.slider-nav').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
      autoplay: true,
      autoplaySpeed: 3000,
	  asNavFor: '.item-logo'
	});
	
	$('.item-logo').slick({
	  dots: false,	
	  arrows: false,
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  autoplaySpeed: 2500,
	  autoplay:true,
	  pauseOnHover: false,
	  focusOnSelect: true,
	  asNavFor: '.slider-nav',
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			slidesToShow: 4,
		  }
		},
		{
		  breakpoint: 520,
		  settings: {
			slidesToShow: 3,
		  }
		},
		{
		  breakpoint: 320,
		  settings: {
			slidesToShow: 2,
		  }
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	  ]
	});
	
});


