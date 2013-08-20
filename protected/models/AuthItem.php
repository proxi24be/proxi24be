<?php

class AuthItem extends RbacActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'auth_item';
    }

    public function getDbConnection()
    {
        return self::getRbacDbConnection();
    }

}