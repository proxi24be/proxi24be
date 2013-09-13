<?php

Yii::import('ext.bootstrap.form.*');

class UserAdminController extends Controller
{
	public $layout = 'column2';

	public function actionIndex()
	{
		$this->render('application');
	}

	public function actionEditUser()
	{
		$this->render('application');
	}

	public function actionAddUser()
	{
		$this->render('application');
	}

	public function actionGetUsers()
	{
		$this->renderPartial('user_list');
	}

	public function actionWelcome()
	{
		$this->renderPartial('welcome');
	}

	public function actionGetUserForm()
	{
		$user = new User();
		$this->renderPartial('/register/register_form', array('user'=>$user));
	}
}