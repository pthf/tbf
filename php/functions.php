<?php


if(isset($_POST['namefunction'])){
	include("../admin/php/connect_bd.php");
	connect_base_de_datos();
	$namefunction = $_POST['namefunction'];
	switch ($namefunction) {
		case 'changeUser':
			changeUser();
		break;
		case 'changeEmail':
			changeEmail();
		break;
		case 'changePass':
			changePass();
		break;
		case 'newMessage':
			newMessage();
		break;
		case 'changeImageBanner':
			changeImageBanner();
		break;
		case 'changeImagePerfil':
			changeImagePerfil();
		break;
		case 'requestMessage':
			requestMessage();
		break;
		case 'SendCommentMessage':
			SendCommentMessage();
		break;
		case 'SendCommentProfileBeer':
			SendCommentProfileBeer();
		break;
		case 'deleteFavorites':
			deleteFavorites($_POST['dataUser'], $_POST['dataBeer']);
		break;
		case 'addFavorites':
			addFavorites($_POST['dataUser'], $_POST['dataBeer']);
		break;
		case 'rankUser':
			rankUser($_POST['valuenew'], $_POST['idBeer'], $_POST['idUser']);
		break;
		case 'deleteRank':
			deleteRank($_POST['idBeer'], $_POST['idList']);
		break;
		case 'prinnfRank':
			prinnfRank($_POST['idBeer']);
		break;
		case 'deleteWishList':
			deleteWishList($_POST['dataUser'], $_POST['dataBeer']);
		break;
		case 'addWishList':
			addWishList($_POST['dataUser'], $_POST['dataBeer']);
		break;
		case 'changeStatusMessage':
			changeStatusMessage();
		break;
	}
}

function addUseExp($idUser){
	$query = "SELECT userExp FROM user WHERE idUser = $idUser";
	$result = mysql_query($query) or die(mysql_error());
	$line = mysql_fetch_array($result);
	$userExp = $line['userExp'];
	$userExp = $userExp + 10;

	$query = "UPDATE user SET userExp = $userExp WHERE idUser = $idUser";
	$result = mysql_query($query) or die(mysql_error());
}

function changeUser() {

	parse_str($_POST['data'], $formData);

	//$newformat = $formData['birthday_year'].'/'.$formData['birthday_month'].'/'.$formData['birthday_day'];
	//$time = strtotime($newformat);
	//$fecha = date('Y-m-d',$time);

	$query = "UPDATE user
				SET userName = '".$formData['name']."',
							userLastName = '".$formData['lastname']."',
							userDescription = '".$formData['description']."',
							country_id = '".$formData['country']."',
							state_id = '".$formData['state']."'
				WHERE idUser = '".$formData['iduser']."'";
	$resultado = mysql_query($query) or die(mysql_error());
	echo " <span class='not-user' style='color:blue;'><label for='privacyTerms'>Usuario actualizado.</label></span> ";
}

function changeEmail() {

	parse_str($_POST['data'], $formData);

	$query = "SELECT * FROM user WHERE idUser = '".$formData['iduser']."'";
	$resultado = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($resultado);
	if ($row['userEmail'] == $formData['email']) {
		if ($formData['newemail'] == $formData['confirmemail']) {
			$query2 = "UPDATE user SET userEmail = '".$formData['confirmemail']."' WHERE idUser = '".$formData['iduser']."'";
			$resultado2 = mysql_query($query2) or die(mysql_error());
			echo " <span class='not-user' style='color:blue;'><label for='privacyTerms'>Email actualizado.</label></span> ";
		} else if ($formData['newemail'] != $formData['confirmemail']){
			echo " <span class='not-user' style='color:red;'><label for='privacyTerms'>Los nuevos emails, no coinciden, intentalo de nuevo.</label></span> ";
		}
	} else {
		echo " <span class='not-user' style='color:red;'><label for='privacyTerms'>El usuario antiguo es incorrecto.</label></span> ";
	}

}

