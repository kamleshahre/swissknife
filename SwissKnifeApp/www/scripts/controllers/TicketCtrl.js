/**
 * Ticket Controller
 * Created on Dec 9 2013 by Nico Verbruggen
 */

(function(){
    
    'use strict';
    
    // LineupCtrl is an angular controller
    var controllers = angular.module('swissKnifeApp.controllers');
    
    // Defining the controller
    controllers.controller('swissKnifeApp.controllers.TicketCtrl',['$scope','$rootScope', function($scope,$rootScope){

    if ($rootScope.userLoggedIn === true){
        if($rootScope.user["ticket"] !== null){
            $scope.ticket = {
                "username" : $rootScope.user["user_username"],
                "event" : "Festivalitis",
                "ticket_id" : $rootScope.user["ticket"]["ticket_body"],
                "email" : $rootScope.user["user_mail"],
                "price" : "25 EUR"
            };
        }else{
            $scope.ticket = null;
            $scope.noTicket = true;
        }
    }else{
        $scope.ticket = null;
    }
            
    }]);
})();
