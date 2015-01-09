'use strict';

angular.module('myApp.list', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/list', {
    templateUrl: 'views/card/list/view.html',
    controller: 'listCtrl'
  });
}])

.controller('listCtrl', [function() {

}]);