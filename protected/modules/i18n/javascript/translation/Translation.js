/**
 * Template generate on 13-09-2013 04:09:41
 */

var Translation = angular.module('Translation',[]);

var TranslationConfig = function($routeProvider){
    $routeProvider
        .when('/application', {
<<<<<<< HEAD
            // templateUrl : myConfig.url.application  + '/index',
=======
            templateUrl : myConfig.url.application + '/default',
>>>>>>> 0f02f250a4a8e0df8d4c9de416a008be0f926c2b
            controller : 'DefaultController',
        })
        .otherwise({redirectTo: '/application'});
};

Translation.config(TranslationConfig);