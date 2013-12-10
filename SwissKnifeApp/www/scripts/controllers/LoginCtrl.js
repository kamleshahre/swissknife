/**
 * Created by nicoverbruggen on 05/12/13.
 * Login controller of app.
 */

(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.LoginCtrl',['$scope', function($scope){
    
        $scope.getCredentials = function(){
            
            var email = $scope.email;
            var password = $scope.password;
            
            var data = {"email" : $scope.email, "password" : $scope.password}
            
            $.ajax({
                type: "POST",
                dataType: "text",
                contentType: "plain/text",
                cache: false,
                data: data,
                url:  "http://localhost:8080/HybridAPI/public/API/user/login",
                beforeSend: function(xhr) {
                },
                success: function(data){
                    console.log(data);
                }
            });
            
        };
    }]);
})();

