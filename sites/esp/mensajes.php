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

	<title>Cervezas | The Beer Fans | Red Social</title>

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
			<img src="../../images/Pitchers_and_pints_of_cold_beer_seen_on_a_bar.jpeg" alt="Imagen The Beer Fans Principal" title="Imagen The Beer Fans Principal">
			<span class="text_prin bottom_text">MENSAJES</span>
		</div>


<!-- TOP -->
	<div class="content_messages_top">

			<!--box top left -->
			<div class="search_">
				<div class="circle_search">
						<img src="../../images/icon-01.png"/>
						<input name="message" type="text"/>
				</div>
			</div>

			<!--box top right -->
			<div class="contacttop_messages">
			<p>CONTACTO</p>
			<div class="image_top">
			<a href="#">
			<img src="../../images/social-03.png"/>
			</a>
			</div>
			</div>

	</div>

<!-- BOTTOM -->
	<div class="content_messages_bottom">

			<!--box bottom left -->
		<div id="contact_list">

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />

					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
			    </div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			<div class="contactProfile">

				<div class="contact_left">

					<img src="../../images/green_icon.png" alt="" />
					<p>CONTACTO </p>

				</div>

				<div class="contact_image">

					<div class="img_pro">
						<img src="../../images/profile_default.jpg"/>
					</div>

				</div>

			</div>

			</div>

			<!--box bottom right -->

			<!-- box bottom right -->

		<div id="inbox_content">
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

				<!-- message sent -->
			<div id="itemContainer">
				<div id="itemContainerInner">

					<div class="item i1 sent_">
						<img src="../../images/profile_default.jpg"/>
					</div>

					<div class="item i2 sent_">
							<p>CONTACTO</p>
					</div>

					<div class="item i3 sent_">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.
								</p>
					</div>

					<div class="date_sent">
						<h2>Miércoles 18 de Junio 2015</h2>
					</div>

				</div>
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
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.



								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.



								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.



								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

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

				<!-- message sent -->
			<div id="itemContainer">
				<div id="itemContainerInner">

					<div class="item i1 sent_">
						<img src="../../images/profile_default.jpg"/>
					</div>

					<div class="item i2 sent_">
							<p>CONTACTO</p>
					</div>

					<div class="item i3 sent_">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.
								</p>
					</div>

					<div class="date_sent">
						<h2>Miércoles 18 de Junio 2015</h2>
					</div>

				</div>
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
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.



								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.



								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.



								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.

								Lorem ipsum dolor sit amet, consectetur adipiscing
								elit, sed do eiusmod tempor incididunt ut labore
								et dolore magna aliqua. Ut enim ad minim veniam.
								</p>
					</div>


				</div>

				<h2>Miércoles 18 de Junio 2015</h2>
			</div>

		</div>
	</div>
			<!--box foot right -->
			<div class="send_a_message">
				<input type="text" name="message" placeholder="Escribe una respuesta...">
					<div class="send_button">
						<a href="#"> <p>ENVIAR</p></a>
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
</body>
</html>
