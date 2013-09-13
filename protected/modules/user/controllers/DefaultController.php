<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->redirect(Yii::app()->createAbsoluteUrl('user/login/read'));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}