(function( $ ){
	"use strict";
	$(document).on('click', '[data-modal]', function(event){
		event.preventDefault();
		var modalId = $(this).attr('data-modal');
		console.log(modalId);
		/**
		* You can use data attributes on the modal div to pass options to the plugin.
		* Such as ...
		* <div id="modalId" data-animation="fade" data-animationSpeed="fast">...</div>
		*/

		// Try to insert this instead of requiring t to be present from the start.
		var testModal = $("<div/>", {
			"id"				: "modal-id",
			"class"				: "modal-box",
			"data-animation"	: "fadeFromTop"
		})
		.append(
			$("<div/>", {
				"class": "modal-header"
			}).append($("<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"><i class=\"icon-remove\"></i></button>\n<h3>Modal header</h3>"))
		)
		.append(
			$("<div/>", {
				"class": "modal-body"
			}).append($("<p>Modal test content</p>"))
		)
		.append(
			$("<div/>", {
				"class": "modal-footer"
			}).append($("<a href=\"#\" class=\"button close\" data-dismiss=\"modal\">Close</a>\n<a href=\"#\" class=\"button blue-button\">The thing</a>"))
		);

		$("#"+modalId).coffeeModal($("#"+modalId).data());
	});
	$.fn.coffeeModal = function(options) {
		/**
		* The modal to be operated on
		*/
		var target_modal = this.data('toggle');

		var $doc = $(document),
		defaults = {
			animation: "fade",
			animationSpeed: 500
		};

		options = $.extend({}, defaults, options);

		return this.each(function(){
			var modal		= $(this),
				topMeasure	= parseInt( modal.css( 'top' ), 10 ),
				topOffset	= modal.height() + topMeasure,
				locked		= false,
				curtain		= $( '.curtain' ),
				cssOpts		= {
					open : {
						'top': 0,
						'opacity': 1,
						'visibility': 'visible',
						'display': 'block'
					},
					close : {
						'top': topMeasure,
						'opacity': 1,
						'visibility': 'hidden',
						'display': 'none'
					}
				}
			;

			if (curtain.length === 0) {
				curtain = $('<div />', {'class':'curtain'}).insertAfter(modal);
				curtain.fadeTo('fast', 0.8);
			}

			function unlockModal() {
				locked = false;
				
			}
			function lockModal() {
				locked = true;
				
			}
			function closeOpenModals() {
				var $openModals = $(".modal-box.open");
				if ($openModals.length === 1) {
					$openModals.trigger("modal:close");
				}
			}
			function openModal() {
				if (!locked) {
					lockModal();
					// Close open modals
					console.log(modal);
					$doc.scrollTop();
					closeOpenModals();
					modal.addClass('open');
					if (options.animation === "fadeFromTop") {
						cssOpts.open.top = $doc.scrollTop() - topOffset;
						cssOpts.open.opacity = 0;
						modal.css( cssOpts.open );
						curtain.fadeIn( options.animationSpeed / 2 );
						modal.delay(options.animationSpeed / 2)
						.animate({
							"top": $doc.scrollTop() + topMeasure + 'px',
							"opacity": 1
						},
						options.animationSpeed,
						function() {
							modal.trigger("modal:opened");
						});
					}
					if (options.animation === "fade") {
						cssOpts.open.top = $doc.scrollTop() + topMeasure;
						cssOpts.open.opacity = 0;
						modal.css(cssOpts.open);
						curtain.fadeIn(options.animationSpeed / 2);
						modal.delay(options.animationSpeed / 2)
						.animate({
							"opacity": 1
						},
						options.animationSpeed,
						function() {
							modal.trigger('modal:opened');
						});
					}
				}
			}
			function closeModal() {
				
				if (!locked) {
					lockModal();
					modal.removeClass("open");
					if (options.animation === "fadeFromTop") {
						modal.animate({
							"top": $doc.scrollTop() - topOffset + 'px',
							"opacity": 0
						},
						options.animationSpeed / 2,
						function() {
							modal.css(cssOpts.close);
							modal.trigger('modal:closed');
						});
					}
					if (options.animation === "fade") {
						modal.animate({
							"opacity": 0
						},
						options.animationSpeed / 2,
						function() {
							modal.css(cssOpts.close);
							modal.trigger("modal:closed");
						});
					}
					curtain.fadeOut( options.animationSpeed / 2);
				}
			}

			modal.bind('modal:open', openModal());
			modal.bind('modal:close', closeModal());
			modal.bind("modal:opened modal:closed", unlockModal());
			
			modal.trigger('modal:open');
			
			$("[data-dismiss='modal']").bind("click", function(e) {
				e.preventDefault();
				closeModal();
			});
		});
	};
})( jQuery );