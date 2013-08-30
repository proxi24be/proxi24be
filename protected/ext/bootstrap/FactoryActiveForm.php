<?php

namespace yii\bootstrap;

class FactoryActiveForm extends FactoryForm
{
	protected $_form;
	protected $_model;

	public function __construct($form, \CModel $model)
	{
		$this->_form = $form;
		$this->_model = $model;
	}

	public function getLabelAndInput($attribute, $type_html)
	{
		if(!empty($attribute))
			return $this->getLabel($attribute) . $this->getInput($attribute, $type_html);
		else
			return '';
	}

	public function getInput($attribute, $type_html)
	{
		if(isset($this->_form))
		{
			if($type_html == 'text')
				return $this->_form->textField($this->_model, $attribute);
			else if($type_html == 'password')
				return $this->_form->passwordField($this->_model, $attribute);
			else 
				throw new \Exception('unknown type of html');	
		}
		else
			throw new \Exception('The ActiveForm has not been initialized.');
	}

	public function getLabel($attribute)
	{
		return $this->_form->labelEx($this->_model, $attribute);
	}
}