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
            var WEATHER_SUCCESS = false;
            var LOCATION_SUCCESS = false;

            var URLWEATHER_NOW = '';
            var MSG_WEATHER_FAIL = 'We could not connect to the weather API.'
            var MSG_LOCATION_FAIL = 'We could not use your location.'

            function getLocation()
            {
                if (navigator.geolocation)
                {
                    navigator.geolocation.getCurrentPosition(usePosition);
                }
                else
                {
                    console.log("Geolocation is not supported by this browser.");
                }
            }

            function usePosition(position){
                // If we get this far, getting location is successful!
                LOCATION_SUCCESS = true;
                // var URLWEATHER = api.openweathermap.org/data/2.5/weather?lat=35&lon=139
                var key = '9b19f324ad13749c0a485b7c50cd3db0';
                var lat = position.coords.latitude;
                var long  = position.coords.longitude;
                var URLWEATHER = 'http://api.openweathermap.org/data/2.5/weather?lat=' + lat + '&lon=' + long;
                console.log(URLWEATHER);
                URLWEATHER_NOW = URLWEATHER;
            }

            // Hack for calling private functions and varaibles in the return statement
            var that = this;

            this.initLocation = function(){
                getLocation();
            }

            this.initAPI = function(){
            }


        }
        ]
    );
})();