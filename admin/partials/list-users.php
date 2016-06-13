<?php
	include("../php/connect_bd.php");
	include("../php/functions.php");
	connect_base_de_datos();
?>

<div class="table-responsive" ng-controller="filterList">
  <table class="table table-bordered">
  <thead>
  	<tr>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(0)"><span ng-if="itemShowElements===0">&#9660;</span><span ng-if="itemShowElements!=0">&#9658;</span>#</span></th>
			<th><span style="cursor:pointer;" ng-click="changeItemShow(1)"><span ng-if="itemShowElements===1">&#9660;</span><span ng-if="itemShowElements!=1">&#9658;</span>Registration</span></th>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(2)"><span ng-if="itemShowElements===2">&#9660;</span><span ng-if="itemShowElements!=2">&#9658;</span>Name</span></th>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(3)"><span ng-if="itemShowElements===3">&#9660;</span><span ng-if="itemShowElements!=3">&#9658;</span>Last Name</span></th>
      <th><span style="cursor:pointer;" ng-click="changeItemShow(4)"><span ng-if="itemShowElements===4">&#9660;</span><span ng-if="itemShowElements!=4">&#9658;</span>Birth</span></th>
			<th><span style="cursor:pointer;" ng-click="changeItemShow(5)"><span ng-if="itemShowElements===5">&#9660;</span><span ng-if="itemShowElements!=5">&#9658;</span>Country</span></th>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(6)"><span ng-if="itemShowElements===6">&#9660;</span><span ng-if="itemShowElements!=6">&#9658;</span>State</span></th>
      <th><span style="cursor:pointer;" ng-click="changeItemShow(7)"><span ng-if="itemShowElements===7">&#9660;</span><span ng-if="itemShowElements!=7">&#9658;</span>E-mail</span></th>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(8)"><span ng-if="itemShowElements===8">&#9660;</span><span ng-if="itemShowElements!=8">&#9658;</span>Status</span></th>
  		<th><span style="cursor:pointer;" ng-click="changeItemShow(9)"><span ng-if="itemShowElements===9">&#9660;</span><span ng-if="itemShowElements!=9">&#9658;</span>Exp</span></th>
  		<th>Options</th>
  	</tr>
  </thead>
  <tbody class="chargedElements">

			<tr ng-if="itemShowElements===0" ng-repeat="data in dataUsers | orderBy: '-1*idUser'">
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
					<span class="label label-primary blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-click="selectSendMessage(3,data.idUser)">Send Message</span>
					<span class="label label-danger blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 1" ng-click="modifyStatus(0,data.idUser)">Block</span>
					<span class="label label-primary unlockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 0" ng-click="modifyStatus(1,data.idUser)">Unlock</span>
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
					<span class="label label-primary blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-click="selectSendMessage(3,data.idUser)">Send Message</span>
					<span class="label label-danger blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 1" ng-click="modifyStatus(0,data.idUser)">Block</span>
					<span class="label label-primary unlockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 0" ng-click="modifyStatus(1,data.idUser)">Unlock</span>
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
					<span class="label label-primary blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-click="selectSendMessage(3,data.idUser)">Send Message</span>
					<span class="label label-danger blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 1" ng-click="modifyStatus(0,data.idUser)">Block</span>
					<span class="label label-primary unlockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 0" ng-click="modifyStatus(1,data.idUser)">Unlock</span>
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
					<span class="label label-primary blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-click="selectSendMessage(3,data.idUser)">Send Message</span>
					<span class="label label-danger blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 1" ng-click="modifyStatus(0,data.idUser)">Block</span>
					<span class="label label-primary unlockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 0" ng-click="modifyStatus(1,data.idUser)">Unlock</span>
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
					<span class="label label-primary blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-click="selectSendMessage(3,data.idUser)">Send Message</span>
					<span class="label label-danger blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 1" ng-click="modifyStatus(0,data.idUser)">Block</span>
					<span class="label label-primary unlockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 0" ng-click="modifyStatus(1,data.idUser)">Unlock</span>
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
					<span class="label label-primary blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-click="selectSendMessage(3,data.idUser)">Send Message</span>
					<span class="label label-danger blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 1" ng-click="modifyStatus(0,data.idUser)">Block</span>
					<span class="label label-primary unlockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 0" ng-click="modifyStatus(1,data.idUser)">Unlock</span>
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
					<span class="label label-primary blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-click="selectSendMessage(3,data.idUser)">Send Message</span>
					<span class="label label-danger blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 1" ng-click="modifyStatus(0,data.idUser)">Block</span>
					<span class="label label-primary unlockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 0" ng-click="modifyStatus(1,data.idUser)">Unlock</span>
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
					<span class="label label-primary blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-click="selectSendMessage(3,data.idUser)">Send Message</span>
					<span class="label label-danger blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 1" ng-click="modifyStatus(0,data.idUser)">Block</span>
					<span class="label label-primary unlockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 0" ng-click="modifyStatus(1,data.idUser)">Unlock</span>
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
					<span class="label label-primary blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-click="selectSendMessage(3,data.idUser)">Send Message</span>
					<span class="label label-danger blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 1" ng-click="modifyStatus(0,data.idUser)">Block</span>
					<span class="label label-primary unlockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 0" ng-click="modifyStatus(1,data.idUser)">Unlock</span>
				</td>
      <tr>
      <tr ng-if="itemShowElements===9" ng-repeat="data in dataUsers | orderBy: '-1*userExp'">
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
					<span class="label label-primary blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-click="selectSendMessage(3,data.idUser)">Send Message</span>
					<span class="label label-danger blockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 1" ng-click="modifyStatus(0,data.idUser)">Block</span>
					<span class="label label-primary unlockUser" name='{{data.idUser}}' style="cursor:pointer" ng-show="data.userStatus == 0" ng-click="modifyStatus(1,data.idUser)">Unlock</span>
				</td>
      <tr>

  </tbody>
  </table>
</div>
