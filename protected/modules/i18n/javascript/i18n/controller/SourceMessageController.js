i18n.controller('SourceMessageController',
    function($scope, $http, CrudModel){

        $scope.read = function ()
        {
            CrudModel.read($http)
                .then(function(response){
                    $scope.db.source_messages = response.data;
                });
        }

        //init start.
        $scope.dataToCollect = {};
        $scope.db = {};
        $scope.read();
        //init end.
});