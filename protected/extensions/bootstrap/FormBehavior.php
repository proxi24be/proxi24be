<?php

abstract class FormBehavior extends CModelBehavior
{
	protected $_controller;
	protected $_factory_form;
	const SUBMIT_BUTTON = 'submit_button';

	public function setBaseController(CBaseController $controller)
	{
		$this->_controller = $controller;
	}

	public final function printForm(array $active_form = array(), array $submit_button = array())
	{
		$owner = $this->getOwner();
		$bs_attribute = $owner->getBusinessAttributes();
		if(!$bs_attribute instanceof BsInputAttribute)
			throw new Exception('$bs_attribute is not an instance of BsInputAttribute !');
		
		$form =  $this->_controller->beginWidget('CActiveForm', $active_form);
		// Create the factory object.
		$this->_factory_form = new FactoryActiveForm($form, $owner);
		// The content of the form.
		$attributes = $bs_attribute->getAttributes();
		foreach($attributes as $attribute)
		{
			$html ='';
			$html .= $this->_factory_form->getLabel($attribute);
			$html .= $this->_factory_form->getInput(
					$attribute, 
					$bs_attribute->getAttribute($attribute, BsInputAttribute::TYPE_HTML), 
					array('class'=>'form-control')
				);
			$help_message = $bs_attribute->getAttribute($attribute, BsInputAttribute::HELP_MESSAGE);
			if(isset($help_message))
				$html .= $this->createHelpMessageTag($help_message);

			$html .= $this->_factory_form->getErrorMessage($attribute); 
			echo $this->decorAttribute($html);
		}
		$this->_displaySubmitButton($submit_button);
		$this->_controller->endWidget();	
	}

	private function _displaySubmitButton(array $submit_button)
	{
		if(count($submit_button)>0)
		{
			if(isset($submit_button[self::SUBMIT_BUTTON]))
			{
				$value = $submit_button[self::SUBMIT_BUTTON];
				$htmlOptions = isset($submit_button['htmlOptions']) 
					? $submit_button['htmlOptions'] : array('class'=>'btn btn-primary');
			}

			echo CHtml::submitButton(
				$value,
				$htmlOptions
			);
		}
	}

	abstract public function decorAttribute($html);
	abstract public function createHelpMessageTag($message);
}