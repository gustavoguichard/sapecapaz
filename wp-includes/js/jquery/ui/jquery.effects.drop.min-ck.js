/*! jQuery UI - v1.8.20 - 2012-04-30
* https://github.com/jquery/jquery-ui
* Includes: jquery.effects.drop.js
* Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */(function(e,t){e.effects.drop=function(t){return this.queue(function(){var n=e(this),r=["position","top","bottom","left","right","opacity"],i=e.effects.setMode(n,t.options.mode||"hide"),s=t.options.direction||"left";e.effects.save(n,r),n.show(),e.effects.createWrapper(n);var o=s=="up"||s=="down"?"top":"left",u=s=="up"||s=="left"?"pos":"neg",f=t.options.distance||(o=="top"?n.outerHeight({margin:!0})/2:n.outerWidth({margin:!0})/2);i=="show"&&n.css("opacity",0).css(o,u=="pos"?-f:f);var l={opacity:i=="show"?1:0};l[o]=(i=="show"?u=="pos"?"+=":"-=":u=="pos"?"-=":"+=")+f,n.animate(l,{queue:!1,duration:t.duration,easing:t.options.easing,complete:function(){i=="hide"&&n.hide(),e.effects.restore(n,r),e.effects.removeWrapper(n),t.callback&&t.callback.apply(this,arguments),n.dequeue()}})})}})(jQuery);