/**
 * Created by Nicolas on 06/03/14.
 */

var app = angular.module("newArticle", [])
    .config(["$httpProvider", function($httpProvider){
        $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    }]);



app.controller("NewAricleFormCtrl", ["$scope", "$http", function($scope, $http){

    $scope.item = {
        "name": "",
        "reference": "",
        "description": "",
        "stock": 0
    };

    $scope.newtype = "";

    $scope.categories = [
        //{"name":"sans type", "id":0}
    ];

    $scope.designationBlur = function () {
        //console.log("designation:" + $scope.item.name);
        // test de validité
    };

    $scope.referenceBlur = function () {
        //console.log("reference:" + $scope.item.reference);
        // test de validité
    };

    $scope.descriptionBlur = function () {
        // test de validité
    };

    $scope.stockBlur = function () {
        // test de validité
    };

    $scope.onChangeType = function(){

    };

    $scope.newtypeBlur = function () {
        // test de validité
    };

    $scope.submit = function () {

    };

}]);
