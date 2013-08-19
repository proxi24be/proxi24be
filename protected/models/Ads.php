<?php

class Ads extends CActiveRecord
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'ads';
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