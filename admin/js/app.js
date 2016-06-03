(function (){

	var app = angular.module('tbfPanel', [
		'ngRoute',
		'ngMap',
		'tbfPanel.controllers',
		'tbfPanel.services',
		'tbfPanel.directives'
	]);

	app.config(['$routeProvider', function($routeProvider){
		$routeProvider
			.when('/beers', {
				templateUrl: './../views/beers.php',
				controller: 'beerNavController'
			})
			.when('/beer/:id', {
				templateUrl: './../views/beer.php',
				controller: 'beerNavController'
			})
			.when('/producers', {
				templateUrl: './../views/producers.php',
				controller: 'beerNavController'
			})
			.when('/producer/:id', {
				templateUrl: './../views/producer.php',
				controller: 'beerNavController'
			})
			.when('/rawmaterials', {
				templateUrl: './../views/raw-materials.php',
				controller: 'beerNavController'
			})
			.when('/rawmaterial/:id', {
				templateUrl: './../views/raw-material.php',
				controller: 'beerNavController'
			})
			.when('/homeslider', {
				templateUrl: './../views/home-slider.php',
				controller: 'beerNavController'
			})
			.when('/newslider', {
				templateUrl: './../views/news-slider.php',
				controller: 'beerNavController'
			})
			.when('/postslider', {
				templateUrl: './../views/post-slider.php',
				controller: 'beerNavController'
			})
			.when('/users', {
				templateUrl: './../views/users.php',
				controller: 'beerNavController'
			})
			.when('/broadcast', {
				templateUrl: './../views/broadcast.php',
				controller: 'beerNavController'
			})
			.when('/adminusers', {
				templateUrl: './../views/adminusers.php',
				controller: 'beerNavController'
			})
			.otherwise({
				redirectTo: '/redirect'
			});
	}]);

})();
