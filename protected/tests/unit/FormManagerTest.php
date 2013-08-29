<?php

Yii::import('application.ext.bootstrap.*');

class FormManagerTest extends CTestCase
{
	private $_form_manager;
	private $_map;

	public function setUp()
	{
		$this->_form_manager = new BsFormManager();
		$this->_map = array();
	}

	public function testInstance()
	{
		$this->assertNotNull($this->_form_manager);
	}

}