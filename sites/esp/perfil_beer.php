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

	<title>Perfil | The Beer Fans | Red Social</title>

	<link rel="shortcut icon"  type="image/png" href="../../images/favicon.png">
	<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="../../styles/styles_responsive.css">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

	<script type="text/javascript" src="../../js/all_pages_jquery.js"> </script>
	<script type="text/javascript" src="../../js/image_click.js"> </script>
	<script type="text/javascript" src="../../js/slider.js"> </script>
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
			<img class="profile_popup" src="../../images/beerProfiles/alhambra.png" />
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
				<img src="../../images/beerProfiles/alhambra.png" />
			</div>


			<div class="name_profile">

				<p>Alhambra</p>

			</div>

			<div class="city_profile">

				<p>Dorada </p>

			</div>

			<div class="age_profile">

				<p>Caracteristicas Generales</p>

			</div>

			<div class="desc_profile">

				<p>"Sed ut perspiciatis unde omnis iste natus
           error sit voluptatem accusantium doloremque
           laudantium, totam rem aperiam, eaque ipsa
           quae ab illo inventore veritatis et quasi
           ar- chitecto beatae vitae dicta sunt explicabo.
           Nemo enim ipsam voluptatem quia voluptas sit
           aspernatur aut odit aut fugit, sed quia con-
           sequuntur magni dolores eos qui ratione vo-
           luptatem sequi nesciunt. Neque porro quis-
				 </p>
				 <br><br>
					<span>País: </span> <span>ESPAÑA</span> <br><br>
					<span>Estilo: </span> <span> Dorada </span> <br><br>
					<span>Grado de alcohol:</span> <span>4.6% - 6.4%</span> <br><br>
					<span>IBUS:</span> <span>30</span> <br>

		 		</div>

				<div class="social_company">
					<a href="#" class="first_contact fb"><img src="../../images/social-04.png"/></a>
					<a href="#" class="other_contact twt"><img src="../../images/social-02.png" /></a>
					<a href="#" class="other_contact ig"><img src="../../images/social-01.png" /></a>
				</div>


		</div>

		<div class="favs_profile favs_profile_beer">

			<div class="back_ profile_back">
				<a href="cervezas.php">
					<img src="../../images/flecha-izq_negro.png" />
					<p class="back_text">VOLVER A CERVEZAS</p>
				</a>
			</div>


			<!-- Beer rank -->
			<div class="image_beer">

				<a id="show-panel" href="#">
					<img src="../../images/beerBottles/beers-01.png" alt="" />
				</a>

				<div id="lightbox-panel">

						<a id="close-panel" href="#">
								<img src="../../images/close_image-01.png" alt="" />
						</a>

							<div class="slideshow slide_pop">
								<div class="prev"> <img src="../../images/flecha-izq.png"> </div>
	 							<div class="next"> <img src="../../images/flecha-der.png"> </div>

								<ul class="beers_month">
									<li data-n="1">
										<img src="../../images/beerBanners/tarro_b-01.png" alt="tbf tarro" title="tbf tarro">
									</li>

									<li data-n="2">
										<img src="../../images/postBanners/8150090.png" alt="tbf tarro" title="tbf tarro">
									</li>

									<li data-n="3">
										<img src="../../images/beerBanners/bg_1.jpg" alt="tbf tarro" title="tbf tarro">
									</li>

									<li data-n="4">
										<img src="../../images/beerBanners/photo_pthf_home-03.png" alt="tbf tarro" title="tbf tarro">
									</li>

								 </ul>

									<ul class="nav_beers popup_beers">
									 <li data-cd="1"></li>
									 <li data-cd="2"></li>
									 <li data-cd="3"></li>
									 <li data-cd="4"></li>
								 	</ul>

								</div>

							</div>

				<!-- /lightbox-panel -->
						<!-- /lightbox -->
			</div>


			<div id="rank_beer">
				<p class="ranktitle">RANKING</p>
				<h1 class="ranklevel">4</h1>
				<h2 class="rankstars">★★★★☆</h2>

				<div class="fav_box">
					<a class="user_icons" href="#">
						<img class="fav_button" id="fav_button" src="../../images/fav1.svg">
						<p class="add_fav">AGREGAR A FAVORITOS</p>
					</a>
				</div>

				<div class="wishlist_box">
					<a class="user_icons" href="#">
						<img class="wishlist_icon" src="../../images/wishlist.svg">
						<p class="add_wishlist">AGREGAR A WISHLIST</p>
					</a>
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
