<?php
	include("../php/connect_bd.php");
	connect_base_de_datos();

	// session_start();
	// $query = "SELECT userPrivileges FROM adminuser WHERE idAdmin = ".$_SESSION['idAdmin'];
  // $result = mysql_query($query) or die(mysql_error());
  // $line = mysql_fetch_array($result);
	// $userPrivileges = $line['userPrivileges'];
	// if($userPrivileges == 1 || userPrivileges == 2 ){
	//
	// }else{
	//
	// }

?>

<div class="row" ng-controller="beerListController" ng-show="show" >
	<div class="col-md-1">
	</div>
	<div class="col-md-10">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{{dataBeer[0].beerName | uppercase }}</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:itemBeer === 1 }"><a ng-click="selectItemBeer(1)">Profile, Bottle and Cover</a></li>
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:itemBeer === 2 }"><a ng-click="selectItemBeer(2)">Banners</a></li>
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:itemBeer === 3 }"><a ng-click="selectItemBeer(3)">Edit</a></li>
				  <li style="cursor: pointer;" role="presentation"><a href="./#/beers">Back</a></li>
				</ul>

				<div ng-show="itemBeer === 1" class="cont-nav">
					<images-beer></images-beer>
				</div>

				<div ng-show="itemBeer === 2" class="cont-nav">
					<banner-list></banner-list>
				</div>

				<div ng-show="itemBeer === 3" class="cont-nav">
					<form-beer-edit></form-beer-edit>
				</div>

			</div>
		</div>

	</div>
	<div class="col-md-1">

	</div>
</div>

<div ng-show="!show">
</div>
