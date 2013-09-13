UserAdmin.controller('UserController',
    function($scope, $http, UserModel){

        $scope.read = function()
        {
            UserModel.read($http)
                .then(function(response){
                    $scope.db.users = response.data;
                });
        }

        $scope.update = function(user)
        {
            UserModel.update($http, user)
                .success(function(data, status){
                    console.log(data);
                })
                .error(function(data, status){
                     console.log(data);
                });
        }

        $scope.delete = function(user)
        {
            UserModel.delete($http, user)
                .success(function(data, status){
                    $scope.read();
                })
                .error(function(data, status){
                    console.log(data);
                });
        }

        //init start.
        $scope.dataToCollect = {};
        $scope.db = {};
        $scope.read();
        //init end.
});