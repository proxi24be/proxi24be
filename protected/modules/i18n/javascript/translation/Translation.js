/**
 * Template generate on 13-09-2013 04:09:41
 */

var Translation = angular.module('Translation',[]);

var TranslationConfig = function($routeProvider){
    $routeProvider
        .when('/application', {
            // templateUrl : myConfig.url.application  + '/index',
            controller : 'DefaultController',
        })
        .otherwise({redirectTo: '/application'});
};

Translation.config(TranslationConfig);