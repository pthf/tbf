<?php
	include("../php/connect_bd.php");
	include("../php/functions.php");
	connect_base_de_datos();
?>

<div class="table-responsive" ng-controller="filterList">
  <table class="table table-bordered">
  <thead>
  	<tr>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(0)">#</span></th>
			<th><span style="cursor:pointer;" ng-click="changeItemShow(1)">Registration</span></th>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(2)">Name</span></th>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(3)">Last Name</span></th>
      <th><span style="cursor:pointer;" ng-click="changeItemShow(4)">Birth</span></th>
			<th><span style="cursor:pointer;" ng-click="changeItemShow(5)">Country</span></th>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(6)">State</span></th>
      <th><span style="cursor:pointer;" ng-click="changeItemShow(7)">E-mail</span></th>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(8)">Status</span></th>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(9)">Exp</span></th>
  		<th>Options</th>
  	</tr>
  </thead>
  <tbody class="chargedElements">

			<tr ng-if="itemShowElements===0" ng-repeat="data in dataUsers | orderBy: 'idUser'">
        <th scope="row">{{data.idUser}}</th>
				<td>{{data.registrationDate}}</td>
				<td>{{data.userName}}</td>
				<td>{{data.userLastName}}</td>
				<td>{{data.userBirthDate}}</td>
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
      <tr>
      <tr ng-if="itemShowElements===1" ng-repeat="data in dataUsers | orderBy: 'registrationDate'">
        <th scope="row">{{data.idUser}}</th>
				<td>{{data.registrationDate}}</td>
				<td>{{data.userName}}</td>
				<td>{{data.userLastName}}</td>
				<td>{{data.userBirthDate}}</td>
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
      <tr>
      <tr ng-if="itemShowElements===2" ng-repeat="data in dataUsers | orderBy: 'userName'">
        <th scope="row">{{data.idUser}}</th>
				<td>{{data.registrationDate}}</td>
				<td>{{data.userName}}</td>
				<td>{{data.userLastName}}</td>
				<td>{{data.userBirthDate}}</td>
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
      <tr>
      <tr ng-if="itemShowElements===3" ng-repeat="data in dataUsers | orderBy: 'userLastName'">
        <th scope="row">{{data.idUser}}</th>
				<td>{{data.registrationDate}}</td>
				<td>{{data.userName}}</td>
				<td>{{data.userLastName}}</td>
				<td>{{data.userBirthDate}}</td>
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
      <tr>
      <tr ng-if="itemShowElements===4" ng-repeat="data in dataUsers | orderBy: 'userBirthDate'">
        <th scope="row">{{data.idUser}}</th>
				<td>{{data.registrationDate}}</td>
				<td>{{data.userName}}</td>
				<td>{{data.userLastName}}</td>
				<td>{{data.userBirthDate}}</td>
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
      <tr>
      <tr ng-if="itemShowElements===5" ng-repeat="data in dataUsers | orderBy: 'name_c'">
        <th scope="row">{{data.idUser}}</th>
				<td>{{data.registrationDate}}</td>
				<td>{{data.userName}}</td>
				<td>{{data.userLastName}}</td>
				<td>{{data.userBirthDate}}</td>
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
      <tr>
      <tr ng-if="itemShowElements===6" ng-repeat="data in dataUsers | orderBy: 'name_s'">
        <th scope="row">{{data.idUser}}</th>
				<td>{{data.registrationDate}}</td>
				<td>{{data.userName}}</td>
				<td>{{data.userLastName}}</td>
				<td>{{data.userBirthDate}}</td>
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
      <tr>
      <tr ng-if="itemShowElements===7" ng-repeat="data in dataUsers | orderBy: 'userEmail'">
        <th scope="row">{{data.idUser}}</th>
				<td>{{data.registrationDate}}</td>
				<td>{{data.userName}}</td>
				<td>{{data.userLastName}}</td>
				<td>{{data.userBirthDate}}</td>
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
      <tr>
      <tr ng-if="itemShowElements===8" ng-repeat="data in dataUsers | orderBy: 'userStatus'">
        <th scope="row">{{data.idUser}}</th>
				<td>{{data.registrationDate}}</td>
				<td>{{data.userName}}</td>
				<td>{{data.userLastName}}</td>
				<td>{{data.userBirthDate}}</td>
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
      <tr>
      <tr ng-if="itemShowElements===9" ng-repeat="data in dataUsers | orderBy: '-userExp'">
        <th scope="row">{{data.idUser}}</th>
				<td>{{data.registrationDate}}</td>
				<td>{{data.userName}}</td>
				<td>{{data.userLastName}}</td>
				<td>{{data.userBirthDate}}</td>
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
      <tr>

  </tbody>
  </table>
</div>