function changePass() {

	parse_str($_POST['data'], $formData);

	$query = "SELECT * FROM user WHERE idUser = '".$formData['iduser']."'";
	$resultado = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($resultado);

	$pass = $formData['password'];

	if (password_verify($pass, $row['userPassword'])) {
		if ($formData['newpass'] == $formData['confirpass']) {
			$password =  password_hash($formData['confirpass'], PASSWORD_DEFAULT);
			$query1 = "UPDATE user SET userPassword = '".$password."' WHERE idUser = '".$formData['iduser']."'";
			$resultado1 = mysql_query($query1) or die(mysql_error());
			echo " <span class='not-user' style='color:blue;'><label for='privacyTerms'>Contraseña actualizada.</label></span> ";
		} else if ($formData['newpass'] != $formData['confirpass']) {
			echo " <span class='not-user' style='color:red;'><label for='privacyTerms'>Las nuevas contraseñas no coinciden, intentalo de nuevo.</label></span> ";
		}
	} else {

		echo " <span class='not-user' style='color:red;'><label for='privacyTerms'>La contraseña antigua es incorrecta.</label></span> ";
	}
}

function newMessage() {

	parse_str($_POST['data'], $formData);

	//Consulta del Usuario Emisor para obtener el idInbox
	/*$query = "SELECT us.idUser,inb.idInbox FROM user us INNER JOIN inbox inb ON inb.idInbox = us.idInbox WHERE us.idUser = '".$formData['idEmisor']."'";
	$resultado = mysql_query($query) or die (mysql_error());
	$row = mysql_fetch_array($resultado);*/

	//Consulta del Usuario Receptor
	$query1 = "SELECT us.idUser,inb.idInbox FROM user us INNER JOIN inbox inb ON inb.idInbox = us.idInbox WHERE us.idUser =  '".$formData['idReceptor']."'";
	$resultado1 = mysql_query($query1) or die (mysql_error());
	$row1 = mysql_fetch_array($resultado1);

	//Consultamos la tabla de chats para verificar si existe el chat con el inbox actual
	$sql = "SELECT * FROM chat WHERE user_idUser = '".$formData['idEmisor']."' AND inbox_idInbox = '".$row1['idInbox']."'";
	$res = mysql_query($sql) or die (mysql_error());
	$row2 = mysql_num_rows($res);
	if ($row2 == 0) {

		//Insertar chat con el idInbox del usuario logueado
		$query2 = "INSERT INTO chat VALUES (null,'".$row1['idInbox']."','".$formData['idEmisor']."')";
		$resultado2 = mysql_query($query2) or die (mysql_error());

		//Inserta mensaje del Emisor
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
	    $idChatEmisor = mysql_insert_id();
		$query4 = "INSERT INTO message VALUES (null,'".$formData['message']."','".$datatime."','0','".$idChatEmisor."','".$formData['idEmisor']."')";
		$resultado4 = mysql_query($query4) or die (mysql_error());

	} else if ($row2 > 0) {

		$sql2 = "SELECT * FROM chat WHERE user_idUser = '".$formData['idEmisor']."' AND inbox_idInbox = '".$row1['idInbox']."'";
		$res2 = mysql_query($sql2) or die (mysql_error());
		$row4 = mysql_fetch_array($res2);
		//Inserta mensaje del Emisor
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
		$query6 = "INSERT INTO message VALUES (null,'".$formData['message']."','".$datatime."','0','".$row4['idChat']."','".$formData['idEmisor']."')";
		$resultado6 = mysql_query($query6) or die (mysql_error());

	}

	//Consulta del Usuario Emisor para obtener el idInbox
	$query = "SELECT us.idUser,inb.idInbox FROM user us INNER JOIN inbox inb ON inb.idInbox = us.idInbox WHERE us.idUser = '".$formData['idEmisor']."'";
	$resultado = mysql_query($query) or die (mysql_error());
	$row = mysql_fetch_array($resultado);

	//Consulta del Usuario Receptor
	/*$query1 = "SELECT us.idUser,inb.idInbox FROM user us INNER JOIN inbox inb ON inb.idInbox = us.idInbox WHERE us.idUser =  '".$formData['idReceptor']."'";
	$resultado1 = mysql_query($query1) or die (mysql_error());
	$row1 = mysql_fetch_array($resultado1);*/

	//Consultamos la tabla de chats para verificar si existe el chat con el inbox actual
	$sql1 = "SELECT * FROM chat WHERE user_idUser = '".$formData['idReceptor']."' AND inbox_idInbox = '".$row['idInbox']."'";
	$res1 = mysql_query($sql1) or die (mysql_error());
	$row3 = mysql_num_rows($res1);
	if ($row3 == 0) {

		//Insertar chat al Receptor
		$query3 = "INSERT INTO chat VALUES (null,'".$row['idInbox']."','".$formData['idReceptor']."')";
		$resultado3 = mysql_query($query3) or die (mysql_error());

		//Inserta mensaje del Emisor
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
	    $idChatReceptor = mysql_insert_id();
		$query5 = "INSERT INTO message VALUES (null,'".$formData['message']."','".$datatime."','1','".$idChatReceptor."','".$formData['idEmisor']."')";
		$resultado4 = mysql_query($query5) or die (mysql_error());

	} else if ($row3 > 0) {

		$sql3 = "SELECT * FROM chat WHERE user_idUser = '".$formData['idReceptor']."' AND inbox_idInbox = '".$row['idInbox']."'";
		$res3 = mysql_query($sql3) or die (mysql_error());
		$row5 = mysql_fetch_array($res3);
		//Inserta mensaje del Emisor
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
		$query5 = "INSERT INTO message VALUES (null,'".$formData['message']."','".$datatime."','1','".$row5['idChat']."','".$formData['idEmisor']."')";
		$resultado4 = mysql_query($query5) or die (mysql_error());

	}
}

