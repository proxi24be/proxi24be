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

<<<<<<< HEAD
=======
	public function actionDefault()
	{
		$this->renderPartial('_application');
	}
>>>>>>> 0f02f250a4a8e0df8d4c9de416a008be0f926c2b
}