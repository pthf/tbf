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
					<label for="producer-name" class="col-sm-4 control-label">Name *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="producer-name" placeholder="Insert producer name" name="name"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-description" class="col-sm-4 control-label">Description *</label>
					<div class="col-sm-8">
						<textarea required type="text" class="form-control" id="producer-description" placeholder="Insert producer description" style="height: 120px" name="description"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-type" class="col-sm-4 control-label">Type *</label>
					<div class="col-sm-8">
						<select required class="form-control" id="producer-type" name="type">
							<option disabled selected value="">Select a producer type</option>
							<?php
								$query = "SELECT * FROM producertype ORDER BY producerTypeName ASC";
								$result = mysql_query($query) or die(mysql_error());
								while ($line = mysql_fetch_array($result)) {
									echo '<option value="'.$line["idProducerType"].'" name="'.$line["idProducerType"].'">'.$line["producerTypeName"].'</option>';
								}
							?>
						</select>
						<div class="col-sm-12">
							<input ng-click="selectaAddType()" type="button" class="btn btn-default" value="Add a new type" style="margin-top: 5px"></input>
							<input ng-show="addType" type="text" class="form-control textNewType" id="beer-type-new" placeholder="Insert a producer type"  style="margin-top: 5px; margin-bottom: 5px;" ></input>

							<div class="alert alert-success msg-new" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
								 <strong>Done!</strong> A new producer type was added.
							</div>

							<div class="alert alert-warning msg-type" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
								 <strong>Hey!</strong> Type in a producer type.
							</div>

							<div class="alert alert-danger msg-repeat" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
								 <strong>Ups!</strong> The producer type already exist.
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
					<label for="producer-country" class="col-sm-4 control-label">Country *</label>
					<div class="col-sm-8">
						<select required class="form-control" id="producer-country" name="country">
							<option disabled selected value="">Select a producer country</option>
							<?php
								$query = "SELECT * FROM countries ORDER BY name_c ASC";
								$result = mysql_query($query) or die(mysql_error());
								while ($line = mysql_fetch_array($result)) {
									echo '<option value="'.$line["id"].'" name="'.$line["id"].'">'.$line["name_c"].'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-state" class="col-sm-4 control-label">State *</label>
					<div class="col-sm-8">
						<select required class="form-control" id="producer-state" name="state">
							<option disabled selected value="">Select a producer state</option>
							<?php
								// $query = "SELECT * FROM states ORDER BY name_s ASC";
								// $result = mysql_query($query) or die(mysql_error());
								// while ($line = mysql_fetch_array($result)) {
								// 	echo '<option value="'.$line["id"].'" name="'.$line["id"].'">'.$line["name_s"].'</option>';
								// }
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-city" class="col-sm-4 control-label">City*</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="producer-city" placeholder="Insert producer city" name="city"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-address" class="col-sm-4 control-label">Address *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="producer-address" placeholder="Insert producer address" name="address"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-zip" class="col-sm-4 control-label">Zip *</label>
					<div class="col-sm-8">
						<input required type="number" class="form-control" id="producer-zip" placeholder="Insert producer zip" name="zip"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-phone" class="col-sm-4 control-label">Phone *</label>
					<div class="col-sm-8">
						<input required type="number" class="form-control" id="producer-phone" placeholder="Insert producer phone" name="phone"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-email" class="col-sm-4 control-label">Email *</label>
					<div class="col-sm-8">
						<input required type="email" class="form-control" id="producer-email" placeholder="Insert producer email" name="email"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-site" class="col-sm-4 control-label">Site</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="producer-site" placeholder="Insert URL" name="site"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-fb" class="col-sm-4 control-label">Facebook</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="producer-fb" placeholder="Insert URL" name="facebook"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-tw" class="col-sm-4 control-label">Twitter</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="producer-tw" placeholder="Insert URL" name="twitter"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-inst" class="col-sm-4 control-label">Instagram</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="producer-inst" placeholder="Insert URL" name="instagram"></input>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<label for="producer-profile" class="col-sm-12 control-label" style="text-align: left;">Image Profile(optimal: 210x240px) *</label>
					<div class="col-sm-12">
						<input required type="file" class="form-control" id="producer-profile" name="producerImage[]" value=""></input>
					</div>
				</div>
				<div class="form-group">
					<label for="producer-cover" class="col-sm-12 control-label" style="text-align: left;">Producer Cover(optimal: 1366x768px) *</label>
					<div class="col-sm-12">
						<input required type="file" class="form-control" id="producer-cover" name="producerImage[]" value="" ></input>
					</div>
				</div>
				<button type="button" class="btn btn-danger" onclick="location.reload();">Cancel</button>
				<button type="button" class="btn btn-primary" id="buttonSave">Save</button>
				<div class="alert alert-success msg-newbeer" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
					<strong>Done!</strong> A new producer was added, look at list tab.
				</div>
			</div>
			<input type="submit" style="display: none;" class="submit"></input>
		</form>
	</div>

</div>


<?php
	close_database();
?>
