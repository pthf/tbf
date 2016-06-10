<?php
session_start();
include('../../admin/php/connect_bd.php');
connect_base_de_datos();

if (isset($_SESSION['idUser'])) {
    $query = "SELECT * FROM user WHERE idUser = " . $_SESSION['idUser'];
    $result = mysql_query($query) or die(mysql_error());
    $line = mysql_fetch_array($result);
}

if (!isset($_SESSION['language'])) {
    //English by default.
    $_SESSION['language'] = 0;
}else{
    $_SESSION['language'] = 0;
}

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home | The Beer Fans | Social Network</title>

        <link rel="shortcut icon"  type="image/png" href="../../images/favicon.png">
        <link rel="stylesheet" type="text/css" href="../../styles/styles.css">
        <link rel="stylesheet" type="text/css" href="../../styles/styles_responsive.css">

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="../../js/all_pages_jquery.js"></script>
        <script type="text/javascript" src="../../js/check.js"></script>
        <script type="text/javascript" src="../../js/responsiveslides.js"></script>
        <script>
            $(function () {
            $("#slider2").responsiveSlides({
              auto: true,
              speed: 200,
              pager: true,
            });

          });
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
                var option = $('select[id=type-search]').val();
                location.href = "inicio.php?option="+option;
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
                        <a href="#"><span class="login-title-text">INICIA SESIÓN</span></a>
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
                            <span class="not-user"><label for="privacyTerms">I AGREE<a href="term.pdf" target="_blank"><u>TO THE TERMS</u></a>.</label></span>
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
                        <a href="../eng/age.php" class="changeLanguage"><li><span>ENGLISH</span></li></a>
                        <a href="#" class="logOut" name="<?= $line['idUser'] ?>"><li class="no_border"><span>SALIR</span></li></a>
                    </ul>
                <?php } else { ?>
                    <ul>
                        <a href="inicio.php"><li><span>HOME</span></li></a>
                        <a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
                        <a href="productores.php"><li><span>PRODUCTORES</span></li></a>
                        <a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
                        <a href="../eng/beers.php" class="changeLanguage"><li><span>ENGLISH</span></li></a>
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
                            <option selected value="1" name="1">Usuarios</option>
                            <option value="2" name="2">Cervezas</option>
                            <option value="3" name="3">Productores</option>
                            <option value="4" name="4">Materia Prima</option>
                            <?php } else if ($_GET['option'] == 2 ) { ?>
                            <option value="" name="0" disabled> Tipo búsqueda </option>
                            <option value="1" name="1"> Usuarios </option>
                            <option selected value="2" name="2">Cervezas</option>
                            <option value="3" name="3">Productores</option>
                            <option value="4" name="4">Materia Prima</option>
                            <?php } else if ($_GET['option'] == 3 ) { ?>
                            <option value="" name="0" disabled> Tipo búsqueda </option>
                            <option value="1" name="1"> Usuarios </option>
                            <option value="2" name="2">Cervezas</option>
                            <option selected value="3" name="3">Productores</option>
                            <option value="4" name="4">Materia Prima</option>
                            <?php } else if ($_GET['option'] == 4 ) { ?>
                            <option value="" name="0" disabled> Tipo búsqueda </option>
                            <option value="1" name="1"> Usuarios </option>
                            <option value="2" name="2">Cervezas</option>
                            <option value="3" name="3">Productores</option>
                            <option selected value="4" name="4">Materia Prima</option>
                            <?php } else if ((!$_GET) || ($_GET['option'] == 0) || ($_GET['option'] > 4)) { ?>
                            <option selected value="" name="0" disabled> Tipo búsqueda </option>
                            <option value="1"> Usuarios </option>
                            <option value="2">Cervezas</option>
                            <option value="3">Productores</option>
                            <option value="4">Materia Prima</option>
                            <?php } ?>
                          </select>
                          <br>
                          <ul class="callouts">
                            <li class="callouts--top">Seleccione un filtro</li>
                          </ul>
                        </div>

                        <div class="search main-search">
                            <img src="../../images/icon-01.png" alt="search icon" title="search icon">
                            <input type="text" id="box-target" placeholder="">

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
                  											<a href="#">
                      										<div class="user_name-title">
                                            <span>INICIA SESIÓN</span>
                                          </div>
                                        </a>
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

            <div class="top_img home">

              <div id="wrapper-slider">

                <!-- Slideshow 2 -->
                <ul class="rslides" id="slider2">
                <?php
                  $q = "SELECT * FROM bannersliderhome WHERE language = ".$_SESSION['language'];
                  $r = mysql_query($q) or die(mysql_error());
                  while($l = mysql_fetch_array($r)){
                    echo '<li><a target="_BLANK" href="'.$l["bannerSliderHomeUrl"].'" class="no-opacity"><img src="../../images/homeBanners/'.$l["bannerSliderHomeImage"].'" alt=""></a></li>';
                  }
                ?>
                </ul>

              </div>


            </div>



            <div class="cont_site">
                <div class="prin_img">
                    <a href="cervezas.php" class="item-pring">
                        <img src="../../images/beerBanners/photo_pthf_home-04.png" alt="foto 1 principal tbf" title="foto 1 principal tbf">
                        <div class="capa">
                            <span>BEERS</span>
                        </div>
                    </a>
                </div>

                <div class="prin_img">
                    <a href="productores.php" class="item-pring">
                        <img src="../../images/beerBanners/photo_pthf_home-02.png" alt="foto 2 principal tbf" title="foto 2 principal tbf">
                        <div class="capa">
                            <span>PRODUCERS</span>
                        </div>
                        </ar>
                </div>

                <div class="prin_img">
                    <a href="materia.php" class="item-pring">
                        <img src="../../images/beerBanners/photo_pthf_home-03.png" alt="foto 3 principal tbf" title="foto 3 principal tbf">
                        <div class="capa">
                            <span>RAW</span>
                        </div>
                    </a>
                </div>

                <div class="prin_img">
                    <a href="http://www.thebeerfans.com/blog" target="_blank" class="item-pring">
                        <img src="../../images/NOTICIAS.png" alt="foto 4 principal tbf" title="foto 4 principal tbf">
                        <div class="capa" id="news">
                            <span>NEWS</span>
                        </div>
                    </a>
                </div>

                <div class="slideshow">

                    <ul class="beers_month">
                        <?php
                            $q = "SELECT * FROM bannerslidernew WHERE language = ".$_SESSION['language'];
                            $r = mysql_query($q) or die(mysql_error());
                            $cantidad = 0;
                            while($l = mysql_fetch_array($r)){
                              $cantidad++;
                        ?>
                        <li class="news-slider" data-n="<?=$cantidad?>">
                            <img src="../../images/newBanners/<?=$l['bannerSliderNewImage']?>" alt="tbf tarro" title="tbf tarro">
                            <div class="aside_info_second">
                                <div class="contenido_aside">
                                    <span class="title"><?=$l['bannerSliderNewTitle']?></span>
                                    <span class="sub_title"> <?=$l['bannerSliderNewSubtitle']?> </span>
                                    <p><?=$l['bannerSliderNewDescription']?></p>
                                    <a href="<?=$l['bannerSliderNewUrl']?>" target="_blank">
                                        <div class="boton_mas">LEARN MORE</div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>

                    <ul class="nav_beers cantidadElements" name="<?= $cantidad ?>">
                      <?php
                          $q = "SELECT * FROM bannerslidernew WHERE language = ".$_SESSION['language'];
                          $r = mysql_query($q) or die(mysql_error());
                          $cantidad = 0;
                          while($l = mysql_fetch_array($r)){
                            $cantidad++;
                            echo '<li data-cd="'.$cantidad.'"></li>';
                          }
                      ?>
                    </ul>

                </div>

                <div class="part_info_bottom">

                    <div class="contact_us_or_follow">
                        <img src="../../images/banner-tbf.png" alt="tbf cervezas" title="tbf cervezas">
                        <div class="contenido_usuarios">
<?php if (isset($_SESSION['idUser'])) { ?>
                                <span class="user_list">RECOMMENDED USERS.</span>
                                <span class="user_list list-sub">FINDS OTHER USERS WITH SIMILAR TASTES LIKE YOU.</span>
                                <div class="Grid" style="overflow: auto;">

                                <?php
                                  $queryUser = "SELECT * FROM user
                                                INNER JOIN states
                                                ON states.id = user.state_id
                                                INNER JOIN countries
                                                ON countries.id = user.country_id
                                                WHERE user.userStatus != 0
                                                AND user.country_id = ".$line['country_id']." AND user.idUser != ".$line['idUser'];
                                  $resultUser = mysql_query($queryUser) or die(mysql_error());
                                  if(mysql_num_rows($resultUser)>0){
                                    while($lineUser = mysql_fetch_array($resultUser)){
                                    echo '
                                      <li class="flex-item">
                                          <div class="user-status">
                                    ';
                                        if($lineUser['userConnection']==0){
                                          echo '<img src="../../images/gray_icon.png" alt="" />';
                                        }else {
                                          echo '<img src="../../images/green_icon.png" alt="" />';
                                        }

                                    echo '

                                          </div>
                                          <a href="profile.php?idUser='.$lineUser["idUser"].'"><img class="flex-item-info" src="../../images/userProfile/'.$lineUser["userProfileImage"].'"/></a>
                                          <div class="flex-item-info">
                                              <span>'.$lineUser["userName"].'</span>
                                              <span>'.$lineUser["userLastName"].'</span>
                                              <br>
                                              <span>'.$lineUser["name_s"].' - '.$lineUser["sortname"].'</span>
                                              <br>
                                              <a href="perfil.php?idUser='.$lineUser["idUser"].'"><span class="AddFriend">Ver perfil</span></a>
                                          </div>
                                      </li>
                                    ';
                                    }
                                  }else{
                                    echo '<span class="user_list list-sub" style="display:inline-block !important; width: auto !important;">SIN USUARIOS RECOMENDADOS.</span>';
                                  }


                                ?>




                                </div>
                            <?php } else { ?>
                                <span class="user_list" style="text-align: center !important; display: block; margin: 0;">USUARIOS RECOMENDADOS.<a href="#"><span class="user_name">INICIA SESIÓN</span></a> PARA CONOCER GENTE CON TUS MISMOS GUSTOS.</span>
<?php } ?>
                        </div>
                    </div>


                    <?php
                      $q = "SELECT * FROM bannersliderpost WHERE language = ".$_SESSION['language']." ORDER BY RAND() LIMIT 1";
                      $r = mysql_query($q) or die(mysql_error());
                      $l = mysql_fetch_array($r);
                      $listpreview = $l['idBannerSliderPost'];
                    ?>

                    <div class="info_bottom">
                        <img src="../../images/postBanners/<?=$l['bannerSliderPostImage']?>" alt="tbf cervezas" title="tbf cervezas">
                        <div class="aside_info_second first_part">
                            <div class="contenido_aside">
                                <span class="title"><?=$l['bannerSliderPostTitle']?></span>
                                <span class="sub_title"><?=$l['bannerSliderPostSubtitle']?></span>
                                <p><?=$l['bannerSliderPostDescription']?></p>
                                <a href="<?=$l['bannerSliderPostUrl']?>">
                                    <div class="boton_mas">LEARN MORE</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="part_info_bottom">

                    <?php
                      $q = "SELECT * FROM bannersliderpost WHERE idBannerSliderPost != $listpreview AND language = ".$_SESSION['language']." ORDER BY RAND() LIMIT 1";
                      $r = mysql_query($q) or die(mysql_error());
                      $l = mysql_fetch_array($r);
                    ?>

                    <div class="info_bottom">
                        <img src="../../images/postBanners/<?=$l['bannerSliderPostImage']?>" alt="tbf cervezas" title="tbf cervezas">
                        <div class="aside_info_second first_part">
                            <div class="contenido_aside">
                                <span class="title"><?=$l['bannerSliderPostTitle']?></span>
                                <span class="sub_title"><?=$l['bannerSliderPostSubtitle']?></span>
                                <p><?=$l['bannerSliderPostDescription']?></p>
                                <a href="<?=$l['bannerSliderPostUrl']?>">
                                    <div class="boton_mas">LEARN MORE</div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="contact_us_or_follow">
                        <img src="../../images/postBanners/8150091.png" alt="tbf cervezas" title="tbf cervezas">
                        <div class="contenido_social">
                            <span>CONTACT US OR FOLLLOW US<br>ON OUR SOCIAL NETWORKS</span>
                            <ul>
                                <a href=""><li><img src="../../images/social-04.png"></li></a>
                                <a href=""><li><img src="../../images/social-02.png"></li></a>
                                <a href=""><li><img src="../../images/social-01.png"></li></a>
                                <a href="contact_eng.php"><li><img src="../../images/social-03.png"></li></a>
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
                                                <a href="#" class="user_name_click"><li><span>INICIA SESIÓN</span></li></a>
                                                <a href="contact.php"><li><span>CONTACTO</span></li></a>
                                            </ul>
                    <?php } ?>

                    <span class="right_about">Nosotros - Política de Privacidad - FAQS</span>

                    <span class="right_about">© <?= date('Y') ?> The Beer Fans. Todos los derechos reservados.</span>
                </div>
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

        <!-- script recover password -->
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


        <script type="text/javascript" src="../../js/slider.js"></script>
        <script type="text/javascript" src="../../js/homeSlider.js"></script>
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
