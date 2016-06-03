<?php
	include("../php/connect_bd.php");
	connect_base_de_datos();
?>

<div class="row" style="margin-top: 2vw">
	<div class="col-md-12">
		<form class="form-horizontal" id="formBeer" name="formBeerData" enctype="multipart/form-data">
			<div class="col-md-5">
				<div class="form-group">
					<label for="beer-name" class="col-sm-4 control-label">Language *</label>
					<div class="col-sm-8">
						<select required class="form-control" id="beer-language" name="language">
							<option value="1" name="1">Spanish</option>
							<option value="0" name="0">English</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-name" class="col-sm-4 control-label">Name *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="beer-name" placeholder="Insert beer name" name="name"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-producer" class="col-sm-4 control-label">Producer *</label>
					<div class="col-sm-8">
						<select required class="form-control" id="beer-producer" name="producer">
							<option disabled selected value="">Select a beer producer</option>
							<?php
								$query = "SELECT * FROM producer ORDER BY producerName ASC";
								$result = mysql_query($query) or die(mysql_error());
								while ($line = mysql_fetch_array($result)) {
									echo '<option value="'.$line["idProducer"].'" name="'.$line["idProducer"].'">'.$line["producerName"].'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-type" class="col-sm-4 control-label">Type *</label>
					<div class="col-sm-8">
						<select required class="form-control" id="beer-type" name="beerType">
							<option disabled selected value="">Select a beer type</option>
							<?php
								$query = "SELECT * FROM beertype ORDER BY beerTypeName ASC";
								$result = mysql_query($query) or die(mysql_error());
								while ($line = mysql_fetch_array($result)) {
									echo '<option value="'.$line["idBeerType"].'" name="'.$line["idBeerType"].'">'.$line["beerTypeName"].'</option>';
								}
							?>
						</select>
						<div class="col-sm-12">
							<input ng-click="selectaAddType()" type="button" class="btn btn-default" value="Add a new type" style="margin-top: 5px"></input>
							<input ng-show="addType" type="text" class="form-control textNewType" id="beer-type-new" placeholder="Insert a beer type"  style="margin-top: 5px; margin-bottom: 5px;" ></input>

							<div class="alert alert-success msg-new" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
								 <strong>Done!</strong> A new beer type was added.
							</div>

							<div class="alert alert-warning msg-type" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
								 <strong>Hey!</strong> Type in a beer type.
							</div>

							<div class="alert alert-danger msg-repeat" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
								 <strong>Ups!</strong> The beer type already exist.
							</div>

							<div class="alert alert-danger msg-error" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
								 <strong>Ups!</strong> A error ocurred.
							</div>

							<input ng-show="addType" type="button" class="btn btn-primary addTypeDB" value="Add" style="margin-bottom: 10px;"></input>
						</div>
						<br><br>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-description" class="col-sm-4 control-label">Description *</label>
					<div class="col-sm-8">
						<textarea required type="text" class="form-control" id="beer-description" placeholder="Insert beer description" style="height: 120px" name="description"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-strength" class="col-sm-4 control-label">Strength *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="beer-strength" placeholder="Insert beer strength" name="strength"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-ibus" class="col-sm-4 control-label">IBUS *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="beer-ibus" placeholder="Insert beer IBUS" name="ibus"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-site" class="col-sm-4 control-label">SITE</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="beer-site" placeholder="Insert URL" name="site"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-fb" class="col-sm-4 control-label">Facebook</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="beer-fb" placeholder="Insert URL" name="facebook"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-tw" class="col-sm-4 control-label">Twitter</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="beer-tw" placeholder="Insert URL" name="twitter"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-inst" class="col-sm-4 control-label">Instagram</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="beer-inst" placeholder="Insert URL" name="instagram"></input>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<label for="beer-profile" class="col-sm-12 control-label" style="text-align: left;">Image Profile *</label>
					<div class="col-sm-12">
						<input required type="file" class="form-control" id="beer-profile" name="beerImage[]" value=""></input>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-profile" class="col-sm-12 control-label" style="text-align: left;">Beer Cover *</label>
					<div class="col-sm-12">
						<input required type="file" class="form-control" id="beer-profile" name="beerImage[]" value="" ></input>
					</div>
				</div>
				<div class="form-group">
					<label for="beer-profile" class="col-sm-12 control-label" style="text-align: left;">Beer Bottle *</label>
					<div class="col-sm-12">
						<input required type="file" class="form-control" id="beer-profile" name="beerImage[]" value="" ></input>
					</div>
				</div>
				<button type="button" class="btn btn-danger" onclick="location.reload();">Cancel</button>
				<button type="button" class="btn btn-primary" id="buttonSave">Save</button>

				<div class="alert alert-success msg-newbeer" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
					<strong>Done!</strong> A new beer was added, look at list tab.
				</div>

			</div>
			<input type="submit" style="display: none;" class="submit"></input>
		</form>
	</div>

</div>


<?php
	close_database();
?>
