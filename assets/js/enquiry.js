(function ($) {
	$(document).ready(function () {
		$('#mrhab-enquiry-form form').submit(function (e) {
			e.preventDefault();

			const data = $(this).serialize();
			$.post(
				mrhab.ajaxurl,
				data,
				function (response) {
					if (response.success) {
						console.log(response.data);
					} else {
						alert(response.data.message);
					}
				},
				'json'
			).fail(function () {
				alert(mrhab.error);
			});
		});
	});
})(jQuery);
