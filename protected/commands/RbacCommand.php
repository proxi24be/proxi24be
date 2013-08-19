<?php

class RbacCommand extends CConsoleCommand {

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
        foreach($auth_manager->getRoles() as $key => $value){
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