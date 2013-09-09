'use strict';

/* Filters */
var miushakeFilters = angular.module('miushake.filters', []);

miushakeFilters.filter('interpolate', ['version', function(version) {
    return function(text) {
      return String(text).replace(/\%VERSION\%/mg, version);
    }
}]);
