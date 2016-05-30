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
			$('.resultado_email').hide(3000);
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
			$('.resultado_pass').hide(3000);
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
        	alert(result);
			/*$('.resultado_pass').html(result);
			$('.resultado_pass').hide(3000);
			$('#formChangePass')[0].reset();*/
	 	},
	 	error: function(error){
	 		alert(error);
	 	}
    })
});