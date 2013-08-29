<?php

namespace yii\bootstrap;

abstract class FormManager
{
	protected $_html;
	protected $_model;
	protected $_form;

	public function __construct(\CModel $model = null)
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

}