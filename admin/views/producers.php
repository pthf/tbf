<?php
	include("../php/connect_bd.php");
	connect_base_de_datos();
?>

<div class="row">
	<div class="col-md-1">

	</div>
	<div class="col-md-10">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Producers</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 1 }"><a ng-click="selectItem(1)">List</a></li>
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 2 }"><a ng-click="selectItem(2)">Add New Producer</a></li>
				</ul>
				<div ng-show="item === 1" class="cont-nav">
					<list-producer></list-producer>
				</div>
				<div ng-show="item === 2" class="cont-nav">
					<form-producer></form-producer>
				</div>
			</div>
		</div>


	</div>
	<div class="col-md-1">

	</div>
</div>
