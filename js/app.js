(function() {
	var app = angular.module('hebergement', []);

	app.controller('TabController', function(){
	this.tab = 1;

	this.setTab = function(newValue){
	  this.tab = newValue;
	};

	this.isSet = function(tabName){
	  return this.tab === tabName;
	};
	});

	app.controller('HostingController', function(){

	var host = {};

	this.addHost = function(){
		// Ajout d'un hébergement
	}
	});

	app.directive('formLogin', function(){
		return {
			restrict: 'E',
			templateUrl : 'snips/form-login.html'
		};
	});

	app.directive('formCreateAccount', function(){
		return {
			restrict: 'E',
			templateUrl : 'snips/form-create-account.html'
		};
	});
  
  
})();