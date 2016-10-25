/**
 * This plugin has some structural requirements for the html.
 * <body>
 *		<nav class="nav">
 *			<ul class="nav-collapse">
 *				<li>
 *					<a href="index.html">Home</a>
 *				</li>
 *				.
 *				.
 *				.
 *			</ul>
 *		</nav>
 *		<button class="button nav-button-slider">
 *			<i class="icon-reorder"></i>
 *		</button>
 *
 *		<div class="container">
 *		.
 *		.
 *		.
 *		</div>
 *	</body>
 *
 *	The nav-button-slider button should be outside the nav element it
 *	controls and also outside the main container, yet inside the body 
 *	tag.
 *
 *  No action is required for this plugin to work.  It will simply
 *  listen for click events on the nav-button-slider.
 */

(function($){
	"use strict";
	$(document).on("click", ".nav-button-slider", function(e){
		e.preventDefault();
		$(this).coffeeMenuSlider($(this).data());
	});
	var methods = {
		init: function(options) {
			var defaults = {
				direction: "left",
				selector: ".nav",
				display_class: ""
			};

			options = $.extend({}, defaults, options);

			return this.each(function(){
				methods.removeExistingSlidingMenu(options);
				methods.buildMenu(options);
			});
		}
		, buildMenu: function(options){
			var menu = $(options.selector).clone();
			var menuContainer = $("<div/>", {
				"class": options.direction + "-menu-container " + options.display_class
			});

			$(menu).appendTo(menuContainer);
			$(menuContainer).appendTo('body');
			$("." + options.direction + "-menu-container > nav > ul").removeClass("nav-collapse");
			
			methods.toggleMenu(options);
		}
		, toggleMenu: function(options){
			switch(options.direction)
			{
				case "top":
					methods.slideFromTop();
					break;
				case "right":
					methods.slideFromRight();
					break;
				case "bottom":
					methods.slideFromBottom();
					break;
				case "left":
					methods.slideFromLeft();
					break;
			}
		}
		, slideFromTop: function(){
			$('body').toggleClass("fromTop");
			$('.fromTop .top-menu-container').animate({
				"margin-top": "0px",
				"display": "block"
			}, 200);
		}
		, slideFromRight: function(){
			$('body').toggleClass("fromRight");
			$('.fromRight .right-menu-container').animate({
				"margin-left": "20%",
				"display": "block"
			});
		}
		, slideFromBottom: function(){
			$('body').toggleClass("fromBottom");
			$('.fromBottom .bottom-menu-container').animate({
				"margin-top": "45%"
			});
		}
		, slideFromLeft: function(){
			$('body').toggleClass("fromLeft");
			$('.fromLeft .left-menu-container').animate({
				"margin-left": "0px",
				"display": "block"
			});
		}
		, removeExistingSlidingMenu: function(options) {
			$("." + options.direction + "-menu-container").remove();
		}
	};
	$.fn.coffeeMenuSlider = function(method) {
		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Method ' +  method + ' does not exist on jQuery.coffeeMenuSlider');
		}
	};
})(jQuery);