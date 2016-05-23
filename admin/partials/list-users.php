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
			<th>Registration</th>
  		<th>Name</th>
  		<th>Last Name</th>
      <th>Birth</th>
			<th>Country</th>
  		<th>State</th>
			<th>City</th>
      <th>E-mail</th>
  		<th>Status</th>
  		<th>Exp</th>
  		<th>Options</th>
  	</tr>
  </thead>
  <tbody class="chargedElements">

			<tr ng-repeat="data in dataUsers">
				<th scope="row">{{data.idUser}}</th>
				<td>{{data.registrationDate}}</td>
				<td>{{data.userName}}</td>
				<td>{{data.userLastName}}</td>
				<td>{{data.userBirthDate}}</td>
				<td>{{data.name_city}}</td>
				<td>{{data.name_c}}</td>
				<td>{{data.name_s}}</td>
				<td>{{data.userEmail}}</td>
				<td>
					<span ng-show="data.userStatus == 1">Active</span>
					<span ng-show="data.userStatus == 0">Blocked</span>
				</td>
				<td>{{data.userExp}}</td>
				<td>
					<span class="label label-danger blockUser" name='>{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 1" ng-click="modifyStatus(0,data.idUser)">Block</span>
					<span class="label label-primary unlockUser" name='>{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 0" ng-click="modifyStatus(1,data.idUser)">Unlock</span>
				</td>
			</tr>

  </tbody>
  </table>
</div>
