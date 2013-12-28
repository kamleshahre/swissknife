(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.ProfileCtrl',['$scope','$rootScope', '$http', '$location', function($scope, $rootScope, $http, $location){
        if ($rootScope.userLoggedIn === true){
            if($rootScope.user['tent'] !== null){
            $scope.lflplace = {
                lat:$rootScope.user['tent']['location']['location_lat'],
                lng:$rootScope.user['tent']['location']['location_long'],
                dsc:'<strong>' + $rootScope.user['user_username'] + '\'s tent</strong>'
            };
        }else{
            $scope.lflplace = {
                lat:51.086849,
                lng:3.669939,
                dsc:'<strong>' + $scope.user['user_username'] + '\'s tent is not set</strong>'
            };
        }
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