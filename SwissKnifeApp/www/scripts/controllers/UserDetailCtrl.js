(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.UserDetailCtrl',['$scope', '$routeParams', function($scope, $routeParams){
        // Loads the username of the user
        $scope.username = $routeParams.friendUsername;
        // Set friends (get this information from JSON later)
        $scope.friends = ['nedstark', 'dany', 'robbstark', 'jaimelannister', 'tyrion'];
        // Check if friend is a valid friend.
        if ($.inArray($scope.username, $scope.friends, 0) === -1){
            // If user doesn't exist, set username to unknown
            $scope.data = {"status":"This user is not your friend."};
        }else{
            // Otherwise, show sample data
            $scope.data = {"status":"We're just putting sample information here."};
        }
    }]);
})();