<?php

Yii::import('ext.bootstrap.form.*');

class RegisterController extends Controller
{
	public function actionIndex()
	{
		$user = new User();
		$user->setBaseController($this);
		$this->render('register_form', array('user' => $user));
	}

	public function actionCreate()
	{
		$user = new User();
		$_POST['User']['locked'] = 0;
		$_POST['User']['last_connection'] = time();
		$user->attributes = $_POST['User'];
		if($user->save())
		{
			// success.
		}
		else
		{
			// error : the user information has not 
			// been saved in the database.
		}
	}
}