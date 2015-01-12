'use strict';

angular.module('api.list', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/list', {
    templateUrl: 'views/card/list/view.html',
    controller: 'listCtrl'
  });
}])


.controller('listCtrl', [function() {

}])

.controller('DataControllerList', ['$http', function($http){    
    var store = this;
    store.products = [];
    $http.get('http://local.api.com/v1/cards/list').success(function(data){
            store.products = data.data;
    });     
 }]);