<?php

class Language extends I18NActiveRecord
{
	public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'language';
    }

    public function getDbConnection()
    {
        return self::getI18NDbConnection();
    }
}