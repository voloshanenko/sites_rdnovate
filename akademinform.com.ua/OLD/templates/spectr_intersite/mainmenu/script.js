if (window.jQuery && jQuery.noConflict && (typeof $('body') == 'object')) {
	jQuery.noConflict();
}
function switchFontSize (ckname,val){
	var bd = $$('body')[0];
	switch (val) {
		case 'inc':
		if (CurrentFontSize+1 < 7) {
			bd.removeClassName('fs'+CurrentFontSize);
			CurrentFontSize++;
			bd.addClassName('fs'+CurrentFontSize);
		}
		break;
		case 'dec':
		if (CurrentFontSize-1 > 0) {
			bd.removeClassName('fs'+CurrentFontSize);
			CurrentFontSize--;
			bd.addClassName('fs'+CurrentFontSize);
		}
		break;
		default:
		bd.removeClassName('fs'+CurrentFontSize);
		CurrentFontSize = val;
		bd.addClassName('fs'+CurrentFontSize);
	}
	createCookie(ckname, CurrentFontSize,365);
}

function switchTool (ckname, val) {
	createCookie(ckname, val, 365);
	window.location.reload();
}

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };

function menuFistLastItem () {
	if ((menu = $('nav')) && (children = menu.childElements()) && (children.length)) {
		children[0].addClassName ('first');
		children[children.length-1].addClassName ('last');
	}
}

//Add span to module title
function addSpanToTitle () {
	//var colobj = document.getElementById ('ja-col');
	//if (!colobj) return;
	var modules = $$('.side-col .box .head h4','.jm-product-list h2','.jm-products-slider-listing h2','.jm-product-list-bycat h2');
	if (!modules) return;
	modules.each (function(title){
		var html = title.innerHTML;
		var text = html.stripTags();
		var pos = text.indexOf(' ');
		if (pos!=-1) {
			text = text.substr(0,pos);
		}
		title.update(html.replace(new RegExp (text), '<span class="first-word">'+text+'</span>'));
	});
}

document.observe("dom:loaded", function() {   
	// initially hide all containers for tab content $$('div.tabcontent').invoke('hide'); 
	menuFistLastItem();
	navMouseHover();
	//addSpanToTitle();
	//makeEqualHeight ($$('.category-listing .jm-boxwrap'));
	//makeEqualHeight ($$('#ja-botsl .box'));
}); 

//Add hover event for li - hack for IE6
function navMouseHover () {
	var lis = $$('#nav li');
	if (lis && lis.length) {
		lis.each (function(li){
			li.onMouseover = toggleMenu (li, 1);
			li.onMouseout = toggleMenu (li, 0);
		});
	}
}

toggleMenu = function (el, over) {
	  var iS = false;
    if (Element.childElements(el) && Element.childElements(el).length > 1) {
	    var uL = Element.childElements(el)[1];
			iS = true;
		}
    if (over) {
        Element.addClassName(el, 'over');
				Element.addClassName (el.down('a'), 'over');
        if(iS){ uL.addClassName('shown-sub')};
    }
    else {
        Element.removeClassName(el, 'over');
				Element.removeClassName (el.down('a'), 'over');
        if(iS){ uL.removeClassName('shown-sub')};
    }
}

function makeEqualHeight(divs, offset) {
	if (!offset) offset = 0;
	if(!divs || divs.length < 2) return;
	var maxh = 0;
	divs.each(function(el){
		var ch = el.getHeight();
		maxh = (maxh < ch) ? ch : maxh;
	});
	maxh += offset;
	divs.each(function(el){
		el.setStyle({height: (maxh-parseInt(el.getStyle('padding-top'))-parseInt(el.getStyle('padding-bottom'))) + 'px'});
	});
}
/**
 * Create a cookie with the given name and value and other optional parameters.
 *
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Set the value of a cookie.
 * @example $.cookie('the_cookie', 'the_value', { expires: 7, path: '/', domain: 'jquery.com', secure: true });
 * @desc Create a cookie with all available options.
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Create a session cookie.
 * @example $.cookie('the_cookie', null);
 * @desc Delete a cookie by passing null as value. Keep in mind that you have to use the same path and domain
 *       used when the cookie was set.
 *
 * @param String name The name of the cookie.
 * @param String value The value of the cookie.
 * @param Object options An object literal containing key/value pairs to provide optional cookie attributes.
 * @option Number|Date expires Either an integer specifying the expiration date from now on in days or a Date object.
 *                             If a negative value is specified (e.g. a date in the past), the cookie will be deleted.
 *                             If set to null or omitted, the cookie will be a session cookie and will not be retained
 *                             when the the browser exits.
 * @option String path The value of the path atribute of the cookie (default: path of page that created the cookie).
 * @option String domain The value of the domain attribute of the cookie (default: domain of page that created the cookie).
 * @option Boolean secure If true, the secure attribute of the cookie will be set and the cookie transmission will
 *                        require a secure protocol (like HTTPS).
 * @type undefined
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */

/**
 * Get the value of a cookie with the given name.
 *
 * @example $.cookie('the_cookie');
 * @desc Get the value of a cookie.
 *
 * @param String name The name of the cookie.
 * @return The value of the cookie.
 * @type String
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */
jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;

    }
};
/**
 * JA Slider Toggle Plugin
 * 
 * Slide up and Slide down  HTML Content of Box.
 * 
 * HTML Format: 
 * <div class="box">
 * 	 <div class="header"></div>
 *   <div class="content"></div>
 * </div>
 * 
 */
(function($) { 
	$.fn.jaSlideToggle = function (_options){
		var defaults = {
				classShow	  : 'show',
				classeHide	  : 'hide',
				defaultMode   : 'show' 
		};
	  var options = $.extend(defaults, _options);
	  // process slider toogle operation.
	  $.fn.jaSlideToggle.toggle = function (header, mode){
  	     if(mode == 'show'){
			header.next('.content').slideDown('fast', function(){ 
				header.removeClass(options.classeHide).addClass(options.classShow);
			});
		 } else {
			header.next('.content').slideUp('fast', function(){
				header.removeClass(options.classShow).addClass(options.classeHide);
			});	
		 }	
	  };
	  // using core slider toggle
	  return this.each(function() { 
			var $this	   = this;	
			var header     = $($this).children().filter('.head');		
			var cookieName = "JaSlideToggle_"+$(header).text().replace(/(\s+)+/g,'').replace(/([^\w]+)/g,'');
			// restore display slider mode.
			if($.cookie(cookieName) != null){
				 $.fn.jaSlideToggle.toggle(header,  $.cookie(cookieName));
			} else {
				 // using default status
				 $.fn.jaSlideToggle.toggle(header, options.defaultMode);
			}
			// processing with click event
			header.click(function(){
				$(this).next('.content').slideToggle("slow", function () {
					if($(this).is(':visible')){
						$.cookie(cookieName, 'show', { expires: 100 });
						header.removeClass(options.classeHide).addClass(options.classShow);
					} else {
						$.cookie(cookieName, 'hide', { expires: 100 });
						header.removeClass(options.classShow).addClass(options.classeHide);
					}
				} );
			});
		});	
	}
	
})(jQuery);

jQuery.noConflict();
jQuery("#ja-col1").ready(function($){
	$("#ja-col1 .box").jaSlideToggle();
});
