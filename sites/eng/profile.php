<?php
session_start();
include('../../admin/php/connect_bd.php');
connect_base_de_datos();

if(isset($_GET['idUser'])){
  $query = "SELECT userStatus FROM user WHERE idUser =".$_GET['idUser'];
  $result = mysql_query($query) or die(mysql_error());
  $line = mysql_fetch_array($result);
  if($line['userStatus']==0){
    header('Location: inicio.php');
  }
}else{
  header('Location: inicio.php');
}

if (isset($_SESSION['idUser'])) {
    $query = "SELECT * FROM user WHERE idUser = " . $_SESSION['idUser'];
    $result = mysql_query($query) or die(mysql_error());
    $line = mysql_fetch_array($result);
}

if (!isset($_SESSION['language'])) {
    //Spanihs by default.
    $_SESSION['language'] = 1;
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
        <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>


        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

        <script type="text/javascript" src="../../js/all_pages_jquery.js"></script>
        <script type="text/javascript" src="../../js/image_click.js"></script>
        <script type="text/javascript" src="../../js/image_click0.js"></script>
        <script type="text/javascript" src="../../js/popup_img.js"></script>
        <script type="text/javascript">
          setTimeout(function(){
               $( '.slides .overflow .inner' ).css( "transition", "all 0.5s linear 0s" );
          }, 1000);
        </script>
				<script type="text/javascript">
            $(document).ready(function () {

                (function ($) {
                    $('#filtrar').keyup(function () {
                        var rex = new RegExp($(this).val(), 'i');
                        $('.buscar_beers .beers').hide();
                        $('.buscar_beers .beers').filter(function () {
                            return rex.test($(this).text());
                        }).show();
                    })
                }(jQuery));
            });
        </script>

				<script type="text/javascript">
            $(document).ready(function () {
                $('.buscar .users').hide();
                $('.noresults').hide();
                (function ($) {
                    $('#box-target').keyup(function () {
                        if ($(this).val() == '') {
                            $('.buscar .users').hide();
                        } else {
                            var rex = new RegExp($(this).val(), 'i');
                            var valores = $(this).val();
                            var option = <?php echo $_GET['option'];?>;
                            $.ajax({
                                url: "busqueda.php",
                                type: "POST",
                                data: {valores: valores, option: option},
                                success: function (result) {
                                    $('.buscar').html(result);
                                    $('.buscar .users').show();
                                },
                                error: function (error) {
                                    alert(error);
                                }
                            })
                        }
                    })
                }(jQuery));
            });
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
            $("#type-search").change(function(){
                var id = <?php echo $_GET['idUser'];?>;
                var option = $('select[id=type-search]').val();
                location.href = "perfil.php?idUser="+id+"&option="+option;
                $('#type-search').val($(this).val());
            });
        });
        </script>

    </head>

    <body>
				<?php if (!isset($_SESSION['idUser'])) { ?>
						<div class="background-filter"></div>
				<?php } ?>

				<?php if (!isset($_SESSION['idUser'])) { ?>
						<div class="login-modal">
								<div class="login-modal-wrapper">
										<div class="close-icon">
												<img src="../../images/img_galeria-02_close.png" >
										</div>
										<div class="login-title">
												<span class="login-title-text">INICIA SESIÓN</span>
										</div>

										<form action="">
												<div class="input-boxes">
														<input type="text" name="emailLogin" placeholder="EMAIL:" id="password" class="input-login">
														<br><br>
														<input type="password" name="passwordLogin" placeholder="CONTRASEÑA:" id="password" class="input-login">
														<br>
												</div>

												<div class="send-login-content">
														<br>
														<div class="not-user">¿NO TIENES CUENTA AÚN? <span class="underline">REGÍSTRATE.</span></div>
                            <div class="forgot-password"><span class="underline">¿OLVIDASTE TU CONTRASEÑA? </span> </div>
														<br><br>
														<button type="button" name="button" id="send-login" class="sendLoginUser">ENTRAR</button>
												</div>

												<div class="not-user notEmail" style="display:none;">EMAIL NO ENCOTRADO.</span></div>
												<div class="not-user notPass"  style="display:none;">CONTRASEÑA INCORRECTA.</span></div>
                        <div class="not-user blockcount"  style="display:none;">TU CUENTA HA SIDO BLOQUEADO.</span></div>
										</form>
								</div>

						</div>
				<?php } ?>

				<?php if (!isset($_SESSION['idUser'])) { ?>
						<div class="signup-modal">
								<div class="close-icon">
										<img src="../../images/img_galeria-02_close.png" >
								</div>

								<div class="login-title">
										<span class="login-title-text">REGISTRARSE</span>
								</div>

								<div class="signup-modal-content">

										<form class="formNewUser" id="formNewUser">

												<input required type="text" name="userName" placeholder="NOMBRE:" class="signup-form">
												<input required type="text" name="lastname" placeholder="APELLIDO:" class="signup-form">


												<div class="date-input">
														<span class="title-date">Fecha de nacimiento</span>

														<div class="date-input-wrapper">

                              <select required id="birthday_year" name="birthday_year" class="birthday year" >
                                  <option value="">Año &#x25BE;</option>
                                  <option value="1995">1995</option>
                                  <option value="1994">1994</option>
                                  <option value="1993">1993</option>
                                  <option value="1992">1992</option>
                                  <option value="1991">1991</option>
                                  <option value="1990">1990</option>
                                  <option value="1989">1989</option>
                                  <option value="1988">1988</option>
                                  <option value="1987">1987</option>
                                  <option value="1986">1986</option>
                                  <option value="1985">1985</option>
                                  <option value="1984">1984</option>
                                  <option value="1983">1983</option>
                                  <option value="1982">1982</option>
                                  <option value="1981">1981</option>
                                  <option value="1980">1980</option>
                              </select>

                              <select required id="birthday_month" name="birthday_month" class="birthday month" >
                                  <option value="">Mes &#x25BE;</option>
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

                              <select required id="birthday_day" name="birthday_day" class="birthday day" >
                                  <option value="">Día &#x25BE;</option>
                              </select>

														</div>

												</div>

												<select required name="country" class="signup-form select-Country" id="selectCountry">
														<option selected disabled value="">Selecciona un país &#x25BE;</option>
														<?php
														$query = "SELECT * FROM countries ORDER BY name_c ASC";
														$result = mysql_query($query) or die(mysql_error());
														while ($line = mysql_fetch_array($result)) {
																echo '<option value="' . $line["id"] . '" name="' . $line["id"] . '">' . $line["name_c"] . '</option>';
														}
														?>
												</select>

												<select required name="state" class="signup-form select-Country" id="selectState">
														<option disabled selected value="">Selecciona un estado &#x25BE;</option>
												</select>

												<input required type="email" name="email" placeholder="EMAIL:" class="signup-form">

												<input required type="email" name="confirmEmail" placeholder="CONFIRMAR EMAIL:" class="signup-form">

												<input required type="password" name="password" placeholder="CONTRASEÑA:" class="signup-form">

												<input required type="password" name="confirmPassword" placeholder="CONFIRMAR CONTRASEÑA:" class="signup-form">

                        <span style="display:none;" id="mail" class="mailMsgNotSame">Los email no son idénticos.</span>
                        <span style="display:none;" id="passMsg">Las cotraseñas no son idénticas.</span>
                        <span style="display:none;" id="mailExist">El Email ya esta registrado.</span>


												<div class="send-login-content sign-up-send">
														<br>
														<span class="not-user"><label for="privacyTerms">ACEPTAS LOS <u>TÉRMINOS DE PRIVACIDAD</u>.</label></span>
														<input required type="checkbox" id="privacyTerms">
														<br><br>
														<button type="submit" name="button" id="send-login">REGISTRARTE</button>
												</div>

										</form>

								</div>
						</div>
				<?php } ?>

            <div class="password-modal">
              <div class="close-icon">
                  <img src="../../images/img_galeria-02_close.png" >
              </div>

              <div class="login-title">
                  <span class="login-title-text">RECUPERAR CONTRASEÑA</span>
              </div>

              <div class="password-modal-content">
                <input required type="email" name="email" placeholder="EMAIL:" class="password-form">

                <button type="submit" name="button" id="send-login" class="sendRecoveryMail">ENVIAR</button>

                <br><br>
                <span class="msgacceptedpassword" style="display:none" id="mail">Revisa tu correo para recuperar tu contraseña.</span>
                <br>
                <span class="mailnotvalid" style="color:red; display:none" id="passMsg">EMAIL NO ENCONTRADO.</span>
              </div>
            </div>


				<div id="menu_options">

						<div class="close_menu">
								<img src="../../images/close_image-01.png">
						</div>

						<div class="menu_list">
								<?php if (isset($_SESSION['idUser'])) { ?>
										<ul>
												<a href="inicio.php"><li><span>HOME</span></li></a>
												<a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
												<a href="productores.php"><li><span>PRODUCTORES</span></li></a>
												<a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
												<a href="perfil.php?idUser=<?= $line['idUser'] ?>"><li><span>MI PERFIL</span></li></a>
												<a href="../eng/profile.php"class="changeLanguage"><li><span>ENGLISH</span></li></a>
												<a href="configuracion.php"><li><span>CONFIGURACIÓN</span></li></a>
												<a href="#" class="logOut" name="<?= $line['idUser'] ?>"><li class="no_border"><span>SALIR</span></li></a>
										</ul>
								<?php } else { ?>
										<ul>
												<a href="inicio.php"><li><span>HOME</span></li></a>
												<a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
												<a href="productores.php"><li><span>PRODUCTORES</span></li></a>
												<a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
                        <a href="../eng//beers.php"class="changeLanguage"><li><span>ENGLISH</span></li></a>
												<a href="#" class="user_name_click"><li><span>INICIA SESIÓN</span></li></a>
										</ul>
								<?php } ?>
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
            <?php
            $query1 = "SELECT * FROM user us
						INNER JOIN countries co
						ON co.id = us.country_id
						INNER JOIN states st
						ON st.id = us.state_id
            			WHERE us.idUser = '".$_GET['idUser']."'";
            $resultado = mysql_query($query1) or die (mysql_error());
            $row = mysql_fetch_array($resultado);

            $fechanacimiento = ($row['userBirthDate']);
            list($ano,$mes,$dia) = explode("-",$fechanacimiento);
			$ano_diferencia  = date("Y") - $ano;
			$mes_diferencia = date("m") - $mes;
			$dia_diferencia   = date("d") - $dia;
			if ($dia_diferencia < 0 || $mes_diferencia < 0)
				$ano_diferencia--;
            ?>
            <div class="popup_img">
                <img class="profile_popup" src="../../images/userProfile/<?php echo $row['userProfileImage']; ?>" />
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

                        <div class="search-filter">
                          <select class="filter-opt" id="type-search">
                            <?php if ($_GET['option'] == 1 ) { ?>
                            <option value="0" name="0" disabled> Tipo búsqueda </option>
                            <option selected value="1">Usuarios</option>
                            <option value="2">Cervezas</option>
                            <option value="3">Productores</option>
                            <option value="4">Materia Prima</option>
                            <?php } else if ($_GET['option'] == 2 ) { ?>
                            <option value="0" name="0" disabled> Tipo búsqueda </option>
                            <option value="1"> Usuarios </option>
                            <option selected value="2">Cervezas</option>
                            <option value="3">Productores</option>
                            <option value="4">Materia Prima</option>
                            <?php } else if ($_GET['option'] == 3 ) { ?>
                            <option value="0" name="0" disabled> Tipo búsqueda </option>
                            <option value="1"> Usuarios </option>
                            <option value="2">Cervezas</option>
                            <option selected value="3">Productores</option>
                            <option value="4">Materia Prima</option>
                            <?php } else if ($_GET['option'] == 4 ) { ?>
                            <option value="0" name="0" disabled> Tipo búsqueda </option>
                            <option value="1"> Usuarios </option>
                            <option value="2">Cervezas</option>
                            <option value="3">Productores</option>
                            <option selected value="4">Materia Prima</option>
                            <?php } else if ((!$_GET) || ($_GET['option'] == 0) || ($_GET['option'] > 4)) { ?>
                            <option selected value="0" name="0" disabled> Tipo búsqueda </option>
                            <option value="1"> Usuarios </option>
                            <option value="2">Cervezas</option>
                            <option value="3">Productores</option>
                            <option value="4">Materia Prima</option>
                            <?php } ?>
                          </select>
                          <ul class="callouts">
                            <li class="callouts--top">Seleccione un filtro</li>
                          </ul>
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
                                               AND message.user_idUser != " . $line['idUser'] . "
                                               AND message.messageStatus = 0";
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
                  											<a href="#"><span>INICIA SESIÓN</span></a>
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
                <img src="../../images/beerBanners/<?php echo $row['userCoverImage']; ?>" alt="Imagen The Beer Fans Principal" title="Imagen The Beer Fans Principal">
                <?php if (isset($_SESSION['idUser']) && isset($_GET['idUser']) && $_GET['idUser'] == $_SESSION['idUser']) { ?>
                    <a href="#" class="image_banner_click"><span class="change_banner">CAMBIAR BANNER</span></a>
                <?php } ?>
            </div>
            <div class="banner_change">
				<div class="login-modal-wrapper">
					<div class="close-icon">
							<img src="../../images/img_galeria-02_close.png" >
					</div>
					<div class="login-title">
							<span class="login-title-text">CAMBIAR IMAGEN BANNER</span>
					</div>

					<form id="formChangeImageBanner">
						<div class="input-boxes">
								<br>
								<div class="col-sm-12">
									<input type="text" hidden name="idUser" value="<?php echo $_SESSION['idUser']; ?>">
									<input required type="file" class="form-control" name="beerBannerImage[]" value=""></input>
								</div>
						</div>

						<div class="send-login-content">
								<br>
								<button type="submit" name="button" id="send-login" class="">CAMBIAR</button>
						</div>
					</form>
				</div>
			</div>

		 	<div class="perfil_change">
				<div class="login-modal-wrapper">
					<div class="close-icon">
							<img src="../../images/img_galeria-02_close.png" >
					</div>
					<div class="login-title">
							<span class="login-title-text">CAMBIAR IMAGEN PERFIL</span>
					</div>

					<form id="formChangeImagePerfil">
						<div class="input-boxes">
								<br>
								<div class="col-sm-12">
									<input type="text" hidden name="idUser" value="<?php echo $_SESSION['idUser']; ?>">
									<input required type="file" class="form-control" name="beerProfileImage[]" value=""></input>
								</div>
						</div>

						<div class="send-login-content">
								<br>
								<button type="submit" name="button" id="send-login" class="">CAMBIAR</button>
						</div>
					</form>
				</div>
			</div>


            <div class="content_profile">

                <div class="image_profile">
                    <img src="../../images/userProfile/<?php echo $row['userProfileImage']; ?>" />
                    <?php if (isset($_SESSION['idUser']) && isset($_GET['idUser']) && $_GET['idUser'] == $_SESSION['idUser']) { ?>
                        <a href="#" class="image_perfil_click"><span class="change_profile">CAMBIAR FOTO</span></a>
                    <?php } ?>
                </div>


                <div class="name_profile">
                    <p><?php echo $row['userName']; ?> <?php echo $row['userLastName']; ?></p>
                </div>

                <div class="city_profile">
                    <p><?php echo $row['name_s'].', '.$row['name_c']?>.</p>
                </div>

                <div class="age_profile">
                    <p><?php echo $ano_diferencia; ?> años.</p>
                </div>

                <div class="profile_res">
                    <p><?php echo ($row['userDescription']) ? $row['userDescription'] : 'Ninguna descripción.' ?></p>
                </div>

                <!-- Send message popup -->
                <?php
                if (isset($_SESSION['idUser'])) {
                	if(($_SESSION['idUser']) != $_GET['idUser']) { ?>
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
	                        	<form id="formNewMessage">
	                        		<input type="text" name="idEmisor" hidden value="<?php echo $_SESSION['idUser'];?>">
	                        		<input type="text" name="idReceptor" hidden value="<?php echo $_GET['idUser'];?>">
		                            <!--<p class="subject_form">ASUNTO:<input required style="border:none" type="text" name="subject"></p>-->
		                            <p class="text_form">MENSAJE: <textarea  required name="message" rows="8" cols="40"></textarea> </p>
		                            <br>
		                            <input type="submit" value="ENVIAR">
		                            <div class="resultado"></div>
		                        </form>
	                        </div>
	                    </div>
	                </div>
	            <?php }
	        	    } ?>
                <!-- /lightbox-panel -->
                <div id="lightbox"></div>
                <!-- /lightbox -->

            </div> <!-- end content profile -->

            <div class="favs_profile">
              <!-- slider FAVORITOS -->
              <span id="favoritos-slider">
                <div class="back_ profile_back">
                    <a href="cervezas.php">
                        <img src="../../images/flecha-izq_negro.png" />
                        <p class="back_text">IR A CERVEZAS</p>
                    </a>
                </div>
                <div class="slides">
                    <div class="toptext_slider"><span>FAVORITOS</span></div>
                    <div class="overflow">
                        <div class="inner profile favoritos-slider">

                        	<?php
                              $q = "SELECT * FROM beer be
                                      INNER JOIN favoriteelement f
                                      ON f.idBeer = be.idBeer
                                      INNER JOIN user u
                                      ON u.idFavoritesList = f.idFavoritesList
                                      WHERE u.idUser = '".$_GET['idUser']."'";
                              $r = mysql_query($q) or die(mysql_error());
                              /*if (($favorites = mysql_fetch_array($r)) == false) {
                                echo "<p>No hay favoritos <a href='cervezas.php'><u>Ver Cervezas</u></a></p>";
                              } else {*/
                              $contador = 0;
                              while($l1 = mysql_fetch_array($r)){
                                if($contador==0)
                                  echo '<article class="favoritos-slideItems">';
                                $contador++;

                                $length = 40;
                                $descriptionText = substr($l1['beerDescription'], 0, $length);
                                if(strlen($l1['beerDescription'])>$length){
                                  $descriptionText .= "...";
                                }
                                echo '<li class="first_beer">
                                        <a href="perfil_beer.php?id='.$l1['idBeer'].'"><img src="../../images/beerBottles/'.$l1["beerBottleImage"].'"></a> <br>
                                        <span class="title">'.$l1["beerName"].'</span>
                                        <span class="subtitle">'.$descriptionText.'</span> <br>';
                                        if(isset($_SESSION['idUser'])) {
                                            $qu = "SELECT idFavoritesList FROM user WHERE idUser = ".$_SESSION['idUser'];
                                            $ru = mysql_query($qu) or die(mysql_error());
                                            $lo = mysql_fetch_array($ru);
                                            $listaUser = $lo['idFavoritesList'];

                                        echo '<div class="heart-status">';
                                            $qo = "SELECT idFavoriteElement FROM favoriteelement WHERE idBeer = ".$l1['idBeer']." AND $listaUser = idFavoritesList";
                                            $rr = mysql_query($qo) or die(mysql_error());
                                            if(mysql_num_rows($rr)>0) {
                                            echo '<span name="1" class="heart-icon 1" data-function="deleteFavorites" data-user="'.$_SESSION['idUser'].'" data-beer="'.$l1['idBeer'].'" title="Eliminar de favoritos">&#9829;</span>';
                                              } else {
                                            echo ' <span name="0" class="heart-icon 0" data-function="addFavorites" data-user="'.$_SESSION['idUser'].'" data-beer="'.$l1['idBeer'].'" title="Agregar a favoritos">&#9825;</span>';
                                              }
                                        echo '</div>';
                                        } else {
                                          echo ' <a href="#"><span class="heart-icon logintoadd" title="Agregar a favoritos">&#9825;</span></a>';
                                        }
                                echo '</li>';

                                if($contador==8){
                                  echo '</article>';
                                  $contador=0;
                                }
                              }
                            //}
                          	?>


                        </div>
                    </div>
                </div>
                <div class="controls labelsfavorites">
                    <!-- <label for="slide1" ></label> -->
                </div>

                <!-- check beer lenght ( FAVORITOS ) -->
                <script type="text/javascript">
                  var beerSlideCounter = $('.favoritos-slider article.favoritos-slideItems').length;
                  var beerSlideWidth = 100/beerSlideCounter;
                  $('.favoritos-slider article.favoritos-slideItems').css({ width: beerSlideWidth + '%' });
                  $('.favoritos-slider').css({ width: beerSlideCounter*100 + '%' });

                  var labels = "";
                  $('.favoritos-slider article.favoritos-slideItems').each(function(index){
                    labels = labels+"<label name="+(index+1)+" for='slide"+(index+1)+"'></label>";
                  });
                  $('.labelsfavorites').html(labels);
                </script>

                <!-- slider beers animation ( FAVORITOS ) -->
                <script type="text/javascript">
                  $(document).on('click', '.labelsfavorites label', function(){
                    var position = $(this).attr('name'); position--;
                    var margin = position*100; margin = margin * -1;
                    $('.favoritos-slider').css({ "margin-left":  margin+"%" });
                    $('.labelsfavorites label').css({ "background": "#aaa" });
                    $(this).css({ "background": "#333" });
                  });
                </script>

              </span>
              <!--- fin slider FAVORITOS -->


              <!-- slider WISHLIST -->
              <span id="wishlist-slider">
                <div class="slides">
                    <div class="toptext_slider wishlist-title"><span>WISHLIST</span></div>
                    <div class="overflow">
                        <div class="inner profile wishlist-slider">

                        	<?php
                              $q = "SELECT * FROM beer be
                                      INNER JOIN wishlistelement w
                                      ON w.idBeer = be.idBeer
                                      INNER JOIN user u
                                      ON u.idFavoritesList = w.idWishList
                                      WHERE u.idUser = '".$_GET['idUser']."'";
                              $r = mysql_query($q) or die(mysql_error());
                              /*if (($favorites = mysql_fetch_array($r)) == false) {
                                echo "<p>No hay Wishlist <a href='cervezas.php'><u>Ver Cervezas</u></a></p>";
                              } else {*/
                              $contador = 0;
                              while($l2 = mysql_fetch_array($r)){
                                if($contador==0)
                                  echo '<article class="wishlist-slideItems">';
                                $contador++;

                                $length = 40;
                                $descriptionText = substr($l2['beerDescription'], 0, $length);
                                if(strlen($l2['beerDescription'])>$length){
                                  $descriptionText .= "...";
                                }
                                echo '
                                    <li class="first_beer">
                                      <a href=""><img src="../../images/beerBottles/'.$l2["beerBottleImage"].'"></a> <br>
                                      <span class="title">'.$l2["beerName"].'</span>
                                      <span class="subtitle">'.$descriptionText.'</span> <br>';
                                      if(isset($_SESSION['idUser'])){
                                        $qx = "SELECT idWishList FROM user WHERE idUser = ".$_SESSION['idUser'];
                                        $rx = mysql_query($qx) or die(mysql_error());
                                        $lx = mysql_fetch_array($rx);
                                        $listaUser = $lx['idWishList'];
                                        echo '
                                        <div class="hearts-statuss">';
                                        $qz = "SELECT idWishListElement FROM wishlistelement WHERE $listaUser = idWishList AND ".$l2['idBeer']." = idBeer";
                                        $rz = mysql_query($qz) or die(mysql_error());

                                        if(mysql_num_rows($rz)>0){
                                          echo '<span name="1" class="1" data-function="deleteWishList" style="cursor:pointer;" data-user="'.$_SESSION['idUser'].'" data-beer="'.$l2['idBeer'].'">ELIMINAR</span>';
                                        }else{
                                          echo '<span name="0" class="0" data-function="addWishList" style="cursor:pointer;" data-user="'.$_SESSION['idUser'].'" data-beer="'.$l2['idBeer'].'">AGREGAR</span>';
                                        }
                                        echo '
                                        </div>';
                                      }else{
                                        echo '<a href="#"><span class="0 logintoadd">AGREGAR</span></a>';
                                      }
                                    echo '</li>
                                ';
                                if($contador==8){
                                  echo '</article>';
                                  $contador=0;
                                }
                              }
                            //}
                          	?>

                        </div>
                    </div>
                </div>
                <div class="controls wishlist-controls">
                    <!-- <label for="slide1" ></label> -->
                </div>

                <!-- check beer lenght ( WISHLIST ) -->
                <script type="text/javascript">
                  var beerSlideCounterWishlist = $('.wishlist-slider article.wishlist-slideItems').length;
                  var beerSlideWidthWishlist = 100/beerSlideCounterWishlist;
                  $('.wishlist-slider article.wishlist-slideItems').css({ width: beerSlideWidthWishlist + '%' });
                  $('.wishlist-slider').css({ width: beerSlideCounterWishlist*100 + '%' });

                  var labelsWishlist = "";
                  $('.wishlist-slider article.wishlist-slideItems').each(function(index){
                    labelsWishlist = labelsWishlist+"<label name="+(index+1)+" for='slide"+(index+1)+"' ></label>";
                  });
                  $('.wishlist-controls').html(labelsWishlist);
                </script>

                <!-- slider beers animation ( WISHLIST ) -->
                <script type="text/javascript">
                  $(document).on('click', '.wishlist-controls label', function(){
                    var position = $(this).attr('name'); position--;
                    var margin = position*100; margin = margin * -1;
                    $('.wishlist-slider').css({ "margin-left":  margin+"%" });
                    $('.wishlist-controls label').css({ "background": "#aaa" });
                    $(this).css({ "background": "#333" });
                  });
                </script>

              </span>
              <!--- fin slider WISHLIST -->


              <!-- slider beer RANKS -->
              <span id="ranks-slider">
                <div class="slides">
                    <div class="toptext_slider ranks-title"><span>RANKS</span></div>
                    <div class="overflow">
                        <div class="inner profile ranks-slider">

                          <?php
                              $q = "SELECT * FROM beer be
                                      INNER JOIN rankslistelement r
                                      ON r.idBeer = be.idBeer
                                      INNER JOIN user u
                                      ON u.idFavoritesList = r.idRanksList
                                      WHERE u.idUser = '".$_GET['idUser']."'";
                              $r = mysql_query($q) or die(mysql_error());
                              /*if (($favorites = mysql_fetch_array($r)) == false) {
                                echo "<p>No hay Ranking <a href='cervezas.php'><u>Ver Cervezas</u></a></p>";
                              } else {*/
                              $contador = 0;
                              while($l3 = mysql_fetch_array($r)){
                                if($contador==0)
                                  echo '<article class="ranks-slideItems">';
                                $contador++;

                                $length = 40;
                                $descriptionText = substr($l3['beerDescription'], 0, $length);
                                if(strlen($l3['beerDescription'])>$length){
                                  $descriptionText .= "...";
                                }
                                echo '
                                    <li class="first_beer">
                                      <a href="perfil_beer.php?id='.$l3['idBeer'].'"><img src="../../images/beerBottles/'.$l3["beerBottleImage"].'"></a> <br>
                                      <span class="title">'.$l3["beerName"].'</span>
                                      <span class="subtitle">'.$descriptionText.'</span> <br>';

                                        $query = "SELECT ranksListElementRank FROM rankslistelement WHERE idBeer = '".$l3['idBeer']."'";
                                        $result = mysql_query($query) or die(mysql_error());
                                        $sumatoria=0;
                                        $contador=0;
                                        while($line=mysql_fetch_array($result)){
                                          $sumatoria = $line['ranksListElementRank'] + $sumatoria;
                                          $contador++;
                                        }

                                        $sumatoria = $sumatoria + 4;
                                        $contador++;
                                        $promedio = $sumatoria/$contador;
                                        $promedio = round($promedio);
                                      echo '
                                      <div class="rating-stars text-center">
                                        <ul id="stars" class="stars-profile-view appendGold profile-rank">';
                                        for($i = 1; $i<=5; $i++){
                                          if($promedio >= $i)
                                            echo "<li class='star star-small-profile-user' data-value='".$i."'><i class='fa fa-star fa-fw star-small gold-star'></i></li>";
                                        }
                                          echo '
                                        </ul>
                                      </div>';
                                      if(isset($_SESSION['idUser'])){
                                        $query = "SELECT idRanksList FROM user WHERE idUser = ".$_SESSION['idUser'];
                                        $result = mysql_query($query) or die(mysql_error());
                                        $line = mysql_fetch_array($result);
                                        $idRanksList = $line['idRanksList'];
                                        $query = "SELECT * FROM rankslistelement WHERE idBeer = ".$l3['idBeer']." AND idRanksList = $idRanksList";
                                        $result = mysql_query($query) or die(mysql_error());
                                        if(mysql_num_rows($result)>0){

                                            echo '<span class="deleteRank" data-beer="'.$l3['idBeer'].'" data-list="'.$idRanksList.'" style="display:block; cursor:pointer;">ELIMINAR RANK</span><br><br>';
                                        }else{
                                          echo "
                                            <div class='rating-stars text-center'>
                                              <ul id='stars' class='stars-profile-view changeRank' data-user = '".$_SESSION['idUser']."'>
                                                <li class='star' data-value='1' data-beer='".$l3['idBeer']."'>
                                                  <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' data-value='2' data-beer='".$l3['idBeer']."'>
                                                  <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' data-value='3' data-beer='".$l3['idBeer']."'>
                                                  <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' data-value='4' data-beer='".$l3['idBeer']."'>
                                                  <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' data-value='5' data-beer='".$l3['idBeer']."'>
                                                  <i class='fa fa-star fa-fw'></i>
                                                </li>
                                              </ul>
                                            </div>
                                          ";
                                        }
                                      }else{
                                        echo "
                                          <div class='rating-stars text-center'>
                                            <a href='#'>
                                              <ul id='stars' class='stars-profile-view logintoadd'>
                                                <li class='star' data-value='1'>
                                                  <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' data-value='2'>
                                                  <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' data-value='3'>
                                                  <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' data-value='4'>
                                                  <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' data-value='5'>
                                                  <i class='fa fa-star fa-fw'></i>
                                                </li>
                                              </ul>
                                            </a>
                                          </div>
                                        ";
                                      }
                                echo '
                                    </li>
                                ';
                                if($contador==8){
                                  echo '</article>';
                                  $contador=0;
                                }
                              }
                            //}
                            ?>

                        </div>
                    </div>
                </div>
                <div class="controls ranks-controls">
                    <!-- <label for="slide1" ></label> -->
                </div>

                <!-- check beer lenght ( WISHLIST ) -->
                <script type="text/javascript">
                  var beerSlideCounterWishlist = $('.ranks-slider article.ranks-slideItems').length;
                  var beerSlideWidthWishlist = 100/beerSlideCounterWishlist;
                  $('.ranks-slider article.ranks-slideItems').css({ width: beerSlideWidthWishlist + '%' });
                  $('.ranks-slider').css({ width: beerSlideCounterWishlist*100 + '%' });

                  var labelsWishlist = "";
                  $('.ranks-slider article.ranks-slideItems').each(function(index){
                    labelsWishlist = labelsWishlist+"<label name="+(index+1)+" for='slide"+(index+1)+"' ></label>";
                  });
                  $('.ranks-controls').html(labelsWishlist);
                </script>

                <!-- slider beers animation ( WISHLIST ) -->
                <script type="text/javascript">
                  $(document).on('click', '.ranks-controls label', function(){
                    var position = $(this).attr('name'); position--;
                    var margin = position*100; margin = margin * -1;
                    $('.ranks-slider').css({ "margin-left":  margin+"%" });
                    $('.ranks-controls label').css({ "background": "#aaa" });
                    $(this).css({ "background": "#333" });
                  });
                </script>

              </span>
              <!--- fin slider RANKS -->


                <!-- comments -->
                <span class="toptext_slider comments_title">COMENTARIOS</span>
                <div id="comments_box">
                    <div class="msn_content">
                        <!-- message received -->
                        <?php
                        $query2 = "SELECT * FROM postelement po
                									INNER JOIN user us
                									ON us.idUser = po.idUser
                                  WHERE us.userStatus != 0
                									AND po.idPublicMessagesList =".$row['idPublicMessagesList'];
                        $resultado2 = mysql_query($query2) or die(mysql_error());
                        while ($rows2 = mysql_fetch_array($resultado2)) {
                        ?>
                        <div id="itemContainer">
                            <div id="itemContainerInner">



                                <?php
                                  if(isset($_SESSION['idUser'])){
                                  if($_GET['idUser'] == $_SESSION['idUser'] || $_SESSION['idUser'] == 1){
                                ?>
                                <div class="delete-comment" data-name-post="<?=$rows2['idPostElement']?>">
                                    <img src="../../images/img_galeria-02_close.png" >
                                </div>

                                <script>
                                  $('.delete-comment').click(function(){
                                    var idComment = $(this).attr('data-name-post');
                                    var namefunction = "deleteComment";
                                    $.ajax({
                                        beforeSend: function () {},
                                        url: "../../admin/php/functions.php",
                                        type: "POST",
                                        data: {
                                            idComment: idComment,
                                            namefunction : namefunction
                                        },
                                        success: function (result) {
                                          location.reload();
                                        },
                                        error: function () {},
                                        complete: function () {},
                                        timeout: 10000
                                    });
                                  });
                                </script>
                                <?php
                                  }
                                  }
                                ?>


                                <div class="item i1">
                                    <img src="../../images/userProfile/<?php echo $rows2['userProfileImage']?>"/>
                                </div>

                                <div class="item i2">
                                    <p><?php echo $rows2['userName']; ?></p>
                                </div>

                                <div class="item i3">
                                    <p>
                                    	<?php echo $rows2['postElementComment']; ?>
                                    </p>

                                </div>


                            </div>
                            <?php
						    $fecha = $rows2['postElementDate'];
						    $fechafinal = explode('-', $fecha);
						    $dia = explode(' ', $fechafinal[2]);
							$fechats = strtotime($fecha);

							switch (date('w', $fechats)){
							    case 0: $nameDia[] = "Domingo";
						    	break;
						    	case 1: $nameDia[] = "Lunes";
						    	break;
						    	case 2: $nameDia[] = "Martes";
						    	break;
						    	case 3: $nameDia[] = "Miércoles";
						    	break;
						    	case 4: $nameDia[] = "Jueves";
						    	break;
						    	case 5: $nameDia[] = 'Viernes';
						    	break;
						    	case 6: $nameDia[] = 'Sábado';
						    	break;
							}

							switch (date('n', $fechats)){
							    case 1: $nameMes[] = "Enero";
						    	break;
						    	case 2: $nameMes[] = "Febrero";
						    	break;
						    	case 3: $nameMes[] = "Marzo";
						    	break;
						    	case 4: $nameMes[] = "Abril";
						    	break;
						    	case 5: $nameMes[] = 'Mayo';
						    	break;
						    	case 6: $nameMes[] = "Junio";
						    	break;
						    	case 7: $nameMes[] = "Julio";
						    	break;
						    	case 8: $nameMes[] = "Agosto";
						    	break;
						    	case 9: $nameMes[] = "Septiembre";
						    	break;
						    	case 10: $nameMes[] = "Octube";
						    	break;
						    	case 11: $nameMes[] = "Noviembre";
						    	break;
						    	case 12: $nameMes[] = "Diciembre";
						    	break;
							}
						    ?>

                            <h2>
                            	<?php echo $nameDia[0].' '.$dia[0].' de '.$nameMes[0].' '.$fechafinal[0];?>
                            </h2>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <!--box foot right -->

                <?php if (isset($_SESSION['idUser'])) { ?>
                    <div class="send_a_message comments_text profile-comments">
                    	<form id="SendComment">
                    		<input type="text" name="idUser" hidden value="<?php echo $row['idUser']?>">
                    		<input type="text" name="idSession" hidden value="<?php echo $_SESSION['idUser']?>">
	                        <textarea required name="message" rows="8" cols="40" placeholder="Escribe un comentario..."></textarea>
	                        <style media="screen">
		                        ::-webkit-input-placeholder{
		                          padding: 1.5% 0 0 1.5%;
		                        }
		                    </style>
	                        <input type="submit" class="send_button comments_send" value="COMENTAR" style="background-color:#808080;">
	                    </form>
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
                    <?php if (isset($_SESSION['idUser'])) { ?>
                        <ul class="nav">
                            <a href="inicio.php"><li><span>HOME</span></li></a>
                            <a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
                            <a href="productores.php"><li><span>PRODUCTORES</span></li></a>
                            <a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
                            <a href="perfil.php"><li><span>MI PERFIL</span></li></a>
                            <a href="configuracion.php"><li><span>CONFIGURACIÓN</span></li></a>
                            <a href="contact.php"><li><span>CONTACTO</span></li></a>
                        </ul>
                    <?php } else { ?>
                        <ul class="nav">
                            <a href="inicio.php"><li><span>HOME</span></li></a>
                            <a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
                            <a href="productores.php"><li><span>PRODUCTORES</span></li></a>
                            <a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
                            <a href="#" class="user_name_click"><li><span>INICIA SESIÓN</span></li></a>
                            <a href="contact.php"><li><span>CONTACTO</span></li></a>
                        </ul>
                    <?php } ?>

                    <span class="right_about">Nosotros - Política de Privacidad - FAQS</span>

                    <span class="right_about">© <?= date('Y') ?> The Beer Fans. Todos los derechos reservados.</span>
                </div>
            </div>
            <script src="../../js/services.js"></script>

            <script type="text/javascript">
                $(document).on("ready", function () {

                    $(document).on('click', '.user_name, .user_name_click, .logintoadd', function () {
                        $(".login-modal").css({
                            "opacity": "1",
                            "z-index": "10",
                        }),
                                $(".background-filter").css({
                            "opacity": "1",
                            "z-index": "9",
                        })
                    });

                    $(".close-icon,.background-filter").on("click", function () {
                        $(".login-modal").css({
                            "opacity": "0",
                            "z-index": "-10",
                        }),
                                $(".background-filter").css({
                            "opacity": "0",
                            "z-index": "-1",
                        })
                    });

                });
            </script>

            <script type="text/javascript">
				$(document).on("ready", function () {

					$(document).on('click', '.image_perfil_click', function () {
						$(".perfil_change").css({
							"opacity": "1",
							"z-index": "10",
						}),
						$(".background-filter").css({
							"opacity": "1",
							"z-index": "10",
						})
					});

					$(".close-icon,.background-filter").on("click", function () {
						$(".perfil_change").css({
								"opacity": "0",
								"z-index": "-1",
						}),
						$(".background-filter").css({
							"opacity": "0",
							"z-index": "-1",
						})
					});

				});
			</script>

			<script type="text/javascript">
				$(document).on("ready", function () {

					$(document).on('click', '.image_banner_click', function () {
						$(".banner_change").css({
							"opacity": "1",
							"z-index": "10",
						}),
						$(".background-filter").css({
							"opacity": "1",
							"z-index": "10",
						})
					});

					$(".close-icon,.background-filter").on("click", function () {
						$(".banner_change").css({
								"opacity": "0",
								"z-index": "-1",
						}),
						$(".background-filter").css({
							"opacity": "0",
							"z-index": "-1",
						})
					});

				});
			</script>

            <script type="text/javascript">
                $(document).on("ready", function () {

                    $(".not-user").on("click", function () {
                        $(".signup-modal").css({
                            "opacity": "1",
                            "z-index": "10",
                        }),
                                $(".background-filter").css({
                            "opacity": "1",
                            "z-index": "10",
                        })
                    });

                    $(".close-icon,.background-filter").on("click", function () {
                        $(".signup-modal").css({
                            "opacity": "0",
                            "z-index": "-1",
                        }),
                                $(".background-filter").css({
                            "opacity": "0",
                            "z-index": "-1",
                        })
                    });

                });
            </script>

        </div>

        <!-- Script Favoritos -->
        <?php if (isset($_SESSION['idUser'])) { ?>
            <script type="text/javascript">
                $('div.heart-status .1,div.heart-status .0').on('click', function () {
                    var value = $(this).attr('name');
                    if (value == 1) {
                        $(this).css({'display': 'none'});
                        $(this).siblings('span[name=0]').css({'display': 'inline-block'});

                        var dataUser = $(this).attr('data-user');
                        var dataBeer = $(this).attr('data-beer');
                        var namefunction = $(this).attr('data-function');
                        $.ajax({
                            beforeSend: function () {
                            },
                            url: "../../php/functions.php",
                            type: "POST",
                            data: {
                                namefunction : namefunction,
                                dataUser : dataUser,
                                dataBeer : dataBeer
                            },
                            success: function (result) {
                              location.reload();
                            },
                            error: function (error) {
                              alert(error);
                            },
                            complete: function () {
                            },
                            timeout: 10000
                        });
                    } else {
                        $(this).css({'display': 'none'});
                        $(this).siblings('span[name=1]').css({'display': 'inline-block'});

                        var dataUser = $(this).attr('data-user');
                        var dataBeer = $(this).attr('data-beer');
                        var namefunction = $(this).attr('data-function');
                        $.ajax({
                            beforeSend: function () {
                            },
                            url: "../../php/functions.php",
                            type: "POST",
                            data: {
                                namefunction : namefunction,
                                dataUser : dataUser,
                                dataBeer : dataBeer
                            },
                            success: function (result) {
                              location.reload();
                            },
                            error: function (error) {
                              alert(error);
                            },
                            complete: function () {
                            },
                            timeout: 10000
                        });
                    }
                });

                $('.deleteRank').click(function(){
                  var idBeer = $(this).attr('data-beer');
                  var idList = $(this).attr('data-list');
                  var namefunction = "deleteRank";
                  $.ajax({
                      beforeSend: function () {
                      },
                      url: "../../php/functions.php",
                      type: "POST",
                      data: {
                          namefunction : namefunction,
                          idList : idList,
                          idBeer : idBeer
                      },
                      success: function (result) {
                        location.reload();
                      },
                      error: function (error) {
                      },
                      complete: function () {
                      },
                      timeout: 10000
                  });
                });

                $('.changeRank li').click(function(){
                  var valuenew = $(this).attr('data-value');
                  var namefunction = "rankUser";
                  var idBeer = $(this).attr('data-beer');
                  var idUser = $(this).parent().attr('data-user');
                  $.ajax({
                      beforeSend: function () {
                      },
                      url: "../../php/functions.php",
                      type: "POST",
                      data: {
                          namefunction : namefunction,
                          valuenew : valuenew,
                          idBeer : idBeer,
                          idUser : idUser
                      },
                      success: function (result) {
                        $('.ranklevel').html(result);
                        var stars = "";
                        for(var i = 1; i<=5; i++){
                          if(result>= i)
                              stars = stars + "<li class='star star-small-profile' data-value='"+i+"'><i class='fa fa-star fa-fw star-small gold-star'></i></li>";
                        }
                        $('.appendGold').html(stars);
                        location.reload();
                      },
                      error: function (error) {
                      },
                      complete: function () {
                      },
                      timeout: 10000
                  });
                });

            </script>

            <script type="text/javascript">
                $('div.hearts-statuss .1,div.hearts-statuss .0').on('click', function () {
                  var value = $(this).attr('name');
                  if (value == 1) {
                      $(this).css({'display': 'none'});
                      $(this).siblings('span[name=0]').css({'display': 'inline-block'});
                      var dataUser = $(this).attr('data-user');
                      var dataBeer = $(this).attr('data-beer');
                      var namefunction = $(this).attr('data-function');
                      $.ajax({
                          beforeSend: function () {
                          },
                          url: "../../php/functions.php",
                          type: "POST",
                          data: {
                              namefunction : namefunction,
                              dataUser : dataUser,
                              dataBeer : dataBeer
                          },
                          success: function (result) {
                            location.reload();
                          },
                          error: function (error) {
                            alert(error);
                          },
                          complete: function () {
                          },
                          timeout: 10000
                      });
                  } else {
                    $(this).css({'display': 'none'});
                    $(this).siblings('span[name=1]').css({'display': 'inline-block'});
                    var dataUser = $(this).attr('data-user');
                    var dataBeer = $(this).attr('data-beer');
                    var namefunction = $(this).attr('data-function');
                    $.ajax({
                        beforeSend: function () {
                        },
                        url: "../../php/functions.php",
                        type: "POST",
                        data: {
                            namefunction : namefunction,
                            dataUser : dataUser,
                            dataBeer : dataBeer
                        },
                        success: function (result) {
                          location.reload();
                        },
                        error: function (error) {
                          alert(error);
                        },
                        complete: function () {
                        },
                        timeout: 10000
                    });
                  }
                });
            </script>

            <script type="text/javascript">
                $('.rating label').hover(function () {
                    var pos = $(this).attr('name');
                    pos = parseInt(pos);
                    $(this).parent().parent().children('div').each(function (index) {
                        if ((index + 1) > pos) {
                            $(this, 'label').css({'opacity': '.5'});
                        } else {
                            $(this, 'label').css({'opacity': '1'});
                        }
                    });
                }, function () {

                });
            </script>
        <?php } ?>

				<script type="text/javascript">
						$(document).on("ready", function () {

							$(".not-user").on("click", function () {
									$(".signup-modal").css({
											"opacity": "1",
											"z-index": "10",
									}),
													$(".background-filter").css({
											"opacity": "1",
											"z-index": "10",
									})
							});

							$(".close-icon,.background-filter").on("click", function () {
									$(".signup-modal").css({
											"opacity": "0",
											"z-index": "-1",
									}),
													$(".background-filter").css({
											"opacity": "0",
											"z-index": "-1",
									})
							});

						});
				</script>

				<script type="text/javascript">
						$("#box-target").focus(function () {
								$(".search-box").css({
										"opacity": "1",
										"z-index": "9"
								})
						});

						$("#box-target").focusout(function () {
								$(".search-box").css({
										"opacity": "0",
										"z-index": "-10"
								})
						});
				</script>

        <script type="text/javascript">
            $(document).on("ready", function () {

                $(".forgot-password").on("click", function () {
                    $(".password-modal").css({
                        "opacity": "1",
                        "z-index": "10",
                    }),
                    $(".login-modal").css({
                        "opacity": "0",
                        "z-index": "-1",
                    }),
                    $(".background-filter").css({
                        "opacity": "1",
                        "z-index": "10",
                    })
                });

                $(".close-icon,.background-filter").on("click", function () {
                    $(".password-modal").css({
                        "opacity": "0",
                        "z-index": "-1",
                    }),
                      $(".background-filter").css({
                        "opacity": "0",
                        "z-index": "-1",
                    })
                });

            });
        </script>

        <script type="text/javascript">

            $('.sendRecoveryMail').click(function(){
              var emailRecovery = $(this).siblings('.password-form').val();
              var namefunction = "recoveryPassword";


              $.ajax({
                  beforeSend: function () {},
                  url: "../../admin/php/functions.php",
                  type: "POST",
                  data: {
                      namefunction: namefunction,
                      emailRecovery: emailRecovery
                  },
                  success: function (result) {
                    if(result==0){
                      $('.mailnotvalid').css({'display': 'block'});
                        setTimeout(function () {
                          $('.mailnotvalid').css({'display': 'none'});
                      }, 2000);
                    }else{
                      $('.msgacceptedpassword').css({'display': 'block'});
                        setTimeout(function () {
                            $('.msgacceptedpassword').css({'display': 'none'});
                        }, 2000);
                    }
                  },
                  error: function () {},
                  complete: function () {},
                  timeout: 10000
              });



            });

            $("#selectCountry").change(function () {
                var idCountry = $("option:selected", this).attr('name');
                var namefunction = 'getStatesUser';
                $.ajax({
                    beforeSend: function () {},
                    url: "../../admin/php/functions.php",
                    type: "POST",
                    data: {
                        namefunction: namefunction,
                        idCountry: idCountry
                    },
                    success: function (result) {
                        $('#selectState').html(result);
                    },
                    error: function () {},
                    complete: function () {},
                    timeout: 10000
                });
            });

            $('#formNewUser').submit(function (e) {
                e.preventDefault();

                var name = $('input[name=userName]').val();
                var lastname = $('input[name=lastname]').val();
                var month = $('select[name=birthday_month] option:selected').attr('value');
                var day = $('select[name=birthday_day] option:selected').attr('value');
                var year = $('select[name=birthday_year] option:selected').attr('value');
                var country = $('select[name=country] option:selected').attr('value');
                var state = $('select[name=state] option:selected').attr('value');
                var confirmEmail = $('input[name=confirmEmail]').val();
                var email = $('input[name=email]').val();
                var confirmPassword = $('input[name=confirmPassword]').val();
                var password = $('input[name=password]').val();
                var namefunction = "addNewUser";

                if (confirmEmail != email) {
                    $('.mailMsgNotSame').css({'display': 'block'});
                    setTimeout(function () {
                        $('.mailMsgNotSame').css({'display': 'none'});
                    }, 2000);
                } else {
                    if (confirmPassword != password) {
                        $('#passMsg').css({'display': 'block'});
                        setTimeout(function () {
                            $('#passMsg').css({'display': 'none'});
                        }, 2000);
                    } else {
                        $.ajax({
                            beforeSend: function () {
                            },
                            url: "../../admin/php/functions.php",
                            type: "POST",
                            data: {
                                namefunction: namefunction,
                                name: name,
                                lastname: lastname,
                                month: month,
                                day: day,
                                year: year,
                                country: country,
                                state: state,
                                email: email,
                                password: password
                            },
                            success: function (result) {
                              if(result==-1){
                                $('#mailExist').css({'display': 'block'});
                                setTimeout(function () {
                                    $('#mailExist').css({'display': 'none'});
                                }, 2000);
                              }else{
                                location.reload();
                              }
                            },
                            error: function (error) {
                            },
                            complete: function () {
                            },
                            timeout: 10000
                        });
                    }
                }
            });

            $('.logOut').click(function (e) {
                e.preventDefault();
                var namefunction = "logOutUser";
                var idUser = $(this).attr('name');

                $.ajax({
                    beforeSend: function () {
                    },
                    url: "../../admin/php/functions.php",
                    type: "POST",
                    data: {
                        namefunction: namefunction,
                        idUser: idUser
                    },
                    success: function (result) {
                        location.reload();
                    },
                    error: function (error) {
                    },
                    complete: function () {
                    },
                    timeout: 10000
                });
            });

            $('.sendLoginUser').click(function (e) {
                e.preventDefault();
                var namefunction = "loginUser";
                var passwordLogin = $('input[name=passwordLogin]').val();
                var emailLogin = $('input[name=emailLogin]').val();

                $.ajax({
                    beforeSend: function () {
                    },
                    url: "../../admin/php/functions.php",
                    type: "POST",
                    data: {
                        namefunction: namefunction,
                        passwordLogin: passwordLogin,
                        emailLogin: emailLogin
                    },
                    success: function (result) {
                        if (result == -1) {
                            $('.notEmail').css({'display': 'block'});

                            setTimeout(function () {
                                $('.notEmail').css({'display': 'none'});
                            }, 2000);
                        } else {
                            if (result == 0) {
                                $('.notPass').css({'display': 'block'});
                                setTimeout(function () {
                                    $('.notPass').css({'display': 'none'});
                                }, 2000);
                            } else {
                              if(result == -2){
                                $('.blockcount').css({'display': 'block'});
                                setTimeout(function () {
                                    $('.blockcount').css({'display': 'none'});
                                }, 2000);
                              }else{
                                location.reload();
                              }
                            }
                        }
                    },
                    error: function (error) {
                    },
                    complete: function () {
                    },
                    timeout: 10000
                });
            });

        </script>


				<script type="text/javascript">

						function isLeapYear(year) {
								return (new Date(year, 2, 0).getDate() == 29);
						}

						function getAge(birthDate) {
								var today = new Date();
								var age = today.getFullYear() - birthDate.getFullYear();
								var m = today.getMonth() - birthDate.getMonth();

								if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
										age--;
								}

								return age;
						}

						function getDays(year, month) {
								var days = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

								if (isLeapYear(year)) {
										days[2] = 29;
								}

								return days[month];
						}

						function validateDoB() {
								var birthday_year = $('#birthday_year');
								var birthday_month = $('#birthday_month');
								var birthday_day = $('#birthday_day');

								return false;
						}

						$('.birthday.year, .birthday.month').change(function () {
								var year = $('#birthday_year');
								var month = $('#birthday_month');
								var day = $('#birthday_day');

								var selected_day = day.val();

								if (year.val() == '' || month.val() == '') {
										return false;
								}

								var days = getDays(year.val(), month.val());
								var options = ['<option value=""></option>'];

								for (var i = 1; i <= days; i++) {
										options.push('<option value="' + i + '">' + i + '</option>');
								}

								day.html('').append(options.join("\n"));
								day.val(Math.min(selected_day, days));
						}).trigger('change');

						$('#btn_submit').click(validateDoB);

				</script>

        <script type="text/javascript" src="../../js/rating.js"></script>
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


    </body>
</html>
