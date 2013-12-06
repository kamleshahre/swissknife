(function(){
    'use strict';
    var controllers = angular.module('swissKnifeApp.controllers');

    controllers.controller('swissKnifeApp.controllers.HeaderCtrl',['$scope', '$location', '$rootScope',
        function($scope, $location, $rootScope){
            $rootScope.isRouteActive = function(route) {
                if(route === '/')
                    return route === $location.path();
                else
                    return $location.path().indexOf(route) !== -1;
            };
        }
    ]);
})();