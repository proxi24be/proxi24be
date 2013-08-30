<?php

namespace yii\bootstrap;

abstract class FormManager
{
	protected $_html;
	protected $_model;
	protected $_controller;

	public function __construct(\CBaseController $controller, \CModel $model = null)
	{
		if(isset($model))
			$this->setModel($model);
	}

	public function setModel(\CModel $model)
	{
		$this->_model = $model;
	}

	public function getModel()
	{
		return $this->_model;
	}

	public final function print(array $active_form = array(), $attributes)
	{
		if(!isset($this->_model))
			throw new \Exception('The model has not been initialized.');
		else
		{
			$form =  $this->_controller->beginWidget('CActiveForm', $active_form);
			// The content of the form.
			foreach($attributes => $attribute)
			{
				list($name, $type) = $this->_checkParameters($attribute);
				echo $this->_renderAttribute($name, $type);
			}
			$this->_controller->endWidget();	
		}
	}

	public abstract decorAttribute();

	private function _checkParameters(array $parameters)
	{
		$results = array();
		$results[] = isset($parameters['name']) ? $parameters['name'] : '';
		$results[] = isset($parameters['type']) ? $parameters['type'] : '';
		return $results;
	}

	private function _renderAttribute($attribute, $type_html)
	{
		if(!empty($attribute))
		{
			$label = $this->_model->getAttributeLabel($attribute);	

		}
	}
}