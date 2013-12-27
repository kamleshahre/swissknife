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

        if($rootScope.user["ticket"] !== null){
            console.log($rootScope.user["ticket"]["ticket_body"]);
            $scope.ticket = {
                "username" :$rootScope.user["user_username"],
                "event" : "Festivalitis",
                "ticket_id" : $rootScope.user["ticket"]["ticket_body"],
                "email" : $rootScope.user["user_mail"],
                "price" : "25 EUR"
            };

            $('#qrcode').qrcode($scope.ticket["username"] + "|" + $scope.ticket["ticket_id"]);
        }else{
            $scope.ticket = null;
        }
            
    }]);
})();
