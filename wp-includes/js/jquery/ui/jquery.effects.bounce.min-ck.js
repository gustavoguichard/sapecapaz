/*! jQuery UI - v1.8.20 - 2012-04-30
* https://github.com/jquery/jquery-ui
* Includes: jquery.effects.bounce.js
* Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */(function(e,t){e.effects.bounce=function(t){return this.queue(function(){var n=e(this),r=["position","top","bottom","left","right"],i=e.effects.setMode(n,t.options.mode||"effect"),s=t.options.direction||"up",o=t.options.distance||20,u=t.options.times||5,f=t.duration||250;/show|hide/.test(i)&&r.push("opacity"),e.effects.save(n,r),n.show(),e.effects.createWrapper(n);var l=s=="up"||s=="down"?"top":"left",c=s=="up"||s=="left"?"pos":"neg",o=t.options.distance||(l=="top"?n.outerHeight({margin:!0})/3:n.outerWidth({margin:!0})/3);i=="show"&&n.css("opacity",0).css(l,c=="pos"?-o:o),i=="hide"&&(o/=u*2),i!="hide"&&u--;if(i=="show"){var h={opacity:1};h[l]=(c=="pos"?"+=":"-=")+o,n.animate(h,f/2,t.options.easing),o/=2,u--}for(var p=0;p<u;p++){var d={},v={};d[l]=(c=="pos"?"-=":"+=")+o,v[l]=(c=="pos"?"+=":"-=")+o,n.animate(d,f/2,t.options.easing).animate(v,f/2,t.options.easing),o=i=="hide"?o*2:o/2}if(i=="hide"){var h={opacity:0};h[l]=(c=="pos"?"-=":"+=")+o,n.animate(h,f/2,t.options.easing,function(){n.hide(),e.effects.restore(n,r),e.effects.removeWrapper(n),t.callback&&t.callback.apply(this,arguments)})}else{var d={},v={};d[l]=(c=="pos"?"-=":"+=")+o,v[l]=(c=="pos"?"+=":"-=")+o,n.animate(d,f/2,t.options.easing).animate(v,f/2,t.options.easing,function(){e.effects.restore(n,r),e.effects.removeWrapper(n),t.callback&&t.callback.apply(this,arguments)})}n.queue("fx",function(){n.dequeue()}),n.dequeue()})}})(jQuery);