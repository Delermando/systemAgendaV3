'use strict';

angular.module('api.list', ['ngRoute'])

    .config(function ($routeProvider) {
        $routeProvider.when('/list/:pageNumb', {
            templateUrl: 'views/projects/card/list/view.html',
            controller: 'ListCards'
        });
    })

    .controller('ListCards', function ($http, $scope, $routeParams) {
        $scope.apiData = {};
        $scope.predicate = '';
        $http.get('http://local.api.com/v1/cards/list').success(function (apiReturn) {
            $scope.apiData = pagination(apiReturn.data, 8, $routeParams.pageNumb);
        });
        
        var pagination =  function(arrayJsonObjects, numbOfItensPerPage, actualPage){
            var arrayToDisplay = [];
            if(arrayJsonObjects !== null){
                var numgOfObjects = arrayJsonObjects.length
                var numbOfPages = Math.ceil(numgOfObjects/ numbOfItensPerPage);
                var end = actualPage * numbOfItensPerPage;
                var start = end - numbOfItensPerPage;
                var obejctToEachPage = {};
                
                for(var i = start; end > i; i++ ){
                    if(arrayJsonObjects[i] !== undefined){
                        arrayToDisplay.push(arrayJsonObjects[i]);
                    }
                }
                $scope.obejctToEachPage = {};
                for(var i = 1; numbOfPages >= i; i++ ){
                    $scope.obejctToEachPage[i] =  i;
                }
             }
            return arrayToDisplay; 
        }
    })
    
    
    .controller('CallUpdatePage', function ($scope, $http, $location) { //transforma um service
        $scope.getIdForUpdate = function () {
            $location.path("/edit/" + this.card.IDScheduleSend)
        };
    })
    
    
    .controller('DeleteCards', function ($scope, $http) { //transforma um service
        $scope.deleteCards = function () {
            creatArrayWithChekedElements();
            deleteItenOnAPI({idCard: $scope.idsSelected});
        };

        var creatArrayWithChekedElements = function () {
            $scope.indexOfElements = [];
            $scope.idsSelected = [];
            angular.forEach($scope.apiData, function (card, index) { 
                if (card.idToDelete) {
                    $scope.idsSelected.push(card.IDScheduleSend);
                    $scope.indexOfElements.push(index);
                }
            });
        }

        var deleteItendFromScope = function (arrayIndexItensDeleted) {
            angular.forEach(arrayIndexItensDeleted, function () {
                $scope.apiData.splice(arrayIndexItensDeleted, 1);
            })
        }

        var deleteItenOnAPI = function (jsonPostVar) {
            $http.post('http://local.api.com/v1/cards/delete', jsonPostVar).success(function (apiReturn) {
                if (apiReturn.response == 'success') {
                    deleteItendFromScope($scope.indexOfElements);
                    $scope.apiResponse = apiReturn.response;
                    $scope.numbOfDeletedItems = apiReturn.data.numbOfDeletedItems;
                }
            });
        }

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
