<?php

Yii::import('ext.bootstrap.form.*');

class RegisterController extends Controller
{
	public function actionCreate()
	{
		$user = UserManager::createUser($_REQUEST['User']);
		if($user !== false)
		{
			// creation success.
		}
		else
		{
			// creation fail.
		}	
	}
}