<?php
session_start();
if (isset($_SESSION['idUser'])) {
    include('../../admin/php/connect_bd.php');
    connect_base_de_datos();

  $query = "SELECT * FROM user WHERE idUser = " . $_SESSION['idUser'];
    $result = mysql_query($query) or die(mysql_error());
    $line = mysql_fetch_array($result);

} else {
    header("Location: inicio.php");
}

if (!isset($_SESSION['language'])) {
    //Spanish by default.
    $_SESSION['language'] = 1;
}else{
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
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

        <script type="text/javascript" src="../../js/all_pages_jquery.js"></script>

        <script type="text/javascript">
    $(document).ready(function () {

        (function ($) {
            $('#filtrar_user').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.user_message .chat_user').hide();
                $('.user_message .chat_user').filter(function () {
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
                location.href = "mensajes.php?option="+option;
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
                        <span class="not-user"><label for="privacyTerms">ACEPTAS LOS <a href="term.pdf" target="_blank"><u>TÉRMINOS DE PRIVACIDAD</u></a>.</label></span>
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
										<a href="../eng/messages.php"class="changeLanguage"><li><span>ENGLISH</span></li></a>
                    <a href="configuracion.php"><li><span>CONFIGURACIÓN</span></li></a>
                    <a href="#" class="logOut" name="<?= $line['idUser'] ?>"><li class="no_border"><span>SALIR</span></li></a>
                </ul>
                <?php } else { ?>
                <ul>
                    <a href="inicio.php"><li><span>HOME</span></li></a>
                    <a href="cervezas.php"><li><span>CERVEZAS</span></li></a>
                    <a href="productores.php"><li><span>PRODUCTORES</span></li></a>
                    <a href="materia.php"><li><span>MATERIA PRIMA</span></li></a>
                        <a href="../eng/messages.php"class="changeLanguage"><li><span>ENGLISH</span></li></a>
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
                <img src="../../images/Pitchers_and_pints_of_cold_beer_seen_on_a_bar.jpeg" alt="Imagen The Beer Fans Principal" title="Imagen The Beer Fans Principal">
                <span class="text_prin bottom_text">MENSAJES</span>
            </div>


            <!-- TOP -->
            <div class="content_messages_top">

                <!--box top left -->
                <div class="search_">
                    <div class="circle_search">
                        <img src="../../images/icon-01.png"/>
                        <input name="message" type="text" id="filtrar_user"/>
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
            <div class="content_messages_bottom user_message">
                <!--box bottom left -->
                <div id="contact_list">
                  <?php
                  $query = "SELECT ch.user_idUser,ch.inbox_idInbox,us.idInbox,us.userName,us.userProfileImage, ms.messageStatus,ch.idChat FROM chat ch
                  INNER JOIN user us ON us.idUser = ch.user_idUser
                  INNER JOIN message ms ON ms.chat_idChat = ch.idChat
                  WHERE ch.user_idUser != '".$_SESSION['idUser']."' AND ch.inbox_idInbox = '".$line['idInbox']."'
                  GROUP BY us.userName";
                  $resultado = mysql_query($query) or die (mysql_error());
                  while ($row = mysql_fetch_array($resultado)) {
                    $query2 = "SELECT * FROM message WHERE chat_idChat = '".$row['idChat']."' AND user_idUser = '".$row['user_idUser']."' AND messageStatus = 0";
                    $resultado2 = mysql_query($query2) or die (mysql_error());
                  ?>

                    <a href="?idChat=<?php echo $row['idChat'];?>&idUser=<?php echo $row['user_idUser'];?>" class="chats_inbox" data-id-chat="<?php echo $row['idChat'];?>">

                      <?php if(mysql_num_rows($resultado2) > 0) { ?>
                        <div class="contactProfile chat_user color-chat" style="background:gainsboro; opacity:0.9">
                            <div class="contact_left">

                                <img src="../../images/green_icon.png" alt="" />
                                <p id="parrafo"><?php echo $row['userName'];?> </p>
                            </div>

                            <div class="contact_image">

                                <div class="img_pro">
                                        <img src="../../images/userProfile/<?php echo $row['userProfileImage']; ?>"/>
                                </div>

                            </div>

                        </div>
                      <?php } else { ?>
                      <div class="contactProfile chat_user color-chat">
                            <div class="contact_left">

                                <img src="../../images/green_icon.png" alt="" />
                                <p id="parrafo"><?php echo $row['userName'];?> </p>
                            </div>

                            <div class="contact_image">

                                <div class="img_pro">
                                    <img src="../../images/userProfile/<?php echo $row['userProfileImage']; ?>"/>
                                </div>

                            </div>

                        </div>
                      <?php } ?>
                    </a>
                  <?php } ?>
                </div>
                <script type="text/javascript">
                $('.chats_inbox').click(function () {
                    var data = $(this).attr('data-id-chat');
                    var namefunction = "changeStatusMessage";
                    $.ajax({
                      url: "../../php/functions.php",
                      type: "POST",
                      data: {data: data, namefunction: namefunction},
                      success: function (result) {

                      },
                      error: function (error) {
                          alert(error);
                      }
                    })
                  });
                </script>
                <!--box bottom right -->

                <!-- box bottom right -->

                <div id="inbox_content">
                    <div class="msn_content">
    <?php
    if (isset($_GET['idChat'])) {
      $idChat = $_GET['idChat'];

      $query1 = "SELECT * FROM message
                INNER JOIN user ON message.user_idUser = user.idUser
                INNER JOIN chat ON message.chat_idChat = chat.idChat
                WHERE message.chat_idChat = '".$idChat."' ORDER BY message.messageDate";
      $resultado1 = mysql_query($query1) or die (mysql_error());

      while ($row1 = mysql_fetch_array($resultado1)) {

        if ($row1['idUser'] == $_SESSION['idUser'] ) {
          ?>

                        <!-- message send -->
                        <div id="itemContainer">

                            <div id="itemContainerInner">

                                <div class="item i1 sent_">
                                    <a href="perfil.php?idUser=<?php echo $line['idUser']?>">
                                        <img src="../../images/userProfile/<?php echo $line['userProfileImage']; ?>"/>
                                    </a>
                                </div>

                                <div class="item i2 sent_">
                                    <p><?php echo $line['userName'];?></p>
                                </div>

                                <div class="item i3 sent_">
                                    <p>
                                      <?php echo $row1['messageText'];?>
                                    </p>

                                </div>


                            </div>
        <?php
        $fecha = $row1['messageDate'];
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

                            <div class="date_sent">
                                <h2>
        <?php echo 'Enviado: '.$nameDia[0].' '.$dia[0].' de '.$nameMes[0].' '.$fechafinal[0];?>
                                </h2>
                            </div>
                        </div>
        <?php } else {  ?>
                        <!-- message recibed -->
                        <div id="itemContainer">
                            <div id="itemContainerInner">

                                <div class="item i1">
                                    <a href="perfil.php?idUser=<?php echo $row1['idUser']?>">
                                        <img src="../../images/userProfile/<?php echo $row1['userProfileImage']; ?>"/>
                                    </a>
                                </div>

                                <div class="item i2">
                                    <p><?php echo $row1['userName'];?></p>
                                </div>

                                <div class="item i3">
                                    <p>
            <?php echo $row1['messageText'];?>
                                    </p>

                                </div>


                            </div>
          <?php
          $fecha = $row1['messageDate'];
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

                            <div class="date_sent" style="text-align: left;">
                                <h2>
          <?php echo 'Recibido: '.$nameDia[0].' '.$dia[0].' de '.$nameMes[0].' '.$fechafinal[0];?>
                                </h2>
                            </div>
                        </div>
        <?php } ?>
    <?php
    }
  } else { ?>

                        <!-- message send -->
                        <div id="itemContainer">
                            <div id="itemContainerInner">

                                <div class="item i1 sent_">

                                </div>

                                <div class="item i2">
                                    <p>BANDEJA DE ENTRADA</p>
                                </div>

                                <div class="item i3 sent_">
                                    <p>

                                    </p>

                                </div>


                            </div>
                            <div class="date_sent">
                                <h2></h2>
                            </div>
                        </div>

    <?php } ?>

                    </div>
                </div>
                <!--box foot right -->
                <div class="send_a_message">

                    <form id="SendRequestChat">
                        <input type="text" name="idEmisor" hidden value="<?php echo $_SESSION['idUser'];?>">
                        <input type="text" name="idReceptor" hidden value="<?php echo $_GET['idUser'];?>">
                        <input type="text" required name="message" placeholder="Escribe una respuesta..." autocomplete="off">
                        <input type="submit" class="send_button" value="ENVIAR" style="background-color:#808080;">
                    </form>

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

                    <span class="right_about">
                          <a href="video_esp.html" target="_blank" style="color:white">Nosotros</a> - <a href="term.pdf" target="_blank" style="color:white">Política de Privacidad</a> - <a href="faqs.pdf" target="_blank" style="color:white">FAQS</a>
                        </span>

                    <span class="right_about">© <?= date('Y') ?> The Beer Fans. Todos los derechos reservados.</span>
                </div>
            </div>

        </div>
        <script src="../../js/services.js"></script>
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
