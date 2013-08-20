<?php

class RbacTableTest extends CDbTestCase
{
	public $fixtures = array(
		'ads' => 'Ads',
		);

	public function setUp()
	{
		parent::setUp();
		$connection = Yii::app()->rbac_db;
		$connection->createCommand('delete from auth_assignment')->execute();
	}

	public function testCheckDefaultParameter()
	{
		$connection = Yii::app()->rbac_db;
		$rows = $connection->createCommand('select * from auth_item')->queryAll();
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
		$auth_manager = Yii::app()->authManager;
		$auth_manager->assign('admin', 1);
		$this->assertEquals(true, $auth_manager->checkAccess('create_own_ads', 1));
		$this->assertEquals(true, $auth_manager->checkAccess('update_own_ads', 1));
		$this->assertEquals(true, $auth_manager->checkAccess('delete_own_ads', 1));
		$this->assertEquals(true, $auth_manager->checkAccess('edit own ads', 1));
		$this->assertEquals(true, $auth_manager->checkAccess('authenticated', 1));

	}

	public function testBusinessRule()
	{
		$pdo = $this->getPDO();
		$stmt = $pdo->query("select * from auth_item where name='edit own ads' ");
		if ($stmt != null){
			$rows = $stmt->fetchAll();
			foreach($rows as $row){
				echo $row['name'] .' | ' . $row['bizrule'] . PHP_EOL;
			}
		}

		$auth_manager = Yii::app()->authManager;
		$auth_manager->assign('admin', 1);
		$this->assertEquals(false, $auth_manager->checkAccess('edit own ads', 1, array()));
	}

	private function getPDO()
	{
		return  new PDO("sqlite:/home/bluenight/www/proxi24be/protected/data/test/rbac.test.sqlite");
	}
}