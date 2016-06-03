(function(){

	angular.module('tbfPanel.directives', [])

	.directive('menuNav', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/menu-nav.php',
			controller: function($document){
				$(window).resize(function(){
					if($(window).width()>1366){
						$('.menu-nav').css({'margin-left' : '0%'});
						$('.panel-cont').css({'width' : '85%', 'left' : '15%'});
					}else{
						if($(window).width()>768){
							$('.menu-nav').css({'margin-left' : '0%'});
							$('.panel-cont').css({'width' : '80%','left' : '20%'});
						}else{
							if($(window).width()>640){
								$('.menu-nav').css({ 'margin-left' : '0%'});
								$('.panel-cont').css({ 'width' : '75%', 'left' : '25%'});
							}
						}
					}
				});
			}
		};
	})

	.directive('topNav', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/top-nav.php',
			controller: function($document){
				var open = true;

				$(window).resize(function(){
					open = true;

					if($(window).width()>1366){
						$('.menu-nav').css({'margin-left' : '0%'});
						$('.panel-cont').css({'width' : '85%', 'left' : '15%'});
					}else{
						if($(window).width()>768){
							$('.menu-nav').css({'margin-left' : '0%'});
							$('.panel-cont').css({'width' : '80%','left' : '20%'});
						}else{
							if($(window).width()>640){
								$('.menu-nav').css({ 'margin-left' : '0%'});
								$('.panel-cont').css({ 'width' : '75%', 'left' : '25%'});
							}
						}
					}

				});

				$('#menuha').click(function(){
					if(open){
						if($(window).width()>1366){
							$('.menu-nav').css({'margin-left' : '-15%'});
							$('.panel-cont').css({'width' : '100%', 'left' : '0'});
						}else{
							if($(window).width()>768){
								$('.menu-nav').css({'margin-left' : '-20%'});
								$('.panel-cont').css({'width' : '100%','left' : '0'});
							}else{
								if($(window).width()>640){
									$('.menu-nav').css({ 'margin-left' : '-25%'});
									$('.panel-cont').css({ 'width' : '100%', 'left' : '0'});
								}
							}
						}
					}else{
						if($(window).width()>1366){
							$('.menu-nav').css({'margin-left' : '0%'});
							$('.panel-cont').css({'width' : '85%', 'left' : '15%'});
						}else{
							if($(window).width()>768){
								$('.menu-nav').css({'margin-left' : '0%'});
								$('.panel-cont').css({'width' : '80%','left' : '20%'});
							}else{
								if($(window).width()>640){
									$('.menu-nav').css({ 'margin-left' : '0%'});
									$('.panel-cont').css({ 'width' : '75%', 'left' : '25%'});
								}
							}
						}
					}
					open = !open;
				});

				$('.logout').click(function(){
					var namefunction = 'logOut';
					$.ajax({
						beforeSend: function(){
						},
						url: "../php/functions.php",
						type: "POST",
						data: {
							namefunction : namefunction
						},
						success: function(result){
							location.reload();
						},
						error: function(error){

						},
						complete: function(){

						},
						timeout: 10000
					});
				});

			}
		};
	})

	.directive('listBeer', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/list-beer.php',
			controller: function($document){
				$(document).on('click', '.deleteBeer', function(){
					var id = $(this).attr('name');
					var namefunction = 'deleteBeer';
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
							$('.chargedElements').html(result);
						},
						error: function(error){

						},
						complete: function(){

						},
						timeout: 10000
					});
				});
			}
		}
	})

	.directive('formBeer', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-beer.php',
			controller: function($document){
				$('.addTypeDB').click(function(){
					$('.msg-repeat').css({'display':'none'});
					$('.msg-new').css({'display':'none'});
					$('.msg-type').css({'display':'none'});
					$('.msg-error').css({'display':'none'});
					var data = $('.textNewType').val();
					var namefunction = 'addBeerType';
					if(data.length!=0){
						$.ajax({
							beforeSend: function(){
							},
							url: "../php/functions.php",
							type: "POST",
							data: {
								namefunction: namefunction,
								data: data
							},
							success: function(result){
								if(result=="0"){
									$('.msg-repeat').css({'display':'block'});
									setTimeout(function(){
										$('.msg-repeat').css({'display':'none'});
									}, 2000);
								}else{
									$('.msg-new').css({'display':'block'});
									setTimeout(function(){
										$('.msg-new').css({'display':'none'});
									}, 2000);
									$("#beer-type").html(result);
									$('.textNewType').val("");
								}
							},
							error: function(error){
								$('.msg-error').css({'display':'block'});
								setTimeout(function(){
									$('.msg-error').css({'display':'none'});
								}, 2000);
							},
							complete: function(){
							},
							timeout: 10000
						});
					}else{
						$('.msg-type').css({'display':'block'});
						setTimeout(function(){
							$('.msg-type').css({'display':'none'});
						}, 2000);
					}
				});

				$('#buttonSave').click(function(){
					$('#formBeer .submit').trigger('click');
				});

				$("#formBeer").submit(function(e){
					e.preventDefault();

					var ajaxData = new FormData();
					ajaxData.append("action", $(this).serialize());
					ajaxData.append("namefunction", "addNewBeer");

					$.each($("input[type=file]"), function(i, obj) {
					    $.each(obj.files,function(j,file){
					        ajaxData.append('beerImage['+i+']', file);
					    })
					});

					$.ajax({
						url: "../php/functions.php",
					  	type: "POST",
					  	data: ajaxData,
					  	processData: false,  // tell jQuery not to process the data
					  	contentType: false,   // tell jQuery not to set contentType
						success: function(result){
							document.getElementById("formBeer").reset();
							$('.chargedElements').html(result);
							$('.msg-newbeer').css({'display':'block'});
							setTimeout(function(){
								$('.msg-newbeer').css({'display':'none'});
							}, 2000);
						},
						error: function(error){
							alert(error);
						}
					});

				});
			}
		}
	})

	.directive('formBeerEdit', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-beer-edit.php',
			controller: function($document){
				$('.addTypeDB').click(function(){
					$('.msg-repeat').css({'display':'none'});
					$('.msg-new').css({'display':'none'});
					$('.msg-type').css({'display':'none'});
					$('.msg-error').css({'display':'none'});
					var data = $('.textNewType').val();
					var namefunction = 'addBeerType';
					if(data.length!=0){
						$.ajax({
							beforeSend: function(){
							},
							url: "../php/functions.php",
							type: "POST",
							data: {
								namefunction: namefunction,
								data: data
							},
							success: function(result){
								if(result=="0"){
									$('.msg-repeat').css({'display':'block'});
									setTimeout(function(){
										$('.msg-repeat').css({'display':'none'});
									}, 2000);
								}else{
									$('.msg-new').css({'display':'block'});
									setTimeout(function(){
										$('.msg-new').css({'display':'none'});
									}, 2000);
									$("#beer-type").html(result);
									$('.textNewType').val("");
								}
							},
							error: function(error){
								$('.msg-error').css({'display':'block'});
								setTimeout(function(){
									$('.msg-error').css({'display':'none'});
								}, 2000);
							},
							complete: function(){
							},
							timeout: 10000
						});
					}else{
						$('.msg-type').css({'display':'block'});
						setTimeout(function(){
							$('.msg-type').css({'display':'none'});
						}, 2000);
					}
				});

				$('#buttonEdit').click(function(){
					$('#formBeer .submit').trigger('click');
				});

				$("#formBeer").submit(function(e){
					e.preventDefault();

					var ajaxData = new FormData();
					ajaxData.append("action", $(this).serialize());
					ajaxData.append("beerProfileImageName", $("input[name=beerProfileImage]").attr('value'));
					ajaxData.append("beerCoverImageName", $("input[name=beerCoverImage]").attr('value'));
					ajaxData.append("beerBottleImageName", $("input[name=beerBottleImage]").attr('value'));
					ajaxData.append("namefunction", "editBeer");
					ajaxData.append("id", $('#id-beer').val());

					$.each($("input[name=beerProfileImage]"), function(i, obj) {
							$.each(obj.files,function(j,file){
									ajaxData.append('beerProfileImage['+i+']', file);
							})
					});

					$.each($("input[name=beerCoverImage]"), function(i, obj) {
							$.each(obj.files,function(j,file){
									ajaxData.append('beerCoverImage['+i+']', file);
							})
					});

					$.each($("input[name=beerBottleImage]"), function(i, obj) {
							$.each(obj.files,function(j,file){
									ajaxData.append('beerBottleImage['+i+']', file);
							})
					});

					$.ajax({
						url: "../php/functions.php",
							type: "POST",
							data: ajaxData,
							processData: false,  // tell jQuery not to process the data
							contentType: false,   // tell jQuery not to set contentType
						success: function(result){
							location.reload();
						},
						error: function(error){
							alert(error);
						}
					});

				});
			}
		}
	})

	.directive('imagesBeer', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/images-beer.html',
			controller: function($document){
			}
		}
	})

	.directive('bannerList', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/banner-list.html',
			controller: function($document){
			}
		}
	})

	.directive('listProducer', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/list-producer.php',
			controller: function($document){
				$(document).on('click', '.deleteProducer', function(){
					var id = $(this).attr('name');
					var namefunction = 'deleteProducer';
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
							$('.chargedElements').html(result);
						},
						error: function(error){
						},
						complete: function(){
						},
						timeout: 10000
					});
				});
			}
		}
	})

	.directive('formProducer', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-producer.php',
			controller: function($document){
				$('.addTypeDB').click(function(){
					$('.msg-repeat').css({'display':'none'});
					$('.msg-new').css({'display':'none'});
					$('.msg-type').css({'display':'none'});
					$('.msg-error').css({'display':'none'});
					var data = $('.textNewType').val();
					var namefunction = 'addProducerType';
					if(data.length!=0){
						$.ajax({
							beforeSend: function(){
							},
							url: "../php/functions.php",
							type: "POST",
							data: {
								namefunction: namefunction,
								data: data
							},
							success: function(result){
								if(result=="0"){
									$('.msg-repeat').css({'display':'block'});
									setTimeout(function(){
										$('.msg-repeat').css({'display':'none'});
									}, 2000);
								}else{
									$('.msg-new').css({'display':'block'});
									setTimeout(function(){
										$('.msg-new').css({'display':'none'});
									}, 2000);
									$("#producer-type").html(result);
									$('.textNewType').val("");
								}
							},
							error: function(error){
								$('.msg-error').css({'display':'block'});
								setTimeout(function(){
									$('.msg-error').css({'display':'none'});
								}, 2000);
							},
							complete: function(){
							},
							timeout: 10000
						});
					}else{
						$('.msg-type').css({'display':'block'});
						setTimeout(function(){
							$('.msg-type').css({'display':'none'});
						}, 2000);
					}
				});

				$('#buttonSave').click(function(){
					$('#formBeer .submit').trigger('click');
				});

				$("#formBeer").submit(function(e){
					e.preventDefault();

					var ajaxData = new FormData();
					ajaxData.append("action", $(this).serialize());
					ajaxData.append("namefunction", "addNewProducer");

					$.each($("input[type=file]"), function(i, obj) {
					    $.each(obj.files,function(j,file){
					        ajaxData.append('producerImage['+i+']', file);
					    })
					});

					$.ajax({
						url: "../php/functions.php",
					  	type: "POST",
					  	data: ajaxData,
					  	processData: false,  // tell jQuery not to process the data
					  	contentType: false,   // tell jQuery not to set contentType
						success: function(result){
							document.getElementById("formBeer").reset();
							$('.chargedElements').html(result);
							$('.msg-newbeer').css({'display':'block'});
							setTimeout(function(){
								$('.msg-newbeer').css({'display':'none'});
							}, 2000);
						},
						error: function(error){
							alert(error);
						}
					});

				});

				$("#producer-country").change(function(){
					var idCountry = $("option:selected", this).attr('name');
					var namefunction = 'getStates';
					$.ajax({
							beforeSend: function(){},
							url: "../php/functions.php",
							type: "POST",
							data: {
								namefunction: namefunction,
								idCountry: idCountry
							},
							success: function(result){
								$('#producer-state').html(result);
							},
							error: function(){},
							complete: function(){},
							timeout: 10000
					});
				});

			}
		}
	})

	.directive('formProducerEdit', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-producer-edit.php',
			controller: function($document){

				$('.addTypeDB').click(function(){
					$('.msg-repeat').css({'display':'none'});
					$('.msg-new').css({'display':'none'});
					$('.msg-type').css({'display':'none'});
					$('.msg-error').css({'display':'none'});
					var data = $('.textNewType').val();
					var namefunction = 'addProducerType';
					if(data.length!=0){
						$.ajax({
							beforeSend: function(){
							},
							url: "../php/functions.php",
							type: "POST",
							data: {
								namefunction: namefunction,
								data: data
							},
							success: function(result){
								if(result=="0"){
									$('.msg-repeat').css({'display':'block'});
									setTimeout(function(){
										$('.msg-repeat').css({'display':'none'});
									}, 2000);
								}else{
									$('.msg-new').css({'display':'block'});
									setTimeout(function(){
										$('.msg-new').css({'display':'none'});
									}, 2000);
									$("#producer-type").html(result);
									$('.textNewType').val("");
								}
							},
							error: function(error){
								$('.msg-error').css({'display':'block'});
								setTimeout(function(){
									$('.msg-error').css({'display':'none'});
								}, 2000);
							},
							complete: function(){
							},
							timeout: 10000
						});
					}else{
						$('.msg-type').css({'display':'block'});
						setTimeout(function(){
							$('.msg-type').css({'display':'none'});
						}, 2000);
					}
				});

				$('#buttonEdit').click(function(){
					$('#formBeer .submit').trigger('click');
				});

				$("#formBeer").submit(function(e){
					e.preventDefault();

					var ajaxData = new FormData();
					ajaxData.append("action", $(this).serialize());
					ajaxData.append("producerProfileImage", $("input[name=producerProfileImage]").attr('value'));
					ajaxData.append("producerCoverImage", $("input[name=producerCoverImage]").attr('value'));
					ajaxData.append("namefunction", "editProducer");
					ajaxData.append("id", $('#id-producer').val());

					$.each($("input[name=producerProfileImage]"), function(i, obj) {
							$.each(obj.files,function(j,file){
									ajaxData.append('producerProfileImage['+i+']', file);
							})
					});

					$.each($("input[name=producerCoverImage]"), function(i, obj) {
							$.each(obj.files,function(j,file){
									ajaxData.append('producerCoverImage['+i+']', file);
							})
					});

					$.ajax({
						url: "../php/functions.php",
							type: "POST",
							data: ajaxData,
							processData: false,  // tell jQuery not to process the data
							contentType: false,   // tell jQuery not to set contentType
						success: function(result){
							location.reload();
						},
						error: function(error){
							alert(error);
						}
					});

				});

				$("#producer-country").change(function(){
					var idCountry = $("option:selected", this).attr('name');
					var namefunction = 'getStates';
					$.ajax({
							beforeSend: function(){},
							url: "../php/functions.php",
							type: "POST",
							data: {
								namefunction: namefunction,
								idCountry: idCountry
							},
							success: function(result){
								$('#producer-state').html(result);
							},
							error: function(){},
							complete: function(){},
							timeout: 10000
					});
				});

			}
		}
	})

	.directive('imagesProducer', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/images-producer.html',
			controller: function($document){
			}
		}
	})

	.directive('listRawMaterial', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/list-rawmaterial.php',
			controller: function($document){
				$(document).on('click', '.deleteRawMaterial', function(){
					var id = $(this).attr('name');
					var namefunction = 'deleteRawMaterial';
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
							$('.chargedElements').html(result);
						},
						error: function(error){
						},
						complete: function(){
						},
						timeout: 10000
					});
				});
			}
		}
	})

	.directive('formRawMaterial', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-rawmaterial.php',
			controller: function($document){

				$('.addTypeDB').click(function(){
					$('.msg-repeat').css({'display':'none'});
					$('.msg-new').css({'display':'none'});
					$('.msg-type').css({'display':'none'});
					$('.msg-error').css({'display':'none'});
					var data = $('.textNewType').val();
					var namefunction = 'addRawMaterialType';
					if(data.length!=0){
						$.ajax({
							beforeSend: function(){
							},
							url: "../php/functions.php",
							type: "POST",
							data: {
								namefunction: namefunction,
								data: data
							},
							success: function(result){
								if(result=="0"){
									$('.msg-repeat').css({'display':'block'});
									setTimeout(function(){
										$('.msg-repeat').css({'display':'none'});
									}, 2000);
								}else{
									$('.msg-new').css({'display':'block'});
									setTimeout(function(){
										$('.msg-new').css({'display':'none'});
									}, 2000);
									$("#rawmaterial-type").html(result);
									$('.textNewType').val("");
								}
							},
							error: function(error){
								$('.msg-error').css({'display':'block'});
								setTimeout(function(){
									$('.msg-error').css({'display':'none'});
								}, 2000);
							},
							complete: function(){
							},
							timeout: 10000
						});
					}else{
						$('.msg-type').css({'display':'block'});
						setTimeout(function(){
							$('.msg-type').css({'display':'none'});
						}, 2000);
					}
				});

				$('#buttonSave').click(function(){
					$('#formBeer .submit').trigger('click');
				});

				$("#formBeer").submit(function(e){
					e.preventDefault();

					var ajaxData = new FormData();
					ajaxData.append("action", $(this).serialize());
					ajaxData.append("namefunction", "addNewRawMaterial");

					$.each($("input[type=file]"), function(i, obj) {
							$.each(obj.files,function(j,file){
									ajaxData.append('rawMaterialImage['+i+']', file);
							})
					});

					$.ajax({
						url: "../php/functions.php",
							type: "POST",
							data: ajaxData,
							processData: false,  // tell jQuery not to process the data
							contentType: false,   // tell jQuery not to set contentType
						success: function(result){
							document.getElementById("formBeer").reset();
							$('.chargedElements').html(result);
							$('.msg-newbeer').css({'display':'block'});
							setTimeout(function(){
								$('.msg-newbeer').css({'display':'none'});
							}, 2000);
						},
						error: function(error){
							alert(error);
						}
					});

				});

				$("#producer-country").change(function(){
					var idCountry = $("option:selected", this).attr('name');
					var namefunction = 'getStates';
					$.ajax({
							beforeSend: function(){},
							url: "../php/functions.php",
							type: "POST",
							data: {
								namefunction: namefunction,
								idCountry: idCountry
							},
							success: function(result){
								$('#producer-state').html(result);
							},
							error: function(){},
							complete: function(){},
							timeout: 10000
					});
				});

			}
		}
	})

	.directive('imagesRawMaterial', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/images-raw-material.html',
			controller: function($document){
			}
		}
	})

	.directive('mapHtmlRawMaterial', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/map-html-raw-material.html',
			controller: function($document){
			}
		}
	})

	.directive('formRawMaterialEdit', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-rawmaterial-edit.php',
			controller: function($document){

				$('.addTypeDB').click(function(){
					$('.msg-repeat').css({'display':'none'});
					$('.msg-new').css({'display':'none'});
					$('.msg-type').css({'display':'none'});
					$('.msg-error').css({'display':'none'});
					var data = $('.textNewType').val();
					var namefunction = 'addRawMaterialType';
					if(data.length!=0){
						$.ajax({
							beforeSend: function(){
							},
							url: "../php/functions.php",
							type: "POST",
							data: {
								namefunction: namefunction,
								data: data
							},
							success: function(result){
								if(result=="0"){
									$('.msg-repeat').css({'display':'block'});
									setTimeout(function(){
										$('.msg-repeat').css({'display':'none'});
									}, 2000);
								}else{
									$('.msg-new').css({'display':'block'});
									setTimeout(function(){
										$('.msg-new').css({'display':'none'});
									}, 2000);
									$("#rawmaterial-type").html(result);
									$('.textNewType').val("");
								}
							},
							error: function(error){
								$('.msg-error').css({'display':'block'});
								setTimeout(function(){
									$('.msg-error').css({'display':'none'});
								}, 2000);
							},
							complete: function(){
							},
							timeout: 10000
						});
					}else{
						$('.msg-type').css({'display':'block'});
						setTimeout(function(){
							$('.msg-type').css({'display':'none'});
						}, 2000);
					}
				});

				$('#buttonEdit').click(function(){
					$('#formBeer .submit').trigger('click');
				});

				$("#formBeer").submit(function(e){
					e.preventDefault();

					var ajaxData = new FormData();
					ajaxData.append("action", $(this).serialize());
					ajaxData.append("namefunction", "editRawMaterial");
					ajaxData.append("rawMaterialProfileImage", $("input[name=rawMaterialProfileImage]").attr('value'));
					ajaxData.append("rawMaterialCoverImage", $("input[name=rawMaterialCoverImage]").attr('value'));
					ajaxData.append("id", $('#raw-material-id').val());

					$.each($("input[name=rawMaterialProfileImage]"), function(i, obj) {
							$.each(obj.files,function(j,file){
									ajaxData.append('rawMaterialProfileImage['+i+']', file);
							})
					});

					$.each($("input[name=rawMaterialCoverImage]"), function(i, obj) {
							$.each(obj.files,function(j,file){
									ajaxData.append('rawMaterialCoverImage['+i+']', file);
							})
					});

					$.ajax({
						url: "../php/functions.php",
							type: "POST",
							data: ajaxData,
							processData: false,  // tell jQuery not to process the data
							contentType: false,   // tell jQuery not to set contentType
						success: function(result){
							location.reload();
						},
						error: function(error){
							alert(error);
						}
					});


				});

				$("#producer-country").change(function(){
					var idCountry = $("option:selected", this).attr('name');
					var namefunction = 'getStates';
					$.ajax({
							beforeSend: function(){},
							url: "../php/functions.php",
							type: "POST",
							data: {
								namefunction: namefunction,
								idCountry: idCountry
							},
							success: function(result){
								$('#producer-state').html(result);
							},
							error: function(){},
							complete: function(){},
							timeout: 10000
					});
				});

			}
		}
	})

	.directive('bannerListHomeSlider', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/banner-list-home-slider.html',
			controller: function($document){
			}
		}
	})

	.directive('bannerListNewsSlider', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/banner-list-news-slider.html',
			controller: function($document){
			}
		}
	})

	.directive('bannerListPostSlider', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/banner-list-post-slider.html',
			controller: function($document){
			}
		}
	})

	.directive('listUsers', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/list-users.php',
			controller: function($document){
			}
		}
	})

	.directive('listAdmin', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/list-admin.php',
			controller: function($document){
				$(document).on('click', '.deleteAdmin', function(){
					var id = $(this).attr('name');
					var namefunction = 'deleteAdmin';
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
							location.reload();
						},
						error: function(error){

						},
						complete: function(){

						},
						timeout: 10000
					});
				});

				$(document).on('click', '.editPassword', function(){
					var confirmPass = $(this).siblings('input[name=confirmPass]').val();
					var password = $(this).siblings('input[name=pass]').val();
					var idAdmin = $(this).attr('data-id-admin');
					if(confirmPass != password ){
						$('.errorPassword').css({'display': 'block'});
						setTimeout(function(){
							$('.errorPassword').css({'display': 'none'});
						},2000);
					}else{
						var namefunction = 'changePassword';
						$.ajax({
							beforeSend: function(){
							},
							url: "../php/functions.php",
							type: "POST",
							data: {
								namefunction: namefunction,
								idAdmin: idAdmin,
								password: password
							},
							success: function(result){
								location.reload();
							},
							error: function(error){
							},
							complete: function(){
							},
							timeout: 10000
						});
					}
				});
			}
		}
	})

	.directive('formAdmin', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-admin.php',
			controller: function($document){

				$('#buttonSave').click(function(){
					$('#formBeer .submit').trigger('click');
				});

				$("#formBeer").submit(function(e){
					e.preventDefault();
					var confirmPass = $('input[name=password]').val();
					var password = $('input[name=confirmPassword]').val();
					if(confirmPass != password ){
						$('.msg-match').css({'display': 'block'});
						setTimeout(function(){
							$('.msg-match').css({'display': 'none'});
						},2000);
					}else{
						var data = $(this).serializeArray();
						data.push({name: 'namefunction', value: 'addNewAdminUser'});
						$.ajax({
							beforeSend: function(){
							},
							url: "../php/functions.php",
							type: "POST",
							data: data,
							success: function(result){
								$('.msg-newbeer').css({'display': 'block'});
								setTimeout(function(){
									location.reload();
								},2000);
							},
							error: function(error){
							},
							complete: function(){
							},
							timeout: 10000
						});
					}
				});
			}
		}
	})

	.directive('formSendMessages', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-send-messages.php',
			controller: function($document){

				$('#buttonSave').click(function(){
					var message = $('#message').val();
					var namefunction = "sendMessageAllUsers";

					$.ajax({
						beforeSend: function(){
						},
						url: "../php/functions.php",
						type: "POST",
						data: {
							message : message,
							namefunction : namefunction
						},
						success: function(result){
							$('.msg-newbeer').css({'display': 'block'});
							setTimeout(function(){
								location.reload();
							},2000);
						},
						error: function(error){
						},
						complete: function(){
						},
						timeout: 10000
					});



				});

				$("#formBeer").submit(function(e){
					e.preventDefault();
					var confirmPass = $('input[name=password]').val();
					var password = $('input[name=confirmPassword]').val();
					if(confirmPass != password ){
						$('.msg-match').css({'display': 'block'});
						setTimeout(function(){
							$('.msg-match').css({'display': 'none'});
						},2000);
					}else{
						var data = $(this).serializeArray();
						data.push({name: 'namefunction', value: 'addNewAdminUser'});
						$.ajax({
							beforeSend: function(){
							},
							url: "../php/functions.php",
							type: "POST",
							data: data,
							success: function(result){
								$('.msg-newbeer').css({'display': 'block'});
								setTimeout(function(){
									location.reload();
								},2000);
							},
							error: function(error){
							},
							complete: function(){
							},
							timeout: 10000
						});
					}
				});
			}
		}
	})


})();
