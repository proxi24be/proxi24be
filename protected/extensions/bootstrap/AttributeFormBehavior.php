<?php

class AttributeFormBehavior extends CModelBehavior
{
	public $bs_input_attribute;

	/**
	 * [initBusinessAttributes description]
	 * This method should be override.  Ideally the configuration 
	 * of the attributes should be done inside this function.
	 * Do not forget to call it before call getBusinessAttributes otherwise
	 * an error will rise up (depending if the instance has not been initialized)
	 */
	public function initBusinessAttributes()
	{
		// do nothing.
	}

	public function getBusinessAttributes()
	{
		return $this->bs_input_attribute;
	}

	public function setBusinessAttributes(BsInputAttribute $input_attribute)
	{
		$this->bs_input_attribute = $input_attribute;
	}
}