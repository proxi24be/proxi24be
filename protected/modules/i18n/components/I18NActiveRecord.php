<?php

class I18NActiveRecord extends CActiveRecord {
    private static $i18n_db = null;
    protected static function getI18NDbConnection()
    {
        if (self::$i18n_db !== null)
            return self::$i18n_db;
        else
        {
            self::$i18n_db = Yii::app()->i18n_db;
            if (self::$i18n_db instanceof CDbConnection)
            {
                self::$i18n_db->setActive(true);
                return self::$i18n_db;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
        }
    }
}