$( document ).ready( function ()
{

	$( '.comment .reply' ).click( function ()
	{
		window.location = '#' + $( this ).data( 'parent' );
	} );

	$( '.rep' ).click( function ()
	{
		window.location = '#'+'write-comment';
		var scroll_pos = $(document).scrollTop();
		$(document).scrollTop(scroll_pos-50);
		$( '.write-comment .replier' ).remove();
		var rep = '<label for="replier" class="replier"><a href="#';
		var id = $( this ).parent().attr( 'id' );
		var name = $( this ).parent().find( '.name' ).html()
		rep = rep + id + '">' + name + '</a><span class="cancel"></span></label>';
		id = id.replace( 'num-', '' );
		id = parseInt( id );
		$( 'input[name="parent_id"]' ).val( id );
		$( '.write-comment' ).prepend( rep );

		$( '.replier .cancel' ).click( function ()
		{
			$( this ).parent().remove();
			$( 'input[name="parent_id"]' ).val( 0 );
		} );
	} )

} );
/*	
 *	jQuery dotdotdot 1.2.1
 *	
 *	Copyright (c) 2011 Fred Heusschen
 *	www.frebsite.nl
 *
 *	Plugin website:
 *	dotdotdot.frebsite.nl
 *
 *	Dual licensed under the MIT and GPL licenses.
 *	http://en.wikipedia.org/wiki/MIT_License
 *	http://en.wikipedia.org/wiki/GNU_General_Public_License
 */

