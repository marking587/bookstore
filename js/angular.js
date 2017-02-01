/**
 * Created by robertkestel on 30.01.17.
 */

    var myApp = angular.module('myApp', []);
    myApp.controller('myController',function($scope, $http) {
        $scope.callBook = function(book) {

            $http.get("./api/search.php", {
                params: {
                    name: book
                }
            }).success(function (data) {

                $scope.resultSearch = data;
            });
        };

        $scope.chooseBook = function(index){
            var prodID = index;

            $http.get("./index.php?page=bookUI&ProductID='prodID'",  {
                params: {
                    id: index}}).success(function(data) {
                $scope.singleBook = data;

                window.location.href = "./index.php?page=bookUI&ProductID=" + prodID;
                });
            };
    });
