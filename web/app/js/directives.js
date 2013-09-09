'use strict';

/* Directives */
var miushakeDirectives = angular.module('miushake.directives', []);

miushakeDirectives.directive('appVersion', ['version', function(version) {
    return function(scope, elm, attrs) {
      elm.text(version);
    };
}]);
