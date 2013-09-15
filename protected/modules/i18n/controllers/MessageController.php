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
		
		$model = Message::model()->findByAttributes(array('id'=>12));
		if($model != null)
		{
			echo json_encode($model->source_message);
			echo json_encode($model->rel_language);
		}	
	}
}