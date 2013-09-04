<?php

Yii::import('application.ext.bootstrap.*');

// require_once('FormManager.php');
// require_once('BsFormManager.php');
// use yii\bootstrap as Bootstrap;

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
		echo Yii::getPathOfAlias('yii_bootstrap') . PHP_EOL;
		$this->assertNotNull($this->_form_manager);
	}
}