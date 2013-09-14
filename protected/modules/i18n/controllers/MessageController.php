<?php

use ext\helper\crud\CRUDController;
Yii::import('ext.bootstrap.form.*');

class MessageController extends CrudController
{
	protected $_model_name = 'Message';
	public $layout = 'column2';

	public function actionReadRelation()
	{
		// $input = file_get_contents('php://input');
		// $json = json_decode($input);
		// if(isset($json))
		// {
		// 	$model = Message::model()->findByPk($json->id);
		// 	if($model != null)
		// 	{
		// 		echo json_encode($model->source_message);
		// 	}	
		// }
		
		$model = Message::model()->findByAttributes(array('id'=>4));
		if($model != null)
		{
			echo json_encode($model->source_message);
			echo json_encode($model->rel_language);
		}	
	}

	public function actionCreate()
	{
		$model = new Message();
		$model->attributes = array('id'=> 4, 'language'=>'fr', 'translation'=>'bonjour');
		if($model->save())
			echo 'object created.';
		else
			print_r($model->getErrors());
	}
}