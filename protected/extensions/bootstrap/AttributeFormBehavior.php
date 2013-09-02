<?php

class AttributeFormBehavior extends CModelBehavior
{
	public $bs_input_attribute;

	public function getBusinessAttributes()
	{
		return $this->bs_input_attribute;
	}

	public function setBusinessAttributes(BsInputAttribute $input_attribute)
	{
		$this->bs_input_attribute = $input_attribute;
	}
}