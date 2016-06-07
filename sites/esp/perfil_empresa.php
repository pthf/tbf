<?php
session_start();
include('../../admin/php/connect_bd.php');
connect_base_de_datos();

if(isset($_GET['id'])){
    $queryProducer = "SELECT * FROM producer
    INNER JOIN countries ON producer.country_id = countries.id
    INNER JOIN states ON producer.state_id = states.id
    WHERE idProducer = ".$_GET['id'];
    $resultProducer = mysql_query($queryProducer) or die(mysql_error());
    $lineProducer = mysql_fetch_array($resultProducer);
    if(!mysql_num_rows($resultProducer)>0)
      header('Location: inicio.php');
}else{
  header('Location: inicio.php');
}

if (isset($_SESSION['idUser'])) {
    $query = "SELECT * FROM user WHERE idUser = " . $_SESSION['idUser'];
    $result = mysql_query($query) or die(mysql_error());
    $line = mysql_fetch_array($result);
}
?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Productores | The Beer Fans | Red Social</title>

        <link rel="shortcut icon"  type="image/png" href="../../images/favicon.png">
        <link rel="stylesheet" type="text/css" href="../../styles/styles.css">
        <link rel="stylesheet" type="text/css" href="../../styles/styles_responsive.css">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

        <script type="text/javascript" src="../../js/all_pages_jquery.js"></script>
        <script type="text/javascript" src="../../js/image_click.js"></script>
        <script type="text/javascript" src="../../js/slider.js"></script>
        <script type="text/javascript" src="../../js/popup_img.js"></script>

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
                            $.ajax({
                                url: "busqueda.php",
                                type: "POST",
                                data: {valores: valores},
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
												<span class="login-title-text">INICIAR SESIÓN</span>
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

												<span style="display:none;" id="mail">Los email no son idénticos.</span>
												<span style="display:none;" id="passMsg">Las cotraseñas no son idénticas.</span>

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
												<a href="configuracion.php"><li><span>CONFIGURACIÓN</span></li></a>
												<a href="#" class="logOut" name="<?= $line['idUser'] ?>"><li class="no_border"><span>SALIR</span></li></a>
										</ul>
								<?php } else { ?>
										<ul>
												<a href="inicio.php"><li><span>HOME</span></li></a>
												<a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
												<a href="productores.php"><li><span>PRODUCTORES</span></li></a>
												<a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
												<a href="#" class="user_name_click"><li><span>INICIAR SESIÓN</span></li></a>
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

            <div class="popup_img">
                <img class="profile_popup" src="../../images/producerProfiles/<?= $lineProducer['producerProfileImage'] ?>" />
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
                          <select class="filter-opt">
                            <option value="usuario"> Usuarios  </option>
                            <option value="cervezas">Cervezas</option>
                            <option value="productores">Productores</option>
                            <option value="Materia Prima">Materia Prima</option>
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
                  											<a href="#"><span>INICIAR SESIÓN</span></a>
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
                <img src="../../images/producerCovers/<?=$lineProducer['producerCoverImage']?>" alt="Imagen The Beer Fans Principal" title="Imagen The Beer Fans Principal">
            </div>

            <div class="content_profile content_profile_beer">

                <div class="image_logo">

                    <img src="../../images/producerProfiles/<?=$lineProducer['producerProfileImage']?>" />

                </div>

                <div class="name_profile" style="width: 70%;">

                    <p><?=mb_strtoupper($lineProducer['producerName'])?></p>

                </div>

                <div class="city_profile" style="width: 70%;">
                    <p><?=$lineProducer['name_c']?>, <?=$lineProducer['name_s']?>.</p>
                </div>

                <div class="age_profile material_age" style="width: 70%;">
                    <p><?=$lineProducer['producerAddress']?>, CP. <?=$lineProducer['producerZip']?> <br> T.  <?=$lineProducer['producerPhone']?>.</p>
                </div>

                <div class="desc_profile">

                    <p><?=$lineProducer['producerDescription']?></p><br><br>

                    <a href="mailto:<?=$lineProducer['producerEmail'];?>?Subject=The_Beers_Fans" target="_top" class="message_button">
                        <div class="send_message" >
                            <img src="../../images/social-03.png"/>
                            <p>ENVIAR CORREO.</p>
                        </div>
                    </a><br>

                    <p><?=$lineProducer['producerEmail'];?></p>

                </div>

                <div class="social_company">
                    <?php if(strlen($lineProducer['producerSite'])>0){?>
                    <a target="_blank" href="<?= $lineProducer['producerSite'] ?>" class="first_contact fb"><img src="../../images/web-icon.png"/></a>
                    <?php } ?>
                    <?php if(strlen($lineProducer['producerFacebook'])>0){?>
                    <a target="_blank" href="<?= $lineProducer['producerFacebook'] ?>" class="first_contact fb"><img src="../../images/social-04.png"/></a>
                    <?php } ?>
                    <?php if(strlen($lineProducer['producerTwitter'])>0){?>
                    <a target="_blank" href="<?= $lineProducer['producerTwitter'] ?>" class="other_contact twt"><img src="../../images/social-02.png" /></a>
                    <?php } ?>
                      <?php if(strlen($lineProducer['producerInstagram'])>0){?>
                    <a target="_blank" href="<?= $lineProducer['producerInstagram'] ?>" class="other_contact ig"><img src="../../images/social-01.png" /></a>
                    <?php } ?>
                </div>



            </div>

            <div class="favs_profile favs_profile_beer">

                <div class="back_ profile_back">
                    <a href="cervezas.php">
                        <img src="../../images/flecha-izq_negro.png" />
                        <p class="back_text">IR A CERVEZAS</p>
                    </a>
                </div>

                <div class="slides">
                    <div class="toptext_slider"><span>PRODUCTOS</span></div>
                    <div class="overflow">
                        <div class="inner profile favoritos-slider">

                          <?php
                              $q = "SELECT * FROM beer WHERE idProducer = ".$_GET['id'];
                              $r = mysql_query($q) or die(mysql_error());
                              $contador = 0;
                              while($l = mysql_fetch_array($r)){
                                if($contador==0)
                                  echo '<article class="favoritos-slideItems">';
                                $contador++;

                                $length = 40;
                                $descriptionText = substr($l['beerDescription'], 0, $length);
                                if(strlen($l['beerDescription'])>$length){
                                  $descriptionText .= "...";
                                }
                                echo '
                                    <li class="first_beer">
                                      <img src="../../images/beerBottles/'.$l["beerBottleImage"].'"> <br>
                                      <span class="title">'.$l["beerName"].'</span>
                                      <span class="subtitle">'.$descriptionText.'</span>
                                      <a href="perfil_beer.php?id='.$l["idBeer"].'"><span class="ver_mas">VER MÁS</span></a>
                                    </li>
                                ';
                                if($contador==8){
                                  echo '</article>';
                                  $contador=0;
                                }
                              }
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
                    <?php if (isset($_SESSION['idUser'])) { ?>
                                            <ul class="nav">
                                                <a href="inicio.php"><li><span>HOME</span></li></a>
                                                <a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
                                                <a href="productores.php"><li><span>PRODUCTORES</span></li></a>
                                                <a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
                                                <a href="perfil.php?idUser=<?= $line['idUser'] ?>"><li><span>MI PERFIL</span></li></a>
                                                <a href="configuracion.php"><li><span>CONFIGURACIÓN</span></li></a>
                                                <a href="contact.php"><li><span>CONTACTO</span></li></a>
                                            </ul>
                    <?php } else { ?>
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
		            $(document).on("ready", function () {

		                $(document).on('click', '.user_name, .user_name_click', function () {
		                    $(".login-modal").css({
		                        "opacity": "1",
		                        "z-index": "10",
		                    }),
		                            $(".background-filter").css({
		                        "opacity": "1",
		                        "z-index": "10",
		                    })
		                });

		                $(".close-icon,.background-filter").on("click", function () {
		                    $(".login-modal").css({
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
                                    location.reload();
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

        </div>
    </body>
</html>
