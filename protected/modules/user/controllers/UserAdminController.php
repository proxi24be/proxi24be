<?php

use ext\helper\crud\CRUDController;
Yii::import('ext.bootstrap.form.*');

class UserAdminController extends CRUDController
{
	protected $_model_name = 'User';
	public $layout = 'column2';
	
	public function actionIndex()
	{
		$this->render('application');
	}

	public function actionDefault()
	{
		$this->renderPartial('user_list');
	}
}