/**
 * Photo Feed Controller
 * Created on Dec 9 2013 by Nico Verbruggen
 */

(function(){
    
    'use strict';
    
    // LineupCtrl is an angular controller
    var controllers = angular.module('swissKnifeApp.controllers');
    
    // Defining the controller
    controllers.controller('swissKnifeApp.controllers.PhotoFeedCtrl',['$scope', function($scope){
            
            // Define stages
            
            $scope.feed = [
                {"src":"werchter.jpg", "alt":"werchter"},
                {"src":"werchter2.jpg", "alt":"werchter"},
                {"src":"werchter3.jpg", "alt":"werchter"}
            ];
            
            // Parse data from each stage
            
            // Display stage information using View
            
    }]);
})();