function requestMessage () {

	parse_str($_POST['data'], $formData);

	//var_dump($formData);
	//exit();

	//Consulta del Usuario Receptor
	$query1 = "SELECT us.idUser,inb.idInbox FROM user us INNER JOIN inbox inb ON inb.idInbox = us.idInbox WHERE us.idUser =  '".$formData['idReceptor']."'";
	$resultado1 = mysql_query($query1) or die (mysql_error());
	$row1 = mysql_fetch_array($resultado1);
	//var_dump($row1);

	//Consultamos la tabla de chats para verificar si existe el chat con el inbox actual
	$sql = "SELECT * FROM chat WHERE user_idUser = '".$formData['idEmisor']."' AND inbox_idInbox = '".$row1['idInbox']."'";
	$res = mysql_query($sql) or die (mysql_error());
	$row2 = mysql_num_rows($res);
	//var_dump($row2);
	
	//No existe
	if ($row2 == 0) {

		//Insertar chat con el idInbox del usuario logueado
		$query2 = "INSERT INTO chat VALUES (null,'".$row1['idInbox']."','".$formData['idEmisor']."')";
		$resultado2 = mysql_query($query2) or die (mysql_error());

		//Inserta mensaje del Emisor
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
	    $idChatEmisor = mysql_insert_id();
		$query4 = "INSERT INTO message VALUES (null,'".$formData['message']."','".$datatime."','0','".$idChatEmisor."','".$formData['idEmisor']."')";
		$resultado4 = mysql_query($query4) or die (mysql_error());

	} else if ($row2 > 0) {

		$sql2 = "SELECT * FROM chat WHERE user_idUser = '".$formData['idEmisor']."' AND inbox_idInbox = '".$row1['idInbox']."'";
		$res2 = mysql_query($sql2) or die (mysql_error());
		$row4 = mysql_fetch_array($res2);
		//var_dump($row4);
		
		//Inserta mensaje del Emisor
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
		$query6 = "INSERT INTO message VALUES (null,'".$formData['message']."','".$datatime."','0','".$row4['idChat']."','".$formData['idEmisor']."')";
		$resultado6 = mysql_query($query6) or die (mysql_error());
		//var_dump($query6);	
		//exit();
	}

	//Consulta del Usuario Emisor para obtener el idInbox
	$query = "SELECT us.idUser,inb.idInbox FROM user us INNER JOIN inbox inb ON inb.idInbox = us.idInbox WHERE us.idUser = '".$formData['idEmisor']."'";
	$resultado = mysql_query($query) or die (mysql_error());
	$row = mysql_fetch_array($resultado);
	//var_dump($row);
	//exit();

	//Consultamos la tabla de chats para verificar si existe el chat con el inbox actual
	$sql1 = "SELECT * FROM chat WHERE user_idUser = '".$formData['idReceptor']."' AND inbox_idInbox = '".$row['idInbox']."'";
	$res1 = mysql_query($sql1) or die (mysql_error());
	$row3 = mysql_num_rows($res1);
	//var_dump($row3);
	//exit();

	if ($row3 == 0) {

		//Insertar chat al Receptor
		$query3 = "INSERT INTO chat VALUES (null,'".$row['idInbox']."','".$formData['idReceptor']."')";
		$resultado3 = mysql_query($query3) or die (mysql_error());

		//Inserta mensaje del Emisor
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
	    $idChatReceptor = mysql_insert_id();
		$query5 = "INSERT INTO message VALUES (null,'".$formData['message']."','".$datatime."','1','".$idChatReceptor."','".$formData['idEmisor']."')";
		$resultado4 = mysql_query($query5) or die (mysql_error());

	} else if ($row3 > 0) {

		$sql3 = "SELECT * FROM chat WHERE user_idUser = '".$formData['idReceptor']."' AND inbox_idInbox = '".$row['idInbox']."'";
		$res3 = mysql_query($sql3) or die (mysql_error());
		$row5 = mysql_fetch_array($res3);

		//Inserta mensaje del Emisor
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
		$query5 = "INSERT INTO message VALUES (null,'".$formData['message']."','".$datatime."','1','".$row5['idChat']."','".$formData['idEmisor']."')";
		$resultado4 = mysql_query($query5) or die (mysql_error());
		//var_dump($query5);
		//exit();
	}
}

