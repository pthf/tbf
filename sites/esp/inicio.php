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

	<title>Inicio | The Beer Fans | Red Social</title>

	<link rel="shortcut icon"  type="image/png" href="../../images/favicon.png">
	<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="../../styles/styles_responsive.css">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../../js/all_pages_jquery.js"> </script>
	<script type="text/javascript" src="../../js/check.js"> </script>
	<script type="text/javascript" src="../../js/slider.js"> </script>
</head>
<body>

	<?php if(!isset($_SESSION['idUser'])){ ?>
	<div class="background-filter"></div>
	<?php } ?>

	<?php if(!isset($_SESSION['idUser'])){ ?>
	<div class="login-modal">
		<div class="login-modal-wrapper">
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
					<div class="not-user">¿NO TIENES CUENTA AÚN? <span class="underline">REGÍSTRATE.</span></div>
					<br><br>
					<button type="button" name="button" id="send-login">ENVIAR</button>
				</div>
			</form>
		</div>

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

			<form class="formNewUser" id="formNewUser">

				<input required type="text" name="name" placeholder="NOMBRE:" class="signup-form">
				<input required type="text" name="lastname" placeholder="APELLIDO:" class="signup-form">

				<div class="date-form">
					<span class="titleData">Fecha de Nac:</span>
					<select required name="month">
						<option selected disabled value="">Mes&#x25BE;</option>
						<option value="1" name="1">Enero</option>
						<option value="2" name="2">Febrero</option>
						<option value="3" name="3" >Marzo</option>
						<option value="4" name="4">Abril</option>
						<option value="5" name="5">Mayo</option>
						<option value="6" name="6">Junio</option>
						<option value="7" name="7">Julio</option>
						<option value="8" name="8">Agosto</option>
						<option value="9" name="9">Septiembre</option>
						<option value="10" name="10">Octubre</option>
						<option value="11" name="11">Noviembre</option>
						<option value="12" name="12">Diciembre</option>
					</select>
					<select required name="day">
						<option selected disabled value="">Día&#x25BE;</option>
						<option value="1" name="1">1</option>
					</select>
					<select required name="year">
						<option selected disabled value="">Año&#x25BE;</option>
						<option value="1993" name="1993">1993</option>
					</select>
				</div>

				<select required name="country" class="signup-form" id="selectCountry">
					<option selected disabled value="">Selecciona un país &#x25BE;</option>
					<?php
						$query = "SELECT * FROM countries ORDER BY name_c ASC";
						$result = mysql_query($query) or die(mysql_error());
						while ($line = mysql_fetch_array($result)) {
							echo '<option value="'.$line["id"].'" name="'.$line["id"].'">'.$line["name_c"].'</option>';
						}
					?>
				</select>

				<select required name="state" class="signup-form" id="selectState">
					<option disabled selected value="">Selecciona un estado &#x25BE;</option>
				</select>

				<input required type="email" name="email" placeholder="EMAIL:" class="signup-form">

				<input required type="email" name="confirmmEmail" placeholder="CONFIRMAR EMAIL:" class="signup-form">

				<input required type="password" name="password" placeholder="CONTRASEÑA:" class="signup-form">

				<input required type="password" name="confirmPassword" placeholder="CONFIRMAR CONTRASEÑA:" class="signup-form">

					<span style="display:block">Los email no son idénticos.</span>
					<span style="display:block">Las cotraseñas no son idénticas.</span>

				<div class="send-login-content sign-up-send">
					<br>
					<span class="not-user"><label for="privacyTerms">ACEPTAS LOS <u>TÉRMINOS DE PRIVACIDAD</u>.</label></span>
	 				<input required type="checkbox" id="privacyTerms">
					<br><br>
					<button type="submit" name="button" id="send-login">ENVIAR</button>
				</div>

			</form>

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
						<input type="text" id="box-target">

						<div class="search-box">
								<div class="profile-search">
									<span class="profile-img">
										<img src="../../images/profile_default.jpg" alt="profile image" title="profile image">
									</span>
									<span class="profile-info">
										<span class="profile-name">NAME</span> <br>
										<span class="profile-city">GDL - MX</span>
									</span>
								</div>
								<div class="profile-search">
									<span class="profile-img">
										<img src="../../images/profile_default.jpg" alt="profile image" title="profile image">
									</span>
									<span class="profile-info">
										<span class="profile-name">NAME</span> <br>
										<span class="profile-city">GDL - MX</span>
									</span>
								</div>
								<div class="profile-search">
									<span class="profile-img">
										<img src="../../images/profile_default.jpg" alt="profile image" title="profile image">
									</span>
									<span class="profile-info">
										<span class="profile-name">NAME</span> <br>
										<span class="profile-city">GDL - MX</span>
									</span>
								</div>
								<div class="profile-search">
									<span class="profile-img">
										<img src="../../images/profile_default.jpg" alt="profile image" title="profile image">
									</span>
									<span class="profile-info">
										<span class="profile-name">NAME</span> <br>
										<span class="profile-city">GDL - MX</span>
									</span>
								</div>
								<div class="profile-search">
									<span class="profile-img">
										<img src="../../images/profile_default.jpg" alt="profile image" title="profile image">
									</span>
									<span class="profile-info">
										<span class="profile-name">NAME</span> <br>
										<span class="profile-city">GDL - MX</span>
									</span>
								</div>
								<div class="profile-search">
									<span class="profile-info no-results">
										<span class="profile-name">NO SE HA ENCONTRADO RESULTADOS</span> <br>
									</span>
								</div>
						</div>

					</div>
					<div class="cont_info_user">

						<?php if(isset($_SESSION['idUser'])){ ?>
						<div class="msg">
							<a href="mensajes.php">
							<img src="../../images/menu_options-03.png" alt="icon message" title="icon message">
							<span class="number">1</span>
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

		<div class="top_img home">

		<!-- slider home -->
		<div id="slider">
			<figure>
				<!-- <img> = 1 slide -->
				<img src="../../images/homebanners/The Beer Fans Banner 3.png">
				<img src="../../images/homebanners/The Beer Fans Banner 1.png">
				<img src="../../images/homebanners/The Beer Fans Banner 2.png">
				<img src="../../images/homebanners/The Beer Fans Banner 4.png">
			</figure>
		</div>

		</div>

		<div class="cont_site">
			<div class="prin_img">
				<a href="cervezas.php" class="item-pring">
				<img src="../../images/beerBanners/photo_pthf_home-04.png" alt="foto 1 principal tbf" title="foto 1 principal tbf">
				<div class="capa">
					<span>CERVEZAS</span>
				</div>
				</a>
			</div>

			<div class="prin_img">
				<a href="productores.php" class="item-pring">
				<img src="../../images/beerBanners/photo_pthf_home-02.png" alt="foto 2 principal tbf" title="foto 2 principal tbf">
				<div class="capa">
					<span>PRODUCTORES</span>
				</div>
			</ar>
			</div>

			<div class="prin_img">
				<a href="materia.php" class="item-pring">
				<img src="../../images/beerBanners/photo_pthf_home-03.png" alt="foto 3 principal tbf" title="foto 3 principal tbf">
				<div class="capa">
					<span>MATERIA PRIMA</span>
				</div>
				</a>
			</div>

			<div class="prin_img">
				<a href="http://www.thebeerfans.com/blog" target="_blank" class="item-pring">
				<img src="../../images/NOTICIAS.png" alt="foto 4 principal tbf" title="foto 4 principal tbf">
				<div class="capa" id="news">
					<span>NOTICIAS</span>
				</div>
				</a>
			</div>

				<div class="slideshow">
				  <ul class="beers_month">

				    <li data-n="1">

							<img src="../../images/newBanners/Beer Fans Banner Slider Sub 1.png" alt="tbf tarro" title="tbf tarro">
							<div class="aside_info_second">
								<div class="contenido_aside">
									<span class="title">HOPFENREICH</span>
									<span class="sub_title"> </span>
									<p>Es un nuevo bar dedicado a la cerveza artesanal que ha abierto en el vibrante Wrangelkiez de Kreuzberg. Catorce tipos distintos de cerveza de barril y una selección embotellada que se amplía por momentos. Escogen para su carta una combinación de marcas tradicionales con novedades y tendencias procedentes de todo el mundo.</p>
									<a href="http://www.thebeerfans.com/blog/2016/03/16/la-guia-definitiva-de-las-mejores-cervecerias-de-berlin/" target="_blank">
									<div class="boton_mas">VER MÁS</div>
									</a>
								</div>
							</div>

						</li>

						<li data-n="2">

							<img src="../../images/newBanners/Beer Fans Banner Slider Sub 2.png" alt="tbf tarro" title="tbf tarro">
							<div class="aside_info_second">
								<div class="contenido_aside">
									<span class="title">10 CERVEZAS ARTESANALES QUE DISTINGUIRÁS POR SU DISEÑO</span>
									<span class="sub_title"> </span>
									<p>Cerveza estilo Stout, de fermentación Ale. Aroma a cacao debido a que en su elaboración se utilizan maltas cafetosas y maltas chocolate perfectamente tostadas. Su color es de un negro intenso. Cerveza Minerva Stout Imperial es el orgullo de Minerva, sin duda el estandarte de la revolución cervecera en México.</p>
									<a href="http://www.thebeerfans.com/blog/2016/03/16/10-cervezas-artesanales-que-distinguiras-por-su-diseno/" target="_blank">
									<div class="boton_mas">VER MÁS</div>
									</a>
								</div>
							</div>


						</li>

						<li data-n="3">
							<img src="../../images/newBanners/Beer Fans Banner Slider Sub 3.png" alt="tbf tarro" title="tbf tarro">
							<div class="aside_info_second">
								<div class="contenido_aside">
									<span class="title">WHY SOME ENJOY BEER: WHAT YOU NEED TO KNOW</span>
									<span class="sub_title"> </span>
									<p>Cerveza estilo Stout, de fermentación Ale. Aroma a cacao debido a que en su elaboración se utilizan maltas cafetosas y maltas chocolate perfectamente tostadas. Su color es de un negro intenso. Cerveza Minerva Stout Imperial es el orgullo de Minerva, sin duda el estandarte de la revolución cervecera en México.</p>
									<a href="http://www.thebeerfans.com/blog/2016/03/16/why-some-enjoy-beer-what-you-need-to-know/" target="_blank">
									<div class="boton_mas">VER MÁS</div>
									</a>
								</div>
							</div>


						</li>

						<!-- <li data-n="4">

							<img src="../../images/photo_pthf_home-03.png" alt="tbf tarro" title="tbf tarro">
							<div class="aside_info_second">
								<div class="contenido_aside">
									<span class="title">CUARTA CERVEZA</span>
									<span class="sub_title">CUARTA CERVEZA</span>
									<p>Cerveza estilo Stout, de fermentación Ale. Aroma a cacao debido a que en su elaboración se utilizan maltas cafetosas y maltas chocolate perfectamente tostadas. Su color es de un negro intenso. Cerveza Minerva Stout Imperial es el orgullo de Minerva, sin duda el estandarte de la revolución cervecera en México.</p>
									<a href="perfil_beer.php">
									<div class="boton_mas">VER MÁS</div>
									</a>
								</div>
							</div>

						</li> -->

					</ul>

						<ul class="nav_beers">
						 <li data-cd="1"></li>
						 <li data-cd="2"></li>
						 <li data-cd="3"></li>
						 <!-- <li data-cd="4"></li> -->
 						</ul>

					</div>

				<div class="part_info_bottom">

					<div class="contact_us_or_follow">
						<img src="../../images/postBanners/8150091.png" alt="tbf cervezas" title="tbf cervezas">
						<div class="contenido_usuarios">
							<?php if(isset($_SESSION['idUser'])){ ?>
							<span class="user_list">USUARIOS RECOMENDADOS.</span>
							<span class="user_list list-sub">ENCUENTRA OTROS USUARIOS CON GUSTOS SIMILARES A LOS TUYOS.</span>
							<div class="Grid">

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>

								<li class="flex-item">
									<a href=""><img class="flex-item-info" src="../../images/profile_default.jpg"/></a>
									<div class="flex-item-info">
										<span>JOHN WEEK</span>
										<span>23 años</span>
										<span>Gdl - Mx</span>
										<span class="AddFriend">Agregar amigos</span>
									</div>
								</li>


							</div>
							<?php }else{ ?>
								<span class="user_list" style="text-align: center !important; display: block; margin: 0;">USUARIOS RECOMENDADOS.<span class="user_name">INICIAR SESIÓN</span> PARA CONOCER GENTE CON TUS MISMOS GUSTOS.</span>
							<?php } ?>
						</div>
					</div>

					<div class="info_bottom">
						<img src="../../images/postBanners/8150090.png" alt="tbf cervezas" title="tbf cervezas">
						<div class="aside_info_second first_part">
							<div class="contenido_aside">
								<span class="title">CONOCE A</span>
								<span class="sub_title">NAIPE</span>
								<p>Cerveza estilo Stout, de fermentación Ale. Aroma a cacao debido a que en su elaboración se utilizan maltas cafetosas y maltas chocolate perfectamente tostadas. Su color es de un negro intenso. Cerveza Minerva Stout Imperial es el orgullo de Minerva, sin duda el estandarte de la revolución cervecera en México.</p>
								<a href="perfil_beer.php">
								<div class="boton_mas">VER MÁS</div>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="part_info_bottom">
					<div class="info_bottom">
						<img src="../../images/postBanners/conoce2.png" alt="tbf cervezas" title="tbf cervezas">
						<div class="aside_info_second cont_part_less">
							<div class="contenido_aside">
								<span class="title">CONOCE A</span>
								<span class="sub_title">NAIPE</span>
								<p>Cerveza estilo Stout, de fermentación Ale. Aroma a cacao debido a que en su elaboración se utilizan maltas cafetosas y maltas chocolate perfectamente tostadas. Su color es de un negro intenso. Cerveza Minerva Stout Imperial es el orgullo de Minerva, sin duda el estandarte de la revolución cervecera en México.</p>
								<a href="perfil_beer.php">
								<div class="boton_mas">VER MÁS</div>
								</a>
							</div>
						</div>
					</div>
					<div class="contact_us_or_follow">
						<img src="../../images/postBanners/8150091.png" alt="tbf cervezas" title="tbf cervezas">
						<div class="contenido_social">
							<span>CONTÁCTANOS O SÍGUENOS<br>EN NUESTRAS REDES SOCIALES</span>
							<ul>
								<a href=""><li><img src="../../images/social-04.png"></li></a>
								<a href=""><li><img src="../../images/social-02.png"></li></a>
								<a href=""><li><img src="../../images/social-01.png"></li></a>
								<a href="contact.php"><li><img src="../../images/social-03.png"></li></a>
							</ul>
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

	<script type="text/javascript">
	 	$( "#box-target" ).focus(function() {
	 		$(".search-box").css({
	 			"opacity" : "1",
	 			"z-index" : "9"
	 		})
	 	});

 		$( "#box-target" )
 	  .focusout(function() {
 			$(".search-box").css({
 				"opacity" : "0",
 				"z-index" : "-10"
 			})
 	  });
 	</script>

	<script>
		$("#selectCountry").change(function(){
			var idCountry = $("option:selected", this).attr('name');
			var namefunction = 'getStatesUser';
			$.ajax({
					beforeSend: function(){},
					url: "../../admin/php/functions.php",
					type: "POST",
					data: {
						namefunction: namefunction,
						idCountry: idCountry
					},
					success: function(result){
						$('#selectState').html(result);
					},
					error: function(){},
					complete: function(){},
					timeout: 10000
			});
		});

		$('#formNewUser').submit(function(e){
			e.preventDefault();

		});
	</script>



</body>
</html>
