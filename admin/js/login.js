$(document).ready(function(){

    $('.loginAdmin').submit(function(e){
      e.preventDefault();

      var username = $('#username').val();
      var password = $('#password').val();

      $.ajax({
				beforeSend: function(){
				},
        url: "php/adminLogin.php",
				type: "POST",
				data: {
					username:username,
					password:password
				},
        success: function(result){
          if(result=='0'){
            $('.not_name').css({'display':'block'});
            setTimeout(function(){
              $('.not_name').css({'display':'none'});
            }, 2000);
          }else{
            if(result=='-1'){
              $('.not_pass').css({'display':'block'});
              setTimeout(function(){
                $('.not_pass').css({'display':'none'});
              }, 2000);
            }else{
              $('.welcome').css({'display':'block'});
              setTimeout(function(){
                $('.welcome').css({'display':'none'});
                window.location.href = "panel/index.php";
              }, 2000);
            }
          }
        },
        error: function(error){
          alert('error');
        },
        complete: function(){
        },
				timeout: 10000
      });

    });

});
