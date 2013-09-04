<?php

Yii::import('ext.bootstrap.form.*');

class RegisterController extends Controller
{
	public function actionCreate()
	{
		$user = new User();
		$user->setBaseController($this);
		$_POST['User']['locked'] = 0;
		$_POST['User']['last_connection'] = time();
		$user->attributes = $_POST['User'];
		if($user->validate())
		{
			// success.
			$this->render('register_form', array('user'=>$user));
		}
		else
		{
			// error : the user information has not 
			// been saved in the database.
			$this->render('register_form', array('user'=>$user));
		}
	}
}