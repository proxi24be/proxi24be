<?php

use application\modules\user\components as MyComponents;

Yii::import('ext.bootstrap.form.*');
class UserAdminController extends MyComponents\CRUDController
{
	protected $_model_name = 'User';

	public function actionIndex()
	{
		$this->render('application');
	}

	public function actionDefault()
	{
		$this->renderPartial('user_list');
	}
}