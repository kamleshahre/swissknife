(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.UserDetailCtrl',['$scope','$rootScope', '$routeParams', '$http', function($scope,$rootScope, $routeParams, $http){
        // Loads the username of the user
        $scope.username = $routeParams.friendUsername;
        // Set friends (get this information from JSON later)
        $scope.friends = $rootScope.user["friends"];
        // Check if friend is a valid friend.
        var friend = null;
        if($scope.friends !== undefined){

            for (var i=0;i<$scope.friends.length;i++)
            {
                if($scope.username == $scope.friends[i]["user_username"]){friend = $scope.friends[i];}
            }
            if (friend == null){
                // If user doesn't exist, set username to unknown
                $scope.data = {"status":"This user is not your friend."};
            }else{
                $scope.isBusy = true;
                $http.jsonp($rootScope.apipath + 'user/'+ friend["user_id"]+'?callback=JSON_CALLBACK')
                    .success(function(returned_data){
                        $scope.friend = returned_data;
                        console.log(returned_data);
                        if($scope.friend['tent'] !== null){
                            lflPlaces.push({
                                lat:$scope.friend['tent']['location']['location_lat'],
                                lng:$scope.friend['tent']['location']['location_long'],
                                dsc:'<strong>' + $scope.friend['user_username'] + '\'s tent</strong>'
                            });
                        }else
                        {
                            $scope.lflplace = {
                                lat:51.086849,
                                lng:3.669939,
                                dsc:'<strong>' + $scope.friend['user_username'] + '\'s tent is not set</strong>'
                            };
                        }
                        $scope.isBusy = false;
                    });
                $scope.data = {"status":"We're just putting sample information here."};
            }
        }
        
        var lflPlaces = [];

        var onSuccess = function(position) {
            $rootScope.position = position;
        };

        navigator.geolocation.getCurrentPosition(onSuccess);

        if ($rootScope.userLoggedIn === true) {
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
        
    }]);
})();