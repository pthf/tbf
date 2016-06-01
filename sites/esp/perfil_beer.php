<?php
session_start();
include('../../admin/php/connect_bd.php');
connect_base_de_datos();

if(isset($_GET['id'])){
    $queryBeer = "SELECT * FROM beer
    INNER JOIN producer ON beer.idProducer = producer.idProducer
    INNER JOIN beertype ON beer.idBeerType = beertype.idBeerType
    INNER JOIN countries ON producer.country_id = countries.id
    INNER JOIN states ON producer.state_id = states.id
    WHERE beer.idBeer = ".$_GET['id'];
    $resultBeer = mysql_query($queryBeer) or die(mysql_error());
    $lineBeer = mysql_fetch_array($resultBeer);
    if(!mysql_num_rows($resultBeer)>0)
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

        <title>Cerveza | The Beer Fans | Red Social</title>

        <link rel="shortcut icon"  type="image/png" href="../../images/favicon.png">
        <link rel="stylesheet" type="text/css" href="../../styles/styles.css">
        <link rel="stylesheet" type="text/css" href="../../styles/styles_responsive.css">
        <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

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

																<select required id="birthday_day" name="birthday_day" class="birthday day" >
																		<option value="">Día &#x25BE;</option>
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
                <img class="profile_popup" src="../../images/beerProfiles/<?= $lineBeer['beerProfileImage'] ?>" />
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
                                    <a href="mensajes.php">
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
                  											<span>INICIAR SESIÓN</span>
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
                <img src="../../images/beerCovers/<?= $lineBeer['beerCoverImage'] ?>" alt="Imagen The Beer Fans Principal" title="Imagen The Beer Fans Principal">
            </div>

            <div class="content_profile content_profile_beer">

                <div class="image_logo">
                    <img src="../../images/beerProfiles/<?= $lineBeer['beerProfileImage'] ?>" />
                </div>


                <div class="name_profile" style="width: 70%;">
                    <p><?= strtoupper($lineBeer['beerName']) ?></p>
                </div>

                <div class="city_profile" style="width: 70%;">
                    <p><?= strtoupper($lineBeer['beerTypeName']) ?></p><br>
                    <p><?=$lineBeer['name_c']?>, <?=$lineBeer['name_s']?>.</p>
                </div>
                <br>
                <div class="desc_profile">
                    <h2>Caracteristicas Generales</h2><br>
                    <p><?=$lineBeer['beerDescription']?></p>
                    <br><br>
                    <span>País: </span> <span><?=$lineBeer['name_c']?></span> <br><br>
                    <span>Estilo: </span> <span> <?= strtoupper($lineBeer['beerTypeName']) ?> </span> <br><br>
                    <span>Grado de alcohol:</span> <span> <?= $lineBeer['beerStrength'] ?></span> <br><br>
                    <span>IBUS:</span> <span><?= $lineBeer['beerIBUS'] ?></span> <br>

                </div>


                <div class="social_company">
                    <?php if(strlen($lineBeer['beerSite'])>0){?>
                    <a target="_blank" href="<?= $lineBeer['beerSite'] ?>" class="first_contact fb"><img src="../../images/social-01.png"/></a>
                    <?php } ?>
                    <?php if(strlen($lineBeer['beerFacebook'])>0){?>
                    <a target="_blank" href="<?= $lineBeer['beerFacebook'] ?>" class="first_contact fb"><img src="../../images/social-04.png"/></a>
                    <?php } ?>
                    <?php if(strlen($lineBeer['beerTwitter'])>0){?>
                    <a target="_blank" href="<?= $lineBeer['beerTwitter'] ?>" class="other_contact twt"><img src="../../images/social-02.png" /></a>
                    <?php } ?>
                      <?php if(strlen($lineBeer['beerInstagram'])>0){?>
                    <a target="_blank" href="<?= $lineBeer['beerInstagram'] ?>" class="other_contact ig"><img src="../../images/social-01.png" /></a>
                    <?php } ?>
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
                        <img src="../../images/beerBottles/<?= $lineBeer['beerBottleImage'] ?>" alt="" />
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

                            <ul class="nav_beers cantidadElements popup_beers">
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

                      <div class='rating-stars text-center'>
                        <ul id='stars'>
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
                      </div>


                    <div class="fav_box">
                        <a class="user_icons add_favorites" href="#">
                            <img class="fav_button" id="fav_button" src="../../images/fav1.svg"> <?php
                            if(isset($_SESSION['idUser'])){
                              $q = "SELECT idFavoritesList FROM user WHERE idUser = ".$_SESSION['idUser'];
                              $r = mysql_query($q) or die(mysql_error());
                              $l = mysql_fetch_array($r);
                              $listaUser = $l['idFavoritesList'];

                              $q = "SELECT idFavoriteElement FROM favoriteelement WHERE $listaUser = idFavoritesList AND ".$_GET['id']." = idBeer";
                              $r = mysql_query($q) or die(mysql_error());

                              if(mysql_num_rows($r)>0){?>
                                <p class="add_fav loginacepfavorites" data-function="deleteFavorites" data-user="<?=$_SESSION['idUser']?>" data-beer="<?= $lineBeer['idBeer'] ?>">ELIMINAR DE FAVORITOS</p> <?php
                              }else{ ?>
                                  <p class="add_fav loginacepfavorites" data-function="addFavorites" data-user="<?=$_SESSION['idUser']?>" data-beer="<?= $lineBeer['idBeer'] ?>">AGREGAR A FAVORITOS</p><?php
                              }
                            }else{ ?>
                              <p class="add_fav logintoadd">AGREGAR A FAVORITOS</p> <?php
                            } ?>
                        </a>
                    </div>

                    <div class="wishlist_box">
                        <a class="user_icons" href="#">
                            <img class="wishlist_icon" src="../../images/wishlist.svg"><?php
                            // <p class="add_wishlist">AGREGAR A WISHLIST</p>


                            if(isset($_SESSION['idUser'])){
                              $q = "SELECT idWishList FROM user WHERE idUser = ".$_SESSION['idUser'];
                              $r = mysql_query($q) or die(mysql_error());
                              $l = mysql_fetch_array($r);
                              $listaUser = $l['idWishList'];

                              $q = "SELECT idWishListElement FROM wishlistelement WHERE $listaUser = idWishList AND ".$_GET['id']." = idBeer";
                              $r = mysql_query($q) or die(mysql_error());

                              if(mysql_num_rows($r)>0){?>
                                <p class="add_fav loginacepwishlist" data-function="deleteWishList" data-user="<?=$_SESSION['idUser']?>" data-beer="<?= $lineBeer['idBeer'] ?>">ELIMINAR DE WISHLIST</p> <?php
                              }else{ ?>
                                  <p class="add_fav loginacepwishlist" data-function="addWishList" data-user="<?=$_SESSION['idUser']?>" data-beer="<?= $lineBeer['idBeer'] ?>">AGREGAR A WISHLIST</p><?php
                              }
                            }else{ ?>
                              <p class="add_fav logintoadd">AGREGAR A WISHLIST</p> <?php
                            } ?>




                        </a>
                    </div>

                    <script>
                      $('.loginacepwishlist').click(function(e){
                        e.preventDefault();
                        var dataUser = $(this).attr('data-user');
                        var dataBeer = $(this).attr('data-beer');
                        var namefunction = $(this).attr('data-function');
                        $.ajax({
                            beforeSend: function () {
                            },
                            url: "../../admin/php/functions.php",
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
                            },
                            complete: function () {
                            },
                            timeout: 10000
                        });
                      });

                      $('.loginacepfavorites').click(function(e){
                        e.preventDefault();
                        var dataUser = $(this).attr('data-user');
                        var dataBeer = $(this).attr('data-beer');
                        var namefunction = $(this).attr('data-function');
                        $.ajax({
    		                    beforeSend: function () {
    		                    },
    		                    url: "../../admin/php/functions.php",
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
    		                    },
    		                    complete: function () {
    		                    },
    		                    timeout: 10000
    		                });
                      });
                    </script>

                </div>

                <!-- comments -->
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

                <?php if (isset($_SESSION['idUser'])) { ?>
                    <div class="send_a_message comments_text">
                        <textarea name="message" rows="8" cols="40" placeholder="Escribe un comentario..."></textarea>
                        <style media="screen">
                          ::-webkit-input-placeholder{
                            padding: 1.5% 0 0 1.5%;
                          }
                        </style>
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
                    <span class="right_about">Nosotros - PolÃ­tica de Privacidad - FAQS</span>

                    <span class="right_about">Â© <?= date('Y') ?> The Beer Fans. Todos los derechos reservados.</span>
                </div>
            </div>

						<script type="text/javascript">
		            $(document).on("ready", function () {

		                $(document).on('click', '.user_name, .user_name_click, .logintoadd', function () {
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
		                    $('#mailMsg').css({'display': 'block'});
		                    setTimeout(function () {
		                        $('#mailMsg').css({'display': 'none'});
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
		                                location.reload();
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

          <script type="text/javascript">
            $( ".fav_box" )
              .mouseenter(function() {
                $( '#fav_button' ).css(  "content" , "url('../../images/fav2.svg')" );
              })
              .mouseleave(function() {
                $( '#fav_button' ).css(  "content" , "url('../../images/fav1.svg')" );
              });
          </script>

          <script type="text/javascript">
            $( ".wishlist_box" )
              .mouseenter(function() {
                $( 'img.wishlist_icon' ).css(  "transition" , ".5s ease" );
                $( 'img.wishlist_icon' ).css(  "transform" , "rotate(90deg)");
              })
              .mouseleave(function() {
                $( 'img.wishlist_icon' ).css(  "transition" , ".5s ease");
                $( 'img.wishlist_icon' ).css(  "transform" , "rotate(0deg)");

              });
          </script>
          <script type="text/javascript" src="../../js/rating.js"></script>
        </div>
    </body>
</html>