(function($) {
	if ($.fn.dotdotdot) return;

	$.fn.dotdotdot = function(o) {
		if (this.length == 0) {
			debug(true, 'No element found for "'+this.selector+'".');
			return this;
		}
		if (this.length > 1) {
			return this.each(function() {
				$(this).dotdotdot(o);
			});
		}


		var $dot = this,
			$tt0 = this[0];


		$dot.bind_events = function() {
			$dot.bind('update.dot'+serial, function(e, stop) {
				e.stopPropagation();

				var wrpHeight = getTrueInnerHeight($dot);
				opts.maxHeight = (typeof opts.height == 'number') ? opts.height : wrpHeight;

				$inr.empty();
				$inr.append(orgContent.clone(true));

				var after = false,
					trunc = false;

				if (opts.afterElement) {
					after = opts.afterElement.clone(true);
					opts.afterElement.remove();
				}
				if (test($inr, opts)) {
					if (opts.wrap == 'children') {
						trunc = children($inr, opts, after);
					} else {
						trunc = ellipsis($inr, $inr, opts, after);
					}
				}
				opts.isTruncated = trunc;
				return trunc;
			});
			$dot.bind('isTruncated.dot'+serial, function(e, fn) {
				var t = opts.isTruncated;
				if (typeof fn == 'function') {
					fn.call($tt0, t);
				}
				return t;
			});
			$dot.bind('destroy.dot'+serial, function(e) {
				e.stopPropagation();
				$dot.unwatch();
				$dot.unbind_events();
				$dot.empty();
				$dot.append(orgContent);
				$dot.data('dotdotdot', false);
			});
		};	//	/bind_events

		$dot.unbind_events = function() {
			$dot.unbind('.dot'+serial);
		};	//	/unbind_events

		$dot.watch = function() {
			$dot.unwatch();
			if (opts.watch == 'window') {
				$(window).bind('resize.dot'+serial, function() {
					if (watchInt) {
						clearInterval(watchInt);
					}
					watchInt = setTimeout(function() {
						$dot.trigger('update');
					}, 10);
				});
			} else {
				watchOrg = getSizes($dot);
				watchInt = setInterval(function() {
					var watchNew = getSizes($dot);
					if (watchOrg.width  != watchNew.width ||
						watchOrg.height != watchNew.height
					) {
						$dot.trigger('update');
						watchOrg = getSizes($dot);
					}
				}, 100);
			}
		};
		$dot.unwatch = function() {
			if (watchInt) {
				clearInterval(watchInt);
			}
		}



		if ($dot.data('dotdotdot')) {
			$dot.trigger('destroy');
		}

		var	opts 		= $.extend(true, {}, $.fn.dotdotdot.defaults, o),
			serial 		= $.fn.dotdotdot.serial++,
			orgContent	= $dot.contents(),
			watchOrg	= {},
			watchInt	= null,
			$inr		= $dot.wrapInner('<'+opts.wrapper+' class="dotdotdot" />').children();

		opts.afterElement	= getElement(opts.after, $inr);
		opts.isTruncated	= false;

		$inr.css({
			'height'	: 'auto',
			'width'		: 'auto'
		});

		$dot.data('dotdotdot', true);
		$dot.bind_events();
		$dot.trigger('update');
		if (opts.watch) {
			$dot.watch();
		}

		return $dot;
	};



	//	public
	$.fn.dotdotdot.serial = 0;
	$.fn.dotdotdot.defaults = {
		'wrapper'	: 'div',
		'ellipsis'	: '... ',
		'wrap'		: 'word',
		'after'		: null,
		'height'	: null,
		'watch'		: false,
		'debug'		: false
	};
	

	//	private
	function children($elem, o, after) {
		var $elements = $elem.children(),
			isFilled = false;

		$elem.empty();

		for (var a = 0, l = $elements.length; a < l; a++) {
			var $e = $elements.eq(a);
			$elem.append($e);
			if (after) {
				$elem.append(after);
			}
			if (test($elem, o)) {
				$e.remove();
				isFilled = true;
				break;
			} else {
				if (after) {
					after.remove();
				}
			}
		}
		return isFilled;
	}
	function ellipsis($elem, $i, o, after) {
		var $elements = $elem.contents(),
			isFilled = false;

		$elem.empty();

		for (var a = 0, l = $elements.length; a < l; a++) {
			if (isFilled) {
				break;
			}
			var e	= $elements[a],
				$e	= $(e);

			if (typeof e == 'undefined') {
				continue;
			}

			$elem.append($e);
			if (after) {
				$elem.append(after);
			}
			if (e.nodeType == 3) {
				if (test($i, o)) {
					isFilled = ellipsisElement($e, $i, o);
				}

			} else {
				isFilled = ellipsis($e, $i, o, after);
			}
			if (!isFilled) {
				if (after) {
					after.remove();
				}
			}
		}
		return isFilled;
	}
	function ellipsisElement($e, $i, o) {
		var isFilled	= false,
			e			= $e[0];

		if (typeof e == 'undefined') {
			return false;
		}

		var seporator	= (o.wrap == 'letter') ? '' : ' ',
			textArr		= getTextContent(e).split(seporator);

		setTextContent(e, textArr.join(seporator) + o.ellipsis);

		for (var a = textArr.length - 1; a >= 0; a--) {
			if (test($i, o)) {
				setTextContent(e, getTextContent(e).substring(0, getTextContent(e).length - (textArr[a].length + seporator.length + o.ellipsis.length)) + o.ellipsis);
			} else {
				isFilled = true;
				break;
			}
		}

		if (!isFilled) {
			var $w = $e.parent();
			$e.remove();
			isFilled = ellipsisElement($w.contents().last(), $i, o);
		}

		return isFilled;
	}
	function test($i, o) {
		return $i.innerHeight() > o.maxHeight;
	}
	function getSizes($d) {
		return {
			'width'	: $d.innerWidth(),
			'height': $d.innerHeight()
		};
	}
	function setTextContent(e, content) {
		if (e.innerText) {
			e.innerText = content;
		} else if (e.nodeValue) {
			e.nodeValue = content;
		} else if (e.textContent) {
			e.textContent = content;
		}
	}
	function getTextContent(e) {
		if (e.innerText) {
			return e.innerText;
		} else if (e.nodeValue) {
			return e.nodeValue;
		} else if (e.textContent) {
			return e.textContent;
		} else {
			return "";
		}
	}
	function getElement(e, $i) {
		if (typeof e == 'undefined') {
			return false;
		}
		if (!e) {
			return false;
		}
		if (typeof e == 'string') {
			e = $(e, $i);
			return (e.length) ? e : false;
		}
		if (typeof e == 'object') {
			return (typeof e.jquery == 'undefined') ? false : e;
		}
		return false;
	}
	function getTrueInnerHeight($el) {
		var h = $el.innerHeight(),
			a = ['paddingTop', 'paddingBottom'];

		for (z = 0, l = a.length; z < l; z++) {
			var m = parseInt($el.css(a[z]));
			if (isNaN(m)) m = 0;
			h -= m;
		}
		return h;
	}
	function debug(d, m) {
		if (!d) return false;
		if (typeof m == 'string') m = 'dotdotdot: ' + m;
		else m = ['dotdotdot:', m];

		if (window.console && window.console.log) window.console.log(m);
		return false;
	}

})(jQuery);
$(document).ready(function($) {
	$(".togglemenu,nav").on('click',function(){
		var nav=$('nav .navigation');
		nav.on('click',function  (event) {
			event.stopPropagation();
		})
		if(!nav.hasClass('show')){
			nav.parent().show();
			nav.animate({marginLeft:0},500).addClass('show');
		}
		else{
			nav.animate({marginLeft:'-80%'},500,function(){nav.parent().hide()}).removeClass('show');
		}
	})
});
$(document).ready(function() {
	$('.navbar li').on('click',function () {
		var currentElem = $(this);
		if(!currentElem.hasClass('active') && $('.navbar li:animated').size()==0){
			var activeBody=$('.navbar li.active').removeClass('active').data('rel');
			var currentBody=currentElem.addClass('active').data('rel');
			var activeStr = '.content .body .' + activeBody;
			var currentStr = '.content .body .' + currentBody;
			$(activeStr).animate({'opacity':'0'},300,function(){
				$(this).hide();
				$(currentStr).show().animate({'opacity':'1'},300);
			});
		}
	})
});
jQuery(document).ready(function() {
  var slider=$('.slider');
  slider.find('li:first-child a').delay(500).animate({"bottom":"0","opacity":"1"},500);
  function autoChange(){
    slider.find("li a").each(function(index, el) {
      $(this).animate({"bottom":"-25%","opacity":"0"},300);
    });
    slider.find('li:first-child').delay(500).animate({"marginRight":"-1200px"},900,function(){
      $(this).next().children('a').animate({'bottom':"0","opacity":"1"},500).parent().prev().appendTo('.slider .slides').css("marginRight","0")
    });
  }
  setInterval(autoChange,5000);
});
jQuery(document).ready(function($) {
	var interval = setInterval(slideshow , 4000);
	function slideshow(){
		var currentImg=$('.slideshow .slide-show li.active');
		var currentLink=$('.slideshow .links li.active');
		if(currentImg.next().next().index()!=-1){
			currentImg.animate({'opacity':'0'},function(){
				$(this).removeClass('active').css('opacity','1').next().addClass('active').removeClass('reserve').next().addClass('reserve');
			})
		}
		else if(currentImg.next().index()!=-1){
			currentImg.animate({'opacity':'0'},function(){
				$(this).removeClass('active').css('opacity','1').next().addClass('active').removeClass('reserve');
				$('.slideshow .slide-show li:first-child').addClass('reserve');
			})
		}else{
			currentImg.animate({'opacity':'0'},function(){
				$(this).removeClass('active').css('opacity','1');
				$('.slideshow .slide-show li:first-child').addClass('active').removeClass('reserve').next().addClass('reserve');
			})
		}
		/////////
		if(currentLink.next().index()!=-1)
			currentLink.removeClass('active').next().addClass('active');
		else{
			currentLink.removeClass('active');
			$('.slideshow .links li:first-child').addClass('active');
		}
	}

});
$(document).ready(function(){
	console.log();
	var oldscroll=0;
	var newscroll=$(document).scrollTop();
	var flag=0;

	$("nav").wrap('<div class="WrapNav"></div>');
    var nav=$("nav");
	nav = nav.parent();
	if(newscroll>150)
		NavIn(nav);
	$( window ).scroll(function() {
		oldscroll=newscroll;
		newscroll=$(document).scrollTop();
		if(oldscroll<150 && newscroll>150){
			flag=1;
			NavIn(nav);
		}
		else if(oldscroll>150 && newscroll<150){
			flag=0;
			NavOut(nav);
		}
		if (oldscroll>150 && newscroll > 150 && flag==0){
			flag=1;
			NavIn(nav);
		}
		if (oldscroll < 150 && newscroll < 150 && flag==1){
			flag=0;
			NavOut(nav);
		}

	});
	function NavIn(nav){
		nav.css({'position':'fixed','top':-100,'right':0,'z-index':100,'width':'100%','background-color':'white'});
		nav.css({'box-shadow':'0 0px 3px #aaa'});
		nav.css({'-webkit-box-shadow':'0 0px 3px #aaa'});
		nav.css({'-mox-box-shadow':'0 0px 3px #aaa'});
		nav.find('nav').css({'width':1200});
		nav.animate({'top':0},500);
	}
	function NavOut(){
		nav.css({'position':'static','width':'auto','background-color':'transparent'});
		nav.find('nav').css({'width':'1100px'});
		nav.css({'box-shadow':'none'});
		nav.css({'-webkit-box-shadow':'none'});
		nav.css({'-mox-box-shadow':'none'});
	}
})
$(document).ready(function () {
    function time_updater() {
        var time = $('.time-box .time .seperator');
        if(time.css('opacity')==1)
            time.css({'opacity':0});
        else
            time.css({'opacity':1});
    }
    setInterval(time_updater,1000);
    setTime();
    function setTime(){
        var data = new FormData();
        data.append('day', $('.time-box .date span').html());
        data.append('weekDayName',$('.time-box .day').html());
        data.append('hour',$('.time-box .time .hour').html());
        data.append('min',$('.time-box .time .min').html());
        $.ajax({
            url: '/getLocalTime/',
            type: 'POST',
            timeout:60000,
            data:data,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            xhr: function () {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            error:function () {
                console.log("time_updater fail.");
            }
        }).done(function (a) {
            var hour =$.parseJSON(a).hour;
            var min =$.parseJSON(a).min;
            var weekDayName =$.parseJSON(a).weekDayName;
            var day =$.parseJSON(a).day;
            $('.time-box .date span').html(day);
            $('.time-box .day').html(weekDayName);
            $('.time-box .time .hour').html(hour);
            $('.time-box .time .min').html(min);
        });
        setTimeout(setTime,60000);
    }
});


/**
 * Created by echa on 2/7/17.
 */
/*
 * dotdotdot for incoming events
 * */
window.onload=function ( )
{
	dotdotdot_update();
}
function dotdotdot_update(  )
{
	$( '.incoming-events .wrapper' ).dotdotdot({
		watch: "true",
		after: ".read-more",
		callback: function (isTruncated, orgContent) {
			if (isTruncated) {
				$('.read-more', this).show();
			}
		}
	});
	$( '.incoming-events .wrapper' ).trigger( "update" );
}

