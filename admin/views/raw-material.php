<?php
	include("../php/connect_bd.php");
	connect_base_de_datos();
?>

<div class="row" ng-controller="rawMaterialListController" ng-show="show" >
	<div class="col-md-1">
	</div>
	<div class="col-md-10">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{{dataRawMaterial[0].rawMaterialName | uppercase }}</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:itemBeer === 1 }"><a ng-click="selectItemBeer(1)">Profile and Cover</a></li>
					<li style="cursor: pointer;" role="presentation" ng-class="{ active:itemBeer === 2 }"><a ng-click="selectItemBeer(2)">Map and Description HTML</a></li>
					<li style="cursor: pointer;" role="presentation" ng-class="{ active:itemBeer === 3 }"><a ng-click="selectItemBeer(3)">Edit</a></li>
				  <li style="cursor: pointer;" role="presentation"><a href="./#/rawmaterials">Back</a></li>
				</ul>

				<div ng-show="itemBeer === 1" class="cont-nav">
					<images-raw-material></images-raw-material>
				</div>

				<div ng-show="itemBeer === 2" class="cont-nav">
					<map-html-raw-material></map-html-raw-material>
				</div>

				<div ng-show="itemBeer === 3" class="cont-nav">
					<form-raw-material-edit></form-raw-material-edit>
				</div>

			</div>
		</div>

	</div>
	<div class="col-md-1">
	</div>
</div>

<div ng-show="!show">
</div>
