<?php
	include("../php/connect_bd.php");
	include("../php/functions.php");
	connect_base_de_datos();
?>

<div class="table-responsive ">
  <table class="table table-bordered">
  <thead>
  	<tr>
  		<th>#</th>
  		<th>Name</th>
  		<th>Last Name</th>
      <th>E-mail</th>
      <th>Last Connection</th>
  		<th>Admin Type</th>
			<th>Options</th>
  	</tr>
  </thead>
  <tbody class="chargedElements" ng-controller="adminPass">
  		<?php
  			functionPrintUserAdminList();
  		?>
  </tbody>
  </table>
</div>
