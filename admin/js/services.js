(function(){
	angular.module('tbfPanel.services', [])
		.factory('tbfService', ['$http', '$q', function($http, $q){

			function getBeerImages(id){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getBeerImages&id='+id)
					.success(function (data) {
			        	deferred.resolve(data);
			        });
			    return deferred.promise;
			}

			function getBeer(id){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getBeer&id='+id)
					.success(function (data) {
			        	deferred.resolve(data);
			        });
			    return deferred.promise;
			}

			function getBanners(id){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getBanners&id='+id)
					.success(function(data) {
						deferred.resolve(data);
					});
				return deferred.promise;
			}

			function getProducerImages(id){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getProducerImages&id='+id)
					.success(function (data) {
			        	deferred.resolve(data);
			        });
			    return deferred.promise;
			}

			function getProducer(id){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getProducer&id='+id)
					.success(function (data) {
								deferred.resolve(data);
							});
					return deferred.promise;
			}

			function getRawMaterialImages(id){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getRawMaterialImages&id='+id)
					.success(function (data) {
								deferred.resolve(data);
							});
					return deferred.promise;
			}

			function getRawMaterial(id){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getRawMaterial&id='+id)
					.success(function (data) {
								deferred.resolve(data);
							});
					return deferred.promise;
			}

			function getTypeRawMaterial(id){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getTypeRawMaterial&id='+id)
					.success(function (data) {
								deferred.resolve(data);
							});
					return deferred.promise;
			}

			function getHomeBanners(){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getHomeBanners')
					.success(function(data) {
						deferred.resolve(data);
					});
				return deferred.promise;
			}

			function getNewBanners(){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getNewBanners')
					.success(function(data) {
						deferred.resolve(data);
					});
				return deferred.promise;
			}

			function getPostBanners(){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getPostBanners')
					.success(function(data) {
						deferred.resolve(data);
					});
				return deferred.promise;
			}

			function getUsers(){
				var deferred = $q.defer();
				$http.get('./../php/services.php?namefunction=getUsers')
					.success(function(data) {
						deferred.resolve(data);
					});
				return deferred.promise;
			}

			return {
				getBeerImages : getBeerImages,
				getBeer : getBeer,
				getBanners : getBanners,
				getProducerImages : getProducerImages,
				getProducer : getProducer,
				getRawMaterialImages : getRawMaterialImages,
				getRawMaterial : getRawMaterial,
				getTypeRawMaterial : getTypeRawMaterial,
				getHomeBanners : getHomeBanners,
				getNewBanners : getNewBanners,
				getPostBanners : getPostBanners,
				getUsers : getUsers
			}

		}]);
})();
