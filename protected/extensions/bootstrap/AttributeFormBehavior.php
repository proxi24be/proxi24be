<?php

class AttributeFormBehavior extends CModelBehavior
{
	public function getBusinessAttributes()
	{
		return new BsInputAttribute();
	}
}