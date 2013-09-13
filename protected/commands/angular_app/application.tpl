/**
 * Template generate on {DATE}
 */

var {APPLICATION_NAME} = angular.module('{APPLICATION_NAME}',[]);

var {APPLICATION_NAME}Config = function($routeProvider){
    $routeProvider
        .when('/application', {
            templateUrl : '',
            //controller : '',
        })
        .otherwise({redirectTo: '/application'});
};

{APPLICATION_NAME}.config({APPLICATION_NAME}Config);