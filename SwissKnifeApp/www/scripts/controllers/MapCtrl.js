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
    controllers.controller('swissKnifeApp.controllers.MapCtrl',['$scope', function($scope){
       $scope.lflplace = {
                lat: 51.086849,
                lng: 3.669939,
                dsc:'<strong>This is where the festival is located!</strong>'
            };
    }]);
})();
    
