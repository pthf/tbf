<?php
	include("../php/connect_bd.php");
	connect_base_de_datos();
?>

<div class="row" style="margin-top: 2vw">
	<div class="col-md-12">
		<form class="form-horizontal" id="formBeer" name="formBeerData" enctype="multipart/form-data">
			<div class="col-md-5">

				<label>Write a message to send all beer fans' users! </label><br><br>
				<div class="form-group">
					<label for="message" class="col-sm-4 control-label">Message *</label>
					<div class="col-sm-8">
						<textarea required type="text" class="form-control" id="message" name="message" style="height: 140px;"></textarea>
					</div>
				</div>
				<div style="text-align:right;">
					<button type="button" class="btn btn-danger" onclick="location.reload();">Cancel</button>
					<button type="button" class="btn btn-primary" id="buttonSave" name="{{usertoseend}}">Send</button>
				</div>
				<div class="alert alert-success msg-newbeer" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
					<strong>Done!</strong> Message was sent to all users.
				</div>
			</div>
		</form>
	</div>

</div>


<?php
	close_database();
?>
