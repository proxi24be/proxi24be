var i18n = angular.module('i18n',[]);

var i18nConfig = function($routeProvider){
    $routeProvider
        .when('/application', {
            templateUrl : myConfig.url.application + '/sourceMessage/table',
            controller : 'SourceMessageController',
        })
        .otherwise({redirectTo: '/application'});
};

i18n.config(i18nConfig);