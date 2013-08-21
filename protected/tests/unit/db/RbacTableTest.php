<?php

class RbacTableTest extends CDbTestCase
{
	private $_rbac_db;
	private $_auth_manager;

	public $fixtures = array(
		'ads' => 'Ads',
		);

	public function setUp()
	{
		parent::setUp();
		$this->_rbac_db = Yii::app()->rbac_db;
		$this->_rbac_db->createCommand('delete from auth_assignment')->execute();
		$this->_auth_manager = Yii::app()->authManager;
	}

	public function testCheckDefaultParameter()
	{
		$rows = $this->_rbac_db->createCommand('select * from auth_item')->queryAll();
		$this->assertTrue(count($rows)>0);
		$defaultRoles = array('authenticated', 'pro', 'amateur', 'admin');
		$defaultTasks = array('read public ads', 'edit own ads');
		$count = 0;
		foreach($rows as $row){
			if (in_array($row['name'], $defaultRoles) || in_array($row['name'], $defaultTasks))
			 	$count++;
		}
		// The 4 default roles have been found + 2 default tasks have been found.
		$this->assertEquals(true, $count == 6);
	}

	public function testPermission()
	{
		$this->_auth_manager->assign('admin', 1);
		$this->assertEquals(true, $this->_auth_manager->checkAccess('authenticated', 1));
		$this->assertEquals(true, $this->_auth_manager->checkAccess('edit own ads', 1));
	}

	public function testBusinessRule()
	{
		$this->_auth_manager->assign('admin', 1);
		$this->_auth_manager->assign('admin', 2);
		Yii::app()->user->id = 1;
		// Business rules are inherited from the parent.
		$this->assertEquals(false, Yii::app()->user->checkAccess('crud_own_ads'));
		// check if the current user (id == 1) can update or delete his/her own ads.
		// so we check if he/she is the owner.  
		$this->assertEquals(true, Yii::app()->user->checkAccess('crud_own_ads', array('ads_id'=>1)));
		// False is return here because ads_id (2) does not belong to user 1.
		$this->assertEquals(false, Yii::app()->user->checkAccess('crud_own_ads', array('ads_id'=>2)));
		// Because it belongs to user 2.
		Yii::app()->user->id = 2;
		$this->assertEquals(true, Yii::app()->user->checkAccess('crud_own_ads', array('ads_id'=>2)));
	}

	private function showBusinessRule()
	{
		$rows = $this->_rbac_db->createCommand("select * from auth_item where bizrule is not null;")->queryAll();
		print_r($rows);
	}

	private function showItemChild()
	{
		$rows = $this->_rbac_db->createCommand('select * from auth_item_child;')->queryAll();
		print_r($rows);
	}
}