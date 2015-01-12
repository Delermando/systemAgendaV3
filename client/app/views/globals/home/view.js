'use strict';

angular.module('api.home', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/home', {
    templateUrl: 'views/globals/home/view.html',
    controller: 'homeCtrl'
  });
}])

.controller('homeCtrl', [function() {

}]);