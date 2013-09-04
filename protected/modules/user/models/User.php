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
          array('email', 'email'),
          array('password', 'length', 'min'=>8),
        );
    }

    public function attributeLabels()
    {
        return array(
            'first_name' => Yii::t('user', 'first_name'),
            'last_name' => Yii::t('user', 'last_name'),
            'email' => Yii::t('user', 'email'),
            'password' => Yii::t('user', 'password'),
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
            ),
            'BsFormBehavior' => array(
                'class' => 'ext.bootstrap.form.BsFormBehavior',
            ),
            'AttributeFormBehavior' => array(
                'class' => 'ext.bootstrap.form.AttributeFormBehavior'
            ),
        );
    }

    public function defaultBusinessAttributes()
    {
        $this->bs_input_attribute = new BsInputAttribute();
        $this->bs_input_attribute->setAttribute('first_name', 'text', BsInputAttribute::TYPE_HTML);
        $this->bs_input_attribute->setAttribute('last_name', 'text', BsInputAttribute::TYPE_HTML);
        $this->bs_input_attribute->setAttribute('email', 'text', BsInputAttribute::TYPE_HTML);
        $this->bs_input_attribute->setAttribute('password', 'password', BsInputAttribute::TYPE_HTML);
    }
}