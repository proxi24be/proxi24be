i18n.controller('MessageController',
    function($scope, $http, MessageModel){

        $scope.read = function ()
        {
            MessageModel.read($http)
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