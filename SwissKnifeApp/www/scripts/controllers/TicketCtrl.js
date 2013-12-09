/**
 * Ticket Controller
 * Created on Dec 9 2013 by Nico Verbruggen
 */

(function(){
    
    'use strict';
    
    // LineupCtrl is an angular controller
    var controllers = angular.module('swissKnifeApp.controllers');
    
    // Defining the controller
    controllers.controller('swissKnifeApp.controllers.TicketCtrl',['$scope', function($scope){

        $scope.ticket = {
            "username" : "nicoverbruggen",
            "event" : "Festivalitis",
            "ticket_id" : "D0D2AAD534EBEC8B37B855CA91FBFB1A3B4B251E17B7CAB383C4A484718664720769188E1E78DE05E313726AF0D7AB0F2D968F07ACA8F4960D8C05BEDD43E347",
            "email" : "nico.verb@gmail.com",
            "price" : "25 EUR"
        };
            
    }]);
})();
