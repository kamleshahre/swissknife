'use strict';

angular.module('LocalStorageModule').value('prefix', 'swissKnifeApp');

angular.module('swissKnifeApp.controllers', []);
angular.module('swissKnifeApp.services', []);
angular.module('swissKnifeApp.directives', []);

var app = angular
.module('swissKnifeApp',
    [
    'ngRoute',
    'ngResource',
    'swissKnifeApp.controllers',
    'swissKnifeApp.services',
    'swissKnifeApp.directives',
    'LocalStorageModule'
    ]
).config(
    ['$routeProvider','$locationProvider', '$httpProvider', function($routeProvider, $locationProvider, $httpProvider){
    // CROSS DOMAIN CALLS OK
    $httpProvider.defaults.useXDomain = true;
    // DELETE REQUESTED WITH
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
    // MAIN VIEW
    $routeProvider.when('/', {templateUrl:'views/main.html', controller:'swissKnifeApp.controllers.MainCtrl'});
    $routeProvider.when('/app', {templateUrl:'views/main.html', controller:'swissKnifeApp.controllers.MainCtrl'});
    // OTHERWISE, REDIRECT TO ROOT
    // $routeProvider.otherwise({redirectTo: '/'});
}]
).run(['$rootScope', '$timeout', '$location', 'swissKnifeApp.services.WeatherSrvc',function($rootScope, $timeout, $location, WeatherSrvc){
    // APP INIT
    $rootScope.appInitialized = false;
    // SET /app PATH
    $rootScope.$on('$routeChangeStart', function(event, next, current){
        if(!$rootScope.appInitialized)
        {
            $location.path('/app');
        }
        else if($rootScope.appInitialized && $location.path() === '/app')
        {
            $location.path('/');
        }
    });
}]);

/*

App Controller
Does things.

 */

var appCtrl = app.controller('AppCtrl', ['$scope', '$location', 'appInitialized', function($scope, $location, appInitialized){
    if(appInitialized){
        $location.path('/');
    }
}]);