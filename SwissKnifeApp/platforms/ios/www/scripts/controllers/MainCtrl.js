/**
 * Created by nicoverbruggen on 05/12/13.
 * Main controller of app.
 */

(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.MainCtrl',['$scope', '$routeParams', 'weatherApp.services.KnifeSrvc', 'knife', function($scope, $routeParams, KnifeSrvc, knife){
    }]);
})();
