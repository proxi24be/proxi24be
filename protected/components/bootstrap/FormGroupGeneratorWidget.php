<?php

class FormGroupGeneratorWidget extends CWidget
{
	public $model;
	// The parameters define which attribute has to be used
	// and how they must be rendered.
	public $parameters;

	public function init()
	{
		if(!$this->model instanceof CModel)
			throw new Exception('$model must be an instance of CModel');
		if(!is_array($this->parameters))
			throw new Exception('$parameters must be an array');


	}	

	public function run()
	{
		foreach($this->parameters as $attribute => $parameter){
			echo $this->createFormGroup($attribute, $parameter);
		}
			
	}

	private function createFormGroup($attribute, array $parameter)
	{
		$form_group = '<div class="form-group">';
		$form_group .= CHtml::activeLabelEx($this->model, $attribute);
		
		// Define which type of input need to be created.
		if(isset($parameter['type']))
			$form_group .= $this->getInput($parameter['type'], $attribute);

		// add an error tag if requested.
		if(!isset($parameter['error']) || $parameter['error'] === false)
			$form_group .= CHtml::error($this->model, $attribute, array('class'=>'error alert alert-danger'));

		// Close the tag.
		$form_group .= '</div>';
		return $form_group;
	}

	private function getInput($type, $attribute)
	{
		if($type == 'text')
			return CHtml::activeTextField($this->model, $attribute, array(
				'class' => 'form-control',
			));
		else if($type == 'password')
			return CHtml::activePasswordField($this->model, $attribute, array(
				'class' => 'form-control',
			));
		else
			return '';		
	}

}