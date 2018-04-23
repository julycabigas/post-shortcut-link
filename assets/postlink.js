
 (function($){	

	var linkButton = document.querySelector('.db-section-link a');
	var linkSection = document.querySelector('.db-section-link');
	var count = 1;
	

	$('.db-section-link').on('click', function(e){

		e.preventDefault();

		var id = $(this).attr('id');
		var link = $(this).find('a').attr("href");



		$('#dbpopup-' + id).show();
	


		copyToClipboard(link);

	});




	function copyToClipboard(element) {

	  var $temp = jQuery("<input>");


	  jQuery("body").append($temp);
	  		$temp.val( element ).select();

	  		document.execCommand("copy");
	  		$temp.remove();

	}


	$('.db-link-copy').on('click', '.fa-close', function(e){

			console.log('close click');

			$(this).closest('.db-link-copy').hide();
	})


	var hash = location.hash;

	console.log(hash);

	if( location.hash ) {

		setTimeout(function(){

			$('html, body').animate({

				scrollTop: $(hash).offset().top,

			}, 2000);

		}, 1);

	}


})(jQuery);