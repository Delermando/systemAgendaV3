'use strict';

angular.module('api.save', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/save', {
    templateUrl: 'views/projects/card/save/view.html',
    controller: 'saveCtrl'
  });
}])

.controller('saveCtrl', [function() {

}])

.controller('DataControllerSave', ['$http', function($http){
    debugger; 
    var store = this;
    store.products = [];  
    
    var userData = {
        fromName: "dede",
        fromEmail: "dede@hotmail.com",
        toName: "dede",
        toEmail: "dede@hotmail.com",
        message: "teste message",
        date: "24-01-1992"
    };
    
    $http.post('http://local.api.com/v1/cards/save', userData).success(function(data) {
         store.products = data.data;
    });
 }]);


