(function(){

	angular.module('tbfPanel.controllers', [])

	.controller('menuNavController', ['$scope', '$routeParams', '$location', function($scope, $routeParams, $location){
		$scope.routeParams = $location.path();
		switch ($scope.routeParams) {
			case '/beers': $scope.selected = 1;  break;
			case '/producers': $scope.selected = 2;  break;
			case '/rawmaterials': $scope.selected = 3;  break;
			case '/homeslider': $scope.selected = 4;  break;
			case '/newslider': $scope.selected = 5;  break;
			case '/postslider': $scope.selected = 6;  break;
			case '/users': $scope.selected = 7;  break;
			case '/broadcast': $scope.selected = 8;  break;
			case '/adminusers': $scope.selected = 9;  break;
		}
		$scope.changeNav = function(item){
			$scope.selected = item;
		};
	}])

	.controller('beerNavController', ['$scope', function($scope){

		$scope.item = 1;
		$scope.selectItem = function(item){
			$scope.item = item;
		};

		$scope.itemBeer = 1;
		$scope.selectItemBeer = function(item){
			$scope.itemBeer = item;
		};

		$scope.addType = false;
		$scope.selectaAddType = function(){
			$scope.addType = !$scope.addType;
		};

		$scope.addBanner = false;
		$scope.selectaAddBanner = function(){
			$scope.addBanner = !$scope.addBanner;
		};

		$('#expExcel').click(function(){
			var data = "users";
			$.ajax({
				url: "../php/exportExcel.php",
			  	type: "POST",
			  	data: data,
				success: function(result){
					alert(result);
				},
				error: function(error){
					alert(error);
				}
			});
		});

	}])

	.controller('beerListController', ['$scope', '$routeParams', 'tbfService', function($scope, $routeParams, tbfService){

		$scope.id =  parseInt($routeParams.id, 10);
		$scope.show  = true;
		$scope.dataBanners = [];

		tbfService.getBeerImages($scope.id).then(function(data){
			$scope.dataBeerImages = data;
		});

		tbfService.getBeer($scope.id).then(function(data){
			$scope.dataBeer = data;
		});

		$scope.addBannerFunction = function(){
			tbfService.getBanners($scope.id).then(function(data){
				$scope.dataBanners = data;
			});
		}

		$scope.addBannerFunction();

		$scope.addBannerImg = function(e){

			var ajaxData = new FormData();
			ajaxData.append("namefunction","addBannerImage");
			ajaxData.append("idBeer", $('#insertBannerImage .addBanner').attr('name'));

			$.each($("#insertBannerImage input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('bannerImage['+i+']', file);
				})
			});

			$.ajax({
				url: "../php/functions.php",
			  	type: "POST",
			  	data: ajaxData,
			  	processData: false,  // tell jQuery not to process the data
			  	contentType: false,   // tell jQuery not to set contentType
				success: function(result){
					$scope.addBannerFunction();
					document.getElementById("insertBannerImage").reset();
				},
				error: function(error){
					alert(error);
				}
			});

		};

		$scope.deleteBanner = function(idBannerBeerSlider){
			var id = idBannerBeerSlider;
			var namefunction = 'deleteBaner';
			$.ajax({
				beforeSend: function(){
				},
				url: "../php/functions.php",
				type: "POST",
				data: {
					namefunction : namefunction,
					id: id
				},
				success: function(result){
					$scope.addBannerFunction();
				},
				error: function(error){
				},
				complete: function(){
				},
				timeout: 10000
			});
		};

	}])

	.controller('producerListController', ['$scope', '$routeParams', 'tbfService', function($scope, $routeParams, tbfService){

		$scope.id =  parseInt($routeParams.id, 10);
		$scope.show  = true;

		tbfService.getProducerImages($scope.id).then(function(data){
			$scope.dataProducerImages = data;
		});

		tbfService.getProducer($scope.id).then(function(data){
			$scope.dataProducer = data;
		});

	}])

	.controller('rawMaterialListController', ['$scope', '$routeParams', 'tbfService', function($scope, $routeParams, tbfService){

		$scope.id =  parseInt($routeParams.id, 10);
		$scope.show  = true;

		tbfService.getRawMaterialImages($scope.id).then(function(data){
			$scope.dataRawMaterialImages = data;
		});

		tbfService.getRawMaterial($scope.id).then(function(data){
			$scope.dataRawMaterial = data;
		});

		tbfService.getTypeRawMaterial($scope.id).then(function(data){
			$scope.dataTypeRawMaterial = data;
		});

	}])

	.controller('sliderController', ['$scope', 'tbfService', function($scope, tbfService){

		$scope.show  = true;
		$scope.dataBanners = [];

		$scope.addBannerFunction = function(){
			tbfService.getHomeBanners().then(function(data){
				$scope.dataBanners = data;
			});
		}

		$scope.addBannerFunction();

		$scope.addBannerImg = function(e){

			var ajaxData = new FormData();
			ajaxData.append("namefunction","addHomeBannerImage");
			ajaxData.append("urlBanner", $('#banner-url').val());
			ajaxData.append("language", $('#banner-language option:selected').attr('name'));
			$.each($("#insertBannerImage input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('bannerImage['+i+']', file);
				})
			});

			$.ajax({
				url: "../php/functions.php",
					type: "POST",
					data: ajaxData,
					processData: false,  // tell jQuery not to process the data
					contentType: false,   // tell jQuery not to set contentType
				success: function(result){
					$scope.addBannerFunction();
					document.getElementById("insertBannerImage").reset();
				},
				error: function(error){
					alert(error);
				}
			});

		};

		$scope.deleteBanner = function(idBannerSliderHome){
			var id = idBannerSliderHome;
			var namefunction = 'deleteHomeBanner';
			$.ajax({
				beforeSend: function(){
				},
				url: "../php/functions.php",
				type: "POST",
				data: {
					namefunction : namefunction,
					id: id
				},
				success: function(result){
					$scope.addBannerFunction();
				},
				error: function(error){
				},
				complete: function(){
				},
				timeout: 10000
			});
		};

	}])

	.controller('sliderNewController', ['$scope', 'tbfService', function($scope, tbfService){

		$scope.show  = true;
		$scope.dataBanners = [];

		$scope.addBannerFunction = function(){
			tbfService.getNewBanners().then(function(data){
				$scope.dataBanners = data;
			});
		}

		$scope.addBannerFunction();

		$scope.addBannerImg = function(e){

			var ajaxData = new FormData();
			ajaxData.append("namefunction","addNewBannerImage");
			ajaxData.append("action", $('#insertBannerImage').serialize());
			ajaxData.append("language", $('#banner-language option:selected').attr('name'));
			$.each($("#insertBannerImage input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('bannerImage['+i+']', file);
				})
			});

			$.ajax({
				url: "../php/functions.php",
					type: "POST",
					data: ajaxData,
					processData: false,  // tell jQuery not to process the data
					contentType: false,   // tell jQuery not to set contentType
				success: function(result){
					$scope.addBannerFunction();
					document.getElementById("insertBannerImage").reset();
				},
				error: function(error){
					alert(error);
				}
			});

		};

		$scope.deleteBanner = function(idBannerSliderNew){
			var id = idBannerSliderNew;
			var namefunction = 'deleteNewBanner';
			$.ajax({
				beforeSend: function(){
				},
				url: "../php/functions.php",
				type: "POST",
				data: {
					namefunction : namefunction,
					id: id
				},
				success: function(result){
					$scope.addBannerFunction();
				},
				error: function(error){
				},
				complete: function(){
				},
				timeout: 10000
			});
		};

	}])

	.controller('sliderPostController', ['$scope', 'tbfService', function($scope, tbfService){

		$scope.show  = true;
		$scope.dataBanners = [];

		$scope.addBannerFunction = function(){
			tbfService.getPostBanners().then(function(data){
				$scope.dataBanners = data;
			});
		}

		$scope.addBannerFunction();

		$scope.addBannerImg = function(e){

			var ajaxData = new FormData();
			ajaxData.append("namefunction","addPostBannerImage");
			ajaxData.append("action", $('#insertBannerImage').serialize());
			ajaxData.append("language", $('#banner-language option:selected').attr('name'));
			$.each($("#insertBannerImage input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('bannerImage['+j+']', file);
				})
			});

			$.ajax({
				url: "../php/functions.php",
					type: "POST",
					data: ajaxData,
					processData: false,  // tell jQuery not to process the data
					contentType: false,   // tell jQuery not to set contentType
				success: function(result){
					$scope.addBannerFunction();
					document.getElementById("insertBannerImage").reset();
				},
				error: function(error){
					alert(error);
				}
			});

		};

		$scope.deleteBanner = function(idBannerSliderNew){
			var id = idBannerSliderNew;
			var namefunction = 'deletePostBanner';
			$.ajax({
				beforeSend: function(){
				},
				url: "../php/functions.php",
				type: "POST",
				data: {
					namefunction : namefunction,
					id: id
				},
				success: function(result){
					$scope.addBannerFunction();
				},
				error: function(error){
				},
				complete: function(){
				},
				timeout: 10000
			});
		};

	}])

	.controller('userController', ['$scope', 'tbfService', function($scope, tbfService){

		$scope.show  = true;
		$scope.dataUsers = [];

		$scope.showUserList = function(){
			tbfService.getUsers().then(function(data){
				$scope.dataUsers = data;
			});
		}

		$scope.showUserList();

		$scope.modifyStatus = function(status, idUser){
			var namefunction = 'modifyStatus';
			$.ajax({
				url: "../php/functions.php",
					type: "POST",
					data: {
						status : status,
						idUser : idUser,
						namefunction : namefunction
					},
				success: function(result){
					$scope.showUserList();
				},
				error: function(error){
					alert(error);
				}
			});
		};

	}])

	.controller('adminPass', ['$scope', function($scope){
		$scope.showPass = false;

		$scope.changeShow = function(){
				$scope.showPass = !$scope.showPass;
		};

	}])

	.controller('filterList', ['$scope', function($scope){
		$scope.itemShowElements = 0;

		$scope.changeItemShow = function($item){
			$scope.itemShowElements = $item;
		};

	}])

})();
