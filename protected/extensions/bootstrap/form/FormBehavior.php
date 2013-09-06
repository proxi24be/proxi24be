<?php

abstract class FormBehavior extends CModelBehavior
{
	public $active_form = array();
	public $submit_button = array();
	protected $_factory_form;
	const SUBMIT_BUTTON = 'submit_button';

	public final function printForm()
	{
		$owner = $this->getOwner();
		$bs_attribute = $owner->getBusinessAttributes();
		if(!$bs_attribute instanceof BsInputAttribute)
			throw new Exception('$bs_attribute is not an instance of BsInputAttribute !');

		// Equivalent to <form> + html attribute if any.
		$form =  Yii::app()->getController()->beginWidget('CActiveForm', $this->active_form);
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
					array('class'=>'form-control'),
					$bs_attribute->getAttribute($attribute, BsInputAttribute::DATA)
				);
			$help_message = $bs_attribute->getAttribute($attribute, BsInputAttribute::HELP_MESSAGE);
			if(isset($help_message))
				$html .= $this->createHelpMessageTag($help_message);

			$html .= $this->_factory_form->getErrorMessage($attribute); 
			echo $this->decorAttribute($html);
		}
		$this->_displaySubmitButton($this->submit_button);
		Yii::app()->getController()->endWidget();	
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