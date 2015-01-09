'use strict';

angular.module('myApp.delete', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/delete', {
    templateUrl: 'views/card/delete/view.html',
    controller: 'deleteCtrl'
  });
}])

.controller('deleteCtrl', [function() {

}]);