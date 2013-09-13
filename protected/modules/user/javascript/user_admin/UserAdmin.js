var UserAdmin = angular.module('UserAdmin',[]);

var UserAdminConfig = function($routeProvider){
    $routeProvider
        .when('/application', {
            templateUrl : myConfig.angularUrl + '/welcome',
        })
        .when('/application/editUser', {
            templateUrl : myConfig.angularUrl + '/getUsers',
            controller : 'UserController',
        })
        .otherwise({redirectTo: '/application'});
};

UserAdmin.config(UserAdminConfig);