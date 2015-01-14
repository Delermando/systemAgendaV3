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
    $http.get('http://local.api.com/v1/cards/list',{cache:true}).success(function (apiReturn) {
        $scope.apiData = apiReturn.data;
    });
})

.controller('DeleteCards', function ($scope, $http) { //transforma um service
    $scope.deleteCards = function () {
        $scope.creatArrayWithChekedElements();
        $scope.deleteItendFromScope($scope.indexOfElements);
        $scope.deleteItenOnAPI({ idCard: $scope.idsSelected });
    };
    
    $scope.creatArrayWithChekedElements = function(){
        $scope.indexOfElements = [];
        $scope.idsSelected = [];
         angular.forEach($scope.apiData, function (card, index) { //cria funcao
            if (card.idToDelete) {  
                $scope.idsSelected.push(card.IDScheduleSend); 
                $scope.indexOfElements.push(index);
            }
        });
    }
    
    $scope.deleteItendFromScope = function(arrayIndexItensDeleted){
        angular.forEach(arrayIndexItensDeleted, function(){
            $scope.apiData.splice(arrayIndexItensDeleted, 1);
        })
    }
    
    $scope.deleteItenOnAPI = function(jsonPostVar){
        $http.post('http://local.api.com/v1/cards/delete', jsonPostVar).success(function (apiReturn) {
            if(apiReturn.response == 'success'){
                $scope.apiResponse = apiReturn.response;// colocar if caso sucesso remover
                $scope.numbOfDeletedItems = apiReturn.data.numbOfDeletedItems;
                
            }
        });
    }
    
})

.controller('CallUpdatePage',  function ($scope, $http, $location) { //transforma um service
    $scope.getIdForUpdate = function () {
        $location.path("/edit/" + this.card.IDScheduleSend)
    };
});


//.service('customHttp', [function(){
//var customHttp = {};
//
//customHttp.get = function (uri, data) {
//    $http.get(uri, data).success(function (e) {
//        if (e.response === 'success') {
//            return e;
//        } else {
//            return false;
//        }
//    });
//}
