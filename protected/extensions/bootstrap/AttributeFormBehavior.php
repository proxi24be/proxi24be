<?php

class AttributeFormBehavior extends CModelBehavior
{
	public $bs_input_attribute;

	/**
	 * [defaultBusinessAttributes description]
	 * This method should be overriden.  Ideally the configuration 
	 * of the attributes should be done inside this function.
	 * It is not neccessary to call explicitly this function:
	 * an implicit call is performed in the event afterConstruct.
	 */
	public function defaultBusinessAttributes()
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

	public function afterConstruct($event)
	{
		// Call to the overriden method.
		$this->getOwner()->defaultBusinessAttributes();
		parent::afterConstruct($event);
	}
}