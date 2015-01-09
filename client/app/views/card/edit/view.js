'use strict';

angular.module('myApp.edit', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/edit', {
    templateUrl: 'views/card/edit/view.html',
    controller: 'editCtrl'
  });
}])

.controller('editCtrl', [function() {

}]);