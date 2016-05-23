$(document).on('ready', function(){
	$('#paypal').click(function(){
		$('.mascara_bloqueo').css('opacity', '1');
		$('.mascara_bloqueo').css('z-index', '4');
		$('.mascara_pago').css('opacity', '1');
		$('.mascara_pago').css('z-index', '5');

	});

	$('.mascara_bloqueo').click(function(){
		$('.mascara_bloqueo').css('opacity', '0');
		$('.mascara_bloqueo').css('z-index', '0');
		$('.mascara_pago').css('opacity', '0');
		$('.mascara_pago').css('z-index', '0');
	});

	$("#video_play").bind("ended", function() {
		//$('video').attr('loop','loop');
		//$('video').load();
		$('.contenido').css('opacity','1');
		$('.contenido').css('z-index','1');
		$('.opacidad').css('opacity','.8');
		$('.fondo_video').css('z-index','-100');
		$('.video').css('display','none');
		$('fondo_video').css('display','none');
	});


	$('.fondo_video .close').click(function(){
		$('.video').prop("muted", true);
		$('.video').css('display','none');
		$('.contenido').css('opacity','1');
		$('.contenido').css('z-index','1');
		$('.opacidad').css('opacity','.8');
		$('.fondo_video').css('z-index','-100');
		$('.fondo_video').css('display','none');
	});

	$('.more_boton').click(function(){
		$('#bloquear').addClass('fondo_bloquear');
		$('.fondo_video_show').css('z-index','10');
		$('.fondo_video_show').css('opacity','1');
		$('.fondo_video_show video').get(0).play();
	});

	$('.close_show').click(function(){
		$('#bloquear').removeClass('fondo_bloquear');
		$('.fondo_video_show').css('z-index','-10');
		$('.fondo_video_show').css('opacity','0');
		$('.video_show').prop("muted", true);
		$('.fondo_video_show video').get(0).pause();
	});
});