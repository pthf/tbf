$("#formUser").submit(function(e){

		e.preventDefault();

		var ajaxData = new FormData();
		ajaxData.append("action", $(this).serialize());
		ajaxData.append("namefunction", "addUser");



		$.ajax({
			url: "../php/functions.php",
			type: "POST",
			data: ajaxData,
			processData: false,
			contentType: false,
			success: function(result){
				alert(result);
			},
			error: function(error){
				alert(error);
			}
		})
	})