<?php

Yii::import('ext.bootstrap.form.*');

class UserAdminController extends Controller
{
	public $layout = 'column2';

	public function actionIndex()
	{
		$this->render('application');
	}

	public function actionDefault()
	{
		$user = new User();
		if(isset($_REQUEST['User']))
			$user->attributes = $_REQUEST['User'];

		$this->renderPartial('user_list', array('user'=>$user));
	}
}