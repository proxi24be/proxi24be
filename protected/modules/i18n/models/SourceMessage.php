<?php

class SourceMessage extends I18NActiveRecord
{
    public $category;
    public $id;
    public $message;
    
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

    public function behaviors()
    {
        return array(
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
        $this->bs_input_attribute->setAttribute('category', 'text', BsInputAttribute::TYPE_HTML);
        $this->bs_input_attribute->setAttribute('message', 'text', BsInputAttribute::TYPE_HTML);
    }
}