/*! jQuery UI - v1.8.20 - 2012-04-30
* https://github.com/jquery/jquery-ui
* Includes: jquery.effects.shake.js
* Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */(function(e,t){e.effects.shake=function(t){return this.queue(function(){var n=e(this),r=["position","top","bottom","left","right"],i=e.effects.setMode(n,t.options.mode||"effect"),s=t.options.direction||"left",o=t.options.distance||20,u=t.options.times||3,f=t.duration||t.options.duration||140;e.effects.save(n,r),n.show(),e.effects.createWrapper(n);var l=s=="up"||s=="down"?"top":"left",c=s=="up"||s=="left"?"pos":"neg",h={},p={},d={};h[l]=(c=="pos"?"-=":"+=")+o,p[l]=(c=="pos"?"+=":"-=")+o*2,d[l]=(c=="pos"?"-=":"+=")+o*2,n.animate(h,f,t.options.easing);for(var v=1;v<u;v++)n.animate(p,f,t.options.easing).animate(d,f,t.options.easing);n.animate(p,f,t.options.easing).animate(h,f/2,t.options.easing,function(){e.effects.restore(n,r),e.effects.removeWrapper(n),t.callback&&t.callback.apply(this,arguments)}),n.queue("fx",function(){n.dequeue()}),n.dequeue()})}})(jQuery);