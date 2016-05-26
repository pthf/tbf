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
        <?php 
	        $query = "SELECT * FROM user WHERE idUser =".$_SESSION['idUser'];
		    $resultado = mysql_query($query) or die(mysql_error());
		    $row = mysql_fetch_array($resultado);
		    echo "<pre>";
		    print_r($row);
        ?>

        </div>

        <div class="info_config">
        <form id="formUser" name="formUserData" enctype="multipart/form-data">
	        <div class="email_config">
	          <p>NOMBRE: </p> <input required type="text" name="userName" style="width:60%; border: none" value="<?php echo $row['userName'];?>">
	        </div>

	        <div class="edad_config">
	          <p>APELLIDO: </p> <input required type="text" name="userName" style="width:60%; border: none" value="<?php echo $row['userLastName'];?>">
	        </div>

	        <div class="email_config">
	          <p>EMAIL: </p> <input required type="email" name="email"  style="width:60%; border: none" value="<?php echo $row['userEmail'];?>">
	        </div>

	        <div class="vivoen_config">
	          <p>FECHA NAC: </p> 
	          	<select required id="birthday_day" name="birthday_day" class="birthday day" style="width: 18%;">
                	<option value="">Día &#x25BE;</option>
            	</select>
            	<select required id="birthday_month" name="birthday_month" class="birthday month" style="width: 18%;">
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
                <select required id="birthday_year" name="birthday_year" class="birthday year" style="width: 18%;">
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



	        <div class="email_config">
	          <p>PAIS: </p> 
	          	<select required name="country" class="" style="width:82%; border: none" id="selectCountry">
	                <option selected disabled value="">Selecciona..</option>
	                <?php
	                $query = "SELECT * FROM countries ORDER BY name_c ASC";
	                $result = mysql_query($query) or die(mysql_error());
	                while ($line = mysql_fetch_array($result)) {
	                	if ($line['id'] == $row['country_id']) {
	                    	echo '<option selected value="' . $line["id"] . '" name="' . $line["id"] . '">' . $line["name_c"] . '</option>';
	                	} else {
	                		echo '<option value="' . $line["id"] . '" name="' . $line["id"] . '">' . $line["name_c"] . '</option>';
	                	}
	                }
	                ?>
            	</select>
	        </div>

			<div class="pass_config">
				<p>ESTADO: </p> 
				<select required name="state" class="" style="width:70%; border: none" id="selectState">
                    <option disabled selected value="">Selecciona..</option>
                </select>
			</div>

	        <h1 class="top_config" style="margin-top:12%">DESCRIPCION:</h1>

	        <div class="desc_config">

	          <p><textarea required row="" cols="70" style="border: none;" name="userDescription"><?php echo $row['userDescription'];?></textarea></p>
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
	<script type="text/javascript">
        $("#selectCountry").change(function () {
        	var idCountry = <?php echo $row['country_id']?>;
        	alert(idCountry);
            //var idCountry = $("option:selected", this).attr('name');
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

</body>
</html>
