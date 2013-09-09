'use strict';

// App
var miushakeApp = angular.module('miushake',
    ['miushake.filters', 'miushake.services', 'miushake.directives', 'miushake.controllers']);

miushakeApp.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/view1', {templateUrl: 'app/partials/partial1.tpl.html', controller: 'MyCtrl1'});
    $routeProvider.when('/view2', {templateUrl: 'app/partials/partial2.tpl.html', controller: 'MyCtrl2'});
    $routeProvider.otherwise({redirectTo: '/view1'});
}]);
