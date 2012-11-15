/*! jQuery UI - v1.8.20 - 2012-04-30
* https://github.com/jquery/jquery-ui
* Includes: jquery.effects.fade.js
* Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */(function(e,t){e.effects.fade=function(t){return this.queue(function(){var n=e(this),r=e.effects.setMode(n,t.options.mode||"hide");n.animate({opacity:r},{queue:!1,duration:t.duration,easing:t.options.easing,complete:function(){t.callback&&t.callback.apply(this,arguments),n.dequeue()}})})}})(jQuery);