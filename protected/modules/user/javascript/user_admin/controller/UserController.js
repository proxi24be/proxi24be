UserAdmin.controller('UserController',
    function($scope, $http, UserModel){

        $scope.read = function ()
        {
            UserModel.read($http)
                .then(function(response){
                    $scope.db.users = response.data;
                });
        }

        $scope.delete = function(email)
        {
            
        }

        //init start.
        $scope.dataToCollect = {};
        $scope.db = {};
        $scope.read();
        //init end.
});