function changeImageBanner () {

	parse_str($_POST['action'], $formData);
	$fileNames = []; //imgProfile, imgCover, imgBottle
	$indice = 0;
	foreach ($_FILES['beerBannerImage']["error"]  as $key => $value) {
		$fileName = $_FILES["beerBannerImage"]["name"][$key];
		$fileName = date("YmdHis").pathinfo($_FILES["beerBannerImage"]["type"][$key], PATHINFO_EXTENSION);
		array_push($fileNames, $fileName);
		$fileType = $_FILES["beerBannerImage"]["type"][$key];
		$fileTemp = $_FILES["beerBannerImage"]["tmp_name"][$key];
		if($indice==0)
			move_uploaded_file($fileTemp, "../images/userCover/".$fileName);
		$indice++;
	}
	$query = "UPDATE user SET userCoverImage = ".$fileNames[0]." WHERE idUser = ".$formData['idUser'];
	$result = mysql_query($query) or die(mysql_error());

	addUseExp($formData['idUser']);

}

function changeImagePerfil () {

	parse_str($_POST['action'], $formData);
	$fileNames = [];
	$indice = 0;
	foreach ($_FILES['beerProfileImage']["error"]  as $key => $value) {
		$fileName = $_FILES["beerProfileImage"]["name"][$key];
		$fileName = date("YmdHis").pathinfo($_FILES["beerProfileImage"]["type"][$key], PATHINFO_EXTENSION);
		array_push($fileNames, $fileName);
		$fileType = $_FILES["beerProfileImage"]["type"][$key];
		$fileTemp = $_FILES["beerProfileImage"]["tmp_name"][$key];
		if($indice==0)
			move_uploaded_file($fileTemp, "../images/userProfile/".$fileName);
		$indice++;
	}
	$query = "UPDATE user SET userProfileImage = ".$fileNames[0]." WHERE idUser = ".$formData['idUser'];
	$result = mysql_query($query) or die(mysql_error());

	addUseExp($formData['idUser']);

}

function SendCommentMessage () {

	date_default_timezone_set('UTC');
    date_default_timezone_set("America/Mexico_City");
    $datatime = date("Y-m-d H:i:s");
	$query = "SELECT * FROM user WHERE idUser = '".$_POST['idUser']."'";
	$resultado = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($resultado);

	$query1 = "INSERT INTO postelement VALUES (null,'".$_POST['message']."','".$datatime."','".$row['idPublicMessagesList']."','".$_POST['idSession']."')";
	$resultado = mysql_query($query1) or die(mysql_error());

	addUseExp($_POST['idSession']);

}

