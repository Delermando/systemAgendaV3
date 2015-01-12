'use strict';

angular.module('api.delete', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/delete', {
    templateUrl: 'views/projects/card/delete/view.html',
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
        idCard: "245"
    };
    
    $http.post('http://local.api.com/v1/cards/delete/248', userData).success(function(data) {
        console.log(data);
    });
 }]);
