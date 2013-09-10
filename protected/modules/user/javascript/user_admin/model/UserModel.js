UserAdmin.service('UserModel',
    function(){

        var url = myConfig.userUrl;

        this.read = function($http)
        {
            return $http.get(url + '/read');
        }

        this.create = function($http, model)
        {
            return $http.post(url + '/create', model);
        }

        this.update = function($http, model)
        {
            return $http.post(url + '/update', model);
        }
});
