i18n.service('CrudModel',
    function(){

    this.read = function($http)
    {
    	return $http.get(this.baseUrl + '/read');
    }

});