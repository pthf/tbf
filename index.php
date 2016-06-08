<!DOCTYPE html>
<html>
<head>
	<title>Seleccione un Idioma</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/landing.css">
	<link rel="stylesheet" type="text/css" href="styles/landing_responsive.css">
	<link rel="shortcut icon"  type="image/png" href="images/icono.png">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>
		$(document).on('ready', function(){
			$('.spanishSelect').click(function(){
				insetLanguague(1);
			});

			$('.englishSelect').click(function(){
				insetLanguague(0);
			});

			function insetLanguague(language){
				$.ajax({
					beforeSend: function(){},
					url: 'selectLanguage.php',
					type: 'POST',
					data : {
						language : language
					},
					success: function(result){
						if(language==1)
							window.location.href = 'sites/esp/edad.php';
						else
							window.location.href = 'sites/eng/age.php';
					},
					error: function() {
					}
				});
			};

		});
	</script>
</head>
<body>
	<div class="fondo"></div>
	<div class="opacidad_2"></div>
	<div class="idiomas">
		<a href="#" class="spanishSelect"><span class="lag">ESPAÑOL</span></a> <span>/</span>
		<a href="#" class="englishSelect"><span class="lag">ENGLISH</span></a>
		<!-- <a href="sites/esp/edad.php"><span class="lag">ESPAÑOL</span></a> <span>/</span>
		<a href="sites/eng/age.php"><span class="lag">ENGLISH</span></a> -->
	</div>
</body>
</html>
