<html><body>

<script src="angular.min.js"></script>
<script src="angular.js"></script>
<div ng-app="myApp" ng-controller="myCtrl">

<input type="button" value="Name" ng-click="Name()">
<p>{{firstName}} {{lastName}}</p>

</div>

</body>
</html>

<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.firstName= "John";
    $scope.Name= function() {
	$scope.lastName= "Abc";
	}
});
</script>