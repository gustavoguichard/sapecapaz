(function(e){e.ui.dialog.prototype.options.closeOnEscape=!1;e.widget("wp.wpdialog",e.ui.dialog,{options:{closeOnEscape:!1},open:function(){var t;tinyMCEPopup&&typeof tinyMCE!="undefined"&&(t=tinyMCE.activeEditor)&&!t.isHidden()&&tinyMCEPopup.init();if(this._isOpen||!1===this._trigger("beforeOpen"))return;e.ui.dialog.prototype.open.apply(this,arguments);this.element.focus();this._trigger("refresh")}})})(jQuery);