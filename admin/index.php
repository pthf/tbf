<?php
  session_start();
  if(isset($_SESSION['idAdmin']))
    header("Location: panel/index.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>THEBEERFANS | LOGIN PANEL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="./src/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="js/login.js"></script>
</head>
<body>
	<div class="group">
		<div class="container">

			<div class="row" style="width: 100%; height: auto; max-width: 340px; margin: 0 auto;">


				<div class="col-xs-12 " style="text-align: center; margin-bottom: 36px;">


					<div class="panel panel-default" style="box-shadow: -2px 2px 37px -1px rgba(0,0,0,0.75);">
						<div class="panel-heading">
							<h3>TBF PANEL</h3>
							<p>Please sign in to get access.</p>
			  			</div>
			  			<div class="panel-body">
						  	<form class="form-horizontal loginAdmin" style="margin-top: 30px; margin-bottom: 30px">
						  		<div class="form-group">
						  			<div class="col-sm-12">
					      				<input required type="text" class="form-control" id="username" placeholder="Username"></input>
					   	 			</div>
						  		</div>
						  		<div class="form-group">
						  			<div class="col-sm-12">
						  				<input required type="password" class="form-control" id="password" placeholder="Password"></input>
						  			</div>
						  		</div>
						  		<button class="btn btn-default btn-block" type="submit">Sign in</button><br>
									<div class="alert alert-success welcome" role="alert" style="display:none">Welcome</div>
									<div class="alert alert-danger not_pass" role="alert" style="display:none">Password invalid.</div>
									<div class="alert alert-danger not_name" role="alert" style="display:none">User name invalid.</div>
						  	</form>
					  	</div>
					 </div>

				</div>

				<p class="text-center">©2016 The Beer Fans - Website by PTHF</p>

			</div>

		</div>
	</div>


</body>
</html>
