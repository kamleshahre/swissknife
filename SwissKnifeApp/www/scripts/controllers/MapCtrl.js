/**
 * Created by nicoverbruggen on 05/12/13.
 * Map controller of app.
 */

(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.MapCtrl',['$scope','$rootScope','$route', function($scope, $rootScope,$route){
        $scope.Reload = function(){
            $route.reload();
        }
        var lflPlaces = [];

        var onSuccess = function(position) {
            $rootScope.position = position;
        };

        navigator.geolocation.getCurrentPosition(onSuccess);

        lflPlaces.push({
            lat: 51.086849,
            lng: 3.669939,
            dsc:'<strong>This is where the festival is located!</strong>'
        });

        $scope.lflplacesbasisscholen = lflPlaces;
        $scope.lflrefresh = true;

        if($rootScope.position != null){
            lflPlaces.push({
                lat:$rootScope.position.coords.latitude,
                lng:$rootScope.position.coords.longitude,
                dsc:'<strong>' + 'U bevind zich hier' + '</strong>'
            });
        }

        console.log($scope.lflplacesbasisscholen);
    }]);
})();
    
