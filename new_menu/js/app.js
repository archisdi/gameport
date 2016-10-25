(function($){
	$(document).ready(function(){
		if ($('.nav-button').length > 0 || $('.nav-button-slider').length > 0 || $('a.button > i.icon-reorder').length > 0) {
			$(".nav > ul").each(function(){
				$(this).addClass("nav-collapse");
			});
		}

		$(".nav-button").on("click", function(){
		
			if ($('nav').hasClass("right")) {
				$(this).addClass('right');
			}
			//$(".nav-collapse").slideToggle();
			if ($(".nav-collapse").css('display') === 'none') {
				$(".nav-collapse").slideDown();
			} else {
				$(".nav-collapse").slideUp('fast', function(){
					$(this).attr('style', '');
				});
			}
		});

		var lockNavBar = false;

		if (window.Modernizr.touch || navigator.userAgent.match(/Windows Phone/i)) {
			$(document).on('click touchstart', '.has-flyout > a', function (e) {
				var flyout = $(this).siblings('.flyout').first();
				console.log( $(this).parent().height() );
				if(flyout.css('display') === 'none')
				{
					e.preventDefault();
					$('.flyout').not(flyout).slideUp(500);
					flyout.slideDown(500, function() {
						lockNavBar = true;
					})
					
				}

				// Old menu implementation
				// (lockNavBar) ? e.preventDefault() : "";
				// var flyout = $(this).siblings('.flyout').first();
				// console.log(flyout.css('display'));
				// if (lockNavBar === false) {
				// 	$('.flyout').not(flyout).slideUp(500);
				// 	flyout.slideToggle(500, function () {
				// 		lockNavBar = false;
				// 	});
				// }
				// lockNavBar = true;
			});
			$('.nav>li.has-flyout', this).addClass('is-touch');
		} else {
			$('li.has-flyout').on("mouseenter",
				function(){
					$(this).children('.flyout').slideDown();
				}
			);
			$('li.has-flyout').on("mouseleave",
				function(){
					$(this).children('.flyout').slideUp();
				}
			);
		}

		$('.has-flyout').each(function(index, element) {
			var that = this;
			$('#' + element.id + " > a span.icon_menu_handle").css({
				'background-image': 'url(images/caret.png)',
				'background-position': '90% 15px',
				'background-repeat': 'no-repeat',
				'opacity': 0.6
			});
		});

		$(".select-nav").tinyNav();

		$(".tabs li").on("click", function(e) {
			e.preventDefault();
			$(".active").removeClass('active');
			$(this).addClass('active');
			var thisPane = $(this).children('a').attr('href');
			$(thisPane).addClass('active');
		});
	});
})(jQuery);
