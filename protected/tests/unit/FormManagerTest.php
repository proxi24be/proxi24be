<?php

Yii::import('application.ext.bootstrap.*');

require_once('FormManager.php');
require_once('BsFormManager.php');

use yii\bootstrap as Bootstrap;

class FormManagerTest extends CTestCase
{
	private $_form_manager;
	private $_map;

	public function setUp()
	{
		$this->_form_manager = new Bootstrap\BsFormManager();
		$this->_map = array();
	}

	public function testInstance()
	{
		$this->assertNotNull($this->_form_manager);
	}
}