function SendCommentProfileBeer () {

	date_default_timezone_set('UTC');
    date_default_timezone_set("America/Mexico_City");
    $datatime = date("Y-m-d H:i:s");
	$query = "SELECT * FROM beer WHERE idBeer = '".$_POST['idBeer']."'";
	$resultado = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($resultado);

	$query1 = "INSERT INTO postelement VALUES (null,'".$_POST['message']."','".$datatime."','".$row['idPublicMessagesList']."','".$_POST['idSession']."')";
	$resultado = mysql_query($query1) or die(mysql_error());

	addUseExp($_POST['idSession']);

}

function deleteFavorites($dataUser, $dataBeer){

	$query = "SELECT idFavoritesList FROM  user WHERE idUser = $dataUser";
	$result = mysql_query($query) or die(mysql_error());
	$line = mysql_fetch_array($result);
	$idFavoritesList = $line['idFavoritesList'];
	$query = "DELETE FROM favoriteelement WHERE idFavoritesList = $idFavoritesList AND idBeer = $dataBeer";
	$result = mysql_query($query) or die(mysql_error());

}

function addFavorites($dataUser, $dataBeer){

	$query = "SELECT idFavoritesList FROM  user WHERE idUser = $dataUser";
	$result = mysql_query($query) or die(mysql_error());
	$line = mysql_fetch_array($result);
	$idFavoritesList = $line['idFavoritesList'];
	$query = "INSERT INTO favoriteelement (idFavoritesList, idBeer ) VALUES ($idFavoritesList, $dataBeer)";
	$result = mysql_query($query) or die(mysql_error());
	addUseExp($dataUser);
}

function deleteRank($idBeer, $idList){
	$query = "DELETE FROM rankslistelement WHERE idBeer = $idBeer AND idRanksList = $idList";
	$result = mysql_query($query) or die(mysql_error());
}

function rankUser($value, $idBeer, $idUser){

	$query = "SELECT idRanksList FROM user WHERE idUser = $idUser";
	$result = mysql_query($query) or die(mysql_error());
	$line = mysql_fetch_array($result);
	$idRanksList = $line['idRanksList'];

	$query = "SELECT * FROM rankslistelement WHERE idBeer = $idBeer AND idRanksList = $idRanksList";
	$result = mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result)>0){
		$line = mysql_fetch_array($result);
		$idRanksListElement = $line['idRanksListElement'];
		$query = "UPDATE rankslistelement SET ranksListElementRank = $value WHERE idRanksListElement =  $idRanksListElement";
		$result = mysql_query($query) or die(mysql_error());
	}else{
		$query = "INSERT INTO rankslistelement (idBeer, ranksListElementRank, idRanksList) VALUES ($idBeer, $value, $idRanksList)";
		$result = mysql_query($query) or die(mysql_error());
	}

	prinnfRank($idBeer);
	addUseExp($idUser);

}

function deleteWishList($dataUser, $dataBeer){
	$query = "SELECT idWishList FROM  user WHERE idUser = $dataUser";
	$result = mysql_query($query) or die(mysql_error());
	$line = mysql_fetch_array($result);
	$idWishList = $line['idWishList'];

	$query = "DELETE FROM wishlistelement WHERE idWishList = $idWishList AND idBeer = $dataBeer";
	$result = mysql_query($query) or die(mysql_error());
}

function addWishList($dataUser, $dataBeer){
	$query = "SELECT idWishList FROM  user WHERE idUser = $dataUser";
	$result = mysql_query($query) or die(mysql_error());
	$line = mysql_fetch_array($result);
	$idWishList = $line['idWishList'];

	$query = "INSERT INTO wishlistelement (idWishList, idBeer ) VALUES ($idWishList, $dataBeer)";
	$result = mysql_query($query) or die(mysql_error());

	addUseExp($dataUser);
}

function changeStatusMessage () {

	$query = "UPDATE message SET messageStatus = '1' WHERE chat_idChat = '".$_POST['data']."'";
	$result = mysql_query($query) or die(mysql_error());

}
