/**
 * Created by nicoverbruggen on 05/12/13.
 * Login controller of app.
 */

(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.LoginCtrl',['$scope', '$http', function($scope, $http){

    	var data = {"username" : "nicoverbruggen", "password" : "root"};

    	// Use http
    	$http.post('http://localhost:8080/HybridAPI/public/API/user/login', data)
    		.success(function(returned_data){
    			alert(returned_data);
    			console.log(returned_data);
    		});
    }]);
})();

