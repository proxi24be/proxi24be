i18n.controller('SourceMessageController',
    function($scope, $http, CrudModel){

        $scope.read = function ()
        {
            CrudModel.read($http)
                .then(function(response){
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
                        $('div.flash-message').html(BS_HELPER.flashMessage(data, 'alert-danger'));
                    }
                });
        }

        $scope.delete = function(model)
        {
            CrudModel.delete($http, model)
                .success(function(data, status){
                    $scope.read();
                })
                .error(function(data, status){
                    if(status == 400)
                    {
                        $('div.flash-message').html(BS_HELPER.flashMessage(data, 'alert-danger'));
                    }
                });   
        }

        //init start.
        CrudModel.url = myConfig.url.SourceMessage;
        $scope.dataToCollect = {};
        $scope.db = {};
        $scope.read();
        //init end.
});