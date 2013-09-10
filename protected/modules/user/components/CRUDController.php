<?php

namespace application\modules\user\components;

/**
 *  This class performs crud operation.
 */
class CRUDController extends \Controller
{
	public $layout = 'column2';
    protected $_model_name;

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'ips'=>array('127.0.0.1'),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
                'message'=>'Access Denied.',
            ),
        );
    }

    public function beforeAction($action)
    {
        if(!isset($this->_model_name))
            throw new \CHttpException(501, 'The varialble model name has not been initialized !');
        else
            return parent::beforeAction($action);
    }

    public function actionRead()
    {
        $model = $this->_model_name;
        $models = $model::model()->findAll();
        echo \CJSON::encode($models);
    }

    public function actionCreate()
    {

    }
}