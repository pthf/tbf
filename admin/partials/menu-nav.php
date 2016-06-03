<?php
  session_start();
  include('../php/connect_bd.php');
  connect_base_de_datos();
  $query = "SELECT * FROM adminuser WHERE idAdmin = ".$_SESSION['idAdmin'];
  $result = mysql_query($query) or die(mysql_error());
  $line = mysql_fetch_array($result);

  // AdminUsers
  // 1... General Todos los elementos de navegacion.
  // 2... Productos Beers, Producers, Raw Materials.
  // 3... Banners Home Slider, News Slider, Post, Slider.
  // 4... Usuarios Users, Broadcast.

?>

<div class="logoNav">
	<img src="./../src/images/logotbf.png">
</div>

<div class="msgWelcome">
	<h5 style="display: inline-block; text-align: left;">Welcome<br><strong style="color: #000;"><?= $line['adminName'] ?></strong>
</div>

<div class="menuNav" ng-controller="menuNavController">
	<div class="row">
		<div class="col-md-12">

      <?php if($line['userPrivileges']=='1'){ ?>
        <ul class="nav nav-pills nav-stacked">
  				<li role="presentation" ng-class="{active:selected===1}" ng-click="changeNav(1)"><a href="#/beers"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Beers</a></li>
  				<li role="presentation" ng-class="{active:selected===2}" ng-click="changeNav(2)"><a href="#/producers"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Producers</a></li>
  				<li role="presentation" ng-class="{active:selected===3}" ng-click="changeNav(3)"><a href="#/rawmaterials"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Raw Materials</a></li>
  				<li role="presentation" ng-class="{active:selected===4}" ng-click="changeNav(4)"><a href="#/homeslider"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Home Slider</a></li>
  				<li role="presentation" ng-class="{active:selected===5}" ng-click="changeNav(5)"><a href="#/newslider"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>News Slider</a></li>
  				<li role="presentation" ng-class="{active:selected===6}" ng-click="changeNav(6)"><a href="#/postslider"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Post Slider</a></li>
  				<li role="presentation" ng-class="{active:selected===7}" ng-click="changeNav(7)"><a href="#/users"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Users</a></li>
          <li role="presentation" ng-class="{active:selected===8}" ng-click="changeNav(8)"><a href="#/broadcast"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Broadcast</a></li>
          <li role="presentation" ng-class="{active:selected===9}" ng-click="changeNav(9)"><a href="#/adminusers"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Admin Users</a></li>
  			</ul>
      <?php } ?>

      <?php if($line['userPrivileges']=='2'){ ?>
        <ul class="nav nav-pills nav-stacked">
  				<li role="presentation" ng-class="{active:selected===1}" ng-click="changeNav(1)"><a href="#/beers"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Beers</a></li>
  				<li role="presentation" ng-class="{active:selected===2}" ng-click="changeNav(2)"><a href="#/producers"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Producers</a></li>
  				<li role="presentation" ng-class="{active:selected===3}" ng-click="changeNav(3)"><a href="#/rawmaterials"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Raw Materials</a></li>
  			</ul>
      <?php } ?>

      <?php if($line['userPrivileges']=='3'){ ?>
        <ul class="nav nav-pills nav-stacked">
  				<li role="presentation" ng-class="{active:selected===4}" ng-click="changeNav(4)"><a href="#/homeslider"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Home Slider</a></li>
  				<li role="presentation" ng-class="{active:selected===5}" ng-click="changeNav(5)"><a href="#/newslider"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>News Slider</a></li>
  				<li role="presentation" ng-class="{active:selected===6}" ng-click="changeNav(6)"><a href="#/postslider"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>Post Slider</a></li>
  			</ul>
      <?php } ?>

      <?php if($line['userPrivileges']=='4'){ ?>
        <ul class="nav nav-pills nav-stacked">
  				<li role="presentation" ng-class="{active:selected===7}" ng-click="changeNav(7)"><a href="#/users"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Users</a></li>
          <li role="presentation" ng-class="{active:selected===8}" ng-click="changeNav(8)"><a href="#/broadcast"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Broadcast</a></li>
  			</ul>
      <?php } ?>

		</div>
	</div>
</div>
