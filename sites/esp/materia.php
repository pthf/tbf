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

	<title>Materia Prima | The Beer Fans | Red Social</title>

	<link rel="shortcut icon"  type="image/png" href="../../images/favicon.png">
	<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="../../styles/styles_responsive.css">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

	<script type="text/javascript" src="../../js/all_pages_jquery.js"> </script>
	<script type="text/javascript" src="../../js/slider.js"> </script>
	<script type="text/javascript" src="../../js/slidedown.js"> </script>

	<script type="text/javascript">
    $(document).ready(function () {
      (function ($) {
        $('#filtrar').keyup(function () {
          var rex = new RegExp($(this).val(), 'i');
          $('.buscar .material').hide();
          $('.buscar .material').filter(function () {
            return rex.test($(this).text());
          }).show();
        })
      }(jQuery));
    });
  	</script>
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
			<img src="../../images/beerBanners/photo_pthf_home-03.png" alt="Imagen The Beer Fans Principal" title="Imagen The Beer Fans Principal">
			<span class="text_prin bottom_text">MATERIA PRIMA</span>
		</div>

		<div class="beer_info">
			<span class="title_beer_info">¿QUIERES PRODUCIR?</span>
			<div class="aside_info">
				<div class="cont_search">
					<div class="search">
						<img src="../../images/icon-01.png" alt="search icon" title="search icon">
						<input type="text" id="filtrar" placeholder="">
					</div>
					<div class="list_options">
						<ul class="options_li">
							<li class="option_principal">
								<span class="principal_text type">MATERIA</span>
								<ul class="suboptions_li type">
								<?php
	                            $query = "SELECT * FROM rawmaterialtype";
	                            $resultado = mysql_query($query) or die(mysql_error());

								while($row = mysql_fetch_array($resultado)) {
		                           	if (isset($_GET['country'])) { ?>
										<li><span><a href="?type=<?php echo $row['rawMaterialTypeName']; ?>&country=<?php echo $_GET['country']; ?>"><?php echo $row['rawMaterialTypeName']; ?></a></span></li>
								<?php } else { ?>
										<li><span><a href="?type=<?php echo $row['rawMaterialTypeName']; ?>"><?php echo $row['rawMaterialTypeName']; ?></a></span></li>
								<?php }
								} ?>
								</ul>
							</li>
							<!--<li class="option_principal">
								<span class="principal_text">PAÍS</span>
								<ul class="suboptions_li">
									<li><span>México</span></li>
									<li><span>USA</span></li>
									<li><span>Bélgica</span></li>
									<li><span>Alemania</span></li>
									<li><span>Brasil</span></li>
									<li><span>Canadá</span></li>
									<li><span>Costa Rica</span></li>
									<li><span>Honduras</span></li>
									<li><span>España</span></li>
									<li><span>Holanda</span></li>
									<li><span>Australia</span></li>
									<li><span>Inglaterra</span></li>
									<li><span>Rusia</span></li>
								</ul>
							</li>-->
						</ul>
					</div>
				</div>

			</div>

			<!-- slider -->

			<div class="content buscar">
				<div class="back_">
					<a href="inicio.php">
						<img src="../../images/flecha-izq_negro.png" />
						<p class="back_text">VOLVER A HOME</p>
					</a>
			</div>

		<input type="radio" id="slide1" name="slider" checked>
			<input type="radio" id="slide2" name="slider">
			<input type="radio" id="slide3" name="slider">
			<input type="radio" id="slide4" name="slider">
			<input type="radio" id="slide5" name="slider">
			<input type="radio" id="slide6" name="slider">

		<div class="slides">

			<div class="overflow">
				<div class="inner material">

				<article>
					<?php
						if (isset($_GET['type'])) {
							$query_type = "SELECT * FROM beerfans.rawmaterial rm
											INNER JOIN beerfans.rawmaterial_has_rawmaterialtype mhrm
											ON mhrm.idRawMaterial = rm.idRawMaterial
											INNER JOIN beerfans.rawmaterialtype rmt
											ON rmt.idDrawMaterialType = mhrm.idDrawMaterialType WHERE rmt.rawMaterialTypeName ='".$_GET['type']."'";
							$resultado_type = mysql_query($query_type) or die(mysql_error());
							while ($row3 = mysql_fetch_array($resultado_type)) { ?>
								<li class="first_beer beertwo material">
								<img src="../../images/rawMaterialProfiles/<?php echo $row3['rawMaterialProfileImage'];?>"> <br>
								<span class="title"><?php echo $row3['rawMaterialName'];?></span>
								<span class="subtitle"><?php echo $row3['rawMaterialDescription'];?></span>
								<a href="perfil_materia.php?id=<?php echo $row3['idRawMaterial'];?>"><span class="ver_mas">VER MÁS</span></a>
								</li>
					<?php 	}
						} else if (isset($_GET['country'])){
							$query2 = "SELECT * FROM rawmaterial";
							$resultado2 = mysql_query($query2) or die(mysql_error());
							while ($row2 = mysql_fetch_array($resultado2)) { ?>
								<li class="first_beer beertwo material">
								<img src="../../images/rawMaterialProfiles/<?php echo $row2['rawMaterialProfileImage'];?>"> <br>
								<span class="title"><?php echo $row2['rawMaterialName'];?></span>
								<span class="subtitle"><?php echo $row2['rawMaterialDescription'];?></span>
								<a href="perfil_materia.php?id=<?php echo $row2['idRawMaterial'];?>"><span class="ver_mas">VER MÁS</span></a>
								</li>
					<?php 	}
						} else {
							$query2 = "SELECT * FROM rawmaterial";
							$resultado2 = mysql_query($query2) or die(mysql_error());
							while ($row2 = mysql_fetch_array($resultado2)) { ?>
								<li class="first_beer beertwo material">
								<img src="../../images/rawMaterialProfiles/<?php echo $row2['rawMaterialProfileImage'];?>"> <br>
								<span class="title"><?php echo $row2['rawMaterialName'];?></span>
								<span class="subtitle"><?php echo $row2['rawMaterialDescription'];?></span>
								<a href="perfil_materia.php?id=<?php echo $row2['idRawMaterial'];?>"><span class="ver_mas">VER MÁS</span></a>
								</li>
					<?php 	}
						} ?>
				</article>

				<!--<article>
					<li class="first_beer">
					<img src="../../images/beerProfiles/brahma.png"> <br>
					<span class="title">Nombre Cerveza</span>
					<span class="subtitle">Brief description of the beer </span>
					<a href="perfil_materia.php"><span class="ver_mas">VER MÁS</span></a>
					</li>


					<li class="other_beer">
					<img src="../../images/beerProfiles/alhambra.png"> <br>
					<span class="title">Nombre Cerveza</span>
					<span class="subtitle">Brief description of the beer </span>
					<a href="perfil_materia.php"><span class="ver_mas">VER MÁS</span></a>
					</li>

					<li class="other_beer">
					<img src="../../images/beerProfiles/mahou.png"> <br>
					<span class="title">Nombre Cerveza</span>
					<span class="subtitle">Brief description of the beer </span>
					<a href="perfil_materia.php"><span class="ver_mas">VER MÁS</span></a>
					</li>

					<li class="other_beer">
					<img src="../../images/beerProfiles/minerva.png"> <br>
					<span class="title">Nombre Cerveza</span>
					<span class="subtitle">Brief description of the beer </span>
					<a href="perfil_materia.php"><span class="ver_mas">VER MÁS</span></a>
					</li>

					<li class="first_beer">
					<img src="../../images/beerProfiles/poker.png"> <br>
					<span class="title">Nombre Cerveza</span>
					<span class="subtitle">Brief description of the beer </span>
					<a href="perfil_materia.php"><span class="ver_mas">VER MÁS</span></a>
					</li>

					<li class="other_beer">
					<img src="../../images/beerProfiles/quilmes.png"> <br>
					<span class="title">Nombre Cerveza</span>
					<span class="subtitle">Brief description of the beer </span>
					<a href="perfil_materia.php"><span class="ver_mas">VER MÁS</span></a>
					</li>

					<li class="other_beer">
					<img src="../../images/beerProfiles/shiner.png"> <br>
					<span class="title">Nombre Cerveza</span>
					<span class="subtitle">Brief description of the beer </span>
					<a href="perfil_materia.php"><span class="ver_mas">VER MÁS</span></a>
					</li>

					<li class="other_beer">
					<img src="../../images/beerProfiles/brahma.png"> <br>
					<span class="title">Nombre Cerveza</span>
					<span class="subtitle">Brief description of the beer </span>
					<a href="perfil_materia.php"><span class="ver_mas">VER MÁS</span></a>
					</li>

				</article>-->



				</div>
			</div>
		</div>
		<div class="controls">
			<label for="slide1"></label>
			<label for="slide2"></label>
			<label for="slide3"></label>
			<label for="slide4"></label>
			<label for="slide5"></label>
			<label for="slide6"></label>
		</div>
	</div>

	<!--- fin slider beers -->

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


</body>
</html>
