(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.ProfileCtrl',['$scope','$rootScope', function($scope, $rootScope){
        $scope.lflplace = {
            lat:$rootScope.user['tent']['location']['location_lat'],
            lng:$rootScope.user['tent']['location']['location_long'],
            dsc:'<strong>' + $rootScope.user['user_username'] + '\'s tent</strong>'
        };
    }]);
})();