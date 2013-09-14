<?php

class Message extends I18NActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'message';
    }

    public function getDbConnection()
    {
        return self::getI18NDbConnection();
    }

    public function rules()
    {
        return array(
            array('id, language, translation', 'required'),
        );
    }

    public function relations()
    {
        return array(
           'source_message'=>array(self::BELONGS_TO, 'SourceMessage', 'id'),
           'rel_language'=>array(self::BELONGS_TO, 'Language', 'language'),
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
        $this->bs_input_attribute->setAttribute('language', 'select', BsInputAttribute::TYPE_HTML);
        $models = Language::model()->findAll();
        $data = CHtml::listData($models, 'language', 'language');
        $this->bs_input_attribute->setAttribute('language', $data, BsInputAttribute::DATA);
        $this->bs_input_attribute->setAttribute('translation', 'text', BsInputAttribute::TYPE_HTML);
    }
}