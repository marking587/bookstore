<?php
/**
 * Created by PhpStorm.
 * User: robertkestel
 * Date: 29.01.17
 * Time: 17:39
 */


?>

<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<body>

<script>
    var app = angular.module("ToDo_Liste", []);
    app.controller("myCtrl", function($scope, $http) {
        $scope.showDetails = false;
        $scope.editor = false;

        $scope.products = [{id:0, title:"alles scheiße", details:"auch nicht besser"},{id:1, title:"puff", details:"tuff tuff tuff"}];
        $scope.addItem = function (title, details) {
            $scope.newValue = {
                id: $scope.products.length + 1,
                title: title,
                details: details
            }

            if (!$scope.newValue) {return;}
            if ($scope.products.indexOf($scope.newValue) == -1) {
                $scope.products.push($scope.newValue);
            } else {
                $scope.errortext = "ToDo Element existiert bereits.";
            }
        };
        $scope.removeItem = function (x) {
            $scope.errortext = "";
            $scope.products.splice(x, 1);
        };
        $scope.show = function (check){
        $scope.showDetails = check;

        };
        $scope.getValues = function(value){

            $scope.actToDo = value;
            $scope.editor = true;
        };
        $scope.editToDo = function (title, details){
            console.log(title);
            console.log(details);
            console.log($scope.actToDo);

            for (i = 0; i < $scope.products.length; i++)
            {


                if($scope.products[i].id == $scope.actToDo.id)
                {
                    if(title){
                        $scope.products[i].title = title;
                    }
                    if(details){
                    $scope.products[i].details = details;

                    }
                }

            }
            $scope.editor = false;
            $scope.actToDo = null;
        };
         $scope.save = function (){
                 $http.post("./json/save_json.php", JSON.stringify($scope.products)).success(function(data) {
                     $scope.hello = data;
                 });


         };

    });
</script>

<div ng-app="ToDo_Liste" ng-cloak ng-controller="myCtrl" class="w3-card-2 w3-margin" style="max-width:400px;">
    <header class="w3-container w3-light-grey w3-padding-16">
        <h3>ToDo Liste</h3>
    </header>
    <ul class="w3-ul">
        <li ng-repeat="x in products" class="w3-padding-16">
            <span ng-bind="x.title"></span>
            <span ng-bind="' Details: ' + x.details" ng-show="showDetails"></span>
            <button style="float: right" ng-click="getValues(x)">     EDIT            </button>
        </li>
    </ul>

    <div class="w3-container w3-light-grey w3-padding-16">
        <div>

        <input type="checkbox" ng-model="check" ng-click="show(check)">
            <label>Details anzeigen</label>
        </div>
            <div class="w3-row w3-margin-top" ng-hide="editor">
            <div class="w3-col s10">

                <input placeholder="ToDo Title" ng-model="addTitle" class="w3-input w3-border w3-padding">
                <input placeholder="ToDo Details" ng-model="addDetails" class="w3-input w3-border w3-padding">
            </div>
            <div class="w3-col s2">
                <button ng-click="addItem(addTitle, addDetails)" class="w3-btn w3-padding w3-green">Add</button>
            </div>


        </div>

        <p class="w3-padding-left w3-text-red">{{errortext}}</p>
        <div class="w3-row w3-margin-top" ng-show="editor">
            <div class="w3-col s10">
                <input ng-value="actToDo.title" ng-model="editTitle" class="w3-input w3-border w3-padding">
                <input ng-value="actToDo.details" ng-model="editDetails" class="w3-input w3-border w3-padding">
            </div>
            <div class="w3-col s2">
                <button ng-click="editToDo(editTitle, editDetails)" class="w3-btn w3-padding w3-green">EDIT</button>
            </div>

        </div>
        <!--Save button-->
        <div class="w3-col s2" style="float: right">

            <button ng-click="save()" class="w3-btn w3-padding w3-green">save</button>
        </div>
        <br>
        <br>
        <div>
            {{hello}}
        </div>
<?php //
//TODO-Robert
//zusatzaufgabe Priorisierung etc.
?>

    </div>

</div>

</body>
</html>
