/**
 * Created by nicoverbruggen on 05/12/13.
 */

(function(){

    'use strict';

    // DEFINE SERVICES AS ANGULAR MODULE
    var services = angular.module('swissKnifeApp.services');

    // SET UP SERVICES.FACTORY
    services.factory('swissKnifeApp.services.KnifeSrvc',
        ['$rootScope', '$http', '$q', 'localStorageService',
        function($rootScope, $http, $q, localStorageService)
        {

        }
        ]
    );
})();