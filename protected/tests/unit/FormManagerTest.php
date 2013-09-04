<?php

Yii::import('application.ext.bootstrap.*');
<<<<<<< HEAD
=======

require_once('FormManager.php');
require_once('BsFormManager.php');
>>>>>>> 56590e810f979e335b296bd8c795896776967d8e

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
		$this->assertNotNull($this->_form_manager);
	}
}