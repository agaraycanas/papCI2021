$(document).ready(function() {
	$("#id-form").submit(function(e) {
		e.preventDefault();
		$('#id-modal').on('shown.bs.modal', function() {
			$(this).find('[autofocus]').focus();
		});
		$.ajax({
			url: 'http://[::1]/nqst/usuario/create_post',
			type: 'POST',
			data: $("#id-form").serialize(),
			dataType: "json",
			success: function(data) {
				$("#id-modal-message").html(data.message);
				if (data.severity == "ERROR") {
					$("#id-modal-header").html("ERROR");
					$("#id-modal-message").attr('class', 'modal-title text-center bg-danger');
					$("#id-modal").modal('show');
				}
				else if (data.severity == "WARNING") {
					$("#id-modal-header").html("Atención");
					$("#id-modal-message").attr('class', 'modal-title text-center bg-warning');
					$("#id-modal").modal('show');
				}
				else { //SUCCESS
					$(location).attr("href", data.message);

				}

			}
		})
	});
});

