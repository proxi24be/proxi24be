<?php

class AuthItemChild extends RbacActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'auth_item_child';
    }

    public function getDbConnection()
    {
    	return self::getRbacDbConnection();
    }
}