<?php

class SourceMessage extends I18NActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'source_message';
    }

    public function getDbConnection()
    {
        return self::getI18NDbConnection();
    }

    public function rules()
    {
        return array(
            array('category, message', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'category' => 'category',
            'message' => 'message',
        );
    }
}