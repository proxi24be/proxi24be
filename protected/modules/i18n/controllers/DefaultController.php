<?php

use ext\helper\crud\CRUDController;

Yii::import('ext.bootstrap.form.*');
Yii::import('ext.bootstrap.table.*');

class DefaultController extends CRUDController
{
	protected $_model_name = 'SourceMessage';
	public $layout = 'column2';

	public function actionIndex()
	{
		$source_message = new SourceMessage();
		$models = SourceMessage::model()->findAll();
		$this->render('application');
	}
}