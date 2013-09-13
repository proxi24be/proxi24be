/**
 * Template generate on {DATE}
 */

{APPLICATION_NAME}.controller('DefaultController',
    function($scope, $http, CrudModel){

        $scope.read = function ()
        {
            CrudModel.read($http)
                .then(function(response){
                    // instruction to perform.
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

        //init start.
        //init end.
});