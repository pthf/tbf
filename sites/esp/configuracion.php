<?php
	session_start();
	if(isset($_SESSION['idUser'])){
		include('../../admin/php/connect_bd.php');
		connect_base_de_datos();
	}else{
		header("Location: inicio.php");
	}
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
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

	<script type="text/javascript" src="../../js/all_pages_jquery.js"> </script>

		<script type="text/javascript" src="../../js/image_click.js"> </script>


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
			<img src="../../images/beerBanners/bg_1.jpg" alt="Imagen The Beer Fans Principal" title="Imagen The Beer Fans Principal">
		</div>

    <div class="cont_config">

			<div class="config_back">
				<a href="inicio.php">
					<img src="../../images/flecha-izq_negro.png" />
					<p class="back_text">VOLVER A HOME</p>
				</a>
			</div>


      <div class="topinfo_config">

        <h1>ACTUALIZAR INFORMACIÓN</h1>

        </div>

        <div class="info_config">
        <form id="formUser" name="formUserData" enctype="multipart/form-data">
	        <div class="name_config">
	          <p>NOMBRE: </p> <input required type="text" name="userName"style="width:60%; border: none;">
	        </div>

	        <div class="edad_config">
	          <p>EDAD: </p> <input required type="number" name="userAge" style="width:60%; border: none">
	        </div>

	        <div class="vivoen_config">
	          <p>VIVO EN: </p> <input required type="text" name="userAddress" style="width:60%; border: none">
	        </div>



	        <div class="email_config">
	          <p>EMAIL: </p> <input required type="email" name="userEmail" style="width:60%; border: none">
	        </div>

					<div class="pass_config">
						<p>PASSWORD: </p> <input required type="password" name="userPassword" style="width:60%; border: none">
					</div>

	        <h1 class="top_config" style="margin-top:12%">DESCRIPCION:</h1>

	        <div class="desc_config">

	          <p><textarea required row="" cols="70" style="border: none;" name="userDescription"></textarea></p>
	        </div>
				<div class="actualizar_info">
					<a type="submit"> <p>ACTUALIZAR</p> </a>
				</div>
					<input type="submit" class="actualizar_info" value="ACTUALIZAR">
		</form>
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
	<script src="../js/services.js"></script>

</body>
</html>
