<?php
	session_start();
	include('../../admin/php/connect_bd.php');
	connect_base_de_datos();
	if(isset($_SESSION['idUser'])){
		$query = "SELECT * FROM user WHERE idUser = ".$_SESSION['idUser'];
		$result = mysql_query($query) or die(mysql_error());
		$line = mysql_fetch_array($result);
	}
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Cervezas | The Beer Fans | Red Social</title>

	<link rel="shortcut icon"  type="image/png" href="../../images/favicon.png">
	<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="../../styles/styles_responsive.css">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<script type="text/javascript" src="../../js/all_pages_jquery.js"> </script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script type="text/javascript" src="../../js/google_api.js"></script>
		<script type="text/javascript" src="../../js/popup_img.js"> </script>

</head>

<body>

	<?php if(!isset($_SESSION['idUser'])){ ?>
	<div class="background-filter"></div>
	<?php } ?>

	<?php if(!isset($_SESSION['idUser'])){ ?>
	<div class="login-modal">
		<div class="close-icon">
			<img src="../../images/img_galeria-02_close.png" >
		</div>
		<div class="login-title">
			<span class="login-title-text">INICIAR SESIÓN</span>
		</div>

		<form action="">
			<div class="input-boxes">
				<input type="text" name="name" placeholder="NOMBRE:" id="password" class="input-login">
				<br><br>
				<input type="password" name="name" placeholder="PASSWORD:" id="password" class="input-login">
				<br>
			</div>

			<div class="send-login-content">
				<br>
				<span class="not-user">¿NO TIENES CUENTA AÚN? REGÍSTRATE.</span>
				<br><br>
				<button type="button" name="button" id="send-login">INICIAR SESIÓN</button>
			</div>
		</form>

	</div>
	<?php } ?>

	<?php if(!isset($_SESSION['idUser'])){ ?>
	<div class="signup-modal">
		<div class="close-icon">
			<img src="../../images/img_galeria-02_close.png" >
		</div>

		<div class="login-title">
			<span class="login-title-text">REGISTRARSE</span>
		</div>

		<div class="signup-modal-content">
			<input type="text" name="name" placeholder="NOMBRE:" id="" class="signup-form">
			<input type="text" name="name" placeholder="APELLIDO:" id="" class="signup-form">
			<input type="text" name="name" placeholder="EMAIL:" id="" class="signup-form">
		<div class="date-form">
			<span class="titleData">Fecha de Nac.:</span>
			<select name="month">
				<option value="na">Mes &#x25BE;</option>
				<option value="1">Enero</option>
				<option value="2">Febrero</option>
				<option value="3">Marzo</option>
				<option value="4">Abril</option>
				<option value="5">Mayo</option>
				<option value="6">Junio</option>
				<option value="7">Julio</option>
				<option value="8">Agosto</option>
				<option value="9">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
			</select>
			<select name="day" id="day">
			<option value="na">Día&#x25BE;</option>
			</select>
			<select name="year" id="year">
			<option value="na">Año&#x25BE;</option>
			</select>
		</div>

			<input type="text" name="name" placeholder="CIUDAD:" id="" class="signup-form">
			<input type="text" name="name" placeholder="PAÍS:" id="" class="signup-form">
			<input type="password" name="name" placeholder="CONTRASEÑA:" id="" class="signup-form">
			<input type="password" name="name" placeholder="CONFIRMAR CONTRASEÑA:" id="" class="signup-form">

			<div class="send-login-content sign-up-send">
				<br>
				<span class="not-user">ACEPTAS LOS TÉRMINOS DE PRIVACIDAD.</span>
				<input type="checkbox" name="" value="">
				<br><br>
				<button type="button" name="button" id="send-login">ENVIAR</button>
			</div>

		</div>
	</div>
	<?php } ?>

	<div id="menu_options">

		<div class="close_menu">
			<img src="../../images/close_image-01.png">
		</div>

		<div class="menu_list">
			<?php if(isset($_SESSION['idUser'])){ ?>
			<ul>
				<a href="inicio.php"><li><span>HOME</span></li></a>
				<a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
				<a href="productores.php"><li><span>PRODUCTORES</span></li></a>
				<a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
				<a href="perfil.php"><li><span>MI PERFIL</span></li></a>
				<a href="configuracion.php"><li><span>CONFIGURACIÓN</span></li></a>
				<a href=""><li class="no_border"><span>SALIR</span></li></a>
			</ul>
			<?php }else{?>
				<ul>
					<a href="inicio.php"><li><span>HOME</span></li></a>
					<a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
					<a href="productores.php"><li><span>PRODUCTORES</span></li></a>
					<a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
					<a href="#" class="user_name_click"><li><span>INICIAR SESIÓN</span></li></a>
				</ul>
			<?php }?>
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

		<div class="popup_img">
			<img class="profile_popup" src="../../images/beerProfiles/minerva.png" />
			<a href=""><img class="close-pop" src="../../images/close_image-01.png" alt=""></a>
		</div>

		<div class="top_info">
			<div class="contenedo_info">
				<a href="inicio.php">
					<a href="inicio.php">
					<div class="logo_tbf">
						<img src="../../images/menu_options-01.png" alt="The Beer Fans Logo" title="The Beer Fans Logo">
					</div>
					</a>
				</a>
				<div class="perfil_tbf">
					<div class="search">
						<img src="../../images/icon-01.png" alt="search icon" title="search icon">
						<input type="text">
					</div>

					<div class="cont_info_user">

						<?php if(isset($_SESSION['idUser'])){ ?>
						<div class="msg">
							<a href="mensajes.php">
							<img src="../../images/menu_options-03.png" alt="icon message" title="icon message">
							</a>
						</div>
						<div class="profile_img">
							<a href="perfil.php">
							<img src="../../images/profile_default.jpg" alt="profile image" title="profile image">
							</a>
						</div>
						<?php }?>

						<?php
							if(isset($_SESSION['idUser'])){
								echo '<div class="user_name">
												<span>'.$line["userName"].'</span>
											</div>';
							}else {
								echo '
											<div class="user_name">
												<span>INICIAR SESIÓN</span>
											</div>
								';
							}
						?>

						<div class="menu_buttom">
							<img src="../../images/menu_options-04.png" alt="menu image" title="menu image">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="top_img">
			<img src="../../images/beerBanners/photo_pthf_home-04.png" alt="Imagen The Beer Fans Principal" title="Imagen The Beer Fans Principal">
		</div>

		<div class="content_profile content_profile_beer">

			<div class="image_logo">

				<img src="../../images/beerProfiles/minerva.png" />
			</div>

			<div class="name_profile">

				<p>CERVECERIA MINERVA</p>

			</div>

			<div class="city_profile">

				<p>Guadalajara, México.</p>

			</div>

			<div class="age_profile material_age">

				<p>Av. López Mateos #34 <br> Col. El Monte, CP. 60403 <br> T. 334433578454.</p>

			</div>

			<div class="desc_profile">


				<a href="mailto:someone@example.com?Subject=The_Beers_Fans" target="_top" class="message_button">
				<div class="send_message" >
				<img src="../../images/social-03.png"/>
				<p>ENVIAR CORREO A PRODUCTOR</p>
				</div>
				</a>

				<div class="link_profile">
					<a href="http://www.cervezaminerva.mx/">www.cervezaminerva.mx</a>
				</div>

			</div>


		</div>

		<div class="favs_profile favs_profile_material">

			<div class="back_ profile_back">
				<a href="cervezas.php">
					<img src="../../images/flecha-izq_negro.png" />
					<p class="back_text">VOLVER A CERVEZAS</p>
				</a>
			</div>

			<div class="name_profile material_title">
				<p>Elaboración de Cerveza en Anillo Perimetral 2700, Col. El Milagro, Hidalgo del Parral, Chihuahua.</p>
			</div>

			<div class="city_profile material_subtitle">
				<p>Cervezas Cuauhtémoc Moctezuma S.A. de C.V. se encuentra en Anillo Perimetral 2700, Col. El Milagro, Hidalgo del Parral, Chihuahua. Aquí podrá encontrar la mejor calidad en Elaboración de Cerveza.</p>
			</div>

			<div class="map" id="googleMap" >	</div>

			<div class="profile_res">
				En Cervezas Cuauhtémoc Moctezuma, S.A. de C.V. somos una empresa de gran tradición en nuestro país. Nos dedicamos a la elaboración y venta de las mejores marcas de cervezas del país.
				Contamos con la más amplia variedad de surtido de cervezas en el mercado, ideales para disfrutar durante eventos sociales y deportivos.
				Algunas de las cervezas que le ofrecemos son: <br> <br>
				<ul>
					<li>Cerveza</li>
					<li>Carne asada</li>
					<li>Tecate</li>
					<li>Tecate ligth</li>
					<li>Carta blanca</li>
					<li>Cerveza Sol</li>
					<li>Cerveza XX</li>
					<li>Cerveza de barril</li>
				</ul> <br> <br>
				Contamos con el mobiliario necesario para amenizar sus fiestas y reuniones, así como con todo el equipo necesario para hacer de su evento el más ameno.
				Manejamos servicio a domicilio, podemos llevarle hasta su hogar o salón de eventos, desde un cartón hasta el volumen de cerveza que requiera.
				Póngase en contacto con nosotros por este medio o por correo electrónico, le daremos atención personalizada.
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
					<?php if(isset($_SESSION['idUser'])){ ?>
					<ul class="nav">
						<a href="inicio.php"><li><span>HOME</span></li></a>
						<a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
						<a href="productores.php"><li><span>PRODUCTORES</span></li></a>
						<a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
						<a href="perfil.php"><li><span>MI PERFIL</span></li></a>
						<a href="configuracion.php"><li><span>CONFIGURACIÓN</span></li></a>
						<a href="contact.php"><li><span>CONTACTO</span></li></a>
					</ul>
					<?php }else{ ?>
						<ul class="nav">
							<a href="inicio.php"><li><span>HOME</span></li></a>
							<a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
							<a href="productores.php"><li><span>PRODUCTORES</span></li></a>
							<a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
							<a href="#" class="user_name_click"><li><span>INICIAR SESIÓN</span></li></a>
							<a href="contact.php"><li><span>CONTACTO</span></li></a>
						</ul>
					<?php } ?>

					<span class="right_about">Nosotros - Política de Privacidad - FAQS</span>

					<span class="right_about">© <?= date('Y') ?> The Beer Fans. Todos los derechos reservados.</span>
				</div>
		</div>

		<script type="text/javascript">
			$(document).on("ready",function(){

				$(document).on('click', '.user_name, .user_name_click', function(){
					$(".login-modal").css({
						"opacity" : "1",
						"z-index" : "10",
					}),
					$(".background-filter").css({
						"opacity" : "1",
						"z-index" : "10",
					})
				});

				$(".close-icon,.background-filter").on("click", function(){
					$(".login-modal").css({
						"opacity" : "0",
						"z-index" : "-1",
					}),
					$(".background-filter").css({
						"opacity" : "0",
						"z-index" : "-1",
					})
				});

			});
		</script>

		<script type="text/javascript">
			$(document).on("ready",function(){

				$(".not-user").on("click", function(){
					$(".signup-modal").css({
						"opacity" : "1",
						"z-index" : "10",
					}),
					$(".background-filter").css({
						"opacity" : "1",
						"z-index" : "10",
					})
				});

				$(".close-icon,.background-filter").on("click", function(){
					$(".signup-modal").css({
						"opacity" : "0",
						"z-index" : "-1",
					}),
					$(".background-filter").css({
						"opacity" : "0",
						"z-index" : "-1",
					})
				});

			});
		</script>

	</div>
</body>
</html>
