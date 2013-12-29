(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.ProfileCtrl',['$scope','$rootScope','$route', function($scope, $rootScope,$route){
        $scope.Reload = function(){
            $route.reload();
        }
        var lflPlaces = [];

        var onSuccess = function(position) {
            $rootScope.position = position;
        };

        navigator.geolocation.getCurrentPosition(onSuccess);

        if ($rootScope.userLoggedIn === true){
            if($rootScope.user['tent'] !== null){
                lflPlaces.push({
                    lat:$rootScope.user['tent']['location']['location_lat'],
                    lng:$rootScope.user['tent']['location']['location_long'],
                    dsc:'<strong>' + $rootScope.user['user_username'] + '\'s tent</strong>'
                });
        }else{
            lflPlaces.push({
                lat:"51.086849",
                lng:"3.669939",
                dsc:'<strong>' + $scope.user['user_username'] + '\'s tent is not set</strong>'
            });
        }

        if($rootScope.position != null){
            lflPlaces.push({
                lat:$rootScope.position.coords.latitude,
                lng:$rootScope.position.coords.longitude,
                dsc:'<strong>' + 'U bevind zich hier' + '</strong>'
            });
        }

        $scope.lflplacesbasisscholen = lflPlaces;
        $scope.lflrefresh = true;
        console.log($scope.lflplacesbasisscholen);

    }
    
    $scope.logout = function(){
        // Request to go offline
        var requestPath = $rootScope.apipath + 'user/logout';
        $http.post(requestPath, null);
        // Set userLoggedIn status as false
        $rootScope.userLoggedIn = false;
        // Clear user
        $rootScope.user = null;
        $rootScope.user = {"user_username" : "anonymous"};
        // Show logout prompt
        alert("You have been logged out.");
        $location.path("/");
    }
    
    }]);
})();