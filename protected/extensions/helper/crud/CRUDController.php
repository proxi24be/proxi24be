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
        $model = $this->_model_name;
        // useful for paging.
        if(isset($_REQUEST['limit']))
            $models = $model::model()->limit($_REQUEST['limit'])->findAll();
        else
            $models = $model::model()->findAll();

        echo \CJSON::encode($models);
    }

    public function actionCreate()
    {
        $params = $this->_getParameters();
        try
        {
            $model = $this->_model_name;
            $active_record = new $model();
            $active_record->attributes = $params;
            if($active_record->save())
                RequestResponse::printSuccess();
            else
                throw new \CDbException(print_r($active_record->getErrors(), true));
        }
        catch(\CDbException $e)
        {
            throw new \CHttpException(400, $e->getMessage());
        }
        catch(\Exception $e)
        {
            throw new \CHttpException(500, $e->getMessage());
        }
    }

    public function actionUpdate()
    {
        $parameters = $this->_getParameters();
        try
        {
            if(!isset($parameters['id']))
                throw new \Exception('missing parameters id');

            $model = $this->_model_name;
            $active_record = $model::model()->findByPk($parameters['id']);
            if($active_record == null)
                throw new \Exception('the record does not exist.');
            
            // massive assignment.
            $active_record->attributes = $parameters;

            if($active_record->save())
                RequestResponse::printSuccess();
            else
                throw new \CDbException(print_r($active_record->getErrors(), true));
        }
        catch(\CDbException $e)
        {
            throw new \CHttpException(400, $e->getMessage());
        }
        catch(\Exception $e)
        {
            throw new \CHttpException(500, $e->getMessage());
        }
    }

    public function actionDelete()
    {
        $parameters = $this->_getParameters();
        try
        {
            if(!isset($parameters['id']))
                throw new \Exception('missing parameters id');

            $model = $this->_model_name;
            $active_record = $model::model()->findByPk($parameters['id']);
            if($active_record == null)
                throw new \Exception('the record does not exist.');
            
            if($active_record->delete())
                RequestResponse::printSuccess();
            else
                throw new \CDbException(print_r($active_record->getErrors(), true));
        }
        catch(\CDbException $e)
        {
            throw new \CHttpException(400, $e->getMessage());
        }
        catch(\Exception $e)
        {
            throw new \CHttpException(500, $e->getMessage());
        }   
    }

    private function _getParameters()
    {
        // application/x-www-form-urlencoded
        if(isset($_POST[$this->_model_name]))
            return $_POST[$this->_model_name];
        else
        {
            $params = \CJSON::decode(file_get_contents('php://input'), true);
            if(isset($params))
                return $params;
            else
                throw new \CHttpException(400, 'Bad request!');
        }
    }
}