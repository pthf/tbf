<?php
  session_start();
  if(!isset($_SESSION['idAdmin']))
    header("Location: ../index.php");
	else{

	}
?>

<!DOCTYPE html>
<html lang="es" ng-app="tbfPanel">
<head>
	<title>THEBEERFANS |  PANEL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="./../src/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./../css/main.css">
</head>
<body>

	<div class="contenedor">

		<div class="menu-nav">
			<menu-nav></menu-nav>
		</div>
		<div class="panel-cont">
			<top-nav></top-nav>
			<div class="viewPanel" ng-view>

			</div>
		</div>

	</div>



	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="./../js/lib/angular.min.js"></script>
	<script src="./../js/lib/angular-route.min.js"></script>
	<script src="./../js/app.js"></script>
	<script src="./../js/controllers.js"></script>
  <script src="./../js/directives.js"></script>
	<script src="./../js/services.js"></script>
	<script src="./../js/google_api.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="./../js/ng-map.js"></script>

</body>
</html>
