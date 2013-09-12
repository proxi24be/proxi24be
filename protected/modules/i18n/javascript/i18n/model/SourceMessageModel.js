i18n.service('SourceMessageModel',
    function(){

    // add methods here.
    this.read = function($http)
    {
    	return $http.get(myConfig.sourceMessageUrl + '/read');
    }
});