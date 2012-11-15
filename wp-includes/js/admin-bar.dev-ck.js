// use jQuery and hoverIntent if loaded
if(typeof jQuery!="undefined"){typeof jQuery.fn.hoverIntent=="undefined"&&function(e){e.fn.hoverIntent=function(t,n){var r={sensitivity:7,interval:100,timeout:0};r=e.extend(r,n?{over:t,out:n}:t);var i,s,o,u,f=function(e){i=e.pageX;s=e.pageY},l=function(t,n){n.hoverIntent_t=clearTimeout(n.hoverIntent_t);if(Math.abs(o-i)+Math.abs(u-s)<r.sensitivity){e(n).unbind("mousemove",f);n.hoverIntent_s=1;return r.over.apply(n,[t])}o=i;u=s;n.hoverIntent_t=setTimeout(function(){l(t,n)},r.interval)},c=function(e,t){t.hoverIntent_t=clearTimeout(t.hoverIntent_t);t.hoverIntent_s=0;return r.out.apply(t,[e])},h=function(t){var n=this,r=(t.type=="mouseover"?t.fromElement:t.toElement)||t.relatedTarget;while(r&&r!=this)try{r=r.parentNode}catch(t){r=this}if(r==this){e.browser.mozilla&&(t.type=="mouseout"?n.mtout=setTimeout(function(){p(t,n)},30):n.mtout&&(n.mtout=clearTimeout(n.mtout)));return}n.mtout&&(n.mtout=clearTimeout(n.mtout));p(t,n)},p=function(t,n){var i=jQuery.extend({},t);n.hoverIntent_t&&(n.hoverIntent_t=clearTimeout(n.hoverIntent_t));if(t.type=="mouseover"){o=i.pageX;u=i.pageY;e(n).bind("mousemove",f);n.hoverIntent_s!=1&&(n.hoverIntent_t=setTimeout(function(){l(i,n)},r.interval))}else{e(n).unbind("mousemove",f);n.hoverIntent_s==1&&(n.hoverIntent_t=setTimeout(function(){c(i,n)},r.timeout))}};return this.mouseover(h).mouseout(h)}}(jQuery);jQuery(document).ready(function(e){var t=function(t,n){var r=e(n),i=r.attr("tabindex");i&&r.attr("tabindex","0").attr("tabindex",i)};e("#wpadminbar").removeClass("nojq").removeClass("nojs").find("li.menupop").hoverIntent({over:function(t){e(this).addClass("hover")},out:function(t){e(this).removeClass("hover")},timeout:180,sensitivity:7,interval:100});e("#wp-admin-bar-get-shortlink").click(function(t){t.preventDefault();e(this).addClass("selected").children(".shortlink-input").blur(function(){e(this).parents("#wp-admin-bar-get-shortlink").removeClass("selected")}).focus().select()});e("#wpadminbar li.menupop > .ab-item").bind("keydown.adminbar",function(n){if(n.which!=13)return;var r=e(n.target),i=r.closest("ab-sub-wrapper");n.stopPropagation();n.preventDefault();i.length||(i=e("#wpadminbar .quicklinks"));i.find(".menupop").removeClass("hover");r.parent().toggleClass("hover");r.siblings(".ab-sub-wrapper").find(".ab-item").each(t)}).each(t);e("#wpadminbar .ab-item").bind("keydown.adminbar",function(n){if(n.which!=27)return;var r=e(n.target);n.stopPropagation();n.preventDefault();r.closest(".hover").removeClass("hover").children(".ab-item").focus();r.siblings(".ab-sub-wrapper").find(".ab-item").each(t)});e("#wpadminbar").click(function(t){if(t.target.id!="wpadminbar"&&t.target.id!="wp-admin-bar-top-secondary")return;t.preventDefault();e("html, body").animate({scrollTop:0},"fast")})})}else(function(e,t){var n=function(e,t,n){e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent&&e.attachEvent("on"+t,function(){return n.call(e,window.event)})},r,i=new RegExp("\\bhover\\b","g"),s=[],o=new RegExp("\\bselected\\b","g"),u=function(e){var t=s.length;while(t--)if(s[t]&&e==s[t][1])return s[t][0];return!1},a=function(t){var n,a,f,l,c,h,p=[],v=0;while(t&&t!=r&&t!=e){if("LI"==t.nodeName.toUpperCase()){p[p.length]=t;a=u(t);a&&clearTimeout(a);t.className=t.className?t.className.replace(i,"")+" hover":"hover";l=t}t=t.parentNode}if(l&&l.parentNode){c=l.parentNode;if(c&&"UL"==c.nodeName.toUpperCase()){n=c.childNodes.length;while(n--){h=c.childNodes[n];h!=l&&(h.className=h.className?h.className.replace(o,""):"")}}}n=s.length;while(n--){f=!1;v=p.length;while(v--)p[v]==s[n][1]&&(f=!0);f||(s[n][1].className=s[n][1].className?s[n][1].className.replace(i,""):"")}},f=function(t){while(t&&t!=r&&t!=e){"LI"==t.nodeName.toUpperCase()&&function(e){var t=setTimeout(function(){e.className=e.className?e.className.replace(i,""):""},500);s[s.length]=[t,e]}(t);t=t.parentNode}},l=function(t){var n,i,s,u=t.target||t.srcElement;for(;;){if(!u||u==e||u==r)return;if(u.id&&u.id=="wp-admin-bar-get-shortlink")break;u=u.parentNode}t.preventDefault&&t.preventDefault();t.returnValue=!1;-1==u.className.indexOf("selected")&&(u.className+=" selected");for(n=0,i=u.childNodes.length;n<i;n++){s=u.childNodes[n];if(s.className&&-1!=s.className.indexOf("shortlink-input")){s.focus();s.select();s.onblur=function(){u.className=u.className?u.className.replace(o,""):""};break}}return!1},c=function(e){var t,n,r,i,s,o;if(e.id!="wpadminbar"&&e.id!="wp-admin-bar-top-secondary")return;t=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0;if(t<1)return;o=t>800?130:100;n=Math.min(12,Math.round(t/o));r=t>800?Math.round(t/30):Math.round(t/20);i=[];s=0;while(t){t-=r;t<0&&(t=0);i.push(t);setTimeout(function(){window.scrollTo(0,i.shift())},s*n);s++}};n(t,"load",function(){r=e.getElementById("wpadminbar");if(e.body&&r){e.body.appendChild(r);r.className&&(r.className=r.className.replace(/nojs/,""));n(r,"mouseover",function(e){a(e.target||e.srcElement)});n(r,"mouseout",function(e){f(e.target||e.srcElement)});n(r,"click",l);n(r,"click",function(e){c(e.target||e.srcElement)})}t.location.hash&&t.scrollBy(0,-32)})})(document,window);