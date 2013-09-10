<?php

use ext\helper\crud\CRUDController;
Yii::import('ext.bootstrap.form.*');

class UserController extends CRUDController
{
	protected $_model_name = 'User';
	public $layout = 'column2';
}