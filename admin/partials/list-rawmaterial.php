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
			<th>Type</th>
  		<th>General</th>
			<th>Description</th>
			<th>Address</th>
			<th>Zip</th>
      <th>Phone</th>
      <th>Email</th>
			<th>Site</th>
			<th>Facebook</th>
			<th>Twitter</th>
			<th>Instagram</th>
  		<th>Options</th>
  	</tr>
  </thead>
  <tbody class="chargedElements">
  		<?php
  			functionPrintRawMaterialList();
  		?>
  </tbody>
  </table>
</div>
