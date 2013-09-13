<?php

use ext\helper\crud\CRUDController;

Yii::import('ext.bootstrap.form.*');

class {APPLICATION_NAME}Controller extends CRUDController
{
	public $layout = 'column2';
	protected $_model_name = '';

	public function actionIndex()
	{
		$this->render('application');
	}
}