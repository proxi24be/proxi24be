<?php

class BsInputAttribute
{
	const HELP_MESSAGE = 'help';
	const TYPE_HTML = 'type';
	const PLACE_HOLDER = 'place_holder';
	const DATA = 'data';

	private $_attributes = array();

	public function setAttribute($attribute, $value, $const_attribute)
	{
		$this->_attributes[$attribute][$const_attribute] = $value;
	}

	public function getAttribute($attribute, $const_attribute)
	{
		return $this->_isSet($attribute, $const_attribute);
	}

	public function getAttributes()
	{
		return array_keys($this->_attributes);
	}

	private function _isSet($attribute, $const_attribute)
	{
		return isset($this->_attributes[$attribute][$const_attribute]) 
			? $this->_attributes[$attribute][$const_attribute] : null ;	
	}
}