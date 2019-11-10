<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<body>

<div ng-app="myApp" ng-controller="myCtrl">

<h1 ng-mousemove="count = count + 1">Mouse Over Me!</h1>

<h2>{{ count }}</h2>

</div>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.count = 0;
});
</script> 

</body>

<!-- Mirrored from www.w3schools.com/angular/tryit.asp?filename=try_ng_events_mousemove by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 08 Apr 2016 03:40:01 GMT -->
</html>
