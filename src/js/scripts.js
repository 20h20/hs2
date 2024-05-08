/*include /libs/jquery.core.js*/
/*include /libs/slick.js*/
/*include /libs/aos.js*/

(function($) { 
	
	var Master = {
		onready : function(){

			//////////////////// VIDÉO ////////////////////
			$( ".cbo-homevideo .video-player" ).on("click", function() {
				$('.video-player').addClass('active');
			});
			
			/////////////////// SMARTPHONE NAVIGATION ///////////////////
			$('.hs-hamburger-menu').on('click', function(){
				$('.header-nav').toggleClass('hs-responsive-menu-open');
				$('.hs-overlay').toggleClass('hs-overlay_open');
			});

			$('.hs-hamburger-menu').on('click', function(){
				$('.hs-hamburger-menu').toggleClass('hs-hamburger-menu-cross');
			});

			$('.header-nav .menu-item-has-children').click( function(){
				$('.sub-menu').removeClass('sub-menu-first-level');
				$(this).find('.sub-menu').addClass('sub-menu-first-level');
			});

			$('.menu-item-has-children').click( function(){
				$('a').removeClass('hs-sub-open');
				$(this).find('a').toggleClass('hs-sub-open');
			})

			//////////////// STICKY ////////////////
			$(window).scroll(function(){
				if($(window).scrollTop()>80){
					$("header").addClass('header-scroll');
				}else{
					$("header").removeClass('header-scroll');
				}
			})
			.scroll();

			//////////////// SUB-MENU HOVER ////////////////
			$('header .menu-item').hover(function(){ 
				$('.hs-overlay_dropdown').addClass('hs-overlay_dropdown-open');
			},
			function(){ 
				$('.hs-overlay_dropdown').removeClass('hs-overlay_dropdown-open');
			})

			/////////////////// SCROLL ANCHOR ///////////////////
			$('a[href^="#"]').click(function(){
				var the_id = $(this).attr("href");

				$('html, body').animate({
					scrollTop:$(the_id).offset().top
				}, 'slow');
				return false;
			});
			
			//////////////// ACCORDION ////////////////
			$('.toggle').click(function(e) {
				e.preventDefault();
				var $this = $(this);
				if ($this.next().hasClass('show')) {
					$this.next().removeClass('show');
					$this.next().slideUp(350);
				} else {
					$this.next().toggleClass('show');
					$this.next().slideToggle(350);
				}
			});

			//////////////////// FOOTER ////////////////////
			$('footer .footer-title').on('click', function(){
				$('.footer-nav').not($(this).siblings('.footer-nav')).removeClass('nav--open');
				$(this).siblings('.footer-nav').toggleClass('nav--open');
				$(this).toggleClass('title--open');
			});

			//////////////////// SEARCH MODALE ////////////////////
			$('.search-button').on('click', function(){
				$('.hs-overlay-search').toggleClass('hs-overlay-search-open');
				$('body').toggleClass('body-noscroll');
			});
			$('.hs-overlay-search .search-close').on('click', function(){
				$('.hs-overlay-search').removeClass('hs-overlay-search-open');
				$('body').removeClass('body-noscroll');
			});

			//////////////////// SEARCH MODALE - FOCUS ON INPUT ////////////////////
			var searchInput = document.getElementById('s');
			var searchButton = document.querySelector('.search-button');
			searchButton.addEventListener('click', function() {
				searchInput.focus();
			});

			/////////////////// SLIDER PARTNERS ///////////////////
			$('.partners-list').slick({
				arrows : false,
				dots: false,
				infinite: true,
				slidesToShow: 6,
				slidesToScroll: 6,
				speed: 20000,
				autoplay: true,
				autoplaySpeed: 0,
				cssEase: 'linear',  
				responsive: [
					{
						breakpoint: 991,
						settings: {
							slidesToShow: 5,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					}
				]
			});

			/////////////////// AOS : SCROLL ANIMATIONS ///////////////////
			AOS.init({})
		},

		onload : function(){

		},

		onresize : function(){

		},

		onscroll : function(){

		},
	
	};

	$(document).ready( function(){
		Master.onready();
		
	});

	$(window).load( function(){
		Master.onload();
	});

	$(window).resize( function(){
		Master.onresize();
	});

	$(window).on('scroll', function(){
		Master.onscroll();
	});

})(jQuery);