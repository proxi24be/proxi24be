<?php

class FactoryActiveForm
{
	protected $_form;
	protected $_model;

	public function __construct($form, CModel $model)
	{
		$this->_form = $form;
		$this->_model = $model;
	}
	/**
	 * [getInput description]
	 * @param  string $attribute   [description]
	 * @param  string $type_html   [description]
	 * @param  array  $htmlOptions [description]
	 * @param  mixed  $data        For convenience $data is mixed.  By doing that we save 
	 * a test on the variable : if anything other than an array is sent, the content will be empty.
	 * @return string              html of the input element is returned.
	 */
	public function getInput($attribute, $type_html, array $htmlOptions=array(), $data=array())
	{
		if($this->_attributeExist($attribute))
		{
			if(isset($this->_form))
			{
				if($type_html == 'text')
					return $this->_form->textField($this->_model, $attribute, $htmlOptions);
				else if($type_html == 'password')
					return $this->_form->passwordField($this->_model, $attribute, $htmlOptions);
				else if($type_html == 'select')
					return $this->_form->dropDownList($this->_model, $attribute, $data, $htmlOptions);
				else 
					throw new Exception('unknown type of html');	
			}
			else
				throw new Exception('The ActiveForm has not been initialized.');	
		}
		else
			return '';
	}

	public function getLabel($attribute, array $htmlOptions=array())
	{
		if($this->_attributeExist($attribute))
			return $this->_form->labelEx($this->_model, $attribute, $htmlOptions);
		else
			return '';
	}

	public function getErrorMessage($attribute)
	{
		return  $this->_form->error($this->_model, $attribute); 
	}

	private function _attributeExist($attribute)
	{
		if(empty($attribute))
			return false;
		else
			return true;
	}
}