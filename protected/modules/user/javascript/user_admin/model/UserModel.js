UserAdmin.service('UserModel',
    function(){

        var url = myConfig.userUrl;

        this.read = function($http)
        {
            return $http.get(url + '/read');
        }

        this.update = function($http, model)
        {
            return $http.post(url + '/update', model);
        }

        this.delete = function($http, model)
        {
            return $http.post(url + '/delete', model);
        }
});