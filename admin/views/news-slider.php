<?php
	include("../php/connect_bd.php");
	connect_base_de_datos();
?>

<div class="row" ng-controller="sliderNewController" ng-show="show" >
	<div class="col-md-1">
	</div>
	<div class="col-md-10">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">News Slider</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:itemBeer === 1 }"><a ng-click="selectItemBeer(1)">Banners</a></li>
				</ul>

				<div ng-show="itemBeer === 1" class="cont-nav">
					<banner-list-news-slider></banner-list-news-slider>
				</div>

			</div>
		</div>

	</div>
	<div class="col-md-1">

	</div>
</div>

<div ng-show="!show">
</div>
