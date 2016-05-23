$(document).on('ready', function(){
	$('.prin_img .capa').hover(function(){
		$(this).css('opacity','1');
		$(this).css('cursor','pointer');
	}, function(){
		$(this).css('opacity','1');
		$(this).css('cursor','normal');
	});

	$('a.ancla').click(function(e){
		e.preventDefault();
		enlace  = $(this).attr('href');
		$('html, body').animate({
			scrollTop: $(enlace).offset().top-160
		}, 1000);
	});

	$('.menu_buttom img').click(function(){
		$('#menu_options').css('z-index','2');
		$('#menu_options').css('opacity','1');
		$('#contenedor').css('z-index','-1');
	});

	$('.close_menu').click(function(){
		$('#menu_options').css('z-index','-1');
		$('#menu_options').css('opacity','0');
		$('#contenedor').css('z-index','1');
	});
});
