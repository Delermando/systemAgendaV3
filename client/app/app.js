'use strict';

// Declare app level module which depends on views, and components
angular.module('api', [
  'ngRoute',
  'api.home',
  'api.list',
  'api.save',
  'api.edit',
  'api.delete',
  'api.version'
]).
config(['$routeProvider', '$httpProvider', '$sceDelegateProvider', function($routeProvider, $httpProvider, $sceDelegateProvider) {
	$httpProvider.defaults.headers = {'Content-Type': 'application/x-www-form-urlencoded'};
//	$httpProvider.defaults.headers.delete = {'Content-Type': 'application/x-www-form-urlencoded'}
//	$httpProvider.defaults.headers.delete = {'Content-Type': 'application/json'}
//	$httpProvider.defaults.headers.delete = {'Content-Type': 'text/plain'}
//	$httpProvider.defaults.headers.put = {'Content-Type': 'application/json'}
//        $httpProvider.defaults.headers.put['Content-Type'] = 'application/x-www-form-urlencoded';
    
//        $sceDelegateProvider.resourceUrlWhitelist([
//            // Allow same origin resource loads.
//            'self',
//            // Allow loading from our assets domain.  Notice the difference between * and **.
//            'http://local.api.com/**'
//        ]);
        //delete $httpProvider.defaults.headers.common['X-Requested-With'];
  	$routeProvider.otherwise({redirectTo: '/home'});
}]);


