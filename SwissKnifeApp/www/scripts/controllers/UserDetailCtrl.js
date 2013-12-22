(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.UserDetailCtrl',['$scope','$rootScope', '$routeParams', '$http', function($scope,$rootScope, $routeParams, $http){
        // Loads the username of the user
        $scope.username = $routeParams.friendUsername;
        // Set friends (get this information from JSON later)
        $scope.friends = $rootScope.user["friends"];
        // Check if friend is a valid friend.
        var friend = null;
        if($scope.friends !== undefined){

            for (var i=0;i<$scope.friends.length;i++)
            {
                if($scope.username == $scope.friends[i]["user_username"]){friend = $scope.friends[i];}
            }
            if (friend == null){
                // If user doesn't exist, set username to unknown
                $scope.data = {"status":"This user is not your friend."};
            }else{
                $scope.isBusy = true;
                $http.jsonp('http://localhost/HybridAPI/public/API/user/'+ friend["user_id"]+'?callback=JSON_CALLBACK')
                    .success(function(returned_data){
                        $scope.friend = returned_data;
                        console.log(returned_data);
                        $scope.isBusy = false;
                    })
                    .error(function(status, headers, config){
                        console.log("error");
                        // This will usually be called when we have no internets.
                        console.log(status);
                        if (status === 401){
                            $scope.alertMessage = data.error;
                        }
                        else if(status === 0){
                            console.log(data + status + headers + config);
                            $scope.alertMessage = "You seem to be offline.";
                        }else{
                            $scope.alertMessage = "Oops. Something went wrong. Please contact our space gnomes with the following information: <info>STATUS: " + status + " / HEADERS: " + headers + " / CONFIG: " + config + ".</info>";
                        }
                        // Show alert message
                        $scope.isAlert = true;
                        $scope.isBusy = false;
                    });
                $scope.data = {"status":"We're just putting sample information here."};
            }
        }
    }]);
})();