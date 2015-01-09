'use strict';

angular.module('myApp.save', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/save', {
    templateUrl: 'views/card/save/view.html',
    controller: 'saveCtrl'
  });
}])

.controller('saveCtrl', [function() {

}]);