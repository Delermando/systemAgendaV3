'use strict';

angular.module('api.edit', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/edit', {
    templateUrl: 'views/card/edit/view.html',
    controller: 'editCtrl'
  });
}])

.controller('editCtrl', [function() {

}])


.controller('DataControllerEdit', ['$http', function($http){
    debugger; 
    var store = this;
    store.products = [];  
        
    var userData = {
        table: "psnMessageToSend",
        column: "agnMessage",
        id: "223",
        value: "dede@hotmaDDil.codem"
    };
    
    $http.post('http://local.api.com/v1/cards/update', userData).success(function(data) {
        console.log(data);
    });
 }]);
