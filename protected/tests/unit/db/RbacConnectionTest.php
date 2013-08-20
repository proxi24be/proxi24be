<?php

Yii::import('system.test.CDbFixtureManager');

class RbacConnectionTest extends CDbTestCase
{
    public $fixtures_rbac = array(
        array('auth_item' => 'AuthItem'),
        array('auth_assignment' => 'AuthAssignment'),
        array('auth_item_child' => 'AuthItemChild'),
    );

    public function setUp()
    {
        $fixture_manager = new CDbFixtureManager();
        $fixture_manager->connectionID = 'rbac_db';
        $fixture_manager->basePath = Yii::app()->basePath.DIRECTORY_SEPARATOR.
                    'tests'.DIRECTORY_SEPARATOR.'fixtures';
        foreach($this->fixtures_rbac as $fixture)
            $fixture_manager->load($fixture);
    }

    public function testAccess()
    {
        $auth_manager = Yii::app()->authManager;
        $this->assertEquals(true, $auth_manager->isAssigned("admin", 2));
        $this->assertEquals(true, $auth_manager->isAssigned("amateur", 1));
        $this->assertEquals(true, $auth_manager->checkAccess('public_read', 2));
        $this->assertEquals(true, $auth_manager->checkAccess('admin_delete', 2));
    }
}