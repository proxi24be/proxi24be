<?php

abstract class FormBehavior extends CModelBehavior
{
	protected $_controller;
	protected $_factory_form;

	public function setBaseController(CBaseController $controller)
	{
		$this->_controller = $controller;
	}

	public final function printForm(array $attributes, array $active_form = array())
	{
		$owner = $this->getOwner();
		$bs_attribute = $owner->getBusinessAttributes();
		$form =  $this->_controller->beginWidget('CActiveForm', $active_form);
		// Create the factory object.
		$this->_factory_form = new FactoryActiveForm($form, $owner);
		// The content of the form.
		foreach($attributes as $attribute)
		{
			$html ='';
			$html .= $this->_factory_form->getLabel($attribute);
			$html .= $this->_factory_form->getInput($attribute, $bs_attribute->getType($attribute), array('class'=>'form-control'));
			$help_message = $bs_attribute->getHelpMessage($attribute);
			if(isset($help_message))
				$html .= $this->createHelpMessageTag($help_message);

			echo $this->decorAttribute($html);
		}
		$this->_controller->endWidget();	
	}

	abstract public function decorAttribute($html);
	abstract public function createHelpMessageTag($message);
}