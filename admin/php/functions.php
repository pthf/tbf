<?php

	if(isset($_POST['namefunction'])){
		include("connect_bd.php");
		connect_base_de_datos();
		$namefunction = $_POST['namefunction'];
		switch ($namefunction) {
			case 'addBeerType':
				addBeerType($_POST['data']);
				break;
			case 'addNewBeer':
				addNewBeer();
				break;
			case 'deleteBeer':
				deleteBeer($_POST['id']);
				break;
			case 'addBannerImage':
				addBannerImage($_POST['idBeer']);
				break;
			case 'deleteBaner':
				deleteBaner($_POST['id']);
				break;
			case 'editBeer':
				editBeer($_POST['id']);
				break;
			case 'deleteProducer':
				deleteProducer($_POST['id']);
				break;
			case 'addProducerType':
				addProducerType($_POST['data']);
				break;
			case 'addNewProducer':
				addNewProducer();
				break;
			case 'editProducer':
				editProducer($_POST['id']);
				break;
			case 'addNewRawMaterial':
				addNewRawMaterial();
				break;
			case 'deleteRawMaterial':
				deleteRawMaterial($_POST['id']);
				break;
			case 'addRawMaterialType':
				addRawMaterialType($_POST['data']);
				break;
			case 'editRawMaterial':
				editRawMaterial($_POST['id']);
				break;
			case 'addHomeBannerImage':
				addHomeBannerImage();
				break;
			case 'deleteHomeBanner':
				deleteHomeBanner($_POST['id']);
				break;
			case 'addNewBannerImage':
				addNewBannerImage();
				break;
			case 'deleteNewBanner':
				deleteNewBanner($_POST['id']);
				break;
			case 'addPostBannerImage':
				addPostBannerImage();
				break;
			case 'deletePostBanner':
				deletePostBanner($_POST['id']);
				break;
			case 'modifyStatus':
				modifyStatus($_POST['status'], $_POST['idUser']);
				break;
			case 'logOut':
				logOut();
				break;
			case 'getStates':
				getStates($_POST['idCountry']);
				break;
			case 'getStatesUser':
				getStatesUser($_POST['idCountry']);
				break;
			case 'addNewUser':
				addNewUser();
				break;
			case 'logOutUser':
				logOutUser($_POST['idUser']);
				break;
			case 'loginUser':
				loginUser();
				break;
			case 'deleteFavorites':
				deleteFavorites($_POST['dataUser'], $_POST['dataBeer']);
				break;
			case 'addFavorites':
				addFavorites($_POST['dataUser'], $_POST['dataBeer']);
				break;
			case 'deleteWishList':
				deleteWishList($_POST['dataUser'], $_POST['dataBeer']);
				break;
			case 'addWishList':
				addWishList($_POST['dataUser'], $_POST['dataBeer']);
				break;

		}
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
	}

	function loginUser(){

		$passwordLogin = $_POST['passwordLogin'];
		$emailLogin = $_POST['emailLogin'];

		$query = "SELECT * FROM user WHERE userEmail = '$emailLogin'";
		$result = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$find = 0;
			while($line = mysql_fetch_array($result)){
				if(password_verify($passwordLogin, $line['userPassword'])){
					$find = 1;
					$query = "UPDATE user SET userConnection = 1 WHERE idUser = ".$line['idUser'];
					$result = mysql_query($query) or die(mysql_error());
					session_start();
					$_SESSION['idUser'] = $line['idUser'];
				}
			}
			echo $find;
		}else{
			echo -1;
		}



	}

	function logOutUser($idUser){
		$query = "UPDATE user SET userConnection = 0 WHERE idUser = $idUser";
		$result = mysql_query($query) or die(mysql_error());
		logOut();
	}

	function addNewUser(){

		$registrationDate = date("Y-m-d");
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];

		$month = $_POST['month'];
		$day = $_POST['day'];
		$year = $_POST['year'];
		$userBirthDate = $year."-".$month."-".$day;

		$userDescription = "";
		$userProfileImage = "profile_default.jpg";
		$userCoverImage = "cover_default.png";

		$email = $_POST['email'];
		$password =  password_hash($_POST['password'], PASSWORD_DEFAULT);
		$userStatus = 1;
		$userConnection = 1;
		$userExp = 0.0;

		$country = $_POST['country'];
		$state = $_POST['state'];

		$query = "INSERT INTO favoriteslist (idFavoritesList) VALUES (NULL);";
		$result = mysql_query($query) or die(mysql_error());
		$idFavoritesList = mysql_insert_id();

		$query = "INSERT INTO wishlist (idWishList) VALUES (NULL);";
		$result = mysql_query($query) or die(mysql_error());
		$idWishList = mysql_insert_id();

		$query = "INSERT INTO rankslist (idRanksList) VALUES (NULL);";
		$result = mysql_query($query) or die(mysql_error());
		$idRanksList = mysql_insert_id();

		$query = "INSERT INTO publicmessageslist (idPublicMessagesList) VALUES (NULL);";
		$result = mysql_query($query) or die(mysql_error());
		$idPublicMessagesList = mysql_insert_id();

		$query = "INSERT INTO inbox (idInbox) VALUES (NULL);";
		$result = mysql_query($query) or die(mysql_error());
		$idInbox = mysql_insert_id();

		$query = "INSERT INTO user (
			registrationDate, userName, userLastName,
			userBirthDate, userDescription, userProfileImage,
			userCoverImage, userEmail, userPassword, userStatus,
			userConnection, userExp, country_id,
			state_id, idFavoritesList,
			idWishList, idRanksList, idPublicMessagesList,
			idInbox) VALUES(
			'$registrationDate', '$name', '$lastname',
			'$userBirthDate', '$userDescription', '$userProfileImage',
			'$userCoverImage', '$email', '$password', $userStatus,
			$userConnection, $userExp, $country,
			$state, $idFavoritesList,
			$idWishList, $idRanksList, $idPublicMessagesList,
			$idInbox)";

			$result = mysql_query($query) or die(mysql_error());
			$idUser = mysql_insert_id();

			session_start();
			$_SESSION['idUser'] = $idUser;
	}

	function getStatesUser($id){

		$query = "SELECT * FROM states WHERE country_id = $id ORDER BY name_s ASC";
		$result = mysql_query($query) or die(mysql_error());
		echo '<option disabled selected value="">Selecciona un estado &#x25BE;</option>';
		while ($line = mysql_fetch_array($result)) {
			echo '<option value="'.$line["id"].'" name="'.$line["id"].'">'.$line["name_s"].'</option>';
		}

	}

	function getStates($id){

		$query = "SELECT * FROM states WHERE country_id = $id ORDER BY name_s ASC";
		$result = mysql_query($query) or die(mysql_error());
		echo '<option disabled selected value="">Select a producer state</option>';
		while ($line = mysql_fetch_array($result)) {
			echo '<option value="'.$line["id"].'" name="'.$line["id"].'">'.$line["name_s"].'</option>';
		}

	}

	function logOut(){
		session_start();
		session_destroy();
	}

	///////////////////////////////////
	function functionPrintBeerList(){
  		$query = "SELECT * FROM beer
  				  INNER JOIN producer
  				  INNER JOIN beerType
  				  INNER JOIN countries
  				  INNER JOIN states
  				  ON beer.idProducer = producer.idProducer
  				  AND beer.idBeerType = beerType.idBeerType
  				  AND producer.country_id = countries.id
  				  AND producer.state_id = states.id
  				  ORDER BY beer.idBeer DESC";
  		$result = mysql_query($query) or die(mysql_error());
  		while ($line = mysql_fetch_array($result)) {
  		echo '
  			<tr>
		  		<th scope="row">'.$line["idBeer"].'</th>
		  		<td>'.$line["beerName"].'</td>
		  		<td>'.$line["producerName"].'</td>
		  		<td>'.$line["name_c"].'</td>
		  		<td>'.$line["name_s"].'</td>
		  		<td>'.$line["beerTypeName"].'</td>
		  		<td>'.$line["beerDescription"].'</td>
		  		<td>'.$line["beerStrength"].'</td>
		  		<td>'.$line["beerIBUS"].'</td>
		  		<td>
		 ';
		  				if(strlen($line['beerSite'])>0)
		  					echo '<a href="'.$line["beerSite"].'">Go to site.</a>';
		  				else
		  					echo 'No Site';
		echo '
		  		</td>
		  		<td>
		';
		  				if(strlen($line['beerFacebook'])>0)
		  					echo '<a href="'.$line["beerFacebook"].'">Go to Facebook.</a>';
		  				else
		  					echo 'No Facebook';
		echo '
		  		</td>
		  		<td>
		';
		  				if(strlen($line['beerTwitter'])>0)
		  					echo '<a href="'.$line["beerTwitter"].'">Go to Twitter.</a>';
		  				else
		  					echo 'No Twitter';
		echo '
		  		</td>
		  		<td>
		';
		  				if(strlen($line['beerInstagram'])>0)
		  					echo '<a href="'.$line["beerInstagram"].'">Go to Instagram.</a>';
		  				else
		  					echo 'No Instagram';
		echo '
		  		</td>
		  		<td>

		  			<a href="#/beer/'.$line['idBeer'].'"><span class="label label-default" ng-click="selectItemBeer(1)" style="cursor:pointer">Details</span></a>
		  			<span class="label label-danger deleteBeer" name='.$line['idBeer'].' style="cursor:pointer">Delete</span>
		  		</td>
		  	</tr>

		  	';
  		}
	}

	function addBeerType($data){
		$query = "SELECT beerTypeName FROM beertype WHERE beerTypeName = '$data'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_num_rows($result);
		if($row>0){
			echo "0";
		}else{
			mysql_free_result($result);
			$data = strtolower($data);
			$query = "INSERT INTO beertype (beerTypeName) VALUES ('$data')";
			$result = mysql_query($query) or die(mysql_error());

			$query = "SELECT * FROM beertype ORDER BY beerTypeName ASC";
			$result = mysql_query($query) or die(mysql_error());
			echo '<option disabled selected value="">Select a beer type</option>';
			while($line=mysql_fetch_array($result)){
				echo '<option value="'.$line["idBeerType"].'" name="'.$line["idBeerType"].'">'.$line["beerTypeName"].'</option>';
			}
		}
	}

	function addNewBeer(){
		parse_str($_POST['action'], $formData);
		$fileNames = []; //imgProfile, imgCover, imgBottle
		$indice = 0;
		foreach ($_FILES['beerImage']["error"]  as $key => $value) {
			$fileName = $_FILES["beerImage"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["beerImage"]["type"][$key], PATHINFO_EXTENSION);
			array_push($fileNames, $fileName);
			$fileType = $_FILES["beerImage"]["type"][$key];
			$fileTemp = $_FILES["beerImage"]["tmp_name"][$key];
			if($indice==0)
				move_uploaded_file($fileTemp, "../../images/beerProfiles/".$fileName);
			if($indice==1)
				move_uploaded_file($fileTemp, "../../images/beerCovers/".$fileName);
			if($indice==2)
				move_uploaded_file($fileTemp, "../../images/beerBottles/".$fileName);
			$indice++;
		}

		$query = "INSERT INTO beerslider (idSlider) VALUES (NULL);";
		$result = mysql_query($query) or die(mysql_error());
		$idBeerslider = mysql_insert_id();
		$query = "INSERT INTO beer (beerName,beerDescription,beerStrength,beerIBUS,beerProfileImage,beerCoverImage,beerBottleImage,beerSite,beerFacebook,beerTwitter,beerInstagram,idProducer,idSlider,idBeerType)VALUES ('".$formData['name']."','".$formData['description']."','".$formData['strength']."','".$formData['ibus']."','".$fileNames[0]."','".$fileNames[1]."','".$fileNames[2]."','".$formData['site']."','".$formData['facebook']."','".$formData['twitter']."','".$formData['instagram']."',".$formData['producer'].",".$idBeerslider.",".$formData['beerType'].")";
		$result = mysql_query($query) or die(mysql_error());

		functionPrintBeerList();
	}

	function deleteBeer($id){
		$query = "SELECT  idSlider FROM beer WHERE idBeer = $id";
		$result = mysql_query($query) or die(mysql_error());
		$line = mysql_fetch_array($result);
		$idSlider = $line['idSlider'];

		$query= "DELETE FROM beer WHERE idBeer = $id";
		$result = mysql_query($query) or die(mysql_error());

		$query = "DELETE FROM bannerBeerSlider WHERE idSlider = $idSlider";
		$result = mysql_query($query) or die(mysql_error());

		$query= "DELETE FROM beerSlider WHERE idSlider = $idSlider";
		$result = mysql_query($query) or die(mysql_error());

		$query= "DELETE FROM ranksListElement WHERE idBeer = $id";
		$result = mysql_query($query) or die(mysql_error());

		$query= "DELETE FROM wishListElement WHERE idBeer = $id";
		$result = mysql_query($query) or die(mysql_error());

		$query= "DELETE FROM favoriteElement WHERE idBeer = $id";
		$result = mysql_query($query) or die(mysql_error());

		functionPrintBeerList();
	}

	function addBannerImage($id){
		foreach ($_FILES['bannerImage']["error"]  as $key => $value) {
			$fileName = $_FILES["bannerImage"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["bannerImage"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["bannerImage"]["type"][$key];
			$fileTemp = $_FILES["bannerImage"]["tmp_name"][$key];

			move_uploaded_file($fileTemp, "../../images/beerBanners/".$fileName);

			$query = "SELECT idSlider FROM beer WHERE idBeer = $id";
			$result = mysql_query($query) or die(mysql_error());
			$line = mysql_fetch_array($result);
			$idSlider = $line['idSlider'];

			$query = "INSERT INTO bannerbeerslider (bannerImage, idSlider) VALUES ('$fileName', $idSlider)";
			$result = mysql_query($query) or die(mysql_error());
		}
	}

	function deleteBaner($id){
		$query= "DELETE FROM bannerbeerslider WHERE idBannerBeerSlider = $id";
		$result = mysql_query($query) or die(mysql_error());
	}

	function editBeer($id){
		parse_str($_POST['action'], $formData);
		$fileNames = [];

		if(isset($_FILES['beerProfileImage'])){
			foreach ($_FILES['beerProfileImage']["error"]  as $key => $value) {
				$fileName = $_FILES["beerProfileImage"]["name"][$key];
				$fileName = date("YmdHis").pathinfo($_FILES["beerProfileImage"]["type"][$key], PATHINFO_EXTENSION);
				array_push($fileNames, $fileName);
				$fileType = $_FILES["beerProfileImage"]["type"][$key];
				$fileTemp = $_FILES["beerProfileImage"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../../images/beerProfiles/".$fileName);
			}
		}else{
			array_push($fileNames, $_POST['beerProfileImageName']);
		}

		if(isset($_FILES['beerCoverImage'])){
			foreach ($_FILES['beerCoverImage']["error"]  as $key => $value) {
				$fileName = $_FILES["beerCoverImage"]["name"][$key];
				$fileName = date("YmdHis").pathinfo($_FILES["beerCoverImage"]["type"][$key], PATHINFO_EXTENSION);
				array_push($fileNames, $fileName);
				$fileType = $_FILES["beerCoverImage"]["type"][$key];
				$fileTemp = $_FILES["beerCoverImage"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../../images/beerCovers/".$fileName);
			}
		}else{
				array_push($fileNames, $_POST['beerCoverImageName']);
		}

		if(isset($_FILES['beerBottleImage'])){
			foreach ($_FILES['beerBottleImage']["error"]  as $key => $value) {
				$fileName = $_FILES["beerBottleImage"]["name"][$key];
				$fileName = date("YmdHis").pathinfo($_FILES["beerBottleImage"]["type"][$key], PATHINFO_EXTENSION);
				array_push($fileNames, $fileName);
				$fileType = $_FILES["beerBottleImage"]["type"][$key];
				$fileTemp = $_FILES["beerBottleImage"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../../images/beerBottles/".$fileName);
			}
		}else{
				array_push($fileNames, $_POST['beerBottleImageName']);
		}

		$query = "UPDATE beer SET
							beerName = '".$formData['name']."',
							beerDescription = '".$formData['description']."',
							beerStrength = '".$formData['strength']."',
							beerIBUS = '".$formData['ibus']."',
							beerProfileImage = '".$fileNames[0]."',
							beerCoverImage = '".$fileNames[1]."',
							beerBottleImage = '".$fileNames[2]."',
							beerSite = '".$formData['site']."',
							beerFacebook = '".$formData['facebook']."',
							beerTwitter = '".$formData['twitter']."',
							beerInstagram = '".$formData['instagram']."',
							idProducer = ".$formData['producer'].",
							idBeerType = ".$formData['beerType']."
							WHERE idBeer = ".$id;
			$result = mysql_query($query) or die(mysql_error());

	}

	///////////////////////////////////
	function functionPrintProducerList(){
  		$query = "SELECT * FROM producer
  				  INNER JOIN producertype
  				  INNER JOIN countries
  				  INNER JOIN states
  				  ON producer.idProducerType = producertype.idProducerType
  				  AND producer.country_id = countries.id
  				  AND producer.state_id = states.id
  				  ORDER BY producer.idProducer DESC";
  		$result = mysql_query($query) or die(mysql_error());
  		while ($line = mysql_fetch_array($result)) {
  		echo '
  			<tr>
		  		<th scope="row">'.$line["idProducer"].'</th>
					<td>'.$line["producerName"].'</td>
		  		<td>'.$line["producerDescription"].'</td>
		  		<td>'.$line["producerTypeName"].'</td>
		  		<td>'.$line["name_c"].'</td>
		  		<td>'.$line["name_s"].'</td>
		  		<td>'.$line["producerAddress"].'</td>
		  		<td>'.$line["producerZip"].'</td>
		  		<td>'.$line["producerPhone"].'</td>
		  		<td>'.$line["producerEmail"].'</td>
		  		<td>
		 ';
		  				if(strlen($line['producerSite'])>0)
		  					echo '<a href="'.$line["producerSite"].'">Go to site.</a>';
		  				else
		  					echo 'No Site';
		echo '
		  		</td>
		  		<td>
		';
		  				if(strlen($line['producerFacebook'])>0)
		  					echo '<a href="'.$line["producerFacebook"].'">Go to Facebook.</a>';
		  				else
		  					echo 'No Facebook';
		echo '
		  		</td>
		  		<td>
		';
		  				if(strlen($line['producerTwitter'])>0)
		  					echo '<a href="'.$line["producerTwitter"].'">Go to Twitter.</a>';
		  				else
		  					echo 'No Twitter';
		echo '
		  		</td>
		  		<td>
		';
		  				if(strlen($line['producerInstagram'])>0)
		  					echo '<a href="'.$line["producerInstagram"].'">Go to Instagram.</a>';
		  				else
		  					echo 'No Instagram';
		echo '
		  		</td>
		  		<td>

		  			<a href="#/producer/'.$line['idProducer'].'"><span class="label label-default" ng-click="selectItemBeer(1)" style="cursor:pointer">Details</span></a>
		  			<span class="label label-danger deleteProducer" name='.$line['idProducer'].' style="cursor:pointer">Delete</span>
		  		</td>
		  	</tr>

		  	';
  		}
	}

	function addProducerType($data){
		$query = "SELECT producerTypeName FROM producertype WHERE producerTypeName = '$data'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_num_rows($result);
		if($row>0){
			echo "0";
		}else{
			mysql_free_result($result);
			$data = strtolower($data);
			$query = "INSERT INTO producertype (producerTypeName) VALUES ('$data')";
			$result = mysql_query($query) or die(mysql_error());

			$query = "SELECT * FROM producertype ORDER BY producerTypeName ASC";
			$result = mysql_query($query) or die(mysql_error());
			echo '<option disabled selected value="">Select a producer type</option>';
			while($line=mysql_fetch_array($result)){
				echo '<option value="'.$line["idProducerType"].'" name="'.$line["idProducerType"].'">'.$line["producerTypeName"].'</option>';
			}
		}
	}

	function addNewProducer(){
		parse_str($_POST['action'], $formData);
		$fileNames = []; //imgProfile, imgCover
		$indice = 0;
		foreach ($_FILES['producerImage']["error"]  as $key => $value) {
			$fileName = $_FILES["producerImage"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["producerImage"]["type"][$key], PATHINFO_EXTENSION);
			array_push($fileNames, $fileName);
			$fileType = $_FILES["producerImage"]["type"][$key];
			$fileTemp = $_FILES["producerImage"]["tmp_name"][$key];
			if($indice==0)
				move_uploaded_file($fileTemp, "../../images/producerProfiles/".$fileName);
			if($indice==1)
				move_uploaded_file($fileTemp, "../../images/producerCovers/".$fileName);
			$indice++;
		}

		$query = "INSERT INTO beerslider (idSlider) VALUES (NULL);";
		$result = mysql_query($query) or die(mysql_error());
		$idBeerslider = mysql_insert_id();
		$query = "INSERT INTO producer (producerName, producerDescription, producerAddress, producerZip,producerPhone, producerEmail, producerProfileImage, producerCoverImage, producerSite, producerFacebook, producerTwitter, producerInstagram, country_id, state_id, idProducerType) VALUES ('".$formData['name']."', '".$formData['description']."', '".$formData['address']."', '".$formData['zip']."', '".$formData['phone']."', '".$formData['email']."', '".$fileNames[0]."', '".$fileNames[1]."', '".$formData['site']."', '".$formData['facebook']."', '".$formData['twitter']."', '".$formData['instagram']."', ".$formData['country'].", ".$formData['state'].", ".$formData['type']." )";
		$result = mysql_query($query) or die(mysql_error());

		functionPrintProducerList();
	}

	function deleteProducer($id){
		$query = "SELECT * FROM beer WHERE idProducer = $id";
		$result2 = mysql_query($query) or die(mysql_error());
		while ($line = mysql_fetch_array($result2)) {

			$idSlider = $line['idSlider'];
			$idBeer = $line['idBeer'];

			$query= "DELETE FROM beer WHERE idBeer = $idBeer";
			$result = mysql_query($query) or die(mysql_error());

			$query = "DELETE FROM bannerBeerSlider WHERE idSlider = $idSlider";
			$result = mysql_query($query) or die(mysql_error());

			$query= "DELETE FROM beerSlider WHERE idSlider = $idSlider";
			$result = mysql_query($query) or die(mysql_error());

			$query= "DELETE FROM ranksListElement WHERE idBeer = $idBeer";
			$result = mysql_query($query) or die(mysql_error());

			$query= "DELETE FROM wishListElement WHERE idBeer = $idBeer";
			$result = mysql_query($query) or die(mysql_error());

			$query= "DELETE FROM favoriteElement WHERE idBeer = $idBeer";
			$result = mysql_query($query) or die(mysql_error());

		}

		$query= "DELETE FROM producer WHERE idProducer = $id";
		$result = mysql_query($query) or die(mysql_error());


		functionPrintProducerList();
	}

	function editProducer($id){
		parse_str($_POST['action'], $formData);
		$fileNames = [];

		if(isset($_FILES['producerProfileImage'])){
			foreach ($_FILES['producerProfileImage']["error"]  as $key => $value) {
				$fileName = $_FILES["producerProfileImage"]["name"][$key];
				$fileName = date("YmdHis").pathinfo($_FILES["producerProfileImage"]["type"][$key], PATHINFO_EXTENSION);
				array_push($fileNames, $fileName);
				$fileType = $_FILES["producerProfileImage"]["type"][$key];
				$fileTemp = $_FILES["producerProfileImage"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../../images/producerProfiles/".$fileName);
			}
		}else{
			array_push($fileNames, $_POST['producerProfileImage']);
		}

		if(isset($_FILES['producerCoverImage'])){
			foreach ($_FILES['producerCoverImage']["error"]  as $key => $value) {
				$fileName = $_FILES["producerCoverImage"]["name"][$key];
				$fileName = date("YmdHis").pathinfo($_FILES["producerCoverImage"]["type"][$key], PATHINFO_EXTENSION);
				array_push($fileNames, $fileName);
				$fileType = $_FILES["producerCoverImage"]["type"][$key];
				$fileTemp = $_FILES["producerCoverImage"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../../images/producerCovers/".$fileName);
			}
		}else{
				array_push($fileNames, $_POST['producerCoverImage']);
		}

		$query = "UPDATE producer SET
							producerName = '".$formData['name']."',
							producerDescription = '".$formData['description']."',
							producerAddress = '".$formData['address']."',
							producerZip = '".$formData['zip']."',
							producerPhone = '".$formData['phone']."',
							producerEmail = '".$formData['email']."',
							producerProfileImage = '".$fileNames[0]."',
							producerCoverImage = '".$fileNames[1]."',
							producerSite = '".$formData['site']."',
							producerFacebook = '".$formData['facebook']."',
							producerTwitter = '".$formData['twitter']."',
							producerInstagram = '".$formData['instagram']."',
							country_id = ".$formData['country'].",
							state_id = ".$formData['state'].",
							idProducerType = ".$formData['type']."
							WHERE idProducer = ".$id;
			$result = mysql_query($query) or die(mysql_error());

	}

	///////////////////////////////////
	function functionPrintRawMaterialList(){
			$query = "SELECT * FROM rawmaterial ORDER BY idRawMaterial DESC";
			$result = mysql_query($query) or die(mysql_error());
			while ($line = mysql_fetch_array($result)) {
			echo '
				<tr>
					<th scope="row">'.$line["idRawMaterial"].'</th>
					<td>'.$line["rawMaterialName"].'</td>

					<td>
			';
						$query2 = "SELECT * FROM rawmaterial_has_rawmaterialtype
						  			INNER JOIN rawmaterialtype
										ON rawmaterial_has_rawmaterialtype.idDrawMaterialType = rawmaterialtype.idDrawMaterialType
										WHERE rawmaterial_has_rawmaterialtype.idRawMaterial = ".$line['idRawMaterial'];
						$result2 = mysql_query($query2) or die(mysql_error());
						while($line2 = mysql_fetch_array($result2)){
							echo $line2['rawMaterialTypeName']." ";
						}
			echo '
					</td>
					<td>'.$line["rawMaterialGeneralDescription"].'</td>
					<td>'.$line["rawMaterialDescription"].'</td>
					<td>'.$line["rawMaterialAddress"].'</td>
					<td>'.$line["rawMaterialZip"].'</td>
					<td>'.$line["rawMaterialPhone"].'</td>
					<td>'.$line["rawMaterialEmail"].'</td>
					<td>
		 ';
							if(strlen($line['rawMaterialSite'])>0)
								echo '<a href="'.$line["rawMaterialSite"].'">Go to site.</a>';
							else
								echo 'No Site';
		echo '
					</td>
					<td>
		';
							if(strlen($line['rawMaterialFacebook'])>0)
								echo '<a href="'.$line["rawMaterialFacebook"].'">Go to Facebook.</a>';
							else
								echo 'No Facebook';
		echo '
					</td>
					<td>
		';
							if(strlen($line['rawMaterialTwitter'])>0)
								echo '<a href="'.$line["rawMaterialTwitter"].'">Go to Twitter.</a>';
							else
								echo 'No Twitter';
		echo '
					</td>
					<td>
		';
							if(strlen($line['rawMaterialInstagram'])>0)
								echo '<a href="'.$line["rawMaterialInstagram"].'">Go to Instagram.</a>';
							else
								echo 'No Instagram';
		echo '
					</td>
					<td>

						<a href="#/rawmaterial/'.$line['idRawMaterial'].'"><span class="label label-default" ng-click="selectItemBeer(1)" style="cursor:pointer">Details</span></a>
						<span class="label label-danger deleteRawMaterial" name='.$line['idRawMaterial'].' style="cursor:pointer">Delete</span>
					</td>
				</tr>

				';
			}
	}

	function addRawMaterialType($data){
		$query = "SELECT rawMaterialTypeName FROM rawmaterialtype WHERE rawMaterialTypeName = '$data'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_num_rows($result);
		if($row>0){
			echo "0";
		}else{
			mysql_free_result($result);
			$data = strtolower($data);
			$query = "INSERT INTO rawmaterialtype (rawMaterialTypeName) VALUES ('$data')";
			$result = mysql_query($query) or die(mysql_error());

			$query = "SELECT * FROM rawmaterialtype ORDER BY rawMaterialTypeName";
			$result = mysql_query($query) or die (mysql_error());
			while($line = mysql_fetch_array($result)){
				echo '<div class="checkbox">';
				echo '<label><input name="rawMaterialTypeList[]" type="checkbox" value="'.$line["idDrawMaterialType"].'">'.$line["rawMaterialTypeName"].'</label>';
				echo '</div>';
			}
		}
	}

	function addNewRawMaterial(){
		parse_str($_POST['action'], $formData);
		$fileNames = []; //imgProfile, imgCover
		$indice = 0;
		foreach ($_FILES['rawMaterialImage']["error"]  as $key => $value) {
			$fileName = $_FILES["rawMaterialImage"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["rawMaterialImage"]["type"][$key], PATHINFO_EXTENSION);
			array_push($fileNames, $fileName);
			$fileType = $_FILES["rawMaterialImage"]["type"][$key];
			$fileTemp = $_FILES["rawMaterialImage"]["tmp_name"][$key];
			if($indice==0)
				move_uploaded_file($fileTemp, "../../images/rawMaterialProfiles/".$fileName);
			if($indice==1)
				move_uploaded_file($fileTemp, "../../images/rawMaterialCovers/".$fileName);
			$indice++;
		}

		$query = "INSERT INTO rawmaterial (
				rawMaterialName,
				rawMaterialGeneralDescription,
				rawMaterialDescription,
				rawMaterialDescriptionHTML,
				rawMaterialLatitude,
				rawMaterialLongitude,
				rawMaterialAddress,
				rawMaterialZip,
				rawMaterialPhone,
				rawMaterialEmail,
				rawMaterialProfileImage,
				rawMaterialCoverImage,
				rawMaterialSite,
				rawMaterialFacebook,
				rawMaterialTwitter,
				rawMaterialInstagram) VALUES (
					'".$formData['name']."',
					'".$formData['general-description']."',
					'".$formData['description']."',
					'".$formData['descriptionhtml']."',
					'".$formData['latitude']."',
					'".$formData['longitude']."',
					'".$formData['address']."',
					'".$formData['zip']."',
					'".$formData['phone']."',
					'".$formData['email']."',
					'".$fileNames[0]."',
					'".$fileNames[1]."',
					'".$formData['site']."',
					'".$formData['facebook']."',
					'".$formData['twitter']."',
					'".$formData['instagram']."')";

		$result = mysql_query($query) or die(mysql_error());

		$idRawMaterial = mysql_insert_id();
		foreach ($formData['rawMaterialTypeList'] as $check) {
			$query = "INSERT INTO rawmaterial_has_rawmaterialtype (idRawMaterial, idDrawMaterialType ) VALUES ($idRawMaterial, $check)";
			$result = mysql_query($query) or die(mysql_error());
 		}

		functionPrintRawMaterialList();
	}

	function deleteRawMaterial($id){

		$query= "DELETE FROM rawmaterial_has_rawmaterialtype WHERE idRawMaterial = $id";
		$result = mysql_query($query) or die(mysql_error());

		$query= "DELETE FROM rawmaterial WHERE idRawMaterial = $id";
		$result = mysql_query($query) or die(mysql_error());

		functionPrintRawMaterialList();
	}

	function editRawMaterial($id){
		parse_str($_POST['action'], $formData);
		$fileNames = [];

		if(isset($_FILES['rawMaterialProfileImage'])){
			foreach ($_FILES['rawMaterialProfileImage']["error"]  as $key => $value) {
				$fileName = $_FILES["rawMaterialProfileImage"]["name"][$key];
				$fileName = date("YmdHis").pathinfo($_FILES["rawMaterialProfileImage"]["type"][$key], PATHINFO_EXTENSION);
				array_push($fileNames, $fileName);
				$fileType = $_FILES["rawMaterialProfileImage"]["type"][$key];
				$fileTemp = $_FILES["rawMaterialProfileImage"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../../images/rawMaterialProfiles/".$fileName);
			}
		}else{
			array_push($fileNames, $_POST['rawMaterialProfileImage']);
		}

		if(isset($_FILES['rawMaterialCoverImage'])){
			foreach ($_FILES['rawMaterialCoverImage']["error"]  as $key => $value) {
				$fileName = $_FILES["rawMaterialCoverImage"]["name"][$key];
				$fileName = date("YmdHis").pathinfo($_FILES["rawMaterialCoverImage"]["type"][$key], PATHINFO_EXTENSION);
				array_push($fileNames, $fileName);
				$fileType = $_FILES["rawMaterialCoverImage"]["type"][$key];
				$fileTemp = $_FILES["rawMaterialCoverImage"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../../images/rawMaterialCovers/".$fileName);
			}
		}else{
				array_push($fileNames, $_POST['rawMaterialCoverImage']);
		}

		$query = "UPDATE rawmaterial SET
							rawMaterialName = '".$formData['name']."',
							rawMaterialGeneralDescription = '".$formData['general-description']."',
							rawMaterialDescription = '".$formData['description']."',
							rawMaterialDescriptionHTML = '".$formData['descriptionhtml']."',
							rawMaterialLatitude = '".$formData['latitude']."',
							rawMaterialLongitude = '".$formData['longitude']."',
							rawMaterialAddress = '".$formData['address']."',
							rawMaterialZip = '".$formData['zip']."',
							rawMaterialPhone = '".$formData['phone']."',
							rawMaterialEmail = '".$formData['email']."',
							rawMaterialProfileImage = '".$fileNames[0]."',
							rawMaterialCoverImage = '".$fileNames[1]."',
							rawMaterialSite = '".$formData['site']."',
							rawMaterialFacebook = '".$formData['facebook']."',
							rawMaterialTwitter = '".$formData['twitter']."',
							rawMaterialInstagram = '".$formData['instagram']."'
							WHERE idRawMaterial = ".$id;
			$result = mysql_query($query) or die(mysql_error());

			$idRawMaterial = $id;
			$query = "DELETE FROM rawmaterial_has_rawmaterialtype WHERE idRawMaterial = $idRawMaterial";
			$result = mysql_query($query) or die(mysql_error());

			foreach ($formData['rawMaterialTypeList'] as $check) {
				$query = "INSERT INTO rawmaterial_has_rawmaterialtype (idRawMaterial, idDrawMaterialType ) VALUES ($idRawMaterial, $check)";
				$result = mysql_query($query) or die(mysql_error());
	 		}

	}

	//////////////////////////////////
	function addHomeBannerImage(){
		foreach ($_FILES['bannerImage']["error"]  as $key => $value) {
			$fileName = $_FILES["bannerImage"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["bannerImage"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["bannerImage"]["type"][$key];
			$fileTemp = $_FILES["bannerImage"]["tmp_name"][$key];

			move_uploaded_file($fileTemp, "../../images/homeBanners/".$fileName);

			$query = "INSERT INTO bannersliderhome (bannerSliderHomeImage, bannerSliderHomeUrl) VALUES ('$fileName', '".$_POST['urlBanner']."')";
			$result = mysql_query($query) or die(mysql_error());
		}
	}

	function deleteHomeBanner($id){
		$query= "DELETE FROM bannersliderhome WHERE idBannerSliderHome = $id";
		$result = mysql_query($query) or die(mysql_error());
	}

	//////////////////////////////////
	function addNewBannerImage(){
		parse_str($_POST['action'], $formData);

		foreach ($_FILES['bannerImage']["error"]  as $key => $value) {
			$fileName = $_FILES["bannerImage"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["bannerImage"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["bannerImage"]["type"][$key];
			$fileTemp = $_FILES["bannerImage"]["tmp_name"][$key];

			move_uploaded_file($fileTemp, "../../images/newBanners/".$fileName);

			$query = "INSERT INTO  bannerslidernew (bannerSliderNewTitle, bannerSliderNewSubtitle, bannerSliderNewDescription, bannerSliderNewUrl, bannerSliderNewImage) VALUES ('".$formData["bannerTitle"]."', '".$formData["bannerSubtitle"]."', '".$formData["bannerDescription"]."', '".$formData["bannerUrl"]."', '$fileName' )";
			$result = mysql_query($query) or die(mysql_error());
		}
	}

	function deleteNewBanner($id){
		$query= "DELETE FROM bannerslidernew WHERE idBannerSliderNew = $id";
		$result = mysql_query($query) or die(mysql_error());
	}

	//////////////////////////////////
	function addPostBannerImage(){
		parse_str($_POST['action'], $formData);

		foreach ($_FILES['bannerImage']["name"]  as $key => $value) {
			$fileName = $_FILES["bannerImage"]["name"][$key];
			echo $_FILES["bannerImage"]["size"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["bannerImage"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["bannerImage"]["type"][$key];
			$fileTemp = $_FILES["bannerImage"]["tmp_name"][$key];

			move_uploaded_file($fileTemp, "../../images/postBanners/".$fileName);

			$query = "INSERT INTO  bannersliderpost (bannerSliderPostTitle, bannerSliderPostSubtitle, bannerSliderPostDescription, bannerSliderPostUrl, bannerSliderPostImage) VALUES ('".$formData["bannerTitle"]."', '".$formData["bannerSubtitle"]."', '".$formData["bannerDescription"]."', '".$formData["bannerUrl"]."', '$fileName' )";
			$result = mysql_query($query) or die(mysql_error());

		}
	}

	function deletePostBanner($id){
		$query= "DELETE FROM bannersliderpost WHERE idBannerSliderPost = $id";
		$result = mysql_query($query) or die(mysql_error());
	}

	//////////////////////////////////
	function modifyStatus($status, $idUser){

		$query = "UPDATE user SET userStatus = $status WHERE idUser =  $idUser";
		$result = mysql_query($query) or die(mysql_error());

	}
