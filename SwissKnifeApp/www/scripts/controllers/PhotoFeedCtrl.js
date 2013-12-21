/**
 * Photo Feed Controller
 * Created on Dec 9 2013 by Nico Verbruggen
 */

(function(){
    
    'use strict';
    
    // LineupCtrl is an angular controller
    var controllers = angular.module('swissKnifeApp.controllers');
    
    // Defining the controller
    controllers.controller('swissKnifeApp.controllers.PhotoFeedCtrl',['$scope', '$rootScope', '$http', function($scope, $rootScope, $http){
        // Get data from providers
        $scope.isBusy = true;
        $http.jsonp('http://localhost/HybridAPI/public/API/photo?callback=JSON_CALLBACK')
            .success(function(returned_data){
                if (returned_data.status !== ""){
                    $scope.photos = returned_data;
                }else{
                    console.log = "I have no idea.";
                }
                $scope.isBusy = false;
            })
            .error(function(status, headers, config){
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


    }]);
})();
