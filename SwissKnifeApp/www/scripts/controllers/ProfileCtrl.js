(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.ProfileCtrl',['$scope','$http','$rootScope','$route', function($scope,$http, $rootScope,$route){
        $scope.Reload = function(){
            $route.reload();
        }

        $scope.Save = function(){
            var requestPath = $rootScope.apipath + 'create/tent';
            var data = {"long" : $rootScope.position.coords.longitude, "lat" : $rootScope.position.coords.latitude};
            $http.post(requestPath, data)
                .success(function(returned_data){
                    if (returned_data.status !== ""){
                        $rootScope.user = returned_data;
                        $route.reload();
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