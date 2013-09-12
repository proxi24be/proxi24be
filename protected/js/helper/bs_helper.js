var BS_HELPER = {
	flashMessage : function(message, type_alert)
	{
		var html = '<div class="alert ' + type_alert + '">';
		html += message + '</div>';
		return html;
	}
}

function CRUD_MODEL()
{
	this.read = function($http)
    {
    	return $http.get(this.url + '/read');
    }

    this.create = function($http, model)
    {
    	return $http.post(this.url + '/create', model);
    }

    this.delete = function($http, model)
    {
    	return $http.post(this.url + '/delete', model);
    }

    this.update = function($http, model)
    {
    	return $http.post(this.url + '/update', model);
    }
}