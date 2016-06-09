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
	<script type="text/javascript" src="../../js/check.js"> </script>

</head>
<body>

<!-- landing age check -->
		<div class="background_age"></div>
		<div id="select_lag_1_alert" style='display:default'>
			<div class="div_title2_alert"><span class="title2_alert">Por favor ingresa tu fecha de nacimiento</span></div>
			<div class="form_1_alert">
					<form name="edad" action="javascript:mayor_edad(document,document.edad);">
						<input type="tel" inputmode="numeric" pattern="[0-9]*" title="Non-negative integral number" class="t2_alert" placeholder="DD" name="day" maxlength="2">
						<input type="tel" inputmode="numeric" pattern="[0-9]*" title="Non-negative integral number" class="t2_alert" placeholder="MM" name="month" maxlength="2">
						<input type="tel" inputmode="numeric" pattern="[0-9]*" title="Non-negative integral number" class="t4_alert" placeholder="AAAA" name="year" maxlength="4">
						<div class="button_div_alert"><button type="submit" class="button_alert" id="button_alert">INGRESAR</button></div>
						<div class="sub1"><span class="error" id="error" style='display:none'>Eres menor de edad.</span></div>
						<div class="sub2"><span class="error" id="error_1" style='display:none'>Fecha Invalida.</span></div>
					</form>
			</div>
		</div>
</body>

</html>
