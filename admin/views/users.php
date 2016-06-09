<?php
	include("../php/connect_bd.php");
	connect_base_de_datos();
?>

<div class="row" ng-controller="userController" ng-show="show" >
	<div class="col-md-1">
	</div>
	<div class="col-md-10">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Users</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:itemBeer === 1 }"><a ng-click="selectItemBeer(1)">List</a></li>
					<li id="" style="cursor: pointer;" role="presentation" ng-class="{ active:itemBeer === 2 }"><a href="../php/exportExcel.php" target="_blank" >Export to Excel</a></li>
				</ul>

				<div ng-show="itemBeer === 1" class="cont-nav">
					<list-users></list-users>
				</div>

			</div>
		</div>

	</div>
	<div class="col-md-1">

	</div>
</div>

<div ng-show="!show">
</div>
