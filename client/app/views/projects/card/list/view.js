'use strict';

angular.module('api.list', ['ngRoute'])

.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.when('/list', {
        templateUrl: 'views/projects/card/list/view.html',
        controller: 'ListCards'
    });
}])

.controller('ListCards',  function ($http, $scope) {
    $scope.apiData = {};
    $http.get('http://local.api.com/v1/cards/list').success(function (apiReturn) {
        $scope.apiData = apiReturn.data;
    });
})

.controller('DeleteCards', function ($scope, $http) {
    $scope.mountArrayOfCardsToDelete = function () {
        var idsSelected = [];

        angular.forEach($scope.apiData, function (card, index) {
            if (card.idToDelete) {  idsSelected.push(card.IDScheduleSend); }
        });

        var jsonPostVar = { idCard: idsSelected };

        $http.post('http://local.api.com/v1/cards/delete', jsonPostVar).success(function (apiReturn) {
            $scope.apiResponse = apiReturn.response;
            $scope.numbOfDeletedItems = apiReturn.data.numbOfDeletedItems;
        });

    };
})

.controller('UpdateCards',  function ($scope, $http, $location) {
    $scope.getIdForUpdate = function () {
        $location.path("/edit/" + this.card.IDScheduleSend)
    };
});

