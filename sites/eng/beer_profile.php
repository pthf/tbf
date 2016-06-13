<?php
session_start();
include('../../admin/php/connect_bd.php');
connect_base_de_datos();

if(isset($_GET['id'])){
    $queryBeer = "SELECT * FROM beer
    INNER JOIN producer ON beer.idProducer = producer.idProducer
    INNER JOIN beertype ON beer.idbeertype = beertype.idbeertype
    INNER JOIN countries ON producer.country_id = countries.id
    INNER JOIN states ON producer.state_id = states.id
    WHERE beer.idBeer = ".$_GET['id'];
    $resultBeer = mysql_query($queryBeer) or die(mysql_error());
    $lineBeer = mysql_fetch_array($resultBeer);
    if(!mysql_num_rows($resultBeer)>0)
      header('Location: home.php');
}else{
  header('Location: home.php');
}

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
<html lang="en" xml:lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Beer | The Beer Fans | Social Network</title>

        <link rel="shortcut icon"  type="image/png" href="../../images/favicon.png">
        <link rel="stylesheet" type="text/css" href="../../styles/styles.css">
        <link rel="stylesheet" type="text/css" href="../../styles/styles_responsive.css">
        <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

        <script type="text/javascript" src="../../js/all_pages_jquery.js"></script>
        <script type="text/javascript" src="../../js/image_click.js"></script>
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
          setTimeout(function(){
               $( '.slides .overflow .inner' ).css( "transition", "all 0.5s linear 0s" );
          }, 1000);
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
            	var id = <?php echo $_GET['id'];?>;
                var option = $('select[id=type-search]').val();
                location.href = "beer_profile.php?id="+id+"&option="+option;
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
                        <span class="login-title-text">LOG IN</span>
                    </div>

                    <form action="">
                        <div class="input-boxes">
                            <input type="text" name="emailLogin" placeholder="EMAIL:" id="password" class="input-login">
                            <br><br>
                            <input type="password" name="passwordLogin" placeholder="PASSWORD:" id="password" class="input-login">
                            <br>
                        </div>

                        <div class="send-login-content">
                            <br>
                            <div class="not-user">DONT YOU HAVE A ACCOUNT YET? <span class="underline">SIGN UP.</span></div>
                            <div class="forgot-password"><span class="underline">DID YOU FORGET YOUR PASSWORD? </span> </div>
                            <br><br>
                            <button type="button" name="button" id="send-login" class="sendLoginUser">SEND</button>
                        </div>

                        <div class="not-user notEmail" style="display:none;">EMAIL NOT FOUND.</span></div>
                        <div class="not-user notPass"  style="display:none;">WRONG PASSWORD.</span></div>
                        <div class="not-user blockcount"  style="display:none;">YOU ACCOUNT HAS BEEN LOG.</span></div>
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
                    <span class="login-title-text">SIGN UP</span>
                </div>

                <div class="signup-modal-content">

                    <form class="formNewUser" id="formNewUser">

                        <input required type="text" name="userName" placeholder="NAME:" class="signup-form">
                        <input required type="text" name="lastname" placeholder="LAST NAME:" class="signup-form">


                        <div class="date-input">
                            <span class="title-date">Birthday</span>

                            <div class="date-input-wrapper">

                              <select required id="birthday_year" name="birthday_year" class="birthday year" >
                                  <option value="">Year &#x25BE;</option>
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
                                  <option value="">Month &#x25BE;</option>
                                  <option value="1">January</option>
                                  <option value="2">February</option>
                                  <option value="3">March</option>
                                  <option value="4">April</option>
                                  <option value="5">May</option>
                                  <option value="6">June</option>
                                  <option value="7">July</option>
                                  <option value="8">August</option>
                                  <option value="9">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>
                              </select>

                              <select required id="birthday_day" name="birthday_day" class="birthday day" >
                                  <option value="">Day &#x25BE;</option>
                              </select>
                            </div>

                        </div>

                        <select required name="country" class="signup-form select-Country" id="selectCountry">
                            <option selected disabled value="">Select country &#x25BE;</option>
                            <?php
                            $query = "SELECT * FROM countries ORDER BY name_c ASC";
                            $result = mysql_query($query) or die(mysql_error());
                            while ($line = mysql_fetch_array($result)) {
                                echo '<option value="' . $line["id"] . '" name="' . $line["id"] . '">' . $line["name_c"] . '</option>';
                            }
                            ?>
                        </select>

                        <select required name="state" class="signup-form select-Country" id="selectState">
                            <option disabled selected value="">Select state &#x25BE;</option>
                        </select>

                        <input required type="email" name="email" placeholder="EMAIL:" class="signup-form">

                        <input required type="email" name="confirmEmail" placeholder="RE-ENTER EMAIL:" class="signup-form">

                        <input required type="password" name="password" placeholder="PASSWORD:" class="signup-form">

                        <input required type="password" name="confirmPassword" placeholder="RE-ENTER PASSWORD:" class="signup-form">

                        <span style="display:none;" id="mail" class="mailMsgNotSame">Emails do not match.</span>
                        <span style="display:none;" id="passMsg">Passwords do not match.</span>
                        <span style="display:none;" id="mailExist">Email is already registered.</span>


												<div class="send-login-content sign-up-send">
														<br>
														<span class="not-user"><label for="privacyTerms">I AGREE <a href="term.pdf" target="_blank"><u>TO THE TERMS</u></a>.</label></span>
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
                  <span class="login-title-text">RECOVERY PASSWORD</span>
              </div>

              <div class="password-modal-content">
                <input required type="email" name="email" placeholder="EMAIL:" class="password-form">

                <button type="submit" name="button" id="send-login" class="sendRecoveryMail">SEND</button>

                <br><br>
                <span class="msgacceptedpassword" style="display:none" id="mail">Check you email to verify your password. </span>
                <br>
                <span class="mailnotvalid" style="color:red; display:none" id="passMsg">EMAIL NOT FOUND.</span>
              </div>
            </div>


				<div id="menu_options">

            <div class="close_menu">
                <img src="../../images/close_image-01.png">
            </div>

            <div class="menu_list">
                <?php if (isset($_SESSION['idUser'])) { ?>
                    <ul>
                        <a href="home.php"><li><span>HOME</span></li></a>
                        <a href="beers.php"><li><span>BEERS</span></li></a>
                        <a href="producers.php"><li><span>PRODUCERS</span></li></a>
                        <a href="raw.php"><li><span>RAW</span></li></a>
                        <a href="profile.php?idUser=<?= $line['idUser'] ?>"><li><span>MY PROFILE</span></li></a>
                        <a href="../esp/perfil_beer.php?id=<?= $_GET['id'] ?>" class="changeLanguage"><li><span>ESPAÑOL</span></li></a>
                        <a href="settings.php"><li><span>SETTINGS</span></li></a>
                        <a href="#" class="logOut" name="<?= $line['idUser'] ?>"><li class="no_border"><span>LOG OUT</span></li></a>
                    </ul>
                <?php } else { ?>
                    <ul>
                        <a href="home.php"><li><span>HOME</span></li></a>
                        <a href="beers.php"><li><span>BEERS</span></li></a>
                        <a href="producers.php"><li><span>PRODUCERS</span></li></a>
                        <a href="raw.php"><li><span>RAW</span></li></a>
                        <a href="../esp/perfil_beer.php?id=<?= $_GET['id'] ?>" class="changeLanguage"><li><span>ESPAÑOL</span></li></a>
                        <a href="#" class="user_name_click"><li><span>LOG IN</span></li></a>
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

        <div id="contenedor" id-beer-element="<?=$_GET['id']?>" >

            <div class="popup_img">
                <img class="profile_popup" src="../../images/beerProfiles/<?= $lineBeer['beerProfileImage'] ?>" />
                <a href=""><img class="close-pop" src="../../images/close_image-01.png" alt=""></a>
            </div>

            <div class="top_info">
                <div class="contenedo_info">
                    <a href="home.php">
                        <div class="logo_tbf">
                            <img src="../../images/menu_options-01.png" alt="The Beer Fans Logo" title="The Beer Fans Logo">
                        </div>
                    </a>

                    <div class="perfil_tbf">

                        <div class="search-filter">
                          <select class="filter-opt" id="type-search">
                            <?php if ($_GET['option'] == 1 ) { ?>
                            <option value="0" name="0" disabled> Search type </option>
                            <option selected value="1">Users</option>
                            <option value="2">Beers</option>
                            <option value="3">Producers</option>
                            <option value="4">Raw</option>
                            <?php } else if ($_GET['option'] == 2 ) { ?>
                            <option value="0" name="0" disabled> Search type </option>
                            <option value="1"> Users </option>
                            <option selected value="2">Beers</option>
                            <option value="3">Producers</option>
                            <option value="4">Raw</option>
                            <?php } else if ($_GET['option'] == 3 ) { ?>
                            <option value="0" name="0" disabled> Search type </option>
                            <option value="1"> Users </option>
                            <option value="2">Beers</option>
                            <option selected value="3">Producers</option>
                            <option value="4">Raw</option>
                            <?php } else if ($_GET['option'] == 4 ) { ?>
                            <option value="0" name="0" disabled> Search type </option>
                            <option value="1"> Users </option>
                            <option value="2">Beers</option>
                            <option value="3">Producers</option>
                            <option selected value="4">Raw</option>
                            <?php } else if ((!$_GET) || ($_GET['option'] == 0) || ($_GET['option'] > 4)) { ?>
                            <option selected value="0" name="0" disabled> Search type </option>
                            <option value="1"> Users </option>
                            <option value="2">Beers</option>
                            <option value="3">Producers</option>
                            <option value="4">Raw</option>
                            <?php } ?>
                          </select>
                          <ul class="callouts">
                            <li class="callouts--top">Select filter</li>
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
                                    <a href="messages.php?idUser=<?= $line['idUser'] ?>">
                                        <img src="../../images/menu_options-03.png" alt="icon message" title="icon message">
                                        <?php
                                        if (mysql_num_rows($resultadoconsulta) > 0) {
                                            echo '<span class="number">' . mysql_num_rows($resultadoconsulta) . '</span>';
                                        }
                                        ?>
                                    </a>
                                </div>


                                <div class="profile_img">
                                    <a href="profile.php?idUser=<?= $line['idUser'] ?>">
                                        <img src="../../images/userProfile/<?= $line['userProfileImage'] ?>" alt="profile image" title="profile image">
                                    </a>
                                </div>
                            <?php } ?>

                            <?php
                            if (isset($_SESSION['idUser'])) {

                                echo '<div class="user_name">
                                        <a href="profile.php?idUser=' . $line['idUser'] . '" style="color: #FFF;">
                  											<span>' . $line["userName"] . '</span>
                                        </a>
                  										</div>
                                      ';
                            } else {
                                echo '
                  										<div class="user_name">
                  											<a href="#"><span>LOG IN</span></a>
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
                    <p><a href="producer_profile.php?id=<?= strtoupper($lineBeer['idProducer'])?>" style="text-decoration: underline;"><?= strtoupper($lineBeer['producerName'])?></a><br><?= strtoupper($lineBeer['beerName']) ?></p>
                </div>

                <div class="city_profile" style="width: 70%;">
                    <p><?= strtoupper($lineBeer['beerTypeName']) ?></p><br><br>
                    <p><?=$lineBeer['city']?>, <?= $lineBeer['name_s']?>, <?=$lineBeer['name_c']?>.</p>
                </div>
                <br>
                <div class="desc_profile">
                    <h2 style="font-size: 1.5em;">Description</h2><br>
                    <p><?=$lineBeer['beerDescription']?></p><br><br>
                    <h2 style="font-size: 1.5em;">General Characteristics</h2><br>
                    <span>Country: </span> <span><?=$lineBeer['name_c']?></span> <br>
                    <span>State: </span> <span><?=$lineBeer['name_s']?></span> <br>
                    <span>City: </span> <span><?=$lineBeer['city']?></span> <br>
                    <span>Style: </span> <span> <?= $lineBeer['beerTypeName'] ?> </span> <br>
                    <span>Alcoholic strength:</span> <span> <?= $lineBeer['beerStrength'] ?></span> <br>
                    <span>IBUS:</span> <span><?= $lineBeer['beerIBUS'] ?></span> <br>

                </div>


                <div class="social_company">
                    <?php if(strlen($lineBeer['beerSite'])>0){?>
                    <a target="_blank" href="<?= $lineBeer['beerSite'] ?>" class="first_contact fb"><img src="../../images/web-icon.png"/></a>
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
                    <a href="beers.php">
                        <img src="../../images/flecha-izq_negro.png" />
                        <p class="back_text">GO TO BEERS</p>
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
                            <!-- <div class="prev"> <img src="../../images/flecha-izq.png"> </div>
                            <div class="next"> <img src="../../images/flecha-der.png"> </div> -->

                            <ul class="beers_month">
                              <?php
                                $q = "SELECT * FROM bannerbeerslider INNER JOIN beer ON bannerbeerslider.idSlider = beer.idSlider WHERE beer.idBeer = ".$_GET['id'];
                                $r = mysql_query($q) or die(mysql_error());
                                $c = 0;
                                while($l = mysql_fetch_array($r)){
                                  $c++;
                                  echo '
                                    <li class="news-slider" data-n="'.$c.'">
                                        <img src="../../images/beerBanners/'.$l['bannerImage'].'" alt="tbf tarro" title="tbf tarro">
                                    </li>
                                  ';
                                }
                              ?>
                            </ul>
                            <ul class="nav_beers cantidadElements popup_beers">
                              <?php
                                $q = "SELECT * FROM bannerbeerslider INNER JOIN beer ON bannerbeerslider.idSlider = beer.idSlider WHERE beer.idBeer = ".$_GET['id'];
                                $r = mysql_query($q) or die(mysql_error());
                                $c = 0;
                                while($l = mysql_fetch_array($r)){
                                  $c++;
                                  echo '
                                    <li data-cd="'.$c.'"></li>
                                  ';
                                }
                              ?>
                            </ul>
                        </div>
                    </div>
                </div>


                <div id="rank_beer">
                    <p class="ranktitle">RANKING</p>

                    <h1 class="ranklevel"></h1>
                    <div class='rating-stars text-center'>
                      <ul id='stars' class="stars-profile-view appendGold">

                      </ul>
                    </div>
                    <?php

                    if(isset($_SESSION['idUser'])){
                      $query = "SELECT idRanksList FROM user WHERE idUser = ".$_SESSION['idUser'];
                  		$result = mysql_query($query) or die(mysql_error());
                  		$line = mysql_fetch_array($result);
                  		$idRanksList = $line['idRanksList'];

                  		$query = "SELECT * FROM rankslistelement WHERE idBeer = ".$_GET['id']." AND idRanksList = $idRanksList";
                  		$result = mysql_query($query) or die(mysql_error());
                  		if(mysql_num_rows($result)>0){
                          echo '<span class="deleteRank" data-beer="'.$_GET['id'].'" data-list="'.$idRanksList.'" style="display:block; cursor:pointer; margin-top: 10px;">ELIMINAR RANK</span><br><br>';
                  		}else{
                        echo "
                          <div class='rating-stars text-center' style='margin-top:15px;'>
                            <ul id='stars' class='stars-profile-view changeRank' data-user = '".$_SESSION['idUser']."'>
                              <li class='star star-data' data-value='1'>
                                <i class='fa fa-star fa-fw profile-fa'></i>
                              </li>
                              <li class='star star-data' data-value='2'>
                                <i class='fa fa-star fa-fw profile-fa'></i>
                              </li>
                              <li class='star star-data' data-value='3'>
                                <i class='fa fa-star fa-fw profile-fa'></i>
                              </li>
                              <li class='star star-data' data-value='4'>
                                <i class='fa fa-star fa-fw profile-fa'></i>
                              </li>
                              <li class='star star-data' data-value='5'>
                                <i class='fa fa-star fa-fw profile-fa'></i>
                              </li>
                            </ul>
                          </div>
                        ";
                  		}
                    }else{
                      echo "
                        <div class='rating-stars text-center' style='margin-top:15px;'>
                          <a href='#'>
                            <ul id='stars' class='stars-profile-view logintoadd'>
                              <li class='star star-data' data-value='1'>
                                <i class='fa fa-star fa-fw profile-fa'></i>
                              </li>
                              <li class='star star-data' data-value='2'>
                                <i class='fa fa-star fa-fw profile-fa'></i>
                              </li>
                              <li class='star star-data' data-value='3'>
                                <i class='fa fa-star fa-fw profile-fa'></i>
                              </li>
                              <li class='star star-data' data-value='4'>
                                <i class='fa fa-star fa-fw profile-fa'></i>
                              </li>
                              <li class='star star-data' data-value='5'>
                                <i class='fa fa-star fa-fw profile-fa'></i>
                              </li>
                            </ul>
                          </a>
                        </div>
                      ";
                    }
                    ?>

                    <div class="fav_box">
                        <a class="user_icons add_favorites" href="#"> <?php
                            if(isset($_SESSION['idUser'])){
                              $q = "SELECT idFavoritesList FROM user WHERE idUser = ".$_SESSION['idUser'];
                              $r = mysql_query($q) or die(mysql_error());
                              $l = mysql_fetch_array($r);
                              $listaUser = $l['idFavoritesList'];

                              $q = "SELECT idFavoriteElement FROM favoriteelement WHERE $listaUser = idFavoritesList AND ".$_GET['id']." = idBeer";
                              $r = mysql_query($q) or die(mysql_error());

                              if(mysql_num_rows($r)>0){?>
                                <img class="fav_button fav-selected" id="fav_button" src="../../images/fav1.svg">
                                <p class="add_fav loginacepfavorites elim-opt" data-function="deleteFavorites" data-user="<?=$_SESSION['idUser']?>" data-beer="<?= $lineBeer['idBeer'] ?>">DELETE FAVORITS</p> <?php
                              }else{ ?>
                                  <img class="fav_button fav-unselected" id="fav_button" src="../../images/fav1.svg">
                                  <p class="add_fav loginacepfavorites fav-opt " data-function="addFavorites" data-user="<?=$_SESSION['idUser']?>" data-beer="<?= $lineBeer['idBeer'] ?>">ADD FAVORITS</p><?php
                              }
                            }else{ ?>
                              <img class="fav_button fav-unselected" id="fav_button" src="../../images/fav1.svg">
                              <p class="add_fav logintoadd">ADD FAVORITS</p> <?php
                            } ?>
                        </a>
                    </div>

                    <script>

                      $('.deleteRank').click(function(){
                        var idBeer = $(this).attr('data-beer');
                        var idList = $(this).attr('data-list');
                        var namefunction = "deleteRank";
                        $.ajax({
                            beforeSend: function () {
                            },
                            url: "../../admin/php/functions.php",
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
                        var idBeer = $('#contenedor').attr('id-beer-element');
                        var idUser = $(this).parent().attr('data-user');
                        $.ajax({
                            beforeSend: function () {
                            },
                            url: "../../admin/php/functions.php",
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

                      var namefunction = "prinnfRank";
                      var idBeer = $('#contenedor').attr('id-beer-element');
                      $.ajax({
                          beforeSend: function () {
                          },
                          url: "../../admin/php/functions.php",
                          type: "POST",
                          data: {
                              namefunction : namefunction,
                              idBeer : idBeer
                          },
                          success: function (result) {
                            $('.ranklevel').html(result);
                            var stars = "";
                            for(var i = 1; i<=5; i++){
                        		  if(result>= i)
                        		      stars = stars + "<li class='star star-small-profile' data-value='"+i+"'><i class='fa fa-star fa-fw star-small gold-star'></i></li>";
                        		}
                            $('.appendGold').html(stars);
                          },
                          error: function (error) {
                          },
                          complete: function () {
                          },
                          timeout: 10000
                      });
                    </script>

                    <div class="wishlist_box">
                        <a class="user_icons" href="#">
                            <img class="wishlist_icon" src="../../images/wishlist.svg"><?php
                            if(isset($_SESSION['idUser'])){
                              $q = "SELECT idWishList FROM user WHERE idUser = ".$_SESSION['idUser'];
                              $r = mysql_query($q) or die(mysql_error());
                              $l = mysql_fetch_array($r);
                              $listaUser = $l['idWishList'];

                              $q = "SELECT idWishListElement FROM wishlistelement WHERE $listaUser = idWishList AND ".$_GET['id']." = idBeer";
                              $r = mysql_query($q) or die(mysql_error());

                              if(mysql_num_rows($r)>0){?>
                                <p class="add_fav loginacepwishlist" data-function="deleteWishList" data-user="<?=$_SESSION['idUser']?>" data-beer="<?= $lineBeer['idBeer'] ?>">DELETE WISHLIST</p> <?php
                              }else{ ?>
                                  <p class="add_fav loginacepwishlist" data-function="addWishList" data-user="<?=$_SESSION['idUser']?>" data-beer="<?= $lineBeer['idBeer'] ?>">ADD WISHLIST</p><?php
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
                <span class="toptext_slider comments_title">COMMENTS</span>
                <div id="comments_box">
                    <div class="msn_content">
                    	<?php
                        $query2 = "SELECT * FROM postelement po
                									INNER JOIN beer be ON be.idPublicMessagesList = po.idPublicMessagesList
                									INNER JOIN user us ON us.idUser = po.idUser
                                  WHERE us.userStatus != 0
                									AND po.idPublicMessagesList = ".$lineBeer['idPublicMessagesList'];


                        $resultado2 = mysql_query($query2) or die(mysql_error());
                        while ($rows2 = mysql_fetch_array($resultado2)) {
                        ?>
                        <!-- message received -->
                        <div id="itemContainer">


                            <?php
                              if(isset($_SESSION['idUser'])){
                              if($_SESSION['idUser'] == 1){
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
                            <div id="itemContainerInner">

                                <div class="item i1">
                                  <a href="profile.php?idUser=<?php echo $rows2['idUser'];?>">
                                    <img src="../../images/userProfile/<?php echo $rows2['userProfileImage']?>"/>
                                  </a>
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
								    case 0: $nameDia[] = "Sunday";
							    	break;
							    	case 1: $nameDia[] = "Monday";
							    	break;
							    	case 2: $nameDia[] = "Tuesday";
							    	break;
							    	case 3: $nameDia[] = "Wednesday";
							    	break;
							    	case 4: $nameDia[] = "Thursday";
							    	break;
							    	case 5: $nameDia[] = 'Friday';
							    	break;
							    	case 6: $nameDia[] = 'Saturday';
							    	break;
								}

								switch (date('n', $fechats)){
								    case 1: $nameMes[] = "January";
							    	break;
							    	case 2: $nameMes[] = "February";
							    	break;
							    	case 3: $nameMes[] = "March";
							    	break;
							    	case 4: $nameMes[] = "April";
							    	break;
							    	case 5: $nameMes[] = 'May';
							    	break;
							    	case 6: $nameMes[] = "June";
							    	break;
							    	case 7: $nameMes[] = "July";
							    	break;
							    	case 8: $nameMes[] = "August";
							    	break;
							    	case 9: $nameMes[] = "September";
							    	break;
							    	case 10: $nameMes[] = "October";
							    	break;
							    	case 11: $nameMes[] = "November";
							    	break;
							    	case 12: $nameMes[] = "December";
							    	break;
								}
						    ?>
                            <h2>
                            	<?php echo $nameDia[0].' '.$dia[0].' of '.$nameMes[0].', '.$fechafinal[0];?>
                            </h2>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <!--box foot right -->

                <?php if (isset($_SESSION['idUser'])) { ?>
                    <div class="send_a_message comments_text">
                    	<form id="SendCommentBeer">
                    		<input type="text" name="idBeer" hidden value="<?php echo $_GET['id']?>">
                    		<input type="text" name="idSession" hidden value="<?php echo $_SESSION['idUser']?>">
	                        <textarea required name="message" rows="8" cols="40" placeholder="Write a comment..."></textarea>
	                        <style media="screen">
		                        ::-webkit-input-placeholder{
		                          padding: 1.5% 0 0 1.5%;
		                        }
		                    </style>
	                        <input type="submit" class="send_button comments_send" value="SEND" style="background-color:#808080;">
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
                                                <a href="home.php"><li><span>HOME</span></li></a>
                                                <a href="beers.php"><li><span>BEERS</span></li></a>
                                                <a href="producers.php"><li><span>PRODUCERS</span></li></a>
                                                <a href="raw.php"><li><span>RAW</span></li></a>
                                                <a href="profile.php?idUser=<?= $line['idUser'] ?>"><li><span>MY PROFILE</span></li></a>
                                                <a href="settings.php"><li><span>SETTINGS</span></li></a>
                                                <a href="contact_eng.php"><li><span>CONTACT</span></li></a>
                                            </ul>
                    <?php } else { ?>
                                            <ul class="nav">
                                                <a href="home.php"><li><span>HOME</span></li></a>
                                                <a href="beers.php"><li><span>BEERS</span></li></a>
                                                <a href="producers.php"><li><span>PRODUCERS</span></li></a>
                                                <a href="raw.php"><li><span>RAW</span></li></a>
                                                <a href="#" class="user_name_click"><li><span>LOG IN</span></li></a>
                                                <a href="contact_eng.php"><li><span>CONTACT</span></li></a>
                                            </ul>
                    <?php } ?>

                    <span class="right_about">
                        <a href="video_eng.html" target="_blank" style="color:white">Us</a> - <a href="term.pdf" target="_blank" style="color:white">Privacy Policy</a> - <a href="faqs.pdf" target="_blank" style="color:white">FAQS</a>
                      </span>

                    <span class="right_about">© <?= date('Y') ?> The Beer Fans. All rights reserved.</span>
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
            $( "p.add_fav.loginacepfavorites.fav-opt" )
              .mouseenter(function() {
                $( '#fav_button' ).removeClass('fav-unselected');
                $( '#fav_button' ).addClass('fav-selected');
              })
              .mouseleave(function() {
                $( '#fav_button' ).removeClass('fav-unselected');
                $( '#fav_button' ).addClass('fav-unselected');
              });
          </script>

          <script type="text/javascript">
            $( "p.add_fav.loginacepfavorites.elim-opt" )
              .mouseenter(function() {
                $( '#fav_button' ).removeClass('fav-selected');
                $( '#fav_button' ).addClass('fav-unselected');
              })
              .mouseleave(function() {
                $( '#fav_button' ).removeClass('fav-unselected');
                $( '#fav_button' ).addClass('fav-selected');

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
          <script type="text/javascript" src="../../js/slider.js"></script>
        </div>
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
