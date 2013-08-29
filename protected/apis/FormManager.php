<?php

namespace application\apis;

abstract class FormManager implements HtmlHelper
{
	protected $_html;
	protected $_configuration;

	public function __construct(array $configuration = null)
	{
		if(isset($configuration))
			$this->setConfiguration($configuration);
	}

	public function getHtml()
	{
		return $this->_html;
	}

	public function setConfiguration(array $configuration)
	{
		$this->_configuration = $configuration;
	}

	public function getConfiguration()
	{
		return $this->_configuration;
	}

	public final function generate()
	{
		if(!isset($this->_configuration))
			throw new \Exception('The object $configuration is null !');
		else
		{
			$this->_generateForm($this->_configuration);
		}
	}
}