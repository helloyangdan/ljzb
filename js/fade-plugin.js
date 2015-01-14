/**
 * 2013-09-13 添加左右箭头按钮, 1. API - arrowButton & arrowHoverShow; 2. function - createArrowButtons() , clickArrow() & hoverToShowArrow();
 */

(function ($) {
	function FadeTransition(element, opts) {
		var el = element,
			$el = $(el),
			fadeTimer = null,
			current = 0,
			paused = false,
			self = this,
			options = $.extend({pauseTime: 5000,
								transitionTime: 2000,
								ignore: null,
								singleLoop: false,
								delayStart: 0,
								pauseOnMouseOver: false,
								manualNavigation: false,
								createNavButtons: false,
								navButtonContainer: null,
								arrowButton: false,
								arrowHoverShow: false}, opts),
			els = (options.ignore)?$("> *:not(" + options.ignore + ")", el):$("> *", el);
								
		function setup() {
			$el.css("position", "relative");
			els.css("display", "none").css({left: 0, top: 0, position: "absolute"});
			els.filter(':first').css("display", "block");
		  
			if (options.createNavButtons) {
				createNavButtons();
				highlightNav();
			}
		
			if (options.pauseOnMouseOver) {
				$el.mouseover(pause).mouseout(unpause);
				$('a', options.navButtonContainer || el).mouseover(pause).mouseout(unpause);
			}
		
			if (options.delayStart > 0) {
				setTimeout(start, options.delayStart);
			}
			else {
				start();
			}

			if(options.arrowButton){
				createArrowButtons();
				clickArrow();
				if(options.arrowHoverShow){
					hoverToShowArrow();
				}
			}
		}
		
		function transitionTo(nextIdx) {
			$(els[current]).fadeOut(options.transitionTime);
			$(els[current = nextIdx]).fadeIn(options.transitionTime, cue);
			highlightNav();
		}
		
		function manualNav(e) {
			var idx;
			this.blur();
			$(els).stop(true);
			clearTimeouts();
			$(els).css({'opacity': 1, 'display': 'none'});
			$(els[current]).css({'display': 'block'});
			idx = $('.fadenav a', el).index(this);
			transitionTo(idx);
			e.preventDefault();
		}
		  
		function createNavButtons() {
			var i, nav = $('<div class="fadenav"></div>');
			for (i=0; i<els.length; i++) {
				$('<a class="nav' + i + '" href="#">&nbsp;</a>', options.navButtonContainer || el).click(manualNav).appendTo(nav);
			}
			
			nav.appendTo(options.navButtonContainer || el);
		}

		function createArrowButtons(){
			$('<div class="arrow-wrapper">' + 
				'<div class="left"><a href="javascript:void(0)" class="left">&nbsp</a></div>' +
				'<div class="right"><a href="javascript:void(0)" class="right">&nbsp</a></div>' +
			'</div>').appendTo(el);
		}

		function clickArrow(){
			$('.arrow-wrapper a', el).click(function(){
				var index, nextIndex, dir, len = $('.fadenav a', el).length;
				$(this).hasClass('left') ? dir = 'left' : dir = 'right';
				$('.fadenav a', el).each(function(){
					if($(this).hasClass('current')){
						index = $(this).index();
					}
				});
				switch(true){
					case dir == 'left' && index != 0:
						nextIndex = index - 1;
						break;
					case dir == 'right' && index != len - 1:
						nextIndex = index + 1;
						break;
					case dir == 'left' && index == 0:
						nextIndex = len - 1;
						break;
					case dir == 'right' && index == len - 1:
						nextIndex = 0;
						break;
					default:
						break;
				}
				$(els[current]).fadeOut(options.transitionTime);
				$(els[current = nextIndex]).fadeIn(options.transitionTime, cue);
				highlightNav();
			});
		}

		function hoverToShowArrow(){
			$('.arrow-wrapper div', el).each(function(){
				$(this).hover(function(){
					$(this).find('a').stop().animate({opacity:1},300);
				}, function(){
					$(this).find('a').stop().animate({opacity:0},300);
				});
			});
		}
		
		function highlightNav() {
			if (options.createNavButtons) {
				$('.fadenav a', options.navButtonContainer || el).removeClass('current');
				$('.fadenav a:nth-child(' + (1 + current) + ')', options.navButtonContainer || el).addClass('current');
			}
		}
		  
		function start() {
			if (options.ignore) {
				$(options.ignore, el).fadeOut(options.transitionTime);
				$(els[current]).fadeIn(options.transitionTime);
				fadeTimer = setTimeout(self.next, options.pauseTime + options.transitionTime);
			}
			else {
				highlightNav();      
				if (!options.manualNavigation) {
					fadeTimer = setTimeout(self.next, options.pauseTime);
				}
			}
		}
		
		function pause() {
			paused = true;
			clearTimeouts();
		}
		
		function unpause() {
			paused = false;
			cue();
		}
		
		function clearTimeouts() {
			if (fadeTimer) {
				window.clearTimeout(fadeTimer);
				fadeTimer = null;
			}
		}
		
		this.show = function(item) {
			if (typeof(els[item]) !== 'undefined') {
				clearTimeouts();
				transition(item);
			}
		  
			return this;
		};
		
		this.currentItem = function() {
			return current;
		}
		
		function cue() {
			if (paused || options.manualNavigation || (els.length < 2)) {
				return false;
			}
			clearTimeouts();
			fadeTimer = window.setTimeout(self.next, options.pauseTime);
		}
		
		this.next = function() {
			if (!options.singleLoop || ((current + 1) % els.length > 0)) {
				transitionTo((current + 1) % els.length || 0);
			}
		};

		this.prev = function() {
			transitionTo(((current || els.length) - 1) % els.length);
		};

		$el.data('Fader', this);
		setup();
	}
  
	$.fn.fadeTransition = function(options) {
		function getFader() {
			if (typeof $(this).data('Fader') === 'object') {
			  return $(this).data('Fader');
			}
			else {
			  return new FadeTransition(this, options);
			}
		}
		
		this.fader = function() {
			if (typeof $(this).filter(':first').data('Fader') === 'object') {
			  return $(this).filter(':first').data('Fader');
			}
		  
			return null;
		};
		
		return this.each(getFader);
	};
}(jQuery));

