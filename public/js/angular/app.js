var app = angular.module('app', ['ui.select', 'ngSanitize'],
function($interpolateProvider) { 
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
    
});