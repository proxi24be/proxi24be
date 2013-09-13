<?php

use ext\helper\crud\CRUDController;

Yii::import('ext.bootstrap.form.*');

class SourceMessageController extends CRUDController
{
	protected $_model_name = 'SourceMessage';

	public function actionTable()
	{
		$this->renderPartial('_table');
	}
}