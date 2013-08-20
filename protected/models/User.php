<?php

class User extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'user';
    }

    public function rules() 
    {
        return array(
          array('first_name, last_name, email, locked, password, last_connection', 'required'),
        );
    }

    public function behaviors()
    {
        // Unfortunately the attribute field is case sensitive.
        // See Yii framework doc for more details.
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'timestampExpression' => 'time()',
                'createAttribute' => 'create_time',
                'updateAttribute' => 'update_time',
                'setUpdateOnCreate' => true,
            )
        );
    }
}
