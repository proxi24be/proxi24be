/**
 * Template generated on 15-Sep-2013 00:09:40
 */

var Translation = angular.module('Translation',[]);

var TranslationConfig = function($routeProvider){
    $routeProvider
        .when('/application', {
            templateUrl : myConfig.url.application + '/default',
            controller : 'DefaultController',
        })
        .otherwise({redirectTo: '/application'});
};

Translation.config(TranslationConfig);