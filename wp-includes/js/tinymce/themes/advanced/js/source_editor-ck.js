function saveContent(){tinyMCEPopup.editor.setContent(document.getElementById("htmlSource").value,{source_view:!0});tinyMCEPopup.close()}function onLoadInit(){tinyMCEPopup.resizeToInnerSize();tinymce.isGecko&&(document.body.spellcheck=tinyMCEPopup.editor.getParam("gecko_spellcheck"));document.getElementById("htmlSource").value=tinyMCEPopup.editor.getContent({source_view:!0});if(tinyMCEPopup.editor.getParam("theme_advanced_source_editor_wrap",!0)){setWrap("soft");document.getElementById("wraped").checked=!0}resizeInputs()}function setWrap(e){var t,n,r=document.getElementById("htmlSource");r.wrap=e;if(!tinymce.isIE){t=r.value;n=r.cloneNode(!1);n.setAttribute("wrap",e);r.parentNode.replaceChild(n,r);n.value=t}}function toggleWordWrap(e){e.checked?setWrap("soft"):setWrap("off")}function resizeInputs(){var e=tinyMCEPopup.dom.getViewPort(window),t;t=document.getElementById("htmlSource");if(t){t.style.width=e.w-20+"px";t.style.height=e.h-65+"px"}}tinyMCEPopup.requireLangPack();tinyMCEPopup.onInit.add(onLoadInit);