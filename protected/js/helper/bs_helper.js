var BS_HELPER = {
	flashMessage : function(message, type_alert)
	{
		var html = '<div class="alert ' + type_alert + '">';
		html += message + '</div>';
		return html;
	}
}