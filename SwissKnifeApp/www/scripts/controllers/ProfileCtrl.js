(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.ProfileCtrl',['$scope','$rootScope', function($scope, $rootScope){
        try{
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
    }catch(ex){
        $scope.no_user = true;
    }
    }]);
})();