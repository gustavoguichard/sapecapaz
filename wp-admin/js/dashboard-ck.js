var ajaxWidgets,ajaxPopulateWidgets,quickPressLoad;jQuery(document).ready(function(e){var t=e("#welcome-panel"),n=e("#wp_welcome_panel-hide"),r=function(t){e.post(ajaxurl,{action:"update-welcome-panel",visible:t,welcomepanelnonce:e("#welcomepanelnonce").val()})};t.hasClass("hidden")&&n.prop("checked")&&t.removeClass("hidden");e(".welcome-panel-close, .welcome-panel-dismiss a",t).click(function(n){n.preventDefault();t.addClass("hidden");r(0);e("#wp_welcome_panel-hide").prop("checked",!1)});n.click(function(){t.toggleClass("hidden",!this.checked);r(this.checked?1:0)});ajaxWidgets=["dashboard_incoming_links","dashboard_primary","dashboard_secondary","dashboard_plugins"];ajaxPopulateWidgets=function(t){function n(t,n){var r,i=e("#"+n+" div.inside:visible").find(".widget-loading");if(i.length){r=i.parent();setTimeout(function(){r.load(ajaxurl+"?action=dashboard-widgets&widget="+n,"",function(){r.hide().slideDown("normal",function(){e(this).css("display","")})})},t*500)}}if(t){t=t.toString();e.inArray(t,ajaxWidgets)!=-1&&n(0,t)}else e.each(ajaxWidgets,n)};ajaxPopulateWidgets();postboxes.add_postbox_toggles(pagenow,{pbshow:ajaxPopulateWidgets});quickPressLoad=function(){var t=e("#quickpost-action"),n;n=e("#quick-press").submit(function(){e("#dashboard_quick_press #publishing-action img.waiting").css("visibility","visible");e('#quick-press .submit input[type="submit"], #quick-press .submit input[type="reset"]').prop("disabled",!0);"post"==t.val()&&t.val("post-quickpress-publish");e("#dashboard_quick_press div.inside").load(n.attr("action"),n.serializeArray(),function(){e("#dashboard_quick_press #publishing-action img.waiting").css("visibility","hidden");e('#quick-press .submit input[type="submit"], #quick-press .submit input[type="reset"]').prop("disabled",!1);e("#dashboard_quick_press ul").next("p").remove();e("#dashboard_quick_press ul").find("li").each(function(){e("#dashboard_recent_drafts ul").prepend(this)}).end().remove();quickPressLoad()});return!1});e("#publish").click(function(){t.val("post-quickpress-publish")})};quickPressLoad()});