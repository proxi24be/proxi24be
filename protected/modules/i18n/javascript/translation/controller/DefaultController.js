/**
 * Template generate on 13-09-2013 04:09:41
 */

Translation.controller('DefaultController',
    function($scope, $http, CrudModel){

        $scope.read = function ()
        {
            CrudModel.read($http)
                .then(function(response){
                    // instruction to perform.
                    $scope.db.source_messages = response.data;
                });
        }

        $scope.create = function(model)
        {
            CrudModel.create($http, model)
                .success(function(data, status){
                    $scope.read();
                })
                .error(function(data, status){
                    if(status == 400)
                    {
                        // instruction to perform.
                    }
                });
        }

        $scope.delete = function(model)
        {
            CrudModel.delete($http, model)
                .success(function(data, status){
                    // instruction to perform.
                })
                .error(function(data, status){
                    if(status == 400)
                    {
                        // instruction to perform.
                    }
                });   
        }

        $scope.getTranslation = function(model)
        {
            console.log(model);
        }

        //init start.
        $scope.dataToCollect = {};
        $scope.db = {};
        CrudModel.url = myConfig.url.SourceMessage;
        $scope.read();
        //init end.
});