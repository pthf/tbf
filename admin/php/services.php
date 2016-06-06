<?php
	include("connect_bd.php");
	connect_base_de_datos();

	$namefunction = $_GET['namefunction'];
	switch ($namefunction) {
		case 'getBeerImages':
			getBeerImages($_GET['id']);
			break;
		case 'getBeer':
			getBeer($_GET['id']);
			break;
		case 'getBanners':
			getBanners($_GET['id']);
			break;
		case 'getProducerImages':
			getProducerImages($_GET['id']);
			break;
		case 'getProducer':
			getProducer($_GET['id']);
			break;
		case 'getRawMaterialImages':
			getRawMaterialImages($_GET['id']);
			break;
		case 'getRawMaterial':
			getRawMaterial($_GET['id']);
			break;
		case 'getTypeRawMaterial':
			getTypeRawMaterial($_GET['id']);
			break;
		case 'getHomeBanners':
			getHomeBanners();
			break;
		case 'getNewBanners':
			getNewBanners();
			break;
		case 'getPostBanners':
			getPostBanners();
			break;
		case 'getUsers':
			getUsers();
			break;
	}

	function getBeerImages($id){
		$query = "SELECT * FROM beer WHERE idBeer = $id";
		$result = mysql_query($query) or die(mysql_error());
		$line = mysql_fetch_array($result);

		$data = array();
		$data[] = array(
			'beerProfileImage' => $line['beerProfileImage'],
			'beerCoverImage' => $line['beerCoverImage'],
			'beerBottleImage' => $line['beerBottleImage']
		);
		echo json_encode($data);

	}

	function getBeer($id){
		$query = "SELECT * FROM beer
			INNER JOIN producer ON beer.idProducer = producer.idProducer
			INNER JOIN beertype ON beer.idBeerType = beertype.idBeerType WHERE beer.idBeer = $id";
		$result = mysql_query($query) or die(mysql_error());
		$line = mysql_fetch_array($result);

		$data = array();
		$data[] = array(
			'beerId' => $id,
			'beerName' => $line['beerName'],
			'beerDescription' => $line['beerDescription'],
			'beerStrength' => $line['beerStrength'],
			'beerIBUS' => $line['beerIBUS'],
			'beerProfileImage' => $line['beerProfileImage'],
			'beerCoverImage' => $line['beerCoverImage'],
			'beerBottleImage' => $line['beerBottleImage'],
			'beerSite' => $line['beerSite'],
			'beerFacebook' => $line['beerFacebook'],
			'beerTwitter' => $line['beerTwitter'],
			'beerInstagram' => $line['beerInstagram'],
			'idProducer' => $line['idProducer'],
			'producerName' => $line['producerName'],
			'idBeerType' => $line['idBeerType'],
			'beerTypeName' => $line['beerTypeName']
		);
		echo json_encode($data);
	}

	function getBanners($id){
		$query = "SELECT idSlider FROM beer WHERE idBeer = $id";
		$result = mysql_query($query) or die(mysql_error());
		$line = mysql_fetch_array($result);
		$idSlider = $line['idSlider'];

		$query = "SELECT * FROM bannerbeerslider WHERE idSlider = $idSlider";
		$result = mysql_query($query) or die(mysql_error());
		$data = array();

		while($line = mysql_fetch_array($result)){
			$data[] = array(
				'idBannerBeerSlider' => $line['idBannerBeerSlider'],
				'bannerImage' => $line['bannerImage']
			);
		}

		echo json_encode($data);
	}

	function getProducerImages($id){
		$query = "SELECT * FROM producer WHERE idProducer = $id";
		$result = mysql_query($query) or die(mysql_error());
		$line = mysql_fetch_array($result);

		$data = array();
		$data[] = array(
			'producerProfileImage' => $line['producerProfileImage'],
			'producerCoverImage' => $line['producerCoverImage']
		);
		echo json_encode($data);

	}

	function getProducer($id){
		$query = "SELECT * FROM producer
			INNER JOIN producertype ON producer.idProducerType = producertype.idProducerType
			INNER JOIN states ON producer.state_id = states.id
			INNER JOIN countries ON producer.country_id = countries.id
			WHERE producer.idProducer = $id";
		$result = mysql_query($query) or die(mysql_error());
		$line = mysql_fetch_array($result);

		$data = array();
		$data[] = array(
			'idProducer' => $line['idProducer'],
			'producerName' => $line['producerName'],
			'producerDescription' => $line['producerDescription'],
			'producerAddress' => $line['producerAddress'],
			'producerZip' => $line['producerZip'],
			'producerPhone' => $line['producerPhone'],
			'producerEmail' => $line['producerEmail'],
			'producerProfileImage' => $line['producerProfileImage'],
			'producerCoverImage' => $line['producerCoverImage'],
			'producerSite' => $line['producerSite'],
			'producerFacebook' => $line['producerFacebook'],
			'producerTwitter' => $line['producerTwitter'],
			'producerInstagram' => $line['producerInstagram'],
			'country_id' => $line['country_id'],
			'name_c' => $line['name_c'],
			'state_id' => $line['state_id'],
			'name_s' => $line['name_s'],
			'idProducerType' => $line['idProducerType'],
			'producerTypeName' => $line['producerTypeName'],
			'city' => $line['city']
		);
		echo json_encode($data);
	}

	function getRawMaterialImages($id){
		$query = "SELECT * FROM rawmaterial WHERE idRawMaterial = $id";
		$result = mysql_query($query) or die(mysql_error());
		$line = mysql_fetch_array($result);

		$data = array();
		$data[] = array(
			'rawMaterialProfileImage' => $line['rawMaterialProfileImage'],
			'rawMaterialCoverImage' => $line['rawMaterialCoverImage']
		);
		echo json_encode($data);

	}

	function getRawMaterial($id){
		$query = "SELECT * FROM rawmaterial
							INNER JOIN states ON rawmaterial.state_id = states.id
							INNER JOIN countries ON rawmaterial.country_id = countries.id
							WHERE idRawMaterial = $id";
		$result = mysql_query($query) or die(mysql_error());
		$line = mysql_fetch_array($result);

		$data = array();
		$data[] = array(
			'city' => $line['city'],
			'idRawMaterial' => $line['idRawMaterial'],
			'rawMaterialName' => $line['rawMaterialName'],
			'rawMaterialGeneralDescription' => $line['rawMaterialGeneralDescription'],
			'rawMaterialDescription' => $line['rawMaterialDescription'],
			'rawMaterialDescriptionHTML' => $line['rawMaterialDescriptionHTML'],
			'rawMaterialLatitude' => $line['rawMaterialLatitude'],
			'rawMaterialLongitude' => $line['rawMaterialLongitude'],
			'rawMaterialAddress' => $line['rawMaterialAddress'],
			'rawMaterialZip' => $line['rawMaterialZip'],
			'rawMaterialPhone' => $line['rawMaterialPhone'],
			'rawMaterialEmail' => $line['rawMaterialEmail'],
			'rawMaterialSite' => $line['rawMaterialSite'],
			'rawMaterialFacebook' => $line['rawMaterialFacebook'],
			'rawMaterialTwitter' => $line['rawMaterialTwitter'],
			'rawMaterialInstagram' => $line['rawMaterialInstagram'],
			'rawMaterialProfileImage' => $line['rawMaterialProfileImage'],
			'rawMaterialCoverImage' => $line['rawMaterialCoverImage'],
			'country_id' => $line['country_id'],
			'name_c' => $line['name_c'],
			'state_id' => $line['state_id'],
			'name_s' => $line['name_s']
		);
		echo json_encode($data);
	}

	function getTypeRawMaterial($id){
		$query = "SELECT * FROM rawmaterialtype";
		$result = mysql_query($query) or die(mysql_error());
		$data = array();
		while($line = mysql_fetch_array($result)){
			$verify = false;
			$query2 = "SELECT * FROM rawmaterial_has_rawmaterialtype
								WHERE idRawMaterial = $id
								AND idDrawMaterialType = ".$line['idDrawMaterialType'];
			$result2 = mysql_query($query2) or die(mysql_error());
			if(mysql_num_rows($result2)>0)
				$verify = true;
			$data[] = array(
				'idDrawMaterialType' => $line['idDrawMaterialType'],
				'rawMaterialTypeName' => $line['rawMaterialTypeName'],
				'verify' => $verify
			);
		}
		echo json_encode($data);
	}

	function getHomeBanners(){

		$query = "SELECT * FROM bannersliderhome";
		$result = mysql_query($query) or die(mysql_error());
		$data = array();

		while($line = mysql_fetch_array($result)){
			$data[] = array(
				'language' => $line['language'],
				'idBannerSliderHome' => $line['idBannerSliderHome'],
				'bannerSliderHomeImage' => $line['bannerSliderHomeImage'],
				'bannerSliderHomeUrl' => $line['bannerSliderHomeUrl']
			);
		}

		echo json_encode($data);
	}

	function getNewBanners(){

		$query = "SELECT * FROM bannerslidernew";
		$result = mysql_query($query) or die(mysql_error());
		$data = array();

		while($line = mysql_fetch_array($result)){
			$data[] = array(
				'language' => $line['language'],
				'idBannerSliderNew' => $line['idBannerSliderNew'],
				'bannerSliderNewTitle' => $line['bannerSliderNewTitle'],
				'bannerSliderNewSubtitle' => $line['bannerSliderNewSubtitle'],
				'bannerSliderNewDescription' => $line['bannerSliderNewDescription'],
				'bannerSliderNewUrl' => $line['bannerSliderNewUrl'],
				'bannerSliderNewImage' => $line['bannerSliderNewImage']
			);
		}

		echo json_encode($data);
	}

	function getPostBanners(){

		$query = "SELECT * FROM bannersliderpost";
		$result = mysql_query($query) or die(mysql_error());
		$data = array();

		while($line = mysql_fetch_array($result)){
			$data[] = array(
				'language' => $line['language'],
				'idBannerSliderPost' => $line['idBannerSliderPost'],
				'bannerSliderPostTitle' => $line['bannerSliderPostTitle'],
				'bannerSliderPostSubtitle' => $line['bannerSliderPostSubtitle'],
				'bannerSliderPostDescription' => $line['bannerSliderPostDescription'],
				'bannerSliderPostUrl' => $line['bannerSliderPostUrl'],
				'bannerSliderPostImage' => $line['bannerSliderPostImage']
			);
		}

		echo json_encode($data);
	}

	function getUsers(){

		$query = "SELECT * FROM user
							INNER JOIN countries ON user.country_id = countries.id
							INNER JOIN states ON user.state_id = states.id";
		$result = mysql_query($query) or die(mysql_error());
		$data = array();

		while($line = mysql_fetch_array($result)){
			$data[] = array(
					'idUser' => $line['idUser'],
					'registrationDate' => $line['registrationDate'],
					'userName' => $line['userName'],
					'userLastName' => $line['userLastName'],
					'userBirthDate' => $line['userBirthDate'],
					'name_c' => $line['name_c'],
					'name_s' => $line['name_s'],
					'userEmail' => $line['userEmail'],
					'userStatus' => $line['userStatus'],
					'userExp' => $line['userExp'],
			);
		}

		echo json_encode($data);

	}
