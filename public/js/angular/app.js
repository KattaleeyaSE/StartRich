var app = angular.module('app', ['ui.select', 'ngSanitize','moment-picker','angular.filter'],
function($interpolateProvider) { 
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
    
});