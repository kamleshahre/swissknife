(function(){
    // USE STRICT
    'use strict';
    // SET UP CONTROLLERS AS ANGULAR MODULE
    var controllers = angular.module('swissKnifeApp.controllers');
    // SET MAIN CONTROLLER
    controllers.controller('swissKnifeApp.controllers.PhotoUploadCtrl',['$scope', '$rootScope', '$routeParams', '$upload', function($scope, $rootScope, $routeParams, $upload){

    $scope.uploadStatus = false; // Bool to check if uploading right now
    $scope.uploadDeclined = false;
    $scope.uploadFailed = false;
    $scope.message = "";

$scope.onFileSelect = function($files) {
    var conf = confirm("Are you sure you want to upload this image?");
    if(conf === true){
        $scope.uploadStatus = true;
        $scope.uploadDeclined = false;
        $scope.uploadFailed = false;
        $(".progress").addClass("active");
         //$files: an array of files selected, each file has name, size, and type.
        for (var i = 0; i < $files.length; i++) {
          var file = $files[i];
          $scope.upload = $upload.upload({
            url: $rootScope.apipath + 'upload/image', //upload.php script, node.js route, or servlet url
            // method: POST or PUT,
            // headers: {'headerKey': 'headerValue'}, withCredential: true,
            data: {myObj: $scope.myImg},
            file: file,
            // file: $files, //upload multiple files, this feature only works in HTML5 FromData browsers
            /* set file formData name for 'Content-Desposition' header. Default: 'file' */
            //fileFormDataName: myFile,
            /* customize how data is added to formData. See #40#issuecomment-28612000 for example */
            //formDataAppender: function(formData, key, val){} 
          }).progress(function(evt) {
                $("#progress").removeClass("progress-bar-danger");
                $("#progress").attr("aria-valuenow", (parseInt(100.0 * evt.loaded / evt.total)));
                $("#progress").css("width", parseInt(100.0 * evt.loaded / evt.total) + "%");
          }).success(function(data, status, headers, config) {
            // file is uploaded successfully
                console.log(data);
          })
          .error(function(object, code){
              $scope.uploadFailed = true;
              $("#progress").addClass("progress-bar-danger");
              $(".progress").removeClass("active");
              $("#progress").css("width", "100%");
              switch(code){
                  case 500:
                    $scope.message = "Upload failed. Internal server error.";
                    break;
                 // TODO: optional extra error messages
                 default:
                    console.log(code);
                    $scope.message = "Upload failed. Error code " + code + ".";
                    break;
              }
              
          });
          //.then(success, error, progress); 
        }
    }else{
        $scope.uploadDeclined = true;
    }
}

    }]);
})();