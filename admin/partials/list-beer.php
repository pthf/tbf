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
			<th>Language</th>
  		<th>Name</th>
  		<th>Producer</th>
      <th>Country</th>
      <th>State</th>
  		<th>Type</th>
  		<th>Description</th>
  		<th>Strength</th>
  		<th>IBUS</th>
  		<th>Site</th>
  		<th>Facebook</th>
  		<th>Twitter</th>
  		<th>Instagram</th>
  		<th>Options</th>
  	</tr>
  </thead>
  <tbody class="chargedElements">
  		<?php
  			functionPrintBeerList();
  		?>
  </tbody>
  </table>
</div>
