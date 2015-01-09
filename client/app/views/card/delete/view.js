'use strict';

angular.module('api.delete', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/delete', {
    templateUrl: 'views/card/delete/view.html',
    controller: 'deleteCtrl'
  });
}])

.controller('deleteCtrl', [function() {

}])

.controller('DataControllerDelete', ['$http', function($http){
    debugger; 
    var store = this;
    store.products = [];  
        
    var userData = {
        idCard: "223"
    };
    
    $http.get('http://local.api.com/v1/cards/delete/ddede', userData).success(function(data) {
        console.log(data);
    });
 }]);
