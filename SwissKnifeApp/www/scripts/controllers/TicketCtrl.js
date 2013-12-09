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
            "ticket_id" : 535607621,
            "email" : "nico.verb@gmail.com",
            "price" : "25 EUR"
        };
            
    }]);
})();
