!(function($){
	"use strict";
  jQuery(document).ready(function($){
	var confirm_message = verifytheme.message;
	if (confirm_message) {console.log(confirm_message);
		$('.redux-field.wbc_importer').html('<h2>Please insert your Envato purchase code <a href="#" class="bt-verify-purchase-code">here</a> to enable option Import Demo Data.</h2>');
	}
    $('.bt-verify-purchase-code').click(function(e){
		e.stopImmediatePropagation();
		var confirm_message = verifytheme.message;
		var setting_page = verifytheme.setting_page;
  		if (confirm(confirm_message)) {
  			window.location.href = setting_page;
  		}
    })
  })
})(jQuery);
