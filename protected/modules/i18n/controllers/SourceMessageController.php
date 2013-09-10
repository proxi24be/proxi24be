<?php

use application\modules\i18n\components as myComponents;

Yii::import('ext.bootstrap.form.*');

class SourceMessageController extends myComponents\CRUDController
{
	public function actionIndex()
	{
		
	}

	public function actionCreate()
	{
		$source_message = new SourceMessage();
		$source_message->attributes = $_POST['SourceMessage'];
		try
		{
			if($source_message->save())
				Yii::app()->user->setFlash('creation success', 'Post succesful.');
			else
				Yii::app()->user->setFlash('creation fail', 'error');	
		}
		catch(Exception $e)
		{
			Yii::app()->user->setFlash('creation fail', $e->getMessage());	
		}

		$this->redirect(Yii::app()->createAbsoluteUrl('i18n/default/'));
	}

}