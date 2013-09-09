<?php

use application\modules\user\components as MyComponents;

Yii::import('ext.bootstrap.form.*');
class UserAdminController extends MyComponents\AdminController
{
	public function actionIndex()
	{
		$this->render('application');
	}

	public function actionDefault()
	{
		$this->renderPartial('user_list');
	}

	public function actionRead()
	{
		$models = User::model()->findAll();
		echo CJSON::encode($models);
	}
}