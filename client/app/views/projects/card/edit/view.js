'use strict';

angular.module('api.edit', ['ngRoute'])

.config(['$routeProvider', function ($routeProvider) {
        $routeProvider.when('/edit/:idCard', {
            templateUrl: 'views/projects/card/edit/view.html',
            controller: 'DataEditController'
        });
    }])

.controller('DataEditController', ['$scope', '$http', '$routeParams', '$filter', function ($scope, $http, $routeParams, $filter) {
        $scope.card = {};
        $http.get('http://local.api.com/v1/cards/list/' + $routeParams.idCard).success(function (response) {
            var arrayDate = (response.data[0].dateToSend).split('-');
            $scope.card = response.data[0];
            $scope.card['day'] = arrayDate[0];
            $scope.card['month'] = arrayDate[1];
            $scope.card['year'] = arrayDate[2];
        });
    }])

.controller('editCtrl', function ($scope, $http, $routeParams) {
    $scope.submitFormEdit = function (isValid) {
        if (isValid) {
            var userData = {
                idCard: $routeParams.idCard,
                fromName: $scope.editCard.fromName.$viewValue,
                fromEmail: $scope.editCard.fromEmail.$viewValue,
                toName: $scope.editCard.toName.$viewValue,
                toEmail: $scope.editCard.toEmail.$viewValue,
                message: $scope.editCard.message.$viewValue,
                date: $scope.editCard.selectDay.$viewValue + "-"
                        + $scope.editCard.selectMonth.$viewValue + "-"
                        + $scope.editCard.selectYear.$viewValue
            };

            console.log(userData)
            $http.post('http://local.api.com/v1/cards/update', userData).success(function (data) {
                $scope.apiResponse = data.response;
            });
        }
    };
});



