/*
 * Modernizr touch detection only
 */
if ( typeof( Modernizr ) === 'undefined' ) {
	;window.Modernizr=function(a,b,c){function v(a){i.cssText=a}function w(a,b){return v(l.join(a+";")+(b||""))}function x(a,b){return typeof a===b}function y(a,b){return!!~(""+a).indexOf(b)}function z(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:x(f,"function")?f.bind(d||b):f}return!1}var d="2.8.3",e={},f=b.documentElement,g="modernizr",h=b.createElement(g),i=h.style,j,k={}.toString,l=" -webkit- -moz- -o- -ms- ".split(" "),m={},n={},o={},p=[],q=p.slice,r,s=function(a,c,d,e){var h,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:g+(d+1),l.appendChild(j);return h=["&#173;",'<style id="s',g,'">',a,"</style>"].join(""),l.id=g,(m?l:n).innerHTML+=h,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=f.style.overflow,f.style.overflow="hidden",f.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),f.style.overflow=k),!!i},t={}.hasOwnProperty,u;!x(t,"undefined")&&!x(t.call,"undefined")?u=function(a,b){return t.call(a,b)}:u=function(a,b){return b in a&&x(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=q.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(q.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(q.call(arguments)))};return e}),m.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:s(["@media (",l.join("touch-enabled),("),g,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c};for(var A in m)u(m,A)&&(r=A.toLowerCase(),e[r]=m[A](),p.push((e[r]?"":"no-")+r));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)u(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof enableClasses!="undefined"&&enableClasses&&(f.className+=" "+(b?"":"no-")+a),e[a]=b}return e},v(""),h=j=null,e._version=d,e._prefixes=l,e.testStyles=s,e}(this,this.document);
}


/**
 * Scroll to the nearest full screen area
 */
jQuery(document).ready(function($) {
	function _isMobile() {
		return ( Modernizr.touch && jQuery(window).width() <= 1000 ) || // touch device estimate
	 	 	   ( window.screen.width <= 1024 ); // device size estimate
	}
	if ( _isMobile() ) {
		return;
	}
	if ( ! $('body').is('.blog') && ! $('body').is('.archive') && ! $('body').is('.search') ) {
		return;
	}
	
    if ( typeof $.easing.easeInOutCubic === 'undefined' ) {
        $.extend( $.easing, {
			easeInOutCubic: function (x, t, b, c, d) {
		        if ((t/=d/2) < 1) return c/2*t*t*t + b;
		        return c/2*((t-=2)*t*t + 2) + b;
		    }
        });
    }
	
	function isPastLastArticle() {
		var last = $('article.post, #masthead').eq(-1);
		if ( last.length > 0 ) {
			if ( $(window).scrollTop() > last.offset().top + last.height() / 6 ) {
				return true;
			}
		}
		return false;
	}
	
	function getNearestArticle() {
		var dist = 9999999;
		var closestArticle = null;
		var scrollMidLocation = $(window).scrollTop() + $(window).height() / 2,
		articleMid,
		currDist;
		$('article.post, #masthead').each(function() {
			articleMid = $(this).offset().top + $(this).height() / 2;
			currDist = Math.abs( articleMid - scrollMidLocation );
			if ( currDist < dist ) {
				dist = currDist;
				closestArticle = $(this);
			}
		});
		
		return closestArticle;
	}
	
	var scrollTimer = null;
	var isAutoScroll = false;
	function scrollNearbyArticle() {
		var nearestArticle = getNearestArticle();
		
		if ( nearestArticle === null ) {
			return;
		}
		
		if ( isPastLastArticle() ) {
			return;
		}
		
		$('body').animate({
			scrollTop: nearestArticle.offset().top
		}, {
			duration: 800,
			easing: 'easeInOutCubic',
			step: function() {
				isAutoScroll = true;
			},
			progress: function() {
				isAutoScroll = true;
			}
		});
	}
	
	function triggerScrollNearbyArticle() {
		if ( scrollTimer !== null && ! isAutoScroll ) {
			$('body').stop();
			clearTimeout( scrollTimer );
			scrollTimer = null;
		}
		if ( ! isAutoScroll ) {
			scrollTimer = setTimeout( scrollNearbyArticle, 1000 );
		}
		isAutoScroll = false;
	}
	
	$(window).scroll(function(e) {
		e.preventDefault();
		triggerScrollNearbyArticle();
	});
	
	$(window).resize(function(e) {
		e.preventDefault();
		triggerScrollNearbyArticle();
	});
});