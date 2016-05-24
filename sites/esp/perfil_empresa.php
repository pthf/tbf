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
	<script type="text/javascript" src="../../js/slider.js"> </script>
	<script type="text/javascript" src="../../js/popup_img.js"> </script>

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

		<div class="popup_img">
			<img class="profile_popup" src="../../images/beerProfiles/minerva.png" />
			<a href=""><img class="close-pop" src="../../images/close_image-01.png" alt=""></a>
		</div>

		<div class="top_info">
			<div class="contenedo_info">
				<a href="inicio.php">
				<div class="logo_tbf">
					<img src="../../images/menu_options-01.png" alt="The Beer Fans Logo" title="The Beer Fans Logo">
				</div>
				</a>
				<div class="perfil_tbf">
					<div class="search">
						<img src="../../images/icon-01.png" alt="search icon" title="search icon">
						<input type="text">
					</div>
					<div class="cont_info_user">
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
						<div class="user_name">
							<span>USER NAME</span>
						</div>
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

			<div class="age_profile">

				<p>Av. López Mateos #34 <br> Col. El Monte, CP. 60403 <br> T. 334433578454.</p>

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


				<a href="mailto:someone@example.com?Subject=The_Beers_Fans" target="_top" class="message_button">
				<div class="send_message" >
				<img src="../../images/social-03.png"/>
				<p>ENVIAR CORREO</p>
				</div>
				</a>

				<div class="link_profile">
					<a href="http://www.cervezaminerva.mx/">www.cervezaminerva.mx</a>
				</div>

			</div>


		</div>

		<div class="favs_profile favs_profile_beer">

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
						<span class="toptext_slider">PRODUCTOS</span>
					<div class="overflow">

						<div class="inner profile">

							<article>
									<li class="first_beer">
										<img src="../../images/beerBottles/beers-01.png"> <br>
										<span class="title">Nombre Cerveza</span>
										<span class="subtitle">Brief description of the beer </span>
										<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
									</li>


									<li class="other_beer  two_beers">
										<img src="../../images/beerBottles/beers-03.png"> <br>
										<span class="title">Nombre Cerveza</span>
										<span class="subtitle">Brief description of the beer </span>
										<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
									</li>

									<li class="other_beer">
										<img src="../../images/beerBottles/beers-02.png"> <br>
										<span class="title">Nombre Cerveza</span>
										<span class="subtitle">Brief description of the beer </span>
										<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
									</li>

									<li class="other_beer two_beers">
										<img src="../../images/beerBottles/beers-03.png"> <br>
										<span class="title">Nombre Cerveza</span>
										<span class="subtitle">Brief description of the beer </span>
										<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
									</li>

									<li class="first_beer two_beers">
										<img src="../../images/beerBottles/beers-01.png"> <br>
										<span class="title">Nombre Cerveza</span>
										<span class="subtitle">Brief description of the beer </span>
										<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
									</li>

									<li class="other_beer">
										<img src="../../images/beerBottles/beers-02.png"> <br>
										<span class="title">Nombre Cerveza</span>
										<span class="subtitle">Brief description of the beer </span>
										<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
									</li>

									<li class="other_beer two_beers">
										<img src="../../images/beerBottles/beers-03.png"> <br>
										<span class="title">Nombre Cerveza</span>
										<span class="subtitle">Brief description of the beer </span>
										<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
									</li>

									<li class="other_beer">
										<img src="../../images/beerBottles/beers-02.png"> <br>
										<span class="title">Nombre Cerveza</span>
										<span class="subtitle">Brief description of the beer </span>
										<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
									</li>

							</article>

							<article>
								<li class="first_beer">
									<img src="../../images/beerBottles/beers-01.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-02.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-03.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-05.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="first_beer">
									<img src="../../images/beerBottles/beers-05.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-01.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-02.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-03.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>
							</article>

							<article>
								<li class="first_beer">
									<img src="../../images/beerBottles/beers-01.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-02.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-03.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-05.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="first_beer">
									<img src="../../images/beerBottles/beers-05.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-01.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-02.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-03.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>
							</article>

							<article>
								<li class="first_beer">
									<img src="../../images/beerBottles/beers-01.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-02.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-03.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-05.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="first_beer">
									<img src="../../images/beerBottles/beers-05.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-01.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-02.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-03.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>
							</article>

							<article>
								<li class="first_beer">
									<img src="../../images/beerBottles/beers-01.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-02.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-03.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-05.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="first_beer">
									<img src="../../images/beerBottles/beers-05.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-01.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-02.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
								</li>

								<li class="other_beer">
									<img src="../../images/beerBottles/beers-03.png"> <br>
									<span class="title">Nombre Cerveza</span>
									<span class="subtitle">Brief description of the beer </span>
									<a href="perfil_beer.php"><span class="ver_mas">VER MÁS</span></a>
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
					<a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
					<a href="productores.php"><li><span>PRODUCTORES</span></li></a>
					<a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
					<a href="perfil.php"><li><span>MI PERFIL</span></li></a>
					<a href="configuracion.php"><li><span>CONFIGURACIÓN</span></li></a>
					<a href="contact.php"><li><span>CONTACTO</span></li></a>
				</ul>
				<span class="right_about">About Us - Política de Privacidad - FAQS</span>
				<span class="right_about">© 2015 The Beer Fans. All rights reserved.</span>
			</div>
		</div>
	</div>
</body>
</html>
