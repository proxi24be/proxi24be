var UserAdmin = angular.module('UserAdmin',[]);

var UserAdminConfig = function($routeProvider){
    $routeProvider
        .when('/', {
            templateUrl : myConfig.angularUrl + '/default',
            controller : 'UserController',
        });
};

UserAdmin.config(UserAdminConfig);