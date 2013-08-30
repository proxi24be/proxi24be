<?php

class BsAttribute
{
	const HELP = 'help';
	const TYPE = 'type';

	private $_attributes = array();

	public function setHelpMessage($attribute, $help_message)
	{
		$this->_attributes[$attribute][self::HELP] = $help_message;
	}

	public function setType($attribute, $type)
	{
		$this->_attributes[$attribute][self::TYPE] = $type;
	}

	public function getHelpMessage($attribute)
	{
		return isset($this->_attributes[$attribute][self::HELP]) ? $this->_attributes[$attribute][self::HELP] : null ;
	}

	public function getType($attribute)
	{
		return isset($this->_attributes[$attribute][self::TYPE]) ? $this->_attributes[$attribute][self::TYPE] : null ;
	}

	public function getAttributes()
	{
		return array_keys($this->_attributes);
	}
}