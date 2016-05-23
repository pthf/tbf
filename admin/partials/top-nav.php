<?php
  session_start();
  include('../php/connect_bd.php');
  connect_base_de_datos();
  $query = "SELECT * FROM adminuser WHERE idAdmin = ".$_SESSION['idAdmin'];
  $result = mysql_query($query) or die(mysql_error());
  $line = mysql_fetch_array($result);
?>


<div class="barTop">

	<button id="menuha" type="button" class="btn btn-primary" aria-label="Left Align" style="margin: 20px;">
		<span class="glyphicon glyphicon-menu-hamburger icon-class" aria-hidden="true">
	</button>

  <div class="dropdown" style="margin: 20px;">
    <button class="btn btn-default dropdown-toggle btn-lg" type="button" id="menu1" data-toggle="dropdown"><?= $line['adminName'] ?>
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" class="logout" tabindex="-1" href="#">Log Out</a></li>
      <!-- <li role="presentation" class="divider"></li> -->
    </ul>
  </div>




</div>
