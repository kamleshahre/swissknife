/**
 * Lineup Controller
 * Created on Dec 9 2013 by Nico Verbruggen
 */

(function(){
    
    'use strict';
    
    // LineupCtrl is an angular controller
    var controllers = angular.module('swissKnifeApp.controllers');
    
    // Defining the controller
    controllers.controller('swissKnifeApp.controllers.LineupCtrl',['$scope', function($scope){
            
            // Get data from provider
            
            
            
            // Define stages
            
            $scope.stages = [
                {"id" : 0, "name" : "Stage #1", "schedule" : [
                        {"hour":"15:00", "artist":"Muse", "link":"http://muse.mu"},
                        {"hour":"16:00", "artist":"Foo Fighters", "link":"http://www.foofighters.com/be/home"},
                        {"hour":"17:00", "artist":"John Mayer", "link":"http://johnmayer.com"}
                ]},
                {"id" : 1, "name" : "Stage #2", "schedule" : [
                        {"hour":"17:00", "artist":"John Mayer", "link":"http://johnmayer.com"},
                        {"hour":"18:00", "artist":"Katy Perry", "link":"http://www.katyperry.com"}
                ]}
            ];
            
            // Parse data from each stage
            
            // Display stage information using View
            
    }]);
})();
