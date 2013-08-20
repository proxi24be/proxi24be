<?php

class RbacActiveRecord extends CActiveRecord {
    private static $rbac_db = null;
    protected static function getRbacDbConnection()
    {
        if (self::$rbac_db !== null)
            return self::$rbac_db;
        else
        {
            self::$rbac_db = Yii::app()->rbac_db;
            if (self::$rbac_db instanceof CDbConnection)
            {
                self::$rbac_db->setActive(true);
                return self::$rbac_db;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
        }
    }
}
