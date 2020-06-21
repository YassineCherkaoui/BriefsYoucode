	<script>
		$(document).ready(function() {
			$('.view_data').click(function() {
				var reservation_id = $(this).attr("id");
				$.ajax({
					url: "../controller/Backend_User.php",
					method: "post",
					data: {
						reservation_id: reservation_id
					},
					success: function(data) {
						$('#detail').html(data);
						$('#exampleModalCenter').modal("show");
					}
				});
			});
		});
	</script>