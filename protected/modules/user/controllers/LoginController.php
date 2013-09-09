<?php

Yii::import('ext.bootstrap.form.*');

class LoginController extends Controller
{
	public function actionRead()
	{
		$login_form = new LoginForm();
		if(Yii::app()->user->isGuest)
			echo 'hello guest';
		else
			echo 'welcome authentified';

		if (isset($_POST['LoginForm']))
		{
			$login_form->attributes = $_POST['LoginForm'];
			if($login_form->validate())
			{
				echo 'You are now authentified.';
			}	
		}
		$this->render('login_form', array('login_form' => $login_form));
	}
}