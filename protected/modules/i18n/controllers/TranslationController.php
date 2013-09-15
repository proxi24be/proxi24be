<?php

use ext\helper\crud\CRUDController;

Yii::import('ext.bootstrap.form.*');

class TranslationController extends CRUDController
{
	public $layout = 'column2';
	protected $_model_name = '';

	public function actionIndex()
	{
		$this->render('application');
	}

	public function actionDefault()
	{
		$this->renderPartial('_application');
	}
}