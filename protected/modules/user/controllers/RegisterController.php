<?php

use application\modules\user\components as MyComponents;

Yii::import('ext.bootstrap.form.*');

class RegisterController extends Controller
{
	public function actionRead()
	{
		$user = new User();
		if(isset($_POST['User']))
			$user->attributes = $_POST['User'];

		$this->render('register_form', array('user' => $user));
	}

	public function actionCreate()
	{
		if(isset($_POST['User']))
		{
			$user_manager = new MyComponents\UserManager();
			$user = $user_manager->createUser($_POST['User']);
			if($user !== false)
			{
				// creation success.
				echo "Your user has been created successfully.";
			}
			else
			{
				// creation fail.
				if(strpos($user_manager->getErrorMessage(), 'email is not unique'))
				{
					Yii::app()->user->setFlash('account_already_exist', 'You are already registered.');
					$this->actionRead();
				}
				// Could be an error validation or an unexepected exception.
				Yii::log($user_manager->getErrorMessage(), 'error','app.registration.register');
				throw new CHttpException(400, 'Sorry your request is invalid');
			}
		}
		else
			throw new CHttpException(400, 'Sorry your request is invalid.');
	}
}