/**
 * Template generated on 15-Sep-2013 00:09:40
 */

Translation.controller('DefaultController',
    function($scope, $http, SourceMessageModel, MessageModel, LanguageModel){

        $scope.read = function ()
        {
            SourceMessageModel.read($http)
                .then(function(response){
                    // instruction to perform.
                    $scope.db.source_messages = response.data;
                });

            LanguageModel.read($http)
                .then(function(response){
                    $scope.db.languages = response.data;
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
            MessageModel.read($http)
                .then(function(response){
                    $scope.db.messages = response.data;
                });
        }

        $scope.createMessage = function(new_message, source_message)
        {
            if(new_message != undefined && source_message != undefined)
            {
                new_message.id = source_message.id;
                MessageModel.create($http, new_message)
                .success(function(data, status){
                    
                })
                .error(function(data, status){
                    console.log(data);
                });    
            }
            else
                console.log('missing attributes');
        }

        //init start.
        $scope.db = {};
        $scope.data_to_collect = {};
        temp = angular.extend({}, new CRUD_MODEL());
        SourceMessageModel = angular.extend(temp, SourceMessageModel);
        MessageModel = angular.extend(MessageModel, new CRUD_MODEL());
        LanguageModel = angular.extend(LanguageModel, new CRUD_MODEL());
        $scope.read();
        //init end.
});