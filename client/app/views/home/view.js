'use strict';

angular.module('myApp.home', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/home', {
    templateUrl: 'views/home/view.html',
    controller: 'homeCtrl'
  });
}])

.controller('homeCtrl', [function() {

}]);