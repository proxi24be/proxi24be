UserAdmin.service('UserModel',
    function(){

        var url = myConfig.angularUrl;

        this.read = function($http)
        // Model is a string.
        {
            return $http.get(url + '/read');
        }

        this.create = function($http, model)
        // Model is an object.
        {
            return $http.post(url + '/create', model);
        }

        this.update = function($http, model)
        // Model is an object
        {
            return $http.post(url + '/update', model);
        }
});
