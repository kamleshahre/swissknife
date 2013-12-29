(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.PhotoDetailCtrl',['$scope', '$rootScope', '$routeParams', '$http', function($scope, $rootScope, $routeParams, $http){
            // Loads the photo ID
            $scope.id = $routeParams.photoID;
            var requestPath = $rootScope.apipath + 'photo/' + $scope.id + "?callback=JSON_CALLBACK";
            $http.jsonp(requestPath)
                .success(function(returned_data){
                    $scope.image = returned_data.photo_url;
                    $scope.username = returned_data.user.user_username;
                });
            /*
            $http.jsonp(requestPath)
            .success(function(returned_data){
                if (returned_data.status !== ""){
                    $scope.stages = returned_data;
                    console.log($scope.stages);
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
            */
            
    }]);
})();