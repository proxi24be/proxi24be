<?php
/**
 * User: TRANN
 * Date: 8/13/13
 * Time: 11:34 AM
 */

class RbacConnectionTest extends CDbTestCase {

    public function setUp() {
        $this->initTables();
    }

    public function tearDown() {
        $this->resetTables();
    }

    public function testConnection() {
        $connection = Yii::app()->rbac_db;
        $this->assertNotNull($connection);
    }

    public function testAccess() {
        $auth_manager = Yii::app()->authManager;
        $this->assertEquals(TRUE, $auth_manager->isAssigned("reader", 1));
        $this->assertEquals(TRUE, $auth_manager->checkAccess("reader.public.read", 1));
        $this->assertEquals(TRUE, $auth_manager->checkAccess("reader.public.write", 1));
    }

    private function initTables() {
        try {
            $auth_manager = Yii::app()->authManager;
            $auth_manager->createRole("reader");
            $auth_manager->createTask("task_reader");
            $auth_manager->addItemChild("reader", 'task_reader');
            $auth_manager->assign("reader", 1);
            $auth_manager->createOperation("reader.public.read");
            $auth_manager->createOperation("reader.public.write");

            $auth_manager->addItemChild("reader", "reader.public.read");
            $auth_manager->addItemChild("task_reader", "reader.public.write");

        }
        catch (CDbException $e) {
            Yii::log($e->getMessage(), 'error', 'app.migration');
        }
        catch (Exception $e) {
            Yii::log($e->getMessage(), 'error', 'app.migration');
        }
    }

    private function resetTables() {
        $connection = Yii::app()->rbac_db;
        $connection->createCommand("delete from auth_item;")->execute();
        $connection->createCommand("delete from auth_item_child;")->execute();
        $connection->createCommand("delete from auth_assignment;")->execute();
    }

}