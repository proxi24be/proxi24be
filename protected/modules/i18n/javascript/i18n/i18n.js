var i18n = angular.module('i18n',[]);

var i18nConfig = function($routeProvider){
    $routeProvider
        .when('/', {
            templateUrl : myConfig.angularUrl + '/default',
            controller : 'MessageController',
        });
};

i18n.config(i18nConfig);