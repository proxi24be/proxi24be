<?php

class AuthAssignment extends RbacActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'auth_assignment';
    }

    public function getDbConnection()
    {
    	return self::getRbacDbConnection();
    }
}