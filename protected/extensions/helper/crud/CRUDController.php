<?php

namespace ext\helper\crud;

/**
 *  This class performs generic CRUD operation.
 */
class CRUDController extends \Controller
{
    protected $_model_name;

    public function beforeAction($action)
    {
        if(!isset($this->_model_name))
            throw new \CHttpException(501, 'The variable $_model_name has not been initialized !');
        else
            return parent::beforeAction($action);
    }

    public function actionRead()
    {
        // useful for paging.
        if(isset($_REQUEST['limit']))
            $limit = $_REQUEST['limit'];

        $model = $this->_model_name;
        $models = $model::model()->findAll();
        echo \CJSON::encode($models);
    }

    public function actionCreate()
    {
        $params = $this->_getParameters();
        $model = $this->_model_name;
        $active_record = new $model();
        $active_record->attributes = $params;
        if($active_record->save())
            echo \CJSON::encode(array('result'=>'success'));
        else
            echo \CJSON::encode($active_record->getErrors());
    }

    public function actionUpdate()
    {
        
    }

    public function actionDelete()
    {

    }

    private function _getParameters()
    {
        // application/x-www-form-urlencoded
        if(isset($_POST[$this->_model_name]))
            return $_POST[$this->_model_name];
        else
        {
            $params = \CJSON::decode('php://input', true);
            if(isset($params))
                return $params;
            else
                throw new \CHttpException(400, 'Invalid request!');
        }
    }
}