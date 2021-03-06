<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Inicio | The Beer Fans | Red Social</title>

	<link rel="shortcut icon"  type="image/png" href="../../images/favicon.png">
	<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="../../styles/styles_responsive.css">
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

	<script type="text/javascript" src="../../js/all_pages_jquery.js"> </script>

</head>

<body>
	<div id="menu_options">
		<div class="close_menu">
			<img src="../../images/close_image-01.png">
		</div>
		<div class="menu_list">
			<ul>
				<a href="inicio.php"><li><span>HOME</span></li></a>
				<a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
				<a href="productores.php"><li><span>PRODUCTORES</span></li></a>
				<a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
				<a href="perfil.php"><li><span>MI PERFIL</span></li></a>
				<a href="../eng/contact_eng.php"class="changeLanguage"><li><span>ENGLISH</span></li></a>
				<a href="configuracion.php"><li><span>CONFIGURACIÓN</span></li></a>
				<a href=""><li class="no_border"><span>SALIR</span></li></a>
			</ul>
		</div>
		<div class="social_other">
			<ul>
				<a href=""><li><img src="../../images/bottom-05.png"></li></a>
				<a href=""><li><img src="../../images/bottom-04.png"></li></a>
				<a href=""><li><img src="../../images/bottom-03.png"></li></a>
				<a href=""><li><img src="../../images/bottom-02.png"></li></a>
			</ul>
		</div>
	</div>

	<div id="contenedor">


		<div class="top_info">
				<div class="contenedo_info">
						<a href="inicio.php">
								<div class="logo_tbf">
										<img src="../../images/menu_options-01.png" alt="The Beer Fans Logo" title="The Beer Fans Logo">
								</div>
						</a>
				</div>
		</div>

		<div class="top_img">
			<img src="../../images/large.jpg" alt="Imagen The Beer Fans Principal" title="Imagen The Beer Fans Principal">
				<span class="text_prin bottom_text">CONTACTO</span>
		</div>

  	<div class="top_contact">
    	<p>QUEREMOS SABER LO QUE PIENSAS</p>
  	</div>

		<!-- MAIN -->

		<div class="content_contact">
			<div class="config_back contact_back">
				<a href="inicio.php">
					<img src="../../images/flecha-izq_negro.png" />
					<p class="back_text">IR A  HOME</p>
				</a>
			</div>
  		<div class="input_contact">

				<div class="input_form">
					<form id="formContact">
					  	<p class="name_form">NOMBRE:<input required type="text" name="name"></p>
					  	<p class="email_form">EMAIL:<input required type="email" name="email"></p>
					  	<p class="message_form">MENSAJE: <textarea required name="mensaje" rows="8" cols="40"></textarea> </p>
							<br>
					  	<input type="submit" value="ENVIAR">
					</form>
					<div class="result_email"></div>
				</div>

  		</div>

  		<div class="info_contact">

			<div class="info_text">

				<span><p>info@thebeerfans.com <br> Av. Patria #234 Col. Lomas <br> Guadalajara, Jalisco, México</p></span>

				<div class="social_company">
					<a target="_blank" href="" class="first_contact fb"><img src="../../images/social-04.png"></a>
					<a target="_blank" href="" class="other_contact twt"><img src="../../images/social-02.png"></a>
					<a target="_blank" href="" class="other_contact ig"><img src="../../images/social-01.png"></a>
        </div>
  		</div>

  		</div>

		</div>

 </div>
 <div class="bottom_site other_bottom">
	 <div class="center_cont_site">
		 <a href="#contenedor" class="ancla">
			 <div class="go_top">
				 <img src="../../images/go_top.png">
			 </div>
		 </a>
		 <ul class="social">
			 <a href=""><li><img src="../../images/bottom-05.png"></li></a>
			 <a href=""><li><img src="../../images/bottom-04.png"></li></a>
			 <a href=""><li><img src="../../images/bottom-03.png"></li></a>
			 <a href=""><li><img src="../../images/bottom-02.png"></li></a>
		 </ul>
		 <ul class="nav">
			 <a href="inicio.php"><li><span>HOME</span></li></a>
		 </ul>
		 <span class="right_about">
              <a href="video_esp.html" target="_blank" style="color:white">Nosotros</a> - <a href="term.pdf" target="_blank" style="color:white">Política de Privacidad</a> - <a href="faqs.pdf" target="_blank" style="color:white">FAQS</a>
            </span>
		 <span class="right_about">© 2015 The Beer Fans. All rights reserved.</span>
	 </div>
 </div>
 <script src="../../js/services.js"></script>
 <script type="text/javascript">

		 var selected = $( ".filter-opt option:selected").attr('name');

		 if (selected < 1) {
			 $( "#box-target" ).focus(function() {
					$( 'ul.callouts' ).css( "display", "block" );
			 });

			 $( "#box-target" ).focusout(function() {
					$( 'ul.callouts' ).css( "display", "none" );
			 });
		 }
 </script>

 <script>
 	$('.changeLanguage').click(function(e){
 		var namefunction = 'changeLanguageMenu';
 		$.ajax({
 				beforeSend: function () {
 				},
 				url: "../../admin/php/functions.php",
 				type: "POST",
 				data: {
 						namefunction: namefunction
 				},
 				success: function (result) {

 				},
 				error: function (error) {
 				},
 				complete: function () {
 				},
 				timeout: 10000
 		});
 	});
 </script>

	</div>
</body>
</html>
