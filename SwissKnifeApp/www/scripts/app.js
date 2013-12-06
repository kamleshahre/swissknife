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
    // /
    $routeProvider.when('/', {templateUrl:'views/welcome.html'});
    // /login
    $routeProvider.when('/login', {templateUrl:'views/login.html', controller:'swissKnifeApp.controllers.LoginCtrl'});
    // /app
    $routeProvider.when('/app', {
            templateUrl:'views/main.html',
            controller:'swissKnifeApp.controllers.MainCtrl',
            resolve: {
                //
            }
    });
    $routeProvider.when('/register', {
            templateUrl:'views/register.html',
            controller:'swissKnifeApp.controllers.RegisterCtrl',
            resolve: {
                //
            }
    });
    $routeProvider.when('/map', {
            templateUrl:'views/map.html',
            controller:'swissKnifeApp.controllers.MapCtrl',
            resolve: {
                //
            }
    });
    // OTHERWISE, REDIRECT TO ROOT
    // $routeProvider.otherwise({redirectTo: '/'});
}]
).run(['$rootScope', '$timeout', '$location', 'swissKnifeApp.services.KnifeSrvc',function($rootScope, $timeout, $location, KnifeSrvc){
    // APP INIT
    $rootScope.appInitialized = false;
    // SET /app PATH
    /*$rootScope.$on('$routeChangeStart', function(event, next, current){
        if(!$rootScope.appInitialized) // + check if logged in!
        {
            $location.path('/');
        }
        else if($rootScope.appInitialized && $location.path() === '/app')
        {
            $location.path('/');
        }
    });*/
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