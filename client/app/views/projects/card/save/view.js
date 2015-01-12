'use strict';

angular.module('api.save', ['ngRoute'])
.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.when('/save', {
        templateUrl: 'views/projects/card/save/view.html',
        controller: 'saveCtrl'
    });
}])

.controller('saveCtrl', function ($scope, $http) {
    var store = this;
    $scope.submitForm = function (isValid) {
        if (isValid) {
            var userData = {
                fromName: $scope.saveCard.fromName.$viewValue,
                fromEmail: $scope.saveCard.fromEmail.$viewValue,
                toName: $scope.saveCard.toName.$viewValue,
                toEmail: $scope.saveCard.toEmail.$viewValue,
                message: $scope.saveCard.message.$viewValue,
                date: $scope.saveCard.selectDay.$viewValue + "-"
                        + $scope.saveCard.selectMonth.$viewValue + "-"
                        + $scope.saveCard.selectYear.$viewValue
            };
            $http.post('http://local.api.com/v1/cards/save', userData).success(function (data) {
//                if(!$scope.$$phase) {
                     $scope.return =  'de';
//                }
            });
        }
    };
});


