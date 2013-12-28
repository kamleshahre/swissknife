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

        checkConnection();
        function checkConnection() {
            var networkState = navigator.connection.type;

            var states = {};
            states[Connection.UNKNOWN]  = 'Unknown connection';
            states[Connection.ETHERNET] = 'Ethernet connection';
            states[Connection.WIFI]     = 'WiFi connection';
            states[Connection.CELL_2G]  = 'Cell 2G connection';
            states[Connection.CELL_3G]  = 'Cell 3G connection';
            states[Connection.CELL_4G]  = 'Cell 4G connection';
            states[Connection.CELL]     = 'Cell generic connection';
            states[Connection.NONE]     = false;

            $scope.connection = states[networkState];

            if(!$scope.connection){
                $scope.lflplace = {
                    lat:51.086849,
                    lng:3.669939,
                    dsc:'<strong>' + 'test' + '</strong>'
                };
                $scope.hidden='show';
            }else{
                $scope.hidden='hidden';
            }
        }

    }]);
})();