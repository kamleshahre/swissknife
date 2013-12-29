/**
 * Created by nicoverbruggen on 05/12/13.
 * Register controller of app.
 */

(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.AddFriendCtrl',['$scope', '$rootScope', '$http', '$location', function($scope, $rootScope, $http, $location){
        $scope.DoAddFriendAction = function(){
            $scope.isBusy = true;
            $scope.isAlert = false;
            var requestPath = $rootScope.apipath + 'user/friend/'+$scope.username+'?callback=JSON_CALLBACK';
            $http.jsonp(requestPath)
                .success(function(returned_data){
                    if (returned_data.status !== ""){
                        // Fix the navigation glitch
                        $("nav").show();
                        console.log(returned_data);
                        $rootScope.user = returned_data;
                        $location.path( "/friends" );
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
