<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Inicio | The Beer Fans | Social Network</title>

	<link rel="shortcut icon"  type="image/png" href="../../images/favicon.png">
	<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="../../styles/styles_responsive.css">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

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
				<a href="materia.php"><li><spanRaw</span></li></a>
				<a href="perfil.php"><li><span>MI PERFIL</span></li></a>
				<a href="configuracion.php"><li><span>CONFIGURACIÓN</span></li></a>
				<a href=""><li class="no_border"><span>LOG OUT</span></li></a>
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

								<div class="search-filter">
		                          <select class="filter-opt" id="type-search">
		                            <?php if ($_GET['option'] == 1 ) { ?>
		                            <option selected value="1">Usuarios</option>
		                            <option value="2" id="filters">Cervezas</option>
		                            <option value="3" id="filters">Productores</option>
		                            <option value="4" id="filters">Raw</option>
		                            <?php } else if ($_GET['option'] == 2 ) { ?>
		                            <option value="1" id="filters"> Usuarios </option>
		                            <option selected value="2">Cervezas</option>
		                            <option value="3" id="filters">Productores</option>
		                            <option value="4" id="filters">Raw</option>
		                            <?php } else if ($_GET['option'] == 3 ) { ?>
		                            <option value="1" id="filters"> Usuarios </option>
		                            <option value="2" id="filters">Cervezas</option>
		                            <option selected value="3">Productores</option>
		                            <option value="4" id="filters">Raw</option>
		                            <?php } else if ($_GET['option'] == 4 ) { ?>
		                            <option value="1" id="filters"> Usuarios </option>
		                            <option value="2" id="filters">Cervezas</option>
		                            <option value="3" id="filters">Productores</option>
		                            <option selected value="4">Raw</option>
		                            <?php } else if ((!$_GET) || ($_GET['option'] == 0) || ($_GET['option'] > 4)) { ?>
		                            <option value="1" selected id="filters"> Usuarios </option>
		                            <option value="2" id="filters">Cervezas</option>
		                            <option value="3" id="filters">Productores</option>
		                            <option value="4" id="filters">Raw</option>
		                            <?php } ?>
		                          </select>
		                        </div>
								<div class="search main-search">
										<img src="../../images/icon-01.png" alt="search icon" title="search icon">
										<input type="text" id="box-target">

										<div class="search-box buscar">

										</div>

								</div>
								<div class="cont_info_user">

										<?php if (isset($_SESSION['idUser'])) { ?>

												<?php
												$consulta = "SELECT * FROM message INNER JOIN chat
																			 ON message.chat_idChat = chat.idChat
																			 WHERE chat.inbox_idInbox = " . $line['idInbox'] . "
																			 AND message.user_idUser != " . $line['idUser'];
												$resultadoconsulta = mysql_query($consulta) or die(mysql_error());
												?>

												<div class="msg">
														<a href="mensajes.php?idUser=<?= $line['idUser'] ?>">
																<img src="../../images/menu_options-03.png" alt="icon message" title="icon message">
																<?php
																if (mysql_num_rows($resultadoconsulta) > 0) {
																		echo '<span class="number">' . mysql_num_rows($resultadoconsulta) . '</span>';
																}
																?>
														</a>
												</div>


												<div class="profile_img">
														<a href="perfil.php?idUser=<?= $line['idUser'] ?>">
																<img src="../../images/userProfile/<?= $line['userProfileImage'] ?>" alt="profile image" title="profile image">
														</a>
												</div>
										<?php } ?>

										<?php
										if (isset($_SESSION['idUser'])) {

												echo '<div class="user_name">
																<a href="perfil.php?idUser=' . $line['idUser'] . '" style="color: #FFF;">
																<span>' . $line["userName"] . '</span>
																</a>
															</div>
															';
										} else {
												echo '
															<div class="user_name">
																<a href="#"><span>LOGIN</span></a>
															</div>';
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
					<p class="back_text">VOLVER A HOME</p>
				</a>
			</div>
  		<div class="input_contact">

				<div class="input_form">

			  	<p class="name_form">NOMBRE:<input type="text" name="name"></p>
			  	<p class="email_form">EMAIL:<input type="email" name="email"></p>
			  	<p class="message_form">MENSAJE: <textarea name="name" rows="8" cols="40"></textarea> </p>
					<br>
			  	<input type="submit" value="SEND">

				</div>

  		</div>

  		<div class="info_contact">

			<div class="info_text">

				<span><p>info@thebeerfans.com <br> Av. Patria #234 Col. Lomas <br> Guadalajara, Jalisco, México</p></span>

		    <div class="social_contact">
					<a href="#" class="first_contact "><img src="../../images/social-04.png"/></a>
				  <a href="#" class="other_contact "><img src="../../images/social-02.png" /></a>
				  <a href="#" class="other_contact "><img src="../../images/social-01.png" /></a>
				  <a href="#" class="other_contact "><img src="../../images/social-03.png" /></a>
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
<!--			 <a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
			 <a href="productores.php"><li><span>PRODUCTORES</span></li></a>
			 <a href="materia.php"><li><spanRaw</span></li></a>
			 <a href="perfil.php"><li><span>MI PERFIL</span></li></a>
			 <a href="configuracion.php"><li><span>CONFIGURACIÓN</span></li></a>
			 <a href="contact.php"><li><span>CONTACTO</span></li></a> -->
		 </ul>
		 <span class="right_about">About Us - Política de Privacidad - FAQS</span>
		 <span class="right_about">© 2015 The Beer Fans. All rights reserved.</span>
	 </div>
 </div>

	</div>
</body>
</html>