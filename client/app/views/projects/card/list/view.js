'use strict';

angular.module('api.list', ['ngRoute'])

.config(['$routeProvider', function ($routeProvider) {
        $routeProvider.when('/list', {
            templateUrl: 'views/projects/card/list/view.html',
            controller: 'DataControllerList'
        });
    }])


.controller('DataControllerList', ['$http', '$scope', function ($http, $scope) {
        $scope.json = {};
        $http.get('http://local.api.com/v1/cards/list').success(function (data) {
            $scope.json = data.data;
        });
    }])


.controller('DeleteCards', ['$scope', '$http', function ($scope, $http) {
        $scope.mountArrayOfCardsToDelete = function () {
            var selectedTodos = [];
            var indexDeleteItens = [];

            angular.forEach($scope.json, function (cardInfo, index) {
                if (cardInfo.id) {
                    selectedTodos.push(cardInfo.IDScheduleSend);
                }
            });

            var jsonIdsDelete = {
                idCard: selectedTodos
            };


            $http.post('http://local.api.com/v1/cards/delete', jsonIdsDelete).success(function (data) {
                $scope.apiResponse = data.response;
                $scope.numbOfDeletedItens = data.data.numbOfItensDeleted;
            });

        };
    }])

.controller('UpdateCards', ['$scope', '$http', '$location', function ($scope, $http, $location) {
        $scope.getIdForUpdate = function () {
            $location.path("/edit/" + this.cardInfo.IDScheduleSend)
        };
}]);

