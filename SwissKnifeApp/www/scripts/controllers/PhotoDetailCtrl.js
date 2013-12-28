(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.PhotoDetailCtrl',['$scope', '$routeParams', function($scope, $routeParams){
            // Loads the photo ID
            $scope.id = $routeParams.photoID;
            // Loads the owner of the photo
            $scope.username = $routeParams.photoOwner;
            $scope.image = "content/PhotoFeed/werchter.jpg";
    }]);
})();