// send html to the post editor
function send_to_editor(e){var t,n=typeof tinymce!="undefined",r=typeof QTags!="undefined";if(!wpActiveEditor){if(n&&tinymce.activeEditor){t=tinymce.activeEditor;wpActiveEditor=t.id}else if(!r)return!1}else n&&(!tinymce.activeEditor||tinymce.activeEditor.id!="mce_fullscreen"&&tinymce.activeEditor.id!="wp_mce_fullscreen"?t=tinymce.get(wpActiveEditor):t=tinymce.activeEditor);if(t&&!t.isHidden()){tinymce.isIE&&t.windowManager.insertimagebookmark&&t.selection.moveToBookmark(t.windowManager.insertimagebookmark);e.indexOf("[caption")===0?t.wpSetImgCaption&&(e=t.wpSetImgCaption(e)):e.indexOf("[gallery")===0?t.plugins.wpgallery&&(e=t.plugins.wpgallery._do_gallery(e)):e.indexOf("[embed")===0&&t.plugins.wordpress&&(e=t.plugins.wordpress._setEmbed(e));t.execCommand("mceInsertContent",!1,e)}else r?QTags.insertContent(e):document.getElementById(wpActiveEditor).value+=e;try{tb_remove()}catch(i){}}var wpActiveEditor,tb_position;(function(e){tb_position=function(){var t=e("#TB_window"),n=e(window).width(),r=e(window).height(),i=720<n?720:n,s=0;e("body.admin-bar").length&&(s=28);if(t.size()){t.width(i-50).height(r-45-s);e("#TB_iframeContent").width(i-50).height(r-75-s);t.css({"margin-left":"-"+parseInt((i-50)/2,10)+"px"});typeof document.body.style.maxWidth!="undefined"&&t.css({top:20+s+"px","margin-top":"0"})}return e("a.thickbox").each(function(){var t=e(this).attr("href");if(!t)return;t=t.replace(/&width=[0-9]+/g,"");t=t.replace(/&height=[0-9]+/g,"");e(this).attr("href",t+"&width="+(i-80)+"&height="+(r-85-s))})};e(window).resize(function(){tb_position()});e(document).ready(function(e){e("a.thickbox").click(function(){var e;if(typeof tinymce!="undefined"&&tinymce.isIE&&(e=tinymce.get(wpActiveEditor))&&!e.isHidden()){e.focus();e.windowManager.insertimagebookmark=e.selection.getBookmark()}})})})(jQuery);