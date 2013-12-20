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
    controllers.controller('swissKnifeApp.controllers.LoginCtrl',['$scope', '$rootScope', '$http', '$location', function($scope, $rootScope, $http, $location){

        $scope.DoLoginAction = function(){
            $scope.isBusy = true;
            $scope.isAlert = false;
            var data = {"email" : $scope.email, "password" : $scope.password};
            $http.post('http://localhost/HybridAPI/public/API/user/login', data)
    		.success(function(returned_data){
                    if (returned_data.status !== ""){
                         // Fix the navigation glitch
                         $("nav").show();
                         $rootScope.userLoggedIn = true;
                         $rootScope.user = returned_data;
                         $location.path( "/" );
                    }else{
                        console.log = "I have no idea.";
                    }
                    $scope.isBusy = false;
    		})
                .error(function(data, status, headers, config){
                  // This will usually be called when we have no internets.
                    console.log(status);
                    if (status === 401){
                       $scope.alertMessage = data.error; 
                    }
                    else if(status === 0){
                       console.log(data + status + headers + config);
                       $scope.alertMessage = "You seem to be offline.";
                    }else{
                       $scope.alertMessage = "Oops. Something went wrong. Please contact our space gnomes with the following information: <info>STATUS: " + status + " / HEADERS: " + headers + " / CONFIG: " + config + ".</info>";
                    }
                  // Show alert message
                  $scope.isAlert = true;
                  $scope.isBusy = false;          
                });
        };
    }]);
})();

