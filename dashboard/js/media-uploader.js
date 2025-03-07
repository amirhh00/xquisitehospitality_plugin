jQuery(document).ready(function ($) {
	$("#xquisitehospitality_newsletter_bg_button").click(function (e) {
		e.preventDefault();

		var image = wp
			.media({
				title: "Upload Image",
				multiple: false,
			})
			.open()
			.on("select", function () {
				var uploaded_image = image.state().get("selection").first();
				var image_url = uploaded_image.toJSON().url;
				$("#xquisitehospitality_newsletter_bg").val(image_url);
			});
	});
});
