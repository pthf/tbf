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
				<h3 class="panel-title">Broadcast</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 1 }"><a ng-click="selectItem(1)">Send Messages</a></li>
				</ul>
				<div ng-show="item === 1" class="cont-nav">
					<form-send-messages></form-send-messages>
				</div>
			</div>
		</div>


	</div>
	<div class="col-md-1">

	</div>
</div>
