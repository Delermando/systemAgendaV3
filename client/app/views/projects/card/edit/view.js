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
   
    .controller('editCtrl', function ($scope, $http) {
//        alert('entro');
            console.log($scope.submitForm);
        $scope.submitForm = function (isValid) {
//        if (isValid) {
//            var userData = {
//                fromName: $scope.saveCard.fromName.$viewValue,
//                fromEmail: $scope.saveCard.fromEmail.$viewValue,
//                toName: $scope.saveCard.toName.$viewValue,
//                toEmail: $scope.saveCard.toEmail.$viewValue,
//                message: $scope.saveCard.message.$viewValue,
//                date: $scope.saveCard.selectDay.$viewValue + "-"
//                        + $scope.saveCard.selectMonth.$viewValue + "-"
//                        + $scope.saveCard.selectYear.$viewValue
//            };
//            $http.post('http://local.api.com/v1/cards/update', userData).success(function (data) {
//                $scope.apiResponse = data.response;
//            });
//        }
    };
})

.filter('dateFormat', function(){
    return function(input,separator,option) {
        if (input) {
            var d = input.split(separator);
            if (option === 'year') {
                return d[2];
            } else if (option === 'month'){
                return d[1];
            } else if (option === 'day') {
                return d[0];
            }
        }
    };
})

        
;

//         .service('customHttp', [function(){
//             var customHttp = {};
//     
//             customHttp.get = function(uri,data){
//                $http.get(uri, data).success(function(e) {
//                    if (e.response === 'success') {
//                        return e;
//                    } else {
//                        return false;
//                    }
//                });
//             }
//             
//             
//             return customHttp;
//         }]);
