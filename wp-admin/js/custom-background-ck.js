var farbtastic,pickColor;(function(e){var t="";pickColor=function(n){farbtastic.setColor(n);e("#background-color").val(n);e("#custom-background-image").css("background-color",n);t&&n===t||!t&&(""===n||"#"===n)?e("#clearcolor").hide():e("#clearcolor").show()};e(document).ready(function(){t=e("#defaultcolor").val();e("#pickcolor").click(function(){e("#colorPickerDiv").show();return!1});e("#clearcolor a").click(function(e){pickColor(t);e.preventDefault()});e("#background-color").keyup(function(){var t=e("#background-color").val(),n=t;n.charAt(0)!="#"&&(n="#"+n);n=n.replace(/[^#a-fA-F0-9]+/,"");n!=t&&e("#background-color").val(n);(n.length==4||n.length==7)&&pickColor(n)});e('input[name="background-position-x"]').change(function(){e("#custom-background-image").css("background-position",e(this).val()+" top")});e('input[name="background-repeat"]').change(function(){e("#custom-background-image").css("background-repeat",e(this).val())});farbtastic=e.farbtastic("#colorPickerDiv",function(e){pickColor(e)});pickColor(e("#background-color").val());e(document).mousedown(function(){e("#colorPickerDiv").each(function(){var t=e(this).css("display");t=="block"&&e(this).fadeOut(2)})})})})(jQuery);