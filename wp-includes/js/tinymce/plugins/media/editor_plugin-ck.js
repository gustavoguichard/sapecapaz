(function(){function u(e){var t,n,r;if(e&&!e.splice){n=[];for(r=0;!0;r++){if(!e[r])break;n[r]=e[r]}return n}return e}var e=tinymce.explode("id,name,width,height,style,align,class,hspace,vspace,bgcolor,type"),t=tinymce.makeMap(e.join(",")),n=tinymce.html.Node,r,i,s=tinymce.util.JSON,o;r=[["Flash","d27cdb6e-ae6d-11cf-96b8-444553540000","application/x-shockwave-flash","http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"],["ShockWave","166b1bca-3f9c-11cf-8075-444553540000","application/x-director","http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=8,5,1,0"],["WindowsMedia","6bf52a52-394a-11d3-b153-00c04f79faa6,22d6f312-b0f6-11d0-94ab-0080c74c7e95,05589fa1-c356-11ce-bf01-00aa0055595a","application/x-mplayer2","http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701"],["QuickTime","02bf25d5-8c17-4b23-bc80-d3488abddc6b","video/quicktime","http://www.apple.com/qtactivex/qtplugin.cab#version=6,0,2,0"],["RealMedia","cfcdaa03-8be4-11cf-b84b-0020afbbccfa","audio/x-pn-realaudio-plugin","http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"],["Java","8ad9c840-044e-11d1-b3e9-00805f499d93","application/x-java-applet","http://java.sun.com/products/plugin/autodl/jinstall-1_5_0-windows-i586.cab#Version=1,5,0,0"],["Silverlight","dfeaf541-f3e1-4c24-acac-99c30715084a","application/x-silverlight-2"],["Iframe"],["Video"],["EmbeddedAudio"],["Audio"]];tinymce.create("tinymce.plugins.MediaPlugin",{init:function(t,n){function v(e){return e&&e.nodeName==="IMG"&&t.dom.hasClass(e,"mceItemMedia")}var o=this,u={},l,c,h,p;o.editor=t;o.url=n;i="";for(l=0;l<r.length;l++){p=r[l][0];h={name:p,clsids:tinymce.explode(r[l][1]||""),mimes:tinymce.explode(r[l][2]||""),codebase:r[l][3]};for(c=0;c<h.clsids.length;c++)u["clsid:"+h.clsids[c]]=h;for(c=0;c<h.mimes.length;c++)u[h.mimes[c]]=h;u["mceItem"+p]=h;u[p.toLowerCase()]=h;i+=(i?"|":"")+p}tinymce.each(t.getParam("media_types","video=mp4,m4v,ogv,webm;silverlight=xap;flash=swf,flv;shockwave=dcr;quicktime=mov,qt,mpg,mpeg;shockwave=dcr;windowsmedia=avi,wmv,wm,asf,asx,wmx,wvx;realmedia=rm,ra,ram;java=jar;audio=mp3,ogg").split(";"),function(e){var t,n,r;e=e.split(/=/);n=tinymce.explode(e[1].toLowerCase());for(t=0;t<n.length;t++){r=u[e[0].toLowerCase()];r&&(u[n[t]]=r)}});i=new RegExp("write("+i+")\\(([^)]+)\\)");o.lookup=u;t.onPreInit.add(function(){t.schema.addValidElements("object[id|style|width|height|classid|codebase|*],param[name|value],embed[id|style|width|height|type|src|*],video[*],audio[*],source[*]");t.parser.addNodeFilter("object,embed,video,audio,script,iframe",function(e){var t=e.length;while(t--)o.objectToImg(e[t])});t.serializer.addNodeFilter("img",function(e,t,n){var r=e.length,i;while(r--){i=e[r];(i.attr("class")||"").indexOf("mceItemMedia")!==-1&&o.imgToObject(i,n)}})});t.onInit.add(function(){t.theme&&t.theme.onResolveName&&t.theme.onResolveName.add(function(e,n){n.name==="img"&&t.dom.hasClass(n.node,"mceItemMedia")&&(n.name="media")});t&&t.plugins.contextmenu&&t.plugins.contextmenu.onContextMenu.add(function(e,t,n){n.nodeName==="IMG"&&n.className.indexOf("mceItemMedia")!==-1&&t.add({title:"media.edit",icon:"media",cmd:"mceMedia"})})});t.addCommand("mceMedia",function(){var r,i;i=t.selection.getNode();if(v(i)){r=t.dom.getAttrib(i,"data-mce-json");if(r){r=s.parse(r);tinymce.each(e,function(e){var n=t.dom.getAttrib(i,e);n&&(r[e]=n)});r.type=o.getType(i.className).name.toLowerCase()}}r||(r={type:"flash",video:{sources:[]},params:{}});t.windowManager.open({file:n+"/media.htm",width:430+parseInt(t.getLang("media.delta_width",0)),height:500+parseInt(t.getLang("media.delta_height",0)),inline:1},{plugin_url:n,data:r})});t.addButton("media",{title:"media.desc",cmd:"mceMedia"});t.onNodeChange.add(function(e,t,n){t.setActive("media",v(n))})},convertUrl:function(e,t){var n=this,r=n.editor,i=r.settings,s=i.url_converter,o=i.url_converter_scope||n;return e?t?r.documentBaseURI.toAbsolute(e):s.call(o,e,"src","object"):e},getInfo:function(){return{longname:"Media",author:"Moxiecode Systems AB",authorurl:"http://tinymce.moxiecode.com",infourl:"http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/media",version:tinymce.majorVersion+"."+tinymce.minorVersion}},dataToImg:function(e,t){var n=this,r=n.editor,i=r.documentBaseURI,o,a,f,l;e.params.src=n.convertUrl(e.params.src,t);a=e.video.attrs;a&&(a.src=n.convertUrl(a.src,t));a&&(a.poster=n.convertUrl(a.poster,t));o=u(e.video.sources);if(o)for(l=0;l<o.length;l++)o[l].src=n.convertUrl(o[l].src,t);f=n.editor.dom.create("img",{id:e.id,style:e.style,align:e.align,hspace:e.hspace,vspace:e.vspace,src:n.editor.theme.url+"/img/trans.gif","class":"mceItemMedia mceItem"+n.getType(e.type).name,"data-mce-json":s.serialize(e,"'")});f.width=e.width||(e.type=="audio"?"300":"320");f.height=e.height||(e.type=="audio"?"32":"240");return f},dataToHtml:function(e,t){return this.editor.serializer.serialize(this.dataToImg(e,t),{forced_root_block:"",force_absolute:t})},htmlToData:function(t){var n,r,i;i={type:"flash",video:{sources:[]},params:{}};n=this.editor.parser.parse(t);r=n.getAll("img")[0];if(r){i=s.parse(r.attr("data-mce-json"));i.type=this.getType(r.attr("class")).name.toLowerCase();tinymce.each(e,function(e){var t=r.attr(e);t&&(i[e]=t)})}return i},getType:function(e){var t,n,r;n=tinymce.explode(e," ");for(t=0;t<n.length;t++){r=this.lookup[n[t]];if(r)return r}},imgToObject:function(t,r){function M(e,t){var n,r,s,u,a;a=o.getParam("flash_video_player_url",i.convertUrl(i.url+"/moxieplayer.swf"));if(a){n=o.documentBaseURI;m.params.src=a;if(o.getParam("flash_video_player_absvideourl",!0)){e=n.toAbsolute(e||"",!0);t=n.toAbsolute(t||"",!0)}s="";r=o.getParam("flash_video_player_flashvars",{url:"$url",poster:"$poster"});tinymce.each(r,function(n,r){n=n.replace(/\$url/,e||"");n=n.replace(/\$poster/,t||"");n.length>0&&(s+=(s?"&":"")+r+"="+escape(n))});s.length&&(m.params.flashvars=s);u=o.getParam("flash_video_player_params",{allowfullscreen:!0,allowscriptaccess:!0});tinymce.each(u,function(e,t){m.params[t]=""+e})}}var i=this,o=i.editor,a,f,l,h,p,v,m,y,w,E,S,x,T,N,C,k,L,A,O;m=t.attr("data-mce-json");if(!m)return;m=s.parse(m);x=this.getType(t.attr("class"));A=t.attr("data-mce-style");if(!A){A=t.attr("style");A&&(A=o.dom.serializeStyle(o.dom.parseStyle(A,"img")))}if(x.name==="Iframe"){k=new n("iframe",1);tinymce.each(e,function(e){var n=t.attr(e);e=="class"&&n&&(n=n.replace(/mceItem.+ ?/g,""));n&&n.length>0&&k.attr(e,n)});for(p in m.params)k.attr(p,m.params[p]);k.attr({style:A,src:m.params.src});t.replace(k);return}if(this.editor.settings.media_use_script){k=(new n("script",1)).attr("type","text/javascript");v=new n("#text",3);v.value="write"+x.name+"("+s.serialize(tinymce.extend(m.params,{width:t.attr("width"),height:t.attr("height")}))+");";k.append(v);t.replace(k);return}if(x.name==="Video"&&m.video.sources[0]){a=(new n("video",1)).attr(tinymce.extend({id:t.attr("id"),width:t.attr("width"),height:t.attr("height"),style:A},m.video.attrs));m.video.attrs&&(L=m.video.attrs.poster);w=m.video.sources=u(m.video.sources);for(T=0;T<w.length;T++)/\.mp4$/.test(w[T].src)&&(C=w[T].src);if(!w[0].type){a.attr("src",w[0].src);w.splice(0,1)}for(T=0;T<w.length;T++){y=(new n("source",1)).attr(w[T]);y.shortEnded=!0;a.append(y)}if(C){M(C,L);x=i.getType("flash")}else m.params.src=""}if(x.name==="Audio"&&m.video.sources[0]){O=(new n("audio",1)).attr(tinymce.extend({id:t.attr("id"),width:t.attr("width"),height:t.attr("height"),style:A},m.video.attrs));m.video.attrs&&(L=m.video.attrs.poster);w=m.video.sources=u(m.video.sources);if(!w[0].type){O.attr("src",w[0].src);w.splice(0,1)}for(T=0;T<w.length;T++){y=(new n("source",1)).attr(w[T]);y.shortEnded=!0;O.append(y)}m.params.src=""}if(x.name==="EmbeddedAudio"){l=new n("embed",1);l.shortEnded=!0;l.attr({id:t.attr("id"),width:t.attr("width"),height:t.attr("height"),style:A,type:t.attr("type")});for(p in m.params)l.attr(p,m.params[p]);tinymce.each(e,function(e){m[e]&&e!="type"&&l.attr(e,m[e])});m.params.src=""}if(m.params.src){/\.flv$/i.test(m.params.src)&&M(m.params.src,"");r&&r.force_absolute&&(m.params.src=o.documentBaseURI.toAbsolute(m.params.src));f=(new n("object",1)).attr({id:t.attr("id"),width:t.attr("width"),height:t.attr("height"),style:A});tinymce.each(e,function(e){var t=m[e];e=="class"&&t&&(t=t.replace(/mceItem.+ ?/g,""));t&&e!="type"&&f.attr(e,t)});for(p in m.params){S=new n("param",1);S.shortEnded=!0;v=m.params[p];p==="src"&&x.name==="WindowsMedia"&&(p="url");S.attr({name:p,value:v});f.append(S)}if(this.editor.getParam("media_strict",!0))f.attr({data:m.params.src,type:x.mimes[0]});else{f.attr({classid:"clsid:"+x.clsids[0],codebase:x.codebase});l=new n("embed",1);l.shortEnded=!0;l.attr({id:t.attr("id"),width:t.attr("width"),height:t.attr("height"),style:A,type:x.mimes[0]});for(p in m.params)l.attr(p,m.params[p]);tinymce.each(e,function(e){m[e]&&e!="type"&&l.attr(e,m[e])});f.append(l)}if(m.object_html){v=new n("#text",3);v.raw=!0;v.value=m.object_html;f.append(v)}a&&a.append(f)}if(a&&m.video_html){v=new n("#text",3);v.raw=!0;v.value=m.video_html;a.append(v)}if(O&&m.video_html){v=new n("#text",3);v.raw=!0;v.value=m.video_html;O.append(v)}var _=a||O||f||l;_?t.replace(_):t.remove()},objectToImg:function(r){function F(e){return(new tinymce.html.Serializer({inner:!0,validate:!1})).serialize(e)}function I(e,t){return A[(e.attr(t)||"").toLowerCase()]}function q(e){var t=e.replace(/^.*\.([^.]+)$/,"$1");return A[t.toLowerCase()||""]}var o,u,f,l,c,p,v,m,y,w,E,S,x,T,N,C,k,L,A=this.lookup,O,M,_=this.editor.settings.url_converter,D=this.editor.settings.url_converter_scope,P,H,B,j;if(!r.parent)return;if(r.name==="script"){r.firstChild&&(O=i.exec(r.firstChild.value));if(!O)return;L=O[1];k={video:{},params:s.parse(O[2])};m=k.params.width;y=k.params.height}k=k||{video:{},params:{}};c=new n("img",1);c.attr({src:this.editor.theme.url+"/img/trans.gif"});p=r.name;if(p==="video"||p=="audio"){f=r;o=r.getAll("object")[0];u=r.getAll("embed")[0];m=f.attr("width");y=f.attr("height");v=f.attr("id");k.video={attrs:{},sources:[]};M=k.video.attrs;for(p in f.attributes.map)M[p]=f.attributes.map[p];N=r.attr("src");N&&k.video.sources.push({src:_.call(D,N,"src",r.name)});C=f.getAll("source");for(E=0;E<C.length;E++){N=C[E].remove();k.video.sources.push({src:_.call(D,N.attr("src"),"src","source"),type:N.attr("type"),media:N.attr("media")})}M.poster&&(M.poster=_.call(D,M.poster,"poster",r.name))}if(r.name==="object"){o=r;u=r.getAll("embed")[0]}r.name==="embed"&&(u=r);if(r.name==="iframe"){l=r;L="Iframe"}if(o){m=m||o.attr("width");y=y||o.attr("height");w=w||o.attr("style");v=v||o.attr("id");P=P||o.attr("hspace");H=H||o.attr("vspace");B=B||o.attr("align");j=j||o.attr("bgcolor");k.name=o.attr("name");T=o.getAll("param");for(E=0;E<T.length;E++){x=T[E];p=x.remove().attr("name");t[p]||(k.params[p]=x.attr("value"))}k.params.src=k.params.src||o.attr("data")}if(u){m=m||u.attr("width");y=y||u.attr("height");w=w||u.attr("style");v=v||u.attr("id");P=P||u.attr("hspace");H=H||u.attr("vspace");B=B||u.attr("align");j=j||u.attr("bgcolor");for(p in u.attributes.map)!t[p]&&!k.params[p]&&(k.params[p]=u.attributes.map[p])}if(l){m=l.attr("width");y=l.attr("height");w=w||l.attr("style");v=l.attr("id");P=l.attr("hspace");H=l.attr("vspace");B=l.attr("align");j=l.attr("bgcolor");tinymce.each(e,function(e){c.attr(e,l.attr(e))});for(p in l.attributes.map)!t[p]&&!k.params[p]&&(k.params[p]=l.attributes.map[p])}if(k.params.movie){k.params.src=k.params.src||k.params.movie;delete k.params.movie}k.params.src&&(k.params.src=_.call(D,k.params.src,"src","object"));f&&(r.name==="video"?L=A.video.name:r.name==="audio"&&(L=A.audio.name));o&&!L&&(L=(I(o,"clsid")||I(o,"classid")||I(o,"type")||{}).name);u&&!L&&(L=(I(u,"type")||q(k.params.src)||{}).name);u&&L=="EmbeddedAudio"&&(k.params.type=u.attr("type"));r.replace(c);u&&u.remove();if(o){S=F(o.remove());S&&(k.object_html=S)}if(f){S=F(f.remove());S&&(k.video_html=S)}k.hspace=P;k.vspace=H;k.align=B;k.bgcolor=j;c.attr({id:v,"class":"mceItemMedia mceItem"+(L||"Flash"),style:w,width:m||(r.name=="audio"?"300":"320"),height:y||(r.name=="audio"?"32":"240"),hspace:P,vspace:H,align:B,bgcolor:j,"data-mce-json":s.serialize(k,"'")})}});tinymce.PluginManager.add("media",tinymce.plugins.MediaPlugin)})();