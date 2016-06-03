<?php
	include("../php/connect_bd.php");
	connect_base_de_datos();
?>

<div class="row" style="margin-top: 2vw">
	<div class="col-md-12">
		<form class="form-horizontal" id="formBeer" name="formBeerData" enctype="multipart/form-data">
			<div class="col-md-5">

				<div class="form-group">
					<label for="userPrivileges" class="col-sm-4 control-label">Admin User Type *</label>
					<div class="col-sm-8">
						<select required name="userPrivileges" id="userPrivileges" class="form-control">
							<option name="" value="" selected disabled>Select a admin user type</option>
							<option name="1" value="1">General</option>
							<option name="2" value="2">Productos</option>
							<option name="3" value="3">Banners</option>
							<option name="4" value="4">Broadcast</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="admin-name" class="col-sm-4 control-label">Name *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="admin-name" placeholder="Insert admin name" name="name"></input>
					</div>
				</div>

				<div class="form-group">
					<label for="admin-last-name" class="col-sm-4 control-label">Last Name *</label>
					<div class="col-sm-8">
						<input required type="text" class="form-control" id="admin-last-name" placeholder="Insert admin last name" name="lastname"></input>
					</div>
				</div>

				<div class="form-group">
					<label for="admin-email" class="col-sm-4 control-label">Email *</label>
					<div class="col-sm-8">
						<input required type="email" class="form-control" id="admin-email" placeholder="Insert admin email" name="email"></input>
					</div>
				</div>

				<div class="form-group">
					<label for="admin-password" class="col-sm-4 control-label">Password *</label>
					<div class="col-sm-8">
						<input required type="password" class="form-control" id="admin-password" placeholder="Insert admin password" name="password"></input>
					</div>
				</div>

				<div class="form-group">
					<label for="admin-confirm-password" class="col-sm-4 control-label">Confirm Password *</label>
					<div class="col-sm-8">
						<input required type="password" class="form-control" id="admin-confirm-password" placeholder="Confirm your admin password" name="confirmPassword"></input>
					</div>
				</div>


			</div>

			<div class="col-md-5">

				<button type="button" class="btn btn-danger" onclick="location.reload();">Cancel</button>
				<button type="button" class="btn btn-primary" id="buttonSave">Save</button>

				<div class="alert alert-danger msg-match" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
					<strong>Error!</strong> Admin Password must match
				</div>

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
