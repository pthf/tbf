$("#formUser").submit(function(e){

	e.preventDefault();

	var data = $(this).serialize();
	var namefunction = "changeUser";

	$.ajax({
        type : 'POST',
        url : '../../php/functions.php',
        data : {
        	data : data,
        	namefunction : "changeUser",
        },
        success: function(result){
			$('.resultado').html(result);
			$('.resultado').hide(3000);
	 	},
	 	error: function(error){
	 		alert(error);
	 	}
    })
});

$("#formChangeEmail").submit(function(e){

	e.preventDefault();

	var data = $(this).serialize();
	var namefunction = "changeEmail";

	$.ajax({
        type : 'POST',
        url : '../../php/functions.php',
        data : {
        	data : data,
        	namefunction : "changeEmail",
        },
        success: function(result){
			$('.resultado_email').html(result);
			$('.resultado_email').hide(4000);
			$('#formChangeEmail')[0].reset();
	 	},
	 	error: function(error){
	 		alert(error);
	 	}
    })
});

$("#formChangePass").submit(function(e){

	e.preventDefault();

	var data = $(this).serialize();
	var namefunction = "changePass";

	$.ajax({
        type : 'POST',
        url : '../../php/functions.php',
        data : {
        	data : data,
        	namefunction : "changePass",
        },
        success: function(result){
			$('.resultado_pass').html(result);
			$('.resultado_pass').hide(4000);
			$('#formChangePass')[0].reset();
	 	},
	 	error: function(error){
	 		alert(error);
	 	}
    })
});

$("#formNewMessage").submit(function(e){

	e.preventDefault();

	var data = $(this).serialize();
	var namefunction = "newMessage";

	$.ajax({
        type : 'POST',
        url : '../../php/functions.php',
        data : {
        	data : data,
        	namefunction : "newMessage",
        },
        success: function(result){
			$('#formNewMessage')[0].reset();
			location.reload();
	 	},
	 	error: function(error){
	 		alert(error);
	 	}
    })
});

$("#formChangeImagePerfil").submit(function(e){

	e.preventDefault();

	var ajaxData = new FormData();
	ajaxData.append("action", $(this).serialize());
	ajaxData.append("namefunction", "changeImagePerfil");

	$.each($("input[type=file]"), function(i, obj) {
		$.each(obj.files, function(j,file) {
			ajaxData.append('beerProfileImage['+i+']', file);
		})
	});

	$.ajax({
		url: "../../php/functions.php",
		type: "POST",
		data: ajaxData,
		processData: false,
		contentType: false,
		success: function(result){
			$('#formChangeImagePerfil')[0].reset();
			location.reload();
		},
		error: function(error){
			alert(error);
		}
	})
});

$("#formChangeImageBanner").submit(function(e){

	e.preventDefault();

	var ajaxData = new FormData();
	ajaxData.append("action", $(this).serialize());
	ajaxData.append("namefunction", "changeImageBanner");

	$.each($("input[type=file]"), function(i, obj) {
		$.each(obj.files, function(j,file) {
			ajaxData.append('beerBannerImage['+i+']', file);
		})
	});

	$.ajax({
		url: "../../php/functions.php",
		type: "POST",
		data: ajaxData,
		processData: false,
		contentType: false,
		success: function(result){
			$('#formChangeImageBanner')[0].reset();
			location.reload();
		},
		error: function(error){
			alert(error);
		}
	})
});

$("#SendRequestChat").submit(function(e){

	e.preventDefault();

	var data = $(this).serialize();
	var namefunction = "requestMessage";

	$.ajax({
        type : 'POST',
        url : '../../php/functions.php',
        data : {
        	data : data,
        	namefunction : "requestMessage",
        },
        success: function(result){
        	//alert(result);
			$('#SendRequestChat')[0].reset();
			location.reload();
	 	},
	 	error: function(error){
	 		alert(error);
	 	}
    })
});

$("#SendComment").submit(function(e){

	e.preventDefault();

	var data = $(this).serializeArray();
	data.push({ name: "namefunction", value: "SendCommentMessage" });

	$.ajax({
        type : 'POST',
        url : '../../php/functions.php',
        data : data,
        success: function(result){
			$('#SendComment')[0].reset();
			location.reload();
	 	},
	 	error: function(error){
	 		alert(error);
	 	}
    })
});

$("#SendCommentBeer").submit(function(e){

	e.preventDefault();

	var data = $(this).serializeArray();
	data.push({ name: "namefunction", value: "SendCommentProfileBeer" });

	$.ajax({
        type : 'POST',
        url : '../../php/functions.php',
        data : data,
        success: function(result){
			$('#SendCommentBeer')[0].reset();
			location.reload();
	 	},
	 	error: function(error){
	 		alert(error);
	 	}
    })
});

$("#formContact").submit(function(e){

	e.preventDefault();

	var data = $(this).serializeArray();
	data.push({ name: "namefunction", value: "SendEmailContact" });

	$.ajax({
        type : 'POST',
        url : '../../php/functions.php',
        data : data,
        success: function(result){
        	$('.result_email').html(result);
			$('.result_email').hide(4000);
			$('#formContact')[0].reset();
	 	},
	 	error: function(error){
	 		alert(error);
	 	}
    })
});

$("#formContactEng").submit(function(e){

	e.preventDefault();

	var data = $(this).serializeArray();
	data.push({ name: "namefunction", value: "SendEmailContactEng" });

	$.ajax({
        type : 'POST',
        url : '../../php/functions.php',
        data : data,
        success: function(result){
        	$('.result_email').html(result);
			$('.result_email').hide(4000);
			$('#formContactEng')[0].reset();
	 	},
	 	error: function(error){
	 		alert(error);
	 	}
    })
});
