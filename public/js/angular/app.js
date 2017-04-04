var app = angular.module('app', ['ui.select', 'ngSanitize','moment-picker'],
function($interpolateProvider) { 
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
    
});