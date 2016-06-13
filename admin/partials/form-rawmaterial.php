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
					<label for="raw-material-name" class="col-sm-4 control-label">Name *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="raw-material-name" placeholder="Insert raw material name" name="name"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-name" class="col-sm-4 control-label">Type *</label>
					<div class="col-sm-8" id="rawmaterial-type">
						<?php
							$query = "SELECT * FROM rawmaterialtype ORDER BY rawMaterialTypeName";
							$result = mysql_query($query) or die (mysql_error());
							while($line = mysql_fetch_array($result)){
								echo '<div class="checkbox">';
								echo '<label><input name="rawMaterialTypeList[]" type="checkbox" value="'.$line["idDrawMaterialType"].'">'.$line["rawMaterialTypeName"].'</label>';
								echo '</div>';
							}
						?>
					</div>
				</div>

				<div class="col-sm-3">
				</div>
				<div class="col-sm-9">
					<input ng-click="selectaAddType()" type="button" class="btn btn-default" value="Add a new type" style="margin-top: 5px"></input>
					<input ng-show="addType" type="text" class="form-control textNewType" id="beer-type-new" placeholder="Insert a raw material type"  style="margin-top: 5px; margin-bottom: 5px;" ></input>

					<div class="alert alert-success msg-new" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
						 <strong>Done!</strong> A new raw material type was added.
					</div>

					<div class="alert alert-warning msg-type" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
						 <strong>Hey!</strong> Type in a raw material type.
					</div>

					<div class="alert alert-danger msg-repeat" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
						 <strong>Ups!</strong> The raw material type already exist.
					</div>

					<div class="alert alert-danger msg-error" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
						 <strong>Ups!</strong> A error ocurred.
					</div>

					<input ng-show="addType" type="button" class="btn btn-primary addTypeDB" value="Add" style="margin-bottom: 10px;"></input>
				</div>
				<br><br><br>

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
					<label for="raw-material-city" class="col-sm-4 control-label">City *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="raw-material-city" placeholder="Insert raw material city" name="city"></input>
					</div>
				</div>

				<div class="form-group">
					<label for="raw-material-general-description" class="col-sm-4 control-label">General description *</label>
					<div class="col-sm-8">
						<textarea required type="text" class="form-control" id="raw-material-general-description" placeholder="Insert raw material general description" style="height: 120px" name="general-description"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-description" class="col-sm-4 control-label">Description *</label>
					<div class="col-sm-8">
						<textarea required type="text" class="form-control" id="raw-material-description" placeholder="Insert raw material description" style="height: 120px" name="description"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-description-html" class="col-sm-4 control-label">Description HTML *</label>
					<div class="col-sm-8">
						<textarea required type="text" class="form-control" id="raw-material-description-html" placeholder="Insert HTML5 code. " style="height: 320px" name="descriptionhtml"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-latitude" class="col-sm-4 control-label">Latitude *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="raw-material-latitude" placeholder="Insert raw material latitude" name="latitude"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-longitude" class="col-sm-4 control-label">Longitude *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="raw-material-longitude" placeholder="Insert raw material longitude" name="longitude"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-address" class="col-sm-4 control-label">Address *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="raw-material-address" placeholder="Insert raw material address" name="address"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-zip" class="col-sm-4 control-label">Zip *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="raw-material-zip" placeholder="Insert raw material zip" name="zip"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-phone" class="col-sm-4 control-label">Phone *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="raw-material-phone" placeholder="Insert raw material phone" name="phone"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-email" class="col-sm-4 control-label">E-mail *</label>
					<div class="col-sm-8">
						<input required type="email" class="form-control" id="raw-material-email" placeholder="Insert raw material email" name="email"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-site" class="col-sm-4 control-label">Site </label>
					<div class="col-sm-8">
						<input  type="text" class="form-control" id="raw-material-site" placeholder="Insert URL" name="site"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-facebook" class="col-sm-4 control-label">Facebook </label>
					<div class="col-sm-8">
						<input  type="text" class="form-control" id="raw-material-facebook" placeholder="Insert URL" name="facebook"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-twitter" class="col-sm-4 control-label">Twitter </label>
					<div class="col-sm-8">
						<input  type="text" class="form-control" id="raw-material-twitter" placeholder="Insert URL" name="twitter"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="raw-material-instagram" class="col-sm-4 control-label">Instagram </label>
					<div class="col-sm-8">
						<input  type="text" class="form-control" id="raw-material-instagram" placeholder="Insert URL" name="instagram"></input>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<label for="rawMaterial-profile" class="col-sm-12 control-label" style="text-align: left;">Image Profile(optimal: 210x240px) *</label>
					<div class="col-sm-12">
						<input required type="file" class="form-control" id="rawMaterial-profile" name="rawMaterialImage[]" value=""></input>
					</div>
				</div>
				<div class="form-group">
					<label for="rawMaterial-cover" class="col-sm-12 control-label" style="text-align: left;">Raw Material Cover(optimal: 1366x375px) *</label>
					<div class="col-sm-12">
						<input required type="file" class="form-control" id="rawMaterial-cover" name="rawMaterialImage[]" value="" ></input>
					</div>
				</div>
				<button type="button" class="btn btn-danger" onclick="location.reload();">Cancel</button>
				<button type="button" class="btn btn-primary" id="buttonSave">Save</button>

				<div class="alert alert-success msg-newbeer" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
					<strong>Done!</strong> A new raw material was added, look at list tab.
				</div>

			</div>
			<input type="submit" style="display: none;" class="submit"></input>
		</form>
	</div>

</div>


<?php
	close_database();
?>
