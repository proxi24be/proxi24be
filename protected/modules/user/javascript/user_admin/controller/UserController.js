UserAdmin.controller('UserController',
    function($scope, $http, UserModel){

        $scope.read = function()
        {
            UserModel.read($http)
                .then(function(response){
                    $scope.db.users = response.data;
                });
        }

        $scope.create = function(new_user)
        {
            UserModel.create($http, new_user)
                .then(function(response){
                    console.log(response.data);
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