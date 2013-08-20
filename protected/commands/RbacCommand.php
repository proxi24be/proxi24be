<?php
/**
 * User: TRANN
 * Date: 8/13/13
 * Time: 1:23 PM
 */

class RbacCommand extends CConsoleCommand
{
    public function actionCreateInitialItem()
    {
        try {

            $auth_manager = Yii::app()->authManager;
            $auth_manager->createRole("authenticated");
            $auth_manager->createRole("pro");
            $auth_manager->createRole("amateur");
            $auth_manager->createRole("admin");
            $auth_manager->createTask("readerPublic");

            $auth_manager->createOperation("read amateur");
            $auth_manager->createOperation("read pro");
            $auth_manager->createOperation("read admin");

            $auth_manager->addItemChild("authenticated", "pro");
            $auth_manager->addItemChild("authenticated", "amateur");
            $auth_manager->addItemChild("authenticated", 'admin');
            $auth_manager->addItemChild("authenticated", "readerPublic");
            $auth_manager->addItemChild("readerPublic", "read amateur");

            $auth_manager->assign('admin', 1);
            $auth_manager->assign('authenticated', 2);

        }
        catch (CDbException $e) {
            Yii::log($e->getMessage(), 'error', 'app.migration');
        }
        catch (Exception $e) {
            Yii::log($e->getMessage(), 'error', 'app.migration');
        }
    }
    
    public function actionCreateItem($type, $name, $description='')
    {
        $auth_manager = Yii::app()->authManager;
        try {
            if ($type == 'role')
                $auth_manager->createRole($name, $description);
            else if ($type == 'task')
                $auth_manager->createTask($name, $description);
            else if ($type == 'operation')
                $auth_manager->createOperation($name, $description);
            else
                throw new Exception ("sorry unknown type !!!");
            echo "operation completed" . PHP_EOL ;
        }
        catch (CDbException $e) {
            echo $e->getMessage() . PHP_EOL;
        }
        catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }

    public function actionDisplayRole()
    {
        $auth_manager = Yii::app()->authManager;
        foreach($auth_manager->getRoles() as $key => $value) {
            echo "$key" . PHP_EOL;
        }
    }

    public function actionClearTables()
    {
        $connection = Yii::app()->rbac_db;
        $connection->createCommand("delete from auth_item;")->execute();
        $connection->createCommand("delete from auth_item_child;")->execute();
        $connection->createCommand("delete from auth_assignment;")->execute();
    }

}