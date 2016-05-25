<?php
	session_start();
	if(isset($_SESSION['idUser'])){
		$query = "SELECT * FROM user WHERE idUser = ".$_SESSION['idUser'];
		$result = mysql_query($query) or die(mysql_error());
		$line = mysql_fetch_array($result);
	}
	include('../../admin/php/connect_bd.php');
	connect_base_de_datos();
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
	<script type="text/javascript" src="../../js/image_click.js"> </script>
	<script type="text/javascript" src="../../js/image_click0.js"> </script>
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
			<img class="profile_popup" src="../../images/images.jpeg" />
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
			<?php if(isset($_SESSION['idUser']) && isset($_GET['idUser']) && $_GET['idUser'] == $_SESSION['idUser']){ ?>
			<a href="#"><span class="change_banner">CAMBIAR FOTO</span></a>
			<?php } ?>
		</div>

		<div class="content_profile">

			<div class="image_profile">
				<img src="../../images/images.jpeg" />
				<?php if(isset($_SESSION['idUser']) && isset($_GET['idUser']) && $_GET['idUser'] == $_SESSION['idUser']){ ?>
				<a href="#"><span class="change_profile">CAMBIAR FOTO</span></a>
				<?php } ?>
			</div>


			<div class="name_profile">
				<p>JOHN WEST</p>
			</div>

			<div class="city_profile">
				<p>Ciudad de México, México.</p>
			</div>

			<div class="age_profile">
				<p>27 AÑOS.</p>
			</div>

			<div class="profile_res">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
					 sed do eiusmod tempor incididunt ut labore et dolore magna
					 aliqua. Ut enim ad minim veniam, quis nostrud exercitation
					 ullamco laboris nisi ut aliquip ex ea commodo consequat.
					 Duis aute irure dolor in reprehenderit in voluptate velit
					 esse cillum dolore eu fugiat nulla pariatur.
					 Lorem ipsum dolor sit amet, consectetur adipisicing elit,
					 sed do eiusmod tempor incididunt ut labore et dolore magna
					 aliqua. Ut enim ad minim veniam, quis nostrud exercitation
					 ullamco laboris nisi ut aliquip ex ea commodo consequat.
					 Duis aute irure dolor in reprehenderit in voluptate velit
					 esse cillum dolore eu fugiat nulla pariatur.
				</p>
			</div>

				<!-- Send message popup -->
				<a id="show-img" href="#">
					<img src="../../images/social-03.png" />
					 <p class="send_txt"> ENVIAR MENSAJE	</p>
				</a>
				<div id="lightbox-panel">
					<div class="lightbox-content">
							<a id="close-panel" class="msn_box" href="#">
									<img src="../../images/img_galeria-02_close.png" alt="" />
							</a>
							<p class="toptext-light"> ENVIAR MENSAJE </p>

							<div class="msn_form">
								<p class="subject_form">ASUNTO:<input style="border:none" type="text" name="name"></p>
								<p class="text_form">MENSAJE: <textarea  name="name" rows="8" cols="40"></textarea> </p>
								<br>
								<input type="submit" value="ENVIAR">
							</div>
					</div>
				</div>
				<!-- /lightbox-panel -->
				<div id="lightbox"></div>
				<!-- /lightbox -->

			</div> <!-- end content profile -->

		<div class="favs_profile">

			<div class="back_ profile_back">
				<a href="cervezas.php">
					<img src="../../images/flecha-izq_negro.png" />
					<p class="back_text">VOLVER A CERVEZAS</p>
				</a>
			</div>

			<!-- slider favoritos -->

					<input type="radio" id="slide1" name="slider" checked>
					<input type="radio" id="slide2" name="slider">
					<input type="radio" id="slide3" name="slider">
					<input type="radio" id="slide4" name="slider">
					<input type="radio" id="slide5" name="slider">

				<div class="slides">
						<div class="toptext_slider"><span>FAVORITOS</span></div>
					<div class="overflow">

						<div class="inner profile">

							<article>
								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>


							</article>

							<article>
								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>


							</article>

							<article>
								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>


							</article>

							<article>
								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>


							</article>

							<article>
								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="heart-status">
										<span name="1" class="heart-icon 1">&#9829;</span>
										<span name="0" class="heart-icon 0" style="display:none;">&#9825;</span>
									</div>
								</li>


							</article>


						</div>
					</div>
				</div>
				<div class="controls">
					<label for="slide1"></label>
					<label for="slide2"></label>
					<label for="slide3"></label>
					<label for="slide4"></label>
					<label for="slide5"></label>
				</div>

			<!--- fin slider beers -->

			<!-- slider wishlist -->
					<input type="radio" id="slide1" name="slider" checked>
					<input type="radio" id="slide2" name="slider">
					<input type="radio" id="slide3" name="slider">
					<input type="radio" id="slide4" name="slider">
					<input type="radio" id="slide5" name="slider">

				<div class="slides">
					<span class="toptext_slider">WISHLIST</span>
					<div class="overflow">
						<div class="inner profile">

							<article>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="delete-opt">Eliminar</span><span> - </span><span class="mod-opt">Modificar</span>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="delete-opt">Eliminar</span><span> - </span><span class="mod-opt">Modificar</span>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="delete-opt">Eliminar</span><span> - </span><span class="mod-opt">Modificar</span>
								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="delete-opt">Eliminar</span><span> - </span><span class="mod-opt">Modificar</span>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="delete-opt">Eliminar</span><span> - </span><span class="mod-opt">Modificar</span>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="delete-opt">Eliminar</span><span> - </span><span class="mod-opt">Modificar</span>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="delete-opt">Eliminar</span><span> - </span><span class="mod-opt">Modificar</span>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="delete-opt">Eliminar</span><span> - </span><span class="mod-opt">Modificar</span>
								</li>
							</article>


						</div>
					</div>
				</div>
				<div class="controls">
					<label for="slide1"></label>
					<label for="slide2"></label>
					<label for="slide3"></label>
					<label for="slide4"></label>
					<label for="slide5"></label>
				</div>
			<!--- fin slider beers -->

			<!-- slider beer ranks -->
					<input type="radio" id="slide1" name="slider" checked>
					<input type="radio" id="slide2" name="slider">
					<input type="radio" id="slide3" name="slider">
					<input type="radio" id="slide4" name="slider">
					<input type="radio" id="slide5" name="slider">

				<div class="slides">
					<span class="toptext_slider">RANKS</span>
					<div class="overflow">
						<div class="inner profile">

							<article>
								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="rating" name='puto'>
										<div name="p">
										 <input type="radio" name="rating" id="r1">
										 <label for="r1" name='1'></label>
										</div>
										<div name="u">
										 <input type="radio" name="rating" id="r2">
										 <label for="r2" name='2'></label>
										</div>
										<div name="t">
										 <input type="radio" name="rating" id="r3">
										 <label for="r3" name='3'></label>
										</div>
										<div name="o">
										 <input type="radio" name="rating" id="r4">
										 <label for="r4" name='4'></label>
										</div>
										<div name="s">
										 <input type="radio" name="rating" id="r5">
										 <label for="r5" name='5'></label>
										</div>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="rating">
										 <input type="radio" name="rating" id="r1">
										 <label for="r1" class="first-star"></label>

										 <input type="radio" name="rating" id="r2">
										 <label for="r2"></label>

										 <input type="radio" name="rating" id="r3">
										 <label for="r3"></label>

										 <input type="radio" name="rating" id="r4">
										 <label for="r4"></label>

										 <input type="radio" name="rating" id="r5">
										 <label for="r5"></label>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="rating">
										 <input type="radio" name="rating" id="r1">
										 <label for="r1" class="first-star"></label>

										 <input type="radio" name="rating" id="r2">
										 <label for="r2"></label>

										 <input type="radio" name="rating" id="r3">
										 <label for="r3"></label>

										 <input type="radio" name="rating" id="r4">
										 <label for="r4"></label>

										 <input type="radio" name="rating" id="r5">
										 <label for="r5"></label>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="rating">
										 <input type="radio" name="rating" id="r1">
										 <label for="r1" class="first-star"></label>

										 <input type="radio" name="rating" id="r2">
										 <label for="r2"></label>

										 <input type="radio" name="rating" id="r3">
										 <label for="r3"></label>

										 <input type="radio" name="rating" id="r4">
										 <label for="r4"></label>

										 <input type="radio" name="rating" id="r5">
										 <label for="r5"></label>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="rating">
										 <input type="radio" name="rating" id="r1">
										 <label for="r1" class="first-star"></label>

										 <input type="radio" name="rating" id="r2">
										 <label for="r2"></label>

										 <input type="radio" name="rating" id="r3">
										 <label for="r3"></label>

										 <input type="radio" name="rating" id="r4">
										 <label for="r4"></label>

										 <input type="radio" name="rating" id="r5">
										 <label for="r5"></label>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="rating">
										 <input type="radio" name="rating" id="r1">
										 <label for="r1" class="first-star"></label>

										 <input type="radio" name="rating" id="r2">
										 <label for="r2"></label>

										 <input type="radio" name="rating" id="r3">
										 <label for="r3"></label>

										 <input type="radio" name="rating" id="r4">
										 <label for="r4"></label>

										 <input type="radio" name="rating" id="r5">
										 <label for="r5"></label>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="rating">
										 <input type="radio" name="rating" id="r1">
										 <label for="r1" class="first-star"></label>

										 <input type="radio" name="rating" id="r2">
										 <label for="r2"></label>

										 <input type="radio" name="rating" id="r3">
										 <label for="r3"></label>

										 <input type="radio" name="rating" id="r4">
										 <label for="r4"></label>

										 <input type="radio" name="rating" id="r5">
										 <label for="r5"></label>
									</div>
								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<div class="rating">

										<div>
										 <input type="radio" name="rating" id="r1">
										 <label for="r1" name='1'></label>
										</div>
										<div>
										 <input type="radio" name="rating" id="r2">
										 <label for="r2" name='2'></label>
										</div>
										<div>
										 <input type="radio" name="rating" id="r3">
										 <label for="r3" name='3'></label>
										</div>
										<div>
										 <input type="radio" name="rating" id="r4">
										 <label for="r4" name='4'></label>
										</div>
										<div>
										 <input type="radio" name="rating" id="r5">
										 <label for="r5" name='5'></label>
										</div>



									</div>

								</li>

							</article>

							<article>
								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


							</article>

							<article>
								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


							</article>

							<article>
								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


							</article>

							<article>
								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>

								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


								<li class="first_beer">
									<a href=""><img src="../../images/beerBottles/beers-01.png"></a> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span> <br>
									<span class="rank-stars-opt" value="1">★</span>
									<span class="rank-stars-opt" value="2">☆</span>
									<span class="rank-stars-opt" value="3">☆</span>
									<span class="rank-stars-opt" value="4">☆</span>
									<span class="rank-stars-opt" value="5">☆</span>


								</li>


							</article>

						</div>
					</div>
				</div>
				<div class="controls">
					<label for="slide1"></label>
					<label for="slide2"></label>
					<label for="slide3"></label>
					<label for="slide4"></label>
					<label for="slide5"></label>
				</div>
			<!--- fin slider beers -->


			<!-- comments -->
			<span class="toptext_slider comments_title">COMENTARIOS</span>
			<div id="comments_box">
				<div class="msn_content">

					<!-- message received -->
				<div id="itemContainer">
					<div id="itemContainerInner">

						<div class="item i1">
							<img src="../../images/profile_default.jpg"/>
						</div>

						<div class="item i2">
								<p>CONTACTO</p>
						</div>

						<div class="item i3">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing
									 dolor sit amet, consectetur adipiscing
										dolor sit amet, consectetur adipiscing
									</p>

						</div>


					</div>

					<h2>Miércoles 18 de Junio 2015</h2>
				</div>

					<!-- message received -->
				<div id="itemContainer">
					<div id="itemContainerInner">

						<div class="item i1">
							<img src="../../images/profile_default.jpg"/>
						</div>

						<div class="item i2">
								<p>CONTACTO</p>
						</div>

						<div class="item i3">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing
									elit, sed do eiusmod tempor incididunt ut labore
									et dolore magna aliqua. Ut enim ad minim veniam.

									</p>

						</div>


					</div>

					<h2>Miércoles 18 de Junio 2015</h2>
				</div>

					<!-- message received -->
				<div id="itemContainer">
					<div id="itemContainerInner">

						<div class="item i1">
							<img src="../../images/profile_default.jpg"/>
						</div>

						<div class="item i2">
								<p>CONTACTO</p>
						</div>

						<div class="item i3">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing
									 dolor sit amet, consectetur adipiscing
										dolor sit amet, consectetur adipiscing
									</p>

						</div>


					</div>

					<h2>Miércoles 18 de Junio 2015</h2>
				</div>

					<!-- message received -->
				<div id="itemContainer">
					<div id="itemContainerInner">

						<div class="item i1">
							<img src="../../images/profile_default.jpg"/>
						</div>

						<div class="item i2">
								<p>CONTACTO</p>
						</div>

						<div class="item i3">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing
									 dolor sit amet, consectetur adipiscing
										dolor sit amet, consectetur adipiscing
									</p>

						</div>


					</div>

					<h2>Miércoles 18 de Junio 2015</h2>
				</div>

					<!-- message received -->
				<div id="itemContainer">
					<div id="itemContainerInner">

						<div class="item i1">
							<img src="../../images/profile_default.jpg"/>
						</div>

						<div class="item i2">
								<p>CONTACTO</p>
						</div>

						<div class="item i3">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing
									elit, sed do eiusmod tempor incididunt ut labore
									et dolore magna aliqua. Ut enim ad minim veniam.

									</p>

						</div>


					</div>

					<h2>Miércoles 18 de Junio 2015</h2>
				</div>

					<!-- message received -->
				<div id="itemContainer">
					<div id="itemContainerInner">

						<div class="item i1">
							<img src="../../images/profile_default.jpg"/>
						</div>

						<div class="item i2">
								<p>CONTACTO</p>
						</div>

						<div class="item i3">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing
									 dolor sit amet, consectetur adipiscing
										dolor sit amet, consectetur adipiscing
									</p>

						</div>


					</div>

					<h2>Miércoles 18 de Junio 2015</h2>
				</div>

				</div>
			</div>

			<!--box foot right -->

			<?php if(isset($_SESSION['idUser'])){ ?>
			<div class="send_a_message comments_text">
				<input type="text" name="message" placeholder="Escribe un comentario...">
					<div class="send_button comments_send">
						<a href="#"> <p>COMENTAR</p></a>
					</div>
		 </div>
		 <?php } ?>


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

	<!-- Script Favoritos -->
	<?php if(isset($_SESSION['idUser'])){ ?>
	<script type="text/javascript">
	$('div.heart-status .1,div.heart-status .0').on('click',function(){
			var value = $(this).attr('name');
			if(value==1){
				$(this).css({'display':'none'});
				$(this).siblings('span[name=0]').css({'display':'inline-block'});
			}else{
				$(this).css({'display':'none'});
				$(this).siblings('span[name=1]').css({'display':'inline-block'});
			}
	});
	</script>

	<script type="text/javascript">
		$('.rating label').hover(function(){
			var pos = $(this).attr('name');
			pos = parseInt(pos);
			$(this).parent().parent().children('div').each(function(index){
					if((index+1)>pos){
						$(this,'label').css({'opacity':'.5'});
					}else{
						$(this,'label').css({'opacity':'1'});
					}
			});
		}, function(){

		});
	</script>
	<?php } ?>


</body>
</html>
