/**
 * Lineup Controller
 * Created on Dec 9 2013 by Nico Verbruggen
 */

(function(){
    
    'use strict';
    
    // LineupCtrl is an angular controller
    var controllers = angular.module('swissKnifeApp.controllers');
    
    // Defining the controller
    controllers.controller('swissKnifeApp.controllers.FriendsCtrl',['$scope', '$rootScope', '$http', function($scope, $rootScope, $http){
    console.log($rootScope.user['friends']);

}]);
})